

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


  <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="index.php">
                          <i class="icon-dashboard"></i>
                          <span>پیشخوان</span>
                      </a>
                  </li>
				  
				  <!--
				         <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-group"></i>
                          <span>صندوق قرض الحسنه</span>
						  
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
					   <li><a class="" href="sandogh.php">مدیریت اعضا</a></li>
                          <li><a class="" href="insert_money.php">افزودن مبلغ</a></li>
						     <li><a class="" href="">تعریف وام</a></li>
							    <li><a class="" href="">آمار کلی صندوق</a></li>
					  
					
                      </ul>
                  </li>-->
				  
				    <?php
                  $flags=0;
                                    $idmanz=checkid($_SESSION["user_id"]);

                  $data="SELECT * FROM `$tbl_message` WHERE `flag`=:flag AND `user_id_to`=:id";
                  $resssss=$connect->prepare($data);
                  $resssss->bindParam(":flag",$flags);
                  $resssss->bindParam(":id",$idmanz);
                  $resssss->execute();
                  $rowhaman=$resssss->rowCount();
                  ?>
				  
				  <li>
                      <a class="" href="message.php">
                          <i class="icon-envelope"></i>
                          <span>پیام ها </span>
                          <span class="label label-danger pull-right mail-info"><?php echo $rowhaman;?></span>
                      </a>
                  </li>
                 
                 
				  
				  
				    <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>مدیریت حساب کاربری</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="settings.php">تنظیمات </a></li>
						  <li><a class="" href="profile.php">پروفایل</a></li>  
                      

                     </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

      <!--sidebar end-->                         

	 