
<div class="row" data-type="image" data-path_image_store="{{ @$src?? ''}}" data-name="{{ @$name }}" data-path_image_save="{{ @$name }}" data-chehge="false">
  <div class="col-3">
    <img class="mxw-200px mxh-200px" src="<x-helpers.image-show :path='@$src'/>" alt="{{ $src?'Изображение':'Нет изображения' }}">
  </div>
  <div class="col-9 pl-3 align-self-center">
      <input class="d-none" data-action="add_file" id="image-{{ @$name }}" type="file"  multiple="multiple" accept=".txt,image/*">
      <label class="btn btn-primary btn-icon-split mb-0 curs-pointer" for="image-{{ @$name }}"><span class="text">Загрузить</span></label>
      <label data-action="delete" class="{{ @$src?'':'d-none' }} btn btn-primary btn-icon-split mb-0 curs-pointer"><span class="text">Удалить</span></label>
  </div>
  <div class="pl-3 align-self-center">

  </div>
</div>