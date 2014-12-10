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

$(document).on('ready', GOV._init);
$(document).on('ready', GOV.carousel);
$('#newsletter-form').on('submit', GOV.newsletter);