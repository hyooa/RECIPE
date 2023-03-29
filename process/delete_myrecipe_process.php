<?php

$revNo = $_GET['no'];
$conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
$query = "delete from myrecipe where no={$revNo}";
$result = mysqli_query($conn,$query);
echo $query;
if($result){
    echo "삭제되었습니다.";
}else{
    echo "삭제실패";
}
header('Location:/php/RECIPE2/member/mypage.php');


?>