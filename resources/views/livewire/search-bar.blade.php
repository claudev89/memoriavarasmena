<div>
    <form class="d-flex mb-2 mb-lg-0" role="search">
        <div class="input-group">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
            <input wire:model.live.debounce.300ms="search" type="text" class="form-control" placeholder="Buscar" aria-label="search" aria-describedby="basic-addon1">
        </div>
    </form>
    <ul class="dropdown-menu {{ strlen($search) >= 3 ? 'show' : '' }}">
        @forelse($publicaciones as $publicacion)
            <li>
                <a class="dropdown-item border-top border-bottom btn" href="{{ route('publicacion.show', $publicacion) }}" title="{{ $publicacion->titulo }}">
                    <div class="row py-1">
                        <div class="col-2 px-0">
                            <img src="{{ asset('/storage/'.$publicacion->imagen) }}" class="img-fluid">
                            {{ Str::limit($publicacion->titulo, 32) }}
                        </div>
                    </div>
                </a>
            </li>

        @empty
            <li><a class="dropdown-item" href="">No se encontraron resultados</a></li>
        @endforelse
    </ul>
</div>
