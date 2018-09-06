<?php

 include "../core/connector.php";
 include "../core/function.php"; 

session_start();


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
  