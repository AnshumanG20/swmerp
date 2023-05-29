<?php
  class Notification extends Controller {

      function __construct(){
          if(!isLoggedIn()){ redirect('Login'); }
          $this->db = new Database;
          $this->validateCandidate = $this->validator('validateCandidate');
      }

      public function NotiDeactivate(){
      	if(isPost()){
      		$data = postData();
      		$result = $this->db->table('tbl_notification_detail')
      				->where('link', '=', $data['link'])
      				->where('employee_id', '=', $data['employee_id'])
      				->update(['_status'=>0]);
      		if($result){
      			$response = ["response"=>true];
      		}else{
      			$response = ["response"=>false];
      		}
      		
            echo json_encode($response);
      	}
      }

}