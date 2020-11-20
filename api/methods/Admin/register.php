<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/admin.php';

//Declaration
$database = new Database();
$db = $database->getConnection();
$admin = new Admin($db);
$data=json_decode(file_get_contents("php://input"));
$noError=true;
$noAuthError=true;

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


try{
	if(empty($admin->adminname) || empty($admin->password) || empty($admin->phonenumber) || empty($admin->firstname) || empty($admin->lastname) || empty($admin->email) || empty($admin->accountnumber)){
		$noError=false;
	}else{
		//authenication whether it came from real source or not
		if(!isset($data->accountType) || !isset($data->auth)){
			$noAuthError=false;
		}else{
			$accountType=filter_var($data->accountType,FILTER_SANITIZE_STRING);
			if($accountType=='admin'){
				include_once '../../../config/core1.php';
				if(checkSecurity($data->auth,$key)==false){
					$noAuthError=false;
				}
			}else{
				$noAuthError=false;
			}
		}
		//Sanitizing Strings for security reasons
		$admin->adminname = filter_var($data->adminname, FILTER_SANITIZE_STRING);
		$admin->password = md5(filter_var($data->password, FILTER_SANITIZE_STRING)); //Hashing the password
		$admin->phonenumber = filter_var($data->phonenumber, FILTER_SANITIZE_STRING);
		$admin->firstname = filter_var($data->firstname, FILTER_SANITIZE_STRING);
		$admin->lastname= filter_var($data->lastname,FILTER_SANITIZE_STRING);
		$admin->email=filter_var($data->email);
		$admin->accountnumber=filter_var($data->accountnumber,FILTER_SANITIZE_STRING);
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
if($noAuthError){
	if($noError){
		if($admin->phoneNumberExists()){
			http_response_code(400);
			echo json_encode(array('message'=>$lang['2']));
		}else{
			if($admin->adminnameExists()){
				http_response_code(400);
				echo json_encode(array('message'=>$lang['12']));
			}else{
				if($admin->register()){
					http_response_code(200);
					echo json_encode(array('message' => $lang['11']));
				}else{
					http_response_code(400);
					echo json_encode(array('message' =>  $lang['13']));
				}		
			}
		}	
	}else{
		http_response_code(400);
		echo json_encode(array('message'=>$lang['8']));
	}
}else{
	http_response_code(400);
	echo json_encode(array('message'=>$lang['18']));
}
?>