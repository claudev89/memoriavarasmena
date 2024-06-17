<div class="dropdown">
    <img src="{{ $foto }}" id="userMenu" class="btn btn-secondary dropdown-toggle rounded-circle p-0 ms-2 mt-0 mb-lg-0 mb-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 3rem; height: 3rem;" />
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
