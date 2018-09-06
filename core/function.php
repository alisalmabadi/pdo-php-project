<?php
function prevent($value){
	$value = trim($value);
	//prevent sql injection
	if(function_exists("addslashes")){
		$r1 = addslashes($value);
	}else{
		$r1 = mysql_real_escape_string($value);
	}
	//prevent xss
	$r2 = htmlentities($r1);
	return $r2;
}



//prevent from cracking passwords with hash!
function hashpassword($value){
	
	return md5("a2dsW3As3a".$value."sad6433adsd#");
	
}

//checkid
function checkid($id){
	
	return (int)$id;


}
//header
function transfer($input){
	
	header("Location:$input");
	exit();
}


/////HASHUSER
function HashSession(){
    
    return md5("acsdfdsfces_loginisdfdsfsdfsok");
    
}
function HashSession_admin(){
    
    return md5("acsdfasdasddsfces_logasadadminasdassinisdfdsfsdfsok");
    
}
?>