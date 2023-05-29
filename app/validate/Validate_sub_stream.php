<?php
require_once("validate.php");
class Validate_sub_stream extends validate
{
	function __construct()
    {

    }
    function sub_qualification_add_update($validate)
    {
        $errMsg = (array)null;
         if(!isset($validate["course_mstr_id"]) || $validate["course_mstr_id"]=="-"){
            $errMsg["course_mstr_id"] = "Qualification Is Required";
        }
        if(!isset($validate["sub_course_mstr_id"]) || $validate["sub_course_mstr_id"]=="-"){
            $errMsg["sub_course_mstr_id"] = "Stream Is Required";
        }
        if(!isset($validate["sub_stream_name"]) || $validate["sub_stream_name"]==""){
            $errMsg["sub_stream_name"] = "Sub Stream Is Required";
        }
        return $errMsg;
    }
}
?>
