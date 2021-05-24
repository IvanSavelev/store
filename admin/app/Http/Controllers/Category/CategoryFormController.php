<?php

namespace App\Http\Controllers\Category;


use App\Http\Controllers\Controller;
use App\Http\Helpers\Image\Image;
use App\Http\Helpers\Page\Page;
use App\Http\Helpers\Page\Completion;
use App\Http\Helpers\Page\PageStandard;
use App\Http\Helpers\Page\PageStandardField;
use App\Models\Category;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class CategoryFormController extends Controller
{


  use Completion;

  public function create()
  {

    $id_object = Category::getIdNext();
    Storage::disk('public')->deleteDirectory(Image::getPathImage(CategoryRoot::PATH_IMAGE, $id_object));

    $category = PageStandard::getFieldValueDefault();

    $page = new Page($this, $id_object);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(CategoryRoot::PATH_IMAGE, $id_object));
    return $this->viewPage('pages.category.category_form', $page, compact('category'));
  }


  public function store(Request $request)
  {
    $this->saveData($request);
    return $this->returnAddGood($request, 'category', 'Категория');
  }


  public function edit($id_object)
  {
    $category = Category::findOrFail($id_object);
    $page_standard_field = PageStandardField::getPageStandardField($category->id_page_standard_field);

    $page = new Page($this, $id_object);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(CategoryRoot::PATH_IMAGE, $id_object));
    return $this->viewPage('pages.category.category_form', $page, compact('category', 'page_standard_field'));
  }


  public function update(Request $request, $id_object)
  {
    $this->saveData($request);
    return $this->returnUpdateGood($request, 'category', 'Категория');
  }



  private function saveData(Request $request): void
  {
    Validator::make($request->all(), [
      'description' => '',
    ])->validate();
    $id_object = (int)$request->id_object;
    $category = Category::firstOrNew(['id_category' => $id_object]);
    $id_page_standard_field = PageStandardField::savePageStandardField($request, $category);
    $category->id_page_standard_field = $id_page_standard_field;
    $category->image = request('image', null);
    $category->description = request('description', '');
    $category->visible = $request->visible == 'on' ? 1 : 0;
    $category->save();
  }


}
