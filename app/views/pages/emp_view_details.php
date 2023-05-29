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
					<li><a href="#">User</a></li>
					<li class="active">Employee Details</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->

                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                        <div class="panel">

                           </div>
                        <div class="col-md-12 col-lg-12">

					        <!--Bordered Accordion-->
					        <!--===================================================-->
					        <div class="panel-group accordion" id="demo-acc-info-outline">
					            <div class="panel panel-bordered panel-info">
                                    <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
                                            <div class="col-md-10">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-1" aria-expanded="true" class="">Basic Details</a>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="<?=URLROOT;?>/Employee/empList" class="btn btn-danger" style="float:right;margin-top:2%;height: 32px;line-height: 1.95;">Back To List</a>
                                            </div>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse in" id="demo-acd-info-outline-1" aria-expanded="true" style="">
					                    <div class="panel-body">
					                        <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-2">Employee Name</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["first_name"].' '.$data["middle_name"].' '.$data["last_name"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Mobile No</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["personal_phone_no"];?></b>
                                                    </div>
                                                    <label class="col-md-3" >Other Phone No</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["other_phone_no"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Email ID</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["email_id"];?></b>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Blood Group</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["blood_group"];?></b>
                                                    </div>
                                                    <label class="col-md-3" >Gender</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["gender"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Marital Status</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["marital_status"];?></b>
                                                    </div>
                                                    <?php
                                                    if($data["marital_status"]=="Married")
                                                    {
                                                    ?>
                                                    <label class="col-md-3" >Spouse Name</label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["spouse_name"];?></b>
                                                    </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Date Of Birth</label>
                                                    <div class="col-md-3">
                                                        <b><?=date('d-M-Y', strtotime($data["d_o_b"]));?></b>
                                                    </div>
                                                    <label class="col-md-3" >Age</label>
                                                    <div class="col-md-3">
                                                        <b><?php
                                                            $dob=$data["d_o_b"];
                                                            $diff = (date('Y') - date('Y',strtotime($dob)));
                                                            echo $diff.' yrs';
                                                            ?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Height</label>
                                                    <div class="col-md-3">
                                                    <?php
                                                    if($data["height"]){
                                                    ?>
                                                        <b><?=$data["height"].' cm';?></b>
                                                    <?php
                                                    }else{
                                                        echo "N/A";
                                                    }
                                                    ?>
                                                    </div>
                                                    <label class="col-md-3" >Weight</label>
                                                    <div class="col-md-3">
                                                    <?php
                                                    if($data["weight"]){
                                                    ?>
                                                        <b><?=$data["weight"].' kg';?></b>
                                                    <?php
                                                    }else{
                                                        echo "N/A";
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                                <label class="col-md-12" >Employee Photo</label>
                                                <div class="col-md-4">

                                                <?php if($data["photo_path"]!=""){ ?>
                                                <div class="form-group">
                                                    <img src="<?=URLROOT;?>/uploads/<?=$data["photo_path"];?>" height="250" width="250" style="border:double">
                                            </div>
                                             <?php } else { ?>
                                                <div class="form-group">
                                                    <img src="<?=URLROOT."/common/assets/img/avatar/default_avatar.png";?>" height="250" width="250" style="border:double">
                                            </div>
                                            <?php } ?>

                                              
                                            </div>
                                                
                                            </form>
					                    </div>
					                </div>
					            </div>
					            <div class="panel panel-bordered panel-info">

					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-2" class="collapsed" aria-expanded="false">Contact Details</a>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse" id="demo-acd-info-outline-2" aria-expanded="false" style="height: 0px;">
					                    <div class="panel-body">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label text-danger"><u>Present Address:</u></label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Address Line</label>
                                                    <div class="col-md-10">
                                                        <b><?=$data["present_address"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >City </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["present_city"];?></b>
                                                    </div>
                                                    <label class="col-md-3" >District </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["present_district"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >State </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["present_state"];?></b>
                                                    </div>
                                                    <label class="col-md-3" > Pincode </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["present_pin_code"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="checkbox">
                                                        <label class="text-danger"><u>Permanent Address:</u> </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Address Line</label>
                                                    <div class="col-md-10">
                                                        <b><?=$data["permanent_address"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >City </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["permanent_city"];?></b>
                                                    </div>
                                                    <label class="col-md-3" >District </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["permanent_district"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >State </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["permanent_state"];?></b>
                                                    </div>
                                                    <label class="col-md-3" > Pincode </label>
                                                    <div class="col-md-3">
                                                        <b><?=$data["permanent_pin_code"];?></b>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Family Background</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <input type="hidden" id="candidate__family_backbgound_id" name="candidate__family_backbgound_id"/>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>Relation </th>
                                                                                <th>Name</th>
                                                                                <th>Occupation</th>
                                                                                <th>Contact No.</th>
                                                                                <th>Address</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Father</td>
                                                                                <td><?php if(isset($data["emp_family_backbgound"]["father_name"])){
                                                                                    echo $data["emp_family_backbgound"]["father_name"];
                                                                                }?></td>
                                                                                <td><?php if(isset($data["emp_family_backbgound"]["father_occupation"])){
                                                                                    echo $data["emp_family_backbgound"]["father_name"];
                                                                                }?></td>
                                                                                <td><?php if(isset($data["father_occupation"]["father_contact_no"])){
                                                                                    echo $data["emp_family_backbgound"]["father_contact_no"];
                                                                                }?></td>
                                                                                <td><?php if(isset($data["father_occupation"]["father_contact_no"])){
                                                                                    echo $data["emp_family_backbgound"]["father_address"];
                                                                                }?></td>
                                                                            </tr>
                                                                        <?php
                                                                        if(isset($data["emp_family_backbgound"]["mother_occupation"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Mother</td>
                                                                                <td><?=($data["emp_family_backbgound"]["mother_occupation"]!="")?$data["emp_family_backbgound"]["mother_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["mother_occupation"]!="")?$data["emp_family_backbgound"]["mother_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["mother_contact_no"]!="")?$data["emp_family_backbgound"]["mother_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["mother_address"]!="")?$data["emp_family_backbgound"]["mother_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["brother_name"])!=""){
                                                                        ?>
                                                                             <tr>
                                                                                <td>Brother</td>
                                                                                <td><?=($data["emp_family_backbgound"]["brother_name"]!="")?$data["emp_family_backbgound"]["brother_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["brother_occupation"]!="")?$data["emp_family_backbgound"]["brother_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["brother_contact_no"]!="")?$data["emp_family_backbgound"]["brother_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["brother_address"]!="")?$data["emp_family_backbgound"]["brother_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["sister_name"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Sister</td>
                                                                                <td><?=($data["emp_family_backbgound"]["sister_name"]!="")?$data["emp_family_backbgound"]["sister_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["sister_occupation"]!="")?$data["emp_family_backbgound"]["sister_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["sister_contact_no"]!="")?$data["emp_family_backbgound"]["sister_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["sister_address"]!="")?$data["emp_family_backbgound"]["sister_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["brother_in_law_name"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Brother-In-Law</td>
                                                                                <td><?=($data["emp_family_backbgound"]["brother_in_law_name"]!="")?$data["emp_family_backbgound"]["brother_in_law_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["brother_in_law_occupation"]!="")?$data["emp_family_backbgound"]["brother_in_law_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["brother_in_law_contact_no"]!="")?$data["emp_family_backbgound"]["brother_in_law_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["brother_in_law_address"]!="")?$data["emp_family_backbgound"]["brother_in_law_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["spouse_name"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Spouse</td>
                                                                                <td><?=($data["emp_family_backbgound"]["spouse_name"]!="")?$data["emp_family_backbgound"]["spouse_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["spouse_occupation"]!="")?$data["emp_family_backbgound"]["spouse_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["spouse_contact_no"]!="")?$data["emp_family_backbgound"]["spouse_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["spouse_address"]!="")?$data["emp_family_backbgound"]["spouse_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["friend1_name"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Friend</td>
                                                                                <td><?=($data["emp_family_backbgound"]["friend1_name"]!="")?$data["emp_family_backbgound"]["friend1_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["friend1_occupation"]!="")?$data["emp_family_backbgound"]["friend1_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["friend1_contact_no"]!="")?$data["emp_family_backbgound"]["friend1_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["friend1_address"]!="")?$data["emp_family_backbgound"]["friend1_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["friend2_name"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Friend2</td>
                                                                                <td><?=($data["emp_family_backbgound"]["friend2_name"]!="")?$data["emp_family_backbgound"]["friend2_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["friend2_occupation"]!="")?$data["emp_family_backbgound"]["friend2_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["friend2_contact_no"]!="")?$data["emp_family_backbgound"]["friend2_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["friend2_address"]!="")?$data["emp_family_backbgound"]["friend2_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["relative1_name"])!=""){
                                                                        ?>
                                                                            <tr><td colspan="5" style="text-align:center;color:red;">If none of the above is relevant, please mentioned other close relations below</td></tr>
                                                                            <tr>
                                                                                <td>Relative1</td>
                                                                                <td><?=($data["emp_family_backbgound"]["relative1_name"]!="")?$data["emp_family_backbgound"]["relative1_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["relative1_occupation"]!="")?$data["emp_family_backbgound"]["relative1_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["relative1_contact_no"]!="")?$data["emp_family_backbgound"]["relative1_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["relative1_address"]!="")?$data["emp_family_backbgound"]["relative1_address"]:"N/A";?></td>
                                                                            </tr>
                                                                        <?php
                                                                        }
                                                                        if(isset($data["emp_family_backbgound"]["relative2_name"])!=""){
                                                                        ?>
                                                                            <tr>
                                                                                <td>Relative2</td>
                                                                                <td><?=($data["emp_family_backbgound"]["relative2_name"]!="")?$data["emp_family_backbgound"]["relative2_name"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["relative2_occupation"]!="")?$data["emp_family_backbgound"]["relative2_occupation"]:"N/A";?></td>
                                                                               <td><?=($data["emp_family_backbgound"]["relative2_contact_no"]!="")?$data["emp_family_backbgound"]["relative2_contact_no"]:"N/A";?></td>
                                                                                <td><?=($data["emp_family_backbgound"]["relative2_address"]!="")?$data["emp_family_backbgound"]["relative2_address"]:"N/A";?></td>
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
                                            </form>
					                    </div>
					                </div>
					            </div>
					            <div class="panel panel-bordered panel-info">

					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-3" class="collapsed" aria-expanded="false">Academic Details</a>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse" id="demo-acd-info-outline-3" aria-expanded="false" style="height: 0px;">
					                    <div class="panel-body">
                                            <form class="form-horizontal mar-top">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-12 text-danger" id="stepThreeErrorPanel"></label>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>Qualification</th>
                                                                                <th>Stream</th>
                                                                                <th>Sub Stream </th>
                                                                                <th>Medium : English / Vernacular</th>
                                                                                <th>Year Of Passing</th>
                                                                                <th>Name Of School / College / Institute And Place</th>
                                                                                <th>Name Of Board / University Affiliated</th>
                                                                                <th>percentage/ CGPA</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="rowAddAcademicDetails">
                                                                            <?php if(isset($data["emp_qualification_details"])):?>
                                                                            <?php foreach ($data["emp_qualification_details"] as $key => $value):?>

                                                                            <tr>

                                                                                <td>
                                                                                    <?php foreach ($data["course_mstr_list"] as $key => $cml):
                                                                                        if($cml['_id']==$value['course_mstr_id']){
                                                                                            echo $cml['course_name'];
                                                                                        }
                                                                                    endforeach;?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php foreach ($value["sub_course_mstr_list"] as $key => $cml):
                                                                                        if($cml['_id']==$value['sub_course_mstr_id']){
                                                                                            echo $cml['stream_name'];
                                                                                        }
                                                                                    endforeach;?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php foreach ($value["sub_stream_mstr_list"] as $key => $cml):
                                                                                        if($cml['_id']==$value['sub_stream_mstr_id']){
                                                                                            echo $cml['sub_stream_name'];
                                                                                        }
                                                                                    endforeach;?>
                                                                                </td>
                                                                                <td><b><?=$value["medium_type"];?></b></td>
                                                                                <td><b><?=$value["passing_year"];?></b></td>
                                                                                <td><b><?=$value["school_college_institute_name"];?></b></td>
                                                                                <td><b><?=$value["board_university_name"];?></b></td>
                                                                                <td><b><?=$value["marks_percent"];?></b></td>
                                                                            </tr>
                                                                            <?php endforeach;?>
                                                                            <?php endif;?>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
					                    </div>
					                </div>
					            </div>

                            <div class="panel panel-bordered panel-info">

					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-4" class="collapsed" aria-expanded="false">Employment Details</a>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse" id="demo-acd-info-outline-4" aria-expanded="false" style="height: 0px;">
					                    <div class="panel-body">
                                            <form class="form-horizontal mar-top">
                                                <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="panel panel-primary">

                                                
                                                <?php if(isset($data["candidate_Prnemployment"])):?>
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Present Employment</h3>
                                                </div>
                                                <?php foreach ($data["candidate_Prnemployment"] as $key => $value):?>
                                                <div class="panel-body">
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Name Of Employer </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_name_of_employer"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Address Of Organisation </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_address_of_organisation"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Date Of Joining </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_date_of_joining"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Brief Description Of Present Job :<br/>
                                        Heighlight Special Achievements, Awards, Promotions, etc. </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_brief_desc_of_present_job"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Details Of Present Emoluments<br/>(Monthly) <span class="text-danger">Head of Salary: </span></label>
                                                        <div class="col-md-9">
                                                            <div class="form-group">
                                                                <label class="col-md-2">Basic
                                                                    <b><?=$value["present_basic_salary"];?></b>
                                                                </label>
                                                                <label class="col-md-2">HRA
                                                                    <b><?=$value["present_hra"];?></b>
                                                                </label>
                                                                <label class="col-md-5">Total Monthly Amount
                                                                    <b><?=$value["present_total_monthly_amt"];?></b>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Other Emoluments Like PF, LTA,
                                        Medical, Gratuity, Bonus/Ex-gratia etc. </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_other_emoluments_pf_lta_medical"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Any Benefits / Facilities In Kind ? </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_any_benefits_facilities"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Expected Salary </label>
                                                        <div class="col-md-5">
                                                            <b>Rs. <?=$value["present_expected_salary_pf_contribution_bonus"];?></b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >What Notice Period Do You Need To Join ? </label>
                                                        <div class="col-md-5">
                                                            <b><?=$value["present_join_notice_period"];?></b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;?>
                                                <?php endif;?>
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
                                                                    <th>Brief Job Description</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="rowAddPreviousEmploymentDetails">
                                                                <?php if(isset($data["emp_previous_employment_details"])):?>
                                                                <?php foreach ($data["emp_previous_employment_details"] as $key => $value):?>
                                                                <tr>
                                                                    <td><?=$value["previous_period_from"]." "."to"." ".$value["previous_period_to"];?></td>
                                                                    <td><?=$value["previous_experience"];?></td>
                                                                     <td><?=$value["previous_organization_name_address"];?></td>
                                                                     <td><?=$value["previous_designation"];?></td>
                                                                     <td><?=$value["previous_monthly_emoluments"];?></td>
                                                                     <td><?=$value["previous_brief_job_description"];?></td>
                                                                </tr>
                                                                <?php endforeach;?>
                                                                <?php else:?>
                                                                    <tr>
                                                                        <td colspan="6"><span class="text-danger">Data not available</span></td>
                                                                    </tr>
                                                                <?php endif;?>
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
                                                              <?=($data["experience_overall_relevant"]!="")?$data["experience_overall_relevant"]:"N/A";?>
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
                                                            <?=($data["languages_know"]!="")?$data["languages_know"]:"N/A";?>
                                                        </div>
                                                    </div>
                                                    <?=($data["languages_know"]!="")?$data["languages_know"]:"N/A";?>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >What are you leisure activities?</label>
                                                        <div class="col-md-5">
                                                            <?=($data["leisure_activity"]!="")?$data["leisure_activity"]:"N/A";?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >Any of the relation working in this company now or earlier </label>
                                                        <div class="col-md-5">
                                                             <?=($data["relations_working_in_this_company"]!="")?$data["relations_working_in_this_company"]:"N/A";?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3" >State of health</label>
                                                        <div class="col-md-5">
                                                            <?=($data["your_state_of_health"]!="")?$data["your_state_of_health"]:"N/A";?>
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
                                                                <?php if(isset($data["emp_references"]))
                                                                {?> 
                                                                <tr>

                                                                    <td>1</td>
                                                                    <td>
                                                                <?=($data["emp_references"]["reference_name_designation_organisation1"]!="")?$data["emp_references"]["reference_name_designation_organisation1"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                     <?=($data["emp_references"]["reference_phone_no_email_id1"]!="")?$data["emp_references"]["reference_phone_no_email_id1"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                     <?=($data["emp_references"]["reference_address_of_communication1"]!="")?$data["emp_references"]["reference_address_of_communication1"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                    <?=($data["emp_references"]["reference_social_professinal1"]!="")?$data["emp_references"]["reference_social_professinal1"]:"N/A";?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>
                                                                <?=($data["emp_references"]["reference_name_designation_organisation2"]!="")?$data["emp_references"]["reference_name_designation_organisation2"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                     <?=($data["emp_references"]["reference_phone_no_email_id2"]!="")?$data["emp_references"]["reference_phone_no_email_id2"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                     <?=($data["emp_references"]["reference_address_of_communication2"]!="")?$data["emp_references"]["reference_address_of_communication2"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                    <?=($data["emp_references"]["reference_social_professinal2"]!="")?$data["emp_references"]["reference_social_professinal2"]:"N/A";?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>
                                                                <?=($data["emp_references"]["reference_name_designation_organisation3"]!="")?$data["emp_references"]["reference_name_designation_organisation3"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                     <?=($data["emp_references"]["reference_phone_no_email_id3"]!="")?$data["emp_references"]["reference_phone_no_email_id3"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                     <?=($data["emp_references"]["reference_address_of_communication3"]!="")?$data["emp_references"]["reference_address_of_communication3"]:"N/A";?>
                                                                    </td>
                                                                    <td>
                                                                    <?=($data["emp_references"]["reference_social_professinal3"]!="")?$data["emp_references"]["reference_social_professinal3"]:"N/A";?>
                                                                    </td>
                                                                </tr>
                                                                <?php } 
                                                                else{?>
                                                                        <tr><td colspan="5" style="color:red;text-align:center; ">data not available!<td></tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                            </form>
					                    </div>
					                </div>
					            </div>
					       
                             <div class="panel panel-bordered panel-info">

                                    <!--Accordion title-->
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-7" class="collapsed" aria-expanded="false">Job Details</a>
                                        </h4>
                                    </div>

                                    <!--Accordion content-->
                                    <div class="panel-collapse collapse" id="demo-acd-info-outline-7" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <form class="form-horizontal">
                                                <?php //print_r($data); ?>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Project Assign</label>
                                                    <div class="col-md-3">
                                                    <?php if($data["project_mstr_id"]!=""):?>
                                                        <?php if(isset($data["project_mstr_list"])):?>
                                                            <?php foreach ($data["project_mstr_list"] as $key => $value):?>
                                                              <?=($data['project_mstr_id']==$value['_id'])?$value['project_name']:"";?>
                                                            <?php endforeach;?>
                                                        <?php else:?>
                                                            N/A
                                                        <?php endif;?>
                                                    <?php else:?>
                                                        N/A
                                                    <?php endif;?>
                                                    </div>
                                                    <label class="col-md-3" >Job Location</label>
                                                    <div class="col-md-3">
                                                    <?php if($data["company_location_id"]!=""):?>
                                                        <?php if(isset($data["company_location_list"])):?>
                                                            <?php foreach ($data["company_location_list"] as $key => $value):?>
                                                              <?=($data['company_location_id']==$value['_id'])?$value['city']:"";?>
                                                            <?php endforeach;?>
                                                        <?php else:?>
                                                            N/A
                                                        <?php endif;?>
                                                    <?php else:?>
                                                        N/A
                                                    <?php endif;?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Department</label>
                                                    <div class="col-md-3">
                                                        <?php if(isset($data["department_mstr_list"])):?>
                                                         <?php foreach ($data["department_mstr_list"] as $key => $value):?>
                                                             <?=($data['department_mstr_id']==$value['_id'])?$value['dept_name']:"";?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    </div>
                                                    <label class="col-md-3" >Designation</label>
                                                    <div class="col-md-3">
                                                        <?php if(isset($data["designation_mstr_list"])):?>
                                                         <?php foreach ($data["designation_mstr_list"] as $key => $value):?>
                                                             <?=($data['designation_mstr_id']==$value['_id'])?$value['designation_name']:"";?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Project Concept Type</label>
                                                    <div class="col-md-3">
                                                        <?=(isset($data["project_concept_type"]))?$data["project_concept_type"]:"N/A";?>
                                                    </div>
                                                <?php
                                                if($data["project_concept_type"]=="WARD"){
                                                ?>
                                                    <label class="col-md-3" >Ward Number</label>
                                                    <div class="col-md-3">
                                                        <?php
                                                        if(isset($data['ward_name_list'])){
                                                            $i=0;
                                                            foreach ($data['ward_name_list'] as $key => $wardList) {
                                                                $i++;
                                                        ?>
                                                            <?=$i;?> > 
                                                            <?=$wardList['ward_name'];?>
                                                            <br>
                                                        <?php
                                                            }
                                                        }else{
                                                        ?>
                                                        N/A
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Employment Type</label>
                                                    <div class="col-md-10">
                                                    <?php if(isset($data["employment_type_mstr_list"])):?>
                                                     <?php foreach ($data["employment_type_mstr_list"] as $key => $value):?>
                                                    <?=($data['employment_type_mstr_id']==$value['_id'])?$value['employment_type']:"";?>
                                                        <?php endforeach;?>
                                                    <?php endif;?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Monthly Salary </label>
                                                    <div class="col-md-10">
                                                        <?=$data["monthly_salary"];?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2" >Joining/Joined Date</label>
                                                    <div class="col-md-3">
                                                        <?=(isset($data["joining_date"]))?date('d-M-Y', strtotime($data["joining_date"])):"N/A";?>
                                                    </div>
                                                    <label class="col-md-3" >Biometric Employee Code</label>
                                                    <div class="col-md-3">
                                                        <?=($data["biometric_employee_code"]!="")?$data["biometric_employee_code"]:"N/A";?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-primary">
                                                            <div class="panel-heading">
                                                                <h3 class="panel-title">Bank Details</h3>
                                                            </div>
                                                            <div class="panel-body">
                                                                <input type="hidden" id="candidate_family_backbgound_id" name="candidate__family_backbgound_id"/>
                                                                <div class="table-responsive">
                                                                    <table class="table table-hover table-bordered table-condensed" >
                                                                        <thead>
                                                                            <tr class="success">
                                                                                <th>Bank Name</th>
                                                                                <th>Branch Name</th>
                                                                                <th>IFSC Code</th>
                                                                                <th>A/C No.</th>
                                                                                <th>A/C Type</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php if(isset($data["emp_bank_details"])):?>
                                                                            <tr>
                                                                                <td><?=$data["emp_bank_details"]["bank_name"];?></td>
                                                                                <td><?=$data["emp_bank_details"]["branch_name"];?></td>
                                                                                <td><?=$data["emp_bank_details"]["ifsc_code"];?></td>
                                                                                <td><?=$data["emp_bank_details"]["account_no"];?></td>
                                                                                <td> <?=($data["emp_bank_details"]["default_status"]==1)?"Primary":"Secondary";?></td>
                                                                            </tr>
                                                                        <?php else:?>
                                                                            <tr>
                                                                                <td colspan="4"><span class="text-danger">Data not available</span></td>
                                                                            </tr>
                                                                        <?php endif;?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
							<div class="panel panel-bordered panel-info">

					                <!--Accordion title-->
					                <div class="panel-heading">
					                    <h4 class="panel-title">
					                        <a data-parent="#demo-acc-info-outline" data-toggle="collapse" href="#demo-acd-info-outline-5" class="collapsed" aria-expanded="false">Document Details</a>
					                    </h4>
					                </div>

					                <!--Accordion content-->
					                <div class="panel-collapse collapse" id="demo-acd-info-outline-5" aria-expanded="false" style="height: 0px;">
					                    <div class="panel-body">
                                            <form class="form-horizontal mar-top">
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
                                                                        <?php if(isset($data["emp_document_details"])):?>
                                                                        <?php foreach ($data["emp_document_details"] as $key => $value):?>
                                                                        <tr>
                                                                            <td><?=$value["doc_name"];?></td>
                                                                            <td><?=$value["doc_no"];?></td>
                                                                            <td><?=$value["place_of_issue"];?></td>
                                                                            <td><?=$value["date_of_issue"];?></td>
                                                                            <td><?=$value["valid_upto"];?></td>
                                                                            <td><?=$value["doc_path"];?></td>
                                                                            <td><a target="_blank" href="<?= URLROOT."/uploads/".$value['doc_path']  ?>" class="btn btn-dark btn-sm">Document View</a></td>
                                                                        </tr>
                                                                        <?php endforeach;?>
                                                                        <?php endif;?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
					                    </div>
					                </div>
								</div>
							</div>

					        <!--===================================================-->
					        <!--End Bordered Accordion-->

					    </div>
					</div>
				</div>

					
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
<?php require APPROOT . '/views/layout_vertical/footer.php'; ?>