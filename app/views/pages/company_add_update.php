<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!-- <h1 class="page-header text-overflow">Add/Update Company Details</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Company</a></li>
            <li class="active">Add/Update Company Details</li>
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
                        <h3 class="panel-title">Add/Update Company Details</h3>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->
                    <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Company_Details/company_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                        <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label class="control-label" for="company_name">Company Name<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="50" placeholder="Enter Company Name" id="company_name" name="company_name" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label" for="website_name">Website Name<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="50" placeholder="Enter Company Website Name" id="website" name="website" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label class="control-label" for="cin_no">CIN No.<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="21" placeholder="Enter CIN No." id="cin_no" name="cin_no" class="form-control" value="<?=(isset($data['cin_no']))?$data['cin_no']:"";?>" >
                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label" for="pan_no">PAN No.<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="10" placeholder="Enter PAN No." id="pan_no" name="pan_no" class="form-control" value="<?=(isset($data['pan_no']))?$data['pan_no']:"";?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label class="control-label" for="tin_no">TIN No.<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="15" placeholder="Enter TIN No." id="tin_no" name="tin_no" class="form-control" value="<?=(isset($data['tin_no']))?$data['tin_no']:"";?>" onkeypress="return isNum(event);" >
                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label" for="tds_no">TDS No.<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="10" placeholder="Enter TDS No." id="tds_no" name="tds_no" class="form-control" value="<?=(isset($data['tds_no']))?$data['tds_no']:"";?>" onkeypress="return isNum(event);">
                                </div>
                            </div>
                            <?php if(!isset($data['_id'])){?>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label class="control-label text-danger"><u>Registered Office Details</u></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <label class="control-label" for="gstin_no">GSTIN No.</label>
                                    <input type="text" maxlength="15" placeholder="Enter GSTIN No." id="gstin_no" name="gs_gstin_no" class="form-control" value="<?=(isset($data['gstin_no']))?$data['gstin_no']:"";?>" >
                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label" for="contact_no">Contact No.</label>
                                    <input type="text" maxlength="10" placeholder="Enter Contact No." id="contact_no" name="con_contact_no" class="form-control" value="<?=(isset($data['contact_no']))?$data['contact_no']:"";?>" onkeypress="return isNum(event);" >
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-sm-5">
                                    <label class="control-label" for="email_id">Email Id</label>
                                    <input type="text" maxlength="50" placeholder="Enter Email Id" id="email_id" name="em_email_id" class="form-control" value="<?=(isset($data['email_id']))?$data['email_id']:"";?>" >
                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label" for="address">Address</label>
                                    <textarea type="text" maxlength="250" placeholder="Enter Company Address" id="address" name="address" class="form-control" ><?=(isset($data['address']))?$data['address']:"";?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="control-label" for="state">State</label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="">SELECT</option>
                                            <?php
                                                           if($data['stateList']){
                                                               foreach ($data['stateList'] as $stateValue) {
                                            ?>
                                            <option value="<?=$stateValue['state'];?>" <?=(isset($data['state']))?($data['state']==$stateValue['state'])?"selected='selected'":"":"";?>><?=$stateValue['state']?></option>
                                            <?php
                                                               }
                                                           }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="control-label" for="district">District</label>
                                        <select id="district" name="district" class="form-control">
                                            <option value="">SELECT</option>
                                            <?php
                                                           if($data['districtList']){
                                                               foreach ($data['districtList'] as $distValue) {
                                            ?>
                                            <option value="<?=$distValue['dist'];?>" <?=(isset($data['dist']))?($data['dist']==$distValue['dist'])?"selected='selected'":"":"";?>><?=$distValue['dist']?></option>
                                            <?php
                                                               }
                                                           }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="control-label" for="state_dist_city_id">City</label>
                                        <select id="state_dist_city_id" name="state_dist_city_id" class="form-control">
                                            <option value="">SELECT</option>
                                            <?php
                                                           if($data['cityList']){
                                                               foreach ($data['cityList'] as $distValue) {
                                            ?>
                                            <option value="<?=$distValue['_id'];?>" <?=(isset($data['city']))?($data['city']==$distValue['city'])?"selected='selected'":"":"";?>><?=$distValue['city']?></option>
                                            <?php
                                                               }
                                                           }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group radio_hide">
                                <div class="col-sm-4">
                                    <label class="control-label">Do you want to add HO/Branch Office Details?</label>
                                </div>
                                <div class="col-sm-4">
                                    <input type="radio" name="radio_com" id="radio_yes"  value="radio_yes"/> Yes
                                    <input type="radio" name="radio_com" id="radio_no"  value="radio_no" /> No
                                </div>
                            </div>
                            <div class="form-group" id="ho_branch_div">
                                <div class="col-sm-4">
                                    <label class="control-label">Add HO/Branch</label>
                                </div>
                                <div class="col-sm-4">
                                    <select id="ho_branch" name="ho_branch" class="form-control">
                                        <option value="-">--select--</option>
                                        <option value="Head/Corporate Office">Head/Corporate Office</option>
                                        <option value="Branch Office">Branch Office</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group" id="head_office_div">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Head Office Details &nbsp;&nbsp; <input type="checkbox" id="chk_head_office" name="chk_head_office" /> <b>Same as Above</b></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <label class="control-label" for="address">Address</label>
                                                    <textarea type="text" maxlength="50" placeholder="Enter Company Address" id="ho_address" name="ho_address" class="form-control"><?=(isset($data['address']))?$data['address']:"";?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <label class="control-label" for="gstin_no">GSTIN No.</label>
                                                    <input type="text" maxlength="50" placeholder="Enter GSTIN No." id="ho_gstin_no" name="ho_gstin_no" class="form-control" value="<?=(isset($data['gstin_no']))?$data['gstin_no']:"";?>" >
                                                </div>
                                                <div class="col-sm-5">
                                                    <label class="control-label" for="contact_no">Contact No.</label>
                                                    <input type="text" maxlength="10" placeholder="Enter Contact no." id="ho_contact_no" name="ho_contact_no" class="form-control" value="<?=(isset($data['contact_no']))?$data['contact_no']:"";?>" onkeypress="return isNum(event);" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-5">
                                                    <label class="control-label" for="email_id">Email Id</label>
                                                    <input type="email" maxlength="50" placeholder="Enter Email Id" id="ho_email_id" name="ho_email_id" class="form-control" value="<?=(isset($data['email_id']))?$data['email_id']:"";?>" >
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label class="control-label" for="state">State</label>
                                                            <select id="ho_state" name="ho_state" class="form-control" onchange="changeState('ho_state');">
                                                                <option value="">SELECT</option>
                                                                <?php
                                                           if($data['stateList']){
                                                               foreach ($data['stateList'] as $stateValue) {
                                                                ?>
                                                                <option value="<?=$stateValue['state'];?>" <?=(isset($data['state']))?($data['state']==$stateValue['state'])?"selected='selected'":"":"";?>><?=$stateValue['state']?></option>
                                                                <?php
                                                               }
                                                           }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label class="control-label" for="district">District</label>
                                                            <select id="ho_district" name="ho_district" class="form-control">
                                                                <option value="">SELECT</option>
                                                                <?php
                                                           if($data['districtList']){
                                                               foreach ($data['districtList'] as $distValue) {
                                                                ?>
                                                                <option value="<?=$distValue['dist'];?>" <?=(isset($data['dist']))?($data['dist']==$distValue['dist'])?"selected='selected'":"":"";?>><?=$distValue['dist']?></option>
                                                                <?php
                                                               }
                                                           }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label class="control-label" for="state_dist_city_id">City</label>
                                                            <select id="ho_state_dist_city_id" name="state_dist_city_id" class="form-control">
                                                                <option value="">SELECT</option>
                                                                <?php
                                                           if($data['cityList']){
                                                               foreach ($data['cityList'] as $distValue) {
                                                                ?>
                                                                <option value="<?=$distValue['_id'];?>" <?=(isset($data['city']))?($data['city']==$distValue['city'])?"selected='selected'":"":"";?>><?=$distValue['city']?></option>
                                                                <?php
                                                               }
                                                           }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="branch_office_div">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Branch Office Details: &nbsp;&nbsp; </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered table-condensed" >
                                                    <thead>
                                                        <tr>
                                                            <th>Address </th>
                                                            <th>GSTIN No.</th>
                                                            <th>Contact No.</th>
                                                            <th>Email Id</th>
                                                            <th>State</th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="rowAddBranchOffice">
                                                        <tr>
                                                            <td><textarea type="text" maxlength="250" id="reg_address1" name="reg_address[]" class="form-control reg_address"></textarea>
                                                            </td>
                                                            <td><input type="text" maxlength="15" id="reg_gstin_no1" name="reg_gstin_no[]" class="form-control reg_gstin_no" value="" /></td>
                                                            <td><input type="text" maxlength="10" id="reg_contact_no1" name="reg_contact_no[]" class="form-control reg_contact_no" value="" /></td>
                                                            <td><input type="text" maxlength=" 50" id="reg_email_id1" name="reg_email_id[]" class="form-control reg_email_id" value="" /></td>
                                                            <td>
                                                                <select id="state_id" name="state_id[]" class="form-control state_id">
                                                                    <option value="-">--select--</option>
                                                                    <?php foreach($data["state_list"] as $value):?>
                                                                    <option value="<?=$value["state"]?>"><?=$value["state"]?></option>
                                                                    <?php endforeach;?>

                                                                </select>
                                                            </td>
                                                            <td>
                                                                <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="branchRowAdd(1);"></i></td>
                                                            <td></td>
                                                        </tr>
                                                        <input type="hidden" name="branchOfficeRowLen" id="branchOfficeRowLen" value="1" />
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button class="btn btn-primary" id="btncompany" name="btncompany" type="submit"><?=(isset($data["_id"]))?"Edit Company Details":"Add Company Details";?></button>
                                    <a href="<?=URLROOT;?>/Company_Details/company_details_list" class="btn btn-purple">Back To List <i class="fa fa-arrow-list"></i></a>
                                </div>
                            </div>
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
    /* function branchRowAdd(val){
        var z = $("#branchOfficeRowLen").val();
        z++;
        var appendData = '<tr><td><textarea type="text" id="reg_address'+z+'" name="reg_address[]" class="form-control reg_address"></textarea></td><td><input type="text" id="reg_gstin_no'+z+'" name="reg_gstin_no[]" class="form-control reg_gstin_no" value="" /></td><td><input type="text" id="reg_contact_no'+z+'" name="reg_contact_no[]" class="form-control reg_contact_no" value="" /></td><td><input type="text" id="reg_email_id'+z+'" name="reg_email_id[]" class="form-control reg_email_id" value="" /></td><td><select id="state_id'+z+'" name="state_id[]" class="form-control state_id"><option value="-">--select--</option><?php foreach($data["state_list"] as $value):?><option value="<?=$value["state"]?>"><?=$value["state"]?></option><?php endforeach;?></select></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="branchRowAdd(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>';
        $("#rowAddBranchOffice").append(appendData);
        $("#branchOfficeRowLen").val(z);

    } */
    $("#rowAddBranchOffice").on('click', '.remove_buttonn_item', function(e) {
        $(this).closest("tr").remove();
    });
    $(document).ready( function () {

        $("#head_office_div").css({"display":"none"});
        $("#branch_office_div").css({"display":"none"});
        $("#ho_branch_div").css({"display":"none"});
        $("#radio_no").attr('checked', true);

        $("#radio_no").click(function(){
            $("#head_office_div").css({"display":"none"});
            $("#branch_office_div").css({"display":"none"});
            $("#ho_branch_div").css({"display":"none"});
        });
        $('#chk_head_office').click(function(){
            if($("#chk_head_office").prop('checked')==true)
            {
                var address = $('#address').val();
                $('#ho_address').val(address);
                var contact_no = $('#contact_no').val();
                $('#ho_contact_no').val(contact_no);
                var email_id = $('#email_id').val();
                $('#ho_email_id').val(email_id);
                var gstin_no = $('#gstin_no').val();
                $('#ho_gstin_no').val(gstin_no);
                var state = $('#state').val();
                $('#ho_state').val(state);
                var district = $('#district').val();
                $('#ho_district').val(district);
                var state_dist_city_id = $("#state_dist_city_id").val();
                $('#ho_state_dist_city_id').val(state_dist_city_id);
                changeState("ho_state");
                changeDist("district");


            }
            else
            {
                $('#ho_address').val('');
                $('#ho_contact_no').val('');
                $('#ho_email_id').val('');
                $('#ho_gstin_no').val('');
                $('#ho_state').val('');
                $('#ho_district').val('');
                $('#ho_state_dist_city_id').val('');
            }
        });
        $('#radio_yes').click(function() {
            if($('#radio_yes').is(':checked')) {
                $("#ho_branch_div").css({"display":"block"});
                $("#ho_branch").change(function() {
                    var ho_branch = $("#ho_branch").val();
                    if(ho_branch=="Head/Corporate Office")
                    {
                        $("#head_office_div").css({"display":"block"});
                        $("#branch_office_div").css({"display":"none"});
                    }
                    if(ho_branch=="Branch Office")
                    {
                        $("#head_office_div").css({"display":"none"});
                        $("#branch_office_div").css({"display":"block"});
                    }
                    if(ho_branch=="")
                    {
                        $("#head_office_div").css({"display":"none"});
                        $("#branch_office_div").css({"display":"none"});
                    }

                });
            }
        });
        $("#btncompany").click(function() {
            var process = true;
            var isValidUrl = /^([a-zA-Z0-9]+(([\-]?[a-zA-Z0-9]+)*\.)+)*[a-zA-Z]{2,}$/;
            var exp = /^[A-Za-z\s]+$/;
            var company_name = $("#company_name").val();
            if (company_name=='null' || company_name == '') {
                $("#company_name").css({"border-color":"red"});
                $("#company_name").focus();
                process = false;
            }
            if (!exp.test(company_name)) {
                $("#company_name").css({"border-color":"red"});
                $("#company_name").focus();
                process = false;
            }
            var website = $("#website").val();
            if(website=='')
            {
                $("#website").css({"border-color":"red"});
                $("#website").focus();
                process = false;
            }
            if (!isValidUrl.test(website))
            {
                $("#website").css({"border-color":"red"});
                $("#website").focus();
                process = false;
            }
            var pan_exp = /^[A-Z]{5}[0-9]{4}[A-Z]{1}/;
            var pan_no = $('#pan_no').val();
            if(!pan_exp.test(pan_no))
            {
                alert('Please Enter Valid PAN NO');
                $("#pan_no").css({"border-color":"red"});
                $("#pan_no").focus();
                process = false;
            }

            var cin_exp = /^([L|U]{1})([0-9]{5})([A-Za-z]{2})([0-9]{4})([A-Za-z]{3})([0-9]{6})$/;
            var cin_no = $('#cin_no').val();
            if(!cin_exp.test(cin_no))
            {
                alert('Please Enter Valid CIN NO');
                $("#cin_no").css({"border-color":"red"});
                $("#cin_no").focus();
                process = false;
            }
            var tin_no = $('#tin_no').val();
            if(tin_no=='')
            {
                alert('Please Enter Valid TIN NO');
                $("#tin_no").css({"border-color":"red"});
                $("#tin_no").focus();
                process = false;
            }
            var tds_no = $('#tds_no').val();
            if(tds_no=='')
            {
                alert('Please Enter Valid TDS NO');
                $("#tds_no").css({"border-color":"red"});
                $("#tds_no").focus();
                process = false;
            }
            var address = $('#address').val();
            if(address!='')
            {
                var regexp = /^[A-Za-z0-9\s]+$/;
                var result = exp.test(address);
                if(!result)
                {
                    alert("Invalid Address");
                    $("#address").css({"border-color":"red"});
                    $("#address").focus();
                    process = false;
                }
            }

            var gstin_no = $('#gstin_no').val();
            if(gstin_no!='')
            {
                var exp = /^[A-Za-z0-9\s]+$/;
                if(!exp.test(gstin_no))
                {
                    alert("Please Enter Valid GSTIN NO")
                    $("#gstin_no").css({"border-color":"red"});
                    $("#gstin_no").focus();
                    process = false;
                }
            }
            // var email_id = $('#email_id').val();
            // if(email_id!='')
            // {
            //     var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            //     var emailval = $.trim(email_id).match(pattern);
            //     if(!emailval)
            //     {
            //         alert(" Invalid Email Id");
            //         $("#email_id").css({"border-color":"red"});
            //         $("#email_id").focus();
            //         process = false;
            //     }
            // }
            // var contact_no = $("#contact_no").val();
            // if(contact_no==0)
            // {
            //     alert("Invalid Mobile Number");
            //     $("#contact_no").css({"border-color":"red"});
            //     $("#contact_no").focus();
            //     process = false;
            // }
            // var contact_exp = /^\d{10}$/;
            // if(!contact_exp.test(contact_no))
            // {
            //     alert("Invalid Mobile Number");
            //     $("#contact_no").css({"border-color":"red"});
            //     $("#contact_no").focus();
            //     process = false;
            // }
            /*  var state = $("state").val();
            if(state!='')
            {
                $("#state").css({"border-color":"red"});
                $("#state").focus();
                process = false;
            }
 */         var state_id = $('#state_id').val();
            if(state_id!='-')
            {
                if(state_id=='-')
                {
                    $("#state_id").css({"border-color":"red"});
                    $("#state_id").focus();
                    process = false;
                }
            }

            var radioValue = $("input[name='radio_com']:checked").val();
            if(radioValue == "radio_yes")
            {
                var ho_branch = $('#ho_branch').val();
                if(ho_branch == "Head/Corporate Office")
                {
                    if($("#chk_head_office").prop('checked')==true)
                    {
                        var ho_address = $('#ho_address').val();
                        var exp = /^[A-Za-z0-9\s]+$/;
                        var result = exp.test(ho_address);
                        if(!result)
                        {
                            alert("Address Is Only Alpha Numeric Value");
                            $("#ho_address").css({"border-color":"red"});
                            $("#ho_address").focus();
                            process = false;
                        }
                        var ho_gstin_no = $('#ho_gstin_no').val();
                        var exp = /^[A-Za-z0-9\s]+$/;
                        if(!exp.test(ho_gstin_no))
                        {
                            $("#ho_gstin_no").css({"border-color":"red"});
                            $("#ho_gstin_no").focus();
                            process = false;
                        }
                        // var ho_email_id = $('#ho_email_id').val();
                        // if(ho_email_id!='')
                        // {
                        //     var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                        //     var emailval = $.trim(email).match(pattern);
                        //     if(!emailval)
                        //     {
                        //         alert("Invalid Email Id");
                        //         $("#ho_email_id").css({"border-color":"red"});
                        //         $("#ho_email_id").focus();
                        //         process = false;
                        //     }
                        // }
                        var ho_state_id = $('#ho_state_id').val();
                        if(ho_state_id='')
                        {
                            $("#ho_state_id").css({"border-color":"red"});
                            $("#ho_state_id").focus();
                            process = false;
                        }
                    }
                }
            }
            if(radioValue=="radio_yes")
            {
                var ho_branch = $('#ho_branch').val();
                {
                    if(ho_branch == "Branch Office")
                    {
                        $(".reg_address").each(function(){
                            var ID = this.id;
                            var ID = ID.split("reg_address")[1];
                            var reg_address = $("#reg_address"+ID).val();
                            var exp = /^[A-Za-z0-9\s]+$/;
                            var result = exp.test(reg_address);
                            if(!result)
                            {
                                alert("Address Is Only Alpha Numeric Value");
                                $("#reg_address"+ID).css({"border-color":"red"});
                                $("#reg_address"+ID).focus();
                                process = false;
                            }
                            var reg_gstin_no = $('#reg_gstin_no'+ID).val();
                            var exp = /^[A-Za-z0-9\s]+$/;
                            if(!exp.test(reg_gstin_no))
                            {
                                $("#reg_gstin_no"+ID).css({"border-color":"red"});
                                $("#reg_gstin_no"+ID).focus();
                                process = false;
                            }
                            // var reg_email_id = $('#reg_email_id'+ID).val();
                            // if(reg_email_id!='')
                            // {
                            //     var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                            //     var emailval = $.trim(email).match(pattern);
                            //     if(!emailval)
                            //     {
                            //         alert(" Invalid Email Id");
                            //         $("#reg_email_id"+ID).css({"border-color":"red"});
                            //         $("#reg_email_id"+ID).focus();
                            //         process = false;
                            //     }
                            // }
                        });
                    }
                }
            }
            return process;
        });

        $("#company_name").keyup(function(){$(this).css('border-color','');});
        $("#pan_no").keyup(function(){$(this).css('border-color','');});
        $("#cin_no").keyup(function(){$(this).css('border-color','');});
        $("#tin_no").keyup(function(){$(this).css('border-color','');});
        $("#tds_no").keyup(function(){$(this).css('border-color','');});
        $("#website").keyup(function(){$(this).css('border-color','');});
        $("#contact_no").keyup(function(){$(this).css('border-color','');});
        $("#address").keyup(function(){$(this).css('border-color','');});
        $("#email_id").keyup(function(){$(this).css('border-color','');});
        $("#gstin_no").keyup(function(){$(this).css('border-color','');});
        $("#state_id").change(function(){$(this).css('border-color','');});
    });
</script>
<script type="text/javascript">
    $("#state").change(function(){
        $("#state").css('border-color','');
        var state = $("#state").val();
        if(state==""){
            $("#district").html("<option value=''>SELECT</option>");
        }else{
            $.ajax({
                url: "<?=URLROOT;?>/Company_Details/getDistByStateOption",
                method:"POST",
                data:{state:state},
                dataType:"json",
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#district").html(data.data);
                    }
                }
            });
        }
    });
    $("#district").change(function(){
        $("#district").css('border-color','');
        var district = $("#district").val();
        if(district==""){
            $("#state_dist_city_id").html("<option value=''>SELECT</option>");
        }else{
            $.ajax({
                url: "<?=URLROOT;?>/Company_Details/getCityByDistOption",
                method:"POST",
                data:{dist:district},
                dataType:"json",
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#state_dist_city_id").html(data.data);
                    }
                },
                complete:function() {
                    var state_dist_city_id = $('#state_dist_city_id').val();
                    $('#ho_state_dist_city_id').val(state_dist_city_id);
                }
            });
        }
    });
    function changeState(stateID){
        $("#"+stateID).css('border-color','');
        var state = $("#"+stateID).val();
        if(state==""){
            $("#ho_district").html("<option value=''>SELECT</option>");
        }else{
            $.ajax({
                url: "<?=URLROOT;?>/Company_Details/getDistByStateOption",
                method:"POST",
                data:{state:state},
                dataType:"json",
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#ho_district").html(data.data);
                    }
                },
                complete: function() {
                    var district = $('#district').val();
                    $('#ho_district').val(district);
                }
            });
        }
    }
     function changeDist(district){
        $("#"+district).css('border-color','');
        var district = $("#"+district).val();
        if(district==""){
            $("#ho_state_dist_city_id").html("<option value=''>SELECT</option>");
        }else{
            $.ajax({
                url: "<?=URLROOT;?>/Company_Details/getCityByDistOption",
                method:"POST",
                data:{dist:district},
                dataType:"json",
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#ho_state_dist_city_id").html(data.data);
                    }
                },
                complete: function() {
                    var state_dist_city_id = $('#state_dist_city_id').val();
                    $('#ho_state_dist_city_id').val(state_dist_city_id);
                }
            });
        }
    }

</script>