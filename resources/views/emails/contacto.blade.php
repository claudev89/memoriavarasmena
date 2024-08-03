<div>
    <p>Has recibido un nuevo correo electrónico mediante el formulario de contacto de memoriavarasmena.cl</p>

    <strong>Nombre: </strong> {{ $datosValidados['nombre'] }} <br>
    <p><strong>Correo electrónico: </strong> <a href="mailto:{{ $datosValidados['correo'] }}">{{ $datosValidados['correo'] }}</a></p>
        <strong>Mensaje:</strong> <br>
        {{ $datosValidados['mensaje'] }}
</div>
