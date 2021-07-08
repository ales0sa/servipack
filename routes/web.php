<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ WebsiteController};

use Ales0sa\Laradash\Http\Controllers\Auth\LoginController;

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
})->name('website.home');


Route::get ('/novedades', [WebsiteController::class, 'novedades'])->name('website.novedades');
Route::get ('/post/{id}', [WebsiteController::class, 'post'])->name('website.blog-post');




Route::get ('/clientes', [WebsiteController::class, 'clientes'])->name('website.clientes');
Route::get ('/empresa', [WebsiteController::class, 'empresa'])->name('website.empresa');

Route::get ('/productos', [WebsiteController::class, 'productos'])->name('website.productos');

Route::get ('{grupo_id}/subcat', [WebsiteController::class, 'subgrupo'])->name('website.productos.subgrupo');
Route::get ('{grupo_id}/productos', [WebsiteController::class, 'grupo'])->name('website.productos.grupo');
Route::get ('{producto_id}/producto', [WebsiteController::class, 'producto'])->name('website.producto');

Route::get ('/client-area',    [WebsiteController::class, 'clientarea'])->name('website.client-area');


Route::get ('api/cart', [WebsiteController::class, 'cartData'])->name('website.cart.data');

// order user
Route::get ('/myorder/{id}',    [WebsiteController::class, 'myorder'])->name('website.myorder');
Route::get ('/verorden/{id}',    [WebsiteController::class, 'verorden'])->name('website.verorden');
Route::get ('/myorders', [WebsiteController::class, 'myorders'])->name('website.myorders');



// carrito 
Route::get ('/cart',    [WebsiteController::class, 'cart'])->name('website.cart');

Route::post('/cart',    [WebsiteController::class, 'cartStore']);



Route::get ('/contacto', [WebsiteController::class, 'contacto'])->name('website.contacto');
Route::post('/contacto', [WebsiteController::class, 'contactoStore']);
Route::post('/newsletter', [WebsiteController::class, 'newsletter'])->name('website.newsletter');

Route::get ('/clientes', [WebsiteController::class, 'clientes'])->name('website.clientes');
Route::get ('/clientes-data', [WebsiteController::class, 'clientesData'])->name('website.clientes.data');
//Route::post('/clientes-register', [WebsiteController::class, 'clientesRegister'])->name('website.clientes.register');

Route::post('/vuelogin', [WebsiteController::class, 'vuelogin'])->name('website.clientes.login');
Route::post('/vuereg', [WebsiteController::class, 'vuereg'])->name('website.clientes.register');

Route::post('/generate-preference', [WebsiteController::class, 'createPreference'])->name('website.clientes.prefmake');


Route::get ('/clientes-logout', 'Auth\LoginController@logout')->name('website.clientes.logout');


//Route::post('/vuelogin', 'Auth\LoginController@vuelogin');

Route::get ('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();

Route::get('login' , [LoginController::class, 'showLoginForm'])->name('login');