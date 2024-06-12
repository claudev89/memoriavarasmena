@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @hasanyrole('admin|editor')
            <div class="collapse d-md-block col-md-3 col-1" id="sidebarMenu">
                @include('admin.menu')
            </div>

            <div class="d-md-none col-1">
                <button class="btn btn-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Menú de administración</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    @include('admin.menu')
                </div>
            </div>
        @endhasanyrole

        <div class="col-md-9 col-10">
            <div class="card">
                <div class="card-header bg-dark text-white">@yield('titulo')</div>

                <div class="card-body">
                    @yield('contenido')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
