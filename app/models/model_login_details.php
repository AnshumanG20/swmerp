<?php 
class model_login_details
{
    private $db;
    private $tbl_name = "tbl_login_details";
    public function __construct()
    {
         $this->db = new dataBase();

        //  $sql ="select * from tbl_emp_details where _id=:_id";
        //  $this->db->query($sql);
        //  $this->db->bind("_id",54);
        //  $result = $this->db->resultSet();
        //  echo '<pre>';print_r($result);return;
    }
    public function insertLoginDetails($data){
        return $this->db->table($this->tbl_name)
                        ->insert([
                            "emp_details_id"=>$data['emp_details_id'],
                            "device_type"=>$data['device_type'],
                            "imei_no"=>$data['imei_no'],
                            "ip_address"=>$data['ip_address'],
                            "_token"=>$data['_token'],
                            "created_on"=>$data['created_on'],
                            "_status"=>1
                          ]);

    }

    public function getAllEmployee(){
        $sql = "SELECT _id, first_name,last_name, d_o_b from tbl_emp_details WHERE DATE_PART('month',d_o_b::date)
                BETWEEN DATE_PART('month',now()::date) AND DATE_PART('month',now()::date)+1 and _status=1 order by concat(DATE_PART('month','2022-06-03'::date),'-', DATE_PART('day','2022-06-03'::date)) asc";
        $builder = $this->db->query($sql);

        return $result = $this->db->resultset();
    }

    public function getLastLoginDetails($id){
        // return "wow";
        $sql = "SELECT *
        FROM tbl_login_details where emp_details_id=:emp_details_id order by _id desc limit 5;";
        $this->db->query($sql);
        $this->db->bind('emp_details_id',$id);
        $result = $this->db->resultset();

        return $result;
    }

    public function getDesigantaion($desgId){
        // return "wowwwwwwww";
        $sql = "SELECT designation_name FROM tbl_designation_mstr where _id=:_id";
        $this->db->query($sql);
        $this->db->bind('_id',$desgId);
        $result = $this->db->single();

        return $result;
    }
}