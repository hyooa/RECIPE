<?php  include_once 'include/header.php';     ?>

<?php
    

    $conn = mysqli_connect("localhost:3307","hyooa","!a32316849","hjindo");
        $query = "select * from recipe where best=3";
        $result = mysqli_query($conn,$query);
        $result2 = mysqli_query($conn,$query);
    
        $a0 = [];
        for($i=0; $i<4;$i++){
            $a0[$i] = mysqli_fetch_array($result2);    
        }  

?>

<div id="best_recipe">
    <div id="best_div">

        <div id="best_text">
       
            <div id="best_text_left">
                <h2>BEST</h2>
                <h1>RECIPE</h1>
                <p id="best_p1"></p>
            </div>
            <div id="best_text_img">
                <img src="imgs/바지락찜/23_바지락찜main.jpg" alt="">
            </div>
            <div id="best_text_right">
                <h2><a href="./detail.php?mname=바지락찜" id='dufjqns'>바지락찜</a></h2>
                <p></p>
                <p class="slidep">
                #안주 #해물찜 #얼큰칼칼 #미향 #마늘의민족 #스피드요리
                </p>
                <p id="best_p2"></p>
            </div>
        </div>

        <div id="best_slide">
            <!-- 복붙 😊 -->
            <section id="contents2">
                <ul id="hotrecipe">
                    <?php 
                    while($row = mysqli_fetch_array($result)){
      
                    echo "
                    <li class='slideli'>
                        <img src='imgs/{$row['mname']}/{$row['mainimg']}' class='slideimg'>
                        <p>{$row['mname']}</p>
                     </li> ";
                     
                    };
                    ?>
                </ul>
            </section>
        </div>

    </div>
</div>

<script>
            // 복붙 😊
                //인기레시피 슬라이드 script
                //li를 이동시키는건 x, ul을 시간의 변화에 따라 위치를 이동시키기!
                const hotrecipe = document.querySelector('#hotrecipe'); //이동시킬 ul
                let lihover = document.querySelectorAll('.slideli');
                console.log(lihover)
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
                }
                
                //slidemove를 시작시키는 함수
                function startMove(){
                    timer= setInterval(function(){
                        slidemove(current+1);
                    },2000
                    )
                }

                startMove(); 
                // 마우스 hover시 정지
                
                function stopIt() {
                     clearInterval(timer);
                  }

                  lihover.forEach(lid => {
                    lid.addEventListener('mouseenter', function(){
                    stopIt();
                  })
                  })

                  lihover.forEach(lid => {
                    lid.addEventListener('mouseleave', function(){
                    startMove();
                  })
                  })
                  
                
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

              
                let recipeArr = [
                    {
                        title:"<?=$a0[0]['mname']?>",
                        dest: "<?=$a0[0]['sns']?>",
                        img: "./imgs/<?=$a0[0]['mname']?>/<?=$a0[0]['mainimg']?>"
                    },{
                        title:"<?=$a0[1]['mname']?>",
                        dest: "<?=$a0[1]['sns']?>",
                        img: "./imgs/<?=$a0[1]['mname']?>/<?=$a0[1]['mainimg']?>"
                    },{
                        title:"<?=$a0[2]['mname']?>",
                        dest: "<?=$a0[2]['sns']?>",
                        img: "./imgs/<?=$a0[2]['mname']?>/<?=$a0[2]['mainimg']?>"
                    },{
                        title:"<?=$a0[3]['mname']?>",
                        dest: "<?=$a0[3]['sns']?>",
                        img: "./imgs/<?=$a0[3]['mname']?>/<?=$a0[3]['mainimg']?>"
                    },

                ]
                let atag = document.querySelector('#best_text_right h2 a')
                let ptag = document.querySelector('.slidep')
                let imgg = document.querySelector('#best_text_img img')
                let dufj = document.querySelector('#dufjqns')
                console.log(ptag)
                for(let b=0; b < lihover.length+1; b++){
                    lihover[b].addEventListener('click',function(){
                        document.querySelector('#best_text_left').style = 'animation: best1 1.5s';
                        document.querySelector('#best_text_img').style = 'animation: best2 1.5s';
                        document.querySelector('#best_text_right').style = 'animation: best3 1.5s';
                        ptag.innerHTML = recipeArr[b]['dest'];
                        atag.innerHTML = recipeArr[b]['title'];
                        imgg.src = recipeArr[b]['img'];
                        dufj.href = './detail.php?mname='+recipeArr[b]['title']
                        
                        setTimeout(function(){
                        document.querySelector('#best_text_left').style = 'animation: ';
                        document.querySelector('#best_text_img').style = 'animation:';
                        document.querySelector('#best_text_right').style = 'animation:';
                        },1500)
                        
                })}

               
        
</script>

<?php  include_once 'include/footer.php';     ?>