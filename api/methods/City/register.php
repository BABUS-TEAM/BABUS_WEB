<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/City.php';


$noError=true;
$noAuthError=true;
$noPhotoTypeError=true;
$noFileSizeError=true;

//Declaration
$database = new Database();
$db = $database->getConnection();
$city = new City($db);

if(isset($_FILES)){
	$x=array_values($_FILES['photos']['tmp_name']);
	$y=array_values($_FILES['photos']['name']);
	$photoType = strtolower(pathinfo($y[0],PATHINFO_EXTENSION));
	$pictureName=md5(time().rand(1,10000000)).'.'.$photoType;
	if(array_values($_FILES["photos"]["size"])[0] < 10){
		$noFileSizeError=false;
	}
}else{
	$pictureName='';	
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
	$c='';
}else{
	$accountType=filter_var($data->accountType,FILTER_SANITIZE_STRING);
	if($accountType=='admin'){
		include_once '../../../config/core1.php';
		if(checkSecurity($data->auth,$key)==false){
			$noAuthError=false;
	$c='';
		}
	}else{
		$noAuthError=false;		
	$c='';
	}
}

$photoTypes=array("jpg","jpeg","ico","png");
if(!in_array($photoType, $photoTypes)){
	$noPhotoTypeError=false;
}

//Check for missing input
if(!isset($data->name) || !isset($data->latitude) || !isset($data->longitude) || !isset($data->description)){
	$noError=false;
}

if($noAuthError){
	if($noError){
		$city->name = filter_var($data->name, FILTER_SANITIZE_STRING);
		$city->latitude = filter_var($data->latitude,FILTER_SANITIZE_STRING);
		$city->longitude = filter_var($data->longitude, FILTER_SANITIZE_STRING);
		$city->description= filter_var($data->description,FILTER_SANITIZE_STRING);
		$city->picture=$pictureName;

		if($city->cityAlreadyExist()){
			http_response_code(400);
			echo json_encode(array('message'=>$lang['39']));
		}else{
			if($noPhotoTypeError){
				if($noFileSizeError){
					if($city->register()){
						if($pictureName!=''){
								$filename='../../../uploads/city_picture/'.$pictureName;
							    move_uploaded_file($x[0],$filename);
						}
						http_response_code(200);
						echo json_encode(array('message' => $lang['38']));
					}else{
						http_response_code(400);
						echo json_encode(array('message' =>  $lang['40'].$city->longitude));
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
	}else{
		http_response_code(400);
		echo json_encode(array('message'=>$lang['8']));					
	}
}else{
	http_response_code(400);
	echo json_encode(array('message'=>$lang['18']));			
}

?>