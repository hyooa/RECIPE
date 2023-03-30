<?php  include_once 'include/header.php';     ?>

<?php

   session_start();
    // // var_dump($row);

    function printList(){
        global $searchname;
        $conn = mysqli_connect("localhost","hyooa","a32316849^^","hjindo");
        $query = "select * from recipe where part=1";
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
        <h2>메인요리 레시피</h2>
        <p>김수한 선생님의 레시피로 근사한 메인요리를 완성해보세요😎</p>
    </ul>
    <ul id="search_ul">
         <?php   printList();?> 
    </ul>
</div>


<?php  include_once 'include/footer.php';     ?>