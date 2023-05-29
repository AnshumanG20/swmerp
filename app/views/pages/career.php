<?php require APPROOT . '/views/layout_horizontal/header.php'; ?>
            <!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">
                    <div class="text-center">
                        <h2>Current Job Opening</h2>
						<h3><u>List Of Job...</u></h3>

                    </div>
                </div>
                <div id="page-content">
					            <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel">
                                                <!--Bordered Table-->
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr class="success">
                                                                    <th class="text-center">SL. NO.</th>
                                                                    <th>Job Role</th>
                                                                    <th>Job Description</th>
                                                                    <th>Location</th>
                                                                    <th>Required Experience</th>
                                                                    <th>No. Of Position</th>
                                                                    <th>Apply Start Date</th>
                                                                    <th>Apply End Date</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(isset($data["jobList"])):?>
                                                                <?php if(!empty($data["jobList"])):?>
                                                                <?php $i=0; foreach ($data["jobList"] as $value):?>
                                                                
                                                                <tr>
                                                                    <td class="text-center"><?=++$i;?></td>
                                                                    <td><?=$value["designation_name"];?></td>
                                                                    <td><?=$value["job_description"];?></td>
                                                                    <td><?=$value["city"];?></td>
                                                                    <td><?=$value["required_min_experience"]." "."to"." ".$value["required_max_experience"]." "."Years";?></td>
                                                                    <td><?=$value["no_of_opening"];?></td>
                                                                    <td><?=$value["entry_date"];?></td>
                                                                    <td><?=$value["expiry_date"];?></td>
                                                                    <td>
                                                                        <a href="<?=URLROOT;?>/CareerController/career_details_view/<?=$value["job_post_detail_id"];?>"
                                                                           class="btn  btn-pink">Details View </a>
                                                                    </td>
                                                                </tr>

                                                                <?php endforeach;?>
                                                                <?php else:?>
                                                                <tr>
                                                                    <td colspan="8" style="text-align: center;">No Current Jobs Are Opening!!</td>
                                                                </tr>
                                                                <?php endif;?>
                                                                <?php endif;?>
                                                            </tbody>
                                                        </table>

                                            </div>

                                        </div>
                                    </div>
    
                                </div>
                            </div>
						</div>
                <!--End page content-->
            </div>
            <!--END CONTENT CONTAINER-->
		</div>
<?php require APPROOT . '/views/layout_horizontal/footer.php'; ?>