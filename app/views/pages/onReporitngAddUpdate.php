<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<style>

</style>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <!--Breadcrumb-->
        <ol class="breadcrumb">
        <li><a href="#"><i class="demo-pli-home"></i></a></li>
        <li><a href="#">On Reporting</a></li>
        <li class="active">Add/Update</li>
        </ol><!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
            	<?php
					// print_r($data['department_mstr_list']);
				?>
            	<form method="post" id="form" name="form" class="form-padding" action="<?=URLROOT;?>/onReporting/">
                    <div class="panel panel-bordered-warning panel-mint">
                        <div class="panel-heading">
                            <h5 class="panel-title">Reporting From</h5>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                            	<div class="col-md-4">
                                	<label class="control-label" for="from_department_mstr_id">Department <span class="text-danger">*</span></label>
                                    <select id="from_department_mstr_id" name="from_department_mstr_id" class="form-control" required>
                                    	<option value="">==SELECT==</option>
								<?php
								if(isset($data['department_mstr_list'])){
                                    // echo '<pre>';
                                    // print_r($data);
                                	foreach($data['department_mstr_list'] AS $values){
                                ?>
                                    	<option value="<?=$values['_id'];?>"><?=$values['dept_name'];?></option>
								<?php
									}
                                }
                                ?>
                                    </select>
                                </div>
                            	<div class="col-md-4">
                                	<label class="control-label" for="from_designation_mstr_id">Designation <span class="text-danger">*</span></label>
                                    <select id="from_designation_mstr_id" name="from_designation_mstr_id" class="form-control" onchange="getEmployeeByDesgId(this)" required>
                                    	<option value="">==SELECT==</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                	<label class="control-label" for="emp_details_id">Employee Name <span class="text-danger">*</span></label>
                                    <select id="emp_details_id" name="emp_details_id" class="form-control" required>
                                    	<option value="">==SELECT==</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-bordered-warning panel-mint">
                        <div class="panel-heading">
                            <h5 class="panel-title">Reporting Persons</h5>
                        </div>
                        <div class="panel-body">
                        	<div class="form-group">
                            	<div class="col-md-12">
                                	<!-- <label class="text-danger">Press Ctrl/Shift and choose multiple options... <br></label> -->
                                </div>
                                <div class="col-md-12">
                                	<label class="text-danger"><br></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <!-- <input type="text" id="test" name="test" onkeypress="return isAlpha(event);"> -->
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="col-md-4">
                                	<label class="control-label" for="project_mstr_id">Project Name <span class="text-danger">*</span></label>
                                    <select id="project_mstr_id" name="project_mstr_id" class="form-control" onchange="enable()" required>
                                    	<option value="">==SELECT==</option>
                                        <?php
								if(isset($data['project_mstr_list'])){
                                	foreach($data['project_mstr_list'] AS $values){
                                ?>
                                    	<option value="<?=$values['_id'];?>"><?=$values['project_name'];?></option>
								<?php
									}
                                }
                                ?>
                                    </select>
                                </div>
                                <div id="ulb_ward_hide_show" style="display:none;">
                                    <div class="col-md-4">
                                        <label class="control-label" for="ulb_mstr_id">ULB <span class="text-danger">*</span></label>
                                        <select id="ulb_mstr_id" name="ulb_mstr_id" class="form-control">
                                            <option value="">==SELECT==</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label" for="ward_mstr_id">Ward Number <span class="text-danger">*</span></label>
                                        <select id="ward_mstr_id" name="ward_mstr_id" class="form-control" multiple>
                                            <option value="">==SELECT==</option>
                                        </select>
                                    </div>
                            	</div>
                            </div>
                            <div class="form-group">
                            	<div class="col-md-12">
                                	&nbsp;
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="col-md-4">
                                	<label class="control-label" for="reporting_department_mstr_id">Department <span class="text-danger">*</span></label>
                                    <select id="reporting_department_mstr_id" name="reporting_department_mstr_id" class="form-control" onChange="getDesignationList(this)" disabled required>
                                    	<option value="">==SELECT==</option>
                                <?php
								if(isset($data['department_mstr_list'])){
                                	foreach($data['department_mstr_list'] AS $values){
                                ?>
                                    	<option value="<?=$values['_id'];?>"><?=$values['dept_name'];?></option>
								<?php
									}
                                }
                                ?>
                                    </select>
                                </div>
                            	<div class="col-md-4">
                                	<label class="control-label" for="reporting_designation_mstr_id">Designation <span class="text-danger">*</span></label>
                                    <select id="reporting_designation_mstr_id" name="reporting_designation_mstr_id" class="form-control" onchange="acToProjectIdGetEmployeeByDesgId(this)" required>
                                    	<option value="">==SELECT==</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                	<label class="control-label" for="emp_details_id">Employee Name <span class="text-danger">*</span></label>
                                    <select id="emp_details_id_field" name="emp_details_id_field" class="form-control" required>
                                    	<option value="">==SELECT==</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="col-md-2">
                                	<label class="control-label" for="btn"><hr /></label>
                                    <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-block btn-primary">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
				</form>
            </div>
        </div>
    </div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script>


$(document).ready(function(){

    






	$("#from_department_mstr_id").change(function(){
		var department_mstr_id = this.value;
		if(department_mstr_id!=""){
			$.ajax({
				type:"POST",
				url: "<?=URLROOT;?>/Api_Designation/ajaxOnReportingDepartmentDesignationMstrListByDeptId",
				dataType: "json",
				data: {"department_mstr_id":department_mstr_id},
				beforeSend: function() {
					$("#loadingDiv").show();
				},
				success:function(data){
					//console.log(data);
					$("#loadingDiv").hide();
					if(data.response==true){				
						$("#from_designation_mstr_id").html(data.data);
					}
				}
			});
		}
	});


    
});
</script>
<script>
    function getEmployeeByDesgId(e){
        // debugger;
        var desgId = e.value;
        if(desgId !=""){
			$.ajax({
				type:"POST",
				url: "<?=URLROOT;?>/Api_Designation/ajaxOnReportingDepartmentDesignationEmployeeMstrListByDesgId",
				dataType: "json",
				data: {"desgId":desgId},
				beforeSend: function() {
					$("#loadingDiv").show();
				},
				success:function(data){
					//console.log(data);
					$("#loadingDiv").hide();
					if(data.response==true){				
						$("#emp_details_id").html(data.data);
                        console.log(data);
                        // alert(data.data);
					}
				}
			});
		}
    }


    function enable(){
        var project_mstr_id = document.getElementById('project_mstr_id').value;
        if(project_mstr_id ==''){
            document.getElementById('reporting_department_mstr_id').setAttribute("disabled");

            // document.getElementById('reporting_department_mstr_id').setAttribute("style", "pointer-events:none;");
        }
        else
        {
             document.getElementById("reporting_department_mstr_id").removeAttribute("disabled");
            // document.getElementById('reporting_department_mstr_id').setAttribute("style", "pointer-events:auto;");
        }
    }
</script>

<script>
    function getDesignationList(e){
        // debugger;
        var department_mstr_id = e.value;
		if(department_mstr_id!=""){
			$.ajax({
				type:"POST",
				url: "<?=URLROOT;?>/Api_Designation/ajaxOnReportingDepartmentDesignationMstrListByDeptId",
				dataType: "json",
				data: {"department_mstr_id":department_mstr_id},
				beforeSend: function() {
					$("#loadingDiv").show();
				},
				success:function(data){
					//console.log(data);
					$("#loadingDiv").hide();
					if(data.response==true){				
						$("#reporting_designation_mstr_id").html(data.data);
					}
				}
			});
		}
    }
</script>

<script>
     function acToProjectIdGetEmployeeByDesgId(e){
        var designation_mstr_id = e.value;
        var project_mstr_id = $('#project_mstr_id').val();
        console.log(project_mstr_id);
        console.log(designation_mstr_id);
		// if(project_id !=""){
			$.ajax({
				type:"POST",
				url: "<?=URLROOT;?>/Api_Designation/ajaxOnReportingDepartmentDesignationMstrListByDesgIdAcToProjectId",
				dataType: "json",
				data: {"designation_mstr_id":designation_mstr_id,"project_mstr_id":project_mstr_id},
				beforeSend: function() {
					$("#loadingDiv").show();
				},
				success:function(data){
              
					//console.log(data);
					$("#loadingDiv").hide();
					if(data.response==true){				
						$("#emp_details_id_field").html(data.data);
                        console.log(data.data);
                        // alert(data);
					}
				}
			});
		// }
    }
</script>
