<?php
class model_designation_mstr
{
    private $db;
    private $tbl_name = "tbl_designation_mstr";
    public function __construct(){
         $this->db = new dataBase();
    }
    public function getDesignationMstrListByDeptId($department_mstr_id){
       $sql = "SELECT * FROM tbl_designation_mstr WHERE department_mstr_id =:department_mstr_id AND _status=:_status";
				$this->db->query($sql);
                $this->db->bind("department_mstr_id", $department_mstr_id);
                $this->db->bind("_status", 1);
                $result = $this->db->resultset();
				if($result){
					$result = json_decode(json_encode($result), true);
				}else{
					$result = false;
				}
				return $result;
    }
    //////////////////////////////////////

    public function checkIfReportingHeadExist($data){
        // return $data;
       $sql = "SELECT * FROM tbl_on_reporting_leave_mstr WHERE reporting_person_emp_mstr_id=:reporting_person_emp_mstr_id";
        // return $sql; reporting_head_emp_mstr_id=:reporting_head_emp_mstr_id AND 
        $this->db->query($sql);
        // $this->db->bind("reporting_head_emp_mstr_id", $data['emp_details_id']);
        $this->db->bind("reporting_person_emp_mstr_id", $data['emp_details_id_field']);
        $result = $this->db->single();
        if($result){
            $result = true;
            //json_decode(json_encode($result), true);
        }else{
            $result = false;
        }
        return $result;

    }
    

    public function insertReportingHeadData($data){
        $result = $this->db->table('tbl_on_reporting_leave_mstr')->
        insertGetId([
            "reporting_head_designation_mstr_id"=>$data['from_designation_mstr_id'],
            "reporting_leave_designation_mstr_id"=>$data['from_designation_mstr_id'],
            "reporting_person_designation_mstr_id"=>$data['reporting_designation_mstr_id'],
            "reporting_head_emp_mstr_id"=>$data['emp_details_id'],
            "reporting_person_emp_mstr_id"=>$data['emp_details_id_field'],
            "_status"=>"1"
        ]);
        if($result){
            $result = json_decode(json_encode($result), true);
        }else{
            $result = false;
        }
        return $result;
    }

    /////////////////////////////////////

    public function getEmployeeMstrListByDesgId($desg_mstr_id){
        $sql = "SELECT * FROM tbl_emp_details WHERE designation_mstr_id =:designation_mstr_id AND _status=:_status";
        // var_dump($sql);
                 $this->db->query($sql);
                 $this->db->bind("designation_mstr_id", $desg_mstr_id);
                 $this->db->bind("_status", 1);
                 $result = $this->db->resultset();
                 if($result){
                     $result = json_decode(json_encode($result), true);
                 }else{
                     $result = false;
                 }
                 return $result;
     }
     public function getEmployeeMstrListByDesgIdAcToProjectId($designation_mstr_id,$project_mstr_id){
        $sql = "SELECT * FROM tbl_emp_details WHERE designation_mstr_id =:designation_mstr_id AND project_mstr_id=:project_mstr_id AND _status=:_status";
        // var_dump($sql);
        // print_r($sql);return;
                 $this->db->query($sql);
                 $this->db->bind("designation_mstr_id", $designation_mstr_id);
                 $this->db->bind("project_mstr_id", $project_mstr_id);
                 $this->db->bind("_status", 1);
                 $result = $this->db->resultset();
                 if($result){
                     $result = json_decode(json_encode($result), true);
                 }else{
                     $result = false;
                 }
                 return $result;
     }

    public function getDesignationMstrList(){
        return $this->db->table('tbl_designation_mstr')
                    ->select('_id, designation_name')
                    ->where('_status', '=', 1)
                    ->orderBy('_id', 'ASC')
                    ->get();
    }

    public function getReportingList(){
        $sql = "SELECT * FROM tbl_on_reporting_leave_mstr";
        $this->db->query($sql);
        $result = $this->db->resultset();

        return $result;
    }

    public function getRepHeadDetail(){
        $sql = "SELECT r.first_name, r.last_name,r._id from tbl_emp_details as r 
        inner join tbl_on_reporting_leave_mstr as rm  on  r._id =rm.reporting_head_emp_mstr_id 
        order by rm._id";
        $this->db->query($sql);

        $result = $this->db->resultSet();
        return $result;
    }

    public function getReporteeDetail(){
        $sql = "SELECT r.first_name, r.last_name,r._id from tbl_emp_details as r 
        inner join tbl_on_reporting_leave_mstr as rm
        on  r._id = rm.reporting_person_emp_mstr_id order by rm._id";
        $this->db->query($sql);

        $result = $this->db->resultSet();
        return $result;
    }

    public function deleteReportingHeadData($id){
        // echo $id;
        $sql = "delete from tbl_on_reporting_leave_mstr where reporting_person_emp_mstr_id=$id";
        // var_dump($sql);return;
        $this->db->query($sql);
        $this->db->deletion();
    }

 }
