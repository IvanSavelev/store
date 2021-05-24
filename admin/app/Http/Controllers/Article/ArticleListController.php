<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Page\Page;
use App\Http\Helpers\Page\PageStandard;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleListController extends Controller
{
  public function index()
  {
    $article = Article::leftJoin('pages_standard_field', 'pages_standard_field.id_page_standard_field', '=', 'articles.id_page_standard_field')->paginate(50);
    $page = new Page($this);
    $page->setType('normal');
    return $this->viewPage('pages.article.article_list', $page, compact('article'));
  }

  public function destroy(Request $request)
  {
    PageStandard::destroy($request, new Article, 'id_article');
  }
}
