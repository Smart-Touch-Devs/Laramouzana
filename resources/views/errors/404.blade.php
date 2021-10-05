@extends('layout/top-menu')

@section('head')
    <title>Page non trouvé</title>
@endsection

@section('content')
    <div class="container">
        <!-- BEGIN: Error Page -->
        <div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
            <div class="-intro-x lg:mr-20">
                <img alt="Midone Tailwind HTML Admin Template" class="h-48 lg:h-auto" src="{{ asset('dist/images/error-illustration.svg') }}">
            </div>
            <div class="text-white mt-10 lg:mt-0">
                <div class="intro-x text-6xl font-medium">404</div>
                <div class="intro-x text-xl lg:text-3xl font-medium">Oops.Cette page n'a pas été trouvée!.</div>
                <div class="intro-x text-lg mt-3">Vous avez entré une mauvaise adresse ou cette page a été déplacée.</div>
                <a href="#"><button class="intro-x button button--lg border border-white dark:border-dark-5 dark:text-gray-300 mt-10">Revenir en arrière</button></a>
            </div>
        </div>
        <!-- END: Error Page -->
    </div>
@endsection
