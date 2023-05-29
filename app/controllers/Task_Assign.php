<?php
class Task_Assign extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->db = new Database();
        $this->model_task_assign = $this->model('model_task_assign');
    }
    public function task_assign_add_update($id= NULL)
    {
        // echo datetime();
        $data = array(null);
        $designation_mstr_id = $_SESSION['emp_details']['designation_mstr_id'];
        $company_location_id = $_SESSION['emp_details']['company_location_id'];
        $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
        $project_mstr_id = $_SESSION['emp_details']['project_mstr_id'];
        $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
        $data['designation_mstr_id'] = $designation_mstr_id;
        $data['company_location_id'] = $company_location_id;
        $data['project_mstr_id'] = $project_mstr_id;
        
        print_r("designation_mstr_id - ".$designation_mstr_id);
        echo "<br/>";
        print_r("company location_id - ".$company_location_id);
        echo "<br/>";
        print_r("assign_by_user_mstr_id(_id) - ".$assign_by_user_mstr_id);
        echo "<br/>";
        print_r("project_mstr_id - ".$project_mstr_id);
        echo "<br/>";
        
        // echo '<pre>';print_r($_SESSION);return;
        //Gate Project Concept Type
        if($designation_mstr_id==12){ // 12 = team leader
            $project_concept_type = httpPostfile('Api_Task_Assign/project_concept_type',$data);
            
            if($project_concept_type=='WARD')
            {
                //Empoyee Name
                $emp = httpPostfile('Api_Task_Assign/gate_emp_name_by_ward',$data);
                //print_r($emp);
                $response = json_decode($emp, true);
                // print_r($response['data']);
                $emp=null;
                if($response['response']==true)
                {
                    $emp = $response['data'];
                }
            }
            else
            {
                //Empoyee Name
                $emp = httpPostfile('Api_Task_Assign/gate_emp_name',$data);
                // print_r($emp);return;
                $response = json_decode($emp, true);
                // print_r($response['data']);
                $emp=null;
                if($response['response']==true)
                {
                    $emp = $response['data'];
                }
            }
        }else{
            //Empoyee Name
            $emp = httpPostfile('Api_Task_Assign/gate_emp_name',$data);
            //print_r($emp);
            $response = json_decode($emp, true);
            // print_r($response);
            $emp=null;
            if($response['response']==true)
            {
                $emp = $response['data'];
            }
        }
        // echo '<pre>';print_r($emp);return;
        //project Name
        $response = httpPostfile('Api_Task_Assign/gate_project_name',$data);
        $response = json_decode($response, true);
        $project=null;
        if($response['response'])
        {
            $project = $response['data'];
        }

        if(isPost())
        {
            $data = postData();
            // echo '<pre>'; print_r($data);return;
            $data["assign_by_user_mstr_id"] = $assign_by_user_mstr_id;
            //print_r($data);
            if($data["_id"]=="")
            {
                // new INSERT
                if($data['task_list_mstr_id'] ==0){
                    $task_id = $this->model_task_assign->getTaskId($data);

                    $data['task_list_mstr_id']=$task_id;
                }
                
                // echo '<pre>'; print_r($data);return;
                $response = httpPostFile('Api_Task_Assign/assign_task/',$data);
                $response = json_decode($response, true);
                if($response['response']==true)
                {
                    flashToast("taskAssignSuccess","Task Assigned Successfully");
                    echo "<script> window.location.href = '".URLROOT."/Task_Assign/task_assign_list';</script>";
                }
                else
                {
                    echo "<script>alert('Db Error, Something is Wrong');</script>";
                    $data["emp"] = $emp;
                    $data["project"] = $project;
                    // $data["task"] = $task;
                    $this->view('pages/task_assign_add_update',$data);
                }
            }
            else
            {
                // update
                $response = httpPostFile('Api_Task_Assign/taskUpdate/', $data);
                $response = json_decode($response, true);
                if($response['response']==true)
                {
                    flashToast("taskAssignUpdateSuccess","Task Updated Successfully");
                    echo "<script>window.location.href = '".URLROOT."/Task_Assign/task_assign_list';</script>";
                }
                else
                {
                    echo "<script>alert('Db Error,Record Not Updated');</script>";
                    $this->view("pages/task_add_update", $data);
                }
            }
        }
        else if(isset($id))
        {
            $data['_id'] = $id;
            $response = httpPostfile('Api_Task_Assign/taskGetById/',$data);
            $response = json_decode($response, true);
            if($response['response']==true){
                $data = $response["data"];
                $data["project"] = $project;
                $data["emp"] = $emp;
                //All Task Name
                $form = ["project_mstr_id"=>$response['data']['project_mstr_id']];
                $response = httpPost('Api_Task_Assign/gate_task_name_by_project_mstr_id', $form);
                $response = json_decode($response, true);
                if($response['response'])
                {
                    $data['task']= $response['data'];
                } 
                $this->view("pages/task_assign_add_update", $data);
            }else{
                echo "<script>alert('Db Error,Something is Wrong'); window.location.href = '".URLROOT."/Task_Assign/task_assign_list';</script>";
            }
        }
        else
        {
            $data = array(null);
            $data["emp"] = $emp;
            // echo "all employee details";
            // print_r($data);
            // return;
            $data["project"] = $project;

            // print_r($data);
            // return;
            $this->view("pages/task_assign_add_update",$data);
        }   

    }
    public function ajax_task_name()
    {
        if(isPost())
        {
            $data = postData();
            $response = httpPostFile('Api_Task_Assign/ajax_task_name/',$data);
            $response = json_decode($response, true);
            if($response['response']){
                $option = "";
                foreach ($response['data'] as $value) {
                    $option .= "<option value='".$value['_id']."'>".$value['task_name']."</option>";
                }
                $option .= "<option value='0'>other</option>";
                $response = ['response'=>true, 'data'=>$option];
            }else{
                $response = ['response'=>false];
            }
            echo json_encode($response);
        }
    }
    public function DeleteByIdTask($id)
    {
        $data['_id'] = $id;
        $response = httpPostfile('Api_Task_Assign/DeleteByIdTask/',$data);
        // print_r($response);
        $response = json_decode($response, true);
        if($response["response"]==true){
            flashToast("taskDeleteSuccess","Task Deleted Successfully");
            echo "<script>window.location.href = '".URLROOT."/Task_Assign/task_assign_list';</script>";
        }
        else
        {
            echo "<script>alert('Something Is Wrong'); window.location.href = '".URLROOT."/Task_Assign/task_assign_list';</script>";
        }
    }
    public function recieve_task_list()
    {
        $data = array(null);
        $assigned_emp_details_id = $_SESSION['emp_details']['_id'];
        $data['assigned_emp_details_id'] = $assigned_emp_details_id;
        $response = json_decode(httpPost('Api_Task_Assign/recieve_task_list',$data), true);
        // print_r($response);
        if($response["response"]==true)
        {
            $data["recieve_task"] = $response['data'];
            //print_r($data);
            $this->view("pages/task_recieve_list",$data);
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            $this->view("pages/task_recieve_list",$data);
        }
    }
    public function recieve_task($id)
    {
        $data =(array)null;
        $data["_id"] = $id;
        $response = json_decode(httpPostfile('Api_Task_Assign/recieve_task',$data), true);
        // print_r($response);
        if($response["response"]==true)
        {
            flashToast("taskReceiveSuccess","Task Accepted");
            echo "<script> window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
        }
        else
        {
            echo "<script>alert('Db Error,Task Not Accepted'); window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
        }
    }
    public function reject_task()
    {
        if(isPost())
        {
            $data = postData();
            $response = json_decode(httpPostfile('Api_Task_Assign/reject_task',$data), true);
            // print_r($response);
            if($response["response"]=true)
            {
                flashToast("taskRejectSuccess","Task Rejected Successfully");
                echo "<script>window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
            }
            else
            {
                echo "<script>alert('Db Error,Task Not Reject'); window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
            }
        }
    }
    public function post_task($id = null)
    {
        if($id==null && isPost())
        {
            $data = postData();
            $response = json_decode(httpPostfile('Api_Task_Assign/post_task',$data), true);
            if($response["response"]==true)
            {
                flashToast("taskSubmitSuccess","Task Submitted Successfully");
                echo "<script>window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
            }
            else
            {
                echo "<script>alert('Db Error,Task Not Submitted'); window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
            } 
        }
        else
        {
            $data =(array)null;
            $data["_id"] = $id;
            $response = json_decode(httpPostfile('Api_Task_Assign/post_task',$data), true);
            if($response["response"]==true)
            {
                echo "<script>alert('Task Submitted Successfully'); window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
            }
            else
            {
                echo "<script>alert('Db Error,Task Not Submitted'); window.location.href = '".URLROOT."/Task_Assign/recieve_task_list';</script>";
            } 
        }
    }
    public function approve_task_list()
    {
        $data = array(null);
        $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
        $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
        $response = json_decode(httpPost('Api_Task_Assign/approve_task_list',$data), true);
        // print_r($response);
        if($response["response"]==true)
        {
            $data["approve_task"] = $response['data'];
            //print_r($data);l
            $this->view("pages/approve_task_list",$data);
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            $this->view("pages/approve_task_list",$data);
        }
    }
    public function approve_task()
    {
        $data =(array)null;
        if(isPost()){
            $data = postData();
            
            // $data["_id"] = $data['approve_id'];
           
            // $response = json_decode(httpPostfile('Api_Task_Assign/approve_task',$data), true);
            echo $response = $this->model_task_assign->approve_task($data);
            // print_r($response);return;
            // print_r($response);
            // if($response["response"]==true)
            // {
            //     flashToast("taskApproveSuccess","Task Approved Successfully");
            //     echo "<script>window.location.href = '".URLROOT."/Task_Assign/approve_task_list';</script>";
            // }
            // else
            // {
            //     echo "<script>alert('Db Error,Task Not Approved'); window.location.href = '".URLROOT."/Task_Assign/approve_task_list';</script>";
            // }
    }}
    public function not_approve_task()
    {
        if(isPost())
        {
            $data = postData();
            $response = json_decode(httpPostfile('Api_Task_Assign/not_approve_task',$data), true);
            if($response["response"]==true)
            {
                flashToast("taskDisapproveSuccess","Task Disapproved");
                echo "<script>window.location.href = '".URLROOT."/Task_Assign/approve_task_list';</script>";
            }
            else
            {
                echo "<script>alert('Db Error,Task Not Approved'); window.location.href = '".URLROOT."/Task_Assign/approve_task_list';</script>";
            }
        }
    }
    public function re_assign_task_list()
    {
        $data = array(null);
        $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
        $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
        $response = json_decode(httpPostfile('Api_Task_Assign/re_assign_task_list',$data), true);
        // print_r($response);
        if($response["response"]==true)
        {
            $data["tasklist"] = $response['data'];
            //  print_r($data);
            $this->view("pages/re_assign_task_list",$data);
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            $this->view("pages/re_assign_task_list",$data);
        }
    }
    public function task_re_assign_add_update($id= NULL)
    {
         $data = array(null);
        $designation_mstr_id = $_SESSION['emp_details']['designation_mstr_id'];
        $company_location_id = $_SESSION['emp_details']['company_location_id'];
        $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
        $project_mstr_id = $_SESSION['emp_details']['project_mstr_id'];
        $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
        $data['designation_mstr_id'] = $designation_mstr_id;
        $data['company_location_id'] = $company_location_id;
        $data['project_mstr_id'] = $project_mstr_id;
        //Gate Project Concept Type
        if($designation_mstr_id==12){ // 12 = team leader
            $project_concept_type = httpPostfile('Api_Task_Assign/project_concept_type',$data);
            if($project_concept_type=='WARD')
            {
                //Empoyee Name
                $emp = httpPostfile('Api_Task_Assign/gate_emp_name_by_ward',$data);
                //print_r($emp);
                $response = json_decode($emp, true);
                // print_r($response['data']);
                $emp=null;
                if($response['response']==true)
                {
                    $emp = $response['data'];
                }
            }
            else
            {
                //Empoyee Name
                $emp = httpPostfile('Api_Task_Assign/gate_emp_name',$data);
                //print_r($emp);
                $response = json_decode($emp, true);
                // print_r($response['data']);
                $emp=null;
                if($response['response']==true)
                {
                    $emp = $response['data'];
                }
            }
        }else{
            //Empoyee Name
            $emp = httpPostfile('Api_Task_Assign/gate_emp_name',$data);
            //print_r($emp);
            $response = json_decode($emp, true);
            // print_r($response['data']);
            $emp=null;
            if($response['response']==true)
            {
                $emp = $response['data'];
            }
        }
        //Project Name
        $response = httpPostfile('Api_Task_Assign/gate_project_name',$data);
        /* print_r($data); */
        $response = json_decode($response, true);
        $project=null;
        if($response['response'])
        {
            $project = $response['data'];
        }
        if(isPost())
        {
            $data = postData();
            // print_r($data);
            $data["assign_by_user_mstr_id"] = $assign_by_user_mstr_id;
            //print_r($data);
            // new INSERT
            $response = httpPostFile('Api_Task_Assign/re_assign_task/',$data);
            $response = json_decode($response, true);
            if($response['response']==true)
            {
                echo "<script>alert('Task Re_Assign Successfully'); window.location.href = '".URLROOT."/Task_Assign/re_assign_task_list';</script>";
            }
            else
            {
                echo "<script>alert('Db Error, Something is Wrong');</script>";
                $data["emp"] = $emp;
                $data["project"] = $project;
                // $data["task"] = $task;
                $this->view('pages/re_assign_task',$data);
            }
        }
        else if(isset($id))
        {
            $data['_id'] = $id;
            $response = httpPostfile('Api_Task_Assign/taskGetById/',$data);
            $response = json_decode($response, true);
            if($response['response']==true){
                $data = $response["data"];
                $data["project"] = $project;
                $data["emp"] = $emp;
                //All Task Name
                $form = ["project_mstr_id"=>$response['data']['project_mstr_id']];
                $response = httpPost('Api_Task_Assign/gate_task_name_by_project_mstr_id', $form);
                $response = json_decode($response, true);
                if($response['response'])
                {
                    $data['task']= $response['data'];
                } 
                $this->view("pages/re_assign_task", $data);
            }else{
                echo "<script>alert('Db Error,Somthing is Wrong'); window.location.href = '".URLROOT."/Task_Assign/re_assign_task_list';</script>";
            }
        }
        else
        {
            redirect('Task_Assign/re_assign_task_list');
        }
    }
    public function search_recieve_task_list()
    {
        $data = array(null);
        if(isPost())
        {
            $data = postData();

            $assigned_emp_details_id = $_SESSION['emp_details']['_id'];
            $data['assigned_emp_details_id'] = $assigned_emp_details_id;
            $response = json_decode(httpPostfile('Api_Task_Assign/search_recieve_task_list',$data), true);
            // echo '<pre>';print_r($response);return;
            //print_r($response);
            if($response["response"]==true)
            {
                $data["recieve_task"] = $response['data'];
                $this->view("pages/task_recieve_list",$data);
            }
            else
            {
                $this->view("pages/task_recieve_list",$data, $response['data']);
            }
        }
        else
        {
            $this->view("pages/task_recieve_list",$data);
        }
    }
    public function task_assign_list()
    {
        $data = array(null);
        if(isPost())
        {
            $data = postData();
            $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
            $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
            $response = json_decode(httpPostfile('Api_Task_Assign/search_task_assign_list',$data), true);
            // print_r($response);
            if($response["response"]==true)
            {
                $data["tasklist"] = $response['data'];
                //  print_r($data);
                $this->view("pages/task_assign_list",$data);
            }
            else
            {
                $this->view("pages/task_assign_list",$data,$response['data']);
            }
        }
        else
        {
            $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
            $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
            $response = json_decode(httpPostfile('Api_Task_Assign/taskList',$data), true);
            if($response["response"]==true)
            {
                $data["tasklist"] = $response['data'];
                //  echo '<pre>';print_r($data);
                // return;
                $this->view("pages/task_assign_list",$data);
            }
            else
            {
                echo "<script>alert('Db Error,Something Is Wrong');</script>";
                $this->view("pages/task_assign_list",$data);
            }
        }
    }
    public function search_approve_task_list()
    {
        $data = array(null);
        if(isPost())
        {
            $data = postData();
            $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
            $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
            $response = json_decode(httpPostfile('Api_Task_Assign/search_approve_task_list',$data), true);
            // print_r($response);
            if($response["response"]==true)
            {
                $data["approve_task"] = $response['data'];
                //  print_r($data);
                $this->view("pages/approve_task_list",$data);
            }
            else
            {
                $this->view("pages/approve_task_list",$data,$response['data']);
            }
        }
        else
        {
            $this->view("pages/approve_task_list",$data);
        }

    }
    public function search_re_assign_task_list()
    {
        $data = array(null);
        if(isPost())
        {

            $data = postData();
            // echo '<pre>';print_r(postData());
            $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
            $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
            // /////////////////// New code added here!

            // $result = $this->model_task_assign->search_re_assign_task_list($data);
            // // echo '<pre>';print_r($result); return;   
            //     if($result){
            //         $result = json_decode(json_encode($result), true);
            //         foreach($result as $key => $values){
            //             $ID = $values['assign_by_user_mstr_id'];
            //             $details = $this->model_emp_details->getEmpDetailsNameById($ID);
            //             $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
            //         }
            //         $response = ["response"=>true, "data"=>$result];
            //     }else{
            //         $response = ["response"=>false, "data"=>"Data Not Found"];
            //     }


            // //////////////////////////////////////////
            $response = json_decode(httpPostfile('Api_Task_Assign/search_re_assign_task_list',$data), true);
            // echo '<pre>';print_r($response); return;
            // print_r($response);
            if($response["response"]==true)
            {
                $data["tasklist"] = $response['data'];
                //  print_r($data);
                $this->view("pages/re_assign_task_list",$data);
            }
            else
            {
                $this->view("pages/re_assign_task_list",$data,$response['data']);
            }
        }
        else
        {
            $this->view("pages/re_assign_task_list",$data);
        }

    }
    public function view_recieve_task_list($id)
    {
        $data = array(null);
        $assigned_emp_details_id = $_SESSION['emp_details']['_id'];
        $data['assigned_emp_details_id'] = $assigned_emp_details_id;
        $data['_id'] = $id;
        $response = json_decode(httpPostfile('Api_Task_Assign/view_recieve_task_list',$data), true);
        // print_r($response);
        if($response["response"]==true)
        {
            $data= $response['data'];
            $this->view("pages/task_recieve_view",$data);
        }
        else
        {
            $this->view("pages/404");
        }
    }


// code added for workground area
    public function workground($id=null,$sid=null)
    {
        // echo $id;return;
        $data = array(null);
        if(isPost())
        {
            // echo "ddddddss";
            
            $data = postData();

            // echo '<pre>';print_r($data);return;
            $data =
            [
                "task_assigned_mstr_id"=> $data['subtask_id'],
                "subtask_title"=> $data['subtask_title'],
                "subtask_description"=> $data['subtask_description'],
                "created_at"=> date('Y-m-d H:i:s'),
                "task_percent"=> $data['task_percent']

            ];

            // echo '<pre>';print_r($data);return;
            // $assign_by_user_mstr_id = $_SESSION['emp_details']['_id'];
            // $data['assign_by_user_mstr_id'] = $assign_by_user_mstr_id;
            $response = $this->model_task_assign->insertSubtask($data);
            
            // print_r($response);
            // return;
            //json_decode(httpPostfile('Api_Task_Assign/search_re_assign_task_list',$data), true);
            // print_r($response);
            flashToast("subtaskAddSucces","Subtask Added Successfully");
                // redirectBack();
            redirectBack();

                // $this->view("pages/workground",$data);
            
        }
        else
        {
            $subtaskList = $this->model_task_assign->getSubtaskList($id);
 
            if(empty($subtaskList)){
             // echo "empty";
             $data['id'] =$id;
             $data['sid'] =$sid; //taskname
             $receive_reject_status = $this->model_task_assign->receive_reject_status($id); 
             $data['receive_reject_status'] = $receive_reject_status;
             // echo '<pre>';print_r($data);
             // return;
             $this->view("pages/workground",$data);
         }else{
            $data['id'] =$id;
            $data['sid'] =$sid; //taskname
             // $receive_reject_status = $this->model_task_assign->receive_reject_status($id); 
             // $data['receive_reject_status'] = $receive_reject_status;
            $subtaskList = json_decode(json_encode($subtaskList),true);
            $data['subtaskList'] = $subtaskList;

            // echo "<pre>";print_r($data);
            $this->view("pages/workground",$data);
         }
        }
    }

    public function deleteSubtask(){



        $data = array();
        if(isPost()){
            $data = postData();

            // echo $data['deleteid'];
            // return;
            echo $response =$this->model_task_assign->deleteSubtask($data['deleteid']);
            
        }
}

public function getUpdateData(){

    $data = array();
    if(isPost()){
        $data = postData();
        $response = $this->model_task_assign->getUpdateData($data['subtask_id']);

        $resp = json_decode(json_encode($response));
        echo $rpp =   json_encode($resp);
        
        // print_r($resp);


    }
}

public function updateSubtask(){

    $data = array();
    if(isPost()){
        $data = postData();



        $response = $this->model_task_assign->updateSubtask($data);
        echo '<pre>';print_r($response);
        // return;

        if($response){
            flashToast("subtaskUpdateSuccess","Updated Successfully");
            echo '<script>alert("updated Successfully")</script>';
            // redirect('Task_Assign/recieve_task_list');
            redirectBack();
        }else{
            flashToast("subtaskUpdateError","Update Failed");
            echo '<script>alert("updated Failed")</script>';
            // redirect('Task_Assign/recieve_task_list');
            redirectBack();
        }


    }
}


}

?>