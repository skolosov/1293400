<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\PriceListPositionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'home'])->name('home');
Route::resource('price-lists', PriceListController::class);
Route::resource('price-lists/{price_list}/position', PriceListPositionController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy']);
