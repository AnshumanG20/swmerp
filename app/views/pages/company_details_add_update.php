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
                                                <label class="control-label" for="company">Company Name<span class="text-danger">*</span></label>
					                            <input type="text" maxlength="50" placeholder="Enter Company Name" id="company_name" name="company_name" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="website_name">Website Name<span class="text-danger">*</span></label>
					                            <input type="text" maxlength="50" placeholder="Enter Company Website Name" id="website_name" name="website" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <div class="col-sm-4">
                                                <label class="control-label text-danger"><u>Registered Office Details</u></label>
					                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <label class="control-label" for="address">Address</label>
                                                <textarea type="text" placeholder="Enter Company Address" id="reg_address" name="reg_address" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" ></textarea>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <div class="col-sm-5">
                                                <label class="control-label" for="cin_no">CIN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter CIN No." id="reg_cin_no" name="reg_cin_no" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="pan_no">PAN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter PAN No." id="reg_pan_no" name="reg_pan_no" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <div class="col-sm-5">
                                                <label class="control-label" for="tin_no">TIN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter TIN No." id="reg_tin_no" name="reg_tin_no" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="gstin_no">GSTIN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter GSTIN No." id="reg_gstin_no" name="reg_gstin_no" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
					                    <div class="form-group">
                                            <div class="col-sm-5">
                                                <label class="control-label" for="tds_no">TDS No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter TDS No." id="reg_tds_no" name="reg_tds_no" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="contact_no">Contact No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter Contact No." id="reg_contact_no" name="reg_contact_no" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
                                            </div>
					                    </div>
                                        <div class="form-group">
                                             <div class="col-sm-5">
                                                <label class="control-label" for="email_id">Email Id</label>
					                            <input type="text" maxlength="50" placeholder="Enter Email Id" id="reg_email_id" name="reg_email_id" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="state_name">State</label>
					                            <input type="text" maxlength="50" placeholder="Enter State Name" id="reg_state" name="reg_state" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <div class="col-sm-4">
                                                <label class="control-label"><u class="text-danger">Head Office Details &nbsp;&nbsp;</u> <input type="checkbox"> <b>Same as Above</b></label>
					                        </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-5">
                                                <label class="control-label" for="address">Address</label>
                                                <textarea type="text" maxlength="50" placeholder="Enter Company Address" id="ho_address" name="ho_address" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" ></textarea>
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <div class="col-sm-5">
                                                <label class="control-label" for="cin_no">CIN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter CIN No." id="ho_cin_no" name="ho_cin_no" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="pan_no">PAN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter PAN No." id="ho_pan_no" name="ho_pan_no" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
                                        <div class="form-group">
					                        <div class="col-sm-5">
                                                <label class="control-label" for="tin_no">TIN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter TIN No." id="ho_tin_no" name="ho_tin_no" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="gstin_no">GSTIN No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter GSTIN No." id="ho_gstin_no" name="ho_gstin_no" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
					                    <div class="form-group">
                                            <div class="col-sm-5">
                                                <label class="control-label" for="tds_no">TDS No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter TDS No." id="ho_tds_no" name="ho_tds_no" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                        <div class="col-sm-5">
                                                <label class="control-label" for="contact_no">Contact No.</label>
					                            <input type="text" maxlength="50" placeholder="Enter Contact no." id="ho_contact_no" name="ho_contact_no" class="form-control" value="<?=(isset($data['company_name']))?$data['company_name']:"";?>" >
                                            </div>
					                    </div>
                                        <div class="form-group">
                                             <div class="col-sm-5">
                                                <label class="control-label" for="email_id">Email Id</label>
					                            <input type="text" maxlength="50" placeholder="Enter Email Id" id="ho_email_id" name="ho_email_id" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
                                            <div class="col-sm-5">
                                                <label class="control-label" for="state_name">State</label>
					                            <input type="text" maxlength="50" placeholder="Enter State Name" id="ho_state_name" name="ho_state_name" class="form-control" value="<?=(isset($data['website']))?$data['website']:"";?>" >
					                        </div>
					                    </div>
                                        <div class="form-group">
                                             <div class="col-sm-5">
                                                <button class="btn btn-success" id="btncompany" name="btncompany" type="submit"><?=(isset($data["_id"]))?"Edit Company Details":"Add Company Details";?></button>
                                                <a href="<?=URLROOT;?>/Company_Details/LocationList" class="btn btn-danger"><!--<i class="fa fa-arrow-left"></i>//--> Add Branch Office Details</a>
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
$(document).ready( function () {
    $("#btncompany").click(function() {
        var process = true;
        var exp = /^[A-Za-z0-9\s]+$/;
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
        if (website=='null' || website == '') {
            $("#website").css({"border-color":"red"});
            $("#website").focus();
            process = false;
          }
        var company_gstin_no = $("#company_gstin_no").val();
        if (company_gstin_no=='null' || company_gstin_no == '') {
            $("#company_gstin_no").css({"border-color":"red"});
            $("#company_gstin_no").focus();
            process = false;
          }
        return process;
    });
});
</script>