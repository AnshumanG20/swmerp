<?php if(isset($data["hrroundList"])):?>
   <?php foreach ($data["hrroundList"] as $key => $value):?>
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Candidate Details</h3>
                </div>

                <!--Block Styled Form -->
                <!--===================================================-->
                <form class="form-horizontal" method="POST" action="<?=URLROOT;?>/InterviewController/hr_round_details">

                        <div class="panel-body">
                            <input type="hidden" id="candidate_id" name="candidate_id" class="form-control" value="<?=$value["candidate_details_id"];?>" readonly="">
                            <input type="hidden" id="secondName" name="secondName" class="form-control" value="<?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?>"  />
                            <input type="hidden" id="secondDesignation" name="secondDesignation" class="form-control" value="<?=$value["designation_name"];?>" readonly="">
                            <input type="hidden" id="secondEmail" name="secondEmail" class="form-control" value="<?=$value["email_id"];?>" readonly="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4">Name :</label>
                                    <div class="col-sm-6">
                                         <?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4" >Email Id :</label>
                                    <div class="col-sm-6">
                                        <?=$value["email_id"];?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">Mobile No. :</label>
                                    <div class="col-sm-6">
                                        <?=$value["personal_phone_no"];?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4">D.O.B :</label>
                                    <div class="col-sm-6">
                                        <?=$value["d_o_b"];?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4" >Brief Description:</label>
                                    <div class="col-md-6">
                                        <a href="<?=URLROOT;?>/form_controller/candidate_brief_description/<?=$value['candidate_details_id'];?>/hrround" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3">Profile Pic</label>
                                    <div class="col-sm-9">
                                        <img src="<?= URLROOT ?>/public/uploads/<?=$value["photo_path"];?>" id="pic" name="pic" height="250" width="260"  />
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                            <label class="control-label text-danger"><u>HR Round Details:</u></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="form-group table-responsive">
                                    <table class="table table-hover table-bordered table-condensed" id="rowAdditem">
                                        <thead>
                                            <tr class="success">
                                                <th>Interview Round</th>
                                                <th>performance <span class="text-danger"> *</span></th>
                                                <th>Result <span class="text-danger"> *</span></th>
                                                <th>Interviewer's Comments <span class="text-danger"> *</span></th>
                                                <th>Date Of Departmental Interview <span class="text-danger"> *</span></th>
                                                <th>Time Of Departmental Interview <span class="text-danger"> *</span></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebody">
                                            <tr>
                                                <td>HR Round</td>
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
                                                <td><input type="text" id="2ndRound_date" name="2ndRound_date" class="form-control mask_date" placeholder="Mention 2nd Round Date" value="<?=(isset($data["2ndRound_date"]))?$data["2ndRound_date"]:"";?>">
						                        </td>
                                                <td><input id="2ndRoundinterview_time" name="2ndRoundinterview_time" type="text" class="form-control"></td>
                                                <td><input type="submit" class="btn btn-success" id="save" name="save" value="save" /></td>
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
        <!--<div class="col-sm-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Candidate resume</h3>
                </div>

                <!--Horizontal Form-->
                <!--===================================================-->
                <!--<form class="form-horizontal">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-9">
                                <iframe name="myiframe" id="myiframe" src="http://203.129.217.60/sri/public/uploads/<?=$value["doc_path"];?>" ></iframe>
                            </div>
                        </div>
                    </div>
                </form>//-->
                <!--===================================================-->
                <!--End Horizontal Form-->

           //-->
    <?php endforeach;?>
<?php endif;?>

<script type="text/javascript">
$("#save").click(function(){
    process = true;
      var status = $("#status").val();
      var current_date = $("#current_date").val();
      var performance = $("#performance").val();
      var ndRound_date = $("#2ndRound_date").val();
	  var ndRoundinterview_time = $("#2ndRoundinterview_time").val();
      var remark = $("#remark").val();

        if (performance == "") {
            alert("Please Select Candidate Performance..");
            $("#performance").css('border-color', 'red'); process = false;
        }
        if (status == "") {
            alert("Please Select Result Option..");
            $("#status").css('border-color', 'red'); process = false;
        }
        if (remark =="") {
            alert("Please Mention Feedback..");
           $("#remark").css('border-color', 'red'); process = false;
        }
        if (ndRound_date < current_date) {
            alert("Please Mention Second Round Interview Date Greater Then Or Equal To Current Date..");
           $("#2ndRound_date").css('border-color', 'red'); process = false;
        }
        if (ndRoundinterview_time =="") {
            alert("Please Mention Second Round Interview Time..");
           $("#2ndRoundinterview_time").css('border-color', 'red'); process = false;
        }
        return process;
});
$("#2ndRound_date").change(function(){ $(this).css('border-color',''); });
$("#status").change(function(){ $(this).css('border-color',''); });
$("#remark").change(function(){ $(this).css('border-color',''); });
$("#performance").change(function(){ $(this).css('border-color',''); });
$("#2ndRoundinterview_time").change(function(){ $(this).css('border-color',''); });
</script>

<script type="text/javascript">
$('#2ndRound_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });

    $('#2ndRoundinterview_time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
        });
    

</script>