@extends('client.account.base')

@section('accountPart')

<div class="w-100 mx-auto">
    <div class="card border rounded shadow mx-auto">
        <div class="card-body mx-auto text-center">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              {{Session::forget('success')}}
            @endif
            @if (date('D') !== 'Mon')
            <div>
                <h3 class="font-weight-bolder">Demande de retrait</h3>
                <p class="text-danger font-weight-bold">Les frais de rétrait sont de 5% du montant de rétrait demandé</p>
                <h4 class="my-3">Solde actuel : {{Auth::user()->account->amount}} FCFA</h4>
            </div>
            <form class="js-validate" action="{{ route('account.requestWithdrawal') }}" method="post">
                @csrf
                <div class="js-form-message form-group">
                    <label for="withdrawAmount">Entrer la somme que vous souhaiterait retirée <span class="text-danger">*</span></label>
                    <input type="hidden" name="client" value="{{ Auth::user()->email }}">
                    <input type="number" class="form-control" name="withdrawAmount" id="withdrawAmount" placeholder="Somme de retrait"><br>
                    @error('withdrawAmount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if (Auth::user()->account->amount === 0)
                       <p>Veuillez d'abord recharger votre compte</p>
                    @else
                    <button type="submit" class="btn btn-primary-dark-w px-5">Envoyer</button>
                    @endif
                </div>
            </form>
            @else
            <h2 style="font-style: italic;">Les demandes de rétrait ne se font que les lundis</h2>
            @endif
        </div>

        <div class="col-12 my-5">
            <ul class="nav nav-pills p-2 bg-light" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link font-weight-bold active" id="pills-validated-tab" data-toggle="pill" href="#pills-validated" role="tab" aria-controls="pills-validated" aria-selected="true">Mes demandes validées</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link font-weight-bold" id="pills-rejected-tab" data-toggle="pill" href="#pills-rejected" role="tab" aria-controls="pills-rejected" aria-selected="false">Mes demandes rejétées</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-validated" role="tabpanel" aria-labelledby="pills-validated-tab">
                    @if (count($validated_withdrawals) === 0)
                        <h5 class="text-secondary mt-5 mx-auto">Vous n'avez aucune demande de rétraits validée!</h5>
                    @else
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($validated_withdrawals as $withdrawal)
                          <tr>
                            <td>{{ $withdrawal->amount }} FCFA</td>
                            <td>{{ date('d/M/Y', strtotime($withdrawal->created_at)) }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab">
                    @if (count($rejected_withdrawals) === 0)
                        <h5 class="text-secondary mt-5 mx-auto">Vous n'avez aucune demande de rétraits rejétée!</h5>
                    @else
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($rejected_withdrawals as $withdrawal)
                            <tr>
                              <td>{{ $withdrawal->amount }} FCFA</td>
                              <td>{{ date('d/M/Y', strtotime($withdrawal->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    @endif
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
