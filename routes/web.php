<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;

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

Route::get('/usuarios/{id}/drop', [\App\Http\Controllers\UserController::class , 'drop' ]);
Route::get('/productos/{id}/drop', [\App\Http\Controllers\ProductoController::class , 'drop' ]);
Route::get('/ventas/{id}/drop', [\App\Http\Controllers\VentasController::class , 'drop' ]);
