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
					<li><a href="#">Reports </a></li>
					<li class="active">Attendance List</li>
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
					                <h5 class="panel-title">Attendance List</h5>
                                </div>
                                <div class="panel-body">
									<div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Attendance/">
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
                                                <th>#</th>
												<th>Emp Code</th>
												<th>Name</th>
												<th>Department</th>
												<th>Device Name</th>
												<th>Attendance Date</th>
												<th>In Time</th>
												<th>Out Time</th>
												<th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(isset($data["AttendanceList"])):
                                          if($data["AttendanceList"]==""):
                                    ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $i=0;
                                            foreach ($data["AttendanceList"] as $value):
                                    ?>
                                            <tr>
                                                <td><?=++$i;?></td>
                                                <td><?=$value["employee_code"];?></td>
                                                <td><?php if($value["middle_name"]=='')
												{
													echo $value["first_name"].' '.$value["last_name"];
												}
												else
												{
													echo $value["first_name"].' '.$value["middle_name"].' '.$value["last_name"];
												}
													?></td>
                                                <td><?=$value["dept_name"];?></td>
                                                <td><?=$value["DeviceFName"];?></td>
                                                <td><?=date('d-F-Y', strtotime($value["attendance_date"]));?></td>
                                                <td><?=$value["in_time"];?></td>
                                                <td><?=$value["out_time"];?></td>
                                                
                                                <td>
													<a class="label label-warning" href="<?=URLROOT;?>/Attendance/employee_attendance_details/<?=$value["emp_id"];?>/<?=$value["attendance_date"];?>" role="button">View  <i class="fa fa-eye"></i></a>
													
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
				exportOptions: { columns: [ 0, 1] }
			}]
		});
        $('#btn_search').click(function(){
            var process = true;
            var from_date = $('#from_date').val();
            if(from_date=="")
            {
                $("#from_date").css({"border-color":"red"});
                $("#from_date").focus();
                process = false;
            }
            var to_date = $('#to_date').val();
            if(to_date=="")
            {
               $("#to_date").css({"border-color":"red"});
               $("#to_date").focus();
               process = false; 
            }
            var account_type = $('#account_type').val();
            if(account_type=="")
            {
               $("#account_type").css({"border-color":"red"});
               $("#account_type").focus();
               process = false;
            }
            var payment_mode = $('#payment_mode').val();
            if(payment_mode=="")
            {
               $("#payment_mode").css({"border-color":"red"});
               $("#payment_mode").focus();
               process = false;
            }
            if(to_date < from_date)
            {
                alert("To Date Is Greater Than Or Equals To From Date");
               $("#to_date").css({"border-color":"red"});
               $("#to_date").focus();
               process = false;
            }
            return process;
        });
        $("#from_date").change(function(){$(this).css('border-color','');});
        $("#to_date").change(function(){$(this).css('border-color','');});
        $("#account_type").change(function(){$(this).css('border-color','');});
        $("#payment_mode").change(function(){$(this).css('border-color','');});
	});
 function deletefun(ID)
{
    var result = confirm("Do You Want To Delete");
    if(result)
     window.location.replace("<?=URLROOT;?>/BankVoucher/IE_DeleteById/"+ID);
}
</script>