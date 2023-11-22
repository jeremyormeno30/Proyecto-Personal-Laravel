<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\VentController;
use App\Http\Controllers\RegistroVentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => '/login'], function () {
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/', [AuthController::class, 'attemptLogin'])->name('login.attempt');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::group(['prefix' => '/register'], function () {
    Route::get('/', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/', [AuthController::class, 'storeAccount'])->name('register.store');
});

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');

//Route::post('/vehicles', [VehiclesController::class, 'store'])->name('vehicles.store')->middleware('auth');
Route::group(['prefix' => '/products'], function () {
    Route::post('/', [ProductsController::class, 'store'])->name('products.store')->middleware('auth');
    Route::delete('/{id}', [ProductsController::class, 'delete'])->name('products.delete')->middleware('auth');
    Route::get('/vista', [ProductsController::class, 'vista'])->name('products.vista')->middleware('auth');
    Route::get('/agregarEliminar', [ProductsController::class, 'index'])->name('Agregar.Eliminar')->middleware('auth');
    Route::get('/', 'ProductsController@index');
});

Route::get('/producto/buscar/{barcode}', 'ProductController@buscarPorCodigoBarras')->middleware('auth');
Route::get('/producto/buscar', 'ProductoController@buscarPorCodigoBarras')->middleware('auth');


Route::get('/registroventa', [RegistroVentaController::class, 'index'])->name('registroventa')->middleware('auth');
Route::post('/buscar-producto', [RegistroVentaController::class, 'buscarProducto'])->name('buscarProducto')->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});
