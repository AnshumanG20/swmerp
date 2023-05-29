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
            <!--<h1 class="page-header text-overflow">Document List</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Masters</a></li>
            <li class="active">Item List</li>
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
                        <h5 class="panel-title">Item List</h5>

                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/ItemList/item_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Add New Item <i class="fa fa-arrow-right"></i></button></a>
                        </div>
                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Assets Type</th>
                                    <th>Item Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!isset($data["itemlist"])):
                                ?>
                                <tr>
                                    <td colspan="4" style="text-align: center;">Data Not Available!!</td>
                                </tr>
                                <?php else:
                                $i=0;
                                foreach ($data["itemlist"] as $value):
                                ?>
                                <tr>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["asset_type"];?></td>
                                    <td><?=$value["item_name"];?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?=URLROOT;?>/ItemList/item_add_update/<?=$value["_id"];?>" role="button">Edit</a>
                                        &nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary" onclick="deletefun(<?=$value["_id"];?>);">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach;?>
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
        <?php if ($msgg = flashToast("itemUpdateSuccess")) { ?> 
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("itemUpdateError")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("itemAddSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("itemAddError")) { ?> 
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("itemDeleteSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("itemDeleteError")) { ?>
            modelDanger("<?=$msgg;?>"); 
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
                    text: 'excel',
                    extend: "excel",
                    title: "Report",
                    footer: { text: '' },
                    exportOptions: { columns: [ 0,1,2] }
                }, {
                    text: 'pdf',
                    extend: "pdf",
                    title: "Report",
                    download: 'open',
                    footer: { text: '' },
                    exportOptions: { columns: [ 0,1,2] }
                }]
        });
    });
    function deletefun(ID)
    {
        var result = confirm("Do You Want To Delete");
        if(result)
            window.location.replace("<?=URLROOT;?>/ItemList/DeleteByIdItem/"+ID);
    }
</script>