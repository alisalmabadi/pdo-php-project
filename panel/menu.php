<?php
if(!isset($_SESSION["admin_access"]) || !isset($_SESSION["model_user"]) || !isset($_SESSION["admin_username"])){
	header("Location:../index.php");
    exit();

}else{
	if($_SESSION["admin_access"]!=true || $_SESSION["model_user"]!="admin"){
	header("Location:../index.php");
    exit();
	
	}
}

  

?>


  <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="index.php">
                          <i class="icon-dashboard"></i>
                          <span>پیشخوان مدیر</span>
                      </a>
                  </li>
				  
				  
				        <!-- <li class="sub-menu">
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
				  
				  
				  
				  
				  
				
				         <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-user"></i>
                          <span>مدیریت کاربران</span>
						  
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
					  
                       
						      <li><a class="" href="admins.php">مدیریت مدیران سایت</a></li>

                          <li><a class="" href="manage_users.php">مدیریت کلی کاربران</a></li>

						 
                      </ul>
                  </li>
           
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>مدیریت مطالب</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="news_manager.php">اطلاعیه ها</a></li>
                          <li><a class="" href="news.php">افزودن اطلاعیه</a></li>
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>دسته بندی ها</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                        <li><a class="" href="groups.php">گروه ها</a></li>
                          <li><a class="" href="semat.php">سمت ها</a></li>
                         <li><a class="" href="university.php">دانشگاه ها و مدارس</a></li>
                          <li><a class="" href="gharargah.php">قرارگاه ها</a></li>
                          <li><a class="" href="reshteh.php">رشته ها</a></li>
                          <li><a class="" href="tahsil.php">وضعیت تحصیلی</a></li>
                          <!--<del>   <li><a class="not-active" href="form_validation.php">درس های در حال تدریس</a></li></del>
                          <del>   <li><a class="not-active" href="form_validation.php">کلاس ها</a></li></del>
                          <del>  <li><a class="not-active" href="form_validation.php">درس ها</a></li></del>
-->
                      </ul>
                  </li>
                 <!-- <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>زمانبندی ها</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.php">روزهای هفته</a></li>
                          <li><a class="" href="dynamic_table.php">مدیریت ترم ها</a></li>
                          <li><a class="" href="dynamic_table.php">برنامه های مطالعاتی</a></li>  
                          <li><a class="" href="dynamic_table.php">زمان بندی کلاس ها</a></li>						  
                      </ul>
                  </li>-->
                <?php
                  $flags=0;

                  $data="SELECT * FROM `$tbl_message` WHERE `flag`=:flag";
                  $resssss=$connect->prepare($data);
                  $resssss->bindParam(":flag",$flags);
                  $resssss->execute();
                  $rowhaman=$resssss->rowCount();
                  ?>
                  <li>
                      <a class="" href="message.php">
                          <i class="icon-envelope"></i>
                         <span>
                             
                             پیام ها
                             
                          
                          </span>
                          <span class="label label-danger pull-right mail-info"><?php echo $rowhaman;?></span>
                      </a>
                  </li>
                 
                 
				  <!--  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class=" icon-money"></i>
                          <span>مدیریت امور مالی</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.php">پرداخت ها</a></li>
                          <li><a class="" href="dynamic_table.php">تخفیف ها</a></li>
                      </ul>
                  </li>-->
				  
				  
				    <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>مدیریت قالب</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="template_setting.php">تنظیمات قالب</a></li>
						  <li><a class="" href="menu_top.php">منوی بالای سایت</a></li>  
                      
						  <li><a class="" href="logo.php">لوگو صفحه اصلی</a></li>  

                      </ul>
                  </li>
				  
				  
				  
				  
				   
				  
				  
				  
				  
				     <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-warning-sign"></i>
                          <span>تنظیمات اصلی</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="system_settings.php">تظیمات سیستم</a></li>
                          <li><a class="" href="sopen.php">ورودی سایت</a></li>
                       <li><a class="" href="iplog.php">آخرین ورودی کاربران عادی</a></li>
                       <li><a class="" href="admin_ip_log.php">آخرین ورودی مدیران</a></li>

						    <li><a class="" href="payment_setting.php">تنظیمات درگاه</a></li> 
                          <li><a class="" href="meta_setting.php"> مدیریت سئو</a></li>
                    	<!-- <li><a class="" href="vote.php"> مدیریت نظرسنجی</a><li>-->
                        
                     
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->                         

	 