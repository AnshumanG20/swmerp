<?php
  class phpMailer extends Controller {

      function __construct(){
          $this->obj = $this->model('model_job_details');
          $this->helper('phpMailer');
          $this->helper('phpMpdf');
      }
	  
      public function index(){

          if(isPost()){
              $data= postData();
              //print_r($data);
              $interviewPlace = $this->obj->interviewPlace($data);
		      $interviewPlace = JSON_DECODE(JSON_ENCODE($interviewPlace), true);
              $data['place_name']=$interviewPlace["city"];
              $postName = $this->obj->postName($data);
		      $postName = JSON_DECODE(JSON_ENCODE($postName), true);
              $employmentType = $this->obj->employmentType($data);
		      $employmentType = JSON_DECODE(JSON_ENCODE($employmentType), true);
              $data['employmentType'] = $employmentType['employment_type'];
              $data['designation_name']=$postName["designation_mstr_designation_name"];
              $data['name_id']=$data['name_id'];
              $data['from']=$data['email_id'];
            //   $data['to']=$data['email_id'];
              
              $data['company_name']=$data['company_name'];
              $data['name']=$data['name'];
              $data['place_of_interview']=$data['place_of_interview'];
              $data['post_name']=$data['post_name'];
              $data['interview_date']=$data['interview_date'];
              $data['interview_time']=$data['interview_time'];
              $data['work_from1']=$data['work_from1'];
              $data['subject']= 'Intimation for '.$data['employmentType'].' interview for the position of '.$data['designation_name'];
            //   $data['body']= 'Dear '.$data['name'].',<br> Congratulation, you have been shortlisted for the '.$data['employmentType'].' interview process for the position '.$data['designation_name'].' <br></p>
            //               The venue and the date and time of interview is mentioned here with:<br><br>
            //               Venue :- '.$data['place_name'].'<br>
            //               Date :- '.$data["interview_date"].'<br>
            //               Time :- '.$data["interview_time"].'<br><br>
            //               Note :- Please report to the venue, 1 Hour before the time of '.$data['employmentType'].' interview for verification purpose. <br>
            //               <br>Job Description : <br><br>
            //               '.$data["work_from1"].'
            //               <br><br>
            //               Please click any one link which is given below : <br><br>
            //               <a href="http://203.129.217.60/sri/phpMailer/interview_accept/'.$data['name_id'].'"><u>Yes, I Am Interested</u></a> <br>
            //               <a href="http://203.129.217.60/sri/phpMailer/interview_reject/'.$data['name_id'].'"><u>No, I AM Not Interested</u></a> <br>
            //               <a href="http://203.129.217.60/sri/phpMailer/interview_reshedule/'.$data['name_id'].'"><u>Want To Reschedule Interview Date</u></a> <br><br><br>
            //               With Regards, <br><br>
            //               Company Name : '.$data["company_name"].'<br>
            //               Address : '.$data['place_name'].'<br>
            //               Contact No : <br>
            //               Email Id : <br><br>';

            $data['body']= 'Dear '.$data['name'].',<br> Congratulation, you have been shortlisted for the '.$data['employmentType'].' interview process for the position '.$data['designation_name'].' <br></p>
                          The venue and the date and time of interview is mentioned here with:<br><br>
                          Venue :- '.$data['place_name'].'<br>
                          Date :- '.$data["interview_date"].'<br>
                          Time :- '.$data["interview_time"].'<br><br>
                          Note :- Please report to the venue, 1 Hour before the time of '.$data['employmentType'].' interview for verification purpose. <br>
                          <br>Job Description : <br><br>
                          '.$data["work_from1"].'
                          <br><br>
                          Please click any one link which is given below : <br><br>
                          <a href="'.URLROOT.'/phpMailer/interview_accept/'.$data['name_id'].'"><u>Yes, I Am Interested</u></a> <br>
                          <a href="'.URLROOT.'/phpMailer/interview_reject/'.$data['name_id'].'"><u>No, I AM Not Interested</u></a> <br>
                          <a href="'.URLROOT.'/phpMailer/interview_reshedule/'.$data['name_id'].'"><u>Want To Reschedule Interview Date</u></a> <br><br><br>
                          With Regards, <br><br>
                          Company Name : '.$data["company_name"].'<br>
                          Address : '.$data['place_name'].'<br>
                          Contact No : <br>
                          Email Id : <br><br>';

                        //   echo "<br/><pre>";
                        //   print_r($data);
                        //   return;
              phpMailer($data);
              if('phpMailer'==true)
              {
                  $data['name']=$data['name_id'];
                  $data['place_of_interview']=$data['place_of_interview'];
                  $data['post_name']=$data['post_name'];
                  $data['interview_date']=$data['interview_date'];
                  $data['interview_time']=$data['interview_time'];
                  $data["created_on"] = $data["created_on"];
                  $interviewCallStatus = $this->obj->interviewCallStatus($data);
                  $interviewCall = $this->obj->interviewCall($data);
                  $interviewCall = JSON_DECODE(JSON_ENCODE($interviewCall), true);
                  if($interviewCall==1){
                      echo "<script>alert('Interview call letter sent Successfully');
                        window.location.href = '".URLROOT."/form_Controller/job_post_list';
                       </script>";

                  }

              }
        }
    }

      public function interview_accept($ID=null){
          $data = (array)null;
          $data["id"] = $ID;
          $check_status = $this->obj->check_status($data);
          //print_r($check_status);
          if($check_status["_status"]!="2"){
              echo "You have allready Respond To This Mail...";
          } else {
              $interview_accept = $this->obj->interview_accept($data);
              $interview_accept_status = $this->obj->interview_accept_status($data);
              $this->view('pages/interview_status', $data);
          }
      }

      public function interview_reject($ID=null){
          $data = (array)null;
          $data["id"] = $ID;
          $check_status = $this->obj->check_status($data);
          //print_r($check_status);
          if($check_status["_status"]!="2"){
              echo "You have allready Respond To This Mail...";
          } else {
              $interview_reject = $this->obj->interview_reject($data);
              $interview_reject_status = $this->obj->interview_reject_status($data);
              $this->view('pages/interview_status', $data);
          }
      }

      public function interview_reshedule($ID=null){
          $data = (array)null;
          $data["id"] = $ID;
          $check_status = $this->obj->check_status($data);
          if($check_status["_status"]!="2"){
                 echo "You have allready Respond To This Mail...";
          } else {
              $interview_reshedule = $this->obj->interview_reshedule($data);
              $interview_reshedule_status = $this->obj->interview_reshedule_status($data);
              $this->view('pages/interview_status', $data);
          }
      }

      public function reschedule_interview(){

          if(isPost()){
              $data= postData();
              //print_r($data);

              $interviewcallDetails = $this->obj->interviewcallDetails($data);

		      $interviewcallDetails = JSON_DECODE(JSON_ENCODE($interviewcallDetails), true);
              $data['place_name']=$interviewcallDetails["city"];
              $data['job_post_detail_id'] = $interviewcallDetails["job_post_details_id"];
              $employmentType = $this->obj->employmentType($data);
              
		          $employmentType = JSON_DECODE(JSON_ENCODE($employmentType), true);
              $data['employmentType'] = $employmentType['employment_type'];
              $data['designation_name']=$interviewcallDetails["designation_name"];
              $data['name_id']=$data['name_id'];
              $data['from']=$data['email_id'];
              $data['company_name']=$data['company_name'];
              $data['name']=$data['name'];
              $data['place_of_interview']=$interviewcallDetails['interview_venue_id'];
              $data['post_name']=$interviewcallDetails['designation_id'];
              $data['interview_date']=$data['interview_reschedule_date'];
              $data['work_from1']=$data['interview_reschedule_remarks'];
              $data['subject']= 'Reschedule for '.$data['employmentType'].' interview for the position of '.$data['designation_name'];
              $data['body']= 'Dear '.$data['name'].',<br> Your reschedule application for the '.$data['employmentType'].' interview process for the position '.$data['designation_name'].' are accepted<br></p>
                          The reschedule venue and the date and time of interview is mentioned here with:<br>
                          Venue :- '.$data['place_name'].'<br>
                          Date :- '.$data["interview_date"].'<br>
                          <br>
                          Note :- Please report to the venue, 1 Hour before the time of '.$data['employmentType'].' interview for verification purpose. <br>
                          Job Description : <br>
                          '.$data["work_from1"].'
                          <br><br>
                          Please click any one link which is given below : <br>
                          <a href="'.URLROOT.'/phpMailer/interview_accept/'.$data['name_id'].'"><u>Yes, I Am Interested</u></a> <br>
                          <a href="'.URLROOT.'/phpMailer/interview_reject/'.$data['name_id'].'"><u>No, I AM Not Interested</u></a> <br>
                          With Regards, <br><br>
                          Company Name : '.$data["company_name"].'<br>
                          Address : '.$data['place_name'].'<br>
                          <br><br>';
                          
             reSchedule($data);
              if('reSchedule'==true)
              {
                  $data['name']=$data['name_id'];
                  $data['place_of_interview']=$interviewcallDetails['interview_venue_id'];
                  $data['post_name']=$interviewcallDetails['designation_id'];
                  $data['interview_date']=$data['interview_date'];
                  $data['interview_time']=null;
                  $data["created_on"] = dateTime();
                  $interviewCallStatus = $this->obj->interviewCallStatus($data);
                  $interviewCall = $this->obj->interviewCall($data);
                  $interviewCall = JSON_DECODE(JSON_ENCODE($interviewCall), true);
                  if($interviewCall==1){
                      echo "<script>alert('Reschedule Interview call letter sent Successfully');
                        window.location.href = '".URLROOT."/form_Controller/job_post_list';
                       </script>";

                  }

              }
        }
    }



     /*  public function offer_letter_pdf()
      {
          $data = array(null);
          $fileName = "1.pdf";
          $fileName = "c:/xampp/htdocs/sri/public/uploads/candidate_offer_letter/".$fileName;
          $data = ['file_name'=>$fileName];
         createOfferLetterPDF($data);
         $offerLetter = offerLetter($data);
         if($offerLetter==true)
         {
             echo "<script>alert('Interview call letter send Successfully');</script>";
         } 

    } */
}