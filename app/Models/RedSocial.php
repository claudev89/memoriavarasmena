<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    use HasFactory;
    protected $table = 'social_media';
    protected $fillable = ['nombre', 'url'];
    protected $hidden = ['id'];
    public $timestamps = false;
}
