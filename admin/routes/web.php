<?php

//Include code from the web folder and all its subfolders
requireOnce(__DIR__ . '/web');
function requireOnce($path)
{
  $path .= '/*';
  foreach (glob($path) as $router_files) {
    if (is_dir($router_files)) {
      requireOnce($router_files);
      continue;
    }
    require_once $router_files;
  }
}

/**
 * Custom CRUD routs
 * @param $name_resourse
 * @param $name_controller
 */
function resourse($name_resourse,  $name_controller_list, $name_controller_form) {
  Route::match(['get', 'head'], $name_resourse. '/list', $name_controller_list . '@index')->name($name_resourse . '.index')->middleware(['auth']);
  Route::post($name_resourse . '/destroy', $name_controller_list . '@destroy')->name($name_resourse . '.destroy')->middleware(['auth']);

  Route::match(['get', 'head'], $name_resourse . '/create', $name_controller_form . '@create')->name($name_resourse . '.create')->middleware(['auth']);
  Route::post($name_resourse, $name_controller_form . '@store')->name($name_resourse . '.store')->middleware(['image.form.update', 'date_and_time.form.update', 'auth']);
  Route::match(['get', 'head'], $name_resourse . '/{' . $name_resourse . '}/edit', $name_controller_form . '@edit')->name($name_resourse . '.edit')->middleware(['auth']);
  Route::match(['put', 'patch'], $name_resourse . '/{' . $name_resourse . '}', $name_controller_form . '@update')->name($name_resourse . '.update')->middleware(['image.form.update', 'date_and_time.form.update', 'auth']);
}





