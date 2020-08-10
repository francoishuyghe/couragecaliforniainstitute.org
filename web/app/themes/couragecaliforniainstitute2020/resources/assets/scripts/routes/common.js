export default {
  init() {
    // JavaScript to be fired on all pages

    //Drawer interactions
    $('.drawer-title').click(function () { 
      $(this).parent('.drawer-wrap').toggleClass('active');
    })

    //Check page scroll
    $(window).scroll(function () { 
      if ($(window).scrollTop() > 50) {
        $('body').addClass('scrolled');
      } else { 
        $('body').removeClass('scrolled');
      }
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
