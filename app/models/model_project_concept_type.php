<?php
class model_project_concept_type
{
    private $db;
    public function __construct()
    {
        $this->db =new Database();
    }
    public function project_concept_type($data)
    {
        try
        {
            $sql = " select concept_type from tbl_project_mstr where _id =:id";
            $this->db->query($sql);
            $this->db->bind('id',$data['project_mstr_id']);
            $result = $this->db->single();
            if($result)
            {
                return $result;
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
}
?>