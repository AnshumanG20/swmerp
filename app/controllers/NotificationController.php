<?php
    class NotificationController extends Controller
    {
        public function __construct()
        {
            if(!isLoggedIn()){ redirect('Login'); }
           $this->model_notification = $this->model('model_notification');
           $this->model_leave = $this->model('model_leave');
           $this->Validate_leave = $this->validator('Validate_leave');
        }
        public function index()
        {

        }

         public function leave_approve_reject_by_head($ID=null,$noti_id=null){
            $data = (array)null;
            echo $data["id"] = $ID;
            echo $data["noti_id"] = $noti_id;
            if(isPost())
            {
                $data = postData();

                
                $data['emp_id'] = $_SESSION['emp_details']['_id'];
                $data['leave_request_datetime'] = dateTime();
                $empdetList = $this->model_notification->leave_det_for_head($data);
                $empdetList = JSON_DECODE(JSON_ENCODE($empdetList), true);
                $data["empdetList"] = $empdetList;
                $data['tl_employee_id'] = $data["empdetList"]["reporting_tl_emp_id"];//reporting_tl_emp_id
				$data['rr_company_location_id'] = $_SESSION['emp_details']['company_location_id'];

				//get hr emp id code start
				$emphrdetList = $this->model_notification->hr_empid_on_approval($data['rr_company_location_id']);
                $emphrdetList = JSON_DECODE(JSON_ENCODE($emphrdetList), true);
                $data["emphrdetList"] = $emphrdetList;
				$data['hr_employee_id'] = $data["emphrdetList"]["_id"];//hr_emp_id

				//get hr emp id code end
				if($data['leave_type_days']<$data['approval_leave_days'])
				{
					$data['paid_leave']=$data['approval_leave_days']-$data['leave_type_days'];
				}
				else
				{
					$data['paid_leave']=0;
				}
				//print_r($data['paid_leave']);
				//die();

				
				if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_male_married();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_female_married();
				}
				else if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_male_single();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_female_single();
				}

                $leavetype = JSON_DECODE(JSON_ENCODE($leavetype),true);
                $data['leave'] = $leavetype;

                if($data['btn_submit']=="Approve") // insert approve Record
                {
                    $errMsg = $this->Validate_leave->validate_leave_approval($data); //server side validation
                    if(empty($errMsg))
                    {
                        $result = $this->model_leave->leave_approval_status($data);
                        if($result)
                        {
                            echo "<script>alert('Leave Approved Successfully!!'); </script>";
                            redirect("LeaveController/AllLeaveList");
                        }
                        else
                        {
                            echo "<script>alert('Fail To Approve The Leave');</script>";

                        }
                    }
                   else
                   {
                      $this->view('pages/leave_approval',$errMsg);
                   }
                }
                else if($data['btn_submit']=="Reject") // insert approve Record
                {
                     $errMsg = $this->Validate_leave->validate_leave_rejection($data); //server side validation
                     if(empty($errMsg))
                     {
                        $result = $this->model_leave->leave_rejection_status($data);
                        if($result)
                        {
                             echo "<script>alert('Leave Rejected Successfully!!'); </script>";
                             redirect("LeaveController/AllLeaveList");
                        }
                        else
                        {
                              echo "<script>alert('Fail To Approve The Leave');</script>";

                        }
                    }
                   else
                   {
                      $this->view('pages/leave_approval',$errMsg);
                   }
                }

            }
             else
             {
                 $t_date= date("Y-m-d");
                 $year = date("Y", strtotime($t_date));
                 $month = date("m", strtotime($t_date));
                 if($month > 3)
                 {
                     $f1 = $year;
                     $f2 = $year+1;
                     $fy = $f1."-".$f2;
                 }
                 else
                 {
                     $f1 = $year-1;
                     $f2 = $year;
                     $fy = $f1."-".$f2;
                 }
                $data['fy']=$fy;
                $empdetList = $this->model_notification->leave_det_for_head($data);
                $empdetList = JSON_DECODE(JSON_ENCODE($empdetList), true);
                $data["empdetList"] = $empdetList;
                
				//print_r($data["empdetList"]);
                $data['rr_company_location_id'] = $_SESSION['emp_details']['company_location_id'];
				// echo '<pre>';print_r($_SESSION['emp_details']);return;

                
				//get hr emp id code start
				$emphrdetList = $this->model_notification->hr_empid_on_approval($data['rr_company_location_id']);
                $emphrdetList = JSON_DECODE(JSON_ENCODE($emphrdetList), true);
                $data["emphrdetList"] = $emphrdetList;
				//print_r($data['emphrdetList']);
				//get hr emp id code end

				if($_SESSION['emp_details']['middle_name']=="")
                {
                    $data["empdetList"]['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['last_name'];
                }
                else
                {
                    $data["empdetList"]['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['middle_name'].' '.$_SESSION['emp_details']['last_name'];
                }
                 //print_r($data["empdetList"]);
                if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_male_married();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_female_married();
				}
				else if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_male_single();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_female_single();
				}

                $leavetype = JSON_DECODE(JSON_ENCODE($leavetype),true);
                $data['leave'] = $leavetype;
                 $leave_details = array(null); $i = 0;
                 foreach($leavetype as $values){
                     $leavedaysList = $this->model_leave->emp_leave_days_fi_yr($data['empdetList']['employee_id'], $values['_id'], $data['fy']);
                     $leave_details[$i]['leave_type'] = $values['leave_type'];
                     $leave_details[$i]['leave_days'] = $values['leave_days'];
                     $leave_details[$i]['available'] = $leavedaysList['leave_days'];
                     $i++;
                     //print_r($leavedaysList);
                 }
                 $data['leave_details']=$leave_details;

                 //print_r($data['leave_details']);

                 $leavedaysList = JSON_DECODE(JSON_ENCODE($leavedaysList), true);
                 $data["leavedaysList"] = $leavedaysList;
				 
				 $total_leave_type_list = $this->model_leave->getLeaveDaysByLeaveTypeId($data["empdetList"]["leave_type_id"]); 
				 $ldylst = $this->model_leave->emp_leave_days_fi_yr($data['empdetList']['employee_id'], $data["empdetList"]["leave_type_id"], $data['fy']);
				 $avail_leave=$total_leave_type_list['leave_days']-$ldylst['leave_days'];
                    if($avail_leave>0)
                    {
                        $data["availl_leave"]=$avail_leave;
                    }
                    else
                    {
                        $data["availl_leave"]=0;
                    }
					
				 $paidleaveList = $this->model_leave->emp_paid_leave_fi_yr($data['empdetList']['employee_id'], $data['fy']);
				$paidleaveList = JSON_DECODE(JSON_ENCODE($paidleaveList), true);
				$data["paidleaveList"] = $paidleaveList;
				 
                
                $this->view('pages/leave_approval', $data);
            }

        }
		
		//leave approval by hr
		public function leave_approval_by_hr($ID=null,$noti_id=null){
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
            if(isPost())
            {
                $data = postData();
                $data['emp_id'] = $_SESSION['emp_details']['_id'];
                $data['leave_request_datetime'] = dateTime();
                $empdetList = $this->model_notification->leave_det_on_approval_for_head($data);
                $empdetList = JSON_DECODE(JSON_ENCODE($empdetList), true);
                $data["empdetList"] = $empdetList;
				
                $data['leave_requested_emp_id'] = $data["empdetList"]["employee_id"];//leave_requested_emp_id
                $data['rep_hd_emp_id'] = $data["empdetList"]["reporting_head_emp_id"];//reporting_head_emp_id
                $data['tl_employee_id'] = $data["empdetList"]["reporting_tl_emp_id"];//reporting_tl_emp_id
				$data['rr_company_location_id'] = $_SESSION['emp_details']['company_location_id'];
				
				//get hr emp id code start
				$emphrdetList = $this->model_notification->hr_empid_on_approval($data['rr_company_location_id']);
                $emphrdetList = JSON_DECODE(JSON_ENCODE($emphrdetList), true);
                $data["emphrdetList"] = $emphrdetList;
				$data['hr_employee_id'] = $data["emphrdetList"]["_id"];//hr_emp_id
				//get hr emp id code end
				
				if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_male_married();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_female_married();
				}
				else if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_male_single();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_female_single();
				}
                $leavetype = JSON_DECODE(JSON_ENCODE($leavetype),true);
                $data['leave'] = $leavetype;
				if($data['leave_type_days']<$data['req_leave_days'])
				{
					$data['paid_leave']=$data['req_leave_days']-$data['leave_type_days'];
				}
				else
				{
					$data['paid_leave']=0;
				}
				if($data['btn_submit']=="Approve") // insert approve Record
                {
                    $errMsg = $this->Validate_leave->validate_leave_approval($data); //server side validation
                    if(empty($errMsg))
                    {
                        $result = $this->model_leave->leave_type_hr_approval_status($data);
                        if($result)
                        {
                            echo "<script>alert('Leave Approved Successfully!!'); </script>";
                            redirect("LeaveController/AllLeaveList");
                        }
                        else
                        {
                            echo "<script>alert('Fail To Approve The Leave');</script>";

                        }
                    }
                   else
                   {
                      $this->view('pages/leave_approval_by_hr',$errMsg);
                   }
                }
                else if($data['btn_submit']=="Save") // insert approve Record
                {
                    $result = $this->model_leave->hr_approval_without_leavetype_status($data);
					if($result)
					{
						echo "<script>alert('Leave Approved Successfully!!'); </script>";
						redirect("LeaveController/AllLeaveList");
					}
					else
					{
						echo "<script>alert('Fail To Approve The Leave');</script>";

					}
                }
            }
            else
            {
                $t_date= date("Y-m-d");
                $year = date("Y", strtotime($t_date));
                $month = date("m", strtotime($t_date));
                if($month > 3)
                {
                    $f1 = $year;
                    $f2 = $year+1;
                    $fy = $f1."-".$f2;
                }
                else
                {
                    $f1 = $year-1;
                    $f2 = $year;
                    $fy = $f1."-".$f2;
                }
                $data['fy']=$fy;
                $empdetList = $this->model_notification->leave_det_on_approval_for_head($data);
                $empdetList = JSON_DECODE(JSON_ENCODE($empdetList), true);
                $data["empdetList"] = $empdetList;
				
				
                $data['rr_company_location_id'] = $_SESSION['emp_details']['company_location_id'];
				
				//get hr emp id code start
				$emphrdetList = $this->model_notification->hr_empid_on_approval($data['rr_company_location_id']);
                $emphrdetList = JSON_DECODE(JSON_ENCODE($emphrdetList), true);
                $data["emphrdetList"] = $emphrdetList;
				//get hr emp id code end
				
				if($_SESSION['emp_details']['middle_name']=="")
                {
                    $data["empdetList"]['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['last_name'];
                }
                else
                {
                    $data["empdetList"]['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['middle_name'].' '.$_SESSION['emp_details']['last_name'];
                }
                 //print_r($data["empdetList"]);
                if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_male_married();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Married' || $data["empdetList"]["marital_status"]=='Widowed' || $data["empdetList"]["marital_status"]=='Divorced'))
				{
					$leavetype = $this->model_leave->leavetype_female_married();
				}
				else if(($data["empdetList"]["gender"]=='Male') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_male_single();
				}
				else if(($data["empdetList"]["gender"]=='Female') && ($data["empdetList"]["marital_status"]=='Single'))
				{
					$leavetype = $this->model_leave->leavetype_female_single();
				}

                $leavetype = JSON_DECODE(JSON_ENCODE($leavetype),true);
                $data['leave'] = $leavetype;
                 $leave_details = array(null); $i = 0;
                 foreach($leavetype as $values){
                     $leavedaysList = $this->model_leave->emp_leave_days_fi_yr($data['empdetList']['employee_id'], $values['_id'], $data['fy']);
                     $leave_details[$i]['leave_type'] = $values['leave_type'];
                     $leave_details[$i]['leave_days'] = $values['leave_days'];
                     $leave_details[$i]['available'] = $leavedaysList['leave_days'];
                     $i++;
                     //print_r($leavedaysList);
                 }
                 $data['leave_details']=$leave_details;

                 //print_r($data['leave_details']);

                $leavedaysList = JSON_DECODE(JSON_ENCODE($leavedaysList), true);
                $data["leavedaysList"] = $leavedaysList  ;
				 
				$total_leave_type_list = $this->model_leave->getLeaveDaysByLeaveTypeId($data["empdetList"]["leave_type_id"]); 
				$ldylst = $this->model_leave->emp_leave_days_fi_yr($data['empdetList']['employee_id'], $data["empdetList"]["leave_type_id"], $data['fy']);
				$avail_leave=$total_leave_type_list['leave_days']-$ldylst['leave_days'];
				if($avail_leave>0)
				{
					$data["availl_leave"]=$avail_leave;
				}
				else
				{
					$data["availl_leave"]=0;
				}
				$paidleaveList = $this->model_leave->emp_paid_leave_fi_yr($data['empdetList']['employee_id'], $data['fy']);
				$paidleaveList = JSON_DECODE(JSON_ENCODE($paidleaveList), true);
				$data["paidleaveList"] = $paidleaveList;
				 
                
                $this->view('pages/leave_approval_by_hr', $data);
            }

        }

        public function leave_cancel_approve_reject_by_head($ID=null,$noti_id=null){
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
            $emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            if(isPost())
            {
                $data = postData();
                $data["emp_leave_det"] = $emp_leave_det;
                $data['tl_employee_id'] = $data["emp_leave_det"]["reporting_tl_emp_id"];
                //print_r($data['tl_employee_id']);
                $data['emp_id'] = $_SESSION['emp_details']['_id'];
                $data['leave_request_datetime'] = dateTime();

                if($data['btn_submit']=="Approve") // insert approve Record
                {
                     $errMsg = $this->Validate_leave->validate_leave_rejection($data); //server side validation
                     if(empty($errMsg))
                     {
                        $result = $this->model_leave->leave_cancel_approval_status($data);
                        if($result)
                        {
                             echo "<script>alert('Leave Cancelled Approved Successfully!!'); </script>";
                            //  flashToast("leave","Leave Cancelled Approved Successfully!!");
                             redirect("LeaveController/AllLeaveList");
                        }
                        else
                        {
                              echo "<script>alert('Fail To Approve The Leave');</script>";

                        }
                    }
                   else
                   {
                      $this->view('pages/leave_cancel_approve_reject',$errMsg);
                   }
                }
                else if($data['btn_submit']=="Reject") // insert approve Record
                {
                     $errMsg = $this->Validate_leave->validate_leave_rejection($data); //server side validation
                     if(empty($errMsg))
                     {
                        $result = $this->model_leave->leave_cancel_rejection_status($data);
                        if($result)
                        {
                             echo "<script>alert('Leave Rejected Successfully!!'); </script>";
                             redirect("LeaveController/AllLeaveList");
                        }
                        else
                        {
                              echo "<script>alert('Fail To Approve The Leave');</script>";

                        }
                    }
                   else
                   {
                      $this->view('pages/leave_cancel_approve_reject',$errMsg);
                   }
                }

            }
             else
             {

                 $data["emp_leave_det"] = $emp_leave_det;
				 //print_r($data["emp_leave_det"]);
                 if($_SESSION['emp_details']['middle_name']=="")
                    {
                        $data["emp_leave_det"]['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['last_name'];
                    }
                    else
                    {
                        $data["emp_leave_det"]['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['middle_name'].' '.$_SESSION['emp_details']['last_name'];
                    }
                 //print_r($data["emp_leave_det"]);
                 if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }
            else
            {
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
                $this->view('pages/leave_cancel_approve_reject', $data);
            }

        }

        public function three_active_notification(){
          if(isPost()){
              //if(true){
              $data = postData();
              //$data['view']='';
              //$data['logged_emp_id']='37';
              //echo json_encode($data);
              if(isset($data['view'])){
                $notification_list = $this->model_notification->notification_for_reporting_employee($data);
                 $count = $this->model_notification->notification_count($data);
                 // $count='2';
                if($notification_list){
                    $output='';
                    foreach($notification_list as $values){
                        $output .= "<li>
                                        <a class='media' href='".URLROOT."/".$values['link']."'>
                                            <span class='label label-info pull-right'>View</span>
                                            <div class='media-left'>
                                                <i class='demo-pli-speech-bubble-7 icon-2x'></i>
                                            </div>
                                            <div class='media-body'>
                                                <p class='mar-no text-nowrap text-main text-semibold'>".$values['title']."</p>
                                                <small>".$values['about']."</small>
                                            </div>
                                        </a>
                                    </li>";
                    }
                     $options = array(
                        'notification' => $output,
                        'unseen_notification'  => $count
                    );
                    $response = ["response"=>true, "data"=>$options];
                }else{
                    $response = ["response"=>false, "data"=>'Data Not Exist'];
                }
              }else{
                $response = ["response"=>false, "data"=>'designation_mstr_list field is required'];
              }
              echo json_encode($response);
          }
      }

       public function leave_approved_by_head($ID=null,$noti_id=null){
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
			$emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            $data["emp_leave_det"] = $emp_leave_det;
            //print_r($data["emp_leave_det"]);
            if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }
            else
            {
                
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
           $leave_approval_view = $this->model_leave->leave_approval_view($data);
		   $this->view('pages/emp_leave_stts', $data);
           //redirect('LeaveController/LeaveList');
        }

        public function leave_rejected_by_head($ID=null,$noti_id=null){
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
			$emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            $data["emp_leave_det"] = $emp_leave_det;
            //print_r($data["emp_leave_det"]);
            if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }
            else
            {
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
           $leave_approval_view = $this->model_leave->leave_rejection_view($data);
		   $this->view('pages/emp_leave_stts', $data);
           //redirect('LeaveController/LeaveList');
        }

        public function cancel_leave_approved_by_head($ID=null,$noti_id=null){
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
			$emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            $data["emp_leave_det"] = $emp_leave_det;
            //print_r($data["emp_leave_det"]);
            if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }
            else
            {
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
           $leave_approval_view = $this->model_leave->cancel_leave_approval_view($data);
           $this->view('pages/emp_leave_stts', $data);
		   //redirect('LeaveController/LeaveList');
        }

        public function cancel_leave_rejected_by_head($ID=null,$noti_id=null){
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
			$emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            $data["emp_leave_det"] = $emp_leave_det;
            //print_r($data["emp_leave_det"]);
            if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }
            else
            {
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
           $leave_approval_view = $this->model_leave->cancel_leave_rejection_view($data);
           $this->view('pages/emp_leave_stts', $data);
		   //redirect('LeaveController/LeaveList');
        }
        public function AllNotificationList($ID=null)
        {
           $data = (array)null;
            $data['logged_emp_id'] = $_SESSION['emp_details']['_id'];
		    //$data['user_mstr_id'] = $_SESSION['emp_details']['user_mstr_id'];
		    $notificationList = $this->model_notification->all_notification_for_reporting_employee($data);
		    $notificationList = JSON_DECODE(JSON_ENCODE($notificationList), true);
			$data["notificationList"] = $notificationList;

            // echo '<pre>';print_r($data);return;
           $this->view('pages/all_notification_List',$data);
        }

        public function leave_notification_tc_tl($ID=null,$noti_id=null)
        {
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
           // print_r($data["noti_id"]);
            $emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            $data["emp_leave_det"] = $emp_leave_det;
            //print_r($data["emp_leave_det"]["_status"]);
            if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }
            else
            {
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
            $notificationList = $this->model_leave->tl_leave_notification_view($data);
            $notificationList = JSON_DECODE(JSON_ENCODE($notificationList), true);
			$data["notificationList"] = $notificationList;
            $this->view('pages/tl_notification', $data);

        }
	   public function hr_leave_approval_stts($ID=null,$noti_id=null)
	   {
            $data = (array)null;
            $data["id"] = $ID;
            $data["noti_id"] = $noti_id;
           // print_r($data["noti_id"]);
            $emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
            $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);
            $data["emp_leave_det"] = $emp_leave_det;
            // echo '<pre>';print_r($data["emp_leave_det"]);return;
            if(($data["emp_leave_det"]["_status"]=="0") || ($data["emp_leave_det"]["_status"]=="1"))
            {
                $emp_leave_type = $this->model_notification->leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);
                // echo '<pre>';print_r($emp_leave_type);return;
            }
            else
            {
                 $emp_leave_type = $this->model_notification->approval_leave_type_by_id($data["emp_leave_det"]["leave_type_id"]);

                 
            }

            $emp_leave_type = JSON_DECODE(JSON_ENCODE($emp_leave_type), true);
            $data["emp_leave_type"] = $emp_leave_type;
            $notificationList = $this->model_leave->hr_leave_notification_view($data);
            $notificationList = JSON_DECODE(JSON_ENCODE($notificationList), true);
			$data["notificationList"] = $notificationList;
            // echo '<pre>';print_r($data["notificationList"]);return;
            $this->view('pages/hr_notification', $data);

        }
  }

?>