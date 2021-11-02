<?php

namespace App\Http\Controllers;

use App\Models\FrontPicture2;
use Illuminate\Http\Request;

class FrontPicture2Controller extends Controller
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
            'picture_lat1' => 'image'
        ]);

        $input = $request->all();
        if ($picture = $request->file('picture_lat2')) {
            $destinationPath = 'assets/img/picture_lat';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_lat2'] = "$pic";
        };
        FrontPicture2::create( $input);
        return back()->with('success2','Enregistrement effectué avec succés');
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
        $frontpicture2 = FrontPicture2::find($id);
        return view('settings.picture.picture2.edit',compact('frontpicture2'));
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
            'picture_lat2' => 'image'
        ]);

        $input = $request->all();
        if ($picture = $request->file('picture_lat2')) {
            $destinationPath = 'assets/img/picture_lat';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_lat2'] = "$pic";
        };
        FrontPicture2::find($id)->update($input);
        return redirect()->intended('staff/front_picture')->with('success2', 'Modification réalisée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frontpicture = FrontPicture2::find($id);
        $frontpicture->delete();
        return redirect('staff/front_picture')->with('success', 'La suppression a été effectué avec succes');
    }
}
