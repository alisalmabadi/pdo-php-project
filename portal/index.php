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

    <title>صفحه اصلی سامانه </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
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
    
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
      
              <!--state overview end-->
             <?php
              $flag=0;
              $id1=$_SESSION["user_id"];
              $sql1="SELECT * FROM `$tbl_message` WHERE `flag`=:flag AND `user_id_to`=:id";
              $mnb=$connect->prepare($sql1);
              $mnb->bindParam(":flag",$flag);             
              $mnb->bindParam(":id",$id1);
              $mnb->execute();
              if($mnb->rowCount()>0){
              include "notice/smessage.php";
              
              }
              ?>
              
              
									 <div class="col-lg-12" style="text-align:center;">
									
									<div class="alert alert-success alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <h4 style="font-family: yekan,'Open Sans', sans-serif;">
                                        <i class="icon-ok-sign"></i>
										
                                 با سلام کاربرگرامی!
									 
                                  </h4>
                                    <p>
									به سامانه اتحادیه انجمن های اسلامی دانش آموزان شهر تهران خوش آمدید.
									</p>
                                </div>
								
								</div>
              
              


	 	 <div class="col-lg-12" style="text-align:center;">
	 
	 <div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
									<p>
								لطفا برای تکمیل اطلاعات شخصی خود به پروفایل شخصی مراجعه نمایید									</p>
									</div>
									</div>
              <?php
              
           /*   
              $sql2="SELECT * FROM `$tbl_group_semat` WHERE `user_id`=:id";
              $res1=$connect->prepare($sql2);
              $res1->bindParam(":id",$id1);
              $res1->execute();
              $rows1=$res1->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($rows1 as $rows2){ 
              echo $rows2['group_id']."</br>";
									}
		*/						
              
?>
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
