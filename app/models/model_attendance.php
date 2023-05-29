<?php
    class model_attendance
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }
       
      
	public function get_employee_details($biometric_code)
    {
        try
        {
            $sql="select e._id as emp_id, e.first_name, e.middle_name, e.last_name, e.employee_code, d.dept_name from tbl_emp_details e join tbl_department_mstr d on(e.department_mstr_id=d._id) where e.biometric_employee_code='$biometric_code' and e._status='1'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function get_employee_details_by_id($EMPID)
    {
        try
        {
            $sql="select e._id as emp_id, e.first_name, e.middle_name, e.last_name, e.employee_code, d.dept_name, e.email_id, m.designation_name, e.personal_phone_no, e.biometric_employee_code  from tbl_emp_details e join tbl_department_mstr d on(e.department_mstr_id=d._id) join tbl_designation_mstr m on(e.designation_mstr_id=m._id) where e._id='$EMPID' and e._status='1'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	
	public function get_employee_list()
    {
        try
        {
            $sql="select e._id as emp_id, e.first_name, e.middle_name, e.last_name, e.employee_code, d.dept_name, e.email_id, m.designation_name, e.personal_phone_no, e.biometric_employee_code  from tbl_emp_details e join tbl_department_mstr d on(e.department_mstr_id=d._id) join tbl_designation_mstr m on(e.designation_mstr_id=m._id) where e._status='1' and e.step_status='7' order by e.first_name";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	
	
    }

?>