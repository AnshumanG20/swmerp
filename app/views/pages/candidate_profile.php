<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
					<li class="active">Candidate Profile</li>
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
					                <div class="panel-title">
                                        Candidate Profile
                                    </div>
                                </div>
					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/LeaveDays/leavetype_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
        		                <div class="panel-body">
                                        <?php if(isset($data["candidateDetails"])):?>
                                         <?php foreach ($data["candidateDetails"] as $key => $value):?>
                                         <div class="row">
                                            <?php if($value["candidate_details_photo_path"]!=""){ ?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="<?= URLROOT ?>/public/uploads/<?=$value["candidate_details_photo_path"];?>" height="250" width="250" style="border:double">
                                                </div>
                                            </div>
                                             <?php }else { ?>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="http://203.129.217.60/sri/common/assets/img/avatar/default_avatar.png" height="250" width="250" style="border:double">
                                                </div>
                                            </div>
                                             <?php } ?>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="col-md-3" >Candidate Name:-</label>
                                                    <div class="col-md-5">
                                                        <?=$value["candidate_details_first_name"]." ". $value["candidate_details_middle_name"]." ". $value["candidate_details_last_name"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Position Applied For:-</label>
                                                    <div class="col-md-5">
                                                        <?=$value["designation_mstr_designation_name"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Location Applied For:-</label>
                                                    <div class="col-md-5">
                                                        <?=$value["city"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Brief Description:</label>
                                                    <div class="col-md-5">
                                                        <a href="<?=URLROOT;?>/form_controller/candidate_brief_description/<?=$value["candidate_details_id"];?>" class="btn btn-info">View Details</a>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <?php if(isset($data["candidateProfile"])):?>
                                                    <?php foreach ($data["candidateProfile"] as $key => $value):?>
                                                    <?php if($value["interview_details_job_post_detail_id"]==""){?>
                                                    <label class="col-md-12" ><b style="color:red;">*  Interview is not schedule for this designation</b></label>
                                                    <div class="col-md-12">
                                                        <label class="col-md-1" ></label>
                                                        <div class="col-md-5">
                                                            <a href="<?=URLROOT;?>/InterviewController/interviewschedule_add_update/<?=$value["candidate_details_id"];?>/<?=$value["job_post_detail_id"];?>" class="btn btn-primary">Schedule Interview</a>
                                                        </div>
                                                    </div>
                                                    <?php }?>
                                                     <?php endforeach;?>
                                                    <?php endif;?>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                        <?php if($value["_status"]==1)
                                              { ?>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <?php if(isset($data["candidateProfile"])):?>
                                                    <?php foreach ($data["candidateProfile"] as $key => $value):?>
                                                    <?php if($value["interview_details_job_post_detail_id"]==""){?>
                                                        <button class="btn btn-success" type="button" onclick="return alert('Interview Is Not Schedule For <?=$value["designation_mstr_designation_name"];?>');">Call For Interview</button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-success" type="button" id="call_form">Call For Interview</button>
                                                    <?php }?>
                                                     <?php endforeach;?>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="<?=URLROOT;?>/form_controller/cancel_interview/<?=$value["candidate_details_id"];?>" class="btn  btn-danger"> Reject Candidate</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="<?=URLROOT;?>/form_Controller/applied_applicant_list/<?=$value["job_post_detail_id"];?>" class="btn btn-md btn-warning btn-block">Back</a>
                                                </div>
                                            </div>
                                            <?php } else {?>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <a href="<?=URLROOT;?>/form_Controller/applied_applicant_list/<?=$value["job_post_detail_id"];?>" class="btn btn-md btn-warning btn-block">Back</a>
                                                </div>
                                            </div>
                                            <?php } ?>

                                        </div>
                                         <?php endforeach;?>
                                    <?php endif;?>
                                    </div>

                             </form>
					<!--===================================================-->
					<!--End Horizontal Form-->
                           </div>
                        </div>
					</div>
                    <div class="row" id="interview_call_form">
                        <?php if(isset($data["candidateProfile"])):?>
                        <?php foreach ($data["candidateProfile"] as $key => $value):?>
					    <div class="col-sm-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Interview Call Letter Form</h3>
					            </div>

					            <!--Block Styled Form -->
					            <!--===================================================-->
					            <form class="form-horizontal" method="POST" action="<?=URLROOT;?>/phpMailer/index">
					                <div class="panel-body">
                                        <input type="hidden" id="job_post_detail_id" name="job_post_detail_id" class="form-control" value="<?=$value["job_post_detail_id"];?>" readonly="" required="">
                                        <input type="text" id="email_id" name="email_id" class="form-control" value="<?=$value["candidate_details_email_id"];?>" readonly="" required="">
                                        <input type="hidden" id="start_date" name="start_date" class="form-control" value="<?=$value["interview_start_date"];?>" readonly="">
                                        <input type="hidden" id="end_date" name="end_date" class="form-control" value="<?=$value["interview_end_date"];?>" readonly="">
                                        <input type="hidden" id="start_time" name="Start_time" class="form-control" value="<?=$value["interview_start_time"];?>" readonly="">
                                        <input type="hidden" id="end_time" name="end_time" class="form-control" value="<?=$value["interview_end_time"];?>" readonly="">
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Company Name</label>
					                        <div class="col-sm-9">
                                                <input type="text" id="company_name" name="company_name" class="form-control" value="Aadrika Enterprises" readonly="">
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Name</label>
					                        <div class="col-sm-9">
                                                <input type="text" id="name_id" name="name_id" value="<?=$value["candidate_details_id"];?>" hidden/>
                                                <input type="text" id="name" name="name" class="form-control" value="<?=$value["candidate_details_first_name"]." ". $value["candidate_details_middle_name"]." ". $value["candidate_details_last_name"];?>" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputemail">Place of interview</label>
					                        <div class="col-sm-9">
					                            <select class="form-control" id="place_of_interview" name="place_of_interview">
                                                    <option value="<?=$value["location_id"];?>" <?=(isset($data["place_of_interview"]))?($data["place_of_interview"]==$value["location_id"])?"selected='selected'":"":"";?>><?=$value["city"];?></option>
                                                </select>
					                        </div>
					                    </div>
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Post Name</label>
					                        <div class="col-sm-9">
                                                <input type="text" id="post_name" name="post_name" value="<?=$value["designation_mstr_id"];?>" hidden/>
                                                <input type="text" id="post_name_name" name="post_name_name" class="form-control" value="<?=$value["designation_mstr_designation_name"];?>" readonly="">
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Date of Interview</label>
					                        <div class="input-group date col-sm-9" style="padding-right: 10px; padding-left: 10px;">
                                                <input type="text" id="interview_date" name="interview_date" class="form-control mask_date" placeholder="Mention Interview Start Date">
                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                            </div>
					                    </div>
                                        <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Time of Interview</label>
					                        <div class="input-group date col-sm-9" style="padding-right: 10px; padding-left: 10px;">
                                                <input id="interview_time" name="interview_time" type="text" class="form-control">
                                                <span class="input-group-addon"><i class="demo-pli-clock"></i></span>
                                            </div>
                                         </div>
                                        <input type="hidden" id="created_on" name="created_on" class="form-control" value="<?=(isset($data['created_on']))?$data['created_on']:date('Y-m-d');?>" readonly=""   />
                                         <div class="form-group">
					                        <label class="col-sm-3 control-label" for="demo-hor-inputpass">Job Description</label>
					                        <div class="col-sm-9">
                                                <input type="text" id="work_from1" name="work_from1" class="form-control" value="<?=$value["job_description"];?>" readonly="">
					                        </div>
					                    </div>
                                    </div>

                                    <div class="panel-footer text-right">
                                        <button class="btn btn-success" type="submit" id="send" name="send">Submit</button>
                                    </div>
                                </form>
                                <!--===================================================-->
                                <!--End Block Styled Form -->
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>


                        <div class="col-sm-6">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Calender Of Schedule Interview</h3>
					            </div>
                             <!--===================================================-->
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="form-group">
					                        <div class="table-responsive">
                                                <table class="table table-hover table-bordered table-condensed" >
                                                    <thead>
                                                        <tr class="success">
                                                            <th>Place  </th>
                                                            <th>Post </th>
                                                            <th>Start Date</th>
                                                            <th>Last Date</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                        </tr>
                                                     </thead>
                                                     <tbody>
                                                         <?php if(isset($data["interviewDateTime"])):?>
                                                         <?php foreach ($data["interviewDateTime"] as $key => $value):?>

                                                         <tr>
                                                             <td><?=$value["city"];?></td>
                                                             <td><?=$value["designation_name"];?></td>
                                                             <td><?=$value["interview_start_date"];?></td>
                                                             <td><?=$value["interview_end_date"];?></td>
                                                             <td><?=$value["interview_start_time"];?></td>
                                                             <td><?=$value["interview_end_time"];?></td>
                                                         </tr>
                                                         <?php endforeach;?>
                                                         <?php endif;?>
                                                     </tbody>
                                                </table>
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

         $("#rowAddAcademicDetails").on('click', '.remove_buttonn_item', function(e) {
             $(this).closest("tr").remove();
         });
         function academicTableAdditem(j){
             var z = parseInt($('#academicTableLen').val())+j;
             var newDivTanent = $('<tr><td><input type="text" id="previous_company_name'+z+'" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td><td><textarea type="text" id="work_from'+z+'" name="work_from[]" class="form-control work_from" ></textarea></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="academicTableAdditem(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
             $('#rowAddAcademicDetails').append(newDivTanent);
             $('#academicTableLen').val(z);
         }
</script>
<script type="text/javascript">
    $('#interview_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });

    $('#interview_time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
        });
    $(document).ready(function(){
        $("#interview_call_form").css("display", "none");
             $("#call_form").on('click',function(){
                $("#interview_call_form").css("display", "block");

		    });
        
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
        
        $("#send").click(function(){
            var process = true;
            var current_date = "<?=date('Y-m-d')?>";
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            //alert(end_date);
            var start_time = $("#start_time").val();
            var end_time = $("#end_time").val();
            var interview_date = $("#interview_date").val();
            var interview_time = $("#interview_time").val();
            var aTime = convertTime24(start_time);
            var bTime = convertTime24(end_time);
            var cTime = convertTime24(interview_time);
            if (interview_date == "" || interview_date < current_date || interview_date < start_date || interview_date > end_date) {
                alert("Please Check Interview Date Greater Than Or Equal To Current Date, And Also It Must Be Between " + start_date + " And " + end_date );
                $("#interview_date").css('border-color', 'red'); process = false;
            }
            if (cTime == "" || cTime < aTime || cTime > bTime) {
                alert("Please Check Interview Time, It Must Be Between " + start_time + " And " + end_time);
                $("#interview_time").css('border-color', 'red'); process = false;
            }
            return process;
        });
        $("#interview_date").change(function(){ $(this).css('border-color',''); });
        $("#interview_time").change(function(){ $(this).css('border-color',''); });

        });

</script>
