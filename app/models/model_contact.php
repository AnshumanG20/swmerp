<?php 
class model_contact
{
	private $db;
	private $tbl_name = "tbl_contact_details";
	public function __construct()
	{
		$this->db = new dataBase();
	}
	//Gate Customer
	public function gate_customer()
	{
		try
		{
			$sql = " select * from tbl_contact_type_mstr where _status=1 AND _id !=3";
			$this->db->query($sql);
			$result = $this->db->resultset();
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
	public function gate_state()
	{
		try
		{
			$sql = " select * from tbl_state_mstr where _status=1";
			$this->db->query($sql);
			$result = $this->db->resultset();
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
	public function contact_add_update($data)
	{
		if($data['_id']=='') //Insert Operation
		{
			$result = $this->db->table($this->tbl_name)->
            insertGetId([
                "contact_name"=>$data["contact_name"],
                "contact_type_id"=>$data['contact_type'],
                "contact_no"=>$data['contact_no'],
                "contact_person_name"=>$data['contact_person_name'],
                "contact_email_id"=>$data['contact_email_id'],
                "gstin_no"=>$data['gstin_no'],
                "others" =>$data['others']
            ]);
            if($result)
            {
            	$contact_code = "C-".$result;
            	$code = $this->db->table($this->tbl_name)->
            	where('_id', '=',$result)->
            	update([
                	"contact_code"=>$contact_code
            	]);
            	if($code)
            	{
            		return $result;
            	}
            	else
            	{
            		return false;
            	}
            }
		}
		else //Update Operation
		{
			$result = $this->db->table($this->tbl_name)->
			where('_id', '=',$data['_id'])->
            update([
                "contact_name"=>$data["contact_name"],
                "contact_type_id"=>$data['contact_type'],
                "contact_no"=>$data['contact_no'],
                "contact_person_name"=>$data['contact_person_name'],
                "contact_email_id"=>$data['contact_email_id'],
                "gstin_no"=>$data['gstin_no'],
                "others"=>$data['others'] 
            ]);
            if($result)
            {
            	return $result;
            }
            else
            {
            	return false;
            }
		}
	}
	public function other_contact_person_name($data)
	{
		
        $other_address= $this->db->table('tbl_contact_other_details')->
        insert([
            "contact_id"=>$data['result'],
            "other_contact_person_name"=>$data['other_contact_person_name'],
            "other_contact_no"=>$data['other_contact_no'],
            "other_contact_emailid"=>$data['other_contact_emailid']
            ]);
	}
	public function contact_address_detail($data)
	{
        $address= $this->db->table('tbl_contact_address_detail')->
	        	insert([
	            "contact_id"=>$data['result'],
	            "address_type"=>$data['address_type'],
	            "attention"=>$data['attention'],
	            "address"=>$data['address'],
	            "state_name"=>$data['state_dist_city_id'],
	            "phoneno"=>$data['phoneno'],
	            "is_default"=>1
	            ]);
         return $address;
	}
	public function update_contact_address_detail($data)
	{
		//print_r($data);
         $address= $this->db->table('tbl_contact_address_detail')->
            where('contact_id', '=',$data['_id'])->
            where('address_type', '=',1)->
	        update([
	            "attention"=>$data['attention'],
	            "address"=>$data['address'],
	            "state_name"=>$data['state_dist_city_id'],
	            "phoneno"=>$data['phoneno'],
	            "is_default"=>1
	         ]);
        return $address;
	}
	public function shipping_contact_address_detail($data)
	{

        $shipping_address= $this->db->table('tbl_contact_address_detail')->
        insert([
            "contact_id"=>$data['result'],
            "address_type"=>$data['address_type'],
            "attention"=>$data['shipping_attention'],
            "address"=>$data['shipping_address'],
            "state_name"=>$data['shipping_state_dist_city_id'],
            "phoneno"=>$data['shipping_phoneno'],
            "is_default"=>1
            ]);
        return $shipping_address;
	}
	public function update_shipping_contact_address_detail($data)
	{

       $shipping_address= $this->db->table('tbl_contact_address_detail')->
        where('contact_id', '=',$data['_id'])->
        where('address_type', '=',2)->
        update([
            "attention"=>$data['shipping_attention'],
            "address"=>$data['shipping_address'],
            "state_name"=>$data['shipping_state_dist_city_id'],
            "phoneno"=>$data['shipping_phoneno'],
            "is_default"=>1
            ]);
        return $shipping_address;
	}
	public function update_other_contact_person_name_status($data)
	{
		$other_address= $this->db->table('tbl_contact_other_details')->
		where('contact_id', '=',$data['_id'])->
        update([
            "_status"=>0
            ]);
	}
	public function update_other_contact_person_name($data)
	{
		$other_address= $this->db->table('tbl_contact_other_details')->
		where('_id', '=',$data['contact_other_details_id'])->
        update([
            "other_contact_person_name"=>$data['other_contact_person_name'],
            "other_contact_no"=>$data['other_contact_no'],
            "other_contact_emailid"=>$data['other_contact_emailid'],
            "_status"=>1
            ]);
	}
	public function contact_list()
	{
		try
		{
			$sql = " select 
			    contact._id,
			    contact.contact_type_id,
			    contact.contact_code,
			    contact.contact_name,
			    contact.contact_no,
			    contact.contact_person_name,
			    contact.contact_email_id,
			    contact.gstin_no,
			    contact.others,
			    type.contact_type
			    from tbl_contact_details contact 
			    join tbl_contact_type_mstr type on (type._id = contact.contact_type_id)
			     where contact._status=1 order by contact._id desc";
			     $this->db->query($sql);
			     $result = $this->db->resultset();
			     return $result;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	public function DeleteByIdContact($id)
	{
        $delete = $this->db->table($this->tbl_name)->
        where('_id', '=',$id)->
        update([
                "_status"=>0
            ]);
        if($delete)
        {
           return $delete;
        }
        else
        {
           return false;
        }
	}
	public function gateContactById($id)
	{
		try
		{
			$sql = " select 
			    contact._id,
			    contact.contact_type_id,
			    contact.contact_code,
			    contact.contact_name,
			    contact.contact_no,
			    contact.contact_person_name,
			    contact.contact_email_id,
			    contact.gstin_no,
			    contact.others,
			    type.contact_type
			    from tbl_contact_details contact 
			    join tbl_contact_type_mstr type on (type._id = contact.contact_type_id)
			    where contact._status=1 AND contact._id=:id";
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
	public function gateOtherdetasilsById($id)
	{
		try
		{
			$sql = " select _id,
			    other_contact_person_name,
			    other_contact_no,
			    other_contact_emailid	
			    from tbl_contact_other_details where contact_id=:id AND _status=1  
			   ";
			   $this->db->query($sql);
			   $this->db->bind('id',$id);
			   $result = $this->db->resultset();
			   return $result;
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	public function gateBillingAddressById($id)
	{
		try
		{
			$sql = " select 
			    contact_address.address_type,
			    contact_address.contact_id,
			    contact_address.attention,
			    contact_address.address,
			    contact_address.state_name,
			    contact_address.phoneno,
			    state.state,
			    state.city,
			    state.dist	
			    from tbl_contact_address_detail contact_address
			    join tbl_state_dist_city state on (contact_address.state_name = state._id)
			    where contact_address.contact_id=:id AND contact_address.address_type = 1 AND contact_address._status=1  
			   ";
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
	public function gateShippinAddressById($id)
	{
		try
		{
			$sql = " select 
			    contact_address.address_type,
			    contact_address.contact_id,
			    contact_address.attention,
			    contact_address.address,
			    contact_address.state_name,
			    contact_address.phoneno,
			    state.state,
			    state.city,
			    state.dist	
			    from tbl_contact_address_detail contact_address
			    join tbl_state_dist_city state on (contact_address.state_name = state._id)
			    where contact_address.contact_id=:id AND contact_address.address_type = 2 AND contact_address._status=1  
			   ";
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
}

?>