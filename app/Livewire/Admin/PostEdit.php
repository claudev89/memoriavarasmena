<?php

namespace App\Livewire\Admin;

use App\Models\Categoria;
use App\Models\publicacion;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    #[Validate()]
    public $imagen;

    #[Validate()]
    public $titulo;

    #[Validate()]
    public $cuerpo;

    public $publicacion;

    #[Validate()]
    public $categoria;

    public function rules()
    {
        if($this->publicacion) {
            $imageRules = ['required'];
        } else {
            $imageRules = ['required', 'image', 'max:8192'];
        }
        return [
            'imagen' => $imageRules,
            'titulo' => ['required', 'max:200', Rule::unique('publicacions')->ignore($this->publicacion), ],
            'cuerpo' => 'required',
            'categoria' => 'required',
        ];
    }

    public function messages() {
        return [
            'imagen.required' => 'Suba una imagen de portada para su publicación.',
            'imagen.image' => 'Seleccione un archivo de imagen válido.',
            'imagen.max' => 'La imagen no puede sobrepasar los 8 MB.',
            'titulo.required' => 'Escriba un título para la publicación',
            'titulo.max' => 'El título no puede sobrepasar los 200 caracteres de largo.',
            'titulo.unique' => 'Ya existe una publicación con este título.',
            'cuerpo.required' => 'La publicación no puede estar en blanco.',
            'categoria.required' => 'La categoría no puede estar en blanco.',
        ];
    }

    public function mount($publicacion = null) {
        if($publicacion) {
            $this->publicacion = $publicacion;
            $this->titulo = $this->publicacion->titulo;
            $this->categoria = $this->publicacion->categoria_id;
            $this->imagen = $this->publicacion->imagen;
            $this->cuerpo = $this->publicacion->cuerpo;
        }
        $this->validate();
    }

    public function create() {
        if($this->imagen) {
            $validated['imagen'] = $this->imagen->store('uploads', 'public');
        }
    }

    public function editPost()
    {
        $this->validate();

            $updateData = [
                'titulo' => $this->titulo,
                'categoria_id' => $this->categoria,
                'cuerpo' => $this->cuerpo,
            ];

            if($this->imagen instanceof \Illuminate\Http\UploadedFile) {
                $updateData['imagen'] = $this->imagen->store('uploads', 'public');
            }
            $this->publicacion->update($updateData);

        session()->flash('publicado', 'Se ha editado correctamente: <strong>'.$this->titulo.'</strong>');
        return redirect()->to('admin/publicaciones');
    }

    public function render()
    {
        $categorias = Categoria::all()->sortBy(function ($categoria) {
            return strtolower($categoria->nombre);
        });
        return view('livewire.admin.post-edit', ['categorias' => $categorias]);
    }
}
