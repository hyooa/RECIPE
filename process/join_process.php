<?php
    $conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
    $query = "insert into members(`id`, `pw`, `name`, `address`)
    values (
        '{$_POST['userId']}',
        '{$_POST['userPw']}',
        '{$_POST['userName']}',
        '{$_POST['userAdd']}')
    ";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "가입 성공";
    }else {
        echo "가입 실패";
    }
    header('Location:../index.php');
?>