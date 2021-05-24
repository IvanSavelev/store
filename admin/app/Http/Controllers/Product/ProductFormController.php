<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Image\Image;
use App\Http\Helpers\Page\Page;
use App\Http\Helpers\Page\Completion;
use App\Http\Helpers\Page\PageStandard;
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

class ProductFormController extends Controller
{

  use Completion;
  use ProductHelpers;


  public function create()
  {
    $id_object = Product::getIdNext();
    $product_to_category = $this->getCategoryList();

    $this->deleteImageAfterBadAdd($id_object);

    $product = PageStandard::getFieldValueDefault();

    $page = new Page($this, $id_object);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(ProductRoot::PATH_IMAGE, $id_object));
    return $this->viewPage('pages.product.product_form', $page, compact('product', 'product_to_category'));
  }



  public function store(Request $request)
  {
    $this->save($request, 'add');
    return $this->returnAddGood($request, 'product', 'Продукт');
  }

  public function edit(int $id_product)
  {
    $product_image = ProductImage::where('id_product', $id_product)->orderBy('sort_order')->get();
    $product = Product::findOrFail($id_product);
    $product_to_category = $this->getCategoryList($product);
    $page_standard_field = PageStandardField::getPageStandardField($product->id_page_standard_field);

    $page = new Page($this, $id_product);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(ProductRoot::PATH_IMAGE, $id_product));
    return $this->viewPage('pages.product.product_form', $page, compact('product_image', 'product', 'product_to_category', 'page_standard_field'));
  }

  public function update(Request $request)
  {
    $this->save($request, 'update');
    return $this->returnUpdateGood($request, 'product', 'Продукт');
  }


  private function save(Request $request, string $type_add_or_update = 'update'): void
  {
    $this->saveData($request, $type_add_or_update);
    $this->saveProductToCategory($request);
  }
}
