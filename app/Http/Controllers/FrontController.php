<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use App\Models\categories;
use App\Models\ClientAccount;
use App\Models\clients;
use App\Models\Command;
use App\Models\Commanded_products;
use App\Models\products;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function about(){
        $categories = categories::all();
    	return view('client.layout.about',compact('categories'));
    }
    public function shop($category = null) {
        $categoryExist = categories::where('category_name', $category)->first();
        if($categoryExist) {
            $show_all_products = products::where('category_id', $categoryExist->id)
            ->orderBy('created_at', 'DESC')
            ->cursorPaginate(15);
        } else {
            $show_all_products = products::orderBy('created_at', 'DESC')->cursorPaginate(15);
        }

        $categories = categories::all();
    	return view('client.layout.shop',compact('categories','show_all_products'));
    }


    public function store(Request $request){

        $data=request()->validate([
        	'name'=>['required','string','max:50'],
        	'email'=>['required','string','email'],
            'subject'=>['required','string'],
        	'message'=> ['required', 'string'],
        ]);
        // dd($data);
        Contact::create([
            'name' =>$data['name'],
            'email'=>$data['email'],
            'subject'=>$data['subject'],
            'message' => $data['message'],

	    ]);
        return redirect()->back()->with('message', 'Votre message a éte envoyer nous vous remerci pour votre fidélité!');
    }

    public function search($searchValue = null) {
        if($searchValue === null) {
            return json_encode(['nothing' => "Aucun résultat trouvé"]);
        } else {
            $products = products::where('product_name', 'LIKE', '%' . $searchValue . '%')
            ->limit(10)
            ->get(['id', 'product_name', 'picture1']);
            return json_encode($products);
        }
    }

    public function commandOne(Request $request) {

        if($request->product_price > Auth::user()->account->amount) {
            return redirect()->back()->with('error', 'Votre solde est insuffisant pour commander ce produit!');
        } else {
            $commandAdded = Command::create([
                'clients_id' => $request->client_id,
                'is_delivered' => 0
            ]);

            if($commandAdded) {
                Commanded_products::create([
                    'command_id' => $commandAdded->id,
                    'product_id' => $request->product_id,
                    'quantity' => 1
                ]);

                ClientAccount::where('client_id', $request->client_id)->update(['amount' => (((int) Auth::user()->account->amount) - ((int) $request->product_price))]);

                return redirect()->back()->with('success', 'Votre commande un succès!');
            }
        }

    }
}
