<?php
    class model_invoicepayment
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }
       
    public function getInvoiceById($invoiceid)
      {
          try
          {
              $sql ="select r._id as invoice_id, r.invoice_date, r.invoice_no, r.bill_amt, v.contact_name, r.contact_details_id from tbl_invoice r join tbl_contact_details v on(r.contact_details_id=v._id) where r._id='$invoiceid'";
              $this->db->query($sql);
             $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
	  public function getcollectionByinvId($invoiceid)
      {
          try
          {
              $sql ="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_payable_amt, COALESCE(sum(COALESCE (tax_amt,0)),0) as tax_amt from tbl_collection where generate_id='$invoiceid'  AND _status='1' and transaction_type='INVOICE'";
              $this->db->query($sql);
             $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
	public function get_paymentmodeList()
    {
        try
        {
            $sql="select * from tbl_payment_mode_mstr where _status=1";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function get_payment_no()
    {
        try
        {
           $sql="SELECT payment_no FROM tbl_transaction WHERE _status='1' and transaction_type='INVOICE' ORDER BY _id DESC";
            $this->db->query($sql);
             $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function insert_invoice_transaction($data){
            //generate salary
           $result = $this->db->table('tbl_transaction')->
              insertGetId([
                  "transaction_type"=>$data["transaction_type"],
                  "payment_date"=>$data["payment_date"],
                  "generated_amt"=>$data["generated_amt"],
                  "payable_amt"=>$data["payable_amt"],
                  "due_amt"=>$data["due_amt"],
                  "payment_mode_id"=>$data["payment_mode_id"],
                  "payer_payee_id"=>$data["payer_payee_id"],
                  "other_payment_mode"=>$data["other_payment_mode"],
                  "other_payment_mode"=>$data["check_neft_bank_imps_no"],
				  "transaction_date"=>($data["transaction_date"]!="")?$data["transaction_date"]:NULL,
				  "remarks"=>$data["remarks"],
                  "payment_no"=>$data["payment_number"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
              ]);

          return json_decode(json_encode($result), true);
      }
	  
	  public function insert_invoice_collection($data){
            //generate salary
          $result = $this->db->table('tbl_collection')->
              insertGetId([
                  "transaction_type"=>$data["transaction_type"],
                  "transaction_id"=>$data["transaction_id"],
				  "payer_payee_id"=>$data["payer_payee_id"],
				  "generate_id"=>$data['generate_id'],
				  "month_year"=>"",
				  "paid_amt"=>$data["paid_amt"],
                  "tax_amt"=>$data["tax_amt"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }
	  public function update_invoice_paid_stts($invoice_id){
		$result =$this->db->table('tbl_invoice')
			  ->where("_id", "=", $invoice_id)
			  ->update([
				  'paid_status'=>'1'
					]);
             return json_decode(json_encode($result), true);
		}
		public function update_invoice_unpaid_stts($invoice_id){
		$result =$this->db->table('tbl_invoice')
			  ->where("_id", "=", $invoice_id)
			  ->update([
				  'paid_status'=>'0'
					]);
             return json_decode(json_encode($result), true);
		}
		public function getcomplocdetByID()
      {
          try
          {
              $sql ="SELECT c.company_name, l.address, l.email_id, l.contact_no, l.gstin_no, c.website, state_dist_city_id
                    FROM tbl_company_details c 
                    join tbl_company_location l on(c._id=l.company_id)
                    where l.office_type='Registered' and l._status='1'";
              $this->db->query($sql);
              //$this->db->bind('comp_loc_id', $data);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
	  public function getinvdetByID($data)
      {
          try
          {
              $sql ="select r._id, r.cgst_total_tax, r.sgst_total_tax, r.igst_total_tax, r.invoice_date, r.invoice_no, r.bill_amt, r.customer_note, r.terms_and_conditions, v.contact_name,r.invoice_cancel_date, v.contact_person_name, v.contact_no, v.gstin_no,
			  v.contact_email_id, r.payment_due_date, r.contact_details_id, r.sub_bill_amt, r.discount_amt,
			  r.paid_status from tbl_invoice r join tbl_contact_details v on(r.contact_details_id=v._id)
			  
              where r._id=:invoice_id";
              $this->db->query($sql);
              $this->db->bind('invoice_id', $data);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  public function get_contact_billing_details($contact_details_id)
      {
          try
          {
              $sql ="select c._id, c.attention, c.address, c.phoneno, s.state, c.state_name from tbl_contact_address_detail c join tbl_state_dist_city s on(c.state_name=s._id) where c.contact_id='".$contact_details_id."' and c.address_type='1' and c.is_default='1' and c._status='1'";
              $this->db->query($sql);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
		{
              echo $e->getMessage();
         
		}
	  }
	  public function get_contact_shipping_details($contact_details_id)
      {
          try
          {
              $sql ="select c._id, c.attention, c.address, c.phoneno, s.state, c.state_name from tbl_contact_address_detail c join tbl_state_dist_city s on(c.state_name=s._id) where c.contact_id='".$contact_details_id."' and c.address_type='2' and c.is_default='1' and c._status='1'";
              $this->db->query($sql);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  public function get_invoice_item_details($invoice_id)
      {
          try
          {
              $sql ="select i._id AS item_mstr_id,i.item_name, r.item_per_rate, r.item_quantity, r.total_amt, s._id AS sub_item_mstr_id,s.sub_item_name, r.cgst_tax_per, r.sgst_tax_per, r.igst_tax_per,r.asset_type, r.cgst_tax_amt, r.sgst_tax_amt, r.igst_tax_amt, r.grande_total_amt, r.sub_item_description from tbl_invoice_details r join tbl_item_name_mstr i on(r.item_mstr_id=i._id) join tbl_sub_item_name_mstr s on(r.sub_item_mstr_id=s._id) where r.invoice_id='".$invoice_id."' AND r._status='1'";
              $this->db->query($sql);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  public function payment_check_details($invoice_id)
      {
          try
          {
              $sql ="select _id from tbl_collection where generate_id='".$invoice_id."' AND _status='1' and transaction_type='INVOICE'";
              $this->db->query($sql);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  
	  public function invoice_payment_list($data)
      {
          try
          {
              $sql ="select l._id , l.payable_amt, p.payment_mode, l.payment_date, l._status, l.payment_mode_id, l.transaction_type, c.invoice_no, e.contact_name, e.gstin_no, l.generated_amt, l.due_amt, m.tax_amt, l.payment_no from tbl_transaction l join tbl_contact_details e on(l.payer_payee_id=e._id) join tbl_collection m on (m.transaction_id=l._id) join tbl_invoice c on (m.generate_id=c._id) join tbl_payment_mode_mstr p on(p._id=l.payment_mode_id) where date(l.payment_date) BETWEEN :from_date and :to_date and l._status in (0,1) and l.transaction_type='INVOICE' order by l._id desc";
              $this->db->query($sql);
			  $this->db->bind('from_date', $data['from_date']);
              $this->db->bind('to_date', $data['to_date']);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  
	  public function invoice_tr_col_details($transaction_id)
      {
          try
          {
              $sql ="select t._id, t.payer_payee_id ,t.payment_date, t.payable_amt, t.transaction_type, t.cash_voucher_no, m.payment_mode, t.payment_no, t.transaction_date,  t._status, t.payment_mode_id, c.generate_id, i.invoice_no, i.bill_amt, invoice_date, v.contact_name, v.contact_no, v.contact_email_id, v.contact_person_name, v.gstin_no, t.payer_payee_id from tbl_transaction t join tbl_collection c on(c.transaction_id=t._id) join tbl_payment_mode_mstr m on(t.payment_mode_id=m._id) join tbl_invoice i on(c.generate_id=i._id) join tbl_contact_details v on(t.payer_payee_id=v._id) where t._id='".$transaction_id."' and t.transaction_type='INVOICE'";
              $this->db->query($sql);
			  $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  public function invoice_last_tr_col_details($generate_id)
      {
          try
          {
              $sql ="select transaction_id from tbl_collection where generate_id='".$generate_id."' AND _status='1' and transaction_type='INVOICE' order by _id desc limit 1";
              $this->db->query($sql);
			  $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  public function invoicedetBytransId($transaction_id)
      {
          try
          {
              $sql ="select t._id, t.payer_payee_id ,t.payment_date, t.payable_amt as get_total_payable_amt, t.transaction_type, t.generated_amt as get_bill_amount, m.payment_mode, t.payment_no, t.transaction_date,  t._status, t.payment_mode_id as get_payment_mode_id, c.generate_id, i.invoice_no, i.bill_amt, c.tax_amt as get_tax_amt, t.remarks, t.due_amt as get_due_amt, t.other_payment_mode, t.check_neft_bank_imps_no, v.gstin_no, t.payer_payee_id from tbl_transaction t join tbl_collection c on(c.transaction_id=t._id) join tbl_payment_mode_mstr m on(t.payment_mode_id=m._id) join tbl_invoice i on(c.generate_id=i._id) join tbl_contact_details v on(t.payer_payee_id=v._id) where t._id='".$transaction_id."' and t.transaction_type='INVOICE'";
              $this->db->query($sql);
			  $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
         
		}
	  }
	  public function update_invoice_transaction($data){
		$result =$this->db->table('tbl_transaction')
			  ->where("_id", "=", $data['transaction_id'])
			  ->update([
				  'payment_mode_id'=>$data['payment_mode_id'],
				  'check_neft_bank_imps_no'=>$data['check_neft_bank_imps_no'],
				  "transaction_date"=>($data["transaction_date"]!="")?$data["transaction_date"]:NULL,
				  'generated_amt'=>$data['generated_amt'],
				  'payable_amt'=>$data['payable_amt'],
				  'due_amt'=>$data['due_amt'],
				  'remarks'=>$data['remarks'],
				  'payment_date'=>$data['payment_date'],
				  'other_payment_mode'=>$data['other_payment_mode'],
				  'created_by'=>$data['created_by']
					]);
             return json_decode(json_encode($result), true);
		}
		public function update_invoice_collection($data){
		$result =$this->db->table('tbl_collection')
			  ->where("transaction_id", "=", $data['transaction_id'])
			  ->update([
				  'paid_amt'=>$data['payable_amt'],
				  'tax_amt'=>$data['tax_amt']
					]);
             return json_decode(json_encode($result), true);
		}

    }

?>