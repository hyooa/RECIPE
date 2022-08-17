<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/php/RECIPE2/css/style.css">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

<!-- 처음 들어갈 때 🐥 -->
<script  src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

</head>
<body>

<script>
// 처음 들어갈 때 🐥

// function start_alert(alert) {
    Swal.fire({
        // title: '집밥 김선생',
        // text: '환영합니다 ~',
        width: 400,
        padding: 10,
        color: '#716add',
        background: '#fff',
        backdrop: `
            #f06141d3
            url("./imgs/뛰는오구.jpg")
            center bottom
        `,
        // backdrop: `
        //     #f06141d3
        //     url("./음식.gif")
        //     center center/100%
        //     no-repeat
        // `,

        imageUrl: './imgs/logo.PNG',
        imageWidth: 400,
        imageHeight: 300,
        imageAlt: 'Custom image',

        showClass: {
            popup: 'animate__animated animate__zoomIn'
        },
        hideClass: {
            popup: 'animate__animated animate__zoomOut'
        },

        showCancelButton: true,
        confirmButtonColor: '#5b3d77',
        // confirmButtonText: '로그인',
        confirmButtonText: '<a href="/php/RECIPE2/member/login.php">로그인</a>',
        cancelButtonColor: '#333',
        cancelButtonText: "<a href='/php/RECIPE2/index.php'>둘러보기</a>",

        // timer: 3000,
        // timerProgressBar: true,
        // didOpen: (toast) => {
        //     toast.addEventListener('mouseenter', Swal.stopTimer)
        //     toast.addEventListener('mouseleave', Swal.resumeTimer)
        // },

// $(document).ready(
//             function () {
//                 // [!] bind(), click() 메서드와 다리 one() 메서드는 딱 한번만 실행되고, 이벤트 해제
//                 $('#my .hover').one("click", function () { alert('한번만 클릭'); });
//             }
//         );

        // closeOnClickOutside: false,


        // html:
        // '<a href="/php/RECIPE2/member/login.php">links</a> '

    

        // .then((result) => {
        // 	if (result.value) {
        //         //"삭제" 버튼을 눌렀을 때 작업할 내용을 이곳에 넣어주면 된다. 
        // 	}
        // })
        
    })
// };

</script>

 