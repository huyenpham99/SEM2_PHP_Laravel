<?php
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get("/category/{category:slug}", "HomeController@category");
Route::get("/product/{product:slug}", "HomeController@product");
Route::post("/cart/add/{product}", "HomeController@addToCart");
Route::get("/shopping-cart", "HomeController@shoppingCart");
Route::get("/check-out", "HomeController@checkout") ->middleware("auth");;



