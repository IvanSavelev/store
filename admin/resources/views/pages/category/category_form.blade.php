@extends('basis.basis_page_root')
@section('content')
  @include('components.elements.breadcrumbs', ['parents' => [['url' => route('category.index'), 'name' => 'Категории']], 'name' => 'Категория'])
  <div class="row">
    <div class="col-12">
      <form enctype="multipart/form-data" action="{{ ($category ?? false)?route ('category.update', $page_settings->getObjectId()):route ('category.store') }}" method="POST">
        @csrf
        @if(@$category)
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
                  <x-form-elements.image label="Изображение" name='image' :required=false :src='@$category->image' :errors=$errors/>
                  <x-form-elements.text label="Имя" name='title' required=true  :value='@$page_standard_field->title' :errors=$errors/>
                  <x-form-elements.text label="h1" name='h1'  :value='@$page_standard_field->h1' :errors=$errors/>
                  <x-form-elements.textarea-vis label="Описание" name='description' required=true path_image='description' :value='@$category->description'  :errors=$errors/>
                  <x-form-elements.checkbox-simple label="Видимость" name='visible' :value='@$category->visible'  :errors=$errors/>
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
        @include('components.elements.form_bottom_buttons', [])
      </form>
      </div>
  </div>

@endsection

