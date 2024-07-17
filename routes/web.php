<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacionController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Models\publicacion;

Route::get('/', function () {
    return view('index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('admin.index');
    })->name('home');
});

Auth::routes();

Route::get('/home', function () { return view('admin.index'); })->name('admin')->middleware('role:admin|editor');
Route::get('/quienes-somos', function () { return view('quienes-somos'); })->name('quienes-somos');
Route::get('/contacto', function () { return view('contacto'); })->name('contacto');

Route::prefix('admin')->middleware('role:admin|editor')->group( function () {
    Route::get('/', function () { return view('admin.index'); })->name('admin');
    Route::get('/publicaciones', function () { return view('admin.publicaciones'); })->name('admin.publicaciones');
});

Route::prefix('admin')->middleware('role:admin')->group( function () {
    Route::get('/citas', function () { return view('admin.citas'); })->name('admin.citas');
    Route::get('/usuarios', function () { return view('admin.usuarios'); })->name('admin.usuarios');
    Route::get('/config/basic', function () { return view('admin.config.basic'); })->name('admin.config.basic');
    Route::get('/config/carrusel', function () { return view('admin.config.carrusel'); })->name('admin.config.carrusel');
    Route::get('/config/redes-sociales', function () { return view('admin.config.redes-sociales'); })->name('admin.config.redes-sociales');
    Route::get('/config/footer', function () { return view('admin.config.footer'); })->name('admin.config.footer');
});

Route::get('/publicacion/{publicacion:slug}', function($slug) {
    $publicacion = publicacion::all()->first(function ($publicacion) use ($slug) {
        return $publicacion->slug === $slug;
    });
    if (! $publicacion) {
        abort(404);
    }
    return view('publicacion.show', ['publicacion' => $publicacion]);
})->name('publicacion.show');

Route::get('/publicacion/{publicacion}/editar', [PublicacionController::class, 'edit'])->name('publicacion.edit')->middleware('can:editpublicacion');
Route::get('/publicacion/{publicacion}/eliminar', [PublicacionController::class, 'destroy'])->name('publicacion.delete')->middleware('can:delete,publicacion');

Route::get('/perfil', function () { return view('perfil'); })->name('perfil')->middleware(AuthenticateMiddleware::class);
