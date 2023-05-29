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
                       <!-- <h1 class="page-header text-overflow">Department List</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>

					<li class="active">Termination List</li>
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
					                <h5 class="panel-title">Termination List</h5>
                                </div>
                                <div class="panel-body">


					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>Terminate Reason</th>
                                                <th>Asset Submission Date</th>
                                                <th>Termination Date</th>
                                                <th>Final Settlment Date</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                           </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($data["termination_List"])):
                                            if($data["termination_List"]==""):
                                            ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                            <?php else:
                                            $i=0;
                                            foreach ($data["termination_List"] as $value): ?>
                                            <tr>
                                                <td><?=++$i;?></td>
                                                <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                                <td><?=$value["terminate_resign_reason"];?></td>
                                                <td><?=$value["asset_submission_date"];?></td>
                                                <td><?=$value["notice_period"];?></td>
                                                <td><?=$value["final_settlment_date"];?></td>
                                                <td>
                                                    <?php if($value["_status"]==1){ ?>
                                                        <b class="text-danger">Pending</b>
                                                   <?php }elseif($value["_status"]==6){ ?>
                                                        <b class="text-success">Experience Letter Pending</b>
                                                   <?php }elseif($value["_status"]==5){ ?>
                                                        <b class="text-info">Termination Process Completed</b>
                                                    <?php }elseif($value["_status"]==7){ ?>
                                                        <b class="text-primary">Attested Experience Letter Uploaded !!</b>
                                                   <?php } ?>
                                                </td>
                                                <td>
                                                    <?php if($value["_status"]==6){ ?>
                                                    <a href="<?=URLROOT;?>/Termination/generate_experience_letter/<?=$value["_id"];?>" class="btn btn-success">Generate Experience Letter</a>
                                                    <?php }elseif($value["_status"]==5){ ?>
                                                    <a href="<?=URLROOT;?>/Termination/upload_experience_letter/<?=$value["_id"];?>" class="btn btn-primary">Upload Experience Letter</a>
                                                    <?php }elseif($value["_status"]==7){ ?>
                                                    <a href="<?=URLROOT;?>/Termination/view_experience_letter/<?=$value["_id"];?>" class="btn btn-primary">View Experience Letter</a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                            <?php endif;  ?>
                                            <?php endif;  ?>
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
        function modelInfo(msg){
            $.niftyNoty({
                type: 'info',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }

        <?php 
        if($result = flashToast('termination_list')){
            echo "modelInfo('".$result."');";
        }

        ?>
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
				exportOptions: { columns: [ 0,1,2,3,4,5,6] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0,1,2,3,4,5,6] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0,1,2,3,4,5,6] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0,1,2,3,4,5,6] }
			}]
		});
	});

</script>