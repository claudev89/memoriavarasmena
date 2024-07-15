<div>
    <span class="small text-secondary">En esta sección puede escribir y personalizar el texto que y/o imágenes que irán en el pie de la página:</span>
    <form wire:submit.prevent>
        <div wire:ignore class="mt-2">
        <textarea id="summernote" name="summernote" class="form-control" placeholder="Pie de página"
                  style="height: 100px">{{ $pieDePagina }}</textarea>
        </div>
        <div id="submit" class="text-end mt-2">
            <button wire:click="guardarCambios" class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar</button>
        </div>
    </form>

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
                placeholder: 'Pie de página',
                height: 240,
                lang: "es-ES",
                callbacks: {
                    onChange: function (contents, $editable) {
                        if($('#summernote').summernote('isEmpty')) {
                        @this.set('pieDePagina', '');
                        }
                        else {
                        @this.set('pieDePagina', contents);
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
