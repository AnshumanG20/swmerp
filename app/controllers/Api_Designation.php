<?php
  class Api_Designation extends Controller {
      function __construct(){
          $this->model_designation_mstr = $this->model('model_designation_mstr');
		  $this->model_department_mstr = $this->model('model_department_mstr');
      }

      public function index(){

      }
      public function getDesignationMstrListByDeptId(){
          if(isPost()){
              $data = postData();
              if(isset($data['department_mstr_id'])){
                $designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                if($designation_mstr_list){
                    $data = ['designation_mstr_list'=>$designation_mstr_list];
                    $response = ["response"=>true, "data"=>$data];
                }else{
                    $response = ["response"=>false, "data"=>'Data Not Exist'];
                }
              }else{
                $response = ["response"=>false, "data"=>'designation_mstr_list field is required'];
              }
              echo json_encode($response);
          }
      }
      public function ajaxDesignationMstrListByDeptId(){
          if(isPost()){
              $data = postData();
              if(isset($data['department_mstr_id'])){
                $designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
				        $department_mstr_list = $this->model_department_mstr->getDepartmentMstrListGreaterPosition($data['department_mstr_id']);
                if($designation_mstr_list || $department_mstr_list){
        					if($designation_mstr_list){
        						$options = "<option value=''>== SELECT ==</option>";
        						foreach($designation_mstr_list as $values){
        							$options .= "<option value='".$values['_id']."'>".$values['designation_name']."</option>";
        						}
        					}
        					if($department_mstr_list){
        						$options = "<option value=''>== SELECT ==</option>";
        						foreach($designation_mstr_list as $values){
        							$options .= "<option value='".$values['_id']."'>".$values['designation_name']."</option>";
        						}
        					}
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
	  
	  public function ajaxOnReportingDepartmentDesignationMstrListByDeptId(){
          if(isPost()){
              $data = postData();
              if(isset($data['department_mstr_id'])){
                $designation_mstr_list = $this->model_designation_mstr->getDesignationMstrListByDeptId($data['department_mstr_id']);
                if($designation_mstr_list){
                    $options = "<option value=''>== SELECT ==</option>";
                    foreach($designation_mstr_list as $values){
                        $options .= "<option value='".$values['_id']."'>".$values['designation_name']."</option>";
                    }
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

      public function ajaxOnReportingDepartmentDesignationEmployeeMstrListByDesgId(){
        if(isPost()){
            $data = postData();
            if(isset($data['desgId'])){
              $designation_mstr_list = $this->model_designation_mstr->getEmployeeMstrListByDesgId($data['desgId']);
              if($designation_mstr_list){
                  $options = "<option value=''>== SELECT ==</option>";
                  foreach($designation_mstr_list as $values){
                      $options .= "<option value='".$values['_id']."'>".$values['first_name']."</option>";
                  }
                  $response = ["response"=>true, "data"=>$options];
              }else{
                  $response = ["response"=>false, "data"=>'Data Not Exist'];
              }
            }else{
              $response = ["response"=>false, "data"=>'Employee_mstr_list field is required'];
            }
            echo json_encode($response);
        }
    }

    public function ajaxOnReportingDepartmentDesignationMstrListByDesgIdAcToProjectId(){
      if(isPost()){
          $data = postData();
          if(isset($data['designation_mstr_id']) && isset($data['project_mstr_id'])){
            //print_r($data);
            $emp_mstr_list = $this->model_designation_mstr->getEmployeeMstrListByDesgIdAcToProjectId($data['designation_mstr_id'],$data['project_mstr_id']);
            if($emp_mstr_list){
                $options = "<option value=''>== SELECT ==</option>";
                foreach($emp_mstr_list as $values){
                    $options .= "<option value='".$values['_id']."'>".$values['first_name']."</option>";
                }
                $response = ["response"=>true, "data"=>$options];
            }else{
                $response = ["response"=>false, "data"=>'Data Not Exist'];
            }
          }else{
            $response = ["response"=>false, "data"=>'Employee_mstr_list field is required'];
          }
          echo json_encode($response);
      }
  }
    







  }      