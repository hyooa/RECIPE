<?php  include_once 'include/header.php';     ?>
<?php
        define($total,0);

        $conn = mysqli_connect("localhost","hyooa","a32316849^^","hyooa");
        $query = "select * from review";
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

        
        $sql = "select * from review limit $start, $list_num;";
        $result2 = mysqli_query($conn,$sql);

        function review(){
            global $result2;
            while($row = mysqli_fetch_array($result2)){
                echo "<tr>
                        <td>{$row['recipe']}</td>
                        <td><a href=\"reviewDetail.php?name={$row['recipe']}&no={$row['no']}\">{$row['title']}</a></td>
                        <td>{$row['id']}</td>
                        <td>{$row['date']}</td>
                    </tr>";
                }
        }

?>
    <div>
        <h2>REVIEW</h2>
        <p>다양한 레시피 후기들를 확인해보세요</p>
    </div>

    <!-- <div id=bestreview>
        <h3>금주의 BEST REVIEW</h3>
        <ul>
            <li><a href=""><img src="" alt=""></a></li>
            <li><a href=""><img src="" alt=""></a></li>
            <li><a href=""><img src="" alt=""></a></li>
            <li><a href=""><img src="" alt=""></a></li>
        </ul>
    </div> -->
    
    <div id="reviewDiv">
        <form action="">
            <table>
                <tr>
                    <th>레시피명</th>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일자</th>
                </tr>
                <?php  review();  ?>
                
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
    </div>



<?php  include_once 'include/footer.php';     ?>