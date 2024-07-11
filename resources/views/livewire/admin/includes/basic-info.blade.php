<div class="card-body">
        <form class="form-floating">
            <div class="form-floating mb-3">
                <input
                    wire:model.live="appName"
                    type="text"
                    class="form-control {{ $errors->has('appName') ? 'is-invalid' : 'is-valid' }}"
                    id="floatingInput"
                    placeholder="Nombre de la página"
                    required>
                <label
                    for="floatingInput"
                    class="{{ $errors->has('appName') ? 'text-primary' : '' }}">
                    {{ $errors->has('appName') ? $errors->first('appName') : 'Nombre de la página' }}
                </label>
            </div>
            <div class="form-floating mb-3">
                <input
                    wire:model="logo"
                    type="file"
                    accept="image/png image/webp"
                    class="form-control @error('logo') is-invalid @else is-valid @enderror"
                    id="floatingInput"
                    placeholder="Logo"
                >
                <label
                    for="floatingInput"
                    class="{{ $errors->has('logo') ? 'text-primary' : '' }}">
                    {{ $errors->has('logo') ? $errors->first('logo') : 'Logo' }}
                </label>
                <span class="small text-secondary">Se recomienda usar una imagen png o webp de fondo transparente <br></span>
                @if(is_a($logo, '\Illuminate\Http\UploadedFile'))
                    <img class="img-thumbnail w-25 h-auto mt-2" src="{{ $logo->temporaryUrl() }}" />
                @else
                    <img class="img-thumbnail w-25 h-auto mt-2" src="{{ asset('storage/'.$logo) }}" />
                @endif
                <div wire:loading wire:target="logo">
                    <div class="spinner-border spinner-border-sm mt-2" role="status"></div>
                    Subiendo imagen...
                </div>
            </div>
            <div wire:ignore>
                <h5>Quiénes somos</h5>
                <textarea id="summernote" name="editordata" class="form-control" placeholder="Quiénes somos"
                          style="height: 100px">{{ $quienesSomos }}</textarea>
            </div>
        </form>
    <div id="submit" class="text-end mt-2">
        <button wire:click="guardarCambios" class="btn btn-primary"  @if(count($errors) > 0) disabled @endif>
            <i class="bi bi-floppy"></i> Guardar
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

@push('js')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-es-ES.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Quiénes somos',
                height: 240,
                lang: "es-ES",
                callbacks: {
                    onChange: function (contents, $editable) {
                        if($('#summernote').summernote('isEmpty')) {
                        @this.set('quienesSomos', '');
                        }
                        else {
                        @this.set('quienesSomos', contents);
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
