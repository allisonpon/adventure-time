/**
 * navbar.js
 *
 * Fix the navbar to the top of the viewport.
 */
( function( $ ) {

  function bindScroll() {
    console.log($('.header-box'));
    window.a = $('.header-box');
    $('.header-box').css("height", "100vh");
    if ( $('.site-branding').length < 1 ) {
      $('.main-navigation').addClass('fixed');
      $('body').addClass('padded-body');
    } else {
      var navpos = $('.main-navigation').offset().top;
      if ($(window).scrollTop() > navpos) {
        $('.main-navigation').addClass('fixed');
        $('body').addClass('padded-body');
       }
       else {
         $('.main-navigation').removeClass('fixed');
         $('body').removeClass('padded-body');
       }
      $(window).unbind('scroll');
      $(window).bind('scroll', function() {
        if ($(window).scrollTop() > navpos) {
          $('.main-navigation').addClass('fixed');
          $('body').addClass('padded-body');
         }
         else {
           $('.main-navigation').removeClass('fixed');
           $('body').removeClass('padded-body');
         }
      });
    }
  }

  bindScroll();

  $(window).bind('resize', function() {
    bindScroll();
  });

} )( jQuery );
