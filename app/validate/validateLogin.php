<?php
require_once("validate.php");
class validateLogin extends validate
{
	function __construct(){}

    function validateLoginData($validate){
        $errMsg = (array)null;

        if(!isset($validate["user_name"]) || $validate["user_name"]=="")
            $errMsg["user_name"] = "user name field is required";

        if(!isset($validate["user_pass"]) || $validate["user_pass"]=="")
            $errMsg["user_pass"] = "user password field is required";

        if(!isset($validate["device_type"]) || $validate["device_type"]=="")
            $errMsg["device_type"] = "device type field is required";
        else{
            if($validate["device_type"]=="ANDROID"){
                if(!isset($validate["imei_no"]) || $validate["imei_no"]=="")
                    $errMsg["imei_no"] = "imei no field is required";
            }
        }
        if(!isset($validate["ip_address"]) || $validate["ip_address"]=="")
            $errMsg["ip_address"] = "ip address field is required";
        
        return $errMsg;
    }
}