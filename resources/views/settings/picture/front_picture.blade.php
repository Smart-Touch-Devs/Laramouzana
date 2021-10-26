@extends('layout/top-menu')

@section('subhead')
<title>Paramètrage</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Paramétrage Image</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-5">
        <form action="{{ route('front_picture1.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            @if ($message = Session::get('success'))
                <div class="">
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
                </div>
            @endif
            <div class="intro-y box p-5">
                <div>
                    <label>Image 1| barre latérale</label>
                    <input type="file" class="input w-full border mt-2" name="picture_lat1">
                    {!! $errors->first('picture_lat1', '<small class="text-danger">:message</small>') !!}
                </div>
                    <div class="text-right mt-5">
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Publier</button>
                </div>
            </div>
        </form>

        <form action="{{ route('front_picture2.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            @if ($message = Session::get('success2'))
                <div class="">
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
                </div>
            @endif
            <div class="intro-y box p-5">
                <div>
                    <label>Image 2| barre latérale</label>
                    <input type="file" class="input w-full border mt-2" name="picture_lat2">
                    {!! $errors->first('picture_lat2', '<small class="text-danger">:message</small>') !!}
                </div>
                    <div class="text-right mt-5">
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Publier</button>
                </div>
            </div>
        </form>
    </div>
    <div class="intro-y col-span-12 lg:col-span-7 ">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Image 1 | barre latérale</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Editer</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($frontpicture1 as $frontpicture )
                    <tr>
                        <td class="border-b whitespace-no-wrap">
                          @if ($frontpicture->picture_lat1 != null)
                                <img src="{{ asset('assets/img/picture_lat'.'/'.$frontpicture->picture_lat1) }}" alt="" width="75px" height="75px">
                          @endif
                        </td>
                        <td class="border-b whitespace-no-wrap">
                            <a href="{{ route('front_picture1.edit',$frontpicture->id) }}" style="width: fit-content; height: fit-content;" class="detailBtn" data-toggle="modal" data-target="#userDetails" data-detail_url="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                        <td class="border-b whitespace-no-wrap">
                            <form action="{{ route('front_picture1.destroy',$frontpicture->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white" type="submit">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                            </form>
                        </td>
                        @empty
                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image disponible </div>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Image 2 | barre latérale</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Editer</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($frontpicture2 as $frontpicture )
                    <tr>
                        <td class="border-b whitespace-no-wrap">
                          @if ($frontpicture->picture_lat2 != null)
                                <img src="{{ asset('assets/img/picture_lat'.'/'.$frontpicture->picture_lat2) }}" alt="" width="75px" height="75px">
                          @endif
                        </td>
                        <td class="border-b whitespace-no-wrap">
                            <a href="{{ route('front_picture2.edit',$frontpicture->id) }}" style="width: fit-content; height: fit-content;" class="detailBtn" data-toggle="modal" data-target="#userDetails" data-detail_url="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                        <td class="border-b whitespace-no-wrap">
                            <form action="{{ route('front_picture2.destroy',$frontpicture->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="">
                                <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white" type="submit">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                            </form>
                        </td>
                        @empty
                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image disponible </div>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
