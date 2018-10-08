<?php
// Key
$key='abC123!';

// Get Apache headers
$token = null;
$headers = apache_request_headers();
if (!isset($headers['Authorization'])) die('Authorization missing');

// Getting the components
$tokenParts = explode('.', $headers['Authorization']);
if (count($tokenParts)<3) die('invalid token');
else{
    $header64 = $tokenParts[0];
    $payload64 = $tokenParts[1];
    $signature64 = $tokenParts[2];

    $header = urlsafeB64Decode($tokenParts[0]);

    //print_r($header);
    $payload = urlsafeB64Decode($tokenParts[1]);
    $signature = urlsafeB64Decode($tokenParts[2]);
    
    $hash=hash_hmac('sha256', "$header64.$payload64", $key, true);
    if (function_exists('hash_equals')) {
        if(hash_equals($signature, $hash)) echo 'Token matches';
        print_r($payload);
    }
    //return $this;
}

  /*if(isset($headers['Authorization'])){
    $matches = array();
    preg_match('/Token token="(.*)"/', $headers['Authorization'], $matches);
    if(isset($matches[1])){
      $token = $matches[1];
    }
  } */
/**
 * Decode a string with URL-safe Base64.
 *
 * @param string $input A Base64 encoded string
 *
 * @return string A decoded string
 */

function urlsafeB64Decode($input)
{
    $remainder = strlen($input) % 4;
    if ($remainder) {
        $padlen = 4 - $remainder;
        $input .= str_repeat('=', $padlen);
    }
    return base64_decode(strtr($input, '-_', '+/'));
}
/**
 * Encode a string with URL-safe Base64.
 *
 * @param string $input The string you want encoded
 *
 * @return string The base64 encode of what you passed in
 */
function urlsafeB64Encode($input)
{
    return str_replace('=', '', strtr(base64_encode($input), '+/', '-_'));
}