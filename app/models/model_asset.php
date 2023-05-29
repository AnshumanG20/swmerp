<?php
    class model_asset
    {
        private $db;
        public function __construct()
        {
            $this->db = new dataBase();
        }
		
	
    public function get_AssetList($data)
    {
        // print_r($data);
        try
        {
            $sql="SELECT a._id, a.item_name_id, i.item_name, s. sub_item_name, m.model_no, a.supplier_name, a.order_no, a.purchase_cost, a.asset_model_no_id, 
                    a.purchase_date, a.expiry_date, a.warranty_month_no , a.asset_quantity, a._status
                     FROM tbl_asset_details a join tbl_item_name_mstr i on(a.item_name_id=i._id)
                     join tbl_sub_item_name_mstr s on(a.sub_item_name_id=s._id)
                     left join tbl_asset_model_no_mstr m on(a.asset_model_no_id=m._id)
                     where a._status='1';";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_EmployeeList()
    {
        try
        {
            $sql="SELECT _id, first_name, middle_name, last_name, employee_code
                     FROM tbl_emp_details
                     where _status='1' and step_status='7'";
            $this->db->query($sql);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_AssetDetailsById($data)
    {
        // print_r($data);
        try
        {
            $sql="SELECT a._id, a.asset_type, a.item_name_id, i.item_name, a.sub_item_name_id, s. sub_item_name, a.asset_model_no_id, m.model_no, a.supplier_name, a.order_no, a.purchase_cost, a.bill_attachment, 
                    a.purchase_date, a.expiry_date, a.warranty_month_no , a.asset_quantity, a._status, a.manufacturer_name , a.supplier_address, a.supplier_contact_no, a.remarks
                     FROM tbl_asset_details a join tbl_item_name_mstr i on(a.item_name_id=i._id)
                     join tbl_sub_item_name_mstr s on(a.sub_item_name_id=s._id)
                     left join tbl_asset_model_no_mstr m on(a.asset_model_no_id=m._id)
                     where a._status='1' and a._id=:asset_detail_id";
            $this->db->query($sql);
            $this->db->bind('asset_detail_id',$data);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_itemListByAssetType($data)
    {
        // print_r($data);
        try
        {
            $sql="select * from tbl_item_name_mstr where asset_type=:asset_type and  _status=1";
            $this->db->query($sql);
            $this->db->bind('asset_type',$data);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_SubitemListByItemId($data)
    {
        try
        {
           $sql="select * from tbl_sub_item_name_mstr
                 where item_name_id=:item_name_id and _status=:_status";
            $this->db->query($sql);
            $this->db->bind('item_name_id',$data);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function get_ModelListBySubItemId($data)
    {
        try
        {
           $sql="select * from tbl_asset_model_no_mstr
                 where sub_item_name_id=:sub_item_name_id and _status=:_status";
            $this->db->query($sql);
            $this->db->bind('sub_item_name_id',$data);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	
	public function get_SerialnoListByModelNoId($ITM,$SITM,$MODNO)
    {
        try
        {
           $sql="select _id, asset_barcode_no from tbl_asset_model_list
                 where item_name_id=:item_name_id and sub_item_name_id=:sub_item_name_id and asset_model_no_id=:asset_model_no_id and _status=:_status and (_id NOT IN (
                    SELECT asset_model_id
                    FROM  tbl_asset_assigned_employee_details where item_name_id=:item_name_id and sub_item_name_id=:sub_item_name_id and asset_model_no_id=:asset_model_no_id and _status=:_status) or _id IN (
                    SELECT asset_model_id
                    FROM  tbl_asset_assigned_employee_details where item_name_id=:item_name_id and sub_item_name_id=:sub_item_name_id and asset_model_no_id=:asset_model_no_id and _status='0'))";
            $this->db->query($sql);
            $this->db->bind('item_name_id',$ITM);
            $this->db->bind('sub_item_name_id',$SITM);
            $this->db->bind('asset_model_no_id',$MODNO);
            $this->db->bind('_status', 1);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function insert_item_details($data){
            //generate salary
        //print_r($data['employment_id']);
            $result = $this->db->table('tbl_item_name_mstr')->
              insertGetId([
                  "asset_type"=>$data['asset_type'],
                  "item_name"=>$data["other_item_name"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }

      public function insert_sub_item_details($data){
            //generate salary
            $result = $this->db->table('tbl_sub_item_name_mstr')->
              insertGetId([
                  "item_name_id"=>$data['item_id'],
                  "sub_item_name"=>$data["other_sub_item_name"],
                  "selling_rate"=>$data['selling_rate'],
                  "cgst_tax"=>$data['cgst_tax'],
                  "sgst_tax"=>$data['sgst_tax'],
                  "igst_tax"=>$data['igst_tax'],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }

      public function insert_model_details($data){
            //generate salary
            $result = $this->db->table('tbl_asset_model_no_mstr')->
              insertGetId([
                  "sub_item_name_id"=>$data['sub_item_id'],
                  "model_no"=>$data["other_model_no"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }

      public function insert_asset_details($data){
            //generate salary
        //print_r($data);
            $result = $this->db->table('tbl_asset_details')->
              insertGetId([
                  "asset_type"=>$data['asset_type'],
                  "item_name_id"=>$data["item_name_id"],
                  "sub_item_name_id"=>$data["sub_item_name_id"],
                  "asset_model_no_id"=>($data["asset_model_no_id"]!="")?$data["asset_model_no_id"]:0,
                  "manufacturer_name"=>($data["manufacturer_name"]!="")?$data["manufacturer_name"]:"",
                  "supplier_name"=>($data["supplier_name"]!="")?$data["supplier_name"]:"",
                  "supplier_address"=>($data["supplier_address"]!="")?$data["supplier_address"]:"",
                  "supplier_contact_no"=>($data["supplier_contact_no"]!="")?$data["supplier_contact_no"]:"",
                  "purchase_cost"=>($data["purchase_cost"]!="")?$data["purchase_cost"]:"0",
                  "purchase_date"=>($data["purchase_date"]!="")?$data["purchase_date"]:"",
                  "expiry_date"=>($data["expiry_date"]!="")?$data["expiry_date"]:"",
                  "warranty_month_no"=>($data["warranty_month_no"]!="")?$data["warranty_month_no"]:"",
                  "order_no"=>($data["order_no"]!="")?$data["order_no"]:"",
                  "asset_quantity"=>($data["asset_quantity"]!="")?$data["asset_quantity"]:"",
                  "remarks"=>($data["remarks"]!="")?$data["remarks"]:"",
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }

      public function upload_bill_attachment($asset_details_id, $attachment_path){
       		 $result =$this->db->table('tbl_asset_details')
                          ->where("_id", "=", $asset_details_id)
                          ->update([
                              'bill_attachment'=>$attachment_path
                                ]);
             return json_decode(json_encode($result), true);
		}

        public function update_asset_details($data){
       		 $result =$this->db->table('tbl_asset_details')
                          ->where("_id", "=", $data["_id"])
                          ->update([
                              "asset_type"=>$data['asset_type'],
                              "item_name_id"=>$data["item_name_id"],
                              "sub_item_name_id"=>$data["sub_item_name_id"],
                              "asset_model_no_id"=>($data["asset_model_no_id"]!="")?$data["asset_model_no_id"]:0,
                              "manufacturer_name"=>($data["manufacturer_name"]!="")?$data["manufacturer_name"]:"",
                              "supplier_name"=>($data["supplier_name"]!="")?$data["supplier_name"]:"",
                              "supplier_address"=>($data["supplier_address"]!="")?$data["supplier_address"]:"",
                              "supplier_contact_no"=>($data["supplier_contact_no"]!="")?$data["supplier_contact_no"]:"",
                              "purchase_cost"=>($data["purchase_cost"]!="")?$data["purchase_cost"]:"0",
                              "purchase_date"=>($data["purchase_date"]!="")?$data["purchase_date"]:"",
                              "expiry_date"=>($data["expiry_date"]!="")?$data["expiry_date"]:"",
                              "warranty_month_no"=>($data["warranty_month_no"]!="")?$data["warranty_month_no"]:"",
                              "order_no"=>($data["order_no"]!="")?$data["order_no"]:"",
                              "asset_quantity"=>($data["asset_quantity"]!="")?$data["asset_quantity"]:"",
                              "remarks"=>($data["remarks"]!="")?$data["remarks"]:""
                                ]);
             return json_decode(json_encode($result), true);
		}

        public function insert_asset_model_details($data){
            //asset model detail
			//print_r($data["asset_quantity_length"]);
			//die();
            $result = $this->db->table('tbl_asset_model_list')->
              insertGetId([
                  "asset_details_id"=>$data['asset_details_id'],
                  "asset_serial_no"=>($data["asset_serial_no"]!="")?$data["asset_serial_no"]:"",
                  "asset_status"=>($data["asset_status"]!="")?$data["asset_status"]:0,
                  "asset_type"=>($data["asset_type_id"]!="")?$data["asset_type_id"]:"",
                  "item_name_id"=>($data["item_name_id"]!="")?$data["item_name_id"]:0,
                  "sub_item_name_id"=>($data["sub_item_name_id"]!="")?$data["sub_item_name_id"]:0,
                  "asset_model_no_id"=>($data["asset_model_no_id"]!="")?$data["asset_model_no_id"]:0,
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
              ]);
			/*if($result)
			{
				$resultt = $this->db->table('tbl_asset_assigned_employee_details')->
				insertGetId([
                  "asset_model_id"=>$result,
                  "assigned_employee_id"=>($data["assigned_employee_id"]!="")?$data["assigned_employee_id"]:"0",
                  "asset_type"=>($data["asset_type_id"]!="")?$data["asset_type_id"]:"",
				  "item_name_id"=>($data["item_name_id"]!="")?$data["item_name_id"]:0,
				  "sub_item_name_id"=>($data["sub_item_name_id"]!="")?$data["sub_item_name_id"]:0,
				  "quantity"=>"1",
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
				]);
			}*/
          return json_decode(json_encode($result), true);
      }

      public function generate_barcode_no($asset_model_last_id, $asset_barcode_no){
       		 $result =$this->db->table('tbl_asset_model_list')
                          ->where("_id", "=", $asset_model_last_id)
                          ->update([
                              "asset_barcode_no"=>$asset_barcode_no
                               ]);
             return json_decode(json_encode($result), true);
		}

    public function get_AssetModDetailsById($data)
    {
        try
        {
            $sql="SELECT a._id, a.asset_details_id, a.asset_barcode_no, a.asset_serial_no, a.asset_status, a.asset_type, a._status FROM tbl_asset_model_list a where a._status='1' and  a.asset_details_id=:asset_detail_id";
            $this->db->query($sql);
            $this->db->bind('asset_detail_id',$data);
            $result = $this->db->resultset();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    public function update_asset_model_details($data){
       		$result =$this->db->table('tbl_asset_model_list')
                          ->where("_id", "=", $data["asset_model_detail_id"])
                          ->update([
                              "asset_serial_no"=>$data["asset_serial_no"],
                              "asset_status"=>$data["asset_status"]
                               ]);
			/*if($result)
			{
				echo $resultt =$this->db->table('tbl_asset_assigned_employee_details')
					  ->where("asset_model_id", "=", $data["asset_model_detail_id"])
					  ->update([
						  "assigned_employee_id"=>($data["assigned_employee_id"]!="")?$data["assigned_employee_id"]:null,
						   ]);
			}*/
            return json_decode(json_encode($result), true);
		}
        
        public function get_AssetRepDetailsById($ASID, $MID)
        {
            try
            {
                $sql="SELECT _id, asset_details_id, asset_model_id, repairing_date, charge_amount
                  FROM tbl_asset_model_repairing_details
                  where _status='1' and asset_details_id=:asset_detail_id and asset_model_id=:asset_model_id";
                $this->db->query($sql);
                $this->db->bind('asset_detail_id',$ASID);
                $this->db->bind('asset_model_id',$MID);
                $result = $this->db->resultset();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
        public function insert_asset_rep_details($data){
            //asset model detail
            $result = $this->db->table('tbl_asset_model_repairing_details')->
              insertGetId([
                  "asset_details_id"=>$data['_id'],
                  "asset_model_id"=>$data["model_id"],
                  "repairing_date"=>($data["repairing_date"]!="")?$data["repairing_date"]:0,
                  "charge_amount"=>($data["charge_amount"]!="")?$data["charge_amount"]:0,
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
              ]);
          return json_decode(json_encode($result), true);
      }
	  
	  public function insert_asset_assign_details($data){
            $result = $this->db->table('tbl_asset_assigned_employee_details')->
				insertGetId([
                  "asset_model_no_id"=>($data["model_no_id"]!="")?$data["model_no_id"]:"0",
                  "assigned_employee_id"=>($data["assigned_to"]!="")?$data["assigned_to"]:"0",
                  "asset_type"=>($data["asset_type"]!="")?$data["asset_type"]:"",
				  "item_name_id"=>($data["item_name_id"]!="")?$data["item_name_id"]:0,
				  "sub_item_name_id"=>($data["sub_item_name_id"]!="")?$data["sub_item_name_id"]:0,
				  "asset_model_id"=>($data["serial_no"]!="")?$data["serial_no"]:0,
				  "quantity"=>$data["asset_quantity"],
                  "created_on"=>$data["created_on"],
                  "created_by"=>$data["created_by"],
                  "_status"=>"1"
				]);
		  return json_decode(json_encode($result), true);
      }
	  
	  public function get_AssetAssignedList($data)
    {
        try
        {
            $sql="SELECT a._id, i.item_name, s. sub_item_name, m.model_no, a._status, a.created_on, a.assigned_employee_id, a.created_by,a.quantity
                     FROM tbl_asset_assigned_employee_details a join tbl_item_name_mstr i on(a.item_name_id=i._id)
                     join tbl_sub_item_name_mstr s on(a.sub_item_name_id=s._id)
                     left join tbl_asset_model_no_mstr m on(a.asset_model_no_id=m._id)
                     where a._status='1' and date(a.created_on) between :from_date and :to_date";
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
	//////////////////////////////////////////////
    public function getAssignedQtySum($data)
    {

        $sql="SELECT SUM(quantity) AS total FROM tbl_asset_assigned_employee_details WHERE item_name_id=:item_name_id";
        // var_dump($sql);return;
        $this->db->query($sql);
        $this->db->bind("item_name_id",$data);
        $result = $this->db->single();
        return $result;
    }

    public function getAssetQtySum($data)
    {
        // print_r($data);
        $sql="SELECT SUM(asset_quantity) AS total FROM tbl_asset_details WHERE item_name_id=:item_name_id";
        // var_dump($sql);return;
        $this->db->query($sql);
        $this->db->bind("item_name_id",$data);
        $result = $this->db->single();
        return $result;
    }

    public function deleteData($data)
    {

        $sql="DELETE FROM tbl_asset_details WHERE md5(_id::text)=:_id";
        $this->db->query($sql);
        $this->db->bind("_id", $data['_id']);
        $res = $this->db->deletion();
        // return $res;
    }


    public function getAssetId($data){
        $sql="SELECT item_name_id FROM tbl_asset_details WHERE md5(_id::text)=:_id";
        // var_dump($sql);return;
        $this->db->query($sql);
        $this->db->bind("_id", $data['_id']);
        $result = $this->db->single();
        return $result;
    }








    //////////////////////////////////////////////////
	public function get_asset_assigned_to_List($assigned_employee_id)
    {
        try
        {
            $sql="SELECT first_name, middle_name, last_name
                     FROM tbl_emp_details
                     where _id='".$assigned_employee_id."'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function get_asset_assigned_by_List($created_by)
    {
        try
        {
            $sql="SELECT first_name, middle_name, last_name
                     FROM tbl_emp_details
                     where _id='".$created_by."'";
            $this->db->query($sql);
            $result = $this->db->single();
            return $result;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }
	public function asset_assign_exists($data)
        {
			//print_r($data);
            try
            {
				
					$sql = "SELECT * FROM tbl_asset_assigned_employee_details
                        where item_name_id=:item_name_id and sub_item_name_id=:sub_item_name_id and asset_model_no_id=:asset_model_no_id and assigned_employee_id=:assigned_to and asset_model_id=:asset_model_id and _status=:_status";
				
                $this->db->query($sql);
                $this->db->bind('item_name_id',$data['item_name_id']);
                $this->db->bind('sub_item_name_id',$data['sub_item_name_id']);
                $this->db->bind('asset_model_no_id',$data['model_no_id']);
                $this->db->bind('assigned_to',$data['assigned_to']);
                $this->db->bind('asset_model_id',$data['serial_no']);
                $this->db->bind('_status','1');
                $result = $this->db->single();
                return $result;
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
		 
     public function ajaxGetQuantity($data)
     {
     // print_r($data);
        try
        {
        //   Assign Quantity
          $quantity = "SELECT SUM (quantity) AS quantity
                          FROM tbl_asset_assigned_employee_details
                          where item_name_id=:item_name_id and sub_item_name_id =:sub_item_name_id And asset_type =:asset_type And _status=1";
                          $this->db->query($quantity);
                          $this->db->bind('item_name_id',$data['item_name_id']);
                          $this->db->bind('sub_item_name_id',$data['sub_item_name_id']);
                          $this->db->bind('asset_type',$data['asset_type']);
                          $assign_quantity = $this->db->single();


                        
          //Total Quantity
        //   $sql = "select asset_type,asset_quantity,item_name_id,sub_item_name_id from tbl_asset_details 
        //           where item_name_id=:item_name_id and sub_item_name_id =:sub_item_name_id And asset_type =:asset_type And _status=1";
        //           $this->db->query($sql);
        //           $this->db->bind('item_name_id',$data['item_name_id']);
        //           $this->db->bind('sub_item_name_id',$data['sub_item_name_id']);
        //           $this->db->bind('asset_type',$data['asset_type']);
        //           $result = $this->db->single();
        //           $total_quantity = $result['asset_quantity'] - $assign_quantity['quantity'];
        //           return $total_quantity;

            //Total Quantity
            $sql = "SELECT SUM( asset_quantity) as asst_qty
            FROM tbl_asset_details
            where item_name_id=:item_name_id and sub_item_name_id =:sub_item_name_id And asset_type =:asset_type And _status=1";

         
          $this->db->query($sql);
         
          $this->db->bind('item_name_id',$data['item_name_id']);
          $this->db->bind('sub_item_name_id',$data['sub_item_name_id']);
          $this->db->bind('asset_type',$data['asset_type']);
          $result = $this->db->single();
        $total_quantity = $result['asst_qty'] - $assign_quantity['quantity'];
        return $total_quantity;
        }
        catch(Exception $e)
        {
          echo $e->getMessage();
        }
     }
     public function getAllAssignQuantity()
     {
        try
        {
          $quantity = "select 
          tbl_sub_item_name_mstr.sub_item_name,
          tbl_asset_assigned_employee_details.sub_item_name_id,
          sum(tbl_asset_assigned_employee_details.quantity) 
      from tbl_asset_assigned_employee_details
      left join tbl_sub_item_name_mstr on tbl_asset_assigned_employee_details.sub_item_name_id = tbl_sub_item_name_mstr._id 
      group by tbl_asset_assigned_employee_details.sub_item_name_id, tbl_sub_item_name_mstr.sub_item_name";
                          $this->db->query($quantity);
                        
                          $assign_quantity = $this->db->resultSet();


      
        return $assign_quantity;
        }
        catch(Exception $e)
        {
          echo $e->getMessage();
        }
     }
     public function getAllPurchaseQuantity()
     {
        try
        {
          $quantity = "select 
          tbl_sub_item_name_mstr.sub_item_name,
          tbl_asset_assigned_employee_details.sub_item_name_id,
          sum(tbl_asset_assigned_employee_details.quantity) 
      from tbl_asset_assigned_employee_details
      left join tbl_sub_item_name_mstr on tbl_asset_assigned_employee_details.sub_item_name_id = tbl_sub_item_name_mstr._id 
      group by tbl_asset_assigned_employee_details.sub_item_name_id, tbl_sub_item_name_mstr.sub_item_name";
                          $this->db->query($quantity);
                        
                          $assign_quantity = $this->db->resultSet();


      
        return $assign_quantity;
        }
        catch(Exception $e)
        {
          echo $e->getMessage();
        }
     }

    }

?>