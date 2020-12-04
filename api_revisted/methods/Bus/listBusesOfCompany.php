<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/bus.php';

//Declaration
$database = new Database();
$db = $database->getConnection();
$bus = new Bus($db);

$noAuthError=true;
$noError=true;

$data = json_decode(file_get_contents("php://input"));
try{
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

//Check for missing input
if(!isset($data->companyname)){
	$noError=false;
}else{
	$bus->companyname=filter_var($data->companyname, FILTER_SANITIZE_STRING);
}

//authenication whether it came from real source or not
// if(!isset($data->accountType) || !isset($data->auth)){
// 	$noAuthError=false;
// }else{
// 	$accountType=filter_var($data->accountType,FILTER_SANITIZE_STRING);
// 	if($accountType=='vendor'){
// 		include_once '../../../config/core2.php';
// 		if(checkSecurity($data->auth,$key)==false){
// 			$noAuthError=false;
// 		}
// 	}else{
// 		$noAuthError=false;		
// 	}
// }

if($noAuthError){
	if($noError){
		$x=$bus->listBusesOfCompany();
		if($x!=false){
			$list=array();
			foreach ($x as $k) {
				$serverAddr=$_SERVER['SERVER_ADDR'];
				if($serverAddr=="::1"){
					$serverAddr='localhost';
				}
				$busPic=urlencode("http://".$serverAddr."/babus/uploads/bus_picture/".htmlentities($k->picture));
				array_push($list, $busPic);
			}
			if(count($list)>1){
				http_response_code(200);
				echo json_encode(array('message'=>$lang['35'],'data'=>$list));
			}else{
				http_response_code(200);
				echo json_encode(array('message'=>$lang['36'],'data'=>$list));				
			}
		}else{
			http_response_code(400);
			echo json_encode(array('message'=>$lang['37']));
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
