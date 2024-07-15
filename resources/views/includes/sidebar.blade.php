<div class="border py-2 rounded">
    @php($publicaciones = \App\Models\publicacion::latest()->take(3)->get())
    @php($redesSociales = \App\Models\RedSocial::all())
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

    <div class="container mb-1 mx-0" x-data="">
        <h4>Redes sociales:</h4>
        @php($facebookUrl = $redesSociales->where('nombre', 'LIKE', 'Facebook')->first()->url)
        @php($youtubeUrl = $redesSociales->where('nombre', 'LIKE', 'YouTube')->first()->url)
        @php($instagramUrl = $redesSociales->where('nombre', 'LIKE', 'Instagram')->first()->url)
        @php($threadsUrl = $redesSociales->where('nombre', 'LIKE', 'Threads')->first()->url)
        @php($xUrl = $redesSociales->where('nombre', 'LIKE', 'X')->first()->url)
        @php($whatsappUrl = $redesSociales->where('nombre', 'LIKE', 'WhatsApp')->first()->url)

        <a
            href="{{ $facebookUrl }}" target="_blank" class="btn col-12 text-start py-0"
            @if(is_null($facebookUrl) || $facebookUrl == '') x-show="false" @endif>
            <i class="bi bi-facebook" style="color: #0d6ef2"></i> Facebook
        </a>
        <a
            href="{{ $youtubeUrl }}" target="_blank" class="btn col-12 text-start py-0"
            @if(is_null($youtubeUrl) || $youtubeUrl == '') x-show="false" @endif>
            <i class="bi bi-youtube text-danger"></i> YouTube
        </a>
        <a
            href="{{ $instagramUrl }}" target="_blank" class="btn col-12 text-start py-0"
            @if(is_null($instagramUrl) || $instagramUrl == '') x-show="false" @endif>
            <i class="bi bi-instagram" style="color: #ac2bac"></i> Instagram
        </a>
        <a
            href="{{ $threadsUrl }}" target="_blank" class="btn col-12 text-start py-0"
            @if(is_null($threadsUrl) || $threadsUrl == '') x-show="false" @endif>
            <i class="bi bi-threads"></i> Threads
        </a>
        <a
            href="{{ $xUrl }}" target="_blank" class="btn col-12 text-start py-0"
            @if(is_null($xUrl) || $xUrl == '') x-show="false" @endif>
            <i class="bi bi-twitter-x"></i> X Twitter
        </a>
        <a
            href="https://wa.me/{{ $whatsappUrl }}" target="_blank" class="btn col-12 text-start py-0"
            @if(is_null($whatsappUrl) || $whatsappUrl == '') x-show="false" @endif>
            <i class="bi bi-whatsapp text-success"></i> WhatsApp
        </a>
    </div>

</div>
