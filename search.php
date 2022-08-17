<?php  include_once 'include/header.php';     ?>

<?php

   session_start();

    $_SESSION['ser'] = $_GET["serch"];
    $searchname= $_SESSION['ser'];
    // // var_dump($row);

    function printList(){
        global $searchname;
        $conn = mysqli_connect("localhost","hjindo","jj6762^^","hjindo");
        $query = "select * from recipe where sns like '%".$searchname."%' or mname like '%".$searchname."%' group by mname";
        $result = mysqli_query($conn,$query);
      
       
       while($row = mysqli_fetch_array($result)){
        echo "
        <li>
            <div>
                
                    <a href='detail.php?mname={$row['mname']}'>
                        <img src='imgs/{$row['mname']}/{$row['mainimg']}' alt='best'>
                    </a>
                
                <p>{$row['mname']}</p>
            </div>
        </li>";
        }
    }
?>
<div id="searchresult">
    <ul>
        <h2>검색 결과</h2>
        <p><?=$searchname;?>(으)로 검색한 결과입니다.</p>
    </ul>
    <ul id="search_ul">
         <?php   printList();?> 
    </ul>
</div>


<?php  include_once 'include/footer.php';     ?>