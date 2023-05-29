<?php
class OnReporting extends Controller {

	function __construct(){
		if(!isLoggedIn()){ redirect('Login'); }
		$this->model_department_mstr = $this->model('model_department_mstr');
        $this->model_designation_mstr = $this->model('model_designation_mstr');
		$this->db = new Database;
	}
	 
	public function index(){
	    $data = array(null);
		$department_mstr_list = $this->model_department_mstr->getDepartmentMstrList();
		$project_mstr_list    = $this->model_department_mstr->getProjectMstrList();
		if(isPost()){
			$data = postData();

			// echo '<pre>'; print_r($data);return;
			$checkIfReportingHeadExist = $this->model_designation_mstr->checkIfReportingHeadExist($data);
			if($checkIfReportingHeadExist){
				// echo '<script>alert("Designation Exist");</script>';

				flashToast("reportingHeadExist","Reporting Head Already Exist!");
				$data['department_mstr_list'] = $department_mstr_list;
				$data['project_mstr_list']	  = $project_mstr_list;
				redirect('OnReporting', $data);
			}else{
			$insertData = $this->model_designation_mstr->insertReportingHeadData($data);
			// echo '<pre>';print_r($insertData);return;

			$data['department_mstr_list'] = $department_mstr_list;
			$data['project_mstr_list']	  = $project_mstr_list;

			flashToast("reportingAddSuccess","Reporting Head Added Successfully");
			// $this->view('pages/onReporitngAddUpdate', $data);
			redirect('OnReportingList');
			}
		}else{
			$data['project_mstr_list']	  = $project_mstr_list;
			$data['department_mstr_list'] = $department_mstr_list;
			$this->view('pages/onReporitngAddUpdate', $data);
			
		}
		//$this->view('pages/Home');
	}

}
// echo "this is a disastrous approach";