<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/user.php';

//Declaration
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$data=json_decode(file_get_contents("php://input"));
$noError=true;

try{
	if(empty($user->username) || empty($user->password) || empty($user->phonenumber) || empty($user->firstname) || empty($user->lastname) || empty($user->email) || empty($user->accountnumber)){
		$noError=false;
	}else{
		//Sanitizing Strings for security reasons
		$user->username = filter_var($data->username, FILTER_SANITIZE_STRING);
		$user->password = md5(filter_var($data->password, FILTER_SANITIZE_STRING)); //Hashing the password
		$user->phonenumber = filter_var($data->phonenumber, FILTER_SANITIZE_STRING);
		$user->firstname = filter_var($data->firstname, FILTER_SANITIZE_STRING);
		$user->lastname= filter_var($data->lastname,FILTER_SANITIZE_STRING);
		$user->email=filter_var($data->email);
		$user->accountnumber=filter_var($data->accountnumber,FILTER_SANITIZE_STRING);
		$lang=filter_var($data->lang,FILTER_SANITIZE_STRING);

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
if($noError){
	if($user->phoneNumberExists()){
		http_response_code(400);
		echo json_encode(array('message'=>$lang['2']));
	}else{
		if($user->usernameExists()){
			http_response_code(400);
			echo json_encode(array('message'=>$lang['3']));
		}else{
			if($user->register()){
				http_response_code(200);
				echo json_encode(array('message' => $lang['4']));
			}else{
				http_response_code(400);
				echo json_encode(array('message' =>  $lang['5']));
			}		
		}
	}	
}else{
	http_response_code(400);
	echo json_encode(array('message'=>$lang['8']));
}
?>