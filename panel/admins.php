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

    <title>مدیران سایت</title>

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
		
$fileerr = $error = $uperror = $up =$extension = $wrong = $success =$telerr=$nameerr=$lnameerr=$usererr=$passerr=$emailerr=$moveerr=$uperr=$ext="";
$nameerr = $familyerr = $usererr = $passerr = $emailerr = $telerr = $fileempty= $ext =$fileerr  = $moveerr = $exist = $uperr = $wrong= $success =  "";
if(isset($_POST['send'])){
	if($_FILES["file"]["name"]!="" && $_POST["name"]!="" && $_POST["lname"]!="" && $_POST["username"]!="" && $_POST["password"]!=""  && $_POST["email"]!=""&& $_POST["tel"]!=""&& $_POST["status"]!=""){
				$name = prevent($_POST["name"]);
				$family = prevent($_POST["lname"]);
				$username = prevent($_POST["username"]);
				$password = prevent($_POST["password"]);
				$password = hashpassword($password);
				$email = prevent($_POST["email"]);
				$tel = prevent($_POST["tel"]);
				$status = checkid($_POST["status"]);
				if($status==1)
					$status = 1;
				else if($status==0)
					$status = 0;
				else 
					$status = 1;
				if($_FILES["file"]["error"]>0){
					//error
					$fileerr = "خطایی در فایل وجود دارد";
				}else{
					$filename = $_FILES["file"]["name"];
					$temp = $_FILES["file"]["tmp_name"];
					$type = $_FILES["file"]["type"];
					$white_list = array("image/jpeg","image/jpg","image/png");
					$file = md5($filename.microtime()).substr($filename,-5,5);
					$url = "img/admins/".$file;
					if(in_array($type,$white_list)){
						$sm = "SELECT `username` FROM `$tbl_manager` WHERE `username`=:user";
						$res = $connect->prepare($sm);
						$res->bindParam(":user",$username);
						$res->execute();
						if($res->rowCount()>=1){
							$exist = "کاربری با نام کاربری مورد نظر قبلا ثبت گردیده است";
						}else{
						if(is_uploaded_file($temp)){
							$move = move_uploaded_file($temp,"../img/admins/".$file);
							if($move){
								$sql = "INSERT INTO `$tbl_manager`(`id`,`name`,`lname`,`username`,`password`,`email`,`tel`,`pic`,`status`) VALUES(NULL,:name,:family,:username,:password,:email,:tel,:picture,:status)";
								$result = $connect->Prepare($sql);
								$result->bindParam(":name",$name);
								$result->bindParam(":family",$family);
								$result->bindParam(":username",$username);
								$result->bindParam(":password",$password);
								$result->bindParam(":email",$email);
								$result->bindParam(":tel",$tel);
								$result->bindParam(":picture",$url);
								$result->bindParam(":status",$status);
								$run = $result->execute();
								if($run){
									$success = "عملیات با موفقیت انجام شد";
								}else{
									$wrong = "خطا";
								}
							}else{
								$moveerr = "آپلود انجام نشد";
							}
						}else{
							$uperr = "فایل آپلودی نمی باشد";
						}
					}
					}else{
						$ext = "پسوند مجاز نمی باشد";
					}
				}
	}else{
		if(empty($_POST["name"])) $nameerr ="نام خالی می باشد";
		if(empty($_POST["lname"])) $lnameerr ="نام خانوادگی خالی می باشد";
		if(empty($_POST["username"])) $usererr ="نام کاربری خالی رها شده";
		if(empty($_POST["password"])) $passerr ="رمز عبور خالی است";
		if(empty($_POST["email"])) $emailerr ="ایمیل خالی رها شده";
		if(empty($_POST["tel"])) $telerr ="شماره تماس خالی می باشد";
		if(empty($_FILES["file"]["name"])) $fileerr ="فایل خالی است";
	}
}


if(isset($_GET['del_id'])){
	$id=checkid($_GET['del_id']);
	$sqlam="DELETE FROM `$tbl_manager` WHERE `id`=:id"; 
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
	$sqlam="DELETE FROM `$tbl_manager` WHERE `id`=:id"; 
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
								
				if(isset($nameerr) &&  $nameerr!=""){include "notice/name_err.php";}
				
			?>
			<?php	
								
				if(isset($lnameerr) &&  $lnameerr!=""){include "notice/lname_err.php";}
				
			?>
			<?php	
								
				if(isset($usererr) &&  $usererr!=""){include "notice/usererr.php";}
				
			?>
			<?php	
								
				if(isset($extension) &&  $extension!=""){include "notice/extension.php";}
				
			?>
				
			<?php	
								
				if(isset($fileerr) && $fileerr!=""){include "notice/fileerr.php";}
				
			?>
					
			<?php	
								
				if(isset($uperr) && $uperr!=""){include "notice/uperr.php";}
				
			?>
			<?php	
								
				if(isset($up) && $up!=""){include "notice/up.php";}
				
			?>						
			<?php	
								
				if(isset($passerr) &&  $passerr!=""){include "notice/passerr.php";}
				
			?>		
									
			<?php	
								
				if(isset($emailerr) &&  $emailerr!=""){include "notice/emailerr.php";}
				
			?>			
										
			<?php	
								
				if(isset($moveerr) &&  $moveerr!=""){include "notice/moveerr.php";}
				
			?>								
			 <?php	
								
				if(isset($telerr) &&  $telerr!=""){include "notice/telerr.php";}
				
			?>
					
			<?php	
								
				if(isset($error) &&  $error!=""){include "notice/error.php";}
				
			?>
					
			<?php	
								
				if(isset($exist) &&  $exist!=""){include "notice/exist.php";}
				
			?>
				
			<?php	
								
				if(isset($extension) &&  $extension!=""){include "notice/extension.php";}
				
			?>
			<?php	
								
				if(isset($uperror) && $uperror!=""){include "notice/uperr.php";}
			?>
			<?php					
				if(isset($up) && $up!=""){include "notice/up.php";}
			?>
			
			<?php	
			    if(isset($statuserr) && $statuserr!=""){include "notice/status_err.php";}			

			?>
		
			<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
			?>			
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
						<div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                   افزودن مدیر سایت
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									
									
									
                                        <div class="form">
									
										   
									
										
										   <label class="col-sm-2 control-label"> تصویر</label>
                                        <div class="col-sm-10">

										
										<input type="file" name="file"> 
									
                                            <span class="help-block">لطفا تصویر عکس پرسونلی را آپلود کنید</span>
                                        </div>
											   <label class="col-sm-2 control-label">نام</label><br>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control"><br><br>
                                        </div>
										
										
										  <label class="col-sm-2 control-label">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input name="lname" type="text" class="form-control"><br><br>
                                        </div>
										  
										  
										   <label class="col-sm-2 control-label">نام کاربری</label>
                                        <div class="col-sm-10">
                                            <input name="username" type="text" class="form-control"><br><br>
                                        </div>
										  <label class="col-sm-2 control-label">رمز عبور</label>
                                        <div class="col-sm-10">
                                            <input name="password" type="password" class="form-control"><br><br>
                                        </div>
										  <label class="col-sm-2 control-label">تلفن تماس</label>
                                        <div class="col-sm-10">
                                            <input name="tel" type="text" class="form-control"><br><br>
                                        </div>
										
										  <label class="col-sm-2 control-label">ایمیل</label>
                                        <div class="col-sm-10">
                                            <input name="email" type="email" class="form-control"><br><br>
                                        </div>
										
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">وضعیت</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="status">
                                                <option value="1">فعال</option>
                                             <option value="0">غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
											      
										       
											
											
											
											
											
												
												
												
												<button name="send" type="submit" class="btn btn-success btn-lg btn-block">افزودن مدیر سایت</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
						
						
                            <header class="panel-heading">
							مدیران سایت
                         
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
                                        <th>نام و نام خانوادگی</th>
                                        <th class="hidden-phone">نام کاربری</th>
                                       
                                        <th class="hidden-phone">شماره مبایل</th>
                                        <th class="hidden-phone">ایمیل</th>
				                      
                                        <th class="hidden-phone">وضعیت</th>
									    <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php
								$s="SELECT * FROM `$tbl_manager` ORDER BY `id` DESC";
								$rmsb=$connect->query($s);
							
						
								while($rowsha=$rmsb->fetch(PDO::FETCH_ASSOC)){
								?>
								
								
								
								
                                    <tr class="odd gradeX">
									
                                        <td>
                                            <input name="check[]" type="checkbox" class="checkboxes" value="<?=$rowsha['id'];?>" /></td>
                                        <td><?=$rowsha['name'];?>&nbsp <?=$rowsha['lname'];?>  </td>
										     <td class="hidden-phone"><?=$rowsha['username'];?></td>   
					 	                   <td class="hidden-phone"><?=$rowsha['tel'];?></td>                                   
 					 	                   <td class="hidden-phone"><?=$rowsha['email'];?></td>                                   
 
										                                  
										                           

                                             
                                        <td class="hidden-phone">
										<?php 
									if($rowsha['status']==1)
										 include "notice/active.php";
									 
									
									
								
									elseif($rowsha['status']==0)
										include "notice/deactive.php";
									
									else
								include "notice/none.php";

							?>
									</td>
									 <td class="hidden-phone">
									 
									 <?php 
									 
									 
									$idha=$rowsha['id'];
									 ?>
								<a  href="?del_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-danger"><i class="icon-remove-sign"></i>حذف</button></a>
                           	    <a href="edit_admin.php?edit_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-warning"><i class="icon-pencil"></i>ویرایش</button></a>
								
									
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