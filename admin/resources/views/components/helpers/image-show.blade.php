@inject('Image', 'App\Http\Helpers\Image\Image')
@empty($path)
  {{ $Image::getPlug72() }}
@else
  {{ $path }}
@endempty