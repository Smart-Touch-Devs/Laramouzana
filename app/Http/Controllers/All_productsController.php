<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\pdf;
use App\Models\pictures;
use App\Models\products;
use Illuminate\Http\Request;

class All_productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = categories::all();
        $products = products::where('stock', '!=', '0')->orderBy('created_at', 'DESC')->paginate(12);
        return view('products.all_products', compact('categories', 'products'));
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
            'product_name' => 'required|string|',
            'category_id' => 'integer',
            'stock' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'product_desc' => 'required|string|'
        ]);

        $input = $request->all();

        if ($pdf = $request->file('pdf1')) {
            $destinationPath = 'pdf/pdf_caracteristique/';
            $pdfDesc = implode('_', explode(' ', $request->product_name)) . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfDesc);
            $input['pdf1'] = "$pdfDesc";
        };
        if ($pdf = $request->file('pdf2')) {
            $destinationPath = 'pdf/pdf_notice/';
            $pdfDesc = implode('_', explode(' ', $request->product_name)) . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfDesc);
            $input['pdf2'] = "$pdfDesc";
        };
        if ($pdf = $request->file('pdf3')) {
            $destinationPath = 'pdf/pdf_presentation/';
            $pdfDesc = implode('_', explode(' ', $request->product_name)) . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfDesc);
            $input['pdf3'] = "$pdfDesc";
        };


        if ($picture = $request->file('picture1')) {
            $destinationPath = 'assets/product_Picture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture1'] = "$pic";
        };

        if ($picture = $request->file('picture2')) {
            $destinationPath = 'assets/product_Picture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture2'] = "$pic";
        };

        if ($picture = $request->file('picture3')) {
            $destinationPath = 'assets/product_Picture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture3'] = "$pic";
        };
        products::create($input);

        return redirect()->intended('staff/all_products')->with('success', 'Produits  ajouté avec succes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $product = products::find($id);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $products = products::find($id);
        $categories = categories::all();
        return view('products.edit', compact('products', 'categories'));
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
            'product_name' => 'required|string|',
            'category_id' => 'integer',
            'stock' => 'required|integer|',
            'price' => 'required|integer|',
            'delivery_time' => 'integer|nullable|',
            'delivery_time_rup' => 'integer',
            'product_desc' => 'required|string|',
        ]);
        $input = [
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
            'price' => $request->price,
            'delivery_time' => $request->delivery_time,
            'product_desc' => $request->product_desc,
        ];
        if ($pdf = $request->file('pdf1')) {
            $destinationPath = 'pdf/pdf_caracteristique/';
            $pdfDesc = implode('_', explode(' ', $request->product_name)) . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfDesc);
            $input['pdf1'] = "$pdfDesc";
        }
        if ($pdf = $request->file('pdf2')) {
            $destinationPath = 'pdf/pdf_notice/';
            $pdfDesc = implode('_', explode(' ', $request->product_name)) . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfDesc);
            $input['pdf2'] = "$pdfDesc";
        }
        if ($pdf = $request->file('pdf3')) {
            $destinationPath = 'pdf/pdf_presentation/';
            $pdfDesc = implode('_', explode(' ', $request->product_name)) . "." . $pdf->getClientOriginalExtension();
            $pdf->move($destinationPath, $pdfDesc);
            $input['pdf3'] = "$pdfDesc";
        }

        if ($picture = $request->file('picture1')) {
            $destinationPath = 'assets/product_Picture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture1'] = "$pic";
        }

        if ($picture = $request->file('picture2')) {
            $destinationPath = 'assets/product_Picture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture2'] = "$pic";
        };

        if ($picture = $request->file('picture3')) {
            $destinationPath = 'assets/product_Picture/';
            $pic = date('Ymdhis') . "." . $picture->getClientOriginalExtension();
            $picture->move($destinationPath, $pic);
            $input['picture3'] = "$pic";
        }
        products::whereId($id)->update($input);

        return redirect()->route('all_products.index')->with('success', 'Mise à jours effectué avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $all_products = products::find($id);
        $all_products->delete();
        return redirect('staff/all_products')->with('success', 'La suppression a été effectué avec succes');
    }
}
