<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Totothèque - Administration</title>

    <link rel="stylesheet" href="{{ mix('css/admin.css') }}" type="text/css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/admin" class="navbar-brand">Totothèque</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Ressources humaines</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top: 20px">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @yield('content')
    </div>

    <script src="{{ mix('js/admin.js') }}" type="text/javascript"></script>
</body>
</html>