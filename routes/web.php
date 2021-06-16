<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ WebsiteController};
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
})->name('website');

Route::get ('/empresa', [WebsiteController::class, 'empresa'])->name('website.empresa');
Route::get ('/productos', [WebsiteController::class, 'productos'])->name('website.productos');
Route::get ('{grupo_id}/productos', [WebsiteController::class, 'grupo'])->name('website.productos.grupo');
Route::get ('{producto_id}/producto', [WebsiteController::class, 'producto'])->name('website.producto');

Route::get ('/cart', [WebsiteController::class, 'cart'])->name('website.cart');
Route::get ('api/cart', [WebsiteController::class, 'cartData'])->name('website.cart.data');
Route::post('/cart', [WebsiteController::class, 'cartStore']);

Route::get ('/contacto', [WebsiteController::class, 'contacto'])->name('website.contacto');
Route::post('/contacto', [WebsiteController::class, 'contactoStore']);
Route::post('/newsletter', [WebsiteController::class, 'newsletter'])->name('website.newsletter');

Route::get ('/clientes', [WebsiteController::class, 'clientes'])->name('website.clientes');
Route::get ('/clientes-data', [WebsiteController::class, 'clientesData'])->name('website.clientes.data');
Route::post('/clientes-register', [WebsiteController::class, 'clientesRegister'])->name('website.clientes.register');
Route::post('/clientes-login', 'ClientArea\Auth\LoginController@login')->name('website.clientes.login');
Route::get('/clientes-logout', 'Auth\LoginController@logout')->name('website.clientes.logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
