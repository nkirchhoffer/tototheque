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
        <ul class="relative bg-gray-900 text-white p-5 flex items-center sticky top-0 opacity-100">
            <li class="text-2xl mr-6 hover:text-gray-200 ml-64">
                <a href="#">Totothèque</a>
            </li>
            <li class="absolute right-0 mr-64">
                <a class="inline-block border border-gray-200 rounded py-1 px-3 bg-gray-900 hover:bg-indigo-600 hover:border-indigo-600 text-gray-200" href="#">Se connecter</a>
            </li>
            <li class="absolute right-0 mr-32">
                <a class="inline-block border border-indigo-500 rounded py-1 px-3 bg-indigo-500 hover:bg-indigo-600 hover:border-indigo-600 text-white" href="#">Déconnexion</a>
            </li>
        </ul>

        <router-view></router-view>
    </div>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>

</html>