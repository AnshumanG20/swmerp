<?php
class model_sub_stream
{
    private $db;
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function sub_qualification_add_update($data)
    {
        if($data['_id']==null)   //insert
        {
            // print_r($data);
            try{
                $sql ="insert into tbl_sub_stream_mstr(sub_stream_name,course_mstr_id,sub_course_mstr_id)values(:sub_stream_name,:course_mstr_id,:sub_course_mstr_id)";
                $this->db->query($sql);
                $this->db->bind('sub_stream_name',$data['sub_stream_name']);
                $this->db->bind('course_mstr_id',$data['course_mstr_id']);
                $this->db->bind('sub_course_mstr_id',$data['sub_course_mstr_id']);
                $result = $this->db->insertion();
                //print_r($result);
                if($result){
                    return true;
                }else{
                    return false;
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }
        else //update
        {
            try
            {
                $sql="update tbl_sub_stream_mstr 
				set sub_stream_name =:sub_stream_name,
                    course_mstr_id =:course_mstr_id,
                    sub_course_mstr_id =:sub_course_mstr_id
				where _id =:id";
                $this->db->query($sql);
                $this->db->bind('sub_stream_name',$data['sub_stream_name']);
                $this->db->bind('course_mstr_id',$data['course_mstr_id']);
                $this->db->bind('sub_course_mstr_id',$data['sub_course_mstr_id']);
                $this->db->bind('id',$data['_id']);
                //print_r($sql);
                $result = $this->db->updation();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
    }
    public function sub_Qualification_list(){
        try
        {
            $sql="select
				        sub._id,
                        course.course_name,
                        sub_course.stream_name,
                        sub.sub_stream_name,
                        sub.course_mstr_id,
                        sub.sub_course_mstr_id
				        FROM tbl_sub_stream_mstr sub
				        left join tbl_course_mstr course on (course._id=sub.course_mstr_id)
                        left join tbl_sub_course_mstr sub_course on (sub_course._id=sub.sub_course_mstr_id)
				        where sub._status=1 order by sub._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function sub_gateQualificationById($id)
    {
        //echo "ID = ".$id;
        try
        {
            $sql="select
				        sub._id,
                        course.course_name,
                        sub_course.stream_name,
                        sub.sub_stream_name,
                        sub.course_mstr_id,
                        sub.sub_course_mstr_id
				        FROM tbl_sub_stream_mstr sub
				        join tbl_course_mstr course on (course._id=sub.course_mstr_id)
                        join tbl_sub_course_mstr sub_course on (sub_course._id=sub.sub_course_mstr_id)
				        where sub._id=:id AND sub._status=1 ";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function sub_deletebyidqualification($id)
    {
        try
        {
            $sql="update tbl_sub_stream_mstr
				set _status=0
				where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            //print_r($sql);
            $result = $this->db->updation();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function sub_duplicatefunQualification($data)
    {
        try
        {
            $sql = "select sub_stream_name,course_mstr_id,sub_course_mstr_id from tbl_sub_stream_mstr 
                    where sub_stream_name =:sub_stream_name AND
                    course_mstr_id =:course_mstr_id AND
                    sub_course_mstr_id=:sub_course_mstr_id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('sub_stream_name',$data['sub_stream_name']);
            $this->db->bind('course_mstr_id',$data['course_mstr_id']);
            $this->db->bind('sub_course_mstr_id',$data['sub_course_mstr_id']);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    public function gateCourseList()
    {
        try
        {

            $sql ="select * from tbl_course_mstr where  _status=1 ";
            $this->db->query($sql);
            $list = $this->db->resultset();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gate_Sub_CourseList()
    {
        try
        {
            $sql ="select * from tbl_sub_course_mstr where  _status=1 ";
            $this->db->query($sql);
            $list = $this->db->resultset();
            // print_r($list);
            return $list;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function ajax_gateStream($data)
    {
         try
        {
            $sql="select
				        sub._id,
                        sub.stream_name
				        FROM tbl_sub_course_mstr sub
				        join tbl_course_mstr course on (course._id=sub.course_mstr_id)
				        where sub.course_mstr_id =:course_mstr_id AND sub._status=1 ";
            $this->db->query($sql);
            $this->db->bind('course_mstr_id',$data['course_mstr_id']);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
}
?>