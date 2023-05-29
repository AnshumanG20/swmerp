<?php
require_once("validate.php");
class Validate_task extends validate
{
    function __construct()
    {

    }
    function validate_task($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["project_mstr_id"]) || $validate["project_mstr_id"]=="-"){
            $errMsg["project_mstr_id"] = "Project Name Is Required";
        }
        if(!isset($validate["task_name"]) || $validate["task_name"]==""){
            $errMsg["task_name"] = "Task Name Is Required";
        }
         if(!isset($validate["description"]) || $validate["description"]==""){
            $errMsg["description"] = "Task Description Is Required";
        }
        return $errMsg;
    }
}
?>