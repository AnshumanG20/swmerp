<?php
require_once("validate.php");
class Validate_Item extends validate
{
    function __construct()
    {

    }
    function validate_item($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["asset_type"]) || $validate["asset_type"]==""){
            $errMsg["asset_type"] = "Assets Type Is Required";
        }
        if(!isset($validate["item_name"]) || $validate["item_name"]==""){
            $errMsg["item_name"] = "Item Name Is Required";
        }
        return $errMsg;
    }
     function validate_sub_item($validate)
    {
        $errMsg = (array)null;
        if(!isset($validate["item_name_id"]) || $validate["item_name_id"]==""){
            $errMsg["item_name_id"] = "Assets Name Is Required";
        }
        if(!isset($validate["sub_item_name"]) || $validate["sub_item_name"]==""){
            $errMsg["sub_item_name"] = "Sub Item Name Is Required";
        }
        if(!isset($validate["selling_rate"]) || $validate["selling_rate"]==""){
            $errMsg["selling_rate"] = "Item Selling Rate Is Required";
        }
         if(!isset($validate["cgst_tax"]) || $validate["cgst_tax"]==""){
            $errMsg["cgst_tax"] = "CGST Tax Is Required";
        }
        if(!isset($validate["sgst_tax"]) || $validate["sgst_tax"]==""){
            $errMsg["sgst_tax"] = "SGST Tax Is Required";
        }
        if(!isset($validate["igst_tax"]) || $validate["igst_tax"]==""){
            $errMsg["igst_tax"] = "IGST Tax Is Required";
        }
        return $errMsg;
    }
}
?>