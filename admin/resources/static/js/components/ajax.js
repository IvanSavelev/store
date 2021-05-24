/**
 *
 * @param url - путь запроса
 * @param form_data - массив данных
 * @param settings_personal
 * @param name_function
 * @param name_function_error
 * @returns {*}
 */
function postAjax(url, form_data, settings_personal, name_function, name_function_error) {
  //Add field page
  if(!form_data) {
    form_data = new FormData();
  }
  form_data.append('object_type', $('[data-content="object_type"]').val());
  form_data.append('id_object', $('[data-content="id_object"]').val());
  form_data.append('object_path_image', $('[data-content="object_path_image"]').val());

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  let settings_default = {
    type: "post",
    url: url,
    cache: false,
    async: false,
    data: form_data,
    contentType: false,
    processData: false,
    success: function (data) {
      if(name_function) {
        name_function(data);
      } else {
        data_return = data;
      }
    },
    error: function (data) {
      if(name_function_error) {
        name_function_error(data);
      } else {
        Message.showMessageErrorFlash('Запрос не выполнен, статус: ' + data.statusText);
        data_return = data;
      }
    },
  };
  let settings = Object.assign(settings_default, settings_personal);
  let data_return = null;

  $.ajax(settings);

  return data_return;
}