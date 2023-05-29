<?php 
class model_emp_family_backbgound
{
    private $db;
    private $tbl_name = "tbl_emp_family_backbgound";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function getEmpFamilyBackbgoundByEmpDetailsId($ID){
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

    public function getCandidateFamilyBackbgoundByEmpDetailsId($ID){
        $result = $this->db->table("tbl_candidate_family_backbgound")
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