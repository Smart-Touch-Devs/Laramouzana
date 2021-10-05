<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use App\Models\categories;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $categories = categories::all();
    	return view('client.layout.contact',compact('categories'));
    }
    public function store(Request $request){

        request()->validate([
        	'name'=>['required','string','max:50'],
        	'email'=>['required','string','email'],
            'subject'=>['required','string'],
        	'message'=> ['required', 'string'],
        ]);

        Mail::to('test@gmail.com')->send(new contactMail($request->except('_token')));
        return redirect()->back()->with('message', 'Votre message a éte envoyer nous vous remerci pour votre fidélité!');
    }
}
