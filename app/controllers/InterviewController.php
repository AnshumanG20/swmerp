<?php
  class InterviewController extends Controller {

    	public function __construct(){
            if(!isLoggedIn()){ redirect('Login'); }
            $this->db = new Database;
            $this->obj = $this->model('model_interview_details');
            $this->model_designation_mstr = $this->model('model_designation_mstr');
            $this->helper('phpMailer');

        }


     public function departmentempnm(){
            $data = (array)null;
            if(isPost()){
            $data= postData();

            //print_r($getdepEmpname);
			if(!empty($data['department_mstr_id'])){
                $len = sizeof($data['department_mstr_id']);
                $option = "<option value=''>SELECT</option>";
                for($i=0; $i<$len; $i++){
                    $department_mstr_id = $data['department_mstr_id'][$i];
                    $departmentname = $this->obj->departmentname($department_mstr_id);
                    //print_r($departmentname);
                    $department_name = $departmentname['dept_name']; // get dynamically data using department_mstr_id
                    $getdepEmpname = $this->obj->getDepEmpNameById($department_mstr_id);
                    if($getdepEmpname){
                        $getdepEmpname = json_decode(json_encode( $getdepEmpname), true);
                        $option .= "<optgroup label='".$department_name."'>";
                        foreach($getdepEmpname as $value){
                            $option .= "<option value='".$value['_id']."'>".$value['first_name']." ".$value['middle_name']." ".$value['last_name']."</option>";
                        }
                        $option .= "</optgroup>";
                   }

                }


				$response = ['response'=>true, 'data'=>$option];
			}else{
				$response = ['response'=>false];
			}
			echo json_encode($response);
         }

	  }

      public function interview_process($ID=null){
            $data = (array)null;
            $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
            print_r("user_mstr_id - ".$data['user_mstr_id']);
		    $interviewcandidateList = $this->obj->interviewcandidateList($data);
		    $interviewcandidateList = JSON_DECODE(JSON_ENCODE($interviewcandidateList), true);
           //print_r($candidateList);
            if($ID!=null){
                $data['backid'] = $ID;
            }
			$data["interviewcandidateList"] = $interviewcandidateList;
        //   print_r($data);
            $this->view('pages/interview_process', $data);
      }

      public function fetch_candidate_hr_round_details(){
             $data = (array)null;
             if(isPost()){
              $data= postData();
                $hrroundList = $this->obj->hrroundList($data);
		        $hrroundList = JSON_DECODE(JSON_ENCODE($hrroundList), true);
                 $data["hrroundList"] = $hrroundList;
                $this->view('pages/fetch_candidate_hr_round_details', $data);
            }
          }

      public function hr_round_details(){
             $data = (array)null;
             if(isPost()){
              $data= postData();
                $data["current_date"] = dateTime();
                $data['user_mstr_id'] = $_SESSION['emp_details']['user_mstr_id'];
                 $hrroundCandidate = $this->obj->hrroundCandidate($data);
		        $hrroundCandidate = JSON_DECODE(JSON_ENCODE($hrroundCandidate), true);
                $hrround = $this->obj->hrround($data);
		        $hrround = JSON_DECODE(JSON_ENCODE($hrround), true);
                if($data["status"]==2){
                $data['email'] = $data['secondEmail'];
                $data['subject']= 'Departmental Round interview for the position of '.$data['secondDesignation'];
                $data['body']= 'Dear '.$data['secondName'].',<br> Congratulation, you have been shortlisted for the Departmental Round
                                interview process for the position of '.$data['secondDesignation'].'.
                                And you have to come for the departmental round interview on:<br>
                                Date :- '.$data["2ndRound_date"].'<br>
                                Time :- '.$data["2ndRoundinterview_time"].'<br><br>
                                Note :- Please report to the venue before the time .
                                <br>';
                     secondRoundInterviewCall($data);
                    if('secondRoundInterviewCall'==true){
                    echo "<script>alert('Second Round Interview Call Letter Sent Successfully');
                        window.location.href = '".URLROOT."/InterviewProcessController/interview_process_list';
                       </script>";
                    }
                 }    
                /* redirect("InterviewProcessController/interview_process_list"); */
            }
          }

      public function interview_list()
       {
            $result = $this->obj->interviewlist();
            $result = JSON_DECODE(JSON_ENCODE($result), true);
            $data["joblist"] = $result;
            //print_r($result);
            $this->view('pages/interview_list', $data);
      }

      public function interviewschedule_add_update($candidateIdDetail=null, $getJobPostDetail=null){
          $data = (array)null;
          $data["date"] = date("Y/m/d");
          if(isPost()){
              $data= postData();
              $data["date"] = date("Y/m/d");
              $data["emp_detais_id"] = $_SESSION['emp_details']['user_mstr_id'];
              $designation_mstr_id = $this->obj->getDesignationMstrIdByJobPostDetailsId($data['job_post_detail_id']);
              $data['designation_mstr_id'] = $designation_mstr_id['designation_mstr_id'];
              $insertscheduleinterview = $this->obj->insertscheduleinterview($data);
              if($insertscheduleinterview){
                  $data["scheduleinterviewid"] = $insertscheduleinterview;
                      $hrinsertscheduleinterview = $this->obj->hrinsertscheduleinterview($data);
                      if($hrinsertscheduleinterview){
                          $data["hrscheduleinterviewid"] = $hrinsertscheduleinterview;
                          $len = sizeof($data['employee_id']);
                          for($i=0; $i<$len; $i++){
                              $form = [];
                              $employee_id = $data['employee_id'][$i];
                              $form["employee_id"] = $employee_id;
                              $form["scheduleinterviewid"] = $insertscheduleinterview;
                              $form["hrscheduleinterviewid"] = $hrinsertscheduleinterview;
                              $hrinterviewerdetails = $this->obj->hrinsertInterviewerdetails($form);
                          }
                      }
                      $len = sizeof($data['department_mstr_id']);
                      for($i=0; $i<$len; $i++){
                          $form = [];
                          $second_round_description = $data["second_round_description"];
                          $second_round_interview_type = $data["second_round_interview_type"];
                          $department_mstr_id = $data['department_mstr_id'][$i];
                          $form["department_mstr_id"] = $department_mstr_id;
                          $form["scheduleinterviewid"] = $insertscheduleinterview;
                          $form["second_round_description"] = $second_round_description;
                          $form["second_round_interview_type"] = $second_round_interview_type;
                          $departmentinsertscheduleinterview = $this->obj->departmentinsertscheduleinterview($form);

                          if($departmentinsertscheduleinterview){
                              $data["departmentinsertscheduleinterviewid"] = $departmentinsertscheduleinterview;
                              $lenn = sizeof($data['dremployee_id']);
                              for($j=0; $j<$lenn; $j++){
                                  $dremployee_id = $data['dremployee_id'][$j];
                                  $check_department_mstr_id = $this->obj->check_department_mstr_id($dremployee_id);
                                  if($department_mstr_id==$check_department_mstr_id['department_mstr_id'])
                                  {
                                    $form = [];
                                    $form["dremployee_id"] = $dremployee_id;
                                    $form["scheduleinterviewid"] = $insertscheduleinterview;
                                    $form["departmentinsertscheduleinterviewid"] = $departmentinsertscheduleinterview;
                                    $departmentinterviewerdetails = $this->obj->departmentinsertInterviewerdetails($form);
                                  }
                              }
                           }
                        }
                  }
                   $data["candidateIdDetailBack"] = $candidateIdDetail;
                   if($data["candidateIdDetailBack"]!=""){

                    flashToast("itSchSuccess","Interview Scheduled Successfully");
                        echo "<script> window.location.href = '".URLROOT."/form_Controller/candidate_profile/".$data['candidateIdDetailBack']."';
                       </script>"; 
                   }
                   flashToast("itSchSuccess","Interview Scheduled Successfully");
                   echo "<script> 
                        window.location.href = '".URLROOT."/InterviewController/interview_list';
                       </script>"; 
            }
          $getJobPostDetail = $this->obj->getJobPostDetailById($getJobPostDetail);
          $getJobPostDetail = JSON_DECODE(JSON_ENCODE($getJobPostDetail),true);
           
        //   echo '<pre>';print_r($getJobPostDetail);
          $j = $getJobPostDetail['job_post_id']??null;
          $d = $getJobPostDetail['designation_mstr_id']??null;
          $p = $getJobPostDetail['project_name_id']??null;
          $postList = $this->obj->postList($data);
          
          //print_r($postList);
          $postList = JSON_DECODE(JSON_ENCODE($postList),true);
          $departmentList = $this->obj->departmentList();
          $departmentList = JSON_DECODE(JSON_ENCODE($departmentList),true);
          $hrList = $this->obj->hrList();
          $hrList = JSON_DECODE(JSON_ENCODE($hrList),true);
          $projectList = $this->obj->projectList();
          $projectList = JSON_DECODE(JSON_ENCODE($projectList),true);
          $locationList = $this->obj->locationList();
          $locationList = JSON_DECODE(JSON_ENCODE($locationList), true);
          $data["candidateIdDetailBack"] = $candidateIdDetail;
          $data["postList"] = $postList;
          $data["departmentList"] = $departmentList;
          $data["hrList"] = $hrList;
          $data["locationList"] = $locationList;
          $data["projectList"] = $projectList;
          if($getJobPostDetail!=null){
            $form = ["designation_mstr_id"=>$d, "project_name_id"=>$p, "job_post_id"=>$j];
            $data['jobPostDetailById'] = $form;//
          }
          $this->view('pages/interviewschedule_add_update',$data);

       }

}