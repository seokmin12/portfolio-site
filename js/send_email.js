$(document).ready(function () {
    $('#email_send_btn').click(function () {
        var body = document.getElementById('email_body').value;
        window.open(`mailto:dltjrals13@naver.com?subject=문의사항&body=${body}`);
    })
})