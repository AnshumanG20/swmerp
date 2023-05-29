<?php
class LeaveController extends Controller
{
public function __construct()
{
    if(!isLoggedIn()){ redirect('Login'); }
    $this->model_leave = $this->model('model_leave');
    $this->Validate_leave = $this->validator('Validate_leave');
    $this->model_notification = $this->model('model_notification');
}
public function index()
{

}
public function leaverequest_add_update($id=null)
{
    // echo '<pre>'; print_r($_SESSION['emp_details']);return;
        $data =(array)null;
        $data['emp_id'] = $_SESSION['emp_details']['_id'];
        $data['emp_gender'] = $_SESSION['emp_details']['gender'];
        $data['emp_marital_status'] = $_SESSION['emp_details']['marital_status'];
        $data['emp_designation'] = $_SESSION['emp_details']['designation_mstr_id'];
        $data['emp_company_location'] = $_SESSION['emp_details']['company_location_id'];
        
        $reportList = $this->model_leave->onreportinglistbyDesgId($data['emp_id']);

        //Althought the name says reporting list by desg id but i'm passign employee id. Don't get confused.
        
        $reportList = JSON_DECODE(JSON_ENCODE($reportList), true);
        
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
    $gradeList = $this->model_leave->gradelistbyEmpId($data['emp_id']);
    $gradeList = JSON_DECODE(JSON_ENCODE($gradeList), true);
    $data["gradeList"] = $gradeList;
    //  echo '<pre>';print_r($gradeList); return; 
    $leavetknList = $this->model_leave->emp_leave_taken_fi_yr($data['emp_id'], $fy);
    $leavetknList = JSON_DECODE(JSON_ENCODE($leavetknList), true);
    // echo '<pre>';print_r($gradeList); return; 
    $paidleaveList = $this->model_leave->emp_paid_leave_fi_yr($data['emp_id'], $fy);
    $paidleaveList = JSON_DECODE(JSON_ENCODE($paidleaveList), true);
    

    if(($data['emp_gender']=='Male') && ($data['emp_marital_status']=='Married' || $data['emp_marital_status']=='Widowed' || $data['emp_marital_status']=='Divorced'))
    {
        $leavetype = $this->model_leave->leavetype_male_married();
            
    }
    else if(($data['emp_gender']=='Female') && ($data['emp_marital_status']=='Married' || $data['emp_marital_status']=='Widowed' || $data['emp_marital_status']=='Divorced'))
    {
        $leavetype = $this->model_leave->leavetype_female_married();
    }
    else if(($data['emp_gender']=='Male') && ($data['emp_marital_status']=='Single'))
    {
        $leavetype = $this->model_leave->leavetype_male_single();
    }
    else if(($data['emp_gender']=='Female') && ($data['emp_marital_status']=='Single'))
    {
        $leavetype = $this->model_leave->leavetype_female_single();
    }
    
    if(isset($leavetype)) 
    {
        $leavetype = JSON_DECODE(JSON_ENCODE($leavetype),true);
        
        $data['leave']=$leavetype;
        $leave_details = array(null); $i = 0;
        foreach($leavetype as $values){
            $leavedaysList = $this->model_leave->emp_leave_days_fi_yr($data['emp_id'], $values['_id'], $data['fy']);
            $leave_details[$i]['leave_type'] = $values['leave_type'];
            $leave_details[$i]['leave_days'] = $values['leave_days'];
            $leave_details[$i]['available'] = $leavedaysList['leave_days'];
            $i++;
            //print_r($leavedaysList);
        }
    }

    if(isPost())
    {
            $data = postData();

            // echo '<pre>';print_r($data);return;  
            $data['leave']=$leavetype;
            $data["gradeList"] = $gradeList;
            $data['emp_id'] = $_SESSION['emp_details']['_id'];
            $data['leave_request_datetime'] = dateTime();
            $data['emp_designation'] = $_SESSION['emp_details']['designation_mstr_id'];
            $data['emp_company_location'] = $_SESSION['emp_details']['company_location_id'];
            if($_SESSION['emp_details']['middle_name']=="")
            {
                $data['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['last_name'];
            }
            else
            {
                $data['emp_name'] = $_SESSION['emp_details']['first_name'].' '.$_SESSION['emp_details']['middle_name'].' '.$_SESSION['emp_details']['last_name'];
            }
            $data["reportList"] = $reportList;
            $data['reporting_designation_id'] = $data["reportList"]["reporting_leave_designation_mstr_id"];
            //reporting head for approval
        if($data['reporting_designation_id']!='')
        {
            $reportheadList = $this->model_leave->onreportingheadbyCompLocId($data['reporting_head_employee_mstr_id'], $data['emp_company_location']);
            $reportheadList = JSON_DECODE(JSON_ENCODE($reportheadList), true);
            $data["reportheadList"] = $reportheadList;
            
        }
        $data['tl_designation_id'] = $data["reportList"]["reporting_head_designation_mstr_id"];

        if($data['tl_designation_id']!='')
        {
            // echo '<pre>';print_r($data['reporting_head_employee_mstr_id']);return;
            $reporttlList = $this->model_leave->onreportingtlbyCompLocId($data['reporting_head_employee_mstr_id'], $data['emp_company_location']);
            $reporttlList = JSON_DECODE(JSON_ENCODE($reporttlList), true);
            $data["reporttlList"] = $reporttlList;
        }

            $data["reportheadList"] = $reportheadList;
            $data["reporttlList"] = $reporttlList;
            
            
            $data["reporting_employee_id"] = $data["reportheadList"]["_id"];
            if($data['emp_designation']=='15')
            {
                $data["tl_employee_id"] = $data["reporttlList"]["_id"];
            }
            else
            {
                $data["tl_employee_id"] =0;
            }

            if($data['_id']=="") // insert Record
            {
                //print_r($data);
                    $errMsg = $this->Validate_leave->leaverequest_add_update($data); //server side validation
                    if(empty($errMsg))
                    {
                        

                        $leave_from_year = date('Y', strtotime($data['leave_from_date']));
                        $leave_from_year_nxt = date('Y', strtotime($data['leave_from_date']))+1;
                        $leave_from_year_prv = date('Y', strtotime($data['leave_from_date']))-1;

                        $leave_to_year = date('Y', strtotime($data['leave_to_date']));
                        $leave_to_year_nxt = date('Y', strtotime($data['leave_to_date']))+1;
                        $leave_to_year_prv = date('Y', strtotime($data['leave_to_date']))-1;

                        $leave_from_month = date('m', strtotime($data['leave_from_date']));
                        $leave_to_month = date('m', strtotime($data['leave_to_date']));
                        $leave_from_day=date('d', strtotime($data['leave_from_date']));
                        $leave_to_day=date('d', strtotime($data['leave_to_date']));

                        if($leave_from_month==1||$leave_from_month==2||$leave_from_month==3)
                        {
                            $from_first_date=$leave_from_year_prv.'-04-01';
                            $data['from_last_date']=$leave_from_year.'-03-31';
                            $from_first_date_year= date('Y', strtotime($from_first_date));
                            $from_last_date_year= date('Y', strtotime($data['from_last_date']));

                            $data['financial_year']=$from_first_date_year.'-'.$from_last_date_year;
                        }
                        else
                        {
                            $from_first_date=$leave_from_year.'-04-01';
                            $data['from_last_date']=$leave_from_year_nxt.'-03-31';
                            $from_first_date_year= date('Y', strtotime($from_first_date));
                            $from_last_date_year= date('Y', strtotime($data['from_last_date']));

                            $data['financial_year']= $from_first_date_year.'-'.$from_last_date_year;
                        }
                        if($leave_to_month==1||$leave_to_month==2||$leave_to_month==3)
                        {
                            $data['to_first_date']=$leave_to_year_prv.'-04-01';
                            $to_last_date=$leave_to_year.'-03-31';
                            $to_first_date_year= date('Y', strtotime($data['to_first_date']));
                            $to_last_date_year= date('Y', strtotime($to_last_date));

                            $data['next_financial_year']=$to_first_date_year.'-'.$to_last_date_year;
                        }
                        else
                        {
                            $data['to_first_date']=$leave_to_year.'-04-01';
                            $to_last_date=$leave_to_year_nxt.'-03-31';
                            $to_first_date_year= date('Y', strtotime($data['to_first_date']));
                            $to_last_date_year= date('Y', strtotime($to_last_date));

                            $data['next_financial_year']=$to_first_date_year.'-'.$to_last_date_year;
                        }

                        if($leave_to_year == $from_last_date_year)
                        {
                            if($leave_to_month>03)
                            {

                                $now = strtotime($data['from_last_date']); // or your date as well
                                $your_date = strtotime($data['leave_from_date']);
                                $datediff = $now - $your_date;

                                $data['leave_days_current_financial_year']=round($datediff / (60 * 60 * 24)+1);

                                //-----------------******************--------------------------------------

                                $leave_to_date_next = strtotime($data['leave_to_date']); // or your date as well
                                $first_day_next = strtotime($data['to_first_date']);
                                $datediff_next = $leave_to_date_next - $first_day_next;

                                $data['leave_days_next_financial_year']=round($datediff_next / (60 * 60 * 24)+1);
                            }
                        }

                        $data_exists = $this->model_leave->Leaverequest_exists($data);
                        // echo '<pre>';print_r($data_exists);return;
                        $data_exists = json_decode(json_encode($data_exists),true);
                        if($data_exists)
                        {
                        // echo '<script>alert("You have already applied for this Date Before\nTry Another Date!");</script>';
                            flashToast("dateExist","You have already applied for this Date Before.Try Another Date!");
                            // echo "window.location.href = '".URLROOT."/LeaveController/leaverequest_add_update';</script>";
                            $data["leave_details"] = $leave_details;
                            $data["leavetknList"] = $leavetknList;
                            $data["paidleaveList"] = $paidleaveList;
                            $data['fy']=$fy;
                        // echo '<pre>'; print_r($data);return;
                            $this->view('pages/leave_request',$data);
                        }
                        else
                        {
                            if($data['leave_type_days']<$data['leave_days'])
                            {
                                $data['paid_leave']=$data['leave_days']-$data['leave_type_days'];
                            }
                            else
                            {
                                $data['paid_leave']=0;
                            }
                        
                        if($leave_to_year == $from_last_date_year)
                        {

                            if($leave_to_month>03)
                            {
                            
                            $result = $this->model_leave->leaverequest_fi_yr($data);
                            }
                            else
                            {
                            $result = $this->model_leave->leaverequest_differ_yr($data);
                            }

                        }
                        else
                        {
                            //print_r($data);

                        $result = $this->model_leave->leaverequest_differ_yr($data);
                        }
                        if($result)
                        {
                            echo "<script>alert('Leave Requested Successfully!!'); </script>";
                            redirect("LeaveController/LeaveList");
                        }
                    else
                    {
                            echo "<script>alert('Fail To Leave Request');</script>";

                    }
                    }
                }
                else
                {
                    $this->view('pages/leave_request',$errMsg);
                }
            }
    }
    
    else
    {
        /*if($this->model_leave->checkleavereq($data)){
        //redirect('Dashboard');
        }else{}*/
        $data["reportList"] = $reportList;
        $data['reporting_designation_id'] = $data["reportList"]["reporting_leave_designation_mstr_id"];
        $data['tl_designation_id'] = $data["reportList"]["reporting_head_designation_mstr_id"];
        //print_r($data['reporting_designation_id']);
        //reporting head for approval
        if($data['reporting_designation_id']!='')
        {
            
            $reportheadList = $this->model_leave->onreportingheadbyCompLocId($reportList['reporting_head_emp_mstr_id'], $data['emp_company_location']);
            $reportheadList = JSON_DECODE(JSON_ENCODE($reportheadList), true);
            $data["reportheadList"] = $reportheadList;
            //  echo '<pre>';print_r($data); return; 
        
        }


        if($data['tl_designation_id']!='')
        {
            $reporttlList = $this->model_leave->onreportingtlbyCompLocId($data['tl_designation_id'], $data['emp_company_location']);
            $reporttlList = JSON_DECODE(JSON_ENCODE($reporttlList), true);
            $data["reporttlList"] = $reporttlList;
            // echo '<pre>';print_r($data); return; 
            
        }
        $data["leavetknList"] = $leavetknList;
        $data["paidleaveList"] = $paidleaveList;
        
        if(isset($leave_details))
        {
        $data["leave_details"] = $leave_details;  
        
        }
        
        
    //   echo '<pre>';print_r($data); return; 
        $this->view('pages/leave_request',$data);
    }

}
public function LeaveList(){
    $data = (array)null;
    if(isPost())
    {
        $data = postData();

        //Employee details data.
        $leaveList =$this->model_leave->emp_leave_list($data);
        $leaveList = json_decode(json_encode($leaveList),true);
        $data["leaveList"] = $leaveList;

        $this->view('pages/emp_leave_List', $data);
        
        
    }
    else
    {
        $data['from_date']=date('Y-m-d');
        $data['to_date']=date('Y-m-d');
        //Employee details data.
        $leaveList =$this->model_leave->emp_leave_list($data);
        $leaveList = json_decode(json_encode($leaveList),true);
        $data["leaveList"] = $leaveList;
        $this->view('pages/emp_leave_List', $data);
    }

}
public function AllLeaveList(){
    $data = (array)null;
    if(isPost())
    {
        $data = postData();

        //Employee details data.
        $leaveList =$this->model_leave->all_leave_list($data);
        $leaveList = json_decode(json_encode($leaveList),true);
        $data["leaveList"] = $leaveList;

        $this->view('pages/all_leave_List', $data);
    }
    else
    {
        $data['from_date']=date('Y-m-d');
        $data['to_date']=date('Y-m-d');
        //Employee details data.
        $leaveList =$this->model_leave->all_leave_list($data);
        $leaveList = json_decode(json_encode($leaveList),true);
        $data["leaveList"] = $leaveList;
        $this->view('pages/all_leave_List', $data);
    }

}

///////////////////////////
public function individual(){
    $data = (array)null;
    if(isPost())
    {
        $data = postData();

        // echo '<pre>';print_r($_SESSION['emp_details']['employee_code']);return;
        $data['emp_id'] = substr($_SESSION['emp_details']['employee_code'],-2);
        //Employee details data.
        $leaveList =$this->model_leave->leave_list_individual($data);
        $leaveList = json_decode(json_encode($leaveList),true);
        $data["leaveList"] = $leaveList;
        
        $this->view('pages/leaveListIndividual', $data);
    }
    else
    {
        $data['from_date']=date('Y-m-d');
        $data['to_date']=date('Y-m-d');
        
        $data['emp_id'] = substr($_SESSION['emp_details']['employee_code'],-2);
        // echo '<pre>';print_r( $_SESSION['emp_details']['employee_code']);return;
        //Employee details data.
        $leaveList =$this->model_leave->leave_list_individual($data);
        $leaveList = json_decode(json_encode($leaveList),true);
        $data["leaveList"] = $leaveList;
        $this->view('pages/leaveListIndividual', $data);
    }

}
///////////////////////


public function ajaxAvailableleaveListByLeaveTypeId(){
    if(isPost()){
        $data = postData();
        //$data['leave_type_id']='2';
        //$data['emp_id']='3';

        if(isset($data['leave_type_id'])){
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
            $data['emp_id'] = $_SESSION['emp_details']['_id'];
            $total_leave_type_list = $this->model_leave->getLeaveDaysByLeaveTypeId($data['leave_type_id']);
        $leave_type_list = $this->model_leave->getavailableleaveListByLeaveTypeId($data['emp_id'], $data['leave_type_id'], $data['fy']);
        if($leave_type_list){
            $avail_leave=$total_leave_type_list['leave_days']-$leave_type_list['leave_days'];
            if($avail_leave>0)
            {
                $availl_leave=$avail_leave;
            }
            else
            {
                $availl_leave=0;
            }
            $response = ["response"=>true, "data"=>$availl_leave];
        }else{
            $response = ["response"=>false, "data"=>'Data Not Exist'];
        }
        }else{
        $response = ["response"=>false, "data"=>'leave_type_list field is required'];
        }
        echo json_encode($response);
    }
}
public function ajaxAvailableleaveListByEmpId(){
    if(isPost()){
        $data = postData();
        //$data['leave_type_id']='2';
        //$data['emp_id']='3';

        if(isset($data['leave_type_id'])){
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
            //$data['emp_id'] = $_SESSION['emp_details']['_id'];
        $total_leave_type_list = $this->model_leave->getLeaveDaysByLeaveTypeId($data['leave_type_id']);
        $leave_type_list = $this->model_leave->getavailableleaveListByLeaveTypeId($data['rep_employee_id'], $data['leave_type_id'], $data['fy']);
        if($leave_type_list){
            $avail_leave=$total_leave_type_list['leave_days']-$leave_type_list['leave_days'];
            if($avail_leave>0)
            {
                $availl_leave=$avail_leave;
            }
            else
            {
                $availl_leave=0;
            }
            $response = ["response"=>true, "data"=>$availl_leave];
        }else{
            $response = ["response"=>false, "data"=>'Data Not Exist'];
        }
        }else{
        $response = ["response"=>false, "data"=>'leave_type_list field is required'];
        }
        echo json_encode($response);
    }
}
public function leave_cancel($ID=null)
{
    $data = (array)null;
    $data["id"] = $ID;
    $emp_leave_det = $this->model_leave->getleavereq_by_id($data["id"]);
    $emp_leave_det = JSON_DECODE(JSON_ENCODE($emp_leave_det), true);

    if(isPost()){
        $data= postData();
        $data['emp_designation'] = $_SESSION['emp_details']['designation_mstr_id'];
        $data["emp_leave_det"] = $emp_leave_det;
        $data['tl_employee_id'] = $data["emp_leave_det"]["reporting_tl_emp_id"];

        //print_r($data["tl_employee_id"]);

        $data['emp_id'] = $_SESSION['emp_details']['_id'];
        $data['leave_request_datetime'] = dateTime();
        if($data["_status"]=="1")
        {
            $leave_cancel_list = $this->model_leave->leave_cancel($data);
            $leave_cancel_list = JSON_DECODE(JSON_ENCODE($leave_cancel_list), true);
            $data["leave_cancel_list"] = $leave_cancel_list;
            redirect("LeaveController/LeaveList");
        }
        else{
            $leave_cancel_req_list = $this->model_leave->leave_cancel_request($data);
            $leave_cancel_req_list = JSON_DECODE(JSON_ENCODE($leave_cancel_req_list), true);
            $data["leave_cancel_req_list"] = $leave_cancel_req_list;
            redirect("LeaveController/LeaveList");
        }

    }
    else
    {

    $data["emp_leave_det"] = $emp_leave_det;
        if($data["emp_leave_det"]['middle_name']=="")
            {
                $data["emp_leave_det"]['emp_name'] = $data["emp_leave_det"]['first_name'].' '.$data["emp_leave_det"]['last_name'];
            }
            else
            {
                $data["emp_leave_det"]['emp_name'] = $data["emp_leave_det"]['first_name'].' '.$data["emp_leave_det"]['middle_name'].' '.$data["emp_leave_det"]['last_name'];
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
    $this->view('pages/leave_cancel', $data);
    }

}

}

?>