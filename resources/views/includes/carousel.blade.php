<div class="col-12 mb-4">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://media.gettyimages.com/id/1859049658/es/foto/chefchaouen-morocco.webp?s=2048x2048&w=gi&k=20&c=-YgPP2oEoVduzFazdAA9xDWqa8HdfczUoI_sxYikofw=" class="d-block w-100 h-lg-50 position-relative object-fit-cover" alt="...">
                <div class="carousel-caption d-block bg-secondary bg-opacity-25">
                    <h5>Título de la primera imagen</h5>
                    <p>Texto de la primera imagen.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://media.gettyimages.com/id/1850113646/es/vector/hablar-burbuja-de-di%C3%A1logo-conversaci%C3%B3n-chatear-trabajo-en-equipo-gpt.webp?s=2048x2048&w=gi&k=20&c=tO1eAkK6ccYfDiVADk7xFxhskGRxkrnhvCb0n-1-DzI=" class="d-block w-100 h-lg-50 position-relative object-fit-cover" alt="...">
                <div class="carousel-caption d-block bg-secondary bg-opacity-25">
                    <h5>Título de la segunda imagen</h5>
                    <p>Texto de la segunda imagen.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://media.gettyimages.com/id/2009624301/es/foto/extreme-close-up-beautiful-yellow-beetle-on-purple-lavender-in-blossom-chlorophorus-varius-the.webp?s=2048x2048&w=gi&k=20&c=Yw_qxgI-pNuG_UCC8i9VXO5OrrZsU60cC_r3dOp4Uys=" class="d-block w-100 h-lg-50 position-relative object-fit-cover" alt="...">
                <div class="carousel-caption d-block bg-secondary bg-opacity-25">
                    <h5>Título de la tercera imagen</h5>
                    <p>Texto de la tercera imagen.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <style>
        @media (min-width: 992px) { /* lg breakpoint */
            .h-lg-50 {
                height: 50%;
            }
            .carousel-item img {
                height: calc(50vh - 56px); /* 50% de la altura de la pantalla menos la altura de los indicadores del carousel */
                object-fit: cover; /* Ajusta la imagen sin estirarla */
                object-position: center; /* Centra la imagen */
            }
        }
    </style>

</div>
