<div>
    <div
        class="modal modal-lg fade"
        id="agregarObra"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="agregarObra"
        aria-hidden="true"
        wire:ignore.self
    >
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1
                        class="modal-title fs-5"
                        id="staticBackdropLabel">
                        <i class="bi bi-file-earmark-plus"></i>
                        @if(is_null($obra)) Agregar @else Editar @endif
                        @if($tipo != '')
                            @if($tipo == 'c') cita
                            @elseif($tipo == 'p') poema
                            @elseif($tipo == 't') canción
                            @endif
                        @else
                            obra
                        @endif
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div wire:ignore class="mb-1">
                        <select wire:model="autorId" id="selectAutor" required>
                            <option value="">Seleccione un autor</option>
                            @foreach($autores as $autor)
                                <option value="{{$autor->id}}"> {{ $autor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('$this->autorId')<span class="alert small alert-danger mt-4 py-1">{{ $message }}</span> @enderror

                    <h5 class="mt-2">Tipo de obra</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.live="tipo" id="rbCita" value="c" required>
                        <label class="form-check-label" for="rbCita">
                            Cita
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.live="tipo" id="rbPoema" value="p">
                        <label class="form-check-label" for="rbPoema">
                            Poema
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" wire:model.live="tipo" id="rbCancion" value="t">
                        <label class="form-check-label" for="rbCancion">
                            Canción
                        </label>
                    </div>
                    @error('tipo')<span class="small alert alert-danger py-1">{{ $message }}</span> @enderror

                    <div class="form-floating mt-2 mb-2">
                        <textarea wire:model.live.debounce.300ms="contenido" class="form-control" placeholder="Contenido de la obra" id="contenido" style="height: 100px"></textarea>
                        <label for="contenido">Contenido</label>
                    </div>
                    @error('contenido')<span class="small alert alert-danger py-1">{{ $message }}</span> @enderror

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button
                        type="button"
                        class="btn btn-danger"
                        data-bs-dismiss="modal"
                        wire:click="agregarObra"
                        @if(count($errors) > 0) disabled @endif
                    >
                        @if(is_null($obra)) Agregar @else Editar @endif
                        @if($tipo != '')
                            @if($tipo == 'c') cita
                            @elseif($tipo == 'p') poema
                            @elseif($tipo == 't') canción
                            @endif
                        @else
                            obra
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        $(document).ready(function () {
            $('#selectAutor').select2({
                dropdownParent: $('#agregarObra'),
                placeholder: 'Seleccione un autor',
                width: '45rem'
            });

            $('#selectAutor').on('change', function () {
                let data = $(this).val();
                $wire.set('autorId', data);
            });

            Livewire.on('autor-id-updated', (event) => {
                $('#selectAutor').val(@this.get('autorId'));
                $('#selectAutor').trigger('change');
            });
        });

    </script>
    @endscript

</div>
