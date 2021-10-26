@extends('client.account.base')

@section('accountPart')

<div class="w-75 mx-auto">
    <div class="card border rounded shadow">
        <div class="card-body text-center">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Félicitation!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Session::forget('success')}}
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Session::forget('error')}}
        @endif
            <h3 class="font-weight-bolder">Faire un dépot</h3>
            <form class="js-validate" id="pre-form">
                <div class="js-form-message form-group">
                    <label for="phone">Entrer le numéro de dépôt <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control pre-inp" id="phone" placeholder="Numéro de téléphone"><br>
                </div>
                <div class="js-form-message form-group">
                    <label for="amount">Entrer le montant de dépôt <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="amount" placeholder="Montant à déposer"><br>
                </div>
                <div class="alert alert-secondary">
                    <strong>Procédé : </strong>
                    <span>Veuillez générer un OTP sur votre appareil avec ce code:</span><br>
                    <strong>*144*4*6*<span id="processAmount">montant</span>#</strong><br>
                    <span class="text-danger font-weight-bold">Les frais de dépot sont de 9% du montant à déposée!</span>
                </div>
                <div class="js-form-message form-group">
                    <label for="otp_code">Entrer le code OTP <span class="text-danger">*</span></label>
                    <input type="number" class="form-control pre-inp" id="otp_code" placeholder="Code OTP"><br>
                    <button type="submit" class="btn btn-primary-dark-w px-5" data-toggle="modal" data-target="#staticBackdrop">Envoyer</button>
                </div>
            </form>

        </div>
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Alerte de transaction</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <p class="font-weight-bold">Vous sérez débité de <span id="modalAmount"></span> FCFA sur votre compte Orange Money avec <span id="amountPercent"></span> FCFA de frais de dépôt!</p>
            <strong class="text-danger">Souhaiteriez-vous vraiment faire le dépôt?</strong>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Quitter</button>
            <form action="{{ route('account.deposit') }}" id="final-form" method="post">
                @csrf
              <input type="hidden" class="form-control inp" name="phone" id="phone" placeholder="Numéro de téléphone">
              <input type="hidden" class="form-control" name="amount" id="amount" placeholder="Montant à déposer">
              <input type="hidden" class="form-control inp" name="otp_code" id="otp_code" placeholder="Code OTP">
              <button type="submit"  class="btn btn-primary">Faire le dépôt</button>
            </form>
        </div>
      </div>
    </div>
  </div>
<script src="{{ asset('dist/js/deposit.js') }}"></script>
@endsection
