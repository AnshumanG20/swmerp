<?php 
class Item extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
    }
    public function item_add_update($id= NULL)
    {
        $response = httpPost('Api_Task/gate_project_name');
        $response = json_decode($response, true);
        if($response['response'])
        {
            $projectlist = $response['data'];
        }
        if(isPost())
        {

            $data = postData();
            if($data["_id"]=="")
            {
                // new INSERT
                $response = httpPostFile('Api_Task/taskAdd/',$data);
                $response = json_decode($response, true);
                if($response['response']==true)
                {
                    echo "<script>alert('Task Added Successfuly'); window.location.href = '".URLROOT."/Task/taskList';</script>";
                }
                else
                {
                    echo "<script>alert('Task Already Assign');</script>";
                    $data["project"]= $projectlist;
                    $this->view('pages/task_add_update',$data);
                } 
            }
            else
            {
                // update
                $response = httpPostFile('Api_Task/taskUpdate/', $data);
                $response = json_decode($response, true);
                if($response['response']==true)
                {
                    echo "<script>alert('Task Updated Successfuly'); window.location.href = '".URLROOT."/Task/taskList';</script>";
                }
                else
                {
                    echo "<script>alert('Task Already Assign');</script>";
                    $data["project"]= $projectlist;
                    $this->view("pages/task_add_update", $data);
                }
            }
        }
        else if(isset($id))
        {
            $data['id'] = $id;
            $response = httpPostfile('Api_Task/taskGetById/',$data);
            // print_r($response);
            $response = json_decode($response, true);
            if($response["response"]==true){
                $data = $response["data"];
                $data["project"]= $projectlist;
                $this->view("pages/task_add_update", $data);
            }
            else
            {
                echo "<script>alert('Some Thing is Wrong');</script>";
                $this->view("pages/task_add_update");
            }
        }
        else
        {
            $data = array(null);
            $data["project"]= $projectlist;
            $this->view("pages/task_add_update",$data);
        }
    }
    public function taskList()
    {
        $data = array(null);
        $response = json_decode(httpPost('Api_Task/taskList'), true);
        // print_r($response);
        if($response["response"]==true)
        {
            $data["tasklist"] = $response['data'];
            //  print_r($data);
            $this->view("pages/task_list", $data);
        }
        else
        {
            echo "<script>alert('Db Error');</script>";
            $this->view("pages/task_list");
        }
    }
    public function DeleteByIdTask($id)
    {
        $data['_id'] = $id;
        $response = httpPostfile('Api_Task/DeleteByIdTask/',$data);
        // print_r($response);
        $response = json_decode($response, true);
        if($response["response"]==true){
            echo "<script>alert('Task Deleted Successfuly'); window.location.href = '".URLROOT."/Task/taskList';</script>";
        }
        else
        {
            echo "<script>alert('Some Thing is Wrong'); window.location.href = '".URLROOT."/Task/taskList';</script>";
        }
    }
}
?>