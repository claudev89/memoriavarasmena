<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class publicacion extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $value) {
        $query->where('titulo', 'LIKE', "%{$value}%");
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->titulo);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
