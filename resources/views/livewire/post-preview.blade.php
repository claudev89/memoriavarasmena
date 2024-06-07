<div>
    <h2 id="publicaciones">Publicaciones</h2>

    @foreach($publicaciones as $publicacion)
        @include('includes.postPreview', [
    'titulo' => $publicacion->titulo,
    'cuerpo' => $publicacion->cuerpo,
    'fecha' => $publicacion->created_at,
    'imagen' => $publicacion->imagen
    ])
    @endforeach

    {{ $publicaciones->links(data: ['scrollTo' => '#publicaciones']) }}

</div>
