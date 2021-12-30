function calendar() {
    var today = new Date();
    //오늘 날짜
    var year = today.getFullYear();
    //올 해
    var month = today.getMonth();
    //이번 달
    var month_list = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    for (i = 0; i < 6; i++) {
        month = month + 1;
        if (month == 13) {
            year = year + 1;
            month = month - 12;
        }
        var YM = year + "년 " + (month) + "월";
        var new_li = document.createElement('li');
        var new_p = document.createElement('p');
        var time = document.createTextNode(YM);
        var target = document.getElementById('calendar_side');

        new_li.className = 'month_list';
        new_li.id = year + '_' + month;
        new_li.appendChild(new_p);
        new_p.appendChild(time);
        target.appendChild(new_li);
    };

    $('.month_list').click(function () {
        var Year_Month = $(this).attr('id');
        var split = Year_Month.split('_');
        var Year = split[0];
        var Month = split[1];

        $('div#YM').empty();
        $('#calendar_body').empty();
        $('div#YM').append('<h1 id="' + Year + '" style="float: right;">' + Year + '</h1>');
        $('div#YM').append('<h2 id="' + Month + '" style="float: right; margin-top: 0px;">' + month_list[Month - 1] + ' ' + today.getDate() + '</h2>');

        var first_date = new Date(Year, Month, 1).getDate();
        var last_date = new Date(Year, Month, 0).getDate();
        var firstDay = new Date(Year, Month - 1, 1).getDay();
        var calendar = document.getElementById('calendar_body');
        var row = document.createElement('tr');
        calendar.appendChild(row);

        for (i = 0; i < firstDay; i++) {
            var blank_cell = document.createElement('td');
            row.appendChild(blank_cell);
        }

        for (k = 1; k <= last_date; k++) {
            if (firstDay != 7) {
                var cell = document.createElement('td');
                var date = document.createTextNode(k);
                cell.setAttribute('id', k);
                cell.appendChild(date);
                row.appendChild(cell);

                firstDay = firstDay + 1;
            } else {
                var row = document.createElement('tr');
                var new_cell = document.createElement('td');
                var new_date = document.createTextNode(k);

                new_cell.setAttribute('id', k);
                new_cell.appendChild(new_date);
                row.appendChild(new_cell);
                calendar.appendChild(row);

                firstDay = firstDay - 6;
            }
        }

        var today_date = today.getDate();
        for (j = 1; j <= last_date; j++) {
            set_id = document.getElementById(j);
            if (today_date == set_id.getAttribute('id')) {
                set_id.style.backgroundColor = '#FF483B';
                set_id.style.color = '#ffffff';
                set_id.style.borderRadius = '50%';
            }
        }
        $(this).css('background-color', 'rgba(0,0,0,.1)');
        $('.month_list').not('li#' + Year_Month).css('background-color', '');
    });
    $('ul#calendar_side li').eq(0).click();

};