<?php
  class form_Controller extends Controller {

    	public function __construct(){
            if(!isLoggedIn()){ redirect('Login'); }
            $this->obj = $this->model('model_job_details');
            $this->model_project_mstr = $this->model('model_project_mstr');
            $this->model_project_mstr_address = $this->model('model_project_mstr_address');
            $this->model_job_post_qualification_details = $this->model('model_job_post_qualification_details');
            $this->model_emp_document_details = $this->model('model_emp_document_details');
            $this->helper('phpMailer');

        }

      // Blank

      public function employee_details(){
            $this->view('pages/employeeDetails_form');
      }


      public function active_job_post_list(){
            $data = (array)null;
            $data["date"] = date("Y/m/d");
            $jobList = $this->obj->career($data);
		    $jobList = JSON_DECODE(JSON_ENCODE($jobList), true);
            $data["jobList"] = $jobList;
            $this->view('pages/active_job_post_list', $data);
       }

       public function job_post_list(){
            $data = (array)null;
            $data["date"] = date("Y/m/d");
		    //$data['user_mstr_id'] = $_SESSION['emp_details']['user_mstr_id'];
		    $jobList = $this->obj->jobList($data);
		    $jobList = JSON_DECODE(JSON_ENCODE($jobList), true);
			$data["jobList"] = $jobList;
            $this->view('pages/job_post_list', $data);
       }
       public function job_details_view($job_post_detail_id=null){
            $data = (array)null;
            $data["job_post_detail_id"]=$job_post_detail_id;
            $job_applied_applicant_view = $this->obj->job_applied_applicant_view($data);
            $job_details_view = $this->obj->job_details_view($data);
           //print_r($job_details_view);
            if($job_details_view){
                $job_details_qualification_view = $this->obj->job_details_qualification_view($job_details_view['job_post_detail_id']);
                //
            }
           $data = $job_details_view;
           $data["id"] = $job_details_view["job_post_detail_id"];
           $data["job_details_qualification_view"] = $job_details_qualification_view;
           $data["job_applied_applicant_view"] = $job_applied_applicant_view;
           //print_r($data);
           $this->view('pages/job_details_view', $data);
            //$job_details_qualification_view = $this->obj->job_details_qualification_view($data);

      }

      public function applied_applicant_list($ID=null){
          $data = (array)null;
          $data["id"]=$ID;
          if(isPost()){
              $data= postData();
              $applied_applicant_list = $this->obj->search_applicant_list($data);
              //print_r($applied_applicant_list);
              $applied_applicant_list = JSON_DECODE(JSON_ENCODE($applied_applicant_list), true);
              $data["applied_applicant_list"] = $applied_applicant_list;
              // echo '<pre>';print_r($data);return;
              $this->view('pages/candidate_list', $data);
          }
          else{
              $applied_applicant_list = $this->obj->applied_applicant_list($data);
              //print_r($applied_applicant_list);
              $applied_applicant_list = JSON_DECODE(JSON_ENCODE($applied_applicant_list), true);
              $data["applied_applicant_list"] = $applied_applicant_list;
              // echo '<pre>';print_r($data);//return;
              $this->view('pages/candidate_list', $data);
          }
      }

      public function stream(){
            $data = (array)null;
            if(isPost()){
            $data= postData();
            $stream = $this->obj->stream($data);
            $stream = json_decode(json_encode( $stream), true);
            //print_r($stream);
			if(!empty($stream)){
				$option = "<option value='0'>SELECT</option>";
				foreach($stream as $value){
					$option .= "<option value='".$value['stream_name_id']."'>".$value['stream_name']."</option>";
				}
				$response = ['response'=>true, 'data'=>$option];
			}else{
				$response = ['response'=>false];
			}
			echo json_encode($response);
         }

	  }

      public function sub_stream(){
            $data = (array)null;
            if(isPost()){
            $data= postData();
            $sub_stream = $this->obj->sub_stream($data);
            $sub_stream = json_decode(json_encode($sub_stream), true);
            //print_r($stream);
			if(!empty($sub_stream)){
				$option = "<option value='0'>SELECT</option>";
				foreach($sub_stream as $value){
					$option .= "<option value='".$value['sub_stream_name_id']."'>".$value['sub_stream_name']."</option>";
				}
				$response = ['response'=>true, 'data'=>$option];
			}else{
				$response = ['response'=>false];
			}
			echo json_encode($response);
         }

	  }
      
      public function jobLocationAccordingToProjectName(){
            $data = (array)null;
            if(isPost()){
            $data= postData();
            $jobLocation = $this->model_project_mstr_address->getProjectAddByProjectMstrId($data['project_name']);
            //print_r($stream);
			if($jobLocation){
				$option = "<option value=''>SELECT</option>";
				foreach($jobLocation as $value){
					$option .= "<option value='".$value['_id']."'>".$value['city']."</option>";
				}
				$response = ['response'=>true, 'data'=>$option];
			}else{
				$response = ['response'=>false];
			}
			echo json_encode($response);
         }

	  }

      public function job_postinsrt($ID=null){
          $data = (array)null;
          $designationList = $this->obj->designationList();
          $designationList = JSON_DECODE(JSON_ENCODE($designationList), true);
          $courseList = $this->obj->courseList();
          $courseList = JSON_DECODE(JSON_ENCODE($courseList), true);         
          $employeeType = $this->obj->employeeType();
          $employeeType = JSON_DECODE(JSON_ENCODE($employeeType), true);
          $project_mstr_list = $this->model_project_mstr->projectMstrList();
          if($ID!=null){
              // update
              if(isPost()){
                  $data= postData();
                  $data["id"]=$ID;
                  $data["job_post_by_emp_detais_id"] = $_SESSION['emp_details']['user_mstr_id'];
                  $jobpost = $this->obj->updateJobPost($data);
                  if($jobpost){
                      // Update all in 1 query set _status = 2 using job_post_details_id
                      $data["id"]=$ID;
                      $updatechangestatus = $this->model_job_post_qualification_details->updatechangestatus($data);
                      $len = sizeof($data['degree']);
                      for($i=0; $i<$len; $i++){
                          $form = [];
                          $job_post_qualification_details_id = $data['job_post_qualification_details_id'][$i];
                          $degree = $data['degree'][$i];
                          $stream = $data['stream'][$i];
                          $sub_stream = $data['sub_stream'][$i];

                          $form["job_post_qualification_details_id"] = $job_post_qualification_details_id;
                          $form["degree"] = $degree;
                          $form["stream"] = $stream;
                          $form["sub_stream"] = $sub_stream;
                          $form["jobpostid"] = $jobpost;
                          $form["id"] = $ID;
                          if($job_post_qualification_details_id==""){
                              // insert
                              $updateinsert = $this->model_job_post_qualification_details->updateinsert($form);
                          }else{
                              $Qualification = $this->model_job_post_qualification_details->updateQualification($form);
                          }

                      }
                      // Update all in 1 query set _status = 0 using job_post_details_id AND _status=2
                      $updatestatuschange = $this->model_job_post_qualification_details->updatestatuschange();
                      //
                      echo "<script> alert(' Job Updated Successfully ');
                        window.location.href = '".URLROOT."/form_Controller/job_post_list';
                       </script>";
                  }
              }
              else{
                  // simple view with Inserted Data
                  $data["id"]=$ID;
                  $data = $this->obj->jobedit($data);
                  $data['location_details_list'] = $this->model_project_mstr_address->getProjectAddByProjectMstrId($data['project_name_id']);
                  $designationList = $this->obj->designationList();
                  $designationList = JSON_DECODE(JSON_ENCODE($designationList), true);
                  /* $jobLocation = $this->obj->jobLocation();
                  $jobLocation = JSON_DECODE(JSON_ENCODE($jobLocation), true); */
                  $employeeType = $this->obj->employeeType();
                  $employeeType = JSON_DECODE(JSON_ENCODE($employeeType), true);
                  $courseList = $this->obj->courseList();
                  $courseList = JSON_DECODE(JSON_ENCODE($courseList), true);
                  $project_mstr_list = $this->model_project_mstr->projectMstrList();
                  $required_qualification_list = $this->model_job_post_qualification_details->job_details_qualification_view($data);
                  $data["courseList"] = $courseList;
                  $data["projectMstrList"] = $project_mstr_list ;
                  //$data["jobLocation"] = $jobLocation ;
                  $data["employeeType"] = $employeeType ;
                  $data["designationList"] = $designationList ;
                  foreach($required_qualification_list as $key => $dValue){
                      $id = $dValue['course_mstr_id'];
                      $sub_course_list = $this->obj->sub_course_list($dValue);
                      //print_r($sub_course_list);// model get Stream data by id
                      $required_qualification_list[$key]['stream_list'] = $sub_course_list;
                      $sub_stream_list = $this->obj->sub_stream_list($dValue);
                      //print_r($sub_stream_list);// model get SUB Stream data by id
                      $required_qualification_list[$key]['sub_stream_list'] = $sub_stream_list;
                  }
                  $data["required_qualification_list"] = $required_qualification_list; // get Required Qualification List
                  //print_r($data);
                  $this->view('pages/job_post_form', $data);

              }


          }else{
              if(isPost()){
                  $data= postData();
                  $data["job_post_by_emp_detais_id"] = $_SESSION['emp_details']['user_mstr_id'];
                  //print_r($data);
                  $checkinsertJobPost = $this->obj->checkinsertJobPost($data);
                  if($checkinsertJobPost){
                      $jobpost = $this->obj->insertJobPost($data);
                      if($jobpost){
                          $data["jobpostid"] = $jobpost;
                          $len = sizeof($data['degree']);
                          for($i=0; $i<$len; $i++){
                              $form = [];
                              $degree = $data['degree'][$i];
                              $stream = $data['stream'][$i];
                              $sub_stream = $data['sub_stream'][$i];
                              $form["degree"] = $degree;
                              $form["stream"] = $stream;
                              $form["sub_stream"] = $sub_stream;
                              $form["jobpostid"] = $jobpost;
                              $Qualification = $this->model_job_post_qualification_details->insertQualification($form);
                          }
                          echo "<script> alert(' Job Posted Successfully ');
                        window.location.href = '".URLROOT."/form_Controller/job_post_list';
                       </script>";
                      }
                  }else{
                        echo "<script> alert('Designation Already Posted.');
                        window.location.href = '".URLROOT."/form_Controller/job_post_list';
                       </script>";
                  }
              }
          }
          $data["projectMstrList"] = $project_mstr_list ;
          $data["courseList"] = $courseList ;
          //$data["jobLocation"] = $jobLocation ;
          $data["employeeType"] = $employeeType ;
          $data["designationList"] = $designationList  ;
          $this->view('pages/job_post_form', $data);
      }


       /* public function candidate_list(){
             $data = (array)null;
		    $candidateList = $this->obj->candidateList();
		    $candidateList = JSON_DECODE(JSON_ENCODE($candidateList), true);
           //print_r($candidateList);
			$data["candidateList"] = $candidateList;
            $this->view('pages/candidate_list', $data);
      } */
        public function registered_candidate_list(){

            $this->view('pages/registered_candidate_list');
      }

      /*public function schedule_interview(){
            $this->view('pages/scheduleInterview');
      }*/

      public function cancel_interview($ID=null, $jobID=null){
            $data = (array)null;
            $data["id"]=$ID;
            $data["jobID"]=$jobID;
            $candidate_cancel_interview = $this->obj->candidate_cancel_interview($data);
            redirect('form_Controller/applied_applicant_list/'.$data["jobID"]);
      }

      public function candidate_profile($ID=null){
            $data = (array)null;
            $data["id"]=$ID;
		    $candidateProfile = $this->obj->candidateProfile($data);
		    $candidateProfile = JSON_DECODE(JSON_ENCODE($candidateProfile), true);
            $candidateDetails = $this->obj->candidateDetails($data);
		    $candidateDetails = JSON_DECODE(JSON_ENCODE($candidateDetails), true);
            $interviewDateTime = $this->obj->interviewDateTime();
		    $interviewDateTime = JSON_DECODE(JSON_ENCODE($interviewDateTime), true);
           //print_r($candidateProfile);
            $data["candidateDetails"] = $candidateDetails;
            $data["interviewDateTime"] = $interviewDateTime;
            $data["candidateProfile"] = $candidateProfile;
            $this->view('pages/candidate_profile', $data);
      }

      public function applyJobStepOne(){
      try{
            $data = (array)null;
            if(isPost()){
			   $data= postData();
                print_r($data);
		        $applyJobStepOne = $this->obj->applyJobStepOne($data);
                if(!empty($applyJobStepOne)){
                    $response = ['response'=>true];
                }else {
                    $response = ['response'=>false];
                }
                echo json_encode($response);
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
      public function interview_status(){
            $this->view('pages/interview_status');
      }
      public function interview_call_status($ID=null){
          $data = (array)null;
          $data["id"] = $ID;
          $interviewStatus = $this->obj->interviewStatus($data);
          $interviewStatus = JSON_DECODE(JSON_ENCODE($interviewStatus), true);
          $data["interviewStatus"] = $interviewStatus;
          $this->view('pages/interview_call_status', $data);
      }

       public function candidate_brief_description($ID=null, $hr=null){
           $data = (array)null;
           $data["id"] = $ID;
           $data["hr"] = $hr;
           $candidate_brief_description = $this->obj->candidate_brief_description($data);
           $candidate_brief_description = JSON_DECODE(JSON_ENCODE($candidate_brief_description), true);
           $candidate_family = $this->obj->candidate_family($data);
           $candidate_family = JSON_DECODE(JSON_ENCODE($candidate_family), true);
           $candidate_qualification = $this->obj->candidate_qualification($data);
           $candidate_qualification = JSON_DECODE(JSON_ENCODE($candidate_qualification), true);
           $candidate_document = $this->obj->candidate_document($data);
        //    $candidate_document = JSON_DECODE(JSON_ENCODE($candidate_document), true);

           //alternate candidate document
           $candidate_document_details = $this->model_emp_document_details->getJoinCandidateDocumentDetailsByCandidateDetailsId($data['id']);
					if($candidate_document_details){
						$data["candidate_document"] = $candidate_document_details;
					}




           $candidate_ex = $this->obj->candidate_ex($data);
           $candidate_ex = JSON_DECODE(JSON_ENCODE($candidate_ex), true);
           $candidate_Prnemployment = $this->obj->candidate_Prnemployment($data);
           $candidate_Prnemployment = JSON_DECODE(JSON_ENCODE($candidate_Prnemployment), true);
           $candidate_Prvemployment = $this->obj->candidate_Prvemployment($data);
           $candidate_Prvemployment = JSON_DECODE(JSON_ENCODE($candidate_Prvemployment), true);
           $candidate_Refemployment = $this->obj->candidate_Refemployment($data);
           $candidate_Refemployment = JSON_DECODE(JSON_ENCODE($candidate_Refemployment), true);
           $data["candidate_Refemployment"] = $candidate_Refemployment;
           $data["candidate_Prvemployment"] = $candidate_Prvemployment;
           $data["candidate_Prnemployment"] = $candidate_Prnemployment;
           $data["candidate_ex"] = $candidate_ex;
        //    $data["candidate_document"] = $candidate_document;
           $data["candidate_qualification"] = $candidate_qualification;
           $data["candidate_family"] = $candidate_family;
           $data["candidate_brief_description"] = $candidate_brief_description;
        //    echo "<pre>";
        //    print_r($data);
        //    return;
           $this->view('pages/candidate_brief_description',$data);
      }

    }