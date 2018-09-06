<meta charset="utf-8">
   <?php 
session_start();

include "core/connector.php";
include "core/function.php";
include "tools/date/jdf.php";

$login_session=false;

if(isset($_SESSION["access"])){
	if($_SESSION["access"]==HashSession()){
		$login_session = true;
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
