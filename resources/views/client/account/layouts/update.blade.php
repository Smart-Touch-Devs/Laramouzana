@extends('client.account.base')

@section('accountPart')

<div class="w-75 my-5 mx-auto">
    <div class="row justify-content-between">
        <h3 class="font-weight-bolder">Modifier mes informations</h3>
        <div>
            <a href="{{ route('account.changePw') }}"><button class="btn btn-secondary px-5">Modifier le mot de passe</button></a>
        </div>
    </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Félicitation!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Session::forget('success')}}
        @endif
        <form class="js-validate my-5" action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="withdrawAmount">Nom <span class="text-danger">*</span></label>
                    <input type="lastname" class="form-control" name="lastname" id="lastname" placeholder="Entrez votre nom" value="{{ Auth::user()->firstname }}" required><br>
                    @error('lastname')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="firstname">Prénom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Entrez votre prénom" value="{{ Auth::user()->lastname }}" required><br>
                    @error('firstname')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}" required><br>
                    @error('email')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="birthday">Date de naissance <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="birthday" id="birthday" value="{{ Auth::user()->birthday }}" required><br>
                    @error('birthday')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="phone">Numéro de téléphone <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Votre numéro de téléphone" value="{{ Auth::user()->phone }}" required><br>
                    @error('phone')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="country">Pays
                        <span class="text-danger">*</span>
                    </label>
                    <select id="country" class="option form-control" name="country" placeholder="Choisir votre pays" required><br>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if (Auth::user()->clientCountry->countryName === $country->countryName) selected="selected" @endif>{{ $country->countryName }}</option>
                        @endforeach
                    </select>
                    @error('country')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="city">Ville
                        <span class="text-danger">*</span>
                    </label>
                    <select class="option form-control" id="city" name="city" placeholder="Choisir votre ville" required><br>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}" @if (Auth::user()->clientCity->cityName === $city->cityName) selected="selected" @endif>{{ $city->cityName }}</option>
                        @endforeach
                    </select>
                    @error('city')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="cnib">Code CNIB <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="cnib" id="cnib" placeholder="Ex:B16XXXXXXX" value="@if(Auth::user()->cnib !== null) {{ Auth::user()->cnib }} @endif" required><br>
                    @error('cnib')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="selfie">Entrez une photo selfie de vous tenant votre CNIB</label>
                    <input type="file" accept="image/*" class="form-control" name="selfie" id="selfie" placeholder="Votre numéro de téléphone"><br>
                    @error('selfie')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="card_recto">Photo recto de la CNIB</label>
                    <input type="file" accept="image/*" class="form-control" name="card_recto" id="card_recto"><br>
                    @error('card_recto')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-md-6 col-12">
                    <label class="form-label" for="card_verso">Photo verso de la CNIB</label>
                    <input type="file" accept="image/*" class="form-control" name="card_verso" id="card_verso"><br>
                    @error('card_verso')
                    <span class="text-danger font-weight-bold">{{ $message }}</span>
                    @enderror
                </div>
                <div class="js-form-message form-group col-12">
                    <button type="submit" class="btn btn-primary-dark-w px-5">Envoyer</button>
                </div>
            </div>
        </form>
</div>

@endsection
