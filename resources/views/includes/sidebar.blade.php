<div class="border py-2 rounded">
    @php($publicaciones = \App\Models\publicacion::latest()->take(3)->get())
    <div class="container mb-3 mx-0">
        <h4>Publicaciones recientes:</h4>
        @foreach($publicaciones as $publicacion)
            @include('includes.postPreviewThumb', [
                'titulo' => $publicacion->titulo,
                'imagen' => $publicacion->imagen,
                'cuerpo' => $publicacion->cuerpo
                ])
        @endforeach
    </div>

    <div class="container mb-1 mx-0">
        <h4>Redes sociales:</h4>
        <a href="#" class="btn"><i class="bi bi-facebook text-primary"></i> Facebook</a> <br>
        <a href="#" class="btn"><i class="bi bi-youtube text-danger"></i> YouTube</a> <br>
        <a href="#" class="btn"><i class="bi bi-instagram" style="color: #ac2bac"></i> Instagram</a> <br>
        <a href="#" class="btn"><i class="bi bi-threads"></i> Threads</a> <br>
        <a href="#" class="btn"><i class="bi bi-twitter-x"></i> X</a> <br>
        <a href="#" class="btn"><i class="bi bi-whatsapp text-success"></i> WhatsApp</a>
    </div>

</div>
