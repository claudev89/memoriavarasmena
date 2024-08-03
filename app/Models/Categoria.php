<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['nombre'];
    public $hidden = ['id'];

    public function publicacion()
    {
        return $this->hasMany(Publicacion::class);
    }
}
