@extends('../layout/' . $layout)

@section('head')
    <title>Connexion | LARAMOUZANA </title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        LARAMOUZANA
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Laramouzana Stock and <br> Users management</div>
                    <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">Page de connexion du gestionnaire</div>
                </div>
            </div>
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Connexion</h2>
                    <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Gerer et regler les différentes configurations votre site de e-commerce</div>
                    <div class="intro-x mt-8">

                        <div style="color: rgb(173, 58, 58);">
                            @if (Session::get('error'))
                                {{Session::get('error')}}
                            @endif
                        </div>
                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <input type="text" id="input-email" name="email" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" value="waywardsidick@gmail.com">
                            <input type="password" id="input-password" name="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" value="test">
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button type="submit" id="btn-login" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END: Login Form -->
        </div>
    </div>
@endsection
