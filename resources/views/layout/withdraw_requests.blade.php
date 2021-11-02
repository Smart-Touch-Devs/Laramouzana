@extends('layout/top-menu')

@section('subhead')
    <title>Dashboard - Laramouzana</title>
@endsection

@section('subcontent')

<div class="grid grid-cols-12 gap-6 mt-5 flex">
    <div class="intro-y col-span-12 lg:col-span-12">
        <div class="intro-y box mt-5">
            <div class="flex sm:flex-row items-center p-5 border-b border-gray-200">
                <h2 class="font-size-16 font-semibold text-base mr-auto">
                    Toutes les demandes de rétrait d'argent
                </h2>
            </div>
            <div class="p-5" id="responsive-table">
                <div class="preview">
                    @if ($message = Session::get('success'))
                    <div class="rounded-md flex justify-between px-5 py-4 mb-2 bg-theme-18 text-theme-9 successAlert">
                        <div class="flex">
                            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
                            <span>{{ $message }}</span>
                            {{Session::forget('success')}}
                        </div>
                       <button class="closeBtn"><i data-feather="x" style="cursor: pointer;" class="w-4 h-4 ml-auto"></i></button>
                   </div>
                    @endif
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Noms</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Prénom</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Téléphone</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Montant</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Date</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Valider</th>
                                    <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Rejéter</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($withdrawRequests as $withdrawRequest)
                                <tr>
                                    <td class="border-b whitespace-no-wrap">{{ $withdrawRequest->clients->firstname }}</td>
                                    <td class="border-b whitespace-pre-wrap">{{ $withdrawRequest->clients->lastname }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $withdrawRequest->clients->phone }}</td>
                                    <td class="border-b whitespace-no-wrap">{{ $withdrawRequest->amount }} FCFA</td>
                                    <td class="border-b whitespace-no-wrap">{{ date('d/M/Y', strtotime($withdrawRequest->created_at)) }}</td>
                                    <td class="border-b whitespace-no-wrap">
                                        <form action="{{ route('admin.validateWithdrawal') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $withdrawRequest->id }}">
                                            <button type="submit" class="button px-2 mr-1 mb-2 bg-theme-9 text-white">
                                                <span class="w-5 h-5 flex items-center justify-center">
                                                    <i data-feather="thumbs-up" class="w-4 h-4"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="border-b whitespace-no-wrap">
                                        <a href="{{ route('admin.rejectWithdrawal', $withdrawRequest->id) }}" style="width: fit-content; height: fit-content;">
                                            <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white">
                                                <span class="w-5 h-5 flex items-center justify-center">
                                                    <i data-feather="x" class="w-4 h-4"></i>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const closeBtn = document.querySelector(".closeBtn");
        if (closeBtn != null) {
            closeBtn.addEventListener("click", (_) => {
                document.querySelector(".successAlert").classList.add("hidden");
            });
        }
    </script>

@endsection
