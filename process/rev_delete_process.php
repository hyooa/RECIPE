<?php
session_start();
$revNo = $_POST['mname'];
$no = $_POST['delno'];
$conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
$query = "select * from review where no={$no}";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

if($row['id'] == $_SESSION['userId']){
    $query1 = "delete from review where no={$no}";
    $result1 = mysqli_query($conn,$query1);
    header('Location:/php/RECIPE2/REVIEW.PHP');
}else{
    // echo "자신의글만 수정가능합니다.";
    echo "<script> alert('자신의 글만 삭제 가능합니다.')
    history.back(1);
    </script>";

}

// if($result){
//     echo "삭제되었습니다.";

// }else{
//     echo "본인의 글만 삭제 가능합니다.";
// }



?>