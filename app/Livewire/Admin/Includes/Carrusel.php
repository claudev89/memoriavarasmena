<?php

namespace App\Livewire\Admin\Includes;

use Illuminate\Http\UploadedFile;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\ImagenCarrusel;
use Livewire\WithFileUploads;

class Carrusel extends Component
{
    use WithFileUploads;
    #[Validate()]
    public $imagenNueva;

    #[Validate()]
    public $titulo;

    #[Validate()]
    public $descripcion;

    public $editando = false;
    public $imagenAEditar;

    public function rules()
    {
        return [
            'imagenNueva' => 'image|max:8192',
            'titulo' => 'max:100',
            'descripcion' => 'max:500'
        ];
    }

    public function messages()
    {
        return [
            'imagenNueva.image' => 'Seleccione una imagen válida.',
            'imagenNueva.max' => 'La imagen no puede pesar más de 8MB.',
            'titulo.max' => 'El título no puede superar los 100 caracteres',
            'descripcion.max' => 'La descripción no puede superar los 500 caracteres',
        ];
    }


    public function agregarNuevaImagen()
    {
        $this->validate();

        ImagenCarrusel::create([
            'url' => $this->imagenNueva->store('uploads', 'public'),
            'title' => $this->titulo,
            'description' => $this->descripcion
        ]);
        $this->reset();
        session()->flash('publicado', 'Imagen agregada correctamente.');
    }

    public function editarImagen($imagenId)
    {
        $this->editando = true;

        $this->imagenAEditar = ImagenCarrusel::find($imagenId);
        $this->imagenNueva = $this->imagenAEditar->url;
        $this->titulo = $this->imagenAEditar->title;
        $this->descripcion = $this->imagenAEditar->description;
    }

    public function guardarImagen($imagenId)
    {
        $imagenAGuardar = ImagenCarrusel::find($imagenId);

        $url = $this->imagenNueva instanceof UploadedFile ? $this->imagenNueva->store('uploads', 'public') : $imagenAGuardar->url;

        $imagenAGuardar->update([
            'url' => $url,
            'title' => $this->titulo,
            'description' => $this->descripcion
        ]);
        $this->reset();
        $this->editando = false;
        session()->flash('publicado', 'Imagen guardada correctamente.');
    }

    public function eliminarImagen($imagenId)
    {
        $imagen = ImagenCarrusel::find($imagenId);
        $imagen->delete();
        session()->flash('publicado', 'Imagen eliminada correctamente.');
    }

    public function render()
    {
        $imagenes = ImagenCarrusel::all()->sortByDesc('created_at');
        return view('livewire.admin.includes.carrusel', ['imagenes' => $imagenes]);
    }
}
