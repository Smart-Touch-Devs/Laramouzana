@extends('layout/top-menu')

@section('subhead')
    <title>Dashboard - Laramouzana</title>
@endsection
@section('subcontent')
<div id="form">
    <div class="intro-y box mt-5">
        <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
            <h2 class="font-size-16 font-semibold text-base mr-auto">
                Changer de mot de passe
            </h2>
        </div>
        <div class="p-5" id="responsive-table">

            <form action="{{ route('admin.changePw') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ Auth::guard('admin')->user()->id }}">
                <div class="mt-3">
                    <label>Votre nouveau mot de passe</label>
                    <input type="password" name="password" class="input w-full border mt-2" placeholder="Nouveau mot de passe" required>
                    @error('password')
                    <span class="font-medium text-theme-6">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label>Confirmez le nouveau mot de passe</label>
                    <input type="password" name="confirm_password" class="input w-full border mt-2" placeholder="Nouveau mot de passe" required>
                    @error('confirm_password')
                    <span class="font-medium text-theme-6">Veuillez confirmez le mot de passe</span>
                    @enderror
                </div>
                <button type="submit" class="button bg-theme-1 text-white mt-5">Modifier le mot de passe</button>

            </form>
        </div>
    </div>
</div>
<style>
    #form {
        width: 50%;
        margin: auto;
    }

    @media(max-width: 767px) {
        #form {
            width: 100%;
        }
    }
</style>
@endsection
