<?php

use App\Http\Controllers\front\auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetRestaurant;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\UserController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\OrderController;
use App\Http\Controllers\front\MessageController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\ResturantFrontController;
//Route::get('/{restaurant:slug}', [ResturantFrontController::class, 'show']);

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('front.index');
});
Route::controller(MessageController::class)->group(function () {
    Route::get('contact', 'index')->name('contact');
    Route::match(['get', 'post'], 'contact/sendmessage', 'store')->name('contact.store');
});

############# Start AuthController #########

Route::controller(AuthController::class)->group(function () {
    Route::match(['get', 'post'], 'login', 'login')->name('user.login');
    Route::match(['post', 'get'], 'register', 'register')->name('user.register');
});
Route::middleware('auth')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('account', 'account')->name('account');
            Route::match(['get', 'post'], 'update_profile', 'update_profile')->name('update_profile');
            Route::match(['get', 'post'], 'update_password', 'update_password')->name('update_password');
            Route::post('logout', 'logout')->name('logout');
        });
    });
});


Route::view('terms', 'front.terms');
Route::view('privacy-policy', 'front.privacy-policy');


@include 'dashboard.php';
