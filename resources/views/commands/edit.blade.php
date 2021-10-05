@extends('layout/top-menu')

@section('subhead')
<title>CRUD Form - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div  class="intro-y col-span-12 lg:col-span-3"></div>
    <div class="intro-y col-span-12 lg:col-span-6">
<div class="intro-y flex items-center mt-6 mr-auto">
    <h2 class="text-lg mb-5 font-bold text-uppercase font-medium m-auto">Assignation d'un commande à un livreur</h2>
</div>
<div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-14 m-auto">
    @if ($message = Session::get('success'))
    <div class="">
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2 text-theme-9"></i> <strong>{{ $message }}</strong><i data-feather="x" class="w-4 h-4 ml-auto" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' id="close"></i> </div>
    </div>
@endif
    <div>

      <form action="{{route('commands.update',$toReturnCommand[0])}}" method="post">
        @csrf
        @method('PATCH')
        <div class="p-5">
            <h4 class="text-gray-800"><span class="font-bold">Clients :</span>  {{$toReturnCommand[3]}} </h4>
        </div>
        <div class="p-5">
            <h4 class="font-bold-600 text-gray-800"><span class="font-bold">Produits commandés : </span> {{$toReturnCommand[1]}} </h4>
        </div>
        <div class="p-5">
            <h4 class="font-bold-600 text-gray-800"><span class="font-bold">Montant total :</span> {{$toReturnCommand[2]}} FCFA </h4>
        </div>
        <div class="p-5">
            <h4 class="font-bold-600 text-gray-800"><span class="font-bold">Numéro :</span> {{$toReturnCommand[4]}} </h4>
        </div>
       <div  class="p-5">
        <label class="font-bold ">Affecter un livreur</label>
            <div class="mt-5">
                <select data-placeholder="Selectionner une catégorie" class="tail-select w-full " name="deliverer_id">
                    @foreach ($livreurs as $livreur)
                        <option value="{{$livreur->id}}">{{$livreur->first_name}} {{$livreur->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
         <div class="text-right mt-5">
              <button type="submit" class="button w-26 bg-theme-1 text-white">Valider</button>
          </div>
</form>
    </div>
  </div>


        <!-- END: Form Layout -->
    </div>
    <div  class="intro-y col-span-12 lg:col-span-3"></div>
</div>
@endsection
