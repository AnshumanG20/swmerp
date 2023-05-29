<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!--<h1 class="page-header text-overflow">Add/Update Leave Type</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->

        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Masters</a></li>
            <li class="active">Add/Update Earning & Deduction</li>
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
                        <h3 class="panel-title">Add/Update Earning & Deduction</h3>

                    </div>

                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Earning_Deduction/earning_deduction_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="grade_id">Grade<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <select id="grade_id" name="grade_id" class="form-control">
                                        <option value="-">--select--</option>
                                        <?php foreach($data["grade"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["grade_id"]))?($data["grade_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["grade_type"]?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="employment_type_id">Employment Type<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <select id="employment_type_id" name="employment_type_id" class="form-control">
                                        <option value="-">--select--</option>
                                        <?php foreach($data["employment"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["employment_type_id"]))?($data["employment_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["employment_type"]?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group hidework">
                                <label class="col-sm-3 control-label" for="work_type">Work Type<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <select id="work_type" name="work_type" class="form-control">
                                        <option value="-">--select--</option>
                                        <option value="Per Hour" <?=(isset($data['work_type']))?($data['work_type']=="Per Hour")?"selected":"":"";?>>Per Hour</option>
                                        <option value="Per Day" <?=(isset($data['work_type']))?($data['work_type']=="Per Day")?"selected":"":"";?>>Per Day</option>
                                        <option value="Per Month" <?=(isset($data['work_type']))?($data['work_type']=="Per Month")?"selected":"":"";?>>Per Month</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="basic_salary">Basic Salary<span class="text-danger">*</span></label>
                                <div class="col-sm-3">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
                                        <input type="text" maxlength="10" id="min_salary" name="min_salary" class="form-control" placeholder="Minimum Salary" value="<?=(isset($data['min_salary']))?$data['min_salary']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                                <div class="col-sm-3 ">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-rupee"></i></span>
                                        <input type="text" id="max_salary" name="max_salary"  minlength="2" maxlength="10" class="form-control" placeholder="Maximum Salary" value="<?=(isset($data['max_salary']))?$data['max_salary']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group  dearness_allowance">
                                <label class="col-sm-3 control-label" for="dearness_allowance">Dearness Allowance</label>
                                <div class="col-sm-1">
                                    <input type="checkbox" id="checkbox_dearness_allowance" onclick="checkedFun()">

                                </div>
                                <div class="col-sm-3 dearness ">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="dearness_allowance" name="dearness_allowance" placeholder="Dearness allowance" value="<?=(isset($data['dearness_allowance']))?$data['dearness_allowance']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group transport_allowance">
                                <label class="col-sm-3 control-label" for="transport_allowance">Transport Allowance</label>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" id="checkbox_transport_allowance" onclick="checkedFun()">
                                </div>
                                <div class="col-sm-3 transport">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="transport_allowance" name="transport_allowance" placeholder="Transport allowance" value="<?=(isset($data['transport_allowance']))?$data['transport_allowance']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group house_rent">
                                <label class="col-sm-3 control-label" for="house_rent_allowance">House Rent Allowance</label>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" id="checkbox_house_rent_allowance" onclick="checkedFun()">
                                </div>
                                <div class="col-sm-3 house">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="house_rent_allowance" name="house_rent_allowance" placeholder="House Rent allowance" value="<?=(isset($data['house_rent_allowance']))?$data['house_rent_allowance']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group medical_reim">
                                <label class="col-sm-3 control-label" for="medical_reimbursement">Medical Reimbursement</label>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" id="checkbox_medical_reimbursement" onclick="checkedFun()">
                                </div>
                                <div class="col-sm-3 medical">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="medical_reimbursement" name="medical_reimbursement" placeholder="Medical Reimbursement" value="<?=(isset($data['medical_reimbursement']))?$data['medical_reimbursement']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group epfhide">
                                <label class="col-sm-3 control-label" for="epf">EPF</label>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" id="checkbox_epf" onclick="checkedFun()">
                                </div>
                                <div class="col-sm-3 epf">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="epf" name="epf" placeholder="EPF" value="<?=(isset($data['epf']))?$data['epf']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group esichide">
                                <label class="col-sm-3 control-label" for="esic">ESIC</label>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" id="checkbox_esic" onclick="checkedFun()">
                                </div>
                                <div class="col-sm-3 esic">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="esic" name="esic" placeholder="ESIC" value="<?=(isset($data['esic']))?$data['esic']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group other_allowance">
                                <label class="col-sm-3 control-label" for="other">Others</label>
                                <div class="col-sm-1 ">
                                    <input type="checkbox" id="checkbox_other" onclick="checkedFun()">
                                </div>
                                <div class="col-sm-3 other">
                                    <div class="input-group mar-btm">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                        <input type="text" maxlength="4" class="form-control" id="other" name="other" placeholder="Others" value="<?=(isset($data['other']))?$data['other']:"";?>" onkeypress="return isDecNum(this, event);">
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" id="btnearning" name="btnearning" type="submit"><?=(isset($data["_id"]))?"Edit Earning & Deduction ":"Add Earning & Deduction ";?></button>
                                <a href="<?=URLROOT;?>/Earning_Deduction/Earning_Deduction_List" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="color: red; text-align: center;">
                                    <?php
                                    if(isset($error))
                                    {
                                        foreach ($error as $value)
                                        {
                                            echo $value;
                                            echo "<br />";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
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


    $(document).ready( function () {


        
        
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
        <?php if ($msgg = flashToast("grnetExist")) { ?>
            modelDanger("<?=$msgg;?>"); 
        <?php } ?>





        $('.dearness,.transport,.house,.medical,.epf,.esic,.other,.epfhide,.esichide,.hidework,.dearness_allowance,.transport_allowance,.house_rent,.medical_reim,.other_allowance').hide();
        var dearness_allowance = $("#dearness_allowance").val();
        if(dearness_allowance)
        {
            $('.dearness_allowance').show();
            $( "#checkbox_dearness_allowance").prop('checked', true);
            $('.dearness').show();
        }
        var house_rent_allowance = $("#house_rent_allowance").val();
        if(house_rent_allowance)
        {
            $('.house_rent').show();
            $( "#checkbox_house_rent_allowance").prop('checked', true);
            $('.house').show();
        }
        var transport_allowance = $("#transport_allowance").val();
        if(transport_allowance)
        {
            $('.transport_allowance').show();
            $( "#checkbox_transport_allowance").prop('checked', true);
            $('.transport').show();
        }
        var medical_reimbursement = $("#medical_reimbursement").val();
        if(medical_reimbursement)
        {
            $('.medical_reim').show();
            $( "#checkbox_medical_reimbursement").prop('checked', true);
            $('.medical').show();
        }
        var epf = $("#epf").val();
        if(epf)
        {
            $('.epfhide').show();
            $( "#checkbox_epf").prop('checked', true);
            $('.epf').show();
        }
        var other= $("#other").val();
        if(other)
        {
            $('.other_allowance').show();
            $( "#checkbox_other").prop('checked', true);
            $('.other').show();
        }
        var esic = $("#esic").val();
        if(esic)
        {
            $('.esichide').show();
            $( "#checkbox_esic").prop('checked', true);
            $('.esic').show();
        }
        var employment_type_id = $('#employment_type_id').val();
       if(employment_type_id==1)
        {
            $('.epfhide').show();
            $('.esichide').show();
            $('.dearness_allowance').show();
            $('.transport_allowance').show();
            $('.house_rent').show();
            $('.medical_reim').show();
            $('.other_allowance').show();
        } 
        if((employment_type_id==3) || (employment_type_id==5))
        {
            $('.hidework').show();
        }
        $("#employment_type_id").change(function(){
            var employment_type_id = $('#employment_type_id').val();
            if(employment_type_id==1)
            {
                $('.epfhide').show();
                $('.esichide').show();
                $('.dearness_allowance').show();
                $('.transport_allowance').show();
                $('.house_rent').show();
                $('.medical_reim').show();
                $('.other_allowance').show();
            }
            else
            {
                $('.epfhide').hide();
                $('.esichide').hide();
                $('.dearness_allowance').hide();
                $('.transport_allowance').hide();
                $('.house_rent').hide();
                $('.medical_reim').hide();
                $('.other_allowance').hide();
            }
            if((employment_type_id==3) || (employment_type_id==5))
            {
                $('.hidework').show();
            }
            else
            {
                $('.hidework').hide();
            }
        });
        $("#btnearning").click(function(){
            var process = true;
            var grade_id = $("#grade_id").val();
            if (grade_id == '-')
            {
                $("#grade_id").css({"border-color":"red"});
                $("#grade_id").focus();
                process = false;
            }
            var employment_type_id = $("#employment_type_id").val();
            if (employment_type_id == '-')
            {
                $("#employment_type_id").css({"border-color":"red"});
                $("#employment_type_id").focus();
                process = false;
            }
            if((employment_type_id==3)||(employment_type_id==5))
            {
                var work_type = $("#work_type").val();
                if(work_type=='-')
                {
                    $("#work_type").css({"border-color":"red"});
                    $("#work_type").focus();
                    process = false;
                }
            }
            var min_salary = $("#min_salary").val();
            if (min_salary=='')
            {
                $("#min_salary").css({"border-color":"red"});
                $("#min_salary").focus();
                process = false;
            }
            if (min_salary<=0)
            {
                alert("Minimum Salary Must Be Greater Than Zero");
                $("#min_salary").css({"border-color":"red"});
                $("#min_salary").focus();
                process = false;
            }
            if(!$.isNumeric(min_salary))
            {
                alert("Minimum Salary Must Be Any Positive Number");
                $("#min_salary").css({"border-color":"red"});
                $("#min_salary").focus();
                process = false;
            }
            var max_salary = $("#max_salary").val();
            if (max_salary=='')
            {
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
            if (max_salary<=0)
            {
                alert("Maximum Salary Must Be Greater Than Zero");
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
            if(!$.isNumeric(max_salary))
            {
                alert("Maximum Salary Must Be Any Positive Number");
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
            min_salary = parseFloat(min_salary);
            max_salary = parseFloat(max_salary);
            if (min_salary > max_salary)
            {
                alert("Maximum Salary Must Be Greater Than  Minimum Salary");
                $("#max_salary").css({"border-color":"red"});
                $("#max_salary").focus();
                process = false;
            }
            var dearness_allowance = $("#dearness_allowance").val();
            if($("#checkbox_dearness_allowance").prop('checked')==true && dearness_allowance=="")
            {
                $("#dearness_allowance").css({"border-color":"red"});
                $("#dearness_allowance").focus();
                process = false;
            }
            if (dearness_allowance<=0 && dearness_allowance!='')
            {
                alert("Dearness Allowance Must Be Any Positive Number");
                $("#dearness_allowance").css({"border-color":"red"});
                $("#dearness_allowance").focus();
                process = false;
            }
            if(!$.isNumeric(dearness_allowance) && dearness_allowance!='' )
            {
                alert("Dearness Allowance Must Be Any Positive Number");
                $("#dearness_allowance").css({"border-color":"red"});
                $("#dearness_allowance").focus();
                process = false;
            }
            if(dearness_allowance>99)
            {
                alert("Percentage Value Must Be Less Than 100");
                $("#dearness_allowance").css({"border-color":"red"});
                $("#dearness_allowance").focus();
                process = false;
            }
            var transport_allowance = $("#transport_allowance").val();
            if (transport_allowance<=0 && transport_allowance!='')
            {
                alert("Transport Allowance Must Be Any Positive Number");
                $("#transport_allowance").css({"border-color":"red"});
                $("#transport_allowance").focus();
                process = false;
            }
            if(!$.isNumeric(transport_allowance) && transport_allowance!='' )
            {
                alert("Transport Allowance Must Be Any Positive Number");
                $("#transport_allowance").css({"border-color":"red"});
                $("#transport_allowance").focus();
                process = false;
            }
            if(transport_allowance>99)
            {
                alert("Percentage Value Must Be Less Than 100");
                $("#transport_allowance").css({"border-color":"red"});
                $("#transport_allowance").focus();
                process = false;
            }
            if($("#checkbox_transport_allowance").prop('checked')==true && transport_allowance=="")
            {
                $("#transport_allowance").css({"border-color":"red"});
                $("#transport_allowance").focus();
                process = false;
            }
            var house_rent_allowance = $("#house_rent_allowance").val();
            if (house_rent_allowance<=0 && house_rent_allowance!='')
            {
                alert("House Rent Allowance Must Be Any Positive Number");
                $("#house_rent_allowance").css({"border-color":"red"});
                $("#house_rent_allowance").focus();
                process = false;
            }
            if(!$.isNumeric(house_rent_allowance) && house_rent_allowance!='' )
            {
                alert("House Rent Allowance Must Be Any Positive Number");
                $("#house_rent_allowance").css({"border-color":"red"});
                $("#house_rent_allowance").focus();
                process = false;
            }
            if(house_rent_allowance>99)
            {
                alert("Percentage Value Must Be Less Than 100");
                $("#house_rent_allowance").css({"border-color":"red"});
                $("#house_rent_allowance").focus();
                process = false;
            }
            if($("#checkbox_house_rent_allowance").prop('checked')==true && house_rent_allowance=="")
            {
                $("#house_rent_allowance").css({"border-color":"red"});
                $("#house_rent_allowance").focus();
                process = false;
            }
            var medical_reimbursement = $("#medical_reimbursement").val();
            if (medical_reimbursement<=0 && medical_reimbursement!='')
            {
                alert("Medical Reimbursement Must Be Any Positive Number");
                $("#medical_reimbursement").css({"border-color":"red"});
                $("#medical_reimbursement").focus();
                process = false;
            }
            if(!$.isNumeric(medical_reimbursement) && medical_reimbursement!='')
            {
                alert("Medical Reimbursement Must Be Any Positive Number");
                $("#medical_reimbursement").css({"border-color":"red"});
                $("#medical_reimbursement").focus();
                process = false;
            }
            if(medical_reimbursement>99)
            {
                alert("Percentage Value Must Be Less Than 100");
                $("#medical_reimbursement").css({"border-color":"red"});
                $("#medical_reimbursement").focus();
                process = false;
            }
            if($("#checkbox_medical_reimbursement").prop('checked')==true && medical_reimbursement=="")
            {
                $("#medical_reimbursement").css({"border-color":"red"});
                $("#medical_reimbursement").focus();
                process = false;
            }
            var epf = $("#epf").val();
            if (epf<=0 && epf!='')
            {
                alert("EPF Must Be Any Positive Number");
                $("#epf").css({"border-color":"red"});
                $("#epf").focus();
                process = false;
            }
            if(!$.isNumeric(epf) && epf!='')
            {
                alert("EPF Must Be Any Positive Number");
                $("#epf").css({"border-color":"red"});
                $("#epf").focus();
                process = false;
            }
            if(epf>99)
            {
                alert("Percentage Value Must Be Less Than 100");
                $("#epf").css({"border-color":"red"});
                $("#epf").focus();
                process = false;
            }
            if($("#checkbox_epf").prop('checked')==true && epf=="")
            {
                $("#epf").css({"border-color":"red"});
                $("#epf").focus();
                process = false;
            }
            var esic = $("#esic").val();
            if (esic<=0 && esic!='')
            {
                alert("ESIC Must Be Any Positive Number");
                $("#esic").css({"border-color":"red"});
                $("#esic").focus();
                process = false;
            }
            if(!$.isNumeric(esic) && esic!='' )
            {
                alert("ESIC Must Be Any Positive Number");
                $("#esic").css({"border-color":"red"});
                $("#esic").focus();
                process = false;
            }
            if(esic>99)
            {
                alert("Percentage Value Must Be Less than 100");
                $("#esic").css({"border-color":"red"});
                $("#esic").focus();
                process = false;
            }
            if($("#checkbox_esic").prop('checked')==true && esic=="")
            {
                $("#esic").css({"border-color":"red"});
                $("#esic").focus();
                process = false;
            }
            var other = $("#other").val();
            if (other<=0 && other!='')
            {
                alert("Other Must Be Any Positive Number");
                $("#other").css({"border-color":"red"});
                $("#other").focus();
                process = false;
            }
            if(!$.isNumeric(esic) && esic!='' )
            {
                alert("Other Must Be Any Positive Number");
                $("#other").css({"border-color":"red"});
                $("#other").focus();
                process = false;
            }
            if($("#checkbox_other").prop('checked')==true && other=="")
            {
                $("#other").css({"border-color":"red"});
                $("#other").focus();
                process = false;

            }
            if(other>99)
            {
                alert("Percentage Value Must Be Less Than 100");
                $("#other").css({"border-color":"red"});
                $("#other").focus();
                process = false;
            }
            return process;
        });
        $("#grade_id").change(function(){$(this).css('border-color','');});
        $("#employment_type_id").change(function(){$(this).css('border-color','');});
        $("#min_salary").keyup(function(){$(this).css('border-color','');});
        $("#max_salary").keyup(function(){$(this).css('border-color','');});
        $("#dearness_allowance").keyup(function(){$(this).css('border-color','');});
        $("#transport_allowance").keyup(function(){$(this).css('border-color','');});
        $("#house_rent_allowance").keyup(function(){$(this).css('border-color','');});
        $("#medical_reimbursement").keyup(function(){$(this).css('border-color','');});
        $("#epf").keyup(function(){$(this).css('border-color','');});
        $("#esic").keyup(function(){$(this).css('border-color','');});
        $("#other").keyup(function(){$(this).css('border-color','');});
        $("#work_type").change(function(){$(this).css('border-color','');});
    });

    function checkedFun()
    {
        if($("#checkbox_dearness_allowance").prop('checked')==true)
        {
            $(".dearness").show();
        }
        else
        {
            $('.dearness').hide();
            $("#dearness_allowance").val('');
        }
        if($("#checkbox_transport_allowance").prop('checked')==true)
        {
            $('.transport').show();
            //  $("#transport_allowance").val();
        }
        else
        {
            $('.transport').hide();
            $("#transport_allowance").val('');
        }
        if($("#checkbox_house_rent_allowance").prop('checked')==true)
        {
            $('.house').show();
            // $("#house_rent_allowance").val();
        }
        else
        {
            $('.house').hide();
            $("#house_rent_allowance").val('');
        }
        if($("#checkbox_medical_reimbursement").prop('checked')==true)
        {
            $('.medical').show();
            // $("#medical_reimbursement").val();
        }
        else
        {
            $('.medical').hide();
            $("#medical_reimbursement").val('');
        }
        if($("#checkbox_epf").prop('checked')==true)
        {
            $('.epf').show();
            //  $("#epf").val();
        }
        else
        {
            $('.epf').hide();
            $("#epf").val('');
        }
        if($("#checkbox_esic").prop('checked')==true)
        {
            $('.esic').show();
            // $("#esic").val();
        }
        else
        {
            $('.esic').hide();
            $("#esic").val('');
        }
        if($("#checkbox_other").prop('checked')==true)
        {
            $('.other').show();
            // $("#other").val();
        }
        else
        {
            $('.other').hide();
            $("#other").val('');
        }
    }
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