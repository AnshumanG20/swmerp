<?php 
class model_emp_qualification_details
{
    private $db;
    private $tbl_name = "tbl_emp_qualification_details";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function getEmpQualificationDetailsByEmpDetailsId($ID){
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
    public function getCandidateQualificationDetailsByEmpDetailsId($ID){
        $result = $this->db->table("tbl_candidate_qualification_details")
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