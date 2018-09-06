<?php include "inc/onload.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/faveicon.ico">

    <title>مدریت کل گروه ها</title>

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

    <section id="container" class="">
        <?php include "header.php";?>
    <?php include "menu.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                 <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
کل گروه ها(برای مدیریت اعضا روی اسم هر گروه کلیک کنید)   

 <a href="user_insert.php"><button type="button" class="btn btn-shadow btn-success" style="float:left;  margin-left:100px;">افزودن کاربر جدید</button></a> 
                                  <a href="all_users.php"><button type="button" class="btn btn-shadow btn-danger" style="margin-left:100px; float:left;"> مشاهده تمامی کاربران سایت</button></a>
                                
                            </header>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>شماره</th>
                                        <th>نام گروه</th>
										      <th>توضیحات</th>

                                        <th>وضعیت</th>
								       <th>عملیات</th>

                                    </tr>
                                </thead>
								<?php
						$s = "SELECT * FROM `$tbl_group`";
						$result = $connect->query($s);
						while($rows = $result->fetch(PDO::FETCH_ASSOC)){
						?>
					
						
                                <tbody>
								
								
								
								
                                    <tr>
									
                                        <td><?=$rows['id'];?> </td>
                                            
                                        <td><a href="users.php?groupid=<?=$rows['id'];?>"><?=$rows['title'];?></td>
										<td><?=$rows['des'];?></td>

                                       
                                       
                                        <td>
										<?php 
									if($rows['status']==1)
										 include "notice/active.php";
									 
									
									
								
									elseif($rows['status']==0)
										include "notice/deactive.php";
									
									else
								include "notice/none.php";

							?>
									</td>
									 <td>
									 
									 <?php 
									 
									 
									$idha=$rows['id'];
									 ?>
								<a  href="?del_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-danger"><i class="icon-remove-sign"></i>حذف</button></a>
                           	    <a href="edit_group.php?edit_id=<?php echo $idha;?>"> <button type="button" class="btn btn-round btn-warning"><i class="icon-pencil"></i>ویرایش</button></a>
								<a  href="users.php?groupid=<?=$rows['id'];?>"> <button type="button" class="btn btn-round btn-primary"><i class="icon-eye-open"></i>مشاهده تمامی اعضا</button></a>

									
									 </td>
<?php
								}
									
									
									?>
                                   
								
                                    </tr>
									
								
								
								
								
								
								
                                 
                                </tbody>
                                 
                            </table>
                           
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


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>


</body>
</html>
