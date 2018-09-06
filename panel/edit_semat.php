<?php include "inc/onload.php"; ?>

<?php
	if(!isset($_GET['edit_id'])){
		header('Location:semat.php');
		exit();
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

    <title>ویرایش سمت ها</title>

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
	if($_POST["title"]!="" && $_POST["status"]!="" && $_POST['group']){
			$title = prevent($_POST["title"]);
			$des = prevent($_POST["des"]);
			$group_id=checkid($_POST['group']);
			$status = checkid($_POST["status"]);
				if($status==1){
					$status=1;
				}else if($status==0){
					$status=0;
				}else{
					$status = 1;
				}
			$id = checkid($_POST["getid"]);
			$sql = "UPDATE `$tbl_semat` SET `title`=:title,`group_id`=:group_id,`des`=:des,`status`=:status WHERE `id`=:id";
			$result = $connect->prepare($sql);
			$result->bindParam(":title",$title);
	    	$result->bindParam(":group_id",$group_id);

			$result->bindParam(":des",$des);
		
			$result->bindParam(":status",$status);
			$result->bindParam(":id",$id);
			if($result->execute()){
				$URL = "semat.php?edit_proccess=success";
echo '<script language="javascript">window.location =\''.$URL.'\'</script>';
			}else{
				$wrong = "خطا در ویرایش";
			}
		
		
	}else{
		if(empty($_POST["title"])) $titleerr ="عنوان خالی می باشد";
		
		if(empty($_POST["status"])) $statuserr ="وضعیت خالی می باشد";
						if(empty($_POST["group"])) $grouperr ="گروه خالی می باشد";

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
								
				if(isset($grouperr) && $grouperr!=""){include "notice/group_err.php";}
				
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
                                    ویرایش سمت
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
									
									
									
                                        <div class="form">
											<?php
									$id=checkid($_GET["edit_id"]);
									/******inja ham variable $tbl_menu kar nakard********/
									$ss="SELECT * FROM `$tbl_semat` WHERE `id`=:id";
									$resultam=$connect->prepare($ss);
									$resultam->bindParam(":id",$id);
									$resultam->execute(); 
									$rows=$resultam->fetch(PDO::FETCH_ASSOC);
									
									
									?>
										   <label class="col-sm-2 control-label">ویرایش نام سمت:</label>
                                        <div class="col-sm-10">
										<input type="hidden" name="getid" value="<?=$rows['id'];?>">
                                            <input name="title" type="text" class="form-control" value="<?=$rows['title'];?>">
                                            <span class="help-block">نام سمت مورد نظر را وارد نمایید </span>
                                        </div>
                                        
                                        
                                               <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">نام گروه</label>
                                        <div class="col-lg-10">
                                          

                                          <select style="font-size: 10px; color: darkred;" class="form-control input-sm m-bot15" name="group">
                                               <?php
											  $group_id=$rows['group_id'];
											  $s="SELECT * FROM `$tbl_group`";
											  $res=$connect->query($s);
											  while($row=$res->fetch(PDO::FETCH_ASSOC)){
												  
											  
											  ?>
                                                <option style="font-size: 12px; color: darkred;" <?php if($row['id']==$rows['group_id']) echo "selected"; ?> value="<?=$row['id'];?>"><?=$row['title'];?></option>
                                           <?php
											  }
												  
												  ?>

                                            </select>
                                        </div>
									
									</div>
									
									
										
										   <label class="col-sm-2 control-label">توضیحات سمت</label>
                                        <div class="col-sm-10">
                                            <input name="des" type="text" class="form-control" value="<?=$rows['des'];?>">
                                            <span class="help-block">توضیحات سمت را وارد کنید</span>
                                        </div>
										
											        <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess"> وضعیت سمت</label>
                                        <div class="col-lg-10">
                                          

                                           <select class="form-control input-sm m-bot15" name="status" style="color: darkred; font-size: 11px;">
                                                <option style="color: darkred; font-size: 12px;" value="1" <?php if($rows['status']=="1"){echo "selected";}?>>فعال</option>
                                             <option style="color: darkred; font-size: 12px;" value="0" <?php if($rows['status']=="0"){echo "selected";}?>>غیرفعال</option>

                                            </select>
                                        </div>
									
									</div>
										       
											
											
											
											
											
												
												
												
												<button name="edit" type="submit" class="btn btn-success btn-lg btn-block">ویرایش سمت</button>
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


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>
 <script src="js/form-component.js"></script>

</body>
</html>
