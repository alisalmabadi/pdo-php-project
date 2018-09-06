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

    <title> تنظیمات کلی سایت</title>

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
$stitleerr="";
if(isset($_POST["save"])){
	if($_POST["allowpanel"]!=""){
     
		
		$reason=$_POST["reason"];
		$allow=checkid($_POST["allowpanel"]);

		if($allow==1)
		$allow=1;
		elseif($allow==0)
			$allow=0;
		else
			$allow=1;
		
		$sql="UPDATE `$tbl_site_setting` SET `open`=:allow,`reason`=:reason";
		$result=$connect->prepare($sql);
		
		$result->bindParam(":allow",$allow);
		$result->bindParam(":reason",$reason);

		if($result->execute()){
			
			$success="تنطیمات سیستم با موفقیت انجام شد";
			
			
		}else{
			
				$wrong = "خطا در ویرایش";
			
		}


		
		
	}else{
		
		if(empty($_POST["allowpanel"])) $stitleerr =" مجور ورود به سایت خالی است";
		

		

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
								
				if(isset($stitleerr) && $stitleerr!=""){include "notice/stitleerr.php";}
				
				?>
				
				
				
				
				
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				<?php
				
				$s="SELECT * FROM `$tbl_site_setting`";
			$res=$connect->query($s);
				$rows=$res->fetch(PDO::FETCH_ASSOC);
                            
					 
					       ?>
                                <section class="panel">
                                    <header class="panel-heading">
                                  ورودی سایت
                                    </header>
                                    <div class="panel-body">
									<form  action="" class="form-horizontal" method="post">
                                        <div class="form" style="height: 600px;">
										
									
                                
                                 <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">اجازه ورود به سامانه</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-lg m-bot15" name="allowpanel" style="font-size:14px;">
                                                <option value="1" style="font-size: 5px; color: green;" <?php if($rows['open']=="1"){echo "selected";}?> > ورود فعال است </option>
                                             <option value="0" style="font-size: 5px; color: darkred;" <?php if($rows['open']=="0"){echo "selected";}?>> ورود غیر فعال است</option>

                                            </select>
                                        </div>
									
									</div>
                       
                       
                       <label class="col-sm-2 control-label">دلیل</label>
                                        <div class="col-sm-10">
                                           
                                            <textarea id="editor1" class="form-control ckeditor" class="ckeditor" name="reason" rows="6"><?=$rows['reason'];?></textarea>
                                            <span class="help-block">دلیل باز یا بسته بودن سایت</span>
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
<script type="text/javascript" src="tools/ckeditor/ckeditor.js"> </script>
    <script language="javascript">
	CKEDITOR.replace('editor1',{
		
		language:'fa'
	})
	</script>

   
    <!--common script for all pages-->
         


    <!--script for this page only-->
  <script src="tools/jscolor/jscolor.js"></script>
  <script src="js/gritter.js" type="text/javascript"></script>



</body>
</html>