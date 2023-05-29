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
					<li class="active">Asset Details</li>
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
					                <h3 class="panel-title">Asset Details <a href="<?=URLROOT;?>/Asset/AssetList" style="float:right;"><button id="demo-foo-collapse" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</button></a></h3>
					            </div>

					                <div class="panel-body">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b> Asset Type: </b> 
                                                        </div>
														<div class="col-md-3">
                                                             <?=(isset($data["assetmodelList"]["asset_type"]))?$data["assetmodelList"]["asset_type"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Item Name: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["assetmodelList"]["item_name"]))?$data["assetmodelList"]["item_name"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Sub Item Name: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["assetmodelList"]["sub_item_name"]))?$data["assetmodelList"]["sub_item_name"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Model No.: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["assetmodelList"]["model_no"]))?$data["assetmodelList"]["model_no"]:'N/A';?>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Manufacturer Name: </b>
                                                        </div>
														<div class="col-md-3">
                                                             <?=(!empty($data["assetmodelList"]["manufacturer_name"]))?$data["assetmodelList"]["manufacturer_name"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Supplier Name: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(!empty($data["assetmodelList"]["supplier_name"]))?$data["assetmodelList"]["supplier_name"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Supplier Contact  Address: </b>
                                                        </div>
														<div class="col-md-3">
                                                             <?=(!empty($data["assetmodelList"]["supplier_address"]))?$data["assetmodelList"]["supplier_address"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Supplier Contact No.: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(!empty($data["assetmodelList"]["supplier_contact_no"]))?$data["assetmodelList"]["supplier_contact_no"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Purchase cost: </b> 
                                                        </div>
														<div class="col-md-3">
                                                             Rs.<?=(!empty($data["assetmodelList"]["purchase_cost"]))?$data["assetmodelList"]["purchase_cost"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Purchase Date: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(!empty($data["assetmodelList"]["purchase_date"]))?$data["assetmodelList"]["purchase_date"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Expiry Date: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(!empty($data["assetmodelList"]["expiry_date"]))?$data["assetmodelList"]["expiry_date"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Warranty months: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(!empty($data["assetmodelList"]["warranty_month_no"]))?$data["assetmodelList"]["warranty_month_no"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Order No.: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(!empty($data["assetmodelList"]["order_no"]))?$data["assetmodelList"]["order_no"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Quantity(in pcs): </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["assetmodelList"]["asset_quantity"]))?$data["assetmodelList"]["asset_quantity"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Upload Bill: </b>
                                                            
                                                        </div>
														<div class="col-md-3">
                                                            <?php
                                                            if(isset($data["assetmodelList"]["bill_attachment"]))
                                                            {
                                                                ?>
                                                                <a href="<?=URLROOT;?>/public/uploads/<?=$data["assetmodelList"]["bill_attachment"]; ?>" target="_blank" class="text-danger">View</a>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                echo"N/A";
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Remarks: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=$data["assetmodelList"]["remarks"]; ?>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title"><?php if(empty($data["assetmodList"])) {echo "Generate Barcode"; } else { echo "Update"; } ?> for <?=$data["assetmodelList"]["asset_quantity"];?> Assets</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Asset/GenerateBarcodeAsset/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                                    <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                                                    <input type="hidden" id="asset_type_id" name="asset_type_id" value="<?=(isset($data["assetmodelList"]["asset_type"]))?$data["assetmodelList"]["asset_type"]:'';?>" />
                                                    <input type="hidden" id="item_name_id" name="item_name_id" value="<?=(isset($data["assetmodelList"]["item_name_id"]))?$data["assetmodelList"]["item_name_id"]:'';?>" />
                                                    <input type="hidden" id="sub_item_name_id" name="sub_item_name_id" value="<?=(isset($data["assetmodelList"]["sub_item_name_id"]))?$data["assetmodelList"]["sub_item_name_id"]:'';?>" />
                                                    <input type="hidden" id="asset_model_no_id" name="asset_model_no_id" value="<?=(isset($data["assetmodelList"]["asset_model_no_id"]))?$data["assetmodelList"]["asset_model_no_id"]:'';?>" />
                                                    <input type="hidden" id="asset_quantity_length" name="asset_quantity_length" value="<?=(isset($data["assetmodelList"]["asset_quantity"]))?$data["assetmodelList"]["asset_quantity"]:'';?>" />
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered" >
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th>Barcode No.</th>
                                                                        <th>Asset No.</th>
                                                                        <th>Serial No.<br/><i style="font-size:10px;color:red;">(if any)</i> </th>
                                                                        <th>Status </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php

                                                                    if(isset($data["assetmodList"])):
                                                                    if(empty($data["assetmodList"])):
                                                                    ?>
                                                                    <?php
                                                                    for ($f = 1; $f <= $data["assetmodelList"]["asset_quantity"]; $f++)
                                                                    {
                                                                    ?>
                                                                    <tr>
                                                                        <td>N/A</td>
                                                                        <td><?=$data["assetmodelList"]["sub_item_name"]; ?>-<?=$f;?><input type="hidden" name="asset_model_detail_id[]" value="" ></td>
                                                                        <td><input type="text" class="form-control m-t-xxs" name="serial_no[]" value="" maxlength="20" style="text-transform: uppercase;"  ></td>
                                                                        <td>
                                                                            <select class="form-control" name="asset_status[]" style="text-transform: uppercase;"  >
                                                                                <option value="Available" >Available</option>
                                                                                <option value="Broken" >Broken</option>
                                                                                <option value="Lost" >Lost</option>
                                                                                <option value="In Repair" >In Repair</option>
                                                                            </select>
                                                                        </td>

                                                                    </tr>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php else:
                                                                    $cc=0;
                                                                    foreach ($data["assetmodList"] as $value):
                                                                    $cc++;

                                                                    ?>
                                                                    <tr>

                                                                        <td>
                                                                            <?php if($value['asset_status']=='Available') {
																			if($value['asset_type']=='Hardware') {	?>
                                                                            <?=$value["asset_barcode_no"]; ?>
                                                                            <?=barCodeGen($value["asset_barcode_no"]); ?>
                                                                            <?php 
                                                                            }
																			else
																			{ echo 'Not Available'; }
																				} else { echo 'Not Available'; } ?>
                                                                            <input type="hidden" name="asset_model_detail_id[]" value="<?=$value['_id'];?>" ></td>
                                                                        <td><?php if($value['asset_status']=='Available') { ?>
                                                                            <a href="<?=URLROOT;?>/Asset/AssetRepList/<?=(isset($data['_id']))?$data['_id']:'';?>/<?=$value['_id'];?>"><?=$data["assetmodelList"]["sub_item_name"]; ?>-<?=$cc;?></a>
                                                                            <?php } else { ?> <?=$data["assetmodelList"]["sub_item_name"]; ?>-<?=$cc;?> <?php } ?></td>
                                                                        <td><input type="text" class="form-control m-t-xxs" name="serial_no[]" value="<?=(isset($value["asset_serial_no"]))?$value["asset_serial_no"]:'';?>" maxlength="20" style="text-transform: uppercase;"  ></td>
                                                                        
                                                                        <td>
                                                                            <select class="form-control" name="asset_status[]" style="text-transform: uppercase;"  >
                                                                                <option value="Available" <?=(isset($value['asset_status']))?($value['asset_status']=="Available")?"selected":"":"";?> >Available</option>
                                                                                <option value="Broken" <?=(isset($value['asset_status']))?($value['asset_status']=="Broken")?"selected":"":"";?> >Broken</option>
                                                                                <option value="Lost" <?=(isset($value['asset_status']))?($value['asset_status']=="Lost")?"selected":"":"";?> >Lost</option>
                                                                                <option value="In Repair" <?=(isset($value['asset_status']))?($value['asset_status']=="In Repair")?"selected":"":"";?> >In Repair</option>
                                                                            </select>
                                                                        </td>

                                                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif;  ?>
                                    <?php endif;  ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
													
                                                    <div class="row">
                                                        <button type="Submit" name="btn_model_add_update" class="btn btn-success"><?php if(empty($data["assetmodList"])) {echo "Generate Barcode"; } else { echo "Update"; } ?></button>
                                                    </div>
                                            </form>
                                            </div>
                                        </div>
                                         <!--Horizontal Form-->
					                     <!--===================================================-->


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

</script>
<script language="JavaScript">
	function selectAll(source)
	{
		checkboxes = document.getElementsByName('chk[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>                