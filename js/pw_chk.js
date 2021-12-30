$(document).ready(function () {
    $('#login_btn').click(function () {
        if ($('#pw').val() == 'seokmin68') {
            $('#project_language_list').click();
            $('#login').css('display', 'none');
            $('.fake_list').css('display', 'none');
            if ($(window).width() < 768) {
                $('.setting_list').css('display', 'inline-flex');
            } else {
                $('.setting_list').css('display', 'block');
            }
        }
    })
})