<?php
//Cash Clear
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $tCode = Artisan::call('config:clear');
    // return what you want
});



// Front Page .................
Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as'   => 'index'
]);

Route::get('/product/{id}', [
    'uses' => 'FrontEndController@singleProduct',
    'as'   => 'product.single'
]);


// Cart Routes ............................
Route::post('/cart/add', [
    'uses' => 'ShoppingController@addToCart',
    'as'   => 'cart.add'
]);

Route::get('/cart/rapid/add/{id}', [
    'uses' => 'ShoppingController@rapidAdd',
    'as'   => 'cart.rapid.add'
]);


Route::get('/cart', [
    'uses' => 'ShoppingController@cart',
    'as'   => 'cart'
]);

Route::get('/cart/inc/{id}/{qty}', [
    'uses' => 'ShoppingController@incriment',
    'as'   => 'cart.inc'
]);

Route::get('/cart/dec/{id}/{qty}', [
    'uses' => 'ShoppingController@decriment',
    'as'   => 'cart.dec'
]);

Route::get('/cart/delete/{id}', [
    'uses' => 'ShoppingController@cartDelete',
    'as'   => 'cart.delete'
]);

// Checkout Routes ........
Route::get('/cart/checkout', [
    'uses' => 'CheckoutController@index',
    'as'   => 'cart.checkout'
]);

Route::post('/cart/checkout', [
    'uses' => 'CheckoutController@pay',
    'as'   => 'cart.checkout'
]);


// Admin Pannel.....................
Route::resource('products', 'ProductsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
