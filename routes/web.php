<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/', [App\Http\Controllers\IndexController::class, 'getProducts']);

Route::get('/show/{id}', [App\Http\Controllers\IndexController::class, 'show'])->name('show');
Route::post('/addBasket/{id}', [App\Http\Controllers\IndexController::class, 'addBasket'])->name('basket.add');

Route::post('/basket', [App\Http\Controllers\IndexController::class, 'basket'])->name('basket');
Route::post('/delete/{id}', [App\Http\Controllers\IndexController::class, 'delete'])->name('delete');

Route::get('/order', [App\Http\Controllers\IndexController::class, 'order'])->name('order');
Route::post('/order', [App\Http\Controllers\IndexController::class, 'placing'])->name('order.placing');

Route::get('/personal', function () {
    return Inertia::render('Users/Personal');
})->name('personal');


Route::get('/registration', [App\Http\Controllers\AuthController::class, 'registration'])->name('user.registration');
Route::post('/registration', [App\Http\Controllers\AuthController::class, 'store']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('user.login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'authentify']);

Route::get('/admin', function () {
    return Inertia::render('Admin/Admin');
});
Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('admin.add');
Route::post('/add', [App\Http\Controllers\AdminController::class, 'store']);
