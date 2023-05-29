<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->

                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Inventory Notification</a></li>
                    <li class="active">Inventory Notification</li>
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
                                    <h3 class="panel-title">Inventory Notification</h3>
                                </div>
                                <!--Horizontal Form-->
                                <!--===================================================-->
                                <?php $url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1];
                                ?>
                                 <?php
                                    if(isset($data["employee_details"])):
                                ?>
                                <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Termination/emp_termination_inventory_notification">
                                    <div class="panel-body">
                                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                                        <input type="hidden" id="quit_id" name="quit_id" class="form-control" value="<?=$data["employee_details"]["_id"];?>">
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Name </label>
                                            <div class="col-sm-3" >
                                                <input type="hidden" id="emp_id" name="emp_id" class="form-control" value="<?=$data["employee_details"]["emp_id"];?>">
                                                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?=$data["employee_details"]["first_name"];?>" readonly style=" border: none;">
                                            </div>
                                            <label class="col-sm-2 control-label">Employee Code </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="resign_date" name="resign_date" class="form-control" value="<?=$data["employee_details"]["employee_code"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Employee Designation </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="resign_date" name="resign_date" class="form-control" value="<?=$data["employee_details"]["designation_name"];?>" readonly style=" border: none;">
                                            </div>
                                            <label class="col-sm-2 control-label" for="design">Date Of Joining </label>
                                            <div class="col-sm-3" >
                                                <input type="text" id="doj" name="doj" class="form-control" value="<?=$data["employee_details"]["joining_date"];?>" readonly style=" border: none;">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group" >
                                            <div class="col-md-12">
                                                <div class="panel panel-primary">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">List Of Assets Assign To Employee </h3>
                                                    </div>
                                                     <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-condensed" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Assets Name </th>
                                                                    <th>Assets Sub Name </th>
                                                                    <th>Assets Serial No. </th>
                                                                    <th>Condition</th>
                                                                    <th>Penalty Amount</th>
                                                                    <th>Purchase Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="assets_id">
                                                                <?php
                                                                if(isset($data["employee_asset_list"])):
                                                                if($data["employee_asset_list"]==""):
                                                                ?>
                                                                <tr>
                                                                    <td colspan="6" style="text-align: center;">Data Not Available!!</td>
                                                                </tr>
                                                                <?php else:
                                                                        $z=0;
                                                                foreach ($data["employee_asset_list"] as $value):
                                                                    $z++;
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="hidden" maxlength="150" id="assets_name" name="assets_name[]" class="form-control" value="<?=$value["item_name_id"];?>" />
                                                                        <input type="text" maxlength="150" id="assets_nam" name="assets_nam" class="form-control" value="<?=$value["item_name"];?>" readonly/>
                                                                    </td>
                                                                    <td>
                                                                        <input type="hidden" maxlength="150" id="assets_sub_name" name="assets_sub_name[]" class="form-control" value="<?=$value["sub_item_name_id"];?>" />
                                                                        <input type="text" maxlength="150" id="assets_nam" name="assets_sub_nam" class="form-control" value="<?=$value["sub_item_name"];?>"readonly/>
                                                                    </td>
                                                                    <td><input type="text" maxlength="50" id="assets_name" name="assets_serial_no[]" class="form-control" value="<?=$value["asset_barcode_no"];?>" readonly/></td>
                                                                    <td>
                                                                        <select id="condition<?=$z;?>" name="condition[]" class="form-control condition" onchange="funCondition(this.id);">
                                                                            <option value="">--select--</option>
                                                                            <option value="Ignore">Ignore</option>
                                                                            <option value="Dimage">Damaged</option>
                                                                            <option value="Lost">Lost</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" maxlength="8" id="penalty<?=$z;?>" name="penalty[]" class="form-control penalty" value="" onkeypress="return isDecNum(this, event);" onkeyup="changeBorderNormal(this.id);"/>
                                                                    </td>
                                                                    <td><input type="text" maxlength="5" id="net_Amount" name="net_Amount" class="form-control" value="<?=$value["purchase_cost"];?>" readonly/></td>
                                                                </tr>
                                                                <?php endforeach;?>
                                                                <?php endif;  ?>
                                                                <?php endif;  ?>
                                                            </tbody>
                                                           <!--  <tfooter>

                                                                <tr>
                                                                 <td class="text-danger" colspan="4"><b style="float:right;">Net Penalty Amount</b></td>
                                                                 <td class="text-danger" colspan="2" id="net_penalty"><b></b></td>

                                                                </tr>
                                                            </tfooter> -->
                                                        </table>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-4">
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-success col-sm-4" id="submit_assets" name="submit_assets" type="submit">Submit Assets</button>

                                                            </div>
                                                            <div class="col-sm-4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                                <?php endif;  ?>
                                <!--===================================================-->
                                <!--End Horizontal Form-->


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

<script type="text/javascript">
    function changeBorderNormal(ID){
        $('#'+ID).css('border-color', '');
    }
    function funCondition(ID){
        ID = ID.split("condition")[1];
        $('#condition'+ID).css('border-color', '');
        var condition = $("#condition"+ID).val();
        if(condition == 'Ignore'){
            $('#penalty'+ID).val("");
            $('#penalty'+ID).attr('readonly', true);
        }else{
            $('#penalty'+ID).attr('readonly', false);
        }

    }
    $(document).ready(function(){
        $('#submit_assets').click(function(){
            var process = true;
            $(".condition").each(function() {
                var ID = this.id;
                ID = ID.split("condition")[1];
                var condition = $("#condition"+ID).val();
                if(condition==""){
                    $('#condition'+ID).css('border-color', 'red');
                    process = false;
                }else{
                    if(condition != 'Ignore'){
                        if($('#penalty'+ID).val()=="" || $('#penalty'+ID).val()==0){
                            $('#penalty'+ID).css('border-color', 'red');
                            process = false;
                        }
                    }
                }
            });
            return process;

        });
    });
    function isDecNum(txt, evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
                return true;
            } else {
                return false;
            }
        } else {
            if (charCode > 31 &&
                (charCode < 48 || charCode > 57))
                return false;
        }
        return true;
    }
</script>