<header id="header" class="u-header u-header-left-aligned-nav">
    <div class="u-header__section">
        <!-- Topbar -->
        <div class="u-header-topbar py-2 d-none d-xl-block">
            <div class="container">
                <div class="d-flex align-items-center">
                    <div class="topbar-left">
                        <a href="{{asset('contact')}}" class="text-gray-110 font-size-13 u-header-topbar__nav-link">Bienvenue chez
                            Repears</a>
                    </div>
                    <div class="topbar-right ml-auto">
                        <ul class="list-inline mb-0">
                            <li
                                class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <a type="button" data-toggle="modal" data-target="#exampleModalLong"><i
                                        class="fab fa-deviantart"></i>
                                    Demande de dévis
                                </a>
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content text-black-50">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center " id="exampleModalLongTitle ">Vous pouvez procédez à la Demande de dévis maintenant</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="">
                                            <div class="wrapper1">
                                                <section class="form1 signup">
                                                    <header class="head">Demande de Dévis</header>
                                                    <form class="form2" action="{{route('devis_store')}}"  method="post">
                                                    {{csrf_field()}}
                                                        @if(Session::has('Dévis'))
                                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <strong>Bien réçu!</strong>{{ Session::get('Dévis') }}
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        @endif
                                                        <div class="name-details ">
                                                            <div class="field input">
                                                                <label for="">Nom</label>
                                                                <input type="text" name="first_name" placeholder="Entrez votre nom" required>
                                                                @if($errors->has('first_name'))
                                                                    <p>{{ $errors->first('first_name') }}</p>
                                                                @endif
                                                            </div>
                                                            <div class="field input">
                                                                <label for="">Prénoms</label>
                                                                <input type="text" name="last_name" placeholder="Entrez votre prénoms" required>
                                                                @if($errors->has('last_name'))
                                                                    <p>{{ $errors->first('last_name') }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="field input">
                                                            <label for="">Adresse email</label>
                                                            <input type="email" name="email" placeholder="Entrez votre adresse email" required>
                                                        </div>
                                                        <div class="field input">
                                                            <label for="">Number</label>
                                                            <input type="tel" name="number" placeholder="Entrer votre Numéro" required>
                                                            @if($errors->has('number'))
                                                                <p>{{ $errors->first('number') }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="field input">
                                                            <label for="">Demande de dévis</label>
                                                            <textarea rows="5" cols="5" name="message" type="text" placeholder="Entrez votre message" required></textarea>
                                                                @if($errors->has('message'))
                                                                    <p>{{ $errors->first('message') }}</p>
                                                                @endif
                                                        </div>

                                                        <div class="field button">
                                                            <input type="submit" value="Soumettre votre demande">
                                                        </div>

                                                    </form>
                                                </section>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border u-header-topbar__nav-item-no-border u-header-topbar__nav-item-border-single">
                                <div class="d-flex align-items-center">
                                    <div class="position-relative">
                                        <a type="button" data-toggle="modal" data-target="#exampleModal"><i
                                                class="fab fa-deviantart"></i>
                                            Demande d'intervention
                                        </a>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content text-black-50">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Vous pouvez procédez à la Demande d'une intervention</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="">
                                                    <div class="wrapper1">
                                                        <section class="form1 signup">
                                                            <header class="head">Demande d'intervention</header>
                                                            <form class="form2" action="{{route('intervention_store')}}" method="post">
                                                            {{csrf_field()}}
                                                                @if(Session::has('Intervention'))
                                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                    <strong>Bien réçu!</strong>{{ Session::get('Intervention') }}
                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                @endif
                                                                <div class="name-details ">
                                                                    <div class="field input">
                                                                        <label for="">Nom</label>
                                                                        <input type="text"  name="first_name" placeholder="Entrez votre nom" required>
                                                                        @if($errors->has('first_name'))
                                                                            <p>{{ $errors->first('first_name') }}</p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="field input">
                                                                        <label for="">Prénoms</label>
                                                                        <input type="text" name="last_name" placeholder="Entrez votre prénoms" required>
                                                                        @if($errors->has('last_name'))
                                                                            <p>{{ $errors->first('last_name') }}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="field input">
                                                                    <label for="">Adresse email</label>
                                                                    <input type="email" name="email" placeholder="Entrez votre addresse mail" required>
                                                                    @if($errors->has('email'))
                                                                        <p>{{ $errors->first('email') }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="field input">
                                                                    <label for="">Numéro</label>
                                                                    <input type="text" name="number" placeholder="Entrez votre numéro" required>
                                                                    @if($errors->has('number'))
                                                                        <p>{{ $errors->first('number') }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="field input">
                                                                    <label for="">Demande d'intervention</label>
                                                                    <textarea rows="5" cols="5" name="message" type="text" placeholder="Entrez votre message" required></textarea>
                                                                    @if($errors->has('message'))
                                                                        <p>{{ $errors->first('message') }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="field button">
                                                                    <input type="submit" value="Soumettre votre demande">
                                                                </div>
                                                            </form>
                                                        </section>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="list-inline-item mr-0 u-header-topbar__nav-item u-header-topbar__nav-item-border">
                                <!-- Account Sidebar Toggle Button -->
                                @if(Auth::check())
                                <a id="sidebarNavToggler" href="{{ route('account.index') }}" role="button" class="u-header-topbar__nav-link"
                                aria-controls="sidebarContent"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight" id="sidebarNavToggler" href="{{ asset('login') }}" role="button"
                                    class="u-header-topbar__nav-link" aria-controls="sidebarContent"
                                    aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                    data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent"
                                    data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight"
                                    data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                    <i class="ec ec-user mr-1"></i>Se connecter
                                </a>
                                data-unfold-duration="500">
                                <i class="ec ec-user mr-1"></i>Mon compte
                            </a>
                                @else
                                <a id="sidebarNavToggler" href="{{ route('client.login') }}" role="button" class="u-header-topbar__nav-link"
                                aria-controls="sidebarContent"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight"

                                data-unfold-duration="500">
                                <i class="ec ec-user mr-1"></i>Se connecter
                            </a>
                                @endif

                                <!-- End Account Sidebar Toggle Button -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->

        <!-- Logo and Menu -->
        <div class="py-2 py-xl-4 bg-primary-down-lg">
            <div class="container my-0dot5 my-xl-0">
                <div class="row align-items-center">
                    <!-- Logo-offcanvas-menu -->
                    <div class="col-auto">
                        <!-- Nav -->
                        <nav
                            class="navbar navbar-expand u-header__navbar py-0 justify-content-xl-between max-width-270 min-width-270">
                            <!-- Logo -->
                            <a class="order-1 order-xl-0 navbar-brand u-header__navbar-brand u-header__navbar-brand-center"
                                href="../home/index.html" aria-label="Electro">
                                <svg version="1.1" x="0px" y="0px" width="175.748px" height="42.52px"
                                    viewBox="0 0 175.748 42.52" enable-background="new 0 0 175.748 42.52"
                                    style="margin-bottom: 0;">
                                    <ellipse class="ellipse-bg" fill-rule="evenodd" clip-rule="evenodd" fill="#FDD700"
                                        cx="170.05" cy="36.341" rx="5.32" ry="5.367"></ellipse>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#333E48"
                                        d="M30.514,0.71c-0.034,0.003-0.066,0.008-0.056,0.056
                                        C30.263,0.995,29.876,1.181,29.79,1.5c-0.148,0.548,0,1.568,0,2.427v36.459c0.265,0.221,0.506,0.465,0.725,0.734h6.187
                                        c0.2-0.25,0.423-0.477,0.669-0.678V1.387C37.124,1.185,36.9,0.959,36.701,0.71H30.514z M117.517,12.731
                                        c-0.232-0.189-0.439-0.64-0.781-0.734c-0.754-0.209-2.039,0-3.121,0h-3.176V4.435c-0.232-0.189-0.439-0.639-0.781-0.733
                                        c-0.719-0.2-1.969,0-3.01,0h-3.01c-0.238,0.273-0.625,0.431-0.725,0.847c-0.203,0.852,0,2.399,0,3.725
                                        c0,1.393,0.045,2.748-0.055,3.725h-6.41c-0.184,0.237-0.629,0.434-0.725,0.791c-0.178,0.654,0,1.813,0,2.765v2.766
                                        c0.232,0.188,0.439,0.64,0.779,0.733c0.777,0.216,2.109,0,3.234,0c1.154,0,2.291-0.045,3.176,0.057v21.277
                                        c0.232,0.189,0.439,0.639,0.781,0.734c0.719,0.199,1.969,0,3.01,0h3.01c1.008-0.451,0.725-1.889,0.725-3.443
                                        c-0.002-6.164-0.047-12.867,0.055-18.625h6.299c0.182-0.236,0.627-0.434,0.725-0.79c0.176-0.653,0-1.813,0-2.765V12.731z
                                        M135.851,18.262c0.201-0.746,0-2.029,0-3.104v-3.104c-0.287-0.245-0.434-0.637-0.781-0.733c-0.824-0.229-1.992-0.044-2.898,0
                                        c-2.158,0.104-4.506,0.675-5.74,1.411c-0.146-0.362-0.451-0.853-0.893-0.96c-0.693-0.169-1.859,0-2.842,0h-2.842
                                        c-0.258,0.319-0.625,0.42-0.725,0.79c-0.223,0.82,0,2.338,0,3.443c0,8.109-0.002,16.635,0,24.381
                                        c0.232,0.189,0.439,0.639,0.779,0.734c0.707,0.195,1.93,0,2.955,0h3.01c0.918-0.463,0.725-1.352,0.725-2.822V36.21
                                        c-0.002-3.902-0.242-9.117,0-12.473c0.297-4.142,3.836-4.877,8.527-4.686C135.312,18.816,135.757,18.606,135.851,18.262z
                                        M14.796,11.376c-5.472,0.262-9.443,3.178-11.76,7.056c-2.435,4.075-2.789,10.62-0.501,15.126c2.043,4.023,5.91,7.115,10.701,7.9
                                        c6.051,0.992,10.992-1.219,14.324-3.838c-0.687-1.1-1.419-2.664-2.118-3.951c-0.398-0.734-0.652-1.486-1.616-1.467
                                        c-1.942,0.787-4.272,2.262-7.134,2.145c-3.791-0.154-6.659-1.842-7.524-4.91h19.452c0.146-2.793,0.22-5.338-0.279-7.563
                                        C26.961,15.728,22.503,11.008,14.796,11.376z M9,23.284c0.921-2.508,3.033-4.514,6.298-4.627c3.083-0.107,4.994,1.976,5.685,4.627
                                        C17.119,23.38,12.865,23.38,9,23.284z M52.418,11.376c-5.551,0.266-9.395,3.142-11.76,7.056
                                        c-2.476,4.097-2.829,10.493-0.557,15.069c1.997,4.021,5.895,7.156,10.646,7.957c6.068,1.023,11-1.227,14.379-3.781
                                        c-0.479-0.896-0.875-1.742-1.393-2.709c-0.312-0.582-1.024-2.234-1.561-2.539c-0.912-0.52-1.428,0.135-2.23,0.508
                                        c-0.564,0.262-1.223,0.523-1.672,0.676c-4.768,1.621-10.372,0.268-11.537-4.176h19.451c0.668-5.443-0.419-9.953-2.73-13.037
                                        C61.197,13.388,57.774,11.12,52.418,11.376z M46.622,23.343c0.708-2.553,3.161-4.578,6.242-4.686
                                        c3.08-0.107,5.08,1.953,5.686,4.686H46.622z M160.371,15.497c-2.455-2.453-6.143-4.291-10.869-4.064
                                        c-2.268,0.109-4.297,0.65-6.02,1.524c-1.719,0.873-3.092,1.957-4.234,3.217c-2.287,2.519-4.164,6.004-3.902,11.007
                                        c0.248,4.736,1.979,7.813,4.627,10.326c2.568,2.439,6.148,4.254,10.867,4.064c4.457-0.18,7.889-2.115,10.199-4.684
                                        c2.469-2.746,4.012-5.971,3.959-11.063C164.949,21.134,162.732,17.854,160.371,15.497z M149.558,33.952
                                        c-3.246-0.221-5.701-2.615-6.41-5.418c-0.174-0.689-0.26-1.25-0.4-2.166c-0.035-0.234,0.072-0.523-0.045-0.77
                                        c0.682-3.698,2.912-6.257,6.799-6.547c2.543-0.189,4.258,0.735,5.52,1.863c1.322,1.182,2.303,2.715,2.451,4.967
                                        C157.789,30.669,154.185,34.267,149.558,33.952z M88.812,29.55c-1.232,2.363-2.9,4.307-6.13,4.402
                                        c-4.729,0.141-8.038-3.16-8.025-7.563c0.004-1.412,0.324-2.65,0.947-3.726c1.197-2.061,3.507-3.688,6.633-3.612
                                        c3.222,0.079,4.966,1.708,6.632,3.668c1.328-1.059,2.529-1.948,3.9-2.99c0.416-0.315,1.076-0.688,1.227-1.072
                                        c0.404-1.031-0.365-1.502-0.891-2.088c-2.543-2.835-6.66-5.377-11.704-5.137c-6.02,0.288-10.218,3.697-12.484,7.846
                                        c-1.293,2.365-1.951,5.158-1.729,8.408c0.209,3.053,1.191,5.496,2.619,7.508c2.842,4.004,7.385,6.973,13.656,6.377
                                        c5.976-0.568,9.574-3.936,11.816-8.354c-0.141-0.271-0.221-0.604-0.336-0.902C92.929,31.364,90.843,30.485,88.812,29.55z">
                                    </path>
                                </svg>
                            </a>
                            <!-- End Logo -->

                            <!-- Fullscreen Toggle Button -->
                            <button id="sidebarHeaderInvokerMenu" type="button"
                                class="navbar-toggler d-block btn u-hamburger mr-3 mr-xl-0"
                                aria-controls="sidebarHeader" aria-haspopup="true" aria-expanded="false"
                                data-unfold-event="click" data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarHeader1" data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <span id="hamburgerTriggerMenu" class="u-hamburger__box">
                                    <span class="u-hamburger__inner"></span>
                                </span>
                            </button>
                            <!-- End Fullscreen Toggle Button -->
                        </nav>
                        <!-- End Nav -->

                        <!-- ========== HEADER SIDEBAR ========== -->
                        <aside id="sidebarHeader1" class="u-sidebar u-sidebar--left"
                            aria-labelledby="sidebarHeaderInvokerMenu">
                            <div class="u-sidebar__scroller">
                                <div class="u-sidebar__container">
                                    <div class="u-header-sidebar__footer-offset pb-0">
                                        <!-- Toggle Button -->
                                        <div class="position-absolute top-0 right-0 z-index-2 pt-4 pr-7">
                                            <button type="button" class="close ml-auto" aria-controls="sidebarHeader"
                                                aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarHeader1"
                                                data-unfold-type="css-animation" data-unfold-animation-in="fadeInLeft"
                                                data-unfold-animation-out="fadeOutLeft" data-unfold-duration="500">
                                                <span aria-hidden="true"><i
                                                        class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                                            </button>
                                        </div>
                                        <!-- End Toggle Button -->
                                        <nav
                                        class="js-mega-menu navbar navbar-expand u-header__navbar u-header__navbar--no-space">
                                        <!-- Navigation -->
                                        <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
                                            <ul class="navbar-nav u-header__navbar-nav customNav">
                                                <!-- Home -->
                                                <li class="nav-item hs-has-sub-menu u-header__nav-item">
                                                    <a id="HomeMegaMenu" class="nav-link u-header__nav-link @if(Request::route()->uri === '/') activeNav @endif"
                                                        href="/">Accueil</a>
                                                </li>
                                                <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                                    <a id="pagesMegaMenu" class="nav-link u-header__nav-link @if(Request::route()->uri === 'shop') activeNav @endif"
                                                        href="{{ asset('shop') }}">Boutique</a>
                                                </li>
                                                <li class="nav-item u-header__nav-item">
                                                    <a class="nav-link u-header__nav-link @if(Request::route()->uri === 'about') activeNav @endif" href="{{asset('about')}}">À propos</a>
                                                </li>
                                                <li class="nav-item u-header__nav-item">
                                                    <a class="nav-link u-header__nav-link @if(Request::route()->uri === 'contacts') activeNav @endif" href="{{asset('contacts')}}">Contactez-nous</a>
                                                </li>
                                                <li class="nav-item u-header__nav-item">
                                                    <a class="nav-link u-header__nav-link @if(Request::route()->uri === 'faqs') activeNav @endif" href="{{asset('faqs')}}">FAQs</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Navigation -->
                                    </nav>

                                        <!-- End Content -->
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- ========== END HEADER SIDEBAR ========== -->
                    </div>
                    <!-- End Logo-offcanvas-menu -->
                    <!-- Primary Menu -->
                    <div class="col d-none d-xl-block">
                        <!-- Nav -->
                        <div class="row justify-content-center">
                            <nav
                                class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
                                <!-- Navigation -->
                                <div id="navBar" class="d-block">
                                    <ul class="navbar-nav u-header__navbar-nav">
                                        <!-- Home -->
                                        <li class="nav-item hs-has-sub-menu u-header__nav-item">
                                            <a id="HomeMegaMenu" class="nav-link u-header__nav-link @if(Request::route()->uri === '/') activeNav @endif"
                                                href="/">Accueil</a>
                                        </li>
                                        <li class="nav-item hs-has-mega-menu u-header__nav-item">
                                            <a id="pagesMegaMenu" class="nav-link u-header__nav-link @if(Request::route()->uri === 'shop') activeNav @endif"
                                                href="{{ asset('shop') }}">Boutique</a>
                                        </li>
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link @if(Request::route()->uri === 'about') activeNav @endif" href="{{asset('about')}}">À propos</a>
                                        </li>
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link @if(Request::route()->uri === 'contacts') activeNav @endif" href="{{asset('contacts')}}">Contactez-nous</a>
                                        </li>
                                        <li class="nav-item u-header__nav-item">
                                            <a class="nav-link u-header__nav-link @if(Request::route()->uri === 'faqs') activeNav @endif" href="{{asset('faqs')}}">FAQs</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End Navigation -->
                            </nav>
                        </div>
                        <!-- End Nav -->
                    </div>
                    <!-- End Primary Menu -->
                    <!-- Customer Care -->
                    <div class="d-none d-xl-block col-md-auto">
                        <div class="d-flex">
                            <i class="ec ec-support font-size-50 text-primary"></i>
                            <div class="ml-2">
                                <div class="phone">
                                    <strong>Contacts : </strong> <a href="tel:0022652206767" class="text-gray-90">(+226)
                                        52206767</a>
                                </div>
                                <div class="email">
                                    E-mail: <a href="mailto:info@reapers.com?subject=Besoin d'aide"
                                        class="text-gray-90">info@reapers.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Logo and Menu -->

        <!-- Vertical-and-Search-Bar -->
        <div class="d-none d-md-block bg-primary">
            <div class="container">
                <div class="row align-items-stretch min-height-50">
                    <!-- Vertical Menu -->
                    <div class="col-md-auto d-none d-xl-flex align-items-end">
                        <div class="max-width-270 min-width-270">
                            <!-- Basics Accordion -->
                            <div id="basicsAccordion">
                                <!-- Card -->
                                @if (!stristr(Request::route()->uri, 'account'))
                                <div class="card border-0 rounded-0">
                                    <div class="card-header bg-primary rounded-0 card-collapse border-0"
                                        id="basicsHeadingOne">
                                        <button type="button"
                                            class="btn-link btn-remove-focus btn-block d-flex card-btn py-3 text-lh-1 px-4 shadow-none btn-primary rounded-top-lg border-0 font-weight-bold text-gray-90"
                                            data-toggle="collapse" data-target="#basicsCollapseOne"
                                            aria-expanded="{{ Request::route()->uri === 'shop' ? 'false' : 'true' }}"
                                            aria-controls="basicsCollapseOne">
                                            <span class="pl-1 text-gray-90">Catégories</span>
                                            <span class="text-gray-90 ml-3">
                                                <span class="ec ec-arrow-down-search"></span>
                                            </span>
                                        </button>
                                    </div>
                                    <div id="basicsCollapseOne"
                                        class="collapse {{ Request::route()->uri === 'shop' ? 'hide' : 'show' }} vertical-menu v1"
                                        aria-labelledby="basicsHeadingOne" data-parent="#basicsAccordion">
                                        <div class="card-body p-0">
                                            <nav
                                                class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">



                                                <div id="navBar"
                                                    class="collapse navbar-collapse u-header__navbar-collapse">
                                                    <ul
                                                        class="navbar-nav u-header__navbar-nav border-primary border-top-0">
                                                        @if (isset($empty))
                                                            <li class="nav-item u-header__nav-item" data-event="hover"
                                                            data-position="left">Aucune catégories enregistrée!</li>
                                                        @else
                                                            @foreach ($categories as $categorie)
                                                                <li class="nav-item u-header__nav-item" data-event="hover"
                                                                    data-position="left">
                                                                    <a href="#"
                                                                        class="nav-link u-header__nav-link font-weight-bold text-capitalize">{{ $categorie->category_name }}</a>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Card -->
                                @endif
                            </div>
                            <!-- End Basics Accordion -->
                        </div>
                    </div>
                    <!-- End Vertical Menu -->
                    <!-- Search bar -->
                    <div class="col align-self-center">
                        <!-- Search-Form -->
                        <form class="js-focus-state">
                            <label class="sr-only" for="searchProduct">Rechercher</label>
                            <div class="input-group">
                                <input type="email"
                                    class="form-control py-2 pl-5 font-size-15 border-0 height-40 rounded-left-pill"
                                    name="email" id="searchProduct" placeholder="Rechercher un produit"
                                    aria-label="Rechercher un produit" aria-describedby="searchProduct1" required>
                                <div class="input-group-append">
                                    <!-- Select -->
                                    <select
                                        class="js-select selectpicker dropdown-select custom-search-categories-select"
                                        data-style="btn height-40 text-gray-60 font-weight-normal border-0 rounded-0 bg-white px-5 py-2">
                                            <option selected>Toutes les catégories</option>
                                        @if (isset($empty))
                                            <option selected>Toutes les catégories</option>
                                        @else
                                            @foreach ($categories as $categorie )
                                            <option class="text-capitalize">{{ $categorie->category_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <!-- End Select -->
                                    <button class="btn btn-dark height-40 py-2 px-3 rounded-right-pill" type="button"
                                        id="searchProduct1">
                                        <span class="ec ec-search font-size-24"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- End Search-Form -->
                    </div>
                    <!-- End Search bar -->
                    <!-- Header Icons -->
                    <div class="col-md-auto align-self-center">
                        <div class="d-flex">
                            <ul class="d-flex list-unstyled mb-0">
                                <li class="col pr-0">
                                    <a href="{{ route('client.cart') }}" class="text-gray-90 position-relative d-flex"
                                        data-toggle="tooltip" data-placement="top" title="Cart">
                                        <i class="font-size-22 ec ec-shopping-bag"></i>
                                        <span
                                            class="width-22 height-22 bg-dark position-absolute flex-content-center text-white rounded-circle left-12 top-8 font-weight-bold font-size-12">0</span>
                                        <span class="font-weight-bold font-size-16 text-gray-90 ml-3">0 FCFA</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Header Icons -->
                </div>
            </div>
        </div>
        <!-- End Vertical-and-secondary-menu -->
    </div>
</header>
