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
            <li class="active">Payment Received</li>
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
                              <h3 class="panel-title">Payment Received for <?=(isset($data["InvoiceList"]['invoice_no']))?$data["InvoiceList"]['invoice_no']:'';?></h3>
                            </div>
                           <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                               <a href="<?=URLROOT;?>/BankVoucher/bank_voucher_list/"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->

                    <div class="panel-body">
                        <form class="form-horizontal" id="my_form" method="post" action="<?=URLROOT;?>/InvoicePayment/invoice_payment/<?=(isset($data['invoice_id']))?$data['invoice_id']:'';?>">
                            <input type="hidden" id="invoice_id" name="invoice_id" value="<?=(isset($data['invoice_id']))?$data['invoice_id']:'';?>" />
                            <input type="hidden" id="transaction_id" name="transaction_id" value="<?=(isset($data['transaction_id']))?$data['transaction_id']:'';?>" />
							<input type="hidden" name="bill_amount" id="bill_amount" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]['get_bill_amount']:$data['amount_received'];?>"  />
							<input type="hidden" name="customer_id" id="customer_id" value="<?=(isset($data["InvoiceList"]['contact_details_id']))?$data["InvoiceList"]['contact_details_id']:'';?>"  />
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="account_type">Invoice Date<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<input class="form-control" type="text" name="invoice_date" value="<?=(isset($data["InvoiceList"]['invoice_date']))?$data["InvoiceList"]['invoice_date']:'';?>" readonly />
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Invoice No.<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<input class="form-control" type="text" name="invoice_no" value="<?=(isset($data["InvoiceList"]['invoice_no']))?$data["InvoiceList"]['invoice_no']:'';?>" readonly />
                                </div>
							</div>
							
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Customer Name<span class="text-danger">*</span></label>
                                </div>
								
								<div class="col-md-4">
									<input class="form-control" type="text" name="contact_name" value="<?=(isset($data["InvoiceList"]['contact_name']))?$data["InvoiceList"]['contact_name']:'';?>" readonly />
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Payment Date<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group date">
									   <input type="text" id="payment_date" name="payment_date" value="<?=(isset($data["transaction_id"]))?$data["InvoicetransList"]['payment_date']:date('Y-m-d');?>" class="form-control mask_date" >
									   <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
								   </div>									   
                                </div>
							</div>
							
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Bill Amount<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group">
									  <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
									 <input class="form-control" type="text" name="total_bill_amount" id="total_bill_amount" value="<?=(isset($data["InvoiceList"]['bill_amt']))?$data["InvoiceList"]['bill_amt']:'';?>" disabled  />
									</div>							   
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Total Amount<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group">
									  <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
									 <input class="form-control" type="text" name="total_bill_amount" id="total_bill_amt" value="<?=(isset($data['amount_received']))?$data['amount_received']:'';?>" disabled  />
									</div>							   
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Balance Due<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group">
									  <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
									 <input class="form-control" type="text" name="balance_due" id="balance_due" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]['get_bill_amount']:$data['amount_received'];?>" disabled  />
									</div>							   
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Amount Received<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group">
									  <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
									 <input class="form-control" type="text" name="amount_received" id="amount_received" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]['get_total_payable_amt']:$data['amount_received'];?>" onkeyup="remaining_amt_details();"  onkeypress="return isNumber(event);" />
									</div>							   
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Remaining Amount<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group">
									  <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
									 <input class="form-control" type="text" name="remaining_amt" id="remaining_amt" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]["get_due_amt"]:0;?>" readonly />
									</div>							   
                                </div>
							</div>
							<div class="form-group">
								<label class="col-md-2" >&nbsp;</label>
								<label class="col-md-2" ><input type="checkbox" id="chk_tax" <?php if(isset($data['transaction_id'])){ if($data["InvoicetransList"]["get_tax_amt"]!=0){ echo "checked";}}?> /> If any tax deducted?</label>
							</div>
							<div class="form-group" id="tax_amt_div">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Tax Amount<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
									<div class="input-group">
									  <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
									 <input class="form-control" type="text" name="tax_amt" id="tax_amt" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]["get_tax_amt"]:'';?>" onkeyup="tax_amt_details();"  onkeypress="return isNumber(event);" />
									</div>							   
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Mode of Payment<span class="text-danger">*</span></label>
                                </div>
								<div class="col-md-4">
								    <select id="payment_mode" name="payment_mode" class="form-control">
										<option value="">--SELECT--</option>
										<?php foreach($data["paymentmodeList"] as $value):?>
										<option value="<?=$value["_id"]?>" <?=(isset($data["transaction_id"]))?($data["InvoicetransList"]["get_payment_mode_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["payment_mode"]?></option>
										<?php endforeach;?>
									</select>   
                                </div>
							</div>
							<div class="form-group" id="other_payment_mode_div">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Other Payment Mode </label>
                                </div>
								<div class="col-md-4">
									<input type="text" id="other_payment_mode" name="other_payment_mode" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]['other_payment_mode']:'';?>" class="form-control" placeholder="Amount">
								</div>
							</div>
							<div class="form-group trtoggle">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Cheque/ Reference No. </label>
                                </div>
								<div class="col-md-4">
									<input type="text" id="check_neft_bank_imps_no" name="check_neft_bank_imps_no" value="<?=(isset($data['transaction_id']))?$data["InvoicetransList"]['check_neft_bank_imps_no']:'';?>" class="form-control" placeholder="Cheque/ Reference No.">
								</div>
							</div>
							<div class="form-group trtoggle">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Cheque / Transaction Date</label>
                                </div>
								<div class="col-md-4">
									
								   <div class="input-group date">
									   <input type="text" id="cheque_transaction_date" name="cheque_transaction_date" value="<?=(isset($data["transaction_id"]))?$data["InvoicetransList"]['transaction_date']:date('Y-m-d');?>" class="form-control mask_date" >
									   <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
								   </div>
                                </div>
							</div>
							<div class="form-group">
                                <div class="col-md-2">
									<label class="control-label text-bold" for="cust_type">Remarks </label>
                                </div>
								<div class="col-md-4">
									<textarea id="descriptions" name="descriptions" class="form-control"><?=(isset($data['transaction_id']))?$data["InvoicetransList"]['remarks']:'';?></textarea>
                                </div>
							</div>
							<div class="row">
                                <div class="form-group">
                                    <div class="col-md-2">
                                       &nbsp;
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-md btn-success btn-block" id="btn_receive_payment" name="btn_receive_payment" type="submit"><?=(isset($data["transaction_id"]))?"Update Payment":"Receive Payment";?></button>
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
	
	$(document).ready(function() {
		
	$("#other_payment_mode_div").hide();
	//$(".trtoggle").hide();
	//$("#tax_amt_div").hide();
	<?php if(isset($data['transaction_id'])){?>
	<?php if($data["InvoicetransList"]["get_payment_mode_id"]==0 || $data["InvoicetransList"]["get_payment_mode_id"]==1){?>
			$(".trtoggle").hide();
	<?php }?>
	<?php if($data["InvoicetransList"]["get_tax_amt"]==0){?>
			$("#tax_amt_div").hide();
	<?php }?>
		
<?php }else{?>
	$(".trtoggle").hide();
	$("#tax_amt_div").hide();
<?php }?>
	
	$("#my_form" ).submit(function( event ){ 
       var proceed = true;
	   if($('#amount_received').val()==""){ $('#amount_received').css('border-color','red');  proceed = false; }
	   if($('#payment_mode').val()==""){ $('#payment_mode').css('border-color','red');  proceed = false; }
        if($("#chk_tax").is(":checked")){
			if($('#tax_amt').val()==""){ $('#tax_amt').css('border-color','red');  proceed = false; }
		}else{
			if($('#amount_received').val()==0){ $('#amount_received').css('border-color','red');  proceed = false; }
		   	
		}
	    if(proceed){ 
			if(confirm("Do you want to Continue?")){
				return true;
			}else{
				return false;
			}
		}
        event.preventDefault(); 
    });
	$("#amount_received").keyup(function() {  $("#amount_received").css('border-color',''); $("#result").slideUp(); });
	$("#payment_mode").change(function() {  $("#payment_mode").css('border-color',''); $("#result").slideUp(); });
	$("#tax_amt").change(function() {  $("#tax_amt").css('border-color',''); $("#result").slideUp(); });
	
	$("input#chk_tax").click(function() {
		if($("#chk_tax").is(":checked")){
			$("#amount_received").css('border-color','');
			$("#tax_amt_div").show();
			var remaining_amt =$('#remaining_amt').val();
			$('#tax_amt').val('');
		}else{
			$("#payment_mode").css('border-color','');
			$("#check_neft_bank_imps_no").css('border-color','');
			$("#tax_amt_div").hide();
			$("#tax_amt").val("");
		}
	});
	$('#payment_mode').change(function() {
		var status = $(this).val();
		$("#check_neft_bank_imps_no").css('border-color','');

		if ((status=='2') || (status=='3') || (status=='4') || (status=='5') || (status=='6'))
		{
			$(".trtoggle").show();
			$("#other_payment_mode").hide();
			$(".OtherPaymentModeTextInput").hide();
			$("#other_payment_mode").val('');
		}
		else if(status=='7') 
		{
			$("#other_payment_mode_div").show();
			$(".trtoggle").hide();
			$("#check_neft_bank_imps_no").val('');
			$("#cheque_transaction_date").val('');
		}
		else
		{
			$(".trtoggle").hide();
			$("#other_payment_mode_div").hide();
			$("#other_payment_mode").val('');
			$("#check_neft_bank_imps_no").val('');
			$("#cheque_transaction_date").val('');
		}
	});
});
$('#payment_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
	$('#cheque_transaction_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });

function remaining_amt_details(){
	var balance_due =$('#balance_due').val();
	
	var amount_received = $('#amount_received').val();
	if(amount_received==""){
		amount_received = 0;
	}	
	var remaining_amt =$('#remaining_amt').val();
	var bill_amount =$('#bill_amount').val();
	var tax_amt = $('#tax_amt').val();
	if(tax_amt==""){
		tax_amt = 0;
	}
	
	
	var remain_amt= parseFloat(bill_amount)-(parseFloat(amount_received)+parseFloat(tax_amt));
	var payable_amt = parseFloat(amount_received)+parseFloat(tax_amt);
	//alert(balance_due);
	if(parseInt(payable_amt)>parseInt(balance_due)){
		$('#amount_received').val('');
		$('#remaining_amt').val('0');
	}else{
		$('#remaining_amt').val(remain_amt);
	}
}
function tax_amt_details(){
	var balance_due =$('#balance_due').val();
	var amount_received = $('#amount_received').val();
	var total_bill_amt = $('#total_bill_amt').val();
	if(amount_received==""){
		amount_received = 0;
	}	
	var remaining_amt =$('#remaining_amt').val();
	var bill_amount =$('#bill_amount').val();
	var tax_amt = $('#tax_amt').val();
	if(tax_amt==""){
		tax_amt = 0;
	}
	var remain_amt= parseFloat(bill_amount)-(parseFloat(amount_received)+parseFloat(tax_amt));
	var payable_amt = parseFloat(amount_received)+parseFloat(tax_amt);
	if(parseInt(payable_amt)>parseInt(balance_due)){
		alert("Tax amount cannot be greater than Amount Due!!!!!");
		$('#remaining_amt').val(total_bill_amt);
		$('#tax_amt').val('');
		$('#tax_amt').focus();
		
	}else{
		$('#remaining_amt').val(remain_amt);
	}		
}
    
</script>

