@extends('client.account.base')

@section('accountPart')
<div class="w-75 mx-auto">
    <div class="row justify-content-between align-items-center px-2 my-5 rounded"  style="background: #ece9e9;">
        <div style="width: fit-content; height: fit-content;">
            <h1 style="color: #3D3D3;" class="font-weight-bold mt-1">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h1>
        </div>
        <div class="mt-5">
            <p style="font-size: 24px;">
                <strong style="color: #3D3D3D;">Solde : </strong>
                <span>22500 FCFA</span>
                <span style="font-size: 17px;">(plus bonus)</span>
            </p>
        </div>
    </div>
    <div class="row mt-5 justify-content-between">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Email : </strong>
                <span>{{ Auth::user()->email }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Téléphone : </strong>
                <span>{{ Auth::user()->phone }}</span>
            </p>
        </div>
    </div>
    <div class="row my-2 justify-content-between">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Code affilié : </strong>
                <span>{{ Auth::user()->affiliate_code }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;" class="ml-2">
                <strong style="color: #3D3D3D;">Parrain : </strong>
                <span>{{ Auth::user()->sup_code === NULL ? 'Non parrainé' : Auth::user()->sup_code }}</span>
            </p>
        </div>
    </div>
    <div class="row my-2 justify-content-between text-left">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">CNIB : </strong>
                <span>{{ Auth::user()->cnib === NULL ? 'Aucun' : Auth::user()->cnib }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Date de naissance : </strong>
                <span>{{ date('d/M/Y', strtotime(Auth::user()->birthday)) }}</span>
            </p>
        </div>
    </div>
    <div class="row my-2 justify-content-between text-left">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Pays : </strong>
                <span>{{ Auth::user()->clientCountry->countryName }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Ville : </strong>
                <span>{{ Auth::user()->clientCity->cityName }}</span>
            </p>
        </div>
    </div>
@endsection
