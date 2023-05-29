<?php 
class Contact extends Controller
{
	public function __construct()
	{
		if(!isLoggedIn()){ redirect('Login'); }
		 if(!isLoggedIn()){ redirect('Login'); }
		$this->model_contact = $this->model('model_contact');
		$this->model_company_location = $this->model('model_company_location');
        $this->model_state_dist_city = $this->model('model_state_dist_city');
        $this->model_company_details = $this->model('model_company_details');
	}
	public function contact_add_update($id = null)
	{
		$data = (array)null;
		//Gate Customer Details
		$cust = $this->model_contact->gate_customer();
		$cust = json_decode(json_encode($cust),true);
		$data['cust'] = $cust;
		// State List
        $stateList = $this->model_company_details->stateList();
        $stateList = JSON_DECODE(JSON_ENCODE($stateList), true);
        $data["stateList"] = $stateList; 
		if(isPost())
		{
			$data = postData();
			if($data['_id']=='') //Insert Opertion
			{
				$contact_add_update = $this->model_contact->contact_add_update($data);
				$contact_add_update = json_decode(json_encode($contact_add_update),true);
				//print_r($contact_add_update);
				if($contact_add_update)
				{
					$data['result'] = $contact_add_update;
					$len = sizeof($data['other_contact_person_name']);
					for($i=0;$i<$len;$i++)
					{
                       $other_contact_person_name=$data['other_contact_person_name'][$i];
                       $other_contact_no=$data['other_contact_no'][$i];
                       $other_contact_emailid=$data['other_contact_emailid'][$i];
                       $data['other_contact_person_name'] = $other_contact_person_name;
                       $data['other_contact_no'] = $other_contact_no;
                       $data['other_contact_emailid'] = $other_contact_emailid;
					   $other_contact_person_name = $this->model_contact->other_contact_person_name($data);
					}
					$data['address_type'] = 1;
					$contact_address_detail = $this->model_contact->contact_address_detail($data);
					if($contact_address_detail)
					{
						if($data['shipping_attention']!="" || $data['shipping_address']!="" || $data['shipping_state_dist_city_id']!="" || $data['shipping_district']!="" || $data['shipping_phoneno']!="" || $data['shipping_state']!="")
						{
						     $data['address_type'] = 2;
						     $shipping_contact_address_detail = $this->model_contact->shipping_contact_address_detail($data);

						}
						flashToast('contact_list',"Contact Details Save Successfully");
						redirect('Contact/contact_list');
					}
					else
					{
						echo "<script>alert('Fail To Save Contact Details');</script>";
						$this->view('pages/contact_add_update',$data);
					}

				}
				else
				{
					echo "<script>alert('Fail To Save Contact Details');</script>";
				    $this->view('pages/contact_add_update',$data);
				}
			}
			else //Update Operation
			{

				$contact_add_update = $this->model_contact->contact_add_update($data);
				$contact_add_update = json_decode(json_encode($contact_add_update),true);	
				if($contact_add_update)
				{

					// update all status = 0
					$this->model_contact->update_other_contact_person_name_status($data);
					$len = sizeof($data['other_contact_person_name']);
					for($i=0;$i<$len;$i++)
					{
					   $contact_other_details_id=$data['contact_other_details_id'][$i];
                       $other_contact_person_name=$data['other_contact_person_name'][$i];
                       $other_contact_no=$data['other_contact_no'][$i];
                       $other_contact_emailid=$data['other_contact_emailid'][$i];
                       $form = [];
                       $form['contact_other_details_id'] = $contact_other_details_id;
                       $form['other_contact_person_name'] = $other_contact_person_name;
                       $form['other_contact_no'] = $other_contact_no;
                       $form['other_contact_emailid'] = $other_contact_emailid;

                       
                       if($contact_other_details_id==""){
                       		//insert data
                       		$form['result'] = $data['_id'];
                       		$this->model_contact->other_contact_person_name($form);
                       }else{
                       		$this->model_contact->update_other_contact_person_name($form);
                       }
					}
					//$data['address_type'] = 1;
					$contact_address_detail = $this->model_contact->update_contact_address_detail($data);
					if($contact_address_detail)
					{
						if($data['shipping_attention']!="" || $data['shipping_address']!="" || $data['shipping_state_dist_city_id']!="" || $data['shipping_district']!="" || $data['shipping_phoneno']!="" || $data['shipping_state']!="")
						{
						    // $data['address_type'] = 2;
						     $shipping_contact_address_detail = $this->model_contact->update_shipping_contact_address_detail($data);

						}
					}
					if($contact_address_detail)
					{
						flashToast('update',"Contact Details Updated Successfully");
						redirect('Contact/contact_list');
					}
					else
					{
						echo "<script>alert('Fail To Update Contact Details');</script>";
				    	$this->view('pages/contact_add_update',$data);
					}
				}
				else
				{
					echo "<script>alert('Fail To Update Contact Details');</script>";
				    $this->view('pages/contact_add_update',$data);
				}
			}
		}
	  else if(isset($id))
		{
			$result = $this->model_contact->gateContactById($id);
            $data = json_decode(json_encode($result),true);
            $data['cust'] = $cust;
            //Other Contact details
            $other = $this->model_contact->gateOtherdetasilsById($id);
            if($other){
            	$other = json_decode(json_encode($other),true);
            	$i=0;
	           	foreach($other AS $others)
	           	{
	           		$data['contact_other_details_id'][$i] = $others['_id'];
	           		$data['other_contact_person_name'][$i] = $others['other_contact_person_name'];
	            	$data['other_contact_no'][$i] = $others['other_contact_no'];
	            	$data['other_contact_emailid'][$i] = $others['other_contact_emailid'];
	            	$i++;
	           	}
            }
            //Billing Addresss
            $billing_address = $this->model_contact->gateBillingAddressById($id);
            if($billing_address){
				$data['attention'] = $billing_address['attention'];
				$data['address'] = $billing_address['address'];
				$data['state'] = $billing_address['state'];
				$data['dist'] = $billing_address['dist'];
				$data['city'] = $billing_address['city'];
				$data['phoneno'] = $billing_address['phoneno'];
					// State List
	            $stateList = $this->model_company_details->stateList();
	            $stateList = JSON_DECODE(JSON_ENCODE($stateList), true);
	            $data["stateList"] = $stateList;
					  // District List
	            $state = $data['state'];
	            $districtList = $this->model_state_dist_city->getDistByState(['state'=>$state]);
	            $data["districtList"] = $districtList;

	            $dist = $data['dist'];
	            $cityList = $this->model_state_dist_city->getCityByDist(['dist'=>$dist]);
	            $data["cityList"] = $cityList;
            }
            //Shipping Address
            $shipping_address = $this->model_contact->gateShippinAddressById($id);
            if($shipping_address){
				$data['shipping_attention'] = $shipping_address['attention'];
				$data['shipping_address'] = $shipping_address['address'];
				$data['shipping_state'] = $shipping_address['state'];
				$data['shipping_dist'] = $shipping_address['dist'];
				$data['shipping_city'] = $shipping_address['city'];
				$data['shipping_phoneno'] = $shipping_address['phoneno'];
					// State List
	            $stateList = $this->model_company_details->stateList();
	            $stateList = JSON_DECODE(JSON_ENCODE($stateList), true);
	            $data["stateList"] = $stateList;
					  // District List
	            $districtList = $this->model_state_dist_city->getDistByState(['state'=>$data['shipping_state']]);
	            $data["shipping_districtList"] = $districtList;
	            $dist = $shipping_address['dist'];
	            $cityList = $this->model_state_dist_city->getCityByDist(['dist'=>$dist]);
	            $data["shipping_cityList"] = $cityList;
            }
            $this->view('pages/contact_add_update',$data);
		}
		else
		{
			$this->view('pages/contact_add_update',$data);
		}
	}
	public function contact_list()
	{
		$contact_list = $this->model_contact->contact_list();
		$contact_list = json_decode(json_encode($contact_list),true);
		$data['contact_list'] = $contact_list;
		$this->view('pages/contact_list',$data);
	}
	public function DeleteByIdContact($id)
	{
		$delete_contact = $this->model_contact->DeleteByIdContact($id);
		if($delete_contact)
		{
			flashToast('delete',"Record Deleted Successfully");
			redirect('Contact/contact_list');
		}
		else
		{
			flashToast('delete_fail',"Record Not Deleted");
			redirect('Contact/contact_list');
		}
	}
}


?>