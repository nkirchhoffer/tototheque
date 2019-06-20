<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <title>Totothèque - {{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <div id="app">
        <img id="background" class="object-cover w-full" src="img/background1.jpg">

        <header class="sticky top-0">
            <!--Navbar-->
            <ul class="flex bg-white text-white p-5">
                <li class="flex-1 ml-64 mr-auto text-2xl text-indigo-500">Totothèque</li>
                <li class="flex-1 ml-32 mr-auto">
                    <form class="w-full max-w-sm">
                        <input class="ml-auto mr-auto bg-gray-100 border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:bg-white" id="recherche" type="text" placeholder="Rechercher">
                    </form>
                </li>
                <li class="flex-1 ml-64 mr-auto">
                    <button class=" border border-indigo-500 rounded py-1 px-3 bg-transparent hover:bg-indigo-600 hover:border-indigo-500 hover:text-white text-indigo-500" href="#">
                        Se connecter
                    </button>
                </li>
            </ul>
        </header>

        <router-view></router-view>
    </div>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>

</html>