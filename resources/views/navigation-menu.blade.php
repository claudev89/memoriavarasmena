@php($nombreApp = \App\Models\Info::find(1)->nombre)
<nav class="navbar navbar-expand-lg bg-body-tertiary col-11 col-lg-10 mx-auto">
    <div class="container-fluid bg-dark rounded px-3 py-1">
        <a class="navbar-brand text-white" href="/"><img src="{{ asset('storage/'.\App\Models\Info::find(1)->logo) }}" class="me-1" style="width: 3rem"> {{ strtoupper($nombreApp) }} </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a
                        class="nav-link text-white {{ (request()->is('/')) ? 'bg-secondary bg-opacity-75' : '' }}"
                        aria-current="page"
                        href="/">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link text-white {{ (request()->is('quienes-somos')) ? 'bg-secondary bg-opacity-75' : '' }}"
                        href="{{ route('quienes-somos') }}">
                        Quiénes Somos
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link text-white {{ (request()->is('contacto')) ? 'bg-secondary bg-opacity-75' : '' }}"
                        href="{{ route('contacto') }}">
                        Contacto
                    </a>
                </li>
            </ul>
            @livewire('search-bar')
            @auth()
                    @livewire('includes.profile-photo-thumb')
            @else
                <div class="text-white ms-2">
                    <a href="{{ route('login') }}" class="text-reset">Iniciar sesión</a> / <a href="{{ route('register') }}" class="text-reset">Registrarse</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
