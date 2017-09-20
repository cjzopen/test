// scroll到 .fadein  .fadein的物件才show出來

$('head').append(
'<style type="text/css">.fadeinAll {display:none;}'
);
$(window).load(function() {
$('.fadeinAll').delay(300).fadeIn("1200");
});
$(function(){
    $(window).scroll(function (){
        $('.fadein').each(function(){
            var elemPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > elemPos - windowHeight + 150){
                $(this).addClass('scrollin');
            }
        });
    });
});