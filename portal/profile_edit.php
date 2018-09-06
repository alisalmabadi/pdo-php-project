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

    <title>ویرایش کاربر</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
<script type="text/javascript" src="assets/js-persian-cal.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
	$(document).ready(function(){
		$('.input-sm.m-bot15.group').change(function(){
			var id = $(this).val();
			var getsemat = true;
			$.post('ajax.php',{id:id,getsemat:getsemat},function(data){
				$('.semat').html(data);
			});
		});
	});
</script>
            <script type="text/javascript">
	$(document).ready(function(){
		$('.delgs').click(function(){
			var id_groups = $(this).val();
            var id_user= $('.edit_user').val();
			var delete_no = true;
			$.post('ajax.php',{id_groups:id_groups,id_user:id_user,delete_no:delete_no},function Go_HomePage(){
				
        
            location.reload ( );
        
			});
		});
	});
</script>
    
     <script type="text/javascript">
	$(document).ready(function(){
		$('.delgs2').click(function(){
			var id_semat = $(this).val();
            var id_usersams= $('.edit_user').val();
			var delete_no2 = true;
			$.post('ajax.php',{id_semat:id_semat,id_usersams:id_usersams,delete_no2:delete_no2},function Go_HomePage(){
				
        
            location.reload ( );
        
			});
		});
	});
</script>
</head>

<body>


    <section id="container">
    <?php include "header.php";?>
    <?php include "menu.php"; ?>
	
		<?php
		      $id1=$_SESSION["user_id"];

$fileerr = $error = $uperror = $up =$extension = $wrong = $success =$telerr=$nameerr=$lnameerr=$usererr=$passerr=$emailerr=$moveerr=$uperr=$ext="";
$nameerr = $familyerr = $usererr = $passerr = $emailerr = $telerr = $fileempty= $ext =$fileerr  = $moveerr = $exist = $uperr = $wrong= $success =$notedit=  "";
/********etelaatkli************************/
   
        
        if(isset($_POST["edit_info"])){
            if($_POST["name"]!="" && $_POST["lname"]!="" && $_POST["email"]!="" && $_POST["sex"]!="" && $_POST["date"]!="" && $_POST["tel"]!=""){
           $name = prevent($_POST["name"]);
                $sex = checkid($_POST["sex"]);
             if($sex==1){
					$sex = 1;
				}else if($sex==0){
					$sex = 0;
				}else{ 
					$sex = 1;}
				$family = prevent($_POST["lname"]);
        		$fname = prevent($_POST["fname"]);
                $ftel= prevent($_POST["ftel"]);
                $fjob=prevent($_POST["fjob"]);
                $haddress = prevent($_POST["haddress"]);      
                $paye=checkid($_POST["tahsil"]); 
                $reshteh=checkid($_POST["reshteh"]);  
                $htel=prevent($_POST["htel"]); 
                $bdate=prevent($_POST["date"]); 
				$password = prevent($_POST["password"]);
				$password = hashpassword($password);
				$email = prevent($_POST["email"]);
				$tel = prevent($_POST["tel"]);
				$status = checkid($_POST["status"]);
				if($status==1){ 
					$status = 1;
				}else if($status==0){
					$status = 0;
                        }else{
					$status = 1;}
            $edit_id=checkid($_POST["edit_id"]);
           
              if($_POST["password"]!=""){
                   $sf="UPDATE `$tbl_user` SET `name`=?,`jensiat`=?,`lastname`=?,`father_name`=?,`father_job`=?,`father_tel`=?,`password`=?,`reshteh`=?,`paye`=?,`birthday`=?,`home_address`=?,`home_tel`=?,`email`=?,`tel`=?,`status`=? WHERE `id`=?";
                 $resultamc=$connect->prepare($sf);
                $resultamc->bindValue(1,$name);
                $resultamc->bindValue(2,$sex);  
                $resultamc->bindValue(3,$family);
                $resultamc->bindValue(4,$fname);
                $resultamc->bindValue(5,$fjob);
                $resultamc->bindValue(6,$ftel);
                $resultamc->bindValue(7,$password);
                $resultamc->bindValue(8,$reshteh);
                $resultamc->bindValue(9,$paye);
                $resultamc->bindValue(10,$bdate);
                $resultamc->bindValue(11,$haddress);
                $resultamc->bindValue(12,$htel);
                $resultamc->bindValue(13,$email);
                $resultamc->bindValue(14,$tel);
                $resultamc->bindValue(15,$status);
                $resultamc->bindValue(16,$id1);
                if($resultamc->execute()){
                    $success="با موفقیت ویرایش انجام شد";
                   }else{
                        $wrong="خطا در ویرایش";
                        
                    }
                
              
                  
              }else{
                  
                  
              
                 $s="UPDATE `$tbl_user` SET `name`=?,`jensiat`=?,`lastname`=?,`father_name`=?,`father_job`=?,`father_tel`=?,`reshteh`=?,`paye`=?,`birthday`=?,`home_address`=?,`home_tel`=?,`email`=?,`tel`=?,`status`=? WHERE `id`=?";
                 $resultama=$connect->prepare($s);
                $resultama->bindValue(1,$name);
                $resultama->bindValue(2,$sex);  
                $resultama->bindValue(3,$family);
                $resultama->bindValue(4,$fname);
                $resultama->bindValue(5,$fjob);
                $resultama->bindValue(6,$ftel);
                $resultama->bindValue(7,$reshteh);
                $resultama->bindValue(8,$paye);
                $resultama->bindValue(9,$bdate);
                $resultama->bindValue(10,$haddress);
                $resultama->bindValue(11,$htel);
                $resultama->bindValue(12,$email);
                $resultama->bindValue(13,$tel);
                $resultama->bindValue(14,$status);
                $resultama->bindValue(15,$id1);
                if($resultama->execute()){
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
                    $edit_id=checkid($_POST["edit_id"]);
					$white_list = array("image/jpeg","image/jpg","image/png");
					$file = md5($filename.microtime()).substr($filename,-5,5);
					$url = "img/users/".$file;
					if(in_array($type,$white_list)){
						if(is_uploaded_file($temp)){
                        $query="SELECT `pic` FROM  `$tbl_user` WHERE `id`=:id";
                            $natije=$connect->prepare($query);
                            $natije->bindParam(":id",$id1);
                            $natije->execute();
                            $satr=$natije->fetch(PDO::FETCH_ASSOC);
                            unlink("../".$satr["pic"]);
				$move=move_uploaded_file($temp,"../img/users/".$file);
							if($move){
								$m="UPDATE `$tbl_user` SET `pic`=? WHERE `id`=?";
                                $f=$connect->prepare($m);
                                $f->bindValue(1,$url);
                                $f->bindValue(2,$id1);
    
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
/**********************group & semat edit*****************/
        
   /*
     if(isset($_POST["edit_gs"])){
         if($_POST["group"]!=""){
                if($_POST["group"]!="zero" && $_POST["semat"]!=""){
                 $edit_id=checkid($_POST["edit_id"]);

        $semat_id=checkid($_POST["semat"]);
        $group_id=checkid($_POST["group"]);
                    $mbc="INSERT INTO `$tbl_group_semat` SET `group_id`=:gid,`semat_id`=:sid,`user_id`=:id";
             $hmb=$connect->prepare($mbc);
             $hmb->bindParam(":gid",$group_id);
             $hmb->bindParam(":sid",$semat_id);
             $hmb->bindParam(":id",$edit_id);
             if($hmb->execute()){
                 $success="افزودن گروه به خوبی انجام گردید.";
                 
             }else{
                 $wrong="خطا در ویرایش گروه کاربری";
                 
             }    
                }else{
                    
                    
                    $grouperrs="گروه مجاز نیست.";
                }
         }else{
             $grouperr="لطفا گروهی را برای کاربر انتخاب نمایید.";
             
         }
         }
         
     
         
     */
       
   


/**********************group & semat edit*****************/

/***********************useredit**************/
        /*
 if(isset($_POST["edit_username"])){
	if($_POST["username"]!=""){
		$username = prevent($_POST["username"]);
		$id = checkid($_POST["edit_ida"]);
		$sql = "SELECT `username` FROM `$tbl_user` WHERE `id`=?";
		$result=$connect->prepare($sql);
		$result->bindValue(1,$id);
		$result->execute();
		$rows = $result->fetch(PDO::FETCH_ASSOC);
		$olduser = $rows['username'];
		if($_POST["username"]!=$olduser){
			$query = $connect->prepare("SELECT `username` FROM `$tbl_user` WHERE `username`=?");
			$query->bindValue(1,$username);
			$query->execute();
			if($query->rowCount()>=1){
				$exist = "نام کاربری موجود می باشد لطفا یک نام کاربری دیگر را انتخاب نمایید";
			}else{
				$sdd ="UPDATE `$tbl_user` SET `username`=?";
				$resa = $connect->prepare($sdd);
				$resa->bindValue(1,$username);
				if($resa->execute()){
					$success = "ویرایش نام کاربری با موفقیت انجام شد";
				}else{
					$wrong = "خطا در ویرایش نام کاربری";
				}
			}
		}else{
			$notedit = "نام کاربری تغییری نکرده است";
		}
	}else{
		$usererr = "نام کاربری خالی می باشد";
	}
}
            
      */      
        
/***********************useredit**************/




?>

        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
				     <div class="notification">
                
                
                </div>

									
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
								
				if(isset($grouperrs) &&  $grouperrs!=""){include "notice/groups_err.php";}
				
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
								
				if(isset($grouperr) &&  $grouperr!=""){include "notice/grouperr.php";}
				
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
    $sms="SELECT `pic`,`id` FROM `$tbl_user` WHERE `id`=:id";
     $resss=$connect->prepare($sms);
     $resss->bindParam(":id",$id1);
 $resss->execute();
         
            while($rowshaman=$resss->fetch(PDO::FETCH_ASSOC)){                            
                                        
     ?>

       <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
						<div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                         ویرایش عکس کاربر
                                 
                                    </header>
   
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									      <input type="hidden" name="edit_id" value="<?=$rowshaman["id"];?>">

									
									
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
                                ویرایش اطلاعات کلی کاربر
                                    </header>
   
									<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
									
									
									
                                        <div class="form">
									
										   
									
										
                                            
                                                               <div class="panel-body">
    <?php
         $s="SELECT * FROM `$tbl_user` WHERE `id`=:id";
     $res=$connect->prepare($s);
     $res->bindParam(":id",$id1);
 $res->execute();
         
            while($row=$res->fetch(PDO::FETCH_ASSOC)){                            
                                        
     ?>
      <input type="hidden" name="edit_id" value="<?=$row["id"];?>">
                                                                           
											 <label class="col-sm-2 control-label">نام</label><br>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control" value="<?=$row["name"];?>"><br><br>
                                        </div>
										
										
										  <label class="col-sm-2 control-label">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input name="lname" type="text" class="form-control" value="<?=$row["lastname"];?>"><br><br>
                                        </div>
										   <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">جنسیت</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="sex">
                                <option value="1" <?php if($row["jensiat"]==1){ echo "selected";} ?> >پسر</option>
                             <option value="0" <?php if($row["jensiat"]==0){ echo "selected";}?>>دختر</option>

                                            </select>
                                        </div>
									
									</div>
										  
										  
										  <label class="col-sm-2 control-label">نام پدر</label>
                                        <div class="col-sm-10">
                 <input name="fname" type="text" class="form-control" value="<?=$row["father_name"];?>"><br><br>
                                        </div>
                                            <label class="col-sm-2 control-label">شغل پدر</label>
                                        <div class="col-sm-10">
             <input name="fjob" type="text" class="form-control" value="<?=$row["father_job"];?>"><br><br>
                                        </div>
										<label class="col-sm-2 control-label">شماره پدر</label>
                                        <div class="col-sm-10">
                                            <input name="ftel" type="text" class="form-control" value="<?=$row["father_tel"];?>"><br><br>
                                        </div>
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">پایه یا وضعیت تحصیلی</label>
                                        <div class="col-lg-10">
                                        

                                          <select class="form-control input-sm m-bot15" name="tahsil">
                                              
                                                <?php
                                            $smb="SELECT `title`,`id` FROM `$tbl_tahsil`";
                                    $resultamm=$connect->query($smb);
                                            while($rowsha=$resultamm->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                 <option value="<?=$rowsha['id'];?>"><?=$rowsha['title'];?></option>
                                              <?php
                                                
                                                }
                                                ?>


                                            </select>
  <?php 
     $paye_id=$row["paye"];                                          
    $sns="SELECT * FROM `$tbl_tahsil` WHERE `id`=:id";
    $resamams=$connect->prepare($sns);
    $resamams->bindParam(":id",$paye_id);
    $resamams->execute();
    while($tabsha=$resamams->fetch(PDO::FETCH_ASSOC)){
                                 
    ?> 
                                            <button type="button" class="btn btn-danger">وضعیت تحصیلی فعلی : &nbsp;<?=$tabsha["title"];?> </button>

<?php
    }
                ?>                                         
                                        </div>
									
									</div>
                                                                   
                
									    <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">رشته تحصیلی</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="reshteh">
                                              
                                                <?php
                                            $smb="SELECT `name`,`id` FROM `$tbl_reshteh`";
                                    $resultamm=$connect->query($smb);
                                            while($rowsha=$resultamm->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                         <option value="<?=$rowsha['id'];?>"> <?=$rowsha['name'];?></option>
                                                <?php
                                                
                                                }
                                                ?>
                                            </select>
                                           <?php 
     $reshte_id=$row["reshteh"];                                          
    $sn="SELECT * FROM `$tbl_reshteh` WHERE `id`=:id";
    $resamam=$connect->prepare($sn);
    $resamam->bindParam(":id",$reshte_id);
    $resamam->execute();
    while($tabs=$resamam->fetch(PDO::FETCH_ASSOC)){
                                 
    ?> 
                                            <button type="button" class="btn btn-warning">رشته فعلی:&nbsp; &nbsp; <?=$tabs["name"];?> </button>

<?php
    }
                ?>
                                        </div>
									
									</div>
											
                                            
                                            
                                            
                                            
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">تاریخ تولد</label>
                                        <div class="col-lg-10">
									
                                            <p class="box center">
		
	</p>

	<div>

		
		<input type="text" id="pcal3" class="pdate" name="date" value="<?=$row["birthday"];?>"><br>
		
	
	</div>

                                            
                                            
                                            
                                            
                                            
                                                        </div>
                                            </div>
										  
										
										  <label class="col-sm-2 control-label">رمز عبور</label>
                                        <div class="col-sm-10">
                                            <input name="password" type="password" class="form-control"><br><br>
                                        </div>
										  <label class="col-sm-2 control-label">تلفن تماس</label>
                                        <div class="col-sm-10">
                                            <input name="tel" type="text" class="form-control" value="<?=$row["tel"];?>"><br><br>
                                        </div>
										 <label class="col-sm-2 control-label">تلفن منزل</label>
                                        <div class="col-sm-10">
                                            <input name="htel" type="text" class="form-control" value="<?=$row["home_tel"];?>"><br><br>
                                        </div>
                                            
                                            <label class="col-sm-2 control-label">آدرس منزل</label>
                                        <div class="col-sm-10">
                                            <input name="haddress" type="text" class="form-control" value="<?=$row["home_address"];?>"><br><br>
                                        </div>
										  <label class="col-sm-2 control-label">ایمیل</label>
                                        <div class="col-sm-10">
                                            <input name="email" type="email" class="form-control" value="<?=$row["email"];?>"><br><br>
                                        </div>
										
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">وضعیت</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="status">
                    <option value="1" <?php if($row['status']=="1") echo "selected";?>>فعال</option>
                    <option value="0" <?php if($row['status']=="0") echo "selected";?>>غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
                                                                  
												<button name="edit_info" type="submit" class="btn btn-success btn-lg btn-block">ویرایش اطلاعات </button>
                                            </form>
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>

                                 
                                  <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
					
                                <section class="panel">
                                    
   <a href="profile.php">
 <button type="submit" class="btn btn-danger btn-lg btn-block">بازگشت به پروفایل </button>
                                            
                            </a>                 
                                             
                                        </div>
                                    </div>
                                </section>
                            </div>
                                 </div>
                                 
                                  <?php } ?>
                                 
                                 
                                 
                            </div>
                            
                           
                
             
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
                       </section>
			    <script type="text/javascript">
	
		
		var objCal3 = new AMIB.persianCalendar( 'pcal3', {
				defaultDate: '1370/12/12'
			}
		);
		
		
		
	</script>

<script type="text/javascript" src="assets/js-persian-cal.min.js"></script>
				
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