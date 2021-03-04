@php $path = asset('/') @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Got Work</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body class="font-sans antialiased">
<!-- Header Start -->
<header class="bg-white shadow" x-data="{show: false}">
    <nav class="homeNav">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-14">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button @click="show =! show" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed. -->
                        <!--
                          Heroicon name: outline/menu

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg x-show="!show" class="block h-6 w-6 bg-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path x-show="!show" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                            <path x-show="show" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                        </svg>
                        <!-- Icon when menu is open. -->
                        <!--
                          Heroicon name: outline/x

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <!-- <svg x-show="show" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> -->
                            
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        <!-- <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow"> -->

                        <div class="hidden sm:block sm:ml-6">
                            <div class="flex space-x-4">

                                <a class="h-8 w-8 rounded-full bg-gray-300 infoButton" href="">
                                    <i class="fa fa-envelope-o m-2"></i>
                                </a>
                                <span class="mt-1 text-white">info@gotwork.com</span>
                                <span class="mt-1 text-white">|</span>

                                <a class="h-8 w-8 rounded-full bg-gray-300" href="">
                                    <i class="fa fa-wechat m-2"></i>
                                </a>
                                <span class="mt-1 text-white">Ask Your Question</span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-above">
                    <ul class="trh-social inline-block">
                        <li><a href="#"><i class="fa fa-facebook "></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin "></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter "></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus "></i></a></li>
                    </ul>

                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                    <!-- Profile dropdown -->
                    <div class="ml-3 relative">

                        <!--
                          Profile dropdown panel, show/hide based on dropdown state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                    </div>
                </div>
            </div>
        </div>
        <!--
          Mobile menu, toggle classes based on menu state.

          Menu open: "block", Menu closed: "hidden"
        -->
        <div class="hidden sm:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>
    <!-- Desktop Menu -->
    <div class="hidden sm:block max-w-7xl mx-auto px-2 sm:px-6 lg:px-20 mt-8">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4">
                <div class="logo">
                    <a href="#"></a>
                    <a href="{{ route('home') }}" class="custom-logo-link" rel="home" aria-current="page">
                        <img width="1948" height="583" src="{{ asset('/images/cropped-gotWorkLogoGreyOrange-1.png') }}" class="custom-logo" alt="Got Work" sizes="(max-width: 1948px) 100vw, 1948px">
                    </a>
                    <p class="site-description">Experts around the middle east</p>
                </div>
            </div>
            <div class="flex-1 flex sm:items-stretch justify-end">
                <div class="h-12 text-sm text-grey-dark flex float-right">
                    <p>About us</p>
                    @if (Route::has('login'))
                        <div class="hidden top-0 right-0 px-6 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div :class="show ? 'block' : 'hidden'" class="sm:hidden max-w-7xl mx-auto px-2 sm:px-6 lg:px-20 mt-8">
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="w-full md:w-1/2 lg:w-1/4 px-2 mb-4">
                <div class="logo">
                    <a href="#"></a>
                    <a href="{{ route('home') }}" class="custom-logo-link" rel="home" aria-current="page">
                        <img width="1948" height="583" src="{{ asset('/images/cropped-gotWorkLogoGreyOrange-1.png') }}" class="custom-logo" alt="Got Work" sizes="(max-width: 1948px) 100vw, 1948px">
                    </a>
                    <p class="site-description">Experts around the middle east</p>
                </div>
            </div>
            <div class="flex-1 flex sm:items-stretch justify-end">
                <div class="h-12 text-sm text-grey-dark flex float-right">
                    <p>About us</p>
                    @if (Route::has('login'))
                        <div class="hidden top-0 right-0 px-6 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-700">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
@yield('content')
<!-- Footer Start -->
<section id="footer" class="relative">
    <footer class="flex justify-center px-4 text-gray-100" style="background-image: url('{{$path}}images/footer/bg.jpg');">
        <div class="container py-6 px-24">
            <div class="texts float-left">
                <h3 class="text-lg font-bold lg:text-4xl">Become a Part of our Experts group</h3>
                <p class="mt-2"> Register now and checkout the different available projects. </p>
            </div>
            <div class="button float-right">
                <button class="w-full m-1 p-2 text-sm bg-gray-800 rounded-lg font-semibold uppercase lg:w-auto">subscribe</button>
            </div>
        </div>
    </footer>
</section>
<div class="copyright bg-black py-6 px-32 text-white">
    <p> Copyright © 2021 Got Work </p>
</div>
<!-- Footer Start -->
@yield('scripts')
</body>
</html>
