<?php
    class model_creditNote
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }

		
		public function cancelinvoice($data){
          $result = $this->db->table('tbl_invoice')->
              WHERE("invoice_no", "=", $data["invoice_nos"])->
              update([
				  "invoice_cancel_date"=>$data["invoice_cancel_dates"],
				  "invoice_cancel_remarks"=>$data["cancel_invoice_remarks"],
                  "paid_status"=>2
              ]);
		}
		
	public function getcreditNoteList($data)
      {
          try
          {
              $sql ="select r._id, r.invoice_date, r.invoice_no, r.bill_amt, r.invoice_cancel_remarks,
			  r.invoice_cancel_date,v.credit_note_no,v.credit_note_date,r.cgst_total_tax,r.sgst_total_tax,r.igst_total_tax
			  from tbl_invoice r
			  inner join tbl_credit_note v on(r.invoice_no=v.invoice_no)
              where date(r.datetime) between :from_date and :to_date order by r._id desc";
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
	

      
        
	
		public function creditNote_no(){
        $sql = "SELECT credit_note_no
                FROM tbl_credit_note
				ORDER BY credit_note_no DESC";
        $this->db->query($sql);
        $result = $this->db->single();
        return json_decode(json_encode($result), true);
		}
		

      public function creditNote($data){
        // echo '<pre>';print_r($data);
        $result = $this->db->table('tbl_credit_note')->
                  insertGetId([
                    "credit_note_no"=>$data["creditNote_no"],
                    "invoice_no"=>$data["invoice_nos"],
                    "invoice_date"=>$data["invoice_dates"],
                    "payment_due_date"=>$data["payment_due_dates"],
                    "sub_bill_amt"=>$data["sub_bill_amts"],
                    "cgst_total_tax"=>$data["cgst_total_taxs"],
                    "sgst_total_tax"=>$data["sgst_total_taxs"],
                    "igst_total_tax"=>$data["igst_total_taxs"],
                    "discount_amt"=>$data["discount_amts"],
                    "bill_amt"=>$data["bill_amts"],
					"credit_note_date"=>$data["invoice_cancel_date"],
                    "user_id"=>$data["user_mstr_id"],
                    "date_time"=>$data["date"],
                    "_status"=>"1"
                  ]);
                  
      return $result;
    }

     public function creditNoteAssets($data){
         
        $result = $this->db->table('tbl_creditnote_details')->
                  insert([
                    "creditnote_id"=>$data["creditNoteid"],
                    "item_mstr_id"=>$data["item_mstr_id"],
                    "sub_item_mstr_id"=>$data["sub_item_mstr_id"],
                    "item_quantity"=>$data["item_quantity"],
                    "item_per_rate"=>$data["item_per_rate"],
                    "sub_item_description"=>$data["sub_item_description"],
                    "cgst_tax_per"=>$data["cgst_tax_per"],
                    "sgst_tax_per"=>$data["sgst_tax_per"],
                    "igst_tax_per"=>$data["igst_tax_per"],
                    "cgst_tax_amt"=>$data["cgst_tax_amt"],
                    "sgst_tax_amt"=>$data["sgst_tax_amt"],
                    "igst_tax_amt"=>$data["igst_tax_amt"],
                    "total_amt"=>$data["total_amount"],
                    "total_tax_amt"=>$data["tax_total_amt"],
                    "_status"=>"1"
                  ]);
      return $result;
    }
	
	public function paidStatuschange($data){
          $result = $this->db->table('tbl_invoice')->
              WHERE("invoice_no", "=", $data["invoice_nos"])->
              update([
                  "paid_status"=>3
              ]);
    }
	
	public function getcreditnote($data)
      {
          try
          {
              $sql ="select c.credit_note_no,c.credit_note_date
			  from tbl_invoice r join tbl_credit_note c on(r.invoice_no=c.invoice_no)
			  
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
	  
	  

	
  }
?>