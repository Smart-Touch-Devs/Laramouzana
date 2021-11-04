@extends('client.base')

@section('main')
<main id="content" role="main">
    <!-- Slider Section -->
    <div class="mb-4">
        <div class="bg-img-hero" style="background-image: url(../../assets/img/1920X422/img1.jpg);">
            <div class="container min-height-438 overflow-hidden">

            </div>
        </div>
    </div>
    <!-- End Slider Section -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-wd-auto d-none d-xl-block">
                <div class="max-width-270 min-width-270 pt-xl-13 mt-xl-13">
                    <!-- Image Banner -->
                    <aside class="mb-8 bannerSection">
                        <a href="../shop/shop.html" class="d-block">
                            <img class="img-fluid" src="{{ asset('assets/img/picture_lat/img1.jpg') }}" alt="Image Description">
                        </a>
                    </aside>
                    <!-- End Image Banner -->
                    <!-- Feature Product -->
                    <aside class="mb-8 bannerSection">
                        <!-- Featured Products -->
                        <div class="position-relative">
                            <div class="border-bottom border-color-1 mb-2">
                                <h3 class="section-title mb-0 pb-3 font-size-18">Produits en vogue</h3>
                            </div>
                                <div class=" products-group">
                                    <div class="product-item remove-divider text-center">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner remove-prodcut-hover ">
                                                <div class="product-item__body pb-xl-2">
                                                    <aside class="mb-8 bannerSection">
                                                        <a href="../shop/shop.html" class="d-block">
                                                            <img class="img-fluid" src="{{ asset('assets/img/picture_lat/img1.jpg') }}" alt="Image Description">
                                                        </a>
                                                    </aside>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- End Featured Products -->
                    </aside>
                    <!-- End Feature Product -->
                </div>
            </div>
            @if (isset($empty))
                <h3 class="mx-auto">{{ $empty }}</h3>
            @else
            <div class="col-xl-9 col-wd-auto max-width-1130">



                <!-- Tab Prodcut Section -->
                <div class="mb-6">
                    <!-- Nav Classic -->
                    <div class="position-relative bg-white text-center z-index-2">
                        <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active js-animation-link" id="pills-one-example1-tab" data-toggle="pill" href="#pills-one-example1" role="tab" aria-controls="pills-one-example1" aria-selected="true"
                                    data-target="#pills-one-example1"
                                    data-link-group="groups"
                                    data-animation-in="slideInUp">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                       Produits recemments ajoutés
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">
                                @foreach ($new_products as $new_product)
                                <li class="col-6 col-md-4 col-xl product-item newProduct">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a href="{{ route('single_product',$new_product->id) }}" class="font-size-12 text-gray-5 text-capitalize">{{ $new_product->product_name }}</a></div>
                                                <h5 class="mb-1 product-item__title"><a href="{{ route('single_product',$new_product->id) }}" class="text-blue font-weight-bold  text-capitalize">{{strip_tags( $new_product->product_desc )}}</a></h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('single_product',$new_product->id) }}" class="d-block text-center"><img src="{{asset('assets/product_Picture').'/'.$new_product->picture1}}" width="135px" height="127px" alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100 font-size-14 ">{{ $new_product->price }} FCFA</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">

                                                        <a href="#" data-product_info='{"productId": {{ $new_product->id }}, "productName": "{{ $new_product->product_name }}", "price": {{ $new_product->price }}, "img": "{{$new_product->picture1}}"}' class=" add-cart btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <a href="../shop/shop.html" class="d-block text-gray-90">
                        <div class="bg-img-hero pt-3" style="background-image: url(../../assets/img/1400X206/fond_solaire.jpg);">
                            <div class="space-top-2-md p-4 pt-4 pt-md-5 pt-lg-6 pt-xl-5 pb-lg-4 px-xl-8 px-lg-6">
                                <div class="flex-horizontal-center overflow-auto overflow-md-visble">
                                    <h1 class="text-lh-38 font-size-24 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">SHOP AND <strong>SAVE BIG</strong> ON HOTTEST TABLETS</h1>
                                    <div class="flex-content-center ml-4 flex-shrink-0">
                                        <div class="bg-primary rounded-lg px-6 py-2">
                                            <em class="font-size-14 font-weight-light">STARTING AT</em>
                                            <div class="font-size-30 font-weight-bold text-lh-1">
                                                <sup class="">$</sup>79<sup class="">99</sup>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="mb-8">
                    <div class=" d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                        <h3 class="section-title mb-0 pb-2  text-capitalize font-size-22">{{ $product_cat_names[0][0]->category_name }}</h3>
                    </div>
                    <div class="row">
                        <div class="col-auto bannerSection">
                            <a href="../shop/shop.html" class="d-block">
                                <img alt="" width="212px" height="305px" src="{{asset('assets/categorie_Picture').'/'.$product_cat_pics[0][0]->cat_picture }}">
                            </a>
                        </div>
                        <div class="col">
                            <ul class="row list-unstyled products-group no-gutters">
                                @foreach ($display_prods_cat_1  as $display_prods_cat1)
                                <li class="col-6 col-md-6 col-wd-3 product-item">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a href="{{ route('cat1_product',$display_prods_cat1->id) }}" class="font-size-12 text-gray-5 text-capitalize">{{ $display_prods_cat1->product_name }}</a></div>
                                                <h5 class="mb-1 product-item__title"><a href="{{ route('cat1_product',$display_prods_cat1->id) }}" class="text-blue font-weight-bold text-capitalize">{{ strip_tags($display_prods_cat1->product_desc) }}</a></h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('cat1_product',$display_prods_cat1->id) }}" class="d-block text-center"><img  src="{{asset('assets/product_Picture').'/'.$display_prods_cat1->picture1}}" alt="Image Description" width="166px" height="170px"></a>
                                                  </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100 font-size-18">{{$display_prods_cat1->price}} FCFA</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" data-product_info='{"productId": {{ $display_prods_cat1->id }}, "productName": "{{ $display_prods_cat1->product_name }}", "price": {{ $display_prods_cat1->price }}, "img": "{{$display_prods_cat1->picture1}}"}' class="btn-add-cart btn-primary add-cart transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mb-8">
                    <div class=" d-flex justify-content-between border-bottom border-color-1 flex-md-nowrap flex-wrap border-sm-bottom-0">
                        <h3 class="section-title mb-0 pb-2 font-size-22">{{ $product_cat_names[1][0]->category_name }}</h3>
                    </div>
                    <div class="row">
                        <div class="col-auto bannerSection">
                            <a href="../shop/shop.html" class="d-block">
                                <img alt="" width="212px" height="305px" src="{{asset('assets/categorie_Picture').'/'.$product_cat_pics[1][0]->cat_picture }}">
                            </a>
                        </div>
                        <div class="col">
                            <ul class="row list-unstyled products-group no-gutters">
                                @foreach ($display_prods_cat_2  as $display_prods_cat2)
                                <li class="col-6 col-md-6 col-wd-3 product-item">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a href="{{ route('cat2_product',$display_prods_cat2->id) }}" class="font-size-12 text-gray-5 text-capitalize">{{$display_prods_cat2->product_name}}</a></div>
                                                <h5 class="mb-1 product-item__title"><a href="{{ route('cat2_product',$display_prods_cat2->id) }}"" class="text-blue font-weight-bold text-capitalize">{{ strip_tags($display_prods_cat2->product_desc) }}</a></h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('cat2_product',$display_prods_cat2->id) }}"" class="d-block text-center"><img  src="{{asset('assets/product_Picture').'/'.$display_prods_cat2->picture1}}"  width="166px" height="170px" alt="Image Description"></a>
                                                </div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="prodcut-price">
                                                        <div class="text-gray-100 font-size-18">{{$display_prods_cat2->price}} FCFA</div>
                                                    </div>
                                                    <div class="d-none d-xl-block prodcut-add-cart">
                                                        <a href="#" data-product_info='{"productId": {{ $display_prods_cat2->id }}, "productName": "{{ $display_prods_cat2->product_name }}", "price": {{ $display_prods_cat2->price }}, "img": "{{$display_prods_cat2->picture1}}"}' class="btn-add-cart add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endif
    </div>

</main>
@endsection
