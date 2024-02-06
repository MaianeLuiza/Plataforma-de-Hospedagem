<?php
use App\Http\Controllers\AplicacaoController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/aplicacoes', [AplicacaoController::class, 'index'])->name('aplicacoes-index');
Route::get('/aplicacoes/create', [AplicacaoController::class, 'create'])->name('aplicacoes-create');
Route::post('/aplicacoes', [AplicacaoController::class, 'store'])->name('aplicacoes-store');
Route::get('/aplicacoes/{id}/edit', [AplicacaoController::class, 'edit'])->name('aplicacoes-edit');
Route::put('/aplicacoes/{id}', [AplicacaoController::class, 'update'])->name('aplicacoes-update');
Route::delete('/aplicacoes/{id}', [AplicacaoController::class, 'destroy'])->name('aplicacoes-destroy');
Route::get('/aplicacoes/{id}', [AplicacaoController::class, 'show'])->name('aplicacoes-show');

Route::fallback(function(){
    return 'Erro!';
});