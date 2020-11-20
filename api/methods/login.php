<?php
//Included Classes
include_once '../../config/headers.php';
include_once '../../config/database.php';
include_once '../../api/objects/user.php';


$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$data = json_decode(file_get_contents("php://input"));
$noError=true;

//Check for missing input
if(!isset($data->username) || !isset($data->password)){
  $noError=false;
}else{
  try{
    //Sanitizing Strings for security reasons
    $user->username = filter_var($data->username, FILTER_SANITIZE_STRING);
    $user->password = md5(filter_var($data->password, FILTER_SANITIZE_STRING));

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
}

//Check for account existance
$accountExists = $user->checkUsernameAndPassword();

//Includes JWT LIBRARY
include_once '../../config/core.php';
include_once '../../libs/JWT/BeforeValidException.php';
include_once '../../libs/JWT/ExpiredException.php';
include_once '../../libs/JWT/SignatureInvalidException.php';
include_once '../../libs/JWT/JWT.php';

use \Firebase\JWT\JWT;

if($accountExists && $noError){
    $token = array(
       "jti" => $jti,
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "username" => $user->username,
           "accountype"=>'user'
       )
    );
    http_response_code(200);
    $jwt = JWT::encode($token, $key,'HS512');
    echo json_encode(
            array(
                "message" => $lang['9'],
                "jwt" => $jwt,
                "username"=>$user->username,
                "accountType"=>"user"
            )
        );
}else{
    http_response_code(401);
    echo json_encode(array("message" => $lang['10']));
}

?>