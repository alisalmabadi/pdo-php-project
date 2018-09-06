<?php
include "../core/connector.php";
include "../core/function.php";

session_start();
if(isset($_POST["getsemat"])){
	if($_POST["id"]!=""){
		$id = checkid($_POST["id"]);
		$sql = "SELECT * FROM `$tbl_semat` WHERE `group_id`=:id";
		$result=$connect->prepare($sql);
		$result->bindParam(":id",$id);
		$result->execute();
		if($result->rowCount()<=0){
			?>
				<option value="000">سمت وجود ندارد</option>
			<?php
			}else{
				while($rows = $result->fetch(PDO::FETCH_ASSOC)){
					?>
					<option value="<?=$rows['id'];?>"><?=$rows['title'];?></option>
					<?php
					}
				}
			}
		}
	?>	






	<?php
	if(isset($_POST["message_id"])){
				$idam = checkid($_POST["message_id"]);
	         $status=checkid($_POST["status"]);
			$sql1 = "UPDATE `$tbl_message` SET `status`=:status WHERE `id`=:id";
			$result1 = $connect->prepare($sql1);
			$result1->bindParam(":status",$status);
			$result1->bindParam(":id",$idam);
			$result1->execute();
				
		
    }
	   
	
	?>