<?php
class model_emp_bank_details
{
    private $db;
    private $tbl_name = "tbl_emp_bank_details";
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function getEmpBankDetailsByEmpDetailsId($ID)
    {
        $result = $this->db->table($this->tbl_name)
            ->select("*")
            ->where("emp_details_id", "=", $ID)
            ->where("_status", "=", 1)
            ->first();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}
