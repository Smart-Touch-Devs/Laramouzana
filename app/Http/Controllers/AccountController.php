<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Models\categories;
use App\Models\City;
use App\Models\ClientAccount;
use App\Models\clients;
use App\Models\Command;
use App\Models\Commanded_products;
use App\Models\Country;
use App\Models\DepositPercentage;
use App\Models\rejectedWithdraws;
use App\Models\RetraitPercentage;
use App\Models\Transaction;
use App\Models\TransferePercentage;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

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

        $inputs = $request->all([
            'lastname',
            'firstname',
            'email',
            'birthday',
            'phone',
            'country',
            'city',
            'cnib'
        ]);


        if (isset($request->selfie)) {
            if ($selfie = $request->file('selfie')) {
                $destinationPath = 'assets/selfies_folder';
                $pic = date('Ymdhis') . "." . $selfie->getClientOriginalExtension();
                $finalImg = $selfie->move($destinationPath, $pic);
                $inputs['selfie'] = $finalImg->getFilename();
            };
        }


        if (isset($request->card_recto)) {
            if ($card_recto = $request->file('card_recto')) {
                $destinationPath = 'assets/cardsRectos_folder';
                $pic = date('Ymdhis') . "." . $card_recto->getClientOriginalExtension();
                $card_recto->move($destinationPath, $pic);
                $inputs['card_recto'] = "$pic";
            };
        }
        if (isset($request->card_verso)) {
            if ($card_verso = $request->file('card_verso')) {
                $destinationPath = 'assets/cardsVersos_folder';
                $pic = date('Ymdhis') . "." . $card_verso->getClientOriginalExtension();
                $card_verso->move($destinationPath, $pic);
                $inputs['card_verso'] = "$pic";
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
        $percentage = ((float) DepositPercentage::first()->deposit_percentage) + 4;
        return view('client.account.layouts.deposit', ['categories' => $categories, 'percentage' => $percentage]);
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'amount' => 'required',
            'otp_code' => 'required'
        ]);

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . env('SMTPAY_API_KEY')
        ])->post("http://smtpay.net/api/payment/v1/pay", [
            'id' => 'OM',
            'customer_msisdn' => $request->phone,
            'amount' => $request->amount,
            'otp' => $request->otp_code
        ]);
        $percentage = ((float) DepositPercentage::first()->deposit_percentage) + 4;

        $credit = ((int) $request->amount) - ((((int) $request->amount) * $percentage) / 100);

        $result = json_decode((string) $response->getBody(), true);
        if(((int) $result['status']) === 200) {
            $clientAccountAmount = auth()->user()->account->amount;
            auth()->user()->account->update(['amount' => (int) $clientAccountAmount + $credit]);
            return redirect()->back()->with("success", "Votre dépôt a été un succès!");
        } else {
            return redirect()->back()->with('error', "Il y'a eu une erreur!Veuillez réessayer!");
        }


    }

    public function sendMoneyIndex()
    {
        $categories = categories::all();
        $percentage = TransferePercentage::first()->transfere_percentage;

        $clients = clients::where('id', '!=', auth()->user()->id)->get(['email', 'firstname', 'lastname']);
        return view('client.account.layouts.sendMoney', ['categories' => $categories, 'clients' => $clients, 'percentage' => $percentage]);
    }

    public function sendMoney(Request $request)
    {
        $request->validate([
            'receiver' => 'required|email',
            'amount' => 'required|max:' . auth()->user()->account->amount
        ]);

        Auth::user()->account->update([
            'amount' => (int) auth()->user()->account->amount - (int) $request->amount
        ]);
        $percentage = TransferePercentage::first()->transfere_percentage;

        $receiverId = clients::where('email', $request->receiver)->first()->id;

        $amount = ((int) ClientAccount::where('client_id', $receiverId)
        ->first()
        ->amount) + (((int) $request->amount) - ((((int) $request->amount) * $percentage) / 100));

        ClientAccount::where('client_id', $receiverId)
        ->first()
        ->update(['amount' => $amount]);

        Transaction::create([
            'sender' => auth()->user()->id,
            'receiver' => $receiverId,
            'amount' => $request->amount
        ]);

        return redirect()->back()->with('success', 'Le transfert a été un succès!');
    }

    public function withdrawIndex()
    {
        $categories = categories::all();
        $percentage = RetraitPercentage::first()->retrait_percentage;
        $validated_withdrawals = Withdraw::where(['client_id' => auth()->user()->id, 'done'=> true])->get();
        $rejected_withdrawals = rejectedWithdraws::where('client_id', auth()->user()->id)->get();
        return view('client.account.layouts.withdraw', [
            'categories' => $categories,
            'validated_withdrawals' => $validated_withdrawals,
            'rejected_withdrawals' => $rejected_withdrawals,
            'percentage' => $percentage
        ]);
    }

    public function requestWithdrawal(Request $request) {
        $request->validate([
            'client' => 'required|email',
            'withdrawAmount' => 'required'
        ]);

        $client = clients::where('email', $request->client)->first();
        $percentage = (float) RetraitPercentage::first()->retrait_percentage;

        $withdrawAmount = ((int) $request->withdrawAmount) - ((((int) $request->withdrawAmount) * $percentage) / 100);
        Withdraw::create([
            'client_id' => $client->id,
            'amount' => $withdrawAmount,
            'done' => false
        ]);

        return redirect()->back()->with('success', 'Votre demande a été envoyer avec succès');
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
        $inner_transactions = Transaction::where('receiver', auth()->user()->id)->get();
        $outer_transactions = Transaction::where('sender', auth()->user()->id)->get();
        //dd($outer_transactions);
        return view('client.account.layouts.transactions', [
            'categories' => $categories,
            'inner_transactions' => $inner_transactions,
            'outer_transactions' => $outer_transactions
        ]);
    }

}
