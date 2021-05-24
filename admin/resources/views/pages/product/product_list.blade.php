
@extends('basis.basis_page_root')
@section('content')
  @include('components.elements.breadcrumbs', ['parents' => [], 'name' => 'Товары'])
  @include('components.elements.list_top_buttons', ['add' => ['url' => route('product.create')], 'destroy' => ['url' => route('product.destroy')]])

  <div class="row">
    <div class="col-12">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Продукты</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive overflow-auto">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Изображение</th>
                  <th>Имя</th>
                  <th>Модель</th>
                  <th>Цена</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @forelse($products as $product)
              <tr class="@if(!$product->visible) opticy-50 @endif">
                <td class="w-50px custom-checkbox pl-4-5">
                  <input type="checkbox" class="custom-control-input" for="{{ $product->id_product }}" id="{{ $product->id_product }}" data-id="{{ $product->id_product }}">
                  <label class="custom-control-label" for="{{ $product->id_product }}">{{ $product->id_product }}</label>
                </td>
                <td>
                  <img class="mxw-200px mxh-200px c-avatar__img" src="<x-helpers.image-show :path='@$product->image'/>" alt="{{ $product->title }}">
                </td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ number_format($product->price, 2, '.', ' ') }}</td>
                <td>
                  <a href="{{ route ('product.edit', $product->id_product) }}" class="btn btn-primary btn-icon-split">
                    <span class="icon">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                  </a>
                </td>
              </tr>
              @empty
                <tr>
                  <td colspan="6"><p class="">Нет товаров.</p></td>
                </tr>
              @endforelse
              </tbody>
            </table>
                @include('components.elements.paginator', ['objects' => $products])
          </div>
        </div>
      </div>



    </div>
  </div>


@endsection
