$(document).ready(function () {
    $('.setting_list').click(function () {
        var list_name = '#' + $(this).attr('id') + '_form';
        $(this).css('background-color', 'rgba(0,0,0,.1)');
        $('div#setting_popup div.popup_side li').not('li#' + $(this).attr('id')).css('background-color', '');
        $(list_name).css('display', 'block');
        $('div#setting_contents div').not('div' + list_name).css('display', 'none')
    })
})