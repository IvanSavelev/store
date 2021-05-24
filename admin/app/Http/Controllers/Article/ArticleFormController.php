<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Category\CategoryRoot;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Image\Image;
use App\Http\Helpers\Page\Page;
use App\Http\Helpers\Page\Completion;

use App\Http\Helpers\Page\PageStandard;
use App\Http\Helpers\Page\PageStandardField;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ArticleFormController extends Controller
{



  use Completion;



  public function create()
  {
    $id_object = Article::getIdNext();

    Storage::disk('public')->deleteDirectory(Image::getPathImage(ArticleRoot::PATH_IMAGE, $id_object));

    $page = new Page($this, $id_object);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(ArticleRoot::PATH_IMAGE, $id_object));
    $article = PageStandard::getFieldValueDefault();
    return $this->viewPage('pages.article.article_form', $page, compact('article'));
  }


  public function store(Request $request)
  {
    $this->saveData($request);
    return $this->returnAddGood($request, 'article', 'Статья');
  }


  public function edit($id_object)
  {
    $article = Article::findOrFail($id_object);
    $page_standard_field = PageStandardField::getPageStandardField($article->id_page_standard_field);

    $page = new Page($this, $id_object);
    $page->setType('normal');
    $page->setObjectPathImage(Image::getPathImage(ArticleRoot::PATH_IMAGE, $id_object));
    return $this->viewPage('pages.article.article_form', $page, compact('article', 'page_standard_field'));
  }


  public function update(Request $request, $id_object)
  {
    $this->saveData($request);
    return $this->returnUpdateGood($request, 'article', 'Статьи');
  }



  private function saveData(Request $request): void
  {
    Validator::make($request->all(), [
      'image' => '',
      'description' => '',
      'visible' => '',
      'date' => 'date|nullable',
    ])->validate();
    $id_object = (int)$request->id_object;
    $article = Article::firstOrNew(['id_article' => $id_object]);
    $id_page_standard_field = PageStandardField::savePageStandardField($request, $article);
    $article->id_page_standard_field = $id_page_standard_field;
    $article->image = request('image', null);
    $article->description = request('description', '');
    $article->visible = $request->visible == 'on' ? 1 : 0;
    $article->date = request('date', null);
    $article->save();
  }



}
