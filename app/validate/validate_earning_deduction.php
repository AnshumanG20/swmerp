<?php
require_once("validate.php");
class Validate_earning_deduction extends validate
{
	function __construct()
    {

    }

    function earning_deduction_add_update($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["grade_id"]) || $validate["grade_id"]=="-"){
            $errMsg["grade_id"] = "Grade Is Required";
        }
        if(!isset($validate["employment_type_id"]) || $validate["employment_type_id"]=="-"){
            $errMsg["employment_type_id"] = "Employment Type Is Required";
        }
        if(!isset($validate["min_salary"]) || $validate["min_salary"]==""){
            $errMsg["min_salary"] = "Minimum Salary Is Required";
        }
        if(!isset($validate["max_salary"]) || $validate["max_salary"]==""){
            $errMsg["max_salary"] = "Maximum Salary Is Required";
        }
        return $errMsg;
    }
}
?>