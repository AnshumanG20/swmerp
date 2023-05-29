<?php 
class model_sub_stream_mstr
{
    private $db;
    private $tbl_name ="tbl_sub_stream_mstr";
    public function __construct(){
        $this->db = new dataBase();
    }
    public function getSubStreamBySubCourseMstrId($sub_course_mstr_id){
    	return $this->db->table($this->tbl_name)
    			->select('_id, sub_stream_name')
    			->where('sub_course_mstr_id', '=', $sub_course_mstr_id)
    			->where('_status', '=', 1)
    			->get();

    }
    
}    