$("[data-show_hide]").click(function() {
  let show_name = $(this).data('show_hide');
  $(show_name).slideToggle("fast");
});