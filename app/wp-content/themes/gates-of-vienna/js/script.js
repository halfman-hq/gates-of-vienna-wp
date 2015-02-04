window.GOV = {};
GOV._init = function() {
};

GOV.carousel = function() {

  //  console.log('carousel', $('#carousel').length);

  $('.carousel-wrapper').owlCarousel({
    navigation : false,
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true
  })

};

GOV.carousel.btn = function(e) {

  e.preventDefault();
  var dir = $(this).data('dir');
  $('.carousel-wrapper').trigger('owl.'+dir);

};

GOV.newsletter = function(e) {

  e.preventDefault();

  var $this = $(this);
  var action = $this.attr('action');
  var data = $this.serialize();
  var $submit = $('#newsletter-submit');

  $.post(action, data, function(msg, status) {
      $submit.text(msg).attr('disabled', true);
    })

};

GOV.footer = function() {

  var winHeight = $(window).height();
  var bodyHeight = $(document.body).height();
  if (winHeight > bodyHeight) {
    $(document.body).addClass('short-page');
  }

};

$(document).on('ready', GOV._init);
$(window).on('load', GOV.footer);

$(document).on('ready', GOV.carousel);
$('.carousel-arrow-btn').on('click', GOV.carousel.btn);
$('#newsletter-form').on('submit', GOV.newsletter);