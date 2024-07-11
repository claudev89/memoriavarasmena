<div>
    <div class="card">
        <div class="card-header">
            Información básica
        </div>
        <div class="card-body">
            <div class="text-center">
                @error('imagen') <span class="small alert alert-danger">{{ $message }}</span> @enderror
                <a href="#" data-bs-toggle="modal" data-bs-target="#fotoDePerfil" title="Ampliar foto de perfil" class="position-relative">
                    <div class="">
                        <img src="{{ !is_null($imagen) ? $imagen->temporaryUrl() : $usuarix->mostrarFotoDePerfil($usuarix) }}" class="img-thumbnail rounded-circle object-fit-cover d-inline-block" style="width: 15rem; height: 15rem">
                    </div>
                </a>

                <input type="file" accept="image/png, image/jpeg, image/webp" wire:model="imagen" id="imageUpload" class="d-none">
                <button
                    class="btn btn-danger mt-2 mb-4"
                    onclick="document.getElementById('imageUpload').click();">
                    <i class="bi bi-camera"></i> Cambiar imagen
                </button>

                <div class="modal fade" id="fotoDePerfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-end">
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Cerrar"
                                        title="Cerrar">
                                    </button>
                                </div>
                                <img src="{{ $usuarix->mostrarFotoDePerfil($usuarix) }}" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form class="mx-1 mx-lg-auto min-width-lg" wire:submit.prevent>
            <div class="input-group has-validation mb-2">
                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                <div class="form-floating @error('nombre') is-invalid @enderror">
                    <input
                        type="text"
                        class="form-control @error('nombre') is-invalid @enderror"
                        id="nombre"
                        placeholder="Nombre"
                        wire:model.live.debounce.300ms="nombre"
                        required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="invalid-feedback">
                    @error('nombre') {{ $message }} @enderror
                </div>
            </div>

            <div class="input-group has-validation mb-2">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <div class="form-floating @error('correo') is-invalid @enderror">
                    <input
                        type="email"
                        class="form-control @error('correo') is-invalid @enderror"
                        id="correo"
                        placeholder="Correo electrónico"
                        wire:model.live.debounce.300ms="correo"
                        required>
                    <label for="correo">Correo electrónico</label>
                </div>
                <div class="invalid-feedback">
                    @error('correo') {{ $message }} @enderror
                </div>
            </div>

            <div class="form-floating mb-2 text-end">
                <button
                    class="btn btn-danger"
                    wire:click="updateUser"
                    {{ count($errors)>0 ? 'disabled' : '' }}>
                    <i class="bi bi-floppy"></i> Guardar cambios
                </button>
            </div>
        </form>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            Cambiar contraseña
        </div>
        <div class="card-body">
            <form class="mx-1 mx-lg-auto min-width-lg" wire:submit.prevent>
                <div class="input-group has-validation mb-4">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <div class="form-floating @error('contrasenia') is-invalid @enderror">
                        <input
                            type="password"
                            class="form-control @error('contrasenia') is-invalid @enderror"
                            id="contraseniaActual"
                            placeholder="Contraseña Actual"
                            wire:model.live.debounce.300ms="contrasenia"
                            required>
                        <label for="contraseniaActual">Contraseña Actual</label>
                    </div>
                    <div class="invalid-feedback">
                        @error('contrasenia') {{ $message }} @enderror
                    </div>
                </div>

                <div class="input-group has-validation mb-2">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <div class="form-floating @error('contraseniaNueva') is-invalid @enderror">
                        <input
                            type="password"
                            class="form-control @error('contraseniaNueva') is-invalid @enderror"
                            id="contraseniaNueva"
                            placeholder="Contraseña nueva"
                            wire:model.live.debounce.300ms="contraseniaNueva"
                            required>
                        <label for="contraseniaNueva">Contraseña nueva</label>
                    </div>
                    <div class="invalid-feedback">
                        @error('contraseniaNueva') {{ $message }} @enderror
                        {{ $errorContrasenia }}
                    </div>
                </div>

                <div class="input-group has-validation mb-2">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <div class="form-floating @error('contraseniaX2') is-invalid @enderror">
                        <input
                            type="password"
                            class="form-control @error('contraseniaX2') is-invalid @enderror"
                            id="contraseniaX2"
                            placeholder="Repetir contraseña"
                            wire:model.live.debounce.300ms="contraseniaX2"
                            required>
                        <label for="contraseniaX2">Repetir contraseña</label>
                    </div>
                    <div class="invalid-feedback">
                        @error('contraseniaX2') {{ $message }} @enderror
                    </div>
                </div>

                <div class="form-floating mb-2 text-end">
                    <button
                        class="btn btn-danger"
                        wire:click="cambiarContrasenia"
                        {{ count($errors)>0 ? 'disabled' : '' }}>
                        <i class="bi bi-arrow-repeat"></i> Cambiar contraseña
                    </button>
                </div>

            </form>
        </div>
    </div>

    @if(session('guardado'))
        <div aria-live="polite" aria-atomic="true" class="bg-body-secondary position-relative bd-example-toasts rounded-3">
            <div class="toast-container p-3 bottom-0 end-0 position-fixed" id="toastPlacement">
                <div class="toast show align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('guardado') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @push('css')
        <style>
            @media (min-width: 992px) {
                .min-width-lg {
                    min-width: 30rem;
                    max-width: 30rem;
                }
            }
        </style>
    @endpush
</div>
