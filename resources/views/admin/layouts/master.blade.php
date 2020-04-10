<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Totothèque - Administration</title>

    <link rel="stylesheet" href="{{ mix('css/admin.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/fontawesome/css/all.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/admin" class="navbar-brand">Totothèque</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.perms.assign') }}" class="nav-link">Ressources humaines</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.authors.index') }}" class="nav-link">Gestion des ressources</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.borrowings.index') }}" class="nav-link">Gestion des emprunts</a>
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
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    @yield('scripts')
</body>
</html>