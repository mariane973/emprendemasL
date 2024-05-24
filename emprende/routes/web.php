<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\UserController;
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

// Route::get('/login', function(){
//     return view('usuarios.login');
// });

// Route::get('/registerPrueva', function(){
//     return view('usuarios.register');
// });

Route::resource('/productos', ProductoController::class);

Route::resource('/emprendimientos', VendedorController::class);

Route::resource('/ofertas', OfertaController::class);

Route::resource('/users', UserController::class);
Route::get('/users/{usuario}/confirmar',[UserController::class, 'eliminar']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [UserController::class, 'index'])->name('profile');