<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;
use App\Mail\DevisMail;
use App\Mail\InterventionMail;
use App\Models\categories;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $categories = categories::all();
        return view('client.layout.contact',compact('categories'));
    }
    public function store(Request $request){

       
        $data=request()->validate([

            'name'=>['required','string','max:50'],
            'email'=>['required','string','email'],
            'subject'=>['required','string'],
            'message'=> ['required', 'string'],
        ]);

        
        Mail::to('dev.smtgroup@gmail.com')->send(new contactMail($request->except('_token')));
        return redirect()->back()->with('message', 'Votre message a éte envoyer nous vous remerci pour votre fidélité!');
    }
    public function devis_store(Request $request){

        $devis=request()->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'number'=> ['required'],
            'message'=> ['required'],
        ]);
        Mail::to('dev.smtgroup@gmail.com')->send(new DevisMail($request->except('_token')));
        return redirect()->back()->with('Dévis', 'Votre message de demande de dévis a éte envoyer!');
    }
    public function intervention_store(Request $request){

        $intervention=request()->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required','email'],
            'number'=> ['required'],
            'message'=> ['required'],
        ]);

        Mail::to('dev.smtgroup@gmail.com')->send(new InterventionMail($request->except('_token')));
        return redirect()->back()->with('Intervention', 'Votre message de demande d\'intervention a éte envoyer!');
    }
}
