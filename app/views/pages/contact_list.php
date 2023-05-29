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
            <li><a href="#">Contact</a></li>
            <li class="active">Contact List</li>
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
                              <h5 class="panel-title">Contact List</h5>
                          </div>
                          <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                              <a href="<?=URLROOT;?>/Contact/contact_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Add New  <i class="fa fa-arrow-right"></i></button></a>
                          </div>
                        </div>
<!-- <?php print_r($data); ?> -->
                    </div>
                    <div class="panel-body">
                        <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Contact Type</th>
                                    <th>Company Name</th>
                                    <th>Contact No</th>
                                    <th>Contact Person Name</th>
                                    <th>Email Id</th>
                                    <th>GSTIN No</th>
                                    <th>Others</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(!isset($data["contact_list"])):
                                ?>
                                <tr>
                                    <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                </tr>
                                <?php else:
                                $i=0;
                                foreach ($data["contact_list"] as $value):
                                ?>
                                <tr>
                                    <td><?=$value["contact_type"]!=""?$value['contact_type']:"N/A";?></td>
                                    <td><?=$value["contact_name"]!=""?$value['contact_name']:"N/A";?></td>
                                    <td><?=$value["contact_no"]!=""?$value['contact_no']:"N/A";?></td>
                                    <td><?=$value["contact_person_name"]!=""?$value['contact_person_name']:"N/A";?></td>
                                    <td><?=$value["contact_email_id"]!=""?$value['contact_email_id']:"N/A";?></td>
                                    <td><?=$value["gstin_no"]!=""?$value['gstin_no']:"N/A";?></td>
                                    <td><?=$value["others"]!=""?$value['others']:"N/A";?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?=URLROOT;?>/Contact/contact_add_update/<?=$value["_id"];?>" role="button">Edit</a>
                                    </td>
                                    <td>
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
                    exportOptions: { columns: [ 0,1,2,3] }
                }]
        });
        <?php 
            if($result= flashToast('contact_list'))
            {
                echo "modelInfo('".$result."');";
            }
            if($delete = flashToast('delete'))
            {
                echo "modelInfo('".$delete."');";
            }
             if($delete = flashToast('delete_fail'))
            {
                echo "modelInfo('".$delete."');";
            }
            if($update = flashToast('update'))
            {
                echo "modelInfo('".$update."');";
            }

        ?>
    });
    function modelInfo(msg){
        $.niftyNoty({
            type: 'info',
            icon : 'pli-exclamation icon-2x',
            message : msg,
            container : 'floating',
            timer : 5000
        });
    }
    function deletefun(ID)
    {
        var result = confirm("Do You Want To Delete");
        if(result)
            window.location.replace("<?=URLROOT;?>/Contact/DeleteByIdContact/"+ID);
    }
</script>