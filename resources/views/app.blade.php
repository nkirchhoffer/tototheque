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
                <router-link tag="li" :to="{ name: 'home' }" class="w-1/3 mx-auto lg:text-2xl md:text-2xl sm:text-lg text-indigo-500 align-middle">Totothèque</router-link>
                <li class="w-1/3 mx-auto -ml-8 ">
                    <section class="w-full max-w-sm">
                        <input class="ml-auto mr-auto bg-gray-100 border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:bg-white" v-model="searchText" type="text" v-on:keyup.13="search()" placeholder="Rechercher">
                    </section>
                </li>
                <li class="W-1/3 mx-auto">
                    <router-link :to="{ name: 'login' }" v-if="user === null" class=" border border-indigo-500 rounded py-1 px-3 bg-transparent hover:bg-indigo-600 hover:border-indigo-500 hover:text-white text-indigo-500" tag="button">
                        Se connecter
                    </router-link>
                    <button v-on:click="logout()" v-if="user !== null" class=" border border-indigo-500 rounded py-1 px-3 hover:bg-transparent bg-indigo-600 hover:border-indigo-500 text-white hover:text-indigo-500">
                        Déconnexion
                    </button>
                </li>
            </ul>
        </header>

        <div class="container mx-auto">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <notification type="error">{{ $error }}</notification>
                @endforeach
            @endif
            <router-view></router-view>
        </div>
    </div>

    <vue-progress-bar></vue-progress-bar>


    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

</body>

</html>