<?php
  
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Http\Requests\CadastroCategoriaRequest;
use App\Http\Requests\EdicaoCategoriaRequest;



class CategoriaController extends Controller
{
    
    /**
     *
     * @return response()
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();
        $usuario    = Auth::user();
        return view('categoria.index', compact('categorias', 'usuario'));
    }

    /**
     *
     * @return response()
     */
    public function novaCategoria()
    {
        $categorias = Categoria::orderBy('id', 'desc')->get();
        $usuario    = Auth::user();
        return view('categoria.novaCategoria', compact('categorias', 'usuario'));
    }

    /**
     *
     * @return response()
     */
    public function store(CadastroCategoriaRequest $request)
    {
        $categoria = new Categoria;
        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect()->route('listaCategorias')->with('success', 'Categoria criada com sucesso!');
    }

    public function editCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $usuario = Auth::user();
        return view('categoria.editCategoria', compact('categoria', 'usuario'));
    }

    /**
     *
     * @return response()
     */
    public function update(EdicaoCategoriaRequest $request, $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->nome = $request->nome;
        $categoria->save();

        return redirect()->route('listaCategorias')->with('success', 'Categoria atualizada com sucesso!');
    }
}