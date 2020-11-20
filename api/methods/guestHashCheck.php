<?php
//Included Classes
include_once '../../config/headers.php';

//Includes JWT LIBRARY
include_once '../../config/core3.php';
include_once '../../libs/JWT/BeforeValidException.php';
include_once '../../libs/JWT/ExpiredException.php';
include_once '../../libs/JWT/SignatureInvalidException.php';
include_once '../../libs/JWT/JWT.php';
$noAuthError=true;

$jwt=new JWT();
try{
	$auth=filter_var($data->auth);
	$X=$jwt->decode($auth, $key,array('HS512'));	
}catch(Exception $e){
	$noAuthError=false;
}

if($noAuthError){
	http_response_code(200);
	echo json_encode(array('message'=>$lang['18']));
}else{
	http_response_code(400);
	echo json_encode(array('message'=>$lang['18']));
}

?>