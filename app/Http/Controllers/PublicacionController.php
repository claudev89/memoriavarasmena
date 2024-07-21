<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\publicacion;
use Illuminate\Support\Str;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $publicacion = Publicacion::all()->first(function ($publicacion) use ($slug) {
            return $publicacion->slug === $slug;
        });

        if(!$publicacion) {
            abort(404);
        }

        return view('publicacion.show', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publicacion $publicacion)
    {
        return view('publicacion.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publicacion $publicacion)
    {
        $publicacion->delete();
        session()->flash('publicado', 'Se ha eliminado correctamente la publicación');
        return redirect()->to('admin/publicaciones');
    }
}
