<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
<div id="content-container">
    <div id="page-head">
        <!--Page Title-->
        <div id="page-title">
            <!-- <h1 class="page-header text-overflow">General Elements</h1>//-->
        </div>
        <!--End page title-->
        <!--Breadcrumb-->
        <ol class="breadcrumb">
            <li><a href="#"><i class="demo-pli-home"></i></a></li>
            <li><a href="#">Masters</a></li>
            <li class="active">Add/Update Project</li>
        </ol>
        <!--End breadcrumb-->
    </div>
    <!--Page content-->
    <div id="page-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h5 class="panel-title">Add/Update Project</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 text-danger margir">
                                <?php
                                if(isset($error)){
                                    foreach ($error as $value){
                                        echo $value; echo "<br />";
                                    }
                                    echo "<hr>";
                                }
                                //print_r($data);
                                ?>
                            </div>
                        </div>
                        <!--Horizontal Form-->
                        <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/project_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                            <input type="hidden" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" />
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="concept_type">Concept Type<span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <select id="concept_type" name="concept_type" class="form-control">
                                        <option value="">==SELECT ==</option>
                                        <option value="AREA" <?=(isset($data['concept_type']))?($data['concept_type']=="AREA")?"selected":"":"";?>>AREA</option>
                                        <option value="WARD" <?=(isset($data['concept_type']))?($data['concept_type']=="WARD")?"selected":"":"";?>>WARD</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="project">Project Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="50" placeholder="Enter Project Name" id="project_name" name="project_name" class="form-control" value="<?=(isset($data['project_name']))?$data['project_name']:"";?>" onkeypress="return isAlpha(event);"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="project short name">Project Short Name <span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="50" placeholder="Enter Project Short Name" id="project_short_name" name="project_short_name" class="form-control" value="<?=(isset($data['project_short_name']))?$data['project_short_name']:"";?>" onkeypress="return isAlpha(event);"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Project Description <span class="text-danger"> *</span></label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" type="text" id="project_description" name="project_description" placeholder="Enter Project Description" maxlength="250" ><?=(isset($data['project_description']))?$data['project_description']:"";?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="latitude">Latitude</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="8" placeholder="Enter Latitude" id="latitude" name="latitude" class="form-control" value="<?=(isset($data['latitude']))?$data['latitude']:"";?>" onkeypress="return isDecNum(this, event);">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="longitude">Longitude</label>
                                <div class="col-sm-6">
                                    <input type="text" maxlength="8" placeholder="Enter Longitude" id="longitude" name="longitude" class="form-control" value="<?=(isset($data['longitude']))?$data['longitude']:"";?>" onkeypress="return isDecNum(this, event);">
                                </div>
                            </div>
                            <!-- <div class="form-group">
<label class="col-sm-3 control-label" for="location">Location</label>
<div class="col-sm-6">
<input type="text" maxlength="60" placeholder="Enter Project Location" id="project_location" name="project_location" class="form-control" value="<?=(isset($data['project_location']))?$data['project_location']:"";?>" onkeypress="return isAlpha(event);" >
</div>
</div> -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><br>Location</label>
                                <div class="col-sm-6">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>State <span class="text-danger"> *</span></td>
                                                <td>District <span class="text-danger"> *</span></td>
                                                <td>City <span class="text-danger"> *</span></td>
                                                <td colspan="2">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody id="tblProjectAdd">
                                        <?php
                                        if(isset($data['project_mstr_address_list'])){
                                            $i = 0;
                                            foreach($data['project_mstr_address_list'] as $getValues){
                                                $i++;
                                       ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" id="project_mstr_address_id<?=$i;?>" name="project_mstr_address_id[]" value="<?=$getValues['project_mstr_address_id']?>" />
                                                    <select id="state<?=$i;?>" name="state[]" class="form-control state" onchange="stateChangeFun(this.id);">
                                                        <option value="">== SELECT ==</option>
                                                        <?php
                                                        if(isset($data['stateList'])){
                                                            foreach ($data['stateList'] as $stateValue) {
                                                        ?>
                                                        <option value="<?=$stateValue['state'];?>" <?=(isset($getValues['state']))?($getValues['state']==$stateValue['state'])?"selected='selected'":"":"";?>><?=$stateValue['state']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="district<?=$i;?>" name="district[]" class="form-control district" onchange="districtChangeFun(this.id);">
                                                        <option value="">== SELECT ==</option>
                                                        <?php
                                                        if(isset($getValues['distList'])){
                                                            foreach ($getValues['distList'] as $distValue) {
                                                        ?>
                                                        <option value="<?=$distValue['dist'];?>" <?=(isset($getValues['district']))?($getValues['district']==$distValue['dist'])?"selected='selected'":"":"";?>><?=$distValue['dist']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="state_dist_city_id<?=$i;?>" name="state_dist_city_id[]" class="form-control state_dist_city_id">
                                                        <option value="">== SELECT ==</option>
                                                        <?php
                                                        if(isset($getValues['cityList'])){
                                                            foreach ($getValues['cityList'] as $cityValue) {
                                                        ?>
                                                        <option value="<?=$cityValue['_id'];?>" <?=(isset($getValues['state_dist_city_id']))?($getValues['state_dist_city_id']==$cityValue['_id'])?"selected='selected'":"":"";?>><?=$cityValue['city']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="addTableAdditem();"></i>
                                                </td>
                                                <td>
                                                <?php if($i!=1){ ?>
                                                    <i class="fa fa-remove remove_add_item" style="font-size:30px; cursor:pointer;"></i>
                                                <?php } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        }else{
                                        ?>
                                            <tr>
                                                <td>
                                                    <input type="hidden" id="project_mstr_address_id1" name="project_mstr_address_id[]" value="" />
                                                    <select id="state1" name="state[]" class="form-control state" onchange="stateChangeFun(this.id);">
                                                        <option value="">== SELECT ==</option>
                                                        <?php
                                                        if(isset($data['stateList'])){
                                                            foreach ($data['stateList'] as $stateValue) {
                                                        ?>
                                                        <option value="<?=$stateValue['state'];?>" <?=(isset($data['state']))?($data['state']==$stateValue['state'])?"selected='selected'":"":"";?>><?=$stateValue['state']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="district1" name="district[]" class="form-control district" onchange="districtChangeFun(this.id);">
                                                        <option value="">== SELECT ==</option>
                                                        <?php
                                                        if(isset($data['distList'])){
                                                            foreach ($data['distList'] as $distValue) {
                                                        ?>
                                                        <option value="<?=$stateValue['dist'];?>" <?=(isset($data['district']))?($data['district']==$distValue['dist'])?"selected='selected'":"":"";?>><?=$distValue['dist']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select id="state_dist_city_id1" name="state_dist_city_id[]" class="form-control state_dist_city_id">
                                                        <option value="">== SELECT ==</option>
                                                        <?php
                                                        if(isset($data['cityList'])){
                                                            foreach ($data['cityList'] as $cityValue) {
                                                        ?>
                                                        <option value="<?=$cityValue['_id'];?>" <?=(isset($data['state_dist_city_id']))?($data['state_dist_city_id']==$cityValue['_id'])?"selected='selected'":"":"";?>><?=$cityValue['city']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="addTableAdditem();"></i>
                                                </td>
                                                <td></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <input type="hidden" id="projectAddLength" value="<?=(isset($data['project_mstr_address_list']))?$i:1;?>" />
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-success" id="btnproject" name="btnproject" type="submit"><?=(isset($data["_id"]))?($data["_id"]!='')?"Edit Project":"Add Project":"Add Project";?></button>
                                <a href="<?=URLROOT;?>/Masters/ProjectList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
                            </div>
                        </form>
                        <!--End Horizontal Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End page content-->
</div>
<!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>
<script type="text/javascript">
$("#tblProjectAdd").on('click', '.remove_add_item', function(e) {
    $(this).closest("tr").remove();
});
function addTableAdditem(){
    var z = parseInt($('#projectAddLength').val())+1;
    var newDivTanent = $('<tr><td><input type="hidden" id="project_mstr_address_id'+z+'" name="project_mstr_address_id[]" value="" /><select id="state'+z+'" name="state[]" class="form-control state" onchange="stateChangeFun(this.id);"><option value="">== SELECT ==</option><?php if($data['stateList']){ foreach ($data['stateList'] as $stateValue) {?><option value="<?=$stateValue['state'];?>" <?=(isset($data['state']))?($data['state']==$stateValue['state'])?"selected='selected'":"":"";?>><?=$stateValue['state']?></option><?php } } ?></select></td><td><select id="district'+z+'" name="district[]" class="form-control district" onchange="districtChangeFun(this.id);"><option value="">== SELECT ==</option></select></td><td><select id="state_dist_city_id'+z+'" name="state_dist_city_id[]" class="form-control state_dist_city_id"><option value="">== SELECT ==</option></select></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="addTableAdditem();"></i></td><td><i class="fa fa-remove remove_add_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
    $('#tblProjectAdd').append(newDivTanent);
    $('#projectAddLength').val(z);
}
function stateChangeFun(ID){
    ID = ID.split("state")[1];
    $("#state"+ID).css('border-color','');
    var state = $("#state"+ID).val();
    if(state==""){
        $("#district"+ID).html("<option value=''>== SELECT ==</option>");
        $("#state_dist_city_id"+ID).html("<option value=''>== SELECT ==</option>");
    }else{
        $.ajax({
            url: "<?=URLROOT;?>/Api_StateDistCity/getDistByStateOption",
            method:"POST",
            data:{state:state},
            dataType:"json",
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    $("#district"+ID).html(data.data);
                }
            }
        });
    }
}
function districtChangeFun(ID){
    ID = ID.split("district")[1];
    $("#district"+ID).css('border-color','');
    var district = $("#district"+ID).val();
    if(district==""){
            $("#state_dist_city_id"+ID).html("<option value=''>== SELECT ==</option>");
        }else{
            $.ajax({
                url: "<?=URLROOT;?>/Api_StateDistCity/getCityByDistOption",
                method:"POST",
                data:{dist:district},
                dataType:"json",
                beforeSend: function() {
                    $("#loadingDiv").show();
                },
                success:function(data){
                    $("#loadingDiv").hide();
                    if(data.response==true){
                        $("#state_dist_city_id"+ID).html(data.data);
                    }
                }
            });
        }
}
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
        <?php if ($msgg = flashToast("projectExist")) { ?>
            modelInfo("<?=$msgg;?>"); 
        <?php } ?>



        $("#btnproject").click(function() {
            var process = true;
            var project_name = $("#project_name").val();
                project_name = project_name.trim();
            if (project_name=='null' || project_name == '') {
                $("#project_name").css({"border-color":"red"});
                $("#project_name").focus();
                process = false;
            }
            var concept_type = $("#concept_type").val();
                concept_type = concept_type.trim();
            if(concept_type=='')
            {
                $('#concept_type').css({"border-color":"red"});
                $('#concept_type').focus();
                process = false;
            }
            var project_short_name = $('#project_short_name').val();
                project_short_name = project_short_name.trim();
            if(project_short_name=='null' || project_short_name=='')
            {
                $('#project_short_name').css({"border-color":"red"});
                $('#project_short_name').focus();
                process = false;
            }
            var project_description = $('#project_description').val();
                project_description = project_description.trim();
            if(project_description=='')
            {
                $('#project_description').css({"border-color":"red"});
                $('#project_description').focus();
                process = false;
            }
            var latitude = $("#latitude").val();
            if(latitude !='')
            {
                if(!$.isNumeric(latitude))
                {
                    $("#latitude").css({"border-color":"red"});
                    $("#latitude").focus();
                    process = false;
                }
            }

            var longitude = $("#longitude").val();
            if(longitude !='')
            {
                if(!$.isNumeric(longitude))
                {
                    $("#longitude").css({"border-color":"red"});
                    $("#longitude").focus();
                    process = false;
                }
            }

            if($('#state').val()==''){
                $('#state').css({"border-color":"red"}); process = false;
            }
            if($('#district').val()==''){
                $('#district').css({"border-color":"red"}); process = false;
            }
            if($('#state_dist_city_id').val()==''){
                $('#state_dist_city_id').css({"border-color":"red"}); process = false;
            }

            return process;
        });
        $("#concept_type").change(function(){$(this).css('border-color','');});
        $("#project_name").keyup(function(){$(this).css('border-color','');});
        $("#project_short_name").keyup(function(){$(this).css('border-color','');});
        $("#project_description").keyup(function(){$(this).css('border-color','');});
        $("#latitude").keyup(function(){$(this).css('border-color','');});
        $("#longitude").keyup(function(){$(this).css('border-color','');});
        $("#state_dist_city_id").change(function(){$(this).css('border-color','');});
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
