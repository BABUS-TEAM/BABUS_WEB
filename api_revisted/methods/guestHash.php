<?php
//Included Classes
include_once '../../config/headers.php';

//Includes JWT LIBRARY
include_once '../../config/core3.php';
include_once '../../libs/JWT/BeforeValidException.php';
include_once '../../libs/JWT/ExpiredException.php';
include_once '../../libs/JWT/SignatureInvalidException.php';
include_once '../../libs/JWT/JWT.php';

use \Firebase\JWT\JWT;
$token = array(
    "jti" => $jti,
    "iss" => $iss,
    "aud" => $aud,
    "iat" => $iat,
    "nbf" => $nbf,
    "securityToken" =>password_hash(random_int(1000000, 100000000), PASSWORD_DEFAULT)
);
http_response_code(200);
$jwt = JWT::encode($token, $key,'HS512');
echo json_encode(array("securityToken" => $jwt));

?>