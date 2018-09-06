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

    <title> تنظیمات کلی سایت</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet" />

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
$stitleerr = $ptitleerr=$index_color_err=$panel_color_err= $news_count_err=$allowerr =$wrong=$success=  "";
if(isset($_POST["save"])){
	if($_POST["title_index"]!="" && $_POST["title_panel"]!="" ){
     
		$stitle=prevent($_POST["title_index"]);
		$ptitle=prevent($_POST["title_panel"]);
		$count_news=checkid($_POST["count_news"]);
		$allow=checkid($_POST["allowpanel"]);
		if($allow==1)
		$allow=1;
		elseif($allow==0)
			$allow=0;
		else
			$allow=1;
		$index_color=prevent($_POST["indexcolor"]);
		$panel_color=prevent($_POST["panelcolor"]);
		$sql="UPDATE `$tbl_system_setting` SET `index_title`=:indextitle,`panel_title`=:paneltitle,`panel_color`=:panelcolor,`index_color`=:indexcolor,`allow_login`=:allow,`count_news`=:countnews";
		$result=$connect->prepare($sql);
		$result->bindParam(":indextitle",$stitle);
		$result->bindParam(":paneltitle",$ptitle);
		$result->bindParam(":panelcolor",$panel_color);
		$result->bindParam(":indexcolor",$index_color);
		$result->bindParam(":allow",$allow);
		$result->bindParam(":countnews",$count_news);
		if($result->execute()){
			
			$success="تنطیمات سیستم با موفقیت انجام شد";
			
			
		}else{
			
				$wrong = "خطا در ویرایش";
			
		}


		
		
	}else{
		
		if(empty($_POST["title_index"])) $stitleerr ="نام سایت خالی میباشد";
		if(empty($_POST["title_panel"])) $ptitleerr ="نام پنل خالی می باشد";
		

		

	}
	
}

?>

        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
				
				 
                                        
									<?php
									
									                                     if(isset($success) && $success!=""){include "notice/positive_alarm.php";}

									?>
								
									
				
					 
					 
				<?php	
								
				if(isset($stitleerr) && $stitleerr!=""){include "notice/stitleerr.php";}
				
				?>
				
				
				
				<?php 
				
				if(isset($ptitleerr) && $ptitleerr!=""){include "notice/ptitleerr.php";}
								
				
				?>
				
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				<?php
				
				$s="SELECT * FROM `$tbl_system_setting`";
			$res=$connect->query($s);
				$rows=$res->fetch(PDO::FETCH_ASSOC);
                            
					 
					       ?>
                                <section class="panel">
                                    <header class="panel-heading">
                                   تنظیمات کلی سایت
                                 
                                    </header>
                                    <div class="panel-body">
									<form  action="" class="form-horizontal" method="post">
                                        <div class="form">
										
										   <label class="col-sm-2 control-label">نام سایت</label>
                                        <div class="col-sm-10">
                                           
                                            <input name="title_index" type="text" class="form-control" value="<?=$rows["index_title"];?>">
                                            <span class="help-block">نام سایت در صفحه اصلی به نمایش در می آید. </span>
                                        </div>
                                        
                                          <label class="col-sm-2 control-label">نام پنل</label>
                                        <div class="col-sm-10">
                                           
                                            <input name="title_panel" type="text" class="form-control" value="<?=$rows["panel_title"];?>">
                                            <span class="help-block">نام پنل در صفحه اصلی پنل به نمایش در می آید. </span>
                                        </div>
						
											
                       
                       
                            <header class="panel-heading">
                              انتخاب مقادیر پیشفرض
                         
                            </header>
                          
                                <table class="table sliders">
                                  
                                
                                        <tr>
                                            <td>تعداد خبر ها در صفحه اصلی سایت</td>
                                            <td>
                                                <select name="count_news" id="minbeds" class="form-control bound-s">
                                                    <option value="1" <?php if($rows['count_news']=="1"){echo "selected";}?>>1</option>
                                                    <option value="2" <?php if($rows['count_news']=="2"){echo "selected";}?>>2</option>
                                                    <option value="3" <?php if($rows['count_news']=="3"){echo "selected";}?>>3</option>
                                                    <option value="4" <?php if($rows['count_news']=="4"){echo "selected";}?>>4</option>
                                                    <option value="5" <?php if($rows['count_news']=="5"){echo "selected";}?>>5</option>
                                                    <option value="6" <?php if($rows['count_news']=="6"){echo "selected";}?>>6</option>
                                                </select>
                                            </td>
                                        </tr>
                                       
                                   
                                </table>
                                
                                 <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">اجازه ورود به سامانه</label>
                                        <div class="col-lg-10">
                                          

                                          <select class="form-control input-lg m-bot15" name="allowpanel" style="font-size:14px; color:red;">
                                                <option value="1" style="font-size: 5px;" <?php if($rows['allow_login']=="1"){echo "selected";}?> > ورود فعال است </option>
                                             <option value="0" style="font-size: 5px;" <?php if($rows['allow_login']=="0"){echo "selected";}?>> ورود غیر فعال است</option>

                                            </select>
                                        </div>
									
									</div>
                       
               
                                          <div class="form-group">
                                             
                                             
                                                    <header class="panel-heading">
انتخاب رنگ قسمت ها مختلف
                         
                            </header>
                          
                                <table class="table sliders">
                                  
                                
                                        <tr>
                                            <td>رنگ پس زمینه صفحه اصلی</td>
                                            <td>
                                                          <input name="indexcolor" class="jscolor"  value="<?=$rows['index_color'];?>">
                             
                                            </td>
                                        </tr>
                                       
                                      <tr>
                                            <td>رنگ منوی پنل</td>
                                            <td>
                                                        <input name="panelcolor" class="jscolor" value="<?=$rows['panel_color'];?>">
                               
                                            </td>
                                        </tr>
                                </table>
									</div>
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
										
									
										
												<button name="save" type="submit" class="btn btn-success btn-lg btn-block">ثبت اطلاعات</button>
                                            </form>
                                             </div>
                                        </div>
                                    
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
        <script src="assets/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
 <script src="js/sliders.js" type="text/javascript"></script>
    <script src="js/common-scripts.js"></script>
 <script src="js/form-component.js"></script>

   
    <!--common script for all pages-->
         


    <!--script for this page only-->
  <script src="tools/jscolor/jscolor.js"></script>
  <script src="js/gritter.js" type="text/javascript"></script>



</body>
</html>