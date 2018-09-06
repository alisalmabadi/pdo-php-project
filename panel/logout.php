<?php
include "inc/onload.php";
//شروع یک نشست 
//منقضی کردن متغیر های نشست
unset($_SESSION["admin_access"]);
if($_SESSION["model_user"]=="admin"){  
unset($_SESSION["model_user"]);}


//پایان نشست
session_destroy();
//انتقال به صفحه اصلی یا صفحه مورد نظر
transfer("index.php");
?>
