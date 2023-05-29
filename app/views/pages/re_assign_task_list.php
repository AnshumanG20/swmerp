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
            <!--<h1 class="page-header text-overflow">Document List</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Incomplete-Reject Task</a></li>
            <li class="active">Incomplete-Reject Task List</li>
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
                        <h5 class="panel-title">Incomplete-Reject Task List</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <div class ="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/search_re_assign_task_list">

                                            <div class="form-group col-sm-3">
                                                <label class="col-sm-12" for="from_date">From Date <span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <input type="date" id="from_date" name="from_date" class="form-control" value="<?=(isset($data['from_date']))?$data['from_date']:date("Y-m-d");?>"  />
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="col-sm-12" for="to_date">To Date <span class="text-danger"> *</span></label>
                                                <div class="col-sm-12">
                                                    <input type="date" id="to_date" name="to_date" class="form-control" value="<?=(isset($data['to_date']))?$data['to_date']:date("Y-m-d");?>"  />
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="col-sm-12" for="status">Status</label>
                                                <select id="receive_reject_status" name="receive_reject_status" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="0" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="0")?"selected":"":"";?>>Rejected Task</option>
                                                    <option value="5" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="5")?"selected":"":"";?>>Incomplete Task</option>
                                                    <!--<option value="0" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="0")?"selected":"":"";?>>Rejected Task</option>//-->
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label class="col-sm-12" for="btnsearch">&nbsp;</label>
                                                <button class="btn btn-success btn-block" id="btnsearch" name="btnsearch" type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <!-- <a href="<?=URLROOT;?>/Task_Assign/task_assign_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Assign New Task <i class="fa fa-arrow-right"></i></button></a>//-->
                        </div>
                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Project Name</th>
                                    <th>Task Name</th>
                                    <!--<th>Other Task</th>//-->
                                    <th>Assign Date/Time</th>
                                    <th>Deadline Date</th>
                                    <!-- <th>Assigned By</th>//-->
                                    <th>Reason</th>
                                    <th>Remark</th>
                                    <th>Re-Assign Task</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!isset($data["tasklist"])):
                                ?>
                                <tr>
                                    <td colspan="9" style="text-align: center;">Data Not Available!!</td>
                                </tr>
                                <?php else:
                                $i=0;
                                foreach ($data["tasklist"] as $value):
                                ?>
                                <tr>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                    <td><?=$value["project_name"];?></td>
                                    <td><?=$value['task_name']!=""?$value["task_name"]:$value["other_task"];?></td>
                                    <!--<td><?=$value["other_task"]!=""?$value["other_task"]:"N/A";?></td>//-->
                                    <td><?=$value["assign_date_time"];?></td>
                                    <td><?=date('d-m-Y', strtotime($value["deadline_date_time"]));?></td>
                                    <td>
                                        <?php if($value['receive_reject_status']==0){?>
                                        <span class="text-danger"> Rejected Task </span>
                                        <?php } 
                                        else
                                        {?><span class="text-danger"> Incomplete Task </span><?php }
                                        ?>
                                        <!--  <td><?=$value["assign_by_emp_name"];?></td>//-->
                                    <td><?=$value["remarks_by_assigned"];?></td>
                                    <td>
                                        <?php if($value['reassign_task_assign_details_id']!=''){?>
                                                Task Re_Assign
                                        <?php }
                                        else{?>
                                        <button type="button" class="btn btn-primary" onclick="re_assign_fun(<?=$value["_id"];?>);">Re-Assign</button>
                                        <?php }
                                        ?>

                                    </td>
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
                    exportOptions: { columns: [ 0,1,2,3,4,5,6,7] }
                }]
        });
        $("#btnsearch").click(function(){
            var process = true;
            var from_date = $("#from_date").val();
            if(from_date=="")
            {
                $("#from_date").css({"border-color":"red"});
                $("#from_date").focus();
                process = false;
            }
            var to_date = $("#to_date").val();
            if(to_date=="")
            {
                $("#to_date").css({"border-color":"red"});
                $("#to_date").focus();
                process = false;
            }
            if(to_date < from_date)
            {
                alert("To Date Must Be Greater Than Or Equals To From Date");
                $("#to_date").css({"border-color":"red"});
                $("#to_date").focus();
                process = false;
            }
            return process;
        });
        $("#to_date").change(function(){$(this).css('border-color','');});
    });
    function re_assign_fun(ID)
    {
        var result = confirm("Do You Want To Re Assign Task");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/task_re_assign_add_update/"+ID);
    }
</script>