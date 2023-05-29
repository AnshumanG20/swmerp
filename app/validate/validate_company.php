<?php
require_once("validate.php");
class Validate_company extends validate
{
	function __construct()
    {

    }

    function company_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["company_name"]) || $validate["company_name"]==""){
            $errMsg["company_name"] = "Company Name Is Required";
        }
        if(!isset($validate["website"]) || $validate["website"]==""){
            $errMsg["website"] = "Website Name Is Required";
        }
        return $errMsg;
    }
    function company_location_add_update($validate)
    {
           $errMsg = (array)null;

         if(!isset($validate["gstin_no"]) || $validate["gstin_no"]==""){
            $errMsg["gstin_no"] = "Company GSTIN NO Is Required";
        }
        if(!isset($validate["address"]) || $validate["address"]==""){
            $errMsg["address"] = "Company Address Is Required";
        }
        if(!isset($validate["contact_no"]) || $validate["contact_no"]==""){
            $errMsg["contact_no"] = "Company Contact Number Is Required";
        }
        if(!isset($validate["email_id"]) || $validate["email_id"]==""){
            $errMsg["email_id"] = "Company Email Id Is Required";
        }
        if(!isset($validate["state_dist_city_id"]) || $validate["state_dist_city_id"]==""){
            $errMsg["state_dist_city_id"] = "Company State, District, City Is Required";
        }
        return $errMsg;
    }

}
?>