<?php
    include 'conn.php';

    $title = $_POST['title'];
    $description = $_POST['description'];
    $github_url = $_POST['github_url'];
    $image_url = $_POST['image_url'];
    $language = $_POST['language'];

    if ($title == '' || $description == '' || $github_url == '' || $image_url == '' || $language == '') {
        echo "<script>window.alert('값을 입력해주세요.')</script>";
        echo "<script>history.back();</script>";
    } else {
        $insert_sql = "INSERT INTO project_list (title, description, github_url, image_url, language, uproad_date) VALUES ('$title', '$description', '$github_url', '$image_url', '$language', NOW())";
        
        $result = mysqli_query($conn, $insert_sql);
        
        if ($result == false) {
            echo "<script>window.alert('저장하는 과정에서 문제가 생겼습니다.')</script>";
        } else {
            echo "<script>window.alert('저장되었습니다.')</script>";
            echo "<script>location.href='../index.php';</script>";
        }
    }

?>