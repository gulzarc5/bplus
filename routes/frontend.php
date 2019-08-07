<?php

Route::group(['namespace'=> 'Web/Category'], function(){
    Route::get('/', function () {
        return view('web.index');
    });
});


Route::get('/about_us', function () {
    return view('web.about_us');
});
Route::get('/contact_us', function () {
    return view('web.contact_us');
});
Route::get('/contact_us', function () {
    return view('web.contact_us');
});
Route::get('chat_history', function () {
    return view('web.chat.chat_history');
});
Route::get('chat', function () {
    return view('web.chat.chat');
});
Route::get('product_category', function () {
    return view('web.product.product_category');
});
Route::get('product_subcategory', function () {
    return view('web.product.product_subcategory');
});
Route::get('product_saller', function () {
    return view('web.product.product_saller');
});
Route::get('product_details', function () {
    return view('web.product.product_details');
});


Route::get('seller_register', function () {
    return view('web.seller.seller_register');
});