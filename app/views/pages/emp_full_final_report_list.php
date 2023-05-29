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

            <li class="active">Termination List</li>
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
                        <h5 class="panel-title">Employee Full & Final Settlment Report List</h5>
                    </div>
                    <div class="panel-body">
                        <div class ="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Reports/employee_full_final_report_list">
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
                                        <div class="col-md-3">
                                            <label class="control-label" for="process_type">Process Type</label>
                                            <select id="process_type" name="process_type" class="form-control">
                                                <option value="">All</option>
                                                <option value="Resign">Resign</option>
                                                <option value="Termination">Termination</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" for="department_mstr_id">&nbsp;</label>
                                            <button class="btn btn-success btn-block" id="btn_search" name="btn_search" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Type</th>
                                    <th>Terminate Reason</th>
                                    <th>Asset Submission Date</th>
                                    <th>Termination Date</th>
                                    <th>Final Settlment Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($data["EmpFullFinalList"])):
                                if($data["EmpFullFinalList"]==""):
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                </tr>
                                <?php else:
                                $i=0;
                                foreach ($data["EmpFullFinalList"] as $value): ?>
                                <tr>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                    <td><?=$value["resign_terminate_type"];?></td>
                                    <td><?=$value["terminate_resign_reason"];?></td>
                                    <td><?=$value["asset_submission_date"];?></td>
                                    <td><?=$value["notice_period"];?></td>
                                    <td><?=$value["final_settlment_date"];?></td>
                                    <td>
                                        <?php if($value["_status"]==1){ ?>
                                        <b class="text-danger">Pending</b>
                                        <?php }elseif($value["_status"]==6){ ?>
                                        <b class="text-success">Experience Letter Pending</b>
                                        <?php }elseif($value["_status"]==5){ ?>
                                        <b class="text-info">Termination Process Completed</b>
                                        <?php }elseif($value["_status"]==7){ ?>
                                        <b class="text-primary">Attested Experience Letter Uploaded !!</b>
                                        <?php } ?>
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
                    exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7] }
                }, {
                    text: 'csv',
                    extend: "csv",
                    title: "Report",
                    footer: { text: '' },
                    exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7] }
                }, {
                    text: 'excel',
                    extend: "excel",
                    title: "Report",
                    footer: { text: '' },
                    exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7] }
                }, {
                    text: 'pdf',
                    extend: "pdf",
                    title: "Report",
                    download: 'open',
                    footer: { text: '' },
                    exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7] }
                }]
        });
    });

</script>