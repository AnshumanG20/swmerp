<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
 <!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/plugins/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
	
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
					<li><a href="#">Invoice </a></li>
					<li class="active">Invoice List</li>
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
					                <h5 class="panel-title">Invoice List</h5>
                                </div>
                                <div class="panel-body">
									<div class="pad-btm">
                                        <a href="<?=URLROOT;?>/Invoice/invoice_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Generate New Invoice <i class="fa fa-arrow-right"></i></button></a>
                                    </div>
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Invoice/invoice_list">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                    <label class="control-label" for="from_date"><b>From Date</b> </label>
                                                    <div class="input-group date">
                                                        <input type="text" id="from_date" name="from_date" class="form-control mask_date" placeholder="From Date" value="<?=(isset($data["from_date"]))?$data["from_date"]:date('Y-m-d');?>" readonly>
                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label" for="to_date"><b>To Date</b> </label>
                                                    <div class="input-group date">
                                                        <input type="text" id="to_date" name="to_date" class="form-control mask_date" placeholder="To Date" value="<?=(isset($data["to_date"]))?$data["to_date"]:date('Y-m-d');?>" readonly>
                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div>
												
                                                <div class="col-md-2">
                                                    <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                                    <button class="btn btn-success btn-block" id="btn_search" name="btn_search" type="submit">Search</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
									<div class="row">
										<div class="table-responsive">
					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Invoice Date</th>
                                                <th>Invoice No.</th>
                                                <th>Customer Name</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>Balance Due</th>
                                                <th>Status</th>
                                                <th>Record Payment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(isset($data["InvoiceList"])):
                                          if($data["InvoiceList"]==""):
                                    ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $i=0;
                                            foreach ($data["InvoiceList"] as $value):
											$today_time = time(); // or your date as well
											$payment_due_date_time = strtotime($value['payment_due_date']);
											$datediff = $payment_due_date_time - $today_time;

											$payment_due_by = round($datediff / (60 * 60 * 24));
                                    ?>
                                            <tr>
                                                <td><?=$value["invoice_date"];?></td>
                                                <td><?=$value["invoice_no"];?></td>
                                                <td><?=$value["contact_name"];?></td>
												<td><?=date('d-m-Y', strtotime($value["payment_due_date"]));?></td>
                                                <td><?=$value["bill_amt"];?></td>
												<td><?php if($value['paid_status']=='2' || $value['paid_status']=='3'){
													$bill_due='0';
													echo number_format($bill_due, 2);
												} else {
												$bill_due=$value['bill_amt'] -($value["total_payable_amt"] + $value["total_tax_amt"]);
												 echo number_format($bill_due, 2);
												}
												?></td>
                                                <td><?php
															
														if($value['paid_status']=='1')
														{ ?><a href="<?=URLROOT;?>/InvoicePayment/invoice/<?=$value["_id"];?>" >
															<span class='text-success'>PAID</span></a>
														<?php } elseif($value['paid_status']=='2') { ?>
														<a href="<?=URLROOT;?>/InvoicePayment/invoice/<?=$value["_id"];?>" >
															<span class='text-danger'>Invoice Canceled</span></a>
														<?php } elseif($value['paid_status']=='0') { ?>
														<a href="<?=URLROOT;?>/InvoicePayment/invoice/<?=$value["_id"];?>" >
															<span class='text-warning'>OVERDUE BY <?=$payment_due_by;?> DAYS </span></a>
															
														<?php }elseif($value['paid_status']=='3') { ?>
															<a href="<?=URLROOT;?>/CreditNote/creditnote/<?=$value["_id"];?>" >
															<span class='text-primary'><b>Credit Note Generated </b></span></a>
														<?php }
															?></td>
                                                <td>
												<?php
														if($value['paid_status']=='0')
														{
														?>
													<a class="label label-info" href="<?=URLROOT;?>/InvoicePayment/invoice_payment/<?=$value["_id"];?>" >Click <i class="fa fa-forward"></i></a>
													<?php
														}
													?>
													
												</td>    
												<td>
												<?php
												if($value["paid_status"]=='0')
												{ 
												?>
													<a class="btn btn-success" href="<?=URLROOT;?>/Invoice/invoice_add_update/<?=$value["_id"];?>" role="button">Edit <i class="fa fa-edit"></i></a>
													<?php
												}
													?>
													
												</td>    
                                                    
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
					    </div>
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<script src="<?=URLROOT;?>/common/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/jszip.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/pdfmake.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/vfs_fonts.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
$('#from_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#to_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
	$(document).ready(function() {



        function modelInfo(msg)
        {
            $.niftyNoty({
                type: 'success',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        function modelDanger(msg)
        {
            $.niftyNoty({
                type: 'danger',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        <?php if ($msgg = flashToast("invoiceUpdateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("invoiceAddSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>


		$('#demo_dt_basic').DataTable({
			responsive: true,
			dom: 'Bfrtip',
	        lengthMenu: [
	            [ 10, 25, 50, -1 ],
	            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
	        ],
	        buttons: [
	        	'pageLength',
	        {
				text: 'copy',
				extend: "copy",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
			}]
		});
	});
 
</script>