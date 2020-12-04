<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/seat.php';

//Declaration
$database = new Database();
$db = $database->getConnection();
$seat = new Seat($db);
$data=json_decode(file_get_contents("php://input"));

$noError=true;
$noAuthError=true;


try{
	if(empty($data->ticketid) || empty($data->round) || empty($data->maxnumofseats) || empty($data->busid)){
		$noError=false;
	}else{
		//Sanitizing Strings for security reasons
		$seat->ticketid = filter_var($data->ticketid, FILTER_SANITIZE_STRING);
		$seat->round = filter_var($data->round, FILTER_SANITIZE_STRING);
		$seat->maxnumofseats = filter_var($data->maxnumofseats, FILTER_SANITIZE_STRING);
		$seat->busid= filter_var($data->busid,FILTER_SANITIZE_STRING);

		//Language for response code
		if(!isset($data->lang)){
			$lang='en';
		}else{
			$lang=filter_var($data->lang,FILTER_SANITIZE_STRING);
		}
		include_once '../../../config/config1.php';
	}
}catch(Exception $e){
	$noError=false;
}

//function to check security
function checkSecurity($authenication,$key){
	include_once '../../../libs/JWT2/BeforeValidException.php';
	include_once '../../../libs/JWT2/ExpiredException.php';
	include_once '../../../libs/JWT2/SignatureInvalidException.php';
	include_once '../../../libs/JWT2/JWT.php';
	$jwt=new JWT();
	try{
		$auth=filter_var($authenication);
		$X=$jwt->decode($auth, $key,array('HS512'));
		return true;
	}catch(Exception $e){
		return false;
	}	
}

//authenication whether it came from real source or not
// if(!isset($data->accountType) || !isset($data->auth)){
// 	$noAuthError=false;
// }else{
// 	$accountType=filter_var($data->accountType,FILTER_SANITIZE_STRING);
// 	if($accountType=='admin'){
// 		include_once '../../../config/core1.php';
// 		checkSecurity($data->auth,$key);
// 	}else{
// 		$noAuthError=false;
// 	}
// }

if($noError){
	if($noAuthError){
		if($seat->register()){
			http_response_code(200);
			echo json_encode(array('message' => $lang['41']));
		}else{
			http_response_code(400);
			echo json_encode(array('message' =>  $lang['42']));
		}
	}else{
		http_response_code(400);
		echo json_encode(array('message' =>  $lang['18']));
	}
}else{
	http_response_code(400);
	echo json_encode(array('message'=>$lang['8']));
}
?>