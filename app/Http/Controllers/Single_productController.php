<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;

class Single_productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categories = categories::all();
        $product_details = products::find($id);

        // dd($product_details);
        return view('client.layout.single_product', compact('categories', 'product_details'),);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cat1_product($id)
    {
        $categories = categories::all();
        $display_prods_cat_1  = products::find($id);
        return view('client.layout.cat1_product', compact('categories', 'display_prods_cat_1'));
    }

    public function getSingle($id) {
        $product = products::find($id);
        dd($product->picture1);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cat2_product($id)
    {
        $categories = categories::all();
        $display_prods_cat_2  = products::find($id);
        return view('client.layout.cat2_product', compact('categories', 'display_prods_cat_2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop_product($id)

    {
        $categories = categories::all();
        $display_prods_shop  = products::find($id);
        return view('client.layout.shop_product', compact('categories', 'display_prods_shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
