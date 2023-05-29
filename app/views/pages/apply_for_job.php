<!DOCTYPE html>
<h lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SPS</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="<?=URLROOT;?>/common/assets/css/nifty.min.css" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="<?=URLROOT;?>/common/assets/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <!--=================================================-->
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?=URLROOT;?>/common/assets/plugins/pace/pace.min.js"></script>
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?=URLROOT;?>/common/assets/css/demo/nifty-demo.min.css" rel="stylesheet">
    <!--Morris.js [ OPTIONAL ]-->
    <link href="<?=URLROOT;?>/common/assets/css/themes/type-d/theme-navy.min.css" rel="stylesheet">
    <!--[ OPTIONAL ]-->
    <link href="<?=URLROOT;?>/common/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?=URLROOT;?>/common/assets/bootstrap4-toggle/css/bootstrap4-toggle.min.css" rel="stylesheet"> 
</head>
<body>
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="#" class="navbar-brand" style="color:white;">
                        <!--<img src="img/logo.png" alt="Sri Publication &amp; Stationers Pvt. Ltd." class="brand-icon">-->
                        <div class="brand-title">
                            <span class="brand-text">SPS</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->
                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content">
                    <ul class="nav navbar-top-links">

                        <li class="mega-dropdown">
                            <a href="<?=URLROOT;?>/Home/index" class="aside-toggle">HOME</a>
                        </li>
                        <li>
                            <a href="#" class="aside-toggle">ABOUT</a>
                        </li>
                        <li>
                            <a href="#" class="aside-toggle">SERVICE</a>
                        </li>
                        <li>
                            <a href="<?=URLROOT;?>/form_Controller/career" class="aside-toggle">CAREER</a>
                        </li>
						<li>
                            <a href="<?=URLROOT;?>/Login/index" class="aside-toggle">LOG IN</a>
                        </li>

                    </ul>
               </div>
                <!--================================-->
                <!--End Navbar Dropdown-->

            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <div class="text-center">
                        <h2>Apply for Job</h2>

                    </div>
                </div>

                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="info">
				                <div class="col-md-12">
					                <hr class="new-section-sm bord-no">
					                    <div class="panel">
                                        <!-- Bubble Numbers Form Wizard -->
					                    <!--===================================================-->
					                        <div id="demo-step-wz">
					                            <div class="wz-heading wz-w-label bg-mint">
					                                <!--Progress bar-->
					                                <div class="progress progress-xs">
					                                    <div style="width: 0%; margin: 0px 12.5%;" class="progress-bar progress-bar-dark">
                                                        </div>
					                                </div>
					                                <!--Nav-->
					                                <ul class="wz-steps wz-icon-bw wz-nav-off text-lg">
					                                     <li class="col-xs-2 active">
					                                        <a data-toggle="tab" href="#demo-step-tab1" aria-expanded="true">
                                                                <span class="icon-wrap icon-wrap-xs icon-circle bg-dark mar-ver">
                                                                    <span class="wz-icon icon-txt text-bold">1</span>
                                                                    <i class="wz-icon-done demo-psi-like"></i>
                                                                </span>
                                                                <small class="wz-desc box-block text-semibold">Basic</small>
                                                             </a>
					                                       </li>
                                                        <li class="col-xs-2">
                                                            <a data-toggle="tab" href="#demo-step-tab2" aria-expanded="false">
                                                                <span class="icon-wrap icon-wrap-xs icon-circle bg-dark mar-ver">
                                                                    <span class="wz-icon icon-txt text-bold">2</span>
                                                                    <i class="wz-icon-done demo-psi-like"></i>
                                                                </span>
                                                                <small class="wz-desc box-block text-semibold">Contact</small>
                                                            </a>
                                                        </li>
                                                        <li class="col-xs-2">
                                                            <a data-toggle="tab" href="#demo-step-tab3" aria-expanded="false">
                                                                <span class="icon-wrap icon-wrap-xs icon-circle bg-dark mar-ver">
                                                                    <span class="wz-icon icon-txt text-bold">3</span>
                                                                    <i class="wz-icon-done demo-psi-like"></i>
                                                                </span>
                                                                <small class="wz-desc box-block text-semibold">Academic</small>
                                                            </a>
                                                        </li>
                                                        <li class="col-xs-2">
                                                            <a data-toggle="tab" href="#demo-step-tab4" aria-expanded="false">
                                                                <span class="icon-wrap icon-wrap-xs icon-circle bg-dark mar-ver">
                                                                    <span class="wz-icon icon-txt text-bold">4</span>
                                                                    <i class="wz-icon-done demo-psi-like"></i>
                                                                </span>
                                                                <small class="wz-desc box-block text-semibold">Employment</small>
                                                            </a>
                                                        </li>
                                                        <li class="col-xs-2">
                                                            <a data-toggle="tab" href="#demo-step-tab5" aria-expanded="false">
                                                                <span class="icon-wrap icon-wrap-xs icon-circle bg-dark mar-ver">
                                                                    <span class="wz-icon icon-txt text-bold">5</span>
                                                                    <i class="wz-icon-done demo-psi-like"></i>
                                                                </span>
                                                                <small class="wz-desc box-block text-semibold">Document</small>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="panel-body">
                                                    <div class="tab-content">
                                                        <!--First tab-->
                                                        <div id="demo-step-tab1" class="tab-pane active in">
                                                            <form class="form-horizontal mar-top" id="form_step_one" name="form_step_one"  action="<?=URLROOT;?>/form_Controller/apply" method="POST">
                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Position<span class="text-danger">*</span> </label>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control" type="text" value="<?=$data["designation_mstr_id"];?>" id="designation_mstr_id" name="designation_mstr_id" />
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control" type="text" value="<?=$data["id"];?>" id="job_post_detail_id" name="job_post_detail_id" onKeyPress="return IsAlphabets(event);" placeholder="Job Id" >
                                                                    </div>
                                                                  </div>

                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Full Name <span class="text-danger">*</span></label>
                                                                    <div class="col-md-3"><label>First name<span class="text-danger">*</span></label>
                                                                        <input class="form-control m-t-xxs" id="first_name" name="first_name" placeholder="First Name" type="text" onKeyPress="return IsAlphabets(event);" value="<?=(isset($first_name))?$first_name:"";?>"   >
                                                                    </div>
                                                                    <div class="col-md-3"><label>Middle Name </label>
                                                                        <input class="form-control m-t-xxs" id="middle_name" name="middle_name" placeholder="Middle Name" type="text" value="<?=(isset($middle_name))?$middle_name:"";?>" onKeyPress="return IsAlphabets(event);" >
                                                                    </div>
                                                                    <div class="col-md-3"><label>Last Name <span class="text-danger">*</span></label>
                                                                        <input class="form-control m-t-xxs" id="last_name" name="last_name" placeholder="Last Name" type="text" value="<?=(isset($last_name))?$last_name:"";?>" onKeyPress="return IsAlphabets(event);"  >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Father's Name </label>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control" type="text" value="<?=(isset($father_name))?$father_name:"";?>" id="father_name" name="father_name" onKeyPress="return IsAlphabets(event);" placeholder="Father Name" >
                                                                        <span id="father_name_show" class="text-danger"></span>
                                                                    </div>
                                                                    <label class="col-md-3" >Mother's Name </label>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control m-t-xxs" id="mother_name" name="mother_name" placeholder="Mother Name" type="text" value="<?=(isset($mother_name))?$mother_name:"";?>" onKeyPress="return IsAlphabets(event);" >
                                                                        <span id="mother_name_show" class="text-danger"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Blood Group </label>
                                                                    <div class="col-md-3">
                                                                        <select class="form-control m-t-xxs" id="blood_group" name="blood_group"  >
                                                                            <option value="">Select</option>
                                                                            <option value="A+">A+</option>
                                                                            <option value="A-">A-</option>
                                                                            <option value="B+">B+</option>
                                                                            <option value="B-">B-</option>
                                                                            <option value="O+">O+</option>
                                                                            <option value="O-">O-</option>
                                                                            <option value="AB+">AB+</option>
                                                                            <option value="AB-">AB-</option>
                                                                        </select>
                                                                        <span id="blood_group_show" class="text-danger"></span>
                                                                    </div>
                                                                    <label class="col-md-3" >Gender <span class="text-danger">*</span></label>
                                                                    <div class="col-md-3">
                                                                        <div class="radio">
                                                                            <input type="radio" id="gender" class="magic-radio" name="gender" value="Male" <?=(isset($gender))?($gender=="Male")?"checked":"":"checked";?> />
                                                                            <label for="gender1">Male</label>

                                                                            <input type="radio" id="gender" class="magic-radio" name="gender" value="Female" <?=(isset($gender))?($gender=="Female")?"checked":"":"";?> />
                                                                            <label for="gender2">Female</label>

                                                                            <input type="radio" id="gender" class="magic-radio" name="gender" value="Other" <?=(isset($gender))?($gender=="Other")?"checked":"":"";?> />
                                                                            <label for="gender3">Other</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Marital Status </label>
                                                                    <div class="col-md-3">
                                                                        <Select class="form-control m-t-xxs" id="marital_status" name="marital_status" >
                                                                            <option value="Single">Single</option>
                                                                            <option value="Married">Married</option>
                                                                            <option value="Widowed">Widowed</option>
                                                                            <option value="Divorced">Divorced</option>
                                                                        </Select>

                                                                    </div>
                                                                    <div id="spouse_name_hide_show" class="hide">
                                                                        <label class="col-md-3" id="spouse">Spouse Name </label>
                                                                        <div class="col-md-3" id="spousee">
                                                                            <input class="form-control m-t-xxs" id="spouse_name" name="spouse_name" placeholder="Spouse Name" type="text" value="<?=(isset($spouse_name))?$spouse_name:"";?>">
                                                                            <span id="mother_name_show" class="text-danger"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Date of Birth </label>
                                                                    <div class="col-md-3">
                                                                        <div class="input-group date" style="padding-right: 0px; padding-left: 0px;">
                                                                            <input type="text" id="date_of_birth" name="date_of_birth" class="form-control mask_date" placeholder="Date of Birth">
                                                                            <span class="input-group-addon" style="padding: 0px;"><i class="demo-pli-calendar-4"></i></span>
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
                                                                        <input class="form-control m-t-xxs" id="height" name="height" maxlength="4" placeholder="Height" type="text" value="" onKeyPress="return isNumber(event);"  >
                                                                    </div>
                                                                    <label class="col-md-3" > Weight </label>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control m-t-xxs" id="weight" name="weight" placeholder="Weight" value="" type="text"  >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2" >Aadhar No </label>
                                                                    <div class="col-md-3">
                                                                        <input class="form-control m-t-xxs" id="aadhar_no" name="aadhar_no" maxlength="12" placeholder="Aadhar No" type="text" value="" onKeyPress="return isNumber(event);"  >
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
                                                                <button type="button" id="btn-step-one-next" class="next btn btn-success pull-right">Next</button>
                                                            </form>
                                                        </div>

                                                        <!--Second tab-->
                                                        <div id="demo-step-tab2" class="tab-pane fade">
                                                            <form class="form-horizontal mar-top" action="<?=URLROOT;?>/form_Controller/apply_for_job/Two">

                                                                <div class="form-group">
                                                                    <label class="control-label text-danger"><u>Present Address:</u></label>
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
                                                                <div class="form-group">
                                                                    <label class="control-label text-danger"><u>Permanent Address:</u> </label> <input type="checkbox">Same as Present Address
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
                                                                                                <td>Father</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Mother</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Brother</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Sister</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Brother-in-law</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Spouse</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Friend</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Friend</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="5"><span class="text-danger">*</span>If none of the above is relevant, please mentioned other close relations below</td>

                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Relative 1</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>Relative 2</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="previous btn btn-danger">Previous</button>
                                                                <button type="button" id="add_update_candidate_step_two" class="next btn btn-success pull-right">Next</button>
                                                            </form>
                                                        </div>

                                                        <!--Third tab-->
                                                        <div id="demo-step-tab3" class="tab-pane">
                                                            <form class="form-horizontal mar-top">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="panel panel-primary">
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
                                                                                                <th></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody id="rowAddAcademicDetails">
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
                                                                                                <td>
                                                                                                    <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="academicTableAdditem(1);"></i></td>
                                                                                                <td></td>
                                                                                            </tr>
                                                                                            <input type="hidden" name="academicTableLen" id="academicTableLen" value="1" />
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <button type="button" class="previous btn btn-danger">Previous</button>
                                                                <button type="button" id="add_update_candidate_step_three" class="next btn btn-success pull-right">Next</button>
                                                            </form>
                                                        </div>

                                                        <!--Fourth tab-->
                                                        <div id="demo-step-tab4" class="tab-pane mar-btm text-center">
                                                            <form class="form-horizontal mar-top">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="panel panel-primary">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">Present Employment</h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Name Of Employer </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="Name of Employer" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Address Of Organisation </label>
                                                                                    <div class="col-md-5">
                                                                                        <textarea class="form-control m-t-xxs" id="city" name="city" placeholder="Address of Organisation" type="text" value=""  >
                                                                                        </textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Date Of Joining </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Brief Description Of Present Job :<br/>
                                                                                        Heighlight Special Achievements, Awards, Promotions, etc. </label>
                                                                                    <div class="col-md-5">
                                                                                        <textarea class="form-control m-t-xxs" id="city" name="city" placeholder="Brief Description of Present Job" type="text" value=""  >
                                                                                        </textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Details Of Present Emoluments
                                                                                        <br/>(Monthly) </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Other Emoluments Like PF, LTA,
                                                                                        Medical, Gratuity, Bonus/Ex-gratia etc. </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Any Benefits / Facilities In Kind ? </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Expected Salary </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >What Notice Period Do You Need To Join ? </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="" type="text" value=""  >
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
                                                                                                <th>Total Exp.  </th>
                                                                                                <th>Organisation Name, Brief Address</th>
                                                                                                <th>Designation</th>
                                                                                                <th>Monthly Emoluments(Last)</th>
                                                                                                <th>Class / % Of Marks Awarded</th>
                                                                                                <th></th>
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
                                                                                                <td>
                                                                                                    <i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="employeementTableAdditem(1);"></i></td>
                                                                                                <td></td>
                                                                                            </tr>
                                                                                            <input type="hidden" name="employeementTableLen" id="employeementTableLen" value="1" />
                                                                                        </tbody>
                                                                                    </table>
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
                                                                                        <textarea class="form-control m-t-xxs" id="city" name="city" rows="20" type="text" value=""  >
                                                                                        </textarea>
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
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="Name of Employer" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Hobbies</label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="Name of Employer" type="text" value="" / >

                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >Any of the relation working in this company now or earlier </label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" type="text" value=""  >
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3" >State of health</label>
                                                                                    <div class="col-md-5">
                                                                                        <input class="form-control m-t-xxs" id="city" name="city" placeholder="Name of Employer" type="text" value="" / >

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
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>2</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>3</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>4</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>5</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>6</td>
                                                                                                <td><input type="text" id="previous_company_name1" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td>
                                                                                                <td><input type="text" id="work_from1" name="work_from[]" class="form-control work_from" value="" /></td>
                                                                                                <td><input type="text" id="work_till1" name="work_till[]" class="form-control work_till" value="" /></td>
                                                                                                <td><textarea type="text" id="work_till1" name="work_till[]" class="form-control" value="" ></textarea></td>
                                                                                            </tr>

                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="previous btn btn-danger">Previous</button>
                                                                <button type="button" id="add_update_candidate_step_four" class="next btn btn-success pull-right">Next</button>
                                                            </form>
                                                        </div>
                                                        <!--Five tab-->
                                                        <div id="demo-step-tab5" class="tab-pane mar-btm text-center">
                                                            <form class="form-horizontal mar-top">
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <div class="panel panel-primary">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">Add/Update Document</h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-2">
                                                                                        <button type="button" class="btn btn-md btn-success btn-block" id="btn_document_list_hide_show" >New Upload <i class="fa fa-upload"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="document_upload_menu_hide_show" style="display: none;">
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-2" >Document Name</label>
                                                                                        <div class="col-md-3">
                                                                                            <input type="text" class="form-control" id="emp_attachment_name" name="emp_attachment_name" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-2" >Upload Document</label>
                                                                                        <div class="col-md-3">
                                                                                            <input type="file" class="form-control" id="emp_attachment_path" name="emp_attachment_path" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <hr>
                                                                                    <div class="form-group">
                                                                                        <label class="col-md-2" ></label>
                                                                                        <div class="col-md-3">
                                                                                            <button type="button" class="btn btn-md btn-success btn-block" id="btn_upload_doc_step_six" name="btn_upload_doc_step_six">Upload</button>
                                                                                        </div>
                                                                                    </div>
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
                                                                                                        <th>Document Name  </th>
                                                                                                        <th>Action</th>

                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="tbody_condidate_attachment_list">
                                                                                                    <tr>
                                                                                                        <td colspan="2"><span style="color: red;">No any document uploaded !!!</span></td>
                                                                                                    </tr>

                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="previous btn btn-danger">Previous</button>
                                                                <button type="button" id="add_update_candidate_step_six" class="finish btn btn-success pull-right">Finish</button>
                                                            </form>
                                                        </div>
                                <!--===================================================-->
					                                </div>
					                            </div>
					                    </div>
					            <!--===================================================-->
					            <!-- End Bubble Numbers Form Wizard -->
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
       </div>
        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->

</body>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--jQuery [ REQUIRED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/jquery.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/bootstrap.min.js"></script>
    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="<?=URLROOT;?>/common/assets/js/nifty.min.js"></script>
    <!--[ OPTIONAL ]-->
    <script src="<?=URLROOT;?>/common/assets/plugins/masked-input/jquery.maskedinput.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/bootstrap4-toggle/js/bootstrap4-toggle.min.js"></script>
    <script src="<?=URLROOT;?>/common/assets/otherJs/validation.js"></script>
    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="<?=URLROOT;?>/common/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <!--Form Wizard [ SAMPLE ]-->
    <script src="<?=URLROOT;?>/common/assets/js/demo/form-wizard.js"></script>



<script type="text/javascript">
         $("#rowAddAcademicDetails").on('click', '.remove_buttonn_item', function(e) {
             $(this).closest("tr").remove();
         });
         function academicTableAdditem(j){
             var z = parseInt($('#academicTableLen').val())+j;
             var newDivTanent = $('<tr><td><select id="designation_id'+z+'" name="designation_id[]" class="form-control designation_id" ><option value="">Select</option> </select></td><td><input type="text" id="previous_company_name'+z+'" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td><td><input type="text" id="work_from'+z+'" name="work_from[]" class="form-control work_from" value="" /></td><td><input type="text" id="work_till'+z+'" name="work_till[]" class="form-control work_till" value=""  /></td><td><input type="text" id="description_of_job'+z+'" name="description_of_job[]" class="form-control description_of_job" /></td><td><input type="text" id="description_of_job'+z+'" name="description_of_job[]" class="form-control description_of_job" /></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="academicTableAdditem(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
             $('#rowAddAcademicDetails').append(newDivTanent);
             $('#academicTableLen').val(z);
         }
</script>

<script type="text/javascript">

        $("#rowAddPreviousEmploymentDetails").on('click', '.remove_buttonn_item', function(e) {
            $(this).closest("tr").remove();
        });
        function employeementTableAdditem(j){
            var z = parseInt($('#employeementTableLen').val())+j;
            var newDivTanent = $('<tr><td><select id="designation_id'+z+'" name="designation_id[]" class="form-control designation_id" ><option value="">Select</option> </select></td><td><input type="text" id="previous_company_name'+z+'" name="previous_company_name[]" class="form-control previous_company_name" value="" /></td><td><input type="text" id="work_from'+z+'" name="work_from[]" class="form-control work_from" value="" /></td><td><input type="text" id="work_till'+z+'" name="work_till[]" class="form-control work_till" value=""  /></td><td><input type="text" id="description_of_job'+z+'" name="description_of_job[]" class="form-control description_of_job" /></td><td><input type="text" id="description_of_job'+z+'" name="description_of_job[]" class="form-control description_of_job" /></td><td><i class="fa fa-plus-square" style="font-size:30px; cursor:pointer;" onClick="employeementTableAdditem(1);"></i></td><td><i class="fa fa-remove remove_buttonn_item" style="font-size:30px; cursor:pointer;"></i></td></tr>');
            $('#rowAddPreviousEmploymentDetails').append(newDivTanent);
            $('#employeementTableLen').val(z);
        }

        $("#btn_document_list_hide_show").click(function(){
	$("#document_upload_menu_hide_show").show();
});
</script>
    



<script type="text/javascript">
    funcation validation(){
      var first_name = $("#first_name").val();
      var father_name = $("#father_name").val();
	  var last_name = $("#last_name").val();
      var mother_name = $("#mother_name").val();
      var blood_group = $("#blood_group").val();
	  var date_of_birth = $("#date_of_birth").val();
      var height = $("#height").val();
      var weight = $("#weight").val();
	  var aadhar_no = $("#aadhar_no").val();
        if (first_name =="") {
           $("#first_name").css('border-color', 'red'); process = false;
        }
        if (last_name =="") {
           $("#last_name").css('border-color', 'red'); process = false;
        }
        if (father_name =="") {
           $("#father_name").css('border-color', 'red'); process = false;
        }
        if (mother_name =="") {
           $("#mother_name").css('border-color', 'red'); process = false;
        }
        if (blood_group =="") {
           $("#blood_group").css('border-color', 'red'); process = false;
        }
        if (date_of_birth =="") {
           $("#date_of_birth").css('border-color', 'red'); process = false;
        }
        if (height =="") {
           $("#height").css('border-color', 'red'); process = false;
        }
        if (weight =="") {
           $("#weight").css('border-color', 'red'); process = false;
        }
        if (aadhar_no =="") {
           $("#aadhar_no").css('border-color', 'red'); process = false;
        }
        return process;


    };

$("#first_name").change(function(){ $(this).css('border-color',''); });
$("#last_name").change(function(){ $(this).css('border-color',''); });
$("#father_name").change(function(){ $(this).css('border-color',''); });
$("#mother_name").change(function(){ $(this).css('border-color',''); });
$("#blood_group").change(function(){ $(this).css('border-color',''); });
$("#date_of_birth").change(function(){ $(this).css('border-color',''); });
$("#height").change(function(){ $(this).css('border-color',''); });
$("#weight").change(function(){ $(this).css('border-color',''); });
$("#aadhar_no").change(function(){ $(this).css('border-color',''); });


</script>


<script type="text/javascript">
    $('#date_of_birth').datepicker({
    format: "yyyy-mm-dd",
    endDate: '-6517d',
    weekStart: 0,
    autoclose:true,
    todayHighlight:true,
    todayBtn: "linked",
    clearBtn:true,
    daysOfWeekHighlighted:[0]
});
</script>
    
<script type="text/javascript">

    function calculateAge(birthday) {
        var now = new Date();
        var past = new Date(birthday);
        var nowYear = now.getFullYear();
        var pastYear = past.getFullYear();
        var age = nowYear - pastYear;  
        return age;
   }
 $("#date_of_birth").change(function(){
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
    
    $("#marital_status").change(function(){
    if($("#marital_status").val()=="Single")
        $("#spouse_name_hide_show").addClass("hide").removeClass("show");
    else
        $("#spouse_name_hide_show").addClass("show").removeClass("hide");
});
</script>

<script type="text/javascript"> 
  $("#btn-step-one-next").click(function(){  
   $.ajax({
			type:"POST",
			url: "<?=URLROOT;?>/form_controller/applyJobForm",
			dataType: "json",
			data: ("#form_step_one").serialize(),

			success:function(data){
                if(data.response==true){
                    alert("Basic Details Inserted..");
                    }else{
                     alert("Basic Details Updated..");
                 }

	        },

	    });
    
});
</script>