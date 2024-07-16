<div>
        <main class="col-12 container">
            <div class="row">
                <div class="row col-lg-8 col-md-7 col-12 mb-3">
                    <div class="card p-0">
                        <div class="card-body">
                            <h3 class="card-title text-uppercase">Contáctanos</h3>

                            <form wire:submit.prevent wire:keydown.ctrl.enter="enviar">

                                <div class="input-group has-validation mb-3">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <div class="form-floating @error('nombre') is-invalid @endif">
                                        <input wire:model.live.debounce.300ms="nombre" type="text"
                                               class="form-control @if($errors->has('nombre')) is-invalid @else is-valid @endif"
                                               id="nombre" placeholder="Nombre" required
                                               @if($usuarix) disabled @endif>
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        @error('nombre') {{ $message }} @enderror
                                    </div>
                                </div>

                                <div class="input-group has-validation mb-3">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating @error('correo') is-invalid @enderror">
                                        <input wire:model.live.debounce.300ms="correo"
                                               type="text"
                                               class="form-control @if($errors->has('correo')) is-invalid @else is-valid @endif"
                                               id="correo"
                                               placeholder="Correo electrónico" required
                                                @if($usuarix) disabled @endif>
                                        <label for="correo">Correo electrónico</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        @error('correo') {{ $message }} @enderror
                                    </div>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea wire:model.live.debounce.300ms="mensaje" class="form-control mb-2 @error('mensaje') is-invalid @else is-valid @enderror"
                                              placeholder="Escriba su mensaje" id="mensaje" style="height: 16rem" required></textarea>
                                    <label for="mensaje">Escriba su mensaje</label>
                                    <div class="invalid-feedback">
                                        @error('mensaje') {{ $message }} @enderror
                                    </div>
                                    <span class="small text-secondary mt-1">
                                        También puede usar la combinación de teclas <kbd>Ctrl</kbd> + <kbd>Enter</kbd> para enviar su mensaje.
                                    </span>
                                </div>

                                <div wire:loading wire:target="enviar">
                                    <div class="spinner-border spinner-border-sm" role="status">
                                        <span class="visually-hidden">Enviando...</span>
                                    </div>
                                    enviando...
                                </div>

                                <div class="text-end">
                                    <button wire:click="enviar" type="button" class="btn btn-primary" @if(count($errors) > 0) disabled @endif>
                                        <i class="bi bi-send-fill"></i> Enviar mensaje
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 col-12">
                    <div class="sticky-top z-0" style="top: 20px;">
                        @include('includes.sidebar')
                    </div>
                </div>
            </div>
        </main>

        @if(session('publicado'))
            <div class="toast align-items-center text-bg-success border-0 show bottom-0 end-0 position-fixed mb-3 me-3" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('publicado') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

</div>
