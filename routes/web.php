<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoriasController;
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



Auth::routes();





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*ruta para el front end*/
Route::get('/', [FrontendController::class, 'index']);

 
Route::get('/inicio', [InicioController::class, 'index']);


/*rutas para categorias*/
Route::get('/categories', [CategoriasController::class, 'index'])->name('categorias.index');
Route::post('/categories', [CategoriasController::class, 'store'])->name('categorias.store');