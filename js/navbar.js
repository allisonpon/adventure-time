/**
 * navbar.js
 *
 * Fix the navbar to the top of the viewport.
 */
( function( $ ) {

  function bindScroll() {
    if ($('.site-branding')) {
    var navpos = $('.site-branding').offset().top + $('.site-branding').height();
    } else {
      bindScroll(0);
    }
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
    })
  }

  bindScroll();

  $(window).bind('resize', function(){
    bindScroll();
  });

} )( jQuery );
