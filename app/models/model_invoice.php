<?php
    class model_invoice
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }

        
       public function customer_name(){
        $sql = "SELECT _id AS customer_name_id,contact_name
                FROM tbl_contact_details
				WHERE contact_type_id IN (1,2) AND _status=1";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
		}
		
		public function invoice_no(){
        $sql = "SELECT invoice_no
                FROM tbl_invoice
				ORDER BY invoice_no DESC";
        $this->db->query($sql);
        $result = $this->db->single();
        return json_decode(json_encode($result), true);
		}
		
		public function get_itemListByAssetType($data){
        $sql = "SELECT _id AS item_name_id,
                item_name
                FROM tbl_item_name_mstr
                WHERE asset_type =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->resultset();
				return $result;
        }
		
		public function get_subitemListByitemList($data){
        $sql = "SELECT _id AS sub_item_name_id,
                sub_item_name
                FROM tbl_sub_item_name_mstr
                WHERE item_name_id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->resultset();
				return $result;
        }
		
		public function get_subitemDetails($data){
        $sql = "SELECT selling_rate, cgst_tax, sgst_tax, igst_tax
                FROM tbl_sub_item_name_mstr
                WHERE _id =:id AND _status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->single();
    			return $result;

        }
        
        
         public function additem_list($data){
        $itemIns = $this->db->table('tbl_item_name_mstr')->
                  insert([
                    "asset_type"=>$data["asset"],
                    "item_name"=>$data["items"],
                    "_status"=>"1"
                  ]);

        if($itemIns){
            $sql ="select _id AS item_name_id,item_name
            from tbl_item_name_mstr
            WHERE asset_type =:type AND _status =1";
            $this->db->query($sql);
            $this->db->bind('type', $data['asset']);
            $result = $this->db->resultset();
            return $result;
        }
    }

     public function addsubitem_list($data){
        $subitemIns = $this->db->table('tbl_sub_item_name_mstr')->
                  insert([
                    "item_name_id"=>$data["itemss"],
                    "sub_item_name"=>$data["subitemss"],
                    "_status"=>"1"
                  ]);

        if($subitemIns){
            $sql ="select _id AS sub_item_name_id,sub_item_name
            from tbl_sub_item_name_mstr
            WHERE item_name_id =:item AND _status =1";
            $this->db->query($sql);
            $this->db->bind('item', $data['itemss']);
            $result = $this->db->resultset();
            return $result;
        }
    }



        
        public function get_shipping_companyDetails(){
               $sql = "SELECT tbl_state_dist_city.state as state
                FROM tbl_company_location
                INNER JOIN tbl_state_dist_city ON tbl_state_dist_city._id=tbl_company_location.state_dist_city_id
                WHERE office_type = 'Registered'";
				$this->db->query($sql);
                $result = $this->db->single();
    			return $result;

        }

        public function get_shipping_customerDetails($data){
               $sql = "SELECT tbl_contact_address_detail.state_name,
                    tbl_state_dist_city.state as state
                FROM tbl_contact_address_detail
                INNER JOIN tbl_state_dist_city ON tbl_state_dist_city._id=tbl_contact_address_detail.state_name
                WHERE tbl_contact_address_detail.contact_id =:id AND tbl_contact_address_detail.address_type=1 AND tbl_contact_address_detail._status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->single();
    			return $result;

        }
        public function get_billing_customerDetails($data){
            $sql = "SELECT tbl_contact_address_detail.state_name,
                    tbl_state_dist_city.state as state
                FROM tbl_contact_address_detail
                INNER JOIN tbl_state_dist_city ON tbl_state_dist_city._id=tbl_contact_address_detail.state_name
                WHERE tbl_contact_address_detail.contact_id =:id AND tbl_contact_address_detail.address_type=2 AND tbl_contact_address_detail._status = 1";
				$this->db->query($sql);
                $this->db->bind("id", $data);
                $result = $this->db->single();
    			return $result;

        }

      public function invoiceData($data){

        $result = $this->db->table('tbl_invoice')->
                  insertGetId([
                    "contact_details_id"=>$data["cust_type"],
                    "invoice_no"=>$data["invoice_no"],
                    "invoice_date"=>$data["invoice_date"],
                    "payment_due_date"=>$data["payment_due_date"],
                    "sub_bill_amt"=>$data["spanSubTotalAmtShow"],
                    "cgst_total_tax"=>$data["spanCGSTShow"],
                    "sgst_total_tax"=>$data["spanSGSTShow"],
                    "igst_total_tax"=>$data["spanIGSTShow"],
                    "sub_tax_bill_amt"=>$data["spanSubTaxBillAmtShow"],
                    "discount_type"=>$data["discount_type"],
                    "discount_rate"=>$data["discount_rate"],
                    "discount_amt"=>$data["spanDiscountAmtShow"],
                    "bill_amt"=>$data["spanBillAmtShow"],
                    "user_id"=>$data["user_mstr_id"],
                    "customer_note"=>$data["customer_note"],
                    "ship_from_state"=>$data["shipFrom"],
                    "bill_to_state"=>$data["bill"],
                    "ship_to_state"=>$data["shipTo"],
                    "terms_and_conditions"=>$data["terms_and_conditions"],
                    "datetime"=>$data["date"],
                    "_status"=>"1"
                  ]);
      return $result;
    }

     public function invoiceAssets($data){
         $cgst_tax_per = $data["cgst_tax_per"];
         $sgst_tax_per = $data["sgst_tax_per"];
         $igst_tax_per = $data["igst_tax_per"];
         $total_amt = $data["total_amount"];
         $cgst_tax_amt = ($total_amt*$cgst_tax_per)/100;
         $sgst_tax_amt = ($total_amt*$sgst_tax_per)/100;
         $igst_tax_amt = ($total_amt*$igst_tax_per)/100;
         $total_tax_amt = $cgst_tax_amt+$sgst_tax_amt;
         $grande_total_amt = $total_amt+$cgst_tax_amt+$sgst_tax_amt;
        $result = $this->db->table('tbl_invoice_details')->
                  insert([
                    "invoice_id"=>$data["invoiceid"],
                    "asset_type"=>$data["asset_type"],
                    "item_mstr_id"=>$data["item_mstr_id"],
                    "sub_item_mstr_id"=>$data["sub_item_mstr_id"],
                    "item_quantity"=>$data["item_quantity"],
                    "item_per_rate"=>$data["item_per_rate"],
                    "total_amt"=>$total_amt,
                    "sub_item_description"=>$data["sub_item_description"],
                    "cgst_tax_per"=>$cgst_tax_per,
                    "sgst_tax_per"=>$sgst_tax_per,
                    "igst_tax_per"=>$igst_tax_per,
                    "cgst_tax_amt"=>$cgst_tax_amt,
                    "sgst_tax_amt"=>$sgst_tax_amt,
                    "igst_tax_amt"=>$igst_tax_amt,
                    "grande_total_amt"=>$grande_total_amt,
                    /* "terms_and_conditions"=>$data[""], */
                    "total_tax_amt"=>$total_tax_amt,
                    "_status"=>"1"
                  ]);
      return $result;
    }
	public function getInvoiceEditList($data)
      {
          try
          {
              $sql ="select r._id, r.invoice_date, r.invoice_no, r.bill_amt, v.contact_name, r.paid_status, r.payment_due_date from tbl_invoice r left join tbl_contact_details v on(r.contact_details_id=v._id)
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
        
        
        public function invoiceEdit($data){
            $sql = "SELECT tbl_invoice.contact_details_id, tbl_invoice.invoice_no, 	tbl_invoice.invoice_date, tbl_invoice.payment_due_date,
                tbl_invoice.sub_bill_amt,tbl_invoice.cgst_total_tax,tbl_invoice.bill_to_state,tbl_invoice.ship_from_state,
                tbl_invoice.sgst_total_tax,tbl_invoice.igst_total_tax,tbl_invoice.ship_to_state,
                tbl_invoice.sub_tax_bill_amt,tbl_invoice.discount_type,tbl_invoice.terms_and_conditions,
                tbl_invoice.ship_from_state,tbl_invoice.ship_to_state,tbl_invoice.bill_to_state,
                tbl_invoice.discount_rate,tbl_invoice.discount_amt,tbl_invoice.bill_amt,
                tbl_invoice.bill_amt,tbl_invoice.customer_note,tbl_contact_details.contact_name,
                tbl_contact_details._id AS customer_name_id
                FROM tbl_invoice
                LEFT JOIN tbl_contact_details ON tbl_contact_details._id=tbl_invoice.contact_details_id
                WHERE tbl_invoice._id =:id AND tbl_invoice._status=1";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
                $result = $this->db->single();
    			return $result;

        }
        
         public function invoiceEditAsset($data){
            $sql = "SELECT tbl_invoice_details._id,tbl_invoice_details.asset_type,
                tbl_invoice_details.item_quantity,tbl_invoice_details.item_per_rate,
                tbl_invoice_details.total_amt,tbl_invoice_details.sub_item_description,
                tbl_invoice_details.cgst_tax_per,tbl_invoice_details.sgst_tax_per,tbl_invoice_details.igst_tax_per,
                tbl_item_name_mstr._id AS item_name_id,tbl_item_name_mstr.item_name,
                tbl_sub_item_name_mstr._id AS sub_item_id,tbl_sub_item_name_mstr.sub_item_name
                FROM tbl_invoice_details
                LEFT JOIN tbl_item_name_mstr ON tbl_item_name_mstr._id=tbl_invoice_details.item_mstr_id
                LEFT JOIN tbl_sub_item_name_mstr ON tbl_sub_item_name_mstr._id=tbl_invoice_details.sub_item_mstr_id
                WHERE tbl_invoice_details.invoice_id =:id AND tbl_invoice_details._status =1";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
                $result = $this->db->resultset();
    			return $result;

        }



       public function invoiceUpdate($data){
        $result = $this->db->table('tbl_invoice')->
            WHERE("_id", "=", $data['_id'])->
                  update([
                    "contact_details_id"=>$data["cust_type"],
                    "invoice_no"=>$data["invoice_no"],
                    "invoice_date"=>$data["invoice_date"],
                    "payment_due_date"=>$data["payment_due_date"],
                    "sub_bill_amt"=>$data["spanSubTotalAmtShow"],
                    "cgst_total_tax"=>$data["spanCGSTShow"],
                    "sgst_total_tax"=>$data["spanSGSTShow"],
                    "igst_total_tax"=>$data["spanIGSTShow"],
                    "sub_tax_bill_amt"=>$data["spanSubTaxBillAmtShow"],
                    "discount_type"=>$data["discount_type"],
                    "discount_rate"=>$data["discount_rate"],
                    "discount_amt"=>$data["spanDiscountAmtShow"],
                    "bill_amt"=>$data["spanBillAmtShow"],
                    "user_id"=>$data["user_mstr_id"],
                    "customer_note"=>$data["customer_note"],
                    "ship_from_state"=>$data["shipFrom"],
                    "bill_to_state"=>$data["bill"],
                    "ship_to_state"=>$data["shipTo"],
                    "terms_and_conditions"=>$data["terms_and_conditions"],
                    "datetime"=>$data["date"],
                    "_status"=>"1"
                  ]);
      return $result;
    }
        
         public function invoiceAssetsStatus($data){
          $result = $this->db->table('tbl_invoice_details')->
              WHERE("invoice_id", "=", $data["_id"])->
              update([
                  "_status"=>0
              ]);
        }


     public function invoiceAssetsUpdate($data){
         $cgst_tax_per = $data["cgst_tax_per"];
         $sgst_tax_per = $data["sgst_tax_per"];
         $igst_tax_per = $data["igst_tax_per"];
         $total_amt = $data["total_amount"];
         $cgst_tax_amt = ($total_amt*$cgst_tax_per)/100;
         $sgst_tax_amt = ($total_amt*$sgst_tax_per)/100;
         $igst_tax_amt = ($total_amt*$igst_tax_per)/100;
         $total_tax_amt = $cgst_tax_amt+$sgst_tax_amt;
         $grande_total_amt = $total_amt+$cgst_tax_amt+$sgst_tax_amt;
        $result = $this->db->table('tbl_invoice_details')->
                  WHERE("_id", "=", $data['editAssets_id'])->
                  WHERE("_status", "=", "0")->
                  update([
                    "asset_type"=>$data["asset_type"],
                    "item_mstr_id"=>$data["item_mstr_id"],
                    "sub_item_mstr_id"=>$data["sub_item_mstr_id"],
                    "item_quantity"=>$data["item_quantity"],
                    "item_per_rate"=>$data["item_per_rate"],
                    "total_amt"=>$total_amt,
                    "sub_item_description"=>$data["sub_item_description"],
                    "cgst_tax_per"=>$cgst_tax_per,
                    "sgst_tax_per"=>$sgst_tax_per,
                    "igst_tax_per"=>$igst_tax_per,
                    "cgst_tax_amt"=>$cgst_tax_amt,
                    "sgst_tax_amt"=>$sgst_tax_amt,
                    "igst_tax_amt"=>$igst_tax_amt,
                    "grande_total_amt"=>$grande_total_amt,
                    /* "terms_and_conditions"=>$data[""], */
                    "total_tax_amt"=>$total_tax_amt,
                    "_status"=>"1"
                  ]);
      return $result;
    }
        

    public function invoiceAssetsins($data){
         $cgst_tax_per = $data["cgst_tax_per"];
         $sgst_tax_per = $data["sgst_tax_per"];
         $igst_tax_per = $data["igst_tax_per"];
         $total_amt = $data["total_amount"];
         $cgst_tax_amt = ($total_amt*$cgst_tax_per)/100;
         $sgst_tax_amt = ($total_amt*$sgst_tax_per)/100;
         $igst_tax_amt = ($total_amt*$igst_tax_per)/100;
         $total_tax_amt = $cgst_tax_amt+$sgst_tax_amt;
         $grande_total_amt = $total_amt+$cgst_tax_amt+$sgst_tax_amt;
        $result = $this->db->table('tbl_invoice_details')->
                  insert([
                    "invoice_id" => $data['_id'],
                    "asset_type"=>$data["asset_type"],
                    "item_mstr_id"=>$data["item_mstr_id"],
                    "sub_item_mstr_id"=>$data["sub_item_mstr_id"],
                    "item_quantity"=>$data["item_quantity"],
                    "item_per_rate"=>$data["item_per_rate"],
                    "total_amt"=>$total_amt,
                    "sub_item_description"=>$data["sub_item_description"],
                    "cgst_tax_per"=>$cgst_tax_per,
                    "sgst_tax_per"=>$sgst_tax_per,
                    "igst_tax_per"=>$igst_tax_per,
                    "cgst_tax_amt"=>$cgst_tax_amt,
                    "sgst_tax_amt"=>$sgst_tax_amt,
                    "igst_tax_amt"=>$igst_tax_amt,
                    "grande_total_amt"=>$grande_total_amt,
                    /* "terms_and_conditions"=>$data[""], */
                    "total_tax_amt"=>$total_tax_amt,
                    "_status"=>"1"
                  ]);
      return $result;
    }


	public function getInvoiceBalanceDue($invoice_id)
      {
          try
          {
              $sql ="select COALESCE(sum(COALESCE (paid_amt,0)),0) as total_payable_amt, COALESCE(sum(COALESCE (tax_amt,0)),0) as total_tax_amt from tbl_collection where generate_id='".$invoice_id."' and transaction_type='INVOICE' and _status='1'";
              $this->db->query($sql);
              $result = $this->db->single();
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
    public function invoice_report($data)
    {
        try
        {
          $sql = " select 
                  invoice._id,
                  invoice.cgst_total_tax, 
                  invoice.sgst_total_tax,
                  invoice.igst_total_tax,
                  invoice.invoice_no,
                  invoice.invoice_date,
                  invoice.bill_amt,
                  invoice.sub_bill_amt,
                  details.contact_name
                  from tbl_invoice invoice
                  join tbl_contact_details details on(details._id = invoice.contact_details_id)
                   where invoice._status=1 AND invoice.invoice_date BETWEEN :first_day AND :last_day order by invoice._id desc";
                   $this->db->query($sql);
                   $this->db->bind('first_day',$data['first_day']);
                   $this->db->bind('last_day',$data['last_day']);
                   $result = $this->db->resultset();
                   return $result;
        }
        catch(Exception $e)
        {
          echo $e->getMessage();
        }
    }
    public function invoice_company($data)
      {
          try
          {
              $sql ="select r._id,
                     r.invoice_date,
                     r.invoice_no, 
                     r.bill_amt, 
                     v.contact_name, 
                     r.paid_status,
                     r.payment_due_date 
                     from tbl_invoice r 
                     left join tbl_contact_details v on(r.contact_details_id=v._id)
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
      public function invoice_company_search($data)
      {
        //print_r($data);
          try
          {
              $sql ="select r._id,
                     r.invoice_date,
                     r.invoice_no, 
                     r.bill_amt, 
                     v.contact_name, 
                     r.paid_status,
                     r.payment_due_date 
                     from tbl_invoice r 
                     left join tbl_contact_details v on(r.contact_details_id=v._id)
                    where date(r.datetime) between :from_date and :to_date AND r.paid_status =:paid_status";
                    if($data['customer_name_id']!="")
                    {
                      $sql .= " AND r.contact_details_id='".$data['customer_name_id']."'";
                    }
                    if($data['invoice_no']!="")
                    {
                      $sql .= " AND r.invoice_no='".$data['invoice_no']."'";
                    }
                     if($data['invoice_status']!="")
                    {
                       $sql .= " ORDER BY r._id DESC";
                    }
                    $this->db->query($sql);
                    $this->db->bind('from_date', $data['from_date']);
                    $this->db->bind('to_date', $data['to_date']);
                    $this->db->bind('paid_status', $data['invoice_status']);
                    $result = $this->db->resultset();
                  return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
      public function contact_name()
      {
        try
        {
           $sql = "SELECT _id,contact_name
                FROM tbl_contact_details
                WHERE _status=1";
                $this->db->query($sql);
                $result = $this->db->resultset();
                return json_decode(json_encode($result), true);
        }
        catch(Exception $e)
        {
          echo $e->getMessage();
        } 
      }
  }
?>