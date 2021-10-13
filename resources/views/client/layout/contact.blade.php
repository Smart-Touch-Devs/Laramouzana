@extends('client.base')
@section('main')

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<body>
    <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-titl">
                <h2>Contact</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi
                    quidem hic quas.
                </p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>Notre Address</h3>
                        <p>A108 Yaya, Ouagadougou Wemtenga, Bp 535022</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-envelope"></i>
                        <h3>Notre Email</h3>
                        <p>contact@repears.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>Notre Numéro</h3>
                        <p>+226 55-89-55-48</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 ">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3897.0328007209164!2d-1.5298549851840975!3d12.380735091245501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xe2ebfe183928fff%3A0xec1f1154e9439e8!2sSmart%20Touch%20Group%20Sarl!5e0!3m2!1sfr!2sbf!4v1632333760154!5m2!1sfr!2sbf" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen></iframe>
                </div>
                <div class="col-lg-6">
                    <form action="{{route('validation')}}" method="post" role="form" class="php-email-form"
                        enctype="multipart/form-data">
                        @csrf

                        @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Bien réçu!</strong>{{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        @endif
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom"
                                    required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Votre email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Objets"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                required></textarea>
                        </div>

                        <div class="text-center"><button type="submit">Envoyez message</button></div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
@endsection
