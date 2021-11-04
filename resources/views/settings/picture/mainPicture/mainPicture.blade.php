@extends('layout/top-menu')

@section('subhead')
<title>Configuration</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Configuration Image Principale</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-5">
        <form action="{{ route('mainPicture.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            @if ($message = Session::get('success'))
                <div class="">
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
                </div>
            @endif
            @if(!$mainPictures->isEmpty())
            <div class="intro-y box p-5">
                <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-11"></i> <strong>Impossible d'ajouter à nouveau une image ,veuillez proceder à une modification</strong><i class="w-4 h-4 ml-auto" ></i> </div>
            </div>
            @else
            <div class="intro-y box p-5">
                <div>
                    <label>Image Principale</label>
                    <input type="file" class="input w-full border mt-2" name="picture" accept="image/*">
                    {!! $errors->first('picture', '<small class="text-danger">:message</small>') !!}
                </div>
                    <div class="text-right mt-5">
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Publier</button>
                </div>
            </div>
            @endif
        </form>
    </div>
    <div class="intro-y col-span-12 lg:col-span-7 ">
        <div class="overflow-x-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Image Principale</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Editer</th>
                        <th class="border-b-2 dark:border-dark-5 whitespace-no-wrap">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                        @forelse($mainPictures as $mainPicture)
                    <tr>
                        <td class="border-b whitespace-no-wrap">
                          @if ($mainPicture->picture != null)
                                <img src="{{asset('assets/mainPicture'.'/'.$mainPicture->picture)}}" alt="" width="75px" height="75px">
                          @endif
                        </td>
                        <td class="border-b whitespace-no-wrap">
                            <a href="{{ route('mainPicture.edit',$mainPicture->id) }}" >
                                <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="more-vertical" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                        <td class="border-b whitespace-no-wrap">
                                <a href="javascript:;" style="width: fit-content; height: fit-content;" class="deleteUserbtn" data-toggle="modal" data-target="#delete-modal-preview">
                                    <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white flex items-center" >
                                        <span class="w-5 h-5 flex items-center justify-center">
                                            <i data-feather="trash-2" class="w-4 h-4"></i>
                                        </span>
                                    </button>
                                </a>
                            </form>
                        </td>
                        <div class="modal" id="delete-modal-preview">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Êtes vous sûr?</div>
                                    <div class="text-gray-600 mt-2">Voudriez-vous vraiment supprimer cette categorie?</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                     <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Annuler</button>
                                     <form action="{{ route('mainPicture.destroy',$mainPicture->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <a href="javascript:void()" id="confirmDeleteBtn">
                                              <button type="submit" class="button w-24 bg-theme-6 text-white">Supprimer</button>
                                            </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image disponible </div>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
