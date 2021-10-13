 @extends('layout/top-menu')

@section('subhead')
<title>ACCORDION - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<div class="content-wrapper">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Formulaire de modification des Faqs</h2>
    </div>
     <div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-5">
    @if ($message = Session::get('success'))
        <div class="">
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
        </div>
        @endif
        <form action="{{ route('Faqs.update',$faqs->id) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
                @csrf
                <div class="intro-y box p-5">
                    <input type="hidden" name="faqsId"class="input w-full border mt-2"  name="titre" value="{{ $faqs->id }}">
                <div>
                    <label>Titre de la question</label>
                    <input type="text" class="input w-full border mt-2" value='{{ $faqs->titre }}' name="titre"
                    placeholder="Modifier le titre">
                    {!! $errors->first('titre', '<small class="text-danger">:message</small>') !!}
                </div>
                <div class="mt-3">
                    <label>Contenu du faq</label>
                    <div class="mt-2">
                    <textarea data-simple-toolbar="true" class="editor" name="contenu">{{  $faqs->contenu }}</textarea> 
                        {!! $errors->first('contenu', '<small class="text-danger">:message</small>') !!}
                    </div>
                </div> 
                <div class="text-right mt-5">
                    <button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection