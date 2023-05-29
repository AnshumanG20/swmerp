<?php
    class model_leave
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }
        public function gradelistbyEmpId($data){
       		$sql = "SELECT g._id, g.grade_type FROM tbl_designation_mstr d
                    join tbl_grade_mstr g on(d.grade_mstr_id=g._id) join
                    tbl_emp_details e on(e.designation_mstr_id=d._id)
                    WHERE e._id=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data);
		 		$result = $this->db->single();
				return $result;
		}
        public function onreportinglistbyDesgId($data){
            // echo $data;return;
       		    $sql = "SELECT _id, reporting_head_designation_mstr_id,reporting_head_emp_mstr_id, reporting_leave_designation_mstr_id FROM tbl_on_reporting_leave_mstr
                    WHERE reporting_person_emp_mstr_id=:reporting_person_emp_mstr_id";
                    
				$this->db->query($sql);
                $this->db->bind("reporting_person_emp_mstr_id", $data);
		 		$result = $this->db->single();
				return $result;
		}

        public function onreportingheadbyCompLocId($DESGID, $LOCID){
       		      $sql = "SELECT * FROM tbl_emp_details
                    WHERE _id='$DESGID' and _status='1'";
				$this->db->query($sql);
                $result = $this->db->single();
				return $result;

                // and company_location_id='1'
		}
        public function onreportingtlbyCompLocId($DESGID, $LOCID){
       		     $sql = "SELECT designation_mstr_id,first_name, middle_name, last_name FROM tbl_emp_details
                    WHERE _id='$DESGID' and _status='1'";
				$this->db->query($sql);
                $result = $this->db->single();
				return $result;
		}

        public function getleavereq_by_id($id) //gate data for grade dropdown button
        {
            try
            {
                $sql = "select e.first_name, e.middle_name, e.last_name, e.gender, l.leave_from_date, l.leave_to_date, l.leave_days, l.leave_type_id, l.leave_reason, l._status, l.reporting_head_emp_id, l.employee_id, e.designation_mstr_id, l.reporting_tl_emp_id, l.cancel_remarks
                        from tbl_employee_leave_detail l join tbl_emp_details e on(l.employee_id=e._id) where l._id='$id'";
                $this->db->query($sql);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function emp_leave_days_fi_yr($EMP_ID, $ID, $FY){
            //print_r( $data['leave']['_id']);
       		$sql = "select sum(leave_days) as leave_days from  tbl_employee_leave_detail
                    where employee_id='$EMP_ID'
                    and leave_type_id='$ID'
                    and financial_year='$FY' and _status in ('7','6')";
				$this->db->query($sql); 
            	$result = $this->db->single();
				return $result;
		}

         public function leave_approval_view($data){
       		$result =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}

        public function leave_rejection_view($data){
       		$result =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}

        public function leave_approval_status($data){
            // echo '<pre>';print_r($data);return;
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  'leave_type_id'=>$data['leave_type_id'],
                                  'leave_from_date'=>$data['leave_from_date'],
                                  'leave_to_date'=>$data['leave_to_date'],
                                  'leave_days'=>$data['approval_leave_days'],
								  'old_leave_type_id'=>$data['req_leave_type_id'],
								  'old_leave_from_date'=>$data['req_leave_from_date'],
                                  'old_leave_to_date'=>$data['req_leave_to_date'],
                                  'old_leave_days'=>$data['req_leave_days'],
                                  'paid_leave'=>$data['paid_leave'],
                                  'approve_reject_reason'=>$data['remarks'],
                                  '_status'=>2
                                ]);


                                /*
                                        update table set leave_type_id=
                                */
            if($result)
            {
                $result_noti_update =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
                if($result_noti_update)
                {
					//send notification to reporting head
                     $result_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Forwarded to HR for leave approval",
                             "employee_id"=>$data['rep_employee_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_noti_insert)
                            ->update([
                                "link"=>"NotificationController/leave_approved_by_head/$leave_id/$result_noti_insert/"
                            ]);
                    }
					//send notification to hr on approval
					 $result_hr_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Leave Approved by Reporting Head",
                             "employee_id"=>$data['hr_employee_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_hr_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_hr_noti_insert)
                            ->update([
                                "link"=>"NotificationController/leave_approval_by_hr/$leave_id/$result_hr_noti_insert/"
                            ]);
                    }
                }
                /**********/
                if($data['rep_designation_mstr_id']=="15")
                {
					//send notification to team leader
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['noti_title'],
                            "about"=>"Leave Approved Notification",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/leave_notification_tc_tl/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            }
            return json_decode(json_encode($result), true);
		}
		
		public function leave_type_hr_approval_status($data){
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  'leave_type_id'=>$data['leave_type_id'],
                                  'reporting_head_leave_type_id'=>$data['req_leave_type_id'],
                                  'paid_leave'=>$data['paid_leave'],
                                  'hr_remarks'=>$data['remarks'],
                                  '_status'=>7
                                ]);
            if($result)
            {
                $result_noti_update =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
                if($result_noti_update)
                {
					//send notification to reporting head
                     $result_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Leave Approved by HR",
                             "employee_id"=>$data['rep_hd_emp_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_noti_insert)
                            ->update([
                                "link"=>"NotificationController/hr_leave_approval_stts/$leave_id/$result_noti_insert/"
                            ]);
                    }
					//send notification to employee who requested for leave
					 $result_hr_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Leave Approved by HR",
                             "employee_id"=>$data['leave_requested_emp_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_hr_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_hr_noti_insert)
                            ->update([
                                "link"=>"NotificationController/hr_leave_approval_stts/$leave_id/$result_hr_noti_insert/"
                            ]);
                    }
                }
                /**********/
                if($data['rep_designation_mstr_id']=="15")
                {
					//send notification to team leader
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['noti_title'],
                            "about"=>"Leave Approved by HR",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/hr_leave_approval_stts/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            }
            return json_decode(json_encode($result), true);
		}
		
		public function hr_approval_without_leavetype_status($data){
                $result_noti_update =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
                if($result_noti_update)
                {
					//send notification to reporting head
                     $result_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Leave Category Changed",
                             "employee_id"=>$data['rep_hd_emp_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_noti_insert)
                            ->update([
                                "link"=>"NotificationController/hr_leave_approval_stts/$leave_id/$result_noti_insert/"
                            ]);
                    }
					//send notification to employee who requested for leave
					 $result_hr_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Leave Category Changed",
                             "employee_id"=>$data['leave_requested_emp_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_hr_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_hr_noti_insert)
                            ->update([
                                "link"=>"NotificationController/hr_leave_approval_stts/$leave_id/$result_hr_noti_insert/"
                            ]);
                    }
                }
                /**********/
                if($data['rep_designation_mstr_id']=="15")
                {
					//send notification to team leader
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['noti_title'],
                            "about"=>"Leave Category Changed",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/hr_leave_approval_stts/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            
            return json_decode(json_encode($result_noti_update), true);
		}

        public function leave_rejection_status($data){
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  'approve_reject_reason'=>$data['remarks'],
                                  '_status'=>0
                                ]);
            if($result)
            {
                $result_noti_update =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
                if($result_noti_update)
                {
                     $result_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['noti_title'],
                             "about"=>"Leave Rejected",
                             "employee_id"=>$data['rep_employee_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_noti_insert)
                            ->update([
                                "link"=>"NotificationController/leave_rejected_by_head/$leave_id/$result_noti_insert/"
                            ]);
                    }
                }
                /**********/
                if($data['rep_designation_mstr_id']=="15")
                {
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['noti_title'],
                            "about"=>"Leave Rejected Notification",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/leave_notification_tc_tl/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            }
            return json_decode(json_encode($result), true);
		}

        public function all_leave_list($data) //gate data for grade dropdown button
        {
            try
            {
                $sql = "select e.first_name, e.middle_name, e.last_name, l.leave_from_date, l.leave_to_date, l.leave_days, l.leave_reason, l._status, l.old_leave_from_date, l.old_leave_to_date, l.old_leave_days,l.approve_reject_reason,l.hr_remarks, m.leave_type
                        from tbl_employee_leave_detail l join tbl_emp_details e on(l.employee_id=e._id) join tbl_leave_type_mstr m on(l.leave_type_id=m._id) where date(l.leave_request_datetime) between :from_date and :to_date";
                $this->db->query($sql);
				$this->db->bind('from_date', $data['from_date']);
				$this->db->bind('to_date', $data['to_date']);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        //////////////////////////////
        public function leave_list_individual($data) //gate data for grade dropdown button
        {   
            try
            {
                $sql = "select e.first_name, e.middle_name, e.last_name, l.leave_from_date, l.leave_to_date, l.leave_days, l.leave_reason, l._status, l.old_leave_from_date, l.old_leave_to_date, l.old_leave_days,l.approve_reject_reason,l.hr_remarks, m.leave_type
                        from tbl_employee_leave_detail l join tbl_emp_details e on(l.employee_id=e._id) join tbl_leave_type_mstr m on(l.leave_type_id=m._id) where date(l.leave_request_datetime) between :from_date and :to_date and l.employee_id=:employee_id";
                $this->db->query($sql);
				$this->db->bind('from_date', $data['from_date']);
				$this->db->bind('to_date', $data['to_date']);
                $this->db->bind('employee_id', $data['emp_id']);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        ////////////////////////////////

        public function emp_leave_list($data) //gate data for grade dropdown button
        {
			
            try
            {
                $sql = "select l._id, l.leave_from_date, l.leave_to_date, l.leave_days, l.leave_reason, l._status, l.old_leave_from_date, l.old_leave_to_date, l.old_leave_days,l.approve_reject_reason,l.hr_remarks, m.leave_type from tbl_employee_leave_detail l join tbl_leave_type_mstr m on(l.leave_type_id=m._id) where employee_id='".$_SESSION['emp_details']['_id']."' and date(leave_request_datetime) between :from_date and :to_date";
                $this->db->query($sql);
				$this->db->bind('from_date', $data['from_date']);
				$this->db->bind('to_date', $data['to_date']);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

        public function leavetype_male_married() //gate data for leave type dropdown button
        {
            try
            {
                $sql ="select * from tbl_leave_type_mstr where _status=1 and _id!='3'";
                $this->db->query($sql);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function leavetype_female_married() //gate data for leave type dropdown button
        {
            try
            {
                $sql ="select * from tbl_leave_type_mstr where _status=1 and _id!='5'";
                $this->db->query($sql);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
		public function leavetype_male_single() //gate data for leave type dropdown button
        {
            try
            {
                $sql ="select * from tbl_leave_type_mstr where _status=1 and _id not in('3', '5')";
                $this->db->query($sql);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function leavetype_female_single() //gate data for leave type dropdown button
        {
            try
            {
                $sql ="select * from tbl_leave_type_mstr where _status=1 and _id not in('3', '5')";
                $this->db->query($sql); 
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function leaverequest_fi_yr($data){
        //   print_r($data);return;
            //leaverequest_curr_fi_yr
          $result = $this->db->table('tbl_employee_leave_detail')->
              insertGetId([

                  "employee_id"=>$data["emp_id"],
                  "leave_from_date"=>$data["leave_from_date"],
                  "leave_to_date"=>$data["from_last_date"],
                  "leave_days"=>$data["leave_days_current_financial_year"],
                  "leave_type_id"=>$data["leave_type_id"],
                  "leave_reason"=>$data["leave_reason"],
                  "financial_year"=>$data["financial_year"],
                  "leave_request_datetime"=>$data["leave_request_datetime"],
                  "reporting_head_emp_id"=>$data["reporting_employee_id"],
                  "reporting_tl_emp_id"=>$data["tl_employee_id"],
                  "_status"=>"0"
              ]);
             if($result) //If leave data inserted into the table
             //leaverequest_next_fi_yr
             { 
                 //Insert notification details
                $resultt = $this->db->table('tbl_notification_detail')->
              insertGetId([
                  "title"=> $data['emp_name'],
                  "about"=>"Waiting For Leave Approval",
                  "employee_id"=>$data['reporting_employee_id'],
                  "created_by"=>$data["emp_id"],
                  "created_on"=>$data["leave_request_datetime"],
                  "notification_type"=>"Leave",
                  "notification_reference_id"=>$result,
                  "_status"=>"1"
              ]);
                  if($resultt) //notification table insert data into link column
                  {
                      $this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $resultt)
                          ->update([
                              "link"=>"NotificationController/leave_approve_reject_by_head/$result/$resultt/"
                          ]);
                  }
                   
                  //inserting data for the next financial year
                $resulttt = $this->db->table('tbl_employee_leave_detail')->
              insertGetId([

                  "employee_id"=>$data["emp_id"],
                  "leave_from_date"=>$data["to_first_date"],
                  "leave_to_date"=>$data["leave_to_date"],
                  "leave_days"=>$data["leave_days_next_financial_year"],
                  "leave_type_id"=>$data["leave_type_id"],
                  "leave_reason"=>$data["leave_reason"],
                  "financial_year"=>$data["next_financial_year"],
                  "leave_request_datetime"=>$data["leave_request_datetime"],
                  "reporting_head_emp_id"=>$data["reporting_employee_id"],
                  "reporting_tl_emp_id"=>$data["tl_employee_id"],
                  "_status"=>"0"
              ]);
                 if($resulttt) //leaverequest_next_fi_yr
                 {
                     //Inserting notification Detail for the next financial year
                     $resulttf = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['emp_name'],
                             "about"=>"Waiting For Leave Approval",
                             "employee_id"=>$data['reporting_employee_id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$resulttt,
                             "_status"=>"1"
                         ]);
                     if($resulttf) //notification table update link column 
                     {
                         $this->db->table('tbl_notification_detail')
                             ->where("_id", "=", $resulttf)
                             ->update([
                                 "link"=>"NotificationController/leave_approve_reject_by_head/$resulttt/$resulttf/"
                             ]);
                     }
                 }
             }
          return json_decode(json_encode($result), true);
      }

      

        public function leaverequest_differ_yr($data){
          //print_r($data);
          $result = $this->db->table('tbl_employee_leave_detail')->
              insertGetId([
                  "employee_id"=>$data["emp_id"],
                  "leave_from_date"=>$data["leave_from_date"],
                  "leave_to_date"=>$data["leave_to_date"],
                  "leave_days"=>$data["leave_days"],
                  "leave_type_id"=>$data["leave_type_id"],
                  "paid_leave"=>$data["paid_leave"],
                  "leave_reason"=>$data["leave_reason"],
                  "financial_year"=>$data["financial_year"],
                  "leave_request_datetime"=>$data["leave_request_datetime"],
                  "reporting_head_emp_id"=>$data["reporting_employee_id"],
                  "reporting_tl_emp_id"=>$data["tl_employee_id"],
                  "_status"=>"1"
              ]);
            if($result) //notification table
             {
                $resultt = $this->db->table('tbl_notification_detail')->
              insertGetId([
                  "title"=> $data['emp_name'],
                  "about"=>"Waiting For Leave Approval",
                  "employee_id"=>$data['reporting_employee_id'],
                  "created_by"=>$data["emp_id"],
                  "notification_type"=>"Leave",
                  "notification_reference_id"=>$result,
                  "created_on"=>$data["leave_request_datetime"],
                  "_status"=>"1"
              ]);
                if($resultt) //notification table
                {
                    $this->db->table('tbl_notification_detail')
                        ->where("_id", "=", $resultt)
                        ->update([
                            "link"=>"NotificationController/leave_approve_reject_by_head/$result/$resultt/"
                        ]);
                }
                /**********/
                if($data['emp_designation']=="15")
                {
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['emp_name'],
                            "about"=>"Leave Notification",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$result,
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/leave_notification_tc_tl/$result/$resulttc/"
                            ]);
                    }
                }
                /*********/
             }
          return json_decode(json_encode($result), true);
      }

        public function Leaverequest_exists($data)
        {   
            try
            {
                //$sql = "select employee_id from tbl_employee_leave_detail
                        //where leave_from_date =:leave_from_date AND _status=0";
                $sql = "SELECT * FROM tbl_employee_leave_detail
                        where ((leave_from_date<=:leave_from_date and leave_to_date>=:leave_from_date)
                        or (leave_from_date<=:leave_to_date and leave_to_date>=:leave_to_date)) and employee_id=:employee_id
                        and _status in ('1','2','7','4','6')";
                        // print_r($sql);return;emp_id
                $this->db->query($sql);
                $this->db->bind('leave_from_date',$data['leave_from_date']);
                $this->db->bind('leave_to_date',$data['leave_to_date']);
                $this->db->bind('employee_id',$data['emp_id']);
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }

         public function getLeaveDaysByLeaveTypeId($data){
       $sql = "SELECT leave_days FROM tbl_leave_type_mstr
                where _status='1'
                and _id=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data);
		 		$result = $this->db->single();
                return $result;
        }

        public function getavailableleaveListByLeaveTypeId($EMP_ID, $ID, $FY){
            //print_r( $data['leave']['_id']);
       		 $sql = "select COALESCE(sum(COALESCE (leave_days,0)),0) as leave_days from  tbl_employee_leave_detail
                    where employee_id='$EMP_ID'
                    and leave_type_id='$ID'
                    and financial_year='$FY' and _status in ('7','6')";
				$this->db->query($sql); 
		 		$result = $this->db->single();
				return $result;
		}

        public function leave_cancel($data){
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  "cancel_remarks"=>$data['remarks'],
                                  '_status'=>3
                                ]);
            if($result)
            {
                $resultt =$this->db->table('tbl_notification_detail')
                          ->where("notification_type", "=", "Leave")
                          ->where("notification_reference_id", "=", $data['id'])
                          ->where("_status", "=", 1)
                          ->update([
                                  '_status'=>0
                                ]);
            }

             return json_decode(json_encode($result), true);
		}

        public function leave_cancel_request($data){
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  "cancel_remarks"=>$data['remarks'],
                                  '_status'=>4
                                ]);
            if($result)
            {
                $resultt =$this->db->table('tbl_notification_detail')
                          ->where("notification_type", "=", "Leave")
                          ->where("notification_reference_id", "=", $data['id'])
                          ->where("_status", "=", 1)  
                          ->update([
                                  '_status'=>0
                                ]);
                $resultt_not = $this->db->table('tbl_notification_detail')->
              insertGetId([
                  "title"=> $data['emp_name'],
                  "about"=>"Waiting For Cancel Leave Approval",
                  "employee_id"=>$data['reporting_employee_id'],
                  "created_by"=>$data["emp_id"],
                  "notification_type"=>"Leave",
                  "notification_reference_id"=>$data['id'],
                  "created_on"=>$data["leave_request_datetime"],
                  "_status"=>"1"
              ]);
                if($resultt_not) //notification table
                {
                    $leave_id=$data['id'];
                    $this->db->table('tbl_notification_detail')
                        ->where("_id", "=", $resultt_not)
                        ->update([
                            "link"=>"NotificationController/leave_cancel_approve_reject_by_head/$leave_id/$resultt_not/"
                        ]);
                }
                /**********/
                if($data['emp_designation']=="15")
                {
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['emp_name'],
                            "about"=>"Cancel Leave Approval Notification",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/leave_notification_tc_tl/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            }

             return json_decode(json_encode($result), true);
		}

        public function leave_cancel_approval_status($data){
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  'approve_reject_cancel_remarks'=>$data['remarks'],
                                  '_status'=>5
                                ]);
            if($result)
            {
                $result_noti_update =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
                if($result_noti_update)
                {
                     $result_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['emp_name'],
                             "about"=>"Leave Cancel Approved",
                             "employee_id"=>$data['rep_employee_id'],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_by"=>$data["emp_id"],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_noti_insert)
                            ->update([
                                "link"=>"NotificationController/cancel_leave_approved_by_head/$leave_id/$result_noti_insert/"
                            ]);
                    }
                }
                /**********/
                if($data['rep_designation_mstr_id']=="15")
                {
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['emp_name'],
                            "about"=>"Cancel Leave Approval Notification",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/leave_notification_tc_tl/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            }
            return json_decode(json_encode($result), true);
		}

        public function leave_cancel_rejection_status($data){
            $result =$this->db->table('tbl_employee_leave_detail')
                          ->where("_id", "=", $data['id'])
                          ->update([
                                  'approve_reject_cancel_remarks'=>$data['remarks'],
                                  '_status'=>6
                                ]);
            if($result)
            {
                $result_noti_update =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
                if($result_noti_update)
                {
                     $result_noti_insert = $this->db->table('tbl_notification_detail')->
                         insertGetId([
                             "title"=> $data['emp_name'],
                             "about"=>"Leave Cancel Rejected",
                             "employee_id"=>$data['rep_employee_id'],
                             "created_by"=>$data["emp_id"],
                             "notification_type"=>"Leave",
                             "notification_reference_id"=>$data['id'],
                             "created_on"=>$data["leave_request_datetime"],
                             "_status"=>"1"
                         ]);
                    if($result_noti_insert) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $result_noti_insert)
                            ->update([
                                "link"=>"NotificationController/cancel_leave_rejected_by_head/$leave_id/$result_noti_insert/"
                            ]);
                    }
                }
                /**********/
                if($data['rep_designation_mstr_id']=="15")
                {
                    $resulttc = $this->db->table('tbl_notification_detail')->
                        insertGetId([
                            "title"=> $data['emp_name'],
                            "about"=>"Cancel Leave Rejected Notification",
                            "employee_id"=>$data['tl_employee_id'],
                            "created_by"=>$data["emp_id"],
                            "notification_type"=>"Leave",
                            "notification_reference_id"=>$data['id'],
                            "created_on"=>$data["leave_request_datetime"],
                            "_status"=>"1"
                        ]);
                    if($resulttc) //notification table
                    {
                        $leave_id=$data['id'];
                        $this->db->table('tbl_notification_detail')
                            ->where("_id", "=", $resulttc)
                            ->update([
                                "link"=>"NotificationController/leave_notification_tc_tl/$leave_id/$resulttc/"
                            ]);
                    }
                }
                /*********/
            }
            return json_decode(json_encode($result), true);
		}

        public function cancel_leave_approval_view($data){
       		$result =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}

        public function cancel_leave_rejection_view($data){
       		$result =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}
        public function tl_leave_notification_view($data){
       		$result =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}
		public function hr_leave_notification_view($data){
       		$result =$this->db->table('tbl_notification_detail')
                          ->where("_id", "=", $data['noti_id'])
                          ->update([
                                  '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}
        public function emp_leave_taken_fi_yr($EMP_ID, $FY){
            //print_r( $data['leave']['_id']);
       		 $sql = "select l.leave_from_date, l.leave_to_date, l.leave_reason, l._status, m.leave_type from tbl_employee_leave_detail l join tbl_leave_type_mstr m on(l.leave_type_id=m._id)
                    where employee_id='$EMP_ID'
                    and financial_year='$FY'";
				$this->db->query($sql);
            	$result = $this->db->resultset();
				return $result;
		}
		public function emp_paid_leave_fi_yr($EMP_ID, $FY){
            $sql = "select COALESCE(sum(COALESCE (paid_leave,0)),0) as total_paid_leave from  tbl_employee_leave_detail
                    where employee_id='$EMP_ID'
                    and financial_year='$FY' and _status='7'";
				$this->db->query($sql); 
            	$result = $this->db->single();
				return $result;
		}
		/*public function checkleavereq($data){
		//print_r($data);	
       $tr_details = $this->db->table('tbl_employee_leave_detail')
                                    ->select('_id')
                                    ->where('employee_id', '=', $data['emp_id'])
									->where('leave_from_date', '=', $data['leave_from_date'])
									->where('leave_to_date', '=', $data['leave_to_date'])
                                    ->where('_status', '=', 1)
                                    ->first();
        if($tr_details){
           return true;
        }else{
          return false;
        }
      }*/
    }

?>