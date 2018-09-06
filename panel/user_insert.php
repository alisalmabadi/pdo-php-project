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

    <title>افزودن کاربر جدید</title>

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

</head>

<body>


    <section id="container">
    <?php include "header.php";?>
    <?php include "menu.php"; ?>
	<?php
       $nRows = $connect->query("SELECT COUNT(*) FROM `$tbl_user`")->fetchColumn(); 
        $usernum=$nRows+1;
        ?>
        
		<?php
		
$fileerr = $error = $uperror = $up =$extension = $wrong = $success =$telerr=$nameerr=$lnameerr=$usererr=$passerr=$emailerr=$moveerr=$uperr=$ext="";
$nameerr = $familyerr = $usererr = $passerr = $emailerr = $telerr = $fileempty= $ext =$fileerr  = $moveerr = $exist = $uperr = $wrong= $success =$error_group= "";
if(isset($_POST['send'])){
	if($_POST["name"]!="" && $_POST["lname"]!="" && $_POST["username"]!="" && $_POST["password"]!="" && $_POST["tel"]!=""){		
        
           $username = prevent($_POST["username"]);
           $password = prevent($_POST["password"]);
           $password = hashpassword($password);                                                                    
            $name = prevent($_POST["name"]);
            $family = prevent($_POST["lname"]);
           $jensiat = checkid($_POST["jensiat"]);
                  $fname = "خالی";
                  $reshteh = "خالی";
                  $paye="خالی";        
                  $uniid="0"; 
                  $hadd="خالی"; 
                  $htel="خالی"; 
                  $ftel="خالی";  
                  $fjob="خالی";  
                  $email="خالی";       
                  $bio="خالی";
                  $pic="/img/users/user.png";                                                                                
                  $bdate=$_POST["date"];                                                                                
				$status = checkid($_POST["status"]);
				if($status==1){ 
					$status = 1;
				}elseif($status==0){
					$status = 0;
				}else{
					$status = 1;
                }                                                                     $tel = prevent($_POST["tel"]);

       
                $gid=checkid($_POST["group"]); 
                $sid=checkid($_POST["semat"]); 
				
               
$sql="INSERT INTO `$tbl_user` (`id`, `username`, `password`, `name`, `lastname`, `jensiat`, `father_name`, `reshteh`, `paye`, `uni_id`, `birthday`, `status`, `home_address`, `home_tel`, `tel`, `father_tel`, `father_job`, `email`, `bio`, `pic`) VALUES(NULL,:username,:password,:name,:family,:jensiat,:fname,:reshteh,:paye,:unid,:bdate,:status,:hadd,:htel,:tel,:ftel,:fjob,:email,:bio,:pic)";
								$result = $connect->prepare($sql);
        						$result->bindParam(":username",$username);
                            	$result->bindParam(":password",$password);
								$result->bindParam(":name",$name);
								$result->bindParam(":family",$family);
                             	$result->bindParam(":jensiat",$jensiat);
                                $result->bindParam(":fname",$fname); 
                                $result->bindParam(":reshteh",$reshteh);                                                             $result->bindParam(":paye",$paye);
                                $result->bindParam(":unid",$uniid);                                                        
        				        $result->bindParam(":bdate",$bdate);
								$result->bindParam(":status",$status); 
                                $result->bindParam(":hadd",$hadd); 
                                $result->bindParam(":htel",$htel);  
          						$result->bindParam(":tel",$tel);                                                                  
                                $result->bindParam(":ftel",$ftel);  
                                $result->bindParam(":fjob",$fjob);  
                                $result->bindParam(":email",$email);  
                                $result->bindParam(":bio",$bio);                                                         
                                $result->bindParam(":pic",$pic);                                                          
                                if($result->execute()){ 
                                
                                    $sql3="INSERT INTO `$tbl_group_semat`(`id`,`user_id`,`group_id`,`semat_id`) VALUES(NULL,:id,:gpid,:sematid)";
                                $res2=$connect->prepare($sql3);
                                $res2->bindParam(":id",$usernum);
                                $res2->bindParam(":gpid",$gid);
                                $res2->bindParam(":sematid",$sid);
                                if($res2->execute()){
                                            $success="اطلاعات با موفقیت ثبت گردید.";

                                }else{
                                    
                                    $error="گروه ها وارد نمیشه";
                                }
                                    
                                  }else{
                                    
                                    $wrong="اطلاعات اولیه مشکل دارن";
                                }
                         
                          

                                   
}else{
		if(empty($_POST["name"])) $nameerr ="نام خالی می باشد";
		if(empty($_POST["lname"])) $lnameerr ="نام خانوادگی خالی می باشد";
		if(empty($_POST["username"])) $usererr ="نام کاربری خالی رها شده";
		if(empty($_POST["password"])) $passerr ="رمز عبور خالی است";
		if(empty($_POST["tel"])) $telerr ="شماره تماس خالی می باشد";
	}


	}				                        
    
	
?>

        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
									
		 <div class="col-lg-12">
	<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
									<p>
									
									<?php
									
									
							echo " در این صفحه تنها اطلاعات کلی کاربران را وارد نمایید."."<br>";
                           echo "تمامی فیلدها باید پر شود."."<br>";
                           echo "اطلاعات تکمیلی هر کاربر را میتوانید پس از ثبت کاربر در قسمت ویرایش کاربر وارد نمایید."."<br>";
                           echo "لطفا در قسمت گروه و سمت گروه و سمت شاخص فرد را تعیین کنید بعدا میتوانید چندین گروه و سمت برای کاربر قرار دهید.."."<br>";


                                       
									
									?>
									</p>
									</div>
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
								
				if(isset($extension) &&  $extension!=""){include "notice/extension.php";}
				
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
				if(isset($error1) && $error1!=""){echo $error1."<br>";
}
			?>
                 <?php
				if(isset($error2) && $error2!=""){echo $error2."<br>";
}
			?> <?php
				if(isset($error3) && $error3!=""){echo $error3."<br>";
}
			?> <?php
				if(isset($error4) && $error4!=""){echo $error4."<br>";
}
			?> <?php
				if(isset($error4) && $error4!=""){echo $error4."<br>";
}
			?>
                <?php
				if(isset($error5) && $error5!=""){echo $error5."<br>";
}
			?>
               
                
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
						<div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                                 کاربر جدید
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
                                        <div class="form">
									
										  
											   <label class="col-sm-2 control-label">نام</label><br>
                                        <div class="col-sm-10">
                                            <input name="name" type="text" class="form-control"><br><br>
                                        </div>
										
										
										  <label class="col-sm-2 control-label">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input name="lname" type="text" class="form-control"><br><br>
                                        </div>
										   <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">جنسیت</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="jensiat">
                                                <option value="1">پسر</option>
                                             <option value="0">دختر</option>

                                            </select>
                                        </div>
									
									</div>
										  
										  
                                           
                                            <header class="panel-heading">
انتخاب گروه                               
                                            
                                    </header>
                                            <br>
											   <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">نام گروه </label>
                                        <div class="col-lg-10">
                                          

                                          <select class='form-control input-sm m-bot15 group' name="group" id='group'>
                                              				<option value="zero">گروه را انتخاب کنید</option>

                                                <?php
                                            $sv="SELECT * FROM `$tbl_group` WHERE `status`=1";
                                    $resulta=$connect->query($sv);
                                            while($rowsa=$resulta->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                         <option value="<?=$rowsa['id'];?>"> <?=$rowsa['title'];?></option>
                                                <?php
                                                
                                                }
                                                ?>
                                            </select>
                                           
                                        </div>
									
									</div>
                                             
                                            <div class="form-group">
                                         <label class="control-label col-lg-2" for="inputSuccess">نام سمت</label>
                                        <div class="col-lg-10">
                                          <select class='form-control input-sm m-bot15 semat' name="semat" id='semat'>
                                             
                                            </select>
                                            



                                    </div>
									
									</div>
                                            
                                             
                                            <hr>
                                            
                                            
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">تاریخ تولد</label>
                                        <div class="col-lg-10">
									
                                            <p class="box center">
		
	</p>

	<div>

		
		<input type="text" id="pcal3" class="pdate" name="date"><br>
		
	
	</div>

                                            
                                            
                                            
                                            
                                            
                                                        </div>
                                            </div>
										  
										   <label class="col-sm-2 control-label">نام کاربری(کدملی)</label>
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
										<div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">وضعیت</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-sm m-bot15" name="status">
                                                <option value="1">فعال</option>
                                             <option value="0">غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
											      
										      
												<button name="send" type="submit" class="btn btn-success btn-lg btn-block">افزودن کاربر جدید</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
						
						
                           
                        </section>
                    </div>
             
                <!-- page end-->
            
        </section>
        <!--main content end-->
    </section>

			    
	

<script type="text/javascript">
	
		
		var objCal3 = new AMIB.persianCalendar( 'pcal3', {
				defaultDate: '1370/12/12'
			}
		);
		
		
		
	</script>

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
	<script type="text/javascript" src="assets/js-persian-cal.min.js"></script>

</body>
</html>