<?php include_once '../include/header.php' ?>
<?php
    session_start();
    $id = $_SESSION['userId'];
     $conn = mysqli_connect("localhost","root","3333","hjindo");
     $query = "select * from review where id = '$id'";
     $result = mysqli_query($conn,$query);
     function review(){
        global $result;
        while($row = mysqli_fetch_array($result)){
            echo "<tr>
                    <td>{$row['recipe']}</td>
                    <td><a href='/php/RECIPE2/reviewDetail.php?name={$row['recipe']}&no={$row['no']}'>{$row['title']}</a></td>
                    <td>{$row['id']}</td>
                    <td>{$row['date']}</td>
                </tr>";
            }
    }
    function join_name(){
        global $conn;
        global $id;
        $query3 = "select * from review inner join members on members.id = review.id where review.id = '$id'";
        $result3 = mysqli_query($conn,$query3);
        $row3 = mysqli_fetch_array($result3);
        
        echo "{$row3['name']}님이";
    }
    function myrecipe(){
        global $conn;
        global $id;
        $query2 = "select * from myrecipe where id = '$id'";
        $result2 = mysqli_query($conn,$query2);
        while($row = mysqli_fetch_array($result2)){
           echo "<a href='../detail.php?mname={$row['mname']}'> 
                <li><img src='../imgs/{$row['mname']}/{$row['topimg']}'></li>
                <li>{$row['mname']}</li></a>
                <a href='../process/delete_myrecipe_process.php?no={$row['no']}'>삭제</a>

            ";
        }
    }
?>


    <div id="mypage_members">
        <div id='myrecipe'>
            <h3>💕<?php join_name();?> 찜한 레시피💕</h3>
            <ul>
            <?=myrecipe();?>
            </ul>
        </div>
        <!--  -->
        <div class='my_review'>
            <h3><?php join_name();?> 작성한 리뷰✍</h3>
            <table>
                <tr>
                    <th>레시피명</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일자</th>
                </tr>
                <?php  review();  ?>
                

            </table>

        </div>
    </div>
            
<?php include_once '../include/footer.php' ?>