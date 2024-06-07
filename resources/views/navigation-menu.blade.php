<nav class="navbar navbar-expand-lg bg-body-tertiary col-11 col-lg-10 mx-auto">
    <div class="container-fluid bg-dark rounded px-3 py-1">
        <a class="navbar-brand text-white" href="/">{{ strtoupper(config('app.name')) }} </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contacto</a>
                </li>
            </ul>
            <form class="d-flex mb-2 mb-lg-0" role="search">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Buscar" aria-label="search" aria-describedby="basic-addon1">
                </div>
            </form>
            @auth()
                <div class="dropdown">
                    <img src="{{ auth()->user()->profile_photo_url }}" id="userMenu" class="btn btn-secondary dropdown-toggle rounded-circle p-0 ms-2 mt-0 mb-lg-0 mb-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 3rem; height: 3rem;" />
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="userMenu">
                        <li><span class="dropdown-item-text"><strong>{{ auth()->user()->name }}</strong></span></li><hr>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Perfil</a></li>
                        <li><a class="dropdown-item" href="/home"><i class="bi bi-gear"></i></i> Configuración</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <div class="text-white ms-2">
                    <a href="{{ route('login') }}" class="text-reset">Iniciar sesión</a> / <a href="{{ route('register') }}" class="text-reset">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
