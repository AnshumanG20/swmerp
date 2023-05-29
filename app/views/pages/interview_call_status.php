<?php require APPROOT . '/views/layout_horizontal/header.php'; ?>
            <!--CONTENT CONTAINER-->
<?php if(isset($data["interviewStatus"])):?>
     <?php foreach ($data["interviewStatus"] as $key => $value):?>
            <div id="content-container">
                <div id="page-head">
                    <div class="text-center">
                        <h3>Interview Call Status</h3>
                    </div>
                </div>
                <div id="page-content">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="panel panel-primary">
								<div class="panel-body">
                                    <form class="form-horizontal mar-top" method="post" action="<?=URLROOT;?>/phpMailer/reschedule_interview">
                                        <div class="form-group">
                                            <img src="<?=URLROOT ?>/public/uploads/<?=$value["candidate_details_photo_path"];?>" height="150" width="150" style="border:double; margin-bottom:1%;">
                                            <a href="<?=URLROOT;?>/form_controller/candidate_brief_description/<?=$value['candidate_details_id'];?>/reschedule" style="float:right;" class="btn btn-primary">View Details</a>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Candidate Details</h3>
                                                    </div>
                                                    <input type="hidden" id="company_name" name="company_name" class="form-control" value="Sri Publication & Stationers Pvt. Ltd." readonly="">
                                                    <input type="hidden" id="name" name="name" class="form-control" value="<?=$value["candidate_details_first_name"]." ". $value["candidate_details_middle_name"]." ". $value["candidate_details_last_name"];?>" readonly="">
                                                    <input type="hidden" id="email_id" name="email_id" class="form-control" value="<?=$value["candidate_details_email_id"];?>" readonly="">
                                                    <input type="hidden" id="name_id" name="name_id" class="form-control" value="<?=$value["candidate_details_id"];?>" readonly="">
                                                    <div class="panel-body">
                                                       <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Candidate Name :</td>
                                                                    <td><?=$value["candidate_details_first_name"]." ". $value["candidate_details_middle_name"]." ". $value["candidate_details_last_name"];?></td>
                                                                    <td>Date Of Birth :</td>
                                                                    <td><?=$value["candidate_details_d_o_b"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Father's Name :</td>
                                                                    <td><?=$value["candidate_father_name"];?></td>
                                                                    <td>Mother's Name :</td>
                                                                    <td><?=$value["candidate_mother_name"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Blood Group :</td>
                                                                    <td><?=$value["candidate_details_blood_group"];?></td>
                                                                    <td>Gender :</td>
                                                                    <td><?=$value["candidate_details_gender"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Marital Status :</td>
                                                                    <td><?=$value["candidate_details_marital_status"];?></td>
                                                                    <td>Spouse Name :</td>
                                                                    <td><?=$value["candidate_details_spouse_name"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Aadhar No. :</td>
                                                                    <td></td>
                                                                    <td>Address :</td>
                                                                    <td><?=$value["candidate_details_present_address"];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Contact No. :</td>
                                                                    <td><?=$value["candidate_details_personal_phone_no"];?></td>
                                                                    <td>Email Id :</td>
                                                                    <td><?=$value["candidate_details_email_id"];?></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <?php if($value["candidate_details_status"]==6)
                                                        { ?>
                                                        <h3 class="text-warning" >Candidate Apply For Reshedule Interview</h3>
                                                        <?php } ?>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($value["candidate_details_status"]==6)
                                        { ?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Reschedule Interview</h3>
                                                    </div>

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" >Select Date:</label>
                                                                <div class="input-group date col-sm-4" style="padding-right: 10px; padding-left: 10px;">
                                                                    <input type="text" id="interview_reschedule_date" name="interview_reschedule_date" class="form-control mask_date" placeholder="Mention Form Expiry Date">
                                                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                                </div>                                                 
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" >Remarks:</label>
                                                                <div class="col-sm-4">
                                                                    <textarea class="form-control" type="text" id="interview_reschedule_remarks" name="interview_reschedule_remarks" required  ></textarea>
                                                                </div>

                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-sm-2" ></label>
                                                                <div class="col-sm-4">
                                                                    <button type="submit" name="btn_interview_reschedule_date" class="btn btn-warning">Reschedule Interview</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
								</div>
							</div>
						</div>
                    </div>
				</div>					
                <!--End page content-->
            </div>
    <?php endforeach;?>
<?php endif;?>

<?php require APPROOT . '/views/layout_horizontal/footer.php'; ?>
<script type="text/javascript">
    $('#interview_reschedule_date').datepicker({ 
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
</script>
