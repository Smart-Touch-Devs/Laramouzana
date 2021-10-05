<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Models\City;
use App\Models\clients;
use App\Models\Country;
use App\Models\HashedMails;
use App\Models\PasswordReset;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClientAuthController extends Controller
{

    public function loginView()
    {
        return view('client.login');
    }

    public function registerView()
    {
        $countries = Country::all(['id', 'countryName', 'indicative']);
        $cities = City::all(['id' , 'cityName', 'belongedCountry']);
        return view('client.register', ['countries' => $countries, 'cities' => $cities]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required|exists:clients,email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/', 302);
        } else {
            return redirect()->back()->withErrors(['passwordError' => 'Le mot de passe entré est incorrect!'])->withInput(['email' => $request->email]);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'email|required|unique:clients,email',
            'confirm_email' => 'required|same:email',
            'birthday' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'sup_code' => 'required|exists:clients,sup_code',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if(City::find($request->city)->belongedCountry !== (int) $request->country) {
            return Redirect::back()->withErrors(['city' => 'La ville choisie ne correspond pas au pays choisie']);
        } else if(preg_match('#^[0]{2}#', $request->phone)) {
            return Redirect::back()->withErrors(['phone' => 'Vous devez entrer votre numéro sans l\'indicatif du pays']);
        }
        else
        $managed_email = implode('', explode('.', explode('@', $request->email)[0]));
        //Affiliate_code managing
        $lastClientId = ((int) clients::all(['id'])->first()->id) + 1;
        $affiliateCode = $managed_email . $request->phone[3] . $lastClientId . $request->phone[4];

        $newClient = clients::create([
            'role' => 1,
            'country' => $request->country,
            'city' => $request->city,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'affiliate_code' => $affiliateCode,
            'birthday' => new DateTime($request->birthday),
            'phone' => $request->phone,
            'sup_code' => $request->sup_code,
            'password' => Hash::make($request->password)
        ]);

        $hashed_email = implode('_', explode('/', Hash::make($newClient->email)));
        $details = [];

        $hashMailStored = HashedMails::create([
            'client' => $newClient->id,
            'hashed_email' => $hashed_email
        ]);

        if($hashMailStored) {
            $heading = 'Mail de confirmation';
            $title = 'Email de Confirmation';
            $body = 'Hello ' . $newClient->firstname . '!Vous êtes à deux doigts de terminer votre inscription!<br>
            Cliquer sur le bouton ci-dessous pour confirmer votre email et vous connecter.';
            $link = route('client.confirmMail', $hashed_email);
            $link_label = 'Confirmer votre addresse Email';
            $details = [
                'heading' => $heading,
                'title' => $title,
                'body' => $body,
                'link' => $link,
                'link_label' => $link_label
            ];
        }

        Mail::to($newClient->email)->send(new ConfirmMail($details));

        return view('client.confirm', [
            'text' => 'Votre inscription a été un succès!Nous vous avons envoyé un mail de vérification.
            Veuillez bien consulter votre boîte mail pour procéder à la confirmation de votre email.'
        ]);
    }

    public function confirmMail($hashedMail) {
        $clientId = HashedMails::where('hashed_email', $hashedMail)->get('client')[0]->client;
        HashedMails::where('hashed_email', $hashedMail)->delete();
        DB::update('update clients set email_verified = "' . now() . '" where id = ?', [$clientId]);
        return redirect()->route('client.login')->with('success', 'Votre email a été confirmé avec succès!');
    }

    public function forgotten_pw() {return view('client.password_forgot');}

    public function send_reset_email(Request $request) {
        $request->validate(['email' => 'email|required|exists:clients,email']);
        $email = $request->email;
        $phoneToArray = str_split(clients::where('email', $email)->get('phone')[0]->phone, 1);
        $randNumber = [];
        foreach (array_rand($phoneToArray, 4) as $key) {
            array_push($randNumber, $phoneToArray[$key]);
        }
        $token = implode('repears_', explode('$', implode('_', explode('/', Hash::make(str_shuffle($email . implode('', $randNumber)))))));
        PasswordReset::create([
            'email' => $email,
            'token' => $token
        ]);

        $heading = 'Rénitialisation de mot de passe!';
            $title = 'Rénitialisation de mot de passe!';
            $body = 'Hello ' . clients::where('email', $email)->get('firstname')[0]->firstname . '!Nous avions bien réçu votre requête!\n
            Veuillez cliquer sur le bouton en dessous pour definir votre nouveau mot de passe.';
            $link = route('client.resetRedirect', $token);
            $link_label = 'Renitialiser le mot de passe';
            $details = [
                'heading' => $heading,
                'title' => $title,
                'body' => $body,
                'link' => $link,
                'link_label' => $link_label
            ];

        Mail::to($email)->send(new ConfirmMail($details));

        return view('client.confirm', [
            'text' => 'Un mail de rénitialisation vous a été envoyé.
            Veuillez bien consulter votre boîte mail pour procéder à la rénitialisation de votre mot de passe.'
        ]);

    }

    public function resetRedirect($token = null) {
        if(!isset($token)) return redirect()->route('client.login');
        else if(date('d/M/Y', PasswordReset::where('token', $token)->get('created_at')[0]->created_at) != date('d/M/Y')) {
            return redirect()->route('client.forgotPassword')->with('expiredError', 'Le lien de rénitialisation précédente a expiré!');
        }
        else
        Session::put('reset_pw_token', $token);
        return view('client.reset_password', ['title' => 'Mot de passe oublié?']);
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $email = PasswordReset::where('token', Session::get('reset_pw_token'))->get('email')[0]->email;
        DB::update('update clients set password = "' . Hash::make($request->password) . '" where email = ?', [$email]);
        Session::forget('reset_pw_token');
        PasswordReset::where('token', Session::get('reset_pw_token'))->delete();
        $heading = 'Rénitialisation de mot de passe réussi!';
            $title = 'Votre mot de passe a été rénitialisé avec succès!';
            $body = 'Hello ' . clients::where('email', $email)->get('firstname')[0]->firstname . '!La rénitialisation de votre mot de passe a été un succès!<br>
            Veuillez cliquer sur le bouton en dessous pour vous connecter.';
            $link = route('client.login');
            $link_label = 'Se connecter';
            $details = [
                'heading' => $heading,
                'title' => $title,
                'body' => $body,
                'link' => $link,
                'link_label' => $link_label
            ];

        Mail::to($email)->send(new ConfirmMail($details));
        return redirect()->route('client.login')->with('success', 'Rénitialisation de mot de passe réussi!');
    }



    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
