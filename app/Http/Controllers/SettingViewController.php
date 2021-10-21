<?php

namespace App\Http\Controllers;

use App\Models\DepositPercentage;
use App\Models\RetraitPercentage;
use App\Models\TransferePercentage;
use Illuminate\Http\Request;

class SettingViewController extends Controller
{
    public function index()
    {
        $transfere_percentages = TransferePercentage::all();
        $retrait_percentages = RetraitPercentage::all();
        $deposit_percentages = DepositPercentage::all();
       return view('settings.percentage.setting_percentage',compact('deposit_percentages','retrait_percentages','transfere_percentages'));
    }
}
