@extends('layout/top-menu')

@section('subhead')
<title>Page Comptable | Dépôts</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6 mt-5 flex">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-size-16 font-semibold text-base mr-auto">
                    Tous les dépôts
                </h2>
            </div>
            <div class="p-5" id="responsive-table">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Noms</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Prénom</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Téléphone</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Email</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposits as $deposit)
                                <tr>
                                    <td class="border-b whitespace-no-wrap">{{ $deposit->clients->firstname }}</td>
                                    <td class="border-b whitespace-pre-wrap">{{ $deposit->clients->lastname }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $deposit->clients->phone }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $deposit->clients->email }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $deposit->amount }}</td>
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
