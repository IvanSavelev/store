@inject('Image', 'App\Http\Helpers\Image\Image')
@php
$Image = app('App\Http\Helpers\Image\Image');
switch($page_settings->getType()) {
case 'empty':
$view_temp = 'basis.basis_page_empty';
break;
case 'normal':
$view_temp = 'basis.basis_page_normal';
break;
}
@endphp
@extends($view_temp) {{-- $view_temp depending on the settings, view a template --}}

