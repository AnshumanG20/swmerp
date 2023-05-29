<?php require APPROOT . '/views/layout_horizontal/header.php'; ?>
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
					                        <b>Brief Details About Opening</b>
					                    </h3>
                                        <a href="<?=URLROOT;?>/form_Controller/career" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                                        </div>
                                    </div>


				                <!--Accordion content-->
					                <div class="panel-collapse">
					                    <div class="panel-body">
					                        <form class="form-horizontal">
                                            <?php if(isset($data["career_details_view"])):?>
                                            <?php foreach ($data["career_details_view"] as $key => $value):?>
                                                <div class="form-group">
                                                    <label class="col-md-2">Job Role (Designation) </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["designation_name"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Job Description</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["job_description"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Employment Type</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["employment_type"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Experience Required</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["required_min_experience"]." "."to"." ".$value["required_max_experience"]." "."Years";?></b>
                                                    </div>

                                                </div>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Required Qualification</label>
                                                    <div class="col-md-6">
                                                        <table class="table table-hover" >
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>Degree  </th>
                                                                    <th>Stream  </th>
                                                                    <th>Sub-stream </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(isset($data["career_details_qualification_view"])):?>
                                                                <?php foreach ($data["career_details_qualification_view"] as $key => $value):?>
                                                                <tr>
                                                                    <td><b><?=$value["course_name"];?></b></td>
                                                                    <td><b><?=$value["stream_name"];?></b></td>
                                                                    <td><b><?=$value["sub_stream_name"];?></b></td>
                                                                </tr>
                                                                <?php endforeach;?>
                                                                <?php endif;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                             <?php if(isset($data["career_details_view"])):?>
                                            <?php foreach ($data["career_details_view"] as $key => $value):?>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Key Skills </label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["key_skills"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Job Location</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["state"]." ".$value["dist"]." ".$value["city"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >No. Of Position</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["no_of_opening"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Apply Start Date</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["entry_date"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Apply End Date</label>
                                                    <div class="col-md-3">
                                                        <b><?=$value["expiry_date"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <?php 
                                                        $data["date"] = date("Y-m-d");
                                                        if($value["entry_date"] <= $data["date"]){ ?>
                                                        <a href="<?=URLROOT;?>/Candidate/candidateAddUpdate/<?=$value["job_post_detail_id"];?>"
                                                         class="btn  btn-info">Apply </a>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                             <?php endforeach;?>
                                            <?php endif;?>
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
<?php require APPROOT . '/views/layout_horizontal/footer.php'; ?>