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

    <title>ارسال پیام به کاربران</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
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
    
    <script type="text/javascript">
	$(document).ready(function(){
		$('.input-sm.m-bot15.group').change(function(){
            var id_group = $(this).val();
			var getusers = true;
			$.post('ajax.php',{id_group:id_group,getusers:getusers},function(data){
				$('.users').html(data);
			});
		});
	});
</script>
    
        <script type="text/javascript">
	$(document).ready(function(){
		$('.input-sm.m-bot15.semat').change(function(){
			var id_semats = $(this).val();
			var getusers = true;
			$.post('ajax.php',{id_semats:id_semats,getusers:getusers},function(data){
				$('.users').html(data);
			});
		});
	});
</script>
</head>

<body>


    <section id="container">
    <?php include "header.php";?>
    <?php include "menu.php"; ?>
        <?php include "tools/date/jdf.php"; ?>

	<?php
        
       
        
$titleerr = $texterr =$wrong=$succes=$contenterr=  "";
if(isset($_POST['send'])){
	if($_POST['title']!="" && $_POST['text']!=""){
 		$useridfrom=checkid($_SESSION["admin_id"]);
		$title=prevent($_POST['title']);
		$text=$_POST['text'];
		$year=jdate('y');
		$month=jdate('n');
		$day=jdate('j');
		$date=jdate('H:i:s P | l, j F Y');

  		$useridto=$_POST['users'];

       try{ 
    foreach($useridto as $to){
        
     
        
		$sql="INSERT INTO  `$tbl_message`(`id`,`user_id_from`,`user_id_to`,`title`,`text`,`date`,`year`,`month`,`day`) VALUES(NULL,:useridfrom,:useridto,:title,:text,:date,:year,:month,:day)";
		$res=$connect->prepare($sql);
		$res->bindParam(":useridfrom",$useridfrom);
		$res->bindParam(":useridto",$to);
		$res->bindParam(":title",$title);
		$res->bindParam(":text",$text);
		$res->bindParam(":date",$date);
		$res->bindParam(":year",$year);
		$res->bindParam(":month",$month);
		$res->bindParam(":day",$day);
if($res->execute()){
	
	$success="پیام با موفقیت ارسال گردید.";
	
}else{
	
	
	
$wrong="مشکلی در انجام عملیات پیش آمده است";
}
      }
        
        
   }catch(PDOException $e){
           echo $e->getmessage();
           
       }
    
	}else{
		
		if(empty($_POST["title"])) $titleerr ="نام اطلاعیه خالی میباشد";
		if(empty($_POST["text"])) $contenterr ="محتوا خالی میباشد";
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
								
				if(isset($titleerr) && $titleerr!=""){include "notice/title_err.php";}
				
				?>
				
				
				
				<?php 
				
				if(isset($contenterr) && $contenterr!=""){include "notice/contenterr.php";}
								
				
				?>
				
			
				<?php
				if(isset($wrong) && $wrong!=""){include "notice/wrong_err.php";}
									

				?>
				
			
                            		 <div class="col-lg-12">
	<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
									<p>
									
									<?php
									
									
							echo " توجه داشته باشید با انتخاب نام گروه وسمت مورد نظر ممکن است یک کار چند بار به نمایش دربیاید."."<br>";
                           echo "بنابراین ممکن است در صورت عدم توجه به اسامی انتخابی یک پیام چند بار به کاربری ارسال شود."."<br>";
                          

                                       
									
									?>
									</p>
									</div>
									</div>
					 
					       <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
                              ارسال پیام به کاربران
                                 
                                    </header>
                                    <div class="panel-body">
									<form action="" class="form-horizontal" method="post">
                                        <div class="form" style="height: 600px;">
													   <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">نام گروه</label>
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
                                                            	<option value="zero">سمت را انتخاب کنید</option>
                                
                                            </select>
                                            



                                    </div>
									
									</div>
                                            
                                            
                                            
                                            <div class="form-group">
                                        <label class="control-label col-lg-2" for="inputSuccess">اعضا</label>
                                        <div class="col-lg-10">
                                           

                                            <select multiple="multiple" class="form-control users" name="users[]" id="users">
                                               
                                            </select>
                                        </div>
                                    </div>
                                            
                                            
                                            
										   <label class="col-sm-2 control-label">عنوان پیام</label>
                                        <div class="col-sm-10">
                                           
                                            <input name="title" type="text" class="form-control">
                                            <span class="help-block">عنوانی مختصر جهت نمایش پیام برای کاربر بنویسید.</span>
                                        </div>
										
										   <label class="col-sm-2 control-label">محتوای خبر را وارد کنید</label>
                                        <div class="col-sm-10">
                                           
                                           
<textarea id="editor1" class="form-control ckeditor" class="ckeditor" name="text" rows="6"></textarea>
 <span class="help-block">هر متنی که دوست دارید!</span>
                                        </div>
										
											     
											
											
											
												
												
												
<button name="send" type="submit" class="btn btn-success btn-lg btn-block">ارسال پیام</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </section>
                            </div>
                      </div>
				
				
		
             
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    

			    
				
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
    <script type="text/javascript" src="assets/gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="tools/ckeditor/ckeditor.js"> </script>
    <script language="javascript">
	CKEDITOR.replace('editor1',{
		
		language:'fa'
	})
	</script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>
 <script src="js/form-component.js"></script>
  <script src="js/gritter.js" type="text/javascript"></script>



</body>
</html>