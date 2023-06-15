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

// admin-product-route
Route::match(['post', 'get'], '/product', [App\Http\Controllers\Admin\ProductController::class, 'store']);
Route::match(['post', 'get'],'/fetch-product', [App\Http\Controllers\Admin\ProductController::class, 'fetchproduct']);
Route::match(['post', 'get'],'/edit-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
Route::match(['post', 'get'],'/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);
Route::delete('/delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('admin.customer');


    // Product-Route    
    Route::get('/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.product');    
    

    // User-Route
    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users');
    Route::get('users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);

});
