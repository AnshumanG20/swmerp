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

                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">


                    <div class="row">

                        <div class="col-md-12 col-lg-12">

					        <!--Bordered Accordion-->
					        <!--===================================================-->
					        <div class="panel-group accordion">
					            <div class="panel panel-bordered ">

					                <!--Accordion title-->
					                <div class="panel-heading">
                                        <div class="col-md-10">
					                    <h3 class="panel-title ">
					                        <b>Brief Details Of Schedule Interview</b>
					                    </h3>
                                        <a href="<?=URLROOT;?>/InterviewController/interview_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                                        </div>
                                    </div>


				                <!--Accordion content-->
					                <div class="panel-collapse">
					                    <div class="panel-body">
					                        <form class="form-horizontal">
                                            <?php if(isset($data["ScheduleDetail"])):?>
                                            <?php foreach ($data["ScheduleDetail"] as $key => $value):?>
                                                <div class="form-group">
                                                    <label class="col-md-2">Company Name </label>
                                                    <div class="col-md-3">
                                                        <b>Sri Publication & Stationers Pvt. Ltd.</b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Designation</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["designation_name"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Interview Location</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["city"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Interview Start Date</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["interview_start_date"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Interview End Date</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["interview_end_date"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Interview Start Time</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["interview_start_time"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Interview End Time</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["interview_end_time"];?></b>
                                                    </div>
                                                </div>
                                            <?php endforeach;?>
                                            <?php endif;?>

                                                <div class="col-md-12">
                                                    <?php if(isset($data["roundScheduleDetail"])):?>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 text-danger"><b><u>HR Round Details:</u></b></label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2" >Department</label>
                                                        <div class="col-md-3">
                                                            <b><?=$data["roundScheduleDetail"][0]["dept_name"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Designation</label>
                                                        <div class="col-md-3">
                                                            <b><?=$data["roundScheduleDetail"][0]["designation_name"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Interview Type</label>
                                                        <div class="col-md-3">
                                                            <b><?=$data["roundScheduleDetail"][0]["interview_type"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Remarks</label>
                                                        <div class="col-md-3">
                                                            <b><?=$data["roundScheduleDetail"][0]["description"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Interviewer Panel</label>
                                                        <div class="col-md-3">
                                                            <?php foreach ($data["roundScheduleDetail"] as $key => $value):?>
                                                            <b><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></b>
                                                            <hr>
                                                            <?php endforeach;?>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                                </div>

                                                <div class="col-md-12">
                                                     <?php if(isset($data["interviewerDetails"])):?>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 text-danger"><b><u>Department Round Details:</u></b></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Interview Type</label>
                                                        <div class="col-md-3">
                                                            <b><?=$data["interviewerDetails"][0]["interview_type"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Remarks</label>
                                                        <div class="col-md-3">
                                                            <b><?=$data["interviewerDetails"][0]["description"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-4 text-info"><b><u>Interviewer Name According To Department:</u></b></label>
                                                    </div>
                                                    <?php foreach ($data["interviewerDetails"] as $key => $value):?>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Department</label>
                                                        <div class="col-md-3">
                                                            <b><?=$value["dept_name"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2" >Interviewer Panel</label>
                                                        <div class="col-md-3">
                                                            <b><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></b>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <?php endforeach;?>
                                                <?php endif;?>
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