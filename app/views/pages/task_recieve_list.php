<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">
<?php //echo '<pre>'; print_r($data); ?>
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
            <li><a href="#">Receive Task</a></li>
            <li class="active">Receive Task List</li>
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
                        <h5 class="panel-title">Receive Task List</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <div class ="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/search_recieve_task_list">

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
                                                    <option value="1" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="1")?"selected":"":"";?>>Assign Task</option>
                                                    <option value="2" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="2")?"selected":"":"";?>>Accepted Task</option>
                                                    <option value="0" <?=(isset($data['receive_reject_status']))?($data['receive_reject_status']=="0")?"selected":"":"";?>>Rejected Task</option>
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
                        <div class="table-responsive">
                            <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                      <!--  <th>Employee Name</th>//-->
                                        <th>Project Name</th>
                                        <th>Task Name</th>
                                        <!--  <th>Other Task</th>//-->
                                        <th>Assign Date/Time</th>
                                        <th>Deadline Date</th>
                                        <th>Task Assign Type</th>
                                        <th>Assigned By</th>
                                        <th>Remark</th>
                                        <th>Not Approval Remarks</th>
                                        <th>Approval State</th>
                                        <th>Task Score</th>
                                        <th>Accept Task</th>
                                        <th>Submit Task</th>
                                        <th>Reject</th>
                                        <th>Workground</th>
                                       <!-- <th>View</th>
//-->                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!isset($data['recieve_task'])):


                                    ?>
                                    <tr>
                                        <td colspan="15" style="text-align: center;">Data Not Available!!</td>
                                    </tr>
                                    <?php 
                                    else:
                                    $i=0;
                                    foreach ($data["recieve_task"] as $value):
                                        // echo '<pre>';print_r($value);
                                    ?>
                                    <tr class='<?php if($value["receive_reject_status"]==0 || $value["receive_reject_status"]==5){echo "text-danger";} else if($value["receive_reject_status"]==4){echo "text-success";}?>'>
                                        <td><?=++$i;?></td>
                                        <!--<td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
//-->                                        <td><?=$value["project_name"];?></td>
                                        <td><?=$value['task_name']!=""?$value["task_name"]:$value["other_task"];?></td>
                                        <!-- <td><?=$value["other_task"]!=""?$value["other_task"]:"N/A";?></td>//-->
                                        <td><?=$value["assign_date_time"];?></td>
                                        <td><?=date('d-m-y',strtotime($value["deadline_date_time"]));?></td>
                                        <td><?php if($value['reject_re_assign_task']!=""){?>
                                            Re_Assign Task
                                            <?php }
                                            else
                                            {?>
                                            New Assign Task
                                            <?php } ?>
                                        </td>
                                        <td><?=$value["assign_by_emp_name"];?></td>
                                        <td><?=$value["remarks_by_assigned"];?></td>
                                        <td><?=$value["not_approve_remark"]!=""?$value["not_approve_remark"]:"N/A";?></td>
                                        <td><?php if($value["receive_reject_status"]==3){?>
                                            Approval Pendding
                                            <?php } 
                                            else if($value["receive_reject_status"]==4)
                                            {?> 
                                            Approved
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
                                        <td><?= ($value['score']??null)? $value['score']:"N/A"; ?></td>
                                        <td>
                                            <?php
                                            if($value["receive_reject_status"]==1){?>
                                            <button type="button" class="btn btn-primary" onclick="Acceptfun(<?=$value["_id"];?>);">Accept Task</button>
                                            <?php }
                                            else if($value["receive_reject_status"]==2 || $value["receive_reject_status"]==3 ) {?>
                                            Task Accepted
                                            <?php }
                                            else {?>
                                            N/A
                                            <?php }
                                            ?>
                                        </td>
                                        <td> <?php 
                                            if($value["receive_reject_status"]==2){
                                                if(date("Y-m-d", strtotime($value["deadline_date_time"])) < date("Y-m-d")){
                                            ?>
                                            <button type="button" class="btn btn-primary" onclick="SubmitfunModel(<?=$value["_id"];?>, '<?=$value["project_name"];?>', '<?=$value["task_name"];?>','<?=$value["other_task"];?>');">Submit Task</button>
                                            <?php
                                                }else{
                                            ?>
                                            <button type="button" class="btn btn-primary" onclick="Submitfun(<?=$value["_id"];?>);">Submit Task</button>
                                            <?php
                                                }
                                            }else if($value["receive_reject_status"]==3){
                                            ?>
                                            Task Submitted
                                            <?php
                                            }else{
                                            ?>
                                            N/A
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>

                                            <?php
                                            if($value["receive_reject_status"]==1){?>
                                            <button type="button" class="btn btn-primary" onclick="Rejectfun(<?=$value["_id"];?>,'<?=$value["project_name"];?>','<?=$value["task_name"];?>');">Reject Task</button>
                                            <?php }
                                            else if($value["receive_reject_status"]==0){?>
                                            Task Rejected
                                            <?php }
                                            else{?>
                                            N/A
                                            <?php }
                                            ?>
                                        </td>
                                        <!-- ////////////////// -->
                                              <td>
<!-- "+uid+"/"+sidonclick="showWorkGround(<?=$value["_id"];?>,'<?php //$value["project_name"];?>','<?php //($value["task_name"] !='')?$value["task_name"]:$value["other_task"];?>');" -->

                                            <?php
                                            if($value["receive_reject_status"]>=2){?>
                                            <a href="<?=URLROOT;?>/Task_Assign/workground/<?=md5($value["_id"]);?>/<?=($value["task_name"] !='')?$value["task_name"]:$value["other_task"];?>" class="btn btn-primary">WorkGround</a>
                                            <?php 
                                                } 
                                             else{echo "N/A";}
                                          ?>
                                            <?php 
                                                // }
                                            // else{?>
                                            <!-- N/A -->
                                            <?php 
                                                // }
                                            ?>
                                        </td>
                                        <!-- ///////////////// -->
                                      <!--  <td>
                                            <a href="<?=URLROOT;?>/Task_Assign/view_recieve_task_list/<?=$value["_id"];?>" class="btn btn-primary add-tooltip" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="View Recieve Task Details"><i class="fa fa-eye"></i></a>
                                        </td>//-->

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
    <!--===================================================-->
    <!--End page content-->
    <!--Default Bootstrap Modal-->
    <!--===================================================-->
    <div class="modal fade" id="demo-default-modal" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=URLROOT;?>/Task_Assign/post_task/">
                    <!--Modal header-->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                        <h4 class="modal-title" id="modal-title">Modal Heading</h4>
                    </div>

                    <!--Modal body-->
                    <div class="modal-body">
                        <input type="hidden" id="_id" name="_id" value="_id" >
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="task_name">Task Name</label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="50" placeholder="Enter Task Remark " id="task_name" name="task_name" class="form-control" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="col-sm-3 control-label" for="remark">Remark<span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" maxlength="250" placeholder="Enter Task Remark" id="remark" name="remark" class="form-control" onkeypress="return isAlpha(event);" ></textarea>
                                    <!--<input type="text" maxlength="50" placeholder="Enter Task Remark " id="remark" name="remark" class="form-control"  onkeypress="return isAlpha(event);">//-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Modal footer-->
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button type="submit" id="btn_save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reject_task" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=URLROOT;?>/Task_Assign/reject_task/">
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
                                    <!-- <input type="text" maxlength="50" placeholder="Enter Task Remark " id="reject" name="remark" class="form-control"  onkeypress="return isAlpha(event);">//-->
                                    <textarea type="text" maxlength="250" placeholder="Enter Task Remark" id="reject" name="remark" class="form-control" onkeypress="return isAlpha(event);" ></textarea>
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
        <?php if ($msgg = flashToast("taskReceiveSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("taskRejectSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("taskSubmitSuccess")) { ?>
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
                    exportOptions: { columns: [ 0,1,2,3,4,5,6,7,8,9,10] }
                }]
        });
        $("#btn_save").click(function(){
            var process = true;
            var remark = $("#remark").val();
            if(remark=="")
            {
                $("#remark").css({"border-color":"red"});
                $("#remark").focus();
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
        $("#remark").keyup(function(){$(this).css('border-color','');});
        $("#reject").keyup(function(){$(this).css('border-color','');});
        $("#from_date").keyup(function(){$(this).css('border-color','');});
        $("#to_date").change(function(){$(this).css('border-color','');});

    });
    function Acceptfun(ID)
    {
        var result = confirm("Do You Want To Accept Task");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/recieve_task/"+ID);
    }
    function Rejectfun(ID,project_name,task_name)
    {
        $("#id").val(ID);
        $("#reject_modal").html(project_name);
        $("#task").val(task_name);
        $("#reject_task").modal();
    }
    function SubmitfunModel(ID, projectName, task_name,other_task){
        $("#_id").val(ID);
        if(task_name==""){
            task_name = other_task;
        }
        $("#modal-title").html(projectName);
        $("#task_name").val(task_name);
        $("#demo-default-modal").modal();
    }
    function Submitfun(ID)
    {
        var result = confirm("Do You Want To Submit Task");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/post_task/"+ID);
    }

    function showWorkGround(id,fid,sid){
        debugger;
        var uid = '<?=md5('+id+')?>';
        alert(uid);
        // alert(fid);
        var sid =sid;
        // var result = confirm("Do You Wish To Enter");
        // if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/workground/"+uid+"/"+sid);
    }
</script>