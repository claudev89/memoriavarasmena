<div class="modal fade modal-lg" id="verObra-{{ $obra->id }}" tabindex="-1" aria-labelledby="verObraLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="verObraLabel">{{ $obra->autor->nombre }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{asset('storage/'.$obra->autor->imagen)}}" class="img-fluid mb-2 rounded-circle object-fit-cover" style="width: 20rem; height: 20rem">
                <p class="mt-2">{{ $obra->contenido }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
