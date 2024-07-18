<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    public      $timestamps = false;
    protected   $table = 'produto';

    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
        'usuario_id',
        'categoria_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'usuario_id','categoria_id','deleted_at',
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

