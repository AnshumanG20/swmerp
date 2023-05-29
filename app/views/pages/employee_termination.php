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
            <li><a href="#"></a>Termination</li>
            <li class="active">Termination Details</li>
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
                        <div class="col-sm-12" style="margin-top:15px;">
                            <div class="col-sm-6">
                                <b>Termination Details
                                </b>
                            </div>
                           <!--  <div class="col-sm-6"> 
                                <a href="<?=URLROOT;?>/Task_Assign/recieve_task_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left"></i> Back To List</a>
                            </div> -->
                        </div>
                    </div>
                    <?php
                    //print_r($data['first_name']);
                    ?>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/task_assign_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="design">Notice Period </label>
                                <div class="col-sm-4" >
                                    <input type="text" id="resign_date" name="resign_date" class="form-control" value="<?=$data["notice_period"];?>" readonly style=" border: none;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="design">Assets Submission Date </label>
                                <div class="col-sm-4" >
                                    <input type="text" id="asset_date" name="asset_date" class="form-control" value="<?=$data["asset_submission_date"];?>" readonly style=" border: none;">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="dept"> Reason</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" id="termination_reason" name="termination_reason" readonly><?=$data['terminate_resign_reason'];?></textarea> 
                                </div>
                            </div>
                            <div class="content" id="content">
                                <b class="text-danger">Company decided to terminate you and your termination notice period given above</b>
                            </div>
                            <hr>
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
$.ajax({
    type:"POST",
    url: "<?=URLROOT;?>/Notification/NotiDeactivate",
    dataType: "json",
    <?php $url= explode("/sri/", $_SERVER['REQUEST_URI'])[1];?>
    data: {'employee_id':<?=$_SESSION['emp_details']['_id'];?>, 'link':'<?=$url;?>'},
    success:function(data){}
});
</script>