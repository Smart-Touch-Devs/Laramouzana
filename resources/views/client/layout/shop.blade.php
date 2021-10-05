@extends('client.base')
@section('main')
<main id="content" role="main">
    <!-- breadcrumb -->
    <div class="bg-gray-13 bg-md-transparent">
        <div class="container">
            <!-- breadcrumb -->
            <div class="my-md-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                href="../home/index.html">Accueil</a></li>
                        <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Boutique
                        </li>
                    </ol>
                </nav>
            </div>
            <!-- End breadcrumb -->
        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="container-fluid">
        <div class="row justify-content-center mb-8">
            <div class="col-xl-9  col-wd-9gdot5">
                <!-- End shop-control-bar Title -->
                <!-- Shop-control-bar -->
                <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                    <div class="d-xl-none">
                        <!-- Account Sidebar Toggle Button -->
                        <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:;"
                            role="button" aria-controls="sidebarContent1" aria-haspopup="true" aria-expanded="false"
                            data-unfold-event="click" data-unfold-hide-on-scroll="false"
                            data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                            data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                            data-unfold-duration="500">
                            <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                        </a>
                        <!-- End Account Sidebar Toggle Button -->
                    </div>
                    <div class="px-3 d-none d-xl-block">
                        <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-one-example1-tab" data-toggle="pill"
                                    href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                    aria-selected="false">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-th"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill"
                                    href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                    aria-selected="true">
                                    <div class="d-md-flex justify-content-md-center align-items-md-center">
                                        <i class="fa fa-list"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- End Shop-control-bar -->
                <!-- Shop Body -->
                <!-- Tab Content -->
                <div class="tab-content  " id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active " id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            @foreach ( $show_all_products  as $show_all_product)
                            <li class="col-md-3  col-xs-12  col-wd-2gdot4 product-item">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a
                                                    href="{{ route('cat1_product',$show_all_product->id) }}"
                                                    class="font-size-12 text-gray-5">{{$show_all_product->product_name}}</a></div>
                                            <h5 class="mb-1 product-item__title"><a
                                                    href="{{ route('cat1_product',$show_all_product->id) }}"
                                                    class="text-blue font-weight-bold">{{ strip_tags($show_all_product->product_desc) }}</a></h5>
                                            <div class="mb-2">
                                                <a href="{{ route('cat1_product',$show_all_product->id) }}" class="d-block text-center"><img  src="{{asset('assets/product_Picture').'/'.$show_all_product->picture1}}" alt="Image Description" width="212px" height="200px"></a>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    <div class="text-gray-100">{{ $show_all_product->price }} FCFA</div>
                                                </div>
                                                <div class="d-none d-xl-block prodcut-add-cart">
                                                    <a href="#" data-product_info='{"productId": {{ $show_all_product->id }}, "productName": "{{ $show_all_product->product_name }}", "price": {{ $show_all_product->price }}, "img": "{{$show_all_product->picture1}}"}' class="btn-add-cart add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                        aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                        @foreach ( $show_all_products  as $show_all_product)
                        <ul class="d-block list-unstyled products-group prodcut-list-view">
                            <li class="product-item remove-divider">
                                <div class="product-item__outer w-100">
                                    <div class="product-item__inner remove-prodcut-hover py-4 row">
                                        <div class="product-item__header col-6 col-md-4">
                                            <div class="mb-2">
                                                <a href="../shop/single-product-fullwidth.html"
                                                    class="d-block text-center"><img  src="{{asset('assets/product_Picture').'/'.$show_all_product->picture1}}" alt="Image Description" width="212px" height="200px"></a>
                                            </div>
                                        </div>
                                        <div class="product-item__body col-6 col-md-5">
                                            <div class="pr-lg-10">
                                                <h5 class="mb-2 product-item__title"><a
                                                        href="../shop/single-product-fullwidth.html"
                                                        class="text-blue font-weight-bold">{{$show_all_product->product_name}}</a></h5>
                                                <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                                                    <li class="line-clamp-1 mb-1 list-bullet">{{strip_tags($show_all_product->product_desc)}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-item__footer col-md-3 d-md-block">
                                            <div class="mb-3">
                                                <div class="prodcut-price mb-2">
                                                    <div class="text-gray-100">{{ $show_all_product->price }} FCFA</div>
                                                </div>
                                                <div class="prodcut-add-cart">
                                                    <a href="#" data-product_info='{"productId": {{ $show_all_product->id }}, "productName": "{{ $show_all_product->product_name }}", "price": {{ $show_all_product->price }}, "img": "{{$show_all_product->picture1}}"}' class=" add-cart btn-add-cart btn-primary transition-3d-hover"><i class="ec ec-add-to-cart"></i></a>
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
        {{$show_all_products->links()}}
    </div>

</main>

@endsection
