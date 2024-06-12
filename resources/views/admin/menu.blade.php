<div class="list-group">
    <a href="{{ route('admin') }}" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'bg-secondary bg-opacity-25' : '' }}"><i class="bi bi-house"></i> Inicio
    </a>
    <a href="{{ route('admin.publicaciones') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/publicaciones')) || (request()->is('publicacion/*/editar')) ? 'bg-secondary bg-opacity-25' : '' }}"><i class="bi bi-file-earmark"></i> Publicaciones</a>
    @role('admin')
        <a href="{{ route('admin.citas') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/citas')) ? 'bg-secondary bg-opacity-25' : '' }}"><i class="bi bi-chat-square-quote"></i> Citas</a>
        <a href="{{ route('admin.usuarios') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/usuarios')) ? 'bg-secondary bg-opacity-25' : '' }}"><i class="bi bi-people"></i> Usuarios</a>
        <a href="{{ route('admin.config') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/config')) ? 'bg-secondary bg-opacity-25' : '' }}"><i class="bi bi-gear"></i> Configuración de la página</a>
    @endrole
</div>
