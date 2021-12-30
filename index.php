<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <script src="js/jquery.js"></script>
    <script src="js/now_time.js"></script>
    <script src="js/app_load.js"></script>
    <script src="js/project_select.js"></script>
    <script src="js/search.js"></script>
    <script src="js/setting_select.js"></script>
    <script src="js/pw_chk.js"></script>
    <script src="js/calendar.js"></script>
    <script src="js/send_email.js"></script>
    <script src="js/weather.js"></script>
    <title>개발자 석민👨‍💻</title>
</head>

<body onload="now_time(), setting(), calendar()">
    <div id="header">
        <nav>
            <div id="logo">
                <h1><a href="index.php">개발자 석민👨‍💻</a></h1>
            </div>
            <ul id="topic">
                <li>
                    <p id="time"></p>
                </li>
            </ul>
        </nav>
    </div>
    <div id="wrap">
        <div id="contents">
            <div class="icon">
                <img src="img/folder.png" alt="project" id="folder" class="app_icon">
                <p>Project</p>
            </div>
            <div class="icon">
                <img src="img/calendar.png" alt="calendar" id="calendar" class="app_icon">
                <p>Calendar</p>
            </div>
            <div class="icon">
                <img src="img/safari.png" alt="safari" id="safari" class="app_icon">
                <p>Safari</p>
            </div>
            <div class="icon">
                <img src="img/mail.png" alt="mail" id="mail" class="app_icon">
                <p>Mail</p>
            </div>
        </div>
        <div class="popup" id="folder_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <?php include 'database/project_language_list.php' ?>
            <div class="popup_contents" id="folder_contents">
                <?php include 'database/project_list.php' ?>
            </div>
        </div>
        <div class="popup" id="calendar_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <div class="popup_side">  
                <ul id="calendar_side">

                </ul>
            </div>
            <div class="popup_contents" id="calendar_contents">
                <div id="YM"></div>
                <table id="calendar">
                    <thead>
                        <tr>
                            <td>Sun</td>
                            <td>Mon</td>
                            <td>Tue</td>
                            <td>Wed</td>
                            <td>Thu</td>
                            <td>Fri</td>
                            <td>Sat</td>
                        </tr>
                    </thead>
                    <tbody id="calendar_body">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="popup" id="safari_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <div class="popup_contents" id="safari_contents">
                <div id="logo">
                    <img src="img/google.png">
                </div>
                <div id="search">
                    <span></span>
                    <input type="text" name="search" id="search_input" autocomplete="off">
                </div>
            </div>
        </div>
        <div class="popup" id="mail_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <div class="popup_contents">
                <div id="mail_form">
                    <p>보내는 사람: </p><input type="email" name="email_address" id="email_address" placeholder="Email Address" autocomplete="off">
                    <p>보낼 내용: </p><textarea name="email_body" id="email_body" cols="30" rows="10" style="resize: none;" placeholder="Text" autocomplete="off"></textarea>
                    <input type="submit" value="전송" id="email_send_btn">
                </div>
            </div>
        </div>
        <div class="popup" id="setting_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <div class="popup_side">
                <ul>
                    <li class="fake_list">
                        <p>프로젝트 언어 추가</p>
                    </li>
                    <li class="fake_list">
                        <p>프로젝트 추가</p>
                    </li>
                    <li id="project_language_list" class="setting_list" style="display: none;">
                        <p>프로젝트 언어 추가</p>
                    </li>
                    <li id="project_list" class="setting_list" style="display: none;">
                        <p>프로젝트 추가</p>
                    </li>
                </ul>
            </div>
            <div class="popup_contents" id="setting_contents">
                <div id="login">
                    <h1>Login</h1>
                    <input type="text" id="pw" autocomplete="off">
                    <input type="button" value="Login" id="login_btn">
                </div>
                <div id="project_language_list_form" class="form" style="display: none;" name="project_language_list_form">
                    <form action="database/add_project_language_list.php" method="post">
                        <h1>프로젝트 언어 추가</h1>
                        <label for="language">언어 이름: </label><input type="text" id="language" name="language" autocomplete="off">
                        <label for="color_id">언어 대표 색상코드: </label><input type="text" id="color_id" name="color_id" autocomplete="off">
                        <input type="submit" value="전송">
                    </form>
                </div>
                <div id="project_list_form" class="form" style="display: none;" name="project_list_form">
                    <form action="database/add_project_list.php" method="post">
                        <h1>프로젝트 추가</h1>
                        <label for="title">제목: </label><input type="text" id="title" name="title" autocomplete="off">
                        <label for="description">설명: </label><input type="text" name="description" id="description" autocomplete="off">
                        <label for="github_url">깃허브 주소: </label><input type="text" name="github_url" id="github_url" autocomplete="off">
                        <label for="image_url">이미지 주소: </label><input type="text" name="image_url" id="image_url" autocomplete="off">
                        <label for="language">언어 종류</label><input type="text" name="language" id="language" autocomplete="off">
                        <input type="submit" value="전송" style="margin-bottom: 30px;">
                    </form>
                </div>
            </div>
        </div>

        <div class="popup" id="contact_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <div class="popup_contents">
                <div id="memoji">
                    <img src="img/memoji.png" alt="memoji">
                    <h1>Seokmin Lee</h1>
                </div>
                <div id="contact_route">
                    <li id="email_route">
                        <span></span>
                        <h4>dltjrals13@naver.com</h4>
                    </li>
                    <li id="github_route">
                        <span></span>
                        <h4><a href="https://github.com/seokmin12" target="_blank">seokmin12</a></h4>
                    </li>
                    <li id="insta_route">
                        <span></span>
                        <h4><a href="https://www.instagram.com/min_e_coder/" target="_blank">@min_e_coder</a></h4>
                    </li>
                </div>
            </div>
        </div>

        <div class="popup" id="weather_popup">
            <div class="popup_header">
                <span class="red"></span>
                <span class="yellow"></span>
                <span class="green"></span>
            </div>
            <div class="popup_side">
                <ul id="weather_side"></ul>
            </div>
            <div class="popup_contents" id="weather_contents">
                <div id="weather_main">
                    <div id="temp"></div>
                    <div id="condition"><i id="weather_icon"></i></div>
                    <div id="forecast"></div>
                </div>
            </div>
        </div>

        <div id="dock">
            <div>
                <img src="img/setting.png" alt="setting" id="setting" class="app_icon" style="cursor: pointer;">
                <img src="img/contact.png" alt="contact" id="contact" class="app_icon" style="cursor: pointer;">
                <img src="img/weather_app.png" alt="weather" id="weather" class="app_icon" style="cursor: pointer;">
            </div>
        </div>
</body>

</html>
