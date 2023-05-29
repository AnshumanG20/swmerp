<?php
require_once("validate.php");
class Validate_task_assign extends validate
{
    function __construct()
    {

    }
    function task_assign($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["assigned_emp_details_id"]) || $validate["assigned_emp_details_id"]==""){
            $errMsg["assigned_emp_details_id"] = "Employee Name Is Required";
        }
        if(!isset($validate["task_list_mstr_id"]) || $validate["task_list_mstr_id"]==""){
            $errMsg["task_list_mstr_id"] = "Task Name Is Required";
        }
         if(!isset($validate["remarks_by_assigned"]) || $validate["remarks_by_assigned"]==""){
            $errMsg["remarks_by_assigned"] = "Task Remark Is Required";
        }
        if(!isset($validate["deadline_date_time"]) || $validate["deadline_date_time"]==""){
            $errMsg["deadline_date_time"] = "Task Deadline Date Is Required";
        }
        if(!isset($validate["project_mstr_id"]) || $validate["project_mstr_id"]==""){
            $errMsg["project_mstr_id"] = "Project Name Required";
        }

        return $errMsg;
    }
}
?>