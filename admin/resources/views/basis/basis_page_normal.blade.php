<!DOCTYPE html>
<html lang="ru">
@include('basis.basis_head')
<body id="page-top">
	@include('basis.basis_panel_top')
	<div id="wrapper" class="position-fixed w-100">
	@include('basis.basis_panel_left')
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<div class="container-fluid container-frame overflow-auto" data-scroll_content_h="panel-content">
					<div class="pt-4 content"  data-hook="top_message">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('basis.basis_bottom')
</body>
</html>