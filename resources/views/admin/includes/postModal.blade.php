<div class="modal fade modal-lg" id="postPrev-{{ $publicacion->id }}" tabindex="-1" aria-labelledby="postPrevLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $publicacion->titulo }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <img src="{{asset('storage/'.$publicacion->imagen)}}" class="img-fluid" mb-2>
                <p>{!! $publicacion->cuerpo !!}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a type="button" class="btn btn-danger" href="{{route('publicacion.show', $publicacion)}}" target="_blank">Ir al post <i class="bi bi-arrow-right-circle"></i></a>
            </div>
        </div>
    </div>
</div>
