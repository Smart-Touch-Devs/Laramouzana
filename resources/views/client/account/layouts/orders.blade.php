@extends('client.account.base')

@section('accountPart')

<div class="row justify-content-center">
    <div class="col-md-10 col-12 my-5">
        <ul class="nav nav-pills p-2 bg-light" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link font-weight-bold active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mes achats en cours</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link font-weight-bold" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Historique de mes achats</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @if (count($todeliver_products) === 0)
                    <h5 class="text-secondary mt-5 mx-auto">Vous n'avez aucune commande en cours!</h5>
                @else
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Produits</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Prix total</th>
                        <th scope="col">Délai de livraison restant</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($todeliver_products as $product)
                      <tr>
                        <td>{{ $product->products->product_name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->products->price * $product->quantity }} FCFA</td>
                        <td>{{ $product->products->delivery_time ?? "Aucun temps de livraison" }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @endif
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                @if (count($delivered_products) === 0)
                    <h5 class="text-secondary mt-5 mx-auto">Vous n'avez aucun produit déjà livré!</h5>
                @else
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Produits</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Prix total</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($delivered_products as $product)
                        <tr>
                          <td>{{ $product->products->product_name }}</td>
                          <td>{{ $product->quantity }}</td>
                          <td>{{ $product->products->price * $product->quantity }} FCFA</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                @endif
            </div>
          </div>
    </div>
</div>

@endsection
