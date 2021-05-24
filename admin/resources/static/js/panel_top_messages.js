$(document).ready(function () {
  $('[data-content="error-message"]').each(function( index ) {
    Message.showMessageErrorBtn($(this).val());
  });
  $('[data-content="info-message"]').each(function( index ) {
    Message.showMessageInfoBtn($(this).val());
  });
  $('[data-content="success-message"]').each(function( index ) {
    Message.showMessageSuccessBtn($(this).val());
  });
});
