function isVisible(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

$(window).scroll(function() {
    // console.log('scroll')
    $('.fadeMe').each(function(i) {
        if (isVisible(this)) {
            // $(this).animate({
            //   'opacity': '1'
            // }, 1000*i);
            var row = $(this);
            setTimeout(function() {
                row.addClass('uk-animation-scale-up');
            }, 250 * i);

        } else {
            //   $(this).css({
            //   'opacity': '0'
            // });
            // $(this).removeClass('uk-animation-scale-up');
        }
    });
});


// =======================

$(window).scroll(function() {
  var windowH = $(window).height(),
    scrollY = $(window).scrollTop();
  element.each(function() {
    var elPosition = $(this).offset().top;
    if (scrollY > elPosition - windowH) {
      //do what
    }
  });
});
