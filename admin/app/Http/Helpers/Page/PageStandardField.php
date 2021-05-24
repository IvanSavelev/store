<?php


namespace App\Http\Helpers\Page;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageStandardField
{


  public static function savePageStandardField(Request $request, Model $object): int
  {
    Validator::make($request->all(), [
      'title' => 'required|max:255',
      'h1' => 'max:255',
      'meta_title' => 'max:255',
      'meta_description' => 'max:255',
    ])->validate();
    $id_page_standard_field = $object->id_page_standard_field;
    if ($id_page_standard_field) {
      $page_standard_field = \App\Models\PageStandardField::firstOrNew(['id_page_standard_field' => $id_page_standard_field]);
    } else {
      $page_standard_field = new \App\Models\PageStandardField;
    }

    $page_standard_field->title = $request->title;
    $page_standard_field->h1 = request('h1', '');
    $page_standard_field->meta_title = request('meta_title', '');
    $page_standard_field->meta_description = request('meta_description', '');
    $page_standard_field->save();
    $id = $page_standard_field->id_page_standard_field;
    return $id;
  }

  public static function deletePageStandardField(Model $object): void
  {
    if (!isset($object->id_page_standard_field)) {
      throw new Exception('id_page_standard_field must be in model!');
    }
    $id_page_standard_field = \App\Models\PageStandardField::where('id_page_standard_field', (int)$object->id_page_standard_field);
    $id_page_standard_field->delete();
  }

  public static function getPageStandardField($id_page_standard_field): Model
  {
    $page_standard_field = \App\Models\PageStandardField::firstOrNew(['id_page_standard_field' => $id_page_standard_field]);
    return $page_standard_field;
  }
}