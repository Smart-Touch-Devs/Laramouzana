@extends('layout/top-menu')

@section('subhead')
<title>Page Livreur | Historique des livraisons</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6 mt-5 flex">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-size-16 font-semibold text-base mr-auto">
                    Vos recentes livraisons
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commands as $command)
                                <tr>
                                    <td class="border-b whitespace-no-wrap">{{ $command[3] }}</td>
                                    <td class="border-b whitespace-pre-wrap">{{ $command[1] }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $command[2] }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $command[4] }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $command[5] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
