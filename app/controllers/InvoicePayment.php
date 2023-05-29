<?php 
class InvoicePayment extends Controller
{
	public function __construct()
	{
		if(!isLoggedIn()){ redirect('Login'); }
        $this->model_invoicepayment = $this->model('model_invoicepayment');
	}
	
	public function invoice_payment($INVID=null,$TRID=null)
	{
		$data = (array)null;
		$data["invoice_id"] = $INVID;
		$data["transaction_id"] = $TRID;
		//Invoice details
		$InvoiceList =$this->model_invoicepayment->getInvoiceById($data["invoice_id"]);
		$InvoiceList = json_decode(json_encode($InvoiceList),true);
		//Invoice Payment details
		$InvoicetrList =$this->model_invoicepayment->getcollectionByinvId($data["invoice_id"]);
		$InvoicetrList = json_decode(json_encode($InvoicetrList),true);
		//Payment mode
		$paymentmodeList =$this->model_invoicepayment->get_paymentmodeList($data);
		$paymentmodeList = json_decode(json_encode($paymentmodeList),true);
                
		if(isPost())
		{
			
			$data = postData();
			if($data['transaction_id']=='') //Insert Opertion
			{
				$data['created_by'] = $_SESSION['emp_details']['_id'];
				$data['created_on'] = dateTime();
				$bulk_payment_date= date("Y-m-d");
				$date_time= date("Y-m-d H:i:s");
				$data["InvoiceList"] = $InvoiceList;
				$data["InvoicetrList"] = $InvoicetrList;
				$data["paymentmodeList"] = $paymentmodeList;
				//echo ($data['created_by']);
				
				$payment_no = '';
				
					$ser_no =$this->model_invoicepayment->get_payment_no();
					$payment_no = $ser_no['payment_no'];
					if($payment_no==''){
						$payment_number = '1';
					}
					else
					{
						$payment_number = $payment_no+1;
					}
				
				if($data["tax_amt"]=='')
				{
					$data["tax_amt"]=0;
				}
				
				$due_amt=($data["bill_amount"]-$data["amount_received"])-$data["tax_amt"];
				//echo $payment_number;
				//die();
				/************/
				$form = ["payment_date"=>$data['payment_date'], "generated_amt"=>$data["bill_amount"], "payable_amt"=>$data["amount_received"], "due_amt"=>$due_amt, "payment_mode_id"=>$data['payment_mode'], "transaction_date"=>$data["cheque_transaction_date"], "other_payment_mode"=>$data["other_payment_mode"], "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "payment_number"=>$payment_number, "payer_payee_id"=>$data['customer_id'], "remarks"=>$data['descriptions'], "transaction_type"=>'INVOICE',"check_neft_bank_imps_no"=>$data['check_neft_bank_imps_no']];
				
					
				//insert data in transaction table
				$invoice_payment_list = $this->model_invoicepayment->insert_invoice_transaction($form);
				$invoice_payment_list = JSON_DECODE(JSON_ENCODE($invoice_payment_list), true);
				$data["invoice_payment_list"] = $invoice_payment_list;
				
				if($data["invoice_payment_list"])
				{
					$form_data = ["payer_payee_id"=>$data['customer_id'], "transaction_id"=>$data["invoice_payment_list"], "generate_id"=>$data['invoice_id'], "paid_amt"=>$data["amount_received"], "created_by"=>$data['created_by'], "date_time"=>$date_time, "transaction_type"=>'INVOICE', "tax_amt"=>$data["tax_amt"]];
					
					$cash_coll_list = $this->model_invoicepayment->insert_invoice_collection($form_data);
					$cash_coll_list = JSON_DECODE(JSON_ENCODE($cash_coll_list), true);
					$data["cash_coll_list"] = $cash_coll_list;
					if($due_amt==0)
					{
						$inv_updt = $this->model_invoicepayment->update_invoice_paid_stts($data['invoice_id']);
						$inv_updt = JSON_DECODE(JSON_ENCODE($inv_updt), true);	
					}
				}
				redirect('InvoicePayment/payment_receipt/'.$data["invoice_payment_list"]);
				//$this->view('pages/invoice_payment', $data);
			}
			else //update
			{
				$data['created_by'] = $_SESSION['emp_details']['_id'];
				if($data["tax_amt"]=='')
				{
					$data["tax_amt"]=0;
				}
				
				$due_amt=($data["bill_amount"]-$data["amount_received"])-$data["tax_amt"];
				/************/
				$form = ["payment_date"=>$data['payment_date'], "generated_amt"=>$data["bill_amount"], "payable_amt"=>$data["amount_received"], "due_amt"=>$due_amt, "payment_mode_id"=>$data['payment_mode'], "transaction_date"=>$data["cheque_transaction_date"], "other_payment_mode"=>$data["other_payment_mode"], "transaction_id"=>$data['transaction_id'], "created_by"=>$data['created_by'], "remarks"=>$data['descriptions'], "check_neft_bank_imps_no"=>$data['check_neft_bank_imps_no'],"tax_amt"=>$data['tax_amt']];
				

				//update data in transaction table
				$invoice_payment_update = $this->model_invoicepayment->update_invoice_transaction($form);
				$invoice_payment_update = JSON_DECODE(JSON_ENCODE($invoice_payment_update), true);
				$data["invoice_payment_update"] = $invoice_payment_update;
				
				if($due_amt==0)
				{
					$inv_updt = $this->model_invoicepayment->update_invoice_paid_stts($data['invoice_id']);
					$inv_updt = JSON_DECODE(JSON_ENCODE($inv_updt), true);	
				}
				if(($data["amount_received"] + $data["tax_amt"])<$data["bill_amount"])
				{
					$inv_updt = $this->model_invoicepayment->update_invoice_unpaid_stts($data['invoice_id']);
					$inv_updt = JSON_DECODE(JSON_ENCODE($inv_updt), true);
				}
				//update data in collection table
				$invoice_coll_update = $this->model_invoicepayment->update_invoice_collection($form);
				$invoice_coll_update = JSON_DECODE(JSON_ENCODE($invoice_coll_update), true);
				$data["invoice_coll_update"] = $invoice_coll_update;
				redirect('InvoicePayment/payment_receipt/'.$data["transaction_id"]);
				
			}
			
		}
		else if(isset($TRID))
        {
			
            $data["InvoiceList"] = $InvoiceList;
			$data["InvoicetrList"] = $InvoicetrList;
			$data["paymentmodeList"] = $paymentmodeList;
			$data["amount_received"]=$data["InvoiceList"]["bill_amt"] -($data["InvoicetrList"]["total_payable_amt"]+$data["InvoicetrList"]["tax_amt"]);
			//Invoice Payment details
			$InvoicetransList =$this->model_invoicepayment->invoicedetBytransId($data["transaction_id"]);
			$InvoicetransList = json_decode(json_encode($InvoicetransList),true);
			$data["InvoicetransList"] = $InvoicetransList;
			// print_r($data["InvoicetransList"]);
            
            $this->view('pages/invoice_payment', $data);
        }
		else
		{
			
			$data["InvoiceList"] = $InvoiceList;
			$data["InvoicetrList"] = $InvoicetrList;
			$data["paymentmodeList"] = $paymentmodeList;
			$data["amount_received"]=$data["InvoiceList"]["bill_amt"] -($data["InvoicetrList"]["total_payable_amt"]+$data["InvoicetrList"]["tax_amt"]);
			//print_r($data["amount_received"]);
			$this->view('pages/invoice_payment', $data);
		}
		//$this->view('pages/invoice_payment',$data);
	}
	
    
    
	
	public function invoice($ID=null){
            $data = (array)null;
            $data["_id"] = $ID;
			
            //Employee details data.
            $EmpTranList =$this->model_invoicepayment->getinvdetByID($data["_id"]);
            $EmpTranList = json_decode(json_encode($EmpTranList),true);
            $data["EmpTranList"] = $EmpTranList;
            //Invoice Payment details
			$InvoicetrList =$this->model_invoicepayment->getcollectionByinvId($data["_id"]);
			$InvoicetrList = json_decode(json_encode($InvoicetrList),true);
			$data["InvoicetrList"] = $InvoicetrList;
			//Billing details
			$BillingList =$this->model_invoicepayment->get_contact_billing_details($data["EmpTranList"]["contact_details_id"]);
			$BillingList = json_decode(json_encode($BillingList),true);
			$data["BillingList"] = $BillingList;
			//Shipping details
			$ShippingList =$this->model_invoicepayment->get_contact_shipping_details($data["EmpTranList"]["contact_details_id"]);
			$ShippingList = json_decode(json_encode($ShippingList),true);
			$data["ShippingList"] = $ShippingList;
			//Inv item details
			$InvList =$this->model_invoicepayment->get_invoice_item_details($data["_id"]);
			$InvList = json_decode(json_encode($InvList),true);
			$data["InvList"] = $InvList;
			//transaction check details
			$InvpayList =$this->model_invoicepayment->payment_check_details($data["_id"]);
			$InvpayList = json_decode(json_encode($InvpayList),true);
			$data["InvpayList"] = $InvpayList;
			//print_r($data["InvpayList"]);
			
			$data["InvoicetrList"]["balance_due"]=$data["EmpTranList"]["bill_amt"] -($data["InvoicetrList"]["total_payable_amt"]+$data["InvoicetrList"]["tax_amt"]);
			//print_r($data["InvoicetrList"]["balance_due"]);

            //Company Location Details
            $EmpCompLocList =$this->model_invoicepayment->getcomplocdetByID();
            $EmpCompLocList = json_decode(json_encode($EmpCompLocList),true);
            $data["EmpCompLocList"] = $EmpCompLocList;
			// echo '<pre>';
			// print_r($data);
            $this->view('pages/invoice', $data);

      }
	  /*public function add_edit_work_order($ID=null){
		$this->view('pages/add_edit_work_order', $data);  
	  }*/
	  
	  public function invoice_payment_list()
    {
        $data = (array)null;
        if(isPost())
        {
            $data = postData();

            //Employee details data.
            $InvoiceList =$this->model_invoicepayment->invoice_payment_list($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
            $data["InvoiceList"] = $InvoiceList;
            $this->view('pages/invoice_payment_list', $data);
        }
        else
        {
            //$data['from_date']=date('Y-m-d');
			$data['from_date'] = date('Y-m-d', strtotime('-30 days'));
            $data['to_date']=date('Y-m-d');
            //Employee details data.
            $InvoiceList =$this->model_invoicepayment->invoice_payment_list($data);
            $InvoiceList = json_decode(json_encode($InvoiceList),true);
            $data["InvoiceList"] = $InvoiceList;
            //print_r($data["InvoiceList"]);
            $this->view('pages/invoice_payment_list', $data);
        }

    }
	public function payment_receipt($ID=null){
		$data = (array)null;
            $data["_id"] = $ID;
			
			
            //Transaction details data.
            $EmpTranList =$this->model_invoicepayment->invoice_tr_col_details($data["_id"]);
            $EmpTranList = json_decode(json_encode($EmpTranList),true);
            $data["EmpTranList"] = $EmpTranList;
			
			//Last Transaction details data.
            $EmpLastTranList =$this->model_invoicepayment->invoice_last_tr_col_details($data["EmpTranList"]["generate_id"]);
            $EmpLastTranList = json_decode(json_encode($EmpLastTranList),true);
            $data["EmpLastTranList"] = $EmpLastTranList;
			//print_r($data["EmpTranList"]["_id"]);
			//print_r($data["EmpLastTranList"]["transaction_id"]);
            
            //Company Location Details
            $EmpCompLocList =$this->model_invoicepayment->getcomplocdetByID();
            $EmpCompLocList = json_decode(json_encode($EmpCompLocList),true);
            $data["EmpCompLocList"] = $EmpCompLocList;
			// echo '<pre>';print_r($data["EmpCompLocList"]);return;
            
		$this->view('pages/payment_receipt', $data);  
	  }
	  
	

}


?>