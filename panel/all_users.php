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

    <title>کلیه اعضا</title>

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
	$sqlam="DELETE FROM `$tbl_user` WHERE `id`=:id"; 
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
	$sqlam="DELETE FROM `$tbl_user` WHERE `id`=:id"; 
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
							کلیه اعضا
                         
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
                                       
	                                 
                                        <th class="hidden-phone">شماره مبایل</th>
				                       <th class="hidden-phone">سمت ها</th>
				                     <th class="hidden-phone">گروه ها</th> 

                                  <th class="hidden-phone">عکس</th>
                                        <th class="hidden-phone">وضعیت</th>
									    <th class="hidden-phone">عملیات</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    
                                     
					
					
                          
			
                                    
								<?php
             /*   $sqls="SELECT * FROM `$tbl_group_semat`";
                $res=$connect->prepare($sqls);
                $res->execute();
              while($rowshams=$res->fetch(PDO::FETCH_ASSOC)){ 
               $user_id=$rowshams['user_id'];
*/
                   
                   $s="SELECT * FROM `$tbl_user` ORDER BY `id` DESC";
								$rmsb=$connect->prepare($s);
								$rmsb->execute();
						
								while($rowsha=$rmsb->fetch(PDO::FETCH_ASSOC)){
                                    $user_id=$rowsha['id'];
                                    $reshteh=$rowsha['reshteh'];
                                    $paye=$rowsha['paye'];
								?>
                                    <?php
                                    
								$sql1="SELECT * FROM `$tbl_reshteh` WHERE `id`=:id";
                                    $res1=$connect->prepare($sql1);
                                    $res1->bindParam(":id",$reshteh);
								$res1->execute();
								$row1=$res1->fetch(PDO::FETCH_ASSOC);
								?>
                                    
                                    <?php
                                    
								$sql2="SELECT * FROM `$tbl_tahsil` WHERE `id`=:id";
                                    $res2=$connect->prepare($sql2);
                                    $res2->bindParam(":id",$paye);
								$res2->execute();
								$row2=$res2->fetch(PDO::FETCH_ASSOC);
								?>
                                    <tr class="odd gradeX">
									
                                        <td>
                                            <input name="check[]" type="checkbox" class="checkboxes" value="<?=$rowsha['id'];?>" /></td>
                                        <td><?=$rowsha['name'];?>&nbsp; <?=$rowsha['lastname'];?>  </td>
					 										       
										                            
										     <td class="hidden-phone"><?=$rowsha['tel'];?></td>                                   
                <td class="hidden-phone">
                                                 
											                                           <?php 
      $sql8="SELECT * FROM `$tbl_group_semat` WHERE `user_id`=:id";
      $res55=$connect->prepare($sql8);
      $res55->bindParam(":id",$user_id);
      $res55->execute();
                                         
      while($rows55=$res55->fetch(PDO::FETCH_ASSOC)){
      $gid=$rows55["group_id"];
     $sql2="SELECT * FROM `$tbl_group` WHERE `id`=:id";
      $res2=$connect->prepare($sql2);
      $res2->bindParam(":id",$gid);
      $res2->execute();
      while($rows2=$res2->fetch(PDO::FETCH_ASSOC)){
          
        echo '<font style="border-radius:5px; border:1px solid black; padding: 2px; background:#e74c3c; color:white;">'.$rows2['title'].'</font>'.'&nbsp;<br><br>';
          }
         }
           ?>
                                
											
											 </td>              
                                        
										     <td class="hidden-phone">
                                                 
											                  <?php 
      $sql100="SELECT * FROM `$tbl_group_semat` WHERE `user_id`=:id";
      $res59=$connect->prepare($sql100);
     $res59->bindParam(":id",$user_id);
     $res59->execute();
                                         
      while($rows5888=$res59->fetch(PDO::FETCH_ASSOC)){
      $semat=$rows5888["semat_id"];                    

      $sql5="SELECT * FROM `$tbl_semat` WHERE `id`=:id";
      $res5=$connect->prepare($sql5);
      $res5->bindParam(":id",$semat);
      $res5->execute();
      while($semat=$res5->fetch(PDO::FETCH_ASSOC)){
               echo '<font style="border-radius:5px;color:white; border:1px solid black; padding: 2px; background:#219fae;">'.$semat['title'].'</font>'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br>';

                               }
        }
       
                                                ?>
                                
											
											 </td>                                   
										     <td class="hidden-phone"><img src="../<?=$rowsha['pic'];?>" width="45" height="45"></td>                                   

                                             
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
                           	    <a href="edit_users.php?edit_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-warning"><i class="icon-pencil"></i>ویرایش</button></a>
                              <a  href="user_profile.php?profile_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-primary"><i style="padding:5px;" class="icon-camera"></i>پروفایل کاربری</button></a>
								
									
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