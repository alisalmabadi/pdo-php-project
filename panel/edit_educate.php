<?php include "inc/onload.php"; ?>

<?php
	if(!isset($_GET['edit_id'])){
		header('Location:tahsil.php');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="سامانه اتحادیه انجمن هاس اسلامی دانش آموزان شهر تهران">
    <meta name="author" content="seyyed_ali_salmabadi">
    <meta name="keyword" content="samane,anjomaneslami,سامانه,انجمن اسلامی,اتحادیه ">
    <link rel="shortcut icon" href="img/faveicon.ico">

    <title>ویرایش وضعیت تحصیلی</title>

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
	if($_POST["title"]!="" && $_POST["status"]!=""){
			$title = prevent($_POST["title"]);
			$des= prevent($_POST["des"]);
			$status = checkid($_POST["status"]);
				if($status==1){
					$status=1;
				}else if($status==0){
					$status=0;
				}else{
					$status = 1;
				}
			$id = checkid($_POST["getid"]);
			$sql = "UPDATE `$tbl_tahsil` SET `title`=:title,`des`=:des,`status`=:status WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":title",$title);
		  	$result->bindParam(":des",$des);
			$result->bindParam(":status",$status);
			$result->bindParam(":id",$id);
			if($result->execute()){
				$URL = "tahsil.php?edit_proccess=success";
echo '<script language="javascript">window.location =\''.$URL.'\'</script>';
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		
	}else{
		if(empty($_POST["title"])) $titleerr ="عنوان خالی می باشد";
		
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
			if(isset($statuserr) && $statuserr!=""){include "notice/status_err.php";}
							

			?>
			
			
		
			
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            
					 
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                    ویرایش وضعیت تحصیلی
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
                                        <div class="form">
											<?php
									$id=checkid($_GET["edit_id"]);
									$s="SELECT * FROM `$tbl_tahsil` WHERE `id`=:id";
									$resultam=$connect->prepare($s);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">ویرایش نام وضعیت تحصیلی:</label>
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" value="<?=$rows['id'];?>">
                                            <input name="title" type="text" class="form-control" value="<?=$rows['title'];?>">
                                            <span class="help-block">نام وضعیت تحصیلی مورد نظر را وارد نمایید </span>
                                        </div>
                                            
                                             <label class="col-sm-2 control-label">توضیحات</label>
                                        <div class="col-sm-10">
                                            <input name="des" type="text" class="form-control" value="<?=$rows['des'];?>">
                                            <span class="help-block">توضیحات وضعیت تحصیلی مورد نظر را وارد نمایید </span>
                                        </div>
										
										  
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">وضعیت </label>
                                        <div class="col-lg-10">
                                          

                                           <select class="form-control input-sm m-bot15" name="status">
                                                <option value="1" <?php if($rows['status']=="1"){echo "selected";}?>>فعال</option>
                                             <option value="0" <?php if($rows['status']=="0"){echo "selected";}?>>غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
										       
											
											
											
											
											
												
												
												
												<button name="edit" type="submit" class="btn btn-success btn-lg btn-block">ویرایش وضعیت تحصیلی </button>
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
