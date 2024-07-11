<div>
    <span class="small text-secondary">En esta sección puede escribir y personalizar el texto que y/o imágenes que irán en el pie de la página:</span>
    <div wire:ignore class="mt-2">
        <textarea id="summernote" name="editordata" class="form-control" placeholder="Pie de página"
                  style="height: 100px">{{ $pieDePagina }}</textarea>
    </div>


    <div id="submit" class="text-end mt-2">
        <button class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar</button>
    </div>
</div>

@push('js')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/lang/summernote-es-ES.js"></script>
    <script>

        $(document).ready(function () {
            $('#summernote').summernote({
                placeholder: 'Pie de página',
                height: 240,
                lang: "es-ES",
                callbacks: {
                    if ($('#summernote').summernote('isEmpty')) {
            @this.set('pieDepagina', '');
            } else {
            @this.set('pieDePagina', contents);
            }
            onChange: function (contents, $editable) {
            }
        }
        });


            document.getElementsByClassName("btn-codeview")[0].hidden = true;
            document.getElementsByClassName("btn-fullscreen")[0].hidden = true;

            // Ajuste para Bootstrap 5
            $('.note-toolbar [data-toggle]').each(function () {
                $(this).attr('data-bs-toggle', $(this).attr('data-toggle')).removeAttr('data-toggle');
            });

            // Cerrar los dropdowns de Summernote al seleccionar una opción
            $(document).on('click', '.note-dropdown-item, .note-btn-group .dropdown-item', function () {
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
