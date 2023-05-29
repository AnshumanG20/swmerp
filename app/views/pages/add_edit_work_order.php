<?php 
    require APPROOT . '/views/layout_vertical/header.php';
?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!-- <h1 class="page-header text-overflow">Department List</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Estimate</a></li>
            <li class="active">Receive Work Order</li>
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
                        <h5 class="panel-title">Receive Work Order</h5>
                    </div>

                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/Estimate/estimate_list"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back To List  </button></a>
                        </div>
                        <div class ="row">
                            <div class="col-md-12">
                                <?php if(isset($data["WorkOrderList"])): ?>
                                <form method="post"  id="dvContainer" action="<?=URLROOT;?>/Estimate/add_edit_work_order" enctype="multipart/form-data">
                                    <div class="row">
                                        <input type="hidden" id="order_id" name="order_id" class="form-control order_id" value="<?=$data["WorkOrderList"]["_id"];?>"/>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Customer Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                 <?=$data["WorkOrderList"]["contact_name"];?><br/><small>(<?=$data["WorkOrderList"]["gstin_no"];?>)</small>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Estimate No.</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?=$data["WorkOrderList"]["estimate_no"];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Estimate Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?=$data["WorkOrderList"]["estimate_date"];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Estimate Expiry Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?=$data["WorkOrderList"]["estimate_expiry_date"];?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-danger"><u>Item Details</u></label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">	
                                                <table class="table" width="100%" style="margin-top:10px;">
                                                    <thead>
                                                        <tr style="background-color:#716e6e;font-size:11px;">
                                                            <th style="width:10px;height:46px;color:#fff;">
                                                                #
                                                            </th>
                                                            <th style="width:30px;color:#fff;">Item</th>
                                                            <th style="width:30px;color:#fff;">Sub Item</th>
                                                            <th style="text-align:right;width:40px;color:#fff;">Qty</th>
                                                            <th style="text-align:right;width:70px;color:#fff;">Rate</th>
                                                            <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?>
                                                            <th style="text-align:right;width:80px;color:#fff;">
                                                                CGST
                                                            </th>

                                                            <th style="text-align:right;width:80px;color:#fff;">
                                                                SGST
                                                            </th>
                                                            <?php } else { ?>
                                                            <th style="text-align:right;width:80px;color:#fff;">
                                                                IGST
                                                            </th>
                                                            <?php } ?>
                                                            <th style="text-align:right;width:100px;color:#fff;">
                                                                Amount
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sub_cgst_tax_per=0;
                                                        $sub_sgst_tax_per=0;
                                                        $sub_igst_tax_per=0;
                                                        $sub_cgst_tax_amt=0;
                                                        $sub_sgst_tax_amt=0;
                                                        $sub_igst_tax_amt=0;



                                                        ?>
                                                        <?php endif;  ?>
                                                        <?php
                                                        $count=0;
                                                        if(isset($data["WorkAssetsList"])):
                                                            // echo '<pre>';
                                                            // print_r($data["WorkAssetsList"]);
                                                        foreach ($data["WorkAssetsList"] as $value):

                                                        ?>
                                                        <tr style="font-size:11px;height:90px;">
                                                            <td style="border-bottom: 1pt dotted #E4E2E1;"><?=++$count;?>.</td>
                                                            <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["item_name"];?></td>
                                                            <td style="line-height: 100%;border-bottom: 1pt dotted #E4E2E1;"><?=$value["sub_item_name"];?><br><br><small><?=$value["sub_item_description"]??null;?></small></td>
                                                            <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                                            <?php echo ($value['item_quantity']== '')?'0.0':number_format($value['item_quantity']); ?></td>
                                                            <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($value["item_per_rate"],2);?></td>
                                                                <?php if($value["ship_from_state"]==$value["bill_to_state"]){ ?>
                                                            <td style="line-height: 100%; text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                                                    <?=$value["cgst_tax_amt"];?><br /><br />
                                                                    <span style="font-size:10px;"><?=$value["cgst_tax_per"];?>%</span>
                                                                </td>

                                                                <td style="line-height: 100%; text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                                                    <?=$value["sgst_tax_amt"];?><br /><br />
                                                                    <span style="font-size:10px;"><?=$value["sgst_tax_per"];?>%</span>
                                                                </td>
                                                                <?php } else { ?>

                                                                <td style="line-height: 100%; text-align:right;border-bottom: 1pt dotted #E4E2E1;">
                                                                    <?=$value["igst_tax_amt"];?><br /><br />
                                                                    <span style="font-size:10px;"><?=$value["igst_tax_per"];?>%</span>
                                                                </td>
                                                                <?php }
                                                                $data["eachAssets_amt"] = $value["total_amt"]+$value["cgst_tax_amt"]+$value["sgst_tax_amt"];
                                                                ?>
                                                                <td style="text-align:right;border-bottom: 1pt dotted #E4E2E1;"><?=number_format($data["eachAssets_amt"],2);?></td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                        <?php endif;  ?>
                                                        <?php if(isset($data["WorkOrderList"])): ?>
                                                                <?php
                                                                $sub_cgst_tax_per+=$data["WorkOrderList"]["cgst_tax_per"];
                                                                $sub_sgst_tax_per+=$data["WorkOrderList"]["sgst_tax_per"];
                                                                $sub_igst_tax_per+=$data["WorkOrderList"]["igst_tax_per"];
                                                                $sub_cgst_tax_amt+=$data["WorkOrderList"]["cgst_tax_amt"];
                                                                $sub_sgst_tax_amt+=$data["WorkOrderList"]["sgst_tax_amt"];
                                                                $sub_igst_tax_amt+=$data["WorkOrderList"]["igst_tax_amt"];
                                                                ?>

                                                                <tr style="height:30px;">
                                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?><td></td><?php } ?>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                    <td style="text-align:right;font-size:11px;">
                                                                        Sub Total
                                                                    </td>
                                                                    <td style="text-align:right;font-size:11px;">
                                                                        <?=number_format($data["WorkOrderList"]["sub_bill_amt"],2);?>
                                                                    </td>
                                                                </tr>
                                                                <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?>
                                                                <tr style="height:30px;">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                    <td style="text-align:right;font-size:11px;">
                                                                        CGST (<?=$sub_cgst_tax_per;?>%)
                                                                    </td>
                                                                    <td style="text-align:right;font-size:11px;">
                                                                        <?=number_format($data["WorkOrderList"]["sub_cgst_tax_amt"],2);?>
                                                                    </td>
                                                                </tr>

                                                                <tr style="height:30px;">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                    <td style="text-align:right;font-size:11px;">
                                                                        SGST (<?=$sub_sgst_tax_per;?>%)
                                                                    </td>
                                                                    <td style="text-align:right;font-size:11px;">
                                                                        <?=number_format($data["WorkOrderList"]["sub_sgst_tax_amt"],2);?>
                                                                    </td>
                                                                </tr>
                                                                <?php } else { ?>

                                                                <tr style="height:30px;">
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                    <td style="text-align:right;font-size:11px;">
                                                                        IGST (<?=$sub_igst_tax_per;?>%)
                                                                    </td>
                                                                    <td style="text-align:right;font-size:11px;">
                                                                         <?=number_format($data["WorkOrderList"]["sub_igst_tax_amt"],2);?>
                                                                    </td>
                                                                </tr>
                                                                <?php } 
                                                                if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"])
                                                                { 
                                                                    $sub_bill_tax_amt=$data["WorkOrderList"]["sub_bill_amt"] + $sub_cgst_tax_amt + $sub_sgst_tax_amt;
                                                                }
                                                                else
                                                                {
                                                                    $sub_bill_tax_amt=$data["WorkOrderList"]["sub_bill_amt"] + $sub_igst_tax_amt;
                                                                }
                                                                ?>

                                                                <tr style="height:30px;">
                                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?><td></td><?php } ?>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                    <td style="text-align:right;font-size:11px;">
                                                                        Discount
                                                                    </td>
                                                                    <td style="text-align:right;font-size:11px;">
                                                                        <span class="text-danger">(-)</span> <?=$data["WorkOrderList"]["discount_amt"];?>
                                                                    </td>
                                                                </tr>
                                                                <tr style="height:30px;">
                                                                    <?php if($data["WorkOrderList"]["ship_from_state"]==$data["WorkOrderList"]["bill_to_state"]){ ?><td></td><?php } ?>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                    <td style="text-align:right; font-weight:700;font-size:11px;">
                                                                        Total
                                                                    </td>
                                                                    <td style="text-align:right;font-weight:700;font-size:11px;">
                                                                        &#x20b9; <?=number_format($data["WorkOrderList"]["bill_amt"],2);?>
                                                                    </td>
                                                                </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Work Order Receive Date <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input class="form-control datePicker" type="hidden"  id="hidden_date" name="hidden_date" value="<?=date('Y-m-d');?>" />
                                                    <input class="form-control datePicker" type="text"  id="work_order_received_date" name="work_order_received_date" value="<?=date('Y-m-d');?>" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Attach Work Order <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="file" id="work_order_attach_path" name="work_order_attach_path" class="form-control m-t-xxs"  required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Remarks <span class="text-danger">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <textarea class="form-control m-t-xxs" type="text" name="work_order_remarks" id="work_order_remarks" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">&nbsp;</div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" id="btn_add_update_work_order" name="btn_add_update_work_order" class="btn btn-md btn-success btn-block" value="<?=(isset($data["id"]))?"Update":"Add";?>"> Work Order <i class="fa fa-arrow-right"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                             <?php endif; ?>
                            </div>
                        </div>

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
<script>

    
    $('#work_order_received_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    

    $(document).ready(function(){
        $('#btn_add_update_work_order').click(function(){
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var hidden_date = $('#hidden_date').val();
            var work_order_received_date = $('#work_order_received_date').val();
            if(work_order_received_date < hidden_date)
            {
                alert('Work Order Receive Date Must Be Current Date Or Any New Date ');
                $("#work_order_received_date").css({"border-color":"red"});
                $("#work_order_received_date").focus();
                process = false;
            }
            var work_order_remarks = $('#work_order_remarks').val();
                work_order_remarks = work_order_remarks.trim();
            if(work_order_remarks=="")
            {
                $("#work_order_remarks").css({"border-color":"red"});
                $("#work_order_remarks").focus();
                process = false;
            }
            if(!exp.test(work_order_remarks))
            {
                $("#work_order_remarks").css({"border-color":"red"});
                $("#work_order_remarks").focus();
                process = false;
            }

            return process;
        });
        $("#work_order_received_date").change(function(){$(this).css('border-color','');});
        $("#work_order_remarks").keyup(function(){$(this).css('border-color','');});
    });
</script>