<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <nav class="bg-black flex py-3">
            <div class="w-full mx-auto px-4 flex">
                <a class="text-lg text-white min-w-48" href="{{ route('home') }}"><strong class="text-orange-500 text-bold">Wheely</strong> good cars<strong class="text-orange-500 text-bold">!</strong></a>
                <div class="flex justify-between w-full" id="navbarNav">
                    <ul class="flex items-end">
                        <li class="mr-4"><a class="text-white hover:text-gray-300" href="{{ route('cars.index')}}">Alle auto's</a></li>
                        @auth
                            <li class="mr-4"><a class="text-white hover:text-gray-300" href="{{ route('car.create.step1') }}">Aanbod plaatsen</a></li>
                            <li class="mr-4"><a class="text-white hover:text-gray-300" href="">Mijn aanbod</a></li>
                        @endauth
                    </ul>
                    <ul class="flex">
                        @guest
                            <li class="mr-4"><a class="text-orange-500 hover:text-orange-400" href="{{ route('register') }}">Registreren</a></li>
                            <li class="mr-4"><a class="text-orange-500 hover:text-orange-400" href="{{ route('login') }}">Inloggen</a></li>
                        @endguest
                        @auth
                            <li class="mr-4">
                                <a class="text-orange-500 hover:text-orange-400" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Uitloggen
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="max-w-7xl mx-auto px-4">
            {{ $slot }}
        </div>
    </body>
</html>
