<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Schedule Interview</h1>
                    </div>
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
                    </ol>
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <div id="page-content">
					<div class="row">
					    <div class="col-sm-12">
					        <div class="panel">
					            <div class="panel-heading">
                                    <div class="panel-control">
                                        <a href="<?=URLROOT;?>/InterviewController/interview_list" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a>
                                    </div>
					                <h3 class="panel-title">Schedule Interview</h3>
					            </div>
					            <!--Horizontal Form-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/InterviewController/interviewschedule_add_update/<?=(isset($data["candidateIdDetailBack"]))?$data["candidateIdDetailBack"]:"";?>">
                                    <div class="panel-body">
                                        <div class="form-group">
					                        <label class="col-sm-2 control-label">Company Name</label>
					                        <label class="col-sm-4 control-label" style="text-align:left;"><b>Aadrika Enterprises</b></label>
					                    </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 control-label">Project Name<span class="text-danger"> * </span></label>
                                            <div class="col-sm-4">
                                            <?php
                                            if(isset($data['jobPostDetailById'])){ 
                                            ?>
                                                <input type="hidden" id="project_mstr_id" name="project_mstr_id" value="<?=$data['jobPostDetailById']['project_name_id'];?>">
                                                <?php 
                                                    if(isset($data["projectList"])){
                                                        foreach ($data["projectList"] as $key => $value){
                                                            if($value["project_mstr_id"]==$data['jobPostDetailById']['project_name_id']){
                                                ?>
                                                                <input type="text" id="project_mstr" name="project_mstr" class="form-control" value="<?=$value["project_name"];?>" readonly>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            <?php
                                            }else{
                                            ?>
                                                <select id="project_mstr_id" name="project_mstr_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php if(isset($data["projectList"])):?>
                                                    <?php foreach ($data["projectList"] as $key => $value):?> 
                                                    <option value="<?=$value["project_mstr_id"];?>" <?=(isset($data["project_mstr_id"]))?($data["project_mstr_id"]==$value["project_mstr_id"])?"selected='selected'":"":"";?>><?=$value["project_name"];?></option>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                             <?php
                                            }
                                            ?>
                                            </div>
					                    </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 control-label">Post Name <span class="text-danger"> * </span></label>
                                            <div class="col-sm-4">
                                            <?php
                                            if(isset($data['jobPostDetailById'])){
                                            ?>
                                                <input type="hidden" id="job_post_detail_id" name="job_post_detail_id" value="<?=$data['jobPostDetailById']['job_post_id'];?>">
                                                <?php 
                                                    if(isset($data["postList"])){
                                                        foreach ($data["postList"] as $key => $value){
                                                            if($value["designation_mstr_id"]==$data['jobPostDetailById']['designation_mstr_id']){
                                                ?>
                                                                <input type="text" id="job_post_detail" name="job_post_detail" class="form-control" value="<?=$value["designation_name"];?>" readonly>
                                                <?php
                                                            }
                                                        }
                                                    }
                                                ?>
                                            <?php
                                            }else{
                                            ?>
                                                <select id="job_post_detail_id" name="job_post_detail_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php if(isset($data["postList"])):?>
                                                    <?php foreach ($data["postList"] as $key => $value):?> 
                                                    <option value="<?=$value["job_post_detail_id"];?>" <?=(isset($data["designation_mstr_id"]))?($data["designation_mstr_id"]==$value["job_post_detail_id"])?"selected='selected'":"":"";?>><?=$value["designation_name"];?></option>
                                                    <?php endforeach;?>
                                                    <?php endif;?>
                                                </select>
                                            <?php
                                            }
                                            ?>
                                            </div>
					                    </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 control-label"> Interview Location <span class="text-danger"> * </span></label>
                                             <div class="col-sm-4">
                                                 <select id="location_mstr_id" name="location_mstr_id" class="form-control">
                                                     <option value="">Select</option>
                                                    <?php if(isset($data["locationList"])):?>
                                                    <?php foreach ($data["locationList"] as $key => $value):?>
                                                     <optgroup label="City : <?=$value["city"];?>">
                                                        <option value="<?=$value["location_mstr_id"];?>" <?=(isset($data["location_mstr_id"]))?($data["location_mstr_id"]==$value["location_mstr_id"])?"selected='selected'":"":"";?>><?=$value["address"];?></option>
                                                    </optgroup>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                                  </select>
                                              </div>
					                    </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Interview Start Date <span class="text-danger"> * </span></label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
						                            <input type="text" id="interview_start_date" name="start_date" class="form-control mask_date" placeholder="Mention Interview Start Date">
						                            <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Interview End Date <span class="text-danger"> * </span></label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
						                            <input type="text" id="interview_end_date" name="end_date" class="form-control mask_date" placeholder="Mention Interview End Date">
						                            <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Interview Start Time <span class="text-danger"> * </span></label>
                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
						                            <input id="interview_start_time" name="interview_start_time" type="text" class="form-control">
                                                    <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
						                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Interview End Time <span class="text-danger"> * </span></label>
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
                                                        <div class="form-group">
                                                            <label class="col-sm-2 text-danger"><b><u>HR Round Details:</u></b></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Department</label>
                                                            <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
                                                                <input id="first_round_department" name="first_round_department" type="hidden" class="form-control" value="2" readonly>
                                                                <input id="first_round_department_name" name="first_round_department_name" type="text" class="form-control" value="HR Department" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Designation</label>
                                                            <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
                                                                <input id="first_round_designation" name="first_round_designation" type="hidden" class="form-control" value="9" readonly>
                                                                <input id="first_round_designation_name" name="first_round_designation_name" type="text" class="form-control" value="HR Manager" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Interview Type <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <select id="first_round_interview_type" name="first_round_interview_type" class="form-control">
                                                                    <option value="">Select</option>
                                                                    <option value="Face to face">Face to face</option>
                                                                    <option value="Telephonic">Telephonic</option>
                                                                    <option value="Online">Online</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Interviewer Panel <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <select id="employee_id" name="employee_id[]" class="selectpicker" multiple title="Choose one of the following..." data-width="100%">
                                                                    <?php if(isset($data["hrList"])):?>
                                                                    <?php foreach ($data["hrList"] as $key => $value):?>
                                                                    <option value="<?=$value["employee_id"];?>" <?=(isset($data["employee_id"]))?($data["employee_id"]==$value["employee_id"])?"selected='selected'":"":"";?>><?=$value["employee_name"];?></option>
                                                                    <?php endforeach;?>
                                                                    <?php endif;?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Remarks <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <textarea type="text" id="firstdescription" name="firstdescription" class="form-control" value="" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 text-danger"><b><u>Department Round Details:</u></b></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Department <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <select id="department_mstr_id" name="department_mstr_id[]" class="form-control" multiple>
                                                                    <option value="">Select</option>
                                                                    <?php if(isset($data["departmentList"])):?>
                                                                    <?php foreach ($data["departmentList"] as $key => $value):?>
                                                                    <option value="<?=$value["department_mstr_id"];?>" <?=(isset($data["department_mstr_id"]))?($data["department_mstr_id"]==$value["department_mstr_id"])?"selected='selected'":"":"";?>><?=$value["dept_name"];?></option>
                                                                    <?php endforeach;?>
                                                                    <?php endif;?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Interview Type <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <select id="second_round_interview_type" name="second_round_interview_type" class="form-control">
                                                                    <option value="">Select</option>
                                                                    <option value="Face to face">Face to face</option>
                                                                    <option value="Telephonic">Telephonic</option>
                                                                    <option value="Online">Online</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Interviewer Panel <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <select id="dremployee_id" name="dremployee_id[]" class="form-control" multiple title="Choose one of the following..." data-width="100%">
                                                                    <?php if(isset($data["getEmpname"])):?>
                                                                    <?php foreach ($data["getEmpname"] as $key => $value):?>
                                                                    <option value="<?=$value["_id"];?>"><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></option>
                                                                    <?php endforeach;?>
                                                                    <?php endif;?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Remarks <span class="text-danger"> * </span></label>
                                                            <div class="col-sm-4">
                                                                <textarea type="text" id="second_round_description" name="second_round_description" class="form-control" value="" ></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">&nbsp;</label>
                                                            <div class="col-sm-4">
                                                                <button class="btn btn-success btn-md" id="btn_sch_int" name="btn_sch_int" type="submit">SAVE</button>
                                                            </div>
                                                        </div>
                                                    </div>
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
</script>

<script type="text/javascript">
$("#department_mstr_id").click(function () {
    if( $('#department_mstr_id :selected').length > 0){

        var department_mstr_id = [];
        $('#department_mstr_id :selected').each(function(i, selected) {
            department_mstr_id.push($(selected).val());
        });
        //console.log(department_mstr_id);
        $.ajax({
            type: "POST",
            url: "<?=URLROOT;?>/InterviewController/departmentempnm",
            data: {department_mstr_id:department_mstr_id},
            cache: false,
            dataType: "json",
            success:function(html){	
			//alert(html);
                $('#dremployee_id').html(html.data);
                if(html.response==true){
                    $('#dremployee_id').html(html.data);
                }else{
                    $('#dremployee_id').html("<option value=''>SELECT</option>");
                }

            }
        });	
	}else{
        $("#dremployee_id").html('<option value="">SELECT<option>');
    }
});	


</script>
<script type="text/javascript">
    function convertTime24(time){
        var hours = Number(time.match(/^(\d+)/)[1]);
        var minutes = Number(time.match(/:(\d+)/)[1]);
        var AMPM = time.match(/\s(.*)$/)[1];
        if(AMPM == "PM" && hours<12) hours = hours+12;
        if(AMPM == "AM" && hours==12) hours = hours-12;
        var sHours = hours.toString();
        var sMinutes = minutes.toString();
        if(hours<10) sHours = "0" + sHours;
        if(minutes<10) sMinutes = "0" + sMinutes;
        return sHours + ":" + sMinutes;
    }
    $("#btn_sch_int").click(function(){
    process = true;
      var currentDate = "<?=date('Y-m-d')?>";
      var project_mstr_id = $("#project_mstr_id").val();
      var job_post_detail_id = $("#job_post_detail_id").val();
	  var location_mstr_id = $("#location_mstr_id").val();
      var interview_start_date = $("#interview_start_date").val();
      var interview_end_date = $("#interview_end_date").val();
	  var interview_start_time = $("#interview_start_time").val();
      var interview_end_time = $("#interview_end_time").val();
      var first_round_interview_type = $("#first_round_interview_type").val();
	  var employee_id = $("#employee_id").val();
      var firstdescription = $("#firstdescription").val();
      var department_mstr_id = $("#department_mstr_id").val();
      var second_round_interview_type = $("#second_round_interview_type").val();
	  var dremployee_id = $("#dremployee_id").val();
      var second_round_description = $("#second_round_description").val();

        var aTime = convertTime24(interview_start_time);
        var bTime = convertTime24(interview_end_time);


        if (project_mstr_id == "") {
            alert("Please Select Project..");
            $("#project_mstr_id").css('border-color', 'red'); process = false;
        }
        if (job_post_detail_id == "") {
            alert("Please Enter Designation..");
            $("#job_post_detail_id").css('border-color', 'red'); process = false;
        }
        if (location_mstr_id== "") {
            alert("Please Enter Location Of Interview..");
            $("#location_mstr_id").css('border-color', 'red'); process = false;
        }
        if (interview_start_date =="" || currentDate > interview_start_date) {
            alert("Interview Start Date Must Be Greater Than Or Equal To Current Date..");
           $("#interview_start_date").css('border-color', 'red'); process = false;
        }
        if (interview_end_date <= interview_start_date) {
            alert("Interview End Date Must Be Greater Than Interview Start Date..");
           $("#interview_end_date").css('border-color', 'red'); process = false;
        }
        if (aTime =="") {
            alert("Please Enter Interview Start Time..");
           $("#interview_start_time").css('border-color', 'red'); process = false;
        }
        if (bTime <= aTime) {
            alert("Interview End Time Must Be Greater Than Interview Start Time..");
           $("#interview_end_time").css('border-color', 'red'); process = false;
        }
        if (first_round_interview_type == "") {
            alert("Please Select Interview Type..");
            $("#first_round_interview_type").css('border-color', 'red'); process = false;
        }
        if (employee_id =="") {
            alert("Please Select Interviewer..");
            $("#employee_id").css('border-color', 'red'); process = false;
        }
        if (firstdescription == "") {
            alert("Please Mention Remarks..");
            $("#firstdescription").css('border-color', 'red'); process = false;
        }
        if (department_mstr_id ="") {
            alert("Please Select Department..");
           $("#department_mstr_id").css('border-color', 'red'); process = false;
        }
        if (second_round_interview_type == "") {
            alert("Please Select Interview Type..");
            $("#second_round_interview_type").css('border-color', 'red'); process = false;
        }
        if (dremployee_id =="") {
            alert("Please Select Interviewer..");
            $("#dremployee_id").css('border-color', 'red'); process = false;
        }
        if (second_round_description == "") {
            alert("Please Mention Remarks..");
            $("#second_round_description").css('border-color', 'red'); process = false;
        }

        return process;
});
$("#project_mstr_id").change(function(){ $(this).css('border-color',''); });
$("#job_post_detail_id").change(function(){ $(this).css('border-color',''); });
$("#location_mstr_id").change(function(){ $(this).css('border-color',''); });
$("#interview_start_date").change(function(){ $(this).css('border-color',''); });
$("#interview_end_date").change(function(){ $(this).css('border-color',''); });
$("#interview_start_time").change(function(){ $(this).css('border-color',''); });
$("#interview_end_time").change(function(){ $(this).css('border-color',''); });
$("#first_round_interview_type").change(function(){ $(this).css('border-color',''); });
$("#employee_id").change(function(){ $(this).css('border-color',''); });
$("#firstdescription").change(function(){ $(this).css('border-color',''); });
$("#department_mstr_id").change(function(){ $(this).css('border-color',''); });
$("#second_round_interview_type").change(function(){ $(this).css('border-color',''); });
$("#dremployee_id").change(function(){ $(this).css('border-color',''); });
$("#second_round_description").change(function(){ $(this).css('border-color',''); });

</script>