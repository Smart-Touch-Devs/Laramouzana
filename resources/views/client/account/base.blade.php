@extends('client.base')

@section('main')


<style>
    @media(max-width: 768px) {
        .li {
            width: 50% !important;
        }
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<div class="container my-5" style="font-family: Roboto;">
    <div class="row my-5">
        <div class="d-none d-md-block col-md-2 py-sm-3 rounded" style="background: #f8f8f8;">
            <ul class="navbar-nav u-header__navbar-nav text-center">
                <div class="row justify-content-center">
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.index') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto mt-sm-4 my-1 @if(Request::route()->uri === 'account') active @endif">Mes informations</a>
                    </li>
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.update') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1 @if(Request::route()->uri === 'account/update') active @endif">Modifier mes informations</a>
                    </li>
                </div>
                <div class="row justify-content-center">
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.depositIndex') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1 @if(Request::route()->uri === 'account/deposit') active @endif">Faire un dépôt</a>
                    </li>
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.withdrawIndex') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1 @if(Request::route()->uri === 'account/withdraw') active @endif">Demander un retrait</a>
                    </li>
                </div>
                <div class="row justify-content-center">
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.sendMoneyIndex') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1 @if(Request::route()->uri === 'account/send') active @endif">Faire un tranfert</a>
                    </li>
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.orders') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1 @if(Request::route()->uri === 'account/orders') active @endif">Mes achats</a>
                    </li>
                </div>
                <div class="row justify-content-center">
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('account.transactions') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1 @if(Request::route()->uri === 'account/transactions') active @endif">Mes transactions</a>
                    </li>
                    <li class="nav-item u-header__nav-item li">
                        <a href="{{ route('client.logout') }}" class="btn btn-soft-secondary mb-md-0 font-weight-normal px-5 px-md-4 px-lg-5 w-100 w-md-auto my-sm-4 my-1">Se déconnecter</a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="col-12 col-md-10">

            @yield('accountPart')

            @if (Request::route()->uri !== 'account/update')
                @if (Auth::user()->cnib === null || Auth::user()->selfie === null || Auth::user()->card_recto === null || Auth::user()->card_verso)
                <div class="alert alert-warning my-5">
                    <strong>Informations incomplètes : </strong>
                    <span>Veuillez renseigner certaines informations manquantes vous concernant comme la CNIB et les photos</span>
                </div>
                @endif
            @endif

        </div>
    </div>
</div>

@endsection

