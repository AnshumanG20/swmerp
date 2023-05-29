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
                        <h1 class="page-header text-overflow">Interview List</h1>
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
					                <h5 class="panel-title">Interview List</h5>
					            </div>
                                <div class="panel-body">
                                    <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/InterviewController/interviewschedule_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Schedule New Interview</button></a>
                                    </div>
					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Post Name</th>
                                                <th>Interview Location</th>
                                                <th>Interview Start Date</th>
                                                <th>Interview End Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                         <?php if(isset($data["joblist"])): //echo '<pre>';print_r($data);?>
                                            
                                          <?php if(!empty($data["joblist"])):?>
                                            <?php $j=0; $i=0; foreach ($data["joblist"] as $value):?>
                                            <tr>
                                                <td><?=++$i;?></td>
                                                <td><?=$value["designation_name"];?></td>
                                                <td><?=$value["city"];?></td>
                                                <td><?=$value["interview_start_date"];?></td>
                                                <td><?=$value["interview_end_date"];?></td>
                                                 <td><?=(isset($value["_status"]))?"Active":"NA";?></td>
                                                <td><a href="<?=URLROOT;?>/InterviewProcessController/interviewScheduleDetailsView/<?=$value['interview_details_id'];?>" class="btn btn-warning">View</a></td>
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


        
        function modelInfo(msg)
        {
            $.niftyNoty({
                type: 'success',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        function modelDanger(msg)
        {
            $.niftyNoty({
                type: 'danger',
                icon : 'pli-exclamation icon-2x',
                message : msg,
                container : 'floating',
                timer : 5000
            });
        }
        <?php if ($msgg = flashToast("itSchSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        




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
				exportOptions: { columns: [ 0, 1,2,3,4,5] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0,1,2,3,4,5] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0,1,2,3,4,5] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0,1,2,3,4,5] }
			}]
		});
	});
</script>