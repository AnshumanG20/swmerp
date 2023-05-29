<?php 
class model_task_assign
{
    private $db;
    private $tbl_name = "tbl_task_assign_details";
    public function __construct()
    {
        $this->db = new Database();

    }
    public function gate_emp_name($data)
    {  
        try
        {
           
            $designation_mstr_id = "";
            $sql = "select reporting_person_emp_mstr_id from tbl_on_reporting_leave_mstr where reporting_head_emp_mstr_id =:reporting_head_emp_mstr_id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('reporting_head_emp_mstr_id',$data['assign_by_user_mstr_id']);
            $result = $this->db->resultset();
            //got list of all designations of employees who are under this employee
            if($result)
            {
                $result = json_decode(json_encode($result), true);
                $i = 0;
                foreach($result as $values){
                    $i++;
                    if($i==1){
                        $designation_mstr_id .= $values['reporting_person_emp_mstr_id'];
                    }else{
                        $designation_mstr_id .= ", ".$values['reporting_person_emp_mstr_id'];
                    }

                }
                //find all employees with the got designation list
                $sql = "select _id,first_name,middle_name,last_name from tbl_emp_details where _id IN (".$designation_mstr_id.") AND company_location_id =:company_location_id AND _status=1";
                $this->db->query($sql);
                $this->db->bind('company_location_id',$data['company_location_id']);
                $emp_name = $this->db->resultset();
                //print_r($result);
                return $emp_name;

            }
            else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function getTaskId($data){
        $result = $this->db->table('tbl_task_mstr_list')->
            insertGetId([
                "project_mstr_id"=>$data['project_mstr_id'],
                "task_name"=>$data['other_task'],
                "description"=>$data['remarks_by_assigned'],
                "_status"=>1
            ]);
            return $result;
    }
    public function gate_task_name($data)
    {
        try
        {
            $sql = "select * from tbl_task_mstr_list where project_mstr_id=:project_mstr_id AND _status=:_status";
            $this->db->query($sql);
            $this->db->bind('project_mstr_id',$data['project_mstr_id']);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gate_project_name($data)
    {
        try
        {
            $sql = "select * from tbl_project_mstr where _id =:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$data['project_mstr_id']);
            $result = $this->db->resultset();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function ajax_task_name($data)
    {
        try
        {
            $sql = "select * from tbl_task_mstr_list where project_mstr_id =:project_mstr_id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('project_mstr_id',$data['project_mstr_id']);
            $result = $this->db->resultset();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function insert_task_assign($data)
    {
        $result = $this->db->table($this->tbl_name)->
            insertGetId([
                "assigned_emp_details_id"=>$data["assigned_emp_details_id"],
                "project_mstr_id"=>$data['project_mstr_id'],
                "task_list_mstr_id"=>$data["task_list_mstr_id"],
                "other_task"=>$data['other_task'],
                "remarks_by_assigned"=>$data['remarks_by_assigned'],
                "deadline_date_time"=>$data['deadline_date_time'],
                "assign_date_time"=>datetime(),
                "deadline_date_time"=>$data['deadline_date_time'],
                "assign_by_user_mstr_id"=>$data['assign_by_user_mstr_id'],
                "created_on"=>datetime(),
                "receive_reject_status"=>1
            ]);
        if($result) //Notification table
        {
            try
            {
                $sql = "select first_name,middle_name,last_name from tbl_emp_details where _id =:id";
                $this->db->query($sql);
                $this->db->bind('id',$data['assigned_emp_details_id']);
                $title=$this->db->single();
                //$title = json_decode(json_encode($title), true);
                $fullName = $title['first_name']." ".$title['middle_name']." ".$title['last_name'];
                $notification_insert = $this->db->table('tbl_notification_detail')->
                    insert([
                        "title"=>$fullName,
                        "about"=>"Task Received",
                        "link"=>"Task_Assign/view_recieve_task_list/$result",
                        "created_by"=>$data['assign_by_user_mstr_id'],
                        "employee_id"=>$data["assigned_emp_details_id"],
                        "notification_type"=>"Task",
                        "notification_reference_id"=>$result,
                        "created_on"=>datetime()
                    ]);
                return $notification_insert;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
        else
        {
            return false;
        }
    }
    public function getAll_Assign_Task($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.reassign_task_assign_details_id,
                    task.created_on,
                    task.reject_re_assign_task,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id =:assign_by_user_mstr_id order by task._id desc";
            $this->db->query($sql);
            $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function taskGetById($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._id =:id AND task._status=1";
            $this->db->query($sql);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function taskUpdate($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where('_id', '=',$data['_id'])->
            update([
                "assigned_emp_details_id"=>$data["assigned_emp_details_id"],
                "project_mstr_id"=>$data['project_mstr_id'],
                "task_list_mstr_id"=>$data["task_list_mstr_id"],
                "other_task"=>$data['other_task'],
                "remarks_by_assigned"=>$data['remarks_by_assigned'],
                "deadline_date_time"=>$data['deadline_date_time'],
                "updated_on"=>datetime(),
                "deadline_date_time"=>$data['deadline_date_time'],
                "assign_by_user_mstr_id"=>$data['assign_by_user_mstr_id']
            ]);
        return $result;
    }
    public function DeleteByIdTask($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $data['_id'])->
            update([
                "_status"=>0
            ]);
        if($result)
        {
            $status = $this->db->table('tbl_notification_detail')->
                where('notification_reference_id', '=',$data['_id'])->
                update([
                    "_status"=>0
                ]);
            return $status;
        }
        else
        {
            return false;
        }
    }
    public function recieve_task_list($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.not_approve_remark,
                    task.reject_re_assign_task,
                    task.reassign_task_assign_details_id,
                    task.score,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assigned_emp_details_id =:assigned_emp_details_id order by task._id desc";
            $this->db->query($sql);
            $this->db->bind('assigned_emp_details_id',$data['assigned_emp_details_id']);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function recieve_task($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where('_id', '=',$data['_id'])->
            update([
                "receive_reject_date"=>datetime(),
                "receive_reject_status"=>2
            ]);
        if($result)
        {
            $notification_update= $this->db->table('tbl_notification_detail')->
                where('notification_reference_id', '=',$data['_id'])->
                update([
                    "_status"=>0
                ]);
        }
        return $notification_update;
    }
    public function reject_task($data)
    {
        try
        {
            $result = $this->db->table($this->tbl_name)->
                where('_id', '=',$data['_id'])->
                update([
                    "receive_reject_date"=>datetime(),
                    "receive_reject_status"=>0,
                    "assign_by_remarks"=>$data['remark']

                ]);
            if($result)
            {
                $notification_update= $this->db->table('tbl_notification_detail')->
                    where('notification_reference_id', '=',$data['_id'])->
                    update([
                        "_status"=>0
                    ]);
                return $notification_update;
            }else{
                return false;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function post_task($data)
    {
        try
        {
            $result = $this->db->table($this->tbl_name)->
                where('_id', '=',$data['_id'])->
                update([
                    "complete_date_time"=>datetime(),
                    "receive_reject_status"=>3,
                    "assign_by_remarks"=>(isset($data['remark']))?$data['remark']:null
                ]);
            if($result)
            {
                $assigned_emp_details_id ="select assigned_emp_details_id,assign_by_user_mstr_id from tbl_task_assign_details where _id =:_id";
                $this->db->query($assigned_emp_details_id);
                $this->db->bind('_id',$data['_id']);
                $emp_details_id = $this->db->single();

                $sql = "select first_name,middle_name,last_name from tbl_emp_details where _id =:id";
                $this->db->query($sql);
                $this->db->bind('id',$emp_details_id['assigned_emp_details_id']);
                $title=$this->db->single();
                //$title = json_decode(json_encode($title), true);
                $fullName = $title['first_name']." ".$title['middle_name']." ".$title['last_name'];

                //update Status of Notification Table 
                $status = $this->db->table('tbl_notification_detail')->
                    where('notification_reference_id', '=',$data['_id'])->
                    update([
                        "_status"=>0
                    ]);

                //Send Notification for reject Task
                $notification_insert = $this->db->table('tbl_notification_detail')->
                    insert([
                        "title"=>$fullName,
                        "about"=>"Submit Task",
                        "link"=>"Task_Assign/approve_task_list",
                        "created_by"=>$emp_details_id['assigned_emp_details_id'],
                        "employee_id"=>$emp_details_id['assign_by_user_mstr_id'],
                        "notification_type"=>"Submit Task",
                        "notification_reference_id"=>$data['_id'],
                        "created_on"=>datetime()
                    ]);
                return $notification_insert;
            }else{
                return false;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function approve_task_list($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.assign_by_remarks,
                    task.reject_re_assign_task,
                    task.complete_date_time,
                    task.created_on,
                    task.approve_not_approve_date,
                    task.not_approve_remark,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id =:assign_by_user_mstr_id AND receive_reject_status IN(3,4,5) order by task._id desc";
            $this->db->query($sql);
            $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function approve_task($data)
    {
        // print_r($data);return;
        $result = $this->db->table($this->tbl_name)->
            where('_id', '=',$data['approve_id'])->
            update([
                "approve_not_approve_date"=>datetime(),
                "not_approve_remark"=>$data['approve_task_remark'],
                "score"=>$data['approve_task_score'],
                "receive_reject_status"=>4
            ]);
        if($result)
        {
            $status = $this->db->table('tbl_notification_detail')->
                where('notification_reference_id', '=',$data['approve_id'])->
                update([
                    "_status"=>0
                ]);
            return $status;
        }
        else
        {
            return false;
        }
    }    
    public function not_approve_task($data)
    {
        try{
            $result = $this->db->table($this->tbl_name)->
                where('_id', '=',$data['_id'])->
                update([
                    "approve_not_approve_date"=>datetime(),
                    "receive_reject_status"=>5,
                    "not_approve_remark"=>(isset($data['remark']))?$data['remark']:null
                ]);
            if($result)
            {
                $status = $this->db->table('tbl_notification_detail')->
                    where('notification_reference_id', '=',$data['_id'])->
                    update([
                        "_status"=>0
                    ]);
                return $status;
            }
            else
            {
                return false;
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function re_assign_task_list($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.reassign_task_assign_details_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.assign_by_remarks,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id=:assign_by_user_mstr_id AND task.receive_reject_status IN (0,5) order by task._id desc";
            $this->db->query($sql);
            $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function re_assign_task($data)
    {
        try
        {
            $result = $this->db->table($this->tbl_name)->
                insertGetId([
                    "assigned_emp_details_id"=>$data["assigned_emp_details_id"],
                    "project_mstr_id"=>$data['project_mstr_id'],
                    "task_list_mstr_id"=>$data["task_list_mstr_id"],
                    "other_task"=>$data['other_task'],
                    "remarks_by_assigned"=>$data['remarks_by_assigned'],
                    "deadline_date_time"=>$data['deadline_date_time'],
                    "assign_date_time"=>datetime(),
                    "deadline_date_time"=>$data['deadline_date_time'],
                    "assign_by_user_mstr_id"=>$data['assign_by_user_mstr_id'],
                    "created_on"=>datetime(),
                    "receive_reject_status"=>1,
                    "reject_re_assign_task"=>1
                ]);
            if($result)
            {
                $record = $this->db->table($this->tbl_name)->
                    where('_id', '=',$data['_id'])->
                    update([
                        "reassign_task_assign_details_id"=>$result
                    ]);
                $sql = "select first_name,middle_name,last_name from tbl_emp_details where _id =:id";
                $this->db->query($sql);
                $this->db->bind('id',$data['assigned_emp_details_id']);
                $title=$this->db->single();
                //$title = json_decode(json_encode($title), true);
                $fullName = $title['first_name']." ".$title['middle_name']." ".$title['last_name'];
                $notification_insert = $this->db->table('tbl_notification_detail')->
                    insert([
                        "title"=>$fullName,
                        "about"=>"Task Assign",
                        "link"=>"Task_Assign/view_recieve_task_list/$result",
                        "created_by"=>$data['assign_by_user_mstr_id'],
                        "employee_id"=>$data["assigned_emp_details_id"],
                        "notification_type"=>"Task",
                        "notification_reference_id"=>$result,
                        "created_on"=>datetime()
                    ]);
                return $notification_insert;
            }
            else
            {
                return false;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function search_recieve_task_list($data)
    {
        // echo '<pre>';print_r($data);return;
        try{
            if($data['receive_reject_status']!="")
            {
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.not_approve_remark,
                    task.reassign_task_assign_details_id,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assigned_emp_details_id =:emp_details_id AND  DATE(task.created_on) BETWEEN :from_date AND :to_date  AND task.receive_reject_status =:receive_reject_status order by task._id desc";
                $this->db->query($sql);
                $this->db->bind('emp_details_id',$data['assigned_emp_details_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $this->db->bind('receive_reject_status',$data['receive_reject_status']);
                $result = $this->db->resultset();
                return $result;
            }
            else
            {
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.not_approve_remark,
                    task.reassign_task_assign_details_id,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assigned_emp_details_id =:emp_details_id AND DATE(task.created_on) BETWEEN :from_date AND :to_date  order by task._id desc";
                $this->db->query($sql);
                $this->db->bind('emp_details_id',$data['assigned_emp_details_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $result = $this->db->resultset();
                return $result;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function search_task_assign_list($data)
    {
        try{
            if($data['receive_reject_status']!="")
            {
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.reassign_task_assign_details_id,
                    task.created_on,
                    task.reject_re_assign_task,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id =:assign_by_user_mstr_id AND DATE(task.created_on) BETWEEN :from_date AND :to_date AND task.receive_reject_status =:receive_reject_status order by task._id desc";
                $this->db->query($sql);
                $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $this->db->bind('receive_reject_status',$data['receive_reject_status']);
                $result = $this->db->resultset();
                return $result;
            }
            else
            {
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.reassign_task_assign_details_id,
                    task.created_on,
                    task.reject_re_assign_task,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id =:assign_by_user_mstr_id AND DATE(task.created_on) BETWEEN :from_date AND :to_date order by task._id desc";
                $this->db->query($sql);
                $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $result = $this->db->resultset();
                return $result;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function search_approve_task_list($data)
    {
        try{
            if($data['receive_reject_status']!="")
            {
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.assign_by_remarks,
                    task.complete_date_time,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.approve_not_approve_date,
                    task.not_approve_remark,
				    project.project_name,
                    task_mstr.task_name, 
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id =:assign_by_user_mstr_id AND task.receive_reject_status =:receive_reject_status AND DATE(task.complete_date_time) BETWEEN :from_date AND :to_date order by task._id desc";
                $this->db->query($sql);
                $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $this->db->bind('receive_reject_status',$data['receive_reject_status']);
                $result = $this->db->resultset();
                return $result;
            }
            else
            {
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.assign_by_remarks,
                    task.complete_date_time,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.approve_not_approve_date,
                    task.not_approve_remark,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id =:assign_by_user_mstr_id AND DATE(task.complete_date_time) BETWEEN :from_date AND :to_date order by task._id desc";
                $this->db->query($sql);
                $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $result = $this->db->resultset();
                return $result;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function search_re_assign_task_list($data)
    {
        // echo '<pre>';print_r($data);return;
        try{
            if($data['receive_reject_status']!="")
            {
                if($data['receive_reject_status']==5)
                {
                    $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.reassign_task_assign_details_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.assign_by_remarks,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id=:assign_by_user_mstr_id AND DATE(task. complete_date_time) BETWEEN :from_date AND :to_date AND task.receive_reject_status =:receive_reject_status order by task._id desc";
                    $this->db->query($sql);
                    $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                    $this->db->bind('from_date',$data['from_date']);
                    $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                    $this->db->bind('receive_reject_status',$data['receive_reject_status']);
                    $result = $this->db->resultset();
                    return $result;
                }
                else
                {
                    $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.reassign_task_assign_details_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.assign_by_remarks,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id=:assign_by_user_mstr_id AND DATE(task.receive_reject_date) BETWEEN :from_date AND :to_date AND task.receive_reject_status =:receive_reject_status order by task._id desc";
                    $this->db->query($sql);
                    $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                    $this->db->bind('from_date',$data['from_date']);
                    $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                    $this->db->bind('receive_reject_status',$data['receive_reject_status']);
                    $result = $this->db->resultset();
                    return $result;
                }

            }
            else
            {
                // echo '<pre>';print_r($data);
                $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.reassign_task_assign_details_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.assign_by_remarks,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assign_by_user_mstr_id=:assign_by_user_mstr_id AND DATE(task.assign_date_time) BETWEEN :from_date AND :to_date AND receive_reject_status IN(0,5) order by task._id desc";

                    // var_dump($sql);return;
                $this->db->query($sql);
                $this->db->bind('assign_by_user_mstr_id',$data['assign_by_user_mstr_id']);
                $this->db->bind('from_date',$data['from_date']);
                $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
                $result = $this->db->resultset();
                return $result;
            }

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function view_recieve_task_list($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.created_on,
                    task.reject_re_assign_task,
                    task.not_approve_remark,
                    task.reassign_task_assign_details_id,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where task._status=1 AND task.assigned_emp_details_id =:assigned_emp_details_id AND task._id=:id";
            $this->db->query($sql);
            $this->db->bind('assigned_emp_details_id',$data['assigned_emp_details_id']);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    
    
    
    public function getTaskList($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.reassign_task_assign_details_id,
                    task.created_on,
                    task.reject_re_assign_task,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where DATE(task.created_on) BETWEEN :from_date AND :to_date
                    order by task._id desc";
            $this->db->query($sql);
            $this->db->bind('from_date',$data['from_date']);
            $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function getTaskSearchList($data)
    {
        try{
            $sql="select
				    task._id,
				    task.assigned_emp_details_id,
                    task.project_mstr_id,
                    task.task_list_mstr_id,
                    task.other_task,
                    task.remarks_by_assigned,
                    task.deadline_date_time,
                    task.project_mstr_id,
                    task.assign_date_time,
                    task.assign_by_user_mstr_id,
                    task.receive_reject_status,
                    task.reassign_task_assign_details_id,
                    task.created_on,
                    task.reject_re_assign_task,
				    project.project_name,
                    task_mstr.task_name,
                    details.first_name,
                    details.middle_name,
                    details.last_name
				    FROM tbl_task_assign_details task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
                    left join tbl_task_mstr_list task_mstr on (task_mstr._id=task.task_list_mstr_id)
                    left join tbl_emp_details details on (details._id=task.assigned_emp_details_id)
				    where DATE(task.created_on) BETWEEN :from_date AND :to_date
                    order by task._id desc";
            if($data['receive_reject_status']!=""){
                    $sql .= " AND task.resign_terminate_type='".$data['receive_reject_status']."'";
             }
            $this->db->query($sql);
            $this->db->bind('from_date',$data['from_date']);
            $this->db->bind('to_date', date("Y-m-d", strtotime($data['to_date'] . ' +1 day')));
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }


    public function getSubtaskList($id){
        // echo "ddddddddddd ". $id;return;

        $sql = "select
                    twd.id,
                    twd.task_assigned_mstr_id,
                    twd.subtask_title,
                    twd.subtask_description,
                    twd.created_at,
                    twd.status,
                    twd.task_percent,
                    tad.assign_by_user_mstr_id,
                    tad._id,
                    tad.receive_reject_status
                    from tbl_task_workground_details twd join tbl_task_assign_details tad on  tad._id = twd.task_assigned_mstr_id where 
                    md5(twd.task_assigned_mstr_id::text)=:task_assigned_mstr_id order by twd.id desc";
        $this->db->query($sql);
        $this->db->bind('task_assigned_mstr_id',$id);

        $result = $this->db->resultset();

        return $result;

    }

    public function insertSubtask($data){

        // print_r($data);
        // return;

        $result = $this->db->table('tbl_task_workground_details')->
            insertGetId([
                "task_assigned_mstr_id"=>$data["task_assigned_mstr_id"],
                "subtask_title"=>$data['subtask_title'],
                "subtask_description"=>$data["subtask_description"],
                "created_at"=>$data['created_at'],
                "task_percent"=> $data['task_percent']
              
            ]);

            return $result;
    }

    public function updateSubtask($data){
        // return $data; die;
        $result = $this->db->table('tbl_task_workground_details')->
            where("id", "=", $data['subtask_id'])->
            update([
                "subtask_title"=>$data['subtask_title'],
                "subtask_description"=>$data['subtask_description'],
                "task_percent"=>$data['task_percent']
               
            ]);

           // echo $this->db->getQuery();

            return $result;
    }


    public function deleteSubtask($id){
        // $id;
        // return;
       $result = $this->db->table('tbl_task_workground_details')->
            where("id", "=", $id)->
            update([
                "status"=>0
            ]);

            return $result;
    }

    public function getUpdateData($id){
        $sql = "select * from tbl_task_workground_details where id=:id";
        $this->db->query($sql);
        $this->db->bind('id',$id);
        $result = $this->db->resultset();


        return $result;
    }


    public function receive_reject_status($id){

        // echo $id. ' mmmmmmmmmmmmmm';
        // return;

        $sql = "select _id, receive_reject_status, assign_by_user_mstr_id from tbl_task_assign_details where md5(_id::text)=:id";

        $this->db->query($sql);
        $this->db->bind('id',$id);

        return $this->db->single();
    }








}
?>