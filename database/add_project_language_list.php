<?php
    include 'conn.php';

    $language = $_POST['language'];
    $color_id = $_POST['color_id'];

    if ($language == '' || $color_id == '') {
        echo "<script>window.alert('값을 입력해주세요.')</script>";
        echo "<script>history.back();</script>";
    } else {
        $insert_sql = "INSERT INTO project_language_list (name, color_id) VALUES ('$language', '$color_id');";

        $result = mysqli_query($conn, $insert_sql);

        if ($result == false) {
            echo "<script>window.alert('저장하는 과정에서 문제가 생겼습니다.')</script>";
        } else {
            echo "<script>window.alert('저장되었습니다.')</script>";
            echo "<script>location.href='../index.php';</script>";
        }
    }
?>