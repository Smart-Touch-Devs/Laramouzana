@extends('client.account.base')

@section('accountPart')

<div class="w-75 mx-auto">
    <div class="card border rounded shadow">
        <div class="card-body text-center">
            <h3 class="font-weight-bolder">Faire un dépot</h3>
            <div class="alert alert-secondary">
                <strong>Procédé : </strong>
                <span>Veuillez taper la composition suivante sur votre téléphone</span><br>
                <strong>*144*3*XXXXXXXX#</strong>
            </div>
            <form class="js-validate" action="{{ route('account.deposit') }}" method="post">
                @csrf
                <div class="js-form-message form-group">
                    <label for="otp_code">Entrer le code OTP <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="otp_code" id="otp_code" placeholder="Code OTP"><br>
                    <button type="submit" class="btn btn-primary-dark-w px-5">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
