<div class="modal fade modal-lg" id="profPic-{{ $usuario->id }}" tabindex="-1" aria-labelledby="profPic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="text-center">
                    <img src="{{$usuario->mostrarFotoDeperfil($usuario)}}" class="img-fluid" mb-2>
                </div>
            </div>
        </div>
    </div>
</div>
