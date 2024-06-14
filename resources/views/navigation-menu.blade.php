<nav class="navbar navbar-expand-lg bg-body-tertiary col-11 col-lg-10 mx-auto">
    <div class="container-fluid bg-dark rounded px-3 py-1">
        <a class="navbar-brand text-white" href="/">{{ strtoupper(config('app.name')) }} </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white {{ (request()->is('/')) ? 'bg-secondary bg-opacity-75' : '' }}" aria-current="page" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ (request()->is('quienes-somos')) ? 'bg-secondary bg-opacity-75' : '' }}" href="#">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ (request()->is('contacto')) ? 'bg-secondary bg-opacity-75' : '' }}" href="#">Contacto</a>
                </li>
            </ul>
            @livewire('search-bar')
            @auth()
                <div class="dropdown">
                    <img src="{{ auth()->user()->profile_photo_url }}" id="userMenu" class="btn btn-secondary dropdown-toggle rounded-circle p-0 ms-2 mt-0 mb-lg-0 mb-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 3rem; height: 3rem;" />
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="userMenu">
                        <li><span class="dropdown-item-text"><strong>{{ auth()->user()->name }}</strong></span></li><hr>
                        <li><a class="dropdown-item" href="{{ route('perfil') }}"><i class="bi bi-person"></i> Perfil</a></li>
                        @hasanyrole('admin|editor')
                        <li><a class="dropdown-item" href="/admin"><i class="bi bi-gear"></i></i> Configuración</a></li>
                        @endhasanyrole
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
