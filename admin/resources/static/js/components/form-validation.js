$('body').on('keydown', 'input[data-validation="numeric"]', function (e) {
  clearFormFieldsErrors($(this));
  if (e.key.length === 1 && e.key.match(/[^0-9'".17]/)) {
    if(!e.ctrlKey) {
      setFormFieldError($(this), 'Можно вводить только числа');
      return false;
    }
  }
});
$('body').on('focusout', 'input, .note-editable', function (e) {
  clearFormFieldsErrors($(this));
});

function checkedFormValidation() {
  if (isValidation()) {
    $(document).off('submit', "form[date-type='form_standard']", plugSubmit);
    $(this).closest("form[date-type='form_standard']").submit();
  } else {
    showError();
  }
}



function isValidation() {
  let successfully = true;
  $('[data-validation="required"]').each(function (index, value) {
    if(successfully === true) {
      let el_input = $(this).find('input');
      if(el_input.val() === '') {
        successfully = false;
      }
      let textarea =  $(this).find('div[contenteditable="true"]');
      if(textarea.length > 0 && textarea.text() === '') {
        successfully = false;
      }
    }
  });
  return successfully;
}

function showError() {
  $('[data-validation="required"]').each(function (index, value) {
      let object_er;
      let el_input = $(this).find('input');
      if(el_input.val() === '') {
        object_er = el_input;
      }
      let textarea = $(this).find('div[contenteditable="true"]');


      if(textarea.length > 0 && $(textarea).text() === '') {
      object_er = $(this).find('textarea[data-content="summernote"]');
      }
      if(object_er && object_er.length > 0) {
        setFormFieldError($(object_er), 'Поле обязательно для ввода');
        scrollError(object_er);
      }
  });
}

function scrollError(object_er) {
  let parent_1 = $(object_er).closest('.form-group');
  let form_group_top = parent_1.length  > 0?parent_1.position().top:0;
    let parent_2 = $(object_er).closest('.card');
    let card_top = parent_2.length  > 0?parent_2.position().top:0;
    parent_2.find('.collapse').collapse('show'); //Show set field

   $('[data-scroll_content_h="panel-content"]').animate({
        scrollTop: form_group_top + card_top  // класс объекта к которому приезжаем
    }, 500); // Скорость прокрутки*/
}




/**
 * Добавляет ошибку с текстом
 * @param object
 * @param error_for_field
 */
function setFormFieldError(object, error_for_field) {
    if (!hasFormFieldError(object)) {
        setFormFieldError(object, error_for_field);
    }

    function hasFormFieldError(object) {
        let parent = object.parent();
        return parent.find('.invalid-feedback').length > 0 ? 1 : 0;
    }

    function setFormFieldError(object, error_for_field) {
        object.parent().append('<div class="invalid-feedback">' + error_for_field + '</div>');
        object.addClass('is-invalid');
    }
}


/**
 * Удаляет ошибки из полей формы
 */
function clearFormFieldsErrors(object_clear_errors) {
    if (object_clear_errors) {
        let parent = object_clear_errors.closest('.form-group');
        parent.find('.invalid-feedback').remove();
        parent.find('input').removeClass('is-invalid');
    }
}


