const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */



mix.scripts([
  //Libraries
  'resources/static/vendor/jquery-3.4.1/jquery.js', //Main framework
  'resources/static/vendor/popper/popper.js',       //For correct operation Wisivig
  'resources/static/vendor/bootstrap-4/bootstrap.js', //Main template
  'resources/static/vendor/sb-admin/sb-admin-2.js',  //Main template admin
  'resources/static/vendor/jquery-easing/jquery.easing.js', //For smooth movement drop-drag
  'resources/static/vendor/jquery-cookie/jquery-cookie.js', //For the convenience of working with cookies
  'resources/static/vendor/jquery-scrollbar/jquery.scrollbar.js', //For scroll the left panel
  'resources/static/vendor/jquery-ui/jquery-ui.min.js', //For drag and sort items
  'resources/static/vendor/summernote/summernote-bs4.js', //For WYSIWYG
  'resources/static/vendor/moment/moment-with-locales.js', //For field date tempusdominus
  'resources/static/vendor/tempusdominus/tempusdominus-bootstrap-4.js', //For field date

  //Components
  'resources/static/js/components/ajax.js', //For ajax call
  'resources/static/js/components/form-filed-messages.js', //For under field on form
  'resources/static/js/components/form-image.js', //For load/update/delete image
  'resources/static/js/components/form-validation.js', //For fast validation form
  'resources/static/js/components/form-submit.js', //For submit form
  'resources/static/js/components/form-date.js', //For date form
  'resources/static/js/components/messages.js', //For any messages
  'resources/static/js/components/form-wysiwyg_summernote.js', //For wysiwyg
  'resources/static/js/components/list-delete_item.js', //For page list - delete item object
  //'resources/static/js/components/form-date.js', //For field date on a form

  //Sections
  'resources/static/js/panel_content_scroll.js', //For scroll view change panel
  'resources/static/js/panel_left_size.js', //For change left panel
  'resources/static/js/panel_left_show_el.js', //For show/hide sub element link
  'resources/static/js/panel_top_messages.js', //For transfer message system to js message

], 'public/js/app.js').sourceMaps();
mix.styles([
  //Libraries
  //'resources/static/vendor/sb-admin-2.css', //Main template admin
  'resources/static/vendor/jquery-scrollbar/jquery-scrollbar.css', //For scroll the left panel
  'resources/static/vendor/summernote/summernote-bs4.css', //For WYSIWYG
  'resources/static/vendor/tempusdominus/tempusdominus-bootstrap-4.css', //For field date


  //Expanding features
  'resources/static/css/additional_bootstrap.css',  //Expanding features

  //Components
  'resources/static/css/components/form_elements/helpers/basis.css', //For required field

  //Sections
  'resources/static/css/panel_left.css',  //For left panel

],  'public/css/app.css');
//mix.copy('resources/static/vendor/summernote/summernote.woff2', 'public/font/summernote/summernote.woff2');
//mix.copyDirectory('resources/static/img', 'public/img');
//mix.copyDirectory('resources/static/vendor/fontawesome-pro', 'public/font/fontawesome-pro');

