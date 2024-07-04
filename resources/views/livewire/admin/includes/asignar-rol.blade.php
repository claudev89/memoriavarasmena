<div wire:ignore.self class="modal fade modal" id="asignar-rol-{{ $usuario->id }}" tabindex="-1" aria-labelledby="asignar-rol-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="asignar-rol-label">{{ $usuario->name }} - Asignar rol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body text-start">
                @php($roles = \Spatie\Permission\Models\Role::all())
                @php($rolesDelUsuario = $usuario->roles)
                @php($rolesNoAsignados = $roles->diff($rolesDelUsuario))
                <table class="table table-responsive table-striped">
                    <thead>
                        <th>Rol</th>
                        <th>Acción</th>
                    </thead>
                    <tbody>
                    @forelse($usuario->getRoleNames() as $rol)
                            @if($rol == 'editor')
                                <tr>
                                    <td><span class="badge text-bg-success rounded-pill">Editor</span></td>
                                    <td>
                                        <button
                                            wire:click="quitarRol('{{ $rol }}')"
                                            class="btn tulti"
                                            data-toggle="tooltip"
                                            title="Eliminar rol"
                                            data-bs-dismiss="modal">
                                            <h4><i class="bi bi-x-circle-fill text-primary"></i></h4>
                                        </button>
                                    </td>
                                </tr>
                            @elseif($rol == 'admin')
                                <tr>
                                    <td><span class="badge text-bg-primary rounded-pill">Administrador</span></td>
                                    <td>
                                        <button
                                            wire:click="quitarRol('{{ $rol }}')"
                                            class="btn tulti"
                                            data-toggle="tooltip"
                                            title="Eliminar rol"
                                            data-bs-dismiss="modal">
                                            <h4><i class="bi bi-x-circle-fill text-primary"></i></h4>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                    @empty
                        <tr>
                            <td><span class="badge text-bg-secondary rounded-pill">Usuario</span></td>
                            <td><button class="btn border-0" style="cursor: not-allowed"><h4><i class="bi bi-x-circle-fill text-primary"></i></h4></button></td>
                        </tr>
                    @endforelse
                        <tr>
                            <td>
                                <select wire:model.live="idRol">
                                    <option value="0" selected disabled>Agregar rol</option>
                                    @foreach($rolesNoAsignados as $rol)
                                        <option value="{{ $rol->id }}">{{ ucfirst($rol->name) }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button
                                    class="btn tulti border-0"
                                    data-bs-toggle="tooltop"
                                    title="Agregar rol"
                                    data-bs-dismiss="modal"
                                    wire:click="asignarRol" wire.loading.attr="disabled"
                                    @if($idRol == 0) disabled @endif>
                                    <h4><i class="bi bi-plus-circle-fill text-success"></i></h4>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.tulti').tooltip();
        });
    </script>
</div>
