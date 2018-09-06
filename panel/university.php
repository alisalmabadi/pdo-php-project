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

    <title>مدیریت دانشگاه ها و محل های تحصیل</title>

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
$titleerr = $statuserr= $urlwrong=$success= "";
if(isset($_POST['send'])){
	if($_POST["name"]!="" && $_POST['city']!=""){
				$name = prevent($_POST['name']);
        		$city = prevent($_POST['city']);
				$address = prevent($_POST['address']);
				$type = prevent($_POST['type']);
        
				$sql = "INSERT INTO `$tbl_uni`(`id`,`name`,`city`,`address`,`type`) VALUES(NULL,:name,:city,:address,:type)";
				$result = $connect->prepare($sql);
				$result->bindParam(":name",$name);
				$result->bindParam(":city",$city);
				$result->bindParam(":address",$address);
                $result->bindParam(":type",$type);
				if($result->execute()){
					$success = "دانشگاه یا محل تحصیل مورد نظر ثبت شد.";
				}else{
					$wrong = "خطا در  ثبت دانشگاه یا مدرسه";
				}
			
	}else{
		if(empty($_POST["name"])) $titleerr ="عنوان خالی می باشد";

		if(empty($_POST["city"])) $statuserr ="شهر خالی میباشد";
	}
}
if(isset($_GET['del_id'])){
	$id=CheckId($_GET['del_id']);
	$sqlam="DELETE FROM `$tbl_uni` WHERE `id`=:id"; 
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
	$sqlam="DELETE FROM `$tbl_uni` WHERE `id`=:id"; 
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
			if(isset($statuserr) && $statuserr!=""){include "notice/status_err.php";}
							

			?>
			
			
			
			
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            
					 
					 
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                    افزودن دانشگاه و محل تحصیل جدید
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
                                        <div class="form">
										
										   <label class="col-sm-2 control-label">نام دانشگاه یا محل تحصیل</label>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control">
                                            <span class="help-block">نام کامل آن را وارد نمایید. </span>
                                        </div>
                                            
                                            
                                             <label class="col-sm-2 control-label">شهر</label>
                                        <div class="col-sm-10">
                                            <input name="city" type="text" class="form-control">
                                            <span class="help-block">شهری که دانشگاه یا مدرسه مورد نظر در آن قرار دارد بنویسید.</span>
                                        </div>
										
										
										  <label class="col-sm-2 control-label">آدرس</label>
                                        <div class="col-sm-10">
                                            <input name="address" type="text" class="form-control">
                                            <span class="help-block">آدرس دقیق دانشگاه یا مدرسه مورد نظر را وارد نمایید </span>
                                        </div>
										  
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">نوع</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="type">
                                                <option value="دولتی">    
                                                    دولتی
                                                    </option>
                                             <option value="غیرانتفاعی">
                                                 غیرانتفاعی
                                                 </option>
                                             <option value="آزاد">
                                                 آزاد
                                                 </option>
                                             <option value="پیام نور">
                                                 پیام نور
                                                 </option>
                                             <option value="علمی کاربردی">
                                                 علمی کاربردی
                                              </option>
                                               <option value="شاهد">
                                                   شاهد
                                              </option>
                                               <option value="نمونه دولتی">
                                                   نمونه دولتی
                                              </option>
                                            </select>
                                        </div>
									
									</div>
										       
											
											
											
											
											
												
												
												
												<button name="send" type="submit" class="btn btn-success btn-lg btn-block">ثبت اطلاعات</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                      </div>
				
				
				
				
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                اطلاعات
                         
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
                                       
                                        <th class="hidden-phone">نام دانشگاه</th>
                     <th class="hidden-phone">شهر </th>

                                        <th class="hidden-phone">آدرس</th>
                                   <th class="hidden-phone">نوع</th>

									    <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php
								/*******variable $tbl_menu kar nakard!******/
								$s="SELECT * FROM `$tbl_uni` ORDER BY `id` DESC";
								$rmsb=$connect->query($s);
								while($rowsha=$rmsb->fetch(PDO::FETCH_ASSOC)){
								?>
								
								
								
								
                                    <tr class="odd gradeX">
									
                                        <td>
                                            <input name="check[]" type="checkbox" class="checkboxes" value="<?=$rowsha['id'];?>" /></td>
                                        <td><?=$rowsha['name'];?></td>
				 <td class="hidden-phone"><?=$rowsha['city'];?></td>
      <td class="hidden-phone">
								<?=$rowsha['address'];?>	
									</td>
                                         <td class="hidden-phone">
								<?=$rowsha['type'];?>	
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