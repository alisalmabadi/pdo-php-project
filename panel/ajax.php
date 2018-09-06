<?php
include "../core/connector.php";
include "../core/function.php";
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
/*******************editfirst****************/

<?php

if(isset($_POST["getusers"])){
	
        $id_group=checkid($_POST["id_group"]);
        $id_semats = checkid($_POST["id_semats"]); 
    $sqlsham4="SELECT * FROM `$tbl_group_semat` WHERE `group_id`=:gid || `semat_id`=:sid";
    $res5555=$connect->prepare($sqlsham4);
    $res5555->bindParam(":gid",$id_group);
    $res5555->bindParam(":sid",$id_semats);
    $res5555->execute();
    if($res5555->rowCount()<=0){
        ?>

        				<option value="001">کاربری وجود ندارد</option>
<?php

    }else{ 
   while($rowshams555=$res5555->fetch(PDO::FETCH_ASSOC)){
      $user_ids=$rowshams555['user_id'];
   
		$sql1 = "SELECT * FROM `$tbl_user` WHERE `id`=:id";
		$result1=$connect->prepare($sql1);
		$result1->bindParam(":id",$user_ids);
		$result1->execute();
				while($rows1 = $result1->fetch(PDO::FETCH_ASSOC)){
					?>
					<option value="<?=$rows1['id'];?>"><?=$rows1['name'];?>&nbsp;<?=$rows1['lastname'];?></option>
					<?php
					}
				}

		}
    }
    

	?>	

<?php
if(isset($_POST["delete_no"])){
	if($_POST["id_groups"]!=""){
		$id_g = checkid($_POST["id_groups"]);
       $id_user= checkid($_POST["id_user"]);
	$sqlam123="DELETE FROM `$tbl_group_semat` WHERE `group_id`=:id AND `user_id`=:uid"; 
	$resultama123=$connect->prepare($sqlam123);
	$resultama123->bindParam(":id",$id_g);
    $resultama123->bindParam(":uid",$id_user);        
	if($resultama123->execute()){
        ?>

 

    <?php    
    }
			
		}
    }

?>


<?php
if(isset($_POST["delete_no2"])){
	if($_POST["id_semat"]!=""){
		$id_s = checkid($_POST["id_semat"]);
       $id_usersams= checkid($_POST["id_usersams"]);
	$sqlam123s="DELETE FROM `$tbl_group_semat` WHERE `semat_id`=:id AND `user_id`=:uid"; 
	$resultama1235=$connect->prepare($sqlam123s);
	$resultama1235->bindParam(":id",$id_s);
    $resultama1235->bindParam(":uid",$id_usersams);        
	if($resultama1235->execute()){
        ?>

 

    <?php    
    }
			
		}
    }

?>


