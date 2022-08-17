<?php

    session_start();

    $conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
    $query = "select * from members where id='{$_POST['userId']}'";
    $result = mysqli_query($conn, $query);

    if($result) {
        echo "로그인 성공";
     
    }else {
        echo "로그인 실패";
    }

    // 아이디 있는지, 비밀번호 맞는지
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);

        // 비밀번호 확인
        if($_POST['userPw'] == $row['pw']) {
            $_SESSION['userId'] = $_POST['userId'];
            // 아이디 있으면
            if(isset($_SESSION['userId'])) { ?>
                <script>
                    alert('로그인 되었습니다.');
                    location.replace('/php/RECIPE2/index.php');
                </script>
            <?php
            }

        } else { ?>
                <script>
                    alert('비밀번호가 틀렸습니다.');
                    location.replace('/php/RECIPE2/member/login.php');
                </script>
            <?php
        }

    } else { ?>
        <script>
            alert('아이디가 틀렸습니다.');
            location.replace('/php/RECIPE2/member/login.php');
        </script>
    <?php
    }

?>