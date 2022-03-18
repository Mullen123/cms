<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;

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



/*ruta para el front end*/
Route::get('/', [FrontendController::class, 'index']);






/*si no estas logueado entonces  te envia al login*/
Route::group(['middleware' => ['auth']], function () {


	Route::get('/inicio', [InicioController::class, 'index'])->name('inicio');



	Route::resource('users',UsersController::class)->names('users');
		Route::resource('roles',RoleController::class)->names('roles');











	/*rutas para las categorias*/
	Route::get('/categories', [CategoriasController::class, 'index'])->middleware('can:categorias.home')->name('categorias.home');
	Route::post('/categories', [CategoriasController::class, 'store'])->middleware('can:categorias.store')->name('categorias.store');
	Route::post('/editCategory', [CategoriasController::class, 'edit'])->middleware('can:categorias.edit')->name('categorias.edit');
	Route::post('/updateCategory', [CategoriasController::class, 'update'])->middleware('can:categorias.update')->name('categorias.update');
	Route::post('/deleteCategory',[CategoriasController::class,'delete'])->middleware('can:categorias.delete')->name('categorias.delete');

});




