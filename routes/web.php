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


//Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {

    Voyager::routes();

    Route::get('/products_in_order/{id}', 'Voyager\VoyagerOrderProductsController@orderingProducts');
    Route::get('/cash_orderings', 'Voyager\VoyagerCashProductsController@cashProducts');


});


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'IndexController@index')->name('home');

    Auth::routes();

    Route::get('/about', 'AboutController@index')->name('about');

    Route::get('/service', 'ServiceController@index')->name('service');

    Route::get('/blog', 'BlogController@index')->name('blog');

    Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');

    Route::get('/shop', 'ShopController@index')->name('shop');

    Route::post('/shop_cart', 'ShopController@shop_cart')->name('shop_cart');

    Route::get('/contact', 'ContactController@index')->name('contact');

    Route::get('/product_order', 'ShopController@product_order')->name('product_order');

    Route::get('/product/{id}', 'ProductController@product');

    Route::get('/products/{id}', 'ProductController@product_category')->name('products_category');;

    Route::post('/ordering', 'ShopController@ordering');

    Route::get('/ordering_cart', 'ShopController@ordering_cart')->name('ordering_cart');

    Route::post('/product-add/{id}', 'ProductController@product_add');

    Route::post('/shop_cart_quantity', 'ShopController@shop_cart_quantity');

    Route::post('/idram_paymant_fail', 'PaymentController@idram_paymant_fail');

    Route::post('/idram_payment_success', 'PaymentController@idram_payment_success');

    Route::post('/idram_paymant_result', 'PaymentController@idram_paymant_result');

    Route::get('/search', 'ProductController@search');

    Route::get('/profile', 'MyProfileController@index');

    Route::post('/profile', 'MyProfileController@store');

    Route::post('/delete_ordered_product', 'ProductController@delete_ordered_product');

    Route::get('/auth/{provider}', 'Auth\RegisterController@redirectToProvider');
    Route::get('/auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

});
