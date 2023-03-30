<?php  include_once 'include/header.php';     ?>

<?php

   session_start();
    // // var_dump($row);

    function printList(){
        global $searchname;
        $conn = mysqli_connect("localhost","hyooa","a32316849^^","hjindo");
        $query = "select * from recipe";
        $result = mysqli_query($conn,$query);
      
       
       while($row = mysqli_fetch_array($result)){
        echo "
        <li>
            <div>
                <a href='detail.php?mname={$row['mname']}'>
                    <img src='imgs/{$row['mname']}/{$row['mainimg']}' alt='best'>
                    <p>{$row['mname']}</p>
                    </a>
               
            </div>
        </li>";
        }
    }
?>
<div id="searchresult">
    <ul>
        <h2>레시피 모두보기</h2>
        <p>김수한 선생님의 모든 레시피를 한눈에 확인해보세요😎</p>
    </ul>
    <ul id="search_ul">
         <?php   printList();?> 
    </ul>
</div>


<?php  include_once 'include/footer.php';     ?>