<?php
class Api_StateDistCity extends Controller {

	function __construct(){
	//if(!isLoggedIn()){ redirect('Login'); }
		$this->db = new Database;
		$this->model_state_dist_city = $this->model('model_state_dist_city');
	}

	public function index(){
		//print_r($_SESSION['emp_details']);
	}

	public function getState(){
		$state = $this->model_state_dist_city->getState();
		if($state)
			$response = ['response'=>true, 'data'=>$state];
		else
			$response = ['response'=>false];

		echo json_encode($response);
	}
	public function getDistByState(){
		$data = ['state'=>'Jharkhand'];
		if(isPost()){
			$data = postData();
			$dist = $this->model_state_dist_city->getDistByState($data);
			if($dist)
				$response = ['response'=>true, 'data'=>$dist];
			else
				$response = ['response'=>false];
			echo json_encode($response);
		}else{
			$response = ['response'=>false, 'data'=>'Response is not post'];
			echo json_encode($response);
		}
	}
	public function getDistByStateOption(){
		if(isPost()){
			$data = postData();
			$dist = $this->model_state_dist_city->getDistByState($data);
			if($dist){
				$option = "<option value=''>== SELECT ==</option>";
				foreach ($dist as $values) {
					$option .= "<option value='".$values['dist']."'>".$values['dist']."</option>";
				}
				$response = ['response'=>true, 'data'=>$option];
			}else{
				$response = ['response'=>false];
			}
			echo json_encode($response);
		}else{
			$response = ['response'=>false, 'data'=>'Response is not post'];
			echo json_encode($response);
		}
	}
	public function getCityByDist(){
		$data = ['dist'=>'Bokaro'];
		if(isPost()){
			$data = postData();
			$city = $this->model_state_dist_city->getCityByDist($data);
			if($city){
				$response = ['response'=>true, 'data'=>$city];
			}else{
				$response = ['response'=>false];
			}
			
			echo json_encode($response);
		}else{
			$response = ['response'=>false, 'data'=>'Response is not post'];
			echo json_encode($response);
		}
	}
	public function getCityByDistOption(){
		$data = ['dist'=>'Bokaro'];
		if(isPost()){
			$data = postData();
			$city = $this->model_state_dist_city->getCityByDist($data);
			if($city){
				$option = "<option value=''>== SELECT ==</option>";
				foreach ($city as $values) {
					$option .= "<option value='".$values['_id']."'>".$values['city']."</option>";
				}
				$response = ['response'=>true, 'data'=>$option];
			}else{
				$response = ['response'=>false];
			}
			
			echo json_encode($response);
		}else{
			$response = ['response'=>false, 'data'=>'Response is not post'];
			echo json_encode($response);
		}
	}

	public function get_dist_by_state(){
		if(isPost()){
            $data=postData();
			// echo json_encode($data);
			// return;
			$dist_list_from_state = $this->model_state_dist_city->getDistByState($data);
			echo json_encode($dist_list_from_state);
			return;
        }
	}
//add city here via walking candidate
	public function add_to_city(){
		if(isPost()){
            $data=postData();
			//check for duplicate city
			$dup_var = 0;
			$get_duplicate = $this->model_state_dist_city->get_duplicate_city($data);

			if($get_duplicate){
				foreach($get_duplicate as $row){
					if($row['dist']==$data['dist'] && $row['state']==$data['state']){
						$dup_var++;
					
					}
				}
			}
			
			if($dup_var>0){
				echo json_encode(['msg'=>'duplicate value']);
				return;
			}
			else{
				$save_to_location = $this->model_state_dist_city->add_to_city_location($data);
				echo json_encode(['msg'=>'success']);
				return;
			}
			
			
        }
		//check duplicate value
		// $result = $this->model_state_dist_city->add_to_city($city);
		// echo json_encode($result,true);
	}
}