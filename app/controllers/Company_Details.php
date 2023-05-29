<?php
class Company_Details extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->model_company_details = $this->model('model_company_details');
        $this->Validate_company = $this->validator('Validate_company');
        $this->model_company_location = $this->model('model_company_location');
        $this->model_state_dist_city = $this->model('model_state_dist_city');
    }
    public function company_add_update($id=null)
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();
            //print_r($data);
            if($data['_id']=="") //Insert data For Company Details
            {
                $errMsg = $this->Validate_company->company_add_update($data);
                if(empty($errMsg))
                {
                    $company_add_update = $this->model_company_details->company_add_update($data);
                    // $company_add_update = JSON_DECODE(JSON_ENCODE($company_add_update), true);
                    if($company_add_update)
                    {
                        if($data['ho_branch']=="Branch Office")
                        {
                            $len = sizeof($data['reg_address']);
                            for($i=0; $i<$len; $i++){
                                $address = $data['reg_address'][$i];
                                $gstin_no = $data['reg_gstin_no'][$i];
                                $contact_no = $data['reg_contact_no'][$i];
                                $email_id = $data['reg_email_id'][$i];
                                $state_id = $data['state_id'][$i];
                                $office_type = $data['ho_branch'];
                                // INSERT CODE
                                $insert_address = $this->model_company_details->insert_address($address,$gstin_no,$contact_no,$email_id,$state_id,$office_type);
                            }
                        }
                        if($data['ho_branch']=="Head/Corporate Office")
                        {
                            if($data['chk_head_office']=="chk_head_office")
                            {
                                $head_office_address = $this->model_company_details->head_office_address($data);
                            }
                        }
                        flashToast("companyAddSuccess","Company Details Added Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Company_Details/company_details_list';</script>";
                    }
                    else
                    {
                        echo "<script>alert('Fail To Add Company Details');</script>";
                        $this->view('pages/company_add_update',$data);
                    }
                }
                else
                {
                    $this->view('pages/company_add_update',$data,$errMsg);
                }
            }
            else //Update Data For Company Details
            {
                // print_r($data);
                $result = $this->model_company_details->company_add_update($data);
                $result = JSON_DECODE(JSON_ENCODE($result), true);
                if($result)
                {
                    flashToast("companyUpdateSuccess","Company Details Updated Successfully");
                    echo "<script>window.location.href = '".URLROOT."/Company_Details/company_details_list';</script>";
                }
                else
                {
                    echo "<script>alert('Fail To Update Company Details');</script>";
                    $this->view('pages/company_add_update',$data);
                }

            }
        }
        else if(isset($id))
        {
            $result = $this->model_company_details->gate_company_details_id($id);
            $data = JSON_DECODE(JSON_ENCODE($result), true);
            $this->view('pages/company_add_update',$data);
        }
        else
        {
            $result = $this->model_company_details->gate_company_details_id($id);
            $data = JSON_DECODE(JSON_ENCODE($result), true);

            $stateList = $this->model_company_details->stateList();
            $stateList = JSON_DECODE(JSON_ENCODE($stateList), true);
            $data["stateList"] = $stateList;
            $this->view('pages/company_add_update',$data);
        }
    }
    public function company_details_list()
    {

        //Company Details
        $company_data = $this->model_company_details->company_data();
        $data= JSON_DECODE(JSON_ENCODE($company_data), true);
        // print_r($data);
        //$data["company_data"] = $company_data;

        // State List
        $gate_state = $this->model_state_dist_city->getState();
        $gate_state = JSON_DECODE(JSON_ENCODE($gate_state), true);
        $data["state_list"] = $gate_state;

        //Company Details And Location Details
        $company_list = $this->model_company_details->company_details();
        $company_list = JSON_DECODE(JSON_ENCODE($company_list), true);
        $data["company_list"] = $company_list;
        $this->view('pages/company_details_list', $data);
    }
    public function companylocation_add_update($id=null)
    {
        $data = (array)null;
        $isExistHeadOffice = false;

        $result = $this->model_company_details->checkHeadOfficeIsExistInCompanyLocation();
        if($result){
            $isExistHeadOffice = true;
        }
        $isExistRegistered = false;
        $result = $this->model_company_details->checkRegisteredIsExistInCompanyLocation();
        if($result){
            $isExistRegistered = true;
        }
        if(isPost())
        {
            $data = postData();
            if($data['_id']=="") //Insert data For Company Location
            {
                $errMsg = $this->Validate_company->company_location_add_update($data);
                if(empty($errMsg))
                {
                    $company_location = $this->model_company_details->company_location_add_update($data);
                    $company_location = JSON_DECODE(JSON_ENCODE($company_location), true);
                    if($company_location)
                    {
                        flashToast("companyLocationAddSuccess","Company Location Added Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Company_Details/company_details_list';</script>";
                    }
                    else
                    {
                        echo "<script>alert('Fail To Add Company Location');</script>";
                        $this->view('pages/companylocation_add_update',$data);
                    }
                }
                else
                {
                    $this->view('pages/companylocation_add_update',$errMsg,$data);
                }
            }
            else //Update Data For Company Details
            {
                // print_r($data);
                $result = $this->model_company_details->company_location_add_update($data);
                $result = JSON_DECODE(JSON_ENCODE($result), true);
                if($result)
                {
                    flashToast("companyLocationUpdateSuccess","Company Location Updated Successfully");
                    echo "<script> window.location.href = '".URLROOT."/Company_Details/company_details_list';</script>";
                }
                else
                {
                    echo "<script>alert('Fail To Update Company Location');</script>";
                    $this->view('pages/companylocation_add_update',$data);
                }

            }
        }
        else if(isset($id))
        {
            $result = $this->model_company_details->gate_company_location_id($id);
            $data = JSON_DECODE(JSON_ENCODE($result), true);

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
            //print_r($stateList);
            //print_r($cityList);
            $data['isExistRegistered'] = $isExistRegistered;

            $this->view('pages/companylocation_add_update',$data);
        }
        else
        {
            //company details data
            $company = $this->model_company_details->gate_company_name();
            $data = JSON_DECODE(JSON_ENCODE($company), true);
            // State List
            $stateList = $this->model_company_details->stateList();
            $stateList = JSON_DECODE(JSON_ENCODE($stateList), true);
            $data["stateList"] = $stateList;
            $data['isExistHeadOffice'] = $isExistHeadOffice;
            $data['isExistRegistered'] = $isExistRegistered;
            $this->view('pages/companylocation_add_update',$data);
        }
    }
    public function company_deactivate($id,$result)
    {

        //echo $result;
        $company_deactivate = $this->model_company_details->company_deactivate($id,$result);
        $company_deactivate = JSON_DECODE(JSON_ENCODE($company_deactivate), true);
        flashToast("companyDeactiveSuccess","Company decativated successfully");
        redirect("Company_Details/company_details_list");

    }
    public function company_deactivate_list($ID=null)
    {
        $data = (array)null;
        /*  $data["id"]= $ID;
        echo $ID; */
        $deactivate_list = $this->model_company_details->company_deactivate_list();
        $deactivate_list = JSON_DECODE(JSON_ENCODE($deactivate_list), true);
        $data["deactivate_list"] = $deactivate_list;
        $this->view('pages/company_deactivate_list', $data);
        $this->view('pages/company_deactivate_list', $data);
    }
    public function company_reactivate($ID=null)
    {
        $data = (array)null;
        $data["id"]= $ID;
        $company_reactivate = $this->model_company_details->company_reactivate($data);
        $company_reactivate = JSON_DECODE(JSON_ENCODE($company_reactivate), true);

        flashToast("companyReactiveSuccess","Company Recativated successfully");
        redirect("Company_Details/company_details_list");

    }

    public function getDistByStateOption(){
        if(isPost()){
            $data = postData();
            $dist = $this->model_company_details->getDistByState($data);
            if($dist){
                $option = "<option value=''>SELECT</option>";
                foreach ($dist as $values) {
                    $option .= "<option value='".$values['dist']."'>".$values['dist']."</option>";
                }
                $response = ['response'=>true, 'data'=>$option];
            }else{
                $response = ['response'=>false];
            }
            echo json_encode($response);
        }else{
            $response = ['response'=>false, 'data'=>'Response is not post'];
            echo json_encode($response);
        }
    }

    public function getCityByDistOption(){

        if(isPost()){
            $data = postData();
            /*  print_r($data); */ 
            $city = $this->model_company_details->getCityByDist($data);

            if($city){
                $option = "<option value=''>SELECT</option>";
                foreach ($city as $values) {
                    $option .= "<option value='".$values['_id']."'>".$values['city']."</option>";
                }
                $response = ['response'=>true, 'data'=>$option];
            }else{
                $response = ['response'=>false];
            }

            echo json_encode($response);
        }else{
            $response = ['response'=>false, 'data'=>'Response is not post'];
            echo json_encode($response);
        }
    }

}