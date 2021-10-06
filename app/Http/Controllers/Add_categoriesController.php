<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class Add_categoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::all();
        return view('categories.add_categories', compact('categories'));
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
            'category_name' => 'required|string|',
            'category_desc' => 'required|string|',

        ]);
        $input = $request->all();

        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/categorie_Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        };
        categories::create($input);
        return redirect()->intended('staff/add_categories')->with('success', 'Catégorie  ajouté avec succes');
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
        $categories = categories::find($id);
        return view('categories.edit', compact('categories'));
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
            'category_name' => 'required|string|',
            'category_desc' => 'required|string|'
        ]);

        $input = [
            'category_name' => $request->category_name,
            'category_desc' => $request->category_desc,
        ];
        if ($picture = $request->file('picture')) {
            $destinationPath = 'assets/categorie_Picture';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture'] = "$pic";
        };

        categories::whereId($id)->update($input);
        return redirect()->intended('staff/add_categories')->with('success', 'Categorie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = categories::find($id);
        $categories->delete();
        return redirect()->intended('staff/add_categories')->with('success', 'La catégorie a été retiré avec succes');
    }

    public function getCategory($id)
    {
        return categories::find($id);
    }
}
