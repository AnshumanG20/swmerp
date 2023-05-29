<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <!-- <h1 class="page-header text-overflow">Add/Update Company Location</h1>//-->
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Contact</a></li>
            <li class="active">Contact Details</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
<!--<?php print_r($data);?>//-->
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
                              <h3 class="panel-title">Add/Update Contact Details</h3>
                            </div>
                           <div class="col-md-6 text-lg-right" style="padding-right: 20px; padding-top:10px;">
                               <a href="<?=URLROOT;?>/Contact/contact_list"><button id="demo-foo-collapse" class="btn btn-purple"><i class="fa fa-arrow-left"></i> Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->

                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Contact/contact_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                            <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>"/>
                            <div class="row">
                                <div class="form-group">
                                <div class="col-sm-6">
                                 <label class="control-label" for="cust_type">Customer Type<span class="text-danger">*</span></label>
                                    <select id="contact_type" name="contact_type" class="form-control">
                                        <option value="">==SELECT==</option>
                                        <?php foreach($data["cust"] as $value):?>
                                        <option value="<?=$value["_id"]?>" <?=(isset($data["contact_type"]))?($data["contact_type_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["contact_type"]?></option>
                                        <?php endforeach;?>
                                        <!-- <option value="4">Others</option> -->
                                    </select>
                                </div>
                                    <div class="col-sm-6">
                                        <label class="control-label other_staff" for="contact_name">Company Name<span class="text-danger">*</span></label>
                                        <input type="text" maxlength="50" placeholder="Company Name" id="contact_name" name="contact_name" class="form-control" value="<?=(isset($data['contact_name']))?$data['contact_name']:"";?>" onkeypress="return isAlpha(event);" >
                                    </div>
                                </div>
                            </div>
                            <div class="row others">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="others">Others<span class="text-danger">*</span></label>
                                        <input type="text" maxlength="80" placeholder="Others" id="others" name="others" class="form-control" value="<?=(isset($data['others']))?$data['others']:"";?>" onkeypress="return isAlpha(event);">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="contact_email_id">Company Email Id</label>
                                        <input type="text" maxlength="50" placeholder="Company Email Id" id="contact_email_id" name="contact_email_id" class="form-control" value="<?=(isset($data['contact_email_id']))?$data['contact_email_id']:"";?>" >
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="control-label" for="contact_no">Contact No</label>
                                        <input type="text" maxlength="10" placeholder="Contact Number" id="contact_no" name="contact_no" class="form-control" value="<?=(isset($data['contact_no']))?$data['contact_no']:"";?>" onkeypress="return isNum(event);">
                                    </div>
                                </div>
                            </div>
                            <div class="row person_name_gstin_no">
                                    <div class="form-group">
                                    <div class="col-sm-6">
                                        <label class="control-label" for="contact_person_name">Contact Person Name<span class="text-danger">*</span></label>
                                        <input type="text" maxlength="50" placeholder="Contact Person Name" id="contact_person_name" name="contact_person_name" class="form-control" value="<?=(isset($data['contact_person_name']))?$data['contact_person_name']:"";?>" onkeypress="return isAlpha(event);" >
                                    </div>
                                    <div class="col-sm-6">
                                      <label class="control-label" for="gstin_no">GSTIN No</label>
                                      <input type="text" maxlength="15" placeholder="GSTIN No" id="gstin_no" name="gstin_no" class="form-control" value="<?=(isset($data['gstin_no']))?$data['gstin_no']:"";?>"  >
                                    </div>
                                </div>
                            </div>
                            <div class="row orther_details">
                                <div class="form-group">
                                   <div class="col-sm-12" style="color:red; text-align:left">
                                      <p><u>Other Contact Details</u></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row orther_details_data">
                             <div class="col-sm-12">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                     <thead>
                                        <tr>
                                            <th>Contact Person Name</th>
                                            <th>Contact No</th>
                                            <th>Email Id</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                     </thead>
                                     <tbody id="addNewRow">
                                    <?php
                                    if(isset($data['other_contact_person_name'])){
                                        $len = sizeof($data['other_contact_person_name']);
                                        for($i=0; $i<$len; $i++){
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" id="contact_other_details_id<?=$i+1;?>" name="contact_other_details_id[]" value="<?=(isset($data['contact_other_details_id'][$i]))?$data['contact_other_details_id'][$i]:"";?>" />
                                                <input type="text" maxlength="50" style=" border: none;" id="other_contact_person_name<?=$i+1;?>" name="other_contact_person_name[]" class="form-control other_person" value="<?=(isset($data['other_contact_person_name'][$i]))?$data['other_contact_person_name'][$i]:"";?>" onkeypress="return isAlpha(event);" >
                                            </td>
                                            <td>
                                                <input type="text" maxlength="10" id="other_contact_no<?=$i+1;?>" name="other_contact_no[]" class="form-control" value="<?=(isset($data['other_contact_no'][$i]))?$data['other_contact_no'][$i]:"";?>" style="border:none;" onkeypress="return isNum(event);">
                                            </td>
                                            <td>
                                                <input type="text" maxlength="50" id="other_contact_emailid<?=$i+1;?>" name="other_contact_emailid[]" class="form-control" value="<?=(isset($data['other_contact_emailid'][$i]))?$data['other_contact_emailid'][$i]:"";?>" style="border:none;">
                                            </td>
                                            <td>
                                                <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="addNewRow(1);"></i>
                                            </td>
                                        <?php
                                            if($i!=0){
                                        ?>
                                            <td>
                                                <i class="fa fa-remove remove_row" style="font-size:30px; cursor:pointer;"></i>
                                            </td>
                                        <?php
                                            }else{
                                        ?>
                                            <td></td>
                                        <?php
                                            }
                                        ?>
                                        </tr>
                                    <?php
                                        }
                                    }else{
                                    ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" id="contact_other_details_id1" name="contact_other_details_id[]" value="" />
                                                <input type="text" maxlength="50" style=" border: none;" id="other_contact_person_name1" name="other_contact_person_name[]" class="form-control other_person" value="<?=(isset($data['other_contact_person_name']))?$data['other_contact_person_name']:"";?>" onkeypress="return isAlpha(event);" >
                                            </td>
                                            <td>
                                                <input type="text" maxlength="10" id="other_contact_no1" name="other_contact_no[]" class="form-control" value="<?=(isset($data['other_contact_no']))?$data['other_contact_no']:"";?>" style="border:none;" onkeypress="return isNum(event);">
                                            </td>
                                            <td>
                                                <input type="text" maxlength="50" id="other_contact_emailid1" name="other_contact_emailid[]" class="form-control" value="<?=(isset($data['other_contact_emailid']))?$data['other_contact_emailid']:"";?>" style="border:none;">
                                            </td>
                                            <td>
                                                <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="addNewRow(1);"></i>
                                            </td>
                                            <td></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                        <input type="hidden" name="newRow" id="newRow" value="1" />
                                     </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row billing_address">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <p style="color:red;">Billing Address</p>
                            </div>
                            <div class="col-sm-6">
                                <p style="color:red;">Shipping Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="copy_data" name="shipping_data" onclick="checkedFun()"/> Copy billing addres</p>
                            </div>
                        </div>
                    </div>
                    <div class="row billing_attention">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="billing_attention">Attention</label>
                                <input type="text" maxlength="50" placeholder="Attention" id="billing_attention" name="attention" class="form-control" value="<?=(isset($data['attention']))?$data['attention']:"";?>" onkeypress="return isAlpha(event);" >
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="shipping_attention">Attention</label>
                                <input type="text" maxlength="50" placeholder="Attention" id="shipping_attention" name="shipping_attention" class="form-control" value="<?=(isset($data['shipping_attention']))?$data['shipping_attention']:"";?>" onkeypress="return isAlpha(event);" >
                            </div>
                        </div>
                    </div>
                    <div class="row address">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="address">Address</label>
                                <input type="text" maxlength="250" placeholder="Address" id="billing_address" name="address" class="form-control" value="<?=(isset($data['address']))?$data['address']:"";?>" >
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="address">Address</label>
                                <input type="text" maxlength="250" placeholder="Contact Person Name" id="shipping_address" name="shipping_address" class="form-control" value="<?=(isset($data['shipping_address']))?$data['shipping_address']:"";?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row state">
                       <div class="form-group">
                         <div class="col-md-6">
                         <label class="control-label" for="state">State<span class="text-danger"> *</span></label>
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
                         <div class="col-md-6">
                         <label class="control-label" for="state">State</label>
                          <select id="shipping_state" name="shipping_state" class="form-control">
                          <option value="">SELECT</option>
                            <?php
                                if($data['stateList']){
                                    foreach ($data['stateList'] as $stateValue) {
                            ?>
                                <option value="<?=$stateValue['state'];?>" <?=(isset($data['shipping_state']))?($data['shipping_state']==$stateValue['state'])?"selected='selected'":"":"";?>><?=$stateValue['state']?></option>
                             <?php
                                }
                            }
                         ?>
                        </select>
                        </div>
                    </div>
                    </div>
                     <div class="row district">
                       <div class="form-group">
                         <div class="col-md-6">
                            <label class="control-label" for="district">District<span class="text-danger"> *</span></label>
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
                         <div class="col-md-6">
                             <label class="control-label" for="district">District</label>
                            <select id="shipping_district" name="shipping_district" class="form-control">
                            <option value="">SELECT</option>
                            <?php
                            if($data['shipping_districtList']){
                            foreach ($data['shipping_districtList'] as $distValue) {
                            ?>
                            <option value="<?=$distValue['dist'];?>" <?=(isset($data['shipping_dist']))?($data['shipping_dist']==$distValue['dist'])?"selected='selected'":"":"";?>><?=$distValue['dist']?></option>
                                <?php
                            }
                        }
                        ?>
                       </select>
                         </div>
                     </div>
                    </div>
                    <div class="row state_dist_city_id">
                       <div class="form-group">
                         <div class="col-md-6">
                          <label class="control-label" for="state_dist_city_id">City<span class="text-danger"> *</span></label>
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
                         <div class="col-md-6">
                          <label class="control-label" for="state_dist_city_id">City</label>
                                <select id="shipping_state_dist_city_id" name="shipping_state_dist_city_id" class="form-control">
                                <option value="">SELECT</option>
                                <?php
                                if($data['shipping_cityList']){
                                foreach ($data['shipping_cityList'] as $distValue) {
                                ?>
                                <option value="<?=$distValue['_id'];?>" <?=(isset($data['shipping_city']))?($data['shipping_city']==$distValue['city'])?"selected='selected'":"":"";?>><?=$distValue['city']?></option>
                                            <?php
                                }
                            }
                            ?>
                            </select>                         
                        </div>
                     </div>
                    </div>
                    <div class="row billing_phone">
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label class="control-label" for="billing_phone">Phone No</label>
                                <input type="text" maxlength="10" placeholder="Phone No" id="billing_phoneno" name="phoneno" class="form-control" value="<?=(isset($data['phoneno']))?$data['phoneno']:"";?>" onkeypress="return isNum(event);" >
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="shipping_phoneno">Phone No</label>
                                <input type="text" maxlength="10" placeholder="Contact Person Name" id="shipping_phoneno" name="shipping_phoneno" class="form-control" value="<?=(isset($data['shipping_phoneno']))?$data['shipping_phoneno']:"";?>" onkeypress="return isNum(event);" >
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group">
                            <div class="col-md-6 text-lg-left" style="padding-right: 20px; padding-top:10px;">
                                <button class="btn btn-success" id="btn_cust" name="btn_cust" type="submit"><?=(isset($data["_id"]))?"Edit Contact":"Add Contact";?></button>
                            </div>
                            <div class="col-md-6 text-lg-left" style="padding-right: 20px; padding-top:10px;">
                                 <button class="btn btn-success" id="" name="" type="reset">Cancel</button>
                            </div>
                        </div>
                    </div>
                        </form>
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

<script type="text/javascript">
    $(document).ready( function () {
        /*var contact_type = $('#contact_type').val();
        if(contact_type==3)
        {
            $('.person_name_gstin_no').hide();
            $('.orther_details_data').hide();
            $('.orther_details').hide();
            $('.billing_address').hide();
            $('.billing_attention').hide();
            $('.address').hide();
            $('.district').hide();
            $('.state').hide();
            $('.state_dist_city_id').hide();
            $('.billing_phone').hide();
        }
        else
        {
            $('.person_name_gstin_no').show();
            $('.orther_details_data').show();
            $('.orther_details').show();
            $('.billing_address').show();
            $('.billing_attention').show();
            $('.address').show();
            $('.district').show();
            $('.state').show();
            $('.state_dist_city_id').show();
            $('.billing_phone').show();
        }*/
        var contact_type = $('#contact_type').val();
         if(contact_type==5)
        {
            $('.others').show();
        }
        else
        {
            $('.others').hide();
            $('#others').val('');
        }
        $("#btn_cust").click(function() {
            var process = true;
            var exp = /^[A-Za-z0-9\s]+$/;
            var contact_type = $('#contact_type').val();
            if(contact_type=="")
            {
                $("#contact_type").css({"border-color":"red"});
                $("#contact_type").focus();
                process = false;
            }
            if(contact_type == 5)
            {
                var others = $('#others').val();
                    others = others.trim();
                if(others=="")
                {
                    $("#others").css({"border-color":"red"});
                    $("#others").focus();
                    process = false; 
                }
            }
            var contact_name = $('#contact_name').val();
                contact_name = contact_name.trim();
            if(contact_name=='')
            {
               $("#contact_name").css({"border-color":"red"});
               $("#contact_name").focus();
                process = false; 
            }
             var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var email = $("#contact_email_id").val();
            if(email!="")
            {
                var emailval = $.trim(email).match(pattern);
                if(!emailval)
                {
                    alert(" Invalid Email Id");
                    $("#contact_email_id").css({"border-color":"red"});
                    $("#contact_email_id").focus();
                    process = false;
                }
            }
            var contact_no = $("#contact_no").val();
            if(contact_no!="")
            {
                if(contact_no==0)
                {
                    alert("Invalid Contact Number");
                    $("#contact_no").css({"border-color":"red"});
                    $("#contact_no").focus();
                    process = false;
                }
                var contact_exp = /^\d{10}$/;
                if(!contact_exp.test(contact_no))
                {
                    alert("Invalid Contact Number");
                    $("#contact_no").css({"border-color":"red"});
                    $("#contact_no").focus();
                    process = false;
                }
            }
            var gstin_no = $("#gstin_no").val();
            if(gstin_no!="")
            {
                if(!exp.test(gstin_no))
                {
                    alert('Invalid GSTIN No');
                    $("#gstin_no").css({"border-color":"red"});
                    $("#gstin_no").focus();
                    process = false;
                }
            }
            /*if(contact_type==1 || contact_type==2)
            {*/
               var contact_person_name = $('#contact_person_name').val();
                contact_person_name = contact_person_name.trim();
                if(contact_person_name=="")
                {
                    $("#contact_person_name").css({"border-color":"red"});
                    $("#contact_person_name").focus();
                    process = false;
                } 
                var state = $('#state').val();
                if(state=="")
                {
                  $("#state").css({"border-color":"red"});
                  $("#state").focus();
                  process = false;   
                }
                var district = $('#district').val();
                if(district=="")
                {
                  $("#district").css({"border-color":"red"});
                  $("#district").focus();
                  process = false; 
                }
                var state_dist_city_id = $('#state_dist_city_id').val();
                if(state_dist_city_id=="")
                {
                  $("#state_dist_city_id").css({"border-color":"red"});
                  $("#state_dist_city_id").focus();
                  process = false;
                }
            //}
            //Other Contact details Validation
            var other_contact_person_name1 = $('#other_contact_person_name1').val();
                other_contact_person_name1 = other_contact_person_name1.trim();
            if(other_contact_person_name1!='')
            {
                $(".other_person").each(function(){
                    var ID = this.id;
                    var ID = ID.split("other_contact_person_name")[1];
                    var other_contact_person_name = $("#other_contact_person_name"+ID).val();
                    if(other_contact_person_name=="")
                    {
                      $("#other_contact_person_name"+ID).css({"border-color":"red"});
                      $("#other_contact_person_name"+ID).focus();
                      process = false;   
                    }
                    var other_contact_no = $("#other_contact_no"+ID).val();
                    if(other_contact_no==0)
                    {
                     alert("Invalid Contact Number");
                     $("#other_contact_no"+ID).css({"border-color":"red"});
                     $("#other_contact_no"+ID).focus();
                     process = false;
                    }
                   var contact_exp = /^\d{10}$/;
                  if(!contact_exp.test(other_contact_no))
                 {
                   alert("Invalid Contact Number");
                   $("#other_contact_no"+ID).css({"border-color":"red"});
                   $("#other_contact_no"+ID).focus();
                   process = false;
                 }
                var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
                var email = $("#other_contact_emailid"+ID).val();
                var emailval = $.trim(email).match(pattern);
                if(!emailval)
               {
                 alert(" Invalid Email Id");
                 $("#other_contact_emailid"+ID).css({"border-color":"red"});
                 $("#other_contact_emailid"+ID).focus();
                 process = false;
               }
               //End Other Details Validation
            });
            }
            var billing_address = $('#billing_address').val();
                billing_address = billing_address.trim();
                if(billing_address!="")
                {
                   if(!exp.test(gstin_no))
                   {
                     $("#billing_address").css({"border-color":"red"});
                     $("#billing_address").focus();
                     process = false;
                    }
                }
                var billing_phoneno = $('#billing_phoneno').val();
                if(billing_phoneno!='')
                {
                    var phone_exp = /^\d{10}$/;
                    if(billing_phoneno==0)
                    {
                        alert("Invalid Phone No");
                        $("#billing_phoneno").css({"border-color":"red"});
                        $("#billing_phoneno").focus();
                        process = false;
                    }
                    if(!phone_exp.test(billing_phoneno))
                    {
                        alert("Invalid Phone No");
                        $("#billing_phoneno").css({"border-color":"red"});
                        $("#billing_phoneno").focus();
                        process = false;
                    }
                }
                var billing_state = $('#billing_state').val();
               
                if(billing_state=="")
                {
                    $("#billing_state").css({"border-color":"red"});
                    $("#billing_state").focus();
                    process = false;
                }
            return process; 
        });
       /* $('#contact_type').change(function(){
            var contact_type = $('#contact_type').val();
            if(contact_type==3)
            {
                $('.person_name_gstin_no').hide();
                $('.orther_details_data').hide();
                $('.orther_details').hide();
                $('.billing_address').hide();
                $('.billing_attention').hide();
                $('.address').hide();
                $('.district').hide();
                $('.state').hide();
                $('.state_dist_city_id').hide();
                $('.billing_phone').hide();
				$(".other_staff").html('Contact Person Name <span class="text-danger">*</span>');
				$("#contact_name").attr("placeholder", "Contact Person Name");
                $('#contact_name').css('border-color','');
                $(".com_group_fa").find("i").removeClass("fa-building-o").addClass("fa-user");

            }
            else
            {
                $('.person_name_gstin_no').show();
                $('.orther_details_data').show();
                $('.orther_details').show();
                $('.billing_address').show();
                $('.billing_attention').show();
                $('.address').show();
                $('.district').show();
                $('.state').show();
                $('.state_dist_city_id').show();
                $('.billing_phone').show();
                $(".other_staff").html('Company Name <span class="text-danger">*</span>');
                $("#contact_name").attr("placeholder", "Company Name");
                $('#contact_name').css('border-color','');
                $(".com_group_fa").find("i").removeClass("fa-building-o").addClass("fa-user");
            }
        });*/
        $('#contact_type').change(function(){
            var contact_type = $('#contact_type').val();
            if(contact_type==5)
            {
                $('.others').show();
            }
            else
            {
                $('.others').hide();
                $('#others').val('');
            }
        });
        
        $("#contact_type").change(function(){$(this).css('border-color','');});
        $("#contact_name").keyup(function(){$(this).css('border-color','');});
        $("#contact_email_id").keyup(function(){$(this).css('border-color','');});
        $("#contact_no").keyup(function(){$(this).css('border-color','');});
        $("#gstin_no").keyup(function(){$(this).css('border-color','');});
        $("#contact_person_name").keyup(function(){$(this).css('border-color','');});
        $("#billing_address").keyup(function(){$(this).css('border-color','');});
        $("#billing_zip_code").keyup(function(){$(this).css('border-color','');});
        $("#billing_phoneno").keyup(function(){$(this).css('border-color','');});
        $("#state").change(function(){$(this).css('border-color','');});
        $("#district").change(function(){$(this).css('border-color','');});
        $("#state_dist_city_id").change(function(){$(this).css('border-color','');});
        $("#others").keyup(function(){$(this).css('border-color','');});
    });
    function addNewRow(val)
    {
        var z = $('#newRow').val();
        z++;
        var appendData = '<tr><input type="hidden" id="contact_other_details_id'+z+'" name="contact_other_details_id[]" value="" /><td><input type="text" maxlength="50" id="other_contact_person_name'+z+'" name="other_contact_person_name[]" class="form-control other_person_name" value="" onkeypress="return isAlpha(event);" /></td><td><input type="text" maxlength="10" id="other_contact_no'+z+'" name="other_contact_no[]" class="form-control other_contact_no" value="" onkeypress="return isNum(event);" /></td><td><input type="text" maxlength="50" id="other_contact_emailid'+z+'" name="other_contact_emailid[]" class="form-control other_email_id" value=""/></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="addNewRow(1);"></i></td><td><i class="fa fa-remove remove_row" style="font-size:30px; cursor:pointer;"></i></td></tr>';
        $("#addNewRow").append(appendData);
        $("#newRow").val(z);
    }
    $("#addNewRow").on('click', '.remove_row', function(e) {
        $(this).closest("tr").remove();
    });
    function checkedFun()
    {
        if($("#copy_data").prop('checked')==true)
        {
			
            var billing_attention = $('#billing_attention').val();
            $('#shipping_attention').val(billing_attention);
            var billing_address = $('#billing_address').val();
            $('#shipping_address').val(billing_address);
            var state = $('#state').val();
            $('#shipping_state').val(state);
            
            
            var billing_phoneno = $('#billing_phoneno').val();
            $('#shipping_phoneno').val(billing_phoneno);
            shipping_state_change();
        }
       /* else
        {
            $('#shipping_attention').val('');
            $('#shipping_address').val('');
            $('#shipping_city').val('');
            $('#shipping_state').val('');
            $('#shipping_zip_code').val('');
            $('#shipping_phoneno').val('');
            $('#shipping_state_dist_city_id').val('');
            $('#shipping_district').val('');

        }*/
    }
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
            success:function(data){
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
            success:function(data){
                if(data.response==true){
                    $("#state_dist_city_id").html(data.data);
                }
            }
        });
    }
});
$("#shipping_state").change(function(){
    $("#shipping_state").css('border-color','');
    var state = $("#shipping_state").val();
    if(state==""){
        $("#shipping_district").html("<option value=''>SELECT</option>");
    }else{
        $.ajax({
            url: "<?=URLROOT;?>/Company_Details/getDistByStateOption",
            method:"POST",
            data:{state:state},
            dataType:"json",
            success:function(data){
                if(data.response==true){
                    $("#shipping_district").html(data.data);
                }
            }
        });
    }
});
function shipping_state_change(){
    var temp = false;
    $("#shipping_state").css('border-color','');
    var state = $("#shipping_state").val();
    if(state==""){
        $("#shipping_district").html("<option value=''>SELECT</option>");
    }else{
        $.ajax({
            url: "<?=URLROOT;?>/Company_Details/getDistByStateOption",
            method:"POST",
            data:{state:state},
            dataType:"json",
            success:function(data){
                if(data.response==true){
                    temp = true;
                    $("#shipping_district").html(data.data);
                    var district = $('#district').val();
                    $('#shipping_district').val(district);
                }
            },
            complete: function() {
                if(temp==true){
                    shipping_district_change();
                }
            },
        });
    }
}
$("#shipping_district").change(function(){
    $("#shipping_district").css('border-color','');
    var district = $("#shipping_district").val();
    if(district==""){
        $("#shipping_state_dist_city_id").html("<option value=''>SELECT</option>");
    }else{
        $.ajax({
            url: "<?=URLROOT;?>/Company_Details/getCityByDistOption",
            method:"POST",
            data:{dist:district},
            dataType:"json",
            success:function(data){
                if(data.response==true){
                    $("#shipping_state_dist_city_id").html(data.data);
                }
            }
        });
    }
});
function shipping_district_change(){
    $("#shipping_district").css('border-color','');
    var district = $("#shipping_district").val();
    if(district==""){
        $("#shipping_state_dist_city_id").html("<option value=''>SELECT</option>");
    }else{
        $.ajax({
            url: "<?=URLROOT;?>/Company_Details/getCityByDistOption",
            method:"POST",
            data:{dist:district},
            dataType:"json",
            success:function(data){
                if(data.response==true){
                    $("#shipping_state_dist_city_id").html(data.data);
                    var state_dist_city_id = $('#state_dist_city_id').val();
                    $('#shipping_state_dist_city_id').val(state_dist_city_id);
                }
            }
        });
    }
}
</script>

