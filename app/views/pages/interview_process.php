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
					<li class="active">Interview List</li>
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
					                <h3 class="panel-title">First Round Interview Process Panel</h3>
					            </div>

					            <!--Block Styled Form -->
					            <!--===================================================-->
					            <form>

					                <div class="panel-body">
					                    <div class="row">
					                        <div class="col-sm-6">
					                            <div class="form-group">
					                                <label class="control-label">Candidate Name</label>
					                                <select class="form-control" id="candidate_name" name="candidate_name">
                                                        <option value="">Select</option>
                                                        <?php if(isset($data["interviewcandidateList"])):?>
                                                        <?php foreach ($data["interviewcandidateList"] as $key => $value):?>
                                                        <option value="<?=$value["candidate_details_id"];?>" <?=(isset($data["candidate_name"]))?($data["candidate_name"]==$value["candidate_details_id"])?"selected='selected'":"":"";?>><?=$value["candidate_details_first_name"]." ".$value["candidate_details_middle_name"]." ".$value["candidate_details_last_name"];?></option>
                                                        <?php endforeach;?>
                                                        <?php endif;?>
                                                    </select>
					                            </div>
					                        </div>
                                             <div class="col-sm-6">
					                            <div class="form-group">
					                                <a href="<?=URLROOT;?>/InterviewProcessController/interview_process_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
					                            </div>
					                        </div>
					                    </div>
					                </div>
                                    
					            </form>
					            <!--===================================================-->
					            <!--End Block Styled Form -->
					        </div>
					    </div>

					</div>
                    <div class="row" id="details">
					    					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>

<script>
$(document).ready(function(){
	$("#candidate_name").on('change',function(){
		var candidate_name = $("#candidate_name").val();
		var interview_id = $("#interview_id").val();
		$.ajax({
			type:'POST',
			url:'<?=URLROOT;?>/InterviewController/fetch_candidate_hr_round_details',
			data:{candidate_name:candidate_name},
			success:function(html)
			{
				$('#details').html(html);
			}
		});
	});
});

$(document).ready(function(){
<?php
    if(isset($data['backid'])){
?>
        $("#candidate_name").val(<?=$data['backid'];?>);
        $("#candidate_name").trigger("change");
<?php
}
?>
});
</script>