
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
                    <li><a href="#">Termination</a></li>
                    <li class="active">Employee Temination</li>
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
                                    <h3 class="panel-title">Employee Termination</h3>
                                </div>
                                <!--Horizontal Form-->
                                <!--===================================================-->
                                <?php $url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1]; 
                                
                                ?>
                                <?php
                                    if(isset($data["performance"])):
                                ?>

                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Termination/termination_employee_performance">
                                <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                                    <div class="panel-body">
                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Name </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?=$data["performance"]["first_name"]." ".$data["performance"]["middle_name"]." ".$data["performance"]["last_name"];?>" readonly style=" border: none;">
                                            </div>
                                            <label class="col-sm-2 control-label">Employee Code </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="emp_code" name="emp_code" class="form-control" value="<?=$data["performance"]["employee_code"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Designation </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="emp_designation" name="emp_designation" class="form-control" value="<?=$data["performance"]["designation_name"];?>" readonly style=" border: none;">
                                            </div>
                                            <label class="col-sm-2 control-label" for="design">Date Of Joining </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="doj" name="doj" class="form-control" value="<?=$data["performance"]["joining_date"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <hr>
                                        
                                        <div class="form-group" >
                                            <div class="col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Give The Feedback To Employee According To His/Her Work Performance </h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="dept"><b>Work Performance</b> <small class="text-danger"> *</small></label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control" id="termination_work_performance" name="termination_work_performance" placeholder="Employee Feedback"></textarea> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-2">
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-success col-sm-4" id="submit_feedback" name="submit_feedback" type="submit">Submit Feedback</button>

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
    $(document).ready(function(){
        $('#submit_feedback').click(function(){
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var termination_work_performance = $('#termination_work_performance').val();
            if (termination_work_performance == '') 
            {
                $("#termination_work_performance").css({"border-color":"red"});
                $("#termination_work_performance").focus();
                process = false;
            }
            else
            {
                if(!exp.test(termination_work_performance))
                {
                    $("#termination_work_performance").css({"border-color":"red"});
                    $("#termination_work_performance").focus();
                    process = false;
                }
            }
            return process;
        });
        $("#termination_work_performance").keyup(function(){$(this).css('border-color','');});
    });
</script>