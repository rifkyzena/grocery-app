<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/logout', [LoginController::class, 'logoutView'])->name('logout.view');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/item/{id}', [HomeController::class, 'showItem'])->name('item.detail');
    Route::get('/item/{id}/buy', [HomeController::class, 'addCart'])->name('item.add-cart');
    Route::get('/cart', [HomeController::class, 'cartIndex'])->name('cart.index');
    Route::delete('/cart/{id}', [HomeController::class, 'removeCartItem'])->name('cart.remove-item');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('profile', [HomeController::class, 'profileIndex'])->name('profile.index');
    Route::put('profile/{id}', [HomeController::class, 'profileUpdate'])->name('profile.update');

    Route::get('alert/update', [HomeController::class, 'alertUpdate'])->name('alert.update');
    Route::get('alert/checkout', [HomeController::class, 'alertCheckout'])->name('alert.checkout');

    Route::group(['middleware' => 'role:Admin'], function () {
        Route::get('account-maintenance', [HomeController::class, 'indexAccount'])->name('admin.account');
        Route::get('account-maintenance/{id}/edit', [HomeController::class, 'editAccount'])->name('admin.account-edit');
        Route::put('account-maintenance/{id}/update', [HomeController::class, 'updateAccount'])->name('admin.account-update');
        Route::delete('account-maintenance/{id}', [HomeController::class, 'destroyAccount'])->name('admin.account-destroy');
    });
});
