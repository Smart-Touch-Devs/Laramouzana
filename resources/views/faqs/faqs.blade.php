@extends('layout/top-menu')

@section('subhead')
<title>ACCORDION - Midone - Tailwind HTML Admin Template</title>
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
                    <input type="text" class="input w-full border mt-2" name="titre">
                </div>
                <div class="mt-3">
                    <label>Contenu</label>
                    <div class="mt-2">
                        <textarea type='text' class="editor" name="contenu"></textarea>
                        {!! $errors->first('contenu', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit"
                        class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </div>
        </form>
    </div>
    <div class="intro-y col-span-12 lg:col-span-7 overflow-x-scroll">
        <div class="intro-y datatable-wrapper box p-5 ">
            <table class="table table-report table-report--bordered display datatable w-full">

                <thead>
                    <tr>
                        <th style="width: 1%">
                            N°
                        </th>
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap">Titre</div>
                        </td>
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap">Contenu</div>
                        </td>
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-no-wrap">Action</div>
                        </td>

                    </tr>
                </thead>
                @forelse($faqs as $faq)
                <tbody>
                    <tr>
                        <td>
                            {{ $faq->id }}
                        </td>
                        <td class="text-center">
                            {{ $faq->titre }}
                        </td>
                        <td class="text-center">
                            {{ $faq->contenu }}
                        </td>


                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <div class="flex items-center mr-3" href="">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                    <div><a href=" {{ route('Faqs.edit',$faq->id) }} " data-toggle="modal"
                                            data-target="#small-modal-size-preview" class="edit_btn">Editer</a> </div>
                                </div>
                                <form action="{{ route('Faqs.destroy',$faq->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex items-center text-theme-6" onclick="myFunction()" type="submit" >
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1" ></i> Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>

                        @empty
                        <div class="alert alert-warning col-md-12 col-xs-12" role="alert">
                            <p class='font-weight-bolder text-center '>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                </svg>
                                Aucun faq disponible
                            </p>
                        </div>
                    </tr>
                </tbody>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection