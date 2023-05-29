<?php
    class model_estimate
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }

        
       public function customer_name(){
        $sql = "SELECT _id AS customer_name_id,contact_name
                FROM tbl_contact_details
				WHERE contact_type_id IN (1,2)";
        $this->db->query($sql);
        $result = $this->db->resultset();
        return json_decode(json_encode($result), true);
		}
		
		public function estimate_no(){
        $sql = "SELECT estimate_no
                FROM tbl_estimate
				ORDER BY estimate_no DESC";
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

      public function estimateData($data){

        $result = $this->db->table('tbl_estimate')->
                  insertGetId([
                    "contact_details_id"=>$data["cust_type"],
                    "estimate_no"=>$data["estimate_no"],
                    "estimate_date"=>$data["estimate_date"],
                    "estimate_expiry_date"=>$data["payment_due_date"],
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
                    "customer_notes"=>$data["customer_note"],
                    "ship_from_state"=>$data["shipFrom"],
                    "bill_to_state"=>$data["bill"],
                    "ship_to_state"=>$data["shipTo"],
                    "terms_and_conditions"=>$data["terms_and_conditions"],
                    "datetime"=>$data["date"],
                    "_status"=>"1"
                  ]);
      return $result;
    }

     public function estimateAssets($data){
         $cgst_tax_per = $data["cgst_tax_per"];
         $sgst_tax_per = $data["sgst_tax_per"];
         $igst_tax_per = $data["igst_tax_per"];
         $total_amt = $data["total_amount"];
         $cgst_tax_amt = ($total_amt*$cgst_tax_per)/100;
         $sgst_tax_amt = ($total_amt*$sgst_tax_per)/100;
         $igst_tax_amt = ($total_amt*$igst_tax_per)/100;
         $total_tax_amt = $cgst_tax_amt+$sgst_tax_amt;
         $grande_total_amt = $total_amt+$cgst_tax_amt+$sgst_tax_amt;
        $result = $this->db->table('tbl_estimate_details')->
                  insert([
                    "estimate_id"=>$data["estimateid"],
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
	public function getEstimateEditList($data)
      {
          try
          {
              $sql ="select tbl_estimate._id, tbl_estimate.estimate_date, tbl_estimate.estimate_no,
              tbl_estimate.bill_amt, tbl_contact_details.contact_name,
              tbl_estimate.estimate_expiry_date,tbl_estimate.work_order_status, tbl_estimate.contact_details_id
              from tbl_estimate
              left join tbl_contact_details on(tbl_estimate.contact_details_id=tbl_contact_details._id)
              where date(tbl_estimate.datetime) between :from_date and :to_date
              order by tbl_estimate._id desc";
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


        public function estimateEdit($data){
            $sql = "SELECT tbl_estimate.estimate_no,tbl_estimate.estimate_date,
                tbl_estimate.estimate_expiry_date AS payment_due_date,tbl_estimate.discount_type,
                tbl_estimate.bill_to_state,tbl_estimate.ship_from_state,tbl_estimate.ship_to_state,
                tbl_estimate.discount_rate,tbl_estimate.discount_amt,tbl_estimate.sub_bill_amt,
                tbl_estimate.cgst_total_tax,tbl_estimate.sgst_total_tax,tbl_estimate.igst_total_tax,
                tbl_estimate.sub_tax_bill_amt,tbl_estimate.discount_type,tbl_estimate.discount_rate,
                tbl_estimate.discount_amt,tbl_estimate.bill_amt,tbl_estimate.terms_and_conditions,
                tbl_estimate.customer_notes,tbl_contact_details.contact_name,
                tbl_contact_details._id AS customer_name_id
                FROM tbl_estimate
                LEFT JOIN tbl_contact_details ON tbl_contact_details._id=tbl_estimate.contact_details_id
                WHERE tbl_estimate._id =:id AND tbl_estimate._status =1";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
                $result = $this->db->single();
    			return $result;

        }
        
        public function estimateEditAsset($data){
            $sql = "SELECT tbl_estimate_details._id,tbl_estimate_details.asset_type,
                tbl_estimate_details.item_quantity,tbl_estimate_details.item_per_rate,
                tbl_estimate_details.total_amt,tbl_estimate_details.sub_item_description,
                tbl_estimate_details.cgst_tax_per,tbl_estimate_details.sgst_tax_per,tbl_estimate_details.igst_tax_per,
                tbl_item_name_mstr._id AS item_name_id,tbl_item_name_mstr.item_name,
                tbl_sub_item_name_mstr._id AS sub_item_id,tbl_sub_item_name_mstr.sub_item_name
                FROM tbl_estimate_details
                LEFT JOIN tbl_item_name_mstr ON tbl_item_name_mstr._id=tbl_estimate_details.item_mstr_id
                LEFT JOIN tbl_sub_item_name_mstr ON tbl_sub_item_name_mstr._id=tbl_estimate_details.sub_item_mstr_id
                WHERE tbl_estimate_details.estimate_id =:id AND tbl_estimate_details._status =1";
				$this->db->query($sql);
                $this->db->bind("id", $data["_id"]);
                $result = $this->db->resultset();
    			return $result;

        }


       public function estimateUpdate($data){
        $result = $this->db->table('tbl_estimate')->
            WHERE("_id", "=", $data['_id'])->
                  update([
                    "contact_details_id"=>$data["cust_type"],
                    "estimate_no"=>$data["estimate_no"],
                    "estimate_date"=>$data["estimate_date"],
                    "estimate_expiry_date"=>$data["payment_due_date"],
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
                    "customer_notes"=>$data["customer_note"],
                    "ship_from_state"=>$data["shipFrom"],
                    "bill_to_state"=>$data["bill"],
                    "ship_to_state"=>$data["shipTo"],
                    "terms_and_conditions"=>$data["terms_and_conditions"],
                    /* ""=>$data[""], */
                    "datetime"=>$data["date"],
                    "_status"=>"1"
                  ]);
      return $result;
    }
        
        public function estimateStatusChange($data){
          $result = $this->db->table('tbl_estimate_details')->
              WHERE("estimate_id", "=", $data["_id"])->
              update([
                  "_status"=>0
              ]);
        }


     public function estimateAssetsUpdate($data){
         $cgst_tax_per = $data["cgst_tax_per"];
         $sgst_tax_per = $data["sgst_tax_per"];
         $igst_tax_per = $data["igst_tax_per"];
         $total_amt = $data["total_amount"];
         $cgst_tax_amt = ($total_amt*$cgst_tax_per)/100;
         $sgst_tax_amt = ($total_amt*$sgst_tax_per)/100;
         $igst_tax_amt = ($total_amt*$igst_tax_per)/100;
         $total_tax_amt = $cgst_tax_amt+$sgst_tax_amt;
         $grande_total_amt = $total_amt+$cgst_tax_amt+$sgst_tax_amt;
        $result = $this->db->table('tbl_estimate_details')->
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
        
        public function estimateAssetsins($data){
         $cgst_tax_per = $data["cgst_tax_per"];
         $sgst_tax_per = $data["sgst_tax_per"];
         $igst_tax_per = $data["igst_tax_per"];
         $total_amt = $data["total_amount"];
         $cgst_tax_amt = ($total_amt*$cgst_tax_per)/100;
         $sgst_tax_amt = ($total_amt*$sgst_tax_per)/100;
         $igst_tax_amt = ($total_amt*$igst_tax_per)/100;
         $total_tax_amt = $cgst_tax_amt+$sgst_tax_amt;
         $grande_total_amt = $total_amt+$cgst_tax_amt+$sgst_tax_amt;
        $result = $this->db->table('tbl_estimate_details')->
                  insert([
                    "estimate_id" => $data["_id"],
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
					"selling_rate"=>$data["selling_rate"],
					"cgst_tax"=>$data["cgst_tax_amount"],
					"sgst_tax"=>$data["sgst_tax_amount"],
					"igst_tax"=>$data["igst_tax_amount"],
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




     public function getWorkOrderList($data)
      {
          try
          {
              $sql ="select tbl_estimate._id, tbl_estimate.estimate_date, tbl_estimate.estimate_no,
              tbl_estimate.bill_amt, tbl_contact_details.contact_name,tbl_estimate.customer_notes,tbl_estimate.terms_and_conditions,
              tbl_estimate.work_order_received_date,tbl_estimate.work_order_attach_path,tbl_estimate.work_order_remarks,
              tbl_estimate.ship_from_state,tbl_estimate.bill_to_state,tbl_estimate.ship_to_state,tbl_estimate.work_order_attach_path,
              tbl_estimate_details.cgst_tax_amt,tbl_estimate_details.sgst_tax_amt,tbl_estimate_details.igst_tax_amt,
              tbl_estimate.cgst_total_tax,tbl_estimate.sgst_total_tax,tbl_estimate.igst_total_tax,tbl_estimate.sub_tax_bill_amt,
              tbl_estimate.estimate_expiry_date,tbl_estimate.work_order_status,tbl_contact_details.gstin_no,
              tbl_estimate.cgst_total_tax AS sub_cgst_tax_amt, tbl_estimate.sgst_total_tax AS sub_sgst_tax_amt,
              tbl_estimate.igst_total_tax AS sub_igst_tax_amt,tbl_state_dist_city.state,
              tbl_estimate.discount_amt,tbl_estimate.bill_amt,tbl_estimate.sub_bill_amt,
              tbl_estimate_details.sub_item_description,tbl_estimate_details.cgst_tax_per,tbl_estimate_details.sgst_tax_per,tbl_estimate_details.igst_tax_per
              from tbl_estimate
              left join tbl_contact_details on(tbl_estimate.contact_details_id=tbl_contact_details._id)
              left join tbl_contact_address_detail on(tbl_contact_details._id=tbl_contact_address_detail.contact_id)
              left join tbl_state_dist_city on(tbl_contact_address_detail.state_name=tbl_state_dist_city._id)
              left join tbl_estimate_details on(tbl_estimate._id=tbl_estimate_details.estimate_id)
              where tbl_estimate._id =:id AND tbl_estimate._status =1
              order by tbl_estimate._id desc";
              $this->db->query($sql);
              $this->db->bind('id', $data['id']);
              $result = $this->db->single();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }

        
        public function getWorkAssetsList($data)
      {
          try
          {
              $sql ="select tbl_estimate.ship_from_state,tbl_estimate.bill_to_state,
              tbl_estimate_details.item_quantity,tbl_estimate_details.item_per_rate,tbl_estimate_details.total_amt,
              tbl_estimate_details.cgst_tax_amt,tbl_estimate_details.sgst_tax_amt,tbl_estimate_details.igst_tax_amt,
              tbl_item_name_mstr.item_name,tbl_sub_item_name_mstr.sub_item_name,
              tbl_estimate_details.sub_item_description,tbl_estimate_details.cgst_tax_per,tbl_estimate_details.sgst_tax_per,tbl_estimate_details.igst_tax_per
              from tbl_estimate_details
              left join tbl_estimate on(tbl_estimate_details.estimate_id=tbl_estimate._id)
              left join tbl_item_name_mstr on(tbl_estimate_details.item_mstr_id=tbl_item_name_mstr._id)
              left join tbl_sub_item_name_mstr on(tbl_estimate_details.sub_item_mstr_id=tbl_sub_item_name_mstr._id)
              where tbl_estimate_details.estimate_id =:id AND tbl_estimate_details._status =1
              ";
              $this->db->query($sql);
              $this->db->bind('id', $data['id']);
              $result = $this->db->resultset();
              return $result;
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
      }
        
        public function updateWorkOrder($data){
            try
            {

                        $result = $this->db->table('tbl_estimate')->
                            WHERE("_id", "=", $data['order_id'])->
                            update([
                                "work_order_received_date"=>$data["work_order_received_date"],
                                "work_order_attach_path"=>$data["work_order_attach_path"],
                                "work_order_remarks"=>$data["work_order_remarks"],
                                "work_order_entry_datetime"=>$data["date"],
                                "work_order_entry_by"=>$data["user_id"],
                                "work_order_status"=>"1"
                            ]);
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }

        }




    }


?>