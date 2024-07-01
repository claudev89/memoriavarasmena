<div class="mt-3 mb-2 col-lg-6 col-12 d-flex flex-column align-items-center text-center px-lg-5" name="cita">
    <img src="{{ asset('storage/'.$cita->autor->imagen) }}" class="rounded-circle object-fit-cover" alt="{{ $cita->autor->nombre }}" style="height: 13rem; width: 13rem">
    <div class="">
        <h5 class="card-title">{{ $cita->autor->nombre }}</h5>
        <p class="card-text"><i>"{{ $cita->contenido }}".</i></p>
    </div>
</div>
