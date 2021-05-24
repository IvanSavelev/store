<div class="row">
  <div class="col-12">
    <div class="pb-3 float-right">
      @if(!empty($add))
        <a href="{{ $add['url'] }}" class="btn btn-primary">{{ @$add['name']?:'Добавить' }}</a>
      @endif
      @if(!empty($destroy))
        <button data-type="list_delete_item" data-href="{{ $destroy['url'] }}" class="btn btn-danger" ><span class="icon"><i class="fas fa-trash"></i></span></button>
      @endif
    </div>
  </div>
</div>