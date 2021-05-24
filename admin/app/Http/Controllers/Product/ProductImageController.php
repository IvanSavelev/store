<?php

namespace App\Http\Controllers\Product;


use App\Http\Helpers\Image\Image;
use App\Models\Product;
use App\Models\ProductImage;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductImageController extends Controller
{

  use ProductHelpers;

  /**
   * Add image for product
   *
   * @param Request $request
   *
   * @return array
   */
  public function addImage(Request $request)
  {
    if ($request->file('image')->isValid()) {
      $image_file = $request->image->getClientOriginalName();
      $image_filename = pathinfo($image_file, PATHINFO_FILENAME);
      $image_filename = Str::slug($image_filename, '-'); //Translator
      $image_extension = $request->image->extension();
      $image_name = $image_filename . '.' . time() . '.' . $image_extension;

      $id_object = (int)$request->input('id_object');
      $object_path_image = $request->input('object_path_image');

      $path = $request->image->storeAs($object_path_image, $image_name, 'public');
      $path = '/storage/' . $path;
      $id_product_image = (int)$request->input('id_product_image');
      if ($id_product_image) {
        //Update
        $this->_deleteImage($id_product_image, false);
        ProductImage::updateOrCreate(['id_product_image' => $id_product_image], ['image' => $path]);
        return ['src' => $path];
      } else {
        //New
        $sort_order_max = DB::table('products_image')->where('id_product', (int)$id_object)->max('sort_order');
        $id_product_image = DB::table('products_image')->insertGetId([
          'id_product' => $id_object,
          'image' => $path,
          'sort_order' => $sort_order_max + 1,
        ]);
        //Added first image, it is root image
        if ($sort_order_max === 0) {
          ProductHelpers::updateImage($id_object);
        }
        return ['src' => $path, 'key' => $id_product_image];
      }
    }
  }


  /**
   * Delete image for product
   *
   * @param Request $request
   *
   * @return string
   */
  public function deleteImage(Request $request):void
  {
    $delete_key = (int)$request->input('id_product_image');
    $id_object = (int)$request->input('id_object');
    $this->_deleteImage($delete_key);
    $this->updateImage($id_object);
  }

  private function _deleteImage(int $id_product_image, $delete_bd = true):void
  {
    //Delete image
    $dump_pr = ProductImage::where('id_product_image', $id_product_image)->first();
    $image = \str_replace('/storage/', '', $dump_pr->image);
    Storage::disk('public')->delete($image);
    //Delete sql field
    if ($delete_bd) {
      $dump_pr = ProductImage::where('id_product_image', $id_product_image)->first();
      $dump_pr->delete();
    }
  }


  public function sortImage(Request $request)
  {
    $ids_product_image = $request->input('ids_product_image');
    $ids_product_image = explode(',', $ids_product_image);

    $product_image = ProductImage::whereIn('id_product_image', $ids_product_image)->get();
    $arr_product_image = $product_image->keyBy('id_product_image')->all();

    $ids_product_image_flip = array_flip($ids_product_image);
    uksort($arr_product_image, function ($a, $b) use ($ids_product_image_flip) {
      return $ids_product_image_flip[$a] - $ids_product_image_flip[$b];
    });
    $arr_product_image = array_values($arr_product_image);
    $first_image = null;
    foreach ($arr_product_image as $key => $item) {
      if ($key === 0 and $item->sort_order !== 0) {
        $first_image = $item->id_product_image;
      }
      if ($item->sort_order !== $key) {
        $item->sort_order = $key;
        $item->save();
      }
    }
    //Change first image for product
    if ($first_image !== null) {
      $id_object = (int)$request->input('id_object');
      $this->updateImage($id_object);
    }
  }


}
