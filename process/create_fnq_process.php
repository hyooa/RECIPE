<?php
    $conn = mysqli_connect("localhost","hyooa","a32316849^^","hyooa");
$query = "INSERT INTO `fnq` (`id`, `date`, `title`, `content`)
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
    echo "fnq 작성했습니다.";
}else{
    echo "fnq 작성을 실패했습니다.";
}

header('Location:/php/RECIPE2/F&Q.php');

?>