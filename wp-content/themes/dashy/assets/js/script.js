jQuery(document).ready(function ($) {
  "use strict";


  var winwidth = $(window).width();
  /*==================================
   Toggle Button
 ==================================*/
 $('a.open-button').on('click', function (e) {
   e.preventDefault();
   console.log('click');
  $('body').addClass('Is-toggle');
}).focus(function () {
  $('body').addClass('Is-toggle');
});

function mainnavButton() {
  $('.open-button').clone().appendTo('.main-navigation');
  $('.main-navigation .open-button').addClass('active');
  $('.active').on('click', function () {
    $('body').removeClass('Is-toggle');
  }).focus(function () {
    $('body').removeClass('Is-toggle');
  });

}
mainnavButton();


  $('.canvas-button a.canvas-open').on('click', function (event) {
    event.preventDefault();
    $(this).toggleClass('active');
    $( ".close-sidebar" ).focus();
    $('.canvas-menu').toggleClass('active');
  });



  $('.canvas-overlay').on('click', function (event) {
    event.preventDefault();
    $('.canvas-menu').removeClass('active');
    $('.canvas-open').removeClass('active');
  })



  $('.close-sidebar').on('click', function (event) {
    event.preventDefault();
    $('.canvas-menu').removeClass('active');
    $('.canvas-open').removeClass('active');
  }).focus(function (event) {
    event.preventDefault();
    $('.canvas-menu').removeClass('active');
    $('.canvas-open').removeClass('active');
  });

  
  

  /*==================================
   search bar show
 ==================================*/
  function searchToggle() {

    $('.search-toggle a').on('click', function (e) {
      e.preventDefault();
      var svgIcon = $(this).find('svg');
      if ($(svgIcon).hasClass('fa-search')) {
        $(svgIcon).addClass('fa-times');
      } else {
        $(svgIcon).addClass('fa-search');
      }
      $(this).closest('.search-toggle').toggleClass('show');

    });
    var elem = ".search-toggle"; 
    $( document ).on( 'keydown', function ( e ) {
        if ( e.keyCode === 27 ) { // ESC
            $( elem ).hide();
        }
    });
  }

  searchToggle();


  /*==================================
    Responsive menu
  ==================================*/

  if (winwidth <= 991) {
    $('.main-navigation li.menu-item-has-children,.main-navigation li.page-item-has-children').prepend('<span class="dropdown-icon"><i class="fas fa-caret-down"><i></span>');

    $('.main-navigation li.menu-item-has-children span.dropdown-icon,.main-navigation li.page-item-has-children span.dropdown-icon').on('click', function (e) {
      e.preventDefault();
      $(this).siblings('.main-navigation li.menu-item-has-children ul.sub-menu,.main-navigation li.page-item-has-children ul.sub-menu').slideToggle(300);

    });
  } else {
    $('.main-navigation li.menu-item-has-children, .main-navigation li.page-item-has-children').find('span').css('display', 'none');
  };





});


