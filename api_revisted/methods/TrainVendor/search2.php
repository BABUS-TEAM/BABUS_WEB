<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/trainvendor.php';

//Declaration
$database = new Database();
$db = $database->getConnection();
$trainvendor = new Trainvendor($db);

$noAuthError=true;
$noError=true;

$data = json_decode(file_get_contents("php://input"));

//Check for missing input
if (!isset($data->companyname)) {
	$noError=false;
}else{
	try{
		$trainvendor->companyname = filter_var($data->companyname, FILTER_SANITIZE_STRING);

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
// 		if(checkSecurity($data->auth,$key)==false){
// 			$noAuthError=false;
// 		}
// 	}elseif($accountType=='user'){
// 		include_once '../../../config/core.php';
// 		if(checkSecurity($data->auth,$key)==false){
// 			$noAuthError=false;
// 		}
// 	}elseif($accountType=='vendor'){
// 		include_once '../../../config/core2.php';
// 		if(checkSecurity($data->auth,$key)==false){
// 			$noAuthError=false;
// 		}
// 	}elseif($accountType=='guest'){
// 		include_once '../../../config/core3.php';
// 		if(checkSecurity($data->auth,$key)==false){
// 			$noAuthError=false;
// 		}
// 	}else{
// 		$noAuthError=false;		
// 	}
// }

if($noAuthError){
	if($noError){
		$x=$trainvendor->searchForMatchingTrainVendor();
		if($x!=false){
			foreach ($x as $k) {
				$k->companylogo="http://localhost/babus/uploads/trainvendor_logo/".$k->companylogo;
			}
			http_response_code(200);
			echo json_encode(array('message'=>$lang['29'],'data'=>$x));
		}else{
			http_response_code(400);
			echo json_encode(array('message'=>$lang['30']));
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