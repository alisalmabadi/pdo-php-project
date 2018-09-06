          
    <?php 
$flag=0;
                        $id2=$_SESSION["user_id"];
$sql2="SELECT * FROM `$tbl_message` WHERE `flag`=:flag  AND `user_id_to`=:id";
              $mnb1=$connect->prepare($sql2);
              $mnb1->bindParam(":id",$id2);
              $mnb1->bindParam(":flag",$flag);
              $mnb1->execute();
while($khoshhal2=$mnb1->fetch(PDO::FETCH_ASSOC)){
    $userf=$khoshhal2["user_id_from"];
$sql3="SELECT * FROM `$tbl_manager` WHERE `id`=:id";
              $mnb2=$connect->prepare($sql3);
              $mnb2->bindParam(":id",$userf);
              $mnb2->execute();
    $rowsha=$mnb2->fetch(PDO::FETCH_ASSOC);
    
?>


	 <div class="col-lg-12" style="text-align:center;">
									<div class="alert alert-warning alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <h4 style="font-family: yekan,'Open Sans', sans-serif;">
                                        <i class="icon-ok-sign"></i>
										
                               شما پیغام خوانده نشده از <?=$rowsha["name"];?>&nbsp;<?=$rowsha["lname"];?>  دارید
								.	 
                                  </h4>
                                        <a href="message_show.php?message_id=<?=$khoshhal2["id"];?>"><p><?=$khoshhal2["title"];?></p></a>
                                </div>
								
								</div>
                    
       
                            
                            
                            
                            
                            
     <?php
    }
    
    ?> 
        