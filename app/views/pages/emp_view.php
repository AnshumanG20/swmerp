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
            <h1 class="page-header text-overflow">Employee List</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Users</a></li>
            <li class="active">Employee List</li>
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
                        <h5 class="panel-title">Employee List</h5>
                        <?php
                        /* if(is_string($data['department_mstr_id'])){
                                            echo "String";
                                        } */
                        ?>
                    </div>
                    <div class="panel-body">
                        <div class="pad-btm">
                            <div class ="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Employee/empList">
                                            <div class="col-md-2" style="padding-right: 40px;">
                                                <div class="form-group">
                                                    <label class="control-label" for="department_mstr_id"> Department Name</label>
                                                    <select id="department_mstr_id" name="department_mstr_id" class="form-control">
                                                        <option value="">All</option>
                                                        <?php
                                                        if(isset($data["dept"])):
                                                        foreach($data["dept"] as $value): $ID = strval($value["_id"]); ?>
                                                        <option value="<?=$value["_id"]?>"<?=(isset($data["department_mstr_id"]))?($data["department_mstr_id"]==$ID)?"SELECTED":"":"";?>><?=$value["dept_name"]?></option>
                                                        <?php
    endforeach;
                                                            endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-right: 40px;">
                                                <div class="form-group">
                                                    <label class="control-label" for="designation">Designation</label>
                                                    <select id="designation" name="designation" class="form-control" <?=(isset($data["department_mstr_id"]))?($data["department_mstr_id"]=="")?"readonly":"":"readonly";?> >
                                                        <option value=''>All</option>
                                                        <?php
                                                        if(isset($data["designationlist"])):
                                                        foreach($data["designationlist"] as $value): ?>
                                                        <option value="<?=$value["_id"]?>"<?=(isset($data["designation"]))?($data["designation"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["designation_name"]?></option>
                                                        <?php 
    endforeach;
                                                            endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2" style="padding-right: 40px;">
                                                <div class="form-group">
                                                    <label class="control-label" for="employment_type_id">Employment Type</label>
                                                    <select id="employment_type_id" name="employment_type_id" class="form-control">
                                                        <option value=''>All</option>
                                                        <?php 
                                                        if(isset($data["employment"])):
                                                        foreach($data["employment"] as $value):?>
                                                        <option value="<?=$value["_id"]?>"<?=(isset($data["employment_type_id"]))?($data["employment_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["employment_type"]?></option>
                                                        <?php 
    endforeach;
                                                            endif;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-1">&nbsp;</div>//-->
                                            <div class="col-md-2">
                                                <div class="form-group ">
                                                    <label class="control-label" for="status">Status</label>
                                                    <select id="status" name="status" class="form-control">
                                                        <option value="">All</option>
                                                        <option value="1" <?=(isset($data['status']))?($data['status']=="1")?"selected":"":"";?>>Activated</option>
                                                        <option value="0" <?=(isset($data['status']))?($data['status']=="0")?"selected":"":"";?>>Deactivate</option>
                                                        <option value="6" <?=(isset($data['status']))?($data['status']=="6")?"selected":"":"";?>>In Progress</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label" for="btnsearch">&nbsp;</label>
                                                    <button class="btn btn-success btn-block" id="btnsearch" name="btnsearch" type="submit">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="demo_dt_basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email Id</th>
                                        <th>Department</th>
                                        <th>Designation</th>
                                        <th>Employment Type</th>
                                        <th>Present Address</th>
                                        <th>Status</th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(isset($data["emp_list"])):
                                    if($data["emp_list"]==""):
                                    ?>
                                    <tr>
                                        <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                    </tr>
                                    <?php else:
                                    $i=0;
                                    foreach ($data["emp_list"] as $value):
                                    ?>
                                    <tr>
                                        <td><?=++$i;?></td>
                                        <td><?=(isset($value['first_name']))?$value["first_name"]:"";?>&nbsp;&nbsp;
                                            <?=(isset($value['middle_name']))?$value['middle_name']:"";?> &nbsp;&nbsp;
                                            <?=(isset($value['last_name']))?$value['last_name']:"";?>
                                        </td>
                                        <td><?=(isset($value['personal_phone_no']))?$value['personal_phone_no']:"";?></td>
                                        <td><?=(isset($value['email_id']))?$value['email_id']:"";?></td>
                                        <td><?=(isset($value['dept_name']))?$value['dept_name']:"";?></td>
                                        <td><?=(isset($value['designation_name']))?$value['designation_name']:"";?></td>
                                        <td><?=(isset($value['employment_type']))?$value['employment_type']:"";?></td>
                                        <td><?=(isset($value['present_address']))?$value["present_address"]:"";?>&nbsp;&nbsp;
                                            <?=(isset($value['present_city']))?$value['present_city']:"";?> &nbsp;&nbsp;
                                            <?=(isset($value['present_district']))?$value['present_district']:"";?>&nbsp;&nbsp;
                                            <?=(isset($value['present_state']))?$value['present_state']:"";?>&nbsp;&nbsp;
                                            <?=(isset($value['present_pin_code']))?$value['present_pin_code']:"";?>&nbsp;&nbsp;
                                        </td>
                                        <td>
                                            <?php 
                                            if($value['step_status']==6){
                                                if($value['_status']==1){
                                                    echo "Activated";
                                                }else if($value['_status']==0){
                                                    echo "Deactivated";
                                                }
                                            }else{
                                                echo "In Progress";
                                            }
                                            ?>
                                        </td>
                                        <td> <a class="btn btn-primary" href="<?=URLROOT;?>/Employee/empAddUpdate/1/<?=$value["_id"];?>">View</a></td>
                                        <td>
                                            <a class="btn btn-primary" href="<?=URLROOT;?>/Employee/empAddUpdate/1/<?=$value["_id"];?>">Edit</a>
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
        $('#department_mstr_id').change(function(){
            var department_mstr_id = $("#department_mstr_id").val();
            if(department_mstr_id!="")
            {
                $("#designation" ).attr('readonly', false);
                $.ajax({
                    type: "POST",
                    url: "<?=URLROOT;?>/Employee/ajax_gatedesignation/",
                    dataType:"json",
                    data:
                    {
                        department_mstr_id:department_mstr_id
                    },
                    success: function(data){
                        // alert(data);
                        if(data.response==true){
                            $("#designation").html(data.data);
                        }else{
                            $("#designation").html("<option value=''>--select--</option>");
                        }
                    }
                });
            }
            else
            {
                $("#designation" ).attr('readonly', true);
                $("#designation").html("<option value=''>All</option>");

            }

        });
    });
</script>
