<div class="modal fade" id="eliminar-publicacion-{{ $publicacion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-x-circle text-danger"></i> Eliminar publicación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea eliminar la publicación : {!! '<strong>'.$publicacion->titulo.'</strong>' !!} ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger" href="{{ route('publicacion.delete', $publicacion) }}">Eliminar</a>
            </div>
        </div>
    </div>
</div>
