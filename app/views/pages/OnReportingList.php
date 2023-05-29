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
            <li><a href="#">On Reporting</a></li>
            <li class="active">List</li>
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
                    <h5 class="panel-title">Reporting List</h5>

                </div>
                <div class="panel-body">
                    <div class="pad-btm">
                        <a href="<?=URLROOT;?>/OnReporting"><button id="demo-foo-collapse" class="btn btn-purple">Add Reporting Head<i class="fa fa-arrow-right"></i></button></a>
                    </div>
                    <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Reporting Head</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!isset($data["getReporteeDetail"])){
                            ?>
                            <tr>
                                <td colspan="4" style="text-align: center;">Data Not Available!!</td>
                            </tr>
                            
                            <?php }else{
                            $i=0;
                            foreach ($data['getReporteeDetail'] as $key=>$val) { ?>

                            <?php //echo '<pre>';print_r($data['getRepHeadDetail']);return;  ?>
                            <tr>
                                <td><?= ++$i; ?></td>
                                <td><?= $val['first_name']; ?></td> 
                                <td><?= $data['getRepHeadDetail'][$key]['first_name']; ?></td>
                                <td>
                                    <!-- <button class="btn-primary" value=""></button> -->
                                     <!-- <a class="btn btn-primary" href="<?php //echo URLROOT;?>/OnReporting/<?php //echo $value["_id"];?>" role="button">Edit</a> -->
                                    &nbsp;&nbsp;
                                    <button type="button" class="btn btn-danger"  onclick="deletefun(<?php echo $data['getReporteeDetail'][$key]['_id'];?>)"> Delete
                                    </button>
                                </td>
                            <tr>
                                
                            
                            <?php } }?>
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
        <?php if ($msgg = flashToast("reportingAddSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("reportingHeadExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("ReportingDeleteSuccess")) { ?>
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
        var conf = confirm('Are you sure?');
        if(conf){
            window.location.replace("<?php echo URLROOT;?>/OnReportingList/DeleteDesgByEmpId/"+ID);
        }
    }
</script>