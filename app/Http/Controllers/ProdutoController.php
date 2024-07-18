<?php
  
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Produto;

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
            $produtos = Produto::orderBy('id', 'desc')->take(5)->get();

            // Passar os dados para a view
            return view('produto.index', compact('produtos'));
        }
  
        return redirect("login")->withSuccess('Opps! Parece que você ainda não tem acesso.');
    } 

}