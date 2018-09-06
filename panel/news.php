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

    <title>خبر ها</title>

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
        <?php include "tools/date/jdf.php"; ?>

	<?php
$titleerr = $texterr =$wrong=$success=  "";
if(isset($_POST['send'])){
	if($_POST['title']!=""&& $_POST['text']!=""){
		$title=prevent($_POST['title']);
		$text=$_POST['text'];
		$year=jdate('y');
		$month=jdate('n');
		$day=jdate('j');
		$date=jdate('H:i:s P | l, j F Y');

		$sql="INSERT INTO `$tbl_news`(`id`,`title`,`text`,`year`,`month`,`day`,`date`) VALUES(NULL,:title,:text,:year,:month,:day,:date)";
		$res=$connect->prepare($sql);
		$res->bindParam(":title",$title);
		$res->bindParam(":text",$text);
		$res->bindParam(":year",$year);
		$res->bindParam(":month",$month);
		$res->bindParam(":day",$day);
				$res->bindParam(":date",$date);


if($res->execute()){
	
	$success="عملیات ثبت با موفقیت انجام شد";
	
}else{
	
	
	
$wrong="مشکلی در انجام عملیات پیش آمده است";
}
	}else{
		
		if(empty($_POST["title"])) $titleerr ="نام اطلاعیه خالی میباشد";
		if(empty($_POST["text"])) $contenterr ="محتوا خالی میباشد";
	}
	
}
if(isset($_GET['del_id'])){
	$id=CheckId($_GET['del_id']);
	$sqlam="DELETE FROM `$tbl_news` WHERE `id`=:id"; 
	$resultam=$connect->prepare($sqlam);
	$resultam->bindParam(":id",$id);
	$resultam->execute();
}
if(isset($_POST['multi_delete'])){
if(isset($_POST['check'])){
if(count($_POST['check']>=1)){
	$check=$_POST['check'];
	foreach($check as $id){
$id_filter=checkid($id);
	$sqlam="DELETE FROM `$tbl_news` WHERE `id`=:id"; 
	$resultam=$connect->prepare($sqlam);
	$resultam->bindParam(":id",$id_filter);
	$resultam->execute();
	
	
	}
	}
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
				
				if(isset($contenterr) && $contenterr!=""){include "notice/content_err.php";}
								
				
				?>
				
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            
					 
					       <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                               وارد کردن خبر یا اطلاعیه سامانه
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
                                        <div class="form" style="height: 600px;">
										
										   <label class="col-sm-2 control-label">نام</label>
                                        <div class="col-sm-10">
                                           
                                            <input name="title" type="text" class="form-control">
                                            <span class="help-block">نام خبر را وارد نمایید. </span>
                                        </div>
										
										   <label class="col-sm-2 control-label">محتوای خبر را وارد کنید</label>
                                        <div class="col-sm-10">
                                           
                                           
<textarea id="editor1" class="form-control ckeditor" class="ckeditor" name="text" rows="6"></textarea>
 <span class="help-block">هر متنی که دوست دارید!</span>
                                        </div>
										
											        <div class="form-group">
                                     
									
									</div>
										        <div class="form-group">
                                      
									
									
									
											</div>
											
											
											
											
											
												
												
												
												<button name="send" type="submit" class="btn btn-success btn-lg btn-block">ثبت اطلاعات</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                      </div>
				
				
		
             
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    

			    
				
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="tools/ckeditor/ckeditor.js"> </script>
    <script language="javascript">
	CKEDITOR.replace('editor1',{
		
		language:'fa'
	})
	</script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>
 <script src="js/form-component.js"></script>
  <script src="js/gritter.js" type="text/javascript"></script>



</body>
</html>