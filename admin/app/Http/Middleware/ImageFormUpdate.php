<?php

namespace App\Http\Middleware;

use App\Http\Helpers\Middleware\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageFormUpdate
{
  use Middleware;

  /**
   * Handle an incoming request.
   *
   * @param \Illuminate\Http\Request $request
   * @param \Closure $next
   *
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $response = $next($request);
    //All make after success complite
    $session_var = $request->session()->all();
    if(empty($session_var['errors'])) {
      $this->deleteImageUnnecessary($request);
    }
    return $response;

  }

  /**
   * Call if success save, delete unnecessary, not paste in BD
   * @param Request $request
   */
  private function deleteImageUnnecessary(Request $request)
  {
    $image_inputs = $this->getInput($request, request('elements_image_list', false));
    $elements_image_path = $this->updateImagePath($image_inputs);
    $this->deleteFiles($elements_image_path);
  }

  private function updateImagePath(array $image_inputs):array
  {
    foreach ($image_inputs as $key => &$item) {
      $item = preg_replace('/^\/storage\//', '', $item);
    }
    return $image_inputs;
  }

  private function deleteFiles(array $elements_image_path):void
  {
    foreach ($elements_image_path as $name => $path) {
      $path_folder = request('object_path_image', '') . '/' . $name;
      $files = Storage::disk('public')->files($path_folder);
      foreach ($files as $key => $path_file) {
        //Delete unwanted image
        if ($path !== $path_file) {
          Storage::disk('public')->delete($path_file);
        }
      }
    }
  }
}
