function now_time() {
    let today = new Date;

    let month = today.getMonth();
    let date = today.getDate();
    let day = today.getDay();

    let hours = today.getHours();
    let minutes = today.getMinutes();

    if (hours < 12) {
        time_set = '오전';
    } else {
        time_set = '오후';
    }

    if (hours > 12) {
        hours = hours - 12
    }

    if (minutes < 10) {
        minutes = '0' + minutes;
    }

    if (day == 0) {
        day = '(일)';
    }else if (day == 1) {
        day = '(월)';
    }else if (day == 2) {
        day = '(화)';
    }else if (day == 3) {
        day = '(수)';
    }else if (day == 4) {
        day = '(목)';
    }else if (day == 5) {
        day = '(금)';
    }else if (day == 6) {
        day = '(토)';
    }

    let time = month + 1 + '월 ' + date + '일' + day + ' ' + time_set + ' ' + hours + ':' + minutes;
    document.getElementById('time').innerHTML = time;
    setInterval(now_time,1000);
}