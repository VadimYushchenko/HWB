jQuery(document).ready(function($) {
  $(".textual").hide().fadeTo(1000,1);
//  $(".slides-slide").css("width", $(window).width()+"px");
//  $(window).resize(function() {
//    $(".slides-slide").css("width", $(window).width()+"px");
//  });
  fade(0);
  $('#countdown').countdown("2014/02/01", function(event) {
    $this = $(this);
    switch(event.type) {
      case "seconds":
      case "minutes":
      case "hours":
      case "days":
      case "weeks":
      case "daysLeft":
        $this.find('span#'+event.type).html(event.value);
        break;
    }
  });
  $('#slides').slides({
    container:'slides-container',
    crossfade:true,
    effect:'fade',
    fadeSpeed:1000,
    hoverPause:false,
    pagination:false,
    play:5000,
    preload:true
  });
});

function fade(idx) {
  var $elements = $('.social');
  $elements.eq(idx).fadeTo(500,1, function () {
    $(this).fadeTo(1000,.5);
    if (idx < $elements.length) {
      fade(idx + 1);
    }
  });
}
