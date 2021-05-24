<?php
resourse('product', 'Product\ProductListController', 'Product\ProductFormController');
Route::post('product/add_image', 'Product\ProductImageController@addImage')->name('product.add_image')->middleware(['auth']);
Route::post('product/delete_image', 'Product\ProductImageController@deleteImage')->name('product.delete_image')->middleware(['auth']);
Route::post('product/sort_image', 'Product\ProductImageController@sortImage')->name('product.sort_image')->middleware(['auth']);
