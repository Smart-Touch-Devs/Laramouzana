@extends('client.base')
@section('main')
     <!-- ========== MAIN CONTENT ========== -->
     <main id="content" role="main" class="cart-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="../home/index.html">Accueil</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Panier</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Panier</h1>
            </div>
            <div class="errorOrSuccess">

            </div>
            <div class="mb-10 cart-table">
                @auth
                <form class="mb-4" action="{{ route('client.commandMany') }}" method="post" id="commandFromCart">
                @endauth
                    <table class="table" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Produit</th>
                                <th class="product-price">Prix</th>
                                <th class="product-quantity w-lg-15">Nombre</th>
                                <th class="product-subtotal">Prix total</th>
                            </tr>
                        </thead>
                        <tbody id="productList">

                        </tbody>
                    </table>
                    <div class="d-md-flex mt-5 justify-content-center">
                        <button type="button" id="updateCard" class="btn btn-soft-secondary mb-3 mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto">Vider le panier</button>
                        @auth
                        <button type="submit" class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block">Commander</button>
                        @endauth
                    </div>
                    @auth
                </form>
                    @endauth
                    @if (!Auth::check())
                    <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
                        <strong>Il faut être connecté pour pouvoir effectuer une commande </strong>
                      </div>
                    @endif
            </div>
        </div>
    </main>
    <script src="{{ asset('dist/js/cart.js') }}"></script>
@endsection
