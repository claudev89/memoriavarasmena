<div>
    @if(session('publicado'))
        <div class="toast align-items-center text-bg-success border-0 fade show mx-auto" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {!! session('publicado') !!}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input
            type="search"
            class="form-control"
            placeholder="Buscar autor"
            aria-label="Autor"
            aria-describedby="basic-addon1"
            wire:model.live.debounce.300ms="search"
        >
    </div>
    <table class="table table-responsive table-striped">
        <thead>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </thead>
        <tbody>
        @forelse($autores as $autor)
            <tr>
                <td><img src="{{ asset('storage/'.$autor->imagen) }}" class="img-fluid object-fit-cover" style="max-width: 4rem; max-height: 4rem; width: 100%; height: 100%"></td>
                <td>{{ $autor->nombre }}</td>
                <td title="{{ $autor->descripcion }}">{{ Str::limit($autor->descripcion, 30) }}</td>
                <td>
                    <div class="btn-group">
                        @include('admin.includes.autorModal', $autor)
                        <btn class="btn px-0 me-1" title="Ver" data-bs-toggle="modal" data-bs-target="#verAutor-{{ $autor->id }}"><i class="bi bi-eye"></i></btn>
                        <btn class="btn px-0 me-1" title="Agregar Obra" data-bs-toggle="modal" data-bs-target="#agregarObra" wire:click="$dispatch('cambiar-id-de-autor', { AutorId: {{ $autor->id }} })"><i class="bi bi-file-earmark-plus"></i></btn>
                        <btn class="btn px-0 me-1" title="Editar" data-bs-toggle="modal" data-bs-target="#agregarAutor" wire:click="$dispatch('editar-autor', { AutorId: {{ $autor->id }} })"><i class="bi bi-pencil"></i></btn>
                        <btn class="btn px-0 me-1" title="Eliminar" data-bs-toggle="modal" data-bs-target="#eliminar-autor-{{ $autor->id }}"><i class="bi bi-x-circle text-danger"></i></btn>

                        <div class="modal fade" id="eliminar-autor-{{ $autor->id }}" tabindex="-1" aria-labelledby="eliminar-autor" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="eliminar-autor"><i class="bi bi-x-circle text-danger"></i> Eliminar autor</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro que desea eliminar el autor {!! '<strong>'.$autor->nombre.'</strong>' !!} y todas sus obras?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <btn type="button" class="btn btn-danger" wire:click="eliminarAutor({{ $autor->id }})" data-bs-dismiss="modal">Eliminar</btn>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No se ha encontrado ningún autor.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
