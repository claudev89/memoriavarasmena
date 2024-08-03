<div class="modal modal fade" id="categorias" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="categorias" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="bi bi-folder-fill text-warning"></i> Categorías</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row g-2 mb-3">
                    <div class="col-10">
                        <div class="form-floating">
                            <input wire:model.live.debounce.300ms="categoria" type="text" class="form-control @error('categoria') is-invalid" @enderror
                                   id="nombreCategoria" placeholder="Agregar Categoría">
                            <label for="nombreCategoria" @error('categoria') class="text-danger" @enderror>@error('categoria') {{ $message }} @else Agregar categoría @enderror  </label>
                        </div>
                    </div>
                    <div class="col-1">
                        <button wire:click="agregarCategoria" type="button"
                                class="btn my-2 mx-auto border-0" @if(strlen($categoria) == 0 || $errors->count() > 0) disabled @endif>
                            <h3>
                                @if(isset($categoriaAEditar))
                                    <i class="bi bi-floppy" title="Guardar categoría"></i>
                                @else
                                    <i class="bi bi-plus-circle-fill text-success" title="Agregar categoría"></i>
                                @endif
                            </h3>
                        </button>
                    </div>
                </div>

                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categorias as $categoria)
                            <tr wire:key="categoria-{{ $categoria->id }}">
                                <td>{{ $categoria->nombre }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Acciones">
                                        <button wire:click="editarCategoria({{ $categoria->id }})" class="btn">
                                            <h5><i class="bi bi-pencil"></i></h5>
                                        </button>
                                        <button wire:click="eliminarCategoria({{ $categoria->id }})" wire:confirm="¿Está seguro que desea eliminar la categoría {{$categoria->nombre}}?" class="btn"><h5><i class="bi bi-trash"></i></h5></button>
                                    </div>
                                </td>
                            </tr>


                        @empty
                            <tr>
                                <td colspan="2">
                                    Todavía no hay categorías.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-arrow-return-left"></i> Volver
                </button>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.tulti').tooltip();
        });
    </script>

</div>
