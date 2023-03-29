<?php  include_once 'include/header.php';     ?>
<?php
    session_start();
    $revNo = $_POST['no'];
    $conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
    $query = "select * from review where no={$revNo}";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    if($_SESSION['userId'] !== $row['id']){
        echo "<script> alert('자신의 글만 수정 가능합니다.');
        history.back(1);
        </script>";
        // header('Location:/php/RECIPE2/REVIEW.PHP');
    }
?>

<div>
        <h2>REVIEW 수정하기</h2>
        <p>리뷰를 수정해주세요</p>
    </div>
    
    <div id="reviewDiv">
        <form action="process/edit_review_process.php" method="post">
            <table>
                <tr>
                    <td>레시피</td>
                    <td>
                <?=$row['recipe']?>
                    </td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td>
                    <input type="hidden" value='<?=$revNo?>' name='no'>
                    <input type="hidden" value='<?=$row['id']?>' name='id'>
                    <input type="hidden" value=<?=$row['date']?> name='date'>
                    <?=$row['id']?>
                    </td>
                </tr>
                <tr>
                    <td>작성일</td>
                    <td>
                    <?=$row['date']?>
                    </td>
                </tr>
                <tr>
                    <td>제목</td>
                    <td>
                        <input type="text" name="title" require value="<?=$row['title']?>" >
                    </td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td>
                        <textarea name="content" id="" cols="30" rows="10">
                        <?=$row['content']?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit">수정</button>
                        <button type="reset">취소</button>
                    </td>
                </tr>              
            </table>
            
        </form>
        
        <script>
                function imageChange(input){
                    if(input.value==""){
                        document.querySelector('#imglabel').innerHTML ="선택파일 없음";

                    }else{
                        let valueArr = input.value.split('\\');
                        console.log(valueArr);
                        document.querySelector('#imglabel').innerHTML = valueArr[valueArr.length-1];
                    }
                    
                }
        </script>
        
    </div>




<?php  include_once 'include/footer.php';     ?>