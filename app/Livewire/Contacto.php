<?php

namespace App\Livewire;

use App\Mail\ContactoMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Contacto extends Component
{

    #[Validate()]
    public $nombre;

    #[Validate()]
    public $correo;
    #[Validate()]
    public $mensaje;

    public $usuarix;

    public function rules()
    {
        return [
            'nombre' => ['required', 'min:3'],
            'correo' => ['required', 'email'],
            'mensaje' => ['required', 'min:20']
        ];
    }

    public function messages()
    {
        return [
            'nombre.min' => 'El nombre no puede ser menor a 3 caracteres.',
            'nombre.required' => 'El nombre no puede estar en blanco.',
            'correo.required' => 'El correo electrónico no puede estar en blanco.',
            'correo.email' => 'Ingrese una dirección de correo electrónico válida.',
            'mensaje.required' => 'El mensaje no puede estar en blanco.',
            'mensaje.min' => 'El mensaje no puede contener menos de 20 caracteres.',
        ];
    }

    public function mount()
    {
        if(auth()->check()) {
            $this->usuarix = User::find(auth()->id());
            $this->nombre = $this->usuarix->name;
            $this->correo = $this->usuarix->email;
        }
        $this->validate();
    }

    public function enviar()
    {
        $datosValidados = $this->validate();

        try {
            Mail::to('varasmenamemoria@gmail.com')->send(new ContactoMail($datosValidados));
            session()->flash('publicado', 'Mensaje enviado correctamente.');
        } catch (\Throwable $th) {
            session()->flash('publicado', 'El mensaje no pudo ser enviado, por favor intente más tarde.');
        }

        $this->mensaje = '';
        $this->validate();

    }


    public function render()
    {
        return view('livewire.contacto');
    }
}
