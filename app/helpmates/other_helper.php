<?php

  // Simple page redirect
/**
 * 
 */

function randNum($start = null, $end = null){
	if($start == null && $end == null)
		return rand();
	else
		return rand($start,$end);
}

function hashEncrypt($encData){
    $secret_key = 'key=@MVC';
    $secret_iv = 'secret_iv';
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    return base64_encode(openssl_encrypt($encData, $encrypt_method, $key, 0, $iv));
}
function hashDecrypt($decData){
    $secret_key = 'key=@MVC';
    $secret_iv = 'secret_iv';
    $encrypt_method = "AES-256-CBC";
    $key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    return openssl_decrypt(base64_decode($decData), $encrypt_method, $key, 0, $iv);
}


function dateTime(){
	return date("Y-m-d H:i:s");
}

function getFy($date = null){
    if($date==null){
        $date = date("Y-m-d");
    }
    $MM = date("m", strtotime($date));
    $YY = date("Y", strtotime($date));
    if ($MM > 3)
        $year = $YY."-".($YY +1);
    else
        $year = ($YY-1)."-".$YY;
    return $year; // Financial Year
}

function ipAddress(){
	$ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

function multiexplode ($delimiters,$data) {
	$MakeReady = str_replace($delimiters, $delimiters[0], $data);
	$Return    = explode($delimiters[0], $MakeReady);
	return  $Return;
}
function mobile_no_mark_remove($data) {
	$delimiters = array("(", ")", " ", "-");
	$MakeReady = str_replace($delimiters, $delimiters[0], $data);
	$maskArr = explode($delimiters[0], $MakeReady);
	$return = $maskArr[1].$maskArr[3].$maskArr[4];
	return  $return;
}

function print_var($array = []) {
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}


