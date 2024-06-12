<a class="text-reset" href="{{ route('publicacion.show', $publicacion) }}" style="text-decoration: none">
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4" style="height: 10rem; overflow: hidden">
                <img src="{{ asset('storage/'.$publicacion?->imagen) }}" class="w-100 img-fluid object-fit-cover rounded-start" alt="{{ $titulo }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $titulo }}</h5>
                    <p class="card-text ">{!! Str::limit($cuerpo, 140) !!}</p>
                    <p class="card-text"><small class="text-body-secondary">Publicado {{ $fecha->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
</a>
