<!DOCTYPE html>
<html lang="en">

<head>

    <title>S'inscrire | Reapers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../assets/css/theme.css">
</head>
<body>
    <main id="content" role="main">
        <div class="container">
            <div class="mb-4">
                <h1 class="text-center Font-weight-bold text-uppercase">Inscription</h1>
            </div>
            <div class="my-4">
                <div class="row">
                    <div class="offset-3"></div>
                    <div class="col-md-6 ml-xl-auto mr-md-auto mr-xl-0 mb-md-0">
                        <p class="text-gray-90 text-center">Bienvenue chez Reapers! Veuillez vous inscrire.</p>
                        <form class="js-validate" novalidate="novalidate" action="{{ route('client.register') }}" method="POST">
                            @csrf
                            <div class="js-form-message form-group">
                                <label class="form-label" for="lastname">Nom
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="lastname" class="form-control" name="lastname" @if(old('lastname')) value="{{ old('lastname') }}" @endif placeholder="Veuillez entrer votre nom" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('lastname')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="firstname">Prénom(s)
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="firstname" class="form-control" name="firstname" @if(old('firstname')) value="{{ old('firstname') }}" @endif placeholder="Veuillez entrer votre prénom" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('firstname')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="email">Adresse Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" id="email" class="form-control" name="email" @if(old('email')) value="{{ old('email') }}" @endif placeholder="abc@exemple.com" aria-label=" Email address" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('email')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="confirm_email">Confirmation Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" id="confirm_email" class="form-control" name="confirm_email" @if(old('confirm_email')) value="{{ old('confirm_email') }}" @endif placeholder="abc@exemple.com" aria-label=" Email address" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('confirm_email')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="birthday">Date de naissance
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="date" id="birthday" class="form-control" name="birthday" @if(old('birthday')) value="{{ old('birthday') }}" @endif placeholder="01/01/2021" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('birthday')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="phone">Téléphone
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="tel" id="phone" pattern="^{0}?[1-9]{1}[0-9]+$" class="form-control" name="phone" @if(old('phone')) value="{{ old('phone') }}" @endif placeholder="70 XX XX XX" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('phone')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="country">Pays
                                    <span class="text-danger">*</span>
                                </label>
                                <select id="country" class="option form-control" name="country" placeholder="Choisir votre pays" required>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->countryName }}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="city">Ville
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="option form-control" id="city" name="city" placeholder="Choisir votre ville" required>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="sup_code">Code parrain
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" id="sup_code" class="form-control" name="sup_code" @if(old('sup_code')) value="{{ old('sup_code') }}" @endif placeholder="Entrez votre code" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('sup_code')
                                <span class="text-danger font-weight-bold">Il n'existe aucun utilisateur avec ce code parrain</span>
                                @enderror
                            </div>

                            <div class="js-form-message form-group">
                                <label class="form-label" for="password">Mot de passe <span class="text-danger">*</span></label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Veuillez entrer votre mot de passe" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('password')
                                <span class="text-danger font-weight-bold">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                                <label class="form-label" for="confirm_password">Confirmation de mot de passe <span class="text-danger">*</span></label>
                                <input type="password" id="confirm_password" class="form-control" name="confirm_password" placeholder="Veuillez confirmer votre mot de passe" data-msg="Veuillez remplir ce champ." data-error-class="u-has-error" data-success-class="u-has-success" required>
                                @error('confirm_password')
                                <span class="text-danger font-weight-bold">{{ explode("'", $message)[0] . 'e mot de passe' }}</span>
                                @enderror
                            </div>
                            <div class="js-form-message form-group">
                            <p class="text-center  font-weight-bold">
                                        En cliquant ci-dessous , vous acceptez les <a href="#" class="text-smt-secondary">conditions de services</a> et la <a href="#" class="text-smt-secondary">Politique de confidentialité</a> de Reapers.
                                    </p>
                            </div>

                            <div class="mb-1">
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary-dark-w px-5">S'inscrire</button>
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
