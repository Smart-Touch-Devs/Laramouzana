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
        return view('settings.picture.front_picture', compact('frontpicture1','frontpicture2'));
    }
    // public function storePicture1(Request $request)
    // {
    //     $request->validate([
    //         'picture_lat1' => 'image'
    //     ]);

    //     $input = $request->all();
    //     if ($picture = $request->file('picture_lat1')) {
    //         $destinationPath = 'assets/img/picture_lat';
    //         $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
    //         $picture->move($destinationPath, $pic);
    //         $input['picture_lat1'] = "$pic";
    //     };
    //     FrontPicture1::create($input);

    //     return back()->with('success', 'Enregistrement effectué avec succés');
    // }
    // public function editPicture1($id)
    // {
    //     $frontpicture = FrontPicture1::find($id);
    //     return view('settings.picture.edit', compact('frontpicture'));
    // }
}
