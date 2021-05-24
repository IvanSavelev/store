<div class="custom-control col-form-label custom-checkbox">
	<input class="custom-control-input {{ $class_checkbox }}" id="{{ $name }}" name="{{ $name }}" type="checkbox"
				 @if($value !== null)
				 @if($value) checked @endif
				 @else
				 @if(old($name)) checked @endif
				@endif>
	<label class="custom-control-label" id="{{ $name }}" for="{{ $name }}"></label>
</div>