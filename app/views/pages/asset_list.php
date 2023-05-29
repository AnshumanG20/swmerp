
<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
					<li><a href="#">Asset Management</a></li>
					<li class="active">Asset List</li>
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
					                <h5 class="panel-title">Asset List</h5>
                                </div>
                                <div class="panel-body">
                                    <div class="pad-btm">
                                        <a href="<?=URLROOT;?>/Asset/asset_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Add New  <i class="fa fa-arrow-right"></i></button></a>
                                    </div>

					                <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>Sub Item Name</th>
                                                <th>Model Name</th>
                                                <th>Supplier Name</th>
                                                <th>Order No.</th>
                                                <th>Purchase Cost</th>
                                                <th>Purchase Date</th>
                                                <th>Expiry Date</th>
                                                <th>Warranty Months</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                    <?php
                                    if(isset($data["assetList"])):
                                        // echo '<pre>';
                                        // print_r($data["assetList"]);return;
                                          if($data["assetList"]==""):
                                    ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                    <?php else:
                                            $i=0;
                                            
                                            foreach ($data["assetList"] as $value):

                                    ?>
									
                                            <tr>
                                                <td><?=++$i;?></td>
                                                <td><?=$value["item_name"];?></td>
                                                <td><?php if($value["asset_model_no_id"]=='0') { ?><a href="<?=URLROOT;?>/Asset/AssetModelDetails/<?=$value["_id"];?>" class="text-danger"><b><?=$value["sub_item_name"];?></b></a> <?php } else { ?><?=$value["sub_item_name"];?><?php  } ?></td>
                                                <td><?php if(isset($value["model_no"])) {  ?>
												<a href="<?=URLROOT;?>/Asset/AssetModelDetails/<?=$value["_id"];?>" class="text-danger"><b><?=$value["model_no"];?></b></a>
												<?php } else { echo '<span class="text-success">N/A</span>'; } ?>
												</td>
                                                <td><?=(!empty($value["supplier_name"]))?$value["supplier_name"]:'N/A';?></td>
                                                <td><?=$value["order_no"];?></td>
                                                <td><?=$value["purchase_cost"];?></td>
                                                <td><?=$value["purchase_date"];?></td>
                                                <td><?=$value["expiry_date"];?></td>
                                                <td><?=$value["warranty_month_no"];?></td>
                                                <td><?=$value["asset_quantity"];?></td>
                                                <td><a href="<?=URLROOT;?>/Asset/asset_add_update/<?=$value["_id"];?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a><a href="<?=URLROOT;?>/Asset/asset_delete/<?=md5($value["_id"]);?>/<?= $value["asset_quantity"];?>" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
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
<script src="https://use.fontawesome.com/d8833ba17c.js"></script>
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
        <?php if ($msgg = flashToast("msgSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("msgDanger")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("insertSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("updateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>


        // let assetlist = '<?php echo json_encode($data['assetList']) ?>'
        let assignAssetlist = JSON.parse('<?php echo json_encode($data['allAssignList']) ?>')
        // console.log('asselist ',assetlist)
        console.log('assignlist ',assignAssetlist)
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
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7,8,9,10] }
			}, {
				text: 'csv',
				extend: "csv",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7,8,9,10] }
			}, {
				text: 'excel',
				extend: "excel",
				title: "Report",
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7,8,9,10] }
			}, {
				text: 'pdf',
				extend: "pdf",
				title: "Report",
				download: 'open',
				footer: { text: '' },
				exportOptions: { columns: [ 0, 1,2,3,4,5,6,7,8,9,10] }
			}]
		});
	});
 function deletefun(ID)
{
    var result = confirm("Do You Want To Delete");
    if(result)
     window.location.replace("<?=URLROOT;?>/Masters/DeleteByIdDept/"+ID);
}
</script>
<script>


</script>