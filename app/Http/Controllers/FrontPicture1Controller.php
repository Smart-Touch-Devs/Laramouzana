<?php

namespace App\Http\Controllers;

use App\Models\FrontPicture1;
use Illuminate\Http\Request;

class FrontPicture1Controller extends Controller
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
        if ($picture = $request->file('picture_lat1')) {
            $destinationPath = 'assets/img/picture_lat';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_lat1'] = "$pic";
        };
        FrontPicture1::create( $input);

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
        $frontpicture1 = FrontPicture1::find($id);
        return view('settings.picture.picture1.edit',compact('frontpicture1'));
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
            'picture_lat1' => 'image'
        ]);

        $input = $request->all();
        if ($picture = $request->file('picture_lat1')) {
            $destinationPath = 'assets/img/picture_lat';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture_lat1'] = "$pic";
        };
        FrontPicture1::find($id)->update($input);
        return redirect()->intended('staff/front_picture')->with('success', 'Modification réalisée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frontpicture = FrontPicture1::find($id);
        $frontpicture->delete();
        return redirect('staff/front_picture')->with('success', 'La suppression a été effectué avec succes');
    }
}
