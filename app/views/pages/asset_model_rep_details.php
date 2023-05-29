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
                                                        <div class="col-sm-4">
                                                            <b> Asset Type: </b> <?=(isset($data["assetmodelList"]["asset_type"]))?$data["assetmodelList"]["asset_type"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Item Name: </b> <?=(isset($data["assetmodelList"]["item_name"]))?$data["assetmodelList"]["item_name"]:'N/A';?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Sub Item Name: </b><?=(isset($data["assetmodelList"]["sub_item_name"]))?$data["assetmodelList"]["sub_item_name"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Model No.: </b><?=(isset($data["assetmodelList"]["model_no"]))?$data["assetmodelList"]["model_no"]:'N/A';?>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Manufacturer Name: </b> <?=(!empty($data["assetmodelList"]["manufacturer_name"]))?$data["assetmodelList"]["manufacturer_name"]:'N/A';?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Supplier Name: </b><?=(!empty($data["assetmodelList"]["supplier_name"]))?$data["assetmodelList"]["supplier_name"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Supplier Contact  Address: </b> <?=(!empty($data["assetmodelList"]["supplier_address"]))?$data["assetmodelList"]["supplier_address"]:'N/A';?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Supplier Contact No.: </b><?=(!empty($data["assetmodelList"]["supplier_contact_no"]))?$data["assetmodelList"]["supplier_contact_no"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Purchase cost: </b> Rs.<?=(!empty($data["assetmodelList"]["purchase_cost"]))?$data["assetmodelList"]["purchase_cost"]:'N/A';?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Purchase Date: </b><?=(!empty($data["assetmodelList"]["purchase_date"]))?$data["assetmodelList"]["purchase_date"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Expiry Date: </b> <?=(!empty($data["assetmodelList"]["expiry_date"]))?$data["assetmodelList"]["expiry_date"]:'N/A';?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Warranty months: </b><?=(!empty($data["assetmodelList"]["warranty_month_no"]))?$data["assetmodelList"]["warranty_month_no"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Order No.: </b> <?=(!empty($data["assetmodelList"]["order_no"]))?$data["assetmodelList"]["order_no"]:'N/A';?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Quantity(in pcs): </b><?=(isset($data["assetmodelList"]["asset_quantity"]))?$data["assetmodelList"]["asset_quantity"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-4">
                                                            <b>Upload Bill: </b>
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
                                                        <div class="col-sm-4">
                                                            <b>Remarks: </b><?=$data["assetmodelList"]["remarks"]; ?>
                                                        </div>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>

                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Asset Repairing form</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Asset/AssetModelRepairingChrg/<?=(isset($data['_id']))?$data['_id']:'';?>/<?=(isset($data["model_id"]))?$data["model_id"]:'';?>">
                                                    <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                                                    <input type="hidden" id="model_id" name="model_id" value="<?=(isset($data["model_id"]))?$data["model_id"]:'';?>" />

                                                    <div class="row">
                                                        <div class="panel">

                                                            <div id="collapse2" >
                                                                <div class="panel-body">

                                                                    <div class="form-group">
                                                                        <label class="col-md-2" >Repairing Date </label>
                                                                        <div class="col-md-3">
                                                                            <div class="input-group">
                                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                                <input type="text" id="repairing_date" class="form-control m-t-xxs" name="repairing_date" value="<?=date('Y-m-d');?>" readonly  >
                                                                            </div>
                                                                        </div>
                                                                        <label class="col-md-3" >Charge (if any) </label>
                                                                        <div class="col-md-3">
                                                                            <input class="form-control m-t-xxs" id="charge_amount" name="charge_amount" value="" type="text"  >
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <button type="Submit" name="btn_model_detail_add_update" class="btn btn-success">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered" >
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th>Repairing Date</th>
                                                                        <th>Charge Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php

                                                                    if(isset($data["assetmodelrepList"])):
                                                                    if(empty($data["assetmodelrepList"])):
                                                                    ?>

                                                                    <tr>
                                                                        <td colspan="2">Data Not Available!!</td>

                                                                    </tr>

                                                                    <?php else:
                                                                    $cc=0;
                                                                    foreach ($data["assetmodelrepList"] as $value):
                                                                    $cc++;

                                                                    ?>
                                                                    <tr>

                                                                        <td><?=$value["repairing_date"]; ?></td>
                                                                        <td><?=$value["charge_amount"]; ?></td>
                                                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif;  ?>
                                    <?php endif;  ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    

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
    $('#repairing_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });

</script>                