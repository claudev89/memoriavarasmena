@php($imagenes = \App\Models\ImagenCarrusel::all()->sortByDesc('created_at'))

<div class="col-12 mb-4">
    <div id="carrusel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach($imagenes as $imagen)
                <button type="button" data-bs-target="#carrusel" data-bs-slide-to="{{ $loop->index }}" @if($loop->index == 0) class="active" aria-current="true" @endif aria-label="Slide {{ $loop->iteration }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($imagenes as $imagen)
                <div class="carousel-item @if($loop->index == 0) active @endif">
                    <img
                        src="{{ asset('storage/'.$imagen->url) }}"
                        class="d-block w-100 h-lg-50 position-relative object-fit-cover"
                        alt="{{ $imagen->descripcion }}">
                    <div class="carousel-caption d-block bg-secondary bg-opacity-50 px-3">
                        <h5>{{ $imagen->title }}</h5>
                        <p>{{ $imagen->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carrusel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrusel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <style>
        @media (min-width: 992px) { /* lg breakpoint */
            .h-lg-50 {
                height: 50%;
            }
            .carousel-item img {
                height: calc(50vh - 56px); /* 50% de la altura de la pantalla menos la altura de los indicadores del carousel */
                object-fit: cover; /* Ajusta la imagen sin estirarla */
                object-position: center; /* Centra la imagen */
            }
        }
    </style>

</div>
