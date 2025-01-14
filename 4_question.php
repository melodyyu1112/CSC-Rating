<?php
session_start();  //登入
include("pdoInc.php");
include('template_class.php');


function getIp(){
    return $_SERVER['REMOTE_ADDR'];
}
 


$sthBoard = $dbh->prepare('SELECT id, name FROM product WHERE id = ?');
if(isset($_GET['id'])){
    $sth = $dbh->prepare('SELECT id, name FROM product WHERE id = ? ');
    $sthBoard->execute(array((int)$_GET['id']));

    
    if($sthBoard->rowCount() == 1){
        $row = $sthBoard->fetch(PDO::FETCH_ASSOC);

        //取得歷史貼文
        $sth = $dbh->prepare('SELECT * from dz_thread WHERE product_id = ? ORDER BY id DESC');
        $sth->execute(array((int)$_GET['id']));
        
        $sth2 = $dbh->prepare('SELECT * from product WHERE id = ?');
        $sth2->execute(array((int)$_GET['id']));
        $row2 = $sth2->fetch(PDO::FETCH_ASSOC);

        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            
            
            $sth3 = $dbh->prepare('SELECT * from profileimg WHERE account = ?');
            $sth3->execute(array($row['account']));
            $row3 = $sth3->fetch(PDO::FETCH_ASSOC);
            
            
        
         }
        ?>

            <!--撰寫評論區-->
        <div class="container">
            <div class="card-body" >
                
                <div class="container summit ">
                    <form style="container"   method="post" enctype="multipart/form-data">   
                        <div class="d-flex justify-content-start  mb-3 ">
                            <!--顯示圖片、商品名稱、評分 
                            <div class="p-2">
                                <img src='uploads/product_<?php echo (int)$_GET['id']?>.jpg?' width="70" height="70" class="img-circle" alt="商品圖片">
                            </div>
                            -->
                            
                            <div class="p-2">
                                <!--h5 class="card-title" style=" font-size:30px;"><strong>Product name:<?php echo $row2['name']?></strong> </h5-->
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <!--fieldset class="rating">
                                            <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" aria-label="No rating.">

                                            <input type="radio" id="rate1" name="rating" value="1">
                                            <label for="rate1">1 star</label>

                                            <input type="radio" id="rate2" name="rating" value="2">
                                            <label for="rate2">2 stars</label>

                                            <input type="radio" id="rate3" name="rating" value="3" >
                                            <label for="rate3">3 stars</label>

                                            <input type="radio" id="rate4" name="rating" value="4" >
                                            <label for="rate4">4 stars</label>

                                            <input type="radio" id="rate5" name="rating" value="5" >
                                            <label for="rate5">5 stars</label>

                                            <span class="focus-ring"></span>
                                    </fieldset-->

                                    <fieldset class="">
                                        <h5 class='card-title'> Questionaire</h5>

                                        <label>1. 您撰寫評論的真實程度</label>
                                        <div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu1" name="question" value="1">
                                                <label class='form-check-label' >1</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu2" name="question" value="2">
                                                <label class='form-check-label'>2</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu3" name="question" value="3">
                                                <label class='form-check-label' >3</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu4" name="question" value="4">
                                                <label class='form-check-label' >4</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu5" name="question" value="5">
                                                <label class='form-check-label'>5</label>
                                            </div>

                                            <span class="focus-ring"></span>
                                        </div><br>   
                                        

                                        <label>2. 您撰寫評論的真實程度</label>
                                        <div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu2.1" name="question2" value="1">
                                                <label class='form-check-label' >1</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu2.2" name="question2" value="2">
                                                <label class='form-check-label' >2</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu2.3" name="question2" value="3">
                                                <label class='form-check-label' >3</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu2.4" name="question2" value="4">
                                                <label class='form-check-label'>4</label>
                                            </div>
                                            <div class='form-check form-check-inline'>
                                                <input  class='form-check-input' type="radio" id="qu2.5" name="question2" value="5">
                                                <label class='form-check-label' >5</label>
                                            </div>

                                            <span class="focus-ring"></span>
                                        </div><br>

                                    </fieldset>
                                </h6>    
                            </div>
                        </div>
                    
                        <div class="b">
                            <button type="submit" onclick="" >送出</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        
        <?php

        //確認欄位有無填寫完成
        if(isset($_POST['question']) && isset($_POST['question2']   )){
                if($_POST['question']=="" or $_POST['question2']=="" ){  
                    echo "<script>alert('所有欄位皆須填寫')</script>";
                }
                else{
                    if(isset($_SESSION['account'])){
                        {   
                            
                            $sth2 = $dbh->prepare(
                                'UPDATE dz_thread SET q1 = ?, q2 = ? WHERE product_id = ? AND account = ? '
                            );
                            $sth2->execute(array(
                                $_POST['question'], 
                                $_POST['question2'],
                                (int)$_GET['id'],
                                $_SESSION['account'],

                                
                            ));
                        }
                        echo "<script>alert('完成')</script>";
                        echo '<meta http-equiv=REFRESH CONTENT=0;url=new_index.php>';
                    }
                
                    else{
                            echo "<script>alert('登入後才能發表回應')</script>";
                        }
                
        }
        }
        
        ?>

 
  
    
    
        <style>
            body {
            background-color: #fff;
            font-family: Lato, Helvetica, Arial, sans-serif;
            font-weight: 400;
            color: #666;
            }

            a {
            color: #27ae60;
            }

            a:focus,
            a:hover,
            a:visited {
            color: #36d278;
            }

            form {
            margin: 0 auto 3rem;
            }

            form:first-of-type {
            margin-top: 3rem;
            }

            fieldset {
            margin: 0 auto;
            }

            legend {
            margin-bottom: 0.5rem;
            }

            input[type=radio] {
            border: 3px solid black;
            }

            .rating {
            display: block;
            position: relative;
            width: 150px;
            min-height: 60px;
            padding: 0;
            border: none;
            }

            .rating > input {
            position: absolute;
            margin-right: -100%;
            opacity: 0;
            }

            .rating > input:checked ~ label,
            .rating > input:focus ~ label {
            background-position: 0 0;
            }

            .rating > input:checked + label,
            .rating > input:focus + label {
            background-position: 0 -30px;
            }

            .rating > input:hover ~ label {
            background-position: 0 0;
            }

            .rating > input:hover + label {
            background-position: 0 -30px;
            }

            .rating > input:hover + label:before {
            opacity: 1;
            }

            .rating > input:focus + label {
            outline: 1px dotted #999;
            }

            .rating .focus-ring {
            position: absolute;
            left: 0;
            width: 100%;
            height: 30px;
            outline: 2px dotted #999;
            pointer-events: none;
            opacity: 0;
            }

            .rating > .input-no-rate:focus ~ .focus-ring {
            opacity: 1;
            }

            .rating > label {
            position: relative;
            float: left;
            width: 30px;
            font-size: 0.1em;
            color: transparent;
            cursor: pointer;
            background-repeat: no-repeat;
            background-position: 0 -30px; 
            }

            .rating > label,
            .rating > label:before {
            height: 30px;
            background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAA8CAMAAABGivqtAAAAxlBMVEUAAACZmZn2viTHuJ72viOampqampr1viSampr3vySampqdnZ34wiX1vSSampr1vSOZmZmampr1viT2vSOampr2viT2viSampr2viSampr2vyX4vyWbm5v3vSSdnZ32wSadnZ36wCWcnJyZmZn/wSr/2ySampr2vSP2viSZmZn2vSSZmZn2vST2viSampr2viSbm5ubm5uZmZn1vSSampqbm5v2vSWampqampr3vSf5wiT5vyagoKD/xCmkpKT/yCSZmZn1vSO4V2dEAAAAQHRSTlMA+vsG9fO6uqdgRSIi7+3q39XVqZWVgnJyX09HPDw1NTAwKRkYB+jh3L6+srKijY2Ef2lpYllZUU5CKigWFQ4Oneh1twAAAZlJREFUOMuV0mdzAiEQBmDgWq4YTWIvKRqT2Htv8P//VJCTGfYQZnw/3fJ4tyO76KE0m1b2fZu+U/pu4QGlA7N+Up5PIz9d+cmkbSrSNr9seT3GKeNYIyeO5j16S28exY5suK0U/QKmmeCCX6xs22hJLVkitMImxCvEs8EG3SCRCN/ViFPqnq5epIzZ07QJJvkM9Tkz1xnkmXbfSvR7f4H8AtXBkLGj74mMvjM1+VHZpAZ4LM4K/LBWEI9jwP71v1ZEQ6dyvQMf8A/1pmdZnKce/VH1iIsdte4U8VEtY23xOujxtFpWDgKbfjD2YeEhY0OzfjGeLyO/XfnNpAcmcjDwKOXRfU1IyiTRyEkaiz67pb9oJHJb9vVqKfgjLBPyF5Sq9T0KmSUhQmtiQrJGPHVi0DoSabj31G2gW3buHd0pY85lNdcCk8xlNDPXMuSyNiwl+theIb9C7RLIpKvviYy+M6H8qGwSAp6Is19+GP6KxwnggJ/kq6Jht5rnRQA4z9zyRRaXssvyqp5I6Vutv0vkpJaJtnjpz/8B19ytIayazLoAAAAASUVORK5CYII=");
            }

            .star > label:before {
            content: "";
            position: absolute;
            display: block;
            background-position: 0 30px;
            pointer-events: none;
            opacity: 0;
            }

            .star > label:nth-of-type(5):before {
            width: 120px;
            left: -120px;
            }

            .star > label:nth-of-type(4):before {
            width: 90px;
            left: -90px;
            }

            .star > label:nth-of-type(3):before {
            width: 60px;
            left: -60px;
            }

            .star > label:nth-of-type(2):before {
            width: 30px;
            left: -30px;
            }

            .star > label:nth-of-type(1):before {
            width: 0;
            left: 0;
            }

            @media screen and (-webkit-min-device-pixel-ratio: 2),
            screen and (min-resolution: 192dpi) {
            .star > label {
                background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAB4CAMAAACZ62E6AAABAlBMVEUAAACZmZmampr2vSObm5v/yiufn5+ampr1viP1viSZmZn2viOZmZmampqampr2viSampqampqcnJz5vyScnJz3wSf/wyn/xiujo6Oqqqr/0C/1vSOampr2viP2viOampr2viP2vST2viOampqampqampr1vyP3viSampr2vyT4vyX3viSbm5ubm5v5wCT8xSmgoKCampqampr3vyb2wiWenp72viOampqZmZmampr2viP2viP1viSampqbm5v2vyT3viObm5v4vyadnZ34wSSbm5v2viSZmZn2viP2vST2viP2viT1viOZmZn2viT2viX3viT3vyb2vyOZmZn1vSOZmZlNN+fKAAAAVHRSTlMA9uz4PQwS8O7r5+fTw4yMelw2MB0dFRELBgbS+/Hfu7uxqKWdg4N7ZmZMPi8pKRgPs0w7Nhb14drKw6Gck21tXkNDIyMZ1rDLycTBtaqVknlfV0sGP8ZwAAADW0lEQVRYw9zWvYqDQBSG4TPDoCAqKhYKQgoVLFaIgZCkiCBBUqVazv3fyu4aEXWdM85Uy779A+LP58AfTQgw73AwtxFiZIwbxMbUfuB3H4b49YNfZrbGodoI52+cm9hH9sbZwwAXOFbo2zjDsSzWxnecuuvaM8MpdtbEPs7y9azF5phZWrjERaWOPdpLbB81cICrgv3W4mvMLbU6RmFQeA5u5HhFEEbHLdWLsMxvHJXxW16Goh+ZqPyny1Az5j79SsCJoWHsBNAxQ9sNF26bWFuMC8v1LY+mmeTadjaqtaNnnXoxWBcde1nNWnzdb68xrOqvu22/MTzuPutujpJ122NvluSb8tTWk85CclDZQwLS0oa2TQpEKacsJy0kSJaQOKJxROKKxhWJ7zS+k9ijsUdim8Y2ZWNUFBP4pMKfOv8onX9WrsI5gd3VVLXtatxcuU0znGUHCUAS2DgrS6mT6hTzrXEjfIZj5Dk2xKkihqm4wKlQfQRqalhUP9UHo3FIPAG/Et44JVLsDDf0JHmB3OEByOwZES8hSAsviGjBdh3ylh6plmMnW4IyAUVJWcE/76vTell1EIaiMBwIAcWBA9GC0lIdKFXQQUsHVVCklN7ojf3+z3JOxYqK2TH555+K6CJJQtRbr9XtDmCnjH0AX9Va8J+liIMvDtRsCk2pEs6hKVexR2g7KuDihwt5a9MfprY0fkLXU9ZmFLpoJolN6GXKWWfZx0tHCocwKJSxC22ItYUEjmBUJHFjfYz1xQxlfaLiZsBExq2IPtbkNbLtOwwuGgjTLkH43mYtSzam7+1Bsr3nm5uExBQUozEh9V7N7uvmwZcqdpm0C6vJW63bZEuXtbrV2zpDzhrpYLBWMnY1mjV7JWFtMio7zbWniWFxvHnWm1yGxXmOPXP+L3YV2ysjnNhaZNeMcHPvuL27BMnVMaujljBAYyje4niH4g2ONyh+4PiB4gOODyjWcKxh1gZBNoJjEY4R/BLhF4IDEQ4QPBoEoyxH4+bxrUsHyxwxQlg0WHXqYifVLmo67cKY/UtaXFxBV26TLjuHrkp8BPJTMij1xQejdkgO24nf7dBOCRcbzQuNOR9Qs64GzzrfQa8It2oFAA6Zrga9xEeq1KHmLUHIiCAWInsg1x/MLqkMsItF8QAAAABJRU5ErkJggg==");
            }
            }

            dialog{
            border: none;
            box-shadow: 0 2px 6px #ccc;
            border-radius: 10px;
            }
            dialog::backdrop {
            background-color: rgba(0, 0, 0, 0.1);
            }

            .b{
            width:200px;
            display : flex;
            justify-content: center;
            align-items: center;
            padding : 15px;
            margin-right:auto;
            margin-left:auto;

            }
            .summit{
            padding : 10px;
            font-size:20px;
            /* border:solid grey 1px; */
            display : flex;
            justify-content: center;
            align-items: center;
            
            }
        </style>

        </body>



        <?php
        
        $frameTpl = new template('rating_page.htm');
        $frameTpl->set('php', basename($_SERVER['PHP_SELF']));
        if ( isset($msgs)){
            $frameTpl->set('messages', join("\n", $msgs));

        }
        else{
        $frameTpl->set('messages', '');
        }
        

        //對應main.html模板中的navbar
        if(!isset($_SESSION['account'])){
            $frameTpl->set('check_login','註冊/登入');
            $frameTpl->set('php_guide','0_login.php');
            $frameTpl->set('personal','');
            $frameTpl->set('personal.php','personal.php');
            $frameTpl->set('mine','');
            $frameTpl->set('mine.php','mine.php');
            $frameTpl->set('hello_display','none');
        
        }
        else{
            $frameTpl->set('check_login','登出');
            $frameTpl->set('php_guide','0_logout.php');
            $frameTpl->set('personal','帳號資料');
            $frameTpl->set('personal.php','personal.php');
            $frameTpl->set('notification','我的通知');
            $frameTpl->set('mine','我的發表');
            $frameTpl->set('mine.php','mine.php');
            $frameTpl->set('hello_display','display');
            $frameTpl->set('username', $_SESSION['nickname']);
        
        }

        echo $frameTpl->render();

        

    }
    else {
        echo '看板不存在';
    }
}
else {
    echo '未指定看板';
}





?>
 
 