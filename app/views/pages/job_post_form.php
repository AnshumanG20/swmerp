<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.js"></script>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Job Post</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Forms</a></li>
					<li class="active">Job Post</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>
                <div id="page-content">

                   <div class="form-horizontal">
                     <div class="form-group">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Job Post Form</h3>

                                </div>

                               <div class="panel-body">
                                    <a href="<?=URLROOT;?>/form_Controller/job_post_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                                   <form method="post" action="<?=URLROOT;?>/form_Controller/job_postinsrt/<?=(isset($data["job_post_detail_id"]))?$data["job_post_detail_id"]:"";?>" >
                                   <div class="form-group">
                                       <div class="input-group date col-md-5" style="padding-right: 10px; padding-left: 10px;">
						                  <input type="hidden" id="current_date" name="current_date" class="form-control mask_date" placeholder="Current date" readonly="" value="<?=(isset($data['current_date']))?$data['current_date']:date('Y-m-d');?>">
                                          <input type="hidden" id="_id" name="_id" class="form-control" readonly="" value="<?=(isset($data["job_post_detail_id"]))?$data["job_post_detail_id"]:"";?>">
						               </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-3" >Job Role (Designation) <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <select id="designation_mstr_id" name="designation_mstr_id" class="form-control">
                                              <option value="">Select</option>
                                               <?php if(isset($data["designationList"])):?>
                                                    <?php foreach ($data["designationList"] as $key => $value):?> 
                                                    <option value="<?=$value["designation_mstr_id"];?>" <?=(isset($data["designation_mstr_id"]))?($data["designation_mstr_id"]==$value["designation_mstr_id"])?"selected='selected'":"":"";?>><?=$value["designation_name"];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                           </select>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-md-3" >Job Description<small class="text-danger"> *</small> </label>
                                       <div class="col-md-5">
                                           <textarea class="form-control m-t-xxs" id="job_description" name="job_description" type="text"><?=(isset($data["job_description"]))?$data["job_description"]:"";?></textarea>
                                       </div>
                                    </div>

                                   <div class="form-group">
                                      <label class="col-md-3" >Employment Type <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <select id="employment_type_mstr_id" name="employment_type_mstr_id" class="form-control">
                                                <option value="">Select</option>
                                               <?php if(isset($data["employeeType"])):?>
                                                    <?php foreach ($data["employeeType"] as $key => $value):?> 
                                                    <option value="<?=$value["employment_type_mst_id"];?>" <?=(isset($data["employment_type_mst_id"]))?($data["employment_type_mst_id"]==$value["employment_type_mst_id"])?"selected='selected'":"":"";?>><?=$value["employment_type"];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                           </select>
                                        </div>
                                   </div>

                                      <label class="col-md-3" ></label>
                                      <lable  class="col-md-3"><b>Minimum Experience</b></lable>
                                       <label ><b>Maximum Experience</b></label>

                                   <div class="form-group">
                                      <label class="col-md-3" >Experience Required <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <div class="input-group">
                                               <?php
                                               if(isset($data["required_min_experience"])){
                                                   $min=explode(".",$data["required_min_experience"]);
                                               }
                                               //print_r($min[0]);
                                               if(isset($data["required_max_experience"])){
                                                   $max=explode(".",$data["required_max_experience"]);
                                               }
                                                ?>
                                               <select id="from" name="from" class="form-control" style="width:91px;">
                                               <option value="">Year</option>
                                               <?php for($i=0;$i<=50;$i++) { ?>
                                               <option value="<?php echo $i; ?>" <?=(isset($min[0]))?($min[0]==$i)?"selected='selected'":"":"";?>><?php echo $i; ?></option>
                                               <?php } ?>
                                               </select>
                                               <select id="from1" name="from1" class="form-control" style="width:91px;margin-right:7px;">
                                               <option value="">Month</option>
                                               <?php for($i=0;$i<=11;$i++) { ?>
                                               <option value="<?php echo $i; ?>" <?=(isset($min[1]))?($min[1]==$i)?"selected='selected'":"":"";?>><?php echo $i; ?></option>
                                               <?php } ?>
                                               </select>
                                               <span class="input-group-addon">To</span>
                                               <select id="to" name="to" class="form-control" style="width:91px; margin-left:7px;">
                                               <option value="">Year</option>
                                               <?php for($i=0;$i<=50;$i++) { ?>
                                               <option value="<?php echo $i; ?>" <?=(isset($max[0]))?($max[0]==$i)?"selected='selected'":"":"";?>><?php echo $i; ?></option>
                                               <?php } ?>
                                               </select>
                                               <select id="to1" name="to1" class="form-control" style="width:91px;">
                                               <option value="">Month</option>
                                               <?php for($i=0;$i<=11;$i++) { ?>
                                               <option value="<?php echo $i; ?>" <?=(isset($max[1]))?($max[1]==$i)?"selected='selected'":"":"";?>><?php echo $i; ?></option>
                                               <?php } ?>
                                               </select>
                                       </div>
                                       </div>
                                       </div>
                                       <div class="form-group">
                                           <label class="col-md-3" > Required Qualification <small class="text-danger"> *</small></label>
                                           <div class="col-md-5">
                                               <table class="table">
                                                   <thead>
                                                       <tr align="center" id="table_titles">
                                                           <th>Degree</th>
                                                           <th>Stream</th>
                                                           <th>Sub Stream</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody id="tbodyQualification">
                                                   <?php
                                                    if(isset($data['required_qualification_list'])){
                                                        $i = 0;
                                                        foreach($data['required_qualification_list'] as $qdata){
                                                            $i++;
                                                    ?>
                                                       <tr>
                                                           <td>
                                                               <input type="hidden" id="job_post_qualification_details_id<?=$i;?>" name="job_post_qualification_details_id[]" value="<?=$qdata['_id'];?>" />
                                                               <select id="degree<?=$i;?>" name="degree[]" class="form-control degree" style="width:99px; margin-right:2px;" onchange="getStreamByDegree(this.value, this.id)";>
                                                                   <option value="">Select</option>
                                                                   <?php if(isset($data["courseList"])):?>
                                                                   <?php foreach ($data["courseList"] as $key => $value):?> 
                                                                   <option value="<?=$value["course_name_id"];?>" <?=(isset($qdata["course_mstr_id"]))?($qdata["course_mstr_id"]==$value["course_name_id"])?"selected='selected'":"":"";?>><?=$value["course_name"];?></option>
                                                                   <?php endforeach;?>
                                                                   <?php endif;?>
                                                               </select>
                                                           </td>
                                                           <td>
                                                               <select id="stream<?=$i;?>" name="stream[]" class="form-control" style="width:98px; margin-right:2px;" onchange="getSubstreamByStream(this.value, this.id)" ;>
                                                                   <option value="">Stream</option>
                                                                   <?php if(isset($qdata['stream_list'])):?>
                                                                   <?php foreach ($qdata['stream_list'] as $key => $value):?> 
                                                                   <option value="<?=$value["sub_course_mstr_id"];?>"<?=(isset($qdata["sub_course_mstr_id"]))?($qdata["sub_course_mstr_id"]==$value["sub_course_mstr_id"])?"selected='selected'":"":"";?>><?=$value["stream_name"];?></option>
                                                                   <?php endforeach;?>
                                                                   <?php endif;?>
                                                               </select>
                                                           </td>
                                                           <td>
                                                               <select id="sub_stream<?=$i;?>" name="sub_stream[]" class="form-control" style="width:98px; margin-right:2px;">
                                                                   <option value="">Sub Stream</option>
                                                                   <?php if(isset($qdata["sub_stream_list"])):?>
                                                                   <?php foreach ($qdata["sub_stream_list"] as $key => $value):?> 
                                                                   <option value="<?=$value["sub_stream_mstr_id"];?>"<?=(isset($qdata["sub_stream_mstr_id"]))?($qdata["sub_stream_mstr_id"]==$value["sub_stream_mstr_id"])?"selected='selected'":"":"";?>><?=$value["sub_stream_name"];?></option>
                                                                   <?php endforeach;?>
                                                                   <?php endif;?>
                                                               </select>
                                                           </td>
                                                           <td>
                                                           <?php
                                                            if($i!=1){
                                                            ?>
                                                                <input type="button" class="btn btn-info remove_qaulification" id="delRow" value="Del">
                                                            <?php
                                                            }
                                                            ?>
                                                           </td>
                                                           <td><input type="button" class="btn btn-info" id="addmoreRowsbutton" value="Add" onclick="insRow(<?=$i;?>)"></td>
                                                       </tr>
                                                    <?php
                                                        }
                                                    }else{
                                                   ?>
                                                       <tr>
                                                           <td>
                                                               <input type="hidden" id="job_post_qualification_details_id1" name="job_post_qualification_details_id[]" />
                                                               <select id="degree1" name="degree[]" class="form-control degree" style="width:99px; margin-right:2px;" onchange="getStreamByDegree(this.value, this.id)";>
                                                                   <option value="">Select</option>
                                                                   <?php if(isset($data["courseList"])):?>
                                                                   <?php foreach ($data["courseList"] as $key => $value):?> 
                                                                   <option value="<?=$value["course_name_id"];?>" <?=(isset($data["course_name_id"]))?($data["course_name_id"]==$value["course_name_id"])?"selected='selected'":"":"";?>><?=$value["course_name"];?></option>
                                                                   <?php endforeach;?>
                                                                   <?php endif;?>
                                                               </select>
                                                           </td>
                                                           <td>
                                                               <select id="stream1" name="stream[]" class="form-control" style="width:98px; margin-right:2px;" onchange="getSubstreamByStream(this.value, this.id)" ;>
                                                                   <option value="">Stream</option>
                                                                   <?php if(isset($data["stream"])):?>
                                                                   <?php foreach ($data["stream"] as $key => $value):?> 
                                                                   <option value="<?=$value["stream_name_id"];?>"><?=$value["stream_name"];?></option>
                                                                   <?php endforeach;?>
                                                                   <?php endif;?>
                                                               </select>
                                                           </td>
                                                           <td>
                                                               <select id="sub_stream1" name="sub_stream[]" class="form-control" style="width:98px; margin-right:2px;">
                                                                   <option value="">Sub Stream</option>
                                                                   <?php if(isset($data["sub_stream"])):?>
                                                                   <?php foreach ($data["sub_stream"] as $key => $value):?> 
                                                                   <option value="<?=$value["sub_stream_name_id"];?>"><?=$value["sub_stream_name"];?></option>
                                                                   <?php endforeach;?>
                                                                   <?php endif;?>
                                                               </select>
                                                           </td>
                                                           <td></td>
                                                           <td><input type="button" class="btn btn-info" id="addmoreRowsbutton" value="Add" onclick="insRow(1)"></td>
                                                       </tr>
                                                   <?php
                                                   }
                                                   ?>
                                                   </tbody>
                                               </table>

                                           </div>
                                       </div>

                                   <div class="form-group">
                                      <label class="col-md-3" >Key Skills <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <input class="form-control m-t-xxs" id="key_skills" name="key_skills" placeholder="Key Skills" type="text" value="<?=(isset($data["key_skills"]))?$data["key_skills"]:"";?>"  >
                                       </div>
                                   </div>
                                       
                                    <div class="form-group">
                                      <label class="col-md-3" > Project Name <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <select id="project_name" name="project_name" class="form-control">
                                                <option value="">Select</option>
                                               <?php if(isset($data["projectMstrList"])):?>
                                                    <?php foreach ($data["projectMstrList"] as $key => $value):?> 
                                                    <option value="<?=$value["_id"];?>" <?=(isset($data["project_name_id"]))?($data["project_name_id"]==$value["_id"])?"selected='selected'":"":"";?>><?=$value["project_name"];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>

                                           </select>
                                       </div>
                                   </div>    

                                   <div class="form-group">
                                      <label class="col-md-3" > Job Location <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <select id="location_details" name="location_details" class="form-control">
                                                <option value="">Select</option>
                                               <?php
                                               if(isset($data['location_details_list'])){
                                                   foreach($data['location_details_list'] as $value){
                                               ?>
                                                    <option value="<?=$value["_id"];?>" <?=(isset($data["company_location_id"]))?($data["company_location_id"]==$value["_id"])?"selected='selected'":"":"";?>><?=$value["city"];?>
                                               <?php
                                                   }
                                               }
                                               ?>
                                           </select>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                      <label class="col-md-3" >No. Of Position <small class="text-danger"> *</small></label>
                                       <div class="col-md-5">
                                           <input class="form-control m-t-xxs" id="no_of_opening" name="no_of_opening" placeholder="No. Of Position " type="text" value="<?=(isset($data["no_of_opening"]))?$data["no_of_opening"]:"";?>"  onkeypress="return isNum(event);">
                                       </div>
                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-3" >Apply Start Date <small class="text-danger"> *</small></label>
                                       <div class="input-group date col-md-5" style="padding-right: 10px; padding-left: 10px;">
						                  <input type="text" id="entry_date" name="entry_date" class="form-control mask_date" placeholder="Mention Form Apply Date" value="<?=(isset($data["entry_date"]))?$data["entry_date"]:"";?>">
						                  <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						               </div>

                                   </div>
                                   <div class="form-group">
                                      <label class="col-md-3" >Apply End Date <small class="text-danger"> *</small></label>
                                       <div class="input-group date col-md-5" style="padding-right: 10px; padding-left: 10px;">
						                  <input type="text" id="expiry_date" name="expiry_date" class="form-control mask_date" placeholder="Mention Form Expiry Date" value="<?=(isset($data["expiry_date"]))?$data["expiry_date"]:"";?>">
						                  <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
						               </div>
                                    </div>
                                    <div class="col-sm-9">
					                    <button class="btn btn-mint" type="submit" id="btn_submit"><?=(isset($data["job_post_detail_id"]))?($data["job_post_detail_id"])?"UPDATE":"SUBMIT":"SUBMIT";?></button>
					                </div>

                                    </form> 

                                </div>

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
    $('#current_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#entry_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('#expiry_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });

$("#btn_submit").click(function(){
    process = true;
      var current_date = $("#current_date").val();
	  var entry_date = $("#entry_date").val();
      var expiry_date = $("#expiry_date").val();
      var job_title = $("#job_title").val();
	  var job_description = $("#job_description").val();
      var designation_mstr_id = $("#designation_mstr_id").val();
      var employment_type_mstr_id = $("#employment_type_mstr_id").val();

      $(".degree").each(function(){
        var ID = this.id;
        var ID = ID.split("degree")[1];
        var degree = $("#degree"+ID).val();
        if(degree==""){
            $("#degree"+ID).css('border-color', 'red'); process = false;
        }$("#degree"+ID).change(function(){ $(this).css('border-color',''); });
      });

      var from = $("#from").val();
      var to = parseInt($("#to").val());
      var required_qualification = $("#required_qualification").val();
      var key_skills = $("#key_skills").val();
	  var location_details = $("#location_details").val();
      var no_of_opening = $("#no_of_opening").val();
        if (current_date > entry_date) {
            alert("Apply date must be greater than or equal to Current date..");
            $("#entry_date").css('border-color', 'red'); process = false;
        }
        if (entry_date >= expiry_date) {
            alert("Expiry date must be greater than Apply date..");
            $("#expiry_date").css('border-color', 'red'); process = false;
        }
        if (job_title =="") {
           $("#job_title").css('border-color', 'red'); process = false;
        }
        if (job_description =="") {
           $("#job_description").css('border-color', 'red'); process = false;
        }
        if (designation_mstr_id =="") {
           $("#designation_mstr_id").css('border-color', 'red'); process = false;
        }
        if (employment_type_mstr_id =="") {
           $("#employment_type_mstr_id").css('border-color', 'red'); process = false;
        }
        if (from =="") {
           $("#from").css('border-color', 'red'); process = false;
        }
        if (to <= from) {
            alert("Maximum Experience must be more than Minimum Experience..");
           $("#to").css('border-color', 'red'); process = false;
        }
        if (required_qualification =="") {
           $("#required_qualification").css('border-color', 'red'); process = false;
        }
        if (key_skills =="") {
           $("#key_skills").css('border-color', 'red'); process = false;
        }
        if (location_details =="") {
           $("#location_details").css('border-color', 'red'); process = false;
        }
        if (no_of_opening =="" || no_of_opening <=0) {
           $("#no_of_opening").css('border-color', 'red'); process = false;
        }
        return process;
});
$("#entry_date").change(function(){ $(this).css('border-color',''); });
$("#expiry_date").change(function(){ $(this).css('border-color',''); });
$("#job_title").change(function(){ $(this).css('border-color',''); });
$("#job_description").change(function(){ $(this).css('border-color',''); });
$("#designation_mstr_id").change(function(){ $(this).css('border-color',''); });
$("#employment_type_mstr_id").change(function(){ $(this).css('border-color',''); });
$("#from").change(function(){ $(this).css('border-color',''); });
$("#to").change(function(){ $(this).css('border-color',''); });
$("#required_qualification").change(function(){ $(this).css('border-color',''); });
$("#key_skills").change(function(){ $(this).css('border-color',''); });
$("#location_details").change(function(){ $(this).css('border-color',''); });
$("#no_of_opening").change(function(){ $(this).css('border-color',''); });
</script>

<script type="text/javascript">

$("#project_name").change(function(){
    var project_name = $("#project_name").val();
    if(project_name==""){
        $("#location_details").html('<option value="-">== SELECT ==</option>');
    }else{

        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/form_Controller/jobLocationAccordingToProjectName",
            dataType: "json",
            data: {"project_name":project_name},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    $("#location_details").html(data.data);
                }
            }
         });
    }
});

</script>

<script type="text/javascript">

function getStreamByDegree(course_mstr_id, ID){
    ID = ID.split("degree")[1];
    if(course_mstr_id==""){
        $("#stream"+ID).html('<option value="">SELECT</option>');
    }else{
	$.ajax({
		type: "POST",
		url: "<?=URLROOT;?>/form_controller/stream",
		data: {course_mstr_id:course_mstr_id},
		cache: false,
		dataType: "json",
		success:function(html){	
			//alert(html);
			if(html.response==true){
				$('#stream'+ID).html(html.data);	
			}else{
				$('#stream'+ID).html("<option value=''>SELECT</option>");
			}

		}
	});	
	}
}	

</script>

<script type="text/javascript">

function getSubstreamByStream(sub_course_mstr_id, ID){
    ID = ID.split("stream")[1];
    if(sub_course_mstr_id==""){
        $("#sub_stream"+ID).html('<option value="">SELECT</option>');
    }else{
	$.ajax({
		type: "POST",
		url: "<?=URLROOT;?>/form_controller/sub_stream",
		data: {sub_course_mstr_id:sub_course_mstr_id},
		cache: false,
		dataType: "json",
		success:function(html){	
			//alert(html);
			if(html.response==true){
				$('#sub_stream'+ID).html(html.data);	
			}else{
				$('#sub_stream'+ID).html("<option value=''>SELECT</option>");
			}

		}
	});	
	}
}	

</script>
                
                
<script>
$("#tbodyQualification").on('click', '.remove_qaulification', function(e){
    $(this).closest("tr").remove();
})
function insRow(z)
{
    z = z+1;
    var appendData = '<tr><td><input type="hidden" id="job_post_qualification_details_id'+z+'" name="job_post_qualification_details_id[]" /><select id="degree'+z+'" name="degree[]" class="form-control degree" style="width:99px;" onchange="getStreamByDegree(this.value, this.id)";><option value="">Degree</option><?php if(isset($data["courseList"])):?><?php foreach ($data["courseList"] as $key => $value):?> <option value="<?=$value["course_name_id"];?>" <?=(isset($data["course_name_id"]))?($data["course_name_id"]==$value["course_name_id"])?"selected='selected'":"":"";?>><?=$value["course_name"];?></option><?php endforeach;?><?php endif;?></select></td><td><select id="stream'+z+'" name="stream[]" class="form-control" style="width:98px;" onchange="getSubstreamByStream(this.value, this.id)";><option value="">SELECT</option></select></td><td><select id="sub_stream'+z+'" name="sub_stream[]" class="form-control" style="width:98px;"><option value="">SELECT</option></select></td><td><input type="button" class="btn btn-info remove_qaulification" id="delRow" value="Del"></td><td><input type="button" class="btn btn-info" value="Add" onclick="insRow('+z+')"></td></tr>';
    $("#tbodyQualification").append(appendData);

}  


</script>

<script>
function deleteRow(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("tables").deleteRow(i);
}
</script>