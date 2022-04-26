<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ExcursionController;
use App\Http\Controllers\ExportController;
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


	/*rutas para el modulo Usuarios*/
	Route::get('/users', [UsersController::class, 'index'])->middleware('can:users.index')->name('users.index');
	Route::post('/users', [UsersController::class, 'store'])->middleware('can:users.store')->name('users.store');   
    Route::post('/deleteUser',[UsersController::class,'destroy'])->middleware('can:users.delete')->name('users.delete');
	Route::get('/users/{user}/edit',[UsersController::class,'edit'])->middleware('can:users.edit')->name('users.edit');
	Route::put('/user/{user}',[UsersController::class,'update'])->middleware('can:users.update')->name('users.update');

	
	Route::resource('roles',RoleController::class)->names('roles')->except('show');



	/*rutas para el modulo Slide*/
	Route::get('/slide', [SlideController::class, 'index'])->middleware('can:slide.index')->name('slide.home');
	Route::post('/slide', [SlideController::class, 'store'])->middleware('can:slide.store')->name('slide.store');   
	Route::post('/editSlide',[SlideController::class,'edit'])->middleware('can:slide.edit')->name('edit');
	Route::post('/updateSlide',[SlideController::class,'update'])->middleware('can:slide.update')->name('slide.update');
	Route::post('/deleteSlide',[SlideController::class,'destroy'])->middleware('can:slide.delete')->name('slide.delete');




	/*rutas para las categorias*/
	Route::get('/categories', [CategoriasController::class, 'index'])->middleware('can:categorias.home')->name('categorias.home');
	Route::post('/categories', [CategoriasController::class, 'store'])->middleware('can:categorias.store')->name('categorias.store');
	Route::post('/editCategory', [CategoriasController::class, 'edit'])->middleware('can:categorias.edit')->name('categorias.edit');
	Route::post('/updateCategory', [CategoriasController::class, 'update'])->middleware('can:categorias.update')->name('categorias.update');
	Route::post('/deleteCategory',[CategoriasController::class,'delete'])->middleware('can:categorias.delete')->name('categorias.delete');




	/*rutas para las categorias*/
	Route::get('/excursiones', [ExcursionController::class, 'index'])->name('excursiones.index');
	Route::post('/excursiones', [ExcursionController::class, 'store'])->name('excursiones.store');
	Route::post('/editExcursion', [ExcursionController::class, 'edit'])->name('excursiones.edit');
	Route::post('/updateExcursion', [ExcursionController::class, 'update'])->name('excursiones.update');
	Route::post('/deleteExcursion', [ExcursionController::class, 'destroy'])->name('excursiones.delete');




/*rutas para exportar*/
Route::get('users/export/', [ExportController::class, 'usersCsv'])->name('usersCsv');


});










