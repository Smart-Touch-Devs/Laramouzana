@extends('layout/top-menu')

@section('subhead')
<title>CRUD Form - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<div class="intro-y col-span-12 lg:col-span-2">

</div>
<div class="intro-y col-span-12 lg:col-span-8 overflow-x-scroll">
    <div class="intro-y datatable-wrapper box p-5 ">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace">Nom</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Catégorie</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Stock</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Prix</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Delais de livraison</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">PDF</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Image1</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Image2</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Image3</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Description</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $product->product_name }}</div>
                    </td>
                    <td class="text-center border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $product->category->category_name }}</div>
                    </td>
                    <td class="text-center border-b">
                        <div class="font-medium whitespace-no-wrap">{{ $product->stock }}</div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center">
                            <div class="font-medium whitespace-no-wrap">{{ $product->price }}  FCFA</div>
                        </div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center ">
                            <div class="font-medium whitespace-no-wrap">
                                @if ($product->delivery_time === null)
                                  <div>
                                      <h3>Indisponible</h3>
                                  </div>
                                @else
                                <div class="font-medium whitespace-no-wrap">{{ $product->delivery_time }} Jours</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center ">
                            <div class="font-medium whitespace-no-wrap">
                                <img alt="" class="" width="50px" height="60px" src="{{asset('/pdf/PDF.jpg')}}">
                            </div>
                        </div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center ">
                            <div class="font-medium whitespace-no-wrap">

                                <img alt="" class="" src="{{asset('assets/product_Picture').'/'.$product->picture1}}">
                            </div>
                        </div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center ">
                            <div class="font-medium whitespace-no-wrap">
                                @if ($product->picture2 === null)
                                    <div>
                                        <h3>Aucune image</h3>
                                    </div>
                                @else
                                    <img alt="" class="" src="{{asset('assets/product_Picture').'/'.$product->picture2}}">
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center ">
                            <div class="font-medium whitespace-no-wrap">
                                @if ($product->picture2 === null)
                                <div>
                                    <h3>Aucune image</h3>
                                </div>
                            @else
                                <img alt="" class="" src="{{asset('assets/product_Picture').'/'.$product->picture3}}">
                            @endif
                            </div>
                        </div>
                    </td>
                    <td class="w-40 border-b">
                        <div class="flex items-center sm:justify-center ">
                            <div class="font-medium whitespace-wrap">{{ strip_tags( $product->product_desc )}} </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-right mt-5">
        <a href="{{asset('all_products')}}">
            <button type="submit" class="button w-28 bg-theme-1 text-white">Retour</button>
        </a>
    </div>
</div>
<div class="intro-y col-span-12 lg:col-span-2">

</div>
@endsection
