<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/order', [App\Http\Controllers\Admin\OrdersController::class, 'index']);
    Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index']);
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index']);


    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);

});
