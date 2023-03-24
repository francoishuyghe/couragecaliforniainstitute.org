export default {
  init() {
    // JavaScript to be fired on the about us page

    $('.action-link').click(function (event) {
      let target = $(event.target).attr('href');
      $('.action.active').removeClass('active');
      $('.action-link.active').removeClass('active');
      $(target).addClass('active');
      $(event.target).addClass('active');
      event.preventDefault();
    });
  },
};
