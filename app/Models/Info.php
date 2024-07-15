<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = ['quienes_somos', 'logo', 'nombre', 'footer'];
    protected $hidden = ['id'];

    protected $table = 'site_conf';
}
