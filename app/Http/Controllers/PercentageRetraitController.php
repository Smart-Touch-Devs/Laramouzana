<?php

namespace App\Http\Controllers;

use App\Models\RetraitPercentage;
use Illuminate\Http\Request;

class PercentageRetraitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'retrait_percentage' => 'numeric'
        ]);
        $input = $request->all();
        RetraitPercentage::create($input);
        return back()->with('success', 'la valeur du pourcentage a été validé ave succès');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retrait_percentages = RetraitPercentage::find($id);
        return view('settings.retrait.edit', compact('retrait_percentages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $retrait_percentage = RetraitPercentage::find($id);
        $retrait_percentage ->delete();
        return back()->with('success', 'Suppression reussi!');
    }
}
