<?php

use App\Http\Middleware\Admin;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Authentication;
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

Route::middleware([AuthCheck::class])->group(function(){
    Route::get('/personal', [App\Http\Controllers\IndexController::class, 'personal'])->name('personal');
    Route::post('/addBasket/{id}', [App\Http\Controllers\IndexController::class, 'addBasket'])->name('basket.add');
    Route::post('/delete/{id}', [App\Http\Controllers\IndexController::class, 'delete'])->name('delete');          
});

Route::middleware([Authentication::class])->group(function(){
    Route::get('/registration', [App\Http\Controllers\AuthController::class, 'registration'])->name('user.registration');
    Route::post('/registration', [App\Http\Controllers\AuthController::class, 'store']);
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('user.login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'authentify']);
});

Route::middleware([Admin::class])->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
    Route::post('/admin', [App\Http\Controllers\AdminController::class, 'adminData'])->name('admin.data');
    Route::post('/status', [App\Http\Controllers\AdminController::class, 'status']);
    Route::post('/add', [App\Http\Controllers\AdminController::class, 'store']);
    Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('admin.add');
});

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/', [App\Http\Controllers\IndexController::class, 'getProducts']);

Route::get('/show/{id}', [App\Http\Controllers\IndexController::class, 'show'])->name('show');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('user.logout');

Route::get('/order', [App\Http\Controllers\IndexController::class, 'order'])->name('order');
Route::post('/order', [App\Http\Controllers\IndexController::class, 'placing'])->name('order.placing');

Route::post('/favorite/{id}', [App\Http\Controllers\IndexController::class, 'favorite'])->name('favorite.add'); 
Route::post('/remove/{id}', [App\Http\Controllers\IndexController::class, 'remove'])->name('favorite.remove');   

Route::post('/basket', [App\Http\Controllers\IndexController::class, 'basket'])->name('basket');

