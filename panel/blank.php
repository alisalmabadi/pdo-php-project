<?php include "inc/onload.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Blank</title>

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
<?php
    if(isset($_POST["send"])){
 
           $username ="";
           $password ="";                                                                  
            $name = $_POST["username"];
            $family = "";
           $jensiat = "";
                  $fname = "";
                  $reshteh = "";
                  $paye="";        
                  $uniid=""; 
                  $hadd=""; 
                  $htel=""; 
                  $ftel="";  
                  $fjob="";  
                  $email="";       
                  $bio="";
                  $pic="/img/users/user.png";                                                                                
                  $bdate="";                                                                               
				$status = "";
				 $tel ="";

       
$sql = "INSERT INTO `$tbl_user` (`id`,`name`) VALUES(NULL,:name)";
        
								$result = $connect->Prepare($sql);
								$result->bindParam(":name",$name);
   								$result->bindParam(":sex",$jensiat);
								$result->bindParam(":family",$family);
								$result->bindParam(":username",$username);
 								$result->bindParam(":fname",$fname);
  								$result->bindParam(":fjob",$fjob);
   								$result->bindParam(":ftel",$ftel);
								$result->bindParam(":password",$password);
  								$result->bindParam(":reshteh",$reshteh);
								$result->bindParam(":paye",$paye);
								$result->bindParam(":uni_id",$uniid);
   								$result->bindParam(":bday",$bdate);
								$result->bindParam(":haddress",$haddress);
								$result->bindParam(":htel",$htel);                               
								$result->bindParam(":email",$email);
								$result->bindParam(":tel",$tel);
								$result->bindParam(":picture",$pic);
								$result->bindParam(":status",$status);
                                        if($result->execute()){ 
      
            echo "hale dadash";
        }else{
            echo "namosan nmishe";
        }
        
    }
    
    ?>
<body>

    <section id="container" class="">
        <?php include "header.php";?>
    <?php include "menu.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
<form action="" method="post">
                <input name="username" id="name" type="text">
    <input type="submit" name="send">
                
                </form>             
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
