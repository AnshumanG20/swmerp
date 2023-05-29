<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<link href="<?=URLROOT;?>/common/assets/plugins/summernote/summernote.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!-- <h1 class="page-header text-overflow">Add/Update Company Location</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Estimate</a></li>
            <li class="active">New Estimate</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="panel-title">New Estimate</h3>
                            </div>
                            <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                                <a href="<?=URLROOT;?>/Estimate/estimate_list/"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <!-- The Modal -->
                    <div class="modal" id="addItem">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add More Items</h4>
                                </div>
                                <!-- Modal body -->
                                <form method="post"  id="itemsdd">
                                    <div class="modal-body">
                                        <input type="hidden"  id="order_id" name="order_id" value="<?=$data["WorkOrderList"]["_id"];?>" readonly>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Asset Type <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select id="asset" name="asset" class="form-control m-t-xxs">
                                                        <!--<option value="">Select</option>
                                                        <option value="Software">SOFTWARE</option>
                                                        <option value="Hardware">HARDWARE</option>//-->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Enter New Item Name <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" id="items" name="items" class="form-control m-t-xxs" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">&nbsp;</div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <button type="button" id="btn_add_more_item" name="btn_add_more_item" class="btn btn-md btn-success btn-block" onclick="addItemList();">Add New Item <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sub Item Modal footer -->

                     <div class="modal" id="addSubItem">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add More Sub Items</h4>
                                </div>
                                <!-- Modal body -->
                                <form method="post"  id="subitemsdd">
                                    <div class="modal-body">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select Asset Type <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select id="assets" name="assets" class="form-control m-t-xxs">
                                                        <!--<option value="">Select</option>
                                                        <option value="Software">SOFTWARE</option>
                                                        <option value="Hardware">HARDWARE</option>//-->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="hidden" id="itemss" name="itemss" class="form-control m-t-xxs" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Enter New Sub Item Name <span class="text-danger">*</span></label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" id="subitemss" name="subitemss" class="form-control m-t-xxs" value="">
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-4">
												<div class="form-group">
													<label for="selling_rate">Selling Rate (Per Unit)<span class="text-danger"> *</span></label>
												</div>
											</div>
											<div class="col-md-8 input-group">
												<span class="input-group-addon"><i class="fa fa-rupee "></i></span>
												<input class="form-control m-t-xxs" type="text" maxlength="10" placeholder="Enter Item Selling Rate" id="selling_rate" name="selling_rate" value="<?=(isset($data['selling_rate']))?$data['selling_rate']:"";?>" onkeypress="return isNum(event);" />
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-4">
												<div class="form-group">
													<label for="cgst_tax">CGST Tax<span class="text-danger"> *</span></label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<input class="form-control m-t-xxs" type="text" maxlength="2" id="cgst_tax" name="cgst_tax" placeholder="Enter CGST Tax" value="<?=(isset($data['cgst_tax']))?$data['cgst_tax']:"";?>" onkeypress="return isNum(event);"/>
													<span class="input-group-addon"><i class="fa fa-percent "></i></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-rupee "></i></span>
													<input class="form-control m-t-xxs" type="text" maxlength="10" id="cgst_tax_amount" name="cgst_tax_amount" class="form-control" value="" disabled>
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-4">
												<div class="form-group">
													<label for="sgst_tax">SGST Tax<span class="text-danger"> *</span></label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<input class="form-control m-t-xxs" type="text" maxlength="2" id="sgst_tax" name="sgst_tax" placeholder="Enter SGST Tax" value="<?=(isset($data['sgst_tax']))?$data['sgst_tax']:"";?>" onkeypress="return isNum(event);"/>
													<span class="input-group-addon"><i class="fa fa-percent "></i></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-rupee "></i></span>
													<input class="form-control m-t-xxs" type="text" maxlength="10" id="sgst_tax_amount" name="sgst_tax_amount" class="form-control" value="" disabled>
												</div>
											</div>
										</div>
										<div class="row">
                                            <div class="col-md-4">
												<div class="form-group">
													<label for="igst_tax">IGST Tax<span class="text-danger"> *</span></label>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<input class="form-control m-t-xxs" type="text" maxlength="2" id="igst_tax" name="igst_tax" placeholder="Enter IGST Tax" value="<?=(isset($data['igst_tax']))?$data['igst_tax']:"";?>" onkeypress="return isNum(event);"/>
													<span class="input-group-addon"><i class="fa fa-percent "></i></span>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-rupee "></i></span>
													<input class="form-control m-t-xxs" type="text" maxlength="10" id="igst_tax_amount" name="igst_tax_amount" class="form-control" value="" disabled>
												</div>
											</div>
										</div>
                                        <div class="row">
                                            <div class="col-md-4">&nbsp;</div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <button type="button" id="btn_add_more_subitem" name="btn_add_more_subitem" class="btn btn-md btn-success btn-block" onclick="addSubItemList();">Add New Sub Item <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- The Modal -->


                    <div class="panel-body">
                    <?php if(isset($data["is_convert"])=='convert'){ ?>
                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Invoice/invoice_add_update/no/convert_to_invoice">
                        <?php } else { ?>
                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Estimate/estimate_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <?php } ?>
                       
                            <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label text-bold" for="cust_type">Customer Name<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <select id="cust_type" name="cust_type" class="form-control" onchange="getCustomerDetails(this.id);">
                                        <option value="">--select--</option>
                                        <?php foreach($data["customer_name"] as $value):?>
                                        <option value="<?=$value["customer_name_id"]?>" <?=(isset($data["customer_name_id"]))?($data["customer_name_id"]==$value["customer_name_id"])?"SELECTED":"":"";?>><?=$value["contact_name"]?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" id="shipFrom" name="shipFrom"  class="form-control shipFrom" value="<?=(isset($data['ship_from_state']))?$data['ship_from_state']:"";?>" />
                            <input type="hidden" id="shipTo" name="shipTo"  class="form-control shipTo" value="<?=(isset($data['ship_to_state']))?$data['ship_to_state']:"";?>" />
                            <input type="hidden" id="bill" name="bill"  class="form-control bill" value="<?=(isset($data['bill_to_state']))?$data['bill_to_state']:"";?>" />
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label text-bold" for="cust_type">Estimate No.<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" maxlength="50" id="estimate_no" name="estimate_no" class="form-control" value="<?=(isset($data['estimate_no']))?$data['estimate_no']:"";?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label text-bold" for="cust_type">Estimate Date<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <input type="text" id="estimate_date" name="estimate_date" value="<?=(isset($data['estimate_date']))?$data['estimate_date']:date('Y-m-d');?>" class="form-control mask_date" placeholder="Click Here To Select From Date">
                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label text-bold" for="cust_type">Due Date<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group date">
                                        <input type="text" id="payment_due_date" name="payment_due_date" value="<?=(isset($data['payment_due_date']))?$data['payment_due_date']:date('Y-m-d');?>" class="form-control mask_date" placeholder="Click Here To Select From Date">
                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12" style="color:red; text-align:left">
                                        <p><u>Item Description</u></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-info">
                                        <div class="panel-body">
                                            <div class="tangg table-responsive">
                                                <table class="table table-hover table-bordered table-condensed" id="rowAdditem">
                                                    <thead>
                                                        <tr class="danger">
                                                            <th>Asset Type</th>
                                                            <th>Item</th>
                                                            <th>Sub Item</th>
                                                            <th>Quantity</th>
                                                            <th>Rate</th>
                                                            <th>Amount</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rowAddInvoiceDetails">
                                                        <?php
                                                        if(isset($data['estimateEditAsset'])){
                                                            $i = 0;
                                                            foreach($data['estimateEditAsset'] as $value){
                                                                $i++;

                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" id="editAssets_id<?=$i;?>" name="editAssets_id[]" value="<?=$value['_id'];?>" />
                                                                <select id="asset_type<?=$i;?>" name="asset_type[]" class="form-control assets" onchange="getItemList(this.id);">
                                                                    <option value="<?=$value["asset_type"];?>"><?=$value["asset_type"];?></option>
                                                                    <option value="Software" <?=(isset($data['asset_type']))?($data['asset_type']=="Software")?"selected":"":"";?>>SOFTWARE</option>
                                                                    <option value="Hardware" <?=(isset($data['asset_type']))?($data['asset_type']=="Hardware")?"selected":"":"";?>>HARDWARE</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="invoice_details_id<?=$i;?>" name="invoice_details_id[]" value="<?=$i;?>" />
                                                                <select id="item_mstr_id<?=$i;?>" name="item_mstr_id[]" class="form-control item_mstr_id" onchange="getSubItemList(this.id);" >
                                                                    <option value='<?=$value["item_name_id"];?>'><?=$value["item_name"];?></option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="sub_item_mstr_id<?=$i;?>" name="sub_item_mstr_id[]" class="form-control sub_item_mstr_id" onchange="getSubItemDetails(this.id);">
                                                                    <option value="<?=$value["sub_item_id"];?>"><?=$value["sub_item_name"];?></option>
                                                                </select>
                                                                <input type="hidden" id="cgst_tax_per<?=$i;?>" name="cgst_tax_per[]"  class="form-control cgst_tax_per" value="<?=$value['cgst_tax_per'];?>" />
                                                                <input type="hidden" id="sgst_tax_per<?=$i;?>" name="sgst_tax_per[]"  class="form-control sgst_tax_per" value="<?=$value['sgst_tax_per'];?>" />
                                                                <input type="hidden" id="igst_tax_per<?=$i;?>" name="igst_tax_per[]"  class="form-control igst_tax_per" value="<?=$value['igst_tax_per'];?>" />
                                                                <br />
                                                                <textarea id="sub_item_descriptio<?=$i;?>" name="sub_item_description[]" class="form-control" placeholder="Enter Description"><?=$value['sub_item_description'];?></textarea>
                                                            </td>
                                                            <td><input type="number" id="item_quantity<?=$i;?>" name="item_quantity[]"  class="form-control item_quantity" onkeyup="calQuantityRateToAmount(this.id);" value="<?=$value['item_quantity'];?>" readonly="readonly" /></td>
                                                            <td><input type="text" id="item_per_rate<?=$i;?>" name="item_per_rate[]" class="form-control item_per_rate" value="<?=$value['item_per_rate'];?>" readonly  /></td>
                                                            <td><input type="text" id="total_amount<?=$i;?>" name="total_amount[]" class="form-control total_amount" value="<?=$value['total_amt'];?>" readonly  /></td>
                                                            <td>
                                                                <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="tableAdditem(<?=$i;?>)"></i>
                                                            </td>

                                                            <?php
                                                                if($i!=1){
                                                            ?>
                                                            <td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td>
                                                            <?php
                                                                }
                                                            ?>
                                                        </tr>
                                                        <?php
                                                            }
                                                        }else{
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <select id="asset_type1" name="asset_type[]" class="form-control assets" onchange="getItemList(this.id);">
                                                                    <option value="">Select</option>
                                                                    <option value="Software" <?=(isset($data['asset_type']))?($data['asset_type']=="Software")?"selected":"":"";?>>SOFTWARE</option>
                                                                    <option value="Hardware" <?=(isset($data['asset_type']))?($data['asset_type']=="Hardware")?"selected":"":"";?>>HARDWARE</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" id="invoice_details_id1" name="invoice_details_id[]" value="" />
                                                                <select id="item_mstr_id1" name="item_mstr_id[]" class="form-control item_mstr_id" onchange="getSubItemList(this.id);" >
                                                                    <option value='<?=(isset($data["item_name_id"]))?$data["item_name_id"]:"";?>'><?=(isset($data["item_name"]))?$data["item_name"]:"Select";?></option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <select id="sub_item_mstr_id1" name="sub_item_mstr_id[]" class="form-control sub_item_mstr_id" onchange="getSubItemDetails(this.id);">
                                                                    <option value="<?=(isset($data["sub_item_id"]))?$data["sub_item_id"]:"";?>"><?=(isset($data["sub_item_name"]))?$data["sub_item_name"]:"Select";?></option>
                                                                </select>
                                                                <input type="hidden" id="cgst_tax_per1" name="cgst_tax_per[]"  class="form-control cgst_tax_per" value="<?=(isset($data['cgst_tax_per']))?$data['cgst_tax_per']:"";?>" />
                                                                <input type="hidden" id="sgst_tax_per1" name="sgst_tax_per[]"  class="form-control sgst_tax_per" value="<?=(isset($data['sgst_tax_per']))?$data['sgst_tax_per']:"";?>" />
                                                                <input type="hidden" id="igst_tax_per1" name="igst_tax_per[]"  class="form-control igst_tax_per" value="<?=(isset($data['igst_tax_per']))?$data['igst_tax_per']:"";?>" />
                                                                <br />
                                                                <textarea id="sub_item_descriptio1" name="sub_item_description[]" class="form-control" placeholder="Enter Description"><?=(isset($data["sub_item_description"]))?$data["sub_item_description"]:"";?></textarea>
                                                            </td>
                                                            <td><input type="number" id="item_quantity1" name="item_quantity[]"  class="form-control item_quantity" onkeyup="calQuantityRateToAmount(this.id);" onchange="calQuantityRateToAmount(this.id);" value="<?=(isset($data["item_quantity"]))?$data["item_quantity"]:"";?>" readonly="readonly" /></td>
                                                            <td><input type="text" id="item_per_rate1" name="item_per_rate[]" class="form-control item_per_rate" value="<?=(isset($data["item_per_rate"]))?$data["item_per_rate"]:"0";?>" readonly  /></td>
                                                            <td><input type="text" id="total_amount1" name="total_amount[]" class="form-control total_amount" value="<?=(isset($data["total_amt"]))?$data["total_amt"]:"0";?>" readonly  /></td>
                                                            <td>
                                                                <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="tableAdditem(1);"></i></td>
                                                            <td></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2">Sub Total (ST)</td>
                                                            <td style="text-align:right;" colspan="3">
                                                                <input type="text" id="spanSubTotalAmtShow" name="spanSubTotalAmtShow" class="form-control spanSubTotalAmtShow" value="<?=(isset($data["sub_bill_amt"]))?$data["sub_bill_amt"]:"0.00";?>" style="border:none;background-color:white;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                        <tr id="trCGSTid" style="display:none;">
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2">CGST Tax (C)</td>
                                                            <td style="text-align:right;" colspan="3">
                                                                <input type="text" id="spanCGSTShow" name="spanCGSTShow" class="form-control spanCGSTShow" value="<?=(isset($data["cgst_total_tax"]))?$data["cgst_total_tax"]:"0.00";?>" style="border:none;background-color:white;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                        <tr id="trSGSTid" style="display:none;">
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2">SGST Tax (S)</td>
                                                            <td style="text-align:right;" colspan="3">
                                                                <input type="text" id="spanSGSTShow" name="spanSGSTShow" class="form-control spanSGSTShow" value="<?=(isset($data["sgst_total_tax"]))?$data["sgst_total_tax"]:"0.00";?>" style="border:none;background-color:white;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                        <tr id="trIGSTid" style="display:none;">
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2">IGST Tax (I)</td>
                                                            <td style="text-align:right;" colspan="3">
                                                                <input type="text" id="spanIGSTShow" name="spanIGSTShow" class="form-control spanIGSTShow" value="<?=(isset($data["igst_total_tax"]))?$data["igst_total_tax"]:"0.00";?>" style="border:none;background-color:white;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                        <tr id="trSubTaxBillAmtid">
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2"><span id="tdSpanSubTaxBillAmtid"></span></td>
                                                            <td style="text-align:right;" colspan="3">
                                                                <input type="text" id="spanSubTaxBillAmtShow" name="spanSubTaxBillAmtShow" class="form-control spanSubTaxBillAmtShow" value="<?=(isset($data["sub_tax_bill_amt"]))?$data["sub_tax_bill_amt"]:"0.00";?>" style="border:none;background-color:white;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2">Discount</td>
                                                            <td style="text-align:right;" >
                                                                <select class="form-control" id="discount_type" name="discount_type" >
                                                                    <option value='inRupee' <?=(isset($_POST["discount_type"]))?($_POST["discount_type"]=="inRupee")?"selected":"":"";?><?=(isset($objinventory->discount_type) && !isset($_POST["discount_type"]))?($objinventory->discount_type=="inRupee")?"selected":"":"";?>>in Rs.</option>
                                                                    <option value='inPercentage' <?=(isset($_POST["discount_type"]))?($_POST["discount_type"]=="inPercentage")?"selected":"":"";?><?=(isset($objinventory->discount_type) && !isset($_POST["discount_type"]))?($objinventory->discount_type=="inPercentage")?"selected":"":"";?>>in %</option>
                                                                </select>
                                                            </td>
                                                            <td style="text-align:right;" >
                                                                <?php
                                                                $discount_rate = "";
                                                                if(isset($_POST["discount_rate"])){
                                                                    $discount_rate = $_POST["discount_rate"];
                                                                }
                                                                if(isset($objinventory->discount_rate) && !isset($_POST["discount_rate"])){
                                                                    if($objinventory->discount_type=="inRupee")
                                                                        $discount_rate = $objinventory->discount_amt;
                                                                    else
                                                                        $discount_rate = $objinventory->discount_rate;
                                                                }

                                                                ?>
                                                                <input type="number" name="discount_rate" id="discount_rate" class="form-control m-t-xxs" value="<?=(isset($data["discount_rate"]))?$data["discount_rate"]:"0.00";?>"  onkeyup="calTaxAmount()" onchange="calTaxAmount()"/>
                                                            </td>
                                                            <td style="text-align:right;">
                                                                <input type="text" id="spanDiscountAmtShow" name="spanDiscountAmtShow" class="form-control spanDiscountAmtShow" value="<?=(isset($data["discount_amt"]))?$data["discount_amt"]:"0.00";?>" style="border:none;background-color:white;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                        <tr style="background-color:#F3F1F1;">
                                                            <td style="text-align:right;line-height:40px;font-weight:bold;" colspan="2">Total (<i class="fa fa-rupee"></i>)</td>
                                                            <td style="text-align:right;" colspan="3">
                                                                <input type="text" id="spanBillAmtShow" name="spanBillAmtShow" class="form-control spanBillAmtShow" value="<?=(isset($data["bill_amt"]))?$data["bill_amt"]:"0.00";?>" style="border:none;background-color:#F3F1F1;text-align:right;" readonly  />
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label text-bold" for="cust_type">Customer Notes<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <textarea class="form-control" type="text" name="customer_note" id="customer_note" >Looking forward for your business.</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label class="control-label text-bold" for="cust_type">Terms & Conditions<span class="text-danger">*</span></label>
                                </div>
                                <div class="col-md-8">
                                    <input type="hidden" id="terms_and_conditions" name="terms_and_conditions" value="" />	
                                    <div class="note-editor note-frame panel panel-default"><div class="note-dropzone">  <div class="note-dropzone-message"></div></div><div class="note-toolbar panel-heading"><div class="note-btn-group btn-group note-font"><button type="button" class="note-btn btn btn-default btn-sm note-btn-bold" tabindex="-1" title="" data-original-title="Bold (CTRL+B)"><i class="note-icon-bold"></i></button><button type="button" class="note-btn btn btn-default btn-sm note-btn-underline" tabindex="-1" title="" data-original-title="Underline (CTRL+U)"><i class="note-icon-underline"></i></button></div><div class="note-btn-group btn-group note-para"><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Unordered list (CTRL+SHIFT+NUM7)"><i class="note-icon-unorderedlist"></i></button><button type="button" class="note-btn btn btn-default btn-sm" tabindex="-1" title="" data-original-title="Ordered list (CTRL+SHIFT+NUM8)"><i class="note-icon-orderedlist"></i></button></div></div><div class="note-editing-area"><div class="note-handle"><div class="note-control-selection"><div class="note-control-selection-bg"></div><div class="note-control-holder note-control-nw"></div><div class="note-control-holder note-control-ne"></div><div class="note-control-holder note-control-sw"></div><div class="note-control-sizing note-control-se"></div><div class="note-control-selection-info"></div></div></div><textarea class="note-codable"></textarea>

                                        <div class="note-editable panel-body" contenteditable="true" style="height: 200px;" id="mail_content"><?=(isset($data["terms_and_conditions"]))?$data["terms_and_conditions"]:'<span style="color: rgb(0, 0, 0); font-size: 11px;">1. All terms are subject to the agreement signed.</span>                                     	                                     <div><table style="background-color: rgb(255, 255, 255);"><tbody><tr><td style="font-size: 11px; color: rgb(0, 0, 0); height: 50px;"><p>2. Payment to be transferred to:<br>&nbsp;&nbsp;&nbsp;&nbsp; A/C Holder: Aadrika Enterprises<br>&nbsp;&nbsp;&nbsp;&nbsp; A/C Number: 2670201000512<br>&nbsp;&nbsp;&nbsp;&nbsp; Bank &amp; Branch: Canara Bank, Namkum, Ranchi Branch IFSC: CNRB0002670 <br /> 3. All payments shall be made within 10 working days from the date of receipt of Invoice failing which an additional charge of INR 50/- (Rupees Fifty Only) per day will be charged till the date of payment realisation.</p></td></tr><tr></tr></tbody></table></div>';?></div>

                                        </div>

                                    </div>
                                </div>
                            </div>  	
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-4">
                                        <?php if(isset($data["is_convert"])=='convert'){ ?>
                                            <button class="btn btn-success" id="btn_add_update_invoice_details" name="btn_add_update_invoice_details" type="submit">Convert to invoice</button>
                                        <?php } else {?>
                                        <button class="btn btn-success" id="btn_add_update_invoice_details" name="btn_add_update_invoice_details" type="submit"><?=(isset($data["_id"]))?"Update Estimate":"Add Estimate";?></button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script src="<?=URLROOT;?>/common/assets/plugins/summernote/summernote.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/js/demo/mail.js"></script>

<script type="text/javascript">
    $('#estimate_date').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $('#payment_due_date').datepicker({
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    }); 

    $("#estimate_date" ).change(function( event ){ 
        var estimate_date = new Date(this.value);
        var payment_due_date = new Date(estimate_date);
        payment_due_date.setDate(payment_due_date.getDate() + 7);
        var dd = payment_due_date.getDate();
        var mm = payment_due_date.getMonth() + 1;
        if (mm < 10) {//if less then 10 add a leading zero
            mm = "0" + mm;
        }
        if (dd < 10) {//if less then 10 add a leading zero
            dd = "0" + dd;
        }
        //var mm = payment_due_date.getMonth() + 1;
        var y = payment_due_date.getFullYear();
        var payment_due_date = y + '-' + mm + '-' + dd;

        $("#payment_due_date" ).val(payment_due_date);

        $('#estimate_date').css('border-color','');
        $("#payment_due_date").trigger('change');
    });






    $("#rowAddInvoiceDetails").on('click', '.remove_buttonn_item', function(e) {
        $(this).closest("tr").remove();
        getSubTotal();
    });
    var z =1;
    function tableAdditem(j){
        z = z+j;
        var newTblRow = $('<tr><td><select id="asset_type'+z+'" name="asset_type[]" class="form-control assets" onchange="getItemList(this.id);"><option value="">Select</option><option value="Software">SOFTWARE</option><option value="Hardware">HARDWARE</option></select></td><td><input type="hidden" id="invoice_details_id'+z+'" name="invoice_details_id[]" value="" /><select id="item_mstr_id'+z+'" name="item_mstr_id[]" class="form-control item_mstr_id" onchange="getSubItemList(this.id);" ><option value="">Select</option></select></td><td><select id="sub_item_mstr_id'+z+'" name="sub_item_mstr_id[]" class="form-control sub_item_mstr_id" onchange="getSubItemDetails(this.id);"><option value="">Select</option></select><input type="hidden" id="cgst_tax_per'+z+'" name="cgst_tax_per[]"  class="form-control cgst_tax_per" /><input type="hidden" id="sgst_tax_per'+z+'" name="sgst_tax_per[]"  class="form-control sgst_tax_per" /><input type="hidden" id="igst_tax_per'+z+'" name="igst_tax_per[]"  class="form-control igst_tax_per" /><br /><textarea id="sub_item_descriptio'+z+'" name="sub_item_description[]" class="form-control" placeholder="Enter Description"></textarea></td><td><input type="number" id="item_quantity'+z+'" name="item_quantity[]" class="form-control item_quantity" onkeyup="calQuantityRateToAmount(this.id);" onchange="calQuantityRateToAmount(this.id);" readonly="readonly" /></td><td><input type="text" id="item_per_rate'+z+'" name="item_per_rate[]" class="form-control item_per_rate" value="0" readonly /></td><td><input type="text" id="total_amount'+z+'" name="total_amount[]" class="form-control total_amount" value="0" readonly /></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="tableAdditem(this.id);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
        $("#rowAddInvoiceDetails").append(newTblRow);
    }


</script>

<script type="text/javascript">

    function getCustomerDetails(){

        var cust_type = $("#cust_type").val();
        if(cust_type!=""){
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/Estimate/ajaxcustomerDetails",
                dataType: "json",
                data: {"cust_type":cust_type},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();

                    if(data.response==true){
                        $("#shipFrom").val(data.shipFrom);
                        $("#shipTo").val(data.shipTo);
                        $("#bill").val(data.bill);
                        if(data.data=="same"){
                            $('#trCGSTid').show();
                            $('#trSGSTid').show();
                            $('#trIGSTid').hide();
                        }else{
                            $('#trIGSTid').show();
                            $('#trSGSTid').hide();
                            $('#trCGSTid').hide();
                        }

                    }
                }
            });

        }
    }

    function addItemList(){
        var asset = $("#asset").val();
        var items = $("#items").val();
        if(items!=""){
                $.ajax({
                    type:"POST",
                    url: "<?=URLROOT;?>/Estimate/ajaxnew_item_add",
                    dataType: "json",
                    data: {"items":items, "asset":asset},
                    beforeSend: function() {
                        $("#loadingDiv").show();
                    },
                    success:function(data){
                        $("#loadingDiv").hide();
                        if(data.response==true){
                            $("#item_mstr_id").html(data.data);
                            $('#addItem').modal('hide');
                        }
                    }
                });
            }
        }
    function addSubItemList(){

        var assets = $("#assets").val();
        var itemss = $("#itemss").val();
        var subitemss = $("#subitemss").val();
		var selling_rate = $("#selling_rate").val();
        var cgst_tax_amount = $("#cgst_tax").val();
        var sgst_tax_amount = $("#sgst_tax").val();
		var igst_tax_amount = $("#igst_tax").val();
        if(itemss!=""){
                $.ajax({
                    type:"POST",
                    url: "<?=URLROOT;?>/Estimate/ajaxnew_Subitem_add",
                    dataType: "json",
                    data: {"itemss":itemss, "assets":assets, "subitemss":subitemss, "selling_rate":selling_rate, "cgst_tax_amount":cgst_tax_amount, "sgst_tax_amount":sgst_tax_amount, "igst_tax_amount":igst_tax_amount},
                    beforeSend: function() {
                        $("#loadingDiv").show();
                    },
                    success:function(data){
                        $("#loadingDiv").hide();
                        if(data.response==true){
                            $("#sub_item_mstr_id").html(data.data);
                            $('#addSubItem').modal('hide');
                        }
                    }
                });
            }
        }




    function getItemList(ID){
        ID = ID.split("asset_type")[1];
        var sub_total_amt = 0;
        var asset_type = $("#asset_type"+ID).val();
        $('#item_mstr_id'+ID).html('<option value="">Select</option>');
        $('#sub_item_mstr_id'+ID).html('<option value="">Select</option>');
        $('#item_quantity'+ID).val('0');
        $('#item_per_rate'+ID).val('0');
        $('#total_amount'+ID).val('0');
       getSubTotal();
        if(asset_type!=""){
            //console.log(asset_type);
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/Estimate/ajaxItemListByAssetType",
                dataType: "json",
                data: {"asset_type":asset_type},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){

                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#item_mstr_id"+ID).html(data.data);
                        if(asset_type=="Software"){
                            $('#asset').html('<option value="Software">SOFTWARE</option>');
                        }else if(asset_type=="Hardware"){
                            $('#asset').html('<option value="Hardware">HARDWARE</option>');
                        }
                    }
                }
            });

        }
    }

    function getSubItemList(ID){
        ID = ID.split("item_mstr_id")[1];
        var asset_type = $("#asset_type"+ID).val();
        var item_mstr_id = $("#item_mstr_id"+ID).val();
        $('#sub_item_mstr_id'+ID).html('<option value="">Select</option>');
        if(item_mstr_id!=""){
            if(item_mstr_id=="OTHERS"){
                $('#addItem').modal('show');

            }else{
                $.ajax({
                    type:"POST",
                    url: "<?=URLROOT;?>/Estimate/ajaxSubItemListByItemList",
                    dataType: "json",
                    data: {"item_mstr_id":item_mstr_id},
                    beforeSend: function() {
                        $("#loadingDiv").show();
                    },
                    success:function(data){
                        $("#loadingDiv").hide();
                        if(data.response==true){
                            $("#sub_item_mstr_id"+ID).html(data.data);
                            $("#itemss").val(item_mstr_id);
                            if(asset_type=="Software"){
                                $('#assets').html('<option value="Software">SOFTWARE</option>');
                            }else if(asset_type=="Hardware"){
                                $('#assets').html('<option value="Hardware">HARDWARE</option>');
                            }
                        }
                    }
                });
            }
        }
    }

    function getSubItemDetails(ID){
        ID = ID.split("sub_item_mstr_id")[1];
        $('#sub_item_mstr_id'+ID).css('border-color', '');
        var sub_item_mstr_id = $("#sub_item_mstr_id"+ID).val();
        if(sub_item_mstr_id == ''){
            $('#item_quantity'+ID).val("");
            $('#item_quantity'+ID).attr('readonly', true);
        }else{
            $('#item_quantity'+ID).attr('readonly', false);
        }
        var sub_item_mstr_id = $("#sub_item_mstr_id"+ID).val();
        if(sub_item_mstr_id!=""){
            if(sub_item_mstr_id=="OTHERS"){
                $('#addSubItem').modal('show');
            }else{
            $.ajax({
                type:"POST",
                url: "<?=URLROOT;?>/Estimate/ajaxSubItemDetails",
                dataType: "json",
                data: {"sub_item_mstr_id":sub_item_mstr_id},
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#item_per_rate"+ID).val(data.data);
                        $("#cgst_tax_per"+ID).val(data.cgst);
                        $("#sgst_tax_per"+ID).val(data.sgst);
                        $("#igst_tax_per"+ID).val(data.igst);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#loadingDiv").hide();
                    alert(JSON.stringify(jqXHR));
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

          }
        }
    }
</script>

<script>
    function calQuantityRateToAmount(ID){
        ID = ID.split("item_quantity")[1];
        var item_quantity = $('#item_quantity'+ID).val();
        var item_per_rate = $('#item_per_rate'+ID).val();
        if(item_per_rate > 0){
            var total_amount = item_quantity*item_per_rate;
            $('#total_amount'+ID).val(total_amount);
        }else{
            $('#item_quantity'+ID).val("");
            $('#total_amount'+ID).val(0);
        }
        getSubTotal();
    } 

    function getSubTotal(){
        var sub_total_amt = 0;
        var cgst_total_tax = 0;
        var sgst_total_tax = 0;
        var igst_total_tax = 0;
        var total_with_tax = 0;
        var discount_amt = 0;
        var bill_amt = 0;


        $('.item_mstr_id').each(function(){
            var ID = (this.id).split('item_mstr_id')[1];
            var total_amount = $('#total_amount'+ID).val();
            var cgst_tax_per = $('#cgst_tax_per'+ID).val();
            var sgst_tax_per = $('#sgst_tax_per'+ID).val();
            var igst_tax_per = $('#igst_tax_per'+ID).val();
            var discount_type = $('#discount_type').val();
            var discount_rate = $('#discount_rate').val();

            sub_total_amt = parseFloat(sub_total_amt)+parseFloat(total_amount);
            cgst_total_tax = ((sub_total_amt*cgst_tax_per)/100);
            sgst_total_tax = ((sub_total_amt*sgst_tax_per)/100);
            igst_total_tax = ((sub_total_amt*igst_tax_per)/100);
            total_with_tax = sub_total_amt+cgst_total_tax+sgst_total_tax;
			if(discount_type=="inRupee"){
            discount_amt = discount_rate;
            bill_amt = total_with_tax - discount_rate;
        }else{
            discount_amt = ((total_with_tax*discount_rate)/100);
            bill_amt = total_with_tax - ((total_with_tax*discount_rate)/100);
        }


        });
        $('#spanSubTotalAmtShow').val(sub_total_amt);
        $('#spanCGSTShow').val(cgst_total_tax);
        $('#spanSGSTShow').val(sgst_total_tax);
        $('#spanIGSTShow').val(igst_total_tax);
        $('#spanSubTaxBillAmtShow').val(total_with_tax);
        $('#spanBillAmtShow').val(total_with_tax);
		$('#spanDiscountAmtShow').val(discount_amt);
        $('#spanBillAmtShow').val(bill_amt);
    }
    function calTaxAmount(){
        var discount_type = $('#discount_type').val();
        var discount_rate = $('#discount_rate').val();
        var total_with_tax = $('#spanSubTaxBillAmtShow').val();
        var discount_amt = 0;
        var bill_amt = 0;
        if(discount_type=="inRupee"){
            discount_amt = discount_rate;
            bill_amt = total_with_tax - discount_rate;
        }else{
            discount_amt = ((total_with_tax*discount_rate)/100);
            bill_amt = total_with_tax - ((total_with_tax*discount_rate)/100);
        }
        $('#spanDiscountAmtShow').val(discount_amt);
        $('#spanBillAmtShow').val(bill_amt);

    } 

    $(document).ready(function(){
        $('#btn_add_update_invoice_details').click(function(){
            var process = true;
            var cust_type = $('#cust_type').val();
            var txtAreaToMail = $("#mail_content").html();
            $("#terms_and_conditions").val(txtAreaToMail);
            //alert(txtAreaToMail);
            if(cust_type=="")
            {
                $("#cust_type").css({"border-color":"red"});
                $("#cust_type").focus();
                process = false;
            }
            var estimate_no = $('#estimate_no').val();
            //estimate_no = estimate_no.trim();
            if(estimate_no=="")
            {
                $("#estimate_no").css({"border-color":"red"});
                $("#estimate_no").focus();
                process = false;
            }
            var estimate_date = $('#estimate_date').val();
            if(estimate_date=="")
            {
                $("#estimate_date").css({"border-color":"red"});
                $("#estimate_date").focus();
                process = false;
            }
            var payment_due_date = $('#payment_due_date').val();
            if(payment_due_date=="")
            {
                $("#payment_due_date").css({"border-color":"red"});
                $("#payment_due_date").focus();
                process = false;
            }
            var customer_note = $('#customer_note').val();
            if(customer_note=="")
            {
                $("#customer_note").css({"border-color":"red"});
                $("#customer_note").focus();
                process = false;
            }
            var discount_rate = $('#discount_rate').val();
            if(discount_rate=="")
            {
                $("#discount_rate").css({"border-color":"red"});
                $("#discount_rate").focus();
                process = false;
            }
            if(discount_rate!="")
            {
                if(discount_rate < 0)
                {
                    $("#discount_rate").css({"border-color":"red"});
                    $("#discount_rate").focus();
                    process = false;
                }
            }
            var asset_type1 = $('#asset_type1').val();
            if(asset_type1!="")
            {
                $('.assets').each(function(){
                    var ID = this.id;
                    var ID = ID.split("asset_type")[1];
                    var asset_type = $("#asset_type"+ID).val();
                    if(asset_type=="")
                    {
                        $("#asset_type"+ID).css({"border-color":"red"});
                        $("#asset_type"+ID).focus();
                        process = false;   
                    }
                    var item_mstr_id = $('#item_mstr_id'+ID).val();
                    if(item_mstr_id=="")
                    {
                        $("#item_mstr_id"+ID).css({"border-color":"red"});
                        $("#item_mstr_id"+ID).focus();
                        process = false; 
                    }
                    var sub_item_mstr_id = $('#sub_item_mstr_id'+ID).val();
                    if(sub_item_mstr_id=="")
                    {
                        $("#sub_item_mstr_id"+ID).css({"border-color":"red"});
                        $("#sub_item_mstr_id"+ID).focus();
                        process = false; 
                    }
                    var item_quantity = $('#item_quantity'+ID).val();
                    if(item_quantity < 0)
                    {
                        $("#item_quantity"+ID).css({"border-color":"red"});
                        $("#item_quantity"+ID).focus();
                        process = false; 	
                    }
                    var sub_item_descriptio = $('#sub_item_descriptio'+ID).val();
                    if(sub_item_descriptio!="")
                    {
                        var exp = /^[A-Za-z0-9\s]+$/;
                        if(!exp.test(sub_item_descriptio))
                        {
                            $("#sub_item_descriptio"+ID).css({"border-color":"red"});
                            $("#sub_item_descriptio"+ID).focus();
                            process = false;
                        }
                    }

                });
            }

            return process;
        });
        $("#cust_type").change(function(){$(this).css('border-color','');});
        $("#estimate_no").keyup(function(){$(this).css('border-color','');});
        $("#estimate_date").change(function(){$(this).css('border-color','');});
        $("#payment_due_date").change(function(){$(this).css('border-color','');});
        $("#customer_note").change(function(){$(this).css('border-color','');});
        $("#discount_rate").change(function(){$(this).css('border-color','');});
        $("#asset_type").change(function(){$(this).css('border-color','');});
        $("#item_mstr_id1").change(function(){$(this).css('border-color','');});
        $("#sub_item_mstr_id").change(function(){$(this).css('border-color','');});
        $("#item_quantity1").change(function(){$(this).css('border-color','');});
        $("#sub_item_descriptio1").keyup(function(){$(this).css('border-color','');});

    
	$("#cgst_tax").bind("keyup ", function(e) {
            var cgst_tax =parseFloat($('#cgst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var cgst_tax_amount =$('#cgst_tax_amount').val();
            if(selling_rate=='')
            {
                alert('Invalid Selling Rate!!');
                $('#selling_rate').focus();
                $('#cgst_tax').val('');
            }
            else
            {
                if(cgst_tax>100)
                {
                    alert('Invalid CGST Percent!!');
                    $('#cgst_tax').focus();
                    $('#cgst_tax').val('');
                    $('#cgst_tax_amount').val('');
                }
                else
                {
                    cgst_tax_amt=(selling_rate*cgst_tax)/100;
                    $('#cgst_tax_amount').val(cgst_tax_amt);
                }
            }
        });
             $("#sgst_tax").bind("keyup ", function(e) {
            var sgst_tax =parseFloat($('#sgst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var sgst_tax_amount =$('#sgst_tax_amount').val();
            if(selling_rate=='')
            {
                alert('Invalid Selling Rate!!');
                $('#selling_rate').focus();
                $('#sgst_tax').val('');
            }
            else
            {
                if(sgst_tax>100)
                {
                    alert('Invalid SGST Percent!!');
                    $('#sgst_tax').focus();
                    $('#sgst_tax').val('');
                    $('#sgst_tax_amount').val('');
                }
                else
                {
                    sgst_tax_amt=(selling_rate*sgst_tax)/100;
                    $('#sgst_tax_amount').val(sgst_tax_amt);
                }
            }
        });
            $("#igst_tax").bind("keyup ", function(e) {
            var igst_tax =parseFloat($('#igst_tax').val());
            var selling_rate = $('#selling_rate').val();
            var igst_tax_amount =$('#igst_tax_amount').val();
            if(selling_rate=='')
            {
                alert('Invalid Selling Rate!!');
                $('#selling_rate').focus();
                $('#igst_tax').val('');
            }
            else
            {
                if(igst_tax>100)
                {
                    alert('Invalid IGST Percent!!');
                    $('#igst_tax').focus();
                    $('#igst_tax').val('');
                    $('#igst_tax_amount').val('');
                }
                else
                {
                    igst_tax_amt=(selling_rate*igst_tax)/100;
                    $('#igst_tax_amount').val(igst_tax_amt);
                }
            }
        });
           /*  $('#sub_item_name').keyup(function() 
            {
                var str = $('#sub_item_name').val();
                var spart = str.split(" ");
                for ( var i = 0; i < spart.length; i++ )
                {
                    var j = spart[i].charAt(0).toUpperCase();
                    spart[i] = j + spart[i].substr(1);
                }
              $('#sub_item_name').val(spart.join(" "));
        });*/
    });
	
</script>

<script type="text/javascript">

    $(document).ready(function() {
        <?php 
        if(isset($data['_id'])){?>
        <?php if($data["bill_to_state"] == $data["ship_from_state"]){?>
        $('#trCGSTid').show();
        $('#trSGSTid').show();

        <?php } else {
        ?>

        $('#trIGSTid').show();
        <?php
        }
                               }

        ?>
    });
</script>