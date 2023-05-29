<?php 
class Estimate extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        //$this->model_contact = $this->model('model_contact');
        $this->obj = $this->model('model_estimate');
    }

    public function estimate_add_update($ID=null,$is_convert=null,$convert_permission=null)//is_convert for html convert button- next is for convert controller
    {
       
        $data = (array)null;
        $data["_id"] = $ID;
        $customer_name = $this->obj->customer_name();
        $customer_name = JSON_DECODE(JSON_ENCODE($customer_name), true);
        $estimate_no = $this->obj->estimate_no();
        $estimate_no = JSON_DECODE(JSON_ENCODE($estimate_no), true);
       
        if($estimate_no!=""){
            //print_r($invoice_no);
            $estimate_no = $estimate_no['estimate_no'];
            $estimate_no = (int)substr($estimate_no, 4, 5);
            $estimate_no++;
            $estimate_no = str_pad($estimate_no, 5, "0", STR_PAD_LEFT);
            $estimate_no = "EST-".$estimate_no;
        }else{
            $estimate_no = "EST-00001";
        }
        $data["estimate_no"] = $estimate_no;

        if($data['_id']=='') //Insert Opertion
        {
            if(isPost())
            {
                $data = postInputData();
                $data["date"] = dateTime();
				//print_r ($data["terms_and_conditions"]);
				//die();
                $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
                if($data["shipFrom"]==$data["bill"]){
					$data["spanIGSTShow"] = 0;
				} else{
					$data["spanCGSTShow"] = 0;
					$data["spanSGSTShow"] = 0;
				}
                $estimateData = $this->obj->estimateData($data);
                if($estimateData){
                    $data["estimateid"] = $estimateData;
                    $len = sizeof($data['asset_type']);
                    for($i=0; $i<$len; $i++){
                        $form = [];
                        $asset_type = $data['asset_type'][$i];
                        $item_mstr_id = $data['item_mstr_id'][$i];
                        $sub_item_mstr_id = $data['sub_item_mstr_id'][$i];
                        $sub_item_description = $data['sub_item_description'][$i];
                        $cgst_tax_per = $data['cgst_tax_per'][$i];
                        $sgst_tax_per = $data['sgst_tax_per'][$i];
                        $igst_tax_per = $data['igst_tax_per'][$i];
                        $item_quantity = $data['item_quantity'][$i];
                        $item_per_rate = $data['item_per_rate'][$i];
                        $total_amount = $data['total_amount'][$i];
                        /* $cgst_tax_amt = $data[''][$i];
                              $sgst_tax_amt = $data[''][$i];
                              $igst_tax_amt = $data[''][$i];
                              $tax_total_amt = $data[''][$i]; */
                        $form["estimateid"] = $data["estimateid"];
                        $form["asset_type"] = $asset_type;
                        $form["item_mstr_id"] = $item_mstr_id;
                        $form["sub_item_mstr_id"] = $sub_item_mstr_id;
                        $form["sub_item_description"] = $sub_item_description;
                        $form["cgst_tax_per"] = $cgst_tax_per;
                        $form["sgst_tax_per"] = $sgst_tax_per;
                        $form["igst_tax_per"] = $igst_tax_per;
                        $form["item_quantity"] = $item_quantity;
                        $form["item_per_rate"] = $item_per_rate;
                        $form["total_amount"] = $total_amount;
                        /* $form["jobpostid"] = $jobpost; */
                        $estimateAssets = $this->obj->estimateAssets($form);
                    }
                }
                $data["id"] = $estimateData;
                //$this->view('pages/estimate',$data);
                redirect('Estimate/estimate/'.$data["id"]);
            }
        }
        else //Update Operation
        {

           
           
            
            if(isPost())
            {
                $data = postInputData();
           
               
                
                $data["_id"] = $ID;
                $data["date"] = dateTime();
                $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
                if($data["shipFrom"]==$data["bill"]){
					$data["spanIGSTShow"] = 0;
				} else{
					$data["spanCGSTShow"] = 0;
					$data["spanSGSTShow"] = 0;
				}
                $estimateUpdate = $this->obj->estimateUpdate($data);
                if($estimateUpdate){
                    $data["_id"] = $ID;
                    $estimateStatusChange = $this->obj->estimateStatusChange($data);
                    $len = sizeof($data['asset_type']);
                    for($i=0; $i<$len; $i++){
                        $form = [];
                        $asset_type = $data['asset_type'][$i];
                        $editAssets_id = $data['editAssets_id'][$i];
                        $item_mstr_id = $data['item_mstr_id'][$i];
                        $invoice_details_id = $data['invoice_details_id'][$i];
                        $sub_item_mstr_id = $data['sub_item_mstr_id'][$i];
                        $sub_item_description = $data['sub_item_description'][$i];
                        $cgst_tax_per = $data['cgst_tax_per'][$i];
                        $sgst_tax_per = $data['sgst_tax_per'][$i];
                        $igst_tax_per = $data['igst_tax_per'][$i];
                        $item_quantity = $data['item_quantity'][$i];
                        $item_per_rate = $data['item_per_rate'][$i];
                        $total_amount = $data['total_amount'][$i];
                        /* $cgst_tax_amt = $data[''][$i];
                              $sgst_tax_amt = $data[''][$i];
                              $igst_tax_amt = $data[''][$i];
                              $tax_total_amt = $data[''][$i]; */
                        $form["_id"] = $data["_id"];
                        $form["asset_type"] = $asset_type;
                        $form["editAssets_id"] = $editAssets_id;
                        $form["item_mstr_id"] = $item_mstr_id;
                        $form["sub_item_mstr_id"] = $sub_item_mstr_id;
                        $form["sub_item_description"] = $sub_item_description;
                        $form["cgst_tax_per"] = $cgst_tax_per;
                        $form["sgst_tax_per"] = $sgst_tax_per;
                        $form["igst_tax_per"] = $igst_tax_per;
                        $form["item_quantity"] = $item_quantity;
                        $form["item_per_rate"] = $item_per_rate;
                        $form["total_amount"] = $total_amount;
                        /* $form["jobpostid"] = $jobpost; */
                        if($invoice_details_id!=""){
                            $estimateAssetsUpdate = $this->obj->estimateAssetsUpdate($form);
                        }else{
                             $invoiceAssetsins = $this->obj->estimateAssetsins($form);
                        }

                    }
                }
                $data["id"] = $ID;
                //$this->view('pages/estimate',$data);
                redirect('Estimate/estimate/'.$data["id"]);
            }else{
               
                $data["_id"]=$ID;
                $data = $this->obj->estimateEdit($data);
              
                $data["_id"]=$ID;
                  $estimateEditAsset = $this->obj->estimateEditAsset($data);
                //   print_r($estimateEditAsset);
                  $estimateEditAsset = json_decode(json_encode($estimateEditAsset),true);
                  $data["estimateEditAsset"] = $estimateEditAsset;
                $data["customer_name"] = $customer_name;
                if($is_convert=='convert'){
                    $data["is_convert"]=$is_convert;
                }
                
                // echo "<pre>";
                // print_r($data);
               
                // return;
                $this->view('pages/estimate_add_update',$data);
            } 


        }
        //$data["invoice_no"] = $invoice_no;
        $data["customer_name"] = $customer_name;
        $data['payment_due_date'] = date('Y-m-d', strtotime('+7 days'));

        // echo "<pre>";
        // print_r($data);
        // return;

        $this->view('pages/estimate_add_update',$data);

    }


    public function ajaxItemListByAssetType(){
        if(isPost()){
            $data = postData();
            if(isset($data['asset_type'])){
                $result = $this->obj->get_itemListByAssetType($data['asset_type']);
                // print_r($result);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['item_name_id']."'>".$value['item_name']."</option>";
                    }
                    $option .= "<option value='OTHERS'>OTHERS</option>";
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
            }else{
                $response = ["response"=>false, "data"=>'asset type  field is required'];
            }
            echo json_encode($response);
        }
    }

    public function ajaxSubItemListByItemList(){
        if(isPost()){
            $data = postData();
            if(isset($data['item_mstr_id'])){
                $result = $this->obj->get_subitemListByitemList($data['item_mstr_id']);
                // print_r($result);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['sub_item_name_id']."'>".$value['sub_item_name']."</option>";
                    }
                    $option .= "<option value='OTHERS'>OTHERS</option>";
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
            }else{
                $response = ["response"=>false, "data"=>'Item field is required'];
            }
            echo json_encode($response);
        }
    }

    public function ajaxSubItemDetails(){
        if(isPost()){
            $data = postData();
            if(isset($data['sub_item_mstr_id'])){
                $result = $this->obj->get_subitemDetails($data['sub_item_mstr_id']);
                // print_r($result);
                if($result){
                    $rate = $result['selling_rate'];
                    $cgst_tax = $result['cgst_tax'];
                    $sgst_tax = $result['sgst_tax'];
                    $igst_tax = $result['igst_tax'];
                    $response = ['response'=>true, 'data'=>$rate, 'cgst'=>$cgst_tax, 'sgst'=>$sgst_tax, 'igst'=>$igst_tax];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
            }else{
                $response = ["response"=>false, "data"=>'Sub Item field is required'];
            }
            echo json_encode($response);
        }
    }


    public function ajaxcustomerDetails(){
        if(isPost()){
            $data = postData();
            $data['cust_type'];
            if(isset($data['cust_type'])){
                $result_shippingfrom = $this->obj->get_shipping_companyDetails();
                $result_shipping = $this->obj->get_shipping_customerDetails($data['cust_type']);
                $result_billing = $this->obj->get_billing_customerDetails($data['cust_type']);
                // print_r($result_shipping);
                if($result_shipping && $result_billing){
                    $shipFrom = $result_shippingfrom['state'];
                    $shipTo = $result_shipping['state'];
                    $bill = $result_billing['state'];
                    if($result_shipping['state']==$result_billing['state']){
                        $type = "same";
                    }else{
                        $type = "different";
                    }
                    $response = ['response'=>true, 'data'=>$type, 'shipFrom'=>$shipFrom, 'shipTo'=>$shipTo, 'bill'=>$bill];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
            }else{
                $response = ["response"=>false, "data"=>'Customer field is required'];
            }
            echo json_encode($response);
        }
    }
    
     public function ajaxnew_item_add(){
        if(isPost()){
            $data = postData();
            $data['asset'];
            $data['items'];
            if(isset($data['items'])){
                $result = $this->obj->additem_list($data);
                // print_r($result_shipping);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['item_name_id']."'>".$value['item_name']."</option>";
                    }
                    $option .= "<option value='OTHERS'>OTHERS</option>";
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
            }else{
                $response = ["response"=>false, "data"=>'Customer field is required'];
            }
            echo json_encode($response);
        }
    }


     public function ajaxnew_Subitem_add(){
        if(isPost()){
            $data = postData();
            $data['assets'];
            $data['itemss'];
            $data['subitemss'];
			$data['selling_rate'];
            $data['cgst_tax_amount'];
            $data['sgst_tax_amount'];
			$data['igst_tax_amount'];
            if(isset($data['subitemss'])){
                $result = $this->obj->addsubitem_list($data);
                // print_r($result_shipping);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['sub_item_name_id']."'>".$value['sub_item_name']."</option>";
                    }
                    $option .= "<option value='OTHERS'>OTHERS</option>";
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
            }else{
                $response = ["response"=>false, "data"=>'Customer field is required'];
            }
            echo json_encode($response);
        }
    }






    public function estimate_list()
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();
            //Employee details data.
            $EstimateList =$this->obj->getEstimateEditList($data);
            $EstimateList = json_decode(json_encode($EstimateList),true);
            $data["EstimateList"] = $EstimateList;
            $this->view('pages/estimate_list', $data);
        }
        else
        {
            //$data['from_date']=date('Y-m-d');
            $data['from_date'] = date('Y-m-d', strtotime('-30 days'));
            $data['to_date']=date('Y-m-d');
            //Employee details data.
            $EstimateList =$this->obj->getEstimateEditList($data);
            $EstimateList = json_decode(json_encode($EstimateList),true);
            $data["EstimateList"] = $EstimateList;
            //print_r($data["InvoiceList"]);
            $this->view('pages/estimate_list', $data);
        }

    }
    public function estimate($ID=null)
    {
        $data = (array)null;
        $data["id"] = $ID;
        $WorkOrderList =$this->obj->getWorkOrderList($data);
        $WorkOrderList = json_decode(json_encode($WorkOrderList),true);
        $WorkAssetsList =$this->obj->getWorkAssetsList($data);
        $WorkAssetsList = json_decode(json_encode($WorkAssetsList),true);
        $data["date"] = date("Y/m/d");
        $data["WorkOrderList"] = $WorkOrderList;
        $data["WorkAssetsList"] = $WorkAssetsList;
        $this->view('pages/estimate', $data);

    }

    public function add_edit_work_order($ID=null)
    {
        $data = (array)null;
        $data["id"] = $ID;
        if(isPost())
        {
            try{
                $data = postData();
                $emp_id = $data["order_id"];
                if(isset($_FILES['work_order_attach_path'])){
                    $file = $_FILES['work_order_attach_path'];
                    $path = "work_order";
                    $newFileName = hashEncrypt($emp_id);
                    $extensions = ['jpg', 'png', 'jpeg'];
                    $fileSize = "2097152";
                    $file_status = uploader($file, $path, $newFileName, $extensions, $fileSize);
                    if($file_status){
                        $file_name = $file['name'];
                        $tmp = explode('.', $file_name);
                        $file_ext = strtolower(end($tmp));
                        $work_order_attach_path = $path."/".$newFileName.".".$file_ext;
                        //Employee details data.
                        $data["work_order_attach_path"] = $work_order_attach_path;
                        $data["date"] = dateTime();
                        $data['user_id'] = $_SESSION['emp_details']['_id'];
                        $updateWorkOrder =$this->obj->updateWorkOrder($data);
                        redirect('Estimate/estimate_list'); 
                    }else{
                         echo "Not Uploaded";
                    }
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
        }else{
                $WorkOrderList =$this->obj->getWorkOrderList($data);
                $WorkOrderList = json_decode(json_encode($WorkOrderList),true);
                $WorkAssetsList =$this->obj->getWorkAssetsList($data);
                $WorkAssetsList = json_decode(json_encode($WorkAssetsList),true);
                $data["WorkOrderList"] = $WorkOrderList;
                $data["WorkAssetsList"] = $WorkAssetsList;
                $this->view('pages/add_edit_work_order',$data);
        }

       }

            public function edit_work_order($ID=null)
            {
                $data = (array)null;
                $data["id"] = $ID;
                if(isPost())
                {
                    $data = postData();
                    //Employee details data.
                    $data["date"] = dateTime();
                    $data['user_id'] = $_SESSION['emp_details']['_id'];
                    $updateWorkOrder =$this->obj->updateWorkOrder($data);
                    redirect('Estimate/estimate_list');

                }
                $WorkOrderList =$this->obj->getWorkOrderList($data);
                $WorkOrderList = json_decode(json_encode($WorkOrderList),true);
                $WorkAssetsList =$this->obj->getWorkAssetsList($data);
                $WorkAssetsList = json_decode(json_encode($WorkAssetsList),true);
                $data["WorkOrderList"] = $WorkOrderList;
                $data["WorkAssetsList"] = $WorkAssetsList;
                $this->view('pages/work_order',$data);

            }

        }


?>