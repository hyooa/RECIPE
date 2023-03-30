<?php  include_once 'include/header.php';     ?>
<?php
    session_start();
    $mname = $_GET['mname'];
    $conn = mysqli_connect("localhost","hyooa","a32316849^^","hjindo");
    $query = "select * from recipe where mname='{$mname}'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    $query1 = "select * from myrecipe where mname='{$mname}'";
    $result1 = mysqli_query($conn,$query1);
    $row1 = mysqli_fetch_array($result1);

?>
<div id="detail_page">

    <div id="poto">
        <h2><?=$mname?></h2>
        <span><img src="./imgs/<?=$row['mname']?>/<?=$row['topimg']?>" alt=""></span>
    </div>

    <div id="detail">
        <div id="text_left">
            <ul id="sns">
                <li id="sns_S">
                    <ul>
                       
                    </ul>
                </li>
                <li id="sns_text">
                    <p>
                    <?=$row['desc1']?>
                    </p>
                </li>
            </ul>

            <ul id="cook_recipe">
                <li>
                    <p>조리방법</p>
                    <ul id = 'hyo'>
                        
                    </ul>
                </li>
            </ul>
        </div>

        <div id="text_right">
            <div id="redBox">
                <ul>
                    <li>
                        <h2>준비시간</h2>
                        <p><?=$row['readyt']?></p>
                        <p>분</p>
                    </li>
                    <li>
                        <h2>조리시간</h2>
                        <p><?=$row['playt']?></p>
                        <p>분</p>
                    </li>
                    <li>
                        <h2>인분수</h2>
                        <p><?=$row['strength']?></p>
                        <p>인분</p>
                    </li>
                </ul>
            </div>
            <div id="heart_div">
                <a href="./writeReview.php?id=<?=$row['mname']?>"><p id="heart1"></p></a>
                <a href="./writeReview.php?id=<?=$row['mname']?>"><div id='review'>리뷰 작성</div></a>
                <a href="./process/create_myrecipe_process.php?mname=<?=$row['mname']?>&id=<?=$_SESSION['userId']?>&jpg=<?=$row['topimg']?>"><p id="heart2"></p></a>
                <?php
                if($_SESSION){
                if($mname == $row1['mname']) {
               echo "<a href='./process/delete_myrecipe_process.php?no={$row1['no']}&id={$_SESSION['userId']}&jpg={$row['topimg']}'><p id='heart2'><div id='review1'>찜❤취소</div></a>";
                }else{
                    echo "<a href='./process/create_myrecipe_process.php?mname={$row['mname']}&id={$_SESSION['userId']}&jpg={$row['topimg']}'><p id='heart2'><div id='review1'>찜❤하기</div></a>";
                }}else{
                    echo "<a href='./member/login.php'><p id='heart2'><div id='review1'>로그인</div></a>"; 
                }
                
                ?>
            
                </div>
            <div id="ready">
                <ul>
                    <p>준비재료</p>
                    <p>
                        <?=$row['ingredient']?>
                    </p>
                </ul>
            </div>
        </div>
    </div>

</div>
<script>
        let mname= "<?=$mname?>";
        let snsdata ="<?=$row['sns']?>";
        let sns = snsdata.split(" ");
        console.log(sns);
        let imgdata = "<?=$row['dtailimg']?>";
        let img = imgdata.split(",");
        img.pop();
        console.log(img);
        let desc2 = "<?=$row['desc2']?>";
        let desc = desc2.split("Step");
        desc.shift();
        console.log(desc);
        let sns_text = document.querySelector('#sns_S ul');
        console.log(sns_text);
        // 값받은거 확인. pop나 shift는 마지막 공백배열 하나씩 제거

        for(let i=0; i < sns.length; i++){
        sns_text.innerHTML += '<li>'+sns[i]+'</li>';
        }
        // #... 입력
        let hyo = document.querySelector('#hyo');
        // 입력할 ul 선택
        if(desc.length > img.length){
        for(let i=0; i < desc.length; i++){
            if(img[i]!=null){
        hyo.innerHTML += "<li><p><img src='./imgs/"+mname+'/'+img[i]+"'></p><p>Step"+(i+1)+"</p><p>"+desc[i]+"</p></li>"
            }else {
        hyo.innerHTML += "<li><p>Step"+(i+1)+"</p><p>"+desc[i]+"</p></li>"        
            }
        }}else{
            for(let i=0; i < img.length; i++){
                if(desc[i]!=null){
        hyo.innerHTML += "<li><p><img src='./imgs/"+mname+'/'+img[i]+"'></p><p>Step"+(i+1)+"</p><p>"+desc[i]+"</p></li>"
        }else {
            hyo.innerHTML += "<li><p><img src='./imgs/"+mname+'/'+img[i]+"'></p></li>"    
        }   
    }
        }
        // 각각 값을 받아와서 입력함
        // 이미지랑 step같은 경우 서로의 길이값을 비교해서 이미지가 클경우
        // desc값이 null이면 desc를 뺴고 이미지만 넣어줌.
        // 반대로 이미지값이 null이면 이미지만 넣어줌
        </script>

<?php  include_once 'include/footer.php';     ?>