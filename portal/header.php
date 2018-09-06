<?php
if(!isset($_SESSION["access"]) || !isset($_SESSION["model_user"]) || !isset($_SESSION["user_username"])){
	header("Location:../index.php");
	exit();
}else{
	if($login_session!=true || $_SESSION["model_user"]!="user"){
		header("Location:../index.php");
		exit();
	}
}
?>

    <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo"><span>اتحادیه انجمن های اسلامی دانش آموزان شهر تهران</span></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                  <!--    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-tasks"></i>
                            <span class="badge bg-success">6</span>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">شما 6 برنامه در دست کار دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پنل مدیریت</div>
                                        <div class="percent">40%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">بروزرسانی دیتابیس</div>
                                        <div class="percent">60%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه نویسی  IPhone</div>
                                        <div class="percent">87%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                            <span class="sr-only">87% Complete</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">برنامه موبایل</div>
                                        <div class="percent">33%</div>
                                    </div>
                                    <div class="progress progress-striped">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                            <span class="sr-only">33% Complete (danger)</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">پروفایل v1.3</div>
                                        <div class="percent">45%</div>
                                    </div>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>

                                </a>
                            </li>
                            <li class="external">
                                <a href="#">برنامه های بیشتر</a>
                            </li>
                        </ul>
                    </li>-->
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                       <?php
                  $flags=0;
                                    $idmanz=checkid($_SESSION["user_id"]);

                  $data1="SELECT * FROM `$tbl_message` WHERE `flag`=:flag AND `user_id_to`=:id";
                  $resssss1=$connect->prepare($data1);
                  $resssss1->bindParam(":flag",$flags);
                  $resssss1->bindParam(":id",$idmanz);
                    $resssss1->execute();
                    $rowhaman1=$resssss1->rowCount();
                       
                   
                    ?>
				 
                
                    
                  <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important"><?php echo $rowhaman1;?></span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-red"></div>
                            <li>
                                <p class="red">شما <?php echo $rowhaman1;?> پیام جدید دارید</p>
                            </li>
                               <?php
                

                  $data="SELECT * FROM `$tbl_message` WHERE `flag`=:flag AND `user_id_to`=:id";
                  $resssss=$connect->prepare($data);
                  $resssss->bindParam(":flag",$flags);
                  $resssss->bindParam(":id",$idmanz);
                  $resssss->execute();
                   while($rowhamana=$resssss->fetch(PDO::FETCH_ASSOC)){
                       
                   
                    ?>
                            <li>
                                <a href="message_show.php?message_id=<?=$rowhamana["id"];?>">
                                        <?php
                    
                    $userf=$rowhamana["user_id_from"];
                    $sql5="SELECT * FROM `$tbl_manager` WHERE `id`=:id ";
                    $res5=$connect->prepare($sql5);
                    $res5->bindParam(":id",$userf);
                    $res5->execute();
                    $row5=$res5->fetch(PDO::FETCH_ASSOC);
                  ?>
                                    <span class="photo"><img alt="avatar" src="../<?=$row5["pic"];?>"></span>

                                    <span class="subject">
                  <span class="from"><?=$row5["name"];?>&nbsp;<?=$row5["lname"];?></span>
     <span class="time"><?=$rowhamana["year"];?>/<?=$rowhamana["month"];?>/<?=$rowhamana["day"];?></span>
                                    </span>
                                    <span class="message">
                                      <?=$rowhamana["title"];?>
                                    </span>
                                </a>
                            </li>
                        
                         <?php
                       }
                       
                       ?>
                        
                            <li>
                                <a href="message.php">نمایش تمامی پیام ها</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                    <!-- notification dropdown start-->
             <!--      <li id="header_notification_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-alt"></i>
                            <span class="badge bg-warning">7</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-yellow"></div>
                            <li>
                                <p class="yellow">شما 7 اعلام جدید دارید</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    سرور شماره 3 توقف کرده
                                    <span class="small italic">34 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon-bell"></i></span>
                                    سرور شماره 4 بارگزاری نمی شود
                                    <span class="small italic">1 ساعت قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon-bolt"></i></span>
                                    پنل مدیریت 24% پیشرفت داشته است
                                    <span class="small italic">4 ساعت قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon-plus"></i></span>
                                    ثبت نام کاربر جدید
                                    <span class="small italic">همین حالا</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                    برنامه پیام خطا دارد
                                    <span class="small italic">10 دقیقه قبل</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">نمایش تمامی اعلام ها</a>
                            </li>
                        </ul>
                    </li>
                    <!--  notification end -->
                 </ul>
                
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!--<li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <?php 
                        $user_id=$_SESSION["user_id"];
$asabani="SELECT * FROM `$tbl_user` WHERE `id`=:id";
$resulttam=$connect->prepare($asabani);
$resulttam->bindParam(":id",$user_id);
$resulttam->execute();
while($khoshhal=$resulttam->fetch(PDO::FETCH_ASSOC)){

?>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="30" hight="30" alt="" src="../<?=$khoshhal['pic'];?>">
<span class="username">
         <?php
                   echo $khoshhal['name']."&nbsp;".$khoshhal['lastname'];                                   
                                                     
                                                     ?>
                            
                            
                            
                            
                            </span>
     <?php
    }
    
    ?> 
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="profile.php"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="settings.php"><i class="icon-cog"></i> تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> اعلام ها</a></li>
                            <li><a href="logout.php"><i class="icon-key"></i> خروج</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
