<?php 
class Invoice extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->obj = $this->model('model_invoice');
    }
    public function invoice_add_update($ID=null,$to_convert=null)
    {
         $data = (array)null;
        if($to_convert!=null){
            $data = postInputData();
            unset($data['invoice_no']);
        }
        
       
        $data["_id"] = $ID;
        $customer_name = $this->obj->customer_name();
        $customer_name = JSON_DECODE(JSON_ENCODE($customer_name), true);
        $invoice_no = $this->obj->invoice_no();
        $invoice_no = JSON_DECODE(JSON_ENCODE($invoice_no), true);
        if($invoice_no!=""){
            //print_r($invoice_no);
            $invoice_no = $invoice_no['invoice_no'];
            $invoice_no = (int)substr($invoice_no, 4, 5);
            $invoice_no++;
            $invoice_no = str_pad($invoice_no, 5, "0", STR_PAD_LEFT);
            $invoice_no = "INV-".$invoice_no;
        }else{
            $invoice_no = "INV-00001";
        }
        $data["invoice_no"] = $invoice_no;
        if($data['_id']=='' || $data['_id']=='no') //Insert Opertion
        {
            if(isPost())
            {
                if($to_convert!=null){
                    // $data = postInputData();
                    $data['invoice_date']=$data['estimate_date'];
                    $data['customer_note']="Thanks for your business.";
        
                    unset($data["estimate_no"]);
                    unset($data["estimate_date"]);
                    unset($data["editAssets_id"]);
        
                }
                else{
                    $data = postInputData();
                }
               

              
                $data["date"] = dateTime();
                
                $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
				if($data["shipFrom"]==$data["bill"]){
					$data["spanIGSTShow"] = 0;
				} else{
					$data["spanCGSTShow"] = 0;
					$data["spanSGSTShow"] = 0;
				}
                $invoiceData = $this->obj->invoiceData($data);
                
                if($invoiceData){
                    $data["invoiceid"] = $invoiceData;
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
                        $form["invoiceid"] = $data["invoiceid"];
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
                        $invoiceAssets = $this->obj->invoiceAssets($form);
                    }
                }
                $data["id"] = $invoiceData;
                flashToast("invoiceAddSuccess","Invoice Generated Successfully");
                redirect('Invoice/invoice_list');
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
                $invoiceUpdate = $this->obj->invoiceUpdate($data);
                if($invoiceUpdate){
                    $data["_id"] = $ID;
                    $invoiceAssetsStatus = $this->obj->invoiceAssetsStatus($data);
                    $len = sizeof($data['asset_type']);
                    for($i=0; $i<$len; $i++){
                        $form = [];
                         //print_r($data);
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
                        //$form["invoice_details_id"] = $invoice_details_id;
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
                        //print_r($form);
                        if($invoice_details_id!=""){
                            $invoiceAssetsUpdate = $this->obj->invoiceAssetsUpdate($form);
                        }else{
                             $invoiceAssetsins = $this->obj->invoiceAssetsins($form);
                        }
                    }

                }
                $data["id"] = $ID;
                flashToast("invoiceUpdateSuccess","Invoice Updated Successfully");
                redirect('Invoice/invoice_list');
           }else{
                  $data["_id"]=$ID;
                  $data = $this->obj->invoiceEdit($data);
                  $data["_id"]=$ID;
                  $invoiceEditAsset = $this->obj->invoiceEditAsset($data);
                  $invoiceEditAsset = json_decode(json_encode($invoiceEditAsset),true);
                  $data["invoiceEditAsset"] = $invoiceEditAsset;
                  $data["customer_name"] = $customer_name;

                  $this->view('pages/invoice_add_update',$data);
                }
        }


        //$data["invoice_no"] = $invoice_no;
        $data["customer_name"] = $customer_name;
		$data['payment_due_date'] = date('Y-m-d', strtotime('+7 days'));
		$this->view('pages/invoice_add_update',$data);

    }
    public function invoice_list()
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();

            //Employee details data.
            $InvoiceList =$this->obj->getInvoiceEditList($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
			foreach($InvoiceList as $key => $value){

			   $ID = $value['_id'];
			   $balance_due = $this->obj->getInvoiceBalanceDue($value['_id']);
			   $InvoiceList[$key]['total_payable_amt'] = $balance_due['total_payable_amt'];
			   $InvoiceList[$key]['total_tax_amt'] = $balance_due['total_tax_amt'];
		   }
            $data["InvoiceList"] = $InvoiceList;
            $this->view('pages/invoice_list', $data);
        }
        else
        {
            //$data['from_date']=date('Y-m-d');
			$data['from_date'] = date('Y-m-d', strtotime('-30 days'));
            $data['to_date']=date('Y-m-d');
            //Employee details data.
            $InvoiceList =$this->obj->getInvoiceEditList($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
			foreach($InvoiceList as $key => $value){

			   $ID = $value['_id'];
			   $balance_due = $this->obj->getInvoiceBalanceDue($value['_id']);
			   $InvoiceList[$key]['total_payable_amt'] = $balance_due['total_payable_amt'];
			   $InvoiceList[$key]['total_tax_amt'] = $balance_due['total_tax_amt'];
		   }
            $data["InvoiceList"] = $InvoiceList;
            //print_r($data["InvoiceList"]);
            $this->view('pages/invoice_list', $data);
        }
        //$this->view('pages/invoice_list',$data);

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
                // print_r($result);
                if($result_shipping && $result_billing){
                    $shipFrom = $result_shippingfrom['state'];
                    $shipTo = $result_shipping['state'];
                    $bill = $result_billing['state'];
                    if($result_shippingfrom['state']==$result_billing['state']){
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
                $response = ["response"=>false, "data"=>'Sub Item field is required'];
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





    public function invoice_add(){
        $data = (array)null;
        if(isPost()){
            $data= postData();
            $data["date"] = dateTime();
            $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
            $invoiceData = $this->obj->invoiceData($data);
            redirect('Invoice/invoice_list');
        }
    }

    public function edit_invoice_list()
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();

            //Employee details data.
            $InvoiceList =$this->obj->getInvoiceEditList($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
			foreach($InvoiceList as $key => $value){

			   $ID = $value['_id'];
			   $balance_due = $this->obj->getInvoiceBalanceDue($value['_id']);
			   $InvoiceList[$key]['total_payable_amt'] = $balance_due['total_payable_amt'];
			   $InvoiceList[$key]['total_tax_amt'] = $balance_due['total_tax_amt'];
			   $pay_chk = $this->obj->payment_check_details($value['_id']);
			   $InvoiceList[$key]['chk'] = $pay_chk['_id'];
		   }
            $data["InvoiceList"] = $InvoiceList;
            $this->view('pages/edit_invoice_list', $data);
        }
        else
        {
            //$data['from_date']=date('Y-m-d');
			$data['from_date'] = date('Y-m-d', strtotime('-30 days'));
            $data['to_date']=date('Y-m-d');
            //Employee details data.
            $InvoiceList =$this->obj->getInvoiceEditList($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
            // echo '<pre>';
            // print_r($InvoiceList); 
			foreach($InvoiceList as $key => $value){

			   $ID = $value['_id'];
			   $balance_due = $this->obj->getInvoiceBalanceDue($value['_id']);
			   $InvoiceList[$key]['total_payable_amt'] = $balance_due['total_payable_amt'];
			   $InvoiceList[$key]['total_tax_amt'] = $balance_due['total_tax_amt'];
			   $pay_chk = $this->obj->payment_check_details($value['_id']);
               
			   $InvoiceList[$key]['chk'] = $pay_chk['_id']??null;
               
		   }
            $data["InvoiceList"] = $InvoiceList;
			// echo '<pre>';
            // print_r($data);return;
			
            //print_r($data["InvoiceList"]);
            $this->view('pages/edit_invoice_list', $data);
        }

    }
    public function invoice_report()
    {
        $data = (array)null;
           if(isPost())
            {
                $data = postData();
               // print_r($data);
                $dt = $data['from_date'];
                //echo 'First day : '. date("Y-m-01", strtotime($dt)).' - Last day : '. date("Y-m-t", strtotime($dt));
                $first_day = date("Y-m-01", strtotime($dt));
                $last_day = date("Y-m-t", strtotime($dt));
               // echo ($first_day."=====".$last_day);
                $data['first_day'] = $first_day;
                $data['last_day'] = $last_day;
                //Invoice details data.
                $invoiceList =$this->obj->invoice_report($data);
                $invoiceList = json_decode(json_encode($invoiceList),true);
                $data["invoiceList"] = $invoiceList;

                $this->view('pages/invoice_report', $data);
            }
            else
            {
                $data['from_date']=date('Y-m');
                $dtt = $data['from_date'];
                $first_day = date("Y-m-01", strtotime($dtt));
                $last_day = date("Y-m-t", strtotime($dtt));
                $data['first_day'] = $first_day;
                $data['last_day'] = $last_day;
                //echo ($f_day."=====".$l_day);
                //Invoice Details
                $invoiceList =$this->obj->invoice_report($data);
                $invoiceList = json_decode(json_encode($invoiceList),true);
                $data["invoiceList"] = $invoiceList;
                $this->view('pages/invoice_report', $data);
            }
    }
    public function invoice_company()
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();
            //Customer details
            $cust = $this->obj->contact_name();
            $data['cust'] = $cust;
            //Employee details data.
            $InvoiceList =$this->obj->invoice_company_search($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
            if($InvoiceList)
            {
                 foreach($InvoiceList as $key => $value){

                   $ID = $value['_id'];
                   $balance_due = $this->obj->getInvoiceBalanceDue($value['_id']);
                   $InvoiceList[$key]['total_payable_amt'] = $balance_due['total_payable_amt'];
                   $InvoiceList[$key]['total_tax_amt'] = $balance_due['total_tax_amt'];
               }   
            }
            $data["InvoiceList"] = $InvoiceList;
            $this->view('pages/invoice_company', $data);
        }
        else
        {
            //Customer details
            $cust = $this->obj->contact_name();
            $data['cust'] = $cust;
            //$data['from_date']=date('Y-m-d');
            $data['from_date'] = date('Y-m-d', strtotime('-30 days'));
            $data['to_date']=date('Y-m-d');
            //Employee details data.
            $InvoiceList =$this->obj->invoice_company($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
            foreach($InvoiceList as $key => $value){

               $ID = $value['_id'];
               $balance_due = $this->obj->getInvoiceBalanceDue($value['_id']);
               $InvoiceList[$key]['total_payable_amt'] = $balance_due['total_payable_amt'];
               $InvoiceList[$key]['total_tax_amt'] = $balance_due['total_tax_amt'];
           }
            $data["InvoiceList"] = $InvoiceList;
            //print_r($data["InvoiceList"]);
            $this->view('pages/invoice_company', $data);
        }
    }

}


?>