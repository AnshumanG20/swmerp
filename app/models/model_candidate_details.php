 <?php 
class model_candidate_details
{
    private $db;
    private $tbl_name = "tbl_emp_details";
    public function __construct()
    {
         $this->db = new dataBase();
    }
    public function getEmpDetailsByUserMstrId($ID){
       $result = $this->db->table($this->tbl_name)
                            ->select("*")
                            ->where("user_mstr_id", "=", $ID)
                            ->where("_status", "=", 1)
                            ->first();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function deactivateCandidate($deactivate_comment,$ID){
        $sql ="UPDATE tbl_candidate_details SET deactivate_status=1,deactivate_comment='$deactivate_comment'  WHERE _id=:id" ;
        $this->db->query($sql);
        $this->db->bind('id',$ID);
        $result = $this->db->execute();
         if($result){
             return $result;
         }else{
             return false;
         }
     }
     public function activateCandidate($ID){
        $sql ="UPDATE tbl_candidate_details SET deactivate_status=0,deactivate_comment='' WHERE _id=:id" ;
        $this->db->query($sql);
        $this->db->bind('id',$ID);
        $result = $this->db->execute();
         if($result){
             return $result;
         }else{
             return false;
         }
     }

	public function getEmpDetailsById($ID){
       $result = $this->db->table($this->tbl_name)
                            ->select("*")
                            ->where("_id", "=", $ID)
                            ->where("_status", "=", 1)
                            ->first();
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function getEmpDetailsByIdForEdit($ID){
        $result = $this->db->table("tbl_candidate_details")
                             ->select("*")
                             ->where("_id", "=", $ID)
                             ->where("_status", "=", 1)
                             ->first();
         if($result){
             return $result;
         }else{
             return false;
         }
     }


	public function getJoinEmpDetails(){
      $result = $this->db->table($this->tbl_name)
	   						->leftjoin('tbl_department_mstr', 'tbl_department_mstr._id', '=', 'tbl_emp_details.department_mstr_id')
							->Leftjoin('tbl_designation_mstr', 'tbl_designation_mstr._id', '=', 'tbl_emp_details.designation_mstr_id')
                            ->leftjoin('tbl_employment_type_mstr','tbl_employment_type_mstr._id', '=', 'tbl_emp_details.employment_type_mstr_id')
                            ->select("tbl_emp_details._id, 
									  tbl_emp_details.department_mstr_id,
									  tbl_department_mstr.dept_name,
									  tbl_emp_details.designation_mstr_id, 
									  tbl_designation_mstr.designation_name,
									  tbl_emp_details.employment_type_mstr_id, 
                                      tbl_employment_type_mstr.employment_type,
									  tbl_emp_details.user_mstr_id, 
									  tbl_emp_details.employee_code, 
									  tbl_emp_details.biometric_employee_code, 
									  tbl_emp_details.first_name, 
									  tbl_emp_details.middle_name, 
									  tbl_emp_details.last_name, 
									  tbl_emp_details.present_address, 
									  tbl_emp_details.present_city, 
									  tbl_emp_details.present_district, 
									  tbl_emp_details.present_state, 
									  tbl_emp_details.present_pin_code, 
									  tbl_emp_details.permanent_address, 
									  tbl_emp_details.permanent_city, 
									  tbl_emp_details.permanent_district, 
									  tbl_emp_details.permanent_state, 
									  tbl_emp_details.permanent_pin_code, 
									  tbl_emp_details.d_o_b, 
									  tbl_emp_details.gender, 
									  tbl_emp_details.marital_status, 
									  tbl_emp_details.spouse_name, 
									  tbl_emp_details.height, 
									  tbl_emp_details.weight, 
									  tbl_emp_details.blood_group, 
									  tbl_emp_details.personal_phone_no, 
									  tbl_emp_details.other_phone_no, 
									  tbl_emp_details.email_id, 
									  tbl_emp_details.photo_path,
									  tbl_emp_details.joining_date,
									  tbl_emp_details.created_by_emp_details_id,
									  tbl_emp_details.step_status,
									  tbl_emp_details._status")
                            ->whereIn("tbl_emp_details._status", [0,1])
                            ->orderBy("tbl_emp_details.first_name", 'asc')
                            ->get();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function search_emp($data)
    {
            try
            {
                $sql =" select tbl_emp_details._id, 
									  tbl_emp_details.department_mstr_id,
									  tbl_department_mstr.dept_name,
									  tbl_emp_details.designation_mstr_id, 
									  tbl_designation_mstr.designation_name,
									  tbl_emp_details.employment_type_mstr_id, 
                                      tbl_employment_type_mstr.employment_type,
									  tbl_emp_details.user_mstr_id, 
									  tbl_emp_details.employee_code, 
									  tbl_emp_details.biometric_employee_code, 
									  tbl_emp_details.first_name, 
									  tbl_emp_details.middle_name, 
									  tbl_emp_details.last_name, 
									  tbl_emp_details.present_address, 
									  tbl_emp_details.present_city, 
									  tbl_emp_details.present_district, 
									  tbl_emp_details.present_state, 
									  tbl_emp_details.present_pin_code, 
									  tbl_emp_details.permanent_address, 
									  tbl_emp_details.permanent_city, 
									  tbl_emp_details.permanent_district, 
									  tbl_emp_details.permanent_state, 
									  tbl_emp_details.permanent_pin_code, 
									  tbl_emp_details.d_o_b, 
									  tbl_emp_details.gender, 
									  tbl_emp_details.marital_status, 
									  tbl_emp_details.spouse_name, 
									  tbl_emp_details.height, 
									  tbl_emp_details.weight, 
									  tbl_emp_details.blood_group, 
									  tbl_emp_details.personal_phone_no, 
									  tbl_emp_details.other_phone_no, 
									  tbl_emp_details.email_id, 
									  tbl_emp_details.photo_path,
									  tbl_emp_details.joining_date,
									  tbl_emp_details.created_by_emp_details_id,
									  tbl_emp_details.step_status,
									  tbl_emp_details._status 
                                      from tbl_emp_details 
                          left join tbl_department_mstr on(tbl_department_mstr._id = tbl_emp_details.department_mstr_id)
                          left join tbl_designation_mstr on(tbl_designation_mstr._id = tbl_emp_details.designation_mstr_id)
                          left join tbl_employment_type_mstr on(tbl_employment_type_mstr._id = tbl_emp_details.employment_type_mstr_id)
                          where 1=1";
                if($data['department_mstr_id']!=""){
                    $sql .= " AND tbl_emp_details.department_mstr_id=".$data['department_mstr_id'];
                }
                if($data['department_mstr_id']!=""){
                    if($data['designation']!=""){
                        $sql .= " AND tbl_emp_details.designation_mstr_id=".$data['designation'];
                    }
                }

                if($data['employment_type_id']!=""){
                    $sql .= " AND tbl_emp_details.employment_type_mstr_id=".$data['employment_type_id'];
                }
                if($data['status']!=""){
                    if($data['status']==7){
                        $sql .= " AND tbl_emp_details.step_status =".$data['status'] ."AND tbl_emp_details._status=1";
                    }
                    else if($data['status']==0){
                        $sql .= " AND tbl_emp_details._status=".$data['status'];
                    }
                    else{
                        $sql .= " AND tbl_emp_details.step_status!=7 AND tbl_emp_details._status=".$data['status'];
                    }
                }
                $this->db->query($sql);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

    }
    public function gatedesignation($data)
    {
        try
        {
            $sql ="select * from tbl_designation_mstr where department_mstr_id =:department_mstr_id " ;
            $this->db->query($sql);
            $this->db->bind('department_mstr_id',$data['department_mstr_id']);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function emp_basic_details($data)
    {
        $result = $this->db->table($this->tbl_name)
                            ->select("*")
                            ->where("_id", "=", $data['id'])
                            ->where("_status", "=", 1)
                            ->first();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}