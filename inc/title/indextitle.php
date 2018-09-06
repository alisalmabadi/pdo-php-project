<?php



$result = $connect -> query("SELECT `index_title` FROM `$tbl_system_setting`");

$rows = $result->fetch(PDO::FETCH_ASSOC);





?>
<title><?php echo $rows['index_title']; ?></title>