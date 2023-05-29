<?php
require_once("validate.php");
class Validate_Emp extends validate
{
	function __construct()
    {

    }

    function emp_list_validate($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["department_mstr_id"]) || $validate["department_mstr_id"]==""){
            $errMsg["department_mstr_id"] = "Department Name Is Required";
        }
        if(!isset($validate["employment_type_id"]) || $validate["employment_type_id"]==""){
            $errMsg["employment_type_id"] = "Employment Type Is Required";
        }
        if(!isset($validate["status"]) || $validate["status"]==""){
            $errMsg["status"] = "Status Is Required";
        }
        return $errMsg;
    }
}
?>