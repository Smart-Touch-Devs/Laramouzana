<?php

namespace App\Http\Controllers;

use App\Models\MainPicture;
use Illuminate\Http\Request;

class MainPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainPictures = MainPicture::all();
        return view('settings.picture.mainPicture.mainPicture',compact('mainPictures'));
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
            "picture" => "image"
        ]);
        $input = $request->all();

        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/mainPicture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        };
        MainPicture::create($input);
        return back()->with('success','Enregistrement effectué avec succés');
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
        $mainPicture = MainPicture::find($id);
        return view('settings.picture.mainPicture.edit',compact('mainPicture'));
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
            "picture" => "image"
        ]);
        $input = $request->all();

        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/mainPicture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        };
        MainPicture::find($id)->update($input);
        return redirect()->intended('staff/mainPicture')->with('success', 'Modification réalisée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainPicture = MainPicture::find($id);
        $mainPicture->delete();
        return redirect('staff/mainPicture')->with('success', 'La suppression a été effectué avec succes');
    }
}
