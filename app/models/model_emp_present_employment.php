<?php 
class model_emp_present_employment
{
    private $db;
    private $tbl_name = "tbl_emp_present_employment";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function getEmpPresentEmploymentByEmpDetailsId($ID){
       $result = $this->db->table($this->tbl_name)
                            ->select("*")
                            ->where("emp_details_id", "=", $ID)
                            ->where("_status", "=", 1)
                            ->first();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function getCandidatePresentEmploymentByEmpDetailsId($ID){
        $result = $this->db->table("tbl_candidate_present_employment")
                             ->select("*")
                             ->where("candidate_details_id", "=", $ID)
                             ->where("_status", "=", 1)
                             ->first();
         if($result){
             return $result;
         }else{
             return false;
         }
     }
}