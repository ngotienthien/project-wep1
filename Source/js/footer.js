$(document).ready(function() {
    $(window).scroll(function() {
    if ($(this).scrollTop() != 0) {
        $('#btn-to-top').stop().fadeIn(150);
    } else {
        $('#btn-to-top').stop().fadeOut(150);
    }
    });
    $('#btn-to-top').click(function() {
        $('body,html').stop().animate({ scrollTop: 0 }, 800);
    });
});