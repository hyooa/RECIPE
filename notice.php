<?php  include_once 'include/header.php';     ?>

<?php
        define($total,0);
        session_start();
        $conn = mysqli_connect("localhost:3307","hyooa","a32316849^^","hjindo");
        $query = "select * from notice";
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

        $sql = "select * from notice limit $start, $list_num;";
        $result2 = mysqli_query($conn,$sql);

        function notice(){
            global $result2;
            while($row = mysqli_fetch_array($result2)){
                echo "<tr>
                        <td>{$row['title']}</td>
                        <td><a href=\"notice_detail.php?id={$row['id']}\">{$row['content']}</a></td>
                        <td>{$row['id']}</td>
                        <td>{$row['date']}</td>
                    </tr>";
                }
        }
?>

<div id="notice">

    <div id="reviewDiv">
        <div>
            <h2>공지사항</h2>
            <p>최고의 맛을 요리하는 집밥 김선생이 되겠습니다.</p>
        </div>
        <form action="">
            <table>
                <tr>
                    <th>제목</th>
                    <th>내용</th>
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
       echo "<button><a href='./write_notice.php'>공지 작성하기</a></button>";
       } 
 ?>
        </div>

    <div id="stress1">
        <h2>고객불만 처리 철차</h2>
        <p>※24시간내 접수 응답, 원인분석은 필요시 시간이 소요될 수 있습니다.</p>
        <div>
            <ul>
                <ul>
                    <li>
                        <ul>
                            <p id="red">01</p>
                        </ul>
                    </li>
                    <li>
                        <img src="./notice_img/icon_01_01.png" alt="">
                        <p>
                            고객의 소리 접수<br>
                            (ARS/홈페이지/문자)
                        </p>
                    </li>
                </ul>
            </ul>
            <ul>
                <ul>
                    <li>
                        <ul>
                            <p id="red">02</p>
                        </ul>
                    </li>
                    <li>
                        <img src="./notice_img/icon_01_02.png" alt="">
                        <p>원인분석</p>
                    </li>
                </ul>
            </ul>
            <ul>
                <ul>
                    <li>
                        <ul>
                            <p id="red">03</p>
                        </ul>
                    </li>
                    <li>
                        <img src="./notice_img/icon_01_03.png" alt="">
                        <p>고객답변</p>
                    </li>
                </ul>
            </ul>
        </div>
        
    </div>
    <div id="stress2">
        <h2>고객불만사항 접수 방법</h2>
        <div>
            <ul>
                <li><img src="./notice_img/icon_05_01.png" alt=""></li>
                <h3>무료전화상담</h3>
                <li>
                    문의시간 : 09:00 - 18:00<br>(Lunch 12:00-13:00)<br>
                    Sat, Sun / Holiday OFF
                </li>
            </ul>
            <ul>
                <li><img src="./notice_img/icon_05_02.png" alt=""></li>
                <h3>홈페이지 접수</h3>
                <li>
                    홈페이지 :<br>
                    www.green.com
                </li>
            </ul>
            <ul>
                <li><img src="./notice_img/icon_05_05.png" alt=""></li>
                <h3>문자상담(발신자 부담)</h3>
                <li>
                    문의시간 : 09:00 - 18:00<br>(Lunch 12:00-13:00)<br>
                    Sat, Sun / Holiday OFF<br>
                    요금제에 따른 문자전송료 발생<br>
                    (별도 정보 이용료없음)
                </li>
            </ul>
        </div>
        
    </div>
</div>

<?php  include_once 'include/footer.php';     ?>