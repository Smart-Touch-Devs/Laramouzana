@extends('layout/top-menu')

@section('subhead')
<title>Configuration Image Principale</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">

</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-3 "></div>
    <div class="intro-y col-span-12 lg:col-span-6">
        <h2 class="text-lg font-medium my-5 ml-4">Modification Image</h2>
        <form action="{{ route('mainPicture.update',$mainPicture->id) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PATCH')
            @if ($message = Session::get('success'))
                <div class="">
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
                </div>
            @endif
            <div class="intro-y box p-5">
                <div>
                    <label>Configuration Image Principale</label>
                    <input type="file" class="input w-full border mt-2" name="picture">
                    <img src="{{asset('assets/mainPicture'.'/'.$mainPicture->picture)}}" alt="" width="75px" height="75px">
                    {!! $errors->first('picture', '<small class="text-danger">:message</small>') !!}
                </div>
                    <div class="text-right mt-5">
                    <a href="{{ asset('staff/mainPicture') }}">
                        <button type="button" class="button w-24 bg-theme-1 text-white">Retour</button>
                    </a>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Modifier</button>
                </div>
            </div>
        </form>
    </div>
    <div class="intro-y col-span-12 lg:col-span-3 "></div>
@endsection
