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
                        <h1 class="page-header text-overflow"></h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Masters</a></li>
					<li class="active">Company Deactivated Location List</li>
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
                                    <div class="row">
                                        <div class="col-md-6">
					                        <h5 class="panel-title">Company Branch/HO/Registered List</h5>
                                         </div>
                                         <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                                            <a href="<?=URLROOT;?>/Company_Details/company_details_list" class="btn btn-purple">Back To List <i class="fa fa-arrow-list"></i></a>
					                </div>
                                </div>
                                </div>
                                <div class="panel-body">
                                     <div class="pad-btm">
                                        <!-- <h4 class="panel-title">Deactivate Address Of Branch/HO/Registered List</h4>//-->
                                    </div>

					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Address</th>
                                                <th>City</th>
                                                <th>GSTIN No.</th>
                                                <th>Contact No.</th>
                                                <th>Email Id</th>
                                                <th>State</th>
                                                <th>Office Type</th>
                                                <th>Remark</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($data["deactivate_list"])):?>
                                            <?php if(!empty($data["deactivate_list"])):?>
                                            <?php $i=0; foreach ($data["deactivate_list"] as $value):?>
                                            <tr>
                                                <td><?=++$i;?></td>
                                                <td><?=$value["address"];?></td>
                                                <td><?=$value["city"];?></td>
                                                <td><?=$value["gstin_no"];?></td>
                                                <td><?=$value["contact_no"];?></td>
                                                <td><?=$value["email_id"];?></td>
                                                <td><?=$value["city"]." ".$value['dist']." ".$value['state'];?></td>
                                                <td><?=$value["office_type"];?></td>
                                                <td><?=$value["remark"];?></td>
                                                <td>
                                                    <button type="button" class="btn btn-purple" onclick="activatefun(<?=$value["_id"];?>);">Activate Location</button>
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
</div>
                <!--===================================================-->
                <!--End page content-->
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
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7,8] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7,8] }
			}]
		});
	});
 function activatefun(ID)
{
    var result = confirm("Do You Want To Re Activate Location");
    if(result)
     window.location.replace("<?=URLROOT;?>/Company_Details/company_reactivate/"+ID);
}
</script>