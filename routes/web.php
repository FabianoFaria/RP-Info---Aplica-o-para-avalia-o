<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function()
{
	if(Auth::check()){
		//Usuário logado
		return Redirect::to('/dashboard');

	}else{
		return Redirect::to('/login');
		// return View::make('welcome');
	}
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('cadastrar', [AuthController::class, 'cadastrar'])->name('cadastrar');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    Route::controller(ProdutoController::class)->group(function () {
        Route::get('listaProdutos', 'index')->name('listaProdutos');
        Route::get('novoProduto', 'novoProduto')->name('novoProduto');
        Route::post('storeProduto', 'storeProduto')->name('produto.store');
        Route::get('editarProduto/{id}', 'editarProduto')->name('editarProduto');
        Route::put('updateProduto/{id}', 'updateProduto')->name('produto.update');
    });

    Route::controller(CategoriaController::class)->group(function () {
        Route::get('listaCategorias', 'index')->name('listaCategorias');
        Route::get('novaCategoria', 'novaCategoria')->name('novaCategoria');
        Route::post('store', 'store')->name('categoria.store');
        Route::get('editarCategoria/{id}', 'editCategoria')->name('editCategoria');
        Route::put('update/{id}', 'update')->name('categoria.update');
    });

    // Adicione aqui outras rotas que requerem autenticação
});

