@extends('layout/top-menu')

@section('subhead')
<title>{{ $pageTitle }}</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-7">
        <div class="intro-y box mt-5">
            <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-size-16 font-semibold text-base mr-auto">
                    {{$lisTitle}}
                </h2>
            </div>
            <div class="p-5" id="responsive-table">
                <div class="preview">
                    @if ($message = Session::get('deleteSucessful'))
                    <div class="rounded-md flex justify-between px-5 py-4 mb-2 bg-theme-18 text-theme-9 successAlert">
                        <div class="flex">
                            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                            <span>{{ $message }}</span>
                            {{Session::forget('deleteSucessful')}}
                        </div>
                       <button class="closeBtn"><i data-feather="x" style="cursor: pointer;" class="w-4 h-4 ml-auto"></i></button>
                   </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Nom</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Prénom</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Addrese email</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Téléphone</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Detail</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($staffMembers as $staffMember)
                                <tr>
                                    <td class="border-b whitespace-no-wrap">{{ $staffMember->last_name }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $staffMember->first_name }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $staffMember->email }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $staffMember->phone }}</td>
                                    <td class="border-b whitespace-no-wrap">
                                        <a href="javascript:;" style="width: fit-content; height: fit-content;" class="detailBtn" data-toggle="modal" data-target="#userDetails" data-detail_url="{{ route('user.showStaff', $staffMember->id) }}">
                                            <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                                <span class="w-5 h-5 flex items-center justify-center">
                                                    <i data-feather="more-vertical" class="w-4 h-4"></i>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="border-b whitespace-no-wrap">
                                        <a href="javascript:;" style="width: fit-content; height: fit-content;" class="deleteUserbtn" data-toggle="modal" data-target="#delete-modal-preview" data-delete_url="{{ route('users.delete_staff', $staffMember->id) }}">
                                            <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white">
                                                <span class="w-5 h-5 flex items-center justify-center">
                                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                <div class="modal" id="delete-modal-preview">
                                    <div class="modal__content">
                                        <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Êtes vous sûr?</div>
                                            <div class="text-gray-600 mt-2">Voudriez-vous vraiment supprimer cet utilisteur?</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center">
                                             <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Annuler</button>
                                             <a href="#" id="confirmDeleteBtn"><button type="button" class="button w-24 bg-theme-6 text-white">Supprimer</button></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal" id="userDetails">
                                    <div class="modal__content">
                                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 dark:border-dark-5">
                                            <h2 class="text-lg font-semibold">Details sur l'utilisateur</h2>
                                        </div>
                                        <div class="w-full my-3 px-5" id="userData">
                                            <div class="flex" style="font-size: 16px;">
                                            </div>

                                        </div>
                                        <div class="px-5 py-3 text-left border-t border-gray-200 dark:border-dark-5">
                                            <button type="button" id="quit" data-dismiss="modal" class="button w-20 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Quitter</button>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y col-span-12 lg:col-span-5">
        <div class="intro-y box mt-5">
            <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-size-16 font-semibold text-base mr-auto">
                    {{$formTitle}}
                </h2>
            </div>
            <div class="p-5" id="responsive-table">
                @if($message = Session::get('success'))
                <div class="rounded-md flex justify-between px-5 py-4 mb-2 bg-theme-18 text-theme-9 successAlert">
                    <div class="flex">
                        <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                        <span>{{ $message }}</span>
                        {{Session::forget('success')}}
                    </div>
                   <button class="closeBtn"><i data-feather="x" style="cursor: pointer;" class="w-4 h-4 ml-auto"></i></button>
               </div>
                @endif
                <form action="{{ route('users.addStaffMember') }}" method="post">
                    @csrf
                    <div>
                        <label>Nom</label>
                        <input type="text" name="lastname" class="input w-full border mt-2" value="@if(old('lastname')) {{old('lastname')}} @endif" placeholder="Votre nom" required>
                    </div>
                    <div>
                        <label>Prénom</label>
                        <input type="text" name="firstname" class="input w-full border mt-2" value="@if(old('firstname')) {{old('firstname')}} @endif" placeholder="Votre prénom" required>
                    </div>
                    <input type="hidden" name="role" class="input w-full border mt-2" value="{{ $userRole }}" required>
                    <div>
                        <label>Addresse email</label>
                        <input type="email" name="email" class="input w-full border mt-2" value="@if(old('email')) {{old('email')}} @endif" placeholder="exemple@gmail.com" required>
                        @error('email')
                        <span class="font-medium text-theme-6">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label>Confirmez l'addresse email</label>
                        <input type="email" name="confirm_email" class="input w-full border mt-2" placeholder="exemple@gmail.com" required>
                    </div>
                    <div class="mt-3">
                        <label>Date de naissance</label>
                        <input type="date" name="birthday" class="input w-full border mt-2" data-single-mode="true" value="@if(old('birthday')) {{old('birthday')}} @endif" required>
                    </div>
                    <div class="mt-3">
                        <label>Numéro de téléphone</label>
                        <input type="tel" name="phone" class="input w-full border mt-2" value="@if(old('phone')) {{ old('phone') }} @endif" placeholder="60-XX-XX-XX" required>
                        @error('phone')
                        <span class="font-medium text-theme-6">Ce numéro de téléphone est déja pris</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label>Pays</label>
                        <input type="text" name="country" class="input w-full border mt-2" value="@if(old('country')) {{ old('country') }} @endif" placeholder="Ex: Burkina Faso" list="countries" required>
                        <datalist id="countries">
                            @foreach ($countries as $country)
                                <option value="{{ $country->countryName }}" data-country_id="{{ $country->id }}" data-country_indicative="{{ $country->indicative }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mt-3">
                        <label>Ville</label>
                        <input type="text" name="city" class="input w-full border mt-2" value="@if (old('city')) {{old('city')}} @endif" placeholder="Ex: Ouagadougou" list="cities" required>
                        <datalist id="cities">
                            @foreach ($cities as $city)
                            <option value="{{ $city->cityName }}" data-target_country="{{ $city->belongedCountry }}"></option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="mt-3">
                        <label>Mot de passe</label>
                        <input type="password" name="password" class="input w-full border mt-2" placeholder="Votre mot de passe" required>
                        @error('password')
                        <span class="font-medium text-theme-6">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label>Confirmez le mot de passe</label>
                        <input type="password" name="confirm_password" class="input w-full border mt-2" placeholder="Votre mot de passe" required>
                        @error('confirm_password')
                        <span class="font-medium text-theme-6">Veuillez confirmez le mot de passe</span>
                        @enderror
                    </div>
                    <button type="submit" class="button bg-theme-1 text-white mt-5">Ajouter</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('dist/js/manageUser.js') }}" type="text/javascript"></script>
@endsection
