</div>
<?php  session_start();      ?>
<footer>
    <div>
        <h1><a href="/php/RECIPE2/index.php">집밥 김선생</a></h1>
    </div>
    <div>
        <ul>
            <strong>Customer Center</strong>
            <p>070-8680-2445</p></br>
            <p>문의시간 : 09:00 - 18:00(Lunch 12:00-13:00)</p></br>
            <p>Sat, Sun / Holiday OFF</p></br>
        </ul>
        <ul id="lis">
            <li>
                <strong>Service</strong>
                <p><a href="/php/RECIPE2/notice.php">공지사항</a></p></br>
                <p><a href="/php/RECIPE2/F&Q.php">자주 묻는 질문</a></p></br>
                <p><a href="/php/RECIPE2/notice.php">레시피 문의</a></p></br>
                <p><a href="/php/RECIPE2/REVIEW.php">레시피 후기</a></p></br>
            </li>
            <li>
                <strong>My Page</strong>
                <!-- 마이페이지 세션 아이디 없으면 로그인창으로 연결하기 -->

                <p>
                    <?php
                        if(isset($_SESSION['userId'])){
                        echo"<a href='/php/RECIPE2/member/mypage.php'>마이페이지</a>";}
                        else{echo"<a href='/php/RECIPE2/member/login.php?log=2'>마이페이지</a>";}
                        ?>
                </p></br>
                <p><a href="/php/RECIPE2/member/login.php">로그인</a></p></br>
                <p><a href="/php/RECIPE2/member/join.php">회원가입</a></p></br>
            </li>
            <li>
                <strong>Social</strong>
                <p><a href="https://www.instagram.com/">인스타그램</a></p></br>
                <p><a href="https://www.facebook.com/">페이스북</a></p></br>
                <p><a href="https://www.youtube.com/channel/UCtAWwhUGQLiOYl-QuguQ5-w">유튜브</a></p></br>
            </li>
        </ul>
    </div>
    <div>
        <ul>
            <strong>About</strong></br>
            <p>상호명 : 집밥 김선생</p>
            <p>대표 : 김수한</p>
            <p>사업자번호 : 000-00-00000</p>
            <p>주소 : 울산광역시 남구 삼산동 그린컴퓨터학원 3층 303호</p>
        </ul>
        <ul id="lang">
            <strong>Languages</strong></br>
            <select name="" id="">
                <option value="한국어">KR</option>
                <option value="영어">EN</option>
                <option value="중어">中文</option>
                <option value="일어">日文</option>
            </select>
        </ul>
    </div>
    <div>
        <p>Copyright ⓒ ottogi co.,Ltd All Rights Reserved.</p>
    </div>
    <button class="top" onclick="btnTop()"></button>
</footer>
</div>

<script>
    function btnTop() {
        window.scrollTo({top:0, behavior:"smooth"});
    }
</script>
</body>
</html>