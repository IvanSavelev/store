'use strict';

//Объект доступный отовсюду
class Message {

//Флеш сообщения
  static showMessageErrorBtn($text) {
    this.showMessage($text, 'error', 'btn')
  }

  static showMessageInfoBtn($text) {
    this.showMessage($text, 'info', 'btn')
  }

  static showMessageSuccessBtn($text) {
    this.showMessage($text, 'success', 'btn')
  }


  static showMessageErrorFlash($text) {
    this.showMessage($text, 'error', 'flash')
  }

  static showMessageInfoFlash($text) {
    this.showMessage($text, 'info', 'flash')
  }

  static showMessageSuccessFlash($text) {
    this.showMessage($text, 'success', 'flash')
  }

  static showMessage($text, $status, $type) {
    let $class = null;
    if($status === 'error') {
      $class = 'danger';
    }
    if($status === 'info') {
      $class = 'info';
    }
    if($status === 'success') {
      $class = 'success';
    }
    if($type === 'btn') {
      this.showMessageBtn($text, $class);
    }
    if($type === 'flash') {
      this.showMessageFlash($text, $class)
    }
  }

  static showMessageBtn($text, $class) {
    $('[data-hook="top_message"]').prepend("" +
      "<div class=\"alert alert-" + $class + " alert-dismissible fade show\" role=\"alert\">" + $text +
      "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">\n" +
      "    <span aria-hidden=\"true\">&times;</span>\n" +
      "  </button>" +
      "</div>");
  }

  static showMessageFlash($text, $class) {
    $('[data-hook="top_message"]').prepend("<div class=\"alert alert-" + $class + " alert-flash \" role=\"alert\" data-dismiss=\"alert\">" + $text + "</div>");
    setTimeout(function () {
      $('.alert-flash').stop().animate({
        height: "0px", // высоту к нулю
      }, 100);
      $('.alert-flash').stop().animate({
        opacity: 0
      }, 1000);
    }, 1500);
    setTimeout(function () {
      $('.alert-flash').alert('close');
    }, 3000);
  }
}


