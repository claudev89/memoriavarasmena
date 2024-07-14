<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenCarrusel extends Model
{
    protected $table = 'slider_images';
    protected $fillable = ['url', 'title', 'description', 'position'];
    protected $hidden = ['id'];

    use HasFactory;
}
