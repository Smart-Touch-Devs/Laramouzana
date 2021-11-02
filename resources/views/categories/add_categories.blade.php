@extends('layout/top-menu')

@section('subhead')
<title>Gestion des catégories</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-6">
    <h2 class="text-lg font-medium mr-auto">Formulaire d'ajout de Categorie</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        @if ($message = Session::get('success'))
        <div class="">
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
        </div>
        @endif
        <!-- BEGIN: Form Layout -->
        <form action="{{ route('add_categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label class="font-bold-600">Nom de la categorie</label>
                    <input type="text" class="input w-full border mt-2" name="category_name">
                    {!! $errors->first('category_name', '<small class="text-red-500 font-extrabold">:message</small>') !!}
                </div>
                <div class="mt-3">
                    <label>Image de la categorie correspondante </label>
                        <div class="relative mt-2">
                            <input type="file" class="input pr-12 w-full border col-span-4"  accept="image/*" name="cat_picture">
                        </div>
                    </div>
                <div class="mt-3">
                    <label class="font-bold-600">Description de la catégorie</label>
                    <div class="mt-2">
                        <textarea data-simple-toolbar="true" class="editor" placeholder="Renseigner les informations de la catégorie "name="category_desc"></textarea>
                        {!! $errors->first('category_desc', '<small class="text-red-500 font-extrabold">:message</small>') !!}
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="submit" class="button w-26 bg-theme-1 text-white">Ajouter la catégorie</button>
                </div>
            </div>
        </form>
        <!-- END: Form Layout -->
    </div>
    <!-- begining of next part :table -->
    <div class="intro-y col-span-12 lg:col-span-6 overflow-x-scroll">
        <div class="intro-y datatable-wrapper box p-5 ">
            <table class="table table-report table-report--bordered display datatable w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 text-center">Nom de la catégorie</th>
                        <th class="border-b-2 text-center">Image de la catégorie</th>
                        <th class="border-b-2 text-center">Description</th>
                        <th class="border-b-2 text-center">Editer</th>
                        <th class="border-b-2 text-center">Supprimer</th>
                    </tr>
                </thead>
                @forelse($categories as $categorie)
                <tbody>
                    <tr>
                        <td class="text-center border-b">
                            <div class="font-medium whitespace-wrap">{{ $categorie->category_name }}</div>
                        </td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center ">
                               @if ($categorie->cat_picture === null)
                            <div>
                                <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image </div>
                            </div>
                               @else
                               <img alt=""  width="75px" height="75px"  src="{{asset('assets/categorie_Picture').'/'.$categorie->cat_picture}}">
                               @endif
                            </div>
                        </td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center ">
                                @if($categorie->category_desc === null)
                                <div>
                                    <h3>
                                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune description </div>
                                    </h3>
                                </div>
                                @else
                                <div class="font-medium  whitespace-wrap">{{ strip_tags($categorie->category_desc)}}</div>
                                @endif
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <div class="flex items-center mr-3" >
                                     <a href=" {{ route('add_categories.edit',$categorie->id) }} ">
                                        <button class="button px-2 mr-1 mb-2 bg-theme-3 text-white">
                                            <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="javascript:;" style="width: fit-content; height: fit-content;" class="deleteUserbtn" data-toggle="modal" data-target="#delete-modal-preview">
                                <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white flex items-center" >
                                    <span class="w-5 h-5 flex items-center justify-center">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </span>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <div class="modal" id="delete-modal-preview">
                        <div class="modal__content">
                            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Êtes vous sûr?</div>
                                <div class="text-gray-600 mt-2">Voudriez-vous vraiment supprimer cette categorie?</div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                 <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 dark:border-dark-5 dark:text-gray-300 mr-1">Annuler</button>
                                    <form action="{{ route('add_categories.destroy',$categorie->id) }}" method="post">
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
                        <div class="m-auto">
                            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune categorie disponible</div>
                        </div>
                </tbody>
                @endforelse
            </table>
        </div>
    </div>

</div>

<!-- modal popup -->

<script>
function myFunction() {
  var txt;
  var r = confirm("Voulez vous vraiment supprimer cette categorie.Cette action est irréversible ");
  if (r == true) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}

    const $ = el => document.querySelector(el)
    const $All = els => document.querySelectorAll(els)
    window.onload = function() {
        document.getElementById('close').onclick = function() {
            this.parentNode.parentNode.parentNode
                .removeChild(this.parentNode.parentNode);
            return false;
        };
    };
    // console.log($('#modal_desc'));
    $All('.edit_btn').forEach(el => {
        el.addEventListener("click", function(e) {
        e.preventDefault()
        const xhr = new XMLHttpRequest()
        xhr.open('GET', this.href, true)
        xhr.onload = () => {
            const result = JSON.parse(xhr.response)
            const editBtnUrl = this.href
            const formAction = $('#modal_form').action

            const splitedBtnUrl = editBtnUrl.split('/')
            const splitedFormAction = formAction.split('/')

            const categoryId = splitedBtnUrl[splitedBtnUrl.length - 1]

            splitedFormAction.splice(splitedFormAction.length - 1, 1, categoryId)

            const finalFormAction = splitedFormAction.join('/')

            console.log(finalFormAction);

            $('#modal_category').value = result.category_name;
            $('#modal_desc').innerText = result.category_desc;
            $('#modal_form').action = finalFormAction
        }
        xhr.send(null)
    })
    })

</script>
<script src="{{ asset('dist/js/manageUser.js') }}" type="text/javascript"></script>
@endsection
