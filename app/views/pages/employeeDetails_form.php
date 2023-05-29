<?php require APPROOT . '/views/layout_helper/header.php'; ?>
<!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.js"></script>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">General Elements</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Forms</a></li>
					<li class="active">General Elements</li>
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

					            <!-- Classic Form Wizard -->
					            <!--===================================================-->
					            <div id="demo-cls-wz">

					                <!--Nav-->
					                <ul class="wz-nav-off wz-icon-inline wz-classic">
					                    <li class="col-xs-2 bg-mint" id="anchorStepOne">
					                        <a data-toggle="tab" href="#step-1" aria-expanded="false">
					                            <span class="icon-wrap icon-wrap-xs"><i class="demo-pli-information icon-lg"></i></span> Basic Details
					                        </a>
					                    </li>
					                    <li class="col-xs-2 bg-mint" id="anchorStepTwo">
					                        <a data-toggle="tab" href="#step-2" aria-expanded="false">
					                            <span class="icon-wrap icon-wrap-xs"><i class="demo-pli-male icon-lg"></i></span> Contact Details
					                        </a>
					                    </li>
                                        <li class="col-xs-2 bg-mint" id="anchorStepThree">
					                        <a data-toggle="tab" href="#step-3" aria-expanded="false">
					                            <span class="icon-wrap icon-wrap-xs"><i class="demo-pli-home icon-lg"></i></span> ID Proof
					                        </a>
					                    </li>
					                    <li class="col-xs-2 bg-mint" id="anchorStepFour">
					                        <a data-toggle="tab" href="#step-4" aria-expanded="false">
					                            <span class="icon-wrap icon-wrap-xs"><i class="demo-pli-home icon-lg"></i></span> Academic Details
					                        </a>
					                    </li>
					                    <li class="col-xs-2 bg-mint " id="anchorStepFive">
					                        <a data-toggle="tab" href="#step-5" aria-expanded="false">
					                            <span class="icon-wrap icon-wrap-xs"><i class="demo-pli-medal-2 icon-lg"></i></span> Employment Details
					                        </a>
					                    </li>
                                         <li class="col-xs-2 bg-mint " id="anchorStepSix">
					                        <a data-toggle="tab" href="#step-6" aria-expanded="true">
					                            <span class="icon-wrap icon-wrap-xs"><i class="demo-pli-medal-2 icon-lg"></i></span> Family Details
					                        </a>
					                    </li>
					                </ul>

					                <!--Progress bar-->
					                <div class="progress progress-xs progress-striped active">
					                    <div class="progress-bar progress-bar-dark"></div>
					                </div>

					                <!--Form-->

					                    <div class="panel-body">
					                        <div class="tab-content">
					                            <!--First tab-->
					                            <div id="step-1" class="tab-pane  active in">
                                                    <form class="form-horizontal mar-top">
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Position<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control" type="text" value="<?=(isset($position_name))?$position_name:"";?>" id="position_name" name="position_name" onkeypress="return IsAlphabets(event);" placeholder="Position Name" >
                                                                <span id="position_name_show" class="text-danger"></span>
                                                            </div>
                                                            <label class="col-md-3" >Referance No.<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="referance_no" name="referance_no" placeholder="Referance No." type="text" value="<?=(isset($referance_no))?$referance_no:"";?>" onkeypress="return IsAlphabets(event);" >
                                                                <span id="referance_no_show" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Full Name <span class="text-danger">*</span></label>
                                                            <div class="col-md-3"><label>First name<span class="text-danger">*</span></label>
                                                                <input class="form-control m-t-xxs" id="first_name" name="first_name" placeholder="First Name" type="text" onkeypress="return IsAlphabets(event);" value="<?=(isset($first_name))?$first_name:"";?>"   >

                                                            </div>
                                                            <div class="col-md-3"><label>Middle Name </label>
                                                                <input class="form-control m-t-xxs" id="middle_name" name="middle_name" placeholder="Middle Name" type="text" value="<?=(isset($middle_name))?$middle_name:"";?>" onkeypress="return IsAlphabets(event);" >

                                                            </div>
                                                            <div class="col-md-3"><label>Last Name <span class="text-danger">*</span></label>
                                                                <input class="form-control m-t-xxs" id="last_name" name="last_name" placeholder="Last Name" type="text" value="<?=(isset($last_name))?$last_name:"";?>" onkeypress="return IsAlphabets(event);"  >

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Father's Name<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control" type="text" value="<?=(isset($father_name))?$father_name:"";?>" id="father_name" name="father_name" onkeypress="return IsAlphabets(event);" placeholder="Father Name" >
                                                                <span id="father_name_show" class="text-danger"></span>
                                                            </div>
                                                            <label class="col-md-3" >Mother's Name<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="mother_name" name="mother_name" placeholder="Mother Name" type="text" value="<?=(isset($mother_name))?$mother_name:"";?>" onkeypress="return IsAlphabets(event);" >
                                                                <span id="mother_name_show" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Blood Group </label>
                                                            <div class="col-md-3">
                                                                <select class="form-control m-t-xxs" id="blood_group" name="blood_group"  >
                                                                    <option value="">Select</option>

                                                                </select>
                                                                <span id="blood_group_show" class="text-danger"></span>
                                                            </div>
                                                            <label class="col-md-3" >Gender<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                 <input id="gender1" name="gender" value="Male" type="radio" <?=(isset($gender))?($gender=="Male")?"checked":"":"checked";?> ><label>Male</label>
                                                                <input id="gender2" name="gender" value="Female" type="radio" <?=(isset($gender))?($gender=="Female")?"checked":"":"";?> > <label>Female</label>
                                                                <input id="gender3" name="gender" value="Other" type="radio" <?=(isset($gender))?($gender=="Other")?"checked":"":"";?> ><label>Other</label>
                                                                <span id="gender_show" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Date of Birth<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input class="form-control datePicker" size="16" type="text"  id="d_o_b" name="d_o_b" value="" readonly>
                                                                </div>

                                                            </div>
                                                            <label class="col-md-3" >Age </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="age" name="age" placeholder="Age" type="text" value="" readonly  >
                                                                <span id="age_show" class="text-danger"></span>								</div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Height </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="height" name="height" maxlength="4" placeholder="Height" type="text" value="" onkeypress="return isNumber(event);"  >
                                                            </div>
                                                            <label class="col-md-3" > Weight </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="weight" name="weight" placeholder="Weight" value="" type="email"  >
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >Marital Status<span class="text-danger">*</span> </label>
                                                            <div class="col-md-3">
                                                                <Select class="form-control m-t-xxs" id="marital_status" name="marital_status" >
                                                                    <option value="0">Select</option>
                                                                    <option value="1">Married</option>
                                                                    <option value="2">Unmarried</option>
                                                                    <option value="2">Divorced</option>
                                                                </Select>

                                                            </div>
                                                            <label class="col-md-3" > Email-ID </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="email_id" name="email_id" placeholder="Email Address" value="" type="email"  >
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2" >Upload Image </label>
                                                            <div class="col-md-3">
                                                                <span>Preferred Image : Maximum size of 2MB</span>
                                                                <input type="file" id="photo_path" name="photo_path" class="form-control m-t-xxs" />
                                                                <input type="hidden" id="is_image" name="is_image" value="<?=$is_image;?>" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >&nbsp;</label>
                                                            <div class="col-md-3">
                                                                <div class="Preview" style="width:100%; text-align:center;">
                                                                    <img id="preview_img" src="<?=URLROOT;?>/common/assets/img/profile-photos/1.png" alt="" style="height:200px; width:180px;"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2" >&nbsp;</label>
                                                            <div class="col-md-3">
                                                                <input type="button" id="img_remove" class="btn  red btn-outline btn-block" value="Remove Photo" >
                                                            </div>
                                                        </div>
                                                        <button type="button" id="add_update_candidate_step_one" class="next btn btn-mint pull-right">Next</button>
                                                    </form>
					                            </div>

					                            <!--Second tab-->
					                            <div id="step-2" class="tab-pane fade">
                                                    <form class="form-horizontal mar-top">

                                                        <div class="form-group">
                                                            <label class="control-label text-danger"><u>Present Address:<span class="text-danger">*</span></u></label>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-2" >Address Line1</label>
                                                            <div class="col-md-3">
                                                                <textarea class="form-control m-t-xxs" id="present_address_line1" name="present_address_line1" placeholder="Present Address Line1" type="text"  ></textarea>
                                                            </div>
                                                            <label class="col-md-3" > Address Line2 </label>
                                                            <div class="col-md-3">
                                                                <textarea class="form-control m-t-xxs" id="present_address_line2" name="present_address_line2" placeholder="Present Address Line1" type="text"  ></textarea>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                             <label class="col-md-2" >State </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="state" name="state" placeholder="State" type="text" value=""  >
                                                            </div>
                                                            <label class="col-md-3" >City </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="city" name="city" placeholder="City" type="text" value=""  >
                                                            </div>

                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-2" > Pincode </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="pincode" name="pincode" placeholder="Pincode" value="" type="email"  >
                                                            </div>
                                                            <label class="col-md-3" > Contact No. </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="contact_no" name="contact_no" placeholder="Contact No." value="" type="email"  >
                                                             </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label text-danger"><u>Permanent Address:<span class="text-danger">*</span></u> </label> <input type="checkbox">Same as Present Address
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-2" >Address Line1</label>
                                                            <div class="col-md-3">
                                                                <textarea class="form-control m-t-xxs" id="present_address_line1" name="present_address_line1" placeholder="Address Line1" type="text"  ></textarea>
                                                            </div>
                                                            <label class="col-md-3" > Address Line2 </label>
                                                            <div class="col-md-3">
                                                                <textarea class="form-control m-t-xxs" id="present_address_line2" name="present_address_line2" placeholder="Address Line1" type="text"  ></textarea>
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-2" >City </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="city" name="city" placeholder="City" type="text" value=""  >
                                                            </div>
                                                            <label class="col-md-3" > Pincode </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="pincode" name="pincode" placeholder="Pincode" value="" type="email"  >
                                                            </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-2" >State </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="state" name="state" placeholder="State" type="text" value=""  >
                                                            </div>
                                                            <label class="col-md-3" > Contact No. </label>
                                                            <div class="col-md-3">
                                                                <input class="form-control m-t-xxs" id="contact_no" name="contact_no" placeholder="Contact No." value="" type="email"  >
                                                             </div>
                                                        </div>
                                                        <button type="button" class="previous btn btn-mint">Previous</button>
                                                        <button type="button" id="add_update_candidate_step_two" class="next btn btn-mint pull-right">Next</button>
                                                    </form>

					                            </div>
                                                <!--Third tab-->
					                            <div id="step-3" class="tab-pane fade">
                                                    <form class="form-horizontal mar-top">
                                                        <div class="row">
					                                        <div class="col-md-12">

                                                    <!--Bordered Table-->
                                                    <!--===================================================-->
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th class="text-center"></th>
                                                                        <th>Number</th>
                                                                        <th>Date Of Issue</th>
                                                                        <th>Place Of Issue</th>
                                                                        <th>Valid Upto</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">Aadhar</td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td class="text-center">Driving License</td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!--End Bordered Table-->
                                                </div>
                                                </div>


                                                        <button type="button" class="previous btn btn-mint">Previous</button>
                                                        <button type="button" id="add_update_candidate_step_two" class="next btn btn-mint pull-right">Next</button>
                                                    </form>

					                            </div>

					                            <!--Fourth tab-->
					                            <div id="step-4" class="tab-pane">
                                                    <form class="form-horizontal mar-top">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="panel panel-primary" >
                                                                    <div class="panel-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-hover table-bordered table-condensed" >
                                                                                <thead>
                                                                                    <tr class="success">
                                                                                        <th>SSC / HSC / DIPLOMA / DEGREE / Additional Course (in chronological order)  </th>
                                                                                        <th>Main Subjects Of Study Stream / Medium : English / Vernacular  </th>
                                                                                        <th>Year Of Passing</th>
                                                                                        <th>Name Of School / College / Institute And Place</th>
                                                                                        <th>Name Of Board / University Affiliated</th>
                                                                                        <th>Class / % Of Marks Awarded</th>
                                                                                        <th></th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody id="rowAddPreviousEmploymentDetails">

                                                                                    <tr>
                                                                                        <td>
                                                                                            <select id="designation_id1" name="designation_id[]" class="form-control">
                                                                                                <option value="">Select</option>
                                                                                             </select>
                                                                                        </td>

                                                                                        <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                        <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                        <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>

                                                                                        <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                        <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                        <td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="employeementTableAdditem(1);"></i></td>


                                                                                    </tr>

                                                                                    <input type="hidden" name="employeementTableLen" id="employeementTableLen" value="<?=$i;?>" />
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                         </div>

                                                        <button type="button" class="previous btn btn-mint">Previous</button>
                                                        <button type="button" id="add_update_candidate_step_four" class="next btn btn-mint pull-right">Next</button>
                                                    </form>
					                            </div>

					                            <!--Fifth tab-->
					                            <div id="step-5" class="tab-pane">
                                                    <form class="form-horizontal mar-top">
                                                        <div class="row">
					                        <div class="col-md-12">
					                            <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Present Employment</h3>
                                                    </div>

                                                    <!--Bordered Table-->
                                                    <!--===================================================-->
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">

                                                                <tbody>
                                                                    <tr>
                                                                        <td>Name Of Employer</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td>Address Of Organisation</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Date Of Joining</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Brief Description Of Present Job :<br> Heighlight Special Achievements, Awards, Promotions, etc. </td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Details Of Present Emoluments <br> (Monthly)</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>Other Emoluments Like PF, LTA,<br> Medical, Gratuity, Bonus/Ex-gratia etc.</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td>Any Benefits / Facilities In Kind ?</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td>Expected Salary From ATCPL</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td>What Notice Period Do You Need To Join ?</td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!--End Bordered Table-->

                                                </div>
					                        </div>
                                          </div>

                                          <div class="row">
					                        <div class="col-md-12">
					                            <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Previous Employment </h3>
                                                    </div>

                                                    <!--Bordered Table-->
                                                    <!--===================================================-->
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th class="text-center">Period</th>

                                                                        <th>Tatal Exp.</th>
                                                                        <th>Organisation Name, Brief Address</th>
                                                                        <th>Designation</th>
                                                                        <th>Monthly Emoluments(Last)</th>
                                                                        <th>Brief Job Description</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><input type="text" class="form-control"></td>

                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>
                                                                     <tr>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>

                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!--End Bordered Table-->

                                                </div>
					                        </div>

                                                         <button type="button" class="previous btn btn-mint">Previous</button>
                                                        <button type="button" id="add_update_candidate_step_five" class="next btn btn-mint pull-right">Next</button>                                                   </form>
					                            </form>
                                              </div>
                                              <!--Sixth tab-->
					                            <div id="step-6" class="tab-pane">
                                                    <form class="form-horizontal mar-top">

                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="success">
                                                                        <th class="text-center">Relation</th>
                                                                        <th>Name</th>
                                                                        <th>Occupation</th>
                                                                        <th>Contact Number</th>
                                                                        <th>Address</th>
                                                                        <th></th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">Father's</td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                     <tr>
                                                                        <td class="text-center">Mother's</td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center"><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td><input type="text" class="form-control"></td>
                                                                        <td></td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--===================================================-->
                                                    <!--End Bordered Table-->



                                                        <button type="button" class="previous btn btn-mint">Previous</button>
                                                        <button type="button" id="add_update_candidate_step_six" class="finish btn btn-mint pull-right">Finish</button>
                                                    </form>

					                            </div>  
                                                

					                        </div>
					                    </div>



					            </div>
					            <!--===================================================-->
					            <!-- End Classic Form Wizard -->
                                                    <!--===================================================-->
					        </div>
					    </div>
					</div>

                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_helper/footer.php'; ?>
    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <!--Form Wizard [ SAMPLE ]-->
    <script src="<?=URLROOT;?>/common/assets/js/demo/form-wizard.js"></script>