<?php  include_once 'include/header.php';     ?>


    <div>
        <h2>RECIPE 작성하기</h2>
        <p>레시피를 작성해주세요</p>
    </div>
    
    <div id="reviewDiv">
        <form action="process/create_recipe_process.php" method="post" enctype="multipart/form-data">
            <table>
            <td>메인사진</td>
                    <td>
                        <input type="file" name="mainimg">
                        </td>
                </tr>
                <td>레시피화면사진</td>
                    <td>
                        <input type="file" name="dtailimg">
                        </td>
                </tr>
                <tr>
                    <td>레시피명</td>
                    <td>
                        <input type="text" name="mname">
                    </td>
                </tr>
                <tr>
                    <td>재료</td>
                    <td>
                        <textarea name="ingred" id="ingred" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>준비시간</td>
                    <td>
                        <input type="text" name="readyt">분
                    </td>
                </tr>
                <tr>
                    <td>조리시간</td>
                    <td>
                        <input type="text" name="playt">분
                    </td>
                </tr>
                <tr>
                    <td>인분수</td>
                    <td>
                        <input type="text" name="strength">인분
                    </td>
                </tr>
                <tr>
                    <td>sns</td>
                    <td>
                        <input type="text" name="sns" placeholder="#단어 후 띄어쓰기1칸">
                    </td>
                </tr>
                <tr>
                    <td>레시피설명</td>
                    <td>
                        <input type="text" name="desc1">
                    </td>
                </tr>
                <tr>
                    <td>조리방법</td>
                    <td>
                        <textarea name="desc2" id="desc2" cols="30" rows="10" placeholder="step단위로 입력"></textarea>    
                    </td>
                </tr>
                <tr>
                    <td>첨부파일</br>(최대10개)</td>
                    <td>
                        <input type="file" name="img1"></br>
                        <input type="file" name="img2"></br>
                        <input type="file" name="img3"></br>
                        <input type="file" name="img4"></br>
                        <input type="file" name="img5"></br>
                        <input type="file" name="img6"></br>
                        <input type="file" name="img7"></br>
                        <input type="file" name="img8"></br>
                        <input type="file" name="img9"></br>
                        <input type="file" name="img10"></br>
                    </td>
                </tr>
                <tr>
            
                
                
                <tr>
                    <td colspan="2">
                        <button type="submit">등록하기</button>
                        <button type="reset">취소</button>
                    </td>
                </tr>              
            </table>
            
        </form>
        
    </div>



<?php  include_once 'include/footer.php';     ?>