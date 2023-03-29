<?php  include_once 'include/header.php';     ?>
<?php
    session_start();
    $mname = $_GET['id'];
    $conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
    $query = "select * from review where recipe='{$mname}'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    
    $conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
    $query1 = "select * from recipe where mname='{$mname}'";
    $result1 = mysqli_query($conn1,$query1);
    $row1 = mysqli_fetch_array($result1);

    if(!$_SESSION['userId']){
        echo "<script> alert('로그인 후 이용해주세요.');
        history.back(1);
        </script>";
       
    }

?>

    <div>
        <h2>REVIEW 작성하기</h2>
        <p class='imgsize'> <img src="./imgs/<?=$row1['mname']?>/<?=$row1['topimg']?>"></p>
    </div>
    
    <div id="reviewDiv">
        <form action="process/create_review_process.php" method="post">
            <table>
                <tr>
                    <td>레시피</td>
                    <td>
                        <?=$row1['mname']?>
                    </td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td>
                        <?=$_SESSION['userId']?>
                    </td>
                </tr>
                <tr>
                    <td>작성일</td>
                    <td>
                        <?=date("Y/m/d");?>
                    </td>
                </tr>
                <tr>
                    <td>제목</td>
                    <td>
                        <input type="text" name="title">
                    </td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td>
                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">등록하기</button>
                        <button type="reset">취소</button>
                    </td>
                </tr>              
            </table>
            <input type="hidden" value='<?=$row1['mname']?>' name='recipe'>
            <input type="hidden" value='<?=$_SESSION['userId']?>' name='id'>
            <input type="hidden" value='<?=date("Y/m/d")?>' name='date'>
            
        </form>
        
    </div>



<?php  include_once 'include/footer.php';     ?>