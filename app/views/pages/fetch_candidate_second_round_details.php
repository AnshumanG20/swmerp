<?php if(isset($data["secondroundList"])):?>
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Candidate Details</h3>
                </div>
                <!--Block Styled Form -->
                <!--===================================================-->

                <form class="form-horizontal" method="POST" action="<?=URLROOT;?>/InterviewProcessController/second_round_data">
                    <div class="panel-body">
                        <input type="hidden" id="candidate_id" name="candidate_id" class="form-control" value="<?=$data["secondroundList"]["candidate_details_id"];?>" readonly="">
                        <input type="hidden" id="min_salary" name="min_salary" class="form-control" value="<?=$data["secondroundList"]['min_salary'];?>" readonly="">
                        <input type="hidden" id="max_salary" name="max_salary" class="form-control" value="<?=$data["secondroundList"]['max_salary'];?>" readonly="">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-4">Name :</label>
                                <div class="col-sm-6">
                                    <?=$data["secondroundList"]["first_name"]." ".$data["secondroundList"]["middle_name"]." ".$data["secondroundList"]["last_name"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4" >Email Id :</label>
                                <div class="col-sm-6">
                                    <?=$data["secondroundList"]["email_id"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Mobile No. :</label>
                                <div class="col-sm-6">
                                    <?=$data["secondroundList"]["personal_phone_no"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">D.O.B :</label>
                                <div class="col-sm-6">
                                    <?=$data["secondroundList"]["d_o_b"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4" >Brief Description:</label>
                                <div class="col-md-6">
                                    <a href="<?=URLROOT;?>/form_controller/candidate_brief_description/<?=$data["secondroundList"]['candidate_details_id'];?>/departmentround" class="btn btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3">Profile Pic</label>
                                <div class="col-sm-9">
                                    <img src="<?= URLROOT ?>/public/uploads/<?=$data["secondroundList"]["photo_path"];?>" id="pic" name="pic" height="250" width="260"  />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <h5>First Round Remark: <span class="text-success"><?=$data["first_round_remark"]["remarks"];?></span></h5>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label text-danger"><u>Second Round Details:</u></label>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label text-primary"><b>Note : Basic Salary Must Be Between <span class="text-danger"><?=$data["secondroundList"]['min_salary'];?> </span>To <span class="text-danger"><?=$data["secondroundList"]['max_salary'];?></span></b></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-group table-responsive">
                                    <table class="table table-hover table-bordered table-condensed" id="rowAdditem">
                                        <thead>
                                            <tr class="success">
                                                <th>Interview Round</th>
                                                <th>Basic Salary <span class="text-danger"> *</span></th>
                                                <th>performance <span class="text-danger"> *</span></th>
                                                <th>Result <span class="text-danger"> *</span></th>
                                                <th>Interviewer Comments<span class="text-danger"> *</span></th>
                                                <th>Date Of Joining <span class="text-danger"> *</span></th>
                                                <th> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebody">
                                            <tr>
                                                <td>Second Round</td>
                                                <td><input class="form-control m-t-xxs" id="basic_salary" name="basic_salary" placeholder="Basic Salary" required /></td>
                                                <td>
                                                    <select class="form-control" id="performance" name="performance" required >
                                                        <option value="">--Select--</option>
                                                        <option value="Exceeds job requirements">Exceeds job requirements</option>
                                                        <option value="Meets job requirements">Meets job requirements</option>
                                                        <option value="Does not meets job requirements">Does not meets job requirements</option>
                                                        <option value="Not applicable for this position">Not applicable for this position</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="status" name="status" required >
                                                        <option value="">--Select--</option>
                                                        <option value="2">Selected</option>
                                                        <option value="3">Rejected</option>
                                                        <option value="4">Absent</option>
                                                    </select>
                                                </td>
                                                <td><textarea class="form-control m-t-xxs" id="remark" name="remark" placeholder="Give Reason to Select or Reject...." required></textarea></td>
                                                <td><input class="form-control mask_date" id="doj" name="doj" placeholder="Date Of Joining" required /></td>
                                                <td><input type="submit" class="btn btn-primary" id="save" name="save" value=" Submit " /></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--===================================================-->
                <!--End Block Styled Form -->
            </div>
        </div>

<?php else: ?>
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Candidate Details</h3>
        </div>

        
        <!--Block Styled Form -->
        <!--===================================================-->
        <form class="form-horizontal" method="POST" action="<?=URLROOT;?>/InterviewProcessController/second_round_data">
            <div class="panel-body">
                <div class="col-md-6">
                
                    <label class="control-label text-danger"><b>* Basic Salary Is Not Mention, So Please Contact With HR...</b></label>
                </div>
            </div>
        </form>
        <!--===================================================-->
        <!--End Block Styled Form -->
    </div>
</div>
<?php endif;?>

<script type="text/javascript">
$("#save").click(function(){
    process = true;
      var status = $("#status").val();
      var performance = $("#performance").val();
      var doj = $("#doj").val();
	  var basic_salary = parseFloat($("#basic_salary").val());
      var remark = $("#remark").val();
      var min_salary = parseFloat($("#min_salary").val());
      var max_salary = parseFloat($("#max_salary").val());
        //if (basic_salary < min_salary || basic_salary > max_salary) {
        if(isNaN(basic_salary) || min_salary > basic_salary || max_salary < basic_salary || basic_salary==""){
            alert("Please Check Basic Salary ..");
            $("#basic_salary").css('border-color', 'red'); process = false;
        }
        if (status == "") {
            alert("Please Select Result Option..");
            $("#status").css('border-color', 'red'); process = false;
        }
        if (remark =="") {
            alert("Please Mention Feedback..");
           $("#remark").css('border-color', 'red'); process = false;
        }
         if (performance == "") {
            alert("Please Select Candidate Performance..");
            $("#performance").css('border-color', 'red'); process = false;
        }
        if (doj =="") {
            alert("Please Mention Candidate Date Of Joining..");
           $("#doj").css('border-color', 'red'); process = false;
        }
        return process;
});
$("#basic_salary").change(function(){ $(this).css('border-color',''); });
$("#status").change(function(){ $(this).css('border-color',''); });
$("#remark").change(function(){ $(this).css('border-color',''); });
$("#performance").change(function(){ $(this).css('border-color',''); });
$("#doj").change(function(){ $(this).css('border-color',''); });
</script>
<script type="text/javascript">
    $('#doj').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });