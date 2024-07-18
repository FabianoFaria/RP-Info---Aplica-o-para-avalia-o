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

    /**
     * Relacionamento: Produto pertence a uma Categoria.
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**
     * Relacionamento: Produto pertence a um Usuário.
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

}

