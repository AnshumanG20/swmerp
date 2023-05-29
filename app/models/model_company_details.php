<?php
class model_company_details
{
    private $db;
    private $tbl_name ="tbl_company_details";
    public function __construct()
    {
        $this->db = new dataBase();
    }
    public function gate_company_details()
    {
        try
        {
            $sql ="select * from tbl_company_details";
            $this->db->query($sql);
            $result = $this->db->single();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gate_company_name()
    {
        try
        {
            $sql ="select company_name,website from tbl_company_details where _status=1";
            $this->db->query($sql);
            $result = $this->db->single();
            //print_r($result);
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function company_add_update($data)
    {
        //print_r($data);
        if($data['_id']=="") //Insert Data
        {
            $id = $this->db->table('tbl_company_details')->
                insertGetId([
                    "company_name"=>$data["company_name"],
                    "website"=>$data["website"],
                    "cin_no"=>$data["cin_no"],
                    "pan_no"=>$data["pan_no"],
                    "tin_no"=>$data["tin_no"],
                    "tds_no"=>$data["tds_no"]
                ]);
            if($id)
            {
                $result = $this->db->table('tbl_company_location')->
                    insert([
                        "office_type"=>$data["ho_branch"],
                        "gstin_no"=>$data["gs_gstin_no"],
                        "address"=>$data["address"],
                        "email_id"=>$data["em_email_id"],
                        "state_dist_city_id"=>$data["state_dist_city_id"],
                        "contact_no"=>$data["con_contact_no"],
                        "company_id"=>$id
                    ]); 
            }
            return $id;
        }
        else //Update Data
        {
            $result = $this->db->table('tbl_company_details')->
                where("_id", "=", $data['_id'])->
                update([
                    "company_name"=>$data["company_name"],
                    "website"=>$data["website"],
                    "cin_no"=>$data["cin_no"],
                    "pan_no"=>$data["pan_no"],
                    "tin_no"=>$data["tin_no"],
                    "tds_no"=>$data["tds_no"]
                ]);
            return $result;
        }
    }
    public function company_location_add_update($data)
    {
        try
        {
            $sql ="select _id from tbl_company_details where _status=1";
            $this->db->query($sql);
            $id = $this->db->single();
            $id = JSON_DECODE(JSON_ENCODE($id), true);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        if($data['_id']=="") //Insert Data For Location
        {
            $result = $this->db->table('tbl_company_location')->
                insert([
                    "office_type"=>$data["office_type"],
                    "gstin_no"=>$data["gstin_no"],
                    "address"=>$data["address"],
                    "email_id"=>$data["email_id"],
                    "state_dist_city_id"=>$data["state_dist_city_id"],
                    "contact_no"=>$data["contact_no"],
                    "landmark"=>$data["landmark"],
                    "company_id"=>$id["_id"]
                ]);
            return $result;
        }
        else //Update Data For Location
        {
            $result = $this->db->table('tbl_company_location')->
                where("_id", "=", $data['_id'])->
                update([
                    "office_type"=>$data["office_type"],
                    "gstin_no"=>$data["gstin_no"],
                    "address"=>$data["address"],
                    "email_id"=>$data["email_id"],
                    "state_dist_city_id"=>$data["state_dist_city_id"],
                    "contact_no"=>$data["contact_no"],
                    "landmark"=>$data["landmark"]
                ]);
            return $result;
        }
    }
    public function insert_address($address,$gstin_no,$contact_no,$email_id,$state_dist_city_id,$office_type)
    {
        try
        {
            $sql ="select _id from tbl_company_details where _status=1";
            $this->db->query($sql);
            $id = $this->db->single();
            $id = JSON_DECODE(JSON_ENCODE($id), true);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $result = $this->db->table('tbl_company_location')->
            insert([
                "office_type"=>$office_type,
                "address"=>$address,
                "email_id"=>$email_id,
                "state_id"=>$state_id,
                "contact_no"=>$contact_no,
                "gstin_no"=>$gstin_no,
                "company_id"=>$id["_id"]
            ]);
    }
    public function head_office_address($data)
    {
        try
        {
            $sql ="select _id from tbl_company_details where _status=1";
            $this->db->query($sql);
            $id = $this->db->single();
            $id = JSON_DECODE(JSON_ENCODE($id), true);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $result = $this->db->table('tbl_company_location')->
            insert([
                "office_type"=>$data['office_type'],
                "address"=>$data['ho_address'],
                "email_id"=>$data['ho_email_id'],
                "state_id"=>$data['ho_state_id'],
                "contact_no"=>$data['ho_contact_no'],
                "gstin_no"=>$data['ho_gstin_no'],
                "company_id"=>$id["_id"]
            ]);
    }
    public function gate_company_location_id($id)
    {
        try
        {
            $sql = "select
                   company.company_name,
                   company.website,
                   company.cin_no,
                   company.tin_no,
                   company.tds_no,
                   company.pan_no,
                   location._id,
                   location.address,
                   location.gstin_no,
                   location.contact_no,
                   location.email_id,
                   location.state_dist_city_id,
                   state.state,
                   state.dist,
                   state.city,
                   location.company_id,
                   location.office_type,
                   location.landmark
                   from tbl_company_location location
                   join tbl_company_details company on (company._id = location.company_id)
                   join tbl_state_dist_city state on (state._id = location.state_dist_city_id)
                   where location._id=:id AND location._status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gate_state()
    {
        try
        {
            $sql ="select * from tbl_state_mstr where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function company_data()
    {
        try
        {
            $sql ="select * from tbl_company_details where _status=1";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function company_reg_address($data)
    {
        //print_r($data);
        $result = $this->db->table('tbl_company_location')->
            insert([
                "address"=>$data["reg_address"],
                "cin_no"=>$data["reg_cin_no"],
                "pan_no"=>$data["reg_pan_no"],
                "tin_no"=>$data["reg_tin_no"],
                "gstin_no"=>$data["reg_gstin_no"],
                "tds_no"=>$data["reg_tds_no"],
                "contact_no"=>$data["reg_contact_no"],
                "email_id"=>$data["reg_email_id"],
                "state_id"=>$data["reg_state_name"],
                "_status"=>"1"
            ]);
        return json_decode(json_encode($result), true);

    }
    public function company_type($data)
    {
        //print_r($data);
        $result = $this->db->table('tbl_company_location')->
            insert([
                "address"=>$data["reg_address"],
                "cin_no"=>$data["reg_cin_no"],
                "pan_no"=>$data["reg_pan_no"],
                "tin_no"=>$data["reg_tin_no"],
                "gstin_no"=>$data["reg_gstin_no"],
                "tds_no"=>$data["reg_tds_no"],
                "contact_no"=>$data["reg_contact_no"],
                "email_id"=>$data["reg_email_id"],
                "state_id"=>$data["ho_state_name"],
                "office_type"=>"Head Office",
                "_status"=>"1"
            ]);
        return json_decode(json_encode($result), true);

    }
    public function company_branchtype($data)
    {
        //print_r($data);
        $result = $this->db->table('tbl_company_location')->
            insert([
                "address"=>$data["reg_address"],
                "cin_no"=>$data["reg_cin_no"],
                "pan_no"=>$data["reg_pan_no"],
                "tin_no"=>$data["reg_tin_no"],
                "gstin_no"=>$data["reg_gstin_no"],
                "tds_no"=>$data["reg_tds_no"],
                "contact_no"=>$data["reg_contact_no"],
                "email_id"=>$data["reg_email_id"],
                "state_id"=>$data["ho_state_name"],
                "office_type"=>"Branch Office",
                "_status"=>"1"
            ]);
        return json_decode(json_encode($result), true);

    }
    public function companylocation_add($data)
    {
        //print_r($data);
        $result = $this->db->table('tbl_company_location')->
            insert([
                "address"=>$data["reg_address"],
                "cin_no"=>$data["reg_cin_no"],
                "pan_no"=>$data["reg_pan_no"],
                "tin_no"=>$data["reg_tin_no"],
                "gstin_no"=>$data["reg_gstin_no"],
                "tds_no"=>$data["reg_tds_no"],
                "contact_no"=>$data["reg_contact_no"],
                "email_id"=>$data["reg_email_id"],
                "state_id"=>$data["reg_state_name"],
                "office_type"=>$data["company_type"],
                "_status"=>"1"
            ]);
        return json_decode(json_encode($result), true);

    }
    public function company_deactivate_list()
    {
        try
        {
            $sql = "select
                   location._id,
                   location.address,
                   location.gstin_no,
                   location.contact_no,
                   location.email_id,
                   location.state_dist_city_id,
                   location.company_id,
                   location.office_type,
                   location.remark,
                   state.dist,
                   state.city,
                   state.state
                   from tbl_company_location location
                   join tbl_state_dist_city state on (state._id = location.state_dist_city_id)
                   where location._status =0 order by location._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function company_details()
    {
        try
        {
            $sql = "select
                   company.company_name,
                   company.website,
                   company.cin_no,
                   company.tin_no,
                   company.tds_no,
                   company.pan_no,
                   location._id,
                   location.address,
                   location.gstin_no,
                   location.contact_no,
                   location.email_id,
                   location.company_id,
                   location.office_type,
                   location.landmark,
                   state.city,
                   state.dist,
                   state.state
                   from tbl_company_location location
                   join tbl_company_details company on (company._id = location.company_id)
                   join tbl_state_dist_city state on (state._id = location.state_dist_city_id)
                   where location._status =1 order by location._id desc";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function gate_company_details_id($id)
    {
        try
        {
            $sql = "select * from tbl_company_details
                   where _id=:id AND _status=1";
            $this->db->query($sql);
            $this->db->bind('id',$id);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function company_location(){
        $sql = "SELECT * FROM tbl_company_location
                    WHERE _status=:id";
        $this->db->query($sql);
        $this->db->bind("id", '1');
        $result = $this->db->resultset();
        return $result;
    }
    public function company_locationedit($data){
        $sql = "SELECT * FROM tbl_company_location
                    WHERE _id=:id";
        $this->db->query($sql);
        $this->db->bind("id", $data["id"]);
        $result = $this->db->single();
        return $result;
    }
    public function company_locationupdate($data){

        return $result = $this->db->table('tbl_company_location')->
            where("_id", "=", $data['id'])->
            update([
                "address"=>$data["reg_address"],
                "cin_no"=>$data["reg_cin_no"],
                "pan_no"=>$data["reg_pan_no"],
                "tin_no"=>$data["reg_tin_no"],
                "gstin_no"=>$data["reg_gstin_no"],
                "tds_no"=>$data["reg_tds_no"],
                "contact_no"=>$data["reg_contact_no"],
                "email_id"=>$data["reg_email_id"],
                "state_id"=>$data["reg_state_name"],
                "office_type"=>$data["company_type"],
                "_status"=>"1"
            ]);
        get();

    }
    public function company_deactivate($id,$result){
        return $result = $this->db->table('tbl_company_location')->
            where("_id", "=", $id)->
            update(["_status"=>"0",
                    "remark"=>$result,
                    "deactivated_date"=>dateTime(),
                    "deactivated_by"=>$_SESSION['emp_details']['_id']
                   ]);
        get();

    }
    public function company_reactivate($data){
        return $result = $this->db->table('tbl_company_location')->
            where("_id", "=", $data['id'])->
            update(["_status"=>"1",
                    "re_activated_date"=>dateTime(),
                    "re_activated_by"=>$_SESSION['emp_details']['_id']
                   ]);
        get();

    }
    public function checkHeadOfficeIsExistInCompanyLocation(){
        return $this->db->table('tbl_company_location')
            ->select('_id')
            ->where('office_type', '=', 'Head/Corporate Office')
            ->where('_status', '=', 1)
            ->first();
    }
    public function checkRegisteredIsExistInCompanyLocation(){
        return $this->db->table('tbl_company_location')
            ->select('_id')
            ->where('office_type', '=', 'Registered')
            ->where('_status', '=', 1)
            ->first();
    }
    
    public function stateList(){
        try{

            return $this->db->table('tbl_state_dist_city')
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

}
?>