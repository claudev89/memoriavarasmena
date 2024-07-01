<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'descripcion'];
    protected $hidden = ['id'];
    public $timestamps = false;

    public function scopeSearch ($query, $value) {
        $query->where('nombre', 'LIKE', "%{$value}%");
    }

    public function obra() {
        return $this->hasMany(Obra::class);
    }
}
