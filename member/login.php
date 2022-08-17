<?php include_once '../include/header.php' ?>
    <?php 
    $log = $_GET['log'];
    // echo "<script>alert('로그인 먼저 해주세요.');</script>";
    ?>
    <div id="members">
        <div id="login">
            <h3>로그인</h3>
            <form action="../process/login_process.php" method="post">
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" name="userId" required></td>
                    </tr>
                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" name="userPw" required></td>
                    </tr>
                    <tr id="tr">
                        <td colspan="2" id="td">
                            <button type="submit">로그인</button>
                            <button type="reset">취소</button>
                            <button type="button"><a href="/php/RECIPE2/member/join.php">회원가입</a></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
            
<?php include_once '../include/footer.php' ?>