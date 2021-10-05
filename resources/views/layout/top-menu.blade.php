@extends('../layout/main')

@section('head')
@yield('subhead')
@endsection

@section('content')
<!-- BEGIN: Top Bar -->
<div class="border-b border-theme-24 -mt-10 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 pt-3 md:pt-0 mb-10">
    <div class="top-bar-boxed flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex">
            <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
            <span class="text-white text-lg ml-3">
               LARAMOUZANA
            </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
            <a href="" class="">Application</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="" class="breadcrumb--active">Dashboard</a>
        </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input input dark:bg-dark-1 placeholder-theme-13"
                    placeholder="Search...">
                <i data-feather="search" class="search__icon dark:text-gray-300"></i>
            </div>
            <a class="notification notification--light sm:hidden" href="">
                <i data-feather="search" class="notification__icon dark:text-gray-300"></i>
            </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="" class="flex items-center">
                            <div class="w-8 h-8 bg-theme-18 text-theme-9 flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-feather="inbox"></i>
                            </div>
                            <div class="ml-3">Mail Settings</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div
                                class="w-8 h-8 bg-theme-17 text-theme-11 flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-feather="users"></i>
                            </div>
                            <div class="ml-3">Users & Permissions</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div
                                class="w-8 h-8 bg-theme-14 text-theme-10 flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-feather="credit-card"></i>
                            </div>
                            <div class="ml-3">Transactions Report</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Users</div>
                    <div class="mb-5">
                        @foreach (array_slice($fakers, 0, 4) as $faker)
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                    src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
                            </div>
                            <div class="ml-3">{{ $faker['users'][0]['name'] }}</div>
                            <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                                {{ $faker['users'][0]['email'] }}</div>
                        </a>
                        @endforeach
                    </div>
                    <div class="search-result__content__title">Products</div>
                    @foreach (array_slice($fakers, 0, 4) as $faker)
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full"
                                src="{{ asset('dist/images/' . $faker['images'][0]) }}">
                        </div>
                        <div class="ml-3">{{ $faker['products'][0]['name'] }}</div>
                        <div class="ml-auto w-48 truncate text-gray-600 text-xs text-right">
                            {{ $faker['products'][0]['category'] }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END: Search -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in scale-110">
                <img alt="Midone Tailwind HTML Admin Template"
                    src="{{ asset('dist/images/' . $fakers[9]['photos'][0]) }}">
            </div>
            <div class="dropdown-box w-56">
                <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                    <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                        <div class="font-medium">{{ Auth::guard('admin')->user()->first_name . ' ' . Auth::guard('admin')->user()->last_name }}</div>
                        <div class="text-xs text-theme-41 dark:text-gray-600">
                            @if(Auth::guard('admin')->user()->role_id === 5)
                                Administrateur
                            @elseif(Auth::guard('admin')->user()->role_id === 4)
                                Livreur
                            @else
                                Comptable
                            @endif
                        </div>
                    </div>
                    <div class="p-2">
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i> Profil
                        </a>
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                            <i data-feather="edit" class="w-4 h-4 mr-2"></i> Ajouter un admin
                        </a>
                        <a href=""
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Changer de mot de passe
                        </a>
                    </div>
                    <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                        <a href="{{ route('logout') }}"
                            class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Se déconnecter
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->
<!-- BEGIN: Top Menu -->
<nav class="top-nav">
    <ul>
        @if (Auth::guard('admin')->user()->role_id === 5)
        <li>
            <a href="{{ route('dashboard') }}" class="top-menu @if(Request::route()->uri === 'staff') top-menu--active @endif">
                <div class="top-menu__icon">
                    <i data-feather="home"></i>
                </div>
                <div class="top-menu__title">
                    Dashboard
                </div>
            </a>
        </li>
        <li>
            <a href="#" class="top-menu @if(stristr(Request::route()->uri,'staff/all_products') || Request::route()->uri === 'staff/add_categories') top-menu--active @endif">
                <div class="top-menu__icon">
                    <i data-feather="shopping-cart"></i>
                </div>
                <div class="top-menu__title">
                    Produits
                    <i data-feather="chevron-down" class="top-menu__sub-icon"></i>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ asset('staff/all_products') }}" class="top-menu">
                        <div class="top-menu__title">
                            Tous les produits
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('staff/add_categories') }}" class="top-menu">
                        <div class="top-menu__title">
                            Ajouter une catégorie
                        </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="top-menu @if(stristr(Request::route()->uri,'staff/users/')) top-menu--active @endif">
                <div class="top-menu__icon">
                    <i data-feather="user"></i>
                </div>
                <div class="top-menu__title">
                    Utilisateurs
                    <i data-feather="chevron-down" class="top-menu__sub-icon"></i>
                </div>
            </a>
            <ul>
                <li>
                    <a href="{{ asset('/staff/users/clients') }}" class="top-menu">
                        <div class="top-menu__title">
                            Clients
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{asset('/staff/users/technicians')}}" class="top-menu">
                        <div class="top-menu__title">
                            Techniciens
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('/staff/users/deliverers')}}" class="top-menu">
                        <div class="top-menu__title">
                            Livreurs
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{ asset('/staff/users/accountants') }}" class="top-menu">
                        <div class="top-menu__title">
                            Comptables
                        </div>
                    </a>
                </li>
            </ul>
                <li>
                    <a href="/Faqs" class="top-menu">
                        <div class="top-menu__icon">
                            <i data-feather="hash"></i>
                        </div>
                        <div class="top-menu__title">
                            Faqs
                        </div>
                    </a>
                        <li>
                            <a href="{{ asset('staff/commands') }}" class="top-menu @if(stristr(Request::route()->uri, 'commands')) top-menu--active @endif">
                                <div class="top-menu__title">
                                    Commandes
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
        @elseif (Auth::guard('admin')->user()->role_id === 3)
        <li>
            <a href="{{ route('accountant.index') }}" class="top-menu @if(stristr(Request::route()->uri, 'accountant/dashboard')) top-menu--active @endif">
                <div class="top-menu__title">
                    Commandes
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.deposit') }}" class="top-menu @if(stristr(Request::route()->uri, 'accountant/deposit')) top-menu--active @endif">
                <div class="top-menu__title">
                    Dépôts
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.withdraw') }}" class="top-menu @if(stristr(Request::route()->uri, 'accountant/withdraw')) top-menu--active @endif">
                <div class="top-menu__title">
                    Rétraits
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('accountant.remittance') }}" class="top-menu @if(stristr(Request::route()->uri, 'accountant/remittance')) top-menu--active @endif">
                <div class="top-menu__title">
                    Transferts
                </div>
            </a>
        </li>
        @elseif (Auth::guard('admin')->user()->role_id === 4)
        <li>
            <a href="{{ route('deliverer.index') }}" class="top-menu @if(stristr(Request::route()->uri, 'staff/deliverer/dashboard')) top-menu--active @endif">
                <div class="top-menu__icon">
                    <i data-feather="truck"></i>
                </div>
                <div class="top-menu__title">
                    Mes missions
                </div>
            </a>
        </li>
        <li>
            <a href="{{ route('deliverer.history') }}" class="top-menu @if(stristr(Request::route()->uri, 'staff/deliverer/history')) top-menu--active @endif">
                <div class="top-menu__icon">
                    <i data-feather="calendar"></i>
                </div>
                <div class="top-menu__title">
                    Historique de livraisons
                </div>
            </a>
        </li>
        @endif

        </li>

    </ul>
</nav>
<div class="content">
    @yield('subcontent')
</div>
@endsection
