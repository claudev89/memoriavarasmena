<div>
    <div class="modal modal-lg fade" id="{{ $publicacion ? 'edit-post-'.$publicacion->id : 'createPost' }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createPost" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-file-earmark-plus"></i> {{ $publicacion ? 'Editar publicación : '.$publicacion->titulo : 'Crear publicación' }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#postPreview" wire:click="createPost" @if(count($errors) > 0) disabled @endif >Vista Previa</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal modal-lg fade" id="postPreview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="postPreview" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Vista Previa - {{ $publicacion?->titulo }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(isset($publicacion->imagen))
                        <img src="{{ asset('storage/'.$publicacion?->imagen) }}" class="img-fluid" /> <br>
                    @endif
                    {!! $publicacion?->cuerpo !!} <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#createPost">Editar</button>
                    <button type="button" class="btn btn-danger" wire:click="publicarPost">Publicar</button>
                </div>
            </div>
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
                    height: 240,
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
</div>
