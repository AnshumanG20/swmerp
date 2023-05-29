<?php
require_once("validate.php");
class Validate_leavedays extends validate
{
	function __construct()
    {

    }

    function leavetype_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["leave_days"]) || $validate["leave_days"]==""){
            $errMsg["leave_days"] = "Leave Days Is Required";
        }
         if(!isset($validate["leave_type_id"]) || $validate["leave_type_id"]=="-"){
            $errMsg["leave_type_id"] = "Leave Type Is Required";
        }
        if(!isset($validate["grade_id"]) || $validate["grade_id"]=="-"){
            $errMsg["grade_id"] = "Grade Is Required";
        }
        return $errMsg;
    }

}
?>