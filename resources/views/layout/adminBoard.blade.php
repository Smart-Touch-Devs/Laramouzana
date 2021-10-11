@extends('layout/top-menu')

@section('subhead')
    <title>Dashboard - Laramouzana</title>
@endsection

@section('subcontent')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            @if($message = Session::get('success'))
                <div class="col-span-12 rounded-md flex justify-between px-5 py-4 my-2 bg-theme-18 text-theme-9 successAlert">
                    <div class="flex">
                        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                        <span>{{ $message }}</span>
                        {{Session::forget('success')}}
                    </div>
                <button class="closeBtn"><i data-feather="x" style="cursor: pointer;" class="w-4 h-4 ml-auto"></i></button>
                </div>
            @endif
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Statistiques générales</h2>
                    <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10">
                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>Récharger la page
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                                    <div class="text-base text-gray-600 mt-1 ml-2">Produits vendus</div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $saleProductsNumber }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                    <div class="text-base text-gray-600 mt-1 ml-2">Nouvelles commandes</div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $newCommandsNumber }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                    <div class="text-base text-gray-600 mt-1 ml-2">Stock total</div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $availableProductsNumber }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="text-base text-gray-600 mt-1 ml-2">Nombre de clients</div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $clientsNumber }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Statistiques de ventes</h2>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-theme-20 dark:text-gray-300 text-lg xl:text-xl font-bold">{{ $currentMonthIncoming . ' FCFA' }}</div>
                                <div class="text-gray-600 dark:text-gray-600">Ce mois-ci</div>
                            </div>
                            <div class="w-px h-12 border border-r border-dashed border-gray-300 dark:border-dark-5 mx-4 xl:mx-6"></div>
                            <div>
                                <div class="text-gray-600 dark:text-gray-600 text-lg xl:text-xl font-medium">{{ $lastMonthIncoming . ' FCFA' }}</div>
                                <div class="text-gray-600 dark:text-gray-600">Le mois passé</div>
                            </div>
                        </div>
                    </div>
                    <div class="report-chart">
                        <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Les produits les plus vendus</h2>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <ul class="font-semibold">
                        @foreach ($mostSaledProducts as $mostSaledProduct)
                            <li class="py-2 border-b flex justify-between">
                                <span>{{ $mostSaledProduct->products->product_name }}</span>
                                <span class="text-theme-9">{{ $mostSaledProduct->quantity * $mostSaledProduct->products->price }} FCFA</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Les produits par stock(Décroissant)</h2>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <ul class="font-semibold">
                        @foreach ($orderDescProducts as $product)
                            <li class="py-2 border-b flex justify-between">
                                <span>
                                    {{ $product->product_name }}
                                </span>
                                <span class="text-theme-6">
                                    {{ $product->stock }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Official Store -->

        </div>
        <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
            <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-8">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Transactions</h2>
                    </div>
                    <div class="mt-5">
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">Aboubakary</div>
                                        <div class="text-gray-600 text-xs">Cissé</div>
                                    </div>
                                    <div class="#">100.000 FCFA</div>
                                </div>
                            </div>
                        <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 dark:border-dark-5 text-theme-16 dark:text-gray-600">View More</a>
                    </div>
                </div>
                <!-- END: Transactions -->
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.closeBtn').addEventListener('click', function() {
            document.querySelector('.successAlert').classList.add('hidden')
        })
    </script>
@endsection
