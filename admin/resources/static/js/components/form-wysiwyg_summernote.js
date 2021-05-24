$(document).ready(function () {
  loadVisivigSummernote();
});

function loadVisivigSummernote() {
  //$('[data-scroll_left_h="panel-left"]')
    $('[data-content="summernote"]').summernote({
    height: 228,
    dialogsInBody: true,
    callbacks: {
      onImageUpload: function (files) {
        sendFile(files[0], $(this));
      }
    }
  });
}

function sendFile(file, el) {
  let form_data = new FormData();
  form_data.append('image', file);
  form_data.append('path_image', el.data('path_image'));
  let url = postAjax('/general/save_image_for_wysiwyg', form_data); //SaveImage
  el.summernote('insertImage', url); //Return url for vizivig
}