<div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Título</th>
            @role('admin') <th scope="col">Autor</th> @endrole
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($publicaciones as $publicacion)
            <tr>
                <td>
                    <div style="width: 5rem; height: 3rem; overflow: hidden;">
                        <img src="{{ asset('storage/' . $publicacion->imagen) }}" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid">
                    </div>
                </td>
                <td>{{Str::limit($publicacion->titulo, 80) }}</td>
                @role('admin') <td>{{ $publicacion->user->name }}</td> @endrole
                <td>{{ \Carbon\Carbon::parse($publicacion->created_at)->format('d-m-Y') }}</td>
                <td>
                    @include('admin.includes.postModal', $publicacion)
                    <button class="btn px-1" title="Vista previa" data-bs-toggle="modal" data-bs-target="#postPrev-{{ $publicacion->id }}"><i class="bi bi-eye"></i></button>
                    <a class="btn px-1" title="Editar" href="{{ route('publicacion.edit', $publicacion) }}"><i class="bi bi-pencil-square"></i></a>
                    @include('admin.includes.delete-modal', $publicacion)
                    <button class="btn px-1" title="Eliminar" data-bs-toggle="modal" data-bs-target="#eliminar-publicacion-{{ $publicacion->id }}"><i class="bi bi-x-circle text-danger"></i></button>
                </td>
            </tr>
        @empty
            No se encontraron publicaciones.
        @endforelse
        </tbody>
    </table>
    {{ $publicaciones->links() }}
</div>
