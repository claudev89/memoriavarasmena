<div>
    <div class="modal modal-lg fade" id="agregarAutor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarAutor" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-person-plus"></i> @if(isset($autor))Editar autor @else Agregar autor @endif</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input
                            wire:model.live.debounce.300ms="nombre"
                            type="text"
                            class="form-control @error('nombre') is-invalid @else is-valid @enderror"
                            id="nombre"
                            placeholder="Nombre del autor"
                            maxlength="80">
                        <label for="title">Nombre del autor</label>
                        <div class="d-flex">
                            <div class="w-100">
                                @error('nombre')
                                <span class="d-inline-flex alert alert-danger small p-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <span class="d-flex small text-secondary text-end ms-2 flex-shrink-1">{{ strlen($nombre) }}/80</span>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input wire:model="imagen" accept="image/png, image/jpeg" type="file" class="form-control  @error('imagen') is-invalid @else is-valid @enderror" id="imagen">
                        <label for="imagen">Imagen del autor</label>
                        @error('imagen') <span class="small p-1 alert alert-danger">{{ $message }}</span> @enderror
                        @if(is_a($imagen, '\Illuminate\Http\UploadedFile'))
                            <img class="img-thumbnail w-25 h-auto mt-2" src="{{ $imagen->temporaryUrl() }}" />
                        @elseif ($autor && $autor->imagen)
                            <img class="img-thumbnail w-25 h-auto mt-2" src="{{ asset('storage/'.$autor->imagen) }}" />
                        @endif
                        <div wire:loading wire:target="imagen">
                            <div class="spinner-border spinner-border-sm mt-2" role="status">
                            </div>
                            Subiendo imagen...
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea
                            class="form-control @error('descripcion') is-invalid @else is-valid @enderror"
                            placeholder="Descripción del autor"
                            id="descripcion"
                            style="height: 20rem;"
                            wire:model.live.debounce.300ms="descripcion">
                        </textarea>
                        <label for="descripcion">Descripción del autor</label>
                    </div>
                    @error('descripcion')<span class="small p-1 alert alert-danger">{{ $message }}</span>@enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" wire:click="agregarAutor" @if(count($errors) > 0) disabled @endif >@if(isset($autor)) Guardar autor @else Agregar autor @endif</button>
                </div>
            </div>
        </div>
    </div>
</div>
