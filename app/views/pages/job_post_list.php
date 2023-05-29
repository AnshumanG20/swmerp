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
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/form_Controller/job_postinsrt"><button id="demo-foo-collapse" class="btn btn-purple">Create New Job Post</button></a>
                        </div>
		                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job Role</th>
                                    <th>Job Description</th>
                                    <th>Location</th>
                                    <th>Required Experience</th>
                                    <!--<th>Applied Applicants</th>//-->
                                    <th>Apply Start Date</th>
                                    <th>Apply End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php if(isset($data["jobList"])):?>
                              <?php if(!empty($data["jobList"])):?>
                                <?php $j=0; $i=0; foreach ($data["jobList"] as $value):?>
                                <tr>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["designation_name"];?></td>
                                    <td><?=$value["job_description"];?></td>
                                    <td><?=$value["city"];?></td>
                                    <td><?=$value["required_min_experience"]." "."to"." ".$value["required_max_experience"]." "."Years";?></td>
                                    <!--<td><?=$j;?></td>//-->
                                    <td><?=$value["entry_date"];?></td>
                                    <td><?=$value["expiry_date"];?></td>
                                    <td>
                                        <?php
                                        $data["date"] = date("Y-m-d");
                                        if($data["date"] >= $value["entry_date"]){ ?>
                                            <a href="<?=URLROOT;?>/form_Controller/job_details_view/<?=$value["job_post_detail_id"];?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php } else { ?>
                                            <a href="<?=URLROOT;?>/form_Controller/job_details_view/<?=$value["job_post_detail_id"];?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?=URLROOT;?>/form_Controller/job_postinsrt/<?=$value["job_post_detail_id"];?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <?php } ?>
                                       </td>
                                </tr>
                                <?php endforeach;?>
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