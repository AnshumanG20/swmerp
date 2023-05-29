<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<style>
.form-group{margin-bottom:7px;}
//.talign{text-align:right;}
</style>
<div id="content-container"><!--CONTENT CONTAINER-->
    <div id="page-head"><!--page-head-->
        <ol class="breadcrumb">
            <li><a href="#">Employee List</a></li>
            <li class="active">Add Update Employee</li>
        </ol><!--End page-head-->
    </div>
    <div id="page-content"><!--Page content-->
        <div class="row">
                    <div class="col-md-12">
                        <div class="panel"><!--Panel-->
                        <ul class="wz-classic bord-btm">
                            <li class="col-xs-3 col-md-2" id="clickStepOne" onclick="step_go_tab(1)" style="cursor: pointer;">
                                <a data-toggle="tab" >
                                <span class="icon-wrap icon-wrap-xs"><i class="fa fa-info-circle"></i></span> Basic Details
                                </a>
                            </li>
                            <li class="col-xs-3 col-md-2" id="clickStepTwo" onclick="step_go_tab(2)" style="cursor: pointer;">
                                <a data-toggle="tab" >
                                    <span class="icon-wrap icon-wrap-xs"><i class="fa fa-user-circle-o"></i></span> Contact Details
                                </a>
                            </li>
                            <li class="col-xs-3 col-md-2" id="clickStepThree" onclick="step_go_tab(3)" style="cursor: pointer;">
                                <a data-toggle="tab">
                                    <span class="icon-wrap icon-wrap-xs"><i class="fa fa-graduation-cap"></i></span> Academic Details
                                </a>
                            </li>
                            <li class="col-xs-3 col-md-2" id="clickStepFour" onclick="step_go_tab(4)" style="cursor: pointer;">
                                <a data-toggle="tab">
                                    <span class="icon-wrap icon-wrap-xs"><i class="fa fa-building-o"></i></span> Employment Details
                                </a>
                            </li>
                        <li class="col-xs-3 col-md-2" id="clickStepFive" onclick="step_go_tab(5)" style="cursor: pointer;">
                                <a data-toggle="tab">
                                    <span class="icon-wrap icon-wrap-xs"><i class="fa fa-cloud-upload"></i></span> Project Details
                                </a>
                            </li>
                            <li class="col-xs-3 col-md-2" id="clickStepFive" onclick="step_go_tab(6)" style="cursor: pointer;">
                                <a data-toggle="tab">
                                    <span class="icon-wrap icon-wrap-xs"><i class="fa fa-cloud-upload"></i></span> Document Details
                                </a>
                            </li>
                        </ul>
                        <h5><span class="badge badge-secondary" style="margin-left: 20px;"><?= isset($data['first_name'])? $data['first_name']:''?><?= isset($data['first_name'])? $data['last_name']:''?></span></h5>
                        <div id="data_tooltip" class="text-danger" style="text-align: center;"></div>


                    <div class="panel-body"><!--panel-body-->
                        <div class="tab-content"><!--tab-content-->
                            <!--First tab-->
                            <div id="tabPaneOne" class="hide">
                                <form id="form_step_one" name="form_step_one" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-12 text-danger" id="stepOneErrorPanel"></label>
                                    </div>
                                    <input type="hidden" id="emp_details_id" name="emp_details_id" value="<?=(isset($data['_id']))?$data['_id']:"";?>" />
                                    <div class="form-group">
                                        <label class="col-md-2">Full Name <span class="text-danger">*</span></label>
                                        <div class="col-md-3"><label>First name<span class="text-danger">*</span></label>
                                            <input class="form-control m-t-xxs" id="first_name" name="first_name" placeholder="First Name" type="text" onkeypress="return isAlpha(event,change_case(this,30));" maxlength="50" onchange="change_case(this,30)" value="<?=(isset($data['first_name']))?$data['first_name']:"";?>"   >
                                           

                                        </div>
                                        <div class="col-md-3"><label>Middle Name </label>
                                            <input class="form-control m-t-xxs" id="middle_name" name="middle_name" placeholder="Middle Name" type="text" value="<?=(isset($data['middle_name']))?$data['middle_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="50" onchange="change_case(this)" >

                                        </div>
                                        <div class="col-md-3"><label>Last Name <span class="text-danger">*</span></label>
                                            <input class="form-control m-t-xxs" id="last_name" name="last_name" placeholder="Last Name" type="text" value="<?=(isset($data['last_name']))?$data['last_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="50" onchange="change_case(this)"  >

                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <label class="col-md-2" >Mobile No <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs mask_mobile_no" id="personal_phone_no" name="personal_phone_no" placeholder="Personal Phone No" type="text" value="<?=(isset($data['personal_phone_no']))?$data['personal_phone_no']:"";?>" onkeypress="return isNum(event);"  >
                                        </div>
                                        <label class="col-md-2" >Home Mobile No <span class="text-danger"></span></label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs mask_mobile_no" id="other_phone_no" name="other_phone_no" placeholder="Other Phone No" type="text" value="<?=(isset($data['other_phone_no']))?$data['other_phone_no']:"";?>" onkeypress="return isNum(event);"  >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Email ID <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs" id="email_id" name="email_id" placeholder="Email ID" type="email" value="<?=(isset($data['email_id']))?$data['email_id']:"";?>" />
                                        </div>
                                       
                                       
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 " >Blood Group </label>
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="blood_group" name="blood_group"  >
                                                <option value="">==SELECT==</option>
                                                <option value="A+" <?=(isset($data['blood_group']))?($data['blood_group']=="A+")?"selected":"":"";?>>A+</option>
                                                <option value="A-" <?=(isset($data['blood_group']))?($data['blood_group']=="A-")?"selected":"":"";?>>A-</option>
                                                <option value="B+" <?=(isset($data['blood_group']))?($data['blood_group']=="B+")?"selected":"":"";?>>B+</option>
                                                <option value="B-" <?=(isset($data['blood_group']))?($data['blood_group']=="B-")?"selected":"":"";?>>B-</option>
                                                <option value="O+" <?=(isset($data['blood_group']))?($data['blood_group']=="O+")?"selected":"":"";?>>O+</option>
                                                <option value="O-" <?=(isset($data['blood_group']))?($data['blood_group']=="O-")?"selected":"":"";?>>O-</option>
                                                <option value="AB+" <?=(isset($data['blood_group']))?($data['blood_group']=="AB+")?"selected":"":"";?>>AB+</option>
                                                <option value="AB-" <?=(isset($data['blood_group']))?($data['blood_group']=="AB-")?"selected":"":"";?>>AB-</option>

                                            </select>
                                            <span id="blood_group_show" class="text-danger"></span>
                                        </div>
                                        <label class="col-md-2 " >Gender <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <div class="radio">
                                                                    <input type="radio" id="gender1" class="magic-radio" name="gender" value="Male" <?=(isset($data['gender']))?($data['gender']=="Male")?"checked":"":"checked";?> />
                                                                    <label for="gender1">Male</label>

                                                                    <input type="radio" id="gender2" class="magic-radio" name="gender" value="Female" <?=(isset($data['gender']))?($data['gender']=="Female")?"checked":"":"";?> />
                                                                    <label for="gender2">Female</label>

                                                                    <input type="radio" id="gender3" class="magic-radio" name="gender" value="Other" <?=(isset($data['gender']))?($data['gender']=="Other")?"checked":"":"";?> />
                                                                    <label for="gender3">Other</label>
                                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 " >Marital Status <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <Select class="form-control m-t-xxs" id="marital_status" name="marital_status" >
                                                <option value="Single" <?=(isset($data['marital_status']))?($data['marital_status']=="Single")?"selected":"":"";?>>Single</option>
                                                <option value="Married" <?=(isset($data['marital_status']))?($data['marital_status']=="Married")?"selected":"":"";?>>Married</option>
                                                <option value="Widowed" <?=(isset($data['marital_status']))?($data['marital_status']=="Widowed")?"selected":"":"";?>>Widowed</option>
                                                <option value="Divorced" <?=(isset($data['marital_status']))?($data['marital_status']=="Divorced")?"selected":"":"";?>>Divorced</option>
                                            </Select>

                                        </div>
                                        <div id="spouse_name_hide_show" class="hide">
                                            <label class="col-md-2 ">Spouse Name <span class="text-danger">*</span></label>
                                            <div class="col-md-3">
                                                <input onkeypress="change_case(this);" onchange="change_case(this)" class="form-control m-t-xxs" id="spouse_name" name="spouse_name" placeholder="Spouse Name" type="text" value="<?=(isset($spouse_name))?$spouse_name:"";?>" maxlength="20">
                                                <span id="mother_name_show" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 " >Date of Birth <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <div class="input-group date">
                                                <input type="text" id="d_o_b" name="d_o_b" class="form-control mask_date" value="<?=(isset($data['d_o_b']))?$data['d_o_b']:"";?>">
                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                            </div>
                                        </div>
                                        <?php
                                        if(isset($data['d_o_b'])){
                                            $bday = new DateTime($data['d_o_b']); // Your date of birth
                                            $today = new Datetime(date('Y-m-d'));
                                            $diff = $today->diff($bday);
                                            $age = $diff->y;
                                        }else{
                                            $age = "";
                                        }
                                        ?>
                                        <label class="col-md-2 " >Age </label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs" id="age" name="age" placeholder="Age" type="text" value="<?=$age;?>" readonly  >
                                            <span id="age_show" class="text-danger"></span>                                                             </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2 ">Height <span class="text-danger">(in foot)</span></label>
                                        <div class="col-md-3">
                                            <input step="0.01"  class="form-control m-t-xxs" id="height" name="height"  placeholder="Height" type="number" value="<?=(isset($data['height']))?$data['height']:"";?>"   >
                                        </div>
                                        <label class="col-md-2 ">Weight <span class="text-danger">(in kg)</span></label>
                                        <div class="col-md-3">
                                            <input step="0.01" class="form-control m-t-xxs" id="weight" name="weight"  placeholder="Weight" type="number" value="<?=(isset($data['weight']))?$data['weight']:"";?>"   >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 " >Upload Image </label>
                                        <div class="col-md-3">
                                            <span>Preferred Image : Maximum size of 1MB</span>
                                            <input type="file" id="photo_path" name="photo_path" class="form-control m-t-xxs" />
                                            <input type="hidden" id="is_image" name="is_image" value="<?=(isset($data['photo_path']))?($data['photo_path']!="")?"is_image":"":"";?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">&nbsp;</label>
                                        <div class="col-md-3">
                                            <div class="div_photo_path_preview" style="width:100%; text-align:center;">
                                                <img id="photo_path_preview" src="<?=(isset($data['photo_path']))?($data['photo_path']!="")?URLROOT."/uploads/".$data['photo_path']:URLROOT."/common/assets/img/avatar/default_avatar.png":URLROOT."/common/assets/img/avatar/default_avatar.png";?>" alt="" style="height:230px; width:220px;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >&nbsp;</label>
                                        <div class="col-md-3">
                                            <input type="button" id="image_path_remove" class="btn btn-dark btn-rounded btn-block" value="Remove Photo">
                                        </div>
                                    </div>
                                    <button type="button" id="btn-step-one-next" class="btn btn-mint pull-right">Save & Next</button>
                                </form>
                            </div>

                            <!--Second tab-->
                            <div id="tabPaneTwo" class="hide">
                                <form id="form_step_two" name="form_step_two" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12 text-danger" id="stepTwoErrorPanel"></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label text-danger"><u>Present Address:</u></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Address Line <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" maxlength="150" class="form-control m-t-xxs" id="present_address" name="present_address" placeholder="Present Address" onkeypress="change_case(this);" onchange="change_case(this)"><?=(isset($data['present_address']))?$data['present_address']:"";?></textarea>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2" >City <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <!-- <input maxlength="100" class="form-control m-t-xxs" id="present_city" name="present_city" placeholder="City" type="text" value="<?=(isset($data['present_city']))?$data['present_city']:"";?>" onkeypress="return isAlpha(event);"> -->

                                            <select id="present_city" name="present_city" class="form-control state_dist_city_id" onchange="get_dist_state(this,1)">
                                                        <option value="">== SELECT ==</option>
                                                        <option value="add city" class="text-white bg-success">Add City</option>
                                                        <?php
                                                        if(isset($data['city_list'])){
                                                            foreach ($data['city_list'] as $cityValue) {
                                                        ?>
                                                        <option value="<?=$cityValue['city'];?>" <?=(isset($data['present_city']))?($data['present_city']==$cityValue['city'])?"selected='selected'":"":"";?>><?=$cityValue['city']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                        </div>
                                        <label class="col-md-2" >District <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input maxlength="100" class="form-control m-t-xxs" id="present_district" name="present_district" placeholder="District" type="text" value="<?=(isset($data['present_district']))?$data['present_district']:"";?>" onkeypress="return isAlpha(event);">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-2" >State <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input maxlength="100" class="form-control m-t-xxs" id="present_state" name="present_state" placeholder="State" type="text" value="<?=(isset($data['present_state']))?$data['present_state']:"";?>" onkeypress="return isAlpha(event);" >
                                        </div>
                                        <label class="col-md-2">Pincode <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs" id="present_pin_code" name="present_pin_code" placeholder="Pincode" value="<?=(isset($data['present_pin_code']))?$data['present_pin_code']:"";?>" type="text" maxlength="6" onkeypress="return isNum(event);" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label class="text-danger"><u>Permanent Address:</u> </label>
                                            <input type="checkbox" id="sameAPresentAddCheckBox" class="magic-checkbox">
                                            <label for="sameAPresentAddCheckBox">Same as Present Address</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Address Line <span class="text-danger">*</span></label>
                                        <div class="col-md-8">
                                            <textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" maxlength="150" class="form-control m-t-xxs" id="permanent_address" name="permanent_address" placeholder="Present Address" onkeypress="change_case(this);" onchange="change_case(this)"><?=(isset($data['permanent_address']))?$data['permanent_address']:"";?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >City <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <!-- <input maxlength="100" class="form-control m-t-xxs" id="permanent_city" name="permanent_city" placeholder="City" type="text" value="<?=(isset($data['permanent_city']))?$data['permanent_city']:"";?>" onkeypress="return isAlpha(event);" > -->
                                            <select id="permanent_city" name="permanent_city" class="form-control state_dist_city_id" onchange="get_dist_state(this,2)">
                                                        <option value="">== SELECT ==</option>
                                                        <option value="add city" class="text-white bg-success">Add City</option>
                                                        <?php
                                                        if(isset($data['city_list'])){
                                                            foreach ($data['city_list'] as $cityValue) {
                                                        ?>
                                                        <option value="<?=$cityValue['city'];?>" <?=(isset($data['permanent_city']))?($data['permanent_city']==$cityValue['city'])?"selected='selected'":"":"";?>><?=$cityValue['city']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                        </div>
                                        <label class="col-md-2" >District <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input maxlength="100" class="form-control m-t-xxs" id="permanent_district" name="permanent_district" placeholder="District" type="text" value="<?=(isset($data['permanent_district']))?$data['permanent_district']:"";?>" onkeypress="return isAlpha(event);" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >State <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input maxlength="100" class="form-control m-t-xxs" id="permanent_state" name="permanent_state" placeholder="State" type="text" value="<?=(isset($data['permanent_state']))?$data['permanent_state']:"";?>" onkeypress="return isAlpha(event);" >
                                        </div>
                                        <label class="col-md-2">Pincode <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs" id="permanent_pin_code" name="permanent_pin_code" placeholder="Pincode" value="<?=(isset($data['permanent_pin_code']))?$data['permanent_pin_code']:"";?>" type="text" maxlength="6" onkeypress="return isNum(event);" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Family Background</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <input type="hidden" id="emp_family_backbgound_id" name="emp_family_backbgound_id" />
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-condensed" >
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>Relation  </th>
                                                                    <th>Name  </th>
                                                                    <th>Occupation </th>
                                                                    <th>Contact No.</th>
                                                                    <th>Address</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Father <span class="text-danger">*</span></td>
                                                                    <td><input  type="text" id="father_name" name="father_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['father_name']))?$data['emp_family_backbgound']['father_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="father_occupation" name="father_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['father_occupation']))?$data['emp_family_backbgound']['father_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="father_contact_no" name="father_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['father_contact_no']))?$data['emp_family_backbgound']['father_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="father_address" name="father_address" class="form-control"><?=(isset($data['emp_family_backbgound']['father_address']))?$data['emp_family_backbgound']['father_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mother</td>
                                                                    <td><input type="text" id="mother_name" name="mother_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['mother_name']))?$data['emp_family_backbgound']['mother_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="mother_occupation" name="mother_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['mother_occupation']))?$data['emp_family_backbgound']['mother_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="mother_contact_no" name="mother_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['mother_contact_no']))?$data['emp_family_backbgound']['mother_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="mother_address" name="mother_address" class="form-control"><?=(isset($data['emp_family_backbgound']['mother_address']))?$data['emp_family_backbgound']['mother_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brother</td>
                                                                    <td><input type="text" id="brother_name" name="brother_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['brother_name']))?$data['emp_family_backbgound']['brother_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="brother_occupation" name="brother_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['brother_occupation']))?$data['emp_family_backbgound']['brother_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="brother_contact_no" name="brother_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['brother_contact_no']))?$data['emp_family_backbgound']['brother_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="brother_address" name="brother_address" class="form-control"><?=(isset($data['emp_family_backbgound']['brother_address']))?$data['emp_family_backbgound']['brother_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sister</td>
                                                                    <td><input type="text" id="sister_name" name="sister_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['sister_name']))?$data['emp_family_backbgound']['sister_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="sister_occupation" name="sister_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['sister_occupation']))?$data['emp_family_backbgound']['sister_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="sister_contact_no" name="sister_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['sister_contact_no']))?$data['emp_family_backbgound']['sister_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="sister_address" name="sister_address" class="form-control"><?=(isset($data['emp_family_backbgound']['sister_address']))?$data['emp_family_backbgound']['sister_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Brother-in-law</td>
                                                                    <td><input type="text" id="brother_in_law_name" name="brother_in_law_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['brother_in_law_name']))?$data['emp_family_backbgound']['brother_in_law_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="brother_in_law_occupation" name="brother_in_law_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['brother_in_law_occupation']))?$data['emp_family_backbgound']['brother_in_law_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="brother_in_law_contact_no" name="brother_in_law_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['brother_in_law_contact_no']))?$data['emp_family_backbgound']['brother_in_law_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="brother_in_law_address" name="brother_in_law_address" class="form-control"><?=(isset($data['emp_family_backbgound']['brother_in_law_address']))?$data['emp_family_backbgound']['brother_in_law_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Spouse</td>
                                                                    <td><input type="text" id="spouse_name" name="spouse_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['spouse_name']))?$data['emp_family_backbgound']['spouse_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="spouse_occupation" name="spouse_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['spouse_occupation']))?$data['emp_family_backbgound']['spouse_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="spouse_contact_no" name="spouse_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['spouse_contact_no']))?$data['emp_family_backbgound']['spouse_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="spouse_address" name="spouse_address" class="form-control"><?=(isset($data['emp_family_backbgound']['spouse_address']))?$data['emp_family_backbgound']['spouse_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Friend</td>
                                                                    <td><input type="text" id="friend1_name" name="friend1_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['friend1_name']))?$data['emp_family_backbgound']['friend1_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="friend1_occupation" name="friend1_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['friend1_occupation']))?$data['emp_family_backbgound']['friend1_contact_no']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="friend1_contact_no" name="friend1_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['friend1_contact_no']))?$data['emp_family_backbgound']['friend1_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="friend1_address" name="friend1_address" class="form-control"><?=(isset($data['emp_family_backbgound']['friend1_address']))?$data['emp_family_backbgound']['friend1_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Friend</td>
                                                                    <td><input type="text" id="friend2_name" name="friend2_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['friend2_name']))?$data['emp_family_backbgound']['friend2_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="friend2_occupation" name="friend2_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['friend2_occupation']))?$data['emp_family_backbgound']['friend2_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="friend2_contact_no" name="friend2_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['friend2_contact_no']))?$data['emp_family_backbgound']['friend2_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="friend2_address" name="friend2_address" class="form-control"><?=(isset($data['emp_family_backbgound']['friend2_address']))?$data['emp_family_backbgound']['friend2_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="5"><span class="text-danger">*</span>If none of the above is relevant, please mentioned other close relations below</td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Relative 1</td>
                                                                    <td><input type="text" id="relative1_name" name="relative1_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['relative1_name']))?$data['emp_family_backbgound']['relative1_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="relative1_occupation" name="relative1_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['relative1_occupation']))?$data['emp_family_backbgound']['relative1_occupation']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="relative1_contact_no" name="relative1_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['relative1_contact_no']))?$data['emp_family_backbgound']['relative1_contact_no']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="relative1_address" name="relative1_address" class="form-control"><?=(isset($data['emp_family_backbgound']['relative1_address']))?$data['emp_family_backbgound']['relative1_address']:"";?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Relative 2</td>
                                                                    <td><input type="text" id="relative2_name" name="relative2_name" class="form-control" value="<?=(isset($data['emp_family_backbgound']['relative2_name']))?$data['emp_family_backbgound']['relative2_name']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="30" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="relative2_occupation" name="relative2_occupation" class="form-control" value="<?=(isset($data['emp_family_backbgound']['relative2_contact_no']))?$data['emp_family_backbgound']['relative2_contact_no']:"";?>" onkeypress="return isAlpha(event,change_case(this));" maxlength="100" onchange="change_case(this)" /></td>
                                                                    <td><input type="text" id="relative2_contact_no" name="relative2_contact_no" class="form-control mask_mobile_no" value="<?=(isset($data['emp_family_backbgound']['relative2_address']))?$data['emp_family_backbgound']['relative2_address']:"";?>" /></td>
                                                                    <td><textarea onmouseover="show_full_data(this)" onmouseout="remove_data()" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" type="text" id="relative2_address" name="relative2_address" class="form-control"><?=(isset($data['emp_family_backbgound']['relative2_occupation']))?$data['emp_family_backbgound']['relative2_occupation']:"";?></textarea></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <button type="button" id="btn-step-two-prev" class="btn btn-mint">Previous</button>
                                    <button type="button" id="btn-step-two-next" class="btn btn-mint pull-right">Save & Next</button>
                                </form>
                            </div>

                            <!--Third tab-->
                            <div id="tabPaneThree" class="hide">
                                <form method="POST" id="form_step_three" name="form_step_three" class="form-horizontal mar-top">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <label class="col-md-12 text-danger" id="stepThreeErrorPanel"></label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-12">All Field is Required. <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-condensed" >
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>Qualification&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Stream&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Sub&nbsp;Stream&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Medium : English / Vernacular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                                                    <th>Year Of Passing</th>
                                                                    <th>Name Of School / College / Institute And Place</th>
                                                                    <th>Name Of Board / University Affiliated</th>
                                                                    <th>percentage/ CGPA/ Division</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="rowAddAcademicDetails">
                                                        <?php
                                                        $z = 0;
                                                        if(isset($data['emp_qualification_details'])){
                                                            foreach($data['emp_qualification_details'] as $eachValue){
                                                                $z++;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="hidden" id="emp_qualification_details_id<?=$z;?>" name="emp_qualification_details_id[]" value="<?=$eachValue['_id'];?>" />
                                                                        <select id="course_mstr_id<?=$z;?>" name="course_mstr_id[]" class="form-control course_mstr_id" onchange="course_mstr_change_func(this);">
                                                                            <option value="">== SELECT ==</option>
                                                                        <?php
                                                                            if(isset($data['course_mstr_list'])){
                                                                                foreach($data['course_mstr_list'] as $values){
                                                                        ?>
                                                                            <option value="<?=$values['_id'];?>" <?=($eachValue['course_mstr_id']==$values['_id'])?"selected":"";?>><?=$values['course_name'];?></option>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                            <!--<option value="0">Other</option>//-->
                                                                        </select>
                                                                        <div id="other_course_hide_show<?=$z;?>" style="margin-top:5px; display:none;">
                                                                            <input type="text" id="other_course<?=$z;?>" name="other_course[]" class="form-control other_course" placeholder="Other Course" value="<?=$eachValue['other_course'];?>" onkeypress="return isAlpha(event);" onkeydown="keyDownNormal(this);" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <select id="sub_course_mstr_id<?=$z;?>" name="sub_course_mstr_id[]" class="form-control sub_course_mstr_id" onchange="sub_course_mstr_change_func(this,<?=$z;?>);">
                                                                            <option value="">==SELECT==</option>
                                                                            <option value="add" class="text-success">Add Stream</option>
                                                                            <?php
                                                                                if(isset($eachValue['sub_course_mstr_list'])){
                                                                                    foreach($eachValue['sub_course_mstr_list'] as $values){
                                                                            ?>
                                                                                <option value="<?=$values['_id'];?>" <?=($eachValue['sub_course_mstr_id']==$values['_id'])?"selected":"";?>><?=$values['stream_name'];?></option>
                                                                            <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select id="sub_stream_mstr_id<?=$z;?>" name="sub_stream_mstr_id[]" class="form-control sub_stream_mstr_id" onchange="keyDownNormal(this);">
                                                                            <option value="">==SELECT==</option>
                                                                            <?php
                                                                                if(isset($eachValue['sub_stream_mstr_list'])){
                                                                                    foreach($eachValue['sub_stream_mstr_list'] as $values){
                                                                            ?>
                                                                                <option value="<?=$values['_id'];?>" <?=($eachValue['sub_stream_mstr_id']==$values['_id'])?"selected":"";?>><?=$values['sub_stream_name'];?></option>
                                                                            <?php
                                                                                    }
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select id="medium_type<?=$z;?>" name="medium_type[]" class="form-control medium_type" onchange="keyDownNormal(this);">
                                                                            <option value="">== SELECT ==</option>
                                                                            <option value="ENGLISH" <?=($eachValue['medium_type']=="ENGLISH")?"selected":"";?>>ENGLISH</option>
                                                                            <option value="HINDI" <?=($eachValue['medium_type']=="HINDI")?"selected":"";?>>HINDI</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" id="passing_year<?=$z;?>" name="passing_year[]" class="form-control passing_year" value="<?=$eachValue['passing_year'];?>" maxlength="4" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" type="text" id="school_college_institute_name<?=$z;?>" name="school_college_institute_name[]" class="form-control school_college_institute_name" value="<?=$eachValue['school_college_institute_name'];?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" type="text" id="board_university_name<?=$z;?>" name="board_university_name[]" class="form-control board_university_name" value="<?=$eachValue['board_university_name'];?>"  onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" onchange="appering_case_check(this,<?=$z;?>)" list="cars" type="text" id="marks_percent<?=$z;?>" name="marks_percent[]" class="form-control marks_percent" value="<?=$eachValue['marks_percent'];?>" onkeydown="keyDownNormal(this);" onkeypress="return isNumComma(event);" maxlength="10" />
                                                                    <datalist id="cars">
                                                                        <option>FIRST</option>
                                                                        <option>SECOND</option>
                                                                        <option>THIRD</option>
                                                                        <option>APPEARING</option>
                                                                        </datalist>
                                                                    </td>
                                                                    <td>
                                                                        <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="academicTableAdditem(1);"></i></td>
                                                                    <td>
                                                                    <?php 
                                                                        if($z!=1){
                                                                    ?>
                                                                        <i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }else{ $z++;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="hidden" id="emp_qualification_details_id1" name="emp_qualification_details_id[]" value="" />
                                                                        <select id="course_mstr_id1" name="course_mstr_id[]" class="form-control course_mstr_id" onchange="course_mstr_change_func(this);">
                                                                            <option value="">== SELECT ==</option>
                                                                        <?php
                                                                            if(isset($data['course_mstr_list'])){
                                                                                foreach($data['course_mstr_list'] as $values){
                                                                        ?>
                                                                            <option value="<?=$values['_id'];?>"><?=$values['course_name'];?></option>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                            <!--<option value="0">Other</option>//-->
                                                                        </select>
                                                                        <div id="other_course_hide_show1" style="margin-top:5px; display:none;">
                                                                            <input type="text" id="other_course1" name="other_course[]" class="form-control other_course" placeholder="Other Course" value="" onkeypress="return isAlpha(event);" onkeydown="keyDownNormal(this);" />
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <select id="sub_course_mstr_id1" name="sub_course_mstr_id[]" class="form-control sub_course_mstr_id" onchange="sub_course_mstr_change_func(this,<?=$z;?>);">
                                                                            <option value="">==SELECT==</option>
                                                                            <option value="add" class="text-success">Add Stream</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select id="sub_stream_mstr_id1" name="sub_stream_mstr_id[]" class="form-control sub_stream_mstr_id" onchange="keyDownNormal(this);">
                                                                            <option value="">==SELECT==</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>
                                                                        <select id="medium_type1" name="medium_type[]" class="form-control medium_type" onchange="keyDownNormal(this);">
                                                                            <option value="">== SELECT ==</option>
                                                                            <option value="ENGLISH">ENGLISH</option>
                                                                            <option value="HINDI">HINDI</option>
                                                                        </select>
                                                                    </td>
                                                                    <td><input type="text" id="passing_year1" name="passing_year[]" class="form-control passing_year" value="" maxlength="4" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" type="text" id="school_college_institute_name1" name="school_college_institute_name[]" class="form-control school_college_institute_name" value=""  onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" type="text" id="board_university_name1" name="board_university_name[]" class="form-control board_university_name" value=""  onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" onchange="appering_case_check(this,<?=$z;?>)" list="cars" type="text" id="marks_percent1" name="marks_percent[]" class="form-control marks_percent" value="" onkeydown="keyDownNormal(this);" onkeypress="return isNumComma(event);" maxlength="10" />
                                                                    <datalist id="cars">
                                                                        <option>FIRST</option>
                                                                        <option>SECOND</option>
                                                                        <option>THIRD</option>
                                                                        <option>APPEARING</option>
                                                                        </datalist>
                                                                    </td>
                                                                    <td>
                                                                        <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="academicTableAdditem(1);"></i></td>
                                                                    <td></td>
                                                                </tr>
                                                        <?php
                                                         }
                                                        ?>
                                                                <input type="hidden" name="academicTableLen" id="academicTableLen" value="<?=$z;?>" />
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>

                                    <button type="button" id="btn-step-three-prev" class="btn btn-mint">Previous</button>
                                    <button type="button" id="btn-step-three-next" class="next btn btn-mint pull-right">Next</button>
                                </form>
                            </div>

                            <!--Fourth tab-->
                            <div id="tabPaneFour" class="hide">
                                <form method="post" id="form_step_four" name="form_step_four" class="form-horizontal mar-top">
                                    <div class="form-group">
                                        <label class="col-md-12 text-danger" id="stepFourErrorPanel"></label>
                                    </div>
                                    <div class="form-group hide">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Present Employment</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Name Of Employer </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="present_name_of_employer" name="present_name_of_employer" placeholder="Name of Employer" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_name_of_employer']:"";?>"  >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Address Of Organisation </label>
                                                        <div class="col-md-5">
                                                            <textarea class="form-control m-t-xxs" id="present_address_of_organisation" name="present_address_of_organisation" placeholder="Address of Organisation"><?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_address_of_organisation']:"";?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Date Of Joining </label>
                                                        <div class="col-md-5">
                                                            <div class="input-group date">
                                                                <input type="text" id="present_date_of_joining" name="present_date_of_joining" class="form-control datepickerWithMask mask_date" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_date_of_joining']:"";?>">
                                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Brief Description Of Present Job :<br/>
                                        Heighlight Special Achievements, Awards, Promotions, etc. </label>
                                                        <div class="col-md-5">
                                                            <textarea class="form-control m-t-xxs" id="present_brief_desc_of_present_job" name="present_brief_desc_of_present_job" placeholder="Brief Description of Present Job"><?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_brief_desc_of_present_job']:"";?></textarea>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Details Of Present Emoluments<br/>(Monthly) <span class="text-danger">Head of Salary: </span></label>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="col-md-2">Basic
                                                                    <input class="form-control m-t-xxs" id="present_basic_salary" name="present_basic_salary" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_basic_salary']:"";?>"  >
                                                                </label>
                                                                <label class="col-md-2">HRA
                                                                    <input class="form-control m-t-xxs" id="present_hra" name="present_hra" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_hra']:"";?>"  >
                                                                </label>
                                                                <label class="col-md-3">Total Monthly Amount
                                                                    <input class="form-control m-t-xxs" id="present_total_monthly_amt" name="present_total_monthly_amt" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_total_monthly_amt']:"";?>"  >
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Other Emoluments Like PF, LTA,
                                        Medical, Gratuity, Bonus/Ex-gratia etc. </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="present_other_emoluments_pf_lta_medical" name="present_other_emoluments_pf_lta_medical" placeholder="" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_other_emoluments_pf_lta_medical']:"";?>"  >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Any Benefits / Facilities In Kind ? </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="present_any_benefits_facilities" name="present_any_benefits_facilities" placeholder="" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_any_benefits_facilities']:"";?>"  >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Expected Salary </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="present_expected_salary_pf_contribution_bonus" name="present_expected_salary_pf_contribution_bonus" placeholder="" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_expected_salary_pf_contribution_bonus']:"";?>"  >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >What Notice Period Do You Need To Join ? </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="present_join_notice_period" name="present_join_notice_period" placeholder="" type="text" value="<?=(isset($data['emp_present_employment']))?$data['emp_present_employment']['present_join_notice_period']:"";?>"  >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Previous Employment (Reverse Chronological Order)</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-condensed" >
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>Period  </th>
                                                                    <th>Total Exp. (&#8377;)  </th>
                                                                    <th>Organisation Name, Brief Address</th>
                                                                    <th>Designation</th>
                                                                    <th>Monthly Emoluments(Last)</th>
                                                                    <th>Brief Job Description</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="rowAddPreviousEmploymentDetails">
                                                        <?php
                                                        $z = 0;
                                                        if(isset($data['emp_previous_employment_details'])){
                                                            foreach ($data['emp_previous_employment_details'] as $eachValue) {
                                                                $z++;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="hidden" id="emp_previous_employment_details_id<?=$z;?>" name="emp_previous_employment_details_id[]" value="<?=$eachValue['_id'];?>" />
                                                                        <div class="input-group">
                                                                            <input type="month" id="previous_period_from<?=$z;?>" name="previous_period_from[]" class="form-control previous_period_from" value="<?=date('Y-m', strtotime($eachValue['previous_period_from']));?>" onchange="employmentFromPeriodFun(this);" style="width:150px;" />
                                                                            <span class="input-group-addon">to</span>
                                                                            <input type="month" id="previous_period_to<?=$z;?>" name="previous_period_to[]" class="form-control previous_period_to" value="<?=date('Y-m', strtotime($eachValue['previous_period_to']));?>" onchange="employmentToPeriodFun(this);" style="width:150px;" />
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="text" id="previous_experience<?=$z;?>" name="previous_experience[]" class="form-control previous_experience" value="<?=$eachValue['previous_experience'];?>" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_organization_name_address<?=$z;?>" name="previous_organization_name_address[]" class="form-control previous_organization_name_address" value="<?=$eachValue['previous_organization_name_address'];?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_designation<?=$z;?>" name="previous_designation[]" class="form-control previous_designation" value="<?=$eachValue['previous_designation'];?>"onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_monthly_emoluments<?=$z;?>" name="previous_monthly_emoluments[]" class="form-control previous_monthly_emoluments" value="<?=$eachValue['previous_monthly_emoluments'];?>" maxlength="5" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_brief_job_description<?=$z;?>" name="previous_brief_job_description[]" class="form-control previous_brief_job_description" value="<?=$eachValue['previous_brief_job_description'];?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td>
                                                                        <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="employeementTableAdditem(1);"></i></td>
                                                                    <td></td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }else{ $z++;
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <input type="hidden" id="emp_previous_employment_details_id1" name="emp_previous_employment_details_id[]" value="" />
                                                                        <div class="input-group">
                                                                            <input type="month" id="previous_period_from1" name="previous_period_from[]" class="form-control previous_period_from" value="" onchange="employmentFromPeriodFun(this);" style="width:160px;" />
                                                                            <span class="input-group-addon">to</span>
                                                                            <input type="month" id="previous_period_to1" name="previous_period_to[]" class="form-control previous_period_to" value="" onchange="employmentToPeriodFun(this);" style="width:150px;" />
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="text" id="previous_experience1" name="previous_experience[]" class="form-control previous_experience" value="" maxlength="5" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_organization_name_address1" name="previous_organization_name_address[]" class="form-control previous_organization_name_address" value="" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_designation1" name="previous_designation[]" class="form-control previous_designation" value="" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_monthly_emoluments1" name="previous_monthly_emoluments[]" class="form-control previous_monthly_emoluments" value="" maxlength="5" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td><input type="text" id="previous_brief_job_description1" name="previous_brief_job_description[]" class="form-control previous_brief_job_description" value="" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" /></td>
                                                                    <td>
                                                                        <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="employeementTableAdditem(1);"></i></td>
                                                                    <td></td>
                                                                </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                            </tbody>
                                                        </table>
                                                        <input type="hidden" name="employeementTableLen" id="employeementTableLen" value="<?=$z;?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Experience Overall - Relevant</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control m-t-xxs" id="experience_overall_relevant" name="experience_overall_relevant" rows="10" onkeypress="return isAlphaNumCommaSlash(event);"><?=(isset($data['experience_overall_relevant']))?$data['experience_overall_relevant']:"";?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>

                                  <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Additional Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Language Known </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="languages_know" name="languages_know" placeholder="Language Known" type="text" value="<?=(isset($data['languages_know']))?$data['languages_know']:"";?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >What are you leisure activities?</label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="leisure_activity" name="leisure_activity" placeholder="What are you leisure activities?" type="text" value="<?=(isset($data['leisure_activity']))?$data['leisure_activity']:"";?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" />

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Any of the relation working in this company now or earlier </label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="relations_working_in_this_company" name="relations_working_in_this_company" placeholder="Any of the relation working in this company now or earlier " type="text" value="<?=(isset($data['relations_working_in_this_company']))?$data['relations_working_in_this_company']:"";?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >State of health</label>
                                                        <div class="col-md-5">
                                                            <input class="form-control m-t-xxs" id="your_state_of_health" name="your_state_of_health" placeholder="State of health" type="text" value="<?=(isset($data['your_state_of_health']))?$data['your_state_of_health']:"";?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" />

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">References</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-condensed" >
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>S.No  </th>
                                                                    <th>Name/Designation/Organisation</th>
                                                                    <th>Phone No./Emailid </th>
                                                                    <th>Address of communication</th>
                                                                    <th>S/P/SP</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_name_designation_organisation1" name="reference_name_designation_organisation1" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_name_designation_organisation1']:"";?>" /></td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_phone_no_email_id1" name="reference_phone_no_email_id1" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_phone_no_email_id1']:"";?>" /></td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_address_of_communication1" name="reference_address_of_communication1" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_address_of_communication1']:"";?>" /></td>
                                                                    <td>
                                                                        <select id="reference_social_professinal1" name="reference_social_professinal1" class="form-control">
                                                                            <option value="SOCIALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal1']=="SOCIALLY")?"selected":"":"";?>>SOCIALLY</option>
                                                                            <option value="PROFESSIONALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal1']=="PROFESSIONALLY")?"selected":"":"";?>>PROFESSIONALLY</option>
                                                                            <option value="SOCIALLY/PROFESSIONALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal1']=="SOCIALLY/PROFESSIONALLY")?"selected":"":"";?>>SOCIALLY/PROFESSIONALLY</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_name_designation_organisation2" name="reference_name_designation_organisation2" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_name_designation_organisation2']:"";?>" /></td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_phone_no_email_id2" name="reference_phone_no_email_id2" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_phone_no_email_id2']:"";?>" /></td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_address_of_communication2" name="reference_address_of_communication2" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_address_of_communication2']:"";?>" /></td>
                                                                    <td>
                                                                        <select id="reference_social_professinal2" name="reference_social_professinal2" class="form-control">
                                                                            <option value="SOCIALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal2']=="SOCIALLY")?"selected":"":"";?>>SOCIALLY</option>
                                                                            <option value="PROFESSIONALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal2']=="PROFESSIONALLY")?"selected":"":"";?>>PROFESSIONALLY</option>
                                                                            <option value="SOCIALLY/PROFESSIONALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal2']=="SOCIALLY/PROFESSIONALLY")?"selected":"":"";?>>SOCIALLY/PROFESSIONALLY</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_name_designation_organisation3" name="reference_name_designation_organisation3" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_name_designation_organisation3']:"";?>" /></td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_phone_no_email_id3" name="reference_phone_no_email_id3" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_phone_no_email_id3']:"";?>" /></td>
                                                                    <td><input onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);" type="text" id="reference_address_of_communication3" name="reference_address_of_communication3" class="form-control" value="<?=(isset($data['emp_references']))?$data['emp_references']['reference_address_of_communication3']:"";?>" /></td>
                                                                    <td>
                                                                        <select id="reference_social_professinal3" name="reference_social_professinal3" class="form-control">
                                                                            <option value="SOCIALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal3']=="SOCIALLY")?"selected":"":"";?>>SOCIALLY</option>
                                                                            <option value="PROFESSIONALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal3']=="PROFESSIONALLY")?"selected":"":"";?>>PROFESSIONALLY</option>
                                                                            <option value="SOCIALLY/PROFESSIONALLY" <?=(isset($data['emp_references']))?($data['emp_references']['reference_social_professinal3']=="SOCIALLY/PROFESSIONALLY")?"selected":"":"";?>>SOCIALLY/PROFESSIONALLY</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <button type="button" id="btn-step-four-prev" class="btn btn-mint">Previous</button>
                                    <button type="button" id="btn-step-four-next" class="next btn btn-mint pull-right">Save & Next</button>
                                </form>
                            </div>
                            <!--Fifth tab-->
                            <div id="tabPaneFive" class="hide">
                                <form method="post" id="form_step_Five" name="form_step_Five" class="form-horizontal mar-top">
                                    <div class="form-group">
                                        <label class="col-md-12 text-danger" id="stepFiveErrorPanel"></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Project Assign <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="project_mstr_id" name="project_mstr_id">
                                                <option value="">== SELECT ==</option>
                                                <?php
                                                if(isset($data['project_mstr_list'])){
                                                    foreach($data['project_mstr_list'] as $values){
                                                        $project_name = $values['project_name'];
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['project_mstr_id']))?($data['project_mstr_id']==$values['_id'])?"selected":"":"";?>><?=$project_name;?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label class="col-md-2">Job Location <span class="text-danger">*</span></label>
                                       
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="company_location_id" name="company_location_id">
                                                <option value="">== SELECT ==</option>
                                                <?php
                                                if(isset($data['company_location_list'])){
                                                    // echo '<pre>';print_r($data['company_location_id']);
                                                    foreach($data['company_location_list'] as $values){
                                                        $location = "District: ".$values['dist'];
                                                        $add = $values['city'];
                                                ?>

                                                <optgroup label="<?=$location?>">
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['company_location_id']))?($data['company_location_id']==$values['_id'])?"selected":"":"";?>><?=$add;?></option>
                                                </optgroup>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Department <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="department_mstr_id" name="department_mstr_id" onchange="designationChangefun(this);">
                                                <option value="">== SELECT ==</option>
                                                <?php
                                                if(isset($data['department_mstr_list'])){
                                                    foreach($data['department_mstr_list'] as $values){
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['department_mstr_id']))?($data['department_mstr_id']==$values['_id'])?"selected":"":"";?>><?=$values['dept_name'];?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <label class="col-md-2">Designation <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="designation_mstr_id" name="designation_mstr_id">
                                                <option value="">== SELECT ==</option>
                                                <?php
                                                if(isset($data['designation_mstr_list'])){
                                                    foreach($data['designation_mstr_list'] as $values){
                                                ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['designation_mstr_id']))?($data['designation_mstr_id']==$values['_id'])?"selected":"":"";?>><?=$values['designation_name'];?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Project Concept Type <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input type="text" id="project_concept_type" name="project_concept_type" class="form-control" value="<?=(isset($data['project_concept_type']))?$data['project_concept_type']:'AREA';?>" readonly />
                                        </div>
                                        <div id="area_ward_mstr_hide_show" style="display: none;">
                                            <label class="col-md-2">Ward Number<span class="text-danger"> *</span></label>
                                            <div class="col-md-3">
                                                <select id="ward_mstr_id" name="ward_mstr_id[]" class="form-control m-t-xxs">
                                                    <option value="">== SELECT ==</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Employment Type <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="employment_type_mstr_id" name="employment_type_mstr_id" onchange="changeEmploymentTypeFunc(this);">
                                                <option value="">== SELECT ==</option>
                                        <?php
                                        if(isset($data['employment_type_mstr_list'])){
                                            foreach($data['employment_type_mstr_list'] as $values){
                                        ?>
                                                <option value="<?=$values['_id'];?>" <?=(isset($data['employment_type_mstr_id']))?($data['employment_type_mstr_id']==$values['_id'])?"selected":"":"";?>><?=$values['employment_type'];?></option>
                                        <?php
                                            }
                                        }
                                        ?>

                                            </select>
                                        </div>
                                        <div id="work_type_hide_show" style="display: none;">
                                            <label class="col-md-2">Work Type <span class="text-danger">*</span></label>
                                            <div class="col-md-3">
                                                <select class="form-control m-t-xxs" id="work_type" name="work_type" onchange="keyDownNormal(this);">
                                                    <option value="">== SELECT ==</option>
                                                    <option value="Per Hour" <?=(isset($data['work_type']))?($data['work_type']=="Per Hour")?"selected":"":"";?>>Per Hour</option>
                                                    <option value="Per Day" <?=(isset($data['work_type']))?($data['work_type']=="Per Day")?"selected":"":"";?>>Per Day</option>
                                                    <option value="Per Month" <?=(isset($data['work_type']))?($data['work_type']=="Per Month")?"selected":"":"";?>>Per Month</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2">Monthly Salary <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <input type="text" id="monthly_salary" name="monthly_salary" class="form-control m-t-xxs"  placeholder="Monthly Salary"  value="<?=(isset($data['monthly_salary']))?$data['monthly_salary']:"";?>" maxlength="6" onkeypress="return isNum(event);">
                                            <span id="monthly_salary_err_msg" class="text-danger"></span>
                                        </div>

                                        <!-- <label class="col-md-3">Reporting Head <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <select class="form-control m-t-xxs" id="reporting_person_emp_details_id" name="reporting_person_emp_details_id" onchange="keyDownNormal(this);">
                                                <option value="">== SELECT ==</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" >Joining/Joined Date <span class="text-danger">*</span></label>
                                        <div class="col-md-3">
                                            <div class="input-group date">
                                                <input type="text" id="joining_date" name="joining_date" class="form-control" onchange="keyDownNormal(this);" value="<?=(isset($data['joining_date']))?$data['joining_date']:"";?>" readonly>
                                                <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                            </div>
                                        </div>
                                        <label class="col-md-2">Biometric Employee Code </label>
                                        <div class="col-md-3">
                                            <input class="form-control m-t-xxs" id="biometric_employee_code" name="biometric_employee_code" placeholder="Biometric Employee Code" value="<?=(isset($data['biometric_employee_code']))?$data['biometric_employee_code']:"";?>" type="text" maxlength="8" onkeypress="return isNum(event);" onkeyup="keyDownNormal(this);">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Bank Details</h3>
                                                </div>
                                                <div class="panel-body">
                                                    All Field is Required.<span class="text-danger">*</span>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-condensed" >
                                                            <thead>
                                                                <tr class="success">
                                                                    <th>Bank Name</th>
                                                                    <th>Branch Name</th>
                                                                    <th>IFSC Code</th>
                                                                    <th>A/C No.</th>
                                                                    <th>Confirm A/C No.</th>
                                                                 </tr>
                                                            </thead>
                                                            <tbody id="rowAddBankDetails">
                                                                <tr>
                                                                    <td>
                                                                        <input type="text" id="bank_name" name="bank_name" class="form-control bank_name" value="<?=(isset($data['emp_bank_details']))?$data['emp_bank_details']['bank_name']:"";?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="branch_name" name="branch_name" class="form-control branch_name" value="<?=(isset($data['emp_bank_details']))?$data['emp_bank_details']['branch_name']:"";?>" onkeypress="change_case(this);" maxlength="150" onchange="change_case(this)" onkeydown="keyDownNormal(this);">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="ifsc_code" name="ifsc_code" class="form-control ifsc_code" value="<?=(isset($data['emp_bank_details']))?$data['emp_bank_details']['ifsc_code']:"";?>" onkeypress="return isAlphaNum(event);" onkeydown="keyDownNormal(this);">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" id="account_no" name="account_no" class="form-control account_no" value="<?=(isset($data['emp_bank_details']))?$data['emp_bank_details']['account_no']:"";?>" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);">
                                                                    </td>
                                                                    <td>
                                                                        <input type="password" id="confirm_account_no" name="confirm_account_no" class="form-control confirm_account_no" value="<?=(isset($data['emp_bank_details']))?$data['emp_bank_details']['confirm_account_no']:"";?>" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" id="btn-step-five-prev" class="btn btn-mint">Previous</button>
                                    <button type="button" id="btn-step-five-next" class="next btn btn-mint pull-right">Save & Next</button>
                                </form>
                            </div>

                             <!--Six tab-->
                            <div id="tabPaneSix" class="hide">
                                <form method="post" id="form_step_six" name="form_step_six" class="form-horizontal mar-top">
                                    <div class="form-group">
                                        <label class="col-md-12 text-danger" id="stepSixErrorPanel"></label>
                                    </div>
                                     <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Add/Update Document</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-5">
                                                            <button type="button" class="btn btn-md btn-success btn-block" id="btn_document_list_hide_show" >New Upload <i class="fa fa-upload"></i></button>
                                                        </div>
                                                    </div>
                                                    <div id="document_upload_menu_hide_show" style="display: none;">
                                                       <div class="form-group">
                                                            <label class="col-md-2" >Document Type <span class="text-danger">*</span></label>
                                                            <div class="col-md-3">
                                                                <select id="doc_type_mstr_id" name="doc_type_mstr_id" class="form-control" onchange="doc_type_mstr_change_fun(this);">
                                                                    <option value="">==SELECT==</option>
                                                                    <?php
                                                                    if(isset($data['doc_type_mstr_list'])){
                                                                        foreach($data['doc_type_mstr_list'] as $values){
                                                                    ?>
                                                                    <option value="<?=$values['_id'];?>"><?=$values['doc_name'];?></option>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <!-- <option value="0">Other</option> -->
                                                                </select>
                                                            </div>
                                                           <div id="other_doc_name_hide_show" style="display:none;">
                                                               <label class="col-md-3" >Document Name <span class="text-danger">*</span></label>
                                                               <div class="col-md-3">
                                                                   <input type="text" class="form-control" id="other_doc_name" name="other_doc_name" onkeyup="keyDownNormal(this);" />
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="form-group resume_hide">
                                                            <label class="col-md-2" >Document No. <span class="text-danger">*</span></label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="doc_no" name="doc_no" placeholder="Document No." type="text" value="" onkeyup="keyDownNormal(this);" >
                                                            </div>
                                                            <label class="col-md-3" >Place Of Issue </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="place_of_issue" name="place_of_issue" placeholder="Place Of Issue" type="text" value="" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group resume_hide">
                                                            <label class="col-md-2" >Date Of Issue</label>
                                                            <div class="col-md-3">
                                                                <div class="input-group date">
                                                                    <input type="text" id="date_of_issue" name="date_of_issue" class="form-control" value="" readonly>
                                                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                                </div>
                                                            </div>
                                                            <label class="col-md-3" >Valid upto</label>
                                                            <div class="col-md-3">
                                                                <div class="input-group date">
                                                                    <input type="text" id="valid_upto" name="valid_upto" class="form-control" value="" readonly>
                                                                    <span class="input-group-addon"><i class="demo-pli-calendar-4"></i></span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2">Upload Document
                                                                <span class="text-danger">*</span>
                                                                <br>
                                                                <span class="text-danger">Preferred png, jpeg, jpg, pdf : Maximum size of 2MB</span>
                                                            </label>
                                                            <div class="col-md-3">
                                                                <input type="file" class="form-control" id="emp_doc_path" name="emp_doc_path" />
                                                            </div>
                                                            <label class="col-md-3"></label>
                                                            <div class="col-md-3">
                                                                <button type="button" class="btn btn-md btn-success btn-block" id="btn_upload_doc_step_six" name="btn_upload_doc_step_six">Upload</button>
                                                            </div>
                                                        </div>
                                                        <hr />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Document List</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <div class="col-md-12" id="document_list_id_hide_show">
                                                            <div class="table-responsive">
                                                                <table id="tbl_condidate_attachment_list" class="table table-hover table-bordered table-condensed" >
                                                                    <thead>
                                                                        <tr class="success">
                                                                            <th>Document Type</th>
                                                                            <th>Document No.</th>
                                                                            <th>Place of Issue</th>
                                                                            <th>Date of Issue</th>
                                                                            <th>Valid Upto</th>
                                                                            <th>Documents</th>
                                                                            <th>Action</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="tbody_condidate_attachment_list">
                                                                <?php
                                                                if(isset($data['emp_document_details'])){
                                                                    foreach ($data['emp_document_details'] as $values) {
                                                                        $emp_document_details_id = $values['emp_document_details_id'];
                                                                        $doc_type = $values['doc_name'];
                                                                        if($values['doc_type_mstr_id']==0){
                                                                            $doc_type = $values['other_doc_name'];
                                                                        }
                                                                        $doc_no  = $values['doc_no'];
                                                                        if($doc_no==""){
                                                                            $doc_no = "N/A";
                                                                        }
                                                                        $date_of_issue  = $values['date_of_issue'];
                                                                        if($date_of_issue==""){
                                                                            $date_of_issue = "N/A";
                                                                        }
                                                                        $place_of_issue  = $values['place_of_issue'];
                                                                        if($place_of_issue==""){
                                                                            $place_of_issue = "N/A";
                                                                        }
                                                                        $valid_upto  = $values['valid_upto'];
                                                                        if($valid_upto==""){
                                                                            $valid_upto = "N/A";
                                                                        }
                                                                        $doc_path = URLROOT."/uploads/".$values['doc_path'];
                                                                ?>
                                                                        <tr>
                                                                            <td><?=$doc_type;?></td>
                                                                            <td><?=$doc_no;?></td>
                                                                            <td><?=$place_of_issue;?></td>
                                                                            <td><?=$date_of_issue;?></td>
                                                                            <td><?=$valid_upto;?></td>
                                                                            <td>
                                                                                <?php

                                                                                ?>
                                                                                <!-- <a href="<?=$doc_path;?>" target="_blank" class="btn btn-dark btn-sm">Document View</a> -->
                                                                                <a href="<?= $doc_path ?>" class="imagePopUp">
                                                                                  <img src="<?=$doc_path;?>" class="img-md">
                                                                                </a>
                                                                            </td>
                                                                            <td><button type="button" class="btn btn-success btn-icon" onclick="empDocDeleteFun('<?=$emp_document_details_id;?>')"><i class="demo-psi-recycling icon-lg"></i></button></td>
                                                                        </tr>
                                                                <?php 
                                                                    }
                                                                }else{
                                                                ?>
                                                                        <tr>
                                                                            <td colspan="7"><span style="color: red;">No any document uploaded !!!</span></td>
                                                                        </tr>
                                                                <?php
                                                                }
                                                                ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                    <button type="button" id="btn-step-six-prev" class="btn btn-mint">Previous</button>
                                    <button type="button" id="btn-step-final-next" class="finish btn btn-mint pull-right"><?=(isset($data['user_mstr_id']))?($data['user_mstr_id']==0)?"Create User ID & ":"":"Create User ID & ";?>Finish</button>
                                </form>
                            </div>
                        </div><!--End tab-content-->
                    </div><!-- End panel-body-->
                </div><!--End Panel-->
            </div>
        </div>
    </div><!--End Page content-->
</div><!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


  <div class="modal-dialog" role="document">
  <!-- <form class="form-horizontal" style="background-color:white" method="post" action="<?=URLROOT;?>/Masters/sub_qualification_add_update/runtime/radd/<?=(isset($data['_id']))?$data['_id']:'';?>/3/<?= isset($data['job_post_details']['job_post_details_id'])?$data['job_post_details']['job_post_details_id']:$data['job_post_details']['job_post_details_id']    ?>"> -->
  <form id="stfc" class="form-horizontal" style="background-color:white" onsubmit="stream_add_ajax(event)">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="qualification">Qualification</label>
                                            <div class="col-sm-4">
                                                <!-- <select id="course_mstr_id_add_stream" name="course_mstr_id" class="form-control">
                                                    <option value="-">--select--</option>
                                                    <?php
                                                                            if(isset($data['course_mstr_list'])){
                                                                                foreach($data['course_mstr_list'] as $values){
                                                                        ?>
                                                                            <option value="<?=$values['_id'];?>"><?=$values['course_name'];?></option>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                </select> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="stream_name">Stream</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="50" placeholder="Enter Stream" id="stream_name_add_stream" name="stream_name" class="form-control" value="<?=(isset($data['stream_name']))?$data['stream_name']:"";?>"  >
                                            </div>
                                        </div>
                                        <div class="panel-footer text-center">
                                            <button class="btn btn-success" id="btnsubqualification" name="btnsubqualification" type="submit">Add Stream</button>
                                            <a onclick="modal_hide()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
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
  
  </div>
</div>


<!-- add city modal -->
<div class="modal fade" id="add_city_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form id="add_to_city_form" class="form-horizontal" style="background-color:white" onsubmit="add_to_city_function(event)">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="qualification">State</label>
                                            <div class="col-sm-4">
                                            <select id="add_to_state" name="add_to_state" class="form-control state_dist_city_id" onchange="get_dist_from_state(this)">
                                                        <option value="">== SELECT ==</option>
                                                       
                                                        <?php
                                                        if(isset($data['state_list'])){
                                                            foreach ($data['state_list'] as $cityValue) {
                                                        ?>
                                                        <option value="<?=$cityValue['state']?>" ><?=$cityValue['state']?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="qualification">District</label>
                                            <div class="col-sm-4">
                                            <select id="add_to_dist" name="add_to_dist" class="form-control state_dist_city_id" >
                                                        <option value="">== SELECT ==</option>
                                                       
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" for="add_to_city">city</label>
                                            <div class="col-sm-4">
                                                <input type="text" maxlength="50" placeholder="Enter City" id="add_to_city" name="add_to_city" class="form-control" value="<?=(isset($data['stream_name']))?$data['stream_name']:"";?>"  >
                                            </div>
                                        </div>
                                        <div class="panel-footer text-center">
                                            <button class="btn btn-success"  name="btnsubqualification" type="submit">Add City</button>
                                            <a onclick="add_to_city_modal_hide()" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
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
  
  </div>
</div>

<script type="text/javascript">
function get_dist_from_state(e){
    $('#add_to_dist').html('')
    let data_st_dt = {
        state:e.value
    }
    $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_StateDistCity/get_dist_by_state",
            data: data_st_dt,
            beforeSend: function() {
                console.log('ready to send to state by dist')
            },
            success:function(data){
                dist_json_list = JSON.parse(data)
                console.log('from api')
                console.log(dist_json_list)
                dist_json_list.map((dist)=>{
                    document.getElementById('add_to_dist').innerHTML +=`<option value="${dist.dist}">${dist.dist}</option>`
                })
                
            }
         });
}

function add_to_city_function(e){
    e.preventDefault()
    add_to_state = $('#add_to_state').val()
    add_to_dist = $('#add_to_dist').val()
    add_to_city = $('#add_to_city').val()

    // console.log(add_to_state," ",add_to_dist," ",add_to_city)
    // return

    data_json = {
        state: add_to_state,
        dist: add_to_dist,
        city: add_to_city
    }
    $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_StateDistCity/add_to_city",
            data: data_json,
            beforeSend: function() {
                console.log('ready to send to add')
            },
            success:function(data){
                data_list = JSON.parse(data)
                console.log('from api to add city')
                console.log(data_list.msg)
                if(data_list.msg=='duplicate value'){
                    alert('this city already exists')
                    return
                }
                else{
                    let gl_step_id = `<?= isset($data['step'])?$data['step']:''    ?>`
                
               
                 //id if exits
                let can_id = `<?= isset($data['_id'])?$data['_id']:null;  ?>`
                 window.location.href=`<?php echo URLROOT   ?>/Employee/empAddUpdate/${gl_step_id}/${can_id}`
                }
               
               
            }
         });
}

function add_to_city_modal_show(){
    $('#add_city_modal').modal('show')
}
function add_to_city_modal_hide(){
    $('#add_city_modal').modal('hide')
}
function get_dist_state(e,city_type){
    console.log(e.value)
    if(e.value=='add city'){
        console.log(e.value)
        add_to_city_modal_show()
        return
    }
    // return
    data_json = {
        city:e.value
    }
    $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Candidate/get_dist_state",
            // dataType: "json",
            data: data_json,
            beforeSend: function() {
                console.log('ready to send')
            },
            success:function(data){
                // console.log(JSON.parse(data))
                data_list = JSON.parse(data)
                if(city_type==1){
                    $('#present_state').val(data_list[0]['state'])
                    $('#present_district').val(data_list[0]['dist'])

                    $('#present_address').html($('#present_city').val()+" "+$('#present_district').val()+" "+$('#present_state').val())
                }
                else{
                    $('#permanent_state').val(data_list[0]['state'])
                    $('#permanent_district').val(data_list[0]['dist'])
                    $('#permanent_address').html($('#permanent_city').val()+" "+$('#permanent_district').val()+" "+$('#permanent_state').val())
                }
              
               
               
               
                
            }
         });
}

var gl_row_num;
var gl_course_id;
var gl_stream_added;
var gl_stream_name;
function stream_add_ajax(e){
    e.preventDefault()

    if($('#stream_name_add_stream').val()=='')
    {
        alert('enter stream name')
        return
    }
    // console.log(gl_row_num)
    // return

    gl_stream_name = $('#stream_name_add_stream').val()
    let jo = {
        course_mstr_id:$('#course_mstr_id'+gl_row_num).val(),
        stream_name:$('#stream_name_add_stream').val()
    }
    $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Masters/sub_qualification_add_update/runtime/radd/",
            // dataType: "json",
            data: jo,
            beforeSend: function() {
                console.log('ready to send')
            },
            success:function(data){
                console.log(data)
               if(data=='success'){
                $('#stream_name_add_stream').val('')
                ajax_stream_load()
               }
               else if(data=='duplicate'){
                modal_hide()
                alert('this stream already added')
                $('#stream_name_add_stream').val('')
                
                return
               }
               else{
                modal_hide()
                alert('fail to add stream')
                $('#stream_name_add_stream').val('')
                
                return
               }
               
               
                
            }
         });
}
function sub_stream_add_ajax(){
   
    // console.log('after   ',gl_course_id)
    // console.log('after ',gl_stream_added)
    // console.log('after ',gl_stream_name)
    // return
    let jo2 = {
        course_mstr_id:gl_course_id,
        sub_course_mstr_id:gl_stream_added,
        sub_stream_name:gl_stream_name
    }
    $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Sub_Stream/sub_qualification_add_update/runtime",
            // dataType: "json",
            data: jo2,
            beforeSend: function() {
                console.log('ready to send substream.............')
            },
            success:function(data){
                console.log(data)
                console.log('go the data for substream')
               if(data=='success'){
                ajax_sub_stream_load()
                return
               }
               
               else{
                   modal_hide()
                alert('fail to sub stream stream')
                return
               }
                
            }
         });
}
function modal_show(){
    $('#deactivate_text').val('')
    $('#exampleModal').modal('show')
}
function modal_hide(){
    $('#exampleModal').modal('hide')
}

function ajax_stream_load(){
    let ID=gl_row_num
    let val = $('#course_mstr_id'+ID).val();

    var flag = true;
    if(val!="" && val!="0"){
        $(".course_mstr_id").each(function () {
            var eachID = $(this).attr('id').split('course_mstr_id')[1];
            var eachVal = $("#course_mstr_id"+eachID).val();
           
        });
    }
    $("#sub_course_mstr_id"+ID).html("<option value=''>==SELECT==</option>");
    $("#sub_stream_mstr_id"+ID).html("<option value=''>==SELECT==</option>");
    if(val!="" && flag==true){
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Course/getSubCourseByCourseMstrId",
            dataType: "json",
            data: {"course_mstr_id":val},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    //selected addedd value
                     $("#sub_course_mstr_id"+ID).html(data.data);
                     $("#sub_course_mstr_id"+ID+" option:last").attr("selected", "selected");

                     let stream_add_selected = $("#sub_course_mstr_id"+ID+" option:last").val()
                     gl_stream_added = stream_add_selected
                     gl_course_id = $('#course_mstr_id'+ID).val()
                    //  gl_stream_name = document.getElementById('')
                     sub_stream_add_ajax()
                }
            }
        });
    }
}

function ajax_sub_stream_load(){
    console.log('sub stream load')
    // gl_row_num = row_num
   
    var ID = gl_row_num
    var val = $('#sub_course_mstr_id'+ID).val();
    var flag = true;
    if(val!="" && val!="0"){
        $(".sub_course_mstr_id").each(function () {
            var eachID = $(this).attr('id').split('sub_course_mstr_id')[1];
            var eachVal = $("#sub_course_mstr_id"+eachID).val();
            if(ID!=eachID && eachVal!=""){
                if(val==eachVal){
                    flag = false;
                    $("#sub_course_mstr_id"+ID).val("");
                    alert("Not repeated !!! \n Stream");
                }
            }
        });
    }
    $("#sub_stream_mstr_id"+ID).html("<option value=''>==SELECT==</option>");
    if(val!="" && flag==true){
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Course/getSubStreamBySubCourseMstrId",
            dataType: "json",
            data: {"sub_course_mstr_id":val},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                     $("#sub_stream_mstr_id"+ID).html(data.data);
                     $("#sub_stream_mstr_id"+ID+" option:last").attr("selected", "selected");

                     modal_hide()

                    //  let stream_add_selected = $("#sub_course_mstr_id"+ID+" option:last").val()
                    //  gl_stream_added = stream_add_selected
                    //  gl_course_id = $('#course_mstr_id'+ID).val()
                }
            }
        });
    }
}

function show_full_data(e){
    if(e.value==''){
        $('#data_tooltip').html('&nbsp;')
        return
    }
    $('#data_tooltip').html(e.value)
}
function remove_data(){
    $('#data_tooltip').html('&nbsp;')
}


function appering_case_check(e,ID){
    let appearing_value = e.value
    if(appearing_value=='APPEARING'){
        $('#passing_year'+ID).val('------')
    }
    else{
        if($('#passing_year'+ID).val() =='------'){
            $('#passing_year'+ID).val('')
        }
        
    }
}
function step_go_tab(step_id){
   
    
    can_id = `<?= isset($data['_id'])?$data['_id']:null;  ?>`
    
   if(can_id != null && can_id !=''){
    window.location.href=`<?php echo URLROOT   ?>/Employee/empAddUpdate/${step_id}/${can_id}`
   }
    
    
}


async function change_case(e,max_limit){
    
    let input_value = await e.value;
    let charCount = input_value.length;
    let up = input_value.toUpperCase();
    e.value = up
    console.log(up)
}

$("#photo_path").change(function() {
    var input = this;
    var ext = $(this).val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
        $("#photo_path").val("");
        $('#photo_path_preview').attr('src', "<?=URLROOT;?>/common/assets/img/avatar/default_avatar.png");
        alert('invalid image type');
    }if (input.files[0].size > 1048576) { // 1MD = 1048576
        $("#photo_path").val("");
        $('#photo_path_preview').attr('src', "<?=URLROOT;?>/common/assets/img/avatar/default_avatar.png");
        alert("Try to upload file less than 1MB!"); 
    }else{
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#photo_path_preview').attr('src', e.target.result);
              $("#is_image").val("is_image");

            }
            reader.readAsDataURL(input.files[0]);
        }
    }
});
$("#photo_path").click(function() {
    $("#photo_path").val("");
    $('#photo_path_preview').attr('src', "<?=URLROOT;?>/common/assets/img/avatar/default_avatar.png");
    $("#is_image").val("");
});
$("#image_path_remove").click(function(){
	$("#photo_path").val("");
    $('#photo_path_preview').attr('src', "<?=URLROOT;?>/common/assets/img/avatar/default_avatar.png");
    $("#is_image").val("");
});
$("#marital_status").change(function(){
    if($("#marital_status").val()=="Single")
        $("#spouse_name_hide_show").addClass("hide").removeClass("show");
    else
        $("#spouse_name_hide_show").addClass("show").removeClass("hide");
});
$("#rowAddAcademicDetails").on('click', '.remove_buttonn_item', function(e) {
    $(this).closest("tr").remove();
});
function academicTableAdditem(j){
    var z = parseInt($('#academicTableLen').val())+j;
    var newDivTanent = $('<tr><td><input type="hidden" id="emp_qualification_details_id'+z+'" name="emp_qualification_details_id[]" value="" /><select id="course_mstr_id'+z+'" name="course_mstr_id[]" class="form-control course_mstr_id" onchange="course_mstr_change_func(this);"><option value="">== SELECT ==</option><?php if(isset($data['course_mstr_list'])){foreach($data['course_mstr_list'] as $values){?><option value="<?=$values['_id'];?>"><?=$values['course_name'];?></option><?php }}?></select><div id="other_course_hide_show'+z+'" style="margin-top:5px; display:none;"><input type="text" id="other_course'+z+'" name="other_course[]" class="form-control other_course" placeholder="Other Course" value="" onkeypress="return isAlpha(event);" onkeydown="keyDownNormal(this);" /></div></td><td><select id="sub_course_mstr_id'+z+'" name="sub_course_mstr_id[]" class="form-control sub_course_mstr_id" onchange="sub_course_mstr_change_func(this,'+z+');"><option value="">==SELECT==</option><option value="add" class="text-success">Add Stream</option></select></td><td><select id="sub_stream_mstr_id'+z+'" name="sub_stream_mstr_id[]" class="form-control sub_stream_mstr_id" onchange="keyDownNormal(this);"><option value="">==SELECT==</option></select></td><td><select id="medium_type'+z+'" name="medium_type[]" class="form-control medium_type" onchange="keyDownNormal(this);"><option value="">== SELECT ==</option><option value="ENGLISH">ENGLISH</option><option value="HINDI">HINDI</option></select></td><td><input type="text" id="passing_year'+z+'" name="passing_year[]" class="form-control passing_year" value="" maxlength="4" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td><td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" type="text" id="school_college_institute_name'+z+'" name="school_college_institute_name[]" class="form-control school_college_institute_name" value=""  onkeydown="keyDownNormal(this);" /></td><td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" type="text" id="board_university_name'+z+'" name="board_university_name[]" class="form-control board_university_name" value=""  onkeydown="keyDownNormal(this);" /></td><td><input onmouseover="show_full_data(this)" onmouseout="remove_data()" list="cars" onchange="appering_case_check(this,'+z+')" type="text" id="marks_percent'+z+'" name="marks_percent[]" class="form-control marks_percent" value="" onkeydown="keyDownNormal(this);" onkeypress="return isNumComma(event);" maxlength="10" /><datalist id="cars"><option>FIRST</option><option>SECOND</option><option>THIRD</option><option>APPEARING</option></datalist></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="academicTableAdditem(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
    $('#rowAddAcademicDetails').append(newDivTanent);
    $('#academicTableLen').val(z);
}
$("#rowAddPreviousEmploymentDetails").on('click', '.remove_buttonn_item', function(e) {
    $(this).closest("tr").remove();
});
function employeementTableAdditem(j){
    var z = parseInt($('#employeementTableLen').val())+j;
    var newDivTanent = $('<tr><td><input type="hidden" id="emp_previous_employment_details_id'+z+'" name="emp_previous_employment_details_id[]" value="" /><div class="input-group"><input type="month" id="previous_period_from'+z+'" name="previous_period_from[]" class="form-control previous_period_from" value="" onchange="employmentFromPeriodFun(this);" style="width:150px;" /><span class="input-group-addon">to</span><input type="month" id="previous_period_to'+z+'" name="previous_period_to[]" class="form-control previous_period_to" value="" onchange="employmentToPeriodFun(this);" style="width:150px;" /></div></td><td><input type="text" id="previous_experience'+z+'" name="previous_experience[]" class="form-control previous_experience" value="" onkeydown="keyDownNormal(this);" /></td><td><input type="text" id="previous_organization_name_address'+z+'" name="previous_organization_name_address[]" class="form-control previous_organization_name_address" value="" onkeypress="return isAlpha(event);" onkeydown="keyDownNormal(this);" /></td><td><input type="text" id="previous_designation'+z+'" name="previous_designation[]" class="form-control previous_designation" value="" onkeypress="return isAlpha(event);" onkeydown="keyDownNormal(this);" /></td><td><input type="text" id="previous_monthly_emoluments'+z+'" name="previous_monthly_emoluments[]" class="form-control previous_monthly_emoluments" value="" maxlength="4" onkeypress="return isNum(event);" onkeydown="keyDownNormal(this);" /></td><td><input type="text" id="previous_brief_job_description'+z+'" name="previous_brief_job_description[]" class="form-control previous_brief_job_description" value="" onkeypress="return isAlpha(event);" onkeydown="keyDownNormal(this);" /></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="employeementTableAdditem(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
    $('#rowAddPreviousEmploymentDetails').append(newDivTanent);
    $('#employeementTableLen').val(z);
}
$("#btn_document_list_hide_show").click(function(){
    $("#document_upload_menu_hide_show").show();
});
$('#sameAPresentAddCheckBox').click(function() {
    // if($(this).is(':checked')){
    //     $("#permanent_address").val($("#present_address").val()); $("#permanent_address").css('border-color','');
    //     $("#permanent_city").val($("#present_city").val()); $("#permanent_city").css('border-color','');
    //     $("#permanent_district").val($("#present_district").val()); $("#permanent_district").css('border-color','');
    //     $("#permanent_state").val($("#present_state").val()); $("#permanent_state").css('border-color','');
    //     $("#permanent_pin_code").val($("#present_pin_code").val()); $("#permanent_pin_code").css('border-color','');
    // }
    if($(this).is(':checked')){
        $("#permanent_address").val($("#present_address").val()); 
        $("#permanent_address").css('border-color','');
        $("#permanent_city").val($("#present_city").val()); 
        $("#permanent_city").css('border-color','');
        $("#permanent_district").val($("#present_district").val());
         $("#permanent_district").css('border-color','');
        $("#permanent_state").val($("#present_state").val());
         $("#permanent_state").css('border-color','');
        $("#permanent_pin_code").val($("#present_pin_code").val()); 
        $("#permanent_pin_code").css('border-color','');

        let father_add = $("#present_address").val()+' '+$("#present_city").val()+' '+$("#present_state").val();
        let father_add_fin = father_add.substring(0, 150);
        $('#father_address').val(father_add_fin)
        $("#father_contact_no").val($("#personal_phone_no").val());
    }
    else{
        $("#permanent_address").val(""); $("#permanent_address").css('border-color','');
        $("#permanent_city").val(""); $("#permanent_city").css('border-color','');
        $("#permanent_district").val(""); $("#permanent_district").css('border-color','');
        $("#permanent_state").val(""); $("#permanent_state").css('border-color','');
        $("#permanent_pin_code").val(""); $("#permanent_pin_code").css('border-color','');
    }
});
function designationChangefun(select){
    keyDownNormal(select);
    $("#designation_mstr_id").html("<option value=''>== SELECT ==</option>");
    if(select.value!=""){
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Designation/ajaxDesignationMstrListByDeptId",
            dataType: "json",
            data: {"department_mstr_id":select.value},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    $("#designation_mstr_id").html(data.data);
                }
            }
         });
    }
    getWardDetailsByProjectType();
}
function checkDefaultStatusNotRepeat(obj){
    keyDownNormal(obj);
    var ID = obj.id.split('default_status')[1];
    var val = obj.value;
    $(".default_status").each(function () {
        var eachID = $(this).attr('id').split('default_status')[1];
        var eachVal = $("#default_status"+eachID).val();
        if(ID!=eachID && eachVal!=""){
            if(eachVal==1){
                if(val==eachVal){
                    flag = false;
                    $("#default_status"+ID).val("");
                    alert("Not repeated A/C Type !!!");
                }
            }
        }
    });
}
function stepOneFun(){
    $("#tabPaneOne").removeClass("hide");
    $("#tabPaneTwo").addClass("hide");
    $("#tabPaneThree").addClass("hide");
    $("#tabPaneFour").addClass("hide");
    $("#tabPaneFive").addClass("hide");
    $("#tabPaneSix").addClass("hide");

    $("#clickStepOne").addClass("bg-mint");
    $("#clickStepTwo").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepThree").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepFour").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepFive").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepSix").addClass("bg-gray").removeClass("bg-mint");
}
function stepTwoFun(){
    $("#tabPaneOne").addClass("hide");
    $("#tabPaneTwo").removeClass("hide");
    $("#tabPaneThree").addClass("hide");
    $("#tabPaneFour").addClass("hide");
    $("#tabPaneFive").addClass("hide");
    $("#tabPaneSix").addClass("hide");

    $("#clickStepOne").addClass("bg-mint");
    $("#clickStepTwo").addClass("bg-mint");
    $("#clickStepThree").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepFour").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepFive").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepSix").addClass("bg-gray").removeClass("bg-mint");
}
function stepThreeFun(){
    $("#tabPaneOne").addClass("hide");
    $("#tabPaneTwo").addClass("hide");
    $("#tabPaneThree").removeClass("hide");
    $("#tabPaneFour").addClass("hide");
    $("#tabPaneFive").addClass("hide");
    $("#tabPaneSix").addClass("hide");

    $("#clickStepOne").addClass("bg-mint");
    $("#clickStepTwo").addClass("bg-mint");
    $("#clickStepThree").addClass("bg-mint");
    $("#clickStepFour").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepFive").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepSix").addClass("bg-gray").removeClass("bg-mint");
}
function stepFourFun(){
    $("#tabPaneOne").addClass("hide");
    $("#tabPaneTwo").addClass("hide");
    $("#tabPaneThree").addClass("hide");
    $("#tabPaneFour").removeClass("hide");
    $("#tabPaneFive").addClass("hide");
    $("#tabPaneSix").addClass("hide");

    $("#clickStepOne").addClass("bg-mint");
    $("#clickStepTwo").addClass("bg-mint");
    $("#clickStepThree").addClass("bg-mint");
    $("#clickStepFour").addClass("bg-mint");
    $("#clickStepFive").addClass("bg-gray").removeClass("bg-mint");
    $("#clickStepSix").addClass("bg-gray").removeClass("bg-mint");
}
function stepFiveFun(){
    $("#tabPaneOne").addClass("hide");
    $("#tabPaneTwo").addClass("hide");
    $("#tabPaneThree").addClass("hide");
    $("#tabPaneFour").addClass("hide");
    $("#tabPaneFive").removeClass("hide");
    $("#tabPaneSix").addClass("hide");

    $("#clickStepOne").addClass("bg-mint");
    $("#clickStepTwo").addClass("bg-mint");
    $("#clickStepThree").addClass("bg-mint");
    $("#clickStepFour").addClass("bg-mint");
    $("#clickStepFive").addClass("bg-mint");
    $("#clickStepSix").addClass("bg-gray").removeClass("bg-mint");
}
function stepSixFun(){
    $("#tabPaneOne").addClass("hide");
    $("#tabPaneTwo").addClass("hide");
    $("#tabPaneThree").addClass("hide");
    $("#tabPaneFour").addClass("hide");
    $("#tabPaneFive").addClass("hide");
    $("#tabPaneSix").removeClass("hide");

    $("#clickStepOne").addClass("bg-mint");
    $("#clickStepTwo").addClass("bg-mint");
    $("#clickStepThree").addClass("bg-mint");
    $("#clickStepFour").addClass("bg-mint");
    $("#clickStepFive").addClass("bg-mint");
    $("#clickStepSix").addClass("bg-mint");
}
function calculateAge(birthday) {
    var now = new Date();
    var past = new Date(birthday);
    var nowYear = now.getFullYear();
    var pastYear = past.getFullYear();
    var age = nowYear - pastYear;
    return age;
};
function modelInfo(msg){
    $.niftyNoty({
        type: 'info',
        icon : 'pli-exclamation icon-2x',
        message : msg,
        container : 'floating',
        timer : 5000
    });
}
function modelDanger(msg){
    $.niftyNoty({
        type: 'danger',
        icon : 'pli-exclamation icon-2x',
        message : msg,
        container : 'floating',
        timer : 5000
    });
}

$("#btn-step-one-next").click(function(){
    if(validateStepOne()){
        console.log('inside validation')
        var photo_path = $('#photo_path')[0].files[0];
        var emp_details_id = $('#emp_details_id').val();
	    var first_name = $('#first_name').val();
        var middle_name = $('#middle_name').val();
        var last_name = $('#last_name').val();
        var blood_group = $('#blood_group').val();
        var gender = $("input[name='gender']:checked").val();
        var marital_status = $('#marital_status').val();
        var spouse_name = $('#spouse_name').val();
        var d_o_b = $('#d_o_b').val();
        var height = $('#height').val();
        var weight = $('#weight').val();
        var personal_phone_no = $('#personal_phone_no').val();
        var other_phone_no = $('#other_phone_no').val();
        var email_id = $('#email_id').val();
        var is_image = $('#is_image').val();
	    form_data = new FormData();
	    form_data.append('photo_path', photo_path);
        form_data.append('emp_details_id', emp_details_id);
	    form_data.append('first_name', first_name);
        form_data.append('middle_name', middle_name);
	    form_data.append('last_name', last_name);
        form_data.append('blood_group', blood_group);
	    form_data.append('gender', gender);
        form_data.append('marital_status', marital_status);
	    form_data.append('spouse_name', spouse_name);
        form_data.append('d_o_b', d_o_b);
	    form_data.append('height', height);
        form_data.append('weight', weight);
        form_data.append('personal_phone_no', personal_phone_no);
        form_data.append('other_phone_no', other_phone_no);
        form_data.append('email_id', email_id);
        form_data.append('is_image', is_image);
	    $.ajax({
			type:"POST",
			url: "<?=URLROOT;?>/Api_Employee/empStepOneAddUpdate",
			dataType: "json",
			data: form_data,
			contentType: false,
	        cache: false,
	        processData: false,
			beforeSend: function() {
                console.log('before send')
                $("#stepOneErrorPanel").html("");
				$("#loadingDiv").show();
                $("#btn-step-one-next").prop('disabled', true);
                $("#btn-step-one-next").html('Please Wait...');
		    },
			success:function(data){
                console.log('on response')
				$("#loadingDiv").hide();
                $("#btn-step-one-next").prop('disabled', false);
                $("#btn-step-one-next").html('Save & Next');
                if(data.response==true){
                    $("#emp_details_id").val(data.data.emp_details_id);
                    if(emp_details_id==""){
                        modelInfo("Basic Details Inserted..");
                    }else{
                        modelInfo("Basic Details Updated..");
                    }
                    stepTwoFun();
                }else{
                    if(data.data.hasOwnProperty('DataExist')){
                        modelDanger(data.data.DataExist);
                    }else if(data.data.hasOwnProperty('loginAgain')){
                        modelDanger(data.data.loginAgain);
                    }else{
                        modelDanger("required some parameters!!");
                        $.each(data.data, function(key, value){
                            $("#stepOneErrorPanel").append(value+"<br />");
                        });
                    }
                }
	        },
	    	error: function(jqXHR, textStatus, errorThrown) {
	    		$("#loadingDiv").hide();
                $("#btn-step-one-next").prop('disabled', false);
                $("#btn-step-one-next").html('Save & Next');
	    		alert(JSON.stringify(jqXHR));
		        console.log(JSON.stringify(jqXHR));
		        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		    }
	    });
    }
});
function validateStepOne(){
    var process = true;
    if($('#first_name').val()==""){
        $("#first_name").css('border-color', 'red'); process=false;
    }
    if($('#last_name').val()==""){
        $("#last_name").css('border-color', 'red'); process=false;
    }

    if($('#marital_status').val()!="Single"){
        if($('#spouse_name').val()==""){
            $("#spouse_name").css('border-color', 'red'); process=false;
        }
    }
    if($('#d_o_b').val()==""){
        $("#d_o_b").css('border-color', 'red'); process=false;
    }
    // if($('#height').val()!=""){
	// 	if($('#height').val()<91 || $('#height').val()>365){
    //     	$("#height").css('border-color', 'red'); process=false;
	// 	}
    // }
    // if($('#weight').val()!=""){
	// 	if($('#weight').val()<20 || $('#weight').val()>250){
    //     	$("#weight").css('border-color', 'red'); process=false;
	// 	}
    // }
    if($('#personal_phone_no').val()==""){
        $("#personal_phone_no").css('border-color', 'red'); process=false;
    }else{
        if($('#personal_phone_no').val().length!=14){
            $("#personal_phone_no").css('border-color', 'red'); process=false;
        }
    }
    if($('#other_phone_no').val()!=""){
        if($('#other_phone_no').val().length!=14){
            $("#other_phone_no").css('border-color', 'red'); process=false;
        }
    }
	if($('#email_id').val()==""){
        $("#email_id").css('border-color', 'red'); process=false;
    }else{
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test($('#email_id').val())){
            $("#email_id").css('border-color', 'red'); process=false;
        }
    }
    return process;
}
$("#first_name").keyup(function(){ $(this).css('border-color',''); });
$("#last_name").keyup(function(){ $(this).css('border-color',''); });
$("#blood_group").change(function(){ $(this).css('border-color',''); });
$("#spouse_name").keyup(function(){ $(this).css('border-color',''); });
$("#d_o_b").change(function(){
    $(this).css('border-color','');
    var age = calculateAge($(this).val());
    if(age>17){
        $("#age").val(age);
    }else{
        $("#height").focus();
        $(this).css('border-color', 'red');
        $(this).val("");
        alert("Invalid Date of Birth.");
    }

});
$("#height").keyup(function(){ $(this).css('border-color',''); });
$("#weight").keyup(function(){ $(this).css('border-color',''); });
$("#personal_phone_no").keyup(function(){ $(this).css('border-color',''); });
$("#personal_phone_no").keyup(function(){ $(this).css('border-color',''); });
$("#email_id").keyup(function(){ $(this).css('border-color',''); });

$("#btn-step-two-next").click(function(){
    if(validateStepTwo()){
		if($("#emp_details_id").val()!=""){
			var emp_family_backbgound_id = $("#emp_family_backbgound_id").val();
			var serialize = "&emp_details_id="+$("#emp_details_id").val();
			$.ajax({
				type:"POST",
				url: "<?=URLROOT;?>/Api_Employee/empStepTwoAddUpdate",
				dataType: "json",
				data: $("#form_step_two").serialize()+serialize,
				beforeSend: function() {
					$("#stepTwoErrorPanel").html("");
									$("#loadingDiv").show();
					$("#btn-step-two-next").prop('disabled', true);
					$("#btn-step-two-next").html('Please Wait...');
				},
				success:function(data){
					$("#loadingDiv").hide();
					$("#btn-step-two-next").prop('disabled', false);
					$("#btn-step-two-next").html('Save & Next');
					if(data.response==true){
						$("#emp_family_backbgound_id").val(data.data.emp_family_backbgound_id);
						modelInfo("Contact Details Updated..");
						stepThreeFun();
					}else{
						modelDanger("required some parameters!!");
						$.each(data.data, function(key, value){
							$("#stepTwoErrorPanel").append(value+"<br />");
						});
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#loadingDiv").hide();
					$("#btn-step-two-next").prop('disabled', false);
					$("#btn-step-two-next").html('Save & Next');
					alert(JSON.stringify(jqXHR));
					console.log(JSON.stringify(jqXHR));
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			});
		}			
        //stepThreeFun();
    }
});
function validateStepTwo(){
    var process = true;
    if($('#present_address').val()==""){
        $("#present_address").css('border-color', 'red'); process=false;
    }
    if($('#present_city').val()==""){
        $("#present_city").css('border-color', 'red'); process=false;
    }
    if($('#present_district').val()==""){
        $("#present_district").css('border-color', 'red'); process=false;
    }
    if($('#present_state').val()==""){
        $("#present_state").css('border-color', 'red'); process=false;
    }
    if($('#present_pin_code').val()==""){
        $("#present_pin_code").css('border-color', 'red'); process=false;
    }
    if($('#permanent_address').val()==""){
        $("#permanent_address").css('border-color', 'red'); process=false;
    }
    if($('#permanent_city').val()==""){
        $("#permanent_city").css('border-color', 'red'); process=false;
    }
    if($('#permanent_district').val()==""){
        $("#permanent_district").css('border-color', 'red'); process=false;
    }
    if($('#permanent_state').val()==""){
        $("#permanent_state").css('border-color', 'red'); process=false;
    }
    if($('#permanent_pin_code').val()==""){
        $("#permanent_pin_code").css('border-color', 'red'); process=false;
    }
    if($('#father_name').val()==""){
        $("#father_name").css('border-color', 'red'); process=false;
    }
    if($('#father_occupation').val()==""){
        $("#father_occupation").css('border-color', 'red'); process=false;
    }
    if($('#father_contact_no').val()==""){
        $("#father_contact_no").css('border-color', 'red'); process=false;
    }
    if($('#father_address').val()==""){
        $("#father_address").css('border-color', 'red'); process=false;
    }
    return process;
}
$("#present_address").keyup(function(){ $(this).css('border-color',''); });
$("#present_city").keyup(function(){ $(this).css('border-color',''); });
$("#present_district").keyup(function(){ $(this).css('border-color',''); });
$("#present_state").keyup(function(){ $(this).css('border-color',''); });
$("#present_pin_code").keyup(function(){ $(this).css('border-color',''); });
$("#permanent_address").keyup(function(){ $(this).css('border-color',''); });
$("#permanent_city").keyup(function(){ $(this).css('border-color',''); });
$("#permanent_district").keyup(function(){ $(this).css('border-color',''); });
$("#permanent_state").keyup(function(){ $(this).css('border-color',''); });
$("#permanent_pin_code").keyup(function(){ $(this).css('border-color',''); });
$("#father_name").keyup(function(){ $(this).css('border-color',''); });
$("#father_occupation").keyup(function(){ $(this).css('border-color',''); });
$("#father_contact_no").keyup(function(){ $(this).css('border-color',''); });
$("#father_address").keyup(function(){ $(this).css('border-color',''); });

$("#btn-step-three-next").click(function(){
    if(validateStepThree()){
		if($("#emp_details_id").val()!=""){
			var emp_family_backbgound_id = $("#emp_family_backbgound_id").val();
			var serialize = "&emp_details_id="+$("#emp_details_id").val();
			$.ajax({
					type:"POST",
					url: "<?=URLROOT;?>/Api_Employee/empStepThreeAddUpdate",
					dataType: "json",
					data: $("#form_step_three").serialize()+serialize,
					beforeSend: function() {
						$("#stepThreeErrorPanel").html("");
						$("#loadingDiv").show();
						$("#btn-step-three-next").prop('disabled', true);
						$("#btn-step-three-next").html('Please Wait...');
					},
					success:function(data){
						$("#loadingDiv").hide();
						$("#btn-step-three-next").prop('disabled', false);
						$("#btn-step-three-next").html('Save & Next');
						if(data.response==true){
							$("#emp_family_backbgound_id").val(data.data.emp_family_backbgound_id);
							modelInfo("Academic Details Updated..");
							stepFourFun();
						}else{
							modelDanger("required some parameters!!");
							$.each(data.data, function(key, value){
								$("#stepThreeErrorPanel").append(value+"<br />");
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#loadingDiv").hide();
						$("#btn-step-three-next").prop('disabled', false);
						$("#btn-step-three-next").html('Save & Next');
						alert(JSON.stringify(jqXHR));
						console.log(JSON.stringify(jqXHR));
						console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					}
			 });
		}
    }

});
function course_mstr_change_func(select){
    $("#"+select.id).css('border-color','');
    var ID = select.id.split('course_mstr_id')[1];
    /* if(select.value=="0"){
        $("#other_course_hide_show"+ID).show();
    }else{
        $("#other_course_hide_show"+ID).hide();
    } */
    
    var val = select.value;
    // console.log('emp select called');
    // console.log(val);
    // return;
    var flag = true;
    if(val!="" && val!="0"){
        $(".course_mstr_id").each(function () {
            var eachID = $(this).attr('id').split('course_mstr_id')[1];
            var eachVal = $("#course_mstr_id"+eachID).val();
            // if(ID!=eachID && eachVal!=""){
            //     if(val==eachVal){
            //         flag = false;
            //         $("#course_mstr_id"+ID).val("");
            //         alert("Not repeated !!! \n Qualification)");
            //     }
            // }
        });
    }
    $("#sub_course_mstr_id"+ID).html("<option value=''>==SELECT==</option>");
    $("#sub_stream_mstr_id"+ID).html("<option value=''>==SELECT==</option>");
    if(val!="" && flag==true){
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Course/getSubCourseByCourseMstrId",
            dataType: "json",
            data: {"course_mstr_id":val},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                console.log(data);
                if(data.response==true){
                     $("#sub_course_mstr_id"+ID).html(data.data);
                }
            }
        });
    }
}
function sub_course_mstr_change_func(select,row_num=null){
    gl_row_num = row_num
    if(select.value=='add'){
        modal_show()
        return;
    }

    $("#"+select.id).css('border-color','');
    var ID = select.id.split('sub_course_mstr_id')[1];
    var val = select.value;
    var flag = true;
    if(val!="" && val!="0"){
        $(".sub_course_mstr_id").each(function () {
            var eachID = $(this).attr('id').split('sub_course_mstr_id')[1];
            var eachVal = $("#sub_course_mstr_id"+eachID).val();
            if(ID!=eachID && eachVal!=""){
                if(val==eachVal){
                    flag = false;
                    $("#sub_course_mstr_id"+ID).val("");
                    alert("Not repeated !!! \n Stream");
                }
            }
        });
    }
    $("#sub_stream_mstr_id"+ID).html("<option value=''>==SELECT==</option>");
    if(val!="" && flag==true){
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Course/getSubStreamBySubCourseMstrId",
            dataType: "json",
            data: {"sub_course_mstr_id":val},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                console.log(data);
                if(data.response==true){
                     $("#sub_stream_mstr_id"+ID).html(data.data);
                }
            }
        });
    }
}
function validateStepThree(){
    var process = true;
    $(".course_mstr_id").each(function () {
        var ID = $(this).attr('id').split('course_mstr_id')[1];
        if($("#course_mstr_id"+ID).val()==""){
            $("#course_mstr_id"+ID).css('border-color', 'red'); process=false;
        }else{
            if($("#course_mstr_id"+ID).val()=="0"){
                if($("#other_course"+ID).val()==""){
                    $("#other_course"+ID).css('border-color', 'red'); process=false;
                }
            }
        }
        
        if($("#sub_course_mstr_id"+ID).val()==""){
            $("#sub_course_mstr_id"+ID).css('border-color', 'red'); process=false;
        }

        if($("#sub_stream_mstr_id"+ID).val()==""){
            $("#sub_stream_mstr_id"+ID).css('border-color', 'red'); process=false;
        }

        if($("#medium_type"+ID).val()==""){
            $("#medium_type"+ID).css('border-color', 'red'); process=false;
        }
        if($("#passing_year"+ID).val()==""){
            $("#passing_year"+ID).css('border-color', 'red'); process=false;
        }else{
            if($("#passing_year"+ID).val() < 1975 || $("#passing_year"+ID).val() > 2021){
                $("#passing_year"+ID).css('border-color', 'red'); process=false;
            }
        }
        if($("#school_college_institute_name"+ID).val()==""){
            $("#school_college_institute_name"+ID).css('border-color', 'red'); process=false;
        }
        if($("#board_university_name"+ID).val()==""){
            $("#board_university_name"+ID).css('border-color', 'red'); process=false;
        }
        if($("#marks_percent"+ID).val()==""){
            $("#marks_percent"+ID).css('border-color', 'red'); process=false;
        }
    });
    return process;
}
$("#btn-step-four-next").click(function(){
    if(validateStepFour()){
		if($("#emp_details_id").val()!=""){
			var serialize = "&emp_details_id="+$("#emp_details_id").val();
			$.ajax({
					type:"POST",
					url: "<?=URLROOT;?>/Api_Employee/empStepFourAddUpdate",
					dataType: "json",
					data: $("#form_step_four").serialize()+serialize,
					beforeSend: function() {
						$("#stepFourErrorPanel").html("");
						$("#loadingDiv").show();
						$("#btn-step-four-next").prop('disabled', true);
						$("#btn-step-four-next").html('Please Wait...');
					},
					success:function(data){
						$("#loadingDiv").hide();
						$("#btn-step-four-next").prop('disabled', false);
						$("#btn-step-four-next").html('Save & Next');
						if(data.response==true){
							modelInfo("Employment Details Updated..");
							stepFiveFun();
						}else{
							modelDanger("required some parameters!!");
							$.each(data.data, function(key, value){
								$("#stepFourErrorPanel").append(value+"<br />");
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#loadingDiv").hide();
						$("#btn-step-four-next").prop('disabled', false);
						$("#btn-step-four-next").html('Save & Next');
						alert(JSON.stringify(jqXHR));
						console.log(JSON.stringify(jqXHR));
						console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					}
			 });
		}
    }
});
function employmentFromPeriodFun(from){
    keyDownNormal(from);
}
function employmentToPeriodFun(from){
    keyDownNormal(from);
}
function validateStepFour(){
    var process = true;

    var from_com_date_status = true;
    var to_com_date_status = true;
    var from_to_date_status = true;
    var from_date = "";
    var to_date = "";
    var curDate = "<?=date("Y-m-d");?>";
    $(".previous_period_from").each(function () {
        var ID = $(this).attr('id').split('previous_period_from')[1];

        if($("#previous_period_from"+ID).val()==""){
            //$("#previous_period_from"+ID).css('border-color', 'red'); process=false;
        }else{
            var getComFromDate = $("#previous_period_from"+ID).val()+"-01";
            if(new Date(curDate) < new Date(getComFromDate)){
                //$("#previous_period_from"+ID).val("");
                $("#previous_period_from"+ID).css('border-color', 'red');
                if(from_com_date_status==true){
                    modelDanger("Invalid Previous Employment From Period Date!!!");
                    from_com_date_status = false;
                }
            }
            if($("#previous_period_to"+ID).val()==""){
                $("#previous_period_to"+ID).css('border-color', 'red'); process=false;
            }else{
                var getComToDate = $("#previous_period_to"+ID).val()+"-01";
                if(new Date(getComFromDate) > new Date(getComToDate)){
                    //$("#previous_period_to"+ID).val("");
                    $("#previous_period_to"+ID).css('border-color', 'red');
                    if(to_com_date_status==true){
                        modelDanger("Invalid Previous Employment To Period Date!!!");
                        to_com_date_status = false;
                    }
                }else{
                    if(from_date==getComFromDate && to_date==getComToDate){
                        if(from_to_date_status==true){
                            $("#previous_period_from"+ID).css('border-color', 'red');
                            $("#previous_period_to"+ID).css('border-color', 'red');
                            modelDanger("Not Same Previous Employment Period Date !!!");
                            from_to_date_status=false;
                        }
                    }
                    from_date=getComFromDate;
                    to_date=getComToDate;
                }
            }
            if($("#previous_experience"+ID).val()==""){
                $("#previous_experience"+ID).css('border-color', 'red'); process=false;
            }
            if($("#previous_organization_name_address"+ID).val()==""){
                $("#previous_organization_name_address"+ID).css('border-color', 'red'); process=false;
            }
            if($("#previous_designation"+ID).val()==""){
                $("#previous_designation"+ID).css('border-color', 'red'); process=false;
            }
            if($("#previous_monthly_emoluments"+ID).val()==""){
                $("#previous_monthly_emoluments"+ID).css('border-color', 'red'); process=false;
            }
            if($("#previous_brief_job_description"+ID).val()==""){
                $("#previous_brief_job_description"+ID).css('border-color', 'red'); process=false;
            }
        }
    });
    return process;
}
function changeEmploymentTypeFunc(obj){
    keyDownNormal(obj);
    employment_type_mstr_id = obj.value;
    if((employment_type_mstr_id==3) || (employment_type_mstr_id==5)){
        $("#work_type_hide_show").show();
    }else{
        $("#work_type_hide_show").hide();
        $("#work_type").val("");
    }
    $("#work_type").css('border-color', '');
    checkMonthlySalaryIsValidOrNot();
}
var monthly_salary_status = true;
function checkMonthlySalaryIsValidOrNot(){
    var designation_mstr_id = $("#designation_mstr_id").val();
    var work_type = $("#work_type").val();
    var employment_type_mstr_id = $("#employment_type_mstr_id").val();
    var monthly_salary =$("#monthly_salary").val();
    if(monthly_salary==""){ monthly_salary = 0}
    if(designation_mstr_id!="" && employment_type_mstr_id!="" && monthly_salary!=0){
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Employee/checkMonthlySalaryIsValidOrNot",
            dataType: "json",
            data: { 
                    "designation_mstr_id" : designation_mstr_id,
                    "work_type" : work_type,
                    "employment_type_mstr_id" : employment_type_mstr_id,
                    "monthly_salary" : monthly_salary,
                  },
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    monthly_salary_status = true;
                    $("#monthly_salary_err_msg").html("");
                    $("#monthly_salary").css('border-color', '');
                }else if(data.response==false){
                    monthly_salary_status = false;
                    $("#monthly_salary_err_msg").html(data.data);
                    $("#monthly_salary").css('border-color', 'red');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#loadingDiv").hide();
                $("#btn-step-five-next").prop('disabled', false);
                $("#btn-step-five-next").html('Save & Next');
                alert(JSON.stringify(jqXHR));
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }
}
function getWardDetailsByProjectType(){
    $("#project_concept_type").css('border-color', '');
    var designation_mstr_id = $("#designation_mstr_id").val();
    var project_concept_type = $("#project_concept_type").val();
    var company_location_id = $("#company_location_id").val();
    var emp_details_id = $("#emp_details_id").val();
    $("#ward_mstr_id").html("<option value=''>== SELECT ==</option>");
    if((designation_mstr_id==12 || designation_mstr_id==15) && project_concept_type=="WARD" && company_location_id!=""){
        $("#area_ward_mstr_hide_show").show();
        if(designation_mstr_id==12){
            $("#ward_mstr_id").attr('multiple', 'multiple');
        }else{
            $("#ward_mstr_id").removeAttr('multiple');
        }
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Employee/getWardDetailsByProjectAddress",
            dataType: "json",
            data: {'emp_details_id': emp_details_id, 'project_mstr_address_id':company_location_id},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                console.log(data);
                $("#loadingDiv").hide();
                if(data.response==true){
                    $("#ward_mstr_id").html(data.data);
                }else{
                    if(data.data=="Ward data is not available in"){
                        modelDanger("Ward data is not available in "+$("#company_location_id option:selected").text());
                    }else{
                        modelDanger(data.data);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#loadingDiv").hide();
                alert(JSON.stringify(jqXHR));
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }else{
        $("#area_ward_mstr_hide_show").hide();
    }
}
$("#designation_mstr_id").change(function(){
    $("#designation_mstr_id").css('border-color', '');
    checkMonthlySalaryIsValidOrNot();
    getWardDetailsByProjectType();
});
$("#work_type").change(function(){
    $("#work_type").css('border-color', '');
    checkMonthlySalaryIsValidOrNot();
    getWardDetailsByProjectType();
});
$("#ward_mstr_id").click(function(){
    $("#ward_mstr_id").css('border-color', '');
});
$("#monthly_salary").keyup(function(){
    $("#monthly_salary").css('border-color', '');
});
$("#monthly_salary").focusout(function(){
    checkMonthlySalaryIsValidOrNot();
});
$("#project_mstr_id").change(function(){
    var project_mstr_id = this.value;
    if(project_mstr_id==""){
        $("#company_location_id").html("<option value=''>== SELECT ==</option>");
        $("#project_concept_type").val("");
    }else{
        $.ajax({
            type:"POST",
            url: "<?=URLROOT;?>/Api_Employee/getJobLocationByProjectMstrId",
            dataType: "json",
            data: {'project_mstr_id':project_mstr_id},
            beforeSend: function() {
                $("#loadingDiv").show();
            },
            success:function(data){
                $("#loadingDiv").hide();
                if(data.response==true){
                    console.log(data.concept_type);
                    $("#company_location_id").html(data.data);
                    $("#project_concept_type").val(data.concept_type);
                }else{
                    modelInfo(data.data);
                }
                getWardDetailsByProjectType();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#loadingDiv").hide();
                alert(JSON.stringify(jqXHR));
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }
    
});
$("#btn-step-five-next").click(function(){
    // console.log('wokringjjjjj 13')
    if(validateStepFive()){
		if($("#emp_details_id").val()!=""){
			var serialize = "&emp_details_id="+$("#emp_details_id").val();
			$.ajax({
					type:"POST",
					url: "<?=URLROOT;?>/Api_Employee/empStepFiveAddUpdate",
					dataType: "json",
					data: $("#form_step_Five").serialize()+serialize,
					beforeSend: function() {
						$("#stepFiveErrorPanel").html("");
						$("#loadingDiv").show();
						$("#btn-step-five-next").prop('disabled', true);
						$("#btn-step-five-next").html('Please Wait...');
					},
					success:function(data){
						$("#loadingDiv").hide();
						$("#btn-step-five-next").prop('disabled', false);
						$("#btn-step-five-next").html('Save & Next');
						if(data.response==true){
							modelInfo("Job Details Updated..");
							stepSixFun();
						}else{
							modelDanger("required some parameters!!");
							$.each(data.data, function(key, value){
								$("#stepFiveErrorPanel").append(value+"<br />");
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#loadingDiv").hide();
						$("#btn-step-five-next").prop('disabled', false);
						$("#btn-step-five-next").html('Save & Next');
						alert(JSON.stringify(jqXHR));
						console.log(JSON.stringify(jqXHR));
						console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					}
			 });
		}
    }
    //stepSixFun();
});

function validateStepFive(){
    var process = true;
    // var company_location_id = $("#company_location_id").val();
    // console.log(company_location_id);
    // return;
    var project_mstr_id = $("#project_mstr_id").val();
    var project_concept_type = $("#project_concept_type").val();
    var department_mstr_id = $("#department_mstr_id").val();
    var designation_mstr_id = $("#designation_mstr_id").val();
    var employment_type_mstr_id = $("#employment_type_mstr_id").val();
    var department_mstr_id = $("#department_mstr_id").val();
    var work_type = $("#work_type").val();
    var monthly_salary = $("#monthly_salary").val();
    var joining_date = $("#joining_date").val();

    var bank_name = $("#bank_name").val();
    var branch_name = $("#branch_name").val();
    var ifsc_code = $("#ifsc_code").val();
    var account_no = $("#account_no").val();
    var confirm_account_no = $("#confirm_account_no").val();


    if(company_location_id==""){
        $("#company_location_id").css('border-color', 'red'); process=false;
    }
    if(project_mstr_id==""){
        $("#project_mstr_id").css('border-color', 'red'); process=false;
    }

    /*if(project_concept_type==""){
        $("#project_concept_type").css('border-color', 'red'); process=false;
    }*/
    if(department_mstr_id==""){
        $("#department_mstr_id").css('border-color', 'red'); process=false;
    }
    if(designation_mstr_id==""){
        $("#designation_mstr_id").css('border-color', 'red'); process=false;
    }
    var ward_mstr_id_len = $("#ward_mstr_id option:selected").length;
    if(ward_mstr_id_len==0){
        $("#ward_mstr_id").css('border-color', 'red'); process=false;
    }
    if(employment_type_mstr_id==""){
        $("#employment_type_mstr_id").css('border-color', 'red'); process=false;
    }else{
        if(employment_type_mstr_id==3 || employment_type_mstr_id==5){
            if(work_type==""){
                $("#work_type").css('border-color', 'red'); process=false;
            }
        }
    }
    if(monthly_salary==""){ monthly_salary = 0}
    if(monthly_salary==0){
        $("#monthly_salary").css('border-color', 'red'); process=false;
    }
    if(designation_mstr_id!="" && employment_type_mstr_id!="" && monthly_salary!=0){
        checkMonthlySalaryIsValidOrNot();
    }
    if(monthly_salary_status==false){
        $("#monthly_salary").css('border-color', 'red'); process=false;
    }
    if(joining_date==""){
        $("#joining_date").css('border-color', 'red'); process=false;
    }

    if(bank_name==""){
        $("#bank_name").css('border-color', 'red'); process=false;
    }
    if(branch_name==""){
        $("#branch_name").css('border-color', 'red'); process=false;
    }
    if(ifsc_code==""){
        $("#ifsc_code").css('border-color', 'red'); process=false;
    }
    if(account_no==""){
        $("#account_no").css('border-color', 'red'); process=false;
    }
    if(confirm_account_no==""){
        $("#confirm_account_no").css('border-color', 'red'); process=false;
    }
    if(account_no!=confirm_account_no){
        $("#confirm_account_no").css('border-color', 'red'); process=false;
        alert("A/C No. & Confirm A/C No. does not same !!!");
    }
    return process;
}

$("#company_location_id").change(function(){ $(this).css('border-color',''); getWardDetailsByProjectType(); });
$("#project_mstr_id").change(function(){ $(this).css('border-color',''); });

$("#btn_upload_doc_step_six").click(function(){
    if(validateStepSix()){
		if($("#emp_details_id").val()!=""){
			var emp_doc_path = $('#emp_doc_path')[0].files[0];
			var emp_details_id = $('#emp_details_id').val();
			var doc_type_mstr_id = $('#doc_type_mstr_id').val();
			var other_doc_name = $('#other_doc_name').val();
			var doc_no = $('#doc_no').val();
			var place_of_issue = $('#place_of_issue').val();
			var date_of_issue = $('#date_of_issue').val();
			var valid_upto = $('#valid_upto').val();
			form_data = new FormData();
			form_data.append('emp_doc_path', emp_doc_path);
			form_data.append('emp_details_id', emp_details_id);
			form_data.append('doc_type_mstr_id', doc_type_mstr_id);
			form_data.append('other_doc_name', other_doc_name);
			form_data.append('doc_no', doc_no);
			form_data.append('place_of_issue', place_of_issue);
			form_data.append('date_of_issue', date_of_issue);
			form_data.append('valid_upto', valid_upto);
			$.ajax({
				type:"POST",
				url: "<?=URLROOT;?>/Api_Employee/empStepSixAddUpdate",
				dataType: "json",
				data: form_data,
				contentType: false,
				cache: false,
				processData: false,
				beforeSend: function() {
					$("#stepSixErrorPanel").html("");
					$("#loadingDiv").show();
					$("#btn_upload_doc_step_six").prop('disabled', true);
					$("#btn_upload_doc_step_six").html('Please Wait...');
				},
				success:function(data){
					$("#loadingDiv").hide();
					$("#btn_upload_doc_step_six").prop('disabled', false);
					$("#btn_upload_doc_step_six").html('Upload');
					if(data.response==true){
						modelInfo("Document Uploaded!!");
						$("#tbody_condidate_attachment_list").html(data.data);

						$('#emp_doc_path').val("");
						$('#doc_type_mstr_id').val("");
						$('#other_doc_name').val("");
						$('#other_doc_name_hide_show').hide();
						$('#doc_no').val("");
						$('#place_of_issue').val("");
						$('#date_of_issue').val("");
						$('#valid_upto').val("");
					}else{
						if(data.data.hasOwnProperty('DataExist')){
							modelDanger(data.data.DataExist);
						}else{
							modelDanger("required some parameters!!");
							$.each(data.data, function(key, value){
								$("#stepSixErrorPanel").append(value+"<br />");
							});
						}
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$("#loadingDiv").hide();
					$("#btn_upload_doc_step_six").prop('disabled', false);
					$("#btn_upload_doc_step_six").html('Upload');
					alert(JSON.stringify(jqXHR));
					console.log(JSON.stringify(jqXHR));
					console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
				}
			});
		}
    }
});
function validateStepSix(){
    var process = true;

    if($("#doc_type_mstr_id").val()==""){
        $("#doc_type_mstr_id").css('border-color', 'red'); process=false;
    }
    if($("#doc_type_mstr_id").val()=="0"){
        if($("#other_doc_name").val()==""){
            $("#other_doc_name").css('border-color', 'red'); process=false;
        }
    }
    if($("#doc_no").val()==""){
        $("#doc_no").css('border-color', 'red'); process=false;
    }
    if($("#emp_doc_path").val()==""){
        $("#emp_doc_path").css('border-color', 'red'); process=false;
    }

    return process;
}
$("#emp_doc_path").change(function() {
    var input = this;
    var ext = $(this).val().split('.').pop().toLowerCase();
    if($.inArray(ext, ['png','jpg','jpeg', 'pdf']) == -1) {
        $("#emp_doc_path").val("");
        alert('invalid document type');
    }
    if (input.files[0].size > 2097152) { // 1MD = 1048576
        $("#emp_doc_path").val("");
        alert("Try to upload file less than 2MB!"); 
    }
    keyDownNormal(input);
});
function doc_type_mstr_change_fun(val){
    if(val.value=='12'){
        $("#doc_no").val("N/A");
        // $("#doc_no").attr('required', false); 
        $(".resume_hide").hide();
    }
    else{
        $("#doc_no").val("");
        $(".resume_hide").show();
    }

    if(val.value=="0"){
        $("#other_doc_name_hide_show").show();
    }else{
        $("#other_doc_name_hide_show").hide();
    }
    keyDownNormal(val);
}
function empDocDeleteFun(ID){
    var emp_details_id = $('#emp_details_id').val();
    var conf = confirm("Do you want to delete document!!!");
    if(conf){
        $.ajax({
			type:"POST",
			url: "<?=URLROOT;?>/Api_Employee/empDocDelete",
			dataType: "json",
			data: {"emp_details_id":emp_details_id, "emp_document_details_id":ID},
			beforeSend: function() {
				$("#loadingDiv").show();
		    },
			success:function(data){
				$("#loadingDiv").hide();
                if(data.response==true){
                    modelInfo("Document Deleted!!");
                    $("#tbody_condidate_attachment_list").html(data.data);
                }
	        },
	    	error: function(jqXHR, textStatus, errorThrown) {
	    		$("#loadingDiv").hide();
                $("#btn_upload_doc_step_six").prop('disabled', false);
                $("#btn_upload_doc_step_six").html('Upload');
	    		alert(JSON.stringify(jqXHR));
		        console.log(JSON.stringify(jqXHR));
		        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		    }
	    });
    }
}
$("#btn-step-final-next").click(function(){
	var emp_details_id = $("#emp_details_id").val();
	if(emp_details_id!=""){
		$.ajax({
			type:"POST",
			url: "<?=URLROOT;?>/Api_Employee/empFinalSubmit",
			dataType: "json",
			data: {"emp_details_id":emp_details_id},
			beforeSend: function() {
				$("#loadingDiv").show();
				$("#btn-step-final-next").prop('disabled', true);
				$("#btn-step-final-next").html('Please wait...');
			},
			success:function(data){
				if(data.response==true){
					modelInfo("Final submission successfully!!!");
					window.location.replace("<?=URLROOT;?>/Employee/empAddUpdate/1");
				}else{

				}
				$("#loadingDiv").hide();
				$("#btn-step-final-next").prop('disabled', false);
				$("#btn-step-final-next").html('Final');
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$("#loadingDiv").hide();
				$("#btn-step-final-next").prop('disabled', false);
				$("#btn-step-final-next").html('Final');
				alert(JSON.stringify(jqXHR));
				console.log(JSON.stringify(jqXHR));
				console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
			}
		});
	}
});
function keyDownNormal(keyVal){
    $("#"+keyVal.id).css('border-color', '');
}
$('#d_o_b').datepicker({
    format: "yyyy-mm-dd",
    endDate: '-6575d',
    weekStart: 0,
    autoclose:true,
    todayHighlight:true,
    todayBtn: "linked",
    clearBtn:true,
    daysOfWeekHighlighted:[0]
});
$('#joining_date').datepicker({
    format: "yyyy-mm-dd",
    endDate: '0d',
    weekStart: 0,
    autoclose:true,
    todayHighlight:true,
    todayBtn: "linked",
    clearBtn:true,
    daysOfWeekHighlighted:[0]
});
$('#date_of_issue').datepicker({
    format: "yyyy-mm-dd",
    endDate: '0d',
    weekStart: 0,
    autoclose:true,
    todayHighlight:true,
    todayBtn: "linked",
    clearBtn:true,
    daysOfWeekHighlighted:[0]
});
$('#valid_upto').datepicker({
    format: "yyyy-mm-dd",
    startDate: '0d',
    weekStart: 0,
    autoclose:true,
    todayHighlight:true,
    todayBtn: "linked",
    clearBtn:true,
    daysOfWeekHighlighted:[0]
});
$("#btn-step-six-prev").click(function(){
    stepFiveFun();
});
$("#btn-step-five-prev").click(function(){
    stepFourFun();
});
$("#btn-step-four-prev").click(function(){
    stepThreeFun();
});
$("#btn-step-three-prev").click(function(){
    stepTwoFun();
});
$("#btn-step-two-prev").click(function(){
    stepOneFun();
});
$(document).ready(function(){
    <?php
        if($data['step']==1){
            echo "stepOneFun();";
        }else if($data['step']==2){
            echo "stepTwoFun();";
        }else if($data['step']==3){
            echo "stepThreeFun();";
        }else if($data['step']==4){
            echo "stepFourFun();";
        }else if($data['step']==5){
            echo "stepFiveFun();";
        }else if($data['step']==6){
            echo "stepSixFun();";
        }
    ?>

    $('.datepickerWithMask').datepicker({
    	format: "yyyy-mm-dd",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    $('.datepickerYM').datepicker({
    	format: "yyyy-mm",
    	weekStart: 0,
    	autoclose:true,
    	todayHighlight:true,
    	todayBtn: "linked",
    	clearBtn:true,
    	daysOfWeekHighlighted:[0]
    });
    getWardDetailsByProjectType();
});
function isNumberKey(txt, evt) {
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