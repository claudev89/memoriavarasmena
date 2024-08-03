<div>
    <h2 id="publicaciones">Publicaciones</h2>

    <div class="row text-end mb-3">
        <div class="col pt-2">
            <h5><i class="bi bi-folder-fill text-warning"></i> Categoria: </h5>
        </div>

        <div class="col">
            <select wire:model.live="categoriaSeleccionada" class="form-select" aria-label="Default select example">
                <option selected value="0">Todas</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @foreach($publicaciones as $publicacion)
        @include('includes.postPreview', [
    'titulo' => $publicacion->titulo,
    'cuerpo' => $publicacion->cuerpo,
    'fecha' => $publicacion->created_at,
    'imagen' => $publicacion->imagen
    ])
    @endforeach

    {{ $publicaciones->links(data: ['scrollTo' => '#publicaciones']) }}

</div>
