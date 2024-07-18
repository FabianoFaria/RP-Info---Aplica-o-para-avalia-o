<?php
  
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CadastroProdutoRequest;
use App\Http\Requests\EdicaoProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{

    /**
     *
     * @return response()
     */
    public function index()
    {

        if(Auth::check()){

            // Obter os últimos cinco registros de Produto e Categoria
            $produtos = Produto::with('categoria', 'usuario')->orderBy('id', 'desc')->get();

            // Passar os dados para a view
            return view('produto.index', compact('produtos'));
        }
  
        return redirect("login")->withSuccess('Opps! Parece que você ainda não tem acesso.');
    }


    /**
     *
     * @return response()
     */
    public function novoProduto()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();
        $usuario    = Auth::user();
        return view('produto.novoProduto', compact('categorias', 'usuario'));
    }

        /**
     * Armazena um novo produto.
     *
     * @param  \App\Http\Requests\CadastroProdutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduto(CadastroProdutoRequest $request)
    {
        $usuario    = Auth::user();

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->categoria_id = $request->categoria_id;
        $produto->usuario_id = $usuario->id;
        $produto->save();

        return redirect()->route('listaProdutos')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function editarProduto($id)
    {
        //TODO: Implementar permissão apenas para o usuário criador do produto para editar
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::orderBy('id', 'desc')->get();
        $usuario = Auth::user();
        return view('produto.editProduto', compact('produto', 'categorias', 'usuario'));
    }

    /**
     * Atualizar o produto especificado.
     *
     * @param  \App\Http\Requests\EdicaoProdutoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduto(EdicaoProdutoRequest $request, $id)
    {

        //TODO: Implementar permissão apenas para o usuário criador do produto para editar
        $produto = Produto::findOrFail($id);
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->categoria_id = $request->categoria_id;
        $produto->save();

        return redirect()->route('listaProdutos')->with('success', 'Produto atualizado com sucesso!');
    }

}