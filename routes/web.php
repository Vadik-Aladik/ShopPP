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

Route::get('/', function () {
    return Inertia::render('product/App');
});
Route::get('/show', function () {
    return Inertia::render('product/Show');
});
Route::get('/order', function () {
    return Inertia::render('product/Order');
});
Route::get('/personal', function () {
    return Inertia::render('Users/Personal');
});
Route::get('/registration', [App\Http\Controllers\AuthController::class, 'registration'])->name('user.registration');
Route::post('/registration', [App\Http\Controllers\AuthController::class, 'store']);
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::post('/login', [App\Http\Controllers\AuthController::class, 'authentify']);

Route::get('/admin', function () {
    return Inertia::render('Admin/Admin');
});
Route::get('/add', function () {
    return Inertia::render('Admin/Add');
});
