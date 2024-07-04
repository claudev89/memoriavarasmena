<?php

namespace App\Livewire\Admin\Includes;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class AsignarRol extends Component
{
    public $usuario;
    public $idRol = 0;

    public function mount($usuario)
    {
        $this->usuario = $usuario;
    }

    public function asignarRol()
    {
        if($this->idRol != 0)
        {
            $rol = Role::find($this->idRol);
            $nombreRol = $rol->name;
            $this->usuario->assignRole($nombreRol);
            $this->dispatch('rol-agregado');
        }
    }
    public function quitarRol($rol)
    {
        $this->usuario->removeRole($rol);
        $this->dispatch('rol-agregado');
    }

    public function render()
    {
        return view('livewire.admin.includes.asignar-rol');
    }
}
