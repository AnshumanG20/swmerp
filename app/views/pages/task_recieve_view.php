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
            <li><a href="#"></a>Task Notification Details</li>
            <li class="active">Task Notification Details</li>
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
                                <b> Task Notification Details
                                </b>
                            </div>
                            <div class="col-sm-6"> 
                                <a href="<?=URLROOT;?>/Task_Assign/recieve_task_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left"></i> Back To List</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    //print_r($data['first_name']);
                    ?>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/task_assign_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <div class="panel-body">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label class="col-sm-2" for="employee_name">Employee Name</label>
                                    <div class="col-sm-3">
                                        <b> <?=$data['first_name']." ".$data['middle_name']." ".$data['last_name'];?></b>
                                    </div>
                                    <label class="col-sm-2" for="project_name"> Project Name</label>
                                    <div class="col-sm-3">
                                        <b><?= $data['project_name'];?></b>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2" for="task_name"> Task Name </label>
                                    <div class="col-sm-3">
                                        <b><?= $data['task_name']!=''?$data['task_name']:$data['other_task'];?></b>
                                    </div>
                                    <label class="col-sm-2" for="remark">Remark</label>
                                    <div class="col-sm-3">
                                        <b><?= $data['remarks_by_assigned'];?></b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2" for="remark">Assign Date/Time</label>
                                    <div class="col-sm-3">
                                        <b><?=$data['assign_date_time'];?></b>
                                    </div>
                                    <label class="col-sm-2" for="deadline_date">Deadline Date</label>
                                    <div class="col-sm-3">
                                        <b><?=date('d-m-y',strtotime($data['deadline_date_time']));?></b>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="col-sm-3">
                                        <button type="button" class="btn btn-primary" onclick="Acceptfun(<?=$value["_id"];?>);">Accept Task</button>
                                    </div>
                                    <label class="col-sm-2" for="deadline_date">Deadline Date</label>
                                    <div class="col-sm-3">
                                        <b><?=date('d-m-y',strtotime($data['deadline_date_time']));?></b>
                                    </div>
                                </div> -->

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
    /*function Acceptfun(ID)
    {
        var result = confirm("Do You Want To Accept Task");
        if(result)
            window.location.replace("<?=URLROOT;?>/Task_Assign/recieve_task/"+ID);
    }*/
</script>