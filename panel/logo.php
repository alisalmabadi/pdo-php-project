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

    <title>ویرایش لوگو</title>

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
$fileerr = $error = $uperror = $up =$extension = $wrong = $success =  "";
if(isset($_POST["edit"])){
	if($_FILES["file"]["name"]!=""){
		if($_FILES["file"]["error"]>0){
			$error = "خطا در فایل";
		}else{
				//file name
				$filename = $_FILES["file"]["name"];
				$temp = $_FILES["file"]["tmp_name"]; // wamp -> tmp
				$type = $_FILES["file"]["type"]; // image/png or image/jpeg or image/jpg or ....
				$white_list = array("image/jpeg","image/jpg","image/png","image/gif");
				$file = md5($filename.microtime()).substr($filename,-5,5);
				$url_move ="../img/logo/".$file;
				$url_save = "img/logo/".$file;
				if(in_array($type,$white_list)){
					if(is_uploaded_file($temp)){
						$sql = "SELECT `logo` FROM `$tbl_theme_setting`";
						$result = $connect->query($sql);
						$row = $result->fetch(PDO::FETCH_ASSOC);
						unlink("../".$row["logo"]);
						$move = move_uploaded_file($temp,$url_move);
						if($move){
							$s = "UPDATE `$tbl_theme_setting` SET `logo`=:logo";
							$res = $connect->prepare($s);
							$res->bindParam(":logo",$url_save);
							if($res->execute()){
								$success = "لوگو با موفقیت ویرایش شد";
							}else{
								$wrong = "خطا ";
							}
						}else{
							$up = "خطا در انتقال تصویر به پوشه مورد نظر";
						}
					}else{
						$uperror= "فایل آپلودی نمی باشد";
					}
				}else{
					$extension = "پسوند مجاز نمی باشد";
				}
		}
	}else{
		$fileerr ="فایل خالی می باشد";
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
								
				if(isset($error) &&  $error!=""){include "notice/error.php";}
				
				?>
				
				<?php	
								
				if(isset($extension) &&  $extension!=""){include "notice/extension.php";}
				
				?>
				
				<?php	
								
				if(isset($fileerr) && $fileerr!=""){include "notice/fileerr.php";}
				
				?>
					
				<?php	
								
				if(isset($uperror) && $uperror!=""){include "notice/uperr.php";}
				
				?>
				<?php	
								
				if(isset($up) && $up!=""){include "notice/up.php";}
				
				?>
				
				
				
			
				
			
			
		
			
		
			
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            
					 
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                   ویرایش لوگو
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									
									
									
                                        <div class="form">
											<?php
									/******inja ham variable $tbl_menu kar nakard********/
									$ss="SELECT * FROM `$tbl_theme_setting`";
									$resultam=$connect->query($ss);
								
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">لوگو فعلی</label>
                                        <div class="col-sm-10">
		<img src="<?="../".$rows['logo'];?>" height="200" width="150" style="margin-top:8px;">
                                            <span class="help-block">این لوگو هم اکنون در صفحه اصلی به نمایش در می آید. </span>
                                        </div>
                                        
                                        
                                               
									
									
										
										   <label class="col-sm-2 control-label">آپلود لوگو جدید</label>
                                        <div class="col-sm-10">

										
										<input type="file" name="file"> 
                                            <span class="help-block"> حتما فرمت png آپلود کنید</span>
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
