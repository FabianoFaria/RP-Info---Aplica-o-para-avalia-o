<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * @OA\Info(title="RP Info - App de Teste", version="1.0")
 */
class ProdutoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/produtos",
     *     summary="Obter lista de todos os produtos",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de produtos cadastrados"
     *     )
     * )
     */
    public function index()
    {
        $produtos = Produto::with('categoria', 'usuario')->get();

        return response()->json([
            'produtos' => $produtos
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/usuarios/{usuario}/produtos",
     *     summary="Obter produtos cadastrados por usuário",
     *     @OA\Parameter(
     *         name="usuario",
     *         in="path",
     *         description="ID do usuário",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Produtos do usuário"
     *     )
     * )
     */
    public function showProdutosUsuario($usuario)
    {
        try {
            $usuario = Usuario::with('produtos.categoria')->findOrFail($usuario);

            return response()->json([
                'usuario' => $usuario
            ]);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Usuário não encontrado'
            ], 404);
        }
    }
}