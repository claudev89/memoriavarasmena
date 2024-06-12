<a class="text-reset" href="{{route('publicacion.show', $publicacion)}}" style="text-decoration: none">
    <div class="card mb-2">
        <div class="row g-0">
            <div class="col-md-4 my-auto" style="height: 6rem">
                <img src="{{ asset('storage/'.$publicacion?->imagen) }}" class="object-fit-cover w-100 img-fluid rounded ms-1" alt="{{ $titulo }}"  style="max-height: 6rem">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $titulo }}</h5>
                    <p class="card-text text-truncate">{!! Str::limit($cuerpo, 30) !!}</p>
                </div>
            </div>
        </div>
    </div>
</a>

