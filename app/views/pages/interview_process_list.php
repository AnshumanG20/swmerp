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
                        <h1 class="page-header text-overflow">Interview Process List</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Recruitment</a></li>
					<li class="active">Interview Process List</li>
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
                                    <h5 class="panel-title">Interview Process List</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="pad-btm">
                                        <?php if($data['user_mstr_id']==9){ ?>
                                            <a href="<?=URLROOT;?>/InterviewController/interview_process"><button id="demo-foo-collapse" class="btn btn-purple">Start Interview</button></a>
                                       <?php }else{ ?>
                                        
                                        <a href="<?=URLROOT;?>/InterviewProcessController/interview_second_round"><button id="demo-foo-collapse" class="btn btn-purple">Start Interview</button></a>
                                        <?php } ?>
                                    </div>

                                  

                                  
                                       
                                    <?php if($data['user_mstr_id']==9){ ?>
                                    <?php if($data['user_mstr_id']==9){ ?>
                                    <?php if($data['user_mstr_id']==9){ ?>
                                    <table id="demo_dt_basic" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Candidate Name</th>
                                                <th>Gender</th>
                                                <th>Designation</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>

                                       
                                        <tbody>
                                            <?php if(isset($data["interview_process_list"])):?>
                                                 <?php if(!empty($data["interview_process_list"])):?>
                                                     <?php $i=0; foreach ($data["interview_process_list"] as $value):?>
                                                            <tr>
                                                            <td class="text-center"><?=++$i;?></td>
                                                            <td><?=$value["first_name"]." ".$value["middle_name"]." ".$value["last_name"];?></td>
                                                            <td><?=$value["gender"];?></td>
                                                            <td><?=$value["designation_name"];?></td>
                                                            <td><?=$value["personal_phone_no"];?></td>
                                                            <td>
                                                                <?php if($value["_status"]==4)
                                                                { ?>
                                                                <p class="text-danger">Interview Not Started</p>
                                                                <?php }
                                                                elseif($value["_status"]==7)
                                                                { ?>
                                                                <p class="text-primary"> HR (1st) Round Completed</p>
                                                                <?php }
                                                                elseif($value["_status"]==8)
                                                                    { ?>
                                                                <p class="text-warning">2nd Round Completed</p>
                                                                    <?php } 
                                                                elseif($value["_status"]==9)
                                                                    { ?>
                                                                <p class="text-success">Offer Letter Sent To Candidate Mail</p>
                                                                    <?php } 
                                                                elseif($value["_status"]==10)
                                                                    { ?>
                                                                <p class="text-success">Candidate Became Part Of Our Organization</p>
                                                                    <?php } ?>
                                                            </td>
                                                            <td>
                                                                <?php if($value["_status"]==8 || $value["_status"]==9 || $value["_status"]==10)
                                                                { ?>
                                                                <a href="<?=URLROOT;?>/InterviewProcessController/hr_approval/<?=$value["_id"];?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                     <?php endforeach;?>
                                                    <?php else:?>
                                                        <tr>
                                                            <td colspan="5" style="text-align: center;">No Current Jobs Are Opening!!</td>
                                                        </tr>
                                                 <?php endif;?>
                                            <?php endif;?>
                                    <?php } ?>
                                        </tbody>
                                    <?php } ?>
                                    </table>
                                    <?php } ?>
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
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1, 2, 3, 4, 5] }
			}]
		});
	});
</script>