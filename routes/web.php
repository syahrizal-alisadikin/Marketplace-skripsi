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

Route::GET('/category-product', 'CategoryController@index')->name('categories');
Route::GET('/category/{id}', 'CategoryController@detail')->name('categories-detail');

Route::GET('/details/{id}', 'DetailController@index')->name('product-detail-user');
Route::POST('/details/{id}', 'DetailController@AddCart')->name('add-cart');



// Route::POST('/callback', 'CartController@callback')->name('midtrans-callback');

Route::GET('/success', 'CartController@success')->name('success');
Route::GET('/register/success', 'CartController@register_success')->name('register-success');
Route::GET('/kuisioner', 'MarketController@kuisioner')->name('kuis');
Route::POST('/kuisioner', 'MarketController@Formkuisioner')->name('form-kuisioner');
Route::get('/thanks', 'MarketController@thanks')->name('thanks');
Route::get('/hasil-kuis','MarketController@dataKuis');


Route::group(['middleware' => ['auth']], function () {
    Route::DELETE('/cart/{id}', 'CartController@deleteCart')->name('delete-cart');
    Route::GET('/cart', 'CartController@index')->name('cart');
    Route::POST('/checkout', 'CheckoutController@proccess')->name('checkout');
    Route::GET('/Dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::POST('comentar-user','Admin\ProductController@comment')->name('commentar');
    Route::GET('/Dashboard-Product', 'Admin\ProductController@index')->name('dashboard-product');
    Route::GET('/Dashboard-Product/create', 'Admin\ProductController@create')->name('product-create');
    Route::POST('/Dashboard-Product/store', 'Admin\ProductController@store')->name('product-store');
    Route::GET('/Dashboard-Product/detail/{id}', 'Admin\ProductController@detail')->name('product-detail');
    Route::PUT('/Dashboard-Product/product/{id}', 'Admin\ProductController@update')->name('product-update');
    Route::POST('/Dashboard-Product/product-upload-gallery', 'Admin\ProductController@uploadGallery')->name('product-upload-gallery');
    Route::GET('/Dashboard-Product/product-galleries/{id}', 'Admin\ProductController@deleteGallery')->name('product-galery-delete');

    Route::GET('/Dashboard-Transaction', 'Admin\TransactionController@index')->name('dashboard-transaction');
    Route::GET('/Dashboard-Transaction/{id}', 'Admin\TransactionController@detail')->name('dashboard-transaction-detail');
    Route::POST('/Dashboard-Transaction/{id}', 'Admin\TransactionController@update')->name('dashboard-transaction-update');

    Route::GET('/Dashboard-Setting/store', 'Admin\SettingController@store')->name('dashboard-setting-store');
    Route::GET('/Dashboard-Setting/account', 'Admin\SettingController@account')->name('dashboard-setting-account');
    Route::POST('/Dashboard-Setting/update/{redirect}', 'Admin\SettingController@update')->name('dashboard-setting-update');
});
Route::prefix('Superadmin')
    ->namespace('SuperAdmin')
    ->middleware('auth')
    ->group(function () {
        Route::GET('/', 'DashboardController@index')->name('superadmin-dashboard');
        Route::RESOURCE('category', 'CategoryController');
        Route::RESOURCE('user', 'UserController');
        Route::RESOURCE('products', 'ProductController');
        Route::RESOURCE('product-gallery', 'ProductGalleryController');
        Route::RESOURCE('transaction-superadmin', 'TransactionController');
    });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
