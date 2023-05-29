<?php
class model_doc_type_mstr
{
    private $db;
    private $tbl_name = "tbl_doc_type_mstr";
    public function __construct(){
         $this->db = new dataBase();
    }
    public function getDocTypeMstrList(){
        try{
            return $this->db->table($this->tbl_name)
                    ->select('*')
                    ->where('_status', '=', 1)
                    ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}