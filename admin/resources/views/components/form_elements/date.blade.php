<div class="row">
  <div class="col-sm-6">
    <input
      type="text"
      class="form-control datetimepicker-input"
      name="{{ $name }}"
      data-type="date"
      id="{{ $name }}"
      data-toggle="datetimepicker"
      data-target="#{{ $name }}"
      data-format_date="L"
      data-value="{{ $value?:date_format(date_create(old($name)), 'd.m.Y') }}"
    />
  </div>
</div>
