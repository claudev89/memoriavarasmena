<?php

namespace App\Livewire\Admin\Includes;

use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\User;

class UserList extends Component
{

    public function eliminarUsuario($userId)
    {
        $usuario = User::find($userId);
        $nombreUsuario = $usuario->name;
        $usuario->delete();

        session()->flash('publicado', $nombreUsuario.' eliminado con éxito.');
    }

    #[On('rol-agregado')]
    public function render()
    {
        $usuarios = User::orderBy('name')->paginate(15);
        return view('livewire.admin.includes.user-list', ['usuarios' => $usuarios]);
    }
}
