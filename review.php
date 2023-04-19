<?php  include_once 'include/header.php';     ?>
<?php
        define($total,0);

        $conn = mysqli_connect("localhost","hyooa","a32316849^^","hyooa");
        $query = "select * from review";
        $result = mysqli_query($conn,$query);

        //페이징 관련 변수, 총 레코드 갯수
        $total = mysqli_num_rows($result);

        // 한 페이지당 레코드 갯수 5
        $list_num = 5; 

        // 한블럭당 페이지수 5
        $page_num = 5; 

        // 현재 페이지, 삼항식
        $page = isset($_GET['page']) ? $_GET['page'] : 1; 

        // 전체 페이지 수 = 총 레코드 수 / 한페이지당 레코드 갯수
        // ceil (올림), floor(내림), round(반올림)
        $total_page = ceil($total/$list_num); 

        // 전체 블럭수 = 전체 페이지 수 / 한블럭당 페이지 수
        $total_block = ceil($total_page/$page_num); 

        // 현재 블럭번호 = 현재 페이지번호 / 블럭당 페이지 수
        $now_block = ceil($page/$page_num); 

        // 블럭당 시작페이지 = (해당 글의 블럭 번호 -1) * 블럭당 페이지 수 +1
        $s_pageNum = ($now_block-1) * $page_num+1;

        // 데이터가 0인 경우
        if($s_pageNum == 0){
            $s_pageNum = 1;
        }

        // 블럭당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭당 페이지 수
        $e_pageNum = $now_block * $page_num;

        // 마지막 페이지 번호가 전체 페이지 수를 넘어가지 않도록
        if($e_pageNum > $total_page){
            $e_pageNum = $total_page;
        }

        // 시작 번호 = (현재 페이지 번호 -1) * 페이지당 보여질 데이터 수
        $start = ($page-1) * $list_num;

        // 시작 페이지 0, 총 몇개를 가져올거냐 ? 한 페이지당 5개
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
                } else {
                    ?>
                    <a href="review.php?page=<?=($page-1)?>">이전</a>
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