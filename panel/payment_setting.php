<?php include "inc/onload.php"; ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="سامانه اتحادیه انجمن هاس اسلامی دانش آموزان شهر تهران">
    <meta name="author" content="seyyed_ali_salmabadi">
    <meta name="keyword" content="samane,anjomaneslami,سامانه,انجمن اسلامی,اتحادیه ">
    <link rel="shortcut icon" href="img/faveicon.ico">

    <title>تنظیمات درگاه پرداخت</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>








    <section id="container">
    <?php include "header.php";?>
    <?php include "menu.php"; ?>
    
   
	<?php
$terminalerr = $usererr=$passerr=$wrong=$success=  "";
if(isset($_POST["save"])){
	if($_POST["terminal_id"]!="" && $_POST["username"]!="" && $_POST["password"]!="" ){
     
		$terminalid=prevent($_POST["terminal_id"]);
		$username=prevent($_POST["username"]);
		$password=prevent($_POST["password"]);
		
		$sql="UPDATE `$tbl_pay_setting` SET `terminalid`=:terid,`username`=:username,`password`=:password";
		$result=$connect->prepare($sql);
		$result->bindParam(":terid",$terminalid);
		$result->bindParam(":username",$username);
		$result->bindParam(":password",$password);
		
		if($result->execute()){
			
			$success="تنطیمات سیستم با موفقیت انجام شد";
			
			
		}else{
			
				$wrong = "خطا در ویرایش";
			
		}


		
		
	}else{
		
		if(empty($_POST["terminal_id"])) $terminalerr ="ترمینال آی دی خالی میباشد.";
		if(empty($_POST["username"])) $usererr ="نام کاربری خالی میباشد.";
      if(empty($_POST["password"])) $passerr ="رمزعبور خالی میباشد.";


		

	}
	
}

?>

        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
				
				 
                                        
									<?php
									
								if(isset($success) && $success!=""){include "notice/positive_alarm.php";}

									?>
								
									
				
					 
					 
				<?php	
								
				if(isset($usererr) && $usererr!=""){include "notice/usererr.php";}
				
				?>
				
				
				
				<?php 
				
				if(isset($passerr) && $passerr!=""){include "notice/passerr.php";}
								
				
				?>
				
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				<?php
				
				$s="SELECT * FROM `$tbl_pay_setting`";
			$res=$connect->query($s);
				$rows=$res->fetch(PDO::FETCH_ASSOC);
                            
					 
					       ?>
                                <section class="panel">
                                    <header class="panel-heading">
                                  تنظیمات درگاه پرداخت سایت
                                 
                                    </header>
                                    <div class="panel-body">
				<form  action="" class="form-horizontal" method="post">
                                        <div class="form">
										
<label class="col-sm-2 control-label">ترمینال آی دی</label>
                                        <div class="col-sm-10">
    <input name="terminal_id" type="text" class="form-control" value="<?=$rows["terminalid"];?>">
                   <span class="help-block">این کد را میبایست هنگام درخواست درگاه از بانک دریافت نمایید. </span>
                                        </div>
                                        
                                          <label class="col-sm-2 control-label">نام کاربری</label>
                                        <div class="col-sm-10">
                                           
<input name="username" type="text" class="form-control" value="<?=$rows["username"];?>">
     <span class="help-block">از اطلاعات دریافتی از بانک </span>
                                        </div>
						
                <label class="col-sm-2 control-label">رمز عبور</label>
                                        <div class="col-sm-10">
                                           
<input name="password" type="text" class="form-control" value="<?=$rows["password"];?>">
     <span class="help-block">از اطلاعات دریافتی از بانک </span>
                                        </div>
						
											
                       
                       
               
                           
												<button name="save" type="submit" class="btn btn-success btn-lg btn-block">ثبت اطلاعات</button>
                                            </form>
                                             </div>
                                        </div>
                                    
                                </section>
                            </div>
                    
		
               
          
               
               
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>

			    
				
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
 <script src="js/sliders.js" type="text/javascript"></script>
    <script src="js/common-scripts.js"></script>
 <script src="js/form-component.js"></script>

   
    <!--common script for all pages-->
         


    <!--script for this page only-->
  <script src="tools/jscolor/jscolor.js"></script>
  <script src="js/gritter.js" type="text/javascript"></script>



</body>
</html>