<?php  include_once 'include/header.php';     ?>
<?php

    $mname = $_GET['name'];
    $no = $_GET['no'];
    $conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
    $query = "select * from review where no={$no}";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    $conn1 = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
    $query1 = "select * from recipe where mname='{$mname}'";
    $result1 = mysqli_query($conn1,$query1);
    $row1 = mysqli_fetch_array($result1);
?>

    <div>
        <h2>리뷰 상세보기</h2>
        <p></p>    
    </div>

    <div id="reviewDiv">
            <table>
  
                <tr>
                <td colspan='2'>          
                    <p class='imgsize'><img src="./imgs/<?=$row1['mname']?>/<?=$row1['topimg']?>"></p></td>
                </tr>
               <tr>
                    <td>레시피</td>
                    <td><?=$row['recipe']?></td>
                </tr>
                <tr>
                    <td>제목</td>
                    <td><?=$row['title']?></td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td><?=$row['id']?></td>
                </tr>
                <tr>
                    <td>작성일자</td>
                    <td><?=$row['date']?></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td>
                        <?=$row['content']?>
                    </td>
                </tr>
                <?php 
                    if($_SESSION['userId']){
                        echo "
                        <tr>
                        <td colspan='2'>
                            <form class='fom' action='rev_edit.php' method='post'>
                                <input type='hidden' value={$row['no']} name='no'>
                                <button type='submit'>수정</button>
                            </form>
                            <form class='fom' action='process/rev_delete_process.php' method='post'>
                            <input type='hidden' value='{$row['recipe']}' name='mname'>
                                <input type='hidden' value='{$row['id']}' name='id'>
                                <input type='hidden' value={$row['no']} name='delno'>
                             <button type='submit'>삭제</button>
                            </form>
                        </td>
                    </tr>";

                    }
                ?>
               
            </table>

    </div>


<?php  include_once 'include/footer.php';     ?>