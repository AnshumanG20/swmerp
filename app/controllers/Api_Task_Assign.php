<?php 
class Api_Task_Assign extends Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $this->model_task_assign = $this->model('model_task_assign');
        $this->model_emp_details = $this->model('model_emp_details');
        $this->Validate_task_assign = $this->validator('Validate_task_assign');
        $this->model_project_concept_type = $this->model('model_project_concept_type');

    }
    public function assign_task()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                $errMsg = $this->Validate_task_assign->task_assign($data);
                if(empty($errMsg))
                {
                    if($this->model_task_assign->insert_task_assign($data))
                    {
                        $response = ["response"=>true, "data"=>"SUCCESS"];
                    }else{
                        $data = ["Something is Wrong!!"];
                        $response = ["response"=>false, "data"=>$data];
                    }
                }
                else
                {
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
    public function gate_emp_name()
    {
        if(isPost()){
            try{
                $data = postData();
                // print_r($data);
                $result= $this->model_task_assign->gate_emp_name($data);
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
    public function gate_emp_name_by_ward()
    {
        if(isPost()){
            try{
                $data = postData();
                $assign_ward_list = $this->db->table('tbl_project_ward_permission_mstr')
                                ->select('ward_mstr_id')
                                ->where('emp_details_id', '=', $data['assign_by_user_mstr_id'])
                                ->get();
                if($assign_ward_list){
                    $assign_ward_mstr_id = [];
                    $i=0;
                    foreach($assign_ward_list as $values){
                        $assign_ward_mstr_id[$i] = $values['ward_mstr_id'];
                        $i++;

                    }
                    $emp_list_id= $this->model_task_assign->gate_emp_name($data);
                    if($emp_list_id){
                        $emp_list_id = json_decode(json_encode($emp_list_id), true);
                        // get get emp list accoring to ward list
                        $emp_details_id = [];
                        $i=0;
                        foreach($emp_list_id as $values){
                            $emp_details_id[$i] = $values['_id'];
                            $i++;

                        }
                        $emp_details = $this->db->table('tbl_project_ward_permission_mstr')
                                ->select('emp_details_id')
                                ->whereIn('emp_details_id', $emp_details_id)
                                ->whereIn('ward_mstr_id', $assign_ward_mstr_id)
                                ->get();
                        if($emp_details){
                            $emp_details_list_id = [];
                            $i=0;
                            foreach($emp_details as $values){
                                $emp_details_list_id[$i] = $values['emp_details_id'];
                            }

                            $emp_details_id = $this->db->table('tbl_emp_details')
                                ->select('_id, first_name, middle_name, last_name')
                                ->whereIn('_id', $emp_details_list_id)
                                ->get();
                            if($emp_details_id)
                                $response = ["response"=>true, "data"=> $emp_details_id];
                            else{
                                $response = ["response"=>false, "data"=>"Employee not found."];
                            }
                        }else{
                            $response = ["response"=>false, "data"=>"Ward is not permitted."];
                        }
                    }else{
                        $response = ["response"=>false, "data"=>"Not Find Employee Details"];
                    }


                }else{
                    $response = ["response"=>false, "data"=>"Ward not Assigned."];
                }
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function project_concept_type()
    {
        if(isPost()){
            try{
                $data = postData();
                // print_r($data);return;
                $result= $this->model_project_concept_type->project_concept_type($data);
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
    public function gate_task_name_by_project_mstr_id()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_assign->gate_task_name($data);
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
    public function gate_project_name()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_assign->gate_project_name($data);
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
    public function ajax_task_name()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_assign->ajax_task_name($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $response = ["response"=>true, "data"=>$result];
                }else{
                    $data = ["Data not Found"];
                    $response = ["response"=>false, "data"=>$data];
                }
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
    public function taskList()
    {
        if(isPost()){
            
            try{
                $data = postData();
                $result = $this->model_task_assign->getAll_Assign_Task($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['middle_name']."".$details['last_name'];
                    }
                }
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
    public function taskGetById()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_assign->taskGetById($data);
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
                $errMsg = $this->Validate_task_assign->task_assign($data);
                if(empty($errMsg))
                {
                    if($this->model_task_assign->taskUpdate($data))
                    {
                        $response = ["response"=>true, "data"=>"SUCCESS"];
                    }else{
                        $data = ["Something is Wrong!!"];
                        $response = ["response"=>false, "data"=>$data];
                    }
                }
                else
                {
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
    public function DeleteByIdTask()
    {
        if(isPost()){
            try{
                $data = postData();
                $result= $this->model_task_assign->DeleteByIdTask($data);
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
    public function recieve_task_list()
    {
        if(isPost()){
            try{
                $data = postData();
                $result = $this->model_task_assign->recieve_task_list($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    }
                }
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
    public function recieve_task()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                if($this->model_task_assign->recieve_task($data))
                {
                    $response = ["response"=>true, "data"=>"SUCCESS"];
                }else{
                    $data = ["Something is Wrong!!"];
                    $response = ["response"=>false, "data"=>$data];
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
    public function reject_task()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                if($this->model_task_assign->reject_task($data))
                {
                    $response = ["response"=>true, "data"=>"SUCCESS"];
                }else{
                    $data = ["Something is Wrong!!"];
                    $response = ["response"=>false, "data"=>$data];
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
    public function post_task()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                if($this->model_task_assign->post_task($data))
                {
                    $response = ["response"=>true, "data"=>"SUCCESS"];
                }else{
                    $data = ["Something is Wrong!!"];
                    $response = ["response"=>false, "data"=>$data];
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
    public function approve_task_list()
    {
        if(isPost()){
            try{
                $data = postData();
                //  print_r($data);
                $result = $this->model_task_assign->approve_task_list($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    }
                }
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
    public function approve_task()
    {
        // print_r(postData());return;
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                // echo '<pre>';print_r($data);return;
                if($this->model_task_assign->approve_task($data))
                {
                    $response = ["response"=>true, "data"=>"SUCCESS"];
                }else{
                    $data = ["Something is Wrong!!"];
                    $response = ["response"=>false, "data"=>$data];
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
    public function not_approve_task()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                if($this->model_task_assign->not_approve_task($data))
                {
                    $response = ["response"=>true, "data"=>"SUCCESS"];
                }else{
                    $data = ["Something is Wrong!!"];
                    $response = ["response"=>false, "data"=>$data];
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
    public function re_assign_task_list()
    {
        if(isPost()){
            try{
                $data = postData();
                $result = $this->model_task_assign->re_assign_task_list($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['middle_name']."".$details['last_name'];
                    }
                }
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
    public function re_assign_task()
    {
        if(isPost()){
            try{
                $this->db->beginTransaction();
                $data = postData();
                $errMsg = $this->Validate_task_assign->task_assign($data);
                if(empty($errMsg))
                {
                    if($this->model_task_assign->re_assign_task($data))
                    {
                        $response = ["response"=>true, "data"=>"SUCCESS"];
                    }else{
                        $data = ["Something is Wrong!!"];
                        $response = ["response"=>false, "data"=>$data];
                    }
                }
                else
                {
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
    public function search_recieve_task_list()
    {
        if(isPost()){
            try{
                $data = postData();

                $result = $this->model_task_assign->search_recieve_task_list($data);
                // echo '<pre>';print_r($result);return;
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    }
                    $response = ["response"=>true, "data"=>$result];
                }else{
                    $response = ["response"=>false, "data"=>"Data Not Found"];
                }

                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function search_task_assign_list()
    {
        if(isPost()){
            try{
                $data = postData();
                $result = $this->model_task_assign->search_task_assign_list($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    }
                    $response = ["response"=>true, "data"=>$result];
                }else{
                    $response = ["response"=>false, "data"=>"Data Not Found"];
                }
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function search_approve_task_list()
    {
        if(isPost()){
            try{
                $data = postData();
                $result = $this->model_task_assign->search_approve_task_list($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    }
                    $response = ["response"=>true, "data"=>$result];
                }else{
                    $response = ["response"=>false, "data"=>"Data Not Found"];
                }
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function search_re_assign_task_list()
    {
        if(isPost()){
            try{
                $data = postData();

                $result = $this->model_task_assign->search_re_assign_task_list($data);
                    // echo '<pre>';print_r($data); return;   
                if($result){
                    $result = json_decode(json_encode($result), true);
                    foreach($result as $key => $values){
                        $ID = $values['assign_by_user_mstr_id'];
                        $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                        $result[$key]['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    }
                    $response = ["response"=>true, "data"=>$result];
                }else{
                    $response = ["response"=>false, "data"=>"Data Not Found"];
                }
                echo json_encode($response);
            }catch(Exception $e){
                $response = ["response"=>false, "data"=>$e->getMessage()];
                echo json_encode($response);
            }
        }else{
            $response = ["response"=>false, "data"=>"post request is not found"];
        }
    }
    public function view_recieve_task_list()
    {
        if(isPost()){
            try{
                $data = postData();
                $result = $this->model_task_assign->view_recieve_task_list($data);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    //foreach($result as $key => $values){
                    $ID = $result['assign_by_user_mstr_id'];
                    $details = $this->model_emp_details->getEmpDetailsNameById($ID);
                    $result['assign_by_emp_name'] = $details['first_name']." ".$details['last_name'];
                    //}
                }
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
}

?>