@extends('layout/top-menu')
@section('subhead')
<title>Paramètrage</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">

</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-3">
    </div>
    <div class="intro-y col-span-12 lg:col-span-6 ">
        @if ($message = Session::get('success'))
        <div class="">
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
        </div>
        @endif
        <h2 class="text-lg font-medium ml-4 my-6">Paramètrage pourcentage</h2>
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Pourcentages</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Valeur</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Editer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deposit_percentages as $deposit_percentage )
                    <tr>
                        <td class="border-b whitespace-no-wrap">Dépot</td>
                        <td class="border-b whitespace-no-wrap">{{ $deposit_percentage->deposit_percentage }} %</td>
                        <td class="border-b whitespace-no-wrap">
                            <a href="{{route('depot_percentage',$deposit_percentage->id)}}" style="width: fit-content; height: fit-content;" class="detailBtn" data-toggle="modal" data-target="#userDetails" data-detail_url="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table my-2">
                <thead>
                    <tr>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Pourcentages</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Valeur</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Editer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($retrait_percentages as $retrait_percentage )
                    <tr>
                        <td class="border-b whitespace-no-wrap">Retrait</td>
                        <td class="border-b whitespace-no-wrap">{{ $retrait_percentage->retrait_percentage }} %</td>
                        <td class="border-b whitespace-no-wrap">
                            <a href="{{route('retrait_percentage',$retrait_percentage->id)}}" style="width: fit-content; height: fit-content;" class="detailBtn" data-toggle="modal" data-target="#userDetails" data-detail_url="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table class="table my-2">
                <thead>
                    <tr>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Pourcentages</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Valeur</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Editer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfere_percentages as $transfere_percentage )
                    <tr>
                        <td class="border-b whitespace-no-wrap"> Transfere</td>
                        <td class="border-b whitespace-no-wrap">{{ $transfere_percentage->transfere_percentage }} %</td>
                        <td class="border-b whitespace-no-wrap">
                            <a href="{{route('transfere_percentage',$transfere_percentage->id)}}" style="width: fit-content; height: fit-content;" class="detailBtn" data-toggle="modal" data-target="#userDetails" data-detail_url="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
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
    <div class="intro-y col-span-12 lg:col-span-3">
    </div>
</div>
@endsection

