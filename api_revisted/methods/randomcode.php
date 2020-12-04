<?php

//Included Classes
include_once '../../config/headers.php';

$data=json_decode(file_get_contents("php://input"));

try{
	//Sanitizing Strings for security reasons
	$data->shortcodehash= filter_var($data->shortcodehash,FILTER_SANITIZE_STRING);
	$data->shortcode=filter_var($data->shortcode);
	
	//Language for response code
	if(!isset($data->lang)){
		$lang='en';
	}else{
		$lang=filter_var($data->lang,FILTER_SANITIZE_STRING);
	}
	include_once '../../config/config2.php';

}catch(Exception $e){
	$noError=false;
}

if($data->shortcodehash==md5($data->shortcode)){
	http_response_code(200);
	echo json_encode(array('message'=>$lang['7']));
}else{
	http_response_code(400);
	echo json_encode(array('message'=>$lang['6']));
}