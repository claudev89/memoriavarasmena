<a class="text-reset" href="{{route('publicacion.show', $publicacion->slug)}}" style="text-decoration: none">
    <div class="card mb-2">
        <div class="row g-0">
            <div class="col-md-4 my-auto" style="height: 6rem">
                <img src="{{ asset('storage/'.$publicacion?->imagen) }}" class="object-fit-cover w-100 img-fluid rounded ms-1" alt="{{ $titulo }}"  style="max-height: 6rem">
            </div>
            <div class="col-md-8">
                <div class="card-body pb-1">
                    <h5 class="card-title" title="{{ $titulo }}">{{ Str::limit( $titulo, 46) }}</h5>
                    <span class="card-text text-truncate">{!! Str::limit($cuerpo, 30) !!}</span>
                </div>
            </div>
        </div>
    </div>
</a>

