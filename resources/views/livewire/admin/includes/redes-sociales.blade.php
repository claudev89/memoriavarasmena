<div>
    <span class="small text-secondary">Ingrese el link de sus redes sociales. En caso de WhatsApp, el número sin espacios ni signo más (+).</span>
    <div class="input-group flex-nowrap mb-2 mt-2">
        <span class="input-group-text" id="facebook"><i class="bi bi-facebook" style="color: #0d6ef2"></i></span>
        <input wire:model.live.debounce.300ms="facebook" type="text" class="form-control" placeholder="Facebook"
               aria-label="Facebook" aria-describedby="facebook">
    </div>

    <div class="input-group flex-nowrap mb-2">
        <span class="input-group-text" id="youtube"><i class="bi bi-youtube text-primary"></i></span>
        <input wire:model.live.debounce.300ms="youtube" type="text" class="form-control" placeholder="YouTube"
               aria-label="YouTube" aria-describedby="youtube">
    </div>

    <div class="input-group flex-nowrap mb-2">
        <span class="input-group-text" id="instagram"><i class="bi bi-instagram" style="color: #ac2bac"></i></span>
        <input wire:model.live.debounce.300ms="instagram" type="text" class="form-control" placeholder="Instagram"
               aria-label="Instagram" aria-describedby="instagram">
    </div>

    <div class="input-group flex-nowrap mb-2">
        <span class="input-group-text" id="threads"><i class="bi bi-threads"></i></span>
        <input wire:model.live.debounce.300ms="threads" type="text" class="form-control" placeholder="Threads"
               aria-label="Threads" aria-describedby="threads">
    </div>

    <div class="input-group flex-nowrap mb-2">
        <span class="input-group-text" id="x"><i class="bi bi-twitter-x"></i></span>
        <input wire:model.live.debounce.300ms="x" type="text" class="form-control" placeholder="X Twitter"
               aria-label="X" aria-describedby="x">
    </div>

    <div class="input-group flex-nowrap">
        <span class="input-group-text" id="whatsapp"><i class="bi bi-whatsapp text-success"></i></span>
        <input wire:model.live.debounce.300ms="whatsapp" type="text" class="form-control" placeholder="WhatsApp"
               aria-label="WhatsApp" aria-describedby="whatsapp">
    </div>

    <div id="submit" class="text-end mt-2">
        <button wire:click="guardarCambios" class="btn btn-primary"><i class="bi bi-floppy"></i> Guardar</button>
    </div>

</div>
