<?php 
class model_emp_references
{
    private $db;
    private $tbl_name = "tbl_emp_references";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function getEmpReferencesByEmpDetailsId($ID){
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
    public function getCandidateReferencesByEmpDetailsId($ID){
        $result = $this->db->table("tbl_candidate_references")
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