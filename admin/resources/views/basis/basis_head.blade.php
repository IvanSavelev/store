<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{csrf_token()}}"/>
	<title>Админка</title>
	<link href="/font/fontawesome-pro/css/all.min.css" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	@yield('style_up')
	 {{--<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">--}}

	<!-- TODO Сделать нормально, когда придет время, убрал sb-admin-2.css из общего css чтоб не тратить на рендер время--->
	<link href="/sb-admin-2.css" rel="stylesheet">
	@yield('style_down')
</head>
