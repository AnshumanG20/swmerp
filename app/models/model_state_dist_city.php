<?php
class model_state_dist_city
{
    private $db;
    private $tbl_name ="tbl_state_dist_city";
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function getState(){
        try{
            return $this->db->table($this->tbl_name)
                    ->select('state')
                    ->groupBy('state')
                    ->orderBy('state', 'asc')
                    ->get();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getDistByState($data){
        try{
            $sql ="SELECT dist FROM tbl_state_dist_city WHERE state='".$data['state']."' GROUP BY dist ORDER BY dist;";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            if($result){
                return json_decode(json_encode($result), true);
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getCityByDist($data){
        try{
            $sql ="SELECT _id, city FROM tbl_state_dist_city WHERE dist='".$data['dist']."' ORDER BY city;";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            if($result){
                return json_decode(json_encode($result), true);
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getAllCity(){
        try{
            $sql ="SELECT city FROM tbl_state_dist_city ORDER BY city asc;";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            if($result){
                return json_decode(json_encode($result), true);
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function get_dist_state($city){

        
        try{
            $sql ="SELECT state,dist FROM tbl_state_dist_city where city='$city'";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            if($result){
                return $result;
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function getDetailsById($ID){
        try{
            return $this->db->table($this->tbl_name)
                    ->select('*')
                    ->where('_id', '=', $ID)
                    ->first();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function add_to_city_location($data){
        $c_state = $data['state'];
        $c_dist = $data['dist'];
        $c_city = $data['city'];
        try{
            $sql ="insert into tbl_state_dist_city(state,dist,city) values('$c_state','$c_dist','$c_city')";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            if($result){
                return json_decode(json_encode($result), true);
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function get_duplicate_city($data){
        $c_state = $data['state'];
        $c_dist = $data['dist'];
        $c_city = $data['city'];
        try{
            $sql ="select * from tbl_state_dist_city where city='$c_city'";
            $this->db->query($sql);
            $result = $this->db->resultSet();
            if($result){
                return json_decode(json_encode($result), true);
            }else{
                return false;
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}