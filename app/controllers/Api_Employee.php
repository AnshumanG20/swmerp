<?php
  class Api_Employee extends Controller {

      function __construct(){
          //if(!isLoggedIn()){ redirect('Login'); }
          $this->db = new Database;
          $this->model_emp_document_details = $this->model('model_emp_document_details');
          $this->validateEmployee = $this->validator('validateEmployee');
      }

      public function index(){

      }
      // Step One
      public function empStepOneAddUpdate(){
          $datetime = dateTime();
          if(isLoggedIn()){
              $created_by_emp_details_id = $_SESSION['emp_details']['_id'];
              if(isPost()){
                  $data = postData();
                  $errMsg = $this->validateEmployee->empAddUpdateStepOne($data);
                  if(empty($errMsg)){
                      if($data['emp_details_id']==""){ // INSERT
                          try{
                              $this->db->beginTransaction();
                              $personal_phone_no = mobile_no_mark_remove($data['personal_phone_no']);
                              $other_phone_no = "";
                              if($data['other_phone_no']!=""){
                                  $other_phone_no = mobile_no_mark_remove($data['other_phone_no']);
                              }

                              $dataIsExist = $this->db->table('tbl_emp_details')
                                  ->select('_id')
                                  ->where('first_name', '=', $data['first_name'])
                                  ->where('last_name', '=', $data['last_name'])
                                  ->where('personal_phone_no', '=', $personal_phone_no)
                                  ->first();
                              if($dataIsExist){
                                  $data = ["DataExist"=>"Employee record is already exist!!"];
                                  $response = ["response"=>false, "data"=>$data];
                              }else{
                                  $emp_details_id = $this->db->table('tbl_emp_details')
                                      ->insertGetId([
                                          'user_mstr_id'=>0,
                                          'first_name'=>ucfirst(strtolower($data['first_name'])),
                                          'middle_name'=>($data['middle_name']!="")?ucfirst(strtolower($data['middle_name'])):"",
                                          'last_name'=>ucfirst(strtolower($data['last_name'])),
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
                                          'created_on'=>$datetime,
                                          'updated_on'=>$datetime,
                                          'created_by_emp_details_id'=>$created_by_emp_details_id,
                                          'step_status'=>1
                                      ]);
                                  if($data['is_image']=="is_image"){
                                      if(isset($_FILES['photo_path'])){
                                          $file = $_FILES['photo_path'];
                                          $path = "emp_photo";
                                          $newFileName = $emp_details_id;
                                          $extensions = ['png','jpg','jpeg'];
                                          $photo_status = uploader($file, $path, $newFileName, $extensions);
                                          if($photo_status){
                                              $file_name = $file['name'];
                                              $tmp = explode('.', $file_name);
                                              $file_ext = strtolower(end($tmp));
                                              $photo_path = $path."/".$newFileName.'.'.$file_ext;
                                              $this->db->table('tbl_emp_details')
                                                  ->where("_id", "=", $emp_details_id)
                                                  ->update(['photo_path'=>$photo_path]);
                                          }
                                      }
                                  }
                                  $genEmpCode = str_pad($emp_details_id, 6, "0", STR_PAD_LEFT);
                                  $emp_code = "EMP-".$genEmpCode;
                                  $this->db->table('tbl_emp_details')
                                      ->where("_id", "=", $emp_details_id)
                                      ->update(['employee_code'=>$emp_code]);

                                  $data = ['emp_details_id'=>$emp_details_id];
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
                              $emp_details_id = $data['emp_details_id'];

                              $this->db->table('tbl_emp_details')
                                  ->where("_id", "=", $emp_details_id)
                                  ->update([
                                      'first_name'=>ucfirst(strtolower($data['first_name'])),
                                      'middle_name'=>($data['middle_name']!="")?ucfirst(strtolower($data['middle_name'])):"",
                                      'last_name'=>ucfirst(strtolower($data['last_name'])),
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
                                      'created_by_emp_details_id'=>$created_by_emp_details_id
                                  ]);
                              if($data['is_image']=="is_image"){
                                  if(isset($_FILES['photo_path'])){
                                      $file = $_FILES['photo_path'];
                                      $path = "emp_photo";
                                      $newFileName = $emp_details_id;
                                      $extensions = ['png','jpg','jpeg'];
                                      $photo_status = uploader($file, $path, $newFileName, $extensions);
                                      if($photo_status){
                                          $file_name = $file['name'];
                                          $tmp = explode('.', $file_name);
                                          $file_ext = strtolower(end($tmp));
                                          $photo_path = $path."/".$newFileName.'.'.$file_ext;
                                          $this->db->table('tbl_emp_details')
                                              ->where("_id", "=", $emp_details_id)
                                              ->update(['photo_path'=>$photo_path]);
                                      }
                                  }
                              }else{
                                  $this->db->table('tbl_emp_details')
                                      ->where("_id", "=", $emp_details_id)
                                      ->update(['photo_path'=>""]);
                              }
                              $data = ['emp_details_id'=>$emp_details_id];
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
          }else{
                $loginAgain['loginAgain'] = "Please Login Again !!!";
                $response = ["response"=>false, "data"=>$loginAgain];
                      echo json_encode($response);
          }
      }
      // Step Two
      public function empStepTwoAddUpdate(){
          $datetime = dateTime();
          //$created_by_emp_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
              $data = postData();
              $errMsg = $this->validateEmployee->empAddUpdateStepTwo($data);
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
                      $emp_details_result = $this->db->table('tbl_emp_details')
                          ->where('_id', '=', $data['emp_details_id'])
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
                      $result_emp_family_backbgound = $this->db->table('tbl_emp_family_backbgound')
                          ->select('_id')
                          ->where('emp_details_id', '=', $data['emp_details_id'])
                          ->where('_status', '=', 1)
                          ->orderBy('_id')
                          ->first();
                      if($result_emp_family_backbgound){ // emp_family_backbgound update
                          $emp_family_backbgound_id = $result_emp_family_backbgound['_id'];

                          $emp_family_backbgound_result = $this->db->table('tbl_emp_family_backbgound')
                              ->where('emp_details_id', '=', $data['emp_details_id'])
                              ->where('_id', '=', $emp_family_backbgound_id)
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
                      }else{ // emp_family_backbgound insert
                          $emp_family_backbgound_id = $this->db->table('tbl_emp_family_backbgound')
                              ->insertGetId([
                                  "emp_details_id"=>$data['emp_details_id'],
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
					  $result_step_status = $this->db->table('tbl_emp_details')
                          ->select('_id')
                          ->where('_id', '=', $data['emp_details_id'])
                          ->where('step_status', '=', 1)
                          ->first();
            if($result_step_status){
					  		$result_step_status = $this->db->table('tbl_emp_details')
								  ->where('_id', '=', $data['emp_details_id'])
								  ->update(['step_status'=>2]);
					  }
                      $data = ['emp_details_id'=>$data['emp_details_id'], 'emp_family_backbgound_id'=>$emp_family_backbgound_id];
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
      // Step Two
      public function empStepThreeAddUpdate(){
          $datetime = dateTime();
          //$created_by_emp_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
              $data = postData();
              $errMsg = $this->validateEmployee->empAddUpdateStepThree($data);
              if(empty($errMsg)){
                try{
                    $this->db->beginTransaction();

                    $this->db->table('tbl_emp_qualification_details')
                                    ->where('emp_details_id', '=', $data['emp_details_id'])
                                    ->update(["_status"=>3]);

                    $academicLength = sizeof($data['course_mstr_id']);
                    for($i=0; $i<$academicLength; $i++){
                        $emp_qualification_details_id = $data['emp_qualification_details_id'][$i];
                        $course_mstr_id = $data['course_mstr_id'][$i];
                        $other_course = $data['other_course'][$i];
                        $sub_course_mstr_id = $data['sub_course_mstr_id'][$i];
                        $sub_stream_mstr_id = $data['sub_stream_mstr_id'][$i];
                        $medium_type = $data['medium_type'][$i];
                        $passing_year = $data['passing_year'][$i];
                        $school_college_institute_name = $data['school_college_institute_name'][$i];
                        $board_university_name = $data['board_university_name'][$i];
                        $marks_percent = $data['marks_percent'][$i];

                        $exist_emp_qualification_details = $this->db->table('tbl_emp_qualification_details')
                            ->select('_id')
                            ->where('emp_details_id', '=', $data['emp_details_id'])
                            ->where('course_mstr_id', '=', $course_mstr_id)
                            ->where('sub_course_mstr_id', '=', $sub_course_mstr_id)
                            ->where('sub_stream_mstr_id', '=', $sub_stream_mstr_id)
                            ->where('_status', '=', 3)
                            ->first();

                        if($exist_emp_qualification_details){ // update
                            $emp_qualification_details_id = $exist_emp_qualification_details['_id'];
                            $this->db->table('tbl_emp_qualification_details')
                                    ->where('emp_details_id', '=', $data['emp_details_id'])
                                    ->where('_id', '=', $emp_qualification_details_id)
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
                            $this->db->table('tbl_emp_qualification_details')
                                    ->insertGetId([
                                        "emp_details_id"=>$data['emp_details_id'],
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
                    $this->db->table('tbl_emp_qualification_details')
                                    ->where('emp_details_id', '=', $data['emp_details_id'])
                                    ->where('_status', '=', 3)
                                    ->update(["_status"=>0]);
									
					          $result_step_status = $this->db->table('tbl_emp_details')
                          ->select('_id')
                          ->where('_id', '=', $data['emp_details_id'])
                          ->where('step_status', '=', 2)
                          ->first();
                    if($result_step_status){
    					  		    $result_step_status = $this->db->table('tbl_emp_details')
                                								  ->where('_id', '=', $data['emp_details_id'])
                                								  ->update(['step_status'=>3]);
    					      }
					
                    $data = ['emp_details_id'=>$data['emp_details_id']];
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
      public function empStepFourAddUpdate(){
          $datetime = dateTime();
          $created_by_emp_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
                $data = postData();
                $errMsg = $this->validateEmployee->empAddUpdateStepFour($data);
                if(empty($errMsg)){
                    try{
                        $this->db->beginTransaction();
                        if($data['present_name_of_employer']!=""){
                            $exist_emp_present_employment = $this->db->table('tbl_emp_present_employment')
                                ->select('_id')
                                ->where('emp_details_id', '=', $data['emp_details_id'])
                                ->first();
                            if($exist_emp_present_employment){ // update

                                $emp_present_employment_id = $exist_emp_present_employment['_id'];
                                $this->db->table('tbl_emp_present_employment')
                                    ->where('emp_details_id', '=', $data['emp_details_id'])
                                    ->where('_id', '=', $emp_present_employment_id)
                                    ->update([
                                        "present_name_of_employer"=>$data['present_name_of_employer'],
                                        "present_address_of_organisation"=>$data['present_address_of_organisation'],
                                        "present_date_of_joining"=>$data['present_date_of_joining'],
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

                                $this->db->table('tbl_emp_present_employment')
                                    ->insertGetId([
                                        "emp_details_id"=>$data['emp_details_id'],
                                        "present_name_of_employer"=>$data['present_name_of_employer'],
                                        "present_address_of_organisation"=>$data['present_address_of_organisation'],
                                        "present_date_of_joining"=>$data['present_date_of_joining'],
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
                            $this->db->table('tbl_emp_present_employment')
                                ->where('emp_details_id', '=', $data['emp_details_id'])
                                ->update(["_status"=>0]);
                        }


                        $this->db->table('tbl_emp_previous_employment_details')
                            ->where('emp_details_id', '=', $data['emp_details_id'])
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

                                $exist_emp_previous_employment_details = $this->db->table('tbl_emp_previous_employment_details')
                                    ->select('_id')
                                    ->where('emp_details_id', '=', $data['emp_details_id'])
                                    ->where('previous_period_from', '=', $previous_period_from)
                                    ->where('previous_period_to', '=', $previous_period_to)
                                    ->first();

                                if($exist_emp_previous_employment_details){ // update
                                    $emp_previous_employment_details_id = $exist_emp_previous_employment_details['_id'];
                                    $this->db->table('tbl_emp_previous_employment_details')
                                        ->where('emp_details_id', '=', $data['emp_details_id'])
                                        ->where('_id', '=', $emp_previous_employment_details_id)
                                        ->update([
                                            "emp_details_id"=>$data['emp_details_id'],
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
                                    $this->db->table('tbl_emp_previous_employment_details')
                                        ->insertGetId([
                                            "emp_details_id"=>$data['emp_details_id'],
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
                        $this->db->table('tbl_emp_details')
                            ->where('_id', '=', $data['emp_details_id'])
                            ->where('_status', '=', 1)
                            ->update([
                                "experience_overall_relevant"=>$data['experience_overall_relevant'],
                                "languages_know"=>$data['languages_know'],
                                "leisure_activity"=>$data['leisure_activity'],
                                "relations_working_in_this_company"=>$data['relations_working_in_this_company'],
                                "your_state_of_health"=>$data['your_state_of_health']
                            ]);
                        if($data['reference_name_designation_organisation1']!=""){
                            $exist_emp_references = $this->db->table('tbl_emp_references')
                                ->select('_id')
                                ->where('emp_details_id', '=', $data['emp_details_id'])
                                ->first();
                            if($exist_emp_references){ // update
                                $emp_references_id = $exist_emp_references['_id'];
                                $this->db->table('tbl_emp_references')
                                    ->where('emp_details_id', '=', $data['emp_details_id'])
                                    ->where('_id', '=', $emp_references_id)
                                    ->update([
                                        "emp_details_id"=>$data['emp_details_id'],
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
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                            }else{ // insert
                                $this->db->table('tbl_emp_references')
                                    ->insertGetId([
                                        "emp_details_id"=>$data['emp_details_id'],
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
                                        "created_on"=>$datetime,
                                        "updated_on"=>$datetime,
                                        "_status"=>1
                                    ]);
                            }
                        }else{
                            $this->db->table('tbl_emp_references')
                                ->where('emp_details_id', '=', $data['emp_details_id'])
                                ->update(["_status"=>0]);
                        }
          						  $result_step_status = $this->db->table('tbl_emp_details')
            							  ->select('_id')
            							  ->where('_id', '=', $data['emp_details_id'])
            							  ->where('step_status', '=', 3)
            							  ->first();
          					    if($result_step_status){
          							   $result_step_status = $this->db->table('tbl_emp_details')
              								  ->where('_id', '=', $data['emp_details_id'])
              								  ->update(['step_status'=>4]);
          					    }
						
                        $data = ['emp_details_id'=>$data['emp_details_id']];
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
      public function empStepFiveAddUpdate(){
        //   echo "inside api";
        //   return;
          $datetime = dateTime();
          $created_by_emp_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
                $data = postData();
                $errMsg = $this->validateEmployee->empAddUpdateStepFive($data);
                if(empty($errMsg)){
                    try{
                        $this->db->beginTransaction();

                        $biometric_employee_code_status = true;
                        if($data['biometric_employee_code']!=""){
                            $biometric_employee_code = strval($data['biometric_employee_code']);
                            $exist_biometric_employee_code = $this->db->table('tbl_emp_details')
                                                                    ->select('_id')
                                                                    ->where('_id', '!=', $data['emp_details_id'])
                                                                    ->where('biometric_employee_code', '=', $biometric_employee_code)
                                                                    ->first();
                            if($exist_biometric_employee_code){
                                $biometric_employee_code_status = false;
                            }
                        }
                        if($biometric_employee_code_status){
                            $grade_mstr_id = $this->db->table('tbl_designation_mstr')
                                                    ->select('grade_mstr_id')
                                                    ->where('_id', '=', $data['designation_mstr_id'])
                                                    ->where('_status', '=', 1)
                                                    ->first();
                            if($grade_mstr_id){
                              $this->db->table('tbl_emp_details')
                                  ->where('_id', '=', $data['emp_details_id'])
                                  ->update([
                                      "company_location_id" => ($data['company_location_id']!="")?$data['company_location_id']:null,
                                      "project_mstr_id" => ($data['project_mstr_id']!="")?$data['project_mstr_id']:null,
                                      "department_mstr_id"=>$data['department_mstr_id'],
                                      "designation_mstr_id"=>$data['designation_mstr_id'],
                                      "project_concept_type"=>$data['project_concept_type'],
                                      "grade_mstr_id"=>$grade_mstr_id['grade_mstr_id'],
                                      "employment_type_mstr_id"=>$data['employment_type_mstr_id'],
                                      "work_type"=>($data['work_type']!="")?$data['work_type']:null,
                                      "monthly_salary"=>$data['monthly_salary'],
                                      "joining_date"=>$data['joining_date'],
                                      "biometric_employee_code"=>$data['biometric_employee_code'],
                                  ]);


                              $this->db->table('tbl_project_ward_permission_mstr')
                                  ->where('emp_details_id', '=', $data['emp_details_id'])
                                  ->update(["_status" => 0]);

                              if($data['project_concept_type']=="WARD"){

                                $len = sizeof($data['ward_mstr_id']);
                                for($i=0; $i<$len; $i++){
                                    $project_ward_permission_mstr_id = $this->db->table('tbl_project_ward_permission_mstr')
                                                                      ->select('_id')
                                                                      ->where('emp_details_id', '=', $data['emp_details_id'])
                                                                      ->where('project_mstr_address_id', '=', $data['company_location_id'])
                                                                      ->where('ward_mstr_id', '=', $data['ward_mstr_id'][$i])
                                                                      ->where('_status', '=', 1)
                                                                      ->first();
                                    if($project_ward_permission_mstr_id){
                                        $this->db->table('tbl_project_ward_permission_mstr')
                                                  ->where('_id', '=', $project_ward_permission_mstr_id['_id'])
                                                  ->where('emp_details_id', '=', $data['emp_details_id'])
                                                  ->update([
                                                            "emp_details_id" => $data['emp_details_id'],
                                                            "project_mstr_address_id" => $data['company_location_id'],
                                                            "ward_mstr_id" => $data['ward_mstr_id'][$i],
                                                            "_status" => 1
                                                          ]);
                                    }else{
                                      $this->db->table('tbl_project_ward_permission_mstr')
                                                  ->insert([
                                                            "emp_details_id" => $data['emp_details_id'],
                                                            "project_mstr_address_id" => $data['company_location_id'],
                                                            "ward_mstr_id" => $data['ward_mstr_id'][$i],
                                                            "_status" => 1
                                                          ]);
                                    }
                                }    
                              }

                  							  

                                    // bank details update
                                  $check =  $this->db->table('tbl_emp_bank_details')
                                            ->select('_id')
                                            ->where('emp_details_id', '=', $data['emp_details_id'])
                                            ->where('_status', '=', 1)
                                            ->first();
                                  if($check){
                                      $emp_bank_details_id =  $this->db->table('tbl_emp_bank_details')
                                                                          ->select('_id')
                                                                          ->where('emp_details_id', '=', $data['emp_details_id'])
                                                                          ->where('bank_name', '=', $data['bank_name'])
                                                                          ->where('branch_name', '=', $data['branch_name'])
                                                                          ->where('ifsc_code', '=', $data['ifsc_code'])
                                                                          ->where('account_no', '=', $data['account_no'])
                                                                          ->where('_status', '=', 1)
                                                                          ->first();

                                      if(!$emp_bank_details_id){
                                          $this->db->table('tbl_emp_bank_details')
                                                      ->where('emp_details_id', '=', $data['emp_details_id'])
                                                      ->update(["default_status"=>2, "_status"=>0]);

                                          $this->db->table('tbl_emp_bank_details')
                                              ->insert([
                                                  "emp_details_id"=>$data['emp_details_id'],
                                                  "bank_name"=>$data['bank_name'],
                                                  "branch_name"=>$data['branch_name'],
                                                  "ifsc_code"=>$data['ifsc_code'],
                                                  "account_no"=>$data['account_no'],
                                                  "confirm_account_no"=>$data['confirm_account_no'],
                                                  "default_status"=>1,
                                                  "_status"=>1
                                                ]);
                                      }

                                  }else{
                                    // insert
                                    $this->db->table('tbl_emp_bank_details')
                                            ->insert([
                                                "emp_details_id"=>$data['emp_details_id'],
                                                "bank_name"=>$data['bank_name'],
                                                "branch_name"=>$data['branch_name'],
                                                "ifsc_code"=>$data['ifsc_code'],
                                                "account_no"=>$data['account_no'],
                                                "confirm_account_no"=>$data['confirm_account_no'],
                                                "default_status"=>1,
                                                "_status"=>1
                                              ]);
                                  }
                                  

                                  $result_step_status = $this->db->table('tbl_emp_details')
                                    ->select('_id')
                                    ->where('_id', '=', $data['emp_details_id'])
                                    ->where('step_status', '=', 4)
                                    ->first();

                  							  if($result_step_status){
                  									$result_step_status = $this->db->table('tbl_emp_details')
                  										  ->where('_id', '=', $data['emp_details_id'])
                  										  ->update(['step_status'=>5]);
                  							  }

                                  $data = ['emp_details_id'=>$data['emp_details_id']];
                                  $response = ["response"=>true, "data"=>$data];
                            }else{
                              $data = ['Something Wrong !!!'];
                              $response = ["response"=>false, "data"=>$data];
                            }
                            echo json_encode($response);
                        }else{
                            $data = ['biometric_employee_code'=>"biometric employee code is already exist!!!"];
                            $response = ["response"=>false, "data"=>$data];
                            echo json_encode($response);
                        }
                        
                        
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
      public function empStepSixAddUpdate(){
          $datetime = dateTime();
          //$created_by_emp_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
                $data = postData();
                $errMsg = $this->validateEmployee->empAddUpdateStepSix($data);
                if(empty($errMsg)){
                    try{
                        $resultExistStatus = true;
                        $this->db->beginTransaction();
                        if($data['doc_type_mstr_id']=="0"){
                            $result = $this->db->table('tbl_emp_document_details')
                                            ->select('_id')
                                            ->where('emp_details_id', '=', $data['emp_details_id'])
                                            ->where('other_doc_name', '=', $data['other_doc_name'])
                                            ->where('_status', '=', 1)
                                            ->first();
                            if($result){
                                $resultExistStatus = false;
                            }
                        }else{
                            $result = $this->db->table('tbl_emp_document_details')
                                            ->select('_id')
                                            ->where('emp_details_id', '=', $data['emp_details_id'])
                                            ->where('doc_type_mstr_id', '=', $data['doc_type_mstr_id'])
                                            ->where('_status', '=', 1)
                                            ->first();
                            if($result){
                                $resultExistStatus = false;
                            }
                        }

                        if($resultExistStatus){
          							$result_step_status = $this->db->table('tbl_emp_details')
          								  ->select('_id')
          								  ->where('_id', '=', $data['emp_details_id'])
          								  ->where('step_status', '=', 5)
          								  ->first();
        							  if($result_step_status){
        									$result_step_status = $this->db->table('tbl_emp_details')
        										  ->where('_id', '=', $data['emp_details_id'])
        										  ->update(['step_status'=>6]);
        							  }
                            $emp_document_details_id = $this->db->table('tbl_emp_document_details')
                                                        ->insertGetId([
                                                            'emp_details_id'=>$data['emp_details_id'],
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
                            if($emp_document_details_id){
                                if(isset($_FILES['emp_doc_path'])){
                                    $file = $_FILES['emp_doc_path'];
                                    $path = "emp_documents";
                                    $newFileName = $emp_document_details_id;
                                    $extensions = ['png','jpg','jpeg', 'pdf'];
                                    $photo_status = uploader($file, $path, $newFileName, $extensions);
                                    if($photo_status){
                                        $file_name = $file['name'];
                                        $tmp = explode('.', $file_name);
                                        $file_ext = strtolower(end($tmp));
                                        $doc_path = $path."/".$newFileName.'.'.$file_ext;

                                        $result = $this->db->table('tbl_emp_document_details')
                                                            ->where('_id', '=', $emp_document_details_id)
                                                            ->update([
                                                                'doc_path'=>$doc_path,
                                                                "updated_on"=>$datetime,
                                                                "_status"=>1
                                                            ]);
                                        if($result){
                                            /* $dataTbl = $this->db->table('tbl_emp_document_details')
                                                            ->select('*')
                                                            ->where('_status', '=', 1)
                                                            ->get(); */
                                            $dataTbl = $this->db->table('tbl_emp_document_details')
                                                            ->leftJoin('tbl_doc_type_mstr', 'tbl_emp_document_details.doc_type_mstr_id', '=', 'tbl_doc_type_mstr._id')
                                                            ->select('tbl_emp_document_details._id As emp_document_details_id, tbl_emp_document_details.doc_type_mstr_id As doc_type_mstr_id, tbl_doc_type_mstr.doc_name As doc_name, tbl_emp_document_details.other_doc_name As other_doc_name, tbl_emp_document_details.doc_no As doc_no, tbl_emp_document_details.date_of_issue As date_of_issue, tbl_emp_document_details.place_of_issue As place_of_issue, tbl_emp_document_details.valid_upto As valid_upto, tbl_emp_document_details.doc_path As doc_path')
                                                            ->where('tbl_emp_document_details.emp_details_id', '=', $data['emp_details_id'])
                                                            ->where('tbl_emp_document_details._status', '=', 1)
                                                            ->orderByDesc('tbl_emp_document_details.created_on')
                                                            ->get();

                                            $rows = "";
                                            if($dataTbl){
                                                foreach($dataTbl as $values){
                                                    $emp_document_details_id = $values['emp_document_details_id'];
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
                                                    $doc_view = '<a href="#" class="imagePopUp">
                                                                  <img src="'.$doc_path.'" class="img-md">
                                                                </a>';
                                                    $rows .= "<tr>";
                                                        $rows .= "<td>$doc_type</td>";
                                                        $rows .= "<td>$doc_no</td>";
                                                        $rows .= "<td>$place_of_issue</td>";
                                                        $rows .= "<td>$date_of_issue</td>";
                                                        $rows .= "<td>$valid_upto</td>";
                                                        //$rows .= '<td><a href="'.$doc_path.'" target="_blank" class="btn btn-dark btn-sm">Document View</a></td>';
                                                        $rows .= '<td>'.$doc_view.'</td>';
                                                        $rows .= '<td><button type="button" class="btn btn-success btn-icon" onclick="empDocDeleteFun('.$emp_document_details_id.')"><i class="demo-psi-recycling icon-lg"></i></button></td>';
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
      public function empDocDelete(){
        if(isPost()){
            $data = postData();
            try{
                $this->db->table('tbl_emp_document_details')
                        ->where('emp_details_id', '=', $data['emp_details_id'])
                        ->where('_id', '=', $data['emp_document_details_id'])
                        ->update(["_status"=>0]);

                $dataTbl = $this->db->table('tbl_emp_document_details')
                                ->leftJoin('tbl_doc_type_mstr', 'tbl_emp_document_details.doc_type_mstr_id', '=', 'tbl_doc_type_mstr._id')
                                ->select('tbl_emp_document_details._id As emp_document_details_id, tbl_emp_document_details.doc_type_mstr_id As doc_type_mstr_id, tbl_doc_type_mstr.doc_name As doc_name, tbl_emp_document_details.other_doc_name As other_doc_name, tbl_emp_document_details.doc_no As doc_no, tbl_emp_document_details.date_of_issue As date_of_issue, tbl_emp_document_details.place_of_issue As place_of_issue, tbl_emp_document_details.valid_upto As valid_upto, tbl_emp_document_details.doc_path As doc_path')
                                ->where('tbl_emp_document_details.emp_details_id', '=', $data['emp_details_id'])
                                ->where('tbl_emp_document_details._status', '=', 1)
                                ->orderByDesc('tbl_emp_document_details.created_on')
                                ->get();

                $rows = "";
                if($dataTbl){
                    foreach($dataTbl as $values){
                        $emp_document_details_id = $values['emp_document_details_id'];
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
                        $doc_view = '<a href="#" class="imagePopUp">
                                      <img src="'.$doc_path.'" class="img-md">
                                    </a>';
                        $rows .= "<tr>";
                            $rows .= "<td>$doc_type</td>";
                            $rows .= "<td>$doc_no</td>";
                            $rows .= "<td>$place_of_issue</td>";
                            $rows .= "<td>$date_of_issue</td>";
                            $rows .= "<td>$valid_upto</td>";
                            //$rows .= '<td><a href="'.$doc_path.'" target="_blank" class="btn btn-dark btn-sm">Document View</a></td>';
                            $rows .= '<td>'.$doc_view.'</td>';
                            $rows .= '<td><button type="button" class="btn btn-success btn-icon" onclick="empDocDeleteFun('.$emp_document_details_id.')"><i class="demo-psi-recycling icon-lg"></i></button></td>';
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
	  
	  public function empFinalSubmit(){
	  	$datetime = dateTime();
          //$created_by_emp_details_id = $_SESSION['emp_details']['_id'];
          if(isPost()){
                $data = postData();
                $errMsg = $this->validateEmployee->empFinalSubmit($data);
                if(empty($errMsg)){
                    try{
                        $this->db->beginTransaction();
						
						$result = $this->db->table('tbl_emp_details')
								  ->select('_id, first_name')
								  ->where('_id', '=', $data['emp_details_id'])
								  ->where('user_mstr_id', '=', "0")
								  ->first();
								  
						  if($result){
						  		$user_mstr_id = $this->db->table('tbl_user_mstr')
									->insertGetId([
													"user_pass"=>12345,
													"pass_hint"=>12345,
													"_status"=>1
												]);
								if($user_mstr_id){
                  $first_name = strtolower($result['first_name']);
									$user_name = $first_name."@".$user_mstr_id;
									$result_user_mstr = $this->db->table('tbl_user_mstr')
														  ->where('_id', '=', $user_mstr_id)
														  ->update(['user_name'=>$user_name]);
									if($result_user_mstr){
										$this->db->table('tbl_emp_details')
												  ->where('_id', '=', $data['emp_details_id'])
												  ->update(['user_mstr_id'=>$user_mstr_id]);
                          
                    // finanal submit and update 7 in step completed.   
                    $this->db->table('tbl_emp_details')
                      ->where('_id', '=', $data['emp_details_id'])
                      ->update(['step_status'=>7]);
									}
								}
						  }
						
              $response = ["response"=>true];
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

    public function getWardDetailsByProjectAddress(){
      if(isPost()){
        $data = postData();
          if(!isset($data['project_mstr_address_id']) && $data['project_mstr_address_id']==""){
            $response = ["response"=>false, "data"=>"project_mstr_address_id field is required."];
          }else{
              $emp_details_id = $data['emp_details_id'];
              $project_mstr_address_id = $data['project_mstr_address_id'];
              $state_dist_city_id = $this->db->table('tbl_project_mstr_address')
                                  ->select('state_dist_city_id')
                                  ->where('_id', '=', $project_mstr_address_id)
                                  ->first();
              if($state_dist_city_id){
                  $getWard = $this->db->table('tbl_ward_mstr')
                                  ->select('_id, ward_name')
                                  ->where('state_dist_city_id', '=', $state_dist_city_id['state_dist_city_id'])
                                  ->get();
                  if($getWard){
                    $option = "<option value='' disabled>== SELECT ==</option>";
                    foreach ($getWard as $getValues) {


                      $state_dist_city_id = $this->db->table('tbl_project_ward_permission_mstr')
                                  ->select('_id')
                                  ->where('emp_details_id', '=', $emp_details_id)
                                  ->where('project_mstr_address_id', '=', $project_mstr_address_id)
                                  ->where('ward_mstr_id', '=', $getValues['_id'])
                                  ->where('_status', '=', 1)
                                  ->first();
                      if($state_dist_city_id){
                        $option .= "<option value='".$getValues['_id']."' selected='selected'>".$getValues['ward_name']."</option>";
                      }else{
                        $option .= "<option value='".$getValues['_id']."'>".$getValues['ward_name']."</option>";
                      }
                    }
                    $response = ["response"=>true, "data"=>$option];
                  }else{
                    $response = ["response"=>false, "data"=>"Ward data is not available in"];
                  }
                        
              }else{
                $response = ["response"=>false, "data"=>"Data Not Available."];
              }
          }
          echo json_encode($response);
      }
    }
    public function getJobLocationByProjectMstrId(){
      if(isPost()){
          $data = postData();
          if(!isset($data['project_mstr_id']) || $data['project_mstr_id']==""){
            $result = "Invalid Parameter.";
            $response = ["response"=>false, "data"=>$result];
            echo json_encode($response);
          }else{
            $project_mstr_id = $data['project_mstr_id'];
            $concept_type = $this->db->table('tbl_project_mstr')
                                ->select('concept_type')
                                ->where('_id', '=', $project_mstr_id)
                                ->first();

            $concept_type = $concept_type['concept_type'];

            $result = $this->db->table('tbl_project_mstr_address')
                              ->join('tbl_state_dist_city', 'tbl_state_dist_city._id', '=', 'tbl_project_mstr_address.state_dist_city_id')
                              ->select('tbl_project_mstr_address._id, tbl_state_dist_city.state, tbl_state_dist_city.dist, tbl_state_dist_city.city')
                              ->where('tbl_project_mstr_address.project_mstr_id', '=', $project_mstr_id)
                              ->where('tbl_project_mstr_address._status', '=', 1)
                              ->get();

                              "select tbl_project_mstr_address._id, tbl_state_dist_city.state, tbl_state_dist_city.dist, tbl_state_dist_city.city from tbl_project_mstr_address from tbl_project_mstr_address join tbl_state_dist_city where tbl_project_mstr_address.project_mstr_id=7 AND tbl_project_mstr_address._status=1";
                              // echo '<pre>';print_r($result);return;
            if($result){
              $option = "<option value=''>== SELECT ==</option>";
              foreach ($result as $value) {
                $option .= "<optgroup label='District : ".$value['dist']."'>";
                    $option .= "<option value='".$value['_id']."'>".$value['city']."</option>";
                $option .= "</optgroup>";
              }
              $response = ["response"=>true, "data"=>$option, "concept_type"=>$concept_type];
            }else{
              $result = "Record is not found.";
              $response = ["response"=>false, "data"=>$result];
            }
            echo json_encode($response);
          }
      }
    }
    public function checkMonthlySalaryIsValidOrNot(){
      if(isPost()){
            $data = postData();
            if(isset($data['designation_mstr_id']) && isset($data['employment_type_mstr_id']) && isset($data['work_type']) && isset($data['monthly_salary'])){
              $designation_mstr_id = $data['designation_mstr_id'];
              $employment_type_mstr_id = $data['employment_type_mstr_id'];
              $work_type = $data['work_type'];
              $monthly_salary = $data['monthly_salary'];
              if($designation_mstr_id!="" && $employment_type_mstr_id!="" && $monthly_salary!=0){
                  $grade_mstr_id = $this->db->table("tbl_designation_mstr")
                            ->select("grade_mstr_id")
                            ->where("_id", "=", $data['designation_mstr_id'])
                            ->first();
                  if($grade_mstr_id){
                      $data['grade_mstr_id'] = $grade_mstr_id['grade_mstr_id'];
                      if($work_type==""){
                        $result = $this->db->table("tbl_earning_mstr")
                          ->select("min_salary, max_salary")
                          ->where("employment_type_id", "=", $data['employment_type_mstr_id'])
                          ->where("grade_id", "=", $data['grade_mstr_id'])
                          ->where("_status", "=", 1)
                          ->first();
                      }else{
                        $result = $this->db->table("tbl_earning_mstr")
                          ->select("min_salary, max_salary")
                          ->where("employment_type_id", "=", $data['employment_type_mstr_id'])
                          ->where("grade_id", "=", $data['grade_mstr_id'])
                          ->where("work_type", "=", $data['work_type'])
                          ->where("_status", "=", 1)
                          ->first();
                      }
                      
                      if($result){
                        if($result['min_salary'] <= $monthly_salary && $monthly_salary <= $result['max_salary']){
                          $response = ["response"=>true];
                        }else{
                          $data = 'Please Enter Monthly Salary Between '.$result['min_salary'].' AND '.$result['max_salary'];
                          $response = ["response"=>false, "data"=>$data];
                        }
                      }else{
                        $data = 'According to Designation & Grade, monthly salary not define in Earning & Deduction!!!';
                        $response = ["response"=>false, "data"=>$data];
                      }
                  }else{
                    $data = 'Something Wrong!!';
                    $response = ["response"=>false, "data"=>$data];
                  }
              }else{
                $data = 'Something Wrong!!';
                $response = ["response"=>false, "data"=>$data];
              }
            }else{
              $data = 'Something Wrong!!';
              $response = ["response"=>false, "data"=>$data];
            }
            echo json_encode($response);
      }
    }

    public function getOnReportingEmpDetailsByDesignationId(){
        if(isPost()){
            $data = postData();
            if($data['department_mstr_id']!="" && $data['designation_mstr_id']!=""){
                $department_mstr_id = $this->db->table("tbl_designation_mstr")
                          ->select("department_mstr_id")
                          ->where("_id", "=", $data['designation_mstr_id'])
                          ->where("_status", "=", 1)
                          ->first();
                if($department_mstr_id){
                  $department_mstr_id = $department_mstr_id['department_mstr_id'];

                  $emp_details = $this->db->table("tbl_emp_details")
                            ->select("_id, first_name, middle_name, last_name")
                            ->where("designation_mstr_id", "<", $department_mstr_id)
                            ->where("_status", "=", 1)
                            ->get();

                  if($emp_details){
                    $option = "<option value=''>== SELECT ==</option>";
                    foreach ($emp_details as $value) {
                      $option .= "<option value='".$value['_id']."'>".$value['first_name']." ".$value['middle_name']." ".$value['last_name']."</option>";
                    }
                    $response = ["response"=>true, "data"=>$option];
                  }else{
                    $data = ["Reporting Person Not Available"];
                    $response = ["response"=>false, "data"=>$data];
                  }
                }else{
                  $data = ["Reporting Person Not Available"];
                  $response = ["response"=>false, "data"=>$data];
                }
                

                
            }else{
                $data = ["Something Wrong!!"];
                $response = ["response"=>true, "data"=>$data];
            }

            echo json_encode($response);
        }
    }

  }