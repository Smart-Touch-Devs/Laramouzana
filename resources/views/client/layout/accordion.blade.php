@extends('client.base')
@section('main')
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('boxicons/css/boxicons.min.css') }}" rel="stylesheet">

<body>
    <section id="about" class="about">
        <div class="container">
            <div class="section-titl">
                <h2>A propos de nous</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi
                    quidem hic quas.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                    <img src="assets/img/about4.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                    <h3>Voluptatem dignissimos provident quasi corporis</h3>
                    <p class="text-gray-90 max-width-334">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                    <ul>
                        <li>
                            <i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li>
                            <i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.
                        </li>
                        <li>
                            <i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur.
                            Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu
                            fugiat nulla pariatur
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <main id="content" class="x-y" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="../../assets/img/500X300/domot1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">What we really do?</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">Donec libero dolor, tincidunt id laoreet
                                vitae, ullamcorper eu tortor. Maecenas pellentesque, dui vitae iaculis mattis, tortor
                                nisi faucibus magna,vitae ultrices lacus purus vitae metus.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="../../assets/img/500X300/domot1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">Our Vision</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">
                                Donec libero dolor, tincidunt id laoreet vitae, ullamcorper eu tortor. Maecenas
                                pellentesque, dui vitae iaculis mattis, tortor nisi faucibus magna,vitae ultrices lacus
                                purus vitae metus.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3 border-0 text-center rounded-0">
                        <img class="img-fluid mb-3" src="../../assets/img/500X300/domot1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="font-size-18 font-weight-semi-bold mb-3">History of Beginning</h5>
                            <p class="text-gray-90 max-width-334 mx-auto">
                                Donec libero dolor, tincidunt id laoreet vitae, ullamcorper eu tortor. Maecenas
                                pellentesque, dui vitae iaculis mattis, tortor nisi faucibus magna,vitae ultrices lacus
                                purus vitae metus.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-1 py-12 mb-10 mb-lg-15">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-5 mb-xl-0 col-xl text-center">
                        <img class="img-fluid mb-3 rounded-circle" src="../../assets/img/300X300/vent3.jpg"
                            alt="Card image cap">
                        <h2 class="font-size-18 font-weight-semi-bold mb-0">Thomas Snow</h2>
                        <span class="text-gray-41">CEO/Founder</span>
                    </div>
                    <div class="col-md-4 mb-5 mb-xl-0 col-xl text-center">
                        <img class="img-fluid mb-3 rounded-circle" src="../../assets/img/300X300/vent3.jpg"
                            alt="Card image cap">
                        <h2 class="font-size-18 font-weight-semi-bold mb-0">Anna Baranov</h2>
                        <span class="text-gray-41">Client Care</span>
                    </div>
                    <div class="col-md-4 mb-5 mb-xl-0 col-xl text-center">
                        <img class="img-fluid mb-3 rounded-circle" src="../../assets/img/300X300/vent3.jpg"
                            alt="Card image cap">
                        <h2 class="font-size-18 font-weight-semi-bold mb-0">Andre Kowalsy</h2>
                        <span class="text-gray-41">Support Boss</span>
                    </div>
                    <div class="col-md-4 mb-5 mb-xl-0 col-xl text-center">
                        <img class="img-fluid mb-3 rounded-circle" src="../../assets/img/300X300/vent3.jpg"
                            alt="Card image cap">
                        <h2 class="font-size-18 font-weight-semi-bold mb-0">Pamela Doe</h2>
                        <span class="text-gray-41">Delivery Driver</span>
                    </div>
                    <div class="col-md-4 mb-5 mb-xl-0 col-xl text-center">
                        <img class="img-fluid mb-3 rounded-circle" src="../../assets/img/300X300/vent3.jpg"
                            alt="Card image cap">
                        <h2 class="font-size-18 font-weight-semi-bold mb-0">Susan McCain</h2>
                        <span class="text-gray-41">Packaging Girl</span>
                    </div>
                    <div class="col-md-4 mb-5 mb-xl-0 col-xl text-center">
                        <img class="img-fluid mb-3 rounded-circle" src="../../assets/img/300X300/vent2.jpg"
                            alt="Card image cap">
                        <h2 class="font-size-18 font-weight-semi-bold mb-0">See Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
@endsection
