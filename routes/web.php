<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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
});

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
Route::get('/products/{products}/update', [ProductsController::class, 'update'])->name('products.update');
Route::post('/products/{products}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::delete('/products/{products}/delete', [ProductsController::class, 'delete'])->name('products.delete');