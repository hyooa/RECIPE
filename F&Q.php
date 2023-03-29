<?php  include_once 'include/header.php';     ?>

<?php
        define($total,0);
        session_start();
        $conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
        $query = "select * from fnq";
        $result = mysqli_query($conn,$query);
        //페이징 관련 변수
        $total = mysqli_num_rows($result); //총 레코드 갯수

        $list_num = 5; //한 페이지당 레코드 갯수 5
        $page_num = 5; //한블럭당 페이지수 5
        $page = isset($_GET['page']) ? $_GET['page'] : 1; //현재 페이지
        $total_page = ceil($total/$list_num); //전체 페이지수 = 총 레코드수/한페이지당 레코드 갯수
        $total_block = ceil($total_page/$page_num); //전체 블럭수 = 전체 페이지수/한블럭당 페이지수
        $now_block = ceil($page/$page_num); //현재 블럭번호 = 현재 페이지번호/블럭당 페이지 수

        $s_pageNum = ($now_block-1)*$page_num+1; //블럭당 시작페이지

        if($s_pageNum<=0){
            $s_pageNum= 1;
        }

        $e_pageNum = $now_block*$page_num;

        if($e_pageNum>$total_page){
            $e_pageNum=$total_page;
        }

        $start = ($page-1)*$list_num;

        $sql = "select * from fnq limit $start, $list_num;";
        $result2 = mysqli_query($conn,$sql);

        function notice(){
            global $result2;
            while($row = mysqli_fetch_array($result2)){
                echo "<tr>
                        <td>{$row['no']}</td>
                        <td class='title'>{$row['title']}</td>
                        <td>{$row['id']}</td>
                        <td>{$row['date']}</td>
                    </tr>
                    <tr>
                        <td class='hiddcon' colspan='4'>{$row['content']}</td>
                    </tr>";
                }
        }
?>

<div id="notice">

    <div id="reviewDiv">
        <div>
            <h2>F&Q</h2>
            <p>자주 묻는 질문들에대한 답변입니다.</p>
        </div>
        <form action="">
            <table>
                <tr>
                    <th>no</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일자</th>
                </tr>
                <?php  notice();  ?>
                
            </table>
        </form>
        <!-- 페이징 -->
        <p class="pager">
            <!-- 이전버튼-->
            <?php
                if($page<=1){
                    ?>
                    <a href="review.php?page=1">이전</a>
                <?php
                }
            ?>
            <?php
                for($print_page=$s_pageNum; $print_page<=$e_pageNum; $print_page++){
                    ?>
                    <a href="review.php?page=<?=$print_page?>"><?=$print_page?></a>
                    <?php
                }
            ?>
            <!-- 다음버튼 -->
            <?php
                if($page>=$total_page){
                    ?>
                        <a href="review.php?page=<?=$total_page?>">다음</a>
                    <?php
                }else{
                    ?>
                    <a href="review.php?page=<?=($page+1)?>">다음</a>
                    <?php
                }
            ?>
        </p>
       <?php
       if($_SESSION['userId']=='test'){
       echo "<button><a href='./write_f&q.php'>F&Q 작성하기</a></button>";
       } 
 ?>
        </div>

</div>
<!-- 접었다 폈다하는 메뉴 -->
<script>
    //title 변수
    let title = document.querySelectorAll('.title');
    //title을 클릭했을때 해당하는 title의 부모요소의 옆의 요소 클래스 on 토글
    title.forEach((target)=>target.addEventListener("click", open));
    function open(){
        this.parentElement.nextElementSibling.classList.toggle('on');
    }3
    
</script>
<?php  include_once 'include/footer.php';     ?>