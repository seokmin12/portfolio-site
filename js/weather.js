const getJSON = function (url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';
    xhr.onload = function () {
        var status = xhr.status;
        if (status === 200) {
            callback(null, xhr.response);
        } else {
            callback(status, xhr.response);
        }
    };
    xhr.send();
};

const weatherOptions = {
    Thunderstorm: {
        main_iconName: "fas fa-bolt fa-3x",
        small_iconName: "fas fa-bolt fa-2x",
        gradient: ["#373B44", "#4286f4"],
        title: "천둥",
        subtitle: "천둥이 치니 야외 활동을 자제하세요."
    },
    Drizzle: {
        main_iconName: "fas fa-tint fa-3x",
        small_iconName: "fas fa-tint fa-2x",
        gradient: ["#89F7FE", "#66A6FF"],
        title: "이슬비",
        subtitle: "비가 조금 떨어집니다."
    },
    Rain: {
        main_iconName: "fas fa-cloud-rain fa-3x",
        small_iconName: "fas fa-cloud-rain fa-2x",
        gradient: ["#00C6FB", "#005BEA"],
        title: "비",
        subtitle: "비가 내리니 우산을 챙기세요."
    },
    Snow: {
        main_iconName: "far fa-snowflake fa-3x",
        small_iconName: "fas fa-snowflake fa-2x",
        gradient: ["#7DE2FC", "#B9B6E5"],
        title: "눈",
        subtitle: "눈이 내리고 있어요."
    },
    Clear: {
        main_iconName: "far fa-sun fa-3x",
        small_iconName: "fas fa-sun fa-2x",
        gradient: ["#FF7300", "#FEF253"],
        title: "맑음",
        subtitle: "야외 활동을 즐기세요."
    },
    Clouds: {
        main_iconName: "fas fa-cloud fa-3x",
        small_iconName: "fas fa-cloud fa-2x",
        gradient: ["#D7D2CC", "#304352"],
        title: "흐림",
        subtitle: "비가 올 수도 있으니 우산을 챙기세요."
    }
}

var api_key = '7868f8e28f1a94cfcd090d9583d1f949'

$(document).ready(function () {
    navigator.geolocation.getCurrentPosition(function (pos) {
        var latitude = pos.coords.latitude;
        var longitude = pos.coords.longitude;
        const current_url = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${api_key}&units=metric`;
        getJSON(current_url, function (err, data) {
            if (err !== null) {
                alert('Something went wrong: ' + err);
            } else {
                var temp = document.getElementById('temp');
                var condition_div = document.getElementById('condition');
                var weather_side = document.getElementById('weather_side');
                var condition = data.weather[0].main;
                var temp_min = data.main.temp_min;
                var temp_max = data.main.temp_max;
                var humidity = data.main.humidity;

                var condition_title = document.createElement('h1');
                var condition_subtitle = document.createElement('h3');
                var temp_min_list = document.createElement('h3');
                var temp_max_list = document.createElement('h3');
                var humidity_list = document.createElement('h3');
                condition_title.append(weatherOptions[condition].title);
                condition_subtitle.append(weatherOptions[condition].subtitle);

                temp_min_list.append('최저 온도: ' + Math.round(temp_min) + ' °C');
                temp_max_list.append('최고 온도: ' + Math.round(temp_max) + ' °C');
                humidity_list.append('습도: ' + humidity + ' %');

                weather_side.appendChild(temp_min_list);
                weather_side.appendChild(temp_max_list);
                weather_side.appendChild(humidity_list);

                temp.innerHTML = '<h1>' + Math.round(data.main.temp) + ' °C</h1>';
                condition_div.appendChild(condition_title);
                condition_div.appendChild(condition_subtitle);
                document.getElementById('weather_icon').className = weatherOptions[condition].main_iconName;
                
            };
        });
        
        const forecast_url = `https://api.openweathermap.org/data/2.5/forecast?lat=${latitude}&lon=${longitude}&appid=${api_key}&units=metric`;
        getJSON(forecast_url, function (err, data) {
            if (err !== null) {
                alert('Something went wrong: ' + err);
            } else {
                var list_length = data.list.length;
                var forecast_div = document.getElementById('forecast');
                for (i = 0; i < list_length; i++) {
                    var forecast_list = document.createElement('li');
                    var forecast_date = document.createElement('h3');
                    var forecast_temp = document.createElement('h3');
                    var condition_icon = document.createElement('i');
                    var forecast_condition = data.list[i].weather[0].main;

                    condition_icon.className = weatherOptions[forecast_condition].small_iconName;

                    forecast_date.append((data.list[i].dt_txt).replace(':00:00', '') + '시');
                    forecast_temp.append(Math.round(data.list[i].main.temp) + ' °C');
                    forecast_list.appendChild(forecast_date);
                    forecast_list.appendChild(condition_icon);
                    forecast_list.appendChild(forecast_temp);
                    forecast_div.appendChild(forecast_list);
                }
            };
        });
    });
});