<?php
class Api_Task extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->model_task_mstr = $this->model('model_task_mstr');
        $this->Validate_task = $this->validator('Validate_task');

    }
    public function taskAdd(){
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();

                $errMsg = $this->Validate_task->validate_task($data);
                if(empty($errMsg)){
                    if($this->model_task_mstr->duplicateFun($data))
                    {
                        $data = ["Data Already Exist!!"];
                        $response = ["response"=>false, "data"=>$data];
                    }
                    else
                    {
                        if($this->model_task_mstr->insert_task($data))
                        {
                            $response = ["response"=>true, "data"=>"SUCCESS"];
                        }else{
                            $data = ["Something is Wrong!!"];
                            $response = ["response"=>false, "data"=>$data];
                        }
                    }
                }else{
                    $response = ["response"=>false, "data"=>$errMsg];
                }
                $this->db->commit();
                echo json_encode($response);
            }catch(Exception $e){
                $this->db->rollBack();
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function taskList()
    {
        if(isPost()){
            try{
                $result = $this->model_task_mstr->getAll_Task();
                $response = ["response"=>true, "data"=>$result];
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function gate_project_name()
    {
        if(isPost()){
            try{

                $result= $this->model_task_mstr->gate_project_name();
                $result = json_decode(json_encode($result), true);
                $response = ["response"=>true, "data"=>$result];
                // print_r($response);
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function taskUpdate()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();

                $errMsg = $this->Validate_task->validate_task($data);
                if(empty($errMsg)){
                    if($this->model_task_mstr->duplicateFunUpdate($data))
                    {
                        $data = ["Data Already Exist!!"];
                        $response = ["response"=>false, "data"=>$data];
                    }
                    else
                    {
                        if($this->model_task_mstr->update_task($data))
                        {
                            $response = ["response"=>true, "data"=>"SUCCESS"];
                        }else{
                            $data = ["Something is Wrong!!"];
                            $response = ["response"=>false, "data"=>$data];
                        }
                    }
                }else{
                    $response = ["response"=>false, "data"=>$errMsg];
                }
                $this->db->commit();
                echo json_encode($response);
            }catch(Exception $e){
                $this->db->rollBack();
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }

        }
    }
    public function taskGetById()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_mstr->taskGetById($data);
                $result = json_decode(json_encode($result), true);
                $response = ["response"=>true, "data"=>$result];
                // print_r($response);
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function DeleteByIdTask()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_mstr->DeleteByIdTask($data);
                $result = json_decode(json_encode($result), true);
                $response = ["response"=>true, "data"=>$result];
                // print_r($response);
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
}

?>