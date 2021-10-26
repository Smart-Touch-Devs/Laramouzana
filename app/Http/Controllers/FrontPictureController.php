<?php

namespace App\Http\Controllers;

use App\Models\FrontPicture;
use Illuminate\Http\Request;

class FrontPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontPictures1 = FrontPicture::where('picture_lat1','!=','null')->limit(1)->get();
        $frontPictures2 = FrontPicture::where('picture_lat2','!=','null')->limit(1)->get();
        return view('settings.picture.front_picture', compact('frontPictures1','frontPictures2'));
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
            " picture_lat1" => "nullable",
            " picture_lat2" => "nullable",
        ]);
        $input = $request->all();
        if ($picture = $request->file('picture_lat1')) {
            $destinationPath = 'assets/img/picture_lat';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_lat1'] = "$pic";
        };

        if ($picture = $request->file('picture_lat2')) {
            $destinationPath = 'assets/img/picture_lat';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_lat2'] = "$pic";
        };
        FrontPicture::create($input);
        return back()->with('success', 'Image enregistrée avec succés');
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
        //
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
        $frontPictures1 = FrontPicture::find($id);
        $frontPictures1->delete();
        return back()->with('success', 'Suppression reussi!');

        $frontPictures2 = FrontPicture::find($id);
        $frontPictures2->delete();
        return back()->with('success', 'Suppression reussi!');

    }
}
