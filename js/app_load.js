$(document).ready(function () {
    $('.red').click(function () {
        $('.popup').hide();
    });
    $('.app_icon').click(function () {
        var app = $(this).attr('id');
        var popup = '#' + app + '_popup';
       $(popup).fadeIn();
    })
});