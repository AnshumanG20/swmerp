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
            <li class="active">Company Details</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="panel-title">Company Details</h5>
                            </div>
                            <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                                <a href="<?=URLROOT;?>/Company_Details/company_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>"> <button id="demo-foo-collapse" class="btn btn-purple"><?=(isset($data["_id"]))?"Edit Company Details":"Add Company Details";?><i class="fa fa-arrow-right"></i></button></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <form class="form-vertical" method="post" action="<?=URLROOT;?>/Company_Details/company_add_update">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Company Name</label>
                                </div>
                                <div class="col-sm-2">
                                 <b><?=(isset($data['company_name']))?$data['company_name']:'';?></b>
                                </div>
                                  <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <label>Website Name</label>
                                </div>
                                <div class="col-sm-2">
                                   <b><?=(isset($data['website']))?$data['website']:'';?></b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Cin No</label>
                                </div>
                                <div class="col-sm-2">
                                  <b><?=(isset($data['cin_no']))?$data['cin_no']:'';?></b>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <label>Tin No</label>
                                    </div>
                                <div class="col-sm-2">
                                    <b><?=(isset($data['tin_no']))?$data['tin_no']:'';?></b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Pan No</label>
                                    </div>
                                <div class="col-sm-2">
                                  <b><?=(isset($data['pan_no']))?$data['pan_no']:'';?></b>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <label>Tds No</label>
                                 </div>
                                <div class="col-sm-2">
                                   <b><?=(isset($data['tds_no']))?$data['tds_no']:'';?></b>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">Company Branch/HO/Registered List</h5>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/Company_Details/companylocation_add_update"><button id="demo-foo-collapse" class="btn btn-purple">Add New Location <i class="fa fa-arrow-right"></i></button></a>
                            <a href="<?=URLROOT;?>/Company_Details/company_deactivate_list"><button id="demo-foo-collapse" class="btn btn-purple" style="text-align:right;"><i class="fa fa-arrow-left"></i>Deactivated Location List </button></a>

                        </div>

                        <table id="demo_dt_basic" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <!--<th>CIN No.</th>//-->
                                    <!--<th>PAN No</th>//-->
                                    <!--<th>TIN No.</th>//-->
                                    <th>GSTIN No.</th>
                                  <!--  <th>TDS No.</th>//-->
                                    <th>Contact No.</th>
                                    <th>Email Id</th>

                                    <th>Office Type</th>
                                    <th>Edit</th>
                                    <th>Deactivate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($data["company_list"])):?>
                                <?php if(!empty($data["company_list"])):?>
                                <?php $i=0; foreach ($data["company_list"] as $value):?>
                                <tr class='<?php if($value["office_type"]=="Registered"){echo "text-info";} else if($value["office_type"]=="Head/Corporate Office"){echo "text-success";}?>'>
                                    <td><?=++$i;?></td>
                                    <td><?=$value["address"];?></td>
                                     <td><?=$value["city"]." ".$value["dist"]." ".$value["state"];?></td>
                                    <!--<td><?=$value["cin_no"];?></td>//-->
                                   <!-- <td><?=$value["pan_no"];?></td>//-->
                                   <!-- <td><?=$value["tin_no"];?></td>//-->
                                    <td><?=$value["gstin_no"];?></td>
                                    <!--<td><?=$value["tds_no"];?></td>//-->
                                    <td><?=$value["contact_no"];?></td>
                                    <td><?=$value["email_id"];?></td>

                                    <td><?=$value["office_type"];?></td>
                                    <td><a href="<?=URLROOT;?>/Company_Details/companylocation_add_update/<?=$value["_id"];?>" class="btn btn-purple">Edit Location</a>
                                    </td>
                                    <td>
                                    <button type="button" class="btn btn-purple" onclick="d_active_fun(<?=$value["_id"];?>);">Deactivate</button>
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
        <?php if ($msgg = flashToast("companyAddSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("companyUpdateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>
        <?php if ($msgg = flashToast("companyLocationUpdateSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?><?php if ($msgg = flashToast("companyLocationAddSuccess")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        <?php if ($msgg = flashToast("companyDeactiveSuccess")) { ?>  
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>

        
        <?php if ($msgg = flashToast("companyReactiveSuccess")) { ?>
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
    function d_active_fun(ID)
    {
       
        if (confirm("Do You Want To Deactivate Location")) {
            window.location.replace("<?=URLROOT;?>/Company_Details/company_deactivate/"+ID+"/"+true);
        } else {
        
        // console.log('delte cancel');
        }
            }
</script>