<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    public      $timestamps = false;
    protected   $table = 'produto';

    protected $fillable = [
        'nome',
        'valor',
        'usuario_id',
        'categoria_id',
    ];

}

