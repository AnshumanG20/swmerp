<?php 
class model_user_mstr
{
    private $db;
    private $tbl_name = "tbl_user_mstr";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function verifyUserPass($data){
        $result = $this->db->table($this->tbl_name)
                            ->select("_id")
                            ->where("user_name", "=", $data['user_name'])
                            ->where("user_pass", "=", $data['user_pass'])
                            ->where("_status", "=", 1)
                            ->first();
        if($result){ return $result['_id'];}
        else{ return false;}

    }
}