<?php
    class Asset extends Controller
    
    {
        public function __construct()
        {
            if(!isLoggedIn()){ redirect('Login'); }
           $this->model_asset = $this->model('model_asset');
		   $this->helper('PicqerBarCode');

        }
        public function index()
        {
                    
        }
        public function AssetList()
        {
			$data = (array)null;
			$assetList = $this->model_asset->get_AssetList($data);
		    $assetList = JSON_DECODE(JSON_ENCODE($assetList), true);
			$data["assetList"] = $assetList;

            $assignQuanity_Result = $this->model_asset->getAllAssignQuantity();
            $data['allAssignList'] = $assignQuanity_Result;

          
            // echo "<pre>";
            // print_r($assignResult);
            // return;
            // echo "<pre>";
            // print_r($data);
            // return;
			$this->view('pages/asset_List',$data);
        }

         public function ajaxItemListByAssetType(){
          if(isPost()){
              $data = postData();
              if(isset($data['asset_type'])){
                $result = $this->model_asset->get_itemListByAssetType($data['asset_type']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['item_name']."</option>";
                    }
                    $option .= "<option value='0'>Other</option>";
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

      public function ajaxSubItemListByItemId(){
          if(isPost()){
              $data = postData();
              if(isset($data['item_name_id'])){
                $result = $this->model_asset->get_SubitemListByItemId($data['item_name_id']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['sub_item_name']."</option>";
                    }
                    $option .= "<option value='0'>Other</option>";
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'item name  field is required'];
              }
              echo json_encode($response);
          }
      }
      public function ajaxModelListBySubItemId(){
          if(isPost()){
              $data = postData();
              if(isset($data['sub_item_name_id'])){
                $result = $this->model_asset->get_ModelListBySubItemId($data['sub_item_name_id']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['model_no']."</option>";
                    }
                    $option .= "<option value='0'>Other</option>";
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'sub item name field is required'];
              }
              echo json_encode($response);
          }
      }

        public function asset_add_update($ID=null)
        {
           $data = (array)null;
             $data["_id"] = $ID;
           if(isPost())
           {
              $data= postData();
            //   echo '<pre>';
            //   print_r($data);
            //   return;
                if($data['_id']=="") // insert
                {
                    $data['created_by'] = $_SESSION['emp_details']['_id'];
                    $data['created_on'] = dateTime();
                    if($data['item_name_id']=='0')
                    {
                        //insert data in asset details table
                        $it_list = $this->model_asset->insert_item_details($data);
                        $it_list = JSON_DECODE(JSON_ENCODE($it_list), true);
                        $data["item_id"] = $it_list;
                    }
                    else
                    {
                        $data["item_id"]=$data['item_name_id'];
                    }
                    if($data['sub_item_name_id']=='0')
                    {
                        //insert data in asset details table
                        $sit_list = $this->model_asset->insert_sub_item_details($data);
                        $sit_list = JSON_DECODE(JSON_ENCODE($sit_list), true);
                        $data["sub_item_id"] = $sit_list;
                    }
                    else
                    {
                        $data["sub_item_id"]=$data['sub_item_name_id'];
                    }
                    if($data['model_no_id']=='0')
                    {
                        //insert data in asset details table
                        $modl_list = $this->model_asset->insert_model_details($data);
                        $modl_list = JSON_DECODE(JSON_ENCODE($modl_list), true);
                        $data["model_id"] = $modl_list;
                    }
                    else
                    {
                        $data["model_id"]=$data['model_no_id'];
                    }


                    $form = ["asset_type"=>$data['asset_type'], "item_name_id"=>$data['item_id'], "sub_item_name_id"=>$data['sub_item_id'], "asset_model_no_id"=>$data['model_id'],  "manufacturer_name"=>$data['manufacturer_name'], "supplier_name"=>$data['supplier_name'], "supplier_address"=>$data['supplier_address'], "supplier_contact_no"=>$data['supplier_contact_no'], "purchase_cost"=>$data['purchase_cost'], "purchase_date"=>$data['purchase_date'], "expiry_date"=>$data['expiry_date'], "warranty_month_no"=>$data['warranty_month_no'], "order_no"=>$data['order_no'], "asset_quantity"=>$data['asset_quantity'], "remarks"=>$data['remarks'], "created_by"=>$data['created_by'], "created_on"=>$data['created_on']];

                    //insert data in asset details table
                    $asset_list = $this->model_asset->insert_asset_details($form);
                    $asset_details_id = JSON_DECODE(JSON_ENCODE($asset_list), true);
                    //$data["asset_list"] = $asset_list;
                    if($asset_details_id)
                    {
                        if(isset($_FILES['bill_attachment']))
                        {
                            if($_FILES['bill_attachment']['name'] != "")
                            {

                                // echo "reaching here";
                                // return;
                                $file = $_FILES['bill_attachment'];
                                $path = "asset_bill";
                                $newFileName = $asset_details_id;
                                $extensions = ['png','jpg','jpeg','pdf'];
                                $photo_status = uploader($file, $path, $newFileName, $extensions);
                                if($photo_status){
                                    // echo "rc 2";
                                    // return;
                                    $file_name = $file['name'];
                                    $tmp = explode('.', $file_name);
                                    $file_ext = strtolower(end($tmp));
                                    $attachment_path = $path."/".$newFileName.'.'.$file_ext;
                                    //update data in asset details table
                                    $asset_upload_bill = $this->model_asset->upload_bill_attachment($asset_details_id, $attachment_path);
                                    $asset_upload_bill = JSON_DECODE(JSON_ENCODE($asset_upload_bill), true);
                                }
                            }
                        }
                        flashToast("insertSuccess", "Asset Inserted Successfully");
                        echo "<script>window.location.href = '".URLROOT."/Asset/AssetList';</script>";
                    }
                 }
                 else
                 {
                   //update code
                    if($data['item_name_id']=='0')
                    {
                        //insert data in asset details table
                        $it_list = $this->model_asset->insert_item_details($data);
                        $it_list = JSON_DECODE(JSON_ENCODE($it_list), true);
                        $data["item_id"] = $it_list;
                    }
                    else
                    {
                        $data["item_id"]=$data['item_name_id'];
                    }
                    if($data['sub_item_name_id']=='0')
                    {
                        //insert data in asset details table
                        $sit_list = $this->model_asset->insert_sub_item_details($data);
                        $sit_list = JSON_DECODE(JSON_ENCODE($sit_list), true);
                        $data["sub_item_id"] = $sit_list;
                    }
                    else
                    {
                        $data["sub_item_id"]=$data['sub_item_name_id'];
                    }
                    if($data['model_no_id']=='0')
                    {
                        //insert data in asset details table
                        $modl_list = $this->model_asset->insert_model_details($data);
                        $modl_list = JSON_DECODE(JSON_ENCODE($modl_list), true);
                        $data["model_id"] = $modl_list;
                    }
                    else
                    {
                        $data["model_id"]=$data['model_no_id'];
                    }


                    $form = ["asset_type"=>$data['asset_type'], "item_name_id"=>$data['item_id'], "sub_item_name_id"=>$data['sub_item_id'], "asset_model_no_id"=>$data['model_id'],  "manufacturer_name"=>$data['manufacturer_name'], "supplier_name"=>$data['supplier_name'], "supplier_address"=>$data['supplier_address'], "supplier_contact_no"=>$data['supplier_contact_no'], "purchase_cost"=>$data['purchase_cost'], "purchase_date"=>$data['purchase_date'], "expiry_date"=>$data['expiry_date'], "warranty_month_no"=>$data['warranty_month_no'], "order_no"=>$data['order_no'], "asset_quantity"=>$data['asset_quantity'], "remarks"=>$data['remarks'], "_id"=>$data['_id']];

                    //update data in asset details table
                    $asset_list = $this->model_asset->update_asset_details($form);
                    $asset_details_id = JSON_DECODE(JSON_ENCODE($asset_list), true);
                    if($asset_details_id)
                    {
                        if(isset($_FILES['bill_attachment']))
                        {
                            if($_FILES['bill_attachment']['name'] != "")
                            {

                                $file = $_FILES['bill_attachment'];
                                $path = "asset_bill";
                                $newFileName = $data['_id'];
                                $extensions = ['png','jpg','jpeg'];
                                $photo_status = uploader($file, $path, $newFileName, $extensions);
                                if($photo_status){
                                    $file_name = $file['name'];
                                    $tmp = explode('.', $file_name);
                                    $file_ext = strtolower(end($tmp));
                                    $attachment_path = $path."/".$newFileName.'.'.$file_ext;
                                    //update data in asset details table
                                    $asset_upload_bill = $this->model_asset->upload_bill_attachment($data['_id'], $attachment_path);
                                    $asset_upload_bill = JSON_DECODE(JSON_ENCODE($asset_upload_bill), true);
                                }
                            }
                        }
                        flashToast("updateSuccess", "Asset Updated Successfully");  
                        echo "<script>window.location.href = '".URLROOT."/Asset/AssetList';</script>";
                    }
                 }

           }
            else if(isset($ID))
            {
                $result = $this->model_asset->get_AssetDetailsById($ID);
                $data = json_decode(json_encode($result),true);

                $itlist = $this->model_asset->get_itemListByAssetType($data['asset_type']);
                $itlist = json_decode(json_encode($itlist),true);
                $data["asset_item_list"] = $itlist;

                $sitlist = $this->model_asset->get_SubitemListByItemId($data['item_name_id']);
                $sitlist = json_decode(json_encode($sitlist),true);
                $data["asset_sub_item_list"] = $sitlist;

                $mdlist = $this->model_asset->get_ModelListBySubItemId($data['sub_item_name_id']);
                $mdlist = json_decode(json_encode($mdlist),true);
                $data["asset_model_list"] = $mdlist;
                // echo "<pre>";
                // print_r($data);
                // return;
                $this->view('pages/asset_add_update',$data);
            }
           else
            {
                $this->view('pages/asset_add_update',$data);
            }

        }

        public function AssetModelDetails($ID=null)
        {
           $data = (array)null;
           $data["_id"] = $ID;

           //asset model list
		   $assetmodelList = $this->model_asset->get_AssetDetailsById($data["_id"]);
		   $assetmodelList = JSON_DECODE(JSON_ENCODE($assetmodelList), true);
		   $data["assetmodelList"] = $assetmodelList;

           //asset model list
		   $assetmodList = $this->model_asset->get_AssetModDetailsById($data["_id"]);
		   $assetmodList = JSON_DECODE(JSON_ENCODE($assetmodList), true);
		   $data["assetmodList"] = $assetmodList;
           //employee list
		   /*$assignedempList = $this->model_asset->get_EmployeeList();
		   $assignedempList = JSON_DECODE(JSON_ENCODE($assignedempList), true);
		   $data["assignedempList"] = $assignedempList;*/
           //print_r($data["assetmodList"]);

           $this->view('pages/asset_model_details',$data);
        }

        public function GenerateBarcodeAsset($ID=null)
        {
           $data = (array)null;
           $data["_id"] = $ID;

           if(isPost()){
              $data= postData();
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = dateTime();

              if(isset($data['asset_quantity_length']))
	          {
                  $quantity_length=$data['asset_quantity_length'];
                  for($l=0;$l<$quantity_length;$l++)
			      {
                      $asset_model_detail_id=$_POST["asset_model_detail_id"][$l];
                      $serial_no = $data['serial_no'][$l];
                      //$assigned_employee = $data['assigned_employee'][$l];
                      $asset_status = $data['asset_status'][$l];
                      $form = ["asset_details_id"=>$data["_id"], "asset_serial_no"=>$serial_no,  "asset_status"=>$asset_status, "created_by"=>$data['created_by'], "created_on"=>$data['created_on'], "asset_type_id"=>$data['asset_type_id'], "item_name_id"=>$data['item_name_id'], "sub_item_name_id"=>$data['sub_item_name_id'],  "asset_model_no_id"=>$data['asset_model_no_id'], "asset_quantity_length"=>$data['asset_quantity_length'], "asset_model_detail_id"=>$asset_model_detail_id];

                      if($asset_status!='')
                      {

                          if($asset_model_detail_id!='')
                          {
                              $asset_model_updt_list = $this->model_asset->update_asset_model_details($form);
                              $asset_model_updt_list = JSON_DECODE(JSON_ENCODE($asset_model_updt_list), true);
                          }
                          else if($asset_model_detail_id=='')
                          {
                              $asset_model_list = $this->model_asset->insert_asset_model_details($form);
                              $asset_model_last_id = JSON_DECODE(JSON_ENCODE($asset_model_list), true);
                              if($asset_model_last_id)
                              {
                                  if($data['asset_type_id']=='Hardware')
                                  {
                                      $asset_barcode_no='CODE-'.$asset_model_last_id;
                                  }
                                  else
                                  {

                                      $asset_barcode_no='';
                                  }
                                  $asset_model_barcode_list = $this->model_asset->generate_barcode_no($asset_model_last_id, $asset_barcode_no);
                                  $asset_model_barcode_list = JSON_DECODE(JSON_ENCODE($asset_model_barcode_list), true);
                              }
                          }
                      }

                  }
               }
               redirect('Asset/AssetModelDetails/'.$data["_id"]);

           }
        }

		public function Assign_Assets()
        {
           $data = (array)null;

           //employee list
		   $assignedempList = $this->model_asset->get_EmployeeList();
		   $assignedempList = JSON_DECODE(JSON_ENCODE($assignedempList), true);

		   if(isPost()){
              $data= postData();
               
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = $data['created_date']." ".$data['created_time'].":00";
              
			  $data["assignedempList"] = $assignedempList;
            //   echo '<pre>';
            //   print_r($data);
            //   return;
			if(isset($data['model_no_id']))
	          {
				$data_exists = $this->model_asset->asset_assign_exists($data);
				$data_exists = json_decode(json_encode($data_exists),true);
				if($data_exists)
				{
					flashToast("assignExist","Asset Exists");
					$this->view('pages/assign_assets',$data);
				}
				else
				{
					$asset_assgn_list = $this->model_asset->insert_asset_assign_details($data);
                    $asset_assgn_list = JSON_DECODE(JSON_ENCODE($asset_assgn_list), true);
                    flashToast("assignSuccess","Asset Assigned Successfully");
					redirect('Asset/AssetAssignedList/');
				}

               }

            }
		    else
		    {
               
			   $data["assignedempList"] = $assignedempList;
			   $this->view('pages/assign_assets',$data);
		    }
        }
		public function AssetAssignedList(){
            $data = (array)null;
           if(isPost())
            {
                $data = postData();

                $assetassgList = $this->model_asset->get_AssetAssignedList($data);
				$assetassgList = JSON_DECODE(JSON_ENCODE($assetassgList), true);
				$data["assetassgList"] = $assetassgList;
				//print_r($data["assetassgList"]);
				foreach($data["assetassgList"] as $key=>$value)
				{
					$assetassg_to_List = $this->model_asset->get_asset_assigned_to_List($value["assigned_employee_id"]);
					if($assetassg_to_List['middle_name']=="")
					{
						$data["assetassgList"][$key]['assigned_emp_name'] = $assetassg_to_List['first_name'].' '.$assetassg_to_List['last_name'];
					}
					else
					{
						$data["assetassgList"][$key]['assigned_emp_name'] = $assetassg_to_List['first_name'].' '.$assetassg_to_List['middle_name'].' '.$assetassg_to_List['last_name'];
					}
				}
				foreach($data["assetassgList"] as $key=>$value)
				{
					$assetassg_by_List = $this->model_asset->get_asset_assigned_by_List($value["created_by"]);
					if($assetassg_by_List['middle_name']=="")
					{
						$data["assetassgList"][$key]['assigned_by'] = $assetassg_by_List['first_name'].' '.$assetassg_by_List['last_name'];
					}
					else
					{
						$data["assetassgList"][$key]['assigned_by'] = $assetassg_by_List['first_name'].' '.$assetassg_by_List['middle_name'].' '.$assetassg_by_List['last_name'];
					}
				}

                $this->view('pages/asset_assigned_list', $data);
            }
            else
            {
                $data['from_date']=date('Y-m-d');
                $data['to_date']=date('Y-m-d');
                $assetassgList = $this->model_asset->get_AssetAssignedList($data);
		    $assetassgList = JSON_DECODE(JSON_ENCODE($assetassgList), true);
			$data["assetassgList"] = $assetassgList;
			//print_r($data["assetassgList"]);
			foreach($data["assetassgList"] as $key=>$value)
			{
				$assetassg_to_List = $this->model_asset->get_asset_assigned_to_List($value["assigned_employee_id"]);
				if($assetassg_to_List['middle_name']=="")
				{
					$data["assetassgList"][$key]['assigned_emp_name'] = $assetassg_to_List['first_name'].' '.$assetassg_to_List['last_name'];
				}
				else
				{
					$data["assetassgList"][$key]['assigned_emp_name'] = $assetassg_to_List['first_name'].' '.$assetassg_to_List['middle_name'].' '.$assetassg_to_List['last_name'];
				}
			}
			foreach($data["assetassgList"] as $key=>$value)
			{
				$assetassg_by_List = $this->model_asset->get_asset_assigned_by_List($value["created_by"]);
				if($assetassg_by_List['middle_name']=="")
				{
					$data["assetassgList"][$key]['assigned_by'] = $assetassg_by_List['first_name'].' '.$assetassg_by_List['last_name'];
				}
				else
				{
					$data["assetassgList"][$key]['assigned_by'] = $assetassg_by_List['first_name'].' '.$assetassg_by_List['middle_name'].' '.$assetassg_by_List['last_name'];
				}
			}
                $this->view('pages/asset_assigned_list', $data);
            }

      }
		
		

        public function AssetRepList($ID=null,$MD=null)
        {
           $data = (array)null;
           $data["_id"] = $ID;
             $data["model_id"] = $MD;
            //print_r($data["model_id"]);

           //asset model list
		   $assetmodelList = $this->model_asset->get_AssetDetailsById($data["_id"]);
		   $assetmodelList = JSON_DECODE(JSON_ENCODE($assetmodelList), true);
		   $data["assetmodelList"] = $assetmodelList;

          $assetmodelrepList = $this->model_asset->get_AssetRepDetailsById($data["_id"],$data["model_id"]);
		   $assetmodelrepList = JSON_DECODE(JSON_ENCODE($assetmodelrepList), true);
		   $data["assetmodelrepList"] = $assetmodelrepList;

           $this->view('pages/asset_model_rep_details',$data);
        }

        public function AssetModelRepairingChrg($ID=null, $MD=null)
        {
           $data = (array)null;
           $data["_id"] = $ID;
           $data["model_id"] = $MD;

           if(isPost()){
              $data= postData();
              $data['created_by'] = $_SESSION['emp_details']['_id'];
              $data['created_on'] = dateTime();

              if(isset($data['model_id']))
	          {

                  $asset_rep_inst_list = $this->model_asset->insert_asset_rep_details($data);
                  $asset_rep_inst_list = JSON_DECODE(JSON_ENCODE($asset_rep_inst_list), true);
               }
               redirect('Asset/AssetRepList/'.$data["_id"].'/'.$data["model_id"]);

           //$this->view('pages/asset_model_details',$data);
           }
        }
		
		public function ajaxItemNameByAssetType(){
          if(isPost()){
              $data = postData();
              if(isset($data['asset_type'])){
                $result = $this->model_asset->get_itemListByAssetType($data['asset_type']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['item_name']."</option>";
                    }
                    
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

      public function ajaxSubItemNameByItemId(){
          if(isPost()){
              $data = postData();
              if(isset($data['item_name_id'])){
                $result = $this->model_asset->get_SubitemListByItemId($data['item_name_id']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['sub_item_name']."</option>";
                    }
                    
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'item name  field is required'];
              }
              echo json_encode($response);
          }
      }
      public function ajaxModelNameBySubItemId(){
          if(isPost()){
              $data = postData();
              if(isset($data['sub_item_name_id'])){
                $result = $this->model_asset->get_ModelListBySubItemId($data['sub_item_name_id']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['model_no']."</option>";
                    }
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'sub item name field is required'];
              }
              echo json_encode($response);
          }
      }
	  public function ajaxSerialNoByModelNoId(){
          if(isPost()){
              $data = postData();
              if(isset($data['model_no_id'])){
                $result = $this->model_asset->get_SerialnoListByModelNoId($data['item_name_id'], $data['sub_item_name_id'], $data['model_no_id']);
                if($result){
                    $result = json_decode(json_encode($result), true);
                    $option = "";
                    $option .= "<option value=''>Select</option>";
                    foreach ($result as $value) {
                        $option .= "<option value='".$value['_id']."'>".$value['asset_barcode_no']."</option>";
                    }
                    $response = ['response'=>true, 'data'=>$option];
                    //$response = ["response"=>true, "data"=>$asset_type_list];
                }else{
                    $response = ["response"=>false];
                }
              }else{
                $response = ["response"=>false, "data"=>'sub item name field is required'];
              }
              echo json_encode($response);
          }
      }
       public function ajaxGetQuantity(){ //Get Assets Quantity
          if(isPost()){
              $data = postData();
              $result = $this->model_asset->ajaxGetQuantity($data);
                if($result){
                    $response = ['response'=>true, 'data'=>$result];
                }else{
                    $response = ["response"=>false];
                }
              echo json_encode($response);
           
          }
      }

      public function asset_delete($ID=null, $tbdqt){
        if (isset($ID)){
            $data = (array)null;
            $data["_id"] = $ID;
            $tbdqt;

            $asset_id_arr = $this->model_asset->getAssetId($data); 
            // echo '<pre>';
            // print_r($asset_id_arr);return;
            $asset_id = $asset_id_arr['item_name_id'];

            // $asset_id = $asset_id_arr;
            $itemSum = $this->model_asset->getAssetQtySum($asset_id);
            $assignedSum = $this->model_asset->getAssignedQtySum($asset_id);
            // $asset_id = $this->model_asset->getAssetId($data);
            $getToBeDeletedQt = $this->model_asset->getAssignedQtySum($asset_id);
            $itemsum = $itemSum['total'];
            $itemAssigned = $assignedSum['total'];
            if($itemsum >= $itemAssigned){
                if(($itemsum-$itemAssigned) >=$tbdqt){
                    $this->model_asset->deleteData($data);

                    flashToast("msgSuccess", "Asset Deleted Successfully");

                }else{
                    flashToast("msgDanger", "Stock Already Assigned!!");
                }
                
                // $msg = $this->model_asset->deleteData($data);
            }else{
                // $this->AssetList();
            }
            
        }
        
        // return $msg;
        redirect('Asset/AssetList/');
        // $this->AssetList();
    }
  }

?>