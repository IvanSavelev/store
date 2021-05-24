<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion overflow-auto scrollbar-inner  @if(Cookie::get('panel-left-show') == 'false') toggled @endif" id="accordionSidebar"  data-scroll_left_h="panel-left">
  <div class="mt-2"></div>
  <li class="mb-2  text-white">
    <div class="col-12 d-flex justify-content-center curs-pointer" data-show_hide="[data-show_el='left-catalog']">
      <span>Каталог</span>
    </div>
      <div class="show-component" data-show_el="left-catalog" style="display:none">
        <div class="d-flex justify-content-center">
          <a class="text-white" href="{{ route ('category.index') }}">Категории</a>
        </div>
         <div class="d-flex justify-content-center">
          <a class="text-white" href="{{ route ('product.index') }}">Продукты</a>
        </div>
      </div>
  </li>

  <li class="mb-2  text-white">
    <div class="col-12 d-flex justify-content-center curs-pointer">
      <a class="text-white" href="{{ route ('article.index') }}">Статьи</a>
    </div>
  </li>


</ul>

<!-- End of Sidebar -->