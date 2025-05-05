<?php

use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetRestaurant;
use App\Http\Controllers\front\UserPlans;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\PlanController;
use App\Http\Controllers\front\UserController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\OrderController;
use App\Http\Controllers\front\MessageController;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\auth\AuthController;
use App\Http\Controllers\front\store\BrandController;
use App\Http\Controllers\front\store\CouponController;
use App\Http\Controllers\front\StoreSettingController;
use App\Http\Controllers\front\EcommercePlanController;
use App\Http\Controllers\front\store\ProductController;
use App\Http\Controllers\front\auth\SocialLoginController;
use App\Http\Controllers\front\store\CategoriesController;
use App\Http\Controllers\front\store\storeOrderController;
use App\Http\Controllers\front\store\StoreBannersController;
use App\Http\Controllers\front\EcommercePlanSubscribeController;
use App\Http\Controllers\front\store\website\StoreFrontController;

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
            Route::match(['get', 'post'], 'confirm_data', 'confirm_data')->name('confirm_data');
            Route::post('logout', 'logout')->name('logout');
        });
        Route::controller(UserPlans::class)->group(function () {
            Route::get('ecommerce-plans', 'ecommercePlans')->name('ecommerce.mysubscribe');
        });
        ########### Start Ecommerce Plans ###########
        Route::controller(EcommercePlanController::class)->group(function () {
            Route::get('plans', 'index')->name('ecommerce.plans');
        });
        ########### Start Subscribe In Ecommerce Plans ###########
        Route::controller(EcommercePlanSubscribeController::class)->group(function () {
            Route::post('subscribe', 'store')->name('ecommerce.subscribe');
            Route::post('/subscribe/paypal', 'initiatePayment')->name('ecommerce.subscribe.paypal.initiate');
            Route::get('/paypal/success', 'paypalSuccess')->name('ecommerce.subscribe.paypal.success');
            Route::get('/paypal/cancel', 'paypalCancel')->name('ecommerce.subscribe.paypal.cancel');
        });
        ########## End Subscribe In Ecommerce Plans ##########
        ########### End Ecommerce Plans ###########
        ########### Start Store Setting ############
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store-setting', 'as' => 'store-setting.'], function () {
            Route::controller(StoreSettingController::class)->group(function () {
                Route::match(['get', 'post'], 'update', 'update')->name('update');
            });
        });
        ########### End Store Setting  #############
        ############ Start Store Categories ########
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store', 'as' => 'store.'], function () {
            Route::controller(CategoriesController::class)->group(function () {
                Route::get('categories', 'index')->name('categories');
                Route::match(['get', 'post'], 'categories/create', 'create')->name('categories.create');
                Route::match(['get', 'post'], 'categories/{id}/edit', 'edit')->name('categories.edit');
                Route::match(['get', 'post'], 'categories/{id}', 'update')->name('categories.update');
                Route::post('categories/destroy/{id}', 'destroy')->name('categories.destroy');
            });
        });
        ############ End Store Categories ##########
        ############ Start Brand  Categories ########
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store', 'as' => 'store.'], function () {
            Route::controller(BrandController::class)->group(function () {
                Route::get('brands', 'index')->name('brands');
                Route::match(['get', 'post'], 'brands/create', 'create')->name('brands.create');
                Route::match(['get', 'post'], 'brands/{id}/edit', 'edit')->name('brands.edit');
                Route::match(['get', 'post'], 'brands/{id}', 'update')->name('brands.update');
                Route::post('brands/destroy/{id}', 'destroy')->name('brands.destroy');
            });
        });
        ############ End Brand  Categories ##########
        ########### Start Product Controller ########
        ####### LiveWire
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/custom/livewire/update', $handle);
        });
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store', 'as' => 'store.'], function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('products', 'index')->name('products');
                Route::match(['get', 'post'], 'products/create', 'create')->name('products.create');
                Route::match(['get', 'post'], 'products/{id}/edit', 'edit')->name('products.edit');
                Route::match(['get', 'post'], 'products/{id}', 'update')->name('products.update');
                Route::get('product/{id}/show', 'show')->name('product.show');
                Route::post('products/destroy/{id}', 'destroy')->name('products.destroy');
                Route::match(['get', 'post'], 'products/vartiants/destroy/{id}', 'DeleteVartiant')->name('products.vartiants.delete');
            });
        });
        ########### End Product Controller ##########
        ########### Start Coupons Controller ########
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store', 'as' => 'store.'], function () {
            Route::resource('coupons', CouponController::class);
        });
        ########### End Coupons Controller ##########
        ############ Start Orders Controller ########
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store', 'as' => 'store.'], function () {
            Route::controller(storeOrderController::class)->group(function () {
                Route::get('orders', 'index')->name('orders.index');
            });
        });
        ############ End Orders Controller ##########
        ############ Start Slider Controller ########
        Route::group(['middleware' => 'can:adminstore', 'prefix' => 'store', 'as' => 'store.'], function () {
            Route::controller(StoreBannersController::class)->group(function () {
                Route::get('sliders', 'index')->name('sliders.index');
                Route::match(['get', 'post'], 'sliders/create', 'store')->name('sliders.create');
                Route::match(['get', 'post'], 'sliders/update/{id}', 'update')->name('sliders.update');
                Route::post('sliders/destroy/{id}', 'destroy')->name('sliders.destroy');
            });
        });
        ############ End Slider Controller ##########
    });
});

####################################################################
######################################################################
#######################################################################
############## Start Front Store Website #############################
Route::prefix('/{store:slug}')->group(function () {
    Route::controller(StoreFrontController::class)->group(function () {
        Route::get('/', 'show')->name('store.show');
        Route::get('products', 'products')->name('store.products');
    });
});
############## End Front Store Website ###############################

Route::view('terms', 'front.terms');
Route::view('privacy-policy', 'front.privacy-policy');

############## Start Social Login Controller ###############
Route::get('auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('auth.google.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('auth.google.callback');

############## End Social Login Controller

@include 'dashboard.php';
