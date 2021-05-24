<!DOCTYPE html>
<html lang="ru">
@include('basis.basis_head')
<body>
<div class="container p-4" data-hook="top_message">
  	@yield('content')
	  @include('basis.basis_bottom')
</div>
</body>
</html>