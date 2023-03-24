export default {
  init() {
    // JavaScript to be fired on all pages

    //Drawer interactions
    $('.drawer-title').click(function () { 
      $('.drawer-wrap.active').removeClass('active');
      $(this).parent('.drawer-wrap').addClass('active');
    })

    //Check page scroll
    $(window).scroll(function () { 
      if ($(window).scrollTop() > 50) {
        $('body').addClass('scrolled');
      } else { 
        $('body').removeClass('scrolled');
      }
    })

    //Hamburger menu
    $('.hamburger').click(function () { 
      $('header.banner').toggleClass('active');
    });
    $('.nav a').click(function () { 
      $('header.banner').removeClass('active');
    });

    //Register drawer
    $('.registerLink').click(function () { 
      $('#registerForm').toggleClass('active');
    })

    //Display a thank you message when signed up
    var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;
  
      for (i = 0; i < sURLVariables.length; i++) {
          sParameterName = sURLVariables[i].split('=');
  
          if (sParameterName[0] === sParam) {
              return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
          }
      }
    };
    // Check for success
    var signupParam = getUrlParameter('action_id');
    if (signupParam) { 
      console.log('Success!')
      $('#newsletter').addClass('active');
      $('html, body').animate({
        scrollTop: $('#newsletter').offset().top,
      }, 1000);
      setTimeout(function () {
        $('#newsletter').removeClass('active');
       }, 5000)
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
