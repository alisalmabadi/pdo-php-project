<?php include "inc/onload.php"; ?>

<?php
	if(!isset($_GET['edit_id'])){
		header('Location:meta_setting.php');
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

    <title> ویرایش متاتگ</title>

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
	if($_POST["name"]!="" && $_POST["content"]!=""){
			$name = prevent($_POST["name"]);
			$content = prevent($_POST["content"]);
		
			$id = checkid($_POST["getid"]);
	
			$sql = "UPDATE `$tbl_meta_tag` SET `name`=:name,`content`=:content WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":name",$name);
			$result->bindParam(":content",$content);
			$result->bindParam(":id",$id);
			if($result->execute()){
				$urlam = "meta_setting.php?edit_proccess=success";
echo '<script language="javascript">window.location =\''.$urlam.'\'</script>';
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		
	}else{
				if(empty($_POST["name"])) $titleerr ="نام متاتگ خالی میباشد";
		if(empty($_POST["content"])) $urlerr ="محتوا خالی میباشد";
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
								
				if(isset($nameerr) && $nameerr!=""){include "notice/name_err.php";}
				
				?>
				
				
				
				<?php 
				
				if(isset($contenterr) && $contenterr!=""){include "notice/content_err.php";}
								
				
				?>
				
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
					 
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                    ویرایش متاتگ
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
                                        <div class="form">
											<?php
									$id=checkid($_GET["edit_id"]);
									/******inja ham variable $tbl_menu kar nakard********/
									$s="SELECT * FROM `$tbl_meta_tag` WHERE `id`=:id";
									$resultam=$connect->prepare($s);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">نام متاتگ</label>
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" value="<?=$rows['id'];?>">
                                            <input name="name" type="text" class="form-control" value="<?=$rows['name'];?>">
                                            <span class="help-block">نام جدید متاتگ را وارد نمایید.</span>
                                        </div>
										
										   <label class="col-sm-2 control-label">محتوای متاتگ را وارد کنید 
                                       
                                       
                                       
                                       </label>
                                        <div class="col-sm-10">
                                            
                                             <div class="col-sm-10">
                                           
                                           
<textarea class="form-control ckeditor" name="content" rows="6">
	<?=$rows['content'];?>
	
	
	
	
</textarea>
 <span class="help-block">هر مقداری که دوست دارید!</span>
                                        </div>
                                        </div>
										
											        <div class="form-group">
                                     
									</div>
										        <div class="form-group">
									
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
