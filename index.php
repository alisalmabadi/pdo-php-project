<?php include "core/onload.php";?>
<?php

$cap=$usernameerr=$passworderr=$captchaerr=$notfount="";

if(isset($_POST["login"])){
    if($_POST["username"]!="" && $_POST["password"]!="" && $_POST["captcha"]!=""){
if(strtolower($_POST['captcha']) == strtolower($_SESSION['sacaptchaCode'])){
	$username=prevent($_POST["username"]);
    $password=prevent($_POST["password"]);
    $password=hashpassword($password);
    $sqljadidam="SELECT `username`,`password` FROM `$tbl_user` WHERE `username`=:us AND `password`=:pass"; 
    $resulteman=$connect->prepare($sqljadidam);
    $resulteman->bindParam(":us",$username);
    $resulteman->bindParam(":pass",$password);
    $resulteman->execute();
    if($resulteman->rowCount()==1){
      $smssss="SELECT `id` FROM `$tbl_user` WHERE `username`=:username";
        $n=$connect->prepare($smssss);
        $n->bindParam(":username",$username);
        $n->execute();
        $rowshaaa=$n->fetch(PDO::FETCH_ASSOC);
        $id=$rowshaaa["id"];
        $_SESSION["user_id"]=$id;
    
        $_SESSION["user_username"]=$username;
        $_SESSION["model_user"]="user";
        $_SESSION["access"]=HashSession();
        $ip = $_SERVER["REMOTE_ADDR"];
        $type=2;
        $dtime=jdate('H:i:s P | l, j F Y');
        $s_i="INSERT INTO `$tbl_ip`(`id`,`user_id`,`datetime`,`ip`,`type`) VALUES(NULL,:userid,:dtime,:ip,:type)";
        $rss=$connect->prepare($s_i);
        $rss->bindParam(":userid",$id);
        $rss->bindParam(":dtime",$dtime);
        $rss->bindParam(":ip",$ip);
        $rss->bindParam(":type",$type);

        $rss->execute();
        
        

transfer("portal/index.php");
        
       
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
    <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
       <link rel="shortcut icon" href="img/faveicon.ico">

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <?php include "inc/title/indextitle.php";?>

<?php
      
$result = $connect -> query("SELECT `meta_keyword`,`meta_description` FROM `$tbl_theme_setting`");
$rows = $result->fetch(PDO::FETCH_ASSOC);

?>
<meta name="keywords" content="<?php echo $rows['meta_keyword']; ?>" />
<meta name="description" content="<?php echo $rows['meta_description']; ?>" />
<?php
$s = "SELECT  * FROM `$tbl_meta_tag`";
$res = $connect->query($s);
while($row = $res->fetch(PDO::FETCH_ASSOC)){
?>
	<meta name="<?=$row['name'];?>" content="<?=$row['content'];?>">
<?php
}
?>
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




  </head>

  <body>
<?php
	
	$sqlam="SELECT * FROM `$tbl_system_setting`";
	$r=$connect->query($sqlam);
	$rowsham=$r->fetch(PDO::FETCH_ASSOC);
	?>
  
  <nav id="mobile-nav" style="background:#<?=$rowsham["index_color"];?>;">
  <?php
  $sm="SELECT `url`,`target`,`title`,`status`,`id` FROM `$tbl_menu` WHERE `status`=1 ORDER BY `id` DESC";
  $resu=$connect->query($sm);
  
  while($rowsa=$resu->fetch(PDO::FETCH_ASSOC)){
	
  ?>
 
    <a target="<?=$rowsa['target'];?>" href="<?=$rowsa['url'];?>"><?=$rowsa['title'];?></a>
  <?php
  
  }
  ?>

  </nav>
  <div id="main">
    <nav id="desktop-nav" style="background:#<?=$rowsham["index_color"];?>;">
<a href="#" id="nav-toggle"></a>
 <?php
  $sm="SELECT `url`,`target`,`title`,`status`,`id` FROM `$tbl_menu` WHERE `status`=1 ORDER BY `id` DESC";
  $resu=$connect->query($sm);
  
  while($rowsa=$resu->fetch(PDO::FETCH_ASSOC)){
	
  ?>
 
      <a target="<?=$rowsa['target'];?>" href="<?=$rowsa['url'];?>"><?=$rowsa['title'];?></a>

	       <?php
  
  }
  ?>



         
<div style="align=left;">
       
        
        </div>
    </nav>

  </div>
   
 
<?php





$s = "SELECT `count_news` FROM `$tbl_system_setting`";
$result = $connect->query($s);
$row = $result->fetch(PDO::FETCH_ASSOC);
$ncount = $row['count_news'];
?>


      
      
      


<div class="container">
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
		<div class="col-md-10 col-md-offset-1 main" >
		<div class="col-md-6 left-side" >
		<h3>آخرین اخبار سامانه</h3>
		<br>
<ul class="news"> 
<?php
$r=$connect->query("SELECT `title` FROM `$tbl_news`");
if($r->rowCount()<1){
	echo "در حال حاضر هیچ اطلاعیه ای وجود ندارد.";
}else{
	$s="SELECT `id`,`title` FROM `$tbl_news` ORDER BY `id` DESC LIMIT 0,$ncount";
	$res=$connect->query($s);
	while($rows=$res->fetch(PDO::FETCH_ASSOC)){
		
		
	
?>
	

 
<a target="_blank" href="news.php?id=<?=$rows['id'];?>"><li><?=$rows['title'];?></li></a>
		<?php 
	}
}
?>
		
		
		</ul>

		</div><!--col-sm-6-->
		
		<div class="col-md-6 right-side">
		
		<?php





$sm = "SELECT `logo` FROM `$tbl_theme_setting`";
$resultmm = $connect->query($sm);
$rowam = $resultmm->fetch(PDO::FETCH_ASSOC);

?>

		<center><img src="<?=$rowam['logo'];?>" height="200" width="150" style="margin-top:8px;"></center>
		
		 <?php
    if($login_session==true){
        
       include "login_ok.php";
    }else{
        

    include "login_form.php";
        
         }
            ?>
    
<!--/Form with header-->

		</div><!--col-sm-6-->
		
		
        </div><!--col-sm-8-->
	

        </div><!--container-->
		<div class="push"></div>
          <div align="center" id="footer">

طراحی و برنامه نویسی توسط <a href="https://webinoco.com">وبینو</a>

</div>
  
  
  <div id="particles-js"></div>
<script src="js/jquery-1.8.3.min.js"></script>
  <script src="js/main.js"></script>
<script type="text/javascript">
$.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );

});

$(function(){
    $('.button-checkbox').each(function(){
    	var $widget = $(this),
			$button = $widget.find('button'),
			$checkbox = $widget.find('input:checkbox'),
			color = $button.data('color'),
			settings = {
					on: {
						icon: 'glyphicon glyphicon-check'
					},
					off: {
						icon: 'glyphicon glyphicon-unchecked'
					}
			};

		$button.on('click', function () {
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});

		$checkbox.on('change', function () {
			updateDisplay();
		});

		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');
			// Set the button's state
			$button.data('state', (isChecked) ? "on" : "off");

			// Set the button's icon
			$button.find('.state-icon')
				.removeClass()
				.addClass('state-icon ' + settings[$button.data('state')].icon);

			// Update the button's color
			if (isChecked) {
				$button
					.removeClass('btn-default')
					.addClass('btn-' + color + ' active');
			} 
            else 
            { 
                $button
					.removeClass('btn-' + color + ' active')
					.addClass('btn-default');
			}
		}
		function init() {
			updateDisplay();
			// Inject the icon if applicable
			if ($button.find('.state-icon').length == 0) {
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});
});

</script>
      <script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
    close[i].onclick = function(){
        var div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
</script>

  </body>
</html>
