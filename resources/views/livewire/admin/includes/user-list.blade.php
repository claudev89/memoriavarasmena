<div x-data="{ buscar: ''}" x-on:keydown.escape="buscar = ''">
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
        <input x-model="buscar" type="text" class="form-control" placeholder="Buscar usuario" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <table class="table table-responsive table-striped">
        <thead>
        <th>Foto de perfil</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Acciones</th>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr x-show="buscar === '' || '{{ $usuario->name }}'.toLowerCase().includes(buscar.toLowerCase()) || '{{ $usuario->email }}'.toLowerCase().includes(buscar.toLowerCase())">
                @include('admin.includes.profilePicModal', ['usuario' => $usuario])
                <td>
                    <button
                        @if($usuario->profile_photo_path)
                            data-bs-toggle="modal" data-bs-target="#profPic-{{ $usuario->id }}" class="tulti btn py-0" data-toggle="tooltip" title="Ampliar foto de perfil"
                        @else
                            class="btn py-0"
                        @endif>
                        <img
                            src="{{ $usuario->mostrarFotoDePerfil($usuario) }}"
                            class="img-thumbnail rounded-circle"
                            style="max-width: 4rem; max-height: 4rem">
                    </button>
                </td>
                <td>{{ $usuario->name }}</td>
                <td>
                    <a href="mailto:{{ $usuario->email }}" class="btn py-0" title="escribir correo">
                        {{ $usuario->email }}
                    </a>
                </td>
                <td>
                    @forelse($usuario->getRoleNames() as $rol)
                        @if($rol == 'editor') <span class="badge text-bg-success rounded-pill">Editor</span>
                        @elseif($rol == 'admin') <span class="badge text-bg-primary rounded-pill">Administrador</span>
                        @endif
                    @empty
                        <span class="badge text-bg-secondary rounded-pill">Usuario</span>
                    @endforelse
                </td>
                <td>
                    <div class="btn-group">
                        @livewire('admin.includes.asignar-rol', ['usuario' => $usuario])
                        <button
                            class="btn p-0 pe-1 tulti"
                            data-toggle="tooltip"
                            title="Asignar roles"
                            data-bs-toggle="modal"
                            data-bs-target="#asignar-rol-{{ $usuario->id }}">
                            <h2><i class="bi bi-person-fill-gear"></i></h2>
                        </button>
                        <button
                            class="btn p-0 text-primary tulti"
                            data-toggle="tooltip"
                            title="Eliminar usuario"
                            data-bs-toggle="modal"
                            data-bs-target="#eliminar-usuario-{{ $usuario->id }}">
                            <h2><i class="bi bi-person-fill-slash"></i></h2>
                        </button>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="eliminar-usuario-{{ $usuario->id }}" tabindex="-1" aria-labelledby="eliminar-usuario" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="eliminar-usuario"><i class="bi bi-x-circle text-danger"></i> Eliminar Usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro que desea eliminar el usuario {!! '<strong>'.$usuario->name.'</strong>' !!}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" wire:click="eliminarUsuario({{ $usuario->id }})" data-bs-dismiss="modal">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </tbody>
    </table>

    {{$usuarios->links()}}
</div>
