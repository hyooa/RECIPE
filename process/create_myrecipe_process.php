<?php
    var_dump($_GET);
    $conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
    $query = "INSERT INTO myrecipe (`mname`,`topimg`,`id`)
         VALUES('{$_GET['mname']}','{$_GET['jpg']}','{$_GET['id']}')";
    $result = mysqli_query($conn,$query);
    echo $result;

    header('Location:/php/RECIPE2/member/mypage.php');
?>