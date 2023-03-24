<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [Controller::class, 'dashboard']);

Route::get('/clientes', [Controller::class, 'clientes']);
Route::get('/funcionarios', [Controller::class, 'funcionarios']);
Route::get('/escritorios', [Controller::class, 'escritorios']);
Route::get('/produtos', [Controller::class, 'produtos']);
Route::get('/categorias', [Controller::class, 'categorias']);
Route::get('/pedidos', [Controller::class, 'pedidos']);
Route::get('/pedidos/{id?}', [Controller::class, 'detalhesPedidos']);
Route::get('/pagamentos', [Controller::class, 'pagamentos']);

Route::post('/clientes', [Controller::class, 'actionClientes']);
Route::post('/clientesDeletar', [Controller::class, 'actionClientesDeletar']);

Route::post('/produtos', [Controller::class, 'actionProdutos']);
Route::post('/produtosDeletar', [Controller::class, 'actionProdutosDeletar']);


