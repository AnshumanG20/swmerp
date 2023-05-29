<?php
require_once("validate.php");
class Validate_leave extends validate
{
	function __construct()
    {

    }

    function leaverequest_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["grade_id"]) || $validate["grade_id"]=="-"){
            $errMsg["grade_id"] = "Job Category Is Required";
        }
         if(!isset($validate["leave_from_date"]) || $validate["leave_from_date"]==""){
            $errMsg["leave_from_date"] = "From Date Is Required";
        }
        if(!isset($validate["leave_to_date"]) || $validate["leave_to_date"]==""){
            $errMsg["leave_to_date"] = "To Date Is Required";
        }
        if(!isset($validate["leave_days"]) || $validate["leave_days"]==""){
            $errMsg["leave_days"] = "Day Is Required";
        }
        if(!isset($validate["leave_type_id"]) || $validate["leave_type_id"]=="-"){
            $errMsg["leave_type_id"] = "Leave Type Is Required";
        }
         if(!isset($validate["leave_reason"]) || $validate["leave_reason"]==""){
            $errMsg["leave_reason"] = "Reason Is Required";
        }
        return $errMsg;
    }

    function validate_leave_approval($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["leave_type_id"]) || $validate["leave_type_id"]=="-"){
            $errMsg["leave_type_id"] = "Leave Type Is Required";
        }
         if(!isset($validate["remarks"]) || $validate["remarks"]==""){
            $errMsg["remarks"] = "Remarks Is Required";
        }
        return $errMsg;
    }
	
    function validate_leave_rejection($validate)
    {
          $errMsg = (array)null;
        if(!isset($validate["remarks"]) || $validate["remarks"]==""){
            $errMsg["remarks"] = "Remarks Is Required";
        }
        return $errMsg;
    }



}
?>