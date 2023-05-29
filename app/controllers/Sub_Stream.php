<?php 
class Sub_Stream extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_sub_stream = $this->model('model_sub_stream');
        $this->Validate_sub_stream = $this->validator('Validate_sub_stream');
    }
    public function index()
    {

    }
    public function sub_qualification_add_update($id=null)
    {
        $data =(array)null;
        if(isPost())
        {
            $data = postData();
            if($id=='runtime'){
                $data['_id']="";
            }
            // echo "<pre>";
            // print_r($data);
            // return;
            if($data['_id']=="") // insert
            {
                $errMsg = $this->Validate_sub_stream->sub_qualification_add_update($data);
                if(empty($errMsg))
                {
                    $course = $this->model_sub_stream->sub_duplicatefunQualification($data);
                    $course = json_decode(json_encode($course),true);
                    if($course)
                    {
                        if($id=='runtime'){
                            echo "duplicate";
                            return;
                        }
                        flashToast("subStramExist","Sub Stream Already Added");
                        // echo "<script>alert('Sub Stream Already Added');</script>";
                        $course = $this->model_sub_stream->gateCourseList();
                        $course = json_decode(json_encode($course),true);
                       $data["courselist"] = $course;
                       $sub_courselist = $this->model_sub_stream->gate_Sub_CourseList();
                        $sub_courselist = json_decode(json_encode($sub_courselist),true);
                        $data["sub_courselist"] = $sub_courselist;
                        $this->view('pages/sub_stream_add_update',$data);
                    }
                    else
                    {
                        $result = $this->model_sub_stream->sub_qualification_add_update($data);
                        if($result)
                        {
                            if($id=='runtime'){
                                echo "success";
                                return;
                            }
                            flashToast("subStramAddSuccess","Sub stream Added Successfuly");
                            echo "<script>window.location.href = '".URLROOT."/Sub_Stream/sub_QualificationList';</script>";
                        }
                        else
                        {
                            if($id=='runtime'){
                                echo "fail";
                                return;
                            }
                            flashToast("subStramAddError","Fail To Add Sub Stream");
                            // echo "<script>alert('Fail To Add Sub Stream'); </script>";
                            $this->view('pages/sub_stream_add_update',$data);
                        }
                    }
                }
                else
                {
                    if($id=='runtime'){
                        echo "fail last";
                        return;
                    }
                    $this->view('pages/sub_stream_add_update',$errMsg);
                }
            }
            else //Update
            {
                $course = $this->model_sub_stream->sub_duplicatefunQualification($data);
                $course = json_decode(json_encode($course),true);
                if($course)
                {
                    flashToast("subStramExist","Sub Stream Already Added");
                    // echo "<script>alert('Sub Stream Already Added'); </script>";
                    $course = $this->model_sub_stream->gateCourseList();
                    $course = json_decode(json_encode($course),true);
                    $data["courselist"] = $course;

                    $sub_courselist = $this->model_sub_stream->gate_Sub_CourseList();
                    $sub_courselist = json_decode(json_encode($sub_courselist),true);
                    $data["sub_courselist"] = $sub_courselist;
                    $this->view('pages/sub_stream_add_update',$data);
                }
                else
                {
                    $result = $this->model_sub_stream->sub_qualification_add_update($data,$id);
                    if($result)
                    {
                        flashToast("subStramUpdateSuccess","Sub Stream Updated Successfuly");
                        echo "<script>window.location.href = '".URLROOT."/Sub_Stream/sub_QualificationList';</script>";
                    }
                }

            }
        }
        else if(isset($id))
        {

            $result = $this->model_sub_stream->sub_gateQualificationById($id);
            $data = json_decode(json_encode($result),true);

            $course = $this->model_sub_stream->gateCourseList();
            $course = json_decode(json_encode($course),true);
            $data["courselist"] = $course;

            $sub_courselist = $this->model_sub_stream->gate_Sub_CourseList();
            $sub_courselist = json_decode(json_encode($sub_courselist),true);
            $data["sub_courselist"] = $sub_courselist;

            $this->view('pages/sub_stream_add_update',$data);
        }
        else
        {
            $course = $this->model_sub_stream->gateCourseList();
            $course = json_decode(json_encode($course),true);
            $data["courselist"] = $course;

           /*  $sub_courselist = $this->model_sub_stream->gate_Sub_CourseList();
            $sub_courselist = json_decode(json_encode($sub_courselist),true);
            $data["sub_courselist"] = $sub_courselist;
 */
            $this->view('pages/sub_stream_add_update',$data);
        }

    }
    public function sub_QualificationList()
    {
        $result = $this->model_sub_stream->sub_Qualification_list();
        $result = json_decode(json_encode($result),true);
        $data["sub_streamlist"] = $result;
        //  print_r($result);
        $this->view('pages/sub_stream_list',$data);
    }
    public function sub_DeleteByIdQualification($id)
    {
        $result = $this->model_sub_stream->sub_deletebyidqualification($id);
        if($result)
        {
            flashToast("subStreamDeleteSuccess","Record Deleted Successfully");
            echo "<script>window.location.href = '".URLROOT."/Sub_Stream/sub_QualificationList';</script>";
        }
        else
        {
            echo "<script>alert('Db Error'); window.location.href = '".URLROOT."/Sub_Stream/sub_QualificationList';</script>";
        }
    }
    public function ajax_gateStream()
    {
        if(isPost())
			{
				$data = postData();
				$result = $this->model_sub_stream->ajax_gateStream($data);
				if(!empty($result)){
					$result = json_decode(json_encode($result), true);
					$option = "";
					foreach ($result as $value) {
						$option .= "<option value='".$value['_id']."'>".$value['stream_name']."</option>";
					}
					$response = ['response'=>true, 'data'=>$option];
				}else{
					$response = ['response'=>false];
				}
				echo json_encode($response);
			}
    }
}
?>