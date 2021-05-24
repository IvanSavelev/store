<?php
Route::get('', 'Dashboard\DashboardController@index')->name('dashboard')->middleware(['auth']); //Page Dashboard
