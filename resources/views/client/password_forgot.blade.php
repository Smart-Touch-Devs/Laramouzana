<!DOCTYPE html>
<html lang="en">

<head>

    <title>Rénitialisation de mot de passe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
</head>

<body>
    <main id="content" role="main">
        <div class="container" style="margin-top: 15vh;">
            <div>
                <h1 class="text-center text-uppercase">Mot de passe oublié?</h1>
            </div>
            <div class="my-4">
                <div class="row">
                    <div class="offset-3"></div>
                    <div class="col-md-6 ml-xl-auto mr-md-auto mr-xl-0 mb-md-0">
                        @error('email')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreur!</strong> {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @enderror
                        @if ($message = Session::get('expiredError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erreur!</strong> {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          {{Session::forget('expiredError')}}
                        @endif
                        <form class="js-validate" novalidate="novalidate" action="{{ route('client.sendResetMail') }}" method="POST">
                            @csrf
                            <div class="js-form-message form-group">
                                <label class="form-label" for="email">Votre adresse Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="exemple@gmail.com" required data-msg="Please enter a valid email address." data-error-class="u-has-error" data-success-class="u-has-success">
                            </div>
                            <div class="mb-1 ">
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">Rénitialiser</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="offset-3"></div>
                </div>
            </div>
        </div>
        <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/popper.js/dist/umd/popper.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/bootstrap.min.js') }}"></script>
</body>
</html>
