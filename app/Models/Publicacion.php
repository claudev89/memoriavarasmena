<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class publicacion extends Model
{
    use HasFactory;

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
        return 'slug';
    }

    public function getSlugAttribute()
    {
        return Str::slug($this->titulo);
    }
}
