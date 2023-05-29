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
            <li><a href="#"></a>Re-Assign Task</li>
            <li class="active">Re-Assign Task</li>
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
                        <h3 class="panel-title">Re-Assign Task</h3>

                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Task_Assign/task_re_assign_add_update">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="employee_name"> Employee Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <select id="assigned_emp_details_id" name="assigned_emp_details_id" class="form-control">
                                        <option value="">--select--</option>
                                        <?php foreach($data["emp"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["assigned_emp_details_id"]))?($data["assigned_emp_details_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["first_name"]." ".$value['middle_name']." ".$value['last_name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="project_name"> Project Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <?php foreach($data['project'] as $value): ?>
                                    <?php if($data['project_mstr_id']==$value["_id"]): ?>
                                    <input type="hidden" id="project_mstr_id" name="project_mstr_id" value="<?=$value["_id"];?>">
                                    <input type="text" class="form-control" value="<?=$value["project_name"]?>" readonly>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="task_name"> Task Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <?php foreach($data['task'] as $value):?>
                                    <?php if($data['task_list_mstr_id']==$value['_id']): ?>
                                    <input type="hidden" id="task_list_mstr_id" name="task_list_mstr_id" value="<?=$value["_id"];?>">
                                    <input type="text" class="form-control" value="<?=$value["task_name"];?>" readonly>
                                    <?php endif;?>
                                    <?php endforeach ;?>
                                </div>
                            </div>
                            <div class="form-group otherHide">
                                <label class="col-sm-3 control-label" for="other_task">Other<span class="text-danger">*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" maxlength="50" placeholder="Enter Other Task" id="other_task" name="other_task" class="form-control" value="<?=(isset($data['other_task']))?$data['other_task']:"";?>" onkeypress="return isAlpha(event);" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="remark">Remark<span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" maxlength="250" placeholder="Enter Task Remarks" id="remarks_by_assigned" name="remarks_by_assigned" class="form-control" ><?=(isset($data['remarks_by_assigned']))?$data['remarks_by_assigned']:"";?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="deadline_date">Deadline Date <span class="text-danger"> *</span></label>
                                <div class="col-sm-4">
                                    <input type="date" id="deadline_date_time" name="deadline_date_time" class="form-control" value="<?=(isset($data['deadline_date_time']))?date("Y-m-d", strtotime($data['deadline_date_time'])):date('Y-m-d');?>" min="<?=date("Y-m-d");?>" />
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <input class="btn btn-success" id="btn_task_assign" name="btn_task_assign" type="submit" value="Re-Assign Task">
                                <a href="<?=URLROOT;?>/Task_Assign/re_assign_task_list" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
        $('.otherHide').hide();
        var task_list = $("#task_list_mstr_id").val();
        if(task_list!="")
        {
            if(task_list=="0")
            {
                $('.otherHide').show();
            }
            else
            {
                $('.otherHide').hide();
            }
        }

        $('#project_mstr_id').change(function(){
            var project_mstr_id = $("#project_mstr_id").val()
            if(project_mstr_id!="-"){
                $.ajax({
                    type: "POST",
                    url: "<?=URLROOT;?>/Task_Assign/ajax_task_name/",
                    dataType:"json",
                    data:{
                        project_mstr_id:project_mstr_id
                    },
                    beforeSend: function() {
                        $("#loadingDiv").show();
                    },
                    success: function(data){
                        $("#loadingDiv").hide();
                        if(data.response==true){
                            $("#task_list_mstr_id").html(data.data);
                        }else{
                            $("#task_list_mstr_id").html("<option value=''>--select--</option>");
                        }
                    }
                });
            }else{
                $("#task_list_mstr_id").html("<option value='-'>--select--</option>");
            }

        });
        $("#task_list_mstr_id").click(function(){
            var task_list = $("#task_list_mstr_id").val();
            // alert(task_list);
            if(task_list=="0")
            {
                $('.otherHide').show();
            }
            else
            {
                $('.otherHide').hide();
                $("#other_task").val('');
            }
        });
        $("#btn_task_assign").click(function() {
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var assigned_emp_details_id = $("#assigned_emp_details_id").val();
            if (assigned_emp_details_id=="") {
                $("#assigned_emp_details_id").css({"border-color":"red"});
                $("#assigned_emp_details_id").focus();
                process = false;
            }

            var project_mstr_id = $("#project_mstr_id").val();
            if (project_mstr_id=="") {
                $("#project_mstr_id").css({"border-color":"red"});
                $("#project_mstr_id").focus();
                process = false;
            }

            var  task_list_mstr_id = $("#task_list_mstr_id").val();
            if ( task_list_mstr_id=="") {
                $("#task_list_mstr_id").css({"border-color":"red"});
                $("#task_list_mstr_id").focus();
                process = false;
            }
            if(task_list_mstr_id=="0")
            {
                var other_task = $("#other_task").val();
                if ( other_task=="") {
                    $("#other_task").css({"border-color":"red"});
                    $("#other_task").focus();
                    process = false;
                }
            }
            var remarks_by_assigned = $('#remarks_by_assigned').val();
            if(!exp.test(remarks_by_assigned))
            {
                alert("Task Remark Is Only Alpha Numeric Value");
                $("#remarks_by_assigned").css({"border-color":"red"});
                $("#remarks_by_assigned").focus();
                process = false;
            } 
            var deadline_date_time = $('#deadline_date_time').val();
            if(deadline_date_time=="")
            {
                $("#deadline_date_time").css({"border-color":"red"});
                $("#deadline_date_time").focus();
                process = false;
            } 
            return process;
        });
        $("#assigned_emp_details_id").change(function(){$(this).css('border-color','');});
        $("#project_mstr_id").change(function(){$(this).css('border-color','');});
        $("#task_list_mstr_id").change(function(){$(this).css('border-color','');});
        $("#other_task").keyup(function(){$(this).css('border-color','');});
        $("#remarks_by_assigned").keyup(function(){$(this).css('border-color','');});
        $("#deadline_date_time").keyup(function(){$(this).css('border-color','');});

        <?php if(!isset($data["_id"])){ ?>
        $("#project_mstr_id").trigger("change");
        <?php }?>
    });
</script>