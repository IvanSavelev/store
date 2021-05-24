<?php


namespace App\Http\Helpers\Image;


class Image
{
  const PATH_IMAGE_DIRECTORY = 'images';
  public static function getPlug72()
  {
    return '/img/72.png';
  }

  public static function getPathImage($name_type, $id = null)
  {
    return self::PATH_IMAGE_DIRECTORY . '/' . $name_type . ($id?'/' . $id:'');
  }
}