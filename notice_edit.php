<?php  include_once 'include/header.php';     ?>


<?php
    session_start();
    $conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
    $query = "select * from notice where no='{$_POST['no']}'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
?>
<div id="notice_write">
    <div id="notice">
        
        <div id="reviewDiv">
            <h2>공지사항 수정하기</h2>
            <form action="process/edit_notice_process.php" method="post">
                <table>
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
                            <input type="text" name="title" required value="<?=$row['title']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td>
                            <textarea name="content" id="" cols="30" rows="10" required><?=$row['content']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">수정하기</button>
                            <button type="reset">취소</button>
                        </td>
                    </tr>              
                </table>
                <!-- <input type="hidden" value='< s=$row1['mname']?>' name='id'> -->
                <input type="hidden" value="<?=$_POST['no']?>" name='no'>
                <input type="hidden" value='<?=date("Y/m/d")?>' name='date'>
                
            </form>
            
        </div>
    </div>
</div>

<?php  include_once 'include/footer.php';     ?>