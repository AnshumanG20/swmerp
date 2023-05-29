<?php
  class model_resignation{
    private $db;
    private $tbl_name = "tbl_job_post_detail";

    public function __construct(){
      $this->db = new Database;
    }
      
    public function notification_disable($data){
        // echo '<pre>';print_r($data);return;
		 return $result = $this->db->table('tbl_notification_detail')->
                    where("link", "=", $data['url'])->
                    where("employee_id", "=", $data['hremp_id'])->
					update([
                        "_status"=>"0"
                    ]);
                    
                    // $this->db->get();

                    /*
                       
                    */
                    
      }
      
    public function emp_resignation($data){
      $result = $this->db->table('tbl_employee_quit_details')->
                  insertGetId([
                    "employee_id"=>$data["employee_id"],
                    "notice_period"=>$data["resign_date"],
                    "terminate_resign_reason"=>$data["resignation_reason"],
                    "resign_terminate_type"=>"Resign",
                    "request_datetime"=>$data["date"],
					"created_by"=>$data["employee_id"],       
					"old_notice_period"=>$data["resign_date"],
                    "_status"=>"1"
                  ]);
      return json_decode(json_encode($result), true);
    }
      
    public function check_emp_self_resignation($data){
      $sql = "SELECT notice_period,terminate_resign_reason
                FROM tbl_employee_quit_details
                WHERE employee_id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $data['employee_id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);
    }
      
    public function emp_hr_notification($data){
        $sql = "SELECT first_name,middle_name,last_name,
                company_location_id,project_mstr_id,department_mstr_id
                FROM tbl_emp_details
                WHERE _id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $data['employee_id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }

     public function emp_hr_notification_id($data){
        $sql = "SELECT _id
                FROM tbl_emp_details
                WHERE company_location_id =:company_location_id AND project_mstr_id =:project_mstr_id AND designation_mstr_id = 9 AND _status=1";
				$this->db->query($sql);
                $this->db->bind("company_location_id", $data['company_location_id']);
                $this->db->bind("project_mstr_id", $data['project_mstr_id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }

      public function hr_notification_id($data){
          $hr_emp = $data["employee_id"];
          $employee_quit_details_id = $data["employee_quit_details_id"];
      $result = $this->db->table('tbl_notification_detail')->
                  insert([
                    "title"=>$data["emp_name"],
                    "about"=>"Employee Apply For Resignation",
                    "link"=>"resignation_Controller/notification_employee_resignation/$hr_emp/$employee_quit_details_id",
                    "department_mstr_id"=>$data["department_mstr_id"],
                    "created_on"=>$data["date"],
					"created_by"=>$data["employee_id"],
					"employee_id"=>$data["hr_id"],
                    "notification_type"=>"Resign",
                    "_status"=>"1"
                  ]);
        return json_decode(json_encode($result), true);
        }

       public function resign_details($data){
        $sql = "SELECT tbl_employee_quit_details.notice_period,tbl_employee_quit_details.terminate_resign_reason,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details.joining_date,tbl_company_location.landmark,tbl_designation_mstr.designation_name,
                tbl_project_mstr.project_name
                FROM tbl_employee_quit_details
                LEFT JOIN tbl_emp_details ON tbl_employee_quit_details.employee_id = tbl_emp_details._id
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_company_location ON tbl_emp_details.company_location_id = tbl_company_location._id
                LEFT JOIN tbl_project_mstr ON tbl_emp_details.project_mstr_id = tbl_project_mstr._id
                WHERE employee_id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
      
       public function reject_resignation($data){
		      return $result = $this->db->table('tbl_employee_quit_details')->
                    where("employee_id", "=", $data['emply_id'])->
                    where("_id", "=", $data['quit_id'])->
					           update([
                        "created_by"=>$data["hremp_id"],
                        "reject_resign_reason"=>$data["reject_Reason"],
                        "accept_reject_datetime"=>$data["date"],
                        "_status"=>"3"
                    ]);
        }
      
      public function reject_resignation_notification($data){
          $hr_emp = $data["emply_id"];
      $result = $this->db->table('tbl_notification_detail')->
                  insert([
                    "title"=>"HR Manager",
                    "about"=>"Resignation Form Rejected",
                    "link"=>"resignation_Controller/reject_resignation_notification/$hr_emp",
                    "created_on"=>$data["date"],
					"created_by"=>$data["hremp_id"],
					"employee_id"=>$hr_emp,
                    "notification_type"=>"Resign Rejected",
                    "_status"=>"1"
                  ]);
                
        return json_decode(json_encode($result), true);
        
        }

    
      public function reject_notification_details($data){
        $sql = "SELECT reject_resign_reason
                FROM tbl_employee_quit_details
                WHERE employee_id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);
          return $result = $this->db->table('tbl_employee_quit_details')->
                    where("employee_id", "=", $data['emply_id'])->
                    first();
        }

      public function check_resign_details_exist($data){
        $sql = "SELECT _id FROM tbl_employee_quit_details WHERE _id=:_id AND employee_id=:employee_id AND asset_submission_date IS NOT NULL";
        $this->db->query($sql);
        $this->db->bind("_id", $data['quit_id']);
        $this->db->bind("employee_id", $data['id']);
        return $rporting_result = $this->db->single();
      }
       public function accept_resignation($data){
		          return $result = $this->db->table('tbl_employee_quit_details')->
                    where("employee_id", "=", $data['emply_id'])->
                    where("_id", "=", $data['quit_id'])->
					          update([
                        "created_by"=>$data["hremp_id"],
                        "notice_period"=>$data["emp_resign_date"],
                        "asset_submission_date"=>$data["asset_submission_date"],
                        "accept_reject_datetime"=>$data["date"],
                        "_status"=>"2"
                    ]);
        }
      public function accept_resignation_notification($data){

          $hr_emp = $data["emply_id"];
          $result = $this->db->table('tbl_notification_detail')->
                  insert([
                    "title"=>"HR Manager",
                    "about"=>"Resignation Form Accepted",
                    "link"=>"resignation_Controller/accept_resignation_notification/$hr_emp",
                    "created_on"=>$data["date"],
					          "created_by"=>$data["hremp_id"],
					          "employee_id"=>$hr_emp,
                    "notification_type"=>"Resign",
                    "_status"=>"1"
                  ]);
        return json_decode(json_encode($result), true);
        }
      public function accept_resignation_notification_reporting_head($data){

          $sql = "SELECT designation_mstr_id,company_location_id,project_mstr_id
                  FROM tbl_emp_details
                  WHERE _id =:id ";
                    $this->db->query($sql);
                    $this->db->bind("id", $data['emply_id']);
                    $emp_result = $this->db->single();
                    //esg_mstr_id=29, project_mstr_id=7,comp_location=17


          if($emp_result){
              if($emp_result["designation_mstr_id"]==15){
                    $sql = "SELECT reporting_head_emp_mstr_id 
                  FROM tbl_on_reporting_leave_mstr
                  WHERE reporting_person_emp_mstr_id =:id ";
                    $this->db->query($sql);
                    $this->db->bind("id", $data['emply_id']);
                    $rporting_result = $this->db->single();

              }else{
                $sql = "SELECT reporting_head_emp_mstr_id
                  FROM tbl_on_reporting_leave_mstr
                  WHERE reporting_person_emp_mstr_id =:id ";
                    $this->db->query($sql);
                    $this->db->bind("id", $data['emply_id']);
                    $rporting_result = $this->db->single();
                   
               }
              if($rporting_result){
                $sql = "SELECT _id
                  FROM tbl_emp_details
                  WHERE _id =:id";
                    $this->db->query($sql);
                    $this->db->bind("id", $rporting_result["reporting_head_emp_mstr_id"]);
                    // $this->db->bind("location", $emp_result["company_location_id"]);
                    // $this->db->bind("project", $emp_result["project_mstr_id"]);
                   $rporting_id_result = $this->db->single();
                   
                  if($rporting_id_result){
                      $emp_id = $data["emply_id"];
                      $hr_emp = $rporting_id_result["_id"];
                      $result = $this->db->table('tbl_notification_detail')->
                          insert([
                              "title"=>"HR Manager",
                              "about"=>"Resignation Form Accepted Give Employee Performance",
                              "link"=>"resignation_Controller/employee_performance_ByReporting_head/$emp_id",
                              "created_on"=>$data["date"],
                              "created_by"=>$data["hremp_id"],
                              "employee_id"=>$hr_emp,
                              "notification_type"=>"Employee Performance",
                              "_status"=>"1"
                          ]);
                  }
             }
              
              $sql = "SELECT _id
                  FROM tbl_emp_details
                  WHERE designation_mstr_id =:id AND company_location_id =:location";
                    $this->db->query($sql);
                    $this->db->bind("id", 11);
                    $this->db->bind("location", $emp_result["company_location_id"]);
                   $inventroy_id_result = $this->db->single();
                   // echo '<pre>';print_r($inventroy_id_result);return;
                  if($inventroy_id_result){
                      $emp_id = $data["emply_id"];
                      $hr_emp = $inventroy_id_result["_id"];
                      $result = $this->db->table('tbl_notification_detail')->
                          insert([
                              "title"=>"HR Manager",
                              "about"=>"Assets submission",
                              "link"=>"resignation_Controller/employee_asset_submission/$emp_id",
                              "created_on"=>$data["date"],
                              "created_by"=>$data["hremp_id"],
                              "employee_id"=>$hr_emp,
                              "notification_type"=>"Assets submission",
                              "_status"=>"1"
                          ]);
                      return json_decode(json_encode($result), true);
                  } 

          }

        }

        public function check_employee_asset_details($data){
          $employee_quit_details = $this->db->table('tbl_employee_quit_details')
                                    ->select('_id')
                                    ->where('employee_id', '=', $data['id'])
                                    ->where('_status', '=', 2)
                                    ->first();
          if($employee_quit_details){
            $employee_quit_details_id = $employee_quit_details['_id'];
            $employee_quit_details = $this->db->table('tbl_asset_inventory_details')
                                    ->select('_id')
                                    ->where('quit_id', '=', $employee_quit_details_id)
                                    ->where('_status', '=', 1)
                                    ->first();
            if($employee_quit_details){
              return true;
            }else{
              return false;
            }
          }else{
            return false;
          }
        }
       public function employee_asset_details($data){
        $sql = "SELECT tbl_emp_details._id AS emp_id,tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details.employee_code,tbl_emp_details.joining_date,
                tbl_designation_mstr.designation_name,tbl_employee_quit_details._id
                FROM tbl_emp_details
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_employee_quit_details ON tbl_emp_details._id = tbl_employee_quit_details.employee_id
                WHERE tbl_emp_details._id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
       public function employee_asset_list($data){
        $sql = "SELECT tbl_asset_model_list.asset_barcode_no,tbl_item_name_mstr._id AS item_name_id,
                tbl_item_name_mstr.item_name,tbl_sub_item_name_mstr._id AS sub_item_name_id,
                tbl_sub_item_name_mstr.sub_item_name,tbl_asset_inventory_details.penalty_amount,tbl_asset_details.purchase_cost
                FROM tbl_asset_assigned_employee_details
                LEFT JOIN tbl_asset_model_list ON tbl_asset_assigned_employee_details.asset_model_id = tbl_asset_model_list._id
                LEFT JOIN tbl_item_name_mstr ON tbl_asset_assigned_employee_details.item_name_id = tbl_item_name_mstr._id
                LEFT JOIN tbl_sub_item_name_mstr ON tbl_asset_assigned_employee_details.sub_item_name_id = tbl_sub_item_name_mstr._id
                LEFT JOIN tbl_employee_quit_details ON tbl_asset_assigned_employee_details.assigned_employee_id = tbl_employee_quit_details.employee_id
                LEFT JOIN tbl_asset_inventory_details ON tbl_employee_quit_details._id = tbl_asset_inventory_details.quit_id
                LEFT JOIN tbl_asset_details ON tbl_asset_assigned_employee_details.asset_model_no_id = tbl_asset_details.asset_model_no_id
                WHERE tbl_asset_assigned_employee_details.assigned_employee_id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);

        }
        public function check_employee_performance_ByHead($data){
          $employee_quit_details = $this->db->table('tbl_employee_quit_details')
                                    ->select('_id')
                                    ->where('employee_id', '=', $data['id'])
                                    ->where('_status', '=', 2)
                                    ->first();
          if($employee_quit_details){
            $employee_quit_details_id = $employee_quit_details['_id'];
            $employee_quit_details = $this->db->table('tbl_work_performance_details')
                                    ->select('_id')
                                    ->where('quit_id', '=', $employee_quit_details_id)
                                    ->where('_status', '=', 1)
                                    ->first();
            if($employee_quit_details){
              return true;
            }else{
              return false;
            }
          }else{
            return false;
          }
        }
       public function employee_performance_ByHead($data){
        $sql = "SELECT tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details.employee_code,tbl_emp_details.joining_date,
                tbl_designation_mstr.designation_name,tbl_employee_quit_details._id,tbl_employee_quit_details.notice_period
                FROM tbl_emp_details
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_employee_quit_details ON tbl_emp_details._id = tbl_employee_quit_details.employee_id
                WHERE tbl_emp_details._id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
      public function emp_resignation_work_performance($data){
          $result = $this->db->table('tbl_work_performance_details')->
              insert([
                  "quit_id"=>$data["quit_id"],
                  "remarks"=>$data["work_Performance"],
                  "created_on"=>$data["date"],
                  "created_by"=>$data["rpHeademp_id"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      } 
      public function emp_resignation_inventory_notification($data){
          $result = $this->db->table('tbl_asset_inventory_details')->
              insert([
                  "quit_id"=>$data["quit_id"],
                  "item_name_id"=>$data["assets_name"],
                  "sub_item_name_id"=>$data["assets_sub_name"],
                  "serial_no_id"=>$data["assets_serial_no"],
                  "condition_status"=>$data["condition"],
                  "penalty_amount"=>($data["penalty"]=='')?null:$data["penalty"],
                  "created_on"=>$data["date"],
                  "created_by"=>$data["rpInventoryemp_id"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      } 
      public function emp_inventory_notification_detail($data){

          $sql = "SELECT company_location_id,project_mstr_id
                FROM tbl_emp_details
                WHERE _id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['emp_id']);
		 		$resultemp = $this->db->single();

          if($resultemp){
              $sql = "SELECT _id
                FROM tbl_emp_details
                WHERE designation_mstr_id =:id AND company_location_id =:company_location_id AND project_mstr_id =:project_mstr_id AND _status=1";
				$this->db->query($sql);
                $this->db->bind("id", 9);
                $this->db->bind("company_location_id", $resultemp['company_location_id']);
                $this->db->bind("project_mstr_id", $resultemp['project_mstr_id']);
		 		$resultemphr = $this->db->single();
        // echo '<pre>';print_r($resultemphr);return;
              if($resultemphr){
                  $emp_id = $data["emp_id"];
                  $hr_emp = $resultemphr["_id"];
                  $result = $this->db->table('tbl_notification_detail')->
                      insert([
                          "title"=>"Inventory Department",
                          "about"=>"Employee Assets submission Done",
                          "link"=>"resignation_Controller/inventoryAssetSubmissionDone/$emp_id",
                          "created_on"=>$data["date"],
                          "created_by"=>$data["rpInventoryemp_id"],
                          "employee_id"=>$hr_emp,
                          "notification_type"=>"Assets submission Done",
                          "_status"=>"1"
                      ]);
                  return json_decode(json_encode($result), true);
              }

          }
      } 

       public function accept_notification_details($data){
        $sql = "SELECT notice_period,asset_submission_date
                FROM tbl_employee_quit_details
                WHERE employee_id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
      
      public function checkInventoryAssetSubmissionDone($data){
       $employee_quit_details = $this->db->table('tbl_employee_quit_details')
                                    ->select('final_settlment_date')
                                    ->where('employee_id', '=', $data['id'])
                                    ->where('_status', '=', 2)
                                    ->first();
        if($employee_quit_details){
          if($employee_quit_details['final_settlment_date']==""){
            return false;
          }else{
            return true;
          }
        }else{
          return false;
        }
      }
      public function inventoryAssetSubmissionDone($data){
        $sql = "SELECT tbl_emp_details._id AS emp_id,tbl_emp_details.email_id,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details.employee_code,tbl_asset_inventory_details.penalty_amount,
                tbl_designation_mstr.designation_name,tbl_employee_quit_details._id,tbl_employee_quit_details.notice_period
                FROM tbl_emp_details
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_employee_quit_details ON tbl_emp_details._id = tbl_employee_quit_details.employee_id
                LEFT JOIN tbl_asset_inventory_details ON tbl_employee_quit_details._id = tbl_asset_inventory_details.quit_id
                WHERE tbl_emp_details._id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }

      public function finalSettlmentdate($data){

          $sql = "SELECT user_mstr_id
                FROM tbl_emp_details
                WHERE _id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['emply_id_acc']);
		 		$resultuser_mstr_id = $this->db->single();

          if($resultuser_mstr_id){
              $userDeactivate = $this->db->table('tbl_user_mstr')->
                  where("_id", "=", $resultuser_mstr_id['user_mstr_id'])->
                  update([
                      "_status"=>'0'
                  ]);
          }

          $resultemps = $this->db->table('tbl_employee_quit_details')->
                    where("employee_id", "=", $data['emply_id_acc'])->
					update([
                        "final_settlment_date"=>$data['settlment_date']
                     ]);
          

          $sql = "SELECT company_location_id
                FROM tbl_emp_details
                WHERE _id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['emply_id_acc']);
		 		$resultemp = $this->db->single();

          if($resultemp){
              $sql = "SELECT _id
                FROM tbl_emp_details
                WHERE designation_mstr_id =:id AND company_location_id =:company_location_id";
				$this->db->query($sql);
                $this->db->bind("id", 8);
                $this->db->bind("company_location_id", $resultemp['company_location_id']);
		 		$resultempacc = $this->db->single();

          if($resultempacc){
                  $emp_id = $data["emply_id_acc"];
                  $hr_emp = $resultempacc["_id"];
                  $result = $this->db->table('tbl_notification_detail')->
                      insert([
                          "title"=>"HR Manager",
                          "about"=>"Employee Full And Final Account Settlment",
                          "link"=>"resignation_Controller/payment_notification/$emp_id",
                          "created_on"=>$data["date"],
                          "created_by"=>$data["rpHremp_id"],
                          "employee_id"=>$hr_emp,
                          "notification_type"=>"Full And Final Settlment",
                          "_status"=>"1"
                      ]);

                  return json_decode(json_encode($result), true);
              }

          }
     }


     public function gate_payment_emp_details($data){
            $sql = "SELECT tbl_emp_details._id AS emp_id,tbl_emp_details.email_id,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details.employee_code,tbl_department_mstr.dept_name,tbl_emp_details.monthly_salary,
                tbl_designation_mstr.designation_name,tbl_employment_type_mstr.employment_type,
                tbl_asset_inventory_details.penalty_amount,
                tbl_employee_quit_details.final_settlment_date,tbl_employee_quit_details.notice_period
                FROM tbl_emp_details
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_employee_quit_details ON tbl_emp_details._id = tbl_employee_quit_details.employee_id
                LEFT JOIN tbl_department_mstr ON tbl_emp_details.department_mstr_id = tbl_department_mstr._id
                LEFT JOIN tbl_asset_inventory_details ON tbl_employee_quit_details._id = tbl_asset_inventory_details.quit_id
                LEFT JOIN tbl_employment_type_mstr ON tbl_emp_details.employment_type_mstr_id = tbl_employment_type_mstr._id
                WHERE tbl_emp_details._id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);
     }
      public function gate_payment_mode($data){
            $sql = "SELECT  _id,payment_mode 
                FROM tbl_payment_mode_mstr
                WHERE _status='1'";
				$this->db->query($sql);
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);
     }
      public function calculate_total_amount($data)
                  {
          try
          {
              $sql = "select _id from tbl_employee_quit_details where employee_id =:employee_id";
              $this->db->query($sql);
              $this->db->bind('employee_id',$data['id']);
              $result = $this->db->single();
              if($result)
              {
                  $gate_amount = "select COALESCE(SUM(penalty_amount), 0) AS penalty_amount from tbl_asset_inventory_details where quit_id =:id ";
                  $this->db->query($gate_amount);
                  $this->db->bind('id',$result['_id']);
                  $total_amount = $this->db->single();
                  if($total_amount)
                  {
                      return $total_amount;
                  }
                  else
                  {
                      return false;
                  }
              }
              else
              {
                  return false;
              }
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
                  }
      public function calculate_amount($data){
          $sql = "SELECT tbl_asset_inventory_details.serial_no_id,tbl_item_name_mstr._id AS item_name_id,
                tbl_item_name_mstr.item_name,tbl_sub_item_name_mstr._id AS sub_item_name_id,
                tbl_sub_item_name_mstr.sub_item_name,tbl_asset_inventory_details.penalty_amount
                FROM tbl_employee_quit_details
                LEFT JOIN tbl_asset_inventory_details ON tbl_employee_quit_details._id = tbl_asset_inventory_details.quit_id
                LEFT JOIN tbl_item_name_mstr ON tbl_asset_inventory_details.item_name_id = tbl_item_name_mstr._id
                LEFT JOIN tbl_sub_item_name_mstr ON tbl_asset_inventory_details.sub_item_name_id = tbl_sub_item_name_mstr._id
                WHERE tbl_employee_quit_details.employee_id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);

        }
      
      
      
      public function resignation_List(){
        $sql = "SELECT tbl_employee_quit_details.terminate_resign_reason,tbl_employee_quit_details.asset_submission_date,
                tbl_employee_quit_details.notice_period,tbl_employee_quit_details.final_settlment_date,
                tbl_employee_quit_details._status,tbl_employee_quit_details._id AS quit_id,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details._id
                FROM tbl_employee_quit_details
                LEFT JOIN tbl_emp_details ON tbl_employee_quit_details.employee_id =tbl_emp_details._id
                WHERE tbl_employee_quit_details.resign_terminate_type=:id ";
				$this->db->query($sql);
                $this->db->bind("id", "Resign");
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);

        }
      
      public function emp_experience($data){
        $sql = "SELECT tbl_emp_details.joining_date,tbl_employee_quit_details.notice_period,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details._id,tbl_designation_mstr.designation_name
                FROM tbl_emp_details
                LEFT JOIN tbl_employee_quit_details ON tbl_emp_details._id =tbl_employee_quit_details.employee_id
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id =tbl_designation_mstr._id
                WHERE tbl_emp_details._id=:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
    public function signatureEmp($data){
        $sql = "SELECT tbl_emp_details.first_name AS signFirst,tbl_emp_details.middle_name AS signMiddle,
                tbl_emp_details.last_name AS signLast,tbl_designation_mstr.designation_name
                FROM tbl_emp_details
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id =tbl_designation_mstr._id
                WHERE tbl_emp_details._id=:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data["hremp_id"]);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }

    public function resignation_ListUpdate($data){
        return $result = $this->db->table('tbl_employee_quit_details')->
            where("employee_id", "=", $data)->
            update([
                "_status"=>'5'
            ]);
    }
    public function create_ExperienceLetter($data){
        return $result = $this->db->table('tbl_employee_quit_details')->
            where("employee_id", "=", $data["_id"])->
            update([
                "create_experience_letter"=>$data["sub_file_name"]
            ]);
    }

     public function get_experience_letter($data){
        $sql = "SELECT create_experience_letter
                FROM tbl_employee_quit_details
                WHERE employee_id=:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
      

    public function upload_resignation_experience_letter($data){
        try
        {
            $emp_id = $data["emp_id"];
            if(isset($_FILES['experience_letter_doc_path'])){
                $file = $_FILES['experience_letter_doc_path'];
                $path = "upload_experience_letter";
                $newFileName = hashEncrypt($emp_id);
                $extensions = ['pdf'];
                $fileSize = "2097152";
                $file_status = uploader($file, $path, $newFileName, $extensions, $fileSize);
                if($file_status){
                    $file_name = $file['name'];
                    $tmp = explode('.', $file_name);
                    $file_ext = strtolower(end($tmp));
                    $experience_letter_path = $path."/".$newFileName.".".$file_ext;

                    return $result = $this->db->table('tbl_employee_quit_details')->
                        where("employee_id", "=", $emp_id)->
                        update([
                            "upload_experience_letter"=>$experience_letter_path,
                            "_status"=>'7'
                        ]);

                }
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }


    public function get_final_salary($EMP_ID)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (final_prepared_salary,0)),0) as final_salary from tbl_generate_salary_details
                 where employee_id='$EMP_ID' and _status='1'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_months_count($EMP_ID)
    {
        try
        {
           $sql="select count(_id) as month_count from tbl_generate_salary_details
                 where employee_id='$EMP_ID' and _status='1'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

public function get_total_coll_emp($EMP_ID)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_collection from tbl_collection
                 where generate_id in
                 ( select _id from tbl_generate_salary_details where payer_payee_id='$EMP_ID' and _status='1')
                 and _status='1'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_cash_voucher_no()
    {
        try
        {
           $sql="SELECT cash_voucher_no FROM tbl_transaction
                 WHERE _status='1' and payment_mode_id='1' ORDER BY _id DESC";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_emp_bank_details($EMP_ID)
    {
        try
        {
           $sql="select _id, bank_name, branch_name, default_status from tbl_emp_bank_details
                 where emp_details_id='$EMP_ID' and _status='1' order by default_status asc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            if($result)
                return json_decode(json_encode($result), true);
            else
                return false;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function insert_salary_transaction($data){
            //generate salary
          $result = $this->db->table('tbl_transaction')->
              insertGetId([
                  "payer_payee_id"=>$data['employee_id'],
                  "payment_date"=>$data["payment_date"],
                  "generated_amt"=>$data["generated_amt"],
                  "payable_amt"=>$data["payable_amt"],
                  "due_amt"=>$data["due_amt"],
                  "payment_mode_id"=>$data["payment_mode_id"],
                  "other_payment_mode"=>$data["other_payment_mode"],
                  "check_neft_bank_imps_no"=>$data["check_neft_bank_imps_no"],
                  "transaction_date"=>$data["payment_date"],
                  "emp_bank_details_id"=>$data["emp_bank_details_id"],
                  "cash_voucher_no"=>$data["cash_voucher_no"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
      public function getEmpSalGenerate($data)
      {
          try
          {
              $sql ="select _id, final_prepared_salary, month_year
                    from tbl_generate_salary_details
                   where employee_id=:employee_id and _status=:_status order by _id asc";
              $this->db->query($sql);
              $this->db->bind('employee_id', $data['employee_id']);
              $this->db->bind('_status', 1);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
      public function get_total_collection($EMP_ID, $SAL_ID)
    {
        try
        {
           $sql="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_collection from tbl_collection
                 where payer_payee_id='$EMP_ID' and generate_id='$SAL_ID' and _status='1'";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
      public function insrt_pay_trans($EMP_ID, $data,$demand_id,$rest_amt,$month_year,$asset_fine_charge){
            //generate salary
           $result = $this->db->table('tbl_collection')->
              insertGetId([
                  "payer_payee_id"=>$EMP_ID,
                  "transaction_id"=>$data,
                  "generate_id"=>$demand_id,
                  "paid_amt"=>$rest_amt,
                  "month_year"=>$month_year,
                  "asset_fine_charge"=>$asset_fine_charge,
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
      public function generate_sal_stts_updt($demand_id){
       		 $result =$this->db->table('tbl_generate_salary_details')
                          ->where("_id", "=", $demand_id)
                          ->update([
                              '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}
      public function quit_sal_stts_updt($EMP_ID){
       		 $result =$this->db->table('tbl_employee_quit_details')
                          ->where("employee_id", "=", $EMP_ID)
                          ->update([
                              '_status'=>6
                                ]);
             return json_decode(json_encode($result), true);
		}



      public function accountPayment_notification($data){
          $sql = "SELECT company_location_id,project_mstr_id
                FROM tbl_emp_details
                WHERE _id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['_id']);
		 		$resultemp = $this->db->single();

          if($resultemp){
              $sql = "SELECT _id
                FROM tbl_emp_details
                WHERE designation_mstr_id =:id AND company_location_id =:company_location_id
                AND project_mstr_id =:project_mstr_id";
				$this->db->query($sql);
                $this->db->bind("id", 9);
                $this->db->bind("project_mstr_id", $resultemp['project_mstr_id']);
                $this->db->bind("company_location_id", $resultemp['company_location_id']);
		 		$resultempacc = $this->db->single();

          if($resultempacc){
                  $emp_id = $data["_id"];
                  $hr_emp = $resultempacc["_id"];
                  $result = $this->db->table('tbl_notification_detail')->
                      insert([
                          "title"=>"Account Manager",
                          "about"=>"Employee Account Settlment",
                          "link"=>"resignation_Controller/account_notification/$emp_id",
                          "created_on"=>$data["date"],
                          "created_by"=>$data["rpHremp_id"],
                          "employee_id"=>$hr_emp,
                          "notification_type"=>"Account Settlment",
                          "_status"=>"1"
                      ]);
                  return json_decode(json_encode($result), true);
              }

          }
     }
      
       public function get_account_notification($data){
        $sql = "SELECT tbl_transaction.payable_amt,tbl_transaction.due_amt,tbl_transaction.created_on,
                tbl_transaction.cash_voucher_no,tbl_emp_details.first_name,tbl_emp_details.middle_name,
                tbl_emp_details.last_name,tbl_emp_details.email_id,tbl_payment_mode_mstr.payment_mode
                FROM tbl_transaction
                LEFT JOIN tbl_emp_details ON tbl_transaction.payer_payee_id = tbl_emp_details._id
                LEFT JOIN tbl_payment_mode_mstr ON tbl_transaction.payment_mode_id = tbl_payment_mode_mstr._id
                WHERE tbl_transaction.payer_payee_id=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
		 		$result = $this->db->single();
				return json_decode(json_encode($result), true);

        }
      
       public function deactivate_Employee($data){
       		 $result =$this->db->table('tbl_emp_details')
                          ->where("_id", "=", $data["_id"])
                          ->update([
                              '_status'=>0
                                ]);
             return json_decode(json_encode($result), true);
		}
		public function checkSalaryTransaction($data){
		$pay_date= date("Y-m-d");	
       $tr_details = $this->db->table('tbl_transaction')
                                    ->select('_id')
                                    ->where('payer_payee_id', '=', $data['id'])
									->where('payment_date', '=', $pay_date)
                                    ->where('_status', '=', 1)
                                    ->first();
        if($tr_details){
           return true;
        }else{
          return false;
        }
      }





}              