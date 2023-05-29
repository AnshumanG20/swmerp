<?php 
class Termination extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_termination = $this->model('model_termination');
        $this->obj = $this->model('model_resignation');
        $this->helper('phpMailer');
        $this->helper('phpMpdf');
    }
    public function add_update_termination()
    {
        $data = array(null);
        //Gate Employee Name
        $id = $_SESSION['emp_details']['_id'];
        $designation_mstr_id = $_SESSION['emp_details']['designation_mstr_id'];
        $company_location_id = $_SESSION['emp_details']['company_location_id'];
        $project_mstr_id = $_SESSION['emp_details']['project_mstr_id'];
        $data['id'] = $id;
        $data['designation_mstr_id'] =$designation_mstr_id;
        $data['company_location_id'] = $company_location_id;
        $data['project_mstr_id'] = $project_mstr_id;

        print_r($data['designation_mstr_id']);
        if($data['designation_mstr_id']=='9'){
            $employee_name = $this->model_termination->gate_employee_name($data);
            $employee_name = json_decode(json_encode($employee_name),true);
            // echo '<pre>';print_r($employee_name);return;
            $emp =null;
            if($employee_name)
            {
                $data['emp'] = $employee_name;

                
            }
        }
        if(isPost())
        {
            $data = postData();
            
            $data['id'] = $id;
            $data['designation_mstr_id'] =$designation_mstr_id;
            $data['company_location_id'] = $company_location_id;
            $data['project_mstr_id'] = $project_mstr_id;

            //Gate Reporting Person
            $reporting_person = $this->model_termination->gate_designation_mstr_id($data);
            // echo '<pre>';print_r($reporting_person);return;
         //  print_r($reporting_person);
            if($reporting_person)
            {
                //Termination Notification To Employee
               $employee_termination = $this->model_termination->add_update_termination($data);
                if(isset($reporting_person['head_id']))
                { 
                     //Notification To Head
                    $data['head_id'] = $reporting_person['head_id'];
                    //Insert Termination Details
                    $termination = $this->model_termination->sent_termination_notification_to_head($data);
                }
                if(isset($reporting_person['inventory_id']))
                {
                       //Notification To Inventory
                  $data['inventory_id'] = $reporting_person['inventory_id'];
                    //Insert Termination Details
                  $termination = $this->model_termination->sent_termination_notification_to_inventory($data);
                 // print_r($termination);
                }
                if($employee_termination)
                {
                  echo "<script>alert('Employee Terminated Successfully!!');</script>";
                  $data['emp'] = $employee_name;
                  $this->view('pages/termination_employee',$data);
                }
                else
                {
                 echo "<script>alert('Something Is Wrong');</script>";
                 $this->view('pages/termination_employee',$data);
                }
            }
           else
            {
              echo "<script>alert('Reporting Person Does Not Exists');</script>";
              $data['emp'] = $employee_name;
              $this->view('pages/termination_employee',$data);
            }
        }
       else
       {
        // echo '<pre>';print_r($data);return;
        $this->view('pages/termination_employee',$data);
       }

    }
    public function employee_asset_details($id=null)
    {
        $data = (array)null;
        $data["id"] = $id;
        if($this->model_termination->check_employee_asset_details_inventory($data)){
          redirect('DashboardCommon/Dash');
        }else{
          $employee_details = $this->model_termination->employee_asset_details($data);
          $employee_asset_list = $this->model_termination->employee_asset_list($data);
          $data["employee_details"] = $employee_details;
          $data["employee_asset_list"] = $employee_asset_list;
            //print_r($data);
          $this->view('pages/inventory_notification', $data);
        } 
    }
    public function head_notification($id=null)
    {
        $data = (array)null;
        $data['id'] = $id;
        if($this->model_termination->check_employee_asset_details($data)){
          redirect('DashboardCommon/Dash');
        }else{
          $performance = $this->model_termination->employee_asset_details($data);
          //Quit Table Details
          $termination = $this->model_termination->employee_notification($data);
          $data = $termination;
          // print_r($performance);
          $data['performance'] = $performance;
          $this->view('pages/employee_performance_feadback_by_head',$data);
        }
    }
    public function employee_notification($id=null)
    {
        $data = (array)null;
        $data['id'] = $id;
        $termination = $this->model_termination->employee_notification($data);
        /*$data['termination'] = $termination;*/
        $data = $termination;
       // print_r($data);
        $this->view('pages/employee_termination',$data);
    }
    public function termination_employee_performance()
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();
            $created_by = $_SESSION['emp_details']['_id'];
            $data['created_by'] = $created_by;
            $data["hremp_id"] = $_SESSION['emp_details']['_id'];
            $notification_disable = $this->obj->notification_disable($data);
            $performance = $this->model_termination->termination_employee_performance($data);
            flashToast('dashboard', 'Feadback Recorded!!');
            redirect('Dashboard');
            //print_r($data);
        }
    }
    
     public function emp_termination_inventory_notification(){
           $data = (array)null;
           if(isPost()){
               $data= postData();
               $data["date"] = dateTime();
               $data["rpInventoryemp_id"] = $_SESSION['emp_details']['_id'];
               $data["hremp_id"] = $_SESSION['emp_details']['_id'];
               $notification_disable = $this->obj->notification_disable($data);
               $len = sizeof($data['assets_name']);
               for($i=0; $i<$len; $i++){
                   $form = [];
                   $date = $data['date'];
                   $rpInventoryemp_id = $data['rpInventoryemp_id'];
                   $quit_id = $data['quit_id'];
                   $assets_name = $data['assets_name'][$i];
                   $assets_sub_name = $data['assets_sub_name'][$i];
                   $assets_serial_no = $data['assets_serial_no'][$i];
                   $condition = $data['condition'][$i];
                   $penalty = $data['penalty'][$i];
                   $form["assets_name"] = $assets_name;
                   $form["assets_sub_name"] = $assets_sub_name;
                   $form["assets_serial_no"] = $assets_serial_no;
                   $form["condition"] = $condition;
                   $form["penalty"] = $penalty;
                   $form["quit_id"] = $quit_id;
                   $form["date"] = $date;
                   $form["rpInventoryemp_id"] = $rpInventoryemp_id;
                   //print_r($form);
                   $emp_termination_inventory_notification = $this->model_termination->emp_termination_inventory_notification($form);
                   if($emp_termination_inventory_notification){
                        $employee_asset_update = $this->model_termination->employee_asset_update($data);
                   }
               }

               $emp_termination_inventory_notification_detail = $this->model_termination->emp_termination_inventory_notification_detail($data);
               flashToast('dashboard', 'Assets received Successfully !!!');
               redirect('Dashboard');
            }
       }

    
    public function terminationinventoryAssetSubmissionDone($ID=null){
            $data = (array)null;
            $data["id"] = $ID;
            if($this->model_termination->checkTerminationinventoryAssetSubmissionDone($data)){
              redirect('DashboardCommon/Dash');
              
            }else{
              $terminationinventoryAssetSubmissionDone = $this->model_termination->terminationinventoryAssetSubmissionDone($data);
              $data["terminationinventoryAssetSubmissionDone"] = $terminationinventoryAssetSubmissionDone;
              $this->view('pages/terminationinventoryAssetSubmissionDone', $data);
            }
      }

      public function terminationfinalSettlment(){
            $data = (array)null;
            if(isPost()){
               $data= postData();
               $data["date"] = dateTime();
               $data["rpHremp_id"] = $_SESSION['emp_details']['_id'];
               $data["hremp_id"] = $_SESSION['emp_details']['_id'];
               $notification_disable = $this->obj->notification_disable($data);
               $terminationfinalSettlmentdate = $this->model_termination->terminationfinalSettlmentdate($data);
                if($terminationfinalSettlmentdate)
                {
                    $data['email'] = $data['email_id'];
                    $data['emp_name'] = $data['emp_name'];
                    $data['penalty'] = $data['net_penalty'];
                    $data['finalDate'] = $data['settlment_date'];
                    $data['subject']= 'Full and final settlment of account';
                    $data['body']= 'Dear '.$data['emp_name'].',<br>You have submitted all assets successfull.
                                Your Penalty amount is '.$data['penalty'].'.
                                And your final account settlment date is : '.$data['finalDate'].'.<br>
                                <br><br>
                                Note :- Please check your account on given final settlment date or consult with account department. 
                                <br>';
                    $result = fullNdFinalSettlment($data);
                    if($result){
                       flashToast('dashboard', 'Full and final settlment date sent to employee mail and notification to the account department');
                        redirect('Dashboard');
                    }

                }
        }
    }
    
    public function termination_List(){
        $data = (array)null;
        $termination_List = $this->model_termination->termination_List();
        $data["termination_List"] = $termination_List;
        $this->view('pages/termination_List', $data);
    }
    public function generate_experience_letter($ID=null){
        $data = (array)null;
        $data["_id"] = $ID;
        $data["hremp_id"] = $_SESSION['emp_details']['_id'];
        $signatureEmp = $this->model_termination->signatureEmp($data);
        $data["signatureEmp"] = $signatureEmp;
        $emp_experience = $this->model_termination->emp_experience($data);
        $data["emp_experience"] = $emp_experience;
        $data["userFirst_name"] = $data["emp_experience"]["_id"];
        $fileName = hashEncrypt($data['userFirst_name'])."."."pdf";
        $subFileName = $fileName;
        $fileName = "c:/xampp/htdocs/swmerp/public/uploads/experience_letter/".$fileName;
        $data['file_name'] = $fileName;
        $data['sub_file_name'] = "experience_letter/".$subFileName;
        $data["date"] = date("Y/m/d");
        createExperienceLetterPDF($data);
        $create_ExperienceLetter = $this->model_termination->create_ExperienceLetter($data);
        $termination_ListUpdate = $this->model_termination->termination_ListUpdate($data["_id"]);
        flashToast('termination_list', 'Experience Letter Generated.');
        redirect('Termination/termination_List');
    }

    public function upload_experience_letter($ID=null){
        $data = (array)null;
        $data["_id"] = $ID;
        if(isPost()){
            $data= postData();
            $upload_termination_experience_letter = $this->model_termination->upload_termination_experience_letter($data);
            flashToast('termination_list', 'Experience Letter Uploaded.');
            redirect('Termination/termination_List');
        }
        $get_experience_letter = $this->model_termination->get_experience_letter($data);
        $data["get_experience_letter"] = $get_experience_letter;
        //print_r($data);
        $this->view('pages/upload_experience_letter', $data);
    }
    
    public function view_experience_letter($ID=null){
        $data = (array)null;
        $data["_id"] = $ID;
        $get_experience_letter = $this->model_termination->get_experience_letter($data);
        $data["get_experience_letter"] = $get_experience_letter;
        //print_r($data);
        $this->view('pages/view_termination_experience_letter', $data);
    }


}

?>