<?php  include_once '../include/header.php'; ?>

    <div id="members">
        <div id="join">
            <h3>회원가입</h3>
            <form action="../process/join_process.php" method="post">
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" name="userId" required>아이디를 입력해주세요.(영문소문자/숫자, 4~16자)</td>
                    </tr>
                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" name="userPw" required>(영문 대소문자/숫자/특수문자 중 2가지 이상 조합, 10~16자)</td>
                    </tr>
                    <tr>
                        <td>비밀번호 확인</td>
                        <td><input type="password" name="userPwCh" required></td>
                    </tr>
                    <tr>
                        <td>이름</td>
                        <td><input type="text" name="userName" required></td>
                    </tr>
                    <tr>
                        <td>주소</td>
                        <td>
                            <input type="text" name="userAdd" id="address" required>
                            <button onclick="postSearch()">주소찾기</button>
                        </td>
                    </tr>
                    <tr id="tr">
                        <td colspan="2" id="td">
                            <button type="submit">회원가입</button>
                            <button type="reset">취소</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script>
        function postSearch() {
            new daum.Postcode({
                oncomplete: function(data) {
                    console.log(data);
                    document.querySelector('#address').value = data.address;
                }
            }).open();
        }
    </script>

<?php  include_once '../include/footer.php'; ?>