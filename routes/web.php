<?php

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

Route::GET('/', 'MarketController@index')->name('home');

Route::GET('/category', 'CategoryController@index')->name('categories');
Route::GET('/category/{id}', 'CategoryController@detail')->name('categories-detail');

Route::GET('/details/{id}', 'DetailController@index')->name('product-detail-user');
Route::POST('/details/{id}', 'DetailController@AddCart')->name('add-cart');



// Route::POST('/callback', 'CartController@callback')->name('midtrans-callback');

Route::GET('/success', 'CartController@success')->name('success');
Route::GET('/register/success', 'CartController@register_success')->name('register-success');



Route::group(['middleware' => ['auth']], function () {
    Route::DELETE('/cart/{id}', 'CartController@deleteCart')->name('delete-cart');
    Route::GET('/cart', 'CartController@index')->name('cart');
    Route::POST('/checkout', 'CheckoutController@proccess')->name('checkout');
    Route::GET('/Dashboard', 'Admin\DashboardController@index')->name('dashboard');

    Route::GET('/Dashboard-Product', 'Admin\ProductController@index')->name('dashboard-product');
    Route::GET('/Dashboard-Product/create', 'Admin\ProductController@create')->name('product-create');
    Route::GET('/Dashboard-Product/detail/{id}', 'Admin\ProductController@detail')->name('product-detail');
    Route::POST('/Dashboard-Product/store', 'Admin\ProductController@store')->name('product-store');

    Route::GET('/Dashboard-Transaction', 'Admin\TransactionController@index')->name('dashboard-transaction');
    Route::GET('/Dashboard-Transaction/{id}', 'Admin\TransactionController@detail')->name('dashboard-transaction-detail');

    Route::GET('/Dashboard-Setting/store', 'Admin\SettingController@store')->name('dashboard-setting-store');
    Route::GET('/Dashboard-Setting/account', 'Admin\SettingController@account')->name('dashboard-setting-account');
});

Route::prefix('Superadmin')
    ->namespace('SuperAdmin')
    ->group(function () {
        Route::GET('/', 'DashboardController@index')->name('superadmin-dashboard');
        Route::RESOURCE('category', 'CategoryController');
        Route::RESOURCE('user', 'UserController');
        Route::RESOURCE('products', 'ProductController');
        Route::RESOURCE('product-gallery', 'ProductGalleryController');
    });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
