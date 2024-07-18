<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    public      $timestamps = false;
    protected   $table = 'categoria';

    protected $fillable = [
        'nome',
    ];

}