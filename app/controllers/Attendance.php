<?php 
class Attendance extends Controller
{
    public function __construct()
    {
		if(!isLoggedIn()){ redirect('Login'); }
        $this->model_attendance = $this->model('model_attendance');
		$this->model_emp_details = $this->model('model_emp_details');
    }
    public function index()
    {
		if(isPost()){
			$data=postData();
		}else{
			$data = array('from_date'=>date('Y-m-d'),'to_date'=>date('Y-m-d'));
		}
		
		$response = httpPost('api/get_attendance_details.php', $data, '192.168.0.25:8080/sri_api/');
		$response = json_decode($response, true);
		if($response['response']==true){
			//Employee details data.
			foreach($response['data'] as $key => $value){

			   $ID = $value['UserId'];
			   $emp_det = $this->model_attendance->get_employee_details($value['UserId']);
			   $response['data'][$key]['emp_id'] = $emp_det['emp_id'];
			   $response['data'][$key]['first_name'] = $emp_det['first_name'];
			   $response['data'][$key]['middle_name'] = $emp_det['middle_name'];
			   $response['data'][$key]['last_name'] = $emp_det['last_name'];
			   $response['data'][$key]['employee_code'] = $emp_det['employee_code'];
			   $response['data'][$key]['dept_name'] = $emp_det['dept_name'];
			}
			$data['AttendanceList']=$response['data'];
			$this->view('pages/employee_attendance_list',$data);
		}
		else
		{
			$this->view('pages/employee_attendance_list',$data);
		}		
    }
	public function attendance_show(){
		$empDetails = $this->model_emp_details->getEmpDetailsForAttendance();
		$data['emp_list']=$empDetails;
		$this->view('pages/attendance',$data);
	}
	public function attendance_show2(){
		$empDetails = $this->model_emp_details->getEmpDetailsForAttendance();
		// echo "<pre>";
		// print_r($empDetails);
		// return;
		$data['emp_list']=$empDetails;
		$this->view('pages/attendance2',$data);
	}
	




	
    public function employee_attendance_details($EMPID=null,$ATTDATE=null)
    {
		$data = (array)null;
		//$data=postData();
		$form["emp_id"] = $EMPID;
		$frm["attendance_date"] = $ATTDATE;
		//Employee details
		$EmployeeList =$this->model_attendance->get_employee_details_by_id($form["emp_id"]);
		$EmployeeList = json_decode(json_encode($EmployeeList),true);
		$data["EmployeeList"] = $EmployeeList;
		
		$frm["UserId"]=$data["EmployeeList"]["biometric_employee_code"];
		$response = httpPost('api/get_attendance_details_by_userid.php', $frm,  '192.168.0.25:8080/sri_api/');
		//print_r($response);
		$response = json_decode($response, true);
		
		if($response['response']==true){
			$data['AttendanceList']=$response['data'];
			$this->view('pages/employee_attendance_details',$data);
		}
		else{
			 $this->view('pages/employee_attendance_details',$data);
		}
        
       
    }
	
	public function employee_monthwise_attendance_list()
    {
		if(isPost()){
			$data=postData();
			//Employee details
			$EmployeeList =$this->model_attendance->get_employee_list();
			$EmployeeList = json_decode(json_encode($EmployeeList),true);
			foreach($EmployeeList as $key => $value){

				$frm["UserId"] = $value['biometric_employee_code'];
				if($data['month']!='')
				{
					$first_day=strtotime($data['year'].'-'.$data['month'].'-01');
					$last_day=strtotime(date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-28')));
					$k=1;
					while($first_day <= $last_day)
					{
						$k++;
						//echo $k;
						$dt_nm= date('Y-m-d', $first_day);
						$first_day = strtotime("+1 day", $first_day);
						$frm["dt_nm"] = $dt_nm;
						/*****API CODE STARTS*******/
						
						$response = httpPost('api/get_monthwise_attendance_details.php', $frm,  '192.168.0.25:8080/sri_api/');
						//print_r($response);
						$response = json_decode($response, true);
						
						if($response['response']==true){
							if(isset($response['data']['in_time']))
							{
								$EmployeeList[$key][$k]['in_time']=$response['data']['in_time'];
								$EmployeeList[$key][$k]['out_time']=$response['data']['out_time'];
							}
							
							//$EmployeeList[$key][$k]['in_time']=$response['data']['in_time'];
							//$EmployeeList[$key][$k]['out_time']=$response['data']['out_time'];
						}
						
						/*****API CODE ENDS*******/
					}
				}
			}
			
			$data["EmployeeList"] = $EmployeeList;
//print_r($data["EmployeeList"]);			
			$this->view('pages/employee_monthwise_attendance_list',$data);			
		}		
		$this->view('pages/employee_monthwise_attendance_list');				
    }
	
	public function employee_attendance_excel($YR=null,$MNTH=null)
    {
		$data = (array)null;
		$data["year"] = $YR;
		$data["month"] = $MNTH;
			//Employee details
			$EmployeeList =$this->model_attendance->get_employee_list();
			$EmployeeList = json_decode(json_encode($EmployeeList),true);
			foreach($EmployeeList as $key => $value){

				$frm["UserId"] = $value['biometric_employee_code'];
				if($data['month']!='')
				{
					$first_day=strtotime($data['year'].'-'.$data['month'].'-01');
					$last_day=strtotime(date("Y-m-t", strtotime($data['year'].'-'.$data['month'].'-28')));
					$k=1;
					while($first_day <= $last_day)
					{
						$k++;
						//echo $k;
						$dt_nm= date('Y-m-d', $first_day);
						$first_day = strtotime("+1 day", $first_day);
						$frm["dt_nm"] = $dt_nm;
						/*****API CODE STARTS*******/
						
						$response = httpPost('api/get_monthwise_attendance_details.php', $frm,  '192.168.0.25:8080/sri_api/');
						//print_r($response);
						$response = json_decode($response, true);
						
						if($response['response']==true){
							if(isset($response['data']['in_time']))
							{
								$EmployeeList[$key][$k]['in_time']=$response['data']['in_time'];
								$EmployeeList[$key][$k]['out_time']=$response['data']['out_time'];
							}
							//$EmployeeList[$key][$k]['in_time']=$response['data']['in_time'];
							//$EmployeeList[$key][$k]['out_time']=$response['data']['out_time'];
						}
						/*****API CODE ENDS*******/
					}
				}
			}
			
			$data["EmployeeList"] = $EmployeeList;			
			$this->view('pages/employee_attendance_excel',$data);			
		//}		
		//$this->view('pages/employee_attendance_excel');
        
       
    }
    
}
?>