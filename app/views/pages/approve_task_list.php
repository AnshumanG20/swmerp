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
            <li><a href="#">Approve Task</a></li>
            <li class="active">Approve Task List</li>
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
                        <h5 class="panel-title">Approve Task List</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <div class ="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/search_approve_task_list">

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
                                                    <option value="3" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="3")?"selected":"":"";?>>Pendding Task</option>
                                                    <option value="4" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="4")?"selected":"":"";?>>Approve Task</option>
                                                    <option value="5" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="5")?"selected":"":"";?>>Not Approve Task</option>
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
                                    <!-- <th>Other Task</th>//-->
                                    <th>Assign Date/Time</th>
                                    <th>Deadline Date/Time</th>
                                    <th>Completion Date/Time</th>
                                    <th>Submission Remark</th>
                                    <!--<th>Assigned By</th>//-->
                                    <th>Approval/Not Approval Date/Time</th>
                                    <th>Approval / Not Approval Remark</th>
                                    <th>Approve</th>
                                    <th>Not Approve</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($data["approve_task"])):
                                if($data["approve_task"]==""):
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                </tr>
                                <?php else:
                                $i=0;
                                foreach ($data["approve_task"] as $value):
                                ?>
                                <tr class='<?php if($value["receive_reject_status"]==0 || $value["receive_reject_status"]==5){echo "text-danger";} else if($value["receive_reject_status"]==4){echo "text-success";}?>'>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                    <td><?=$value["project_name"];?></td>
                                    <td><?=$value['task_name']!=""?$value["task_name"]:$value["other_task"];?></td>
                                    <!--<td><?=$value["other_task"]!=""?$value["other_task"]:"N/A";?></td>//-->
                                    <td><?=$value["assign_date_time"];?></td>
                                    <td><?=$value["deadline_date_time"];?></td>
                                    <td><?=$value["complete_date_time"]!=""?$value["complete_date_time"]:"N/A";?></td>
                                    <td><?=$value["assign_by_remarks"]!=""?$value['assign_by_remarks']:"On time Submitted";?></td>
                                    <!-- <td><?=$value["assign_by_emp_name"];?></td>//-->
                                    <td><?=$value["approve_not_approve_date"]!=""?$value['approve_not_approve_date']:"N/A";?></td>
                                    <td><?=$value["not_approve_remark"]!=""?$value['not_approve_remark']:"N/A";?></td>
                                    <td><?php if($value["receive_reject_status"]==3){?>
                                        <button type="button" class="btn btn-primary" onclick="Approvefun('<?=$value["_id"]?>','<?=$value["task_name"]?>');">Approve</button>
                                        <?php } 
                                        else if($value["receive_reject_status"]==4)
                                        {?> 
                                        Approved
                                        <?php }
                                        else
                                        {?> 
                                        N/A
                                        <?php }
                                        ?>
                                    </td>
                                    <td><?php if($value["receive_reject_status"]==3){?>
                                        <button type="button" class="btn btn-primary" onclick="Not_Approvefun(<?=$value["_id"];?>,'<?=$value["project_name"];?>','<?=$value["task_name"];?>','<?=$value["other_task"];?>');">Not Approve</button>
                                        <?php } 
                                        else if($value["receive_reject_status"]==5)
                                        {?> 
                                        Not Approved
                                        <?php }
                                        else
                                        {?> 
                                        N/A
                                        <?php }
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
    <!--===================================================-->
    <!--End page content-->
<?php //echo '<pre>';print_r($data); ?>
    <div class="modal fade" id="approve_task" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=URLROOT;?>/Task_Assign/approve_task">
                    <!--Modal header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title" id="reject_modal">Modal Heading</h4>
                    </div>

                    <!--Modal body-->
                    <div class="modal-body">
                        <input type="hidden" id="approve_id" name="approve_id" value="">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Task Name</label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="50" placeholder="Enter Task Remark " id="approve_task_name" name="approve_task_name" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="remark">Remark<span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" maxlength="250" placeholder="Enter Task Remarks" id="approve_task_remark" name="approve_task_remark" class="form-control"></textarea>
                                    <span id="approve_task_remark_error" class="text-danger"></span>
                                    <!--  <input type="text" maxlength="50" placeholder="Enter Task Remark " id="reject" name="remark" class="form-control"  onkeypress="return isAlpha(event);">//-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="remark">Score<span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="2" max="10" min="0" placeholder="Give a Score" id="approve_task_score" name="approve_task_score" class="form-control" onkeypress="return isNum(event)" required>
                                    <span id="approve_task_score_error" class="text-danger" ></span>
                                    <!--  <input type="text" maxlength="50" placeholder="Enter Task Remark " id="reject" name="remark" class="form-control"  onkeypress="return isAlpha(event);">//-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="button" onclick="approveTask()" id="btn_accept" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="not_approve_task" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=URLROOT;?>/Task_Assign/not_approve_task/">
                    <!--Modal header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title" id="reject_modal">Modal Heading</h4>
                    </div>

                    <!--Modal body-->
                    <div class="modal-body">
                        <input type="hidden" id="id" name="_id" value="_id" >
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Task Name</label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="50" placeholder="Enter Task Remark " id="task" name="task" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="remark">Remark<span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" maxlength="250" placeholder="Enter Task Remarks" id="reject" name="remark" class="form-control" onkeypress="return isAlpha(event);" ></textarea>
                                    <!--  <input type="text" maxlength="50" placeholder="Enter Task Remark " id="reject" name="remark" class="form-control"  onkeypress="return isAlpha(event);">//-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" id="btn_reject" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--===================================================-->
    <!--End Default Bootstrap Modal-->
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
<script src="<?=URLROOT;?>/common/assets/otherJs/validation.js"></script>
<script type="text/javascript">
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
        <?php if ($msgg = flashToast("taskApproveSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("taskRejectSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("taskDisapproveSuccess")) { ?>
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
                    text: 'excel',
                    extend: "excel",
                    title: "Report",
                    footer: { text: '' },
                    exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9] }
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
        $("#btn_reject").click(function(){
            var process = true;
            var reject = $("#reject").val();
            if(reject=="")
            {
                $("#reject").css({"border-color":"red"});
                $("#reject").focus();
                process = false;
            }
            return process;
        });
        $("#reject").keyup(function(){$(this).css('border-color','');});
        $("#to_date").change(function(){$(this).css('border-color','');});
    });
    function Approvefun(ID,task_name)
    {
        // debugger;
        // console.log(ID);
        // console.log(task_name); 
        // alert(ID);
        var result = confirm("Do You Want To Approve Task");
        if(result){
            $('#approve_id').val(ID);
            $('#approve_task_name').val(task_name);
            $('#approve_task').modal();
        }else{

            // window.location.replace("<?php //echo URLROOT;?>/Task_Assign/approve_task/"+ID);
        }
    }
    function Not_Approvefun(ID,project_name,task_name,other_task)
    {
        $("#id").val(ID);
        $("#reject_modal").html(project_name);
        if(task_name=="")
        {
            task_name = other_task;
        }
        $("#task").val(task_name);
        $("#not_approve_task").modal();
    }

    function approveTask(){
        // alert('within the function');
        var approve_id = $('#approve_id').val();
        var approve_task_name = $('#approve_task_name').val();
        var approve_task_remark = $('#approve_task_remark').val();
        var approve_task_score = $('#approve_task_score').val();
        if(approve_task_remark=='' || approve_task_score=='' || approve_task_score >10){
        
            $('#approve_task_remark_error').html('this field is required');
            $('#approve_task_score_error').html('Give a score in the range of 1-10');
            return false;
        }
        else{
            $('#approve_task_remark_error').html('');
            $('#approve_task_score_error').html('');

            $.ajax({
                type:'post',
                url:'<?=URLROOT;?>/Task_Assign/approve_task',
                data:{approve_id:approve_id,approve_task_name:approve_task_name,approve_task_remark:approve_task_remark,approve_task_score:approve_task_score},

                success:function(result){

                    if(result == 1){
                        alert("Task Approved Successfully");
                        location.reload();
                    }else{
                        alert("Task approval Failed");
                        location.reload();
                    }
                    
                }
            });
            
        }

    }

    function isNum(e, obj){
        
        
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
        
        
    }
    function validateScore(obj){
        //console.log(e);
        
        if($(obj).val() > 10){
            $(obj).val(null);
            $("#approve_task_score_error").html("Max 10");
        }
    }
</script>