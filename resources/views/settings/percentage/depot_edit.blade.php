@extends('layout/top-menu')

@section('subhead')
<title>Paramètrage | Dépot</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium m-auto">Modification Paramètrage pourcentage</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-4"></div>
    <div class="intro-y col-span-12 lg:col-span-4">
        <form action="{{route('updateDepot_percentage',$deposit_percentage->id)}}" method="post" >
            @csrf

            @if ($message = Session::get('success'))
                <div class="">
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
                </div>
            @endif
            <div class="intro-y box p-5">
                <div>
                    <label>Pourcentage dépot</label>
                    <input type="text" class="input w-full border mt-2" name="deposit_percentage" value="{{ $deposit_percentage->deposit_percentage }}">
                    {!! $errors->first('deposit_percentage', '<small class="text-danger">:message</small>') !!}
                </div>
                <div class="text-right mt-5">
                    <a href="{{ asset('staff/setting_percentage') }}">
                        <button type="submit" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Retour</button>
                       </a>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Modifier</button>
                </div>
            </div>
        </form>
    </div>
    <div class="intro-y col-span-12 lg:col-span-4"></div>
</div>
@endsection

