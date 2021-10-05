@extends('client.account.base')

@section('accountPart')

<div class="w-75 mx-auto">
    <div class="card border rounded shadow">
        <div class="card-body text-center">
            <h3 class="font-weight-bolder">Demande de retrait</h3>
            <form class="js-validate" action="{{ route('account.deposit') }}" method="post">
                @csrf
                <div class="js-form-message form-group">
                    <label for="withdrawAmount">Entrer la somme de retrait souhaitée <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="withdrawAmount" id="withdrawAmount" placeholder="Somme de retrait"><br>
                    <button type="submit" class="btn btn-primary-dark-w px-5">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
