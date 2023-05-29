<?php
class model_termination
{
    private $db;
    private $tbl_name = "tbl_employee_quit_details";
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function gate_employee_name($data)
    {
        try
        {
            $sql ="select
				    emp._id,
                    emp.first_name,
                    emp.middle_name,
                    emp.last_name,
                    emp.designation_mstr_id
				    FROM tbl_emp_details emp
                    left join tbl_project_mstr project on (project._id=emp.project_mstr_id)
                    left join  tbl_company_location location on (location._id=emp.company_location_id)
				    where emp._status=1 AND emp.company_location_id =:company_location_id AND 
                    emp.project_mstr_id =:project_mstr_id AND emp.designation_mstr_id!=:designation_mstr_id";
            $this->db->query($sql);
            $this->db->bind('company_location_id',$data['company_location_id']);
            $this->db->bind('project_mstr_id',$data['project_mstr_id']);
            $this->db->bind('designation_mstr_id',$data['designation_mstr_id']);
            $result = $this->db->resultset();
            // print_r($result);return;
            if($result)
            {
                return $result;
            }
            else
            {
                return false;
            }
        }catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function add_update_termination($data)
    {
        //Insert Data
        $result = $this->db->table($this->tbl_name)->
            insertGetId([
                "employee_id"=>$data["employee_id"],
                "terminate_resign_reason"=>$data['terminate_resign_reason'],
                "asset_submission_date"=>$data['asset_submission_date'],
                "resign_terminate_type"=>"Termination",
                "request_datetime"=>datetime(),
                "created_by"=>$data['id'],
                "old_notice_period"=>datetime(),
                "notice_period"=>$data['notice_period'],
                "_status"=>1
            ]);
        if($result)
        {   /*
                insert into tbl_employee_quit_details (employee_id,terminate_resign_reason,asset_submission_date,resign_terminate_type)

            */
            /*$sql = "select first_name,middle_name,last_name from tbl_emp_details where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['employee_id']);
            $title=$this->db->single();
            //$title = json_decode(json_encode($title), true);
            $fullName = $title['first_name']." ".$title['middle_name']." ".$title['last_name'];*/
            //Notification For Employee
            //Employee Id
            $id = $data["employee_id"];
            $notification_insert = $this->db->table('tbl_notification_detail')->
                insert([
                    "title"=>"Hr Manager",
                    "about"=>"Termination",
                    "link"=>"Termination/employee_notification/$id",
                    "created_by"=>$data['id'],
                    "employee_id"=>$data["employee_id"],
                    "notification_type"=>"Termination Letter",
                    "notification_reference_id"=>$result,
                    "created_on"=>datetime()
                ]);
            return $notification_insert;
        }
        else
        {
            return false;
        }
    }
    public function sent_termination_notification_to_head($data)
    {
        //Insert Data
        $result = $this->db->table($this->tbl_name)->
            insertGetId([
                "employee_id"=>$data["employee_id"],
                "terminate_resign_reason"=>$data['terminate_resign_reason'],
                "asset_submission_date"=>$data['asset_submission_date'],
                "resign_terminate_type"=>"Termination",
                "request_datetime"=>datetime(),
                "created_by"=>$data['id'],
                "old_notice_period"=>datetime(),
                "notice_period"=>$data['notice_period'],
                "_status"=>1
            ]);
        if($result)
        {
            /*$sql = "select first_name,middle_name,last_name from tbl_emp_details where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['employee_id']);
            $title=$this->db->single();
            //$title = json_decode(json_encode($title), true);
            $fullName = $title['first_name']." ".$title['middle_name']." ".$title['last_name'];*/
            //Notification For Reporing Perosn
             //Employee Id
            $id = $data["employee_id"];
            $notification_insert = $this->db->table('tbl_notification_detail')->
                insert([
                    "title"=>"Hr Manager",
                    "about"=>"Termination",
                    "link"=>"Termination/head_notification/$id",
                    "created_by"=>$data['id'],
                    "employee_id"=>$data['head_id'],
                    "notification_type"=>"Termination Letter",
                    "notification_reference_id"=>$result,
                    "created_on"=>datetime()
                ]); 
            return $notification_insert;
        }
        else
        {
            return false;
        }
    }
    public function sent_termination_notification_to_inventory($data)
    {
        //Insert Data
        $result = $this->db->table($this->tbl_name)->
            insertGetId([
                "employee_id"=>$data["employee_id"],
                "terminate_resign_reason"=>$data['terminate_resign_reason'],
                "asset_submission_date"=>$data['asset_submission_date'],
                "resign_terminate_type"=>"Termination",
                "request_datetime"=>datetime(),
                "created_by"=>$data['id'],
                "old_notice_period"=>datetime(),
                "notice_period"=>$data['notice_period'],
                "_status"=>1
            ]);
        if($result)
        {
          /*  $sql = "select first_name,middle_name,last_name from tbl_emp_details where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['employee_id']);
            $title=$this->db->single();
            //$title = json_decode(json_encode($title), true);
            $fullName = $title['first_name']." ".$title['middle_name']." ".$title['last_name'];*/
            //Notification For Reporing Perosn
            //Employee Id
            $id = $data["employee_id"];
            $notification_insert = $this->db->table('tbl_notification_detail')->
                insert([
                    "title"=>"Hr Manager",
                    "about"=>"Termination",
                    "link"=>"Termination/employee_asset_details/$id",
                    "created_by"=>$data['id'],
                    "employee_id"=>$data['inventory_id'],
                    "notification_type"=>"Termination Letter",
                    "notification_reference_id"=>$result,
                    "created_on"=>datetime()
                ]); 
            return $notification_insert;
        }
        else
        {
            return false;
        }
    }
    public function gate_designation_mstr_id_original($data)
    {
        //Gate Reporting Person
        try
        {
            $sql = "select designation_mstr_id, company_location_id, project_mstr_id from tbl_emp_details where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['employee_id']);
            $designation_mstr_id = $this->db->single();

            
            /*$project_mstr_id = $designation_mstr_id['project_mstr_id'];
            $company_location_id = $designation_mstr_id['company_location_id'];
            $designation_mstr_id = $designation_mstr_id['designation_mstr_id'];*/
            if($designation_mstr_id)
            {
                if($designation_mstr_id['designation_mstr_id']==15){
                    $repoting = "select reporting_leave_designation_mstr_id AS reporting_head_designation_mstr_id from  tbl_on_reporting_leave_mstr where reporting_person_designation_mstr_id =:id";
                    $this->db->query($repoting);
                    $this->db->bind('id',$designation_mstr_id['designation_mstr_id']);
                    $result = $this->db->single();
                }else{
                    $repoting = "select reporting_head_designation_mstr_id from  tbl_on_reporting_leave_mstr where reporting_person_designation_mstr_id =:id";
                    $this->db->query($repoting);
                    $this->db->bind('id',$designation_mstr_id['designation_mstr_id']);
                    $result = $this->db->single();
                }
                
                if($result)
                {
                   $return = [];
                    $head = $this->db->table('tbl_emp_details')
                        ->select('_id')
                        ->where('designation_mstr_id', '=', $result['reporting_head_designation_mstr_id'])
                        ->where('company_location_id', '=', $designation_mstr_id['company_location_id'])
                        ->where('project_mstr_id', '=', $designation_mstr_id['project_mstr_id'])
                        ->where('_status', '=', 1)
                        ->first();
                    if($head){
                        $return['head_id'] = $head['_id'];
                    }
                    $inventory = $this->db->table('tbl_emp_details')
                        ->select('_id')
                        ->where('designation_mstr_id', '=', 11)
                        ->where('company_location_id', '=', $designation_mstr_id['company_location_id'])
                        ->where('project_mstr_id', '=', $designation_mstr_id['project_mstr_id'])
                        ->where('_status', '=', 1)
                        ->first();
                    if($inventory){
                        $return['inventory_id'] = $inventory['_id'];
                    }
                    return $return;
                }
                else
                {
                    return false;
                }
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
// function created to test the new implementation

    public function gate_designation_mstr_id($data)
    {   
        // echo '<pre>';print_r($data);return;
        //Gate Reporting Person
        try
        {
            $sql = "select designation_mstr_id, company_location_id, project_mstr_id from tbl_emp_details where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['employee_id']);
            $designation_mstr_id = $this->db->single();

            
            /*$project_mstr_id = $designation_mstr_id['project_mstr_id'];
            $company_location_id = $designation_mstr_id['company_location_id'];
            $designation_mstr_id = $designation_mstr_id['designation_mstr_id'];*/
            // if($designation_mstr_id)
            // {
            //     if($designation_mstr_id['designation_mstr_id']==15){
            //         $repoting = "select reporting_leave_designation_mstr_id AS reporting_head_designation_mstr_id from  tbl_on_reporting_leave_mstr where reporting_person_designation_mstr_id =:id";
            //         $this->db->query($repoting);
            //         $this->db->bind('id',$designation_mstr_id['designation_mstr_id']);
            //         $result = $this->db->single();
            //     }else{
                //     $repoting = "select reporting_head_designation_mstr_id from  tbl_on_reporting_leave_mstr where reporting_person_designation_mstr_id =:id";
                //     $this->db->query($repoting);
                //     $this->db->bind('id',$designation_mstr_id['designation_mstr_id']);
                //     $result = $this->db->single();
                // }
                
                // if($result)
                // {
                $return = [];
                    $head = $this->db->table('tbl_on_reporting_leave_mstr')
                        ->select('reporting_head_emp_mstr_id')
                        ->where('reporting_person_emp_mstr_id', '=', $data['employee_id'])
                        ->where('_status', '=', 1)
                        ->first();
                    if($head){
                        $return['head_id'] = $head['reporting_head_emp_mstr_id'];
                    }
                    $inventory = $this->db->table('tbl_emp_details')
                        ->select('_id')
                        ->where('designation_mstr_id', '=', 11)
                        ->where('company_location_id', '=', $designation_mstr_id['company_location_id'])
                        ->where('project_mstr_id', '=', $designation_mstr_id['project_mstr_id'])
                        ->where('_status', '=', 1)
                        ->first();


                        
                    if($inventory){
                        $return['inventory_id'] = $inventory['_id'];
                    }/* 
                        select _id from tbl_emp_details where designation_mstr_id=11 and company location_id=17 and project_mstr_id=12 and _status=1
                    
                    */
                    return $return;
                }
                // else
                // {
                //     return false;
                // }
            // }
        // }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
// ///////////////////////////////////




    public function check_employee_asset_details_inventory($data){
        $employee_quit_details = $this->db->table('tbl_employee_quit_details')
                                    ->select('_id')
                                    ->where('employee_id', '=', $data['id'])
                                    ->where('_status', '=', 1)
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
    public function check_employee_asset_details($data){
        $employee_quit_details = $this->db->table('tbl_employee_quit_details')
                                    ->select('_id')
                                    ->where('employee_id', '=', $data['id'])
                                    ->where('_status', '=', 1)
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
                tbl_sub_item_name_mstr.sub_item_name,tbl_asset_details.purchase_cost
                FROM tbl_asset_assigned_employee_details
                LEFT JOIN tbl_asset_model_list ON tbl_asset_assigned_employee_details.asset_model_id = tbl_asset_model_list._id
                LEFT JOIN tbl_item_name_mstr ON tbl_asset_assigned_employee_details.item_name_id = tbl_item_name_mstr._id
                LEFT JOIN tbl_sub_item_name_mstr ON tbl_asset_assigned_employee_details.sub_item_name_id = tbl_sub_item_name_mstr._id
                LEFT JOIN tbl_asset_details ON tbl_asset_assigned_employee_details.asset_model_no_id = tbl_asset_details.asset_model_no_id
                WHERE tbl_asset_assigned_employee_details.assigned_employee_id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['id']);
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);

        }
    public function employee_notification($data)
    {
        try
        {
            $sql = "select * from tbl_employee_quit_details where employee_id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['id']);
            $result = $this->db->single();
            if($result)
            {
                return $result;
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
    public function termination_employee_performance($data)
    {
        $performance= $this->db->table('tbl_work_performance_details')->
                insert([
                    "quit_id"=>$data['_id'],
                    "remarks"=>$data['termination_work_performance'],
                    "created_by"=>$data['created_by'],
                    "created_on"=>datetime(),
                    "_status"=>1
                ]); 
           if($performance)
            {
                $notification_update= $this->db->table('tbl_notification_detail')->
                    where('notification_reference_id', '=',$data['_id'])->
                    update([
                        "_status"=>0
                    ]);
                return $notification_update;
            }
            else
            {
                return false;
            }
    }
    
    public function emp_termination_inventory_notification($data){
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
    
    public function emp_termination_inventory_notification_detail($data){
          $sql = "SELECT company_location_id,project_mstr_id
                FROM tbl_emp_details
                WHERE _id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['emp_id']);
		 		$resultemp = $this->db->single();
          if($resultemp){
              $sql = "SELECT _id
                FROM tbl_emp_details
                WHERE designation_mstr_id =:id AND company_location_id =:company_location_id AND project_mstr_id =:project_mstr_id";
				$this->db->query($sql);
                $this->db->bind("id", 9);
                $this->db->bind("company_location_id", $resultemp['company_location_id']);
                $this->db->bind("project_mstr_id", $resultemp['project_mstr_id']);
		 		$resultemphr = $this->db->single();

              if($resultemphr){
                  $emp_id = $data["emp_id"];
                  $hr_emp = $resultemphr["_id"];
                  $result = $this->db->table('tbl_notification_detail')->
                      insert([
                          "title"=>"Inventory Department",
                          "about"=>"Employee Assets submission Done",
                          "link"=>"Termination/terminationinventoryAssetSubmissionDone/$emp_id",
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
    
    public function checkTerminationinventoryAssetSubmissionDone($data){
        $employee_quit_details = $this->db->table('tbl_employee_quit_details')
                                    ->select('final_settlment_date')
                                    ->where('employee_id', '=', $data['id'])
                                    ->where('_status', '=', 1)
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

    public function employee_asset_update($data){
        $sql = "SELECT employee_id
                FROM tbl_employee_quit_details
                WHERE _id =:id ";
				$this->db->query($sql);
                $this->db->bind("id", $data['quit_id']);
		 		$resultempid = $this->db->single();
          if($resultempid){
         return $result = $this->db->table('tbl_asset_assigned_employee_details')->
                  where("assigned_employee_id", "=", $resultempid['employee_id'])->
                  update([
                      "_status"=>'0'
                  ]);
              }
          }


     public function terminationinventoryAssetSubmissionDone($data){
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

      public function terminationfinalSettlmentdate($data){
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
    
    public function termination_List(){
        $sql = "SELECT tbl_employee_quit_details.terminate_resign_reason,tbl_employee_quit_details.asset_submission_date,
                tbl_employee_quit_details.notice_period,tbl_employee_quit_details.final_settlment_date,
                tbl_employee_quit_details._status,tbl_employee_quit_details._id AS quit_id,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details._id
                FROM tbl_employee_quit_details
                LEFT JOIN tbl_emp_details ON tbl_employee_quit_details.employee_id =tbl_emp_details._id
                WHERE tbl_employee_quit_details.resign_terminate_type=:id ";
				$this->db->query($sql);
                $this->db->bind("id", "Termination");
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

    public function termination_ListUpdate($data){
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

        echo $data["_id"];
        $sql = "SELECT create_experience_letter,employee_id
                FROM tbl_employee_quit_details
                WHERE employee_id=:id ";
        $this->db->query($sql);
        $this->db->bind("id", $data["_id"]);
        $result = $this->db->single();
        return json_decode(json_encode($result), true);

    }

    public function upload_termination_experience_letter($data){
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


    
    
    
    public function getEmpFullFinalList($data){
        $sql = "SELECT tbl_employee_quit_details.terminate_resign_reason,tbl_employee_quit_details.asset_submission_date,
                tbl_employee_quit_details.notice_period,tbl_employee_quit_details.final_settlment_date,
                tbl_employee_quit_details._status,tbl_employee_quit_details._id AS quit_id,tbl_employee_quit_details.resign_terminate_type,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details._id
                FROM tbl_employee_quit_details
                LEFT JOIN tbl_emp_details ON tbl_employee_quit_details.employee_id =tbl_emp_details._id
                WHERE date(tbl_employee_quit_details.request_datetime) between :from_date and :to_date";
				$this->db->query($sql);
                $this->db->bind('from_date', $data['from_date']);
                $this->db->bind('to_date', $data['to_date']);
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);

        }
    public function getEmpFullFinalSearchList($data){
        try
          {
        $sql = "SELECT tbl_employee_quit_details.terminate_resign_reason,tbl_employee_quit_details.asset_submission_date,
                tbl_employee_quit_details.notice_period,tbl_employee_quit_details.final_settlment_date,
                tbl_employee_quit_details._status,tbl_employee_quit_details._id AS quit_id,tbl_employee_quit_details.resign_terminate_type,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_emp_details._id
                FROM tbl_employee_quit_details
                LEFT JOIN tbl_emp_details ON tbl_employee_quit_details.employee_id =tbl_emp_details._id
                WHERE date(tbl_employee_quit_details.request_datetime) between :from_date and :to_date
                ";
                if($data['process_type']!=""){
                    $sql .= " AND tbl_employee_quit_details.resign_terminate_type='".$data['process_type']."'";
                }
				$this->db->query($sql);
                $this->db->bind('from_date', $data['from_date']);
                $this->db->bind('to_date', $data['to_date']);
		 		$result = $this->db->resultset();
				return json_decode(json_encode($result), true);
             }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }

        }







}

?>