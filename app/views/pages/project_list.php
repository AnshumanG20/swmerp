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
            <!--<h1 class="page-header text-overflow">General Elements</h1>//-->
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Masters</a></li>
            <li class="active">Project List</li>
        </ol>
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">Project List</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/Masters/project_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Add New  <i class="fa fa-arrow-right"></i></button></a>
                        </div>
                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Concept Type</th>
                                    <th>Project Short Name</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Project Description</th>
                                    <th>Project Location</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($data["projectlist"])):
                                if($data["projectlist"]==""):
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                </tr>
                                <?php else:
                                $i=0;
                                foreach ($data["projectlist"] as $value):
                                ?>
                                <tr>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["project_name"];?></td>
                                    <td>
                                        <?=($value['concept_type']==null)?"N/A":$value['concept_type'];?>
                                    </td>
                                    <td><?=$value["project_short_name"];?></td>
                                    <td><?=($value["latitude"]!="")?$value["latitude"]:"N/A";?></td>
                                    <td><?=($value["longitude"]!="")?$value["longitude"]:"N/A";?></td>
                                    <td><?=$value["project_description"];?></td>
                                    <td>
                                    <?php
                                    if(!empty($value['fullAdd'])){
                                        $z = 0;
                                        foreach ($value['fullAdd'] as $key => $addValue) {
                                            echo "<span class='text-danger'>".++$z.".> </span>";
                                            echo "<b>Dist :</b> ".$addValue['district'].", <b>City :</b> ".$addValue['city'];
                                            echo "<hr>";
                                        }
                                    }
                                    ?>
                                        <!-- <?="<b>State -></b> ".$value['state'].", <b>Dist -></b> ".$value['dist'].", <b>City -></b> ".$value['city'];?> -->
                                            
                                        </td>
                                    <td>
                                        <a class="btn btn-primary" href="<?=URLROOT;?>/Masters/project_add_update/<?=$value["_id"];?>" role="button">Edit</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" onclick="deletefun(<?=$value["_id"];?>);">Delete</button>
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
        <?php if ($msgg = flashToast("projectAddSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("projectAddError")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("projectUpdateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("projectDeleteSuccess")) { ?>
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
                    exportOptions: { columns: [ 0, 1,2,3,4,5,6] }
                }]
        });
    });
    function deletefun(ID)
    {
        var result = confirm("Do You Want To Delete");
        if(result)
            window.location.replace("<?=URLROOT;?>/Masters/DeleteByIdProject/"+ID);
    }
</script>