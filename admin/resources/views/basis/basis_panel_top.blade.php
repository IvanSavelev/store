{{-- Верхняя плашка --}}
<nav class="navbar navbar-expand navbar-light bg-white topbar" id="navbar" data-scroll_content_h="panel-top">

  <div class="text-center d-none d-md-inline">
    <button class="border-0 bg-white" id="sidebarToggle"><i class="fa fa-bars"></i></button>
  </div>


  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <div class="sidebar-brand-icon d-flex align-items-center justify-content-center">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <span class="mr-1 ml-1 color-cds-text fs-12px">ADMIN</span>
    </a>
  </div>


  <ul class="navbar-nav ml-auto">


    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-lg-inline">
          Admin
        </span>
        <i class="fas fa-user"> </i>
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route ('auth.login.out')}}">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Выйти
          </a>
      </div>
    </li>
  </ul>
</nav>