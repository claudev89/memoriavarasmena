<?php

namespace App\Livewire\Admin;

use App\Models\Autor;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class AgregarAutor extends Component
{
    use WithFileUploads;

    public $autor;

    #[Validate()]
    public $nombre;

    #[Validate()]
    public $imagen;
    #[Validate()]
    public $descripcion;

    protected $listeners = ['editar-autor' => 'editarAutor'];

    public function rules()
    {
        if($this->autor) {
            $imageRules = ['required'];
        } else {
            $imageRules = ['required', 'image', 'max:8192'];
        }
        return [
            'imagen' => $imageRules,
            'nombre' => ['required', 'max:80', Rule::unique('autors')->ignore($this->autor), ],
        ];
    }

    public function messages() {
        return [
            'imagen.required' => 'Suba una imagen del autor.',
            'imagen.image' => 'Seleccione un archivo de imagen válido.',
            'imagen.max' => 'La imagen no puede sobrepasar los 8 MB.',
            'nombre.required' => 'Escriba el nombre del autor',
            'nombre.max' => 'El nombre no puede sobrepasar los 80 caracteres de largo.',
            'nombre.unique' => 'El autor ya existe.',
        ];
    }

    #[On('editar-autor')]
    public function editarAutor($AutorId) {
        if($AutorId) {
            $this->autor = Autor::find($AutorId);
            $this->nombre = $this->autor->nombre;
            $this->imagen = $this->autor->imagen;
            $this->descripcion = $this->autor->descripcion;
        }
        $this->validate();
    }

    public function create() {
        if($this->imagen) {
            $validated['imagen'] = $this->imagen->store('uploads', 'public');
        }
    }

    public function agregarAutor()
    {
        $this->validate();

        if(isset($this->autor))
        {
            $datosAActualizar = [
              'nombre' => $this->nombre,
              'descripcion' => $this->descripcion,
            ];

            if($this->imagen instanceof \Illuminate\Http\UploadedFile) {
                $datosAActualizar['imagen'] = $this->imagen->store('uploads', 'public');
            }

            $this->autor->update($datosAActualizar);

            session()->flash('publicado', 'Se guardado correctamente el autor: <strong>'.$this->nombre.'</strong>');
        }
        else
        {
            $this->autor = Autor::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'imagen' => $this->imagen->store('uploads', 'public'),
            ]);
            session()->flash('publicado', 'Se agregado correctamente el autor: <strong>'.$this->nombre.'</strong>');
        }
        return redirect()->to('admin/citas');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.agregar-autor');
    }
}
