<?php include "inc/onload.php"; ?>

<?php
   $id_message=checkid($_GET['message_id']);
  
	if(!isset($_GET['message_id'])){
		header('Location:message.php');
		exit();
	}else{
        
        $sql = "UPDATE `$tbl_message` SET `flag`=1  WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":id",$id_message);
			$result->execute();
				
        
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

    <title>مشاهده پیام</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/gritter/css/jquery.gritter.css" />
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
				
			
					 		<?php
									$id=checkid($_GET["message_id"]);
									$s="SELECT * FROM `$tbl_message` WHERE `id`=:id";
									$resultam=$connect->prepare($s);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                    <?=$rows['title'];?>
                                 
                                    </header>
                                    <div class="panel-body">
									
									
									
                                        <div class="form">
									
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" class="getid" value="<?=$rows['id'];?>">
                   
                                            
                                        
                                        </div>
										
										   
                <div class="col-lg-11" style="width:1090px;line-height: 32px;font-size: 15px;">
                                          
                       <?=$rows['text'];?>                     
                                            
                   
                                            
                                        </div>
										<br>
                                            <br>
                                            
                                          
                                    
                                            
											      <div class="panel-body">
                                <div class="btn-group btn-group-justified">
                          <a id="add-max" class="btn btn-success btn-sm read" href="javascript:;"> پیام را کاملا مطالعه نمودم</a>
                                    <a class="btn btn-danger" href="message.php">بازگشت به صفحه پیام ها</a>
                                   
                                </div>
                            </div> 
												
                                            
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
   <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>
 <script src="js/form-component.js"></script>
                     <script src="js/gritter.js" type="text/javascript"></script>

</body>
</html>
