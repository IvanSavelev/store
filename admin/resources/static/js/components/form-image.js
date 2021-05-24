$(document).ready(function () {
  //Add/update image
  $('body').on('change', '[data-type=image] [data-action="add_file"]', function () {
    let file = this.files;
    addImage(file[0], $(this).closest("[data-type=image]"));
  });


  //Delete image
  $('body').on('click', '[data-type=image] [data-action="delete"]', function () {
    deleteImage($(this).closest("[data-type=image]"));
  });
});

function addImage(file, this_dom) {
  let form_data = new FormData();
  form_data.append('image', file);
  form_data.append('path_image_save', this_dom.data('path_image_save'));
  let src = postAjax('/general/save_image', form_data); //SaveImage
  this_dom.find("img").attr('src', src);
  this_dom.attr('data-path_image_store', src);
  this_dom.find('[data-action="delete"]').removeClass('d-none');
  this_dom.attr('data-change', true);
}

function deleteImage(this_dom) {
  let form_data = new FormData();
  form_data.append('path_image_save', this_dom.data('path_image_save'));
  let src = postAjax('/general/delete_image', form_data); //SaveImage
  this_dom.removeAttr('data-path_image_store');
  this_dom.find("img").attr('src', src);
  this_dom.find('[data-action="delete"]').addClass('d-none');
  this_dom.attr('data-change', true);
}