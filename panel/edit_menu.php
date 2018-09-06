<?php include "inc/onload.php"; ?>

<?php
	if(!isset($_GET['edit_id'])){
		header('Location:menu_top.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="سامانه اتحادیه انجمن هاس اسلامی دانش آموزان شهر تهران">
    <meta name="author" content="seyyed_ali_salmabadi">
    <meta name="keyword" content="samane,anjomaneslami,سامانه,انجمن اسلامی,اتحادیه ">
    <link rel="shortcut icon" href="img/faveicon.ico">

    <title>ویرایش لینک</title>

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
	if(isset($_POST["edit"])){
	if($_POST["title"]!="" && $_POST["url"]!="" && $_POST["target"]!="" && $_POST["status"]!=""){
		if(!filter_var($_POST["url"],FILTER_VALIDATE_URL)){
			$urlwrong = "آدرس وارد شده صحیح نمی باشد";
		}else{
			$title = prevent($_POST["title"]);
			$url = prevent($_POST["url"]);
			$target = checkid($_POST["target"]);
			if($target==1){
					$target = "_blank";
				}else if($target==2){
					$target = "_self";
				}else{
					$target = "_blank";
				}
			$status = checkid($_POST["status"]);
				if($status==1){
					$status=1;
				}else if($status==0){
					$status=0;
				}else{
					$status = 1;
				}
			$id = checkid($_POST["getid"]);
			/******inja ham variable $tbl_menu kar nakard********/
			$sql = "UPDATE `$tbl_menu` SET `title`=:title,`url`=:url,`target`=:target,`status`=:status WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":title",$title);
			$result->bindParam(":url",$url);
			$result->bindParam(":target",$target);
			$result->bindParam(":status",$status);
			$result->bindParam(":id",$id);
			if($result->execute()){
				$URL = "menu_top.php?edit_proccess=success";
echo '<script language="javascript">window.location =\''.$URL.'\'</script>';
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		} 
	}else{
		if(empty($_POST["title"])) $titleerr ="عنوان خالی می باشد";
		if(empty($_POST["url"])) $urlerr ="آدرس خالی می باشد";
		if(empty($_POST["target"])) $targeterr ="حالت باز شدن خالی می باشد";
		if(empty($_POST["status"])) $statuserr ="وضعیت خالی می باشد";
	}
}
	
	?>
	

      
				
				
				 <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
				
				 
                                        
									
								
									
									
									
					 
					 
					 
				<?php	
								
				if(isset($titleerr) && $titleerr!=""){include "notice/title_err.php";}
				
				?>
				
				
				
				<?php 
				
				if(isset($targeterr) && $targeterr!=""){include "notice/target_err.php";}
								
				
				?>
				
				
			<?php
			if(isset($urlerr) && $urlerr!=""){include "notice/url_err.php";}
								

			?>
			
			
			<?php	
			if(isset($targetval) && $targetval!=""){include "notice/targetval_err.php";}
								
			?>
			
			
			<?php	
			if(isset($statuserr) && $statuserr!=""){include "notice/status_err.php";}
							

			?>
			
			
			<?php
			if(isset($urlwrong) && $urlwrong!=""){include "notice/url_wrong_err.php";}
								

			?>
			
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            
					 
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                     وارد کردن لینک
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
                                        <div class="form">
											<?php
									$id=checkid($_GET["edit_id"]);
									/******inja ham variable $tbl_menu kar nakard********/
									$s="SELECT * FROM `$tbl_menu` WHERE `id`=:id";
									$resultam=$connect->prepare($s);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">ویرایش لینک</label>
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" value="<?=$rows['id'];?>">
                                            <input name="title" type="text" class="form-control" value="<?=$rows['title'];?>">
                                            <span class="help-block">نام لینک مورد نظر را وارد نمایید </span>
                                        </div>
										
										   <label class="col-sm-2 control-label">آدرس اینترنتی</label>
                                        <div class="col-sm-10">
                                            <input name="url" type="text" class="form-control" value="<?=$rows['url'];?>">
                                            <span class="help-block">url را وارد کنید</span>
                                        </div>
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">وضعیت</label>
                                        <div class="col-lg-10">
                                          

                                           <select class="form-control input-sm m-bot15" name="status" style="color: darkred; font-size: 11px;">
                                                <option value="1" <?php if($rows['status']=="1"){echo "selected";}?> style="color: darkred; font-size: 11px;">فعال</option>
                                             <option value="0" <?php if($rows['status']=="0"){echo "selected";}?> style="color: darkred; font-size: 11px;">غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
										        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">نحوه باز شدن</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="target" style="color: darkred; font-size: 11px;">
                                                <option style="color: darkred; font-size: 11px;" value="1" <?php if($rows['target']=="_blank"){echo "selected";}?> >باز شدن در صفحه دیگر</option>
                                             <option style="color: darkred; font-size: 11px;" value="2" <?php if($rows['target']=="_self"){echo "selected";}?>>باز شدن در همین صفحه</option>

                                            </select>
                                        </div>
									
									
									
									
											</div>
											
											
											
											
											
											
												
												
												
												<button name="edit" type="submit" class="btn btn-success btn-lg btn-block">ویرایش لینک</button>
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
