<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria', 'usuario')->get();

        return response()->json([
            'produtos' => $produtos
        ]);
    }

    public function showProdutosUsuario($usuario)
    {
        $usuario = Usuario::with('produtos.categoria')->findOrFail($usuario);

        return response()->json([
            'usuario' => $usuario
        ]);
    }
}