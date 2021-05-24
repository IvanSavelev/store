@extends('basis.basis_page_root')
@section('content')
  @include('components.elements.breadcrumbs', ['parents' => [], 'name' => 'Статьи'])
  @include('components.elements.list_top_buttons', ['add' => ['url' => route('article.create')], 'destroy' => ['url' => route('article.destroy')]])

  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Категории</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-auto">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Изображение</th>
                  <th>Имя</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @forelse($article as $article_item)
                <tr class="@if(!$article_item->visible) opticy-50 @endif">
                  <td class="w-50px custom-checkbox pl-4-5">
                    <input type="checkbox" class="custom-control-input" for="{{ $article_item->id_article }}" id="{{ $article_item->id_article }}" data-id="{{ $article_item->id_article }}">
                    <label class="custom-control-label" for="{{ $article_item->id_article }}">{{ $article_item->id_article }}</label>
                  </td>
                  <td>
                    <img class="mxw-200px mxh-200px c-avatar__img" src="<x-helpers.image-show :path='@$article_item->image'/>" alt="{{ $article_item->title }}">
                  </td>
                  <td>{{ $article_item->title }}</td>
                  <td>
                    <a href="{{ route ('article.edit', $article_item->id_article) }}" class="btn btn-primary btn-icon-split">
                      <span class="icon">
                        <i class="fas fa-arrow-right"></i>
                      </span>
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6"><p class="">Нет категорий.</p></td>
                </tr>
              @endforelse
              </tbody>
            </table>
                @include('components.elements.paginator', ['objects' => $article])
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection