<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    // Model customizado
    public      $timestamps = false;
    protected   $table = 'usuario';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha','email',
    ];

    /**
     * Relacionamento: Um Usuário possui muitos Produtos.
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'usuario_id');
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }

}