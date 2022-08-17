<?php  include_once 'include/header.php';     ?>


<?php
    session_start();
?>
<div id="notice_write">
    <div id="notice">
        
        <div id="reviewDiv">
            <h2>공지사항 작성하기</h2>
            <form action="process/create_notice_process.php" method="post">
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
                <!-- <input type="hidden" value='< s=$row1['mname']?>' name='id'> -->
                <input type="hidden" value='<?=$_SESSION['userId']?>' name='id'>
                <input type="hidden" value='<?=date("Y/m/d")?>' name='date'>
                
            </form>
            
        </div>
    </div>
</div>



<?php  include_once 'include/footer.php';     ?>