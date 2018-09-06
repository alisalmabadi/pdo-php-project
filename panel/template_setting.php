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

    <title> ویرایش تنظیمات قالب</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
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
	$titleerr=$statuserr=$wrong=$success="";
	if(isset($_POST["edit"])){
	if($_POST["key"]!="" && $_POST["des"]!=""){
			$key = prevent($_POST["key"]);
			$des = prevent($_POST["des"]);
			
			$sql = "UPDATE `$tbl_theme_setting` SET `meta_description`=:des,`meta_keyword`=:key";
			$result = $connect->prepare($sql);
			$result->bindParam(":des",$des);
	    	$result->bindParam(":key",$key);

		
			
			if($result->execute()){
				$success="اطلاعات با موفقیت ذخیره شد";
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		
	}else{
		if(empty($_POST["key"])) $titleerr ="متاتگ های کیوورد خالی می باشند";
		
		if(empty($_POST["des"])) $statuserr ="متاتگ های دیسکریپشن خالی میباشند";

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
								
				if(isset($titleerr) && $titleerr!=""){include "notice/title_err.php";}
				
				?>
				
				
				
			
				
			
			
		
			
			<?php	
			if(isset($statuserr) && $statuserr!=""){include "notice/status_err.php";}
							

			?>
			
			
		
			
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            
					 
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                    ویرایش سمت
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
                                        <div class="form">
											<?php
									/******inja ham variable $tbl_menu kar nakard********/
									$ss="SELECT * FROM `$tbl_theme_setting`";
									$resultam=$connect->query($ss);
								
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">متاتگ توضیحات</label>
                                        <div class="col-sm-10">
						<textarea id="editor1" class="form-control ckeditor" name="des" rows="6"><?=$rows['meta_description'];?></textarea>

                                            <span class="help-block">در این متاتگ باید اطلاعات کلی سایت خود را وارد کنید. </span>
                                        </div>
                                        
                                        
                                               
									
									
										
										   <label class="col-sm-2 control-label">متاتگ کلمات کلیدی</label>
                                        <div class="col-sm-10">
							<textarea id="editor1" class="form-control ckeditor" name="key" rows="6"><?=$rows['meta_keyword'];?></textarea>

                                            <span class="help-block">کلمات کلیدی وبسایت را وارد کنید.</span>
                                        </div>
										
											      
										       
											
											
											
											
											
												
												
												
												<button name="edit" type="submit" class="btn btn-success btn-lg btn-block">ذخیره تنظیمات قالب</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                      </div>
				
				
				
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>
 <script src="js/form-component.js"></script>

</body>
</html>
