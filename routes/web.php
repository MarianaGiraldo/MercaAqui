<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ListsController;

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
    return view('index',['fondo'=>'fondo1.jpg']);
});

Route::resource('/usuarios',UserController::class );
Route::resource('/productos',ProductoController::class );
Route::resource('/ventas',VentaController::class );

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuarios/{id}/drop', [UserController::class , 'drop' ]);
Route::get('/productos/{id}/drop', [ProductoController::class , 'drop' ]);
Route::get('/ventas/{id}/drop', [VentaController::class , 'drop' ]);

Route::get('/getVentas', [ListsController::class, 'getVentasList']);
Route::get('/getProducts', [ListsController::class, 'getProductsList']);
Route::get('/getUsers', [ListsController::class, 'getUsersList']);
