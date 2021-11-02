@extends('layout/top-menu')

@section('subhead')
<title>Gestion des FAQs</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Accordion</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-5">
        <form action="{{route('Faqs.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($message = Session::get('success'))
                <div class="">
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
                </div>
            @endif
            <div class="intro-y box p-5">
                <div>
                    <label>Titre de la question</label>
                    <input type="text" class="input w-full border mt-2" value="{{old('titre')}}" name="titre">
                </div>
                <div class="mt-3">
                    <label>Contenu</label>
                    <div class="mt-2">
                        <textarea type='text' class="editor" name="contenu"></textarea>
                        {!! $errors->first('contenu', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Publier</button>
                </div>
            </div>
        </form>
    </div>
    <div class="intro-y col-span-12 lg:col-span-7 overflow-x-scroll">
        <div class="intro-y datatable-wrapper box p-5 ">
            <table class="table table-report table-report--bordered display datatable w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 whitespace">N°</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Titre</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Contenu</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Editer</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Supprimer</th>
                    </tr>
                </thead>
                @forelse($faqs as $faq)
                <tbody>
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $faq->id }}</div>
                        </td>
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap"> {{ $faq->titre }}</div>
                        </td>
                        <td class="text-center border-b  whitespace-no-wrap">
                            <div class="font-medium ">{{ strip_tags($faq->contenu )}}</div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3" href=" {{ route('Faqs.edit',$faq->id) }}">
                                    <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                        <span class="w-5 h-5 flex items-center justify-center">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                </button>
                                </a>
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <a href="javascript:;" style="width: fit-content; height: fit-content;" class="deleteUserbtn" data-toggle="modal" data-target="#delete-modal-preview">
                                <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white flex items-center" >
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                        <div class="modal" id="delete-modal-preview">
                            <div class="modal__content">
                                <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Êtes vous sûr?</div>
                                    <div class="text-gray-600 mt-2">Voudriez-vous vraiment supprimer cette categorie?</div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                     <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Annuler</button>
                                        <form action="{{ route('Faqs.destroy',$faq->id) }}" method="post">
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
                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11">
                            <div class="m-auto">
                                <p> Aucune réponse disponible pour le moment</p>
                            </div>
                        </div>
                    </tr>
                </tbody>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
