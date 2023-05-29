<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--DataTables [ OPTIONAL ]-->
<link href="<?=URLROOT;?>/common/assets/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="<?=URLROOT;?>/common/assets/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Job Post List</h1>
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <ol class="breadcrumb">
		<li><a href="#"><i class="demo-pli-home"></i></a></li>
		<li><a href="#">Recruitment</a></li>
		<li class="active">Job Post List</li>
        </ol>
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel">
		            <div class="panel-heading">
		                <h5 class="panel-title">Job Post List</h5>
		            </div>
                    <div class="panel-body">
		                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr class="danger">
                                    <th class="text-center">#</th>
                                    <th>Job Role</th>
                                    <th>Job Description</th>
                                    <th>Required Qualification</th>
                                    <th>Location</th>
                                    <th>Required Experience</th>
                                    <th>No. Of Position</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
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
                                    <td><?=$value["required_qualification"];?></td>
                                    <td><?=$value["location_details"];?></td>
                                    <td><?=$value["required_experience"];?></td>
                                    <td><?=$value["no_of_opening"];?></td>
                                    <td><?=$value["entry_date"];?></td>
                                    <td><?=$value["expiry_date"];?></td>
                                    <td>
                                        <a href="<?=URLROOT;?>/Candidate/walkincandidateAddUpdate/<?=$value["job_post_detail_id"];?>"
                                           class="btn  btn-pink">Apply</a>
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
    <!--End page content-->
</div>
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
				exportOptions: { columns: [ 0, 1] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1] }
			}]
		});
	});
</script>