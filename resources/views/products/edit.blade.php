@extends('layout/top-menu')

@section('subhead')
<title>Modification | Produit</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Formulaire d'ajout de Produit</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        @if ($message = Session::get('success'))
        <div class="">
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
        </div>
        @endif
        <!-- BEGIN: Form Layout -->
        <form action="{{ route('all_products.update',$products->id) }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label>Nom du produit</label>
                    <input type="text" class="input w-full border mt-2" placeholder="plaque solaire,convertisseurs,regulateurs etc..." value="{{ $products->product_name }}" name="product_name" required>
                </div>
                <div class="mt-3">
                    <label>Catégorie</label>
                    <div class="mt-2">
                        <select data-placeholder="Selectionner une catégorie" class="tail-select w-full" name="category_id">
                            @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{$categorie->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Stock disponible</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-12 w-full border col-span-4" placeholder="" value="{{ $products->stock }}" name="stock" required>
                        <div class="absolute top-0 right-0 rounded-r w-12 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">pièces</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>delais de livraison</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-16 w-full border col-span-4" placeholder="" value="{{ $products->delivery_time }}"  name="delivery_time">
                        <div class="absolute top-0 right-0 rounded-r w-26 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Nombre de jour</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Prix</label>
                    <div class="relative mt-2">
                        <input type="number" class="input pr-16 w-full border col-span-4" placeholder="Prix unitaire" value="{{ $products->price }}"  name="price" required>
                        <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Prix</div>
                    </div>
                </div>


                 <div class="mt-3">
                    <label>Description</label>
                    <div class="mt-2">
                        <textarea data-simple-toolbar="true" class="editor" name="product_desc" required>
                        {{ strip_tags($products->product_desc ) }}
                        </textarea>
                    </div>
                </div>

            </div>

        <!-- END: Form Layout -->
    </div>
    <!-- begining of next part :table -->
    <div class="intro-y col-span-12 lg:col-span-6 overflow-x-scroll">
        <div class="mt-3">
            <div class="file-input single">
                <div class="file-input-wrapper">
                    <input type="file" id="single-example" name="pdf1"  accept=".pdf">
                    <label for="single-example" class="upload-cta">
                        PDF CARACTERISTIQUE <span class="blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="file-input single">
                <div class="file-input-wrapper">
                    <input type="file" id="single-example" name="pdf2" accept=".pdf">
                    <label for="single-example" class="upload-cta">
                        PDF NOTICE <span class="blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="file-input single">
                <div class="file-input-wrapper">
                    <input type="file" id="single-example" name="pdf3" accept=".pdf" >
                    <label for="single-example" class="upload-cta">
                        PDF Presentation <span class="blue"></span>
                    </label>
                </div>
            </div>
        </div>
         <div class="mt-3">
        <label>image 1</label>
            <div class="relative mt-2">
                <input type="file" class="input pr-12 w-full border col-span-4" placeholder="" accept="image/*" name="picture1">
                @if ($products->picture1 === null)
                <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image </div>
                @else
                <img alt=""  width="75px" height="75px"   src="{{asset('assets/product_Picture').'/'.$products->picture1}}">
                @endif
            </div>
        </div>
        <div class="mt-3">
            <label>image 2</label>
                <div class="relative mt-2">
                    <input type="file" class="input pr-12 w-full border col-span-4" placeholder="" accept="image/*" name="picture2">
                    @if ($products->picture2 === null)
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image </div>
                    @else
                    <img alt=""  width="75px" height="75px"   src="{{asset('assets/product_Picture').'/'.$products->picture2}}">
                    @endif
                </div>
            </div>
            <div class="mt-3">
                <label>image 3</label>
                    <div class="relative mt-2">
                        <input type="file" class="input pr-12 w-full border col-span-4" placeholder="" accept="image/*" name="picture2">
                    @if ($products->picture3 === null)
                    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-17 text-theme-11"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Aucune image </div>
                    @else
                    <img alt=""  width="75px" height="75px"   src="{{asset('assets/product_Picture').'/'.$products->picture3}}">
                    @endif
                    </div>
                </div>
                <div class="text-right mt-5">
                    <a href="{{asset('staff/all_products')}}">  <button type="button" class="button w-20 bg-theme-1 text-white">Retour</button></a>
                    <button type="submit" class="button w-28 bg-theme-1 text-white">Modifier le produit</button>
                </div>
    </div>

</form>
</div>
<script>
    class FileInput {
        constructor(wrapperEl) {
            this.wrapperEl = wrapperEl
            this.fileInput = wrapperEl.querySelector('input[type="file"]')
            this.uploadCta = wrapperEl.querySelector('.upload-cta')
            this.selectedFileList = wrapperEl.querySelector('.selected-files')

            this.fileInput.addEventListener('change', (e) => {
                this.handleFileChange(e)
            })
        }

        buildSelectedFileElement(file, fileId) {
            let selectedFileEl = document.createElement('li')
            let text = document.createTextNode(file.name)
            let removeButton = document.createElement('button')

            removeButton.setAttribute('role', 'button')
            removeButton.classList.add('remove')
            removeButton.innerText = 'Remove'
            removeButton.addEventListener('click', () => {
                selectedFileEl.parentNode.removeChild(selectedFileEl)
                this.removeFile(fileId)
            })

            selectedFileEl.appendChild(text)
            selectedFileEl.appendChild(removeButton)

            return selectedFileEl
        }
    }

    class SingleFileInput extends FileInput {
        constructor(wrapperEl) {
            super(wrapperEl)

            this.selectedFile = null
        }

        handleFileChange(e) {
            let filesFromInput = e.target.files
            this.selectedFileList.innerHTML = ''

            if (filesFromInput.length < 1) {
                this.selectedFile = null
                return
            }

            this.disableUploadCta()

            this.selectedFile = filesFromInput[0]

            let selectedFileEl = this.buildSelectedFileElement(filesFromInput[0])
            this.selectedFileList.appendChild(selectedFileEl)

            e.target.value = ''
        }

        disableUploadCta() {
            this.uploadCta.classList.add('hide')
            this.fileInput.disabled = true
        }

        enableUploadCta() {
            this.uploadCta.classList.remove('hide')
            this.fileInput.disabled = false
        }

        removeFile() {
            this.selectedFile = null
            this.enableUploadCta()
        }
    }
    // Single file input
    document.querySelectorAll('.file-input.single').forEach(function(wrapperEl) {
        new SingleFileInput(wrapperEl)
    })
</script>
<style>
    .hide {
        display: none !important;
    }

    .file-input .file-input-wrapper {
        position: relative;
    }

    .file-input input {
        cursor: pointer;
        position: absolute;
        display: block;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.01;
        border: 0;
    }

    .file-input .upload-cta {
        display: block;
        text-align: center;
        border: 1px dashed #b9b9b9;
        border-radius: 5px;
        padding: 40px 90px;
        max-width: 100%;
        line-height: 1.5;
        margin-bottom: 16px;
    }

    .file-input .upload-cta:before {
        display: block;
        width: 32px;
        height: 32px;
        margin: 0 auto 18px;
        background-size: contain;
        content: "";
        background-image: url('data:image/png;base64,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');
    }

    .file-input .selected-files {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .file-input .selected-files li {
        background: #f6f9fd;
        border-radius: 5px;
        padding: 27px 72px 27px 30px;
        position: relative;
        margin-top: 8px;
        word-break: break-all;
    }

    .file-input .selected-files .remove {
        appearance: none;
        -webkit-appearance: none;
        display: block;
        position: absolute;
        border: 1px solid #9a9fa9;
        width: 16px;
        height: 16px;
        text-indent: 64px;
        white-space: nowrap;
        overflow: hidden;
        top: 50%;
        right: 30px;
        transform: translateY(-50%);
        background: transparent;
        border-radius: 16px;
        outline: 0;
        cursor: pointer;
    }

    .file-input .selected-files .remove:focus {
        border-color: #103FD0;
    }

    .file-input .selected-files .remove:before,
    .file-input .selected-files .remove:after {
        content: "";
        width: 1px;
        height: 10px;
        background-color: #364053;
        display: block;
        position: absolute;
        top: 50%;
        left: 50%;
    }

    .file-input .selected-files .remove:before {
        transform: translate(-50%, -50%) rotate(45deg);
    }

    .file-input .selected-files .remove:after {
        transform: translate(-50%, -50%) rotate(-45deg);
    }
</style>
@endsection
