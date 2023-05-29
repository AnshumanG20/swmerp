<?php
    class model_company_location
    {
        private $db;
        private $tbl_location = "tbl_company_location";
        public function __construct()
        {
            $this->db = new dataBase();
        }
        public function location_list()
        {
            try{
                     $sql="select
				    location._id,
				    location.company_id,
                    location.address,
                    location.pin,
				    location.contact_no,
                    location.email_id,
                    location.country_id,
                    location.state_id,
                    location.company_type,
                    details.company_name,
                    details.company_gstin_no,
                    details.website
				    FROM tbl_company_location location
				    left join tbl_company_details details on (details._id=location.company_id)
				    where location._status=1 order by location._id desc";
				    $this->db->query($sql);
				    $result = $this->db->resultset();
				    return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function deletebyidlocation($id)
        {
            try
            {
                $sql="update tbl_company_location
                    set _status=0
                    where _id =:id";
                $this->db->query($sql);
                $this->db->bind('id',$id);
                $result = $this->db->updation();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    public function companylocation_add_update($data)
    {

        if($data['_id']==null)   //insert
        {
           // print_r($data);
             try{
                  $sql ="insert into tbl_company_location(company_id,address,pin,contact_no,email_id,country_id,state_id,company_type)
                        values(:company_id,:address,:pin,:contact_no,:email_id,:country_id,:state_id,:company_type)";
                 $this->db->query($sql);
                 $this->db->bind('company_id',$data['company_id']);
                 $this->db->bind('address',$data['address']);
                 $this->db->bind('pin',$data['pin']);
                 $this->db->bind('contact_no',$data['contact_no']);
                 $this->db->bind('email_id',$data['email_id']);
                 $this->db->bind('country_id',$data['country_id']);
                 $this->db->bind('state_id',$data['state_id']);
                 $this->db->bind('company_type',$data['company_type']);
                 $result = $this->db->insertion();
                //print_r($result);
                if($result){ 
                    return true;
                }else{
                    return false;
                }
              }catch(Exception $e){
                     echo $e->getMessage();
            }
         }
        else //update
        {
            try
            {
                $sql="update tbl_company_location
				    set company_id =:company_id,
                     address =:address,
                     pin =:pin,
                     contact_no =:contact_no,
                     email_id =:email_id,
                     country_id =:country_id,
                     state_id =:state_id,
                     company_type =:company_type
				 where _id =:id";
				 $this->db->query($sql);
                 $this->db->bind('company_id',$data['company_id']);
                 $this->db->bind('address',$data['address']);
                 $this->db->bind('pin',$data['pin']);
                 $this->db->bind('contact_no',$data['contact_no']);
                 $this->db->bind('email_id',$data['email_id']);
                 $this->db->bind('country_id',$data['country_id']);
                 $this->db->bind('state_id',$data['state_id']);
                 $this->db->bind('company_type',$data['company_type']);
                 $this->db->bind('id',$data['_id']);
			    $result = $this->db->updation();
			    return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }
    }
    public function gateLocationById($id)
    {
             try{
                   $sql="select
				    location._id,
				    location.company_id,
                    location.address,
                    location.pin,
				    location.contact_no,
                    location.email_id,
                    location.country_id,
                    location.state_id,
                    location.company_type,
                    details.company_name,
                    details.company_gstin_no,
                    details.website
				    FROM tbl_company_location location
				    left join tbl_company_details details on (details._id=location.company_id)
				    where location._status=1 AND location._id =:id ";
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
        public function gate_company_details()
        {
             try
            {
                $sql ="select _id as company_id,company_name,company_gstin_no,website from tbl_company_details";
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
        public function duplicatefunLocation($data)
        {
             try
            {
                $sql ="select company_id,address,pin,contact_no,email_id,country_id,state_id,company_type from tbl_company_location 
                        where company_id =:company_id AND address =:address AND pin=:pin AND contact_no=:contact_no AND 
                        email_id =:email_id AND country_id =:country_id AND state_id =:state_id AND company_type =:company_type AND _status=1";
                 $this->db->query($sql);
                 $this->db->bind('company_id',$data['company_id']);
                 $this->db->bind('address',$data['address']);
                 $this->db->bind('pin',$data['pin']);
                 $this->db->bind('contact_no',$data['contact_no']);
                 $this->db->bind('email_id',$data['email_id']);
                 $this->db->bind('country_id',$data['country_id']);
                 $this->db->bind('state_id',$data['state_id']);
                 $this->db->bind('company_type',$data['company_type']);
                 $result = $this->db->single();
                //print_r($result);
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function getIdCity(){
            return $this->db->table('tbl_company_location')
                    ->select('_id, city')
                    ->where('_status', '=', 1)
                    ->get();
        }
        public function getCompanyDetailsIdCity(){
            return $this->db->table("tbl_company_location")
                            ->join('tbl_state_dist_city', 'tbl_company_location.state_dist_city_id', '=', "tbl_state_dist_city._id")
                            ->select('tbl_company_location._id, 
                                    tbl_company_location.landmark,
                                    tbl_company_location.company_id, 
                                    tbl_company_location.address,
                                    tbl_company_location.state_dist_city_id, 
                                    tbl_state_dist_city.state, 
                                    tbl_state_dist_city.dist, 
                                    tbl_state_dist_city.city')
                            ->where('tbl_company_location._status', '=', 1)
                            ->get();
        }
    }
?>