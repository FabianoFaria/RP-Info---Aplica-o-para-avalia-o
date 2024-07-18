<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/**
 * @OA\Tag(
 *     name="RP Info - API",
 *     description="RP Info - Teste para vaga de cargo PHP"
 * )
 */

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/usuarios/{usuario}/produtos', [ProdutoController::class, 'showProdutosUsuario']);
