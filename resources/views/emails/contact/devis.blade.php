<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <style type="text/css">
    .blockquote-custom {
            position: relative;
            font-size: 1.1rem;
        }

        .blockquote-custom-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -25px;
            left: 50px;
        }

        body {
            background: #eff0eb;
            background-image: url('https://i.postimg.cc/MTbfnkj6/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <header class="text-center pb-5">
                        <h1 class="h2">Demande de dévis</h1>
                        <p>Vous avez recu un message de demande de
                            dévis.<br>Nom:{{$devis['first_name']}}<br>Email:{{$devis['email']}}<br>Number:{{$devis['number']}}<a href="" class="font-italic text-info"></a></p>
                    </header>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">

                    <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                        <div class="blockquote-custom-icon bg-info shadow-sm"><i class="fa fa-quote-left text-white"></i></div>
                        <p class="mb-0 mt-2 font-italic">Méssage:{{$devis['message']}}<a href="#" class="text-info"></a></p>
                        <footer class="blockquote-footer pt-4 mt-4 border-top">
                            <cite title="Source Title">Titre de la source:Repears</cite>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
<body>
</html>