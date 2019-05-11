<!DOCTYPE html>
<html lang="{{ config('locale') }}">

<head>
    <title>Totothèque - Accueil</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <div id="app">
        <nav class="navbar is-primary" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="https://bulma.io">
                    Logo
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        Accueil
                    </a>

                    <a class="navbar-item">
                        Catégories
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            À propos
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                Emprunts
                            </a>
                            <a class="navbar-item">
                                Devenir membre
                            </a>
                            <a class="navbar-item">
                                Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary">
                                <strong>Sign up</strong>
                            </a>
                            <a class="button is-light">
                                Log in
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <section class="container">
        <router-view></router-view>
    </section>

    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>

</html>