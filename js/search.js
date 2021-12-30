$(document).ready(function(){
    $("#search_input").keypress(function (e) {
     if (e.which == 13){
        keyword = document.querySelector('input[name = "search"]').value
        window.open('about:blank').location.href = 'https://www.google.co.kr/search?q=' + keyword
     }
 });
});