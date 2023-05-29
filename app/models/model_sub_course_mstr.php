<?php 
class model_sub_course_mstr
{
    private $db;
    private $tbl_name ="tbl_sub_course_mstr";
    public function __construct(){
        $this->db = new dataBase();
    }
    public function getSubCourseByCourseMstrId($course_mstr_id){
    	return $this->db->table($this->tbl_name)
    			->select('_id, stream_name')
    			->where('course_mstr_id', '=', $course_mstr_id)
    			->where('_status', '=', 1)
    			->get();

    }
}    