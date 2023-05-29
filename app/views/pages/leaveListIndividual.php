<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
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
					<li class="active">Individual Leave List</li>
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
					                <h5 class="panel-title">Individual Leave List</h5>
                                </div>
                                <div class="panel-body">
                                    <div class ="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/LeaveController/individual">
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
                                                <!-- <th>Employee Name</th> -->
                                                <th>Requested Time Period</th>
                                                <th>Reporting Head's Remark</th>
                                                <th>Approved Time Period</th>
                                                <th>HR's Remark</th>
                                                <th>Leave Type</th>
                                                <th>Reason For Leave</th>
                                                <th>Leave Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(isset($data["leaveList"])):
                                          if($data["leaveList"]==""):
                                    ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $i=0;
                                            foreach ($data["leaveList"] as $value):
                                    ?>      
                                            <tr>
                                            <td><?=++$i;?></td>
                                                <!-- <td><?php //echo $value["first_name"].' '.$value["middle_name"].' '.$value["last_name"];?></td> -->
												<td><?=empty($value["old_leave_from_date"])? date("d-M-Y",strtotime($value["leave_from_date"])).' <span style="color:#d16200;">To</span> '.date("d-M-Y",strtotime($value["leave_to_date"])) : (date("d-M-Y",strtotime($value["old_leave_from_date"]))).' <span style="color:#d16200;">To</span> '.date("d-M-Y",strtotime($value["old_leave_to_date"]));?><br/><small class="text-danger"><?php echo empty($value["old_leave_days"])? $value["leave_days"] : $value["old_leave_days"];?> days</small></td>
                                                <td><?php echo empty($value['approve_reject_reason'])? "Not Available":$value['approve_reject_reason']; ?></td>

                                                <td><?php if(empty($value["old_leave_from_date"])){ echo 'Not Available'; } else{ echo date("d-M-Y",strtotime($value["leave_from_date"])).' <span style="color:#d16200;">To</span> '.date("d-M-Y",strtotime($value["leave_to_date"]));?><br/><small class="text-danger"><?=$value["leave_days"].' days';?></small><?php } ?></td>
                                                <td><?php echo empty($value['hr_remarks'])? "Not Available":$value['hr_remarks']; ?></td>
                                                <td><?=$value["leave_type"];?></td>
                                                <td><?=$value["leave_reason"];?></td>
                                                    <?php if($value["_status"]==1)
                                                    { ?>
                                                        <td class="text-bold text-info">Approval Pending</td>

                                                    <?php }
                                                    elseif($value["_status"]==2)
                                                    { ?>
                                                         <td class="text-bold text-success">HR's Approval is Pending</td>
                                                    <?php }
                                                    elseif($value["_status"]==3)
                                                    { ?>
                                                         <td class="text-bold text-primary">Leave Request Cancelled</td>
                                                    <?php }
                                                    elseif($value["_status"]==4)
                                                    { ?>
                                                         <td class="text-bold text-primary">Leave Cancel Request</td>
                                                    <?php }
                                                elseif($value["_status"]==5)
                                                    { ?>
                                                         <td class="text-bold text-primary">Leave Cancel Request Approved</td>
                                                    <?php }
                                                elseif($value["_status"]==6)
                                                    { ?>
                                                         <td class="text-bold text-primary">Leave Cancel Request Rejected</td>
                                                    <?php }
                                                    elseif($value["_status"]==0)
                                                    { ?>
                                                          <td class="text-bold text-danger">Leave Request Rejected</td>
                                                    <?php }
													elseif($value["_status"]==7)
                                                    { ?>
                                                          <td class="text-bold" style="color:#34a1eb">
														  <?php
																  $tt_date= date("Y-m-d");
																  $today_datee = strtotime($tt_date);
																  $from_date=strtotime($value["leave_from_date"]);
																  $to_date=strtotime($value["leave_to_date"]);
																  if($today_datee==$from_date)
																  {
																	  echo "<span class='text-danger'>Leave period has started</span>";
																  }
																  else if($today_datee>$to_date)
																  {
																	  echo "<span class='text-danger'>Leave period is over</span>";
																  }
																  else
																  {
																	echo "Leave Approved by HR";  
																  }
																  ?>
														  </td>
                                                    <?php }

                                                    ?>
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