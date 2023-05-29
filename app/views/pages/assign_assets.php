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
					<li class="active">Assign Asset </li>
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
					                <h3 class="panel-title">Assign Asset</h3>
                                   
					            </div>

					                <div class="panel-body">
                                      <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/Asset/AssetAssignedList"><button id="demo-foo-collapse" class="btn btn-purple">View List<i class="fa fa-arrow-right"></i></button></a>
                                      </div>
                                        <!--Horizontal Form-->
					                     <!--===================================================-->
                                       
                                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Asset/Assign_Assets/">

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
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                         </div>
                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Sub Item Name <span class="text-danger">*</span></label>
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
                                                    <?php
                                                }
                                                ?>
                                                </select>
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

                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                         </div>
										 <!-- <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Serial No. <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="serial_no" id="serial_no">
                                                    <option value="">Select</option>

                                                </select>
                                            </div>
                                         </div> -->
										  <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Assigned To <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="assigned_to" id="assigned_to">
                                                    <option value="">Select</option>
                                                    <?php
                                                     if(isset($data['assignedempList'])){
                                                    foreach($data['assignedempList'] as $values){
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['assigned_to']))?($data['assigned_to']==$values['_id'])?"selected":"":"";?>><?=$values['first_name'].' '.$values['middle_name'].' '.$values['last_name'];?>(<?=$values['employee_code']?>)</option>
                                                <?php
                                                    }
                                                    ?>
                                                    <?php
                                                }
                                                ?>
                                                </select>
                                            </div>
                                         </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Quantity(in pcs) <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="asset_quantity" name="asset_quantity" class="form-control" value="1" onkeypress="return isNum(event);" maxlength="6"  />
                                            </div>
                                            <label class="col-sm-2 control-label" for="available_quantity">Available Quantity(in pcs) <span class="text-danger">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="available_quantity" name="available_quantity" class="form-control" onkeypress="return isNum(event);" value="" maxlength="6" readonly />
                                            </div>
                                        </div>

                                        <!-- /////////////////////////////////////////////// -->
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Assigned Date<span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-4">
                                                <input type="date" id="created_date" name="created_date" class="form-control" max ="" onfocus="maxfunc()"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">Time of Assignment<span class="text-danger">*</span></label>
                                            
                                            <div class="col-sm-4">
                                                <input type="time" id="created_time" name="created_time" class="form-control" min="09:00" max="18:00"/><small>office hour is between 9am to 6pm</small>
                                            </div>
                                        </div>
                                        <!-- /////////////////////////////////////////////// -->


                                         <div class="form-group">
                                            <label class="col-sm-2 control-label" for="grade">&nbsp;</label>
                                            <div class="col-sm-4">
                                                <input type="submit" name="btn_submit" id="btn_submit" class="btn btn-danger" value="Assign Asset"/>
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


const fetch_ap = ()=>{
    $.ajax({

type:"POST",
url: "<?=URLROOT;?>/Asset/ajaxGetQuantity",
dataType: "json",
beforeSend: function() {

  console.log('working 1')
},
success:function(data){
   
    if(data.response==true){
        $("#api_res").html(data.data);
    }
    else{
       
        $("#api_res").html("no data");

    }
}
});
}
    
$(document).ready(function(){


    
    
    $("#asset_type").change(function(){
		var asset_type = $("#asset_type").val();
		$('#sub_item_name_id').html('<option value="">Select</option>');
		$('#model_no_id').html('<option value="">Select</option>');
        if(asset_type==""){
            alert("Please Select Asset Type");
            $('#item_name_id').html('<option value="">Select</option>');
            $('#sub_item_name_id').html('<option value="">Select</option>');
            $('#model_no_id').html('<option value="">Select</option>');
        }else{

            $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxItemNameByAssetType",
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
                        $('#item_name_id').html('<option value="">Select</option>');
						

                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#loadingDiv").hide();
                }
            });
        }
    });

    $("#item_name_id").change(function(){
        var item_name_id = $("#item_name_id").val();
		$('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        if(item_name_id==""){
            //alert("Please Select Item Name");
            $(".other_item_toggle").hide();
            $('#sub_item_name_id').html('<option value="">Select</option><option value="0">Other</option>');
            $('#model_no_id').html('<option value="">Select</option><option value="0">Other</option>');
        }
        else{
                $(".other_item_toggle").hide();
            $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxSubItemNameByItemId",
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
                        $('#sub_item_name_id').html('<option value="">Select</option>');
                    }
                }
            });
        }
    });
    $("#sub_item_name_id").change(function(){
        var sub_item_name_id = $("#sub_item_name_id").val();
        if(sub_item_name_id==""){
            //alert("Please Select Sub Item Name");
            $('#model_no_id').html('<option value="">Select</option>');
        }
        else{
               
            $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxModelNameBySubItemId",
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
                        $('#model_no_id').html('<option value="">Select</option>');

                    }
                }
            });
        }
    });
     $("#model_no_id").change(function(){
        var item_name_id = $("#item_name_id").val();
        var sub_item_name_id = $("#sub_item_name_id").val();
        var model_no_id = $("#model_no_id").val();
        if(model_no_id==""){
            //alert("Please Select Model No.");
         
        }
        else{
                $.ajax({

                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxSerialNoByModelNoId",
                dataType: "json",
                data: {"item_name_id":item_name_id, "sub_item_name_id":sub_item_name_id, "model_no_id":model_no_id},
                beforeSend: function() {

                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#serial_no").html(data.data);
						
                    }
                    else{
                        $('#serial_no').html('<option value="">Select</option>');

                    }
                }
            });
        }
    });
     //For Assets Quantity  
     $("#sub_item_name_id").change(function(){
        var item_name_id = $("#item_name_id").val();
        var sub_item_name_id = $("#sub_item_name_id").val();
        var asset_type = $("#asset_type").val();
        console.log(item_name_id," ",sub_item_name_id," ",asset_type)
        // return;
        if(item_name_id=="" || sub_item_name_id=="" || asset_type==""){
            //alert("Please Select Model No.");
         
        }
        else{
                $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/Asset/ajaxGetQuantity",
                dataType: "json",
                data: {
                        item_name_id:item_name_id,
                        sub_item_name_id:sub_item_name_id, 
                        asset_type:asset_type
                    },
                success:function(data){
                    console.log('got the data',data);
                    if(data.response==true){
                        $("#available_quantity").val(data.data);
                        console.log('got the data');
                        // total_purchase = parseInt(data.data)
                        // total_assign = 
                        // $("#available_quantity").val(200);
                        
                    }
                    else{
                        $('#available_quantity').val(0);
                        console.log('no success');
                    }
                }
            });
        }
    });
	$("#serial_no").change(function(){
        var serial_no = $("#serial_no").val();
        var asset_quantity = $("#asset_quantity").val();
		if(serial_no==""){
            $("#asset_quantity").prop("readonly", false);
			$("#asset_quantity").val('1');
            
        }
        else{
            $("#asset_quantity").prop("readonly", true);    
            $("#asset_quantity").val('1');    
        }
    });
        $("#btn_submit").click(function(){
            var asset_type = $("#asset_type").val();
            var item_name_id = $("#item_name_id").val();
            var sub_item_name_id = $("#sub_item_name_id").val();
			var model_no_id = $("#model_no_id").val();
			var serial_no = $("#serial_no").val();
			var assigned_to = $("#assigned_to").val();
			var asset_quantity = $("#asset_quantity").val();
            var available_quantity = $('#available_quantity').val();
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

            
			if(sub_item_name_id=="")
			{
				alert("Please Select Sub Item Name");
				$('#sub_item_name_id').focus();
				return false;
			}
			if(model_no_id=="")
			{
				alert("Please Select Model No.");
				$('#model_no_id').focus();
				return false;
			}
			if(serial_no=="")
			{
				alert("Please Select Serial No.");
				$('#serial_no').focus();
				return false;
			}
			if(assigned_to=="")
			{
				alert("Please Select Employee Name");
				$('#assigned_to').focus();
				return false;
			}


            if(asset_quantity=="")
			{
				alert("Please Enter Asset Quantity!!");
				$('#asset_quantity').focus();
				return false;
			}
            available_quantity = parseInt(available_quantity);
			if(available_quantity=="" || available_quantity < 0 || available_quantity ==0)
            {
                alert("Item Out Of Stock!!");
                $('#available_quantity').focus();
                return false;
            }
            let assign_qtt = parseInt(document.getElementById('asset_quantity').value)
            if(assign_qtt>available_quantity){
                alert(`enter less qty only ${available_quantity} left`)
                return false;
            }
            if(assign_qtt==0 || assign_qtt==""){
                alert('enter asset quantity')
                return false;
            }
		 });
		 /*$("#item_name_id").trigger("change");
		 $("#sub_item_name_id").trigger("change");
		 $("#model_no_id").trigger("change");
		 $("#serial_no").trigger("change");*/
});
</script>


<script>
     function maxfunc(){
            // debugger;
            var element = document.getElementById('created_date');
            var datetoday = '<?php date_default_timezone_set("Asia/Kolkata");echo date("Y-m-d"); ?>';
            element.setAttribute("max", datetoday);
        }

    // function maxfunct(){
    //     // debugger;
    //     var element = document.getElementById('created_on');
    //     var datetoday = ';
    //     element.setAttribute("max", datetoday);
    // }
</script>