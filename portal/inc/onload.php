<?php
include "../core/connector.php"; 
include "../core/function.php"; 
session_start();

$login_session = false;
if(isset($_SESSION["access"])){
    
if($_SESSION["access"]== HashSession()){
    
$login_session = true;

}
}


if(!isset($_SESSION["access"]) || !isset($_SESSION["model_user"]) || !isset($_SESSION["user_username"])){
	header("Location:../index.php");
	exit();
}else{
	if($login_session!=true || $_SESSION["model_user"]!="user"){
		header("Location:../index.php");
		exit();
	}
}


$sql="SELECT * FROM `$tbl_site_setting`";
$result=$connect->query($sql);
$rows=$result->fetch(PDO::FETCH_ASSOC);

if($rows['open']==0){
	
	echo $rows['reason'];
	exit();
	
}



?>
