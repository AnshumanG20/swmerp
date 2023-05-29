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
            <li><a href="#">Master</a></li>
            <li class="active">Company Details</li>
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
                        <h3 class="panel-title">Add/Update Company Branch/Head/Registered Office</h3>
                    </div>
                    <!--Horizontal Form-->
                    <!--===================================================-->

                    <div class="panel-body">

                        <div class="pad-btm">
                            <a href="<?=URLROOT;?>/Company_Details/company_details_list"><button id="demo-foo-collapse" class="btn btn-purple">Back To List <i class="fa fa-arrow-list"></i></button></a>
                        </div>
                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Company_Details/companylocation_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                            <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label class="control-label" for="company">Company Name </label>
                                        <input type="text" maxlength="50" placeholder="Enter Company Name" id="company_name" name="company_name" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" disabled >
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="control-label" for="website_name">Website Name</label>
                                        <input type="text" maxlength="50" placeholder="Enter Company Website Name" id="website_name" name="website_name" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" disabled >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label class="control-label" for="office_type">Office Type<span class="text-danger"> *</span></label>
                                        <?php
                                        $temp = true;
                                        if(isset($data['_id'])){
                                            if($data['office_type']=="Registered" || $data['office_type']=="Head/Corporate Office"){
                                                $temp = false;

                                        ?>
                                        <input type="text" id="office_type" name="office_type" class="form-control" value="<?=(isset($data['office_type']))?$data['office_type']:"";?>" readonly>
                                        <?php
                                            }
                                        }
                                        if($temp==true){
                                        ?>
                                        <select id="office_type" name="office_type" class="form-control">
                                            <option value="">--select--</option>
                                            <?php
                                            if(!$data['isExistRegistered']){
                                            ?>
                                            <option value="Registered" <?=(isset($data['office_type']))?($data['office_type']=="Registered")?"selected":"":"";?>>Registered</option>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if(!$data['isExistHeadOffice']){
                                            ?>
                                            <option value="Head/Corporate Office" <?=(isset($data['office_type']))?($data['office_type']=="Head/Corporate Office")?"selected":"":"";?>>Head/Corparate Office</option>
                                            <?php
                                            }
                                            ?>
                                            <option value="Branch Office" <?=(isset($data['office_type']))?($data['office_type']=="Branch Office")?"selected":"":"";?>>Branch Office</option>
                                        </select>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="control-label" for="gstin_no">GSTIN No<span class="text-danger">*</span></label>
                                        <input type="text" maxlength="15" placeholder="Enter GSTIN No." id="gstin_no" name="gstin_no" class="form-control" value="<?=(isset($data['gstin_no']))?$data['gstin_no']:"";?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label class="control-label" for="contact_no">Mobile No <span class="text-danger"> *</span></label>
                                        <input type="text" maxlength="10" placeholder="Enter Mobile Number" id="contact_no" name="contact_no" class="form-control" value="<?=(isset($data['contact_no']))?$data['contact_no']:"";?>" onkeypress="return isNum(event);">
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="control-label" for="email_id">Email Id<span class="text-danger"> *</span></label>
                                        <input type="text" maxlength="50" placeholder="Enter Email Id" id="email_id" name="email_id" class="form-control" value="<?=(isset($data['email_id']))?$data['email_id']:"";?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label class="control-label" for="city">Landmark<span class="text-danger">*</span></label>
                                    <input type="text" maxlength="50" placeholder="Enter City Name" id="landmark" name="landmark" class="form-control" value="<?=(isset($data['landmark']))?$data['landmark']:"";?>" onkeypress="return isAlpha(event);" >
                                </div>
                                <div class="col-sm-5">
                                    <div class="col-sm-5">
                                        <label class="control-label" for="address">Address <span class="text-danger"> *</span></label>
                                    </div>
                                    <textarea type="text" maxlength="250" placeholder="Enter Company Address" id="address" name="address" class="form-control" ><?=(isset($data['address']))?$data['address']:"";?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5">
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
                                        <div class="col-md-5">
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
                                     </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-5">
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
                                    </div>
                                </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6 text-lg-left" style="padding-right: 20px; padding-top:10px;">
                                        <button class="btn btn-success" id="btnlocation" name="btnlocation" type="submit"><?=(isset($data["_id"]))?"Edit Location":"Add Location";?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        $("#btnlocation").click(function() {
            var exp = /^[A-Za-z0-9\s]+$/;
            var process = true;
            var address = $("#address").val();
            var result = exp.test(address);
            if(!result)
            {
                alert("Address Is Only Alpha Numeric Value");
                $("#address").css({"border-color":"red"});
                $("#address").focus();
                process = false;
            }
            if(address=='null' || address=='')
            {
                $("#address").css({"border-color":"red"});
                $("#address").focus();
                process = false;
            }
            var contact_no = $("#contact_no").val();
            if(contact_no==0)
            {
                alert("Invalid Mobile Number");
                $("#contact_no").css({"border-color":"red"});
                $("#contact_no").focus();
                process = false;
            }
            var contact_exp = /^\d{10}$/;
            if(!contact_exp.test(contact_no))
            {
                alert("Invalid Mobile Number");
                $("#contact_no").css({"border-color":"red"});
                $("#contact_no").focus();
                process = false;
            }
            var pattern = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var email = $("#email_id").val();
            var emailval = $.trim(email).match(pattern);
            if(!emailval)
            {
                alert(" Invalid Email Id");
                $("#email_id").css({"border-color":"red"});
                $("#email_id").focus();
                process = false;
            }
            var state_id = $("#state_id").val();
            if(state_id=='-')
            {
                $("#state_id").css({"border-color":"red"});
                $("#state_id").focus();
                process = false;
            }
            var city = $('#city').val();
            if(city=='')
            {
                $("#city").css({"border-color":"red"});
                $("#city").focus();
                process = false;
            }
            var office_type = $("#office_type").val();
            if(office_type=='')
            {
                $("#office_type").css({"border-color":"red"});
                $("#office_type").focus();
                process = false;
            }
            var gstin_no = $("#gstin_no").val();
            if(gstin_no=='')
            {
                $("#gstin_no").css({"border-color":"red"});
                $("#gstin_no").focus();
                process = false;
            }
            if(!exp.test(gstin_no))
            {
                $("#gstin_no").css({"border-color":"red"});
                $("#gstin_no").focus();
                process = false;
            }
            return process;
        });
        $("#address").keyup(function(){$(this).css('border-color','');});
        $("#contact_no").keyup(function(){$(this).css('border-color','');});
        $("#email_id").keyup(function(){$(this).css('border-color','');});
        $("#state_id").change(function(){$(this).css('border-color','');});
        $("#office_type").change(function(){$(this).css('border-color','');});
        $("#gstin_no").keyup(function(){$(this).css('border-color','');});
        $("#city").keyup(function(){$(this).css('border-color','');});
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
            }
        });
    }
});
</script>