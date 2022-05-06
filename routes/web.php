<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::get('/', function () {return view('home');});

Route::get('/dashboard', [ProductController::class, 'getAllProduct'])->middleware(['auth'])->name('dashboard');

Route::get('/login', function () {return view('login');
})->name('login');

Route::get('/register', function () {return view('register');
})->name('register');

Route::get('/',[ProductController::class, 'getAllProduct']);
Route::get('/{categories}',[ProductController::class, 'getCategoryProduct']);
Route::get('/product_page/{id}',[ProductController::class, 'getOneProduct']);

require __DIR__.'/auth.php';
