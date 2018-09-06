<?php include "inc/onload.php";?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="سامانه اتحادیه انجمن هاس اسلامی دانش آموزان شهر تهران">
    <meta name="author" content="seyyed_ali_salmabadi">
    <meta name="keyword" content="samane,anjomaneslami,سامانه,انجمن اسلامی,اتحادیه ">
    <link rel="shortcut icon" href="img/faveicon.ico">

    <title>پیام ها</title>

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

if(isset($_GET['del_id'])){
	$id=CheckId($_GET['del_id']);
	$sqlam="DELETE FROM `$tbl_message` WHERE `id`=:id"; 
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
	$sqlam="DELETE FROM `$tbl_message` WHERE `id`=:id"; 
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
				
				 
          
                            
					 
				
				
				
				
				
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                آخرین پیام ها
                         
                            </header>
							<form action="" method="POST" name="show_data">
							
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
								<center>
										<button  name="multi_delete" class="btn btn-shadow btn-danger" type="submit">حذف گروهی</button>
</center>
                                    <tr>
                                        <th style="width: 8px;">
										
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>عنوان پیام</th>
                                        <th class="hidden-phone">فرستنده</th>
                                        <th class="hidden-phone">تاریخ ارسال</th>
                                        <th class="hidden-phone">وضعیت</th>
									    <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php
								/*******variable $tbl_menu kar nakard!******/
								$s="SELECT * FROM `$tbl_message` WHERE `user_id_to`=:userid ORDER BY `id` DESC ";
								$rmsb=$connect->prepare($s);
                                $rmsb->bindParam(":userid",$idmanz);
                                    $rmsb->execute();
								while($rowsha=$rmsb->fetch(PDO::FETCH_ASSOC)){
                              $sender_id=$rowsha['user_id_from'];
								?>
                                    
                                    
								
								
								
                                    <tr class="odd gradeX">
									
                                        <td>
                                            <input name="check[]" type="checkbox" class="checkboxes" value="<?=$rowsha['id'];?>" /></td>
                              <td><a href="message_show.php?message_id=<?=$rowsha['id'];?>"> <?=$rowsha['title'];?></a></td>
				  <td>
                      
                      <?php
                                    
                                    $dastor="SELECT `name`,`lname` FROM `$tbl_manager` WHERE `id`=:id";
                                    $natije=$connect->prepare($dastor);
                                    $natije->bindParam(":id",$sender_id);
                                    $natije->execute();
                                    while($roha=$natije->fetch(PDO::FETCH_ASSOC)){ 
                      
                      ?>
                                <?=$roha['name'];?>&nbsp;<?=$roha['lname'];?>   
                      <?php
                           }
                          ?>
                                        
                                        </td>
				  <td class="hidden-phone"><?=$rowsha['date'];?></td>

                                        <td class="hidden-phone"><?php
							if($rowsha['flag']=="1"){
								include "notice/read.php";
							
							}else if($rowsha['flag']=="0"){
								include "notice/not_read.php";
							
							}else{
								include "notice/none.php";
							}
							
									if($rowsha['status']==1)
										 include "notice/taeed.php";
									 
									
									
								
									elseif($rowsha['status']==0)
										include "notice/not_taeed.php";
									
									else
								include "notice/none.php";

							?>
							</td>
                                       
                                       
									 <td class="hidden-phone">
									 
									 <?php 
									 
									 
									$idha=$rowsha['id'];
									 ?>
								<a  href="?del_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-danger"><i class="icon-remove-sign"></i>حذف</button></a>
                           	 
								
									
									 </td>

                                    </tr>
									<?php
								}
									
									
									?>
                                   
                                </tbody>

                            </table>
							
							
							</form>
                        </section>
                    </div>
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