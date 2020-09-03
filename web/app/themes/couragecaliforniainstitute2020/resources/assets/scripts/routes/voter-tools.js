export default {
  init() {
    // JavaScript to be fired on the about us page

    $('.action-link').click(function (event) {
      let target = $(event.target).attr('href');
      console.log(target);
      $('.action.active').removeClass('active');
      $(target).addClass('active');
    });
  },
};
