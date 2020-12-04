<?php
//Included Classes
include_once '../../../config/headers.php';
include_once '../../../config/database.php';
include_once '../../../api/objects/admin.php';


$database = new Database();
$db = $database->getConnection();

$admin = new Admin($db);
$data = json_decode(file_get_contents("php://input"));
$noError=true;

//Check for missing input
if(!isset($data->adminname) || !isset($data->password)){
  $noError=false;
}else{
  try{
    //Sanitizing Strings for security reasons
    $admin->adminname = filter_var($data->adminname, FILTER_SANITIZE_STRING);
    $admin->password = md5(filter_var($data->password, FILTER_SANITIZE_STRING));

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

//Check for account existance
$accountExists = $admin->checkAdminnameAndPassword();

//Includes JWT LIBRARY
include_once '../../../config/core1.php';
include_once '../../../libs/JWT/BeforeValidException.php';
include_once '../../../libs/JWT/ExpiredException.php';
include_once '../../../libs/JWT/SignatureInvalidException.php';
include_once '../../../libs/JWT/JWT.php';

use \Firebase\JWT\JWT;

if($accountExists && $noError){
    $token = array(
       "jti" => $jti,
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "adminname" => $admin->adminname,
           "accountype"=>'admin'
       )
    );
    http_response_code(200);
    $jwt = JWT::encode($token, $key,'HS512');
    echo json_encode(
            array(
                "message" => $lang['9'],
                "jwt" => $jwt,
                "adminname"=>$admin->adminname,
                "accountType"=>"admin"
            )
        );
}else{
    http_response_code(401);
    echo json_encode(array("message" => $lang['10']));
}

?>