<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
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
					<li><a href="#">Reports</a></li>
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
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Invoice/invoice_report">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                    <label class="control-label" for="from_date">Select Month(yyyy-mm)<span class="text-danger"> <b>*</b></span></label>
                                                        <input type="month" id="from_date" name="from_date" class="form-control" placeholder="Select Date" value="<?=(isset($data["from_date"]))?$data["from_date"]:date('Y-m');?>" min="<?=date('Y-m', strtotime('-2 year'));?>" autocomplete="off">

                                                </div>
                                               <!--  <div class="col-md-3">
                                                    <label class="control-label" for="current_date">Current Date</label>
                                                    <div class="input-group date">
                                                        <input type="text" id="to_date" name="to_date" class="form-control mask_date" placeholder="Select Date" value="<?=strtotime(date('Y-m'));?>">
                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div> -->
                                               <!--  <div class="col-md-3">
                                                    <label class="control-label" for="to_date"><b>To Date</b> </label>
                                                    <div class="input-group date">
                                                        <input type="text" id="to_date" name="to_date" class="form-control mask_date" placeholder="To Date" value="<?=(isset($data["to_date"]))?$data["to_date"]:date('Y-m-d');?>" readonly>
                                                        <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                    </div>
                                                </div> -->
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
                                                <th>#</th>
                                                <th>Company Name</th>
                                                <th>Invoice No</th>
                                                <th>Invoice Date</th>
                                                <th>Amount</th>
                                                <th>SGST</th>
                                                <th>CGST</th>
                                                <th>IGST</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(!isset($data["invoiceList"])):
                                    ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $i=0;
                                            foreach ($data["invoiceList"] as $value):
                                    ?>
                                            <tr>
                                                <td><?=++$i;?></td>
                                                <td><?=$value['contact_name']!=""?$value['contact_name']:"-"?></td>
                                                <td><?=$value['invoice_no']!=""?$value['invoice_no']:"-"?></td>
                                                <td><?=$value['invoice_date']!=""?$value['invoice_date']:"-"?></td>
                                                <td><?=$value['sub_bill_amt']!=""?$value['sub_bill_amt']:"-"?></td>
                                                <td><?=$value['sgst_total_tax']!=""?$value['sgst_total_tax']:"-"?></td>
                                                <td><?=$value['cgst_total_tax']!=""?$value['cgst_total_tax']:"-"?></td>
                                                <td><?=$value['igst_total_tax']!=""?$value['igst_total_tax']:"-"?></td>
                                                <td><?=$value['bill_amt']!=""?$value['bill_amt']:"-"?></td>
                                            </tr>
                                        <?php endforeach;?>
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
/*$('#from_date').datepicker({ 
    	format: "yyyy-mm",
        startDate: '-10d',
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });*/
    $('#to_date').datepicker({ 
    	format: "yyyy-mm",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
	$(document).ready(function() {
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
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7] }
			}]
		});
        $('#btn_search').click(function(){
             var process = true;
             var from_date = $("#from_date").val();
            if (from_date =="") 
            {
                $("#from_date").css({"border-color":"red"});
                $("#from_date").focus();
                process = false;
             }
            return process;
        });
         $("#from_date").change(function(){$(this).css('border-color','');});
	});
 
</script>