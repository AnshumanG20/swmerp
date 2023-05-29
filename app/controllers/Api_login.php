<?php
  class Api_login extends Controller {
  	private $db;
  	function __construct(){
  	  $this->db = new Database;
      $this->model_user_mstr = $this->model('model_user_mstr');
      $this->model_emp_details = $this->model('model_emp_details');
      $this->model_login_details = $this->model('model_login_details');
      $this->validateLogin = $this->validator('validateLogin');

  	}
    public function login(){
      if(isPost()){
        try{
          $data = postData();
          //print_r($data);
          $errMsg = $this->validateLogin->validateLoginData($data);
          if(empty($errMsg)){
              $response = (array)null;
              if($_id = $this->model_user_mstr->verifyUserPass($data)){
                    $result_emp_details = $this->model_emp_details->getEmpDetailsByUserMstrId($_id);
                    if($result_emp_details){
                      $token = date("ymd").date("His").$_id;
                      $insertData = [
                                "emp_details_id"=>$result_emp_details["_id"],
                                "device_type"=>$data["device_type"],
                                "imei_no"=>($data["device_type"]=="MOBILE")?$data["imei_no"]:"",
                                "ip_address"=>$data["ip_address"],
                                "_token"=>$token,
                                "created_on"=>dateTime()
                              ];
  					//print_r($insertData);
                      if($this->model_login_details->insertLoginDetails($insertData)){
                          $result_emp_details["_token"] = $token;
                          $response = ["response"=>true, "data"=>$result_emp_details];
                      }
                    }else{
                      $response = ["response"=>false, "data"=>"User Name & Password does not match."];
                    }
              }else{
                $response = ["response"=>false, "data"=>"User Name & Password does not match."];
              }           
              echo json_encode($response);
          }else{
            $response = ["response"=>false, "data"=>$errMsg];
            echo json_encode($response);
          }

        }catch(Exception $e){
          die($e);
        }
      }
    }
}