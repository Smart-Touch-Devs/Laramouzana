<?php

namespace App\Http\Controllers;

use App\Models\DepositPercentage;
use App\Models\RetraitPercentage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class PercentageDepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            'deposit_percentage' => 'numeric'
        ]);
        $input = $request->all();
        DepositPercentage::create($input);
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
        $retrait_percentage = RetraitPercentage::find($id);
        $deposit_percentage = DepositPercentage::find($id);
        return view('settings.percentage.edit', compact('deposit_percentage','retrait_percentage'));
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
        $request->validate([
            'deposit_percentage' => 'numeric'
        ]);
        $input = $request->all();
        DepositPercentage::find($id)->update($input);

        return redirect('staff/setting_percentage')->with('success', 'la modification de la valeur de pourcentage de depot a été effectué avec succée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposit_percentage = DepositPercentage::find($id);
        $deposit_percentage->delete();
        return back()->with('success', 'Suppression reussi!');
    }
}
