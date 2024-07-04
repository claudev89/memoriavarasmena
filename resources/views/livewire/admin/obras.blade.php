<div>
    <div class="input-group my-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input
            type="search"
            class="form-control"
            placeholder="Buscar obra"
            aria-label="Obra"
            aria-describedby="basic-addon1"
            wire:model.live.debounce.300ms="searchObra"
        >
    </div>
    <table class="table table-responsive table-striped">
        <thead>
            <th>Autor</th>
            <th>Tipo</th>
            <th>Contenido</th>
            <th>Acciones</th>
        </thead>
        <tbody>
        @forelse($obras as $obra)
            <tr>
                <td>
                    <img
                        src="{{ asset('storage/'.$obra->autor->imagen) }}"
                        class="img-fluid object-fit-cover"
                        style="max-width: 4rem; max-height: 4rem; width: 100%; height: 100%"
                        title="{{ $obra->autor->nombre }}">
                </td>
                <td>
                    @if($obra->tipo == 'c') Cita
                    @elseif($obra->tipo == 'p') Poema
                    @elseif($obra->tipo == 't') Tema
                    @endif
                </td>
                <td>{{ $obra->contenido }}</td>
                <td>
                    <div class="btn-group">
                        @include('admin.includes.obraModal')
                        <btn class="btn px-0 me-1" title="Ver" data-bs-toggle="modal" data-bs-target="#verObra-{{ $obra->id }}"><i class="bi bi-eye"></i></btn>
                        <a class="btn px-0 me-1" href="#" title="Editar" data-bs-toggle="modal" data-bs-target="#agregarObra" id="btnAgregarObra" wire:click="$dispatch('asignar-obra', { obraId: {{ $obra->id }} })"><i class="bi bi-pencil"></i></a>
                        <a class="btn px-0 me-1" href="#" title="Eliminar" data-bs-toggle="modal" data-bs-target="#eliminar-obra-{{ $obra->id }}" ><i class="bi bi-x-circle text-danger"></i></a>

                        <div class="modal fade" id="eliminar-obra-{{ $obra->id }}" tabindex="-1" aria-labelledby="eliminar-obra" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="eliminar-obra"><i class="bi bi-x-circle text-danger"></i> Eliminar obra</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Está seguro que desea eliminar esta obra de {!! '<strong>'.$obra->autor->nombre.'</strong>' !!}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <btn type="button" class="btn btn-danger" wire:click="eliminarObra({{ $obra->id }})" data-bs-dismiss="modal">Eliminar</btn>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No se ha encontrado ninguna obra.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
