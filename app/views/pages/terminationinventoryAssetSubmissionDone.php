
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
					<li class="active">Employee Termination Notification Details</li>
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
					                <h3 class="panel-title">Employee Termination Notification Details</h3>
					            </div>
					            <!--Horizontal Form-->
					            <!--===================================================-->
                                <?php $url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1];
                                ?>
                                <?php
                                    if(isset($data["terminationinventoryAssetSubmissionDone"])):
                                ?>
                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Termination/terminationfinalSettlment">
                                    <div class="panel-body">
                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                        <input type="hidden" id="emply_id_acc" name="emply_id_acc" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["emp_id"];?>">
                                        <input type="hidden" id="email_id" name="email_id" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["email_id"];?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Name </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["first_name"]." ".$data["terminationinventoryAssetSubmissionDone"]["middle_name"]." ".$data["terminationinventoryAssetSubmissionDone"]["last_name"];?>" readonly style=" border: none;">
                                            </div>
                                            <label class="col-sm-2 control-label">Employee Code </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="emp_code" name="emp_code" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["employee_code"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Designation </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="emp_designation" name="emp_designation" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["designation_name"];?>" readonly style=" border: none;">
                                            </div>
                                            <label class="col-sm-2 control-label" for="design">Last Date Of Termination </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="doj" name="doj" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["notice_period"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label" for="design">Total Penalty Amount </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="net_penalty" name="net_penalty" class="form-control" value="<?=$data["terminationinventoryAssetSubmissionDone"]["penalty_amount"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="col-sm-6 text-success" for="design"><b>Employee Assets Submitted Successfully </b> </label>

                                        
                                        <div class="form-group" >
                                            <div class="col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Final Settlment Date </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="dept"><b>Final Settlment Date</b> <small class="text-danger"> *</small></label>
                                                            <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
                                                                <input type="text" id="settlment_date" name="settlment_date" class="form-control mask_date" placeholder="Final Settlment Date" value="">
                                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-2">
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-success col-sm-4" id="final_settlment" name="final_settlment" type="submit">Final Settlment Date</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php endif;  ?>
                                <!--===================================================-->
                                <!--End Horizontal Form-->

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
    $('#settlment_date').datepicker({ 
        format: "yyyy-mm-dd",
        weekStart: 0,
        autoclose:true,
        todayHighlight:true,
        todayBtn: "linked",
        clearBtn:true,
        daysOfWeekHighlighted:[0]
    });
    $(document).ready(function(){
        $('#final_settlment').click(function(){
            var process = true;
            var doj = $('#doj').val();
            var settlment_date = $('#settlment_date').val();
            if(settlment_date=="")
            {
                $("#settlment_date").css({"border-color":"red"});
                $("#settlment_date").focus();
                process = false;
            }else{
                if(doj >= settlment_date){
                    alert('Settlment date should be greater than termination date !!!');
                    process = false;
                }
            }
            return process;
        });
        $("#settlment_date").change(function(){$(this).css('border-color','');});
    });
</script>
