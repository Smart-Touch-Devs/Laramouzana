<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\Faqs;
use Illuminate\Http\Request;

class AccordionController extends Controller
{
    public function index(){
        $categories = categories::all();
        $faqs = Faqs::all();
        return view('client.layout.accordion',compact('faqs','categories'));
    }
}
