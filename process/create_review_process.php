<?php

session_start();
if($_SESSION['userId']){
    echo "<script> alert('로그인 후 이용해주세요.');
    history.back(1);
    </script>";  
}
$conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
$query = "INSERT INTO review (`recipe`, `title`, `id`,`date`, `content`)
values(
'{$_POST['recipe']}',
'{$_POST['title']}',
'{$_POST['id']}',
'{$_POST['date']}',
'{$_POST['content']}'
)";
echo $query;
$result = mysqli_query($conn,$query);
if($result){
    echo "게시글을 작성했습니다.";
}else{
    echo "게시글 작성을 실패했습니다.";
}

header('Location:/php/RECIPE2/REVIEW.PHP');

?>