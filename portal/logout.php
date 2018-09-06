
<?php
include "inc/onload.php";
//شروع یک نشست 
//منقضی کردن متغیر های نشست
unset($_SESSION["user_access"]);
if($_SESSION["model_user"]=="user"){  
unset($_SESSION["model_user"]);}

//پایان نشست
session_destroy();
//انتقال به صفحه اصلی یا صفحه مورد نظر
transfer("index.php");
?>
