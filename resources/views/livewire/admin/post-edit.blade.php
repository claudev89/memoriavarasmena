<div>
    <form wire:submit.prevent>
        <div class="form-floating mb-3">
            <input wire:model.live.debounce.300ms="titulo" type="text" class="form-control @error('titulo') is-invalid @else is-valid @enderror" id="titulo" placeholder="Título del Post" maxlength="200">
            <label for="title">Título de la publicación</label>
            <div class="d-flex">
                <div class="w-100">
                    @error('titulo')
                    <span class="d-inline-flex alert alert-danger small p-1">{{ $message }}</span>
                    @enderror
                </div>
                <span class="d-flex small text-secondary text-end ms-2 flex-shrink-1">{{ strlen($titulo) }}/200</span>
            </div>
        </div>

        <div class="form-floating mb-3">
            <select
                wire:model.live="categoria"
                class="form-select @error('categoria') is-invalid @else is-valid @enderror"
                id="categoria" aria-label="Categoría">
                <option selected>Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Categoría</label>
            @error('categoria')
            <span class="small alert alert-danger p-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input wire:model="imagen" accept="image/png, image/jpeg" type="file" class="form-control  @error('imagen') is-invalid @else is-valid @enderror" id="imagen">
            <label for="imagen">Imagen principal de la publicación</label>
            @error('imagen') <span class="small p-1 alert alert-danger">{{ $message }}</span> @enderror
            @if(is_a($imagen, '\Illuminate\Http\UploadedFile'))
                <img class="img-thumbnail w-25 h-auto mt-2" src="{{ $imagen->temporaryUrl() }}" />
            @elseif ($publicacion && $publicacion->imagen)
                <img class="img-thumbnail w-25 h-auto mt-2" src="{{ asset('storage/'.$publicacion->imagen) }}" />
            @endif
            <div wire:loading wire:target="imagen">
                <div class="spinner-border spinner-border-sm mt-2" role="status">
                </div>
                Subiendo imagen...
            </div>
        </div>
        <div class="form-floating mb-3" wire:ignore>
            Cuerpo de la publicación
            <textarea id="summernote" name="editordata" class="form-control" placeholder="Cuerpo de la publicación" style="height: 100px">{{ $cuerpo }}</textarea>
        </div>
        @error('cuerpo')<span class="small p-1 alert alert-danger">{{ $message }}</span>@enderror
    </form>
    <hr>
    <div class="d-flex justify-content-end">
        <a class="btn btn-outline-secondary me-2" href="{{ route('admin.publicaciones') }}"><i class="bi bi-arrow-left-circle"></i> Volver</a>
        <btn class="btn btn-danger" wire:click="editPost"  @if(count($errors) > 0) disabled @endif><i class="bi bi-floppy"></i> Guardar cambios</btn>
    </div>
</div>

@push('js')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-es-ES.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Cuerpo de la publicación',
                lang: "es-ES",
                callbacks: {
                    onChange: function (contents, $editable) {
                        if($('#summernote').summernote('isEmpty')) {
                        @this.set('cuerpo', '');
                        }
                        else {
                        @this.set('cuerpo', contents);
                        }
                    }
                }
            });


            document.getElementsByClassName("btn-codeview")[0].hidden = true;
            document.getElementsByClassName("btn-fullscreen")[0].hidden = true;

            // Ajuste para Bootstrap 5
            $('.note-toolbar [data-toggle]').each(function() {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });

            // Cerrar los dropdowns de Summernote al seleccionar una opción
            $(document).on('click', '.note-dropdown-item, .note-btn-group .dropdown-item', function() {
                var $dropdownMenu = $(this).closest('.dropdown-menu');
                $dropdownMenu.removeClass('show');
                $(this).closest('.note-btn-group').find('.dropdown-toggle').dropdown('hide');
            });

            // Cerrar el menú al hacer clic fuera de él
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.dropdown-menu').length && !$(e.target).closest('.note-btn-group').length) {
                    $('.dropdown-menu').removeClass('show');
                }
            });

        });

    </script>
@endpush

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush
