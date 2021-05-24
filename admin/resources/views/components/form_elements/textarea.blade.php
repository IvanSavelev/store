 <textarea
	 class="form-control {{ $class_textarea ? ' ' . $class_textarea:'' }} @if($errors->has($name)) is-invalid @endif"
	 name="{{ $name }}"
	 rows="3">{{ $value?:old($name) }}</textarea>