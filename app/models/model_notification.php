<?php
    class model_notification
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }

        public function leave_det_for_head($data) //notification
        {
              $sql = "SELECT l.employee_id, e.first_name, e.middle_name, e.last_name, e.gender, l.leave_from_date, l.leave_to_date, l.leave_days, t.leave_type, l.leave_reason, l.leave_type_id, e.designation_mstr_id, l.reporting_tl_emp_id, e.marital_status
                       FROM tbl_employee_leave_detail l join tbl_emp_details e on(e._id=l.employee_id) join tbl_leave_type_mstr t on(t._id=l.leave_type_id)
                       where l._id=:leave_request_id;";
				$this->db->query($sql);
                $this->db->bind("leave_request_id", $data['id']);
		 		$result = $this->db->single();
				return $result;
        }
		
		public function leave_det_on_approval_for_head($data) //notification
        {
              $sql = "SELECT l.employee_id, e.first_name, e.middle_name, e.last_name, e.gender, l.leave_from_date, l.leave_to_date, l.leave_days, t.leave_type, l.leave_reason, l.leave_type_id, e.designation_mstr_id, l.reporting_head_emp_id, l.reporting_tl_emp_id, e.marital_status
                       FROM tbl_employee_leave_detail l join tbl_emp_details e on(e._id=l.employee_id) join tbl_leave_type_mstr t on(t._id=l.leave_type_id)
                       where l._id=:leave_request_id;";
				$this->db->query($sql);
                $this->db->bind("leave_request_id", $data['id']);
		 		$result = $this->db->single();
				return $result;
        }

		public function hr_empid_on_approval($COMLOCID) //notification
        {
            $sql = "SELECT _id FROM tbl_emp_details where designation_mstr_id='9' and company_location_id='".$COMLOCID."' and _status='1'";
			$this->db->query($sql);
            $result = $this->db->single();
			return $result;
        }

        public function leave_type_by_id($data) //notification
        {
            //print_r($data);
              $sql = "SELECT _id, leave_type, _status
                       FROM tbl_leave_type_mstr
                       where _id=:leave_type_id;";
				$this->db->query($sql);
                $this->db->bind("leave_type_id", $data);
		 		$result = $this->db->single();
				return $result;
        }
        
        public function approval_leave_type_by_id($data) //notification
        {
            //print_r($data);
              $sql = "SELECT _id, leave_type, _status
                       FROM tbl_leave_type_mstr
                       where _id=:leave_type_id;";
				$this->db->query($sql);
                $this->db->bind("leave_type_id", $data);
		 		$result = $this->db->single();
				return $result;
        }

        public function notification_for_reporting_employee($data) //notification
        {
            try
            {
                 return $this->db->table('tbl_notification_detail')
                            ->select('_id, title, about, link, employee_id, notification_type')
                            ->where('employee_id', '=', $data['logged_emp_id'])
                            ->where('_status', '=', 1)
                            ->get();
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function all_notification_for_reporting_employee($data) //notification
        {
            try
            {
                 return $this->db->table('tbl_notification_detail')
                            ->select('_id, title, about, link, employee_id, notification_type, _status')
                            ->where('employee_id', '=', $data['logged_emp_id'])
                            ->get();
            }
            
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        
        public function notification_for_team_leader($data) //notification
        {
            try
            {
                 return $this->db->table('tbl_notification_detail')
                            ->select('_id, title, about, link, employee_id, notification_type')
                            ->where('employee_id', '=', $data['logged_emp_id'])
                            ->where('_status', '=', 1)
                            ->get();
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function notification_count($data){
       		$sql = "SELECT count(*) as notification_count FROM tbl_notification_detail
                    WHERE employee_id=:employee_id and _status='1'";
				$this->db->query($sql);
                $this->db->bind("employee_id", $data['logged_emp_id']);
		 		$result = $this->db->single();
				return $result;
		}
    }

?>