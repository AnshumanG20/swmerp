<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!-- <h1 class="page-header text-overflow">Add/Update Department</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Termination</a></li>
            <li class="active">Termination Employee</li>
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
                        <h3 class="panel-title">Termination Employee</h3>
                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-vertical" method="post" action="<?=URLROOT;?>/Termination/add_update_termination/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                        <div class="panel-body">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="employee_name"> Employee Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <select id="employee_id" name="employee_id" class="form-control">
                                        <option value="">--Select--</option>
                                        <?php foreach($data["emp"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["assigned_emp_details_id"]))?($data["assigned_emp_details_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["first_name"]." ".$value['middle_name']." ".$value['last_name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <label class="col-sm-2 control-label" for="notice_period">Notice Period<span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="date" placeholder="Enter Notice Period" id="notice_period" name="notice_period" class="form-control" value="<?=date("Y-m-d");?>" min="<?=date("Y-m-d");?>" />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <label class="col-sm-2 control-label" for="asset_submission_date">Assets Submission Date <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input type="date" placeholder="Enter Notice Period" id="asset_submission_date" name="asset_submission_date" class="form-control" value="<?=date("Y-m-d");?>" min="<?=date("Y-m-d");?>" />
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <label class="col-sm-2 control-label" for="terminate_resign_reason">Reason<span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <textarea type="text" maxlength="250" placeholder="Enter Reason" id="terminate_resign_reason" name="terminate_resign_reason" class="form-control" ></textarea>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="panel-footer text-center">
                                        <button class="btn btn-success" id="btn_termination" name="btn_termination" type="submit">Termination</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
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
    $(document).ready( function () {
        $("#btn_termination").click(function() {
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var notice_period = $("#notice_period").val();
            if (notice_period == '') {
                $("#notice_period").css({"border-color":"red"});
                $("#notice_period").focus();
                process = false;
            }
             var employee_id = $("#employee_id").val();
            if (employee_id == '') {
                $("#employee_id").css({"border-color":"red"});
                $("#employee_id").focus();
                process = false;
            }
            var asset_submission_date = $("#asset_submission_date").val();
            if (asset_submission_date == '') {
                $("#asset_submission_date").css({"border-color":"red"});
                $("#asset_submission_date").focus();
                process = false;
            }
            var terminate_resign_reason = $("#terminate_resign_reason").val();
            if (terminate_resign_reason == '') {
                $("#terminate_resign_reason").css({"border-color":"red"});
                $("#terminate_resign_reason").focus();
                process = false;
            }else{
                if(!exp.test(terminate_resign_reason))
                {
                    $("#terminate_resign_reason").css({"border-color":"red"});
                    $("#terminate_resign_reason").focus();
                    process = false;
                }
            }
            if(notice_period<asset_submission_date)
            {
                alert("Assets Submition Date Should Be Less Than Notice Period Date");
                $("#asset_submission_date").css({"border-color":"red"});
                $("#asset_submission_date").focus();
                process = false;
            }
            return process;
        });
        $("#notice_period").keyup(function(){$(this).css('border-color','');});
        $("#employee_id").change(function(){$(this).css('border-color','');});
        $("#asset_submission_date").change(function(){$(this).css('border-color','');});
        $("#terminate_resign_reason").keyup(function(){$(this).css('border-color','');});
    });
</script>