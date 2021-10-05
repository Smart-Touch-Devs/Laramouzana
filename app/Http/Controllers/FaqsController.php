<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faqs::all();
        return view('faqs.faqs',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'titre' => 'required|string|',
            'contenu' => 'required|string|',
           
        ]);
        Faqs::create([
            'titre' =>$data['titre'],
            'contenu'=>$data['contenu'],
            
        ]);
        
        
        return redirect()->intended('Faqs')->with('success', "faq a été ajouté avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faqs = Faqs::find($id);
        return view('faqs.edit',compact('faqs'))->with('success', "faq a été modifier avec succes");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqs $faqs)
    {
        $request->validate([
            'titre' => 'required|string|',
            'contenu' => 'required|string|',
        ]);        
        $input = [];
        $input['titre'] = $request->input('titre');
        $input['contenu'] = $request->input('contenu');         
        $faqs->where('id', $request->input('faqsId'))->update($input);
        return redirect()->intended('Faqs' )->with('success', 'La modification a été effectué avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faqs = Faqs::find($id);
        $faqs->delete();
        return back()->with('success', 'Suppression reussi!');
    }
}
