<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Page\Page;
use App\Http\Helpers\Page\PageStandard;
use App\Models\Category;
use App\Models\PageStandardField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryListController extends Controller
{


  public function index()
  {
    $category = Category::leftJoin('pages_standard_field', 'pages_standard_field.id_page_standard_field', '=', 'category.id_page_standard_field')->paginate(50);

    $page = new Page($this);
    $page->setType('normal');
    return $this->viewPage('pages.category.category_list', $page, compact('category'));
  }

  public function destroy(Request $request)
  {
    PageStandard::destroy($request, new Category, 'id_category');
  }
}
