// Action links
$('.action-link').click(function (event) {
  const target = $(event.target).attr('href');
  $('.action.active').removeClass('active');
  $('.action-link.active').removeClass('active');
  $(target).addClass('active');
  $(event.target).addClass('active');
  event.preventDefault();
});
