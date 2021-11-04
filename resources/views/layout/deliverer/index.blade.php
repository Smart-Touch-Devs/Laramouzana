@extends('layout/top-menu')

@section('subhead')
<title>Page Livreur | Dashboard</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6 mt-5 flex">
    <div class="intro-y col-span-12 lg:col-span-12">
        @if ($message = Session::get('success'))
        <div class="">
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
        </div>
        @endif
        <div class="intro-y box mt-5">
            <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-size-16 font-semibold text-base mr-auto">
                    Livraisons non faites
                </h2>
            </div>
            <div class="p-5" id="responsive-table">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Client</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Produits commandés</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Montant</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Téléphone</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Email</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Marquer comme livré</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($commands) !== 0)
                                @foreach ($commands as $command)
                                <tr>
                                    <td class="border-b whitespace-no-wrap">{{ $command[3] }}</td>
                                    <td class="border-b whitespace-pre-wrap">{{ $command[1] }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $command[2] }} FCFA</td>
                                    <td class="border-b whitespace-no-wrap">{{ $command[4] }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $command[5] }}</td>
                                    <td class="border-b whitespace-no-wrap">
                                        <a href="{{ route('deliverer.update', $command[0]) }}" style="width: fit-content; height: fit-content;" class="detailBtn">
                                            <button class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-9 text-white">
                                                <i data-feather="edit-3" class="w-4 h-4 mr-2"></i>
                                                <span class="w-5 h-5 ml-2 flex items-center justify-center">
                                                    Valider
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                            </tbody>
                        </table>
                        <div class="rounded-md flex items-center px-5 py-4 my-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>Vous ne disposez d'aucune mission pour l'instant!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
