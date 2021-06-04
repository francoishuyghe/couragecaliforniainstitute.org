export default {
  init() {
    // JavaScript to be fired on the about us page

    $('.cats a.available').on('click', function (e) {
      e.preventDefault();

      let cat = $(e.target).data('cat');

      if ($(e.target).hasClass('active')) {
        $('.cats a.available').removeClass('active');
        $('#blog').removeClass('filtered');

        $('.post-wrap').show();
        
      } else {
        $('#blog').addClass('filtered');
        $('.cats a.available').removeClass('active');
        $(e.target).addClass('active');
        //Hide all posts but the one category
        $('.post-wrap').hide();
        $('.post-wrap.' + cat).show();
      }
      

      // If the posts are filtered
      // Toggle the 
    });
  },
};
