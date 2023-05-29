<?php
  class Api_Course extends Controller {

      function __construct(){
          $this->db = new Database;
          $this->model_sub_course_mstr = $this->model('model_sub_course_mstr');
          $this->model_sub_stream_mstr = $this->model('model_sub_stream_mstr');
      }

      public function index(){
      }

      public function getSubCourseByCourseMstrId(){
      	if(isPost()){
      		$data = postData();
      		$sub_course_list = $this->model_sub_course_mstr->getSubCourseByCourseMstrId($data['course_mstr_id']);
      		if($sub_course_list){
      			$option = "<option value=''>==SELECT==</option>";
				$option .= "<option value='add'>Add Stream</option>";

      			foreach ($sub_course_list as $value) {
      				$option .= "<option value='".$value['_id']."'>".$value['stream_name']."</option>";
      			}
      			$response = ["response"=>true, "data"=>$option];
      		}else{
      			$response = ["response"=>false];
      		}
      		echo json_encode($response);
      	}
      }

      public function getSubStreamBySubCourseMstrId(){
      	if(isPost()){
      		$data = postData();
      		$sub_stream_list = $this->model_sub_stream_mstr->getSubStreamBySubCourseMstrId($data['sub_course_mstr_id']);
      		if($sub_stream_list){
      			$option = "<option value=''>==SELECT==</option>";
      			foreach ($sub_stream_list as $value) {
      				$option .= "<option value='".$value['_id']."'>".$value['sub_stream_name']."</option>";
      			}
      			$response = ["response"=>true, "data"=>$option];
      		}else{
      			$response = ["response"=>false];
      		}
      		echo json_encode($response);
      	}
      }
}