<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Models\categories;
use App\Models\City;
use App\Models\clients;
use App\Models\Command;
use App\Models\Commanded_products;
use App\Models\Country;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function returnAccount()
    {
        $categories = categories::all();
        return view('client.account.layouts.account', ['categories' => $categories]);
    }

    public function returnCart()
    {
        $categories = categories::all();
        return view('client.layout.cart', ['categories' => $categories]);
    }

    public function updateIndex()
    {
        $categories = categories::all();
        $countries = Country::all(['id', 'countryName', 'indicative']);
        $cities = City::all(['id', 'cityName', 'belongedCountry']);
        return view('client.account.layouts.update', ['categories' => $categories, 'countries' => $countries, 'cities' => $cities]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'cnib' => 'required|starts_with:B'
        ]);

        $inputs = $request->all();


        if (isset($request->selfie)) {
            $request->validate(['selfie' => 'image']);
            if ($selfie = $request->file('selfie')) {
                $destinationPath = 'assets/selfies_folder';
                $pic = date('Ymdhis') . "." . $selfie->getClientOriginalExtension();
                $selfie->move($destinationPath, $pic);
                $input['selfie'] = "$pic";
            };
        }
        if (isset($request->card_recto)) {
            $request->validate(['card_recto' => 'image']);
            if ($card_recto = $request->file('card_recto')) {
                $destinationPath = 'assets/cardsRectos_folder';
                $pic = date('Ymdhis') . "." . $card_recto->getClientOriginalExtension();
                $card_recto->move($destinationPath, $pic);
                $input['card_recto'] = "$pic";
            };
        }
        if (isset($request->card_verso)) {
            $request->validate(['card_verso' => 'image']);
            if ($card_verso = $request->file('card_verso')) {
                $destinationPath = 'assets/cardsVersos_folder';
                $pic = date('Ymdhis') . "." . $card_verso->getClientOriginalExtension();
                $card_verso->move($destinationPath, $pic);
                $input['card_verso'] = "$pic";
            };
        }

        $data = [];

        foreach ($inputs as $key => $value) {
            if ($inputs[$key] !== null && $key !== '_token') $data[$key] = $value;
        }

        clients::where('id', Auth::user()->id)->update($data);

        return redirect()->back()->with('success', 'Vos informations ont été modifier avec succès!');
    }

    public function changePw()
    {
        return view('client.reset_password', ['title' => 'Changer de mot de passe']);
    }

    public function updatePw(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        clients::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password)]);

        $heading = 'Rénitialisation de mot de passe réussi!';
        $title = 'Votre mot de passe a été rénitialisé avec succès!';
        $body = 'Hello ' . Auth::user()->firstname . '!La rénitialisation de votre mot de passe a été un succès.
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

        Mail::to(Auth::user()->email)->send(new ConfirmMail($details));
        return redirect('/login')->with('success', 'Rénitialisation de mot de passe réussi!');
    }

    public function depositIndex()
    {
        $categories = categories::all();
        return view('client.account.layouts.deposit', ['categories' => $categories]);
    }

    public function deposit(Request $request)
    {
        //Traitement
    }

    public function sendMoneyIndex()
    {
        $categories = categories::all();
        $clients = clients::all(['email', 'firstname', 'lastname']);
        return view('client.account.layouts.sendMoney', ['categories' => $categories, 'clients' => $clients]);
    }

    public function sendMoney(Request $request)
    {
        //Traitement
    }

    public function withdrawIndex()
    {
        $categories = categories::all();
        return view('client.account.layouts.withdraw', ['categories' => $categories]);
    }

    public function withdraw(Request $request)
    {
        //
    }

    public function orders()
    {
        $categories = categories::all();
        $todeliver_commands = Command::where(['clients_id' => Auth::user()->id, 'is_delivered' => 0])->get();
        $todeliver_products = [];

        foreach ($todeliver_commands as $todeliver_command) {
            $products = Commanded_products::where('command_id', $todeliver_command->id)
                ->limit(20)
                ->get();
            foreach ($products as $product) {
                array_push($todeliver_products, $product);
            }
        }

        $delivered_commands = Command::where(['clients_id' => Auth::user()->id, 'is_delivered' => 1])->get();
        $delivered_products = [];

        foreach ($delivered_commands as $delivered_command) {
            $products = Commanded_products::where('command_id', $delivered_command->id)
                ->limit(20)
                ->get();
            foreach ($products as $product) {
                array_push($delivered_products, $product);
            }
        }

        return view('client.account.layouts.orders', ['categories' => $categories, 'todeliver_products' => $todeliver_products, 'delivered_products' => $delivered_products]);
    }

    public function transactions()
    {
        $categories = categories::all();
        return view('client.account.layouts.transactions', ['categories' => $categories]);
    }
}
