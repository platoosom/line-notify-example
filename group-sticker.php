<?php

define('LINE_API', 'https://notify-api.line.me/api/notify');
define('LINE_TOKEN', 'GwBZn1obBVy0s5dMHw4uEoBsperq60xnB22MDrOS3Pq');

$message = array(
    'message' => 'สวัสดีกรุ๊ปไลน์ เราสติกเกอร์นะ',
    'stickerPackageId' => 1,
    'stickerId' => 2,
 ); 

line_notify(LINE_TOKEN, $message);

function line_notify($token, $message)
{
    $header = array( 
        'Content-type: application/x-www-form-urlencoded', 
        "Authorization: Bearer {$token}", );
        
    $data = http_build_query($message, '', '&');

    $cURL = curl_init(); 
    curl_setopt( $cURL, CURLOPT_URL, LINE_API); 
    curl_setopt( $cURL, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $cURL, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $cURL, CURLOPT_POST, 1); 
    curl_setopt( $cURL, CURLOPT_POSTFIELDS, $data); 
    curl_setopt( $cURL, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($cURL, CURLOPT_HTTPHEADER, $header); 
    curl_setopt( $cURL, CURLOPT_RETURNTRANSFER, 1); 

    $result = curl_exec( $cURL ); 
    curl_close( $cURL ); 
}
