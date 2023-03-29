<?php

var_dump($_POST);
$conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
$query = "update notice
        set
        `title` = '{$_POST['title']}',
        `content` = '{$_POST['content']}',
        `date` = '{$_POST['date']}'
        where no='{$_POST['no']}'
        ";

$result = mysqli_query($conn,$query);

if($result){
    echo "공지수정 성공";
    echo $query;
}else{
    echo "공지수정 실패";
    echo $query;
}

header('Location:/php/RECIPE2/notice.php');


?>