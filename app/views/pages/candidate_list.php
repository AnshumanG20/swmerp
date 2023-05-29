<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Candidate List</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
					<li class="active">Candidate List</li>
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
					                <h5 class="panel-title">Candidate List</h5>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="<?=URLROOT;?>/form_Controller/job_post_list" class="btn btn-danger" style="float:right;"><i class="fa fa-arrow-left" aria-hidden="true"></i>           Back</a>
                                        </div>
                                    </div>
                                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/form_controller/applied_applicant_list">
                                        <input type="hidden" id="id" name="id" class="form-control" value="<?=$data["id"];?>">

                                        <div class="col-md-3" style="padding-right: 40px; padding-left: 40px;">
                                            <div class="form-group ">
                                                <label class="control-label" for="status">Status</label>
                                                <select id="status" name="status" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="1">Need To Send call Letter</option>
                                                    <option value="2">Called For Interview</option>
                                                    <option value="3">Canceled Interview</option>
                                                    <option value="4">Candidate Accepted Interview Call</option>
                                                    <option value="5">Candidate Reject Interview Call</option>
                                                    <option value="6">Candidate Request To Reshedule Interview Date</option>
                                                    <option value="7"> HR Round Completed</option>
                                                    <option value="8">Interview Process Completed</option>
                                                    <option value="9">Offer Letter Sent To The Candidate Mail</option>
                                                    <option value="10">Candidate Now Be A Part Of Our Organisation</option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label" for="btnsearch">&nbsp;</label>
                                                <button class="btn btn-success btn-block" id="btnsearch" name="btnsearch" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
					            </div>
                                <div class="panel-body">
					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Candidate Name</th>
                                                <th>Position Applied for</th>
                                                <th>Project Name</th>
                                                <th>Location Applied for</th>
                                                <th>Personal Phone No.</th>
                                                <th>Status</th>
                                                <th>View Profile</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($data["applied_applicant_list"])):?>
                                                 <?php if(!empty($data["applied_applicant_list"])):?>
                                                     <?php $i=0; foreach ($data["applied_applicant_list"] as $value):?>
                                                        <tr>

                                                            <td class="text-center"><?=++$i;?></td>
                                                            <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                                            <td><?=$value["designation_name"];?></td>
                                                            <td><?=$value["project_name"];?></td>
                                                            <td><?=$value["city"];?></td>
                                                            <td><?=$value["personal_phone_no"];?></td>
                                                            <td>
                                                                <?php if($value["_status"]==1)
                                                                { ?>
                                                                     Need To Send call Letter
                                                                <?php }
                                                                elseif($value["_status"]==2)
                                                                { ?>
                                                                    Called For Interview
                                                                <?php }
                                                                elseif($value["_status"]==3)
                                                                { ?>
                                                                     Canceled Interview
                                                                <?php }
                                                                elseif($value["_status"]==4)
                                                                { ?>
                                                                     Candidate Accepted Interview Call
                                                                <?php }
                                                                elseif($value["_status"]==5)
                                                                { ?>
                                                                     Candidate Reject Interview Call
                                                                <?php }
                                                                elseif($value["_status"]==6)
                                                                { ?>
                                                                     <a href="<?=URLROOT;?>/form_Controller/interview_call_status/<?=$value["candidate_details_id"];?>"  class="text-danger">Candidate Request To Reshedule Interview Date</a>
                                                                <?php }
                                                                elseif($value["_status"]==7)
                                                                { ?>
                                                                     HR Round Completed
                                                                <?php }
                                                                elseif($value["_status"]==8)
                                                                { ?>
                                                                     Interview Process Completed
                                                                <?php }

                                                                elseif($value["_status"]==9)
                                                                { ?>
                                                                     Offer Letter Sent To The Candidate Mail
                                                                <?php }
                                                                elseif($value["_status"]==10)
                                                                { ?>
                                                                     Candidate Now Be A Part Of Our Organisation
                                                                <?php }
                                                                ?>

                                                            </td>

                                                            <td><a href="<?=URLROOT;?>/form_Controller/candidate_profile/<?=$value["candidate_details_id"];?>" class="btn btn-warning">View</a></td>
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
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<script src="<?=URLROOT;?>/common/assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/jszip.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/pdfmake.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/vfs_fonts.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/buttons.html5.min.js"></script>
<script src="<?=URLROOT;?>/common/assets/datatables/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#demo_dt_basic').DataTable({
			responsive: true,
			dom: 'Bfrtip',
	        lengthMenu: [
	            [ 10, 25, 50, -1 ],
	            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
	        ],
	        buttons: [
	        	'pageLength',
	        {
				text: 'copy',
				extend: "copy",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6] }
			}]
		});
	});
</script>