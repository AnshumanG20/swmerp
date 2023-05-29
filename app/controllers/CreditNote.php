<?php 
class CreditNote extends Controller
{
    public function __construct()
    {
        if(!isLoggedIn()){ redirect('Login'); }
        $this->obj = $this->model('model_creditNote');
		$this->model_invoicepayment = $this->model('model_invoicepayment');
    }
	
	public function cancelInvoice($ID=null)
    {
		$data = (array)null;
		//$data['id'] = $ID;
		if(isPost())
            {
                $data = postData();
				$data['id'] = $ID;
				$cancelinvoice = $this->obj->cancelinvoice($data);
				//$data["id"] = $invoiceData;
                redirect('InvoicePayment/invoice/'.$data["id"]);
			}
		
	}

	public function creditNoteList()
    {
		$data = (array)null;
        if(isPost())
        {
            $data = postData();
            //Employee details data.
            $creditNoteList =$this->obj->getcreditNoteList($data);
            $creditNoteList = json_decode(json_encode($creditNoteList),true);
            $data["creditNoteList"] = $creditNoteList;
			$this->view('pages/creditNote_List', $data);
        }
        else
        {
            //$data['from_date']=date('Y-m-d');
			$data['from_date'] = date('Y-m-d');
            $data['to_date']=date('Y-m-d');
            //credit note data.
            $creditNoteList =$this->obj->getcreditNoteList($data);
            $creditNoteList = json_decode(json_encode($creditNoteList),true);

            // echo "<pre>";
            // print_r($creditNoteList);
            // return;
            $data["creditNoteList"] = $creditNoteList;
			$this->view('pages/creditNote_List', $data);
        }
		
	}
	

	
    public function creditNote_add($ID=null)
    {
        $data = (array)null;
        $data["_id"] = $ID;
        $creditNote_no = $this->obj->creditNote_no();
        $creditNote_no = JSON_DECODE(JSON_ENCODE($creditNote_no), true);
		//print_r($creditNote_no);
        if($creditNote_no!=""){
            //print_r($invoice_no);
            $creditNote_no = $creditNote_no['credit_note_no'];
            $creditNote_no = (int)substr($creditNote_no, 6);
            $creditNote_no++;
            $creditNote_no = str_pad($creditNote_no, 5, "0", STR_PAD_LEFT);
            $creditNote_no = "CRDNT-".$creditNote_no;
        }else{
            $creditNote_no = "CRDNT-00001";
        }
        $data["creditNote_no"] = $creditNote_no;
            if(isPost())
            {
                $data = postData();
				$data["creditNote_no"] = $creditNote_no;
                $data["date"] = dateTime();
                $data['user_mstr_id'] = $_SESSION['emp_details']['_id'];
                $creditNote = $this->obj->creditNote($data);
                if($creditNote){
                    $data["creditNoteid"] = $creditNote;
                    $len = sizeof($data['asset_type']);
                    for($i=0; $i<$len; $i++){
                        $form = [];
						$creditNotes = $data["creditNoteid"];
                        $item_mstr_id = $data['item_mstr_ids'][$i];
                        $sub_item_mstr_id = $data['sub_item_mstr_ids'][$i];
                        $sub_item_description = $data['sub_item_descriptions'][$i];
                        $cgst_tax_per = $data['cgst_tax_pers'][$i];
                        $sgst_tax_per = $data['sgst_tax_pers'][$i];
                        $igst_tax_per = $data['igst_tax_pers'][$i];
                        $item_quantity = $data['item_quantitys'][$i];
                        $item_per_rate = $data['item_per_rates'][$i];
                        $total_amount = $data['total_amts'][$i];
                        $cgst_tax_amt = $data['cgst_tax_amts'][$i];
                        $sgst_tax_amt = $data['sgst_tax_amts'][$i];
                        $igst_tax_amt = $data['igst_tax_amts'][$i];
                        $tax_total_amt = $data['grande_total_amts'][$i];
						
                        $form["creditNoteid"] = $creditNotes;
                        $form["item_mstr_id"] = $item_mstr_id;
                        $form["sub_item_mstr_id"] = $sub_item_mstr_id;
                        $form["sub_item_description"] = $sub_item_description;
                        $form["cgst_tax_per"] = $cgst_tax_per;
                        $form["sgst_tax_per"] = $sgst_tax_per;
                        $form["igst_tax_per"] = $igst_tax_per;
                        $form["item_quantity"] = $item_quantity;
                        $form["item_per_rate"] = $item_per_rate;
                        $form["total_amount"] = $total_amount;
						$form["cgst_tax_amt"] = $cgst_tax_amt;
                        $form["sgst_tax_amt"] = $sgst_tax_amt;
                        $form["igst_tax_amt"] = $igst_tax_amt;
                        $form["tax_total_amt"] = $tax_total_amt;
                        /* $form["jobpostid"] = $jobpost; */
                        $creditNoteAssets = $this->obj->creditNoteAssets($form);
						if($creditNoteAssets){
							$paidStatuschange = $this->obj->paidStatuschange($data);
						}
                    }
					
                }
                $data["_id"] = $ID;
                redirect('CreditNote/creditnote/'.$data["_id"]);
            }
        
        
    }
	
	public function creditnote($ID=null){
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
			//print_r($data["EmpCompLocList"]);
			
			$getcreditnote =$this->obj->getcreditnote($data["_id"]);
            $getcreditnote = json_decode(json_encode($getcreditnote),true);
            $data["getcreditnote"] = $getcreditnote;
            $this->view('pages/creditnotes', $data);

      }
   
}


?>