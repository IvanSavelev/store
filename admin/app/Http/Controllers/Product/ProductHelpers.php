<?php


namespace App\Http\Controllers\Product;


use App\Http\Helpers\Image\Image;
use App\Http\Helpers\Page\PageStandardField;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

use App\Models\ProductToCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

trait ProductHelpers
{

  /**
   * Returns the path to the first image
   *
   * @param $id_product int
   *
   * @return string|null - path to image first
   */
  public function getImageLoad(int $id_product):?string
  {
    $flight = ProductImage::where('id_product', $id_product)->orderBy('sort_order', 'asc')->value('image');
    return $flight;
  }


  /**
   * Update first image for product
   * @param $id_object
   */
  public function updateImage(int $id_object):void
  {
    $image = $this->getImageLoad($id_object);
    $product = Product::find($id_object);
    if(!$product) {
      return;
    }
    $product->image = $image;
    $product->save();
  }


  private function saveData(Request $request, string $type_add_or_update = 'update'): void
  {
    $id_object = (int)$request->id_object;
    $product = Product::firstOrNew(['id_product' => $id_object]);
    if ($type_add_or_update === 'add') {
      $model_validate = ['required', 'max:255', Rule::unique('products')];
    } else {
      $model_validate = ['required', 'max:255', Rule::unique('products')->ignore($product)];
    }

    Validator::make($request->all(), [
      'model' => $model_validate,
      'price' => 'required|max:14|regex:/^[ 0-9]+(\.[0-9]+)?$/',
      'description' => '',
    ])->validate();

    $id_page_standard_field = PageStandardField::savePageStandardField($request, $product);
    $product->id_page_standard_field = $id_page_standard_field;
    $product->model = $request->model;
    $product->image = $this->getImageLoad($id_object);
    $product->price = str_replace(' ', '', $request->price);
    $product->description = request('description', '');
    $product->visible = $request->visible == 'on' ? 1 : 0;
    $product->save();
  }


  private function saveProductToCategory(Request $request): void
	{
	  $id_object = (int)$request->id_object;
		ProductToCategory::where('id_product', $id_object)->delete();
		foreach (request('product_to_category', []) as $key => $item) {
			$product_to_category = new ProductToCategory();
			$product_to_category->id_product = $id_object;
			$product_to_category->id_category = (int)$key;
			$product_to_category->save();
		}
	}



  private function getCategoryList(Product $product = null):array
  {
    $id_product_category_cat = [];
    if($product) {
      $product_category = $product->category->toArray();
      $id_product_category_cat = Arr::pluck($product_category, 'id_category');
    }
    $category =
      Category::leftJoin('pages_standard_field', 'pages_standard_field.id_page_standard_field', '=', 'category.id_page_standard_field')
      ->select('category.id_category', 'pages_standard_field.title')
      ->get()->toArray();
    $category_key_norm = [];
    foreach ($category as $key => $item) {
      $category_key_norm[] = [
        'id' => $item['id_category'],
        'name' => $item['title'],
        'checked' => in_array($item['id_category'], $id_product_category_cat),
      ];
    }
    return $category_key_norm;
	}

  private function deleteImageAfterBadAdd(int $id_object):void
  {
    ProductImage::where('id_product', $id_object)->delete(); //Clear image artifact
    Storage::disk('public')->deleteDirectory(Image::getPathImage(ProductRoot::PATH_IMAGE, $id_object) . '/');
	}
}
