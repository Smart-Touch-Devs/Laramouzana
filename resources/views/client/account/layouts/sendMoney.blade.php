@extends('client.account.base')

@section('accountPart')
<div class="w-75 mt-3 mx-auto">
    <div class="card border rounded shadow">
        <div class="card-body text-center">
            <h3 class="font-weight-bolder my-5">Faire un transfert</h3>
            <form class="js-validate" action="{{ route('account.sendMoney') }}" method="post">
                @csrf
                <div class="js-form-message form-group">
                    <label for="receiver">Choisissez le destinataire <span class="text-danger">*</span></label>
                    <input type="text"  class="form-control" name="receiver" placeholder="Email du bénéficiaire" id="receiver" list="potentialReceiver" required>
                    <datalist id="potentialReceiver">
                        @foreach ($clients as $client)
                        <option value="{{ $client->email }}">{{ $client->firstname . ' ' . $client->lastname }}</option>
                        @endforeach
                    </datalist>
                </div>
                <div class="js-form-message form-group">
                    <label for="amount">Entrer la somme <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="amount" id="amount" placeholder="Ex: 12000" required><br>
                    <button type="submit" class="btn btn-primary-dark-w px-5">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
