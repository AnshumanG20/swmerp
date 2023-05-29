<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Asset Management</a></li>
					<li class="active">Add/Update Asset Details</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-md-12">
					        <div class="panel panel-info">
					            <div class="panel-heading">
					                <h3 class="panel-title"><?=(isset($data["_id"]))?"Edit":"Add";?> Asset Details</h3>
					            </div>

					                <div class="panel-body">
                                      <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/Asset/AssetList"><button id="demo-foo-collapse" class="btn btn-purple">View List<i class="fa fa-arrow-right"></i></button></a>
                                      </div>
                                        <!--Horizontal Form-->
					                     <!--===================================================-->
                                        <?php
                                        //print_r($data);
                                        ?>
					                 <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Asset/asset_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>" enctype="multipart/form-data">
                                        <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Asset Type <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="asset_type" id="asset_type">
                                                    <option value="">Select</option>
                                                    <option value="Software" <?=(isset($data['asset_type']))?($data['asset_type']=="Software")?"selected":"":"";?>>Software</option>
                                                    <option value="Hardware" <?=(isset($data['asset_type']))?($data['asset_type']=="Hardware")?"selected":"":"";?>>Hardware</option>
													<option value="Others" <?=(isset($data['asset_type']))?($data['asset_type']=="Others")?"selected":"":"";?>>Others</option>
                                                </select>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Item Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="item_name_id" id="item_name_id">
                                                    <option value="">Select</option>
                                                    <?php
                                                     if(isset($data['asset_item_list'])){
                                                    foreach($data['asset_item_list'] as $values){
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['item_name_id']))?($data['item_name_id']==$values['_id'])?"selected":"":"";?>><?=$values['item_name'];?></option>
                                                <?php
                                                    }
                                                    ?>
                                                    <option value="0">Other</option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label other_item_toggle" for="other_item_name">Other Item Name<span class="text-danger">*</span></label>
                                            <div class="col-sm-4 other_item_toggle">
                                                <input type="text" placeholder="Other Item Name" id="other_item_name" name="other_item_name" class="form-control" value="<?=(isset($data['other_item_name']))?$data['other_item_name']:"";?>" onkeypress="return isAlpha(event);" />
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label " for="grade">Sub Item Name <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="sub_item_name_id" id="sub_item_name_id">
                                                    <option value="">Select</option>
                                                    <?php
                                                     if(isset($data['asset_sub_item_list'])){
                                                    foreach($data['asset_sub_item_list'] as $values){
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['sub_item_name_id']))?($data['sub_item_name_id']==$values['_id'])?"selected":"":"";?>><?=$values['sub_item_name'];?></option>
                                                <?php
                                                    }
                                                    ?>
                                                    <option value="0">Other</option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                            <label class="col-sm-2 control-label other_sub_item_toggle" for="other_item_name">Other Sub Item Name<span class="text-danger">*</span></label>
                                            <div class="col-sm-4 other_sub_item_toggle">
                                                <input type="text" placeholder="Other Sub Item Name" id="other_sub_item_name" name="other_sub_item_name" class="form-control" value="<?=(isset($data['other_sub_item_name']))?$data['other_sub_item_name']:"";?>" onkeypress="return isAlpha(event);" />
                                            </div>
                                    </div>
                                    <div class="row orther_details">
                                        <div class="form-group">
                                            <div class="col-sm-12" style="color:red; text-align:left">
                                              <p><u>Sub Item Details</u></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row other_data">
                                    <div class="form-group">
                                            <div class="col-sm-12">
                                             <div class="table-responsive">
                                                 <table class="table table-striped table-bordered">
                                                    <thead>
                                                         <tr>
                                                            <!-- <th>Other Sub Item Name</th> -->
                                                            <th>Selling Rate</th>
                                                            <th>CGST Tax</th>
                                                            <th>SGST Tax</th>
                                                            <th>IGST Tax</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                           <!--  <td>
                                                                <input type="text" maxlength="70" style=" border: none;" id="other" name="other" class="form-control" value="<?=(isset($data['other']))?$data['other']:"";?>" onkeypress="return isAlpha(event);" />
                                                            </td> -->
                                                            <td>
                                                                <input type="text" maxlength="10" style=" border: none;" id="selling_rate" name="selling_rate" class="form-control" value="<?=(isset($data['selling_rate']))?$data['selling_rate']:"";?>" onkeypress="return isDecNum(this, event);" />
                                                            </td>
                                                            <td>
                                                                <input type="text" maxlength="4" style=" border: none;" id="cgst_tax" name="cgst_tax" class="form-control" value="<?=(isset($data['cgst_tax']))?$data['cgst_tax']:"";?>" onkeypress="return isDecNum(this, event);" />
                                                            </td>
                                                             <td>
                                                                <input type="text" maxlength="4" style=" border: none;" id="sgst_tax" name="sgst_tax" class="form-control" value="<?=(isset($data['sgst_tax']))?$data['sgst_tax']:"";?>" onkeypress="return isDecNum(this, event);" />
                                                            </td>
                                                             <td>
                                                                <input type="text" maxlength="4" style=" border: none;" id="igst_tax" name="igst_tax" class="form-control" value="<?=(isset($data['igst_tax']))?$data['igst_tax']:"";?>" onkeypress="return isDecNum(this, event);" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Model No. <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="model_no_id" id="model_no_id">
                                                    <option value="">Select</option>
                                                    <?php
                                                     if(isset($data['asset_model_list'])){
                                                    foreach($data['asset_model_list'] as $values){
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['asset_model_no_id']))?($data['asset_model_no_id']==$values['_id'])?"selected":"":"";?>><?=$values['model_no'];?></option>
                                                <?php
                                                    }
                                                    ?>
                                                    <option value="0">Other</option>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                             <label class="col-sm-2 control-label other_model_no_toggle" for="grade">Other Model No. <span class="text-danger">*</span></label>
                                            <div class="col-sm-4 other_model_no_toggle">
                                                <input type="text" id="other_model_no" name="other_model_no" class="form-control" value=""  />
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Manufacturer Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="manufacturer_name" name="manufacturer_name" class="form-control" value="<?=(isset($data['manufacturer_name']))?$data['manufacturer_name']:"";?>" onkeypress="return isAlpha(event);" />
                                            </div>
                                             <label class="col-sm-2 control-label" for="grade">Supplier Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="supplier_name" name="supplier_name" class="form-control" value="<?=(isset($data['supplier_name']))?$data['supplier_name']:"";?>" onkeypress="return isAlpha(event);"  />
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Supplier Contact  Address</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="supplier_address" name="supplier_address" class="form-control" value="<?=(isset($data['supplier_address']))?$data['supplier_address']:"";?>"  />
                                            </div>
                                             <label class="col-sm-2 control-label" for="grade">Supplier Contact No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="supplier_contact_no" name="supplier_contact_no" class="form-control" value="<?=(isset($data['supplier_contact_no']))?$data['supplier_contact_no']:"";?>" maxlength="10" onkeypress="return isNum(event);"  />
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Purchase cost</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="purchase_cost" name="purchase_cost" class="form-control" value="<?=(isset($data['purchase_cost']))?$data['purchase_cost']:"";?>" onkeypress="return isNum(event);" maxlength="7" />
                                            </div>
                                             <label class="col-sm-2 control-label" for="grade">Purchase Date</label>
                                            <div class="col-sm-4">
                                                 <input type="text" id="purchase_date" name="purchase_date" value="<?=(isset($data['purchase_date']))?$data['purchase_date']:"";?>" class="form-control mask_date" placeholder="Click Here To Select Purchase Date" readonly />
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label class="col-sm-2 control-label" for="grade">Expiry Date</label>
                                            <div class="col-sm-4">
                                                 <input type="text" id="expiry_date" name="expiry_date" value="<?=(isset($data['expiry_date']))?$data['expiry_date']:"";?>" class="form-control mask_date" placeholder="Click Here To Select Expiry Date" readonly />
                                             </div>
                                            <label class="col-sm-2 control-label" for="grade">Warranty months</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="warranty_month_no" name="warranty_month_no" class="form-control" value="<?=(isset($data['warranty_month_no']))?$data['warranty_month_no']:"";?>" onkeypress="return isNum(event);"  />
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Order No.</label>
                                            <div class="col-sm-4">
                                                <input type="text" id="order_no" name="order_no" class="form-control" value="<?=(isset($data['order_no']))?$data['order_no']:"";?>"  />
                                            </div>
                                             <label class="col-sm-2 control-label" for="grade">Quantity(in pcs) <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="asset_quantity" name="asset_quantity" class="form-control" value="<?=(isset($data['asset_quantity']))?$data['asset_quantity']:"";?>" onkeypress="return isNum(event);" maxlength="6"  />
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Upload Bill</label>
                                            <div class="col-sm-4">
                                                <input type="file" id="bill_attachment" name="bill_attachment" class="form-control" value="<?= isset($data['bill_attachment'])? URLROOT."/uploads/".$data['bill_attachment']:''  ?>" />
                                                <div class="div_photo_path_preview" style="width:100%; text-align:center;">
                                               
                                               <a href="<?= isset($data['bill_attachment'])? URLROOT."/uploads/".$data['bill_attachment']:'' ?>">
                                               <img id="photo_path_preview" src="<?= isset($data['bill_attachment'])? URLROOT."/uploads/".$data['bill_attachment']:'' ?>" alt="" style="height:150px;border:0.5px solid gray"/>
                                               </a>
                                            </div>
                                            </div>
                                            
                                     
                                            
                                      
                                   
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Remarks <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <textarea type="text" id="remarks" name="remarks" class="form-control" ><?=(isset($data['remarks']))?$data['remarks']:"";?></textarea>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">&nbsp;</label>
                                            <div class="col-sm-4">
                                                <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-danger" value="<?=(isset($data["_id"]))?"Edit Asset":"Add Asset";?>"/>
                                            </div>
                                         </div>

                                        <div class="row">
		                                  <div class="col-md-12" style="color: red; text-align: center;">
		                                      <?php
		                                          if(isset($error))
                                                  {
		                                              foreach ($error as $value)
                                                      {
		                                                 echo $value;
		                                                 echo "<br />";
		                                               }
		                                            }
		                                       ?>
		                                     </div>
		                                </div>
                                     </form>
                                </div>

					            <!--===================================================-->
					            <!--End Horizontal Form-->

					        </div>
					    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>

<script type="text/javascript">
    $('#purchase_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#expiry_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
        autoclose:true,
        autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
        }); 


$(document).ready(function(){
    $(".other_item_toggle").hide();
    $(".other_sub_item_toggle").hide();
    $(".other_model_no_toggle").hide();
    $(".orther_details").hide();
    $(".other_data").hide();
    $("#asset_type").change(function(){
		$(".other_item_toggle").hide();
        $(".other_sub_item_toggle").hide();
        $(".other_model_no_toggle").hide();
        var asset_type = $("#asset_type").val();
		$('#sub_item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
		$('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        if(asset_type==""){
            alert("Please Select Asset Type");
            $('#item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
            $('#sub_item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
            $('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        }else{

            $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxItemListByAssetType",
                dataType: "json",
                data: {"asset_type":asset_type},
                beforeSend: function() {

                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
					if(data.response==true){
                        $("#item_name_id").html(data.data);
                    }
                    else{
                        $('#item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
						

                    }
                }
            });
        }
    });
    $("#item_name_id").change(function(){
        var item_name_id = $("#item_name_id").val();
		$('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        if(item_name_id==""){
            alert("Please Select Item Name");
            $(".other_item_toggle").hide();
            $('#sub_item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
            $('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        }
        else if(item_name_id=="0"){
             $(".other_item_toggle").show();
            $('#sub_item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
        }
        else{
                $(".other_item_toggle").hide();
            $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxSubItemListByItemId",
                dataType: "json",
                data: {"item_name_id":item_name_id},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#sub_item_name_id").html(data.data);
                    }
                    else{
                        $('#sub_item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
                    }
                }
            });
        }
    });

    $("#sub_item_name_id").change(function(){
        var sub_item_name_id = $("#sub_item_name_id").val();
        if(sub_item_name_id==""){
            alert("Please Select Sub Item Name");
            $(".other_sub_item_toggle").hide();
            $('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        }
        else if(sub_item_name_id=="0"){
             $(".other_sub_item_toggle").show();
            $('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        }
        else{
                $(".other_sub_item_toggle").hide();
            $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxModelListBySubItemId",
                dataType: "json",
                data: {"sub_item_name_id":sub_item_name_id},
                beforeSend: function() {

                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#model_no_id").html(data.data);
                    }
                    else{
                        $('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');

                    }
                }
            });
        }
    });
     $("#model_no_id").change(function(){
        var model_no_id = $("#model_no_id").val();
        if(model_no_id==""){
            alert("Please Select Model No.");
            $(".other_model_no_toggle").hide();
        }
        else if(model_no_id=="0"){
             $(".other_model_no_toggle").show();
        }
        else{
                $(".other_model_no_toggle").hide();
        }
    });

    $('#bill_attachment').change(function(){
            let file_type = $('#bill_attachment').val()
            let extension = file_type.split('.').pop();
            if(extension=='pdf'){
                alert('only image file can be uploaded (ex: jpg,jpeg,png')
            $('#bill_attachment').val('')
            }
            return
    })
           
        $("#btn_submit").click(function(){

            var asset_type = $("#asset_type").val();
            var item_name_id = $("#item_name_id").val();
            var other_item_name = $("#other_item_name").val();
            var sub_item_name_id = $("#sub_item_name_id").val();
            var other_sub_item_name = $("#other_sub_item_name").val();
            var asset_quantity = $("#asset_quantity").val();
			var remarks = $("#remarks").val();
            var model_no_id = $("#model_no_id").val();
            var other_model_no = $("#other_model_no").val();
            var supplier_contact_no = $("#supplier_contact_no").val();

            if(asset_type=="")
			{
				alert("Please Select Asset Type");
				$('#asset_type').focus();
				return false;
			}

			if(item_name_id=="")
			{
				alert("Please Select Item Name");
				$('#item_name_id').focus();
				return false;
			}

            if(item_name_id=="0")
			{
				if(other_item_name=="")
                {
                    alert("Please Enter Item Name");
                    $('#other_item_name').focus();
                    return false;
                }
			}

			if(sub_item_name_id=="")
			{
				alert("Please Select Sub Item Name");
				$('#sub_item_name_id').focus();
				return false;
			}

            if(sub_item_name_id=="0")
			{
				if(other_sub_item_name=="")
                {
                    alert("Please Enter Sub Item Name");
                    $('#other_sub_item_name').focus();
                    return false;
                }
			}
			
			if(model_no_id=="")
			{
				alert("Please Select Model No.");
				$('#model_no_id').focus();
				return false;
			}

            if(model_no_id=="0")
			{
				if(other_model_no=="")
                {
                    alert("Please Enter Model No.");
                    $('#other_model_no').focus();
                    return false;
                }
			}
            
            if(supplier_contact_no!="")
			{
                if(supplier_contact_no.length < 10) {
				alert("Input Contact No.");
				$('#supplier_contact_no').focus();
				return false;
                }
			}

            if(asset_quantity=="")
			{
				alert("Please Enter Asset Quantity!!");
				$('#asset_quantity').focus();
				return false;
			}

			if(remarks=="")
			{
				alert("Please Enter Remarks");
				$('#remarks').focus();
				return false;
			}
            var sub_item_name_id = $('#sub_item_name_id').val();
            if(sub_item_name_id==0)
            {
                /*var other = $("#other").val();
                    other = other.trim();
                if(other=="")
                {
                    alert("Please Enter Other Item Name!!");
                    $("#other").css({"border-color":"red"});
                    $('#other').focus();
                    return false;
                }*/
                var selling_rate = $('#selling_rate').val();
                if(selling_rate=="")
                {
                    alert("Please Enter Selling Rate!!");
                    $("#selling_rate").css({"border-color":"red"});
                    $('#selling_rate').focus();
                    return false;
                }
                var cgst_tax = $('#cgst_tax').val();
                if(cgst_tax=="")
                {
                    alert("Please Enter CGST Tax!!");
                    $("#cgst_tax").css({"border-color":"red"});
                    $('#cgst_tax').focus();
                    return false;
                }
                cgst_tax = parseFloat(cgst_tax);
                if(cgst_tax > 100)
                {
                    alert("Invalid CGST Tax!!");
                    $("#cgst_tax").css({"border-color":"red"});
                    $('#cgst_tax').focus();
                    return false;
                }
                var sgst_tax = $('#sgst_tax').val();
                if(sgst_tax=="")
                {
                    alert("Please Enter SGST Tax!!");
                    $("#sgst_tax").css({"border-color":"red"});
                    $('#sgst_tax').focus();
                    return false;
                }
                sgst_tax = parseFloat(sgst_tax);
                if(sgst_tax > 100)
                {
                    alert("Invalid SGST Tax!!");
                    $("#sgst_tax").css({"border-color":"red"});
                    $('#sgst_tax').focus();
                    return false;
                }
                var igst_tax = $('#igst_tax').val();
                if(igst_tax=="")
                {
                    alert("Please Enter IGST Tax!!");
                    $("#igst_tax").css({"border-color":"red"});
                    $('#igst_tax').focus();
                    return false;
                }
                igst_tax = parseFloat(igst_tax);
                if(igst_tax > 100)
                {
                    alert("Invalid IGST Tax!!");
                    $("#igst_tax").css({"border-color":"red"});
                    $('#igst_tax').focus();
                    return false;   
                }
            }

		 });
        /*$("#other").keyup(function(){$(this).css('border-color','');});*/
        $("#selling_rate").keyup(function(){$(this).css('border-color','');});
        $("#cgst_tax").keyup(function(){$(this).css('border-color','');});
        $("#sgst_tax").keyup(function(){$(this).css('border-color','');});
        $("#igst_tax").keyup(function(){$(this).css('border-color','');});
        $('#sub_item_name_id').change(function(){
            var sub_item_name_id = $('#sub_item_name_id').val();
            if(sub_item_name_id==0)
            {
                $('.orther_details').show();
                $('.other_data').show();
            }
            else
            {
                $('.other_data').hide();
                $('.orther_details').hide();
            }

        });
        $('#sub_item_name_id').change(function(){
            var sub_item_name_id = $('#sub_item_name_id').val();
            if(sub_item_name_id==0)
            {
                $('.orther_details').show();
                $('.other_data').show();
            }
            else
            {
                $('.other_data').hide();
                $('.orther_details').hide();
            }

        });

});
function isDecNum(txt, evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
                return true;
            } else {
                return false;
            }
        } else {
            if (charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
        }
        return true;
    }
</script>