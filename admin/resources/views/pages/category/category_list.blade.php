@extends('basis.basis_page_root')
@section('content')
  @include('components.elements.breadcrumbs', ['parents' => [], 'name' => 'Категории'])
  @include('components.elements.list_top_buttons', ['add' => ['url' => route('category.create')], 'destroy' => ['url' => route('category.destroy')]])

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
              @forelse($category as $category_item)
                <tr class="@if(!$category_item->visible) opticy-50 @endif">
                  <td class="w-50px custom-checkbox pl-4-5">
                    <input type="checkbox" class="custom-control-input" for="{{ $category_item->id_category }}" id="{{ $category_item->id_category }}" data-id="{{ $category_item->id_category }}">
                    <label class="custom-control-label" for="{{ $category_item->id_category }}">{{ $category_item->id_category }}</label>
                  </td>
                  <td>
                    <img class="mxw-200px mxh-200px c-avatar__img" src="<x-helpers.image-show :path='@$category_item->image'/>" alt="{{ $category_item->title }}">
                  </td>
                  <td>{{ $category_item->title }}</td>
                  <td>
                    <a href="{{ route ('category.edit', $category_item->id_category) }}" class="btn btn-primary btn-icon-split">
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
                @include('components.elements.paginator', ['objects' => $category])
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection