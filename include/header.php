<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>집밥 김선생</title>
    <link rel="stylesheet" type="text/css" href="/php/RECIPE2/css/style.css?after">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>
    <div id="wrap">
        <header>
                <div id="header_top">
                <a href="/php/RECIPE2/index.php"><img src="/php/RECIPE2/imgs/logo.PNG" alt=""></a>
                    <div id="search">
                      
                    <form action="/php/RECIPE2/search.php" >
                            <input type="text" name="serch" placeholder="검색어를 입력하세요">
                            <p></p>
                            <button id='hidde' type="submit">검색하기</button>
                    </form>
                        
                    </div>
                    <nav id="member">
                        <ul>
                            <li>
                                <?php

                                if($_SESSION['userId']){
                                echo "<p>{$_SESSION['userId']} 님<br/> 환영합니다.</p>";
                                }
                                ?>

                            </li>
                            <li>
                            <?php  
                                    if(isset($_SESSION['userId'])){
                                        echo "<a href='/php/RECIPE2/process/logout_process.php'>로그아웃</a>
                                        <li><a href='/php/RECIPE2/member/mypage.php?={$_SESSION['userId']}'>마이페이지</a></li>";
                                    } else{
                                        echo "<a href='/php/RECIPE2/member/login.php'>로그인</a>
                                        <li><a href='/php/RECIPE2/member/join.php'>회원가입</a></li>";
                                    }      
                                ?>
                                </li> 

                            <?php if($_SESSION['userId']=='test'){
                            echo "<li><a href='/php/RECIPE2/writerecipe.php'>레시피작성</a></li>";

                            }?>
                        </ul>
                    </nav>
                </div>
                <nav id="menu">
                    <ul>
                        <li id="category">
                                <span>카테고리</span>
                                <ul id="left_menu">
                                    <div class="triangle"></div>
                                    <li id="li_one">
                                        <span>
                                            <a href="/php/RECIPE2/category_total_recipe.php">레시피</a>
                                            <ul>
                                                <li><a href="/php/RECIPE2/category_total_recipe.php">전체보기</a></li>
                                                <li><a href="/php/RECIPE2/category_main_recipe.php">메인요리</a></li>
                                                <li><a href="/php/RECIPE2/category_rice_recipe.php">식사류</a></li>
                                                <li><a href="/php/RECIPE2/category_desert_recipe.php">간식</a></li>
                                                <p></p>
                                            </ul>
                                        </span>
                                    </li>
                                    <li id="li_two">
                                        <span>
                                            <?php
                                                if(isset($_SESSION['userId'])){
                                                    echo"<a href='/php/RECIPE2/member/mypage.php'>마이페이지</a>";}
                                                else{echo"<a href='/php/RECIPE2/member/login.php?log=2'>마이페이지</a>";}
                                            ?>
                                        </span>
                                    </li>
                                    <li id="li_three">
                                        <span>
                                            <a>서비스</a>
                                            <ul>
                                                <li><a href="/php/RECIPE2/notice.php">공지사항</a></li>
                                                <li><a href="/php/RECIPE2/F&Q.php">F&Q</a></li>
                                                <li><a href="/php/RECIPE2/review.php">레시피 후기</a></li>
                                                <p></p>
                                            </ul>
                                        </span>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <span><a href="/php/RECIPE2/best_recipe.php">BEST RECIPE</a></span></li> 
                        <!-- <li><span><a href="/php/RECIPE2/menu2.php">신상 레시피</a></span></li> -->
                        <li><span><a href="/php/RECIPE2/review.php">REVIEW</a></span></li>
                    </ul>
                </nav>
        </header>
        <div id="container">