<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class EditProfile extends Component
{
    use WithFileUploads;

    #[Validate()]
    public $imagen;

    #[Validate()]
    public $nombre;

    #[Validate()]
    public $correo;

    #[Validate()]
    public $contrasenia;

    public $contraseniaActual;

    #[Validate()]
    public $contraseniaNueva;

    #[Validate()]
    public $contraseniaX2;

    public $usuarix;
    public $errorContrasenia;

    public function rules() {
        $imageRules = ['image', 'max:8192'];
        return [
            'imagen' => $imageRules,
            'nombre' => ['required', 'max:255'],
            'correo' => ['required', 'email'],
            'contrasenia' => ['required'],
            'contraseniaNueva' => ['required'],
            'contraseniaX2' => ['required', 'same:contraseniaNueva'],
        ];
    }

    public function messages() {
        return [
            'imagen.image' => 'Seleccione un archivo de imagen válido.',
            'imagen.max' => 'La imagen no puede sobrepasar los 8 MB.',
            'nombre.required' => 'El nombre no puede estar en blanco.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'correo.required' => 'El correo no puede estar en blanco.',
            'correo.email' => 'Ingrese un correo válido.',
            'contrasenia.required' => 'Ingrese la contraseña actual.',
            'contraseniaNueva.required' => 'Ingrese una contraseña nueva.',
            'contraseniaX2.required' => 'La contraseña nueva no puede estar en blanco.',
            'contraseniaX2.same' => 'Las contraseñas deben ser iguales.',
        ];
    }

    public function mount() {
        $this->usuarix = auth()->user();
        $this->nombre = $this->usuarix->name;
        $this->correo = $this->usuarix->email;
        $this->contraseniaActual = auth()->user()->password;
    }

    public function updateUser()
    {
        $this->validateOnly('nombre');
        $this->validateOnly('correo');

        $this->usuarix->name = $this->nombre;
        $this->usuarix->email = $this->correo;

        $this->usuarix->save();

        $this->dispatch('datosCambiados');
        session()->flash('guardado', 'Datos guardados correctamente.');
    }

    public function updatedImagen()
    {
        if ($this->imagen) {
            $imagenPath = $this->imagen->store('uploads', 'public');
            $this->usuarix->profile_photo_path = $imagenPath;
            $this->usuarix->save();

            $this->dispatch('datosCambiados');
            session()->flash('guardado', 'Foto de perfil cambiada correctamente.');
        }
    }

    public function cambiarContrasenia () {
        if(Hash::check($this->contrasenia, $this->contraseniaActual)) {
            $this->usuarix->password = Hash::make($this->contraseniaNueva);
            $this->usuarix->save();
            session()->flash('guardado', 'Contraseña cambiada correctamente.');
            $this->contrasenia = "";
            $this->contraseniaNueva = "";
            $this->contraseniaX2 = "";
        } else {
            $this->addError('contrasenia', 'La contraseña ingresada es incorrecta.');
        }
    }



    public function render()
    {
        return view('livewire.edit-profile', ['errorContrasenia' => $this->errorContrasenia]);
    }
}
