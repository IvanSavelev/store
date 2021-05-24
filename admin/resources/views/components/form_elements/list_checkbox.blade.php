@foreach($value as $value_item)
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="{{ @$name }}{{ @$value_item['id'] }}" name="{{ @$name }}{{ '[' .@$value_item['id'] . ']' }}" @if($value_item['checked']) checked @endif>
    <label class="custom-control-label curs-pointer" for="{{ @$name }}{{ @$value_item['id'] }}">{{ $value_item['name'] }}</label>
  </div>
@endforeach
