<?php

namespace App\Http\Controllers;

use App\Models\FrontPicture1;
use App\Models\FrontPicture2;
use Illuminate\Http\Request;

class FrontPictureController extends Controller
{
    public function index()
    {
        $frontpicture1 = FrontPicture1::latest()->limit(1)->get();
        $frontpicture2 = FrontPicture2::latest()->limit(1)->get();
        return view('settings.picture.front_picture',compact('frontpicture1','frontpicture2'));
    }
}
