<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

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


/*Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');*/
Route::get('/', function () {
    return view('layouts.site');
});

Route::get('/dashboard', [ProductController::class, 'getAllProduct'])->middleware(['auth'])->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/', [ProductController::class, 'getAllProduct']);
Route::get('/category/{category}', [CategoryController::class, 'getCategoryProduct']);
Route::get('/product_page/{id}', [ProductController::class, 'getOneProduct']);


Route::controller(OrderController::class)->group(function () {
    Route::post('/order', 'setUserOrder')->name('order');
    Route::match(['get', 'post'], '/order/basket', 'getAllOrder');
});

require __DIR__ . '/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
