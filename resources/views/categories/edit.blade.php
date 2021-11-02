@extends('layout/top-menu')

@section('subhead')
<title>Modification | Categorie</title>
@endsection

@section('subcontent')

<div class="grid grid-cols-12 gap-6 mt-5">
    <div  class="intro-y col-span-12 lg:col-span-3"></div>
    <div class="intro-y col-span-12 lg:col-span-6">
<div class="intro-y flex items-center mt-6 mr-auto">
    <h2 class="text-lg font-medium mr-auto">Formulaire de modification de la Categorie</h2>
</div>
        @if ($message = Session::get('success'))
        <div class="">
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
        </div>
        @endif
        <!-- BEGIN: Form Layout -->
        <form action="{{ route('add_categories.update',$categorie->id) }}" method="post" class=" mt-6" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label class="font-bold-600">Nom de la categorie</label>
                    <input type="text" class="input w-full border mt-2" value="{{ $categorie->category_name}}" name="category_name">
                    {!! $errors->first('category_name', '<small class="text-red-500 font-extrabold">:message</small>') !!}
                </div>
                <div class="mt-3">
                    <label>Image de la categorie correspondante  </label>
                        <div class="relative mt-2">
                            <input type="file" class="input pr-12 w-full border col-span-4" placeholder="" accept="image/*" name="cat_picture">
                            <img alt="" width="100px" height="100px"   src="{{asset('assets/categorie_Picture').'/'.$categorie->cat_picture}}">
                            {!! $errors->first('cat_picture', '<small class="text-red-500 font-extrabold">:message</small>') !!}
                        </div>
                    </div>
                <div class="mt-3">
                    <label class="font-bold-600">Description de la catégorie</label>
                    <div class="mt-2">
                        <textarea data-simple-toolbar="true" class="editor" placeholder="Renseigner les informations de la catégorie" name="category_desc">
                            {{ strip_tags($categorie->category_desc) }}
                        </textarea>
                        {!! $errors->first('category_desc', '<small class="text-red-500 font-extrabold">:message</small>') !!}
                    </div>
                </div>
                <div class="text-right mt-5">
                  <a href="{{asset('staff/add_categories')}}">  <button type="button" class="button w-20 bg-theme-1 text-white">Retour</button></a>
                    <button type="submit" class="button w-26 bg-theme-1 text-white">Modifier la categorie</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>
    <div  class="intro-y col-span-12 lg:col-span-3"></div>
</div>

<!-- modal popup -->
@endsection
