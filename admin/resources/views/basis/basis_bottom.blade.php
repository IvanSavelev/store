@yield('script_up')
<script src="/js/app.js"></script>

@yield('script_down')

<input type="hidden" data-content="object_type" value="{{ $page_settings->getObjectType() }}" >
<input type="hidden" data-content="id_object" value="{{ $page_settings->getObjectId() }}" >
<input type="hidden" data-content="object_path_image" value="{{ $page_settings->getObjectPathImage() }}" >

{{-- it need for js message error --}}
@if ($errors and $errors->any())
  @foreach ($errors->all() as $error)
    <input type="hidden" data-content="error-message" value="{{ $error }}" >
  @endforeach
@endif
{{-- it need for js message info --}}
@if (session('error'))
   <input type="hidden" data-content="error-message" value="{{ session('error') }}" >
@endif
@if (session('info'))
  <input type="hidden" data-content="info-message" value="{{ session('info') }}" >
@endif
@if (session('success'))
  <input type="hidden" data-content="success-message" value="{{ session('success') }}" >
@endif
