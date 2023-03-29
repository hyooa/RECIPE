<?php

var_dump($_POST);
$revNo = $_POST['no'];
$conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
$query = "update review
        set
        `title` = '{$_POST['title']}',
        `id` = '{$_POST['id']}',
        `content` = '{$_POST['content']}',
        `date` = '{$_POST['date']}'
        where no= {$revNo}
        ";

$result = mysqli_query($conn,$query);
if($result){
    echo "리뷰수정 성공";
    echo $query;
}else{
    echo "리뷰수정 실패";
    echo $query;

}

header('Location:/php/RECIPE2/REVIEW.PHP');


?>