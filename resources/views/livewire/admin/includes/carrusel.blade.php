<div>
    <h4>Vista previa</h4>
    @include('includes.carousel')
    <hr>

    <h4>Editar imágenes</h4>
    <div class="row">
        @foreach($imagenes as $imagen)
            <div class="card mb-3 ms-2 px-0" style="width: 18rem;">
                <img src="{{ asset('storage/'.$imagen->url) }}" class="card-img-top object-fit-cover" alt="{{ $imagen->description }}" style="height: 10rem">
                <div class="card-body">
                    <h5 class="card-title">{{ $imagen->title }}</h5>
                    <p class="card-text">{{ Str::limit($imagen->description, 70) }}</p>
                    <div class="text-end">
                        <a wire:click="editarImagen({{ $imagen->id }})" href="#formularioImagen" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i> Editar</a>
                        <btn href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEliminarImagen-{{$imagen->id}}"><i class="bi bi-x-square"></i> Eliminar</btn>
                    </div>
                </div>
            </div>

            {{--Modal para eliminar imagen--}}
            <div class="modal fade" id="modalEliminarImagen-{{$imagen->id}}" tabindex="-1" aria-labelledby="modalEliminarImagenlabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalEliminarImagenLabel">Eliminar imagen</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body text-center">
                            ¿Está seguro que desea eliminar esta imagen y su contenido?
                            <img src="{{ asset('storage/'.$imagen->url) }}" class="img-fluid">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button
                                wire:click="eliminarImagen({{ $imagen->id }})"
                                type="button"
                                class="btn btn-primary"
                                data-bs-dismiss="modal">
                                Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>

    <h4>Agregar nueva imagen</h4>
    <span class="small text-secondary">Se recomienda usar imágenes de aproximadamente 1298x422 pixeles</span>
    <div class="input-group has-validation" id="formularioImagen">
        <span class="input-group-text"><i class="bi bi-card-image"></i></span>
        <div class="form-floating">
            <input
                wire:model="imagenNueva"
                type="file"
                class="form-control @error('imagenNueva') is-invalid @enderror"
                id="imagenNueva"
                placeholder="Imagen"
                required>
            <label for="imagenNueva" class="@if($errors->has('imagenNueva')) text-primary @endif">
                {{ $errors->has('imagenNueva') ? $errors->first('imagenNueva') : 'Imagen' }}
            </label>
        </div>
        <div class="col-12 mt-1">
            <div wire:loading wire:target="imagenNueva">
                <div class="spinner-border spinner-border-sm mt-2" role="status">
                </div>
                Subiendo imagen...
            </div>
            @if($editando && is_a($imagenNueva, 'Illuminate\Http\UploadedFile'))
                <img src="{{ $imagenNueva->temporaryUrl() }}" class="img-thumbnail w-25">
            @elseif($editando)
                <img src="{{ asset('storage/'.$imagenAEditar->url) }}" class="img-thumbnail w-25">
            @elseif(is_a($imagenNueva, 'Illuminate\Http\UploadedFile'))
                <img src="{{ $imagenNueva->temporaryUrl() }}" class="img-thumbnail w-25">
            @endif
        </div>

    </div>
    <div id="contenido" class="mt-2">
        <form class="form-floating">
            <input
                wire:model.live.debounce.300ms="titulo"
                type="text"
                class="form-control @error('titulo') is-invalid @enderror"
                id="titulo"
                placeholder="Título de la imagen"
                value=""
                maxlength="100">
            <label for="titulo" class="@error('titulo') text-primary @enderror">
                {{ $errors->has('titulo') ? $errors->first('titulo') : 'Título de la imagen' }}
            </label>
        </form>
        <div class="form-floating mt-3">
            <textarea
                wire:model.live.debounce.300ms="descripcion"
                class="form-control @error('descripcion') @enderror"
                placeholder="Descripción de la imagen"
                id="descripcion"
                maxlength="500"
                style="height: 7rem">
            </textarea>
            <label for="descripcion" class="@error('descripcion') text-primary @enderror">
                {{ $errors->has('descripcion') ? $errors->first('descripcion') : 'Descripción de la imagen' }}
            </label>
        </div>
    </div>
    <hr>

    <div id="submit" class="text-end">
        <button
            @if($editando)
                wire:click="guardarImagen({{ $imagenAEditar->id }})"
            @else
                wire:click="agregarNuevaImagen"
            @endif
            class="btn btn-primary me-3 mb-2">
            {!! $editando ? '<i class="bi bi-floppy"></i> Guardar imagen' : '<i class="bi bi-plus"></i> Agregar imagen' !!}
        </button>
    </div>

    @if(session('publicado'))
        <div class="toast align-items-center text-bg-success border-0 show bottom-0 end-0 position-fixed mb-3 me-3" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('publicado') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

</div>
