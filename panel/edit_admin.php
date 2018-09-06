<?php include "inc/onload.php"; ?>

<?php
	if(isset($_GET['edit_id'])){
		$eid=(int)($_GET["edit_id"]);
	}else{
        
        header('Location:admins.php');
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

    <title>ویرایش مدیران سایت</title>

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
$nameerr = $familyerr = $usererr = $passerr = $emailerr = $telerr = $fileempty= $ext =$fileerr  = $moveerr = $exist = $uperr = $wrong= $success =$notedit=  "";
        if(isset($_POST["edit_info"])){
            if($_POST["name"]!="" && $_POST["lname"]!="" && $_POST["email"]!="" && $_POST["tel"]!="" && $_POST["status"]!=""){
            $name = prevent($_POST["name"]);
				$family = prevent($_POST["lname"]);
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
                $edit_id=checkid($_POST["edit_id"]);
              if($_POST["password"]!=""){
                   $s="UPDATE `$tbl_manager` SET `name`=?,`lname`=?,`password`=?,`email`=?,`tel`=?,`status`=? WHERE `id`=?";
                 $resultam=$connect->prepare($s);
                $resultam->bindValue(1,$name);
                $resultam->bindValue(2,$family);
                $resultam->bindValue(3,$password);
                $resultam->bindValue(4,$email);
                $resultam->bindValue(5,$tel);
                $resultam->bindValue(6,$status);
                $resultam->bindValue(7,$edit_id);
                if($resultam->execute()){
                    $success="با موفقیت ویرایش انجام شد";
                   }else{
                        $wrong="خطا در ویرایش";
                        
                    }
                
              
                  
              }else{
                  
                  
              
                $s="UPDATE `$tbl_manager` SET `name`=?,`lname`=?,`email`=?,`tel`=?,`status`=? WHERE `id`=?";
                 $resultam=$connect->prepare($s);
                $resultam->bindValue(1,$name);
                $resultam->bindValue(2,$family);
                $resultam->bindValue(3,$email);
                $resultam->bindValue(4,$tel);
                $resultam->bindValue(5,$status);
                $resultam->bindValue(6,$edit_id);
                 if($resultam->execute()){
                    $success="با موفقیت ویرایش انجام شد";
                 }else{
                        $wrong="خطا در ویرایش";
                        
                    }
              }
        
            }else{
               if(empty($_POST["name"])) $nameerr ="نام خالی می باشد";
		if(empty($_POST["lname"])) $lnameerr ="نام خانوادگی خالی می باشد";
		
		if(empty($_POST["email"])) $emailerr ="ایمیل خالی رها شده";
		if(empty($_POST["tel"])) $telerr ="شماره تماس خالی می باشد"; 

            }
        }
/**********************picedit*****************/
        
           if(isset($_POST['pic_edit'])){
        
	if($_FILES["file"]["name"]!=""){
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
						if(is_uploaded_file($temp)){
                        $query="SELECT `pic` FROM  `$tbl_manager` WHERE `id`=?";
                            $natije=$connect->prepare($query);
                            $natije->bindValue(1,$eid);
                            $natije->execute();
                            $satr=$natije->fetch(PDO::FETCH_ASSOC);
                          
                            unlink("../".$satr["pic"]);
							$move = move_uploaded_file($temp,"../img/admins/".$file);
							if($move){
								$m="UPDATE `$tbl_manager` SET `pic`=?";
                                $f=$connect->prepare($m);
                                $f->bindValue(1,$url);
                                if($f->execute()){
                                    
                                    $success="آپلود و ویرایش تصویر با موفقیت انجام شد.";
                                    
                                    
                                }else{
                                    $wrong="خطا در ویرایش تصویر";
                                    
                                }
                                
								
							}else{
								$moveerr = "آپلود انجام نشد";
							}
						}else{
							$uperr = "فایل آپلودی نمی باشد";
						}
					
					}else{
						$ext = "پسوند مجاز نمی باشد";
					}
				}
	}else{
		
		if(empty($_FILES["file"]["name"])) $fileerr ="فایل خالی است";
	}
}

/**********************picedit*****************/



/***********************useredit**************/
        if(isset($_POST["user_edit"])){
            if($_POST["username"]!=""){
            $username=prevent($_POST["username"]);
            $id=checkid($_POST["edit_id"]);
            $mb="SELECT `username` FROM `$tbl_manager` WHERE `id`=:id";
            $rs=$connect->prepare($mb);
            $rs->bindParam(":id",$id);
            $rs->execute();
            $rowsham=$rs->fetch(PDO::FETCH_ASSOC);
            $old_username=$rowsham["username"];
     if($_POST["username"]!=$old_username){
    $dastor="SELECT `username` FROM `$tbl_manager` WHERE `username`=:username";
                           $ros=$connect->prepare($dastor);
                           $ros->bindParam(":username",$username);
                           $ros->execute();
                           if($ros->rowCount()>=1){
                               $exist="نام کاربری قبلا انتخاب شده،نام دیگری را برگزینید.";
                               
                           }else{
       $update="UPDATE `$tbl_manager` SET `username`=?";
       $resulteh=$connect->prepare($update);
       $resulteh->bindValue(1,$username);
        if($resulteh->execute()){
            $success="نام کاربری افزوده شد.";
            
        }else{
            
            $wrong="خطا در ویرایش نام کاربری";
        }
                               
                       }
                           
                       }else{
                           $notedit="لطفا نام کاربری تکراری وارد نکنید!";
                           
                       }
                      
                   }else{
                                      $usererr="نام کاربری را خالی رها کرده اید،مقداری وارد کنید.";

                
                
            }
                
            }
            
            
        
/***********************useredit**************/



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
								
				if(isset($notedit) &&  $notedit!=""){include "notice/notedit.php";}
				
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
                
     
    <?php
    $sms="SELECT `pic` FROM `$tbl_manager` WHERE `id`=:id";
     $resss=$connect->prepare($sms);
     $resss->bindParam(":id",$eid);
 $resss->execute();
         
            while($rowshaman=$resss->fetch(PDO::FETCH_ASSOC)){                            
                                        
     ?>

       <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
						<div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                         ویرایش عکس مدیر
                                 
                                    </header>
   
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									
									
									
                                        <div class="form">
									 <div class="panel-body">
                                                                           
								     <label class="col-sm-2 control-label"> تصویر</label>
                                        <div class="col-sm-10">
<img src="<?php echo "../". $rowshaman["pic"]; ?>"  width="200px" height="220px;">

										<input type="file" name="file"> 
									
                                            <span class="help-block">لطفا تصویر عکس پرسونلی را آپلود کنید</span>
                                        </div>
                                                                                 
                                                                                                                
                                            <?php
            }
                
                ?>
										    
                                            <button type="submit" class="btn btn-danger btn-xs btn-block" name="pic_edit" style="height:40px;font-size:15px;">ویرایش عکس کاربری</button>
												
                                            </form>
             
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>


         
                
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
						<div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                ویرایش اطلاعات کلی مدیر
                                    </header>
   
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									
									
									
                                        <div class="form">
									
										   
									
										
                                            
                                                               <div class="panel-body">
    <?php
         $s="SELECT * FROM `$tbl_manager` WHERE `id`=:id";
     $res=$connect->prepare($s);
     $res->bindParam(":id",$eid);
 $res->execute();
         
            while($row=$res->fetch(PDO::FETCH_ASSOC)){                            
                                        
     ?>
      <input type="hidden" name="edit_id" value="<?=$row["id"];?>">
                                                                           
											   <label class="col-sm-2 control-label">نام</label><br>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" value="<?=$row["name"];?>" class="form-control"><br><br>
                                        </div>
										
										
										  <label class="col-sm-2 control-label">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input name="lname" value="<?=$row["lname"];?>" type="text" class="form-control"><br><br>
                                        </div>
										  
										  
										  <label class="col-sm-2 control-label">رمز عبور</label>
                                        <div class="col-sm-10">
                                            <input name="password" type="password" class="form-control"><br><br>
                                        </div>
										  <label class="col-sm-2 control-label">تلفن تماس</label>
                                        <div class="col-sm-10">
                                            <input name="tel" value="<?=$row["tel"];?>" type="text" class="form-control"><br><br>
                                        </div>
										
										  <label class="col-sm-2 control-label">ایمیل</label>
                                        <div class="col-sm-10">
                                            <input name="email" value="<?=$row["email"];?>" type="email" class="form-control"><br><br>
                                        </div>
										
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">وضعیت</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="status">
                                                <option value="1" <?php if($row["status"]==1) echo "selected"; ?>>فعال</option>
                                             <option value="0" <?php if($row["status"]==0) echo "selected"; ?>>غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
<?php
       }         
                
                
                ?>
										       
											
		
											
											
												
												
												
												<button name="edit_info" type="submit" class="btn btn-success btn-lg btn-block">ویرایش اطلاعات اولیه</button>
                                            </form>
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>

                             <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
						<div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                             ویرایش نام کاربری
                                 
                                    </header>
   
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									
									
									
                                        <div class="form">
									
                                                             <div class="panel-body">
    <?php
    $sms="SELECT `username`,`id` FROM `$tbl_manager` WHERE `id`=:id";
     $resss=$connect->prepare($sms);
     $resss->bindParam(":id",$eid);
 $resss->execute();
         
            while($rowsa=$resss->fetch(PDO::FETCH_ASSOC)){                            
                                        
     ?>
      <input type="hidden" name="edit_id" value="<?=$rowsa["id"];?>">
                                                                           
											   <label class="col-sm-2 control-label">نام کاربری</label><br>
                                        <div class="col-sm-10">
                                            <input name="username" id="edit_username" type="text" value="<?=$rowsa["username"];?>" class="form-control"><br><br>
                                            
                                        
                                        </div>
                                                                                 
                                                                                                                
                                            <?php
            }
                
                ?>
										    
                                            <button type="submit" class="btn btn-warning btn-block" name="user_edit">ویرایش نام کاربری</button>
												
                                            </form>
             
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>

                            
                            
                            
                           
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