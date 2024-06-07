<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicioController;
use App\Http\Livewire\CarritoCompra;
use App\Models\Oferta;
use App\Models\Servicio;
use App\Models\Vendedore;

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

Route::get('/', function(){
    return view('emprendemas');
});

Route::resource('/productos', ProductoController::class);
Route::get('/productos/{producto}/confirmar',[ProductoController::class, 'eliminar']);

Route::resource('/emprendimientos', VendedorController::class);
Route::get('/emprendimientos/{emprendimiento}/confirmar',[VendedorController::class, 'eliminar']);

Route::resource('/ofertas', OfertaController::class);
Route::get('/ofertas/{oferta}/confirmar',[OfertaController::class, 'eliminar']);

Route::resource('/servicios',ServicioController::class);
Route::get('/servicios/{servicio}/confirmar',[ServicioController::class, 'eliminar']);

Route::resource('/users', UserController::class);
Route::get('/users/{usuario}/confirmar',[UserController::class, 'eliminar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [UserController::class, 'index'])->name('profile');

Route::get('/carrito', CarritoCompra::class)->name('carritocompra');

Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');