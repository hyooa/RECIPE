<?php

$conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
$query = "delete from notice where no='{$_POST['no']}'";
$result = mysqli_query($conn, $query);

if($result) {
    echo "삭제 완료.";
} else {
    echo "실패";
}

echo $query;
header('Location:../notice.php');

?>