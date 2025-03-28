<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/css/main.css">
    <link href="/css/bootstrap-5.3.2.min.css" rel="stylesheet">
    <link href="/css/bootstrap-4.0.0.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <form action="{{ route('logout') }}" method="post" style="margin-left: 96%;">
            @csrf
            <button type="submit" class="logout-button">
                <span class="material-icons logout-icon">logout</span>
                <span class="logout-text">Sair</span>
            </button>
        </form>
    </nav>
    @yield('content')
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/sweetalert.js"></script>
</html>