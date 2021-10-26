@extends('client.account.base')

@section('accountPart')
<div class="w-75 mx-auto">
    <div class="row justify-content-between align-items-center px-2 my-5 rounded"  style="background: #ece9e9;">
        <div style="width: fit-content; height: fit-content;">
            <h1 style="color: #3D3D3;" class="font-weight-bold mt-1">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</h1>
        </div>
        <div class="mt-5">
            <p style="font-size: 24px;">
                <strong style="color: #3D3D3D;">Solde : </strong>
                <span>{{Auth::user()->account->amount}} FCFA</span>
                <span style="font-size: 17px;">(plus bonus)</span>
            </p>
        </div>
    </div>
    <div class="row mt-5 justify-content-between">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Email : </strong>
                <span>{{ Auth::user()->email }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Téléphone : </strong>
                <span>{{ Auth::user()->phone }}</span>
            </p>
        </div>
    </div>
    <div class="row my-2 justify-content-between">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Code affilié : </strong>
                <span>{{ Auth::user()->affiliate_code }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;" class="ml-2">
                <strong style="color: #3D3D3D;">Parrain : </strong>
                <span>{{ Auth::user()->sup_code === NULL ? 'Non parrainé' : Auth::user()->sup_code }}</span>
            </p>
        </div>
    </div>
    <div class="row my-2 justify-content-between text-left">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">CNIB : </strong>
                <span>{{ Auth::user()->cnib === NULL ? 'Aucun' : Auth::user()->cnib }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Date de naissance : </strong>
                <span>{{ date('d/M/Y', strtotime(Auth::user()->birthday)) }}</span>
            </p>
        </div>
    </div>
    <div class="row my-2 justify-content-between text-left">
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Pays : </strong>
                <span>{{ Auth::user()->clientCountry->countryName }}</span>
            </p>
        </div>
        <div>
            <p style="font-size: 19px;">
                <strong style="color: #3D3D3D;">Ville : </strong>
                <span>{{ Auth::user()->clientCity->cityName }}</span>
            </p>
        </div>
    </div>
    <div class="mt-5">
        <h2>Mes parrainages</h2>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-first_generation-tab" data-toggle="pill" href="#pills-first_generation" role="tab" aria-controls="pills-first_generation" aria-selected="true">1ère génération</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-second_generation-tab" data-toggle="pill" href="#pills-second_generation" role="tab" aria-controls="pills-second_generation" aria-selected="false">2ème génération</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-third_generation-tab" data-toggle="pill" href="#pills-third_generation" role="tab" aria-controls="pills-third_generation" aria-selected="false">3ème génération</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-first_generation" role="tabpanel" aria-labelledby="pills-first_generation-tab">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Code affilié</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach (Auth::user()->firstGeneration() as $affiliate)
                          <tr>
                            <td>{{ $affiliate->lastname }}</td>
                            <td>{{ $affiliate->firstname }}</td>
                            <td>{{ $affiliate->affiliate_code }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            <div class="tab-pane fade" id="pills-second_generation" role="tabpanel" aria-labelledby="pills-second_generation-tab">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Code affilié</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (Auth::user()->secondGeneration() as $affiliate)
                      <tr>
                        <td>{{ $affiliate->lastname }}</td>
                        <td>{{ $affiliate->firstname }}</td>
                        <td>
                            @if($affiliate->parrain()->affiliate_code === Auth::user()->affiliate_code)
                            Moi
                            @else
                            {{ $affiliate->parrain()->firstname . ' ' . $affiliate->parrain()->lastname }}
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="tab-pane fade" id="pills-third_generation" role="tabpanel" aria-labelledby="pills-third_generation-tab">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Code affilié</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach (Auth::user()->thirdGeneration() as $affiliate)
                      <tr>
                        <td>{{ $affiliate->lastname }}</td>
                        <td>{{ $affiliate->firstname }}</td>
                        <td>
                            {{ $affiliate->parrain()->firstname . ' ' . $affiliate->parrain()->lastname }}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
    </div>
@endsection
