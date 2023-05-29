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
            <li><a href="#">Account</a></li>
            <li class="active">Payment Notification</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>

    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Payment Notification</h3>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <?php $url= explode("/swmerp/", $_SERVER['REQUEST_URI'])[1];  ?>
                     <?php if(isset($data["gate_payment_emp_details"])):?>
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/resignation_Controller/payment_notification/<?=(isset($data['id']))?$data['id']:'';?>">
                        <input type="hidden" id="_id" name="_id" value="<?=(isset($data['id']))?$data['id']:'';?>"/>
                        <input type="hidden" id="url" name="url" class="form-control" value="<?=$url;?>">
                        <div class="panel-body">
                            <div class="form-group">
                               <label class="col-md-4 text-bold" for="employee_name">Employee Name</label>
                                <div class="col-md-6"><?=$data['gate_payment_emp_details']["first_name"]." ".$data['gate_payment_emp_details']["middle_name"]." ".$data['gate_payment_emp_details']["last_name"];?></div>
                            </div>
                            <div class="form-group">
                                 <label class="col-md-4 text-bold" for="department_name">Department Name</label>
                                <div class="col-md-6"><?=$data['gate_payment_emp_details']["dept_name"];?></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="designation">Designation</label>
                                <div class="col-md-6"><?=$data['gate_payment_emp_details']["designation_name"];?></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="employment_type">Employment Type</label>
                                <div class="col-md-6">
                                    <?=$data['gate_payment_emp_details']["employment_type"];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="monthly_salary">Monthly Salary</label>
                                <div class="col-md-6">
                                    <span class="text-danger">Rs.</span> <?=$data['gate_payment_emp_details']["monthly_salary"];?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="due_salary">Generated Salary</label>
                                <div class="col-md-6">
                                    <span class="text-danger">Rs.</span> <?=number_format($data["final_salary"],2);?> (For <?=$data["month_count"]?> months)
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="due_salary">Paid Amt</label>
                                <div class="col-md-6">
                                    <span class="text-danger">Rs.</span> <?=number_format($data["total_collection"],2);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="assets_fine_charge">Assets Fine Charge</label>
                                <div class="col-md-6">
                                    <span class="text-danger">Rs.</span> <?=$data['gate_payment_emp_details']['penalty_amount'];?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="due_salary">Due Salary</label>
                                <div class="col-md-6">
                                    <span class="text-danger">Rs.</span> <?=number_format($data["due_amt"],2);?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-bold" for="mode_of_payment">Mode Of Payment <span class="text-danger"> *</span></label>
                                <div class="col-md-6">
                                    <select id="payment_mode_id" name="payment_mode_id" class="form-control">
                                        <option value="">--select--</option>
                                        <?php foreach($data["payment"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["payment_mode_id"]))?($data["payment_mode_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["payment_mode"]?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="other_payment_mode_div">
                                <label class="col-md-4 text-bold" for="other_mode">Other Payment Mode<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" maxlength="50" id="other_payment_mode_id" name="other_payment_mode_id" class="form-control" onkeypress="return isAlpha(event);">
                                </div>
                            </div>
                            <div class="form-group" id="check_neft_bank_imps_no_div">
                                <label class="col-md-4 text-bold" for="other_mode">Cheque/Reference No.<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" maxlength="50" id="check_neft_bank_imps_no" name="check_neft_bank_imps_no" class="form-control" onkeypress="return isAlpha(event);">
                                </div>
                            </div>
                            <div class="form-group" id="transaction_date_div">
                                <label class="col-md-4 text-bold" for="other_mode">Transaction Date<span class="text-danger">*</span></label>
                                <div class="input-group date col-md-6">
                                   <input type="text" id="transaction_date" name="transaction_date" value="" class="form-control mask_date" placeholder="Click Here To Select Transaction Date">
                                   <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                               </div>
                            </div>
                            <div class="form-group" id="emp_bank_details_div">
                                <label class="col-md-4 text-bold" for="other_mode">Bank Name<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <select id="emp_bank_details_id<?=$j;?>" name="emp_bank_details_id[]" class="form-control">
                                            <?php
                                            if(isset($data['emp_bank_details_list'])){
                                                foreach($data['emp_bank_details_list'] as $bValue){
                                            ?>
                                                <optgroup label="<?=$bValue['bank_name']?>">
                                                    <option value="<?=$bValue['_id']?>"><?=$bValue['branch_name']?></option>
                                                </optgroup>
                                            <?php
                                                }
                                            }else{
                                            ?>
                                                <option value="">Not Available!!</option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 text-bold" for="payable_amount">Payable Amount<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="text" maxlength="10" id="payable_amt" name="payable_amt" class="form-control" value="<?=$data["due_amt"];?>" onkeypress="return isDecNum(this, event);" readonly>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <?php if($data["final_salary"]=="0"){ ?>
                                    <span class="text-danger">Salary Is Not Generated, So First Generate Salary Then Start Payment Process</span>
                                <?php  } else { ?>
                                <button class="btn btn-success" id="btn_payment" name="" type="submit">Payment</button>
                                <?php } ?>
                            </div>
                        </div>
                    </form>
                    <?php endif;?>
                    <!--===================================================-->
                    <!--End Horizontal Form-->
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Assigned assets list</h3>
                    </div>
                     <?php if(isset($data["gate_payment_emp_details"])):?>
                    <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-condensed" >
                                        <thead>
                                            <tr>
                                                <th>Item Name </th>
                                                <th>Sub Name </th>
                                                <th>Serial No. </th>
                                                <th>Penalty Amt</th>
                                             </tr>
                                        </thead>
                                        <tbody id="assets_id">
                                            <?php
                                            if(isset($data["penalty_amount_all"])):
                                            if($data["penalty_amount_all"]==""):
                                            ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">Data Not Available!!</td>
                                            </tr>
                                            <?php else:
                                            $z=0;
                                            $total_penalty=0;
                                            foreach ($data["penalty_amount_all"] as $value):
                                                $z++;
                                            ?>
                                            <tr>
                                                <td><?=$value["item_name"];?></td>
                                                <td><?=$value["sub_item_name"];?></td>
                                                <td><?=$value["serial_no_id"];?></td>
                                                <td><?=$value["penalty_amount"];?></td>

                                            </tr>
                                            <?php
                                            $total_penalty=$total_penalty+$value["penalty_amount"];
                                            endforeach;?>
                                            <tr>
                                                <td colspan='3' class="text-danger text-bold" align="right">Total penalty amt: </td>
                                                <td>Rs. <?=number_format($total_penalty,2);?></td>
                                            </tr>
                                            <?php endif;  ?>
                                            <?php endif;  ?>
                                        </tbody>

                                    </table>
                                </div>
                        </div>

                    <?php endif;?>
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
    $('#transaction_date').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $(document).ready(function(){
        $("#other_payment_mode_div").hide();
         $("#check_neft_bank_imps_no_div").hide();
         $("#transaction_date_div").hide();
         $("#emp_bank_details_div").hide();
        $('#payment_mode_id').change(function(){
            var mode_of_payment = $("#payment_mode_id").val();
            if(mode_of_payment == 7)
            {
                $("#other_payment_mode_div").show();
                $("#check_neft_bank_imps_no_div").hide();
                $("#transaction_date_div").hide();
                $("#emp_bank_details_div").hide();
            }
            else if((mode_of_payment == '2')||(mode_of_payment == '3')||(mode_of_payment == '4')||(mode_of_payment == '5')||(mode_of_payment == '6'))
            {
                $("#other_payment_mode_div").hide();
                $("#check_neft_bank_imps_no_div").show();
                $("#transaction_date_div").show();
                $("#emp_bank_details_div").show();
            }
            else
            {
                $("#other_payment_mode_div").hide();
                $("#check_neft_bank_imps_no_div").hide();
                $("#transaction_date_div").hide();
                $("#emp_bank_details_div").hide();
            }
        });
        $("#btn_payment").click(function(){
            var process = true;
            var mode_of_payment = $("#mode_of_payment").val();
            if (mode_of_payment=="") {
                $("#mode_of_payment").css({"border-color":"red"});
                $("#mode_of_payment").focus();
                process = false;
            }
            if(mode_of_payment == 7)
            {
                var other_mode = $("#other_mode").val();
                if(other_mode=='')
                {
                 $("#other_mode").css({"border-color":"red"});
                 $("#other_mode").focus();
                 process = false;
                }
            }
            var payable_amount = $("#payable_amount").val();
            if (payable_amount=="") {
                $("#payable_amount").css({"border-color":"red"});
                $("#payable_amount").focus();
                process = false;
            }
            return process;
        });

    });
    $("#mode_of_payment").change(function(){$(this).css('border-color','');});
    $("#payable_amount").keyup(function(){$(this).css('border-color','');});
    $("#other_mode").keyup(function(){$(this).css('border-color','');});
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