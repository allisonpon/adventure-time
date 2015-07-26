/**
 * navbar.js
 *
 * Fix the navbar to the top of the viewport.
 */
( function( $ ) {
  var navpos = $('.main-navigation').offset();
  $(window).bind('scroll', function() {
    if ($(window).scrollTop() > navpos.top) {
      $('.main-navigation').addClass('fixed');
      $('body').addClass('padded-body');
     }
     else {
       $('.main-navigation').removeClass('fixed');
       $('body').removeClass('padded-body');
     }
  })
} )( jQuery );
