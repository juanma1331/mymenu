<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return to_route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('menus', MenuController::class)
    ->except(['edit', 'update', 'show'])
    ->middleware(['auth']);

Route::resource('products', ProductController::class)
    ->except(['show'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
