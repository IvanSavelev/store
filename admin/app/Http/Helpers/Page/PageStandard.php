<?php


namespace App\Http\Helpers\Page;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageStandard
{

  public static function getFieldValueDefault()
  {
    return (new class {
      public $visible = true;
    });
  }


  public static function destroy(Request $request, Model $model, string $name_id_auto_increment)
  {
    $ids_delete = self::getIdsDelete($request);
    $object_path_image = self::getObjectPathImage($request);
    self::deletePageStandardFields($ids_delete, $model, $name_id_auto_increment);
    self::deleteObject($ids_delete, $model, $name_id_auto_increment);
    self::deleteImageDirectories($ids_delete, $object_path_image);
  }


  private static function getIdsDelete(Request $request): array
  {
    $ids_delete = $request->input('ids_delete');
    $ids_delete = explode(',', $ids_delete);
    return $ids_delete;
  }


  private static function getObjectPathImage(Request $request): string
  {
    $object_path_image = $request->input('object_path_image');
    return $object_path_image;
  }


  private static function deletePageStandardFields(array $ids_delete, Model $model, string $name_id_auto_increment): void
  {
    $category = $model::whereIn($name_id_auto_increment, $ids_delete)->cursor();
    foreach ($category as $category_item) {
      PageStandardField::deletePageStandardField($category_item);
    }
  }


  private static function deleteObject(array $ids_delete, Model $model, string $name_id_auto_increment): void
  {
    $model::whereIn($name_id_auto_increment, $ids_delete)->delete();
  }


  private static function deleteImageDirectories(array $ids_delete, string $object_path_image): void
  {
    foreach ($ids_delete as $item) {
      Storage::disk('public')->deleteDirectory($object_path_image . '/' . $item);
    }
  }
}