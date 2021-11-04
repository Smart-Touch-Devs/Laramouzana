<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\FrontPicture1;
use App\Models\MainPicture;
use App\Models\products;
use App\Models\PubPicture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = categories::get();
        $categoriesIds = [];
        foreach ($categories as $category) {
            array_push($categoriesIds, $category->id);
        }
        if (count($categoriesIds) === 0) return view('client.layout.home', ['empty' => 'Aucun produits disponible!']);
        else
            $idsKeys = array_rand($categoriesIds, 2);
        $ids = [];
        foreach ($idsKeys as $key) {
            array_push($ids, $categoriesIds[$key]);
        }
        $display_prods_cat_1 = products::where('category_id', '=', $ids[0])->limit(4)->get();
        $display_prods_cat_2 = products::where('category_id', '=', $ids[1])->limit(4)->get();
        $display_prods = [$display_prods_cat_1, $display_prods_cat_2];
        $product_cat_names = [categories::where('id', $ids[0])->get('category_name'), categories::where('id', $ids[1])->get('category_name')];
        $product_cat_pics = [categories::where('id', $ids[0])->get('cat_picture'), categories::where('id', $ids[1])->get('cat_picture')];
        //Produit recemment ajoutés
        $new_products = products::orderBy('created_at', 'DESC')->limit(6)->get();
        $frontpictures = FrontPicture1::latest()->limit(1)->get();
        // $mainPictures = MainPicture::all();

        return view('client.layout.home', ['categories' => $categories, 'display_prods' => $display_prods, 'product_cat_names' => $product_cat_names, 'display_prods_cat_1' => $display_prods_cat_1, 'display_prods_cat_2' => $display_prods_cat_2, 'new_products' => $new_products, 'product_cat_pics' => $product_cat_pics, 'frontpictures' => $frontpictures]);
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
        $new_products = products::find($id);
        return view('client.layout.show', compact('new_products'));
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
