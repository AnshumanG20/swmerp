<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">
                    <!--Breadcrumb-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
					<li class="active">Candidate Profile</li>
                    </ol>
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <div id="page-content">
					        <div class="panel">
					            <div class="panel-heading">
					                <div class="panel-title">
                                        Candidate Profile

                                        <?php if($data["hr"]=="hr_approval"){ ?>
                                            <a href="<?=URLROOT;?>/InterviewProcessController/hr_approval/<?=$data["id"];?>" class="btn btn-danger" style="float:right; color: white; margin-top: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                        <?php } elseif($data["hr"]=="hrround"){ ?>
                                            <a href="<?=URLROOT;?>/InterviewController/interview_process/<?=$data["id"];?>" class="btn btn-danger" style="float:right; color: white; margin-top: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                        <?php } elseif($data["hr"]=="departmentround"){ ?>
                                            <a href="<?=URLROOT;?>/InterviewProcessController/interview_second_round/<?=$data["id"];?>" class="btn btn-danger" style="float:right; color: white; margin-top: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                        <?php } elseif($data["hr"]=="reschedule"){ ?>
                                            <a href="<?=URLROOT;?>/form_Controller/interview_call_status/<?=$data["id"];?>" class="btn btn-danger" style="float:right; color: white; margin-top: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                        <?php } else {?>
                                           <a href="<?=URLROOT;?>/form_Controller/candidate_profile/<?=$data["id"];?>" class="btn btn-danger" style="float:right; color: white; margin-top: 10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                        <?php } ?>
                                    </div>
                                    
                                </div>
                                
					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="">
									<div class="panel-body">
                                        <?php if(isset($data["candidate_ex"])):?>
                                         <?php foreach ($data["candidate_ex"] as $key => $value):?>

                                         <div class="row">
                                            <?php if($value["photo_path"]!=""){ ?>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="<?php echo URLROOT.'/public/uploads/' ?><?=$value["photo_path"];?>" height="250" width="250" style="border:double">
                                                </div>
                                            </div>
                                             <?php } else { ?>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                    <img src="<?=URLROOT."/common/assets/img/avatar/default_avatar.png";?>" height="250" width="250" style="border:double">
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="col-md-3" >Candidate Name :</label>
                                                        <b><?=$value["first_name"].' '.$value["middle_name"].' '.$value["last_name"];?></b>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Position Applied For :</label>
                                                        <b><?=$value["designation_name"];?></b>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3" >Location Applied For :</label>
                                                        <b><?=$value["city"];?></b>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <hr>
                                    <?php endforeach;?>
                                    <?php endif;?>
                             </form>
					<!--===================================================-->
					<!--End Horizontal Form-->
                           </div>

                    <div class="row">
                        <?php if(isset($data["candidate_brief_description"])):?>
                        <?php foreach ($data["candidate_brief_description"] as $key => $value):?>
                         <?php endforeach;?>
                         <?php endif;?>
                        <div class="col-md-12 col-lg-12">

					        <!--Bordered Accordion-->
					        <!--===================================================-->
					        <div class="panel-group accordion" id="demo-acc-info-outline">
					            <div class="panel panel-bordered panel-info">

					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-1" aria-expanded="true" class="">Basic Details</a>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse in" id="demo-acd-info-outline-1" aria-expanded="true" style="">
					                    <div class="panel-body">
					                        <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-2">Candidate Name :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["first_name"].' '.$value["middle_name"].' '.$value["last_name"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Personal Phone No :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["personal_phone_no"];?></b>
                                                    </div>
                                                    <label class="col-md-2" >Other Phone No :</label>
                                                    <div class="col-md-3">
                                                        <?php if($value["other_phone_no"]==""){ ?>
                                                            <b>N/A</b>
                                                       <?php } else { ?>
                                                        <b><?=$value["other_phone_no"];?></b>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Email ID :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["email_id"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Blood Group :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["blood_group"];?></b>
                                                    </div>
                                                    <label class="col-md-2" >Gender :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["gender"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Marital Status :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["marital_status"];?></b>
                                                    </div>
                                                    <?php
                                                    if($value["marital_status"]=="Married")
                                                    {
                                                    ?>
                                                    <label class="col-md-2" >Spouse Name :</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["spouse_name"];?></b>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Date Of Birth :</label>
                                                    <div class="col-md-3">
                                                        <b><?=date('d-M-Y', strtotime($value["d_o_b"]));?></b>
                                                    </div>
                                                    <label class="col-md-2" >Age :</label>
                                                    <div class="col-md-3">
                                                        <b><?php
                                                            $dob=$value["d_o_b"];
                                                            $diff = (date('Y') - date('Y',strtotime($dob)));
                                                            echo $diff.' yrs';
                                                            ?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Height :</label>
                                                    <div class="col-md-3">
                                                        <?php if($value["height"]==""){ ?>
                                                            <b>N/A</b>
                                                       <?php } else { ?>
                                                        <b><?=$value["height"].' cm';?></b>
                                                        <?php } ?>
                                                    </div>
                                                    <label class="col-md-2" >Weight :</label>
                                                    <div class="col-md-3">
                                                       <?php if($value["weight"]==""){ ?>
                                                            <b>N/A</b>
                                                       <?php } else { ?>
                                                        <b><?=$value["weight"].' kg';?></b>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </form>
					                    </div>
					                </div>
					            </div>
                                <div class="panel panel-bordered panel-info">

                                    <!--Accordion title-->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-2" class="collapsed" aria-expanded="false">Contact Details</a>
                                        </h4>
                                    </div>

                                    <!--Accordion content-->
                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-2" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label text-danger"><u>Present Address:</u></label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Address Line1 :</label>
                                                    <div class="col-md-10">
                                                        <b><?=$value["present_address"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >City : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["present_city"];?></b>
                                                    </div>
                                                    <label class="col-md-2" >District : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["present_district"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >State : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["present_state"];?></b>
                                                    </div>
                                                    <label class="col-md-2" > Pincode : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["present_pin_code"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label class="text-danger"><u>Permanent Address:</u> </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Address Line :</label>
                                                    <div class="col-md-10">
                                                        <b><?=$value["permanent_address"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >City : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["permanent_city"];?></b>
                                                    </div>
                                                    <label class="col-md-2" >District : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["permanent_district"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >State : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["permanent_state"];?></b>
                                                    </div>
                                                    <label class="col-md-2" > Pincode : </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["permanent_pin_code"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Family Background</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <input type="hidden" id="candidate__family_backbgound_id" name="candidate__family_backbgound_id" />
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>Relation  </th>
                                                                                <th>Name  </th>
                                                                                <th>Occupation </th>
                                                                                <th>Contact No.</th>
                                                                                <th>Address</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if(isset($data["candidate_family"])):?>
                                                                            <?php foreach ($data["candidate_family"] as $key => $value):?>

                                                                            <tr>
                                                                                <td>Father</td>
                                                                                <td><b><?=$value["father_name"];?></b></td>
                                                                                <td><b><?=$value["father_occupation"];?></b></td>
                                                                                <td><b><?=$value["father_contact_no"];?></b></td>
                                                                                <td><b><?=$value["father_address"];?></b></td>
                                                                            </tr>
                                                                            <?php endforeach;?>
                                                                            <?php endif;?>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-bordered panel-info">

                                    <!--Accordion title-->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-3" class="collapsed" aria-expanded="false">Academic Details</a>
                                        </h4>
                                    </div>

                                    <!--Accordion content-->
                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-3" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <form class="form-horizontal mar-top">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-12 text-danger" id="stepThreeErrorPanel"></label>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>DEGREE</th>
                                                                                <th>Stream</th>
                                                                                <th>Sub Stream</th>
                                                                                <th>Medium : English / Vernacular  </th>
                                                                                <th>Year Of Passing</th>
                                                                                <th>Name Of School / College / Institute And Place</th>
                                                                                <th>Name Of Board / University Affiliated</th>
                                                                                <th>Class / % Of Marks Awarded</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="rowAddAcademicDetails">
                                                                            <?php if(isset($data["candidate_qualification"])):?>
                                                                            <?php foreach ($data["candidate_qualification"] as $key => $value):?>

                                                                            <tr>

                                                                                <td><b><?=$value["course_name"];?></b></td>
                                                                                <td><b><?=$value["stream_name"];?></b></td>
                                                                                <td><b><?=$value["sub_stream_name"];?></b></td>
                                                                                <td><b><?=$value["medium_type"];?></b></td>
                                                                                <td><b><?=$value["passing_year"];?></b></td>
                                                                                <td><b><?=$value["school_college_institute_name"];?></b></td>
                                                                                <td><b><?=$value["board_university_name"];?></b></td>
                                                                                <td><b><?=$value["marks_percent"];?></b></td>
                                                                            </tr>
                                                                            <?php endforeach;?>
                                                                            <?php endif;?>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-bordered panel-info">

                                    <!--Accordion title-->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-4" class="collapsed" aria-expanded="false">Employment Details</a>
                                        </h4>
                                    </div>

                                    <!--Accordion content-->
                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-4" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <form class="form-horizontal mar-top">
                                                <?php if(isset($data["candidate_Prnemployment"])):?>
                                                <?php foreach ($data["candidate_Prnemployment"] as $key => $value):?>
                                                <?php if($data["candidate_Prnemployment"]!=""){ ?>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Present Employment</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Name Of Employer : </label>
                                                                    <div class="col-md-5">
                                                                        <b><?=$value["present_name_of_employer"];?></b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Address Of Organisation : </label>
                                                                    <div class="col-md-5">
                                                                        <b><?=$value["present_address_of_organisation"];?></b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3"> <br>Date Of Joining : </label>
                                                                    <div class="col-md-5">
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <span class="text-danger">From</span><br>
                                                                                <b><?=$value["present_date_of_joining_from"];?></b>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <span class="text-danger">To</span><br>
                                                                                <b><?=$value["present_date_of_joining_to"];?></b>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Brief Description Of Present Job :<br/>
                                                                        Heighlight Special Achievements, Awards, Promotions, etc. : </label>
                                                                    <div class="col-md-5">
                                                                        <b><?=$value["present_brief_desc_of_present_job"];?></b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Details Of Present Emoluments<br/>(Monthly) <span class="text-danger">Head of Salary : </span></label>
                                                                    <div class="col-md-9">
                                                                        <div class="form-group">
                                                                            <label class="col-md-2">Basic
                                                                                <b><?=$value["present_basic_salary"];?></b>
                                                                            </label>
                                                                            <label class="col-md-2">HRA
                                                                                <b><?=$value["present_hra"];?></b>
                                                                            </label>
                                                                            <label class="col-md-5">Total Monthly Amount
                                                                                <b><?=$value["present_total_monthly_amt"];?></b>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Other Emoluments Like PF, LTA,
                                                                        Medical, Gratuity, Bonus/Ex-gratia etc. : </label>
                                                                    <div class="col-md-5">
                                                                        <b><?=$value["present_other_emoluments_pf_lta_medical"];?></b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Any Benefits / Facilities In Kind ? </label>
                                                                    <div class="col-md-5">
                                                                        <b><?=$value["present_any_benefits_facilities"];?></b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Expected Salary : </label>
                                                                    <div class="col-md-5">
                                                                        <b>Rs. <?=$value["present_expected_salary_pf_contribution_bonus"];?></b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >What Notice Period Do You Need To Join ? </label>
                                                                    <div class="col-md-5">
                                                                        <b><?=$value["present_join_notice_period"];?></b>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php endforeach;?>
                                                <?php endif;?>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Previous Employment (Reverse Chronological Order)</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>Period  </th>
                                                                                <th>Total Exp.  </th>
                                                                                <th>Organisation Name, Brief Address</th>
                                                                                <th>Designation</th>
                                                                                <th>Monthly Emoluments(Last)</th>
                                                                                <th>Brief Job Description</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="rowAddPreviousEmploymentDetails">
                                                                            <?php if(isset($data["candidate_Prvemployment"])):?>
                                                                            <?php if(!empty($data["candidate_Prvemployment"])): ?>
                                                                            <?php foreach ($data["candidate_Prvemployment"] as $key => $value):?>

                                                                            <tr>
                                                                                <td><b><?=$value["previous_period_from"]." "."to"." ".$value["previous_period_to"];?></b></td>
                                                                                <td><b><?=$value["previous_experience"];?></b></td>
                                                                                <td><b><?=$value["previous_organization_name_address"];?></b></td>
                                                                                <td><b><?=$value["previous_designation"];?></b></td>
                                                                                <td><b><?=$value["previous_monthly_emoluments"];?></b></td>
                                                                                <td><b><?=$value["previous_brief_job_description"];?></b></td>
                                                                            </tr>
                                                                            <?php endforeach;?>
                                                                            <?php else:?>
                                                                            <tr>
                                                                                <td colspan="6" style="text-align:center;"><span class="text-danger"><b>Data Is Not Available...</b></span></td>
                                                                            </tr>
                                                                            <?php endif;?>
                                                                            <?php else:?>
                                                                            <tr>
                                                                                <td colspan="6" style="text-align:center;"><span class="text-danger"><b>Data Is Not Available...</b></span></td>
                                                                            </tr>
                                                                            <?php endif;?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Experience Overall - Relevant</h3>
                                                            </div>
                                                            <?php if(isset($data["candidate_brief_description"])):?>
                                                            <?php foreach ($data["candidate_brief_description"] as $key => $value):?>
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <?php if($value["experience_overall_relevant"]==""){ ?>
                                                                        <b>N/A</b>
                                                                        <?php } else { ?>
                                                                        <b><?=$value["experience_overall_relevant"];?></b>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endforeach;?>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">

                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Additional Information</h3>
                                                            </div>
                                                            <?php if(isset($data["candidate_brief_description"])):?>
                                                            <?php foreach ($data["candidate_brief_description"] as $key => $value):?>
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Language Known : </label>
                                                                    <div class="col-md-5">
                                                                        <?php if($value["languages_know"]==""){ ?>
                                                                        <b>N/A</b>
                                                                        <?php } else { ?>
                                                                        <b><?=$value["languages_know"];?></b>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >What are you leisure activities?</label>
                                                                    <div class="col-md-5">
                                                                        <?php if($value["leisure_activity"]==""){ ?>
                                                                        <b>N/A</b>
                                                                        <?php } else { ?>
                                                                        <b><?=$value["leisure_activity"];?></b>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >Any of the relation working in this company now or earlier : </label>
                                                                    <div class="col-md-5">
                                                                        <?php if($value["relations_working_in_this_company"]==""){ ?>
                                                                        <b>N/A</b>
                                                                        <?php } else { ?>
                                                                        <b><?=$value["relations_working_in_this_company"];?></b>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-3" >State of health :</label>
                                                                    <div class="col-md-5">
                                                                        <?php if($value["your_state_of_health"]==""){ ?>
                                                                        <b>N/A</b>
                                                                        <?php } else { ?>
                                                                        <b><?=$value["your_state_of_health"];?></b>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endforeach;?>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">References</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>S.No  </th>
                                                                                <th>Name/Designation/Organisation</th>
                                                                                <th>Phone No./Emailid </th>
                                                                                <th>Address of communication</th>
                                                                                <th>S/P/SP</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if(isset($data["candidate_Refemployment"])):?>
                                                                            <?php if(!empty($data["candidate_Refemployment"])): ?>
                                                                            <?php foreach ($data["candidate_Refemployment"] as $key => $value):?>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td><b>ghfgf<?=$value["reference_name_designation_organisation1"];?></b></td>
                                                                                <td><b><?=$value["reference_phone_no_email_id1"];?></b></td>
                                                                                <td><b><?=$value["reference_address_of_communication1"];?></b></td>
                                                                                <td><b><?=$value["reference_social_professinal1"];?></b></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <?php endforeach;?>
                                                                            <?php else:?>
                                                                            <tr>
                                                                                <td colspan="6" style="text-align:center;"><span class="text-danger"><b>Data Is Not Available...</b></span></td>
                                                                            </tr>
                                                                            <?php endif;?>
                                                                            <?php else:?>
                                                                            <tr>
                                                                                <td colspan="6" style="text-align:center;"><span class="text-danger"><b>Data Is Not Available...</b></span></td>
                                                                            </tr>
                                                                            <?php endif;?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


							<div class="panel panel-bordered panel-info">

					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-5" class="collapsed" aria-expanded="false">Document Details</a>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse" id="demo-acd-info-outline-5" aria-expanded="false" style="height: 0px;">
					                    <div class="panel-body">
                                            <form class="form-horizontal mar-top">
                                                <div class="form-group">
                                                        <div class="col-md-12" id="document_list_id_hide_show">
                                                            <div class="table-responsive">
                                                                <table id="tbl_condidate_attachment_list" class="table table-hover table-bordered table-condensed" >
                                                                    <thead>
                                                                        <tr class="success">
                                                                            <th>Document Type</th>
                                                                            <th>Document No.</th>
                                                                            <th>Place of Issue</th>
                                                                            <th>Date of Issue</th>
                                                                            <th>Valid Upto</th>
                                                                            <th>Documents</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tbody_condidate_attachment_list">
                                                                        <?php if(isset($data["candidate_document"])):?>
                                                                        <?php if(!empty($data["candidate_document"])): ?>
                                                                        <?php // foreach ($data["candidate_document"] as $key => $value):?>
                                                                        <?php $j=0; $i=0; foreach ($data["candidate_document"] as $key=> $value):?>
                                                                        <tr>
                                                                            <td><b><?=$value["doc_name"];?></b></td>
                                                                            <td><b><?=$value["doc_no"];?></b></td>
                                                                            <td><b><?=$value["place_of_issue"];?></b></td>
                                                                            <td><b><?=$value["date_of_issue"];?></b></td>
                                                                            <td><b><?=$value["valid_upto"];?></b></td>
                                                                            <td><b><?=$value["doc_path"];?></b></td>
                                                                            <td><a target="_blank" href="<?php echo URLROOT."/public/uploads/" ?><?=$value["doc_path"];?>" class="btn btn-dark btn-sm">Document View</a></td>

                                                                        </tr>
                                                                        <?php endforeach;?>
                                                                        <?php //endforeach;?>
                                                                        <?php else:?>
                                                                        <tr>
                                                                            <td colspan="7" style="text-align:center;"><span class="text-danger"><b>Data Is Not Available...</b></span></td>
                                                                        </tr>
                                                                        <?php endif;?>
                                                                        <?php else:?>
                                                                        <tr>
                                                                            <td colspan="7" style="text-align:center;"><span class="text-danger"><b>Data Is Not Available...</b></span></td>
                                                                        </tr>
                                                                        <?php endif;?>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
					                    </div>
					                </div>
								</div>
							</div>

					        <!--===================================================-->
					        <!--End Bordered Accordion-->

					    </div>
					</div>
				</div>

					
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>