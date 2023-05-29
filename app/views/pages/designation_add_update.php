<?php require APPROOT . '/views/layout_vertical/header.php'; ?>
<!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <!--<h1 class="page-header text-overflow">Add/Update Designation</h1>//-->
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->


                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Masters</a></li>
					<li class="active">Add/Update Designation</li>
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
					                <h3 class="panel-title">Add/Update Designation</h3>

					            </div>

					            <!--Horizontal Form-->
					            <!--===================================================-->
					            <form class="form-horizontal" method="post" action="<?=URLROOT;?>/Masters/designation_add_update/<?=(isset($data['_id']))?$data['_id']:'';?>">
                                    <input type="text" id="_id" name="_id" value="<?=(isset($data['_id']))?$data['_id']:'';?>" hidden/>
					                <div class="panel-body">
					                    <div class="form-group">
					                        <label class="col-sm-3 control-label" for="design">Designation Name</label>
					                        <div class="col-sm-4">
					                            <input type="text" maxlength="50" placeholder="Enter Designation" id="designation_name" name="designation_name" class="form-control" value="<?=(isset($data['designation_name']))?$data['designation_name']:"";?>" onkeypress="return isAlpha(event);" >
					                        </div>
					                    </div>
                                          <div class="form-group">
                                                <label class="col-sm-3 control-label" for="dept"> Department Name</label>
                                        <div class="col-sm-4">
                                             <select id="department_mstr_id" name="department_mstr_id" class="form-control">
   	                                            <option value="-">--select--</option>
   	                                            <?php foreach($data["dept"] as $value):?>
   	                                            <option value="<?=$value["_id"]?>" <?=(isset($data["department_mstr_id"]))?($data["department_mstr_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["dept_name"]?></option>
  	                                         <?php endforeach;?>

                                             </select>
                                        </div>
					                </div>
                                         <div class="form-group">
                                                <label class="col-sm-3 control-label" for="grade"> Grade Type</label>
                                        <div class="col-sm-4">
                                             <select id="grade_mstr_id" name="grade_mstr_id" class="form-control">
   	                                            <option value="-">--select--</option>
   	                                            <?php foreach($data["grade"] as $value):?>
   	                                            <option value="<?=$value["_id"]?>" <?=(isset($data["grade_mstr_id"]))?($data["grade_mstr_id"]==$value["_id"])?"SELECTED":"":"";?>><?=$value["grade_type"]?></option>

  	                                         <?php endforeach;?>

                                             </select>
                                        </div>
					                </div>
					                <div class="panel-footer text-center">
					                    <button class="btn btn-success" id="btndesign" name="btndesign" type="submit"><?=(isset($data["_id"]))?"Edit Designation":"Add Designation";?></button>
                                        <a href="<?=URLROOT;?>/Masters/DesignationList" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back To List</a>
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
    $("#btndesign").click(function() {
        var process = true;
        var designation_name = $("#designation_name").val();
            designation_name = designation_name.trim();
        if (designation_name=='null' || designation_name == '') {
            $("#designation_name").css({"border-color":"red"});
            $("#designation_name").focus();
            process = false;
          }
        var department_mstr_id = $("#department_mstr_id").val();
        if (department_mstr_id == '-') {
            $("#department_mstr_id").css({"border-color":"red"});
            $("#department_mstr_id").focus();
            process = false;
          }
         var grade_mstr_id = $("#grade_mstr_id").val();
        if (grade_mstr_id == '-') {
            $("#grade_mstr_id").css({"border-color":"red"});
            $("#grade_mstr_id").focus();
            process = false;
          }
        return process;
    });
    $("#department_mstr_id").change(function(){$(this).css('border-color','');});
    $("#grade_mstr_id").change(function(){$(this).css('border-color','');});
    $("#designation_name").keyup(function(){$(this).css('border-color','');});
});
</script>