@if($objects->lastPage() > 1)
  <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
  <div class="row">
  <div class="col-sm-12 col-md-5">
    <div class="">Всего: {{$objects->total()}}</div>
  </div>
  <div class="col-sm-12 col-md-7">
      <ul class="pagination">
        <li class="paginate_button page-item previous @if($objects->currentPage() == 1) disabled @endif" id="dataTable_previous">
          <a href="{{ $objects->url($objects->currentPage()-1) }}"
               aria-controls="dataTable"
               data-dt-idx="0" tabindex="0"
               class="page-link"><</a>
        </li>
        @for($i = 1; $i<= $objects->lastPage(); $i++)
          @if($objects->currentPage() == $i)
            <li class="paginate_button page-item active"><a href="#" class="page-link">{{ $i }}</a></li>
          @else
            <li class="paginate_button page-item "><a href="{{ $objects->url($i) }}" class="page-link">{{ $i }}</a></li>
          @endif
        @endfor
        <li class="paginate_button page-item next @if($objects->currentPage() == $objects->lastPage()) disabled @endif" id="dataTable_next">
          <a href="{{ $objects->url($objects->currentPage()+1) }}" class="page-link">></a></li>
      </ul>
  </div>
  </div>
</div>
@endif