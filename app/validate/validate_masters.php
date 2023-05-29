<?php
require_once("validate.php");
class Validate_masters extends validate
{
	function __construct()
    {

    }
     function dept_add_update($validate){

        $errMsg = (array)null;
         if(!isset($validate["dept_name"]) || $validate["dept_name"]==""){
            $errMsg["dept_name"] = "Department Name Is Required";
        }
        return $errMsg;

    }
    function grade_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["grade_type"]) || $validate["grade_type"]==""){
            $errMsg["grade_type"] = "Grade Type Is Required";
        }
       /* if(!isset($validate["min_salary"]) || $validate["min_salary"]==""){
            $errMsg["min_salary"] = "Min Salary Is Required";
        }
        if(!isset($validate["max_salary"]) || $validate["max_salary"]==""){
            $errMsg["max_salary"] = "Max Salary Is Required";
        }
 */
        return $errMsg;

    }
    function biometric_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["biometic_code"]) || $validate["biometic_code"]==""){
            $errMsg["biometic_code"] = "Biometric Code Is Required";
        }
        return $errMsg;

    }
     function qualification_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["course_name"]) || $validate["course_name"]==""){
            $errMsg["course_name"] = "Qualification Is Required";
        }
        return $errMsg;

    }
    function doc_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["doc_name"]) || $validate["doc_name"]==""){
            $errMsg["doc_name"] = "Document Name Is Required";
        }
        return $errMsg;
    }
    function designation_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["designation_name"]) || $validate["designation_name"]==""){
            $errMsg["designation_name"] = "Designation Is Required";
        }
         if(!isset($validate["department_mstr_id"]) || $validate["department_mstr_id"]=="-"){
            $errMsg["department_mstr_id"] = "Department Name Is Required";
        }
        if(!isset($validate["grade_mstr_id"]) || $validate["grade_mstr_id"]=="-"){
            $errMsg["grade_mstr_id"] = "Grade Is Required";
        }
        return $errMsg;
    }
    function user_add_update($validate)
    {
        $errMsg = (array)null;
         if(!isset($validate["user_name"]) || $validate["user_name"]==""){
            $errMsg["user_name"] = "User Name Is Required";
        }
         if(!isset($validate["user_pass"]) || $validate["user_pass"]==""){
            $errMsg["user_pass"] = "Password Is Required";
        }
        if(!isset($validate["pass_hint"]) || $validate["pass_hint"]==""){
            $errMsg["grade_mstr_id"] = "Password Hint Is Required";
        }
        return $errMsg;
    }
    function employeement_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["employment_type"]) || $validate["employment_type"]==""){
            $errMsg["employment_type"] = "Employeement Type Is Required";
        }
    }
    function relation_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["course_name"]) || $validate["course_name"]==""){
            $errMsg["course_name"] = "Relation Name Is Required";
        }
        return $errMsg;

    }
     function ward_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["ward_name"]) || $validate["ward_name"]==""){
            $errMsg["ward_name"] = "Ward Name Is Required";
        }
        return $errMsg;

    }
     function project_add_update($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["project_name"]) || $validate["project_name"]==""){
            $errMsg["project_name"] = "Project Name Is Required";
        }
        if(!isset($validate["project_short_name"]) || $validate["project_short_name"]==""){
            $errMsg["project_short_name"] = "Project Short Name Is Required";
        }
         if(!isset($validate["project_description"]) || $validate["project_description"]==""){
            $errMsg["project_description"] = "Project Description Is Required";
        }
        /*if(!isset($validate["latitude"]) || $validate["latitude"]==""){
            $errMsg["latitude"] = "Project Latitude Is Required";
        }
        if(!isset($validate["longitude"]) || $validate["longitude"]==""){
            $errMsg["longitude"] = "Project Longitude Is Required";
        }*/
        if(!isset($validate["state"]) || $validate["state"]==""){
            $errMsg["state"] = "state field is required";
        }
        if(!isset($validate["district"]) || $validate["district"]==""){
            $errMsg["district"] = "district field is required";
        }
        if(!isset($validate["state_dist_city_id"]) || $validate["state_dist_city_id"]==""){
            $errMsg["state_dist_city_id"] = "city field is required";
        }
        return $errMsg;

    }
    function leave_add_update($validate){

        $errMsg = (array)null;
         if(!isset($validate["leave_type"]) || $validate["leave_type"]==""){
            $errMsg["leave_type"] = "Leave Type Is Required";
        }
        if(!isset($validate["leave_days"]) || $validate["leave_days"]==""){
            $errMsg["leave_days"] = "Leave Days Is Required";
        }
        return $errMsg;
       }
    function earning_add_update($validate)
    {
          $errMsg = (array)null;
         if(!isset($validate["employment_type_id"]) || $validate["employment_type_id"]=="-"){
            $errMsg["employment_type_id"] = "Employment Type Is Required";
        }
        if(!isset($validate["basic_salary"]) || $validate["basic_salary"]==""){
            $errMsg["basic_salary"] = "Basic Salary Is Required";
        }
         if(!isset($validate["dearness_allowance"]) || $validate["dearness_allowance"]==""){
            $errMsg["dearness_allowance"] = "Dearness Allowance Is Required";
        }
         if(!isset($validate["transport_allowance"]) || $validate["transport_allowance"]==""){
            $errMsg["transport_allowance"] = "Transport Allowance Is Required";
        }
         if(!isset($validate["house_rent_allowance"]) || $validate["house_rent_allowance"]==""){
            $errMsg["house_rent_allowance"] = "House Rent Allowance Is Required";
        }
        if(!isset($validate["medical_reimbursement"]) || $validate["medical_reimbursement"]==""){
            $errMsg["medical_reimbursement"] = "Medical Reimbursement Is Required";
        }
        return $errMsg;
   }
     function deduction_add_update($validate)
     {
          $errMsg = (array)null;
         if(!isset($validate["employment_type_id"]) || $validate["employment_type_id"]=="-"){
            $errMsg["employment_type_id"] = "Employment Type Is Required";
        }
        if(!isset($validate["provident_fund"]) || $validate["provident_fund"]==""){
            $errMsg["provident_fund"] = "Provident Fund Is Required";
        }
         if(!isset($validate["esic"]) || $validate["esic"]==""){
            $errMsg["esic"] = "E.S.I.C Is Required";
        }
         if(!isset($validate["professional_tax"]) || $validate["professional_tax"]==""){
            $errMsg["professional_tax"] = "Professional Tax Is Required";
        }
         if(!isset($validate["tds"]) || $validate["tds"]==""){
            $errMsg["tds"] = "T.D.S Is Required";
        }
        return $errMsg;
    }
    function sub_qualification_add_update($validate)
    {
        $errMsg = (array)null;
         if(!isset($validate["course_mstr_id"]) || $validate["course_mstr_id"]=="-"){
            $errMsg["course_mstr_id"] = "Qualification Is Required";
        }
        if(!isset($validate["stream_name"]) || $validate["stream_name"]==""){
            $errMsg["stream_name"] = "Stream Is Required";
        }
        return $errMsg;
    }
}
?>