<div class="list-group">
    <a href="{{ route('admin') }}" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'bg-secondary bg-opacity-25 negri' : '' }}"><i class="bi bi-house"></i> Inicio
    </a>
    <a href="{{ route('admin.publicaciones') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/publicaciones')) || (request()->is('publicacion/*/editar')) ? 'bg-secondary bg-opacity-25 negri' : '' }}"><i class="bi bi-file-earmark"></i> Publicaciones</a>
    <a href="{{ route('perfil') }}" class="list-group-item list-group-item-action {{ (request()->is('perfil')) ? 'bg-secondary bg-opacity-25 negri' : '' }}"><i class="bi bi-person"></i> Perfil</a>
    @role('admin')
        <a href="{{ route('admin.citas') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/citas')) ? 'bg-secondary bg-opacity-25 negri' : '' }}"><i class="bi bi-chat-square-quote"></i> Citas</a>
        <a href="{{ route('admin.usuarios') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/usuarios')) ? 'bg-secondary bg-opacity-25 negri' : '' }}"><i class="bi bi-people"></i> Usuarios</a>
        <div class="accordion">
            <button type="button" class="list-group-item list-group-item-action accordion-item {{ (request()->is('admin/config/*')) ? 'bg-secondary bg-opacity-25 negri' : '' }}" data-bs-toggle="collapse" data-bs-target="#configMenu" aria-expanded="true" aria-controls="configMenu"><i class="bi bi-gear"></i> Configuración de la página</button>

            <div id="configMenu" class="accordion-collapse collapse  {{ (request()->is('admin/config/*')) ? 'show' : ''}}">
                <div class="accordion-body pt-0 pe-0">
                    <div class="list-group">
                        <a href="{{ route('admin.config.basic') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/config/basic')) ? 'bg-secondary bg-opacity-25 negri' : '' }}">Configuración básica</a>
                        <a href="{{ route('admin.config.carrusel') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/config/carrusel'))  ? 'bg-secondary bg-opacity-25 negri' : '' }}">Carrusel de imágenes</a>
                        <a href="{{ route('admin.config.redes-sociales') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/config/redes-sociales')) ? 'bg-secondary bg-opacity-25 negri' : '' }}">Redes sociales</a>
                        <a href="{{ route('admin.config.footer') }}" class="list-group-item list-group-item-action {{ (request()->is('admin/config/footer')) ? 'bg-secondary bg-opacity-25 negri' : '' }}">Pie de página</a>
                    </div>
                </div>
            </div>

        </div>

    @endrole
</div>

@push('css')
    <style>
        .negri {
            font-weight: bold;
        }
    </style>
@endpush
