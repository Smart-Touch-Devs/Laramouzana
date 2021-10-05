@extends('layout/top-menu')

@section('subhead')
<title>CRUD Form - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6 mt-5"> </div>
    <!-- begining of next part :table -->
    <div class="intro-y col-span-12 lg:col-span-3 ring-offset-3 "> </div>
    <table class="table">
        <thead>
            <tr>
                <th class="border border-b-2 text-center dark:border-dark-5 whitespace-nowrap">Clients</th>
                <th class="border border-b-2 text-center  dark:border-dark-5 whitespace-nowrap">Produits Commandés</th>
                <th class="border border-b-2 text-center  dark:border-dark-5 whitespace-nowrap">Montants</th>
                <th class="border border-b-2 text-center  dark:border-dark-5 whitespace-nowrap">Numéro</th>
                <th class="border border-b-2 text-center  dark:border-dark-5 whitespace-nowrap">Livreurs</th>
                <th class="border border-b-2 text-center dark:border-dark-5 whitespace-nowrap">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($toReturnCommands as $command)
            <tr class="hover:bg-gray-200">
                <td class="border text-center ">{{ $command[3]}}</td>
                <td class="border text-center ">{{ $command[1]}}</td>
                <td class="border text-center ">{{ $command[2]}} FCFA</td>
                <td class="border text-center ">{{ $command[4]}}</td>
                <td class="border text-center ">
                   @if ( $command[5] === null )
                        <h3>Aucun livreur assigné</h3>
                   @else
                        <p>{{$command[5]->first_name}} {{$command[5]->last_name}}</p>
                   @endif
                </td>
                <td class="border">
                    <div class="text-center">
                      @if ($command[5] !== null)
                        <button type="button" class="button w-26 bg-theme-9 text-white"> Assigné </button>
                        <a href="{{ route('commands.edit',$command[0]) }}">
                             <button type="button" class="button w-26 bg-theme-16 text-white"> Modifier </button>
                       </a>
                      @else
                      <a href="{{ route('commands.edit',$command[0]) }}">
                        <button type="button" class="button w-26 bg-theme-1 text-white">Assigner un livreur</button>
                      </a>
                      @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Assignation de commande</h2>
            </div>
            <div class="p-3">
                <h4 class="font-bold-600">Clients:</h4>
            </div>
            <div class="p-3">
                <h4 class="font-bold-600">Produits:</h4>
            </div>
            <div class="p-3">
                <h4 class="font-bold-600">Numero:</h4>
            </div>
            <div class="p-3">
                <label>livreur</label>
                    <div class="mt-2">
                        <select data-hide-search="true" class="select2 w-full">
                            <option value="1">Leonardo DiCaprio</option>
                        </select>
                    </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="button" class="button w-20 border text-gray-700 mr-1">Cancel</button> <button type="button" class="button w-20 bg-theme-1 text-white">Send</button> </div>
        </div>
    </div>

</div>
@endsection
