<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Schedule Interview</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
                    </ol>
                    <!--End breadcrumb-->

                </div>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
					<div class="row">
					    <div class="col-sm-12">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Schedule Interview</h3>
					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/InterviewController/schedule_interview">
                                    <div class="panel-body">
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label">Company Name</label>
					                        <label class="col-sm-4 control-label"><b>Sri Publication & Stationers Pvt. Ltd.</b></label>
					                    </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Project Name</label>
                                             <div class="col-sm-4">
                                                  <select id="project_mstr_id" name="project_mstr_id" class="form-control">
                                                      <option value="">Select</option>
                                               <?php if(isset($data["projectList"])):?>
                                                    <?php foreach ($data["projectList"] as $key => $value):?> 

                                                    <option value="<?=$value["project_mstr_id"];?>" <?=(isset($data["project_mstr_id"]))?($data["project_mstr_id"]==$value["project_mstr_id"])?"selected='selected'":"":"";?>><?=$value["project_name"];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                 </select>
                                              </div>
					                    </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label">Post Name</label>
                                             <div class="col-sm-4">
                                                 <select id="job_post_mstr_id" name="job_post_mstr_id" class="form-control">
                                                     <option value="">Select</option>
                                               <?php if(isset($data["jobList"])):?>
                                                    <?php foreach ($data["jobList"] as $key => $value):?> 

                                                    <option value="<?=$value["designation_mstr_id"];?>" <?=(isset($data["designation_mstr_id"]))?($data["designation_mstr_id"]==$value["designation_mstr_id"])?"selected='selected'":"":"";?>><?=$value["designation_name"];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                 </select>
                                              </div>
					                    </div>
                                        <div class="form-group">
                                             <label class="col-sm-3 control-label"> Interview Location</label>
                                             <div class="col-sm-4">
                                                 <select id="location_mstr_id" name="location_mstr_id" class="form-control">
                                                     <option value="">Select</option>
                                                    <?php if(isset($data["locationList"])):?>
                                                    <?php foreach ($data["locationList"] as $key => $value):?>
                                                   <option value="<?=$value["location_mstr_id"];?>" <?=(isset($data["location_mstr_id"]))?($data["location_mstr_id"]==$value["location_mstr_id"])?"selected='selected'":"":"";?>><?=$value["address"];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                  </select>
                                              </div>
					                    </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >Interview Start Date </label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
						                            <input type="text" id="interview_start_date" name="start_date" class="form-control mask_date" placeholder="Mention Interview Start Date">
						                            <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >Interview End Date </label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
						                            <input type="text" id="interview_end_date" name="end_date" class="form-control mask_date" placeholder="Mention Interview Start Date">
						                            <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >Interview Start Time </label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
						                            <input id="interview_start_time" name="interview_start_time" type="text" class="form-control">
                                                    <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" >Interview End Time </label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
					                                <input id="interview_end_time" name="interview_end_time" type="text" class="form-control">
					                                <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Interview Round Details</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover table-bordered table-condensed" >
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th>Interview Round</th>
                                                                        <th>Department</th>
                                                                        <th>Designation</th>
                                                                        <th>Interviewer</th>
                                                                        <th>Description</th>
                                                                     </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>First Round</td>
                                                                        <td>HR Deparment</td>
                                                                        <td>HR</td>
                                                                        <td>
                                                                            <select id="employee_id" name="employee_id[]" class="selectpicker" multiple title="Choose one of the following..." data-width="100%">
                                                                                 <?php if(isset($data["hrList"])):?>
                                                                                <?php foreach ($data["hrList"] as $key => $value):?>
                                                                                <option value="<?=$value["employee_id"];?>" <?=(isset($data["employee_id"]))?($data["employee_id"]==$value["employee_id"])?"selected='selected'":"":"";?>><?=$value["employee_name"];?></option>
                                                                                <?php endforeach;?>
                                                                                <?php endif;?>
                                                                            </select>
                                                                        </td>
                                                                        <td><textarea type="text" id="description" name="description" class="form-control" value="" ></textarea></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Second Round</td>
                                                                        <td>
                                                                            <select id="department_mstr_id" name="department_mstr_id" class="form-control">
                                                                                <option value="">Select</option>
                                                                                <?php if(isset($data["departmentList"])):?>
                                                                                <?php foreach ($data["departmentList"] as $key => $value):?> 
                                                                                <option value="<?=$value["department_mstr_id"];?>" <?=(isset($data["department_mstr_id"]))?($data["department_mstr_id"]==$value["department_mstr_id"])?"selected='selected'":"":"";?>><?=$value["dept_name"];?></option>
                                                                                <?php endforeach;?>
                                                                                <?php endif;?>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select id="designation_mstr_id" name="designation_mstr_id" class="form-control">
                                                                                <option value="">Select</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>
                                                                            <select id="department_employee_id" name="department_employee_id[]" class="form-control" multiple title="Choose one of the following..." data-width="100%">
                                                                            </select>
                                                                        </td>
                                                                        <td><textarea type="text" id="descriptionsecond" name="descriptionsecond" class="form-control" value="" ></textarea></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btn_sch_int" name="btn_sch_int" type="submit">SAVE</button>

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
<script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/plugins/select2/js/select2.min.js"></script>

<script type="text/javascript">
    $('#interview_start_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#interview_end_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
        autoclose:true,
        autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
        });
    $('#interview_start_time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
        });
    $('#interview_end_time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });
    $("#department_mstr_id").change(function(){

    var department_mstr_id = $("#department_mstr_id").val();
    if(department_mstr_id==""){
        $("#designation_mstr_id").html('<option value="-">== SELECT ==</option>');
    }else{

        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/InterviewController/ajaxDesignationMstrListByDeptId",
            dataType: "json",
            data: {"department_mstr_id":department_mstr_id},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    $("#designation_mstr_id").html(data.data);
                }
            }
         });
    }
});

$("#designation_mstr_id").change(function(){
    var designation_mstr_id = $("#designation_mstr_id").val();
    if(designation_mstr_id==""){
        $("#department_employee_id").html('<option value="-">== SELECT ==</option>');
    }else{
    //  alert(designation_mstr_id);
        $.ajax({

            type:"POST",
            url: "<?=URLROOT;?>/InterviewController/ajaxEmployeeListByDesignationId",
            dataType: "json",
            data: {"designation_mstr_id":designation_mstr_id},
            beforeSend: function() {

                $("#loadingDiv").show();
            },
            success:function(data){
                console.log(data);
                $("#loadingDiv").hide();
                if(data.response==true){

                    $("#department_employee_id").html(data.data);
                }
            }
         });
    }
});
</script>