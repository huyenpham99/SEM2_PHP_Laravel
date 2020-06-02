<?php
Route::get('/', 'Webcontroller@dashboard');
Route::get('/list-category', 'CategoryController@listCategory');
Route::get('/new-category', 'CategoryController@newCategory');
Route::post('/save-category', 'CategoryController@saveCategory');
Route::get("/edit-category/{id}", "CategoryController@editCategory");
Route::put("/update-category/{id}", "CategoryController@updateCategory"); //cap nhat du lieu
Route::delete("/delete-category/{id}", "CategoryController@deleteCategory");


//Brand
Route::get('/list-brand', 'BrandController@listBrand');
Route::get('/new-brand', 'BrandController@newBrand');
Route::post('/save-brand', 'BrandController@saveBrand');
Route::get("/edit-brand/{id}", "BrandController@editBrand");
Route::put("/update-brand/{id}", "BrandController@updateBrand"); //cap nhat du lieu
Route::delete("/delete-brand/{id}", "BrandController@deleteBrand");


//Product
Route::get('/list-product', 'ProductController@listProduct');
Route::get('/new-product', 'ProductController@newProduct');
Route::post('/save-product', 'ProductController@saveProduct');
Route::get("/edit-product/{id}", "ProductController@editProduct");
Route::put("/update-product/{id}", "ProductController@updateProduct"); //cap nhat du lieu
Route::delete("/delete-product/{id}", "ProductController@deleteProduct");
