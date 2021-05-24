<input
		type="{{ $type }}"
		class="form-control {{ $class_input? ' ' . $class_input:'' }} @if($errors->has($name)) is-invalid @endif"
		name="{{ $name }}"
		value="{{ $value?:old($name) }}"
	>