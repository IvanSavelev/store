<div class="form-group row" @if(@$required)data-validation="required" @endif>
	<label for="{{ $name  }}"
		class="col-sm-5 col-md-4 col-lg-3 col-xl-2 col-form-label{{ $class_label? ' ' . $class_label:'' }}">{{ $label }}</label>
	<div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
		{!! $sub_element !!}
		@if (!empty($errors) and $errors->has($name))
			<div class="invalid-feedback">
				{{ $errors->first($name) }}
			</div>
		@endif
	</div>
</div>