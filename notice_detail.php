<?php  include_once 'include/header.php';     ?>

<?php
    $conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
    $query = "select * from notice where id='{$_GET['id']}'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
?>

    <div>
        <h2>공지사항 상세보기</h2>
        <p></p>    
    </div>

    <div id="reviewDiv">
            <table>
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
                <tr>
                    
                    <?php
       if($_SESSION['userId']=='test'){
       echo "<td colspan='2'>
       <form class='fom' action='notice_edit.php' method='post'>
        <input type='hidden' value='{$row['no']}' name='no'>
       <button type='submit'>수정</button>
        </form>
        <form class='fom' action='/php/RECIPE2/process/notice_delete_process.php' method='post'>
            <input type='hidden' value='{$row['no']}' name='no'>
            <button type='submit'>삭제</button>
        </form>
        </td>";
            }       ?>         
                    
                </tr>
            </table>

    </div>

<?php  include_once 'include/footer.php';     ?>