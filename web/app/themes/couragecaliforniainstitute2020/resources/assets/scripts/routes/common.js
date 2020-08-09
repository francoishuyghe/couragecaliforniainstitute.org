export default {
  init() {
    // JavaScript to be fired on all pages

    //Drawer interactions
    $('.drawer-wrap').click('.drawer-title', function () { 
      $(this).toggleClass('active');
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
