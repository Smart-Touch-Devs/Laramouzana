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

}
