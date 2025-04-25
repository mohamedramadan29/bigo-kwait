<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\RolesController;
use App\Http\Controllers\dashboard\StoreController;
use App\Http\Controllers\dashboard\UsersController;
use App\Http\Controllers\dashboard\VideoController;
use App\Http\Controllers\dashboard\CouponController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\SettingController;
use App\Http\Controllers\dashboard\WelcomeController;
use App\Http\Controllers\dashboard\ShippingController;
use App\Http\Controllers\dashboard\auth\AuthController;
use App\Http\Controllers\dashboard\CompaniesController;
use App\Http\Controllers\dashboard\ResturantController;
use App\Http\Controllers\dashboard\CategoriesController;
use App\Http\Controllers\dashboard\NotificationController;
use App\Http\Controllers\dashboard\auth\ResetPasswordController;
use App\Http\Controllers\dashboard\PaymentTransactionController;
use App\Http\Controllers\dashboard\auth\ForgetPasswordController;

Route::group([
    'prefix' => '/dashboard',
    'as' => 'dashboard.',
], function () {

    ##################### Auth Login Controller  ########################
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'show_login')->name('login.show');
        Route::post('register_login', 'register_login');
        Route::post('logout', 'logout')->name('logout');
    });
    ############################### End Auth Login Controller ###############
    Route::view('terms', 'dashboard.terms')->name('terms');
    ############################## End Public Invoice Controller ############
    ################### Reset Password #############
    Route::controller(ForgetPasswordController::class)->group(function () {
        Route::get('password/email', 'showemailform')->name('password.email');
        Route::post('password/email', 'sendotp')->name('password.email.post');
        Route::get('password/verify/{email}', 'showotpform')->name('password.otp.show');
        Route::get('password/verify', 'otpverify')->name('password.otp.post');
        Route::match(['post', 'get'], 'forget-password', 'forget_password')->name('forget_password');
        Route::match(['post', 'get'], 'change-forget-password/{code}', 'change_forget_password');
        Route::post('user/update_forget_password', 'update_forget_password')->name('update_forget_password');
    });
    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('password/reset/{email}', 'ShowResetForm')->name('password.reset');
        Route::post('password/reset', 'resetpassword')->name('password.reset.post');
    });

    ############################### Start Admin Auth Route  ###############
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::controller(AuthController::class)->group(function () {
            Route::match(['post', 'get'], 'update_profile', 'update_profile')->name('update_profile');
            Route::match(['post', 'get'], 'update_password', 'update_password')->name('update_password');
        });

        ############################### Start Welcome  Controller ###############

        Route::controller(WelcomeController::class)->group(function () {
            Route::get('welcome', 'index')->name('welcome');
        });

        ############################### End  Welcome  Controller ###############
        ##################### Start Role Permissions ####################
        Route::group(['middleware' => 'can:roles', 'prefix' => 'role', 'as' => 'roles.'], function () {
            Route::controller(RolesController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                // Route::post('store', 'store')->name('store')->middleware('can:roles');
                Route::match(['get', 'post'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });

        ##################### End Role Permissions #########################

        ##################### Start Admins Routes #########################
        Route::group(['middleware' => 'can:superadmin', 'prefix' => 'admins', 'as' => 'admins.'], function () {
            Route::controller(AdminController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('tech', 'tech')->name('tech');
                Route::post('update_tech/{id}', 'update_tech')->name('update_tech');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
                ######################### Show Tech Invoices  Admins ############################
                Route::match(['post', 'get'], 'tech_invoices/{id}', 'tech_invoices')->name('tech_invoices');
            });
        });
        ################### End Admins Routes ###########################
        ################### Start Companies Routes #####################
        Route::group(['middleware' => 'can:companies', 'prefix' => 'companies', 'as' => 'companies.'], function () {
            Route::controller(CompaniesController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################## End Companies Routes #####################

        ################### Start Users Routes #####################
        Route::group(['middleware' => 'can:users', 'prefix' => 'users', 'as' => 'users.'], function () {
            Route::controller(UsersController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################## End Users Routes #####################

        ################### Start Stores Routes #####################
        Route::group(['middleware' => 'can:stores', 'prefix' => 'stores', 'as' => 'stores.'], function () {
            Route::controller(StoreController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################## End Stores Routes #####################

        ################### Start Stores Routes #####################
        Route::group(['middleware' => 'can:payment_transactions', 'prefix' => 'payments', 'as' => 'payments.'], routes: function () {
            Route::controller(PaymentTransactionController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################## End Stores Routes #####################

        ##################### Start Resturant Routes #########################
        Route::group(['middleware' => 'can:superadmin', 'prefix' => 'resturants', 'as' => 'resturants.'], function () {
            Route::controller(ResturantController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################### End Resturant Routes ###########################


        ##################### Start Resturant Routes #########################
        Route::group(['middleware' => 'can:categories', 'prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::controller(CategoriesController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################### End Resturant Routes ###########################


        ##################### Start Product  Routes #########################
        Route::group(['middleware' => 'can:products', 'prefix' => 'products', 'as' => 'products.'], function () {
            Route::controller(ProductController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################### End Product  Routes ###########################

        ##################### Start Product  Routes #########################
        Route::group(['middleware' => 'can:orders', 'prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::controller(OrderController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create', 'create')->name('create');
                Route::match(['post', 'get'], 'update/{id}', 'update')->name('update');
                Route::get('print/{id}', 'print')->name('print');
                Route::post('destroy/{id}', 'destroy')->name('destroy');
            });
        });
        ################### End Product  Routes ###########################

        ################ Start Notification Controller ############
        Route::controller(NotificationController::class)->group(function () {
            Route::get('all_read', 'AllRead')->name('all_read');
        });
        ################ End Notification Controller ##############

        ##################### Start Settings  Routes #########################
        Route::group(['middleware' => 'can:setting', 'prefix' => 'settings', 'as' => 'settings.'], function () {
            Route::controller(SettingController::class)->group(function () {
                Route::match(['get', 'post'], 'update', 'update')->name('update');
            });
            ################## Start Video Controller ##########################
            Route::controller(VideoController::class)->group(function () {
                Route::match(['post', 'get'], 'upload-video', 'UploadVideo')->name('upload.video');
                Route::post('/upload-chunk', 'uploadChunk');
                Route::post('/merge-chunks', 'mergeChunks');
            });
        });
        ################### End Settings  Routes ###########################

        ################### Start Brands Routes ###########################
        Route::group(['middleware' => 'can:brands'], function () {
            Route::resource('brands', BrandController::class);
        });
        ################### End Brands Routes #############################
        ################### Start Coupons Routes ###########################
        Route::group(['middleware' => 'can:coupons'], function () {
            Route::resource('coupons', CouponController::class);
        });
        ################### End Coupons Routes #############################
        ################### Start ShippingController #######################
        Route::group(['middleware' => 'can:shipping', 'prefix' => 'shipping', 'as' => 'shipping.'], function () {
            Route::controller(ShippingController::class)->group(function () {
                Route::get('index', 'index')->name('index');
                Route::match(['get', 'post'], 'create-country', 'storeCountry')->name('create-country');
                Route::match(['post', 'get'], 'update-country/{id}', 'updateCountry')->name('update-country');
                Route::post('destroy-country/{id}', 'destroyCountry')->name('destroy-country');
                Route::get('index-governorate/{country_id}', 'indexGovernorate')->name('index-governorate');
                Route::match(['get', 'post'], 'create-governorate/{country_id}', 'storeGovernorate')->name('create-governorate');
                Route::match(['post', 'get'], 'update-governorate/{id}', 'updateGovernorate')->name('update-governorate');
                Route::post('destroy-governorate/{id}', 'destroyGovernorate')->name('destroy-governorate');
                Route::match(['get', 'post'], 'create-city', 'createCity')->name('create-city');
                Route::match(['post', 'get'], 'update-city/{id}', 'updateCity')->name('update-city');
                Route::post('destroy-city/{id}', 'destroyCity')->name('destroy-city');
                Route::get('countries/status/{id}', 'UpdateStatus')->name('update_status');
            });
        });
        ################### End ShippingController #########################
    });
});
