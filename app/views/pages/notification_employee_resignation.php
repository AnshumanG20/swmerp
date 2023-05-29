<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Full & Final Settlment</a></li>
					<li class="active">Employee Resignation Notification Details</li>
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
					                <h3 class="panel-title">Employee Resignation Notification Details</h3>
					            </div>
					            <!--Horizontal Form-->
					            <!--===================================================-->
                                <?php $url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1];
                                ?>
                                <?php if(isset($data["resign_details"])):?>
                                <form class="form-horizontal" method="post" action="">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Notice Period </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="resign_date" name="resign_date" class="form-control" value="<?=$data["resign_details"]["notice_period"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="dept"> Reason</label>
                                            <div class="col-sm-4">
                                                <textarea class="form-control" id="textarea" name="textarea" readonly style=" border: none;"><?=$data["resign_details"]["terminate_resign_reason"];?></textarea> 
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="col-sm-12 text-danger" for="design"><u><b>Employee Basic Details</b></u> </label>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Employee Name </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?=$data["resign_details"]["first_name"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Designation </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="emp_post" name="emp_post" class="form-control" value="<?=$data["resign_details"]["designation_name"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Date Of Joining </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="doj" name="doj" class="form-control" value="<?=$data["resign_details"]["joining_date"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Current Project Name </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="project_name" name="project_name" class="form-control" value="<?=$data["resign_details"]["project_name"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="design">Work Location </label>
                                            <div class="col-sm-4" >
                                                <input type="text" id="work_location" name="work_location" class="form-control" value="<?=$data["resign_details"]["landmark"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="col-sm-3">
                                            </div>
                                            <div class="form-group">
                                                <a href="#" class="btn btn-success" data-toggle="modal" data-target="#accept_resignation">Accept Resignation</a>
                                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#reject_resignation"> Reject Resignation</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php endif;?>
                                <!--===================================================-->
                                <!--End Horizontal Form-->
                                
                                <!-- Accept Modal Start Here-->

                                <div class="modal" id="accept_resignation">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Accept Resignation</h4>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="<?=URLROOT;?>/resignation_Controller/accept_resignation">
                                                    <div class="form-group col-sm-12">
                                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                                         <input type="hidden" id="today_date" name="today_date" value="<?=date("Y-m-d");?>"/>
                                                        <input type="hidden" id="emply_id" name="emply_id" class="form-control" value="<?=$data["id"];?>">
                                                        <input type="hidden" id="quit_id" name="quit_id" class="form-control" value="<?=$data["quit_id"];?>">
                                                        <label class="col-sm-4 control-label" for="dept"> Notice Period Date <small class="text-danger"> *</small></label>
                                                        <div class="input-group date col-sm-6" style="padding-right: 10px; padding-left: 10px;">
                                                            <input type="text" id="emp_resign_date" name="emp_resign_date" class="form-control mask_date" value="<?=$data["resign_details"]["notice_period"];?>">
                                                            <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12">
                                                        <label class="col-sm-4 control-label" for="dept"> Assets Submission Date <small class="text-danger"> *</small></label>
                                                        <div class="input-group date col-sm-6" style="padding-right: 10px; padding-left: 10px;">
                                                            <input type="text" id="asset_submission_date" name="asset_submission_date" class="form-control mask_date" placeholder="Assets Submission Date" value="">
                                                            <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class=" col-sm-4">
                                                        </div>
                                                        <button class="btn btn-success" id="accept" name="accept" type="submit" style="margin-left: 15px;">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                             <!--Accept Modal End Here -->

                                <!-- Reject Modal Start Here-->

                                <div class="modal" id="reject_resignation">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Reject Resignation</h4>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="<?=URLROOT;?>/resignation_Controller/reject_resignation">
                                                    <div class="form-group col-sm-12">
                                                        <input type="hidden" id="emply_id" name="emply_id" class="form-control" value="<?=$data["id"];?>">
                                                        <input type="hidden" id="quit_id" name="quit_id" class="form-control" value="<?=$data["quit_id"];?>">
                                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                                        <label class="col-sm-2 control-label" for="dept"> Reason <small class="text-danger"> *</small></label>
                                                        <div class="col-sm-8">
                                                            <textarea class="form-control" id="reject_Reason" name="reject_Reason" placeholder="Resignation Reason"></textarea> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class=" col-sm-2">
                                                        </div>
                                                        <button class="btn btn-success" id="reject" name="reject" type="submit" style="margin-left: 20px;">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                             <!-- Reject Modal End Here -->

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

<script type="text/javascript">
    $('#emp_resign_date').datepicker({ 
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });

    $('#asset_submission_date').datepicker({ 
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $(document).ready(function(){
        $('#accept').click(function(){
            var process = true;
            var today_date = $('#today_date').val();
            var emp_resign_date = $('#emp_resign_date').val();
            if(emp_resign_date=="")
            {
                $("#emp_resign_date").css({"border-color":"red"});
                $("#emp_resign_date").focus();
                process = false;
            }
            if(emp_resign_date<today_date)
            {
                alert('Notice Period Date Must Be Greater Than Current Date');
                $("#emp_resign_date").css({"border-color":"red"});
                $("#emp_resign_date").focus();
                process = false;
            }
            var asset_submission_date = $('#asset_submission_date').val();
            if(asset_submission_date<today_date)
            {
                alert('Assets Submission Date Must Be Greater Than Current Date');
                $("#asset_submission_date").css({"border-color":"red"});
                $("#asset_submission_date").focus();
                process = false;
            }
            if(asset_submission_date=="")
            {
                $("#asset_submission_date").css({"border-color":"red"});
                $("#asset_submission_date").focus();
                process = false;
            }
            if(asset_submission_date > emp_resign_date)
            {
                alert('Assets Submission Date Should Be Less Than Or Equals To Notice Period Date');
                $("#asset_submission_date").css({"border-color":"red"});
                $("#asset_submission_date").focus();
                process = false;
            }
            return process;
        });
        $('#reject').click(function(){
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var reject_Reason = $("#reject_Reason").val();
            if (reject_Reason == '') {
                $("#reject_Reason").css({"border-color":"red"});
                $("#reject_Reason").focus();
                process = false;
            }else{
                if(!exp.test(reject_Reason))
                {
                    $("#reject_Reason").css({"border-color":"red"});
                    $("#reject_Reason").focus();
                    process = false;
                }
            }
            return process;
        });
        $("#emp_resign_date").change(function(){$(this).css('border-color','');});
        $("#asset_submission_date").change(function(){$(this).css('border-color','');});
        $("#reject_Reason").keyup(function(){$(this).css('border-color','');});
    });
</script>