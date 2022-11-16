<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CarrinhoController;
use App\Models\Ofertas;
use App\Models\Categorias;
use App\Models\Produtos;



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
    return view('home', ["ofertas" => Produtos::where("oferta", 1)->get()]);
});

Route::resource('carrinho', CarrinhoController::class);
Route::resource('produtos', ProdutosController::class);
Route::resource('categorias', CategoriasController::class);

Route::get('/categorias-config', function () {
    $categorias = Categorias::all();
    $categorias_nomes = $categorias->pluck("nome");
    $categorias_id = $categorias->pluck("id");

    return view('categorias.config', ["categorias" => $categorias]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
