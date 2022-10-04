<?php
session_start();  //登入
include("pdoInc.php");
include('template_class.php');


function getIp(){
    return $_SERVER['REMOTE_ADDR'];
}



//$sthBoard = $dbh->prepare('SELECT id, name FROM product WHERE id = ?');
if(isset($_GET['id'])){
    $sthBoard = $dbh->prepare('SELECT id, name FROM product WHERE id = ?');
    $sthBoard->execute(array((int)$_GET['id']));
    
    
    
    if($sthBoard->rowCount() == 1){
        $row_B = $sthBoard->fetch(PDO::FETCH_ASSOC);
        //row['id'] 等於 (int)$_GET['id'] ->商品id
        
        switch ($_SESSION['arr'][$_GET['id']-1]) {
        case "1":
        case "2":
        case "3":
        case "4":    
?>
            <!--填寫評論(先正後負)-->
            <div class="card-body" >
                <div class="container summit ">
                    <!--form style="container"action="new_index.php" method="post" enctype="multipart/form-data"-->
                    <form style="container" action="2_viewBoard.php?id=<?php echo (int)$_GET['id'];?>" method="post" enctype="multipart/form-data">                        
                
                        <div class="d-flex justify-content-start  mb-3 ">
                                            <!--顯示圖片、商品名稱、評分 -->
                                            <div class="p-2">
                                                <img src='uploads/product_<?php echo (int)$_GET['id']?>.jpg?' width="70" height="70" class="img-circle" alt="商品圖片">
                                            </div>
                
                                            <div class="p-2">
                                                <h5 class="card-title" style=" font-size:30px;"><strong>Product name: <?php echo $row_B['name']?></strong> </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    <fieldset class="rating">
                                                            <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked="" aria-label="No rating.">
                
                                                            <input type="radio" id="rate1" name="rating" value="1">
                                                            <label for="rate1">1 star</label>
                
                                                            <input type="radio" id="rate2" name="rating" value="2">
                                                            <label for="rate2">2 stars</label>
                
                                                            <input type="radio" id="rate3" name="rating" value="3">
                                                            <label for="rate3">3 stars</label>
                
                                                            <input type="radio" id="rate4" name="rating" value="4">
                                                            <label for="rate4">4 stars</label>
                
                                                            <input type="radio" id="rate5" name="rating" value="5">
                                                            <label for="rate5">5 stars</label>
                
                                                            <span class="focus-ring"></span>
                                                    </fieldset>
                                                </h6>
                                            </div>
                                            
                                        </div>
                        <!-- Stepper -->        
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                            
                                                <div class="step" data-target="#step1">
                                                    <button type="button" class="step-trigger" role="tab">
                                                        <span class="bs-stepper-circle">1</span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step2">
                                                    <button type="button" class="step-trigger" role="tab">
                                                        <span class="bs-stepper-circle">2</span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step3">
                                                    <button type="button" class="step-trigger" role="tab">
                                                        <span class="bs-stepper-circle">3</span>
                                                    </button>
                                                </div>
                                                
                                            </div>
                            <div class="bs-stepper-content">
                                <div id="step1" class="content" role="tabpanel">
                                                    <div class="form-group">
                                                        <label>評論(喜歡這項商品的哪個部分)</label>
                                                        <textarea name="content" class="form-control" ></textarea>
                                                    </div>
                                                    <div>
                                                        <button type="button" onclick="stepper.next()">下一步</button>
                                                    </div>
                                                </div>
                                <div id="step2" class="content" role="tabpanel">
                                    <div class="form-group">
                                                        <label>評論(有什麼不滿意的地方嗎)</label>
                                                        <textarea name="content_negative" class="form-control"></textarea>
                                                    </div>
                                    <div class="b">
                                                        <button type="submit" onclick="stepper.next()" >提交</button>
                                                    </div>
                                </div>
                                <div id="step3" class="content" role="tabpanel">
                                    <div class="alert alert-success">
                                    感謝您填寫評論。
                                </div>
                            </div>
                            </div>
       
                        </div>
                                    
                    </form>
                </div>
            </div>
<?php       break;
        default:
?>
            <!--填寫評論(先負後正)-->
            <div class="card-body" >
                <div class="container summit ">
                    <!--form style="container"action="new_index.php" method="post" enctype="multipart/form-data"-->
                    <form style="container" action="2_viewBoard.php?id=<?php echo (int)$_GET['id'];?>" method="post" enctype="multipart/form-data">                        
                
                        <div class="d-flex justify-content-start  mb-3 ">
                                            <!--顯示圖片、商品名稱、評分 -->
                                            <div class="p-2">
                                                <img src='uploads/product_<?php echo (int)$_GET['id']?>.jpg?' width="70" height="70" class="img-circle" alt="商品圖片">
                                            </div>
                
                                            <div class="p-2">
                                                <h5 class="card-title" style=" font-size:30px;"><strong>Product name: <?php echo $row_B['name']?></strong> </h5>
                                                <h6 class="card-subtitle mb-2 text-muted">
                                                    <fieldset class="rating">
                                                            <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked="" aria-label="No rating.">
                
                                                            <input type="radio" id="rate1" name="rating" value="1">
                                                            <label for="rate1">1 star</label>
                
                                                            <input type="radio" id="rate2" name="rating" value="2">
                                                            <label for="rate2">2 stars</label>
                
                                                            <input type="radio" id="rate3" name="rating" value="3">
                                                            <label for="rate3">3 stars</label>
                
                                                            <input type="radio" id="rate4" name="rating" value="4">
                                                            <label for="rate4">4 stars</label>
                
                                                            <input type="radio" id="rate5" name="rating" value="5">
                                                            <label for="rate5">5 stars</label>
                
                                                            <span class="focus-ring"></span>
                                                    </fieldset>
                                                </h6>
                                            </div>
                                            
                                        </div>
                        <!-- Stepper -->        
                        <div class="bs-stepper">
                            <div class="bs-stepper-header" role="tablist">
                                            
                                                <div class="step" data-target="#step1">
                                                    <button type="button" class="step-trigger" role="tab">
                                                        <span class="bs-stepper-circle">1</span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step2">
                                                    <button type="button" class="step-trigger" role="tab">
                                                        <span class="bs-stepper-circle">2</span>
                                                    </button>
                                                </div>
                                                <div class="line"></div>
                                                <div class="step" data-target="#step3">
                                                    <button type="button" class="step-trigger" role="tab">
                                                        <span class="bs-stepper-circle">3</span>
                                                    </button>
                                                </div>
                                                
                                            </div>
                            <div class="bs-stepper-content">
                                <div id="step1" class="content" role="tabpanel">
                                    <div class="form-group">
                                        <label>評論(有什麼不滿意的地方嗎)</label>
                                        <textarea name="content_negative" class="form-control"></textarea>
                                    </div>
                                    <div>
                                        <button type="button" onclick="stepper.next()">下一步</button>
                                    </div>
                                </div>
                                <div id="step2" class="content" role="tabpanel">
                                    <div class="form-group">
                                                        <label>評論(喜歡這項商品的哪個部分)</label>
                                                        <textarea name="content" class="form-control" ></textarea>
                                                    </div>
                                    <div class="b">
                                        <button type="submit" onclick="stepper.next()" >提交</button>
                                    </div>
                                </div>
                                <div id="step3" class="content" role="tabpanel">
                                    <div class="alert alert-success">
                                    感謝您填寫評論。
                                </div>
                            </div>
                            </div>
       
                        </div>
                                    
                    </form>
                </div>
            </div>
<?php 
        }


        $sth = $dbh->prepare('SELECT * from dz_thread WHERE product_id = ? ORDER BY id');
        $sth->execute(array((int)$_GET['id']));
        
        /*while($row = $sth->fetch(PDO::FETCH_ASSOC)){
        
            $msgTpl = new template('single.php');
            $msgTpl->set('account', $row['account']);
            $msgTpl->set('nickname', htmlspecialchars($row['nickname']));
            $msgTpl->set('time', $row['time']);
            $msgTpl->set('msg', str_replace("\n", "<br/>", htmlspecialchars($row['content'])));
            $msgTpl->set('ip', $row['ip']);
            $msgTpl->set('product_id', $row['id']);
            
            $sth3 = $dbh->prepare('SELECT * from profileimg WHERE account = ?');
            $sth3->execute(array($row['account']));
            $row3 = $sth3->fetch(PDO::FETCH_ASSOC);
            
            $msgs[] = $msgTpl->render();
            
        }
        */
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        
        //確認欄位有無填寫完成
        if(isset($_POST['rating']) && isset($_POST['content'] )){
                if($_POST['rating']=="0" or $_POST['content']=="" or $_POST['content_negative']=="" ){  
                    echo "<script>alert('所有欄位皆須填寫')</script>";
                }
                else{
                    if(isset($_SESSION['account'])){
                        {
                            $sth2 = $dbh->prepare(
                                'INSERT INTO dz_thread (product_id,nickname, account, rating, content,content_negative, ip) VALUES (?,?, ?, ?,?, ?, ?)'
                            );
                            $sth2->execute(array(
                                (int)$_GET['id'],
                                $_SESSION['nickname'],
                                $_SESSION['account'],
                                $_POST['rating'], 
                                $_POST['content'],
                                $_POST['content_negative'],
                                $_SERVER['REMOTE_ADDR'],
                            ));
                            
                        }
                        
                        //echo '<meta http-equiv=REFRESH CONTENT=0;url=3_viewRevise.php?id='.$row['id'].'>';
                        echo '<meta http-equiv=REFRESH CONTENT=0;url=3_viewRevise.php?id='.$row['product_id'].'>';

                    }
                
        else{
                echo "<script>alert('登入後才能發表回應')</script>";
            }
                
        }
                
        }


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
            $frameTpl->set('mine','');
            $frameTpl->set('mine.php','mine.php');
            $frameTpl->set('hello_display','none');
        
        }
        else{
            $frameTpl->set('check_login','登出');
            $frameTpl->set('php_guide','0_logout.php');
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

echo 'arr[0]='.$_SESSION['arr'][0];
echo '<br>';  
echo 'arr[1]='.$_SESSION['arr'][1];
echo 'arr[2]='.$_SESSION['arr'][2];
echo '<br>';  
echo 'arr[3]='.$_SESSION['arr'][3];
echo '<br>';  
echo 'arr[4]='.$_SESSION['arr'][4];
echo '<br>';  
echo 'arr[5]='.$_SESSION['arr'][5];
echo '<br>';  
echo 'arr[6]='.$_SESSION['arr'][6];
echo '<br>';  
echo 'arr[7]='.$_SESSION['arr'][7];
echo '<br>';
echo 'session[arr][id] ]='.$_SESSION['arr'][$_GET['id']-1] ;

?>


<style>
            .t{
                font-size:25px;
                width:450px;
                display : flex;
                justify-content: center;
                align-items: center;
                padding : 15px;
                margin-top:0px;
                margin-right:auto;
                margin-left:auto;

            }
            select{
                width:460px;
            }
            textarea{
                width:500px;
            }
            input{
                width:500px;
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
