<?php
  class CareerController extends Controller {

    	public function __construct(){
            if(!isLoggedIn()){ redirect('Login'); }
            $this->obj = $this->model('model_job_details');
            $this->model_project_mstr = $this->model('model_project_mstr');
            $this->model_project_mstr_address = $this->model('model_project_mstr_address');
            $this->model_job_post_qualification_details = $this->model('model_job_post_qualification_details');

        }
      
      public function career(){
            $data = (array)null;
            $data["date"] = date("Y/m/d");
            //$data['user_mstr_id'] = $_SESSION['emp_details']['user_mstr_id'];
		    $jobList = $this->obj->career($data);
		    $jobList = JSON_DECODE(JSON_ENCODE($jobList), true);
            $data["jobList"] = $jobList;
            $this->view('pages/career', $data);
       }
      public function career_details_view($ID=null){
            $data = (array)null;
            $data["id"]=$ID;
            $career_details_view = $this->obj->career_details_view($data);
            $career_details_qualification_view = $this->obj->career_details_qualification_view($data);
            $data["career_details_view"] = $career_details_view;
            $data["career_details_qualification_view"] = $career_details_qualification_view;
           //print_r($data);
            $this->view('pages/career_details_view', $data);
      }
      
}