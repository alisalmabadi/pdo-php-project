<?php
$tbl_menu="tbl_menu_index";
$tbl_meta="tbl_header_meta";

$tbl_news="tbl_list_news";
$tbl_meta_tag="tbl_header_meta";
$tbl_group="tbl_list_group";
$tbl_semat="tbl_list_semat";
$tbl_theme_setting="tbl_template_setting";
$tbl_system_setting="tbl_system_setting";
$tbl_site_setting="tbl_site_setting";
$tbl_news="tbl_list_news";
$tbl_gharargah="tbl_list_gharargah";
$tbl_user="tbl_list_user";
$tbl_manager="tbl_manager";
$tbl_reshteh="tbl_list_reshte";
$tbl_tahsil="tbl_list_educate";
$tbl_ip="tbl_log_ip";
$tbl_pay_setting="tbl_payment_setting";
$tbl_message="tbl_list_message";
$tbl_group_semat="tbl_group_semat";
$tbl_uni="tbl_list_uni";



/********tbl variable ****/


	$server_name="localhost";
		$username="anjoman2_sad5s5d";
		$password="%cz1GW&Qroia5sd";
		$dbname="anjoman2_portalanjoman";
		$dsn="mysql:host=$server_name;dbname=$dbname";
	try{
	
		$connect=new PDO($dsn,$username,$password);
		$connect->exec("SET CHARACTER SET utf8");
		$connect->exec("set names utf8");
			return $connect;
		
	}catch(PDOException $error){
		
		echo "error in connection".$error->__toString();
		exit();
		
		
	}

	


?>

