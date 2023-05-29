<?php
  class Api_Candidate extends Controller {

      function __construct(){
          //if(!isLoggedIn()){ redirect('Login'); }
          $this->db = new Database;
          $this->validateCandidate = $this->validator('validateCandidate');
      }

      public function index(){
        print_r($_SESSION['emp_details']);
      }
      // Step One
      public function candidateStepOneAddUpdate(){
          $datetime = dateTime();
          $created_by_emp_detais_id = 0;//$_SESSION['emp_details']['_id'];

          if(isPost()){
              $data = postData();
              if(isset($data['entry_type'])){
                  if($data['entry_type']=='internal')
                  {
                      if(isset($_SESSION['emp_details']))
                        $created_by_emp_detais_id = $_SESSION['emp_details']['_id'];
                      else{
                          $response = ['response'=>false, 'data'=>"session not found"];
                          echo json_encode($response);
                          die();
                      }
                  }
              }
              $errMsg = $this->validateCandidate->candidateAddUpdateStepOne($data);
              if(empty($errMsg)){
                  if($data['candidate_details_id']==""){ // INSERT
                      try{
                          $this->db->beginTransaction();
                          $personal_phone_no = mobile_no_mark_remove($data['personal_phone_no']);
                          $other_phone_no = "";
                          if($data['other_phone_no']!=""){
                              $other_phone_no = mobile_no_mark_remove($data['other_phone_no']);
                          }

                          $dataIsExist = $this->db->table('tbl_candidate_details')
                                                    ->select('_id')
                                                    ->where('first_name', '=', $data['first_name'])
                                                    ->where('last_name', '=', $data['last_name'])
                                                    ->where('personal_phone_no', '=', $personal_phone_no)
                                                    ->first();
                          if($dataIsExist){
                              $data = ["DataExist"=>"Candidate records is already exist!!"];
                              $response = ["response"=>false, "data"=>$data];
                          }else{
                              $candidate_details_id = $this->db->table('tbl_candidate_details')
                                  ->insertGetId([
                  								  	'job_post_details_id'=>$data['job_post_details_id'],
                  									  'department_mstr_id'=>$data['department_mstr_id'],
                  									  'designation_mstr_id'=>$data['designation_mstr_id'],
                                      'first_name'=>$data['first_name'],
                                      'middle_name'=>$data['middle_name'],
                                      'last_name'=>$data['last_name'],
                                      'blood_group'=>$data['blood_group'],
                                      'gender'=>$data['gender'],
                                      'marital_status'=>$data['marital_status'],
                                      'spouse_name'=>$data['spouse_name'],
                                      'd_o_b'=>$data['d_o_b'],
                                      'height'=>$data['height'],
                                      'weight'=>$data['weight'],
                                      'personal_phone_no'=>$personal_phone_no,
                                      'other_phone_no'=>$other_phone_no,
                                      'email_id'=>$data['email_id'],
                                      'photo_path'=>"",
                                      'step_status'=>1,
                                      'created_on'=>$datetime,
                                      'updated_on'=>$datetime,
                                      'created_by_emp_detais_id'=>$created_by_emp_detais_id,
									  '_status'=>1
                                  ]);
                              if($data['is_image']=="is_image"){
                                  if(isset($_FILES['photo_path'])){
                                      $file = $_FILES['photo_path'];
                                      $path = "candidate_photo";
                                      $newFileName = $candidate_details_id;
                                      $extensions = ['png','jpg','jpeg'];
                                      $photo_status = uploader($file, $path, $newFileName, $extensions);
                                      if($photo_status){
                                          $file_name = $file['name'];
                                          $tmp = explode('.', $file_name);
                                          $file_ext = strtolower(end($tmp));
                                          $photo_path = $path."/".$newFileName.'.'.$file_ext;
                                              $this->db->table('tbl_candidate_details')
                                              ->where("_id", "=", $candidate_details_id)
                                              ->update(['photo_path'=>$photo_path]);
                                      }
                                  }
                              }
                              $data = ['candidate_details_id'=>$candidate_details_id];
                              $response = ["response"=>true, "data"=>$data];
                          }
                          echo json_encode($response);
                          $this->db->commit();
                      }catch(Exception $e){
                          $this->db->rollBack();
                      }
                  }else{ // update
                      try{
                          $this->db->beginTransaction();
                          $personal_phone_no = mobile_no_mark_remove($data['personal_phone_no']);
                          $other_phone_no = "";
                          if($data['other_phone_no']!=""){
                              $other_phone_no = mobile_no_mark_remove($data['other_phone_no']);
                          }
                          $candidate_details_id = $data['candidate_details_id'];

                          $this->db->table('tbl_candidate_details')
                              ->where("_id", "=", $candidate_details_id)
                              ->update([
							  	  'job_post_details_id'=>$data['job_post_details_id'],
								  'department_mstr_id'=>$data['department_mstr_id'],
								  'designation_mstr_id'=>$data['designation_mstr_id'],
                                  'first_name'=>$data['first_name'],
                                  'middle_name'=>$data['middle_name'],
                                  'last_name'=>$data['last_name'],
                                  'blood_group'=>$data['blood_group'],
                                  'gender'=>$data['gender'],
                                  'marital_status'=>$data['marital_status'],
                                  'spouse_name'=>$data['spouse_name'],
                                  'd_o_b'=>$data['d_o_b'],
                                  'height'=>$data['height'],
                                  'weight'=>$data['weight'],
                                  'personal_phone_no'=>$personal_phone_no,
                                  'other_phone_no'=>$other_phone_no,
                                  'email_id'=>$data['email_id'],
                                  'updated_on'=>$datetime,
                                  'created_by_emp_detais_id'=>$created_by_emp_detais_id
                              ]);
                          if($data['is_image']=="is_image"){
                              if(isset($_FILES['photo_path'])){
                                  $file = $_FILES['photo_path'];
                                  $path = "emp_photo";
                                  $newFileName = $candidate_details_id;
                                  $extensions = ['png','jpg','jpeg'];
                                  $photo_status = uploader($file, $path, $newFileName, $extensions);
                                  if($photo_status){
                                    $file_name = $file['name'];
                                    $tmp = explode('.', $file_name);
	                                $file_ext = strtolower(end($tmp));
                                    $photo_path = $path."/".$newFileName.'.'.$file_ext;
                                    $this->db->table('tbl_candidate_details')
                                        ->where("_id", "=", $candidate_details_id)
                                        ->update(['photo_path'=>$photo_path]);
                                  }
                              }
                          }else{
                              $this->db->table('tbl_candidate_details')
                                  ->where("_id", "=", $candidate_details_id)
                                  ->update(['photo_path'=>""]);
                          }
                          $data = ['candidate_details_id'=>$candidate_details_id];
                          $response = ["response"=>true, "data"=>$data];

                          echo json_encode($response);
                          $this->db->commit();
                      }catch(Exception $e){
                          $this->db->rollBack();
                      }
                  }
              }else{
                  $response = ["response"=>false, "data"=>$errMsg];
                  echo json_encode($response);
              }
          }
      }
      // Step Two
      public function candidateStepTwoAddUpdate(){
          $datetime = dateTime();
          //$created_by_candidate_details_id = $_SESSION['candidate_details']['_id'];
          if(isPost()){
              $data = postData();
              $errMsg = $this->validateCandidate->candidateAddUpdateStepTwo($data);
              if(empty($errMsg)){
                  try{
                      $this->db->beginTransaction();
                      $father_contact_no = "";
                      if($data['father_contact_no']!=""){
                          $father_contact_no = mobile_no_mark_remove($data['father_contact_no']);
                      }
                      $mother_contact_no = "";
                      if($data['mother_contact_no']!=""){
                          $mother_contact_no = mobile_no_mark_remove($data['mother_contact_no']);
                      }
                      $brother_contact_no = "";
                      if($data['brother_contact_no']!=""){
                          $brother_contact_no = mobile_no_mark_remove($data['brother_contact_no']);
                      }
                      $sister_contact_no = "";
                      if($data['sister_contact_no']!=""){
                          $sister_contact_no = mobile_no_mark_remove($data['sister_contact_no']);
                      }
                      $brother_in_law_contact_no = "";
                      if($data['brother_in_law_contact_no']!=""){
                          $brother_in_law_contact_no = mobile_no_mark_remove($data['brother_in_law_contact_no']);
                      }
                      $spouse_contact_no = "";
                      if($data['spouse_contact_no']!=""){
                          $spouse_contact_no = mobile_no_mark_remove($data['spouse_contact_no']);
                      }
                      $friend1_contact_no = "";
                      if($data['friend1_contact_no']!=""){
                          $friend1_contact_no = mobile_no_mark_remove($data['friend1_contact_no']);
                      }
                      $friend2_contact_no = "";
                      if($data['friend2_contact_no']!=""){
                          $friend2_contact_no = mobile_no_mark_remove($data['friend2_contact_no']);
                      }
                      $relative1_contact_no = "";
                      if($data['relative1_contact_no']!=""){
                          $relative1_contact_no = mobile_no_mark_remove($data['relative1_contact_no']);
                      }
                      $relative2_contact_no = "";
                      if($data['relative2_contact_no']!=""){
                          $relative2_contact_no = mobile_no_mark_remove($data['relative2_contact_no']);
                      }
                      $candidate_details_result = $this->db->table('tbl_candidate_details')
                          ->where('_id', '=', $data['candidate_details_id'])
                          ->update([
                              "present_address"=>$data['present_address'],
                              "present_city"=>$data['present_city'],
                              "present_district"=>$data['present_district'],
                              "present_state"=>$data['present_state'],
                              "present_pin_code"=>$data['present_pin_code'],
                              "permanent_address"=>$data['permanent_address'],
                              "permanent_city"=>$data['permanent_city'],
                              "permanent_district"=>$data['permanent_district'],
                              "permanent_state"=>$data['permanent_state'],
                              "permanent_pin_code"=>$data['permanent_pin_code'],
                              "updated_on"=>$datetime
                          ]);
                      $result_candidate_family_backbgound = $this->db->table('tbl_candidate_family_backbgound')
                          ->select('_id')
                          ->where('candidate_details_id', '=', $data['candidate_details_id'])
                          ->where('_status', '=', 1)
                          ->orderBy('_id')
                          ->first();
                      if($result_candidate_family_backbgound){ // candidate_family_backbgound update
                          $candidate_family_backbgound_id = $result_candidate_family_backbgound['_id'];

                          $candidate_family_backbgound_result = $this->db->table('tbl_candidate_family_backbgound')
                              ->where('candidate_details_id', '=', $data['candidate_details_id'])
                              ->where('_id', '=', $candidate_family_backbgound_id)
                              ->update([
                                  "father_name"=>$data['father_name'],
                                  "father_occupation"=>$data['father_occupation'],
                                  "father_contact_no"=>$father_contact_no,
                                  "father_address"=>$data['father_address'],
                                  "mother_name"=>$data['mother_name'],
                                  "mother_occupation"=>$data['mother_occupation'],
                                  "mother_contact_no"=>$mother_contact_no,
                                  "mother_address"=>$data['mother_address'],
                                  "brother_name"=>$data['brother_name'],
                                  "brother_occupation"=>$data['brother_occupation'],
                                  "brother_contact_no"=>$brother_contact_no,
                                  "brother_address"=>$data['brother_address'],
                                  "sister_name"=>$data['sister_name'],
                                  "sister_occupation"=>$data['sister_occupation'],
                                  "sister_contact_no"=>$sister_contact_no,
                                  "sister_address"=>$data['sister_address'],
                                  "brother_in_law_name"=>$data['brother_in_law_name'],
                                  "brother_in_law_occupation"=>$data['brother_in_law_occupation'],
                                  "brother_in_law_contact_no"=>$brother_in_law_contact_no,
                                  "brother_in_law_address"=>$data['brother_in_law_address'],
                                  "spouse_name"=>$data['spouse_name'],
                                  "spouse_occupation"=>$data['spouse_occupation'],
                                  "spouse_contact_no"=>$spouse_contact_no,
                                  "spouse_address"=>$data['spouse_address'],
                                  "friend1_name"=>$data['friend1_name'],
                                  "friend1_occupation"=>$data['friend1_occupation'],
                                  "friend1_contact_no"=>$friend1_contact_no,
                                  "friend1_address"=>$data['friend1_address'],
                                  "friend2_name"=>$data['friend2_name'],
                                  "friend2_occupation"=>$data['friend2_occupation'],
                                  "friend2_contact_no"=>$friend2_contact_no,
                                  "friend2_address"=>$data['friend2_address'],
                                  "relative1_name"=>$data['relative1_name'],
                                  "relative1_occupation"=>$data['relative1_occupation'],
                                  "relative1_contact_no"=>$relative1_contact_no,
                                  "relative1_address"=>$data['relative1_address'],
                                  "relative2_name"=>$data['relative2_name'],
                                  "relative2_occupation"=>$data['relative2_occupation'],
                                  "relative2_contact_no"=>$relative2_contact_no,
                                  "relative2_address"=>$data['relative2_address'],
                                  "updated_on"=>$datetime
                              ]);
                      }else{ // candidate_family_backbgound insert
                          $candidate_family_backbgound_id = $this->db->table('tbl_candidate_family_backbgound')
                              ->insertGetId([
                                  "candidate_details_id"=>$data['candidate_details_id'],
                                  "father_name"=>$data['father_name'],
                                  "father_occupation"=>$data['father_occupation'],
                                  "father_contact_no"=>$father_contact_no,
                                  "father_address"=>$data['father_address'],
                                  "mother_name"=>$data['mother_name'],
                                  "mother_occupation"=>$data['mother_occupation'],
                                  "mother_contact_no"=>$mother_contact_no,
                                  "mother_address"=>$data['mother_address'],
                                  "brother_name"=>$data['brother_name'],
                                  "brother_occupation"=>$data['brother_occupation'],
                                  "brother_contact_no"=>$brother_contact_no,
                                  "brother_address"=>$data['brother_address'],
                                  "sister_name"=>$data['sister_name'],
                                  "sister_occupation"=>$data['sister_occupation'],
                                  "sister_contact_no"=>$sister_contact_no,
                                  "sister_address"=>$data['sister_address'],
                                  "brother_in_law_name"=>$data['brother_in_law_name'],
                                  "brother_in_law_occupation"=>$data['brother_in_law_occupation'],
                                  "brother_in_law_contact_no"=>$brother_in_law_contact_no,
                                  "brother_in_law_address"=>$data['brother_in_law_address'],
                                  "spouse_name"=>$data['spouse_name'],
                                  "spouse_occupation"=>$data['spouse_occupation'],
                                  "spouse_contact_no"=>$spouse_contact_no,
                                  "spouse_address"=>$data['spouse_address'],
                                  "friend1_name"=>$data['friend1_name'],
                                  "friend1_occupation"=>$data['friend1_occupation'],
                                  "friend1_contact_no"=>$friend1_contact_no,
                                  "friend1_address"=>$data['friend1_address'],
                                  "friend2_name"=>$data['friend2_name'],
                                  "friend2_occupation"=>$data['friend2_occupation'],
                                  "friend2_contact_no"=>$friend2_contact_no,
                                  "friend2_address"=>$data['friend2_address'],
                                  "relative1_name"=>$data['relative1_name'],
                                  "relative1_occupation"=>$data['relative1_occupation'],
                                  "relative1_contact_no"=>$relative1_contact_no,
                                  "relative1_address"=>$data['relative1_address'],
                                  "relative2_name"=>$data['relative2_name'],
                                  "relative2_occupation"=>$data['relative2_occupation'],
                                  "relative2_contact_no"=>$relative2_contact_no,
                                  "relative2_address"=>$data['relative2_address'],
                                  "created_on"=>$datetime,
                                  "updated_on"=>$datetime,
                                  "_status"=>1
                              ]);
                      }
                      $result_step_status = $this->db->table('tbl_candidate_details')
                          ->select('_id')
                          ->where('_id', '=', $data['candidate_details_id'])
                          ->where('step_status', '=', 1)
                          ->first();
                      if($result_step_status){
                          $result_step_status = $this->db->table('tbl_candidate_details')
                            ->where('_id', '=', $data['candidate_details_id'])
                            ->update(['step_status'=>2]);
                      }
                      $data = ['candidate_details_id'=>$data['candidate_details_id'], 'candidate_family_backbgound_id'=>$candidate_family_backbgound_id];
                      $response = ["response"=>true, "data"=>$data];
                      echo json_encode($response);
                      $this->db->commit();
                  }catch(Exception $e){
                      $this->db->rollBack();
                  }
              }else{
                  $response = ["response"=>false, "data"=>$errMsg];
                  echo json_encode($response);
              }
          }
      }
      // Step Three
      public function candidateStepThreeAddUpdate(){
          $datetime = dateTime();
          //$created_by_candidate_details_id = $_SESSION['candidate_details']['_id'];
          if(isPost()){
              $data = postData();
              $errMsg = $this->validateCandidate->candidateAddUpdateStepThree($data);
              if(empty($errMsg)){
                try{
                    $this->db->beginTransaction();
                    $this->db->table('tbl_candidate_qualification_details')
                                    ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                    ->update(["_status"=>3]);

                    $academicLength = sizeof($data['course_mstr_id']);
                    for($i=0; $i<$academicLength; $i++){
                        $candidate_qualification_details_id = $data['candidate_qualification_details_id'][$i];
                        $course_mstr_id = $data['course_mstr_id'][$i];
                        $other_course = $data['other_course'][$i];
                        $sub_course_mstr_id = $data['sub_course_mstr_id'][$i];
                        $sub_stream_mstr_id = $data['sub_stream_mstr_id'][$i];
                        $medium_type = $data['medium_type'][$i];
                        $passing_year = $data['passing_year'][$i];
                        $school_college_institute_name = $data['school_college_institute_name'][$i];
                        $board_university_name = $data['board_university_name'][$i];
                        $marks_percent = $data['marks_percent'][$i];

                        $exist_candidate_qualification_details = $this->db->table('tbl_candidate_qualification_details')
                            ->select('_id')
                            ->where('candidate_details_id', '=', $data['candidate_details_id'])
                            ->where('course_mstr_id', '=', $course_mstr_id)
                            ->where('sub_course_mstr_id', '=', $sub_course_mstr_id)
                            ->where('sub_stream_mstr_id', '=', $sub_stream_mstr_id)
                            ->where('_status', '=', 3)
                            ->first();

                        if($exist_candidate_qualification_details){ // update
                            $candidate_qualification_details_id = $exist_candidate_qualification_details['_id'];
                            $this->db->table('tbl_candidate_qualification_details')
                                    ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                    ->where('_id', '=', $candidate_qualification_details_id)
                                    ->update([
                                        "course_mstr_id"=>$course_mstr_id,
                                        "other_course"=>$other_course,
                                        "sub_course_mstr_id"=>$sub_course_mstr_id,
                                        "sub_stream_mstr_id"=>$sub_stream_mstr_id,
                                        "medium_type"=>$medium_type,
                                        "passing_year"=>$passing_year,
                                        "school_college_institute_name"=>$school_college_institute_name,
                                        "board_university_name"=>$board_university_name,
                                        "marks_percent"=>$marks_percent,
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                        }else{ // insert
                            $this->db->table('tbl_candidate_qualification_details')
                                    ->insertGetId([
                                        "candidate_details_id"=>$data['candidate_details_id'],
                                        "course_mstr_id"=>$course_mstr_id,
                                        "other_course"=>$other_course,
                                        "sub_course_mstr_id"=>$sub_course_mstr_id,
                                        "sub_stream_mstr_id"=>$sub_stream_mstr_id,
                                        "medium_type"=>$medium_type,
                                        "passing_year"=>$passing_year,
                                        "school_college_institute_name"=>$school_college_institute_name,
                                        "board_university_name"=>$board_university_name,
                                        "marks_percent"=>$marks_percent,
                                        "created_on"=>$datetime,
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                        }
                    } // end for loop
                    $this->db->table('tbl_candidate_qualification_details')
                                    ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                    ->where('_status', '=', 3)
                                    ->update(["_status"=>0]);

                    $result_step_status = $this->db->table('tbl_candidate_details')
                        ->select('_id')
                        ->where('_id', '=', $data['candidate_details_id'])
                        ->where('step_status', '=', 2)
                        ->first();
                    if($result_step_status){
                        $result_step_status = $this->db->table('tbl_candidate_details')
                          ->where('_id', '=', $data['candidate_details_id'])
                          ->update(['step_status'=>3]);
                    }

                    $data = ['candidate_details_id'=>$data['candidate_details_id']];
                    $response = ["response"=>true, "data"=>$data];
                    echo json_encode($response);
                    $this->db->commit();
                }catch(Exception $e){
                    $this->db->rollBack();
                }
            }else{
                $response = ["response"=>false, "data"=>$errMsg];
                echo json_encode($response);
            }
          }
      }
      // Step Four
      public function candidateStepFourAddUpdate(){
          $datetime = dateTime();
          //$created_by_candidate_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
                $data = postData();
                if($data['present_date_of_joining_from']!=""){
                  $data['present_date_of_joining_from'] = $data['present_date_of_joining_from']."-01";
                }
                if($data['present_date_of_joining_to']!=""){
                  $data['present_date_of_joining_to'] = $data['present_date_of_joining_to']."-01";
                }
                $errMsg = $this->validateCandidate->candidateAddUpdateStepFour($data);
                if(empty($errMsg)){
                    try{
                        $this->db->beginTransaction();
                        if($data['present_name_of_employer']!="" && $data['present_address_of_organisation']!="" && $data['present_date_of_joining_from']!=""){
                            $exist_candidate_present_employment = $this->db->table('tbl_candidate_present_employment')
                                ->select('_id')
                                ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                ->first();
                            if($exist_candidate_present_employment){ // update

                                $candidate_present_employment_id = $exist_candidate_present_employment['_id'];
                                $this->db->table('tbl_candidate_present_employment')
                                    ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                    ->where('_id', '=', $candidate_present_employment_id)
                                    ->update([
                                        "present_name_of_employer"=>$data['present_name_of_employer'],
                                        "present_address_of_organisation"=>$data['present_address_of_organisation'],
                                        "present_date_of_joining_from"=>(isset($data['present_date_of_joining_from']))?$data['present_date_of_joining_from']:null,
                                        "present_date_of_joining_to"=>(isset($data['present_date_of_joining_to']))?$data['present_date_of_joining_to']:null,
                                        "present_brief_desc_of_present_job"=>$data['present_brief_desc_of_present_job']
,                                        "present_basic_salary"=>($data['present_basic_salary']=="")?"0.00":$data['present_basic_salary'],
                                        "present_hra"=>($data['present_hra']=="")?"0.00":$data['present_hra'],
                                        "present_total_monthly_amt"=>($data['present_total_monthly_amt']=="")?"0.00":$data['present_total_monthly_amt'],
                                        "present_other_emoluments_pf_lta_medical"=>$data['present_other_emoluments_pf_lta_medical'],
                                        "present_any_benefits_facilities"=>$data['present_any_benefits_facilities'],
                                        "present_expected_salary_pf_contribution_bonus"=>$data['present_expected_salary_pf_contribution_bonus'],
                                        "present_join_notice_period"=>$data['present_join_notice_period'],
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                            }else{ //insert

                                $this->db->table('tbl_candidate_present_employment')
                                    ->insertGetId([
                                        "candidate_details_id"=>$data['candidate_details_id'],
                                        "present_name_of_employer"=>$data['present_name_of_employer'],
                                        "present_address_of_organisation"=>$data['present_address_of_organisation'],
                                        "present_date_of_joining_from"=>(isset($data['present_date_of_joining_from']))?$data['present_date_of_joining_from']:null,
                                        "present_date_of_joining_to"=>(isset($data['present_date_of_joining_to']))?$data['present_date_of_joining_to']:null,
                                        "present_brief_desc_of_present_job"=>$data['present_brief_desc_of_present_job'],
                                        "present_basic_salary"=>($data['present_basic_salary']=="")?"0.00":$data['present_basic_salary'],
                                        "present_hra"=>($data['present_hra']=="")?"0.00":$data['present_hra'],
                                        "present_total_monthly_amt"=>($data['present_total_monthly_amt']=="")?"0.00":$data['present_total_monthly_amt'],
                                        "present_other_emoluments_pf_lta_medical"=>$data['present_other_emoluments_pf_lta_medical'],
                                        "present_any_benefits_facilities"=>$data['present_any_benefits_facilities'],
                                        "present_expected_salary_pf_contribution_bonus"=>$data['present_expected_salary_pf_contribution_bonus'],
                                        "present_join_notice_period"=>$data['present_join_notice_period'],
                                        "created_on"=>$datetime,
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                            }
                        }else{
                            $this->db->table('tbl_candidate_present_employment')
                                ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                ->update(["_status"=>0]);
                        }


                        $this->db->table('tbl_candidate_previous_employment_details')
                            ->where('candidate_details_id', '=', $data['candidate_details_id'])
                            ->update(["_status"=>0]);
                        $preEmpLength = sizeof($data['previous_period_from']);
                        for($i=0; $i<$preEmpLength; $i++){
                            if($data['previous_period_from'][$i]!="" && $data['previous_period_to'][$i]!=""){
                                $previous_period_from = $data['previous_period_from'][$i]."-01";
                                $previous_period_to = $data['previous_period_to'][$i]."-01";
                                $previous_experience = $data['previous_experience'][$i];
                                $previous_organization_name_address = $data['previous_organization_name_address'][$i];
                                $previous_designation = $data['previous_designation'][$i];
                                $previous_monthly_emoluments = $data['previous_monthly_emoluments'][$i];
                                $previous_brief_job_description = $data['previous_brief_job_description'][$i];

                                $exist_candidate_previous_employment_details = $this->db->table('tbl_candidate_previous_employment_details')
                                    ->select('_id')
                                    ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                    ->where('previous_period_from', '=', $previous_period_from)
                                    ->where('previous_period_to', '=', $previous_period_to)
                                    ->first();

                                if($exist_candidate_previous_employment_details){ // update
                                    $candidate_previous_employment_details_id = $exist_candidate_previous_employment_details['_id'];
                                    $this->db->table('tbl_candidate_previous_employment_details')
                                        ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                        ->where('_id', '=', $candidate_previous_employment_details_id)
                                        ->update([
                                            "candidate_details_id"=>$data['candidate_details_id'],
                                            "previous_period_from"=>$previous_period_from,
                                            "previous_period_to"=>$previous_period_to,
                                            "previous_experience"=>$previous_experience,
                                            "previous_organization_name_address"=>$previous_organization_name_address,
                                            "previous_designation"=>$previous_designation,
                                            "previous_monthly_emoluments"=>($previous_monthly_emoluments=="")?"0.00":$previous_monthly_emoluments,
                                            "previous_brief_job_description"=>$previous_brief_job_description,
                                            "previous_period_from"=>$previous_period_from,
                                            "updated_on"=>$datetime,
                                            "_status"=>1
                                        ]);
                                }else{ // insert
                                    $this->db->table('tbl_candidate_previous_employment_details')
                                        ->insertGetId([
                                            "candidate_details_id"=>$data['candidate_details_id'],
                                            "previous_period_from"=>$previous_period_from,
                                            "previous_period_to"=>$previous_period_to,
                                            "previous_experience"=>$previous_experience,
                                            "previous_organization_name_address"=>$previous_organization_name_address,
                                            "previous_designation"=>$previous_designation,
                                            "previous_monthly_emoluments"=>($previous_monthly_emoluments=="")?"0.00":$previous_monthly_emoluments,
                                            "previous_brief_job_description"=>$previous_brief_job_description,
                                            "previous_period_from"=>$previous_period_from,
                                            "created_on"=>$datetime,
                                            "updated_on"=>$datetime,
                                            "_status"=>1
                                        ]);
                                }
                            }
                        }
                        $this->db->table('tbl_candidate_details')
                            ->where('_id', '=', $data['candidate_details_id'])
                            ->whereIn('_status', [1,2])
                            ->update([
                                "experience_overall_relevant"=>$data['experience_overall_relevant'],
                                "languages_know"=>$data['languages_know'],
                                "leisure_activity"=>$data['leisure_activity'],
                                "relations_working_in_this_company"=>$data['relations_working_in_this_company'],
                                "your_state_of_health"=>$data['your_state_of_health']
                            ]);
                        if($data['reference_name_designation_organisation1']!=""){
                            $exist_candidate_references = $this->db->table('tbl_candidate_references')
                                ->select('_id')
                                ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                ->first();
                            if($exist_candidate_references){ // update
                                $candidate_references_id = $exist_candidate_references['_id'];
                                $this->db->table('tbl_candidate_references')
                                    ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                    ->where('_id', '=', $candidate_references_id)
                                    ->update([
                                        "candidate_details_id"=>$data['candidate_details_id'],
                                        "reference_name_designation_organisation1"=>$data['reference_name_designation_organisation1'],
                                        "reference_phone_no_email_id1"=>$data['reference_phone_no_email_id1'],
                                        "reference_address_of_communication1"=>$data['reference_address_of_communication1'],
                                        "reference_social_professinal1"=>($data['reference_name_designation_organisation1']=="")?null:$data['reference_social_professinal1'],
                                        "reference_name_designation_organisation2"=>$data['reference_name_designation_organisation2'],
                                        "reference_phone_no_email_id2"=>$data['reference_phone_no_email_id2'],
                                        "reference_address_of_communication2"=>$data['reference_address_of_communication2'],
                                        "reference_social_professinal2"=>($data['reference_name_designation_organisation2']=="")?null:$data['reference_social_professinal2'],
                                        "reference_name_designation_organisation3"=>$data['reference_name_designation_organisation3'],
                                        "reference_phone_no_email_id3"=>$data['reference_phone_no_email_id3'],
                                        "reference_address_of_communication3"=>$data['reference_address_of_communication3'],
                                        "reference_social_professinal3"=>($data['reference_name_designation_organisation3']=="")?null:$data['reference_social_professinal3'],
                                        "reference_name_designation_organisation4"=>$data['reference_name_designation_organisation4'],
                                        "reference_phone_no_email_id4"=>$data['reference_phone_no_email_id4'],
                                        "reference_address_of_communication4"=>$data['reference_address_of_communication4'],
                                        "reference_social_professinal4"=>($data['reference_name_designation_organisation4']=="")?null:$data['reference_social_professinal4'],
                                        "reference_name_designation_organisation5"=>$data['reference_name_designation_organisation5'],
                                        "reference_phone_no_email_id5"=>$data['reference_phone_no_email_id5'],
                                        "reference_address_of_communication5"=>$data['reference_address_of_communication5'],
                                        "reference_social_professinal5"=>($data['reference_name_designation_organisation5']=="")?null:$data['reference_social_professinal5'],
                                        "reference_name_designation_organisation6"=>$data['reference_name_designation_organisation6'],
                                        "reference_phone_no_email_id6"=>$data['reference_phone_no_email_id6'],
                                        "reference_address_of_communication6"=>$data['reference_address_of_communication6'],
                                        "reference_social_professinal6"=>($data['reference_name_designation_organisation6']=="")?null:$data['reference_social_professinal6'],
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                            }else{ // insert
                                $this->db->table('tbl_candidate_references')
                                    ->insertGetId([
                                        "candidate_details_id"=>$data['candidate_details_id'],
                                        "reference_name_designation_organisation1"=>$data['reference_name_designation_organisation1'],
                                        "reference_phone_no_email_id1"=>$data['reference_phone_no_email_id1'],
                                        "reference_address_of_communication1"=>$data['reference_address_of_communication1'],
                                        "reference_social_professinal1"=>($data['reference_name_designation_organisation1']=="")?null:$data['reference_social_professinal1'],
                                        "reference_name_designation_organisation2"=>$data['reference_name_designation_organisation2'],
                                        "reference_phone_no_email_id2"=>$data['reference_phone_no_email_id2'],
                                        "reference_address_of_communication2"=>$data['reference_address_of_communication2'],
                                        "reference_social_professinal2"=>($data['reference_name_designation_organisation2']=="")?null:$data['reference_social_professinal2'],
                                        "reference_name_designation_organisation3"=>$data['reference_name_designation_organisation3'],
                                        "reference_phone_no_email_id3"=>$data['reference_phone_no_email_id3'],
                                        "reference_address_of_communication3"=>$data['reference_address_of_communication3'],
                                        "reference_social_professinal3"=>($data['reference_name_designation_organisation3']=="")?null:$data['reference_social_professinal3'],
                                        "reference_name_designation_organisation4"=>$data['reference_name_designation_organisation4'],
                                        "reference_phone_no_email_id4"=>$data['reference_phone_no_email_id4'],
                                        "reference_address_of_communication4"=>$data['reference_address_of_communication4'],
                                        "reference_social_professinal4"=>($data['reference_name_designation_organisation4']=="")?null:$data['reference_social_professinal4'],
                                        "reference_name_designation_organisation5"=>$data['reference_name_designation_organisation5'],
                                        "reference_phone_no_email_id5"=>$data['reference_phone_no_email_id5'],
                                        "reference_address_of_communication5"=>$data['reference_address_of_communication5'],
                                        "reference_social_professinal5"=>($data['reference_name_designation_organisation5']=="")?null:$data['reference_social_professinal5'],
                                        "reference_name_designation_organisation6"=>$data['reference_name_designation_organisation6'],
                                        "reference_phone_no_email_id6"=>$data['reference_phone_no_email_id6'],
                                        "reference_address_of_communication6"=>$data['reference_address_of_communication6'],
                                        "reference_social_professinal6"=>($data['reference_name_designation_organisation6']=="")?null:$data['reference_social_professinal6'],
                                        "created_on"=>$datetime,
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                            }
                        }else{
                            $this->db->table('tbl_candidate_references')
                                ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                ->update(["_status"=>0]);
                        }
                        $result_step_status = $this->db->table('tbl_candidate_details')
                            ->select('_id')
                            ->where('_id', '=', $data['candidate_details_id'])
                            ->where('step_status', '=', 3)
                            ->first();
                        if($result_step_status){
                            $result_step_status = $this->db->table('tbl_candidate_details')
                              ->where('_id', '=', $data['candidate_details_id'])
                              ->update(['step_status'=>4]);
                        }
                        $data = ['candidate_details_id'=>$data['candidate_details_id']];
                        $response = ["response"=>true, "data"=>$data];
                        echo json_encode($response);
                        $this->db->commit();
                    }catch(Exception $e){
                        $this->db->rollBack();
                    }
                }else{
                    $response = ["response"=>false, "data"=>$errMsg];
                    echo json_encode($response);
                }
          }
      }
      public function candidateStepFiveAddUpdate(){
          $datetime = dateTime();
          //$created_by_candidate_details_id = $_SESSION['candidate_details']['_id'];
          if(isPost()){
                $data = postData();
                $errMsg = $this->validateCandidate->candidateAddUpdateStepFive($data);
                if(empty($errMsg)){
                    try{
                        $resultExistStatus = true;
                        $this->db->beginTransaction();
                        if($data['doc_type_mstr_id']=="0"){
                            $result = $this->db->table('tbl_candidate_document_details')
                                            ->select('_id')
                                            ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                            ->where('other_doc_name', '=', $data['other_doc_name'])
                                            ->first();
                            if($result){
                                $resultExistStatus = false;
                            }
                        }else{
                            $result = $this->db->table('tbl_candidate_document_details')
                                            ->select('_id')
                                            ->where('candidate_details_id', '=', $data['candidate_details_id'])
                                            ->where('doc_type_mstr_id', '=', $data['doc_type_mstr_id'])
                                            ->first();
                            if($result){
                               //no unique value
                                $resultExistStatus = true;

                                // $resultExistStatus = false;
                            }
                        }

                        if($resultExistStatus){
                            $result_step_status = $this->db->table('tbl_candidate_details')
                                ->select('_id')
                                ->where('_id', '=', $data['candidate_details_id'])
                                ->where('step_status', '=', 4)
                                ->first();
                            if($result_step_status){
                                $result_step_status = $this->db->table('tbl_candidate_details')
                                  ->where('_id', '=', $data['candidate_details_id'])
                                  ->update(['step_status'=>5]);
                            }
                            $candidate_document_details_id = $this->db->table('tbl_candidate_document_details')
                                                        ->insertGetId([
                                                            'candidate_details_id'=>$data['candidate_details_id'],
                                                            'doc_type_mstr_id'=>$data['doc_type_mstr_id'],
                                                            'other_doc_name'=>($data['doc_type_mstr_id']=="0")?$data['other_doc_name']:"",
                                                            'doc_no'=>$data['doc_no'],
                                                            'place_of_issue'=>($data['place_of_issue']=="")?null:$data['place_of_issue'],
                                                            'date_of_issue'=>($data['date_of_issue']=="")?null:$data['date_of_issue'],
                                                            'valid_upto'=>($data['valid_upto']=="")?null:$data['valid_upto'],
                                                            "created_on"=>$datetime,
                                                            "updated_on"=>$datetime,
                                                            "_status"=>1
                                                        ]);
                            if($candidate_document_details_id){
                                if(isset($_FILES['candidate_doc_path'])){
                                    $file = $_FILES['candidate_doc_path'];
                                    $path = "candidate_documents";
                                    $newFileName = $candidate_document_details_id;
                                    $extensions = ['png','jpg','jpeg', 'pdf'];
                                    $photo_status = uploader($file, $path, $newFileName, $extensions);
                                    if($photo_status){
                                        $file_name = $file['name'];
                                        $tmp = explode('.', $file_name);
                                        $file_ext = strtolower(end($tmp));
                                        $doc_path = $path."/".$newFileName.'.'.$file_ext;

                                        $result = $this->db->table('tbl_candidate_document_details')
                                                            ->where('_id', '=', $candidate_document_details_id)
                                                            ->update([
                                                                'doc_path'=>$doc_path,
                                                                "updated_on"=>$datetime,
                                                                "_status"=>1
                                                            ]);
                                        if($result){
                                            /* $dataTbl = $this->db->table('tbl_candidate_document_details')
                                                            ->select('*')
                                                            ->where('_status', '=', 1)
                                                            ->get(); */
                                            $dataTbl = $this->db->table('tbl_candidate_document_details')
                                                            ->leftJoin('tbl_doc_type_mstr', 'tbl_candidate_document_details.doc_type_mstr_id', '=', 'tbl_doc_type_mstr._id')
                                                            ->select('tbl_candidate_document_details._id As candidate_document_details_id, tbl_candidate_document_details.doc_type_mstr_id As doc_type_mstr_id, tbl_doc_type_mstr.doc_name As doc_name, tbl_candidate_document_details.other_doc_name As other_doc_name, tbl_candidate_document_details.doc_no As doc_no, tbl_candidate_document_details.date_of_issue As date_of_issue, tbl_candidate_document_details.place_of_issue As place_of_issue, tbl_candidate_document_details.valid_upto As valid_upto, tbl_candidate_document_details.doc_path As doc_path')
                                                            ->where('tbl_candidate_document_details.candidate_details_id', '=', $data['candidate_details_id'])
                                                            ->where('tbl_candidate_document_details._status', '=', 1)
                                                            ->orderByDesc('tbl_candidate_document_details.created_on')
                                                            ->get();

                                            $rows = "";
                                            if($dataTbl){
                                                foreach($dataTbl as $values){
                                                    $candidate_document_details_id = $values['candidate_document_details_id'];
                                                    $doc_type = $values['doc_name'];
                                                    if($values['doc_type_mstr_id']==0){
                                                        $doc_type = $values['other_doc_name'];
                                                    }
                                                    $doc_no  = $values['doc_no'];
                                                    if($doc_no==""){
                                                        $doc_no = "N/A";
                                                    }
                                                    $date_of_issue  = $values['date_of_issue'];
                                                    if($date_of_issue==""){
                                                        $date_of_issue = "N/A";
                                                    }
                                                    $place_of_issue  = $values['place_of_issue'];
                                                    if($place_of_issue==""){
                                                        $place_of_issue = "N/A";
                                                    }
                                                    $valid_upto  = $values['valid_upto'];
                                                    if($valid_upto==""){
                                                        $valid_upto = "N/A";
                                                    }
                                                    $doc_path = URLROOT."/uploads/".$values['doc_path'];
                                                    $rows .= "<tr>";
                                                        $rows .= "<td>$doc_type</td>";
                                                        $rows .= "<td>$doc_no</td>";
                                                        $rows .= "<td>$place_of_issue</td>";
                                                        $rows .= "<td>$date_of_issue</td>";
                                                        $rows .= "<td>$valid_upto</td>";
                                                        $rows .= '<td><a href="'.$doc_path.'" target="_blank" class="btn btn-dark btn-sm">Document View</a></td>';
                                                        $rows .= '<td><button type="button" class="btn btn-success btn-icon" onclick="candidateDocDeleteFun('.$candidate_document_details_id.')"><i class="demo-psi-recycling icon-lg"></i></button></td>';
                                                    $rows .= "</tr>";
                                                }
                                            }
                                            $response = ["response"=>true, "data"=>$rows];
                                        }

                                    }
                                }
                            }
                        }else{
                            $data = ["DataExist"=>"Document is already Uploaded!!"];
                            $response = ["response"=>false, "data"=>$data];
                        }

                        echo json_encode($response);
                        $this->db->commit();
                    }catch(Exception $e){
                        $this->db->rollBack();
                    }
                }else{
                    $response = ["response"=>false, "data"=>$errMsg];
                    echo json_encode($response);
                }
          }
      }
      public function candidateDocDelete(){
        if(isPost()){
            $data = postData();
            try{
                $this->db->table('tbl_candidate_document_details')
                        ->where('candidate_details_id', '=', $data['candidate_details_id'])
                        ->where('_id', '=', $data['candidate_document_details_id'])
                        ->update(["_status"=>0]);

                $dataTbl = $this->db->table('tbl_candidate_document_details')
                                ->leftJoin('tbl_doc_type_mstr', 'tbl_candidate_document_details.doc_type_mstr_id', '=', 'tbl_doc_type_mstr._id')
                                ->select('tbl_candidate_document_details._id As candidate_document_details_id, tbl_candidate_document_details.doc_type_mstr_id As doc_type_mstr_id, tbl_doc_type_mstr.doc_name As doc_name, tbl_candidate_document_details.other_doc_name As other_doc_name, tbl_candidate_document_details.doc_no As doc_no, tbl_candidate_document_details.date_of_issue As date_of_issue, tbl_candidate_document_details.place_of_issue As place_of_issue, tbl_candidate_document_details.valid_upto As valid_upto, tbl_candidate_document_details.doc_path As doc_path')
                                ->where('tbl_candidate_document_details.candidate_details_id', '=', $data['candidate_details_id'])
                                ->where('tbl_candidate_document_details._status', '=', 1)
                                ->orderByDesc('tbl_candidate_document_details.created_on')
                                ->get();

                $rows = "";
                if($dataTbl){
                    foreach($dataTbl as $values){
                        $candidate_document_details_id = $values['candidate_document_details_id'];
                        $doc_type = $values['doc_name'];
                        if($values['doc_type_mstr_id']==0){
                            $doc_type = $values['other_doc_name'];
                        }
                        $doc_no  = $values['doc_no'];
                        if($doc_no==""){
                            $doc_no = "N/A";
                        }
                        $date_of_issue  = $values['date_of_issue'];
                        if($date_of_issue==""){
                            $date_of_issue = "N/A";
                        }
                        $place_of_issue  = $values['place_of_issue'];
                        if($place_of_issue==""){
                            $place_of_issue = "N/A";
                        }
                        $valid_upto  = $values['valid_upto'];
                        if($valid_upto==""){
                            $valid_upto = "N/A";
                        }
                        $doc_path = URLROOT."/uploads/".$values['doc_path'];
                        $rows .= "<tr>";
                            $rows .= "<td>$doc_type</td>";
                            $rows .= "<td>$doc_no</td>";
                            $rows .= "<td>$place_of_issue</td>";
                            $rows .= "<td>$date_of_issue</td>";
                            $rows .= "<td>$valid_upto</td>";
                            $rows .= '<td><a href="'.$doc_path.'" target="_blank" class="btn btn-dark btn-sm">Document View</a></td>';
                            $rows .= '<td><button type="button" class="btn btn-success btn-icon" onclick="candidateDocDeleteFun('.$candidate_document_details_id.')"><i class="demo-psi-recycling icon-lg"></i></button></td>';
                        $rows .= "</tr>";
                    }
                }
                $response = ["response"=>true, "data"=>$rows];
                echo json_encode($response);
            }catch(Exception $e){
                $this->db->rollBack();
            }

          }
      }

      public function checkRequiredQualificationIsExist(){
        if(isPost()){
          $data = postData();
          try{
            $getJobPostQualificationDetails = $this->db->table('tbl_job_post_qualification_details')
                                                  ->select('*')
                                                  ->where('job_post_details_id', '=', $data['job_post_details_id'])
                                                  ->get();

            if($getJobPostQualificationDetails){
                $course_mstr_arr = [];
                $sub_course_mstr_arr = [];
                $sub_stream_mstr_arr = [];

                $course_mstr_status = false;
                foreach ($getJobPostQualificationDetails as $key => $value) {
                    $course_mstr_arr = $value['course_mstr_id'];

                    $loopLen = sizeof($data['course_mstr_id']);
                    for($i=0; $i<$loopLen; $i++) {
                        $course_mstr_id = $data['course_mstr_id'][$i];
                        if($course_mstr_arr<=$course_mstr_id){
                          $course_mstr_status = true;
                        }
                    }
                }

                if($course_mstr_status){
                  $response = ["response"=>true, "data"=>$data];
                }else{
                  $data = ['you are not applicable because your qualification is short !!'];
                  $response = ["response"=>false, "data"=>$data];
                }
            }else{
              $data = ['Something Wrong!!!'];
              $response = ["response"=>false, "data"=>$data];
            }
            echo json_encode($response);
          }catch(Exception $e){
              $data = ['Something Wrong!!!'];
              $response = ["response"=>false, "data"=>$data];
              echo json_encode($response);
          }
        }
      }

      public function candidateFinalSubmit(){
        if(isPost()){
          $data = postData();
          try{
            $candidate_details_result = $this->db->table('tbl_candidate_details')
                          ->select('_id, step_status')
                          ->where('_id', '=', $data['candidate_details_id'])
                          ->where('_status', '=', 1)
                          ->first();

            if($candidate_details_result){
              if($candidate_details_result['step_status']==6){
                $response = ["response"=>true];
              }else{
                $update_result = $this->db->table('tbl_candidate_details')
                          ->where('_id', '=', $data['candidate_details_id'])
                          ->where('_status', '=', 1)
                          ->update(["step_status"=>6]);
                if($update_result){
                  $response = ["response"=>true];
                }else{
                  $data = ['Something Wrong!!!'];
                  $response = ["response"=>false, "data"=>$data];
                }
              }
            }else{
              $data = ['Something Wrong!!!'];
              $response = ["response"=>false, "data"=>$data];
            }
            echo json_encode($response);
          }catch(Exception $e){
              $data = ['Something Wrong!!!'];
              $response = ["response"=>false, "data"=>$data];
              echo json_encode($response);
          }
        }
      }

  }