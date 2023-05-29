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
            <li><a href="#">Masters</a></li>
            <li class="active">Add/Update Task</li>
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
                        <h3 class="panel-title">Add/Update Task</h3>

                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task/task_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="dept"> Project Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <select id="project_mstr_id" name="project_mstr_id" class="form-control">
                                        <option value="-">--select--</option>
                                        <?php foreach($data["project"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["project_mstr_id"]))?($data["project_mstr_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["project_name"]?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="task_name">Task Name<span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="50" placeholder="Enter Task Name" id="task_name" name="task_name" class="form-control" value="<?=(isset($data['task_name']))?$data['task_name']:"";?>" onkeypress="return isAlpha(event);" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="description">Description<span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" maxlength="250" placeholder="Enter Task Description" id="description" name="description" class="form-control" ><?=(isset($data['description']))?$data['description']:"";?></textarea>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" id="btn_task" name="btn_task" type="submit"><?=(isset($data["_id"]))?"Edit Task":"Add Task";?></button>
                                <a href="<?=URLROOT;?>/Task/taskList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="color: red; text-align: center;">
                                    <?php
                                    if(isset($error))
                                    {
                                        foreach ($error as $value)
                                        {
                                            echo $value;
                                            echo "<br />";
                                        }
                                    }
                                    ?>
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

        <?php if ($msgg = flashToast("taskExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>



        $("#btn_task").click(function() {
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var project_mstr_id = $("#project_mstr_id").val();
            if (project_mstr_id=='-') {
                $("#project_mstr_id").css({"border-color":"red"});
                $("#project_mstr_id").focus();
                process = false;
            }
            var task_name = $("#task_name").val();
            var task = task_name.trim();
            if (task == 'null' || task=="") {
                $("#task_name").css({"border-color":"red"});
                $("#task_name").focus();
                process = false;
            }
            var description = $('#description').val();
                description = description.trim();
            //var result = exp.test(description);
            if(!exp.test(description))
            {
                alert("Description Is Only Alpha Numeric Value");
                $("#description").css({"border-color":"red"});
                $("#description").focus();
                process = false;
            }
            return process;
        });
        $("#project_mstr_id").change(function(){$(this).css('border-color','');});
        $("#task_name").keyup(function(){$(this).css('border-color','');});
        $("#description").keyup(function(){$(this).css('border-color','');});
    });
</script>