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
