<?php
  class model_interview_details{
    private $db;
    private $tbl_name = "tbl_job_post_detail";

    public function __construct(){
      $this->db = new Database;
    }
       public function jobList(){
       $sql = "SELECT d._id as designation_mstr_id, d.designation_name
                FROM tbl_job_post_detail j join tbl_designation_mstr d on(j.designation_mstr_id=d._id)
                where j._status='1'";
				$this->db->query($sql);
		 		$result = $this->db->resultset();
				return $result;
        }

      public function designationGetByDeptId($data){
       $sql = "SELECT department_mstr_id, _id AS designation_mstr_id, designation_name
                FROM tbl_designation_mstr
                WHERE department_mstr_id=:department_mstr_id";
				$this->db->query($sql);
                $this->db->bind("department_mstr_id", $data['department_mstr_id']);
		 		$result = $this->db->single();
				return $result;
        }

      public function get_itemListByAssetType($data){
       $sql = "SELECT _id AS item_name_id,
                item_name
                FROM tbl_item_name_mstr
                WHERE asset_type =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->resultset();
				return $result;
        }
      public function get_subitemListByitemList($data){
       $sql = "SELECT _id AS sub_item_name_id,
                sub_item_name
                FROM tbl_sub_item_name_mstr
                WHERE item_name_id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->resultset();
				return $result;
        }
      public function get_modelNoBysubitemList($data){
       $sql = "SELECT _id AS model_no_id, model_no
                FROM tbl_asset_model_no_mstr
                WHERE sub_item_name_id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->resultset();
				return $result;
        }
      public function get_availablequantityBysubitemList($data){
       $sql = "SELECT COUNT(sub_item_name_id)
                FROM tbl_asset_details
                WHERE sub_item_name_id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->single();
				return $result;
        }
       public function get_serialNoBymodel($data){
       $sql = "SELECT asset_barcode_no
                FROM tbl_asset_model_list
                WHERE asset_model_no_id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->resultset();
				return $result;
        }
      public function get_availablequantityBymodel($data){
       $sql = "SELECT COUNT(asset_model_no_id)
                FROM tbl_asset_details
                WHERE asset_model_no_id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->single();
				return $result;
        }



     public function locationList(){
       $sql = "SELECT tbl_company_location._id AS location_mstr_id,tbl_company_location.address,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_company_location
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                WHERE tbl_company_location._status=:status
                ORDER BY tbl_company_location._id";
                // print_r($sql);die();
				$this->db->query($sql);
                $this->db->bind("status", "1");
                $result = $this->db->resultset();
				return $result; 
        }

      public function interviewcandidateList($data){

       $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name AS candidate_details_first_name,
                tbl_candidate_details.middle_name AS candidate_details_middle_name,
                tbl_candidate_details.last_name AS candidate_details_last_name
                FROM tbl_interview_interviewer_details
                LEFT JOIN tbl_interview_details ON tbl_interview_interviewer_details.interview_details_id = tbl_interview_details._id
                LEFT JOIN tbl_candidate_details ON tbl_interview_details.job_post_detail_id = tbl_candidate_details.job_post_details_id
                WHERE tbl_interview_interviewer_details.interviewer_id =:interviewer_id AND
                tbl_candidate_details._status =:status";
				$this->db->query($sql);
                $this->db->bind("interviewer_id", $data['user_mstr_id']);
                $this->db->bind("status", "4");
                // $this->db->bind("status", "1");
                $result = $this->db->resultset();
				return $result;
        }

      public function hrroundList($data){
       $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.photo_path, tbl_candidate_details.first_name,
                tbl_candidate_details.middle_name,tbl_candidate_details.last_name,
                tbl_candidate_details.d_o_b,tbl_candidate_details.email_id,
                tbl_candidate_details.personal_phone_no,tbl_designation_mstr.designation_name
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                WHERE tbl_candidate_details._id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $data['candidate_name']);
                $result = $this->db->resultset();
				return $result;
        }

      public function hrroundCandidate($dataci){
		 return $result = $this->db->table('tbl_candidate_details')->
                    where("_id", "=", $dataci['candidate_id'])->
					update(["_status"=>"7"]);
                    //get();

        }
      public function hrround($data){
        $secondRoundinterview_time = date('H:i:s',strtotime($data["2ndRoundinterview_time"]));
        $result = $this->db->table('tbl_candidate_first_round_interview_details')->
                  insert([
                    "candidate_id"=>$data["candidate_id"],
                    "interview_round_id"=>1,
                    "round_status"=>2,
                    "remarks"=>$data["remark"],
                    "date_time"=>$data["current_date"],
                    "created_by"=>$data["user_mstr_id"],
                    "performance"=>$data["performance"],
                    "secondRoundDate"=>$data["2ndRound_date"],
                    "secondRoundTime"=>$secondRoundinterview_time,
                    "_status"=>"1"
                  ]);
      return $result;
    }

       public function interviewSecondList($datas){

       $sql = "SELECT tbl_candidate_first_round_interview_details.candidate_id AS candidate_details_id,
                tbl_candidate_details.first_name AS candidate_details_first_name,
                tbl_candidate_details.middle_name AS candidate_details_middle_name,
                tbl_candidate_details.last_name AS candidate_details_last_name
                FROM tbl_interview_interviewer_details
                LEFT JOIN tbl_interview_details ON tbl_interview_interviewer_details.interview_details_id = tbl_interview_details._id
                LEFT JOIN tbl_candidate_details ON tbl_interview_details.job_post_detail_id = tbl_candidate_details.job_post_details_id
                LEFT JOIN tbl_candidate_first_round_interview_details ON tbl_candidate_details._id = tbl_candidate_first_round_interview_details.candidate_id
                WHERE tbl_interview_interviewer_details.interviewer_id =:interviewer_id
                AND tbl_candidate_first_round_interview_details.round_status = 2
                AND tbl_candidate_first_round_interview_details.secondrounddate >=:date
                AND tbl_candidate_details._status = 7";
				$this->db->query($sql);
                $this->db->bind("interviewer_id", $datas["user_mstr_id"]);
                $this->db->bind("date", $datas["current_date"]);
                $result = $this->db->resultset();
				return $result;
        }
        // public function interviewSecondList($datas){

        //     $sql = "SELECT tbl_candidate_first_round_interview_details.candidate_id AS candidate_details_id,
        //              tbl_candidate_details.first_name AS candidate_details_first_name,
        //              tbl_candidate_details.middle_name AS candidate_details_middle_name,
        //              tbl_candidate_details.last_name AS candidate_details_last_name
        //              FROM tbl_interview_interviewer_details
        //              LEFT JOIN tbl_interview_details ON tbl_interview_interviewer_details.interview_details_id = tbl_interview_details._id
        //              LEFT JOIN tbl_candidate_details ON tbl_interview_details.job_post_detail_id = tbl_candidate_details.job_post_details_id
        //              LEFT JOIN tbl_candidate_first_round_interview_details ON tbl_candidate_details._id = tbl_candidate_first_round_interview_details.candidate_id
        //              WHERE tbl_candidate_first_round_interview_details.round_status = 2
        //             ";
        //              $this->db->query($sql);
        //              // $this->db->bind("interviewer_id", $datas["user_mstr_id"]);
        //              // $this->db->bind("date", $datas["current_date"]);
        //              $result = $this->db->resultset();
        //              return $result;
        //      }
      public function secondroundList($data){
       $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.photo_path, tbl_candidate_details.first_name,
                tbl_candidate_details.middle_name,tbl_candidate_details.last_name,
                tbl_candidate_details.d_o_b,tbl_candidate_details.email_id,
                tbl_candidate_details.personal_phone_no,
                tbl_candidate_details.designation_mstr_id,
                tbl_job_post_detail.employment_type_mstr_id,
                tbl_earning_mstr.grade_id,tbl_earning_mstr.employment_type_id,
                tbl_earning_mstr.min_salary,tbl_earning_mstr.max_salary
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_earning_mstr ON tbl_designation_mstr.grade_mstr_id = tbl_earning_mstr.grade_id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                WHERE tbl_candidate_details._id =:id And tbl_earning_mstr._status = 1
                AND tbl_job_post_detail.employment_type_mstr_id = tbl_earning_mstr.employment_type_id";
				$this->db->query($sql);
                $this->db->bind("id", $data['candidate_name']);
                $result = $this->db->single();
				return $result;
        }

        public function first_round_remark($data){
            // echo "inside first_round_remark";
            // echo $data['candidate_name'];
            // return;
            $sql = "SELECT remarks from tbl_candidate_first_round_interview_details where candidate_id=:id";
                     $this->db->query($sql);
                     $this->db->bind("id", $data['candidate_name']);
                     $result = $this->db->single();
                     return $result;
             }
      public function secondround($data){
      $result = $this->db->table('tbl_candidate_second_round_interview_details')->
                  insert([
                    "candidate_id"=>$data["candidate_id"],
                    "interview_round_id"=>"2",
                    "basic_salary" => $data["basic_salary"],
                    "round_status"=>$data["status"],
                    "remarks"=>$data["remark"],
                    "date_of_joining"=>$data["doj"],
                    "date_time"=>$data["current_date"],
                    "created_by"=>$data["user_mstr_id"],
                    "performance"=>$data["performance"],
                    "_status"=>"1"
                  ]);
      return json_decode(json_encode($result), true);
        }
      public function secondroundCandidate($dataci){
		 return $result = $this->db->table('tbl_candidate_details')->
                    where("_id", "=", $dataci['candidate_id'])->
					update(["_status"=>"8"]);
                    //get();

        }
      public function getDesignationMstrIdByJobPostDetailsId($job_post_detail_id){
        return $this->db->table("tbl_job_post_detail")
                ->select("designation_mstr_id")
                ->where("_id", "=", $job_post_detail_id)
                ->where("_status", "=", 1)
                ->first();
      }
      public function postList($data){
        $result = $this->db->table("tbl_interview_details")
                ->select("job_post_detail_id")
                ->where("_status", "=", 1)
                ->groupBy('job_post_detail_id')
                ->get();
       if($result){
           $i=0;
           foreach($result as $values){
               if($i==0){
                   $column = [$values['job_post_detail_id']];
               }else{
                   array_push($column, $values['job_post_detail_id']);
               }
               $i = 1;
           }
           $columns = implode(",",$column);
           $sql = "SELECT tbl_job_post_detail._id AS job_post_detail_id, tbl_job_post_detail.designation_mstr_id AS designation_mstr_id,
                tbl_designation_mstr.designation_name AS designation_name,
                tbl_job_post_detail.expiry_date
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                WHERE tbl_job_post_detail._id NOT IN (".$columns.")  AND tbl_job_post_detail.expiry_date >=:date ";
            $this->db->query($sql);
            $this->db->bind("date", $data['date']);
            $result = $this->db->resultset();
            return $result = json_decode(json_encode($result), true);
           //print_r($column);
       }else{
            $sql = "SELECT tbl_job_post_detail._id AS job_post_detail_id, tbl_job_post_detail.designation_mstr_id AS designation_mstr_id,
                tbl_designation_mstr.designation_name AS designation_name,
                tbl_job_post_detail.expiry_date
                FROM tbl_job_post_detail
                LEFT JOIN tbl_designation_mstr ON tbl_job_post_detail.designation_mstr_id = tbl_designation_mstr._id
                WHERE tbl_job_post_detail.expiry_date >=:date ";
				$this->db->query($sql);
                $this->db->bind("date", $data['date']);
                $result = $this->db->resultset();
			 return $result = json_decode(json_encode($result), true);
       }
      }
      
       public function getJobPostDetailById($getJobPostDetail){
           //print_r($getJobPostDetail);
       $sql = "SELECT _id AS job_post_id, designation_mstr_id,project_name_id
                FROM tbl_job_post_detail
                WHERE _id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $getJobPostDetail);
                $result = $this->db->single();
				return $result;
        }


      public function departmentList(){
       $sql = "SELECT _id AS department_mstr_id, dept_name
                FROM tbl_department_mstr";
				$this->db->query($sql);
                $result = $this->db->resultset();
				return $result;
        }

      public function projectList(){
       $sql = "SELECT _id AS project_mstr_id, project_name
                FROM tbl_project_mstr
                WHERE _status =:status";
				$this->db->query($sql);
                $this->db->bind("status", 1);
                $result = $this->db->resultset();
				return $result;
        }
        public function hrList(){
         $sql = "SELECT _id AS employee_id, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS employee_name
                FROM tbl_emp_details where department_mstr_id='2'";
				$this->db->query($sql);
                $result = $this->db->resultset();
				return $result;
        }

     public function getEmployeeListByDesignationId($data){
       $sql = "SELECT _id AS employee_id, CONCAT(first_name, ' ', middle_name, ' ', last_name) AS employee_name
                FROM tbl_emp_details where designation_mstr_id=:designation_mstr_id";
				$this->db->query($sql);
                $this->db->bind("designation_mstr_id", $data);
		 		$result = $this->db->resultset();
                $result = json_decode(json_encode($result), true);
				return $result;
        }
//insert record into table interviewer,interveiwer details,interview round
      
      
      public function getDepEmpNameById($department_mstr_id){
          //$id = implode(', ', $data['department_mstr_id']);
       $sql = "SELECT _id,first_name,middle_name,last_name FROM tbl_emp_details
                WHERE department_mstr_id=".$department_mstr_id;
				$this->db->query($sql);
                //$this->db->bind("department_mstr_id", $data['department_mstr_id']);
                $result = $this->db->resultset();
				return $result;
        }
      public function departmentname($department_mstr_id){
       $sql = "SELECT _id AS department_mstr_id, dept_name
                FROM tbl_department_mstr
                WHERE _id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $department_mstr_id);
                $result = $this->db->single();
				return $result = json_decode(json_encode($result), true);;
        }

// Schedule Interview Works Start...

      public function insertscheduleinterview($data)
      { 
          return $result = $this->db->table('tbl_interview_details')->
              insertGetId([
                  "job_post_detail_id"=>$data["job_post_detail_id"],
                  "project_name_id"=>$data["project_mstr_id"],
                  "post_name_id"=>$data["designation_mstr_id"],
                  "interview_location_id"=>$data["location_mstr_id"],
                  "interview_start_date"=>$data["start_date"],
                  "interview_end_date"=>$data["end_date"],
                  "interview_start_time"=>$data["interview_start_time"],
                  "interview_end_time"=>$data["interview_end_time"],
                  "created_on"=>$data["date"],
                  "created_by"=>$data["emp_detais_id"],
                  "_status"=>"1",
              ]);
      }

      public function hrinsertscheduleinterview($data)
      {
          return $result = $this->db->table('tbl_interview_round_details')->
              insertGetId([
                  "interview_details_id"=>$data["scheduleinterviewid"],
                  "department_id"=>$data["first_round_department"],
                  "designation_id"=>$data["first_round_designation"],
                  "description"=>$data["firstdescription"],
                  "interview_type"=>$data["first_round_interview_type"],
                  "round_name"=>"HR Round(First Round)",
                  "_status"=>"1",

              ]);
      }
      public function hrinsertInterviewerdetails($data)
      {
          return $result = $this->db->table('tbl_interview_interviewer_details')->
              insert([
                  "interview_details_id"=>$data["scheduleinterviewid"],
                  "interview_round_id"=>$data["hrscheduleinterviewid"],
                  "interviewer_id"=>$data["employee_id"],
                  "_status"=>"1",

              ]);
      }
      
      public function departmentinsertscheduleinterview($data)
      {
          return $result = $this->db->table('tbl_interview_round_details')->
              insertGetId([
                  "interview_details_id"=>$data["scheduleinterviewid"],
                  "department_id"=>$data["department_mstr_id"],
                  "description"=>$data["second_round_description"],
                  "interview_type"=>$data["second_round_interview_type"],
                  "round_name"=>"Depatment Round(Second Round)",
                  "_status"=>"1",

              ]);
      }
      public function check_department_mstr_id($data)
      {
          return  $check_department_mstr_id = $this->db->table('tbl_emp_details')
                                            ->select('department_mstr_id')
                                            ->where('_id', '=', $data)
                                            ->first();
      }
      
      public function departmentinsertInterviewerdetails($data)
      {
          return $result = $this->db->table('tbl_interview_interviewer_details')->
              insert([
                  "interview_details_id"=>$data["scheduleinterviewid"],
                  "interview_round_id"=>$data["departmentinsertscheduleinterviewid"],
                  "interviewer_id"=>$data["dremployee_id"],
                  "_status"=>"1",

              ]);
      }

      
      public function interviewlist(){
       $sql = " SELECT tbl_interview_details._id AS interview_details_id,
                tbl_interview_details.interview_start_date,
                tbl_interview_details.interview_end_date,
                tbl_interview_details._status,
                tbl_interview_details.interview_location_id,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_interview_details.post_name_id,
                tbl_designation_mstr.designation_name
                FROM tbl_interview_details
                LEFT JOIN tbl_company_location ON tbl_interview_details.interview_location_id = tbl_company_location._id
				LEFT JOIN tbl_designation_mstr ON tbl_interview_details.post_name_id = tbl_designation_mstr._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                WHERE tbl_interview_details._status = 1";
				$this->db->query($sql);
		 		$result = $this->db->resultset();
				return $result;
        }

// Schedule Interview Ends Here...

      public function interview_process_list($data){
        // print_r($data);
        // return;
       $sql = "SELECT tbl_candidate_details._id,
                tbl_candidate_details.first_name,tbl_candidate_details.middle_name,tbl_candidate_details.last_name, 
                tbl_candidate_details.gender, tbl_designation_mstr.designation_name,
                tbl_candidate_details.personal_phone_no, tbl_candidate_details.email_id,
                tbl_candidate_details._status
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                WHERE tbl_job_post_detail.company_location_id =:company_location AND tbl_job_post_detail.project_name_id =:project_name AND
                tbl_candidate_details._status IN('4','7','8','9','10')";
				$this->db->query($sql);
                $this->db->bind("company_location", $data["company_location"]);
                $this->db->bind("project_name", $data["project_name"]);

                // var_dump($sql);

		 		$result = $this->db->resultset();
				return $result;


                
        }

    // public function interview_process_list($data){
    //     $sql = "SELECT tbl_candidate_details._id,
    //              tbl_candidate_details.first_name,tbl_candidate_details.middle_name,tbl_candidate_details.last_name, 
    //              tbl_candidate_details.gender, tbl_designation_mstr.designation_name,
    //              tbl_candidate_details.personal_phone_no, tbl_candidate_details.email_id,
    //              tbl_candidate_details._status
    //              FROM tbl_candidate_details
    //              LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
    //              LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
    //              WHERE tbl_candidate_details._status IN('4','7','8','9','10')";
    //              $this->db->query($sql);
    //             //  $this->db->bind("company_location", $data["company_location"]);
    //             //  $this->db->bind("project_name", $data["project_name"]);
    //               $result = $this->db->resultset();
    //              return $result;
    //      }
      public function hr_approval($data){
       $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
				tbl_candidate_details.first_name AS candidate_details_first_name,
				tbl_candidate_details.middle_name AS candidate_details_middle_name,
				tbl_candidate_details.last_name AS candidate_details_last_name,
                tbl_candidate_details.photo_path AS candidate_details_photo_path,
                tbl_candidate_details.designation_mstr_id,
                tbl_candidate_details._status,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist,
                tbl_designation_mstr.designation_name AS designation_mstr_designation_name
				FROM tbl_candidate_details
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
				LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_project_mstr_address ON tbl_job_post_detail.company_location_id = tbl_project_mstr_address._id
                LEFT JOIN tbl_state_dist_city ON tbl_project_mstr_address.state_dist_city_id = tbl_state_dist_city._id
				WHERE tbl_candidate_details._id=:id
				ORDER BY tbl_candidate_details._id DESC";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->resultset();
				return $result;
        }
      public function firstRound_approval($data){
       $sql = "SELECT tbl_candidate_first_round_interview_details.round_status,
                tbl_candidate_first_round_interview_details.remarks,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_candidate_first_round_interview_details.date_time
                FROM tbl_candidate_first_round_interview_details
                LEFT JOIN tbl_emp_details ON tbl_candidate_first_round_interview_details.created_by = tbl_emp_details._id
                WHERE tbl_candidate_first_round_interview_details.candidate_id=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->resultset();
		 		return $result;
        }
        public function secondRound_approval($data){
       $sql = "SELECT tbl_candidate_second_round_interview_details.basic_salary,
                tbl_candidate_second_round_interview_details.remarks,date_time,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_candidate_second_round_interview_details.round_status,
                tbl_candidate_second_round_interview_details.candidate_id
                FROM tbl_candidate_second_round_interview_details
                LEFT JOIN tbl_emp_details ON tbl_candidate_second_round_interview_details.created_by = tbl_emp_details._id
                WHERE tbl_candidate_second_round_interview_details.candidate_id	=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->resultset();
				return $result;
        }
      
      public function candidateUserId(){
          return $this->db->table('tbl_user_mstr')->
              insertGetId([
                  "user_pass"=>"12345",
                  "pass_hint"=>"12345",
                  "_status"=>"1"
              ]);

      }
      public function candidateUserUpdate($data){
          return $result7 = $this->db->table('tbl_user_mstr')->
                    where("_id", "=", $data['candidateUserId'])->
					update([
                        "user_name"=>$data['userFirst_name']."@".$data['candidateUserId']
                     ]);

      }
      public function empUserPassword($data){
          $sql = "SELECT user_name,user_pass
                FROM tbl_user_mstr
                WHERE _id =:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["candidateUserId"]);
		 		$result = $this->db->single();
				return $result;
           }

       public function secondRound_approvals($data){
       $sql = "SELECT tbl_job_post_detail.employment_type_mstr_id,
                tbl_job_post_detail.project_name_id,
                FROM tbl_candidate_details
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id  = tbl_job_post_detail._id
                WHERE tbl_candidate_details._id	=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->single();
				return $result;
           }
      public function candidateApproved($data){
       $sql = "INSERT INTO tbl_emp_details (department_mstr_id,designation_mstr_id,user_mstr_id,first_name,middle_name,last_name,present_address,present_city,
                present_district,present_state,present_pin_code,permanent_address,permanent_city,permanent_district,
                permanent_state,permanent_pin_code,d_o_b,gender,marital_status,spouse_name,height,weight,blood_group,
                personal_phone_no,other_phone_no,email_id,photo_path,joining_date,provident_fund_no,employee_state_insurance_no,
                experience_overall_relevant,mentioned_any_special_information,languages_know,leisure_activity,relations_working_in_this_company,
                your_state_of_health,services_agreement,are_you_willing_to_be_posted_anywhere_in_india,have_you_applied_before_in_this_company,
                created_by_emp_details_id,created_on,updated_on,offer_latter_path,offer_latter_given_timestamp)
               SELECT department_mstr_id,designation_mstr_id,".$data['candidateUserId'].",first_name,middle_name,last_name,present_address,present_city,
                present_district,present_state,present_pin_code,permanent_address,permanent_city,permanent_district,
                permanent_state,permanent_pin_code,d_o_b,gender,marital_status,spouse_name,height,weight,blood_group,
                personal_phone_no,other_phone_no,email_id,photo_path,created_on,provident_fund_no,employee_state_insurance_no,
                experience_overall_relevant,mentioned_any_special_information,languages_know,leisure_activity,relations_working_in_this_company,
                your_state_of_health,services_agreement,are_you_willing_to_be_posted_anywhere_in_india,have_you_applied_before_in_this_company,
                created_by_emp_detais_id,created_on,updated_on,offer_letter_path,offer_letter_given_timestamp
                FROM tbl_candidate_details
               WHERE _id=:id";
			    $this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$emp_details_id = $this->db->insertionGetId();

                $sql = "SELECT tbl_job_post_detail.employment_type_mstr_id,
                tbl_job_post_detail.project_name_id,tbl_job_post_detail.company_location_id,
                tbl_candidate_second_round_interview_details.basic_salary,tbl_project_mstr.concept_type
                FROM tbl_candidate_details
                INNER JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id  = tbl_job_post_detail._id
                INNER JOIN tbl_candidate_second_round_interview_details ON tbl_candidate_details._id  = tbl_candidate_second_round_interview_details.candidate_id
                INNER JOIN tbl_project_mstr ON tbl_job_post_detail.project_name_id  = tbl_project_mstr._id
                WHERE tbl_candidate_details._id	=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$project_and_employment_type = $this->db->single();
                
          //print_r($project_and_employment_type);

          
                $genEmpCode = str_pad($emp_details_id, 6, "0", STR_PAD_LEFT);
                  $emp_code = "EMP-".$genEmpCode;
                  $this->db->table('tbl_emp_details')
                      ->where("_id", "=", $emp_details_id)
                      ->update(['employee_code'=>$emp_code,
                               'project_mstr_id'=>$project_and_employment_type["project_name_id"],
                                'company_location_id'=>$project_and_employment_type["company_location_id"],
                                'monthly_salary'=>$project_and_employment_type["basic_salary"],
                                'employment_type_mstr_id'=>$project_and_employment_type["employment_type_mstr_id"],
                                'project_concept_type'=>$project_and_employment_type["concept_type"],
								'step_status'=>"7"
                               ]);



            $sql1 = "INSERT INTO tbl_emp_document_details (emp_details_id,doc_type_mstr_id,other_doc_name,doc_no,date_of_issue,
                place_of_issue,valid_upto,doc_path,created_on,updated_on)
               SELECT ".$emp_details_id.", doc_type_mstr_id,other_doc_name,doc_no,date_of_issue,
                place_of_issue,valid_upto,doc_path,created_on,updated_on
                FROM tbl_candidate_document_details
               WHERE candidate_details_id=:id";
			    $this->db->query($sql1);
                $this->db->bind("id", $data["id"]);
		 		$result1 = $this->db->resultset();

          $sql2 = "INSERT INTO tbl_emp_family_backbgound (emp_details_id,father_name,father_occupation,father_contact_no,
                  father_address,mother_name,mother_occupation,mother_contact_no,mother_address,brother_name,
                  brother_occupation,brother_contact_no,brother_address,sister_name,sister_occupation,
                  sister_contact_no,sister_address,brother_in_law_name,brother_in_law_occupation,
                  brother_in_law_contact_no,brother_in_law_address,spouse_name,spouse_occupation,spouse_contact_no,
                  spouse_address,friend1_name,friend1_occupation,friend1_contact_no,friend1_address,friend2_name,
                  friend2_occupation,friend2_contact_no,friend2_address,relative1_name,relative1_occupation,
                  relative1_contact_no,relative1_address,relative2_name,relative2_occupation,relative2_contact_no,
                  relative2_address,created_on,updated_on)
               SELECT ".$emp_details_id.", father_name,father_occupation,father_contact_no,
                  father_address,mother_name,mother_occupation,mother_contact_no,mother_address,brother_name,
                  brother_occupation,brother_contact_no,brother_address,sister_name,sister_occupation,
                  sister_contact_no,sister_address,brother_in_law_name,brother_in_law_occupation,
                  brother_in_law_contact_no,brother_in_law_address,spouse_name,spouse_occupation,spouse_contact_no,
                  spouse_address,friend1_name,friend1_occupation,friend1_contact_no,friend1_address,friend2_name,
                  friend2_occupation,friend2_contact_no,friend2_address,relative1_name,relative1_occupation,
                  relative1_contact_no,relative1_address,relative2_name,relative2_occupation,relative2_contact_no,
                  relative2_address,created_on,updated_on
                FROM tbl_candidate_family_backbgound
               WHERE candidate_details_id=:id";
			    $this->db->query($sql2);
                $this->db->bind("id", $data["id"]);
		 		$result2 = $this->db->resultset();
          
          $sql3 = "INSERT INTO tbl_emp_present_employment (emp_details_id,present_name_of_employer,present_address_of_organisation,
                   present_date_of_joining,present_brief_desc_of_present_job,present_basic_salary,present_hra,
                   present_total_monthly_amt,present_other_emoluments_pf_lta_medical,present_any_benefits_facilities,
                   present_expected_salary_pf_contribution_bonus,present_join_notice_period,created_on,updated_on)
               SELECT ".$emp_details_id.", present_name_of_employer,present_address_of_organisation,
                   present_date_of_joining_from,present_brief_desc_of_present_job,present_basic_salary,present_hra,
                   present_total_monthly_amt,present_other_emoluments_pf_lta_medical,present_any_benefits_facilities,
                   present_expected_salary_pf_contribution_bonus,present_join_notice_period,created_on,updated_on
                FROM tbl_candidate_present_employment
               WHERE candidate_details_id=:id";
			    $this->db->query($sql3);
                $this->db->bind("id", $data["id"]);
		 		$result3 = $this->db->resultset();
          
          $sql4 = "INSERT INTO tbl_emp_previous_employment_details (emp_details_id,previous_period_from,previous_period_to,previous_experience,
                   previous_organization_name_address,previous_designation,previous_monthly_emoluments,
                   previous_brief_job_description,created_on,updated_on)
               SELECT ".$emp_details_id.", previous_period_from,previous_period_to,previous_experience,
                   previous_organization_name_address,previous_designation,previous_monthly_emoluments,
                   previous_brief_job_description,created_on,updated_on
                FROM tbl_candidate_previous_employment_details
               WHERE candidate_details_id=:id";
			    $this->db->query($sql4);
                $this->db->bind("id", $data["id"]);
		 		$result4 = $this->db->resultset();
          
          $sql5 = "INSERT INTO tbl_emp_qualification_details (emp_details_id,course_mstr_id,other_course,sub_course_mstr_id,sub_stream_mstr_id,
                   medium_type,passing_year,school_college_institute_name,board_university_name,marks_percent,
                   attachment_doc_path,created_on,updated_on)
               SELECT ".$emp_details_id.", course_mstr_id,other_course,sub_course_mstr_id,sub_stream_mstr_id,
                   medium_type,passing_year,school_college_institute_name,board_university_name,marks_percent,
                   attachment_doc_path,created_on,updated_on
                FROM tbl_candidate_qualification_details
               WHERE candidate_details_id=:id";
			    $this->db->query($sql5);
                $this->db->bind("id", $data["id"]);
		 		$result5 = $this->db->resultset();
          
          $sql6 = "INSERT INTO tbl_emp_references (emp_details_id,reference_name_designation_organisation1,reference_phone_no_email_id1,
                   reference_address_of_communication1,reference_social_professinal1,
                   reference_name_designation_organisation2,reference_phone_no_email_id2,
                   reference_address_of_communication2,reference_social_professinal2,
                   reference_name_designation_organisation3,reference_phone_no_email_id3,
                   reference_address_of_communication3,reference_social_professinal3,
                   reference_name_designation_organisation4,reference_phone_no_email_id4,
                   reference_address_of_communication4,reference_social_professinal4,
                   reference_name_designation_organisation5,reference_phone_no_email_id5,
                   reference_address_of_communication5,reference_social_professinal5,
                   reference_name_designation_organisation6,reference_phone_no_email_id6,
                   reference_address_of_communication6,reference_social_professinal6,created_on,updated_on)
               SELECT ".$emp_details_id.", reference_name_designation_organisation1,reference_phone_no_email_id1,
                   reference_address_of_communication1,reference_social_professinal1,
                   reference_name_designation_organisation2,reference_phone_no_email_id2,
                   reference_address_of_communication2,reference_social_professinal2,
                   reference_name_designation_organisation3,reference_phone_no_email_id3,
                   reference_address_of_communication3,reference_social_professinal3,
                   reference_name_designation_organisation4,reference_phone_no_email_id4,
                   reference_address_of_communication4,reference_social_professinal4,
                   reference_name_designation_organisation5,reference_phone_no_email_id5,
                   reference_address_of_communication5,reference_social_professinal5,
                   reference_name_designation_organisation6,reference_phone_no_email_id6,
                   reference_address_of_communication6,reference_social_professinal6,created_on,updated_on
                FROM tbl_candidate_references
               WHERE candidate_details_id=:id";
			    $this->db->query($sql6);
                $this->db->bind("id", $data["id"]);
		 		$result6 = $this->db->resultset();
                
            $result7 = $this->db->table('tbl_candidate_details')->
                    where("_id", "=", $data['id'])->
					update(["_status"=>"10"]);

          return $emp_details_id;

        }
      public function empSuperior($data){
           $sql = "SELECT reporting_head_designation_mstr_id
                FROM tbl_on_reporting_leave_mstr
                WHERE reporting_person_designation_mstr_id =:reporting_person";
            $this->db->query($sql);
            $this->db->bind("reporting_person", $data["candidateDetails"]["designation_mstr_id"]);
            $result = $this->db->single();
            return $result;
        }
      
      public function emplyid($data){
           $sql = "SELECT _id
                FROM tbl_emp_details
                WHERE designation_mstr_id =:designation_mstr_id AND project_mstr_id=:project_mstr_id";
            $this->db->query($sql);
            $this->db->bind("designation_mstr_id", $data["empSuperior"]["reporting_head_designation_mstr_id"]);
            $this->db->bind("project_mstr_id", $data["candidateDetails"]["project_name_id"]);
            $result = $this->db->single();
            return $result;
        }

      public function addAsset($data){
          $addAsset = $this->db->table('tbl_asset_assigned_employee_details')->
              insert([
                  "asset_model_id"=>($data["asset_model_no_id"]!="")?$data["asset_model_no_id"]:null,
                  "assigned_employee_id"=>$data["emp_id"],
                  "asset_type"=>$data["asset_type"],
                  "item_name_id"=>$data["item_name_id"],
                  "sub_item_name_id"=>($data["sub_item_name"]!="")?$data["sub_item_name"]:null,
                  "quantity"=>($data["quantity"]!="")?$data["quantity"]:null,
                  "created_by"=>$data["assing_emp_detais_id"],
                  "created_on"=>$data["date"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($addAsset), true);
      }
      
       public function empNotification($data){
           $emply_id = $data['emp'];
          $empNotification = $this->db->table('tbl_notification_detail')->
              insert([
                  "title"=>$data["emply_name"],
                  "about"=>"New Employee Added ",
                  "link"=>"Employee/emp_view_details/$emply_id",
                  "department_mstr_id"=>$data ["candidateDetails"]["department_mstr_id"],
                  "created_by"=>$data["emp_detais_id"],
                  "created_on"=>$data["date"],
                  "employee_id"=>$data["emplyid"]["_id"],
                  "notification_type"=>" New Employee ",
                  "designation_mstr_id"=>$data["empSuperior"]["reporting_head_designation_mstr_id"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($empNotification), true);
      }

      public function candidateDetails($data){
          $sql = "SELECT tbl_candidate_details._id AS candidate_details_id,
                tbl_candidate_details.first_name,tbl_candidate_details.middle_name,tbl_candidate_details.last_name,
                tbl_candidate_second_round_interview_details.date_of_joining,tbl_job_post_detail.project_name_id,
                tbl_candidate_details.email_id,tbl_candidate_details.designation_mstr_id,tbl_candidate_details.department_mstr_id,
                tbl_company_location.email_id AS company_location_email_id,tbl_company_location.contact_no,
                tbl_candidate_second_round_interview_details.basic_salary,
                tbl_employment_type_mstr.employment_type,
                tbl_designation_mstr.designation_name,tbl_candidate_details.permanent_city,tbl_candidate_details.permanent_address,
                tbl_candidate_details.permanent_district,tbl_candidate_details.permanent_state,tbl_candidate_details.permanent_pin_code
                FROM tbl_candidate_details
                LEFT JOIN tbl_designation_mstr ON tbl_candidate_details.designation_mstr_id = tbl_designation_mstr._id
                LEFT JOIN tbl_job_post_detail ON tbl_candidate_details.job_post_details_id = tbl_job_post_detail._id
                LEFT JOIN tbl_company_location ON tbl_job_post_detail.company_location_id = tbl_company_location._id
                LEFT JOIN tbl_employment_type_mstr ON tbl_job_post_detail.employment_type_mstr_id = tbl_employment_type_mstr._id
                LEFT JOIN tbl_candidate_second_round_interview_details ON tbl_candidate_details._id = tbl_candidate_second_round_interview_details.candidate_id
                WHERE tbl_candidate_details._id=:id";
          $this->db->query($sql);
          $this->db->bind("id", $data["id"]);
          $result = $this->db->single();
          return $result;
      }
       public function updateOfferLettercandidateDetails($data){
           //print_r($data);
         return $result = $this->db->table('tbl_candidate_details')->
              WHERE("_id", "=", $data['candidateDetails']['candidate_details_id'])->
              update([
                  "offer_letter_path"=>$data["file_name"],
                  "offer_letter_given_timestamp"=>$data["date"],
                  "offer_letter_send_by_emp_details"=>$data["user_mstr_id"],
                  "_status"=>"9"
              ]);
      }
          /* print_r($data);
          $sql = "SELECT tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_designation_mstr.designation_name
                FROM tbl_emp_details
                LEFT JOIN tbl_designation_mstr ON tbl_emp_details.designation_mstr_id = tbl_designation_mstr._id
                WHERE tbl_emp_details.user_mstr_id=:user_mstr_id";
				$this->db->query($sql);
                $this->db->bind("user_mstr_id", $data['candidateUserId']);
		 		$result = $this->db->single();
				return $result;

      } */
      
      public function interviewScheduleDetails($data){
       $sql = "SELECT tbl_interview_details._id AS schedule_interview_details_id,
                tbl_interview_details.interview_start_date,tbl_interview_details.interview_end_date,
                tbl_interview_details.interview_start_time,tbl_interview_details.interview_end_time,
                tbl_designation_mstr.designation_name,
                tbl_state_dist_city.city,tbl_state_dist_city.state,tbl_state_dist_city.dist
                FROM tbl_interview_details
                LEFT JOIN tbl_designation_mstr ON tbl_interview_details.post_name_id = tbl_designation_mstr._id
                LEFT JOIN tbl_company_location ON tbl_interview_details.interview_location_id = tbl_company_location._id
                LEFT JOIN tbl_state_dist_city ON tbl_company_location.state_dist_city_id = tbl_state_dist_city._id
                WHERE tbl_interview_details._id=:id";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->resultset();
				return $result;
        }
      public function interviewRoundScheduleDetails($data){
       $sql = "SELECT tbl_interview_round_details._id AS round_schedule_interview_details_id,
                tbl_interview_round_details.round_name,tbl_interview_round_details.interview_type,
                tbl_designation_mstr.designation_name,tbl_interview_round_details.description,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_department_mstr.dept_name
                FROM tbl_interview_round_details
                LEFT JOIN tbl_designation_mstr ON tbl_interview_round_details.designation_id = tbl_designation_mstr._id
                LEFT JOIN tbl_department_mstr ON tbl_interview_round_details.department_id = tbl_department_mstr._id
                LEFT JOIN tbl_interview_interviewer_details ON tbl_interview_round_details._id = tbl_interview_interviewer_details.	interview_round_id
                LEFT JOIN tbl_emp_details ON tbl_interview_interviewer_details.interviewer_id = tbl_emp_details._id
                WHERE tbl_interview_round_details.interview_details_id=:id AND tbl_interview_round_details.round_name ='HR Round(First Round)'";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->resultset();
				return $result;
        }
      public function interviewerDetails($data){
       $sql = "SELECT tbl_interview_round_details._id AS round_schedule_interview_details_id,
                tbl_interview_round_details.round_name,tbl_interview_round_details.interview_type,
                tbl_designation_mstr.designation_name,tbl_interview_round_details.description,
                tbl_emp_details.first_name,tbl_emp_details.middle_name,tbl_emp_details.last_name,
                tbl_department_mstr.dept_name
                FROM tbl_interview_round_details
                LEFT JOIN tbl_designation_mstr ON tbl_interview_round_details.designation_id = tbl_designation_mstr._id
                LEFT JOIN tbl_department_mstr ON tbl_interview_round_details.department_id = tbl_department_mstr._id
                LEFT JOIN tbl_interview_interviewer_details ON tbl_interview_round_details._id = tbl_interview_interviewer_details.	interview_round_id
                LEFT JOIN tbl_emp_details ON tbl_interview_interviewer_details.interviewer_id = tbl_emp_details._id
                WHERE tbl_interview_round_details.interview_details_id=:id AND tbl_interview_round_details.round_name ='Depatment Round(Second Round)'";
				$this->db->query($sql);
                $this->db->bind("id", $data["id"]);
		 		$result = $this->db->resultset();
				return $result;
        }
  }