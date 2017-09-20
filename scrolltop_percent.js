// from http://snipplr.com/view/69164/html5-scrollbar-percentage-position-using-javascript/
$(document).ready(function() {

    $(window).scroll(function(e) {
        var scrollTop = $(window).scrollTop();
        var docHeight = $(document).height();
        var winHeight = $(window).height();
        var scrollPercent = (scrollTop) / (docHeight - winHeight);
        var scrollPercentRounded = Math.round(scrollPercent * 100);

        $('#scrollPercentLabel>span').html(scrollPercentRounded);
        repositionLabel();
    });

    $(window).resize(function() {
        repositionLabel();
    });

    function repositionLabel() {
        $('#scrollPercentLabel').css({
            position: 'fixed',
            left: ($(window).width() - $('#scrollPercentLabel').outerWidth()) / 2,
            top: (($(window).height() - $('#scrollPercentLabel').outerHeight()) / 2) - $('#scrollPercentLabel').height()
        });
    }

    repositionLabel();

});
