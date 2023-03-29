<?php
    // echo $_FILES['mainimg']['name'];
    // echo $_FILES['mainimg']['tmp_name'];
    // echo $_FILES['dtailimg']['name'];
    // echo $_FILES['dtailimg']['tmp_name'];
    // echo $_FILES['img1']['name'];
    // echo $_FILES['img1']['tmp_name'];
  
    for($i=0; $i <10; $i++){
        echo $_FILES['img'.$i]['name'];
        if($_FILES['img'.$i]['name'] != ""){
        $img = $img.$_FILES['img'.$i]['name'].',';
    }} // img사이에 , 넣어서 변수 생성해놓음
    $dname = $_POST['mname'];
    mkdir("C:\Apache24\htdocs\php\RECIPE2\imgs/$dname", 0777);
    //  move_uploaded_file(현재위치, 업로드할 위치);
     move_uploaded_file($_FILES['mainimg']['tmp_name'],
     "C:\Apache24\htdocs\php\RECIPE2\imgs/$dname/".$_FILES['mainimg']['name']);
     move_uploaded_file($_FILES['dtailimg']['tmp_name'],
     "C:\Apache24\htdocs\php\RECIPE2\imgs/$dname/".$_FILES['dtailimg']['name']);
     for($i=0; $i <10; $i++){
        if($_FILES['img'.$i]['name'] != ""){
     move_uploaded_file($_FILES['img'.$i]['tmp_name'],
     "C:\Apache24\htdocs\php\RECIPE2\imgs/$dname/".$_FILES['img'.$i]['name']);
        }
     } // 사진 업로드

     $conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
     $query = "insert into recipe(`mname`, `readyt`, `ingredient`, `playt`, `strength`, `sns`, `desc1`, `desc2`, `mainimg`, `dtailimg`,`topimg`)
             values('{$_POST['mname']}', {$_POST['readyt']}, '{$_POST['ingred']}',
             {$_POST['playt']}, {$_POST['strength']}, '{$_POST['sns']}', '{$_POST['desc1']}','{$_POST['desc2']}',
             '{$_FILES['mainimg']['name']}','$img','{$_FILES['dtailimg']['name']}' )";
 
     echo $query;
 
     $result = mysqli_query($conn, $query);
     if($result){
         echo '전송되었습니다.';
     }else{
         echo ' 실패했습니다.';
     }

       header('Location:../index.php');
?>