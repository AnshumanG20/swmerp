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
					<li><a href="#">Reports</a></li>
					<li class="active">Employee Attendance Details</li>
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
					                <h3 class="panel-title">Employee Attendance Details <a href="<?=URLROOT;?>/Attendance/" style="float:right;"><button id="demo-foo-collapse" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</button></a></h3>
					            </div>

					                <div class="panel-body">
                                        <div class="panel">
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post">
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Employee Code: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["EmployeeList"]["employee_code"]))?$data["EmployeeList"]["employee_code"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Employee Name: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?php if($data["EmployeeList"]["middle_name"]=='')
															{
																echo $data["EmployeeList"]["first_name"].' '.$data["EmployeeList"]["last_name"];
															}
															else
															{
																echo $data["EmployeeList"]["first_name"].' '.$value["middle_name"].' '.$data["EmployeeList"]["last_name"];
															}
																?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Contact No.: </b>
                                                        </div>
														<div class="col-md-3">
                                                             <?=(isset($data["EmployeeList"]["personal_phone_no"]))?$data["EmployeeList"]["personal_phone_no"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Email Id: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["EmployeeList"]["email_id"]))?$data["EmployeeList"]["email_id"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <b>Department: </b>
                                                        </div>
														<div class="col-md-3">
                                                             <?=(isset($data["EmployeeList"]["dept_name"]))?$data["EmployeeList"]["dept_name"]:'N/A';?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <b>Designation: </b>
                                                        </div>
														<div class="col-md-3">
                                                            <?=(isset($data["EmployeeList"]["designation_name"]))?$data["EmployeeList"]["designation_name"]:'N/A';?>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Device Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Asset/GenerateBarcodeAsset/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                                    
                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered" >
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th>#</th>
                                                                        <th>Biometric Employee Code</th>
                                                                        <th>Serial No.</th>
                                                                        <th>Date</th>
                                                                        <th>Time</th>
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
																		<td><?=$value["UserId"];?></td>
																		<td><?=$value["SerialNumber"];?></td>
																		<td><?=date('d-F-Y', strtotime($value["attendance_date"]));?></td>
																		<td><?=date('h:i A', strtotime($value["LogDate"]));?></td>
																		
                                                                    </tr>
																	<?php endforeach;?>
																	<?php endif;  ?>
																	<?php endif;  ?>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>                                                    
                                            </form>
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
    $('#purchase_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#expiry_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
        autoclose:true,
        autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
        }); 

</script>
<script language="JavaScript">
	function selectAll(source)
	{
		checkboxes = document.getElementsByName('chk[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
</script>                