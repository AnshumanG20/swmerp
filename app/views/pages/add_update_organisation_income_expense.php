<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
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
            <li><a href="#">Invoice</a></li>
            <li class="active">Organisation's Cash Income & Expense</li>
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
                              <h3 class="panel-title">Organisation's Cash Income & Expense</h3>
                            </div>
                           <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                               <a href="<?=URLROOT;?>/IncomeExpense/organisation_income_expense_list/"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->

                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/IncomeExpense/add_update_organisation_income_expense/<?=(isset($data['_id']))?$data['_id']:'';?>" enctype="multipart/form-data">
                            <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="account_type">Account Type<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<select id="account_type" name="account_type" class="form-control">
                                        <option value="INCOME" <?=(isset($data['transaction_type']))?($data['transaction_type']=="COMPANY_INCOME")?"selected":"":"";?>>INCOME</option>
                                        <option value="EXPENSE" <?=(isset($data['transaction_type']))?($data['transaction_type']=="COMPANY_EXPENSE")?"selected":"":"";?>>EXPENSE</option>
                                    </select>
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Transaction Date<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group date">
									   <input type="text" id="transaction_date" name="transaction_date" value="<?=(isset($data['transaction_date']))?$data['transaction_date']:date('Y-m-d');?>" class="form-control mask_date" >
									   <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
								   </div>
                                </div>
							</div>
							
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Transaction Mode<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<input type="hidden" id="payment_mode" name="payment_mode" class="form-control" value="1" />
                                    <input type="text" id="payment_mode_demo" class="form-control" value="CASH" readonly="readonly" />
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Accounting Equation<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<input type="text" id="accounting_equation" name="accounting_equation" value="<?=(isset($data['accounting_equation']))?$data['accounting_equation']:'';?>" class="form-control"  placeholder="Accounting Equation" >
									   
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Payer/Payee Name<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
								   <input type="text" id="payer_payee_name" name="payer_payee_name" value="<?=(isset($data['payer_payee_name']))?$data['payer_payee_name']:'';?>" class="form-control " placeholder="Payer/Payee Name">
									   
                                </div>
							</div>
							<div class="form-group" id="bill_voucher_no_div">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Bill Voucher No.</label>
                                </div>
								<div class="col-md-4">
								   <input type="text" id="bill_voucher_no" name="bill_voucher_no" value="<?=(isset($data['bill_voucher_no']))?$data['bill_voucher_no']:'';?>" class="form-control " placeholder="Bill Voucher No.">
								</div>
							</div>
							<div class="form-group" id="doc_attach_div">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Upload Document</label>
                                </div>
								<div class="col-md-4">
									<?php
									if(isset($data['_id']))
									{
										if($data['doc_path']!='')
										{
											?>
											<label>Uploaded Document -> <a href="<?=URLROOT;?>/uploads/<?=$data['doc_path'];?>" target="_blank" class="btn btn-warning">Click & View</a></label>
											<br />
											<?php
										}
									}
									?>
									
									<input type="file" id="doc_attach" class="form-control m-t-xxs" name="doc_attach" value="" style="text-transform: uppercase;"  >
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Amount <span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<input type="text" id="income_withdraw_amt" name="income_withdraw_amt" value="<?=(isset($data['income_withdraw_amt']))?$data['income_withdraw_amt']:'';?>" class="form-control" placeholder="Amount">
								</div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Description <span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<textarea id="descriptions" name="descriptions" class="form-control"><?=(isset($data['descriptions']))?$data['descriptions']:'';?></textarea>
                                </div>
							</div>
					        <div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                       &nbsp;
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-md btn-success btn-block" id="btn_add_update_income_expense" name="btn_add_update_income_expense" type="submit"><?=(isset($data["_id"]))?"Update":"Add";?></button>
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
	$('#transaction_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#doc_attach').change(function(e){
	if($('#doc_attach')[0].files[0].size>5242880){
		alert("Document Size is Greater Than 5MB");    
		$('#doc_attach').val("");  
	}else if(!(["jpg", "jpeg", "png", "pdf"].indexOf($('#doc_attach').val().split('.').pop().toLowerCase()) > -1)){
		alert("Document Type is Not Allowed!!");
		$('#doc_attach').val(""); 
	}
});
$("#account_type").change(function () {
	if($(this).val()=="INCOME"){
		$("#bill_voucher_no_div").hide();
		$("#doc_attach_div").hide();
	}else{
		$("#bill_voucher_no_div").show();
		$("#doc_attach_div").show();
	}
});
$(document).ready( function() {
	$("#bill_voucher_no_div").hide();
	$("#doc_attach_div").hide();
	$("#account_type").trigger("change");
});	
$("#btn_add_update_income_expense").click(function (){
	var proceed = true;
	var account_type = $("#account_type").val();

	if(account_type=="INCOME"){
		if($("#payment_mode").val()==""){
			$('#payment_mode_demo').css('border-color','red');  proceed = false;
		}
		if($("#accounting_equation").val()==""){
			$('#accounting_equation').css('border-color','red');  proceed = false;
		}
		if($("#payer_payee_name").val()==""){
			$('#payer_payee_name').css('border-color','red');  proceed = false;
		}
		if($("#income_withdraw_amt").val()==""){
			$('#income_withdraw_amt').css('border-color','red');  proceed = false;
		}
		if($("#descriptions").val()==""){
			$('#descriptions').css('border-color','red');  proceed = false;
		}
	}else if(account_type=="EXPENSE"){
		if($("#payment_mode").val()==""){
			$('#payment_mode_demo').css('border-color','red');  proceed = false;
		}
		if($("#accounting_equation").val()==""){
			$('#accounting_equation').css('border-color','red');  proceed = false;
		}
		if($("#payer_payee_name").val()==""){
			$('#payer_payee_name').css('border-color','red');  proceed = false;
		}
		if($("#income_withdraw_amt").val()==""){
			$('#income_withdraw_amt').css('border-color','red');  proceed = false;
		}
		if($("#descriptions").val()==""){
			$('#descriptions').css('border-color','red');  proceed = false;
		}
	}else{
		alert("Something Wrong!!!!"); proceed = false;
	}

	
	if(proceed)
		{ 
			if(confirm("Do you want to Continue?"))
			{ return true; } else {	return false; }
			
		}
        event.preventDefault(); 
});
$("#payment_mode").change(function() {  $("#payment_mode").css('border-color',''); });	
	$("#doc_attach").change(function() {  $("#doc_attach").css('border-color',''); });

	$("#accounting_equation").keyup(function() {  $("#accounting_equation").css('border-color',''); });
	$("#payer_payee_name").keyup(function() {  $("#payer_payee_name").css('border-color',''); });
	$("#income_withdraw_amt").keyup(function() {  $("#income_withdraw_amt").css('border-color',''); });
	$("#bill_voucher_no").keyup(function() {  $("#bill_voucher_no").css('border-color',''); });
	$("#descriptions").keyup(function() {  $("#descriptions").css('border-color',''); });
</script>

