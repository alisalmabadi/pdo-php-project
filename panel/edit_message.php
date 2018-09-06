<?php include "inc/onload.php"; ?>

<?php
	if(!isset($_GET['edit_id'])){
		header('Location:massage.php');
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

    <title>ویرایش پیام</title>

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
	if($_POST["title"]!="" && $_POST["text"]!=""){
            $title=prevent($_POST["title"]);
			$text= $_POST['text'];
			$ids = checkid($_POST["getid"]);
			/******inja ham variable $tbl_menu kar nakard********/
			$sql = "UPDATE `$tbl_message` SET `title`=:title,`text`=:text WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":title",$title);
			$result->bindParam(":text",$text);
			$result->bindParam(":id",$ids);
			if($result->execute()){
				$URL = "message.php?edit_proccess=success";
echo '<script language="javascript">window.location =\''.$URL.'\'</script>';
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		
	}else{
		if(empty($_POST["title"])) $titleerr ="عنوان خالی می باشد";
		
		if(empty($_POST["status"])) $statuserr ="متن پیام خالی می باشد";
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
                                    ویرایش پیام
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
            <div class="form">
					<?php
									$id=checkid($_GET["edit_id"]);         
									/******inja ham variable $tbl_menu kar nakard********/
									$s="SELECT * FROM `$tbl_message` WHERE `id`=:id";
									$resultam=$connect->prepare($s);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">ویرایش عنوان پیام:</label>
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" value="<?=$rows['id'];?>">
                                            <input name="title" type="text" class="form-control" value="<?=$rows['title'];?>">
                                            <span class="help-block">نام پیام مورد نظر را وارد نمایید </span>
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
											
											
											
											
											
												
												
												
												<button name="edit" type="submit" class="btn btn-success btn-lg btn-block">ویرایش پیام</button>
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
