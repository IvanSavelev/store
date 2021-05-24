<?php


namespace App\Http\Controllers\General;
use App\Http\Helpers\Image\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralController
{

  public function saveImage(Request $request)
  {
    $path = '';
    if ($request->file('image')->isValid()) {
      $file = $request->image->getClientOriginalName();
      $filename = pathinfo($file, PATHINFO_FILENAME);
      $filename = Str::slug($filename, '-'); //Translator
      $extension = $request->image->extension();
      $image_name = $filename . '.' . time() . '.' . $extension;
      $path_directory = $this->getPathImage($request);
      $path = $request->image->storeAs($path_directory, $image_name, 'public');
      $path = '/storage/' . $path;
    }
   return $path;
  }


  private function getPathImage(Request $request):string
  {
    $object_path_image = $request->input('object_path_image', '');
    $path_image = $request->input('path_image_save', '');
    $path_directory = ($object_path_image? '/' . $object_path_image:'') .($path_image? '/' .$path_image  :'');
    return $path_directory;
  }


  /**
   * Only return plug
   * @param Request $request
   *
   * @return string
   */
  public function deleteImage(Request $request)
  {
    $path = Image::getPlug72();
    return $path;
  }


  /**
   * Save image for Wysiwyg
   * @param Request $request
   *
   * @return string
   */
  public function saveImageForWysiwyg(Request $request)
  {
    $path = '';
    if ($request->file('image')->isValid()) {
      $file = $request->image->getClientOriginalName();
      $filename = pathinfo($file, PATHINFO_FILENAME);//впыодло
      $filename = Str::slug($filename, '-'); //Translator
      $extension = $request->image->extension();
      $image_name = $filename . '.' . time() . '.' . $extension;

      $path_directory = $this->getPathImageForWysiwyg($request);

      $path = $request->image->storeAs(Image::PATH_IMAGE_DIRECTORY . '/for_visivig' . $path_directory, $image_name, 'public');
      $path = '/storage/' . $path;
    }
    return $path;
  }

  private function getPathImageForWysiwyg(Request $request):string
  {
    $object_type= $request->input('object_type', '');
    $object_id= $request->input('object_id', '');
    $path_image = $request->input('path_image', '');
    $path_directory = ($object_type? '/' . $object_type:'') . ($object_id? '/' . $object_id:'') .($path_image? '/' .$path_image  :'');
    return $path_directory;
  }

}