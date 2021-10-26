<?php

namespace App\Http\Controllers;

use App\Models\DepositPercentage;
use App\Models\RetraitPercentage;
use App\Models\TransferePercentage;
use Illuminate\Http\Request;

class PercentageController extends Controller
{
    public function index()
    {
        $deposit_percentages = DepositPercentage::latest()->limit(1)->get();
        $retrait_percentages = RetraitPercentage::latest()->limit(1)->get();
        $transfere_percentages = TransferePercentage::latest()->limit(1)->get();
        return view('settings.percentage.setting_percentage', compact('deposit_percentages', 'retrait_percentages', 'transfere_percentages'));
    }
    public function depot($id)
    {
        $deposit_percentage = DepositPercentage::find($id);
        return view('settings.percentage.depot_edit', compact('deposit_percentage'));
    }
    public function updateDepot(Request $request, $id)
    {
        $request->validate([
            'deposit_percentage' => 'string'
        ]);
        $input = $request->all();
        DepositPercentage::find($id)->update($input);
        return redirect()->intended('staff/setting_percentage')->with('success', 'Modification réalisée avec succes');
    }
    public function retrait($id)
    {
        $retrait_percentage = RetraitPercentage::find($id);
        return view('settings.percentage.retrait_edit', compact('retrait_percentage'));
    }
    public function updateRetrait(Request $request, $id)
    {
        $request->validate([
            'retrait_percentage' => 'string'
        ]);
        $input = $request->all();
        RetraitPercentage::find($id)->update($input);
        return redirect()->intended('staff/setting_percentage')->with('success', 'Modification réalisée avec succes');
    }

    public function transfere($id)
    {
        $transfere_percentage = TransferePercentage::find($id);
        return view('settings.percentage.transfere_edit', compact('transfere_percentage'));
    }
    public function updateTransfere(Request $request, $id)
    {
        $request->validate([
            'transfere_percentage' => 'string'
        ]);
        $input = $request->all();
        TransferePercentage::find($id)->update($input);
        return redirect()->intended('staff/setting_percentage')->with('success', 'Modification réalisée avec succes');
    }
}
