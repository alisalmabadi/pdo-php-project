<?php include "inc/onload.php"; ?>

<?php
	if(!isset($_GET['edit_id'])){
		header('Location:news_manager.php');
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

    <title>ویرایش خبر</title>

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
	   $titleerr=$contenterr=$wrong="";
	if(isset($_POST["edit"])){
	if($_POST["title"]!="" && $_POST["text"]!=""){
			$title = prevent($_POST["title"]);
			$text = $_POST["text"];
		
			$id = checkid($_POST["getid"]);
	
			$sql = "UPDATE `$tbl_news` SET `title`=:title,`text`=:text WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":title",$title);
			$result->bindParam(":text",$text);
			$result->bindParam(":id",$id);
			if($result->execute()){
				$urlam = "news_manager.php?edit_proccess=success";
echo '<script language="javascript">window.location =\''.$urlam.'\'</script>';
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		
	}else{
				if(empty($_POST["title"])) $nameerr ="نام خبر خالی میباشد";
		if(empty($_POST["text"])) $contenterr ="محتوا خالی میباشد";
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
                                  ویرایش خبر
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
                                        <div class="form" style="height: 600px;">
											<?php
									$id=checkid($_GET["edit_id"]);
									/******inja ham variable $tbl_menu kar nakard********/
									$s="SELECT * FROM `$tbl_news` WHERE `id`=:id";
									$resultam=$connect->prepare($s);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">نام خبر</label>
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" value="<?=$rows['id'];?>">
                                            <input name="title" type="text" class="form-control" value="<?=$rows['title'];?>">
                                            <span class="help-block">نام جدید خبر را وارد نمایید.</span>
                                        </div>
										
										   <label class="col-sm-2 control-label">محتوای خبر را وارد نمایید.
                                       
                                       
                                       
                                       </label>
                                        <div class="col-sm-10">
                                            
                                             <div class="col-sm-10">
                                           
                                           
<textarea id="editor2" class="form-control ckeditor" class="ckeditor" name="text" rows="6">
	<?=$rows['text'];?>
</textarea>
 
 <span class="help-block">هر مقداری که دوست دارید!</span>
                                        </div>
                                        </div>
										
											      
											
											
											
											
												
												
												
												<button name="edit" type="submit" class="btn btn-success btn-lg btn-block">ویرایش خبر</button>
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
<script type="text/javascript" src="tools/ckeditor/ckeditor.js"> </script>
   
<script language="javascript">
	CKEDITOR.replace('editor2',{
		
		language:'fa'
	})
	</script>
    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>
 <script src="js/form-component.js"></script>

</body>
</html>
