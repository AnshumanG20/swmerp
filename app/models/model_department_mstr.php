<?php
class model_department_mstr
{
    private $db;
    private $tbl_name = "tbl_department_mstr";
    private $tbl_project_mstr ="tbl_project_mstr";
    public function __construct(){
         $this->db = new dataBase();
    }
    public function getDepartmentMstrList(){
        try{
            return $this->db->table($this->tbl_name)
                    ->select('*')
                    ->where('_status', '=', 1)
                    ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
	
	public function getDepartmentMstrListGreaterPosition($ID){
        try{
            return $this->db->table($this->tbl_name)
                    ->select('*')
					->where('_id', '<', $ID)
                    ->where('_status', '=', 1)
                    ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getProjectMstrList(){
        try{
            return $this->db->table($this->tbl_project_mstr)
                    ->select('*')
                    ->where('_status', '=', 1)
                    ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}