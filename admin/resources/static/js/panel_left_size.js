(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
   // $("body").toggleClass("sidebar-toggled");
  //  $('#accordionSidebar').toggleClass("toggled");
    if ($('#accordionSidebar').hasClass("toggled")) {
      isHideLeftPanel();
    } else {
      isShowLeftPanel();
    }
  });
})(jQuery); // End of use strict

function isShowLeftPanel() {
    $.cookie('panel-left-show', true, { path: '/' });
 // updateTableHeaders();
}
function isHideLeftPanel() {
    $.cookie('panel-left-show', false, { path: '/' });
 // updateTableHeaders();
}

function updateTableHeaders() {
  $(".dataTable").each(function (indx, element) {
    $(element).stickyTableHeaders('destroy');
    initStickyTableHeaders(element); //Инициализирует липкие заголовки таблиц
  });
}


