/**
 * Deactivate standard submit form, we do it ourselves
 */
$(document).on('submit', "form[date-type='form_standard']", plugSubmit);
function plugSubmit(e) {
  e.preventDefault();
  return false;
}

/**
 * If default form automatic add attribute, but special form easily lead here
 */
$("form button[data-redirect]").closest("form").attr('date-type', 'form_standard');


/**
 * Added info of redirect
 */
$("form button[data-redirect]").click(function() {
  let form_parent = getFormSubmit(this);
  addRedirect(form_parent, this); //Add redirect
  addImageList(form_parent); //Add image
  addDateList(form_parent); //Add date list input
  addRequiredField(form_parent); //Add object_type, object_id, object_path_image
  checkedFormValidation();
});





function getFormSubmit(context) {
  return $(context).closest("form");
}


function addRedirect(form_parent, context) {
  let redirect = $(context).data('redirect');
  form_parent.prepend('<input type="hidden" name="redirect" value="' + redirect  + '" /> ');
}


function addImageList(form_parent) {
  let elements_image_list = '';
  $('[data-type="image"]').each(function (index, value){
    let path_image = $(this).attr('data-path_image_store');
    if(path_image) { //Isset save file
      form_parent.prepend('<input type="hidden" name="' + $(this).attr('data-name') + '" value="' +  $(this).attr('data-path_image_store') + '" />');
    }
    if($(this).attr('data-change') === 'true') {
      elements_image_list = elements_image_list + $(this).attr('data-name') + ',';
    }
  });

  if(elements_image_list) {
    elements_image_list = elements_image_list.substring(0, elements_image_list.length - 1);
    form_parent.prepend('<input type="hidden" name="elements_image_list" value="' + elements_image_list  + '" /> ');
  }
}


function addDateList(form_parent) {
  let elements_date_list = '';
  $('[data-type="date"]').each(function (index, value){
    elements_date_list = elements_date_list + $(this).attr('name') + ',';
  });
  if(elements_date_list) {
    elements_date_list = elements_date_list.substring(0, elements_date_list.length - 1);
    form_parent.prepend('<input type="hidden" name="elements_date_list" value="' + elements_date_list  + '" /> ');
  }
}


function addRequiredField(form_parent) {
  form_parent.prepend('<input type="hidden" name="object_type" value="' + $('[data-content="object_type"]').val()  + '" /> ');
  form_parent.prepend('<input type="hidden" name="id_object" value="' + $('[data-content="id_object"]').val()  + '" /> ');
  form_parent.prepend('<input type="hidden" name="object_path_image" value="' + $('[data-content="object_path_image"]').val()  + '" /> ');
}