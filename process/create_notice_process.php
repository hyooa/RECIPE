<?php
$conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
$query = "INSERT INTO `test`.`notice` (`id`, `date`, `title`, `content`)
values(
    '{$_POST['id']}',
    '{$_POST['date']}',
    '{$_POST['title']}',
    '{$_POST['content']}'
)";
echo $query;
var_dump ($query);

$result = mysqli_query($conn,$query);

if($result){
    echo "공지 작성했습니다.";
}else{
    echo "공지 작성을 실패했습니다.";
}

header('Location:/php/RECIPE2/notice.php');

?>