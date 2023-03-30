<?php  include_once 'include/header.php';     ?>
<?php
    
        function printList(){
            $conn = mysqli_connect("localhost","hyooa","a32316849^^","hyooa");
            $query = "select * from recipe where best = 2";
            $result = mysqli_query($conn,$query);
            for($i=0; $i<6; $i++){
           $row = mysqli_fetch_array($result);
            echo "<li>
            <div>
            <a href='detail.php?mname={$row['mname']}'>
            <img src='imgs/{$row['mname']}/{$row['mainimg']}' alt='best'>
            </a><p>{$row['mname']}</p></div>
            </li>";
            }
        } // Best recipe 사진6장 넣기
        function printList2(){
            $conn2 = mysqli_connect("localhost","hyooa","a32316849^^","hyooa");
        $query2 = "select * from recipe where best = 1";
        $result2 = mysqli_query($conn2,$query2);
        for($i=0; $i<6; $i++){
            $row2 = mysqli_fetch_array($result2);

            echo "<li class='topli'>
        <div> <img src='imgs/{$row2['mname']}/{$row2['mainimg']}' ></div>
        <div id='div_bg'></div>
        <div>
            <p><a href='detail.php?mname={$row2['mname']}'>{$row2['sns']}</a></p>
            <p><a href='detail.php?mname={$row2['mname']}'>{$row2['mname']}</a></p>
        </div>
    </li>";
}
    }
        
?>
 
            <section id="visual">
                <div id="slidediv">
                <p>
                    김수한선생과 레시피의 만남
                </p>
                <h2>
                    간편하게 만들 수 있는 레시피
                </h2>
                
                <h2> 맛있게 따라해보세요! </h2>
                <h3>Homemade recipe</h3>
                    <div id='mainmenu'>
                     <span>한라봉 소르베</span>
                      <p>X</p> 
                     <span>데리야끼치킨 뚱샌드위치</span>
                     </div>
                <div id='mainmenu1'>  </div> 
                <div id='mainmenu2'>  </div>
                <!-- 메인메뉴 사진 2개 -->
            </section>
            </section>
            <div>
                <h2>추천 레시피</h2>
                <p>김수한 선생이 제안하는 레시피로 최고의 순간은 만들어 보세요.</p>
            </div>
            <section id="contents">
                    <ul class="content_ul">
                        <?=printList2();?>
                    </ul>
            </section>
            <div>
                <h2>인기 레시피</h2>
                <p>지금 가장 🔥핫한 선생님의 레시피를 확인해보세요</p>
            </div>
            <section id="contents2">
                <ul id="hotrecipe">
                    <li class="slideli" id="imgli1">
                        <a href='detail.php?mname=비어치킨'><img src="imgs/slide1.jpg" alt="" class="slideimg"></a>
                        <p><a href='detail.php?mname=비어치킨'>비어치킨</a></p>
                    </li>
                    <li class="slideli">
                        <a href='detail.php?mname=핫쵸코무스케이크'><img src="imgs/slide2.jpg" alt="" class="slideimg"></a>
                        <p><a href='detail.php?mname=핫쵸코무스케이크'>핫쵸코무스케이크</a></p>
                    </li>
                    <li class="slideli">
                        <a href='detail.php?mname=스테이크카레'><img src="imgs/slide3.jpg" alt="" class="slideimg"></a>
                        <p><a href='detail.php?mname=스테이크카레'>스테이크카레</a></p>
                    </li>
                    <li class="slideli">
                        <a href='detail.php?mname=바지락찜'><img src="imgs/slide4.jpg" alt="" class="slideimg"></a>
                        <p><a href='detail.php?mname=바지락찜'>바지락찜</a></p>
                    </li>
                </ul>
            </section>

            <div>
                <h2>BEST RECIPE</h2>
                <p>집밥김선생에서 가장 많은 사랑을 받은 레시피를 확인해보세요</p>
            </div>
            <section id="contents3">
                    <ul id="popular">
                    <?php printList();?>
                    </ul>
                

            </section>
            <script>
                 //mainmenu 슬라이드 변수 
                 let menuname = [];
                menuname = ['한라봉 소르베', '데리야끼치킨 뚱샌드위치', '순두부 열라면'
            ,'쿠시아게 카레퐁듀', '비빔만두', '카레토마토솥밥']; 
                // 메인글.. 필요하면 수정해야함
                let menu1 = document.querySelector('#mainmenu1'); // 왼쪽상품
                let menu2 = document.querySelector('#mainmenu2'); // 오른쪽상품
                let spa = document.querySelectorAll('#mainmenu span') // maindiv 상품이름
                let current1 = 1;
                let divleng = 1;

                //메인글 슬라이드 script
                function backchang(arrNum){
                        current1 = arrNum;
                        spa[0].innerHTML = menuname[current1-1];
                         spa[1].innerHTML =menuname[current1];
                         menu1.style.background = 'url(imgs/'+(current1)+'.jpg)'; 
                         menu2.style.background = 'url(imgs/'+(current1+1)+'.jpg)';  
                }
                function startIt(){
                    setInterval(function(){
                  divleng = current1 >= menuname.length-1 ? 1 : divleng + 2;
                    backchang(divleng);
              },3000)
              }
               // 3초에 한번 변경
              startIt();

                //인기레시피 슬라이드 script
                //li를 이동시키는건 x, ul을 시간의 변화에 따라 위치를 이동시키기!
                const hotrecipe = document.querySelector('#hotrecipe'); //이동시킬 ul

                let timer; //setinterval을 담을 변수
                let current = 0;

                //첫번째 자식요소를 복사해서 마지막에 추가하기
                const firstli = hotrecipe.firstElementChild;
                let cloneFirst = firstli.cloneNode(true);
                const lastli = hotrecipe.lastElementChild;
                hotrecipe.append(cloneFirst);
                let clonelast = lastli.cloneNode(true);
                hotrecipe.prepend(clonelast);

                //두번째, 세번째 자식요소도 복사해서 마지막에 추가하기
                const seconli = hotrecipe.children[2];
                // const thirli = hotrecipe.children[3];
                // const forli = hotrecipe.children[3];
                let cloneSecond = seconli.cloneNode(true);
                // let clonethird = thirli.cloneNode(true);
                // let clonefour = forli.cloneNode(true);
                hotrecipe.append(cloneSecond);
                // hotrecipe.append(thirli);
                // hotrecipe.append(forli);
                const slidelis = document.querySelectorAll('.slideli') //li
                const slideimgs = document.querySelectorAll('.slideimg');

                // 해결☆
                // 해답 : 1번을 제일마지막에 복사하기전에 마지막노드를 복사해야함.
                // 아니면 1번이 또 복사되버림 .. 그리고 복사된 마지막 노드를
                // 첫번째로 붙여넣어줌. 그래도 모자라서 2번도 복사해서 붙여넣어버림..

               //처음 시작화면이 2번째 자식노드가 정중앙에 위치..

                hotrecipe.style.width = (slidelis.length/3)*100 +'%';
                hotrecipe.style.left = -(current*100)+'%';

                slidelis.forEach((li,index)=>{
                    li.style.width=(100/slidelis.length)+'%';
                    li.style.left = (index*(100/slidelis.length))+'%';
                })

                //ul위치를 변경시키는 함수 만들기
                function slidemove(imgNum){
                    hotrecipe.style.transition = '0.5s';
                    hotrecipe.style.left = -(imgNum*33.33)+'%';
                    current = imgNum;
                    if(imgNum==4){
                        firstCurrent();
                    }
                    if(imgNum==0){
                        lastCurrent();
                    }
                    console.log(imgNum);
                }
                
                //slidemove를 시작시키는 함수
                function startMove(){
                    timer= setInterval(function(){
                        slidemove(current+1);
                    },2000
                    )
                }

                startMove(); 

                
                function firstCurrent(){
                    setTimeout(function(){
                        hotrecipe.style.transition = '0s';
                        hotrecipe.style.left = -(0*100)+'%';
                        current = 0;
                    },500)
                };
                function lastCurrent(){
                    setTimeout(function(){
                        hotrecipe.style.transition = '0s';
                        hotrecipe.style.left = -(4*100)+'%';
                        current = 4;
                    },500)
                };
                //인기레시피 슬라이드//

                
            </script>
            <?php  include_once 'include/footer.php';     ?>