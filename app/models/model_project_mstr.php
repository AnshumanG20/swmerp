<?php
class model_project_mstr
{
    private $db;
    private $tbl_name ="tbl_project_mstr";
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function projectMstrList(){
        try{
            return $this->db->table("tbl_project_mstr")
                        ->select('*')
                        ->where('_status', '=', 1)
                        ->orderBy('project_name', 'ASC')
                        ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}