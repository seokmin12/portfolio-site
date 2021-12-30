function setting() {
    $('#Python').click();
};

$(document).ready(function () {
    $('.popup_list').click(function () {
        var language = '.' + $(this).attr('id') + '_contents';
        var not_lang = 'div' + language;
        $(this).css('background-color', 'rgba(0,0,0,.1)');
        $('.popup_list').not('li#' + $(this).attr('id')).css('background-color', '');
        $(language).css('display', 'block');
        $('div#folder_contents div#contents').not(not_lang).css('display', 'none');
    });
});