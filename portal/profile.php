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

    <title>پروفایل کاربری </title>

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
<style type="text/css">
      .bio1_row {
    width: 100%;
          height: auto;
          clear: both;
    float: right;
    margin-bottom: 10px;
    padding: 0px 16px;
}
      
      </style>
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
      <?php
      
      $id1=$_SESSION["user_id"];
      $sql1="SELECT * FROM `$tbl_user` WHERE `id`=:id";
      $res1=$connect->prepare($sql1);
      $res1->bindParam(":id",$id1);
      $res1->execute();
      $rows1=$res1->fetch(PDO::FETCH_ASSOC);
      
      $reshte=$rows1['reshteh'];
            $tahsil=$rows1['paye'];
      ?>
      
      
       
      <?php
      
    /*  $sql2="SELECT * FROM `$tbl_group` WHERE `id`=:id";
      $res2=$connect->prepare($sql2);
      $res2->bindParam(":id",$gid);
      $res2->execute();
      $rows2=$res2->fetch(PDO::FETCH_ASSOC);
      */
      ?>
   
       <?php
       /*
      $sql5="SELECT * FROM `$tbl_semat` WHERE `id`=:id";
      $res5=$connect->prepare($sql5);
      $res5->bindParam(":id",$semat);
      $res5->execute();
      $semat=$res5->fetch(PDO::FETCH_ASSOC);
      */
      ?>
      
      <?php
      $sql3="SELECT * FROM `$tbl_reshteh` WHERE `id`=:id";
      $res3=$connect->prepare($sql3);
      $res3->bindParam(":id",$reshte);
      $res3->execute();
      $reshteha=$res3->fetch(PDO::FETCH_ASSOC);
      ?>
        <?php
      $sql4="SELECT * FROM `$tbl_tahsil` WHERE `id`=:id";
      $res4=$connect->prepare($sql4);
      $res4->bindParam(":id",$tahsil);
      $res4->execute();
      $paye=$res4->fetch(PDO::FETCH_ASSOC);
      ?>
      
       
      <!--main content start-->
      <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <aside class="profile-nav col-lg-3">
                        
                        <section class="panel">
                            <div class="user-heading round">
                                <a href="#">
                                    <img src="../<?=$rows1['pic']?>" alt="">
                                </a>
                                <h1 style="font-family: 'BYekan';"><?=$rows1['name']?>&nbsp;<?=$rows1['lastname']?></h1>
                <h1 style="font-family: 'BYekan';">&nbsp;گروه ها</h1><br>
                                <p>
                                    <?php 
      $sql8="SELECT * FROM `$tbl_group_semat` WHERE `user_id`=:id";
      $res55=$connect->prepare($sql8);
      $res55->bindParam(":id",$id1);
      $res55->execute();
                                         
      while($rows55=$res55->fetch(PDO::FETCH_ASSOC)){
      $gid=$rows55["group_id"];
     $sql2="SELECT * FROM `$tbl_group` WHERE `id`=:id";
      $res2=$connect->prepare($sql2);
      $res2->bindParam(":id",$gid);
      $res2->execute();
      while($rows2=$res2->fetch(PDO::FETCH_ASSOC)){
          
        echo '<font style="border-radius:5px; border:1px solid black; padding: 2px; background:#219fae;">'.$rows2['title'].'</font>'.'&nbsp;';
          }
         }
           ?>
           
                                <h1 style="font-family: 'BYekan';
">&nbsp;سمت ها</h1><br>
                                          <?php 
      $sql100="SELECT * FROM `$tbl_group_semat` WHERE `user_id`=:id";
      $res59=$connect->prepare($sql100);
     $res59->bindParam(":id",$id1);
     $res59->execute();
                                         
      while($rows5888=$res59->fetch(PDO::FETCH_ASSOC)){
      $semat=$rows5888["semat_id"];                    

      $sql5="SELECT * FROM `$tbl_semat` WHERE `id`=:id";
      $res5=$connect->prepare($sql5);
      $res5->bindParam(":id",$semat);
      $res5->execute();
      while($semat=$res5->fetch(PDO::FETCH_ASSOC)){
               echo '<font style="border-radius:5px; border:1px solid black; padding: 2px; background:#219fae;">'.$semat['title'].'</font>'.'&nbsp;';

                               }
        }
       
                                                ?>
                                
                                
                                </p>
                            </div>

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="profile.php"><i class="icon-user"></i>پروفایل کاربری</a></li>
                               
                                <li><a href="profile_edit.php"><i class="icon-edit"></i>ویرایش اطلاعات کاربری</a></li>
                            </ul>

                        </section>
                    </aside>
                    <aside class="profile-info col-lg-9">
                                          
                        <section class="panel">
                            <div class="bio-graph-heading" style="font-style:normal;">
پروفایل شما                         
                            </div>
                            
                            
                            <?php
    
    
    
                              ?>
                            <div class="panel-body bio-graph-info">
                                <h1 style="font-family: 'BYekan';">اطلاعات شما</h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>نام:</span><?=$rows1['name']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>نام خانوادگی:</span><?=$rows1['lastname']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>جنسیت:</span>
                                            <?php if($rows1['jensiat']=="1"){
    echo "پسر";
}elseif($rows1['jensiat']=="0"){
    echo "دختر";
}else{
        echo "پسر";

}
                                            ?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>تاریخ تولد:</span><?=$rows1['birthday']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>نام پدر:</span><?=$rows1['father_name']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>شماره مبایل پدر:</span><?=$rows1['father_tel']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>شغل پدر:</span><?=$rows1['father_job']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>شماره مبایل:</span><?=$rows1['tel']?></p>
                                    </div>
                                    
                                     <div class="bio-row">
                                        <p><span>ایمیل: </span><?=$rows1['email']?></p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>رشته: </span><?=$reshteha["name"];?></p>
                                    </div>
                                   
                                    <div class="bio-row">
                                        <p><span>وضیعیت تحصیلی: </span><?=$paye['title']?></p>
                                    </div>
                                     <div class="bio-row">
                                        <p><span>نام کاربری(کدملی): </span><?=$rows1['username']?></p>
                                    </div>
                                  <!--  <div class="bio-row">
                                        <p><span>سمت</span><?=$semat['title']?></p>
                                        
                                    </div> -->
                                    <div class="bio-row">
                                        <p><span> تلفن منزل: </span><?=$rows1['home_tel']?></p>
                                    </div>
                                    <div class="bio1_row">
                                        <p><span>آدرس منزل </span><?=$rows1['home_address']?></p>
                                    </div>
                                   
                                </div>
                            </div>
                        </section>
                        <section>
                         
                            <!--<div class="row">
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="red">Envato Website</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="terques">ThemeForest CMS </h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="75" data-fgcolor="#96be4b" data-bgcolor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="green">VectorLab Portfolio</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="bio-chart">
                                                <input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="50" data-fgcolor="#cba4db" data-bgcolor="#e8e8e8">
                                            </div>
                                            <div class="bio-desk">
                                                <h4 class="purple">Adobe Muse Template</h4>
                                                <p>Started : 15 July</p>
                                                <p>Deadline : 15 August</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </section>
                    </aside>
                </div>

                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
      <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <script>

        //knob
        $(".knob").knob();

  </script>
  </body>
</html>
