@extends('client.account.base')

@section('accountPart')
<div class="w-75 mt-3 mx-auto">
    <div class="card border rounded shadow">
        <div class="card-body text-center">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              {{Session::forget('success')}}
            @endif
            <h3 class="font-weight-bolder my-5">Faire un transfert</h3>
            <p class="text-danger font-weight-bold">Les frais de transfert sont de 1% du montant à transféré</p>
            <h4 class="my-3">Solde actuel : {{Auth::user()->account->amount}} FCFA</h4>
            <form class="js-validate" action="{{ route('account.sendMoney') }}" method="post">
                @csrf
                <div class="js-form-message form-group">
                    <label for="receiver">Choisissez le destinataire <span class="text-danger">*</span></label>
                    <select name="receiver" class="form-control"  id="receiver">
                        <option value="none" selected disabled hidden>
                            Chosissez le destinataire
                        </option>
                        @foreach ($clients as $client)
                        <option value="{{ $client->email }}">{{ $client->firstname . ' ' . $client->lastname . '(' . $client->email .')' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="js-form-message form-group">
                    <label for="amount">Entrer la somme <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" max="{{ Auth::user()->account->amount }}" name="amount" id="amount" placeholder="Ex: 12000" required><br>
                    @error('amount')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-primary-dark-w px-5">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
