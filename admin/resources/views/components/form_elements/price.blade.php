 <input
	 		data-validation="numeric"
			class="form-control {{ $class_input? ' ' . $class_input:'' }} @if($errors->has($name)) is-invalid @endif"
			data-id="{{ $name }}"
			name="{{ $name }}"
			value="{{ $value?:old($name) }}"
		>