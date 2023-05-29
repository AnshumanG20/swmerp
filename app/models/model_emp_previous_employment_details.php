<?php 
class model_emp_previous_employment_details
{
    private $db;
    private $tbl_name = "tbl_emp_previous_employment_details";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function getEmpPreviousEmploymentDetailsByEmpDetailsId($ID){
       $result = $this->db->table($this->tbl_name)
                            ->select("*")
                            ->where("emp_details_id", "=", $ID)
                            ->where("_status", "=", 1)
                            ->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function getCandidatePreviousEmploymentDetailsByEmpDetailsId($ID){
        $result = $this->db->table("tbl_candidate_previous_employment_details")
                             ->select("*")
                             ->where("candidate_details_id", "=", $ID)
                             ->where("_status", "=", 1)
                             ->get();
         if($result){
             return $result;
         }else{
             return false;
         }
     }
}