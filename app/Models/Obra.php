<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = ['tipo', 'contenido', 'autor_id'];
    protected $hidden = ['id'];
    public $timestamps = false;

    public function scopeSearch ($query, $value) {
        $query->where('contenido', 'LIKE', "%{$value}%");
    }

    public function autor() {
        return $this->belongsTo(Autor::class);
    }
}
