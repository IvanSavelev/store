<?php
Route::middleware(['web','auth'])->group(function() {
  Route::fallback(function () { return redirect()->route('dashboard');});
});

Route::middleware(['web'])->group(function() {
	Route::fallback(function () { return redirect()->route('auth.login');});
});

Route::post('general/save_image_for_wysiwyg', 'General\GeneralController@saveImageForWysiwyg')->middleware(['auth']);; //Insert image in Wysiwyg
Route::post('general/save_image', 'General\GeneralController@saveImage')->middleware(['auth']);; //Insert image field standard
Route::post('general/delete_image', 'General\GeneralController@deleteImage')->middleware(['auth']);; //Delete image field standard
