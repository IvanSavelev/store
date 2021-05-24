$(document).ready(function () {
  loadDateForm();
});

function loadDateForm() {
  settingsDateTimePicker();
  initDateTimePickerForElement();
}

function settingsDateTimePicker() {
  let class_color = 'color-blue';
  $.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
    icons: {
      time: class_color + ' fa fa-clock',
      date: class_color + ' fa fa-calendar',
      up: class_color + ' fa fa-arrow-up',
      down: class_color + ' fa fa-arrow-down',
      previous: class_color + ' fa fa-chevron-left',
      next: class_color + ' fa fa-chevron-right',
      today: class_color + ' fa fa-calendar',
      clear: class_color + ' fa fa-trash',
      close: class_color + ' fa fa-times'
    }, //showToday: true
  });
}

function initDateTimePickerForElement() {
  $('[data-type="date"]').each(function (indx, element) {
    let date = $(element).attr('data-value');
    let date_moment = moment(date, "DD.MM.YYYY").utc();
    let format = $(element).attr('data-format_date');
    $(element).datetimepicker();
    $(element).datetimepicker('format', format);
    $(element).datetimepicker('locale', 'ru');
    $(element).datetimepicker('defaultDate', date);
    $(element).datetimepicker('focusOnShow', true);

  });
}