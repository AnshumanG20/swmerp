<?php 
class model_task_mstr
{
    private $db;
    private $tbl_name = "tbl_task_mstr_list";
    public function __construct()
    {
        $this->db = new Database();

    }
    public function insert_task($data)
    {
        $result = $this->db->table($this->tbl_name)->
            insert([
                "project_mstr_id"=>$data["project_mstr_id"],
                "task_name"=>$data["task_name"],
                "description"=>$data['description']
            ]);
        return $result;
    }
    public function update_task($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $data['_id'])->
            update([
                "project_mstr_id"=>$data["project_mstr_id"],
                "task_name"=>$data["task_name"],
                "description"=>$data['description']
            ]);
        return $result;
    }
    public function gate_project_name()
    {
        try
        {
            $sql = "select _id,project_name from tbl_project_mstr where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function duplicateFun($data)
    {
        try
        {
            $sql = "select task_name,project_mstr_id from tbl_task_mstr_list 
                where task_name=:task_name AND project_mstr_id=:project_mstr_id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('task_name',$data['task_name']);
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
    public function getAll_Task()
    {
        try{
            $sql="select
				    task._id,
				    task.task_name,
                    task.description,
                    task.project_mstr_id,
				    project.project_name
				    FROM tbl_task_mstr_list task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
				    where task._status=1 order by task._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function duplicateFunUpdate($data)
    {
        try
        {
            $sql = "select task_name,project_mstr_id from tbl_task_mstr_list
                where task_name=:task_name AND project_mstr_id=:project_mstr_id AND _id!=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('task_name',$data['task_name']);
            $this->db->bind('project_mstr_id',$data['project_mstr_id']);
            $this->db->bind('id',$data['_id']);
            $result = $this->db->resultset();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    public function taskGetById($data)
    {
        try{
            $sql="select
				    task._id,
				    task.task_name,
                    task.description,
                    task.project_mstr_id,
				    project.project_name
				    FROM tbl_task_mstr_list task
				    left join tbl_project_mstr project on (project._id=task.project_mstr_id)
				    where task._status=1 AND task._id=:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['id']);
            $result = $this->db->single();
            return $result;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function DeleteByIdTask($data)
    {
        $result = $this->db->table($this->tbl_name)->
            where("_id", "=", $data['_id'])->
            update([
                "_status"=>0
            ]);
        return $result;

    }
}


?>