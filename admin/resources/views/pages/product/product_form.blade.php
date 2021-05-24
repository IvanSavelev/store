@extends('basis.basis_page_root')
@section('content')
  @include('components.elements.breadcrumbs', ['parents' => [['url' => route('product.index'), 'name' => 'Товары']], 'name' => 'Товар'])
  <div class="row">
    <div class="col-12">
      <form enctype="multipart/form-data" action="{{ ($product ?? false)?route ('product.update', $page_settings->getObjectId()):route ('product.store') }}" method="POST">
        @csrf
        @if(@$product)
          @method('PUT')
        @endif

        <!--- 1 TAB --->
        <div class="card shadow mb-4">
          <a href="#nav-general-tab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">Основные настройки</h6>
          </a>
          <div class="collapse show" id="nav-general-tab" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <x-form-elements.text label="Имя" name='title' required=true :value='@$page_standard_field->title' :errors=$errors/>
                  <x-form-elements.text label="h1" name='h1'  :value='@$page_standard_field->h1' :errors=$errors/>
                  <x-form-elements.text label="Модель" name='model' required=true :value='@$product->model' :errors=$errors/>
                  <x-form-elements.price label="Цена" name='price' required=true :value='@$product->price' :errors=$errors/>
                  <x-form-elements.textarea-vis label="Описание" name='description' path_image='description' :value='@$product->description'  :errors=$errors/>
                  <x-form-elements.checkbox-simple label="Видимость" name='visible' :value='@$product->visible'  :errors=$errors/>
                  <x-form-elements.list-checkbox label="Категории" name='product_to_category' :value='@$product_to_category'  :errors=$errors/>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--- 2 TAB --->
        <div class="card shadow mb-4">
          <a href="#nav-seo-tab" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <h6 class="m-0 font-weight-bold text-primary">СЕО настройки</h6>
          </a>
          <div class="collapse show" id="nav-seo-tab" style="">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <x-form-elements.text label="Meta title" name='meta_title' :value='@$page_standard_field->meta_title' :errors=$errors/>
                  <x-form-elements.textarea label="Meta описание" name='meta_description' :value='@$page_standard_field->meta_description' :errors=$errors/>
                </div>
              </div>
            </div>
          </div>
        </div>

         <!--- 3 TAB --->
        <div class="card shadow mb-4">
          <a href="#nav-image" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
            <div class="row">
              <div class="col-md-12">
                <span class="m-0 font-weight-bold text-primary">Изображения</span>
              </div>
              <div class="col-md-12">
                <span>(изменения сразу вступают в силу)</span>
              </div>
            </div>
          </a>
          <div class="collapse show" id="nav-image" style="">
            <div class="card-body mx-3">

              <div class="row"  data-draggable="parent" data-product_image="list">
                @isset($product_image)
                  @foreach ($product_image as $item)
                    @include('pages.product.product_image', ['object' => $item, 'key' => $item->id_product_image, 'delete_key' => true, 'draggable' => true])
                  @endforeach
                @endisset
              </div>
              <div class="row" data-product_image="root">
                @include('pages.product.product_image', ['class' => 'd-none', 'attribute' => 'data-product_image="layout"', 'key' => 'new', 'delete_key' => true, 'draggable' => true]) {{-- hide leyout--}}
                @include('pages.product.product_image', ['key' => 'add_new', 'draggable' => false])
              </div>

            </div>
          </div>
        </div>

        @include('components.elements.form_bottom_buttons', [])
      </form>
      </div>
  </div>

@endsection
@section('script_down')
  <script>

    $(document).ready(function () {
      //Add/update image
      $('input[data-type=image_product]').change(function () {
        //console.log('Add/update image');
        file = this.files;
        productAddImage(file[0], $(this));
      });
      //Delete image
      $('button[data-type=delete]').click(function () {
        productDeleteImage($(this));
        return false;
      });
    });

    function productAddImage(file, this_dom) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      let form_data = new FormData();
      form_data.append('image', file);
      form_data.append('object_type', $('[data-content="object_type"]').val());
      form_data.append('id_object', $('[data-content="id_object"]').val());

      form_data.append('object_path_image', $('[data-content="object_path_image"]').val());
      let image_product = this_dom.closest('.image-product');
      form_data.append('id_product_image', image_product.find('[data-content="key"]').val());
      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ route('product.add_image') }}',
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
          //Add image for form
          //Update
          if(!data['key']) {
            let update_product = this_dom.closest('.image-product');
            update_product.find("img").attr('src', data['src']);
            this_dom.val(''); //Clear add box
          }
          //Add
          if(data['key']) {
            let clone = $('[data-product_image="layout"]').clone(true);
            clone.removeAttr('data-product_image');
            clone.removeClass('d-none');

            clone.find("img").attr('src', data['src']);
            clone.find('[data-content="key"]').val(data['key']);
            clone.find('input[data-type="image_product"]').attr('id', 'file' + data['key']);
            clone.find('label').attr('for', 'file' + data['key']);
            clone.appendTo('[data-product_image="list"]');
            this_dom.val(''); //Clear add box
          }
        }
      });
    }


    function productDeleteImage(this_dom) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      let form_data = new FormData();
      form_data.append('object_path_image', $('[data-content="object_path_image"]').val());
      form_data.append('id_object', $('[data-content="id_object"]').val());
      let image_product = this_dom.closest('.image-product');
      form_data.append('id_product_image', image_product.find('[data-content="key"]').val());
      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ route('product.delete_image') }}',
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
          var image_product = this_dom.closest('.image-product');
          image_product.remove();
        }
      });
    }


    $('[data-draggable="parent"]').sortable({
      handle: '[data-draggable="item"]',
      axis: "y",
      helper: "clone",
      update: sortImage
    });

    function sortImage(event, ui) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      let form_data = new FormData();

      let ids_product_image = [];  //Ids image
      $('[data-draggable="parent"]').find('[data-content="key"]').each(function(indx, element){
        ids_product_image.push($(element).val());
      });

      form_data.append('ids_product_image', ids_product_image.join());
      form_data.append('id_object', $('[data-content="id_object"]').val());
      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ route('product.sort_image') }}',
        cache: false,
        contentType: false,
        processData: false,
        success: function () {
         /* var image_product = this_dom.closest('.image-product');
          image_product.remove();*/
        }
      });
    }

  </script>

@endsection
