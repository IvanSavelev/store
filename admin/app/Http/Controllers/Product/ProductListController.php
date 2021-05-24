<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Image\Image;
use App\Http\Helpers\Page\Page;
use App\Http\Helpers\Page\PageStandard;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductListController extends Controller
{

  public function index()
  {
    $products = Product::leftJoin('pages_standard_field', 'pages_standard_field.id_page_standard_field', '=', 'products.id_page_standard_field')->paginate(50);
    $page = new Page($this);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(ProductRoot::PATH_IMAGE));
    return $this->viewPage('pages.product.product_list', $page, compact('products'));
  }


  public function destroy(Request $request)
  {
    PageStandard::destroy($request, new Product, 'id_product');
  }
}
