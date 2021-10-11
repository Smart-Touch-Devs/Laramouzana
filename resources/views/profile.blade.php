@extends('layout/top-menu')

@section('subhead')
<title>Profile</title>
@endsection

@section('subcontent')

<div>
    <div class="profileCard">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5">
                <h2 class="font-medium text-base mr-auto">
                    Mes informations
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-2">
                        <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 text-center" style="font-size: 75px;">
                            <i class="icofont-user-alt-3"></i>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-10">
                        <div>
                            <label>Nom</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ Auth::guard('admin')->user()->first_name }}" disabled>
                        </div>
                        <div>
                            <label>Prénom</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ Auth::guard('admin')->user()->last_name }}" disabled>
                        </div>
                        <div>
                            <label>Date de naissance</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ date('d/M/Y', strtotime(Auth::guard('admin')->user()->birthday)) }}" disabled>
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ Auth::guard('admin')->user()->email }}" disabled>
                        </div>
                        <div>
                            <label>Téléphone</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ Auth::guard('admin')->user()->phone }}" disabled>
                        </div>
                        <div>
                            <label>Ville</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ Auth::guard('admin')->user()->Country->countryName }}" disabled>
                        </div>
                        <div>
                            <label>Pays</label>
                            <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="{{ Auth::guard('admin')->user()->City->cityName }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->
    </div>
</div>

<style>
    .profileCard {
        width: 75%;
        margin: auto;
    }

    @media(max-width: 767px) {
        .profileCard {
        width: 100%;
        margin: auto;
    }
    }
</style>

@endsection
