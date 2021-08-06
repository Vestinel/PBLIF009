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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/details/{id?}', 'DetailController@index')->name('detail');
Route::post('/details/{id?}', 'DetailController@add')->name('detail-add');

Route::get('/success', 'CartController@success')->name('success');

Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');


Route::get('/troubleshoot', 'TroubleshootController@index')->name('home-troubleshoot');
Route::get('/troubleshoot/categories', 'TroubleshootCategoriesController@index')->name('categories-troubleshoot');
Route::get('/troubleshoot/categories/{id}', 'TroubleshootCategoriesController@detail')->name('categories-detail-troubleshoot');

Route::get('/troubleshoot/details/{id?}', 'TroubleshootDetailController@index')->name('detail-troubleshoot');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/details/qr/{id?}', 'DetailController@addByQr')->name('detail-add-qr');

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')->name('cart-delete');

    Route::post('/checkout', 'CheckoutController@process')->name('checkout');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-products');
    Route::get('/dashboard/products/{id}', 'DashboardProductController@details')->name('dashboard-products-details');
    Route::get('/dashboard/products/create', 'DashboardProductController@create')->name('dashboard-products-create');

    Route::get('/dashboard/transactions', 'DashboardTransactionController@index')->name('dashboard-transactions');
    Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@details')->name('dashboard-transactions-details');



    Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-settings-store');
    Route::get('/dashboard/account', 'DashboardSettingController@account')->name('dashboard-settings-account');

});

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('admin-dashboard');
        Route::resource('category','CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
        Route::resource('transactions', 'TransactionsController');


        Route::resource('troubleshoot-category','TroubleshootCategoriesController');
        Route::resource('troubleshoot-article', 'TroubleshootController');
        Route::resource('troubleshoot-gallery-article', 'TroubleshootGalleryController');
    });

Auth::routes();
