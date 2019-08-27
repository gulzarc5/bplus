<?php

Route::group(['namespace'=> 'Web'], function(){

    Route::group(['namespace'=> 'Category'], function(){
        Route::get('/', 'CategoryController@index')->name('index_page');

        Route::get('Sub/Category/{first_id}', 'CategoryController@SecondCategory')->name('web.sub_category');
    });

     Route::group(['namespace'=> 'Product','prefix'=>'Product'], function(){
        Route::get('Sellers/{second_category}', 'ProductController@productSellerWithSecondCategory')->name('web.product_sellers');

        Route::get('/All/{seller_id}/{second_category}','ProductController@productView')->name('web.product_view');
        Route::get('/Details/{product_id}','ProductController@productDetails')->name('web.product_details');
     });

     Route::group(['namespace'=> 'Cart','prefix'=>'Cart'], function(){
        Route::post('Add', 'CartController@AddCart')->name('web.add_cart');
     });

     Route::group(['namespace'=> 'User','prefix'=>'User'], function(){
        Route::post('Add', 'UserController@userRegistration')->name('web.user_registration');
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



Route::get('product_details', function () {
    return view('web.product.product_details');
});


Route::get('seller_register', function () {
    return view('web.seller.seller_register');
});

Route::get('/user_login', function () {
    return view('web.user.user_login');
});

Route::get('/user_register', function () {
    return view('web.user.user_register');
});

Route::get('/my_profile', function () {
    return view('web.profile.my_profile');
});

Route::get('/forgot_password', function () {
    return view('web.profile.forgot_password');
});
Route::get('/shopping_cart', function () {
    return view('web.shopping_cart');
});

Route::get('/order_history', function () {
    return view('web.order_history');
});