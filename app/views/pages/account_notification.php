<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Account</a></li>
            <li class="active">Payment Notification</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Payment Notification</h3>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <?php $url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1];
                     ?>
                    <?php if(isset($data["get_account_notification"])): ?>
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/resignation_Controller/deactivate_Employee">
                        <input type="hidden" id="_id" name="_id" value="<?= $data['_id'];?>"/>
                        <div class="panel-body">
                            <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="employee_name">Employee Name</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="employee_name" name="employee_name" value="<?=$data["get_account_notification"]["first_name"]." ".$data["get_account_notification"]["middle_name"]." ".$data["get_account_notification"]["last_name"];?>"/>
                                    <?=$data["get_account_notification"]["first_name"]." ".$data["get_account_notification"]["middle_name"]." ".$data["get_account_notification"]["last_name"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 text-bold" for="email_id">Email Id<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" id="email_id" name="email_id" value="<?=$data["get_account_notification"]["email_id"];?>"/>
                                    <?=$data["get_account_notification"]["email_id"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="payable_amt">Paid Amount</label>
                                <div class="col-md-6">
                                    <input type="hidden" id="payable_amt" name="payable_amt" value="<?=$data["get_account_notification"]["payable_amt"];?>"/>
                                    <?=$data["get_account_notification"]["payable_amt"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="mode_of_payment">Mode Of Payment <span class="text-danger"> *</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" id="mode_of_payment" name="mode_of_payment" value="<?=$data["get_account_notification"]["payment_mode"];?>"/>
                                    <?=$data["get_account_notification"]["payment_mode"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 text-bold" for="due_Amount">Due Amount<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" id="due_Amount" name="due_Amount" value="<?=$data["get_account_notification"]["due_amt"];?>"/>
                                    <?=$data["get_account_notification"]["due_amt"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 text-bold" for="transaction_No">Transaction No.<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" id="transaction_No" name="transaction_No" value="<?=$data["get_account_notification"]["cash_voucher_no"];?>"/>
                                    <?=$data["get_account_notification"]["cash_voucher_no"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 text-bold" for="transaction_Date">Transaction Date<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" id="transaction_Date" name="transaction_Date" value="<?=$data["get_account_notification"]["created_on"];?>"/>
                                    <?=$data["get_account_notification"]["created_on"];?>
                                </div>
                            </div>
                            <div class="panel-footer ">
                                <button class="btn btn-success" id="btn_deactivate" name="btn_deactivate" type="submit">Employee Deactivate</button>
                            </div>
                        </div>
                    </form>
                    <?php endif;  ?>
                    <!--===================================================-->
                    <!--End Horizontal Form-->
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

