@extends('client.base')

@section('main')
        <main id="content" role="main">

            <div class="container">
                <!-- Single Product Body -->

                <div class="mb-8">
                    <div class="row mt-19">
                        <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                                    <img class="" width="100%" height="100%" src="{{asset('assets/product_Picture').'/'.$product_details->picture1}}" alt="Image Description">
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                            <div class="mb-2">
                                <a href="#" class="font-size-12 text-gray-5 mb-2 d-inline-block">{{$product_details->category->category_name}}</a>
                                <h2 class="font-size-25 text-lh-1dot2">{{strip_tags($product_details->product_name)}}</h2>
                                <div class="my-4">
                                    <p class="font-size-14  text-gray-110">
                                        {{strip_tags($product_details->product_desc)}}
                                    </p>
                                </div>
                               <div class="row">
                                <div class="col-md-4 col-lg-4 col-xs-12">
                                 @if ($product_details->pdf1 === null )
                                 <div class="alert alert-primary text-white" role="alert">
                                    Aucun Pdf
                                  </div>
                                 @else
                                 <a href="{{asset('pdf/pdf_notice').'/'.$product_details->pdf1}}" target="_blank"><img alt="" class="" width="60px" height="70px" src="{{asset('/pdf/PDF.jpg')}}"><div class="ml-1 font-weight-bold">
                                    notice</div></a>
                                 @endif
                                </div>
                                    <div class="col-md-4 col-lg-4 col-xs-12">
                                    @if ($product_details->pdf2 === null)
                                    <div class="alert alert-primary text-white" role="alert">
                                        Aucun Pdf
                                      </div>
                                    @else
                                    <a href="{{asset('pdf/pdf_caracteristique').'/'.$product_details->pdf2}}" target="_blank">
                                        <img alt="" class="" width="60px" height="70px" src="{{asset('/pdf/PDF.jpg')}}"><span class="font-weight-bold">caracteristique</span></a>
                                    @endif
                                    </div>
                                        @if ($product_details->pdf3 === null)
                                        <div class="alert alert-primary text-white" role="alert">
                                            Aucun Pdf
                                          </div>
                                        @else
                                        <a href="{{asset('pdf/pdf_presentation').'/'.$product_details->pdf3}}">
                                            <img alt="" class="" width="60px" height="70px" src="{{asset('/pdf/PDF.jpg')}} "target="_blank"><span class="font-weight-bold">présentation</span></a>
                                        @endif
                                    <div class="col-md-4 col-lg-4 col-xs-12">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-4 col-xs-12">
                                           @if ($product_details->picture1 === null)
                                           <div class="alert alert-primary text-white" role="alert">
                                            Aucun image
                                          </div>
                                           @else
                                           <img class="" width="100%" height="100%" src="{{asset('assets/product_Picture').'/'.$product_details->picture1}}" alt="Image Description">
                                           @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xs-12">
                                            @if ($product_details->picture2 === null)
                                            <div class="alert alert-primary text-white" role="alert">
                                                Aucun image
                                              </div>
                                           @else
                                           <img class="" width="100%" height="100%" src="{{asset('assets/product_Picture').'/'.$product_details->picture2}}" alt="Image Description">
                                           @endif
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-xs-12">
                                            @if ($product_details->picture3 === null)
                                            <div class="alert alert-primary text-white" role="alert">
                                                Aucun image
                                              </div>
                                            @else
                                            <img class="" width="100%" height="100%" src="{{asset('assets/product_Picture').'/'.$product_details->picture3}}" alt="Image Description">
                                            @endif
                                        </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                        <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                            <div class="mb-2">
                                <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
                                    <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">Stock disponible: <span class="text-green font-weight-bold">{{ $product_details->stock }}</span></div>
                                    <div class="mb-3">
                                        <div class="font-size-36">{{ $product_details->price }} FCFA</div>
                                    </div>
                                    <div class="mb-4">
                                        <h6 class="font-size-14">Quantité</h6>
                                        <!-- Quantity -->
                                        <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
                                            <div class="js-quantity row align-items-center">
                                                <div class="col">
                                                    <input class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text" value="1">
                                                </div>
                                                <div class="col-auto pr-1">
                                                    <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-minus btn-icon__inner"></small>
                                                    </a>
                                                    <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0" href="javascript:;">
                                                        <small class="fas fa-plus btn-icon__inner"></small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Quantity -->
                                    </div>

                                    <div class="mb-3 pb-0dot5">
                                        <a href="#" class="btn btn-block btn-primary-dark"><i class="ec ec-add-to-cart mr-2 font-size-20"></i> Ajouté au panier</a>
                                    </div>
                                    <div class="mb-3">
                                        @if (auth()->check())
                                        <a href="#" class="btn btn-block btn-dark">Commander</a>
                                        @else

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

@endsection
