// navigation slide-in
$(window).load(function() {
  $('.nav_slide_button').click(function() {
    $('.pull').slideToggle();
  });

    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
});