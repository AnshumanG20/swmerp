<?php
  class InterviewProcessController extends Controller {

    	public function __construct(){
            if(!isLoggedIn()){ redirect('Login'); }
            $this->obj = $this->model('model_interview_details');
            $this->model_designation_mstr = $this->model('model_designation_mstr');
            $this->helper('phpMpdf');
            $this->helper('phpMailer');
        }

      public function interview_process_list(){
          $data = (array)null;
          $data['user_mstr_id'] = $_SESSION['emp_details']['designation_mstr_id'];
          $data['company_location'] = $_SESSION['emp_details']['company_location_id'];
          $data['project_name'] = $_SESSION['emp_details']['project_mstr_id'];

          // print_r("user_mstr_id  - ".$data['user_mstr_id']);
          // echo "<br/>";
          // print_r("company_location  - ".$data['company_location']);
          // echo "<br/>";
          // print_r("project_name  - ".$data['project_name']);
        //   return;
          if($data['user_mstr_id']=="9"){ //9 for HR MANAGER
              $interview_process_list = $this->obj->interview_process_list($data);
              
              $interview_process_list = JSON_DECODE(JSON_ENCODE($interview_process_list), true);
              $data["interview_process_list"] = $interview_process_list;
          }

          // print_r($data);
          // return;
          $this->view('pages/interview_process_list', $data);

      }
    //   public function interview_process_list(){
    //     $data = (array)null;
    //     $data['user_mstr_id'] = $_SESSION['emp_details']['designation_mstr_id'];
    //     $data['company_location'] = $_SESSION['emp_details']['company_location_id'];
    //     $data['project_name'] = $_SESSION['emp_details']['project_mstr_id'];

    //     // echo "user_mastr_id ".$data['user_mstr_id'];
    //     // echo "<br/>";
    //     // echo "company_location ".$data['company_location'];
    //     // echo "<br/>";
    //     // echo "project_name ".$data['project_name'];
    //     // echo "<br/>";
    //     // print_r($_SESSION);
    //     // return;
    //     // if($data['user_mstr_id']=="9"){
    //         $interview_process_list = $this->obj->interview_process_list($data);
    //         $interview_process_list = JSON_DECODE(JSON_ENCODE($interview_process_list), true);
    //         $data["interview_process_list"] = $interview_process_list;
    //     // }

    //     // print_r($data["interview_process_list"]);
    // //    foreach($data["interview_process_list"] as $item){
    // //        print_r($item);
    // //        echo "<br/>";
    // //    }
    //     $this->view('pages/interview_process_list', $data);

    // }

    //    public function interview_second_round($ID=null){
    //         $data = (array)null;
    //         $data["current_date"] = dateTime();
    //         $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
    //         $interviewSecondList = $this->obj->interviewSecondList($data);
    //         $interviewSecondList = JSON_DECODE(JSON_ENCODE($interviewSecondList), true);
    //         if($ID!=null){
    //             $data['backid'] = $ID;
    //         }
    //         $data["interviewSecondList"] = $interviewSecondList;
    //         // print_r($data);

    //         //get the list of second round reached candidate
    //         $this->view('pages/interview_second_round', $data);
    //   }
      public function interview_second_round($ID=null){
        $data = (array)null;
        $data["current_date"] = dateTime();
        $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];

        
        // print_r($_SESSION);
        print_r("user_mstr_id - ".$data['user_mstr_id']);
        echo "<br/>";
        print_r("current_date - ".$data['current_date']);
        echo "<br/>";
        print_r("designation - ".$_SESSION["emp_details"]['designation_mstr_id']);
        // echo "<br/><pre>";
        // print_r($_SESSION);

        // return;
        $interviewSecondList = $this->obj->interviewSecondList($data);
        $interviewSecondList = JSON_DECODE(JSON_ENCODE($interviewSecondList), true);
        if($ID!=null){
            $data['backid'] = $ID;
        }
        $data["interviewSecondList"] = $interviewSecondList;
        // print_r($data);

        //get the list of second round reached candidate
        $this->view('pages/interview_second_round', $data);
  }
      public function fetch_candidate_second_round_details(){
          $data = (array)null;
          if(isPost()){
            $data= postData();
           
            if($secondroundList = $this->obj->secondroundList($data)){
            $secondroundList = JSON_DECODE(JSON_ENCODE($secondroundList), true);
            $data["secondroundList"] = $secondroundList;

            if($first_round_remark = $this->obj->first_round_remark($data)){
              $first_round_remark = JSON_DECODE(JSON_ENCODE($first_round_remark), true);
              $data['first_round_remark'] = $first_round_remark;
            }
           
            // echo "<pre>";
            // print_r($data);
            // return;
            $this->view('pages/fetch_candidate_second_round_details', $data);
            
          }

          // echo "<pre>";
          // print_r($data["secondroundList"]);
          // return;
           
              $this->view('pages/fetch_candidate_second_round_details', $data);
         }

      }

       public function second_round_data(){
             $data = (array)null;
             if(isPost()){
              $data= postData();
                $data["current_date"] = dateTime();
                $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
                $secondroundCandidate = $this->obj->secondroundCandidate($data);
		        $secondroundCandidate = JSON_DECODE(JSON_ENCODE($secondroundCandidate), true);
                $secondround = $this->obj->secondround($data);
		        $secondround = JSON_DECODE(JSON_ENCODE($secondround), true);
                $data["secondround"] = $secondround;
                echo "<script>alert('Interview Process Successfully Completed');
                        window.location.href = '".URLROOT."/InterviewProcessController/interview_process_list';
                       </script>";
                redirect("InterviewProcessController/interview_process_list");
            }
          }
      
         public function ajaxItemListByAssetType(){
          if(isPost()){
              $data = postData();
              if(isset($data['asset_type'])){
                $result = $this->obj->get_itemListByAssetType($data['asset_type']);
                 // print_r($result);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['item_name_id']."'>".$value['item_name']."</option>";
                    }

                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'asset type  field is required'];
              }
              echo json_encode($response);
          }
      }
      
      public function ajaxSubItemListByItemList(){
          if(isPost()){
              $data = postData();
              if(isset($data['item_name_id'])){
                $result = $this->obj->get_subitemListByitemList($data['item_name_id']);
                 // print_r($result);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['sub_item_name_id']."'>".$value['sub_item_name']."</option>";
                    }

                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'Item field is required'];
              }
              echo json_encode($response);
          }
      }
      
      public function ajaxModelNoBySubItemList(){
          if(isPost()){
              $data = postData();
              if(isset($data['sub_item_name'])){
                $result = $this->obj->get_modelNoBysubitemList($data['sub_item_name']);
                 $count = $this->obj->get_availablequantityBysubitemList($data['sub_item_name']);
                 // print_r($result);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['model_no_id']."'>".$value['model_no']."</option>";
                    }
                    $avai = $count['count']; // get item available 
                    $response = ['response'=>true, 'data'=>$option, 'available'=>$avai];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'Sub Item field is required'];
              }
              echo json_encode($response);
          }
      }
      
      public function ajaxAvailableQuantityByModelNo(){
          if(isPost()){
              $data = postData();
              if(isset($data['asset_model_no_id'])){
                $result = $this->obj->get_serialNoBymodel($data['asset_model_no_id']);
                $count = $this->obj->get_availablequantityBymodel($data['asset_model_no_id']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['asset_barcode_no']."'>".$value['asset_barcode_no']."</option>";
                    }
                    $avai = $count['count']; // get item available 
                    $response = ['response'=>true, 'data'=>$option, 'available'=>$avai];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'Sub Item field is required'];
              }
              echo json_encode($response);
          }
      }


       public function hr_approval($ID=null)
       {
            $data = (array)null;
            $data["id"] = $ID;
            $hr_approval = $this->obj->hr_approval($data);
            $hr_approval = JSON_DECODE(JSON_ENCODE($hr_approval), true);
            $firstRound_approval = $this->obj->firstRound_approval($data);
            $firstRound_approval = JSON_DECODE(JSON_ENCODE($firstRound_approval), true);
            $secondRound_approval = $this->obj->secondRound_approval($data);
            $secondRound_approval = JSON_DECODE(JSON_ENCODE($secondRound_approval), true);
            $data["hr_approval"] = $hr_approval;
            $data["firstRound_approval"] = $firstRound_approval;
            $data["secondRound_approval"] = $secondRound_approval;
            $this->view('pages/hr_approval', $data);
      }

      public function candidateApproved($ID=null)
       {
          $data = (array)null;
          $data["id"] = $ID;
          $candidateUserId = $this->obj->candidateUserId();
          //print_r($candidateUserId);
          if($candidateUserId){
              $data["candidateUserId"] = $candidateUserId;
              //print_r($data);
              $candidateApproved = $this->obj->candidateApproved($data);
              $candidateApproved = JSON_DECODE(JSON_ENCODE($candidateApproved), true);
              if($candidateApproved){
                  $candidateDetails = $this->obj->candidateDetails($data);
                  $data["candidateDetails"] = $candidateDetails;
                  $data['emply_name'] = $data["candidateDetails"]['first_name']." ".$data["candidateDetails"]['middle_name']." ".$data["candidateDetails"]['last_name'];
                  $data["emp_detais_id"] = $_SESSION['emp_details']['user_mstr_id'];
                  $data["date"] = dateTime();
                  $data['emp'] = $candidateApproved;
                  $data["userFirst_name"] = strtolower($data["candidateDetails"]["first_name"]);
                  $candidateUserUpdate = $this->obj->candidateUserUpdate($data);
                  $empUserPassword = $this->obj->empUserPassword($data);
                  $data["empUserPassword"] = $empUserPassword;
                  $empSuperior = $this->obj->empSuperior($data);
                  $data["empSuperior"] = $empSuperior;
                  $emplyid = $this->obj->emplyid($data);
                  $data["emplyid"] = $emplyid;
                  //print_r($data);
                  $empNotification = $this->obj->empNotification($data);
                  $data['body']= 'Dear <b>'. $data["emply_name"].'</b>,<br>
                         We are all excited to welcome you to our team! <br><br>
                         As agreed, your start date is  <b>'. $data["candidateDetails"]["date_of_joining"].'</b> .
                         We expect you to be in our offices by <b> 09:00 AM </b> and our dress code is business casual.<br><br>
                         At <b> Sri Publication & Stationers Pvt. Ltd. </b>, we care about giving our employees everything they need to perform their best.
                         As you will soon see, we have prepared your workstation with all the necessary equipment.
                         Our team will help you set up your computer, software, and online accounts on your first day. <br><br>
                         We’ve planned your first days to help you settle in properly.
                         As you will see, you will have plenty of time to read and complete your employment paperwork 
                         (HR will be there to help you during this process!) .
                         You will also meet with your hiring manager to discuss your first steps. For your first week,
                         we have also planned a few training sessions to give you a better understanding of our company and operations.<br><br>
                         Our team is excited to meet you and look forward to introducing themselves to you. <br><br>
                         If you have any questions before your arrival, please feel free to email or call me and I’ll be more than happy to help you.<br><br>
                         We are looking forward to working with you and seeing you achieve great things!<br><br>
                         Your user id & password given by organization is <br><br>
                         User Id  : <b>'. $data['empUserPassword']["user_name"].'</b> <br>
                         Password : <b>'. $data['empUserPassword']["user_pass"].'</b> <br><br>';
                  $userPass = userPass($data);
                  if(isPost()){
                      $data= postData();
                      if(isset($data['assetcheckbox']))
                      {
                          $data["date"] = date("Y/m/d");
                          $data['emp'] = $candidateApproved;
                          $data["emp_detais_id"] = $_SESSION['emp_details']['user_mstr_id'];
                          $len = sizeof($data['asset_type']);
                          for($i=0; $i<$len; $i++){
                              $form = [];
                              $emp_id = $data['emp'];
                              $date = $data['date'];
                              $asset_type = $data['asset_type'][$i];
                              $item_name_id = $data['item_name_id'][$i];
                              $sub_item_name = $data['sub_item_name'][$i];
                              $asset_model_no_id = $data['asset_model_no_id'][$i];
                              $quantity = $data['quantity'][$i];
                              $assing_emp_detais_id = $data['emp_detais_id'];
                              $form["emp_id"] = $emp_id;
                              $form["date"] = $date;
                              $form["asset_type"] = $asset_type;
                              $form["item_name_id"] = $item_name_id;
                              $form["sub_item_name"] = $sub_item_name;
                              $form["asset_model_no_id"] = $asset_model_no_id;
                              $form["quantity"] = $quantity;
                              $form["assing_emp_detais_id"] = $assing_emp_detais_id;
                              $addAsset = $this->obj->addAsset($form);
                          }
                      } 

                  }
                 echo "<script>alert('Employee Add And Asset Assign Successfully');
                     window.location.href = '".URLROOT."/InterviewProcessController/interview_process_list';
                  </script>";
               }  
          }
      }

      public function candidateSentOfferLetter($ID=null)
      {
        // echo APPROOT;
        // return;
          $data = (array)null;
          $dataDemo = postInputData();
          $data = postData();

          $data["content"] = $dataDemo["content"];
          $data["id"] =$data['candidate_id'];

          $user_mstr_id = $_SESSION['emp_details']['user_mstr_id'];
          $user_mstr_name = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['middle_name'].' '.$_SESSION['emp_details']['last_name'];
          
          $candidateDetails = $this->obj->candidateDetails($data);

          
          $data["candidateDetails"] = $candidateDetails;
          // echo $data['content'];

          
          $data["userFirst_name"] = $data["candidateDetails"]["candidate_details_id"];
          $fileName = "candidate_offer_letter/".hashEncrypt($data['userFirst_name'].rand(10, 99))."."."pdf";
          $upload_fileName = "file:///C:/xampp/htdocs/swmerp/public/uploads/".$fileName;
          
          // print($$upload_fileName);return;

          $data['file_name'] = $upload_fileName;
          $data["date"] = date("Y/m/d");
          $data["candidateDetails"] = $candidateDetails;
          $data["user_mstr_id"] = $user_mstr_id;
          $data["user_mstr_name"] = $user_mstr_name;
          $data['body']= 'Dear <b>'. $data["candidateDetails"]["first_name"]." ".$data["candidateDetails"]["middle_name"]." ".$data["candidateDetails"]["last_name"].'</b>,<br>
                          This letter is to offer you a position with the Company.
                          It is with great pleasure that we offer you the position of <b>'.$data["candidateDetails"]["designation_name"].'</b>. 
                          Your place of work will be '. $data["candidateDetails"]["permanent_city"].'.  Based on your capabilities and accomplishments,
                          I believe that your talents will not only benefit for Sri Publication & Stationers Pvt. Ltd. but also that our mutual 
                          relationship will assist you in reaching your personal and professional goals. <br><br>

                          Your detailed compensation plan will be given to you at the time of joining. 
                          Your compensation will be Rs <b>'.$data["candidateDetails"]["basic_salary"]*12 .'</b> (CTC). Your compensation will also include Insurance, 
                          Casual, Sick and Privilege leave and other benefits as per corporate policy.<br><br>
                          I am anticipating that you will accept this offer by Date <b>'.$data["candidateDetails"]["date_of_joining"].'</b> Upon joining you will
                          be required to sign an Employment Agreement. You will also be required to submit the following
                          documents on the date of your reporting:
                          <br><br>
                          a.	Copy of PAN Card<br>
                          b.	Adhar card<br>
                          c.	Two passport-sized photographs.<br>
                          d.	Passbook of bank account .<br><br>
                          
                          You will be on probation for six months from the date of your joining.  Your 
                        services will be confirmed in writing after the successful completion of your probation period. <br><br>
                        
                        The probation period may be extended if your performance does not meet expectations.<br><br>
                        Please indicate your acceptance of this offer by signing one copy of this letter in 
                        the space provided below. The additional copy is for your files.  <br><br>
                        
                        <b>'. $data["candidateDetails"]["first_name"]." ".$data["candidateDetails"]["middle_name"]." ".$data["candidateDetails"]["last_name"].'</b>, 
                        I am eagerly looking forward to having you join our team.
                        Should you have any questions, please do not hesitate to contact me.<br><br>
                        Sincerely:<br><br>
                        For Company Name: Sri Publication & Stationers Pvt. Ltd.<br><br>
                        Name of concerned person: <b>'. $data["user_mstr_name"] .'</b><br><br>
                        Please find the pdf of offer letter which is attached with this mail <br><br>';
                        
              // echo '<pre>';print_r($data);exit; 
          
          //echo '<pre>';print_r($data['content']);return;
         createOfferLetterPDF($data);
        
          // print("after offer letter creation");
          $data["file_name"]=$fileName;
          $offerLetter = offerLetter($data);
          if($offerLetter==true)
          {
              $updateOfferLettercandidateDetails = $this->obj->updateOfferLettercandidateDetails($data);
              echo "<script>alert('Offer letter sent Successfully To The Employee');
                window.location.href = '".URLROOT."/InterviewProcessController/interview_process_list';
              </script>";
          }  
      }

      // demo function to check pdf Data
        public function CandidatePdfMaker(){
          if(isPost()){
            $data = postData();
            // echo '<pre>'; print_r($data);return;
          }
        }

      //Demo function end

      public function candidateSentOfferLetterFormat($ID=null)
      {
          $data = (array)null;
          $data["id"] = $ID;
          $this->view('pages/candidateSentOfferLetterFormat',$data);
      }


      public function candidateBerifieDetails()
       {
            $this->view('pages/candidate_berife_details');
      }
      public function interviewScheduleDetailsView($ID=null)
       {
            $data = (array)null;
            $data["id"] = $ID;
            $result = $this->obj->interviewScheduleDetails($data);
            $result = JSON_DECODE(JSON_ENCODE($result), true);
            $interviewRoundScheduleDetails = $this->obj->interviewRoundScheduleDetails($data);
            $interviewRoundScheduleDetails = JSON_DECODE(JSON_ENCODE($interviewRoundScheduleDetails), true);
            $interviewerDetails = $this->obj->interviewerDetails($data);
            $interviewerDetails = JSON_DECODE(JSON_ENCODE($interviewerDetails), true);
            $data["interviewerDetails"] = $interviewerDetails;
            $data["roundScheduleDetail"] = $interviewRoundScheduleDetails;
            $data["ScheduleDetail"] = $result;
          //print_r($interviewRoundScheduleDetails);
            $this->view('pages/interviewScheduleDetailsView',$data);
      }
}