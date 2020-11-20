<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/trainvendor.php';

$noError=true;
$noAuthError=true;
$noPhotoTypeError=true;
$noFileSizeError=true;

//Declaration
$database = new Database();
$db = $database->getConnection();
$trainvendor = new Trainvendor($db);
if(isset($_FILES)){
	$x=array_values($_FILES['photos']['tmp_name']);
	$y=array_values($_FILES['photos']['name']);
	$photoType = strtolower(pathinfo($y[0],PATHINFO_EXTENSION));
	$logoName=md5(time().rand(1,10000000)).'.'.$photoType;
	if(array_values($_FILES["photos"]["size"])[0] < 10){
		$noFileSizeError=false;
	}
}else{
	$logoName='';	
}
try{
	$data=json_decode($_POST['data']);
	//Language for response code
	if(!isset($data->lang)){
		$lang='en';
	}else{
		$lang=filter_var($data->lang,FILTER_SANITIZE_STRING);
	}
	include_once '../../../config/config1.php';
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
if(!isset($data->accountType) || !isset($data->auth)){
	$noAuthError=false;
}else{
	$accountType=filter_var($data->accountType,FILTER_SANITIZE_STRING);
	if($accountType=='admin'){
		include_once '../../../config/core1.php';
		checkSecurity($data->auth,$key);
	}else{
		$noAuthError=false;
	}
}

$photoTypes=array("jpg","jpeg","ico","png");
if(!in_array($photoType, $photoTypes)){
	$noPhotoTypeError=false;
}

//Check for missing input
if(!isset($data->companyname) || !isset($data->companypassword) || !isset($data->companyaddress) || !isset($data->companylocation) || !isset($data->companymoto) || !isset($data->companyusername)){
	$noError=false;
}

if($noAuthError){
	if($noError){
		//Sanitize the data
		$trainvendor->companyname = filter_var($data->companyname, FILTER_SANITIZE_STRING);
		$trainvendor->companypassword = md5(filter_var($data->companypassword, FILTER_SANITIZE_STRING)); //Hashing the password
		$trainvendor->companylogo=$logoName;
		$trainvendor->companyaddress = filter_var($data->companyaddress,FILTER_SANITIZE_STRING);
		$trainvendor->companylocation = filter_var($data->companylocation, FILTER_SANITIZE_STRING);
		$trainvendor->companymoto= filter_var($data->companymoto,FILTER_SANITIZE_STRING);
		$trainvendor->companyusername=filter_var($data->companyusername);

		if($trainvendor->companyNameExists()){
			http_response_code(400);
			echo json_encode(array('message'=>$lang['14']));
		}else{
			if($trainvendor->companyUsernameExists()){
				http_response_code(400);
				echo json_encode(array('message'=>$lang['15']));
			}else{
				if($noPhotoTypeError){
					if($noFileSizeError){
						if($trainvendor->register()){
							if($logoName!=''){
									$filename='../../../uploads/trainvendor_logo/'.$logoName;
								    move_uploaded_file($x[0],$filename);
							}
							http_response_code(200);
							echo json_encode(array('message' => $lang['25']));
						}else{
							http_response_code(400);
							echo json_encode(array('message' =>  $lang['26']));
						}
					}else{
						http_response_code(200);
						echo json_encode(array('message' => $lang['19']));
					}
				}else{
					http_response_code(200);
					echo json_encode(array('message' => $lang['20']));
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