@inject('Image', 'App\Http\Helpers\Image\Image')
<div class="col-12 image-product {{ @$class }}" {!! @$attribute !!}>
  <div class="row">
    <input type="hidden" data-content="key" value="{{ @$key }}" >
    @if($draggable)
      <i class="curs-pointer align-self-center fal fa-arrows-v" data-draggable="item"></i>
     @else
      <i class="curs-pointer align-self-center fal fa-arrows-v opticy-100"></i>
    @endif
    <div class="@if($draggable) curs-pointer @endif w-200px ml-3" @if($draggable) data-draggable="item" @endif>
      @empty($object)
        <img class="mxw-200px mxh-200px" src="{{ $Image::getPlug72() }}" alt="Нет изображения">
      @else
        <img class="mxw-200px mxh-200px" src="{{ $object->image }}">
      @endempty
    </div>
    <div class="ml-3 align-self-center">
        <input class="d-none" id="file-{{ @$key }}" type="file" data-type="image_product" multiple="multiple" accept=".txt,image/*">
        <label class="btn btn-primary btn-icon-split mb-0 curs-pointer" for="file-{{ @$key }}"><span class="text">Загрузить</span></label>
    </div>
    <div class="ml-3 align-self-center">
      @if(!isset($delete_key) or !$delete_key)
        <button data-type="delete" class="d-none btn btn-primary btn-icon-split"><span class="text">Удалить</span></button>
      @else
        <button data-type="delete" class="btn btn-primary btn-icon-split"><span class="text">Удалить</span></button>
      @endif
    </div>
  </div>

</div>