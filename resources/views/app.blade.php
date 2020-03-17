<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <title>Totothèque - Bienvenue sur le site de la bibliothèque</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div id="app">
        <img id="background" class="object-cover w-full" src="/img/background1.jpg">

        <header class="sticky top-0">
            <!--Navbar-->
            <ul class="flex bg-white text-white p-5">
                <router-link tag="li" :to="{ name: 'home' }" class="flex-1 ml-64 mr-auto text-2xl text-indigo-500">Totothèque</router-link>
                <li class="flex-1 ml-32 mr-auto">
                    <form class="w-full max-w-sm">
                        <input class="ml-auto mr-auto bg-gray-100 border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:bg-white" id="recherche" type="text" placeholder="Rechercher">
                    </form>
                </li>
                <li class="flex-1 ml-64 mr-auto">
                    <router-link :to="{ name: 'login' }" class=" border border-indigo-500 rounded py-1 px-3 bg-transparent hover:bg-indigo-600 hover:border-indigo-500 hover:text-white text-indigo-500" tag="button">
                        Se connecter
                    </router-link>
                </li>
            </ul>
        </header>

        <div class="container mx-auto">
            <router-view></router-view>
        </div>
    </div>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

</body>

</html>