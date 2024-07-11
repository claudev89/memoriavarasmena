@php($info = \App\Models\Info::find(1))

<div class="container my-0">
    <div class="p-3 text-center bg-body-tertiary rounded-3">
        <img src="{{ asset('storage/'.$info->logo) }}" class="img-fluid">
        <h1 class="text-body-emphasis">{{ $info->nombre }}</h1>
        <p class="col-lg-8 mx-auto fs-5 text-muted">
            {!! Str::limit($info->quienes_somos, 640) !!}
        </p>
        <div class="d-inline-flex gap-2 mb-5">
            <a
                class="d-inline-flex align-items-center btn btn-danger btn-lg px-4 rounded-pill"
                href="{{ route('quienes-somos') }}">
                Seguir leyendo
                <i class="bi bi-arrow-right-short"></i>
            </a>
            <button class="btn btn-outline-secondary btn-lg px-4 rounded-pill" type="button">
                Contáctanos
            </button>
        </div>
    </div>
</div>
