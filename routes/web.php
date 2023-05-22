<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AvatarrController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '.*');

Route::get('/', [ProductsController::class, 'index'])->name("products");
Route::get('/getProducts', [ProductsController::class, 'getProducts']);
Route::get('/products/{id}', [ProductsController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');


Route::get('/graph', [ProductsController::class, 'graph'])->name('products.graph');
Route::get('/getchartData', [ProductsController::class, 'chartData'])->name('products.chartData');

//////////////////////////////////////////////////////////////////////////////////
Route::get('/avatarr', [AvatarrController::class, 'index'])->name('avatarr.index');
