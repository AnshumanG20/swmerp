<?php
  class Candidate extends Controller {

    	function __construct(){
            if(!isLoggedIn()){ redirect('Login'); }
            $this->model_course_mstr = $this->model('model_course_mstr');
            $this->model_department_mstr = $this->model('model_department_mstr');
            $this->model_designation_mstr = $this->model('model_designation_mstr');
            $this->model_employment_type_mstr = $this->model('model_employment_type_mstr');
            $this->model_doc_type_mstr = $this->model('model_doc_type_mstr');
			$this->model_job_details = $this->model('model_job_details');
			$this->helper('phpMailer');
            $this->model_emp_details = $this->model('model_emp_details');
            $this->model_candidate_details = $this->model('model_candidate_details');
            $this->model_emp_family_backbgound = $this->model('model_emp_family_backbgound');
            $this->model_emp_qualification_details = $this->model('model_emp_qualification_details');
            $this->model_emp_present_employment = $this->model('model_emp_present_employment');
            $this->model_emp_previous_employment_details = $this->model('model_emp_previous_employment_details');
            $this->model_emp_references = $this->model('model_emp_references');
            $this->model_emp_document_details = $this->model('model_emp_document_details');
            $this->model_sub_course_mstr = $this->model('model_sub_course_mstr');
        	$this->model_sub_stream_mstr = $this->model('model_sub_stream_mstr');
        	$this->model_state_dist_city = $this->model('model_state_dist_city');
        }

	  public function index(){
		echo smtpmailers();
		//$this->view('pages/candidate_add_update', $data);
	  }
      // Blank
      public function candidateAddUpdate($job_post_detail_id=null, $step=null, $_ID=null){
		//   echo "job_post_detail_id ".$job_post_detail_id;
		//   echo "<br/>";
		//   echo "step ".$step;
		//   echo "<br/>";

		//   echo "_ID ".$_ID;
		//   return;
        if($step==null){
            $step = 1;
        }
		$jobPostDetailsStatus = false;
		if($job_post_detail_id!=null){
			$jobPostDetails = $this->model_job_details->getJobPostDetailsById($job_post_detail_id);
			if($jobPostDetails){
				$jobPostDetailsStatus = true;
			}
		}
		if($jobPostDetailsStatus){
			$course_mstr_list = $this->model_course_mstr->getCourseMstrList();
			$department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
			$employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
			$doc_type_mstr_list = $this->model_doc_type_mstr->getDocTypeMstrList();
			$data = array(null);
			if($_ID!=null){
				$empDetails = $this->model_emp_details->getEmpDetailsById($_ID);
				if($empDetails){
					$data = $empDetails;
					$designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
					if($designation_mstr_list){
						$data['designation_mstr_list'] = $designation_mstr_list;
					}
					$emp_family_backbgound = $this->model_emp_family_backbgound->getEmpFamilyBackbgoundByEmpDetailsId($data['_id']);
					if($emp_family_backbgound){
						$data['emp_family_backbgound'] = $emp_family_backbgound;
					}
					$emp_qualification_details = $this->model_emp_qualification_details->getEmpQualificationDetailsByEmpDetailsId($data['_id']);
					if($emp_qualification_details){
						foreach ($emp_qualification_details as $key => $value) {
	                        $sub_course_mstr_list = $this->model_sub_course_mstr->getSubCourseByCourseMstrId($value['course_mstr_id']);
	                        $sub_stream_mstr_list = $this->model_sub_stream_mstr->getSubStreamBySubCourseMstrId($value['sub_course_mstr_id']);
	                        $emp_qualification_details[$key]['sub_course_mstr_list'] = $sub_course_mstr_list;
	                        $emp_qualification_details[$key]['sub_stream_mstr_list'] = $sub_stream_mstr_list;
	                    }

						$data['candidate_qualification_details'] = $emp_qualification_details;
					}
					$emp_present_employment = $this->model_emp_present_employment->getEmpPresentEmploymentByEmpDetailsId($data['_id']);
					if($emp_present_employment){
						$data['emp_present_employment'] = $emp_present_employment;
					}
					$emp_previous_employment_details = $this->model_emp_previous_employment_details->getEmpPreviousEmploymentDetailsByEmpDetailsId($data['_id']);
					if($emp_present_employment){
						$data['emp_previous_employment_details'] = $emp_previous_employment_details;
					}
					$emp_references = $this->model_emp_references->getEmpReferencesByEmpDetailsId($data['_id']);
					if($emp_references){
						$data['emp_references'] = $emp_references;
					}
					$emp_document_details = $this->model_emp_document_details->getJoinEmpDocumentDetailsByEmpDetailsId($data['_id']);
					if($emp_document_details){
						$data['emp_document_details'] = $emp_document_details;
					}
				}else{
					$data = ["job_post_details"=> "In url, Pass wrong parameters!!"];
					$this->view('pages/404', $data);
					die();
				}
			}
			$data['job_post_details'] = $jobPostDetails;
			$data['course_mstr_list'] = $course_mstr_list;
			$data['department_mstr_list'] = $department_mstr_list;
			$data['employment_type_mstr_list'] = $employment_type_mstr_list;
			$data['doc_type_mstr_list'] = $doc_type_mstr_list;
			$data['step'] = $step;
			//print_r($data);
			$this->view('pages/candidate_add_update', $data);
		}else{
			$data = ["job_post_details"=> "In url, Pass wrong parameters!!"];
			$this->view('pages/404', $data);
		}
      }

      public function ajaxDeptListByJobPostId(){
          if(isPost()){
              $data = postData();
              if(isset($data['job_post_details_id'])){
                $job_post_list = $this->model_job_details->getDeptListByJobPostId($data['job_post_details_id']);
                if($job_post_list){
                    $response = ["response"=>true, "data"=>$job_post_list];
                }else{
                    $response = ["response"=>false, "data"=>'Data Not Exist'];
                }
              }else{
                $response = ["response"=>false, "data"=>'job_post_details_list field is required'];
              }
              echo json_encode($response);
          }
      }

	  public function get_dist_state(){

		if(isPost()){
            $data=postData();
            $city = $data['city'];
           
        }
		$result = $this->model_state_dist_city->get_dist_state($city);
		echo json_encode($result,true);
	  }
      public function walkincandidateAddUpdate($job_post_detail_id=null, $step=null, $_ID=null){
          if(!isLoggedIn()){ redirect('Login'); }

		  if($job_post_detail_id=="deactivate"){
			if(isPost()){
				$deactivate_comment = postData();
				// print_r($deactivate_comment);
				// return;
			}
			$DeleteResult = $this->model_candidate_details->deactivateCandidate($deactivate_comment['reason_comment'],$_ID);
			flashToast("candidateDeactivateSuccess","Canditate Deactivated Successfully");
			redirect('Reports/candidateReport_list');
		  }
		  if($job_post_detail_id=="activate"){
			
			$DeleteResult = $this->model_candidate_details->activateCandidate($_ID);

			flashToast("candidateActivateSuccess","Canditate Activated Successfully");
			redirect('Reports/candidateReport_list');
		  }

		
		// echo "<pre>";
		// print_r($data['city_list']);
		// return;
		
		 
        if($step==null){
            $step = 1;
        }
		$jobPostDetailsStatus = false;
		if($job_post_detail_id!=null){
			
			$jobPostDetails = $this->model_job_details->getJobPostDetailsById($job_post_detail_id);
			if($jobPostDetails){
				$jobPostDetailsStatus = true;
			}
		}
		if($jobPostDetailsStatus){
			
			$course_mstr_list = $this->model_course_mstr->getCourseMstrList();
			$department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
			$employment_type_mstr_list = $this->model_employment_type_mstr->getEmploymentTypeMstrList();
			$doc_type_mstr_list = $this->model_doc_type_mstr->getDocTypeMstrList();
			$data = array(null);
			if($_ID!=null){
				
				$empDetails = $this->model_candidate_details->getEmpDetailsByIdForEdit($_ID);
				if($empDetails){
			// 		echo "inside employee details -- ";
			// echo "job_post_details_id ".$job_post_detail_id;
			// echo "step ".$step;
			// echo "_ID ".$_ID;
			// return;

					$data = $empDetails;
					$designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
					if($designation_mstr_list){
						$data['designation_mstr_list'] = $designation_mstr_list;
					}
					$emp_family_backbgound = $this->model_emp_family_backbgound->getCandidateFamilyBackbgoundByEmpDetailsId($data['_id']);
					if($emp_family_backbgound){
						$data['candidate_family_backbgound'] = $emp_family_backbgound;
					}
					$emp_qualification_details = $this->model_emp_qualification_details->getCandidateQualificationDetailsByEmpDetailsId($data['_id']);
					if($emp_qualification_details){
						foreach ($emp_qualification_details as $key => $value) {
							$sub_course_mstr_list = $this->model_sub_course_mstr->getSubCourseByCourseMstrId($value['course_mstr_id']);
							$sub_stream_mstr_list = $this->model_sub_stream_mstr->getSubStreamBySubCourseMstrId($value['sub_course_mstr_id']);
							$emp_qualification_details[$key]['sub_course_mstr_list'] = $sub_course_mstr_list;
							$emp_qualification_details[$key]['sub_stream_mstr_list'] = $sub_stream_mstr_list;
						}
						$data['candidate_qualification_details'] = $emp_qualification_details;
					}
					$emp_present_employment = $this->model_emp_present_employment->getCandidatePresentEmploymentByEmpDetailsId($data['_id']);
					if($emp_present_employment){
						$data['candidate_present_employment'] = $emp_present_employment;
						$data['candidate_present_employment']['present_date_of_joining_from'] = substr($data['candidate_present_employment']['present_date_of_joining_from'], 0, -3);
						$data['candidate_present_employment']['present_date_of_joining_to'] = substr($data['candidate_present_employment']['present_date_of_joining_to'], 0, -3);
						
					}
					$emp_previous_employment_details = $this->model_emp_previous_employment_details->getCandidatePreviousEmploymentDetailsByEmpDetailsId($data['_id']);
					if($emp_present_employment){
						$data['candidate_previous_employment_details'] = $emp_previous_employment_details;
					}
					$emp_references = $this->model_emp_references->getCandidateReferencesByEmpDetailsId($data['_id']);
					if($emp_references){
						$data['candidate_references'] = $emp_references;
					}
					$emp_document_details = $this->model_emp_document_details->getJoinCandidateDocumentDetailsByCandidateDetailsId($data['_id']);
					if($emp_document_details){
						$data['candidate_document_details'] = $emp_document_details;
					}
				}else{
					$data = ["job_post_details"=> "In url, Pass wrong parameters!!"];
					$this->view('pages/404', $data);
					die();
				}
			}
			$data['job_post_details'] = $jobPostDetails;
			$data['course_mstr_list'] = $course_mstr_list;
			$data['department_mstr_list'] = $department_mstr_list;
			$data['employment_type_mstr_list'] = $employment_type_mstr_list;
			$data['doc_type_mstr_list'] = $doc_type_mstr_list;
			$data['step'] = $step;

			$city_list = $this->model_state_dist_city->getAllCity();
			if($city_list){
				$data['city_list']=$city_list;
			}
			$state_list = $this->model_state_dist_city->getState();
			if($state_list){
				$data['state_list']=$state_list;
			}

			// echo "data after";
			// echo "<pre>";
			// print_r($data);
			// return;
			
			$this->view('pages/walkin_candidate_add_update', $data);
		}else{
			$data = ["job_post_details"=> "In url, Pass wrong parameters!!"];
			$this->view('pages/404', $data);
		}
      }


      public function empList(){
        $this->view('pages/emp_list');
      }
  }