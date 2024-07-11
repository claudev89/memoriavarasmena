<div>
    <h5>Vista previa</h5>
    <span class="small text-secondary">Se recomienda usar imágenes de aproximadamente 1298x422 pixeles</span>
    @include('includes.carousel')

    <div class="input-group has-validation">
        <span class="input-group-text"><i class="bi bi-card-image"></i></span>
        <div class="form-floating is-invalid">
            <input type="file" class="form-control is-invalid" id="floatingInputGroup2" placeholder="Imagen" required>
            <label for="floatingInputGroup2">Imagen</label>
        </div>
        <button class="btn pt-3 tulti" data-toggle="tooltip" title="Eliminar imagen">
            <h3><i class="bi bi-x-circle text-primary"></i></h3>
        </button>
        <div class="invalid-feedback">
            Seleccione una imagen.
        </div>
    </div>
    <div id="contenido" class="mt-2">
        <form class="form-floating">
            <input
                type="text"
                class="form-control is-invalid"
                id="titulo"
                placeholder="Título de la imagen"
                value=""
                maxlength="100">
            <label for="titulo">Título de la imagen</label>
        </form>
        <div class="form-floating mt-3">
                    <textarea
                        class="form-control is-invalid"
                        placeholder="Descripción de la imagen"
                        id="descripcion"
                        maxlength="500"
                        style="height: 7rem"></textarea>
            <label for="descripcion">Descripción de la imagen</label>
        </div>
    </div>
    <hr>

    <div class="input-group has-validation">
        <span class="input-group-text"><i class="bi bi-card-image"></i></span>
        <div class="form-floating is-invalid">
            <input type="file" class="form-control is-invalid" id="floatingInputGroup2" placeholder="Imagen" required>
            <label for="floatingInputGroup2">Imagen</label>
        </div>
        <button class="btn pt-3 tulti" data-toggle="tooltip" title="Eliminar imagen">
            <h3><i class="bi bi-x-circle text-primary"></i></h3>
        </button>
        <div class="invalid-feedback">
            Seleccione una imagen.
        </div>
    </div>
    <div id="contenido" class="mt-2">
        <form class="form-floating">
            <input
                type="text"
                class="form-control is-invalid"
                id="titulo"
                placeholder="Título de la imagen"
                value=""
                maxlength="100">
            <label for="titulo">Título de la imagen</label>
        </form>
        <div class="form-floating mt-3">
                    <textarea
                        class="form-control is-invalid"
                        placeholder="Descripción de la imagen"
                        id="descripcion"
                        maxlength="500"
                        style="height: 7rem"></textarea>
            <label for="descripcion">Descripción de la imagen</label>
        </div>
    </div>
    <hr>


    <div id="submit" class="text-end">
        <button class="btn btn-primary me-3 mb-2"><i class="bi bi-floppy"></i> Guardar</button>
    </div>
</div>
