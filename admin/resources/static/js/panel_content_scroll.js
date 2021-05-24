/* ЗАДАЕТ ВЫСОТУ КОНТЕЙНЕРА С КОНТЕНТОМ */
window.onresize = function() {
  contentScrollResize('left_panel_and_content')
};
$(document).ready(function () {
   $('[data-scroll_left_h="panel-left"]').scrollbar();
   $('ul.sidebar.toggled').css('width', '100%!important');

    contentScrollResize('left_panel_and_content');
});


$('[data-scroll_content_h="panel-left"]').click(function () {
  contentScrollResize('left_panel_and_content')
});

/**
 * Фунция обновляет высоту левой панели и контента
 * @param type
 */
function contentScrollResize(type) {
  let $height = $('[data-scroll_content_h="panel-top"]').height();
  let $height_window = $(window).height();
  let $height_content_scroll = ($height_window - $height-15);
  if(type === 'left_panel_and_content') {
    $('[data-scroll_content_h="panel-left"]').height($height_content_scroll);
    $('[data-scroll_content_h="panel-content"]').height($height_content_scroll);
  }
  if(type === 'left_panel') {
    $('[data-scroll_content_h="panel-left"]').height($height_content_scroll);
  }
  if(type === 'content') {
    $('[data-scroll_content_h="panel-content"]').height($height_content_scroll);
  }
}