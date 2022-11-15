<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriasController;
use App\Models\Ofertas;
use App\Models\Categorias;

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

Route::get('/', function () {
    return view('home', ["ofertas" => Ofertas::all()]);
});

Route::get('/categorias-config', function () {
    $categorias = Categorias::all();
    $categorias_nomes = $categorias->pluck("nome");
    $categorias_id = $categorias->pluck("id");

    return view('categorias.config', ["categorias" => $categorias]);
});

Route::resource('produtos', ProdutosController::class);
Route::resource('categorias', CategoriasController::class);
