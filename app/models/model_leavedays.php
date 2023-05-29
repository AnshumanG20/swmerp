<?php
    class model_leavedays
    {
        private $db;
        public function __construct()
        {
            $this->db =new dataBase();
        }
    public function leavetype_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
           // print_r($data);
            try{
                 $sql ="insert into tbl_leave_mstr(leave_type_id,grade_id,leave_days)
                                            values(:leave_type_id,:grade_id,:leave_days)";
                 $this->db->query($sql);
                 $this->db->bind('leave_type_id',$data['leave_type_id']);
                 $this->db->bind('grade_id',$data['grade_id']);
                 $this->db->bind('leave_days',$data['leave_days']);
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
                $sql="update tbl_leave_mstr 
				set leave_type_id =:leave_type_id,
                    grade_id =:grade_id,
                    leave_days =:leave_days
				where _id =:id";
				$this->db->query($sql);
                $this->db->bind('leave_type_id',$data['leave_type_id']);
                $this->db->bind('grade_id',$data['grade_id']);
                $this->db->bind('leave_days',$data['leave_days']);
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
    public function Leave_list(){
        try{
             $sql="select
				    leave._id,
				    leave.leave_days,
                    leave.grade_id,
                    leave.leave_type_id,
				    grade.grade_type,
                    type.leave_type
				    FROM tbl_leave_mstr leave
				    left join tbl_grade_mstr grade on (grade._id=leave.grade_id)
				    left join tbl_leave_type_mstr type on (type._id=leave.leave_type_id)
				    where leave._status=1 order by leave._id desc";
				    $this->db->query($sql);
				    $result = $this->db->resultset();
				    return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function gateLeaveById($id)
    {
        //echo "ID = ".$id;
            try
            {
                $sql="select
				    leave._id,
				    leave.leave_days,
                    leave.grade_id,
                    leave.leave_type_id,
				    grade.grade_type,
                    type.leave_type
				    FROM tbl_leave_mstr leave
				    left join tbl_grade_mstr grade on (grade._id=leave.grade_id)
				    left join tbl_leave_type_mstr type on (type._id=leave.leave_type_id)
				    where leave._status=1 AND leave._id=:id order by leave._id desc";
				    $this->db->query($sql);
                    $this->db->bind('id',$id);
				    $result = $this->db->single();
				    return $result;
            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
    }
    public function deletebyidleave($id)
    {
         try
            {
                $sql="update tbl_leave_mstr
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
        public function duplicatefunLeaveDays($data)
        {
             try
            {
                $sql="select leave_type_id,grade_id,leave_days from tbl_leave_mstr
				    where leave_type_id =:leave_type_id AND grade_id=:grade_id AND leave_days =:leave_days AND  _status=1";
				$this->db->query($sql);
				$this->db->bind('leave_type_id',$data['leave_type_id']);
                 $this->db->bind('grade_id',$data['grade_id']);
                 $this->db->bind('leave_days',$data['leave_days']);
				//print_r($sql);
			    $result = $this->db->single();
			    return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
    }
?>