<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg bg-body-tertiary col-11 col-lg-10 mx-auto">
            <div class="container-fluid bg-dark">
                <a class="navbar-brand text-white" href="#">MEMORIA VARAS MENA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list text-white"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Quiénes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Contacto</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-2" role="search">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Buscar" aria-label="search" aria-describedby="basic-addon1">
                        </div>
                    </form>
                    @auth()
                        <div class="dropdown">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQESgEgkgFa6JBZxS_lIO7glUy3SWRmbfO4K7sTq6_1NA&s" class="btn btn-secondary dropdown-toggle rounded-circle p-0 ms-2 mt-0" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 3rem; height: 3rem;" />
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><span class="dropdown-item-text"><strong>Nombre de usuario</strong></span></li><hr>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Perfil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i></i> Configuración</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="text-white ms-2">
                            Iniciar sesión / Registrarse
                        </div>
                    @endauth
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
