<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Contact;
use App\Models\categories;
use App\Models\products;


use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function about(){
        $categories = categories::all();
    	return view('client.layout.about',compact('categories'));
    }
    public function shop() {
        $show_all_products = products::orderBy('created_at', 'DESC')->cursorPaginate(15);
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
}
