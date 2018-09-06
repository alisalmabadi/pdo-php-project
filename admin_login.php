<?php
include "core/admin_onload.php";
$cap=$usernameerr=$passworderr=$captchaerr=$notfount="";

if(isset($_POST["login"])){
    if($_POST["username"]!="" && $_POST["password"]!="" && $_POST["captcha"]!=""){
if(strtolower($_POST['captcha']) == strtolower($_SESSION['sacaptchaCode'])){
	$username=prevent($_POST["username"]);
    $password=prevent($_POST["password"]);
    $password=hashpassword($password);
    $sqljadidam="SELECT `username`,`password` FROM `$tbl_manager` WHERE `username`=:us AND `password`=:pass"; 
    $resulteman=$connect->prepare($sqljadidam);
    $resulteman->bindParam(":us",$username);
    $resulteman->bindParam(":pass",$password);
    $resulteman->execute();
    if($resulteman->rowCount()==1){
      $smssss="SELECT `id` FROM `$tbl_manager` WHERE `username`=:username";
        $n=$connect->prepare($smssss);
        $n->bindParam(":username",$username);
        $n->execute();
        $rowshaaa=$n->fetch(PDO::FETCH_ASSOC);
        $id=$rowshaaa["id"];
        $_SESSION["admin_id"]=$id;
        $_SESSION["admin_username"]=$username;
        $_SESSION["model_user"]="admin";
        $_SESSION["admin_access"]=true;
        $ip = $_SERVER["REMOTE_ADDR"];
        $type=1;
        $dtime=jdate('H:i:s P | l, j F Y');
        $s_i="INSERT INTO `$tbl_ip`(`id`,`user_id`,`datetime`,`ip`,`type`) VALUES(NULL,:userid,:dtime,:ip,:type)";
        $rss=$connect->prepare($s_i);
        $rss->bindParam(":userid",$id);
        $rss->bindParam(":dtime",$dtime);
        $rss->bindParam(":ip",$ip);
        $rss->bindParam(":type",$type);
       
        $rss->execute();
       

transfer("panel/index.php");
        
       
    }else{
        
        $notfount="کاربری با این مشخصات در سامانه موجود نمیباشد لطفا مجددا تلاش کنید.";
        
    }
    
}else{
	$cap="کد امنیتی اشتباه وارد شده است.";
}
        
        
    }else{
        if(empty($_POST["username"])) $usernameerr="نام کاربری را وارد نمایید.";
        if(empty($_POST["password"])) $passworderr="رمز عبور خالی است.";
        if(empty($_POST["captcha"])) $captchaerr="کد امنیتی خالی است.";

        
        
    }
    
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">

  <title>صفحه ورود</title>

  <!-- Favicons-->
           <link rel="shortcut icon" href="img/faveicon.ico">

  <link rel="icon" href="img/faveicon.ico" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="img/faveicon.ico">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="img/faveicon.ico">
  <!-- For Windows Phone -->
<style type="text/css">
     /*****************alert**************/
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
    opacity: 1;
    transition: opacity 0.6s;
    margin-bottom: 15px;
}


.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
/*****************alert**************/

      
      </style>

  <!-- CORE CSS-->
  
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/layouts/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
      	<div class="col-md-10 col-md-offset-1 main" style="background:none; box-shadow:none" >
                    	
			<?php	
			if(isset($usernameerr) && $usernameerr!=""){include "notice/usernameerr.php";}
			?>
            <?php	
			if(isset($passworderr) && $passworderr!=""){include "notice/passworderr.php";}
			?>
                    <?php	
			if(isset($notfount) && $notfount!=""){include "notice/notfound.php";}
			?>
                    <?php	
			if(isset($cap) && $cap!=""){include "notice/cap.php";}
			?>
                 <?php	
			if(isset($captchaerr) && $captchaerr!=""){include "notice/captchaerr.php";}
			?>
                        
                    
                    
    </div>
    <div class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="" method="post">
        <div class="row">
          <div class="input-field col s12 center">
           
            <p class="center login-form-text">صفحه ورود به پنل مدیریت</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username">
            <label for="username" class="center-align">نام کاربری</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password">
            <label for="password">رمزعبور</label>
          </div>
        </div>
            <center>
     <div class="form-group">
         <label for="form4">تصویر امنیتی</label>
         
  <?php $sa_captchaDIR='sa-captcha';  include 'sa-captcha/captcha.php';  ?>
<br/><br/>کد امنیتی را وارد نمایید
<input name="captcha" type="text">
  

  </div>
        </center>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">ذخیره اطلاعات</label>
          </div>
        </div>
        <div class="row">
          
            <input name="login" type="submit" class="input-field col s12" class="btn waves-effect waves-light col s12" value="ورود به صفحه مدیریت">
         
        
        </div>
       
      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--prism-->
  <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="js/custom-script.js"></script>

</body>

</html>