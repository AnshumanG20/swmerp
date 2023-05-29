<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <ol class="breadcrumb">
		<li><a href="#"><i class="demo-pli-home"></i></a></li>
		<li><a href="#">Recruitment</a></li>
		<li class="active">Job Post Detail View</li>
        </ol>
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
		        <!--Bordered Accordion-->
		        <div class="panel-group accordion">
		            <div class="panel panel-bordered ">

		                <!--Accordion title-->
                        <div class="panel-heading">
                            <div class="col-md-10">
                                <h3 class="panel-title">
                                    <b>Basic Details</b>
                                </h3>
                                <a href="<?=URLROOT;?>/form_Controller/job_post_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>

                            </div>
                        </div>
	                <!--Accordion content-->
		                <div class="panel-collapse">
		                    <div class="panel-body">
		                        <form class="form-horizontal">
                                <?php if(isset($data)):?>
                                    <div class="form-group">
                                        <label class="col-md-2">Job Role (Designation) </label>
                                        <div class="col-md-3">
                                            <b><?=$data["designation_name"];?></b>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Job Description</label>
                                        <div class="col-md-3">
                                            <b><?=$data["job_description"];?></b>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Employment Type</label>
                                        <div class="col-md-3">
                                            <b><?=$data["employment_type"];?></b>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Experience Required</label>
                                        <div class="col-md-3">
                                            <b><?=$data["required_min_experience"]." "."to"." ".$data["required_max_experience"]." "."Years";?></b>
                                        </div>
                                    </div>
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
                                                    <?php if(isset($data["job_details_qualification_view"])):?>
                                                    <?php foreach ($data["job_details_qualification_view"] as $key => $value):?>
                                                    <tr style="border-bottom: 1px solid #ddd;">
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
                                 <?php if(isset($data)):?>
                                    <div class="form-group">
                                        <label class="col-md-2" >Key Skills </label>
                                        <div class="col-md-3">
                                            <b><?=$data["key_skills"];?></b>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Job Location</label>
                                        <div class="col-md-3">
                                            <b><?=$data["city"];?></b>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >No. Of Position</label>
                                        <div class="col-md-3">
                                            <b><?=$data["no_of_opening"];?></b>
                                        </div>

                                    </div>
                                    <?php endif;?>
                                    <?php if(isset($data)):?>
                                    <div class="form-group">
                                        <label class="col-md-2" >Apply Start Date</label>
                                        <div class="col-md-3">
                                            <b><?=$data["entry_date"];?></b>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Apply End Date</label>
                                        <div class="col-md-3">
                                            <b><?=$data["expiry_date"];?></b>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" ><b>No. Of Applicants</b></label>
                                        <div class="col-md-1">
                                            <?php if(isset($data["job_applied_applicant_view"])):?>
                                            <?php foreach ($data["job_applied_applicant_view"] as $key => $value):?>
                                            <?php if($value["count"]==""){ ?>
                                            <b>0</b>
                                            <?php }else{ ?>
                                            <b><?=$value["count"];?></b>
                                            <?php } ?>
                                            <?php endforeach;?>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <?php if($value["count"]!=""){ ?>
                                            <?php if(isset($data)):?>
                                            <a href="<?=URLROOT;?>/form_Controller/applied_applicant_list/<?=$data["job_post_detail_id"];?>" class="btn btn-info" >View Applicant List</a>
                                            <?php endif;?>
                                            <?php } ?>
                                        </div>
                                        <div class="col-md-1">
                                        </div>
                                    <?php
                                    if($data["entry_date"]<=date("Y-m-d") && date("Y-m-d")<=$data["expiry_date"]){
                                    ?>
                                        <div class="col-md-2">
                                            <a href="<?=URLROOT;?>/Candidate/walkinCandidateAddUpdate/<?=$data["job_post_detail_id"];?>" class="btn btn-info" >New Walkin Candidate Apply</a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    </div>
                                <?php endif;?>
                                </form>
		                    </div>
		                </div>
		            </div>
				</div>
		        <!--End Bordered Accordion-->
		    </div>
		</div>
	</div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>