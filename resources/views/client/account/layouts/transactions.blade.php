@extends('client.account.base')

@section('accountPart')

<div class="w-100 mx-auto">
    <div class="card border rounded shadow mx-auto">
        <div class="col-12">
            <ul class="nav nav-pills p-2 bg-light" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link font-weight-bold active" id="pills-received-tab" data-toggle="pill" href="#pills-received" role="tab" aria-controls="pills-received" aria-selected="true">Mes transactions entrants</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link font-weight-bold" id="pills-sent-tab" data-toggle="pill" href="#pills-sent" role="tab" aria-controls="pills-sent" aria-selected="false">Mes transactions sortants</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-received" role="tabpanel" aria-labelledby="pills-received-tab">
                    @if (count($inner_transactions) === 0)
                        <h6 class="text-secondary mt-5 mx-auto">Vous n'avez réçu aucun dépôt sur votre compte!</h6>
                    @else
                    <table class="table table-striped">
                        <thead>
                          <tr>
                              <th scope="col">Expédiateur</th>
                              <th scope="col">Email de l'expédiateur</th>
                              <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($inner_transactions as $transaction)
                          <tr>
                              <td>{{ $transaction->Sender->firstname . ' ' . $transaction->Sender->lastname }}</td>
                              <td>{{ $transaction->Sender->email }}</td>
                            <td>{{ $transaction->amount }} FCFA</td>
                            <td>{{ date('d/M/Y', strtotime($transaction->created_at)) }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @endif
                </div>
                <div class="tab-pane fade" id="pills-sent" role="tabpanel" aria-labelledby="pills-sent-tab">
                    @if (count($outer_transactions) !== 0)
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Destinataire</th>
                            <th scope="col">Email du destinataire</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($outer_transactions as $transaction)
                            <tr>
                              <td>{{ $transaction->Receiver->firstname . ' ' . $transaction->Receiver->lastname }}</td>
                              <td>{{ $transaction->Receiver->email }}</td>
                              <td>{{ $transaction->amount }} FCFA</td>
                              <td>{{ date('d/M/Y', strtotime($transaction->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    @else
                        <h6 class="text-secondary mt-5 mx-auto">Vous n'avez effectué aucun transfert d'argent vers un autre compte!</h6>
                    @endif
                </div>
              </div>
        </div>
    </div>
</div>

@endsection
